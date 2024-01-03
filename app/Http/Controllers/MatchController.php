<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTournamentRequest;
use App\Models\Tournament;
use App\Models\TournamentResult;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Mail\StartMatch;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MatchController extends Controller
{
    public function index()
    {
        $matches = Tournament::all()->where('status', 'search');
        return view('layouts.personal.tournaments', compact('matches'));
    }

    public function create()
    {
        return view('main.create');
    }

    public function store(CreateTournamentRequest $request)
    {
        $validatedData = $request->validated();

        $user = Auth::user();

        if ($user && $user->profile) {
            $profile = $user->profile;
            $balance = $profile->balance;

            if ($balance >= $validatedData['amountSum']) {
                $profile->balance -= $validatedData['amountSum'];
                $profile->save(); // Сохраняем измененный баланс

                // Создание нового турнира
                $tournament = new Tournament();
                $tournament->name = $validatedData['name']; // Пример поля name
                $tournament->game_type = "mlbb"; // Пример поля game_type
                $tournament->number_of_players = $validatedData['number_of_players']; // Пример поля number_of_players
                $tournament->amountSum = $validatedData['amountSum']; // Пример поля number_of_players
                $tournament->creator_id = auth()->id(); // ID пользователя, который создал турнир

                // Заполнение других полей, если они есть
                // ...
                $tournament->save();

                return redirect('/');
            } else {
                return redirect()->back()->withErrors('Недостаточно средств на балансе');
            }
        } else {
            return 'Профиль пользователя не найден';
        }

        // После сохранения, вы можете перенаправить пользователя на другую страницу
        // или вернуть JSON-ответ, если это API
        //return redirect()->route('tournaments.show', $tournament->id);
    }

    public function show($match)
    {
        $match = Tournament::find($match);

        if (!$match) {
            // Обработка случая, когда турнир не найден
            return redirect()->back()->withErrors('Турнир не найден.');
        }

        return view("layouts.personal.showMatch", ['match' => $match]);
    }

    public function edit($id)
    {
        return 'Страница обновления';
    }

    public function update($id)
    {
        return 'Страница обновления';
    }

    public function start($match)
    {
        $match = Tournament::find($match);

        if (!$match) {
            // Обработка случая, когда турнир не найден
            return redirect()->back()->withErrors('Турнир не найден.');
        }

        if ($match->creator_id == auth()->id()) {
            return redirect()->back()->withErrors('Вы не можете участвовать в своем же турнире');
        }

        $user = auth()->user();

        if ($user && $user->profile) {
            $profile = $user->profile;
            $balance = $profile->balance;

            if ($balance >= $match['amountSum']) {
                $profile->balance -= $match['amountSum'];
                $profile->save(); // Сохраняем измененный баланс

                $match->status = 'start';
                $match->opponent_id = $user->id; // Убедитесь, что пользователь авторизован
                $match->save();

                // Отправка уведомления
                try {
                    Mail::to($match->creator->email)->send(new StartMatch());
                } catch (\Exception $e) {
                    // Обработка ошибки
                    // Здесь вы можете записать ошибку в лог, уведомить пользователя и т.д.
                    Log::error('Ошибка при отправке письма: '.$e->getMessage());
                }

                // Передача данных турнира в представление, если это необходимо
                return view("layouts.personal.showMatch", ['match' => $match]);
            } else {
                return redirect()->back()->withErrors('Недостаточно средств на балансе');
            }
        } else {
            return 'Профиль пользователя не найден';
        }
    }

    public function storeResults(Request $request)
    {
        // Валидация входящих данных
        $validated = $request->validate([
            'tournament_id' => 'required|exists:tournaments,id',
            'status' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'photo_path' => 'required|image|max:2048', // ограничение размера файла до 2МБ
        ]);

        // Проверяем, есть ли уже результат для данного пользователя и турнира
        $existingResult = TournamentResult::where('tournament_id', $request->tournament_id)
            ->where('user_id', $request->user_id)
            ->first();

        if ($existingResult) {
            // Если результат уже существует, возвращаем ошибку
            return redirect()->back()->withErrors('Вы уже добавили фото для этого турнира.');
        }

        if ($validated['status'] == 'start') {
            $match = Tournament::find($validated['tournament_id']);
            if ($match) {
                $match->status = 'summarizing';
                $match->save(); // Добавлены скобки для вызова метода
            }
        }

        // Обработка и сохранение файла
        if ($request->hasFile('photo_path')) {
            $path = $request->file('photo_path')->store('tournament_results', 'public');

            // Создание новой записи в таблице результатов
            $result = new TournamentResult();
            $result->tournament_id = $validated['tournament_id'];
            $result->user_id = $validated['user_id'];
            $result->photo_path = $path;
            $result->save();

            // Перенаправление с сообщением об успехе
            return redirect()->back()->with('success', 'Результаты успешно сохранены.');
        }

        // Перенаправление с сообщением об ошибке, если файл не был загружен
        return redirect()->back()->with('error', 'Ошибка при загрузке файла.');
    }

    public function winner(Request $request, $matchId) {
        $validated = $request->validate([
            'winner_id' => 'required',
        ]);

        $match = Tournament::find($matchId);
        if (!$match) {
            return redirect()->back()->with('error', 'Матч не найден');
        }

        $match->update([
            'status' => 'finish',
            'winner_id' => $validated['winner_id'],
        ]);

        $this->updateUserProfileBalance($validated['winner_id'], $match->amountSum * 0.9);
        $this->updateUserProfileBalance(auth()->id(), $match->amountSum * 0.1);

        return redirect()->back()->with('success', 'Результат успешно обновлён.');
    }

    private function updateUserProfileBalance($userId, $amount) {
        $user = User::find($userId);
        if (!$user) {
            return;
        }

        $user->profile->increment('balance', $amount);
    }
}
