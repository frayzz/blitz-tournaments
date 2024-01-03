<?php

namespace App\Http\Controllers\Admin\Main;

use App\Models\BalanceTransaction;
use App\Models\Tournament;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['usersCount'] = User::all()->count();
        $data['summarizingGames'] = Tournament::with(['results.user'])
            ->where('status', 'summarizing')
            ->get();
        $data['balanceTransactions'] = BalanceTransaction::where('status', false)->get();
        return view('admin.main.index', compact('data'));
    }
}
