<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    //
    public function list(){
        return view('admin.list.list');
    }


}
