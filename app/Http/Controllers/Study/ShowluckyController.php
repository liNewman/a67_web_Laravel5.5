<?php

namespace App\Http\Controllers\Study;

use App\Model\Showlucky;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowluckyController extends Controller
{
    public function showLucky()
    {
    	$assign['list'] = Showlucky::get();
    	return view('study.lottery.showlucky');
    }
}
