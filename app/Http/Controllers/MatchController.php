<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTournamentRequest;
use App\Models\Tournament;
use Auth;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $matches = Tournament::all();
        return view('layouts.tournaments', compact('matches'));
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
                return 'Недостаточно средств на балансе';
            }
        } else {
            return 'Профиль пользователя не найден';
        }

        // После сохранения, вы можете перенаправить пользователя на другую страницу
        // или вернуть JSON-ответ, если это API
        //return redirect()->route('tournaments.show', $tournament->id);
    }

    public function show($id)
    {
        return 'Страница показа';
    }

    public function edit($id)
    {
        return 'Страница обновления';
    }

    public function update($id)
    {
        return 'Страница обновления';
    }

    public function destroy($id)
    {
        return 'Страница удаления';
    }
}
