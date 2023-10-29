<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        return view('layouts.app');
    }

    public function create()
    {
        return view('main.create');
    }

    public function store()
    {
        return 'Страница создания';
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
