<?php

namespace App\Http\Controllers;

use App\Model\CjActivity;
use Illuminate\Http\Request;

class AddluckyController extends Controller
{
    /**
     * @desc 展示页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('study.lucky.add');
    }

    /**
     * @desc 添加页面
     * @param Request $request
     */
    public function doCreate(Request $request)
    {
        /**
         * 李鑫
         * 身份证号：230121199910091011
         * 班级:1801A
         *
         */
        $request = $request->post();

        $cjactivity = new CjActivity();

        $cjactivity = $request;

        dd($cjactivity->save());

    }

    /**
     * @desc 抽奖
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toLucky()
    {

        return view('study.lucky.index');
    }

    /**
     * @desc 抽奖方法
     */
    public function addLucky()
    {
        dd('d');
    }
}
