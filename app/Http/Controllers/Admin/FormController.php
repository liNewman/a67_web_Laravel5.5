<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    //
    public function form(){
        return view('admin.form.form');
    }

}
