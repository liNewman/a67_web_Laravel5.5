<?php

namespace App\Http\Controllers\Admin;

use App\Model\Pinglun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PinglunController extends Controller
{
    //展示
    public function index(){
        $assign['list']=Pinglun::select()
            ->orderBy('id','desc')
            ->get();

        //dd($assign);
        return view('admin.pl.index',$assign);

    }

    /**
     * @desc 评论添加
     * @param Request $request
     * @return string
     */
    public function create(Request $request){
        $params=$request->all();
        unset($params['_token']);
        $model= new Pinglun();
        $model->insert($params);
        $res=[
            'code'=>'200',
            'msg'=>'添加成功'
        ];

        return json_encode($res);
    }

    /**
     * @desc 回复添加
     * @param Request $request
     * @return string
     */
    public function create1(Request $request){
        $params=$request->all();
        unset($params['_token']);
        $model= new Pinglun();
        $model->insert($params);
        $res=[
            'code'=>'200',
            'msg'=>'添加成功'
        ];

        return json_encode($res);
    }

    /**
     * @desc 删除
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */

//    public function
    public function delete($id){
        Pinglun::where('id',$id)->delete();
        Pinglun::where('fid',$id)->delete();
        return redirect('/pl/index');
    }
}
