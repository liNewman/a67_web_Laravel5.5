<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuessController extends Controller
{
    public function addGuess()
    {
        return view('guess.addguess');
    }
}
