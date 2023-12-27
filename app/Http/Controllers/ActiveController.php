<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class ActiveController extends Controller
{
    public function index() {
        $matches = Tournament::all()->where('status', 'start');
        return view('layouts.personal.active', compact('matches'));
    }
}
