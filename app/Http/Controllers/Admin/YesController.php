<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YesController extends Controller
{
    public function index(){
    	return view('yes.list');
    }

  
    /**
     * @desc 跳转 添加 页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('yes.add');
    }

    /**
     * @desc 添加方法
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addfunction(Request $request)
    {
        //接收传过来的所有 数据
        $params = $request->all();

        //销毁csrf对象
        $params = $this->delToken($params);

        $roles = new Yes();

        $res = $this->doRecord($params, $yes);

        if($res){
            return redirect('/admin/yes/list');
        }else{
            return redirect()->back()->with('msg', '添加失败');
        }
    }
}
