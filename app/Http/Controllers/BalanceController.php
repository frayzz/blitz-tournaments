<?php

namespace App\Http\Controllers;

use App\Models\BalanceTransaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    public function index()
    {
        return view('user.balance');
    }

    public function deposit(Request $request)
    {
        $request->validate([
            'amountSum' => 'required|numeric',
            'full_name' => 'required|string',
        ]);



        BalanceTransaction::create([
            'user_id' => Auth::id(),
            'operation_type' => 'deposit',
            'amountSum' => $request->amountSum,
            'full_name' => $request->full_name,
            'status' => 0,
        ]);

        return redirect()->back()->with('success', 'Заявка успешно подана. Пожалуйста ожидайте.');
    }

    public function withdrawalIndex() {
        return view('user.withdrawal');
    }

    public function withdrawal(Request $request) {
        $request->validate([
            'amountSum' => 'required|numeric|min:0.01',
            'full_name' => 'required|string',
            'phone_number' => 'required|integer'
        ]);

        $user = Auth::user(); // или User::find(Auth::id());

        $withdrawalAmount = $request->amountSum;
        if ($user && $user->profile) {
            $profile = $user->profile;
            $balance = $profile->balance;
            if ($balance >= $withdrawalAmount) {
                // Обновите баланс пользователя
                $profile->balance -= $withdrawalAmount;
                $profile->save();

                // Создайте транзакцию
                BalanceTransaction::create([
                    'user_id' => $user->id,
                    'operation_type' => 'withdrawal',
                    'amountSum' => $withdrawalAmount,
                    'full_name' => $request->full_name,
                    'phone_number' => $request->phone_number,
                    'status' => 0,
                ]);

                return redirect()->back()->with('success', 'Заявка на вывод успешно подана. Пожалуйста ожидайте.');
            } else {
                return redirect()->back()->with('error', 'Недостаточно средств на балансе.');
            }
        } else {
            return redirect()->back()->with('error', 'Профиль пользователя не найден');
        }
    }
    public function depositAccept($transferId) {
        $transfer = BalanceTransaction::find($transferId);
        $user = User::find($transfer->user_id);

        if ($user) {
            // Получаем профиль пользователя
            $profile = $user->profile;
            $profile->balance += $transfer->amountSum;
            // Сохраняем изменения в профиле
            $profile->save();

            $transfer->status = true;
            $transfer->save();

            return redirect()->back()->with('success', 'Баланс успешно пополнен');
        } else {
            return redirect()->back()->with('error', 'Пользователь не найден');
        }
    }

    public function withdrawalAccept($transerId) {
        $transfer = BalanceTransaction::find($transerId);
        $transfer->status = true;
        $transfer->save();

        return redirect()->back()->with('success', 'Баланс успешно выведен');
    }
}
