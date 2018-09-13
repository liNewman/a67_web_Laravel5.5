<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        //dd($this->getUser());
        parent::__construct();
    }


    //
    public function home(){

        return view('admin.home.home');

    }
}
