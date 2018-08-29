<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InputController extends Controller
{
    public function index(){
        return view('admin.use.input');
    }
}
