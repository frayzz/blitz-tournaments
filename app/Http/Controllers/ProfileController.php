<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'Пользователь не найден'], 404);
        }

        $user->load('profile');

        $matches['matches'] = Tournament::where(function ($query) use ($userId) {
            $query->where('creator_id', $userId)
                ->orWhere('opponent_id', $userId);
        })->paginate(5);

        $matches['wins'] = Tournament::where('winner_id', $userId)->count();
        $matches['losses'] = Tournament::where(function ($query) use ($userId) {
            $query->where('creator_id', $userId)
                ->orWhere('opponent_id', $userId);
        })->where('winner_id', '<>', $userId)->count();

        return view('user.profile', compact('user', 'matches'));
    }

    public function edit($userId)
    {
        $user = User::find($userId);

        if (!$this->authorize('edit', $user)){
            return response()->json(['error' => 'Ну зачем так делать?'], 404);
        }

        if (!$user) {
            return response()->json(['error' => 'Пользователь не найден'], 404);
        }

        $matches['matches'] = Tournament::where(function ($query) use ($userId) {
            $query->where('creator_id', $userId)
                ->orWhere('opponent_id', $userId);
        })->paginate(5);

        $matches['wins'] = Tournament::where('winner_id', $userId)->count();
        $matches['losses'] = Tournament::where(function ($query) use ($userId) {
            $query->where('creator_id', $userId)
                ->orWhere('opponent_id', $userId);
        })->where('winner_id', '<>', $userId)->count();

        $user->load('profile');
        return view('user.edit', compact('user', 'matches'));
    }

    public function update(Request $request, $userId)
    {
        // Валидация входных данных
        $validatedData = $request->validate([
            // Правила валидации для данных пользователя и профиля
            'name' => 'string|max:255',
            'telegram' => 'string|max:255',
            'steam' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
        ]);

        // Находим пользователя и его профиль
        $user = User::findOrFail($userId);
        $profile = $user->profile; // предполагая, что у вас есть отношение profile

        // Обновляем данные пользователя и профиля
        $user->update([
            'name' => $validatedData['name']
        ]);

        if ($profile) {
            $profile->update([
                'telegram' => $validatedData['telegram'],
                'steam' => $validatedData['steam'],
                'instagram' => $validatedData['instagram'],
            ]);
        }

        // Редирект или возвращаем ответ
        return redirect()->back()->with('success', 'Профиль успешно обновлен.');
    }
}
