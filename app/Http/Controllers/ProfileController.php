<?php

namespace App\Http\Controllers;

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

        return view('user.profile', compact('user'));
    }
}
