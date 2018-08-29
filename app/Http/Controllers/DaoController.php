<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Model\Dao;
use Illuminate\Http\Request;

class DaoController extends Controller
{

    public function index(){
        return view('test.dao');
    }
}
