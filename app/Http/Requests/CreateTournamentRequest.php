<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTournamentRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Измените на false, если нужно авторизационное ограничение
    }

    public function rules()
    {
        return [
            'name' => 'required|string', // Минимальная сумма ставки 1000тг
            'betAmount' => 'required|numeric|min:1000', // Минимальная сумма ставки 1000тг
            'number_of_players' => 'required|in:2, 6, 10', // Допустимые варианты количества игроков
        ];
    }
}
