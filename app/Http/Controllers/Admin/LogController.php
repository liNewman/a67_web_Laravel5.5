<?php

namespace App\Http\Controllers\Admin;

use App\Model\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    /**
     * @desc 展示页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $assign['list']=Log::all();
        return view('admin.log.index',$assign);
    }

    /**
     * @desc 添加
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addSave(Request $request){

        $params=$request->all();
//        print_r($params);die;
        unset($params['_token']);
        $data = [
            "image_url"=>$params['content2'],
            "title"=>$params['content'],
            "content"=>$params['content1'],
        ];
        $log = new Log();
        $this->storeRecord($data,$log);
        return view('log.add',$params);
    }

    public function delete($id){
        Log::where('id',$id)->delete();
        return redirect('admin/log/index');
    }
}
