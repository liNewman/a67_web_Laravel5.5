<?php

namespace App\Http\Controllers\Kaoshi;

use App\Model\Redmoney;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RedmoneyController extends Controller
{
    /**
     * @desc 展示红包页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        /**
         * 页面
         */
        return view('kaoshi.money');
    }

    /**
     * @desc 发红包
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function domoney()
    {
        $params = Request::all();

        $params = $this->delToken();

        $res = new Redmoney();

        $params = $this->save();

        return view('kaoshi.getmoney', $params, $res);
    }

    /**
     * @desc 抢红包
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getmoney(Request $request)
    {
        #抢红包

       /* $request = Request::all();

        if($request['money_loft'] == 0){
            $this->msg('红包已经被抢完了')->with()->all();
        }*/

        return view('kaoshi.getmoney', $request);
    }
}
