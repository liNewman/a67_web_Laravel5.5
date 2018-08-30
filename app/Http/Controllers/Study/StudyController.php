<?php

namespace App\Http\Controllers\Study;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudyController extends Controller
{
    public function sign()
    {
        #签到页面
        return view('study.sign');
    }

    public function dosign()
    {
        #执行签到
        dd('888');
    }
}
