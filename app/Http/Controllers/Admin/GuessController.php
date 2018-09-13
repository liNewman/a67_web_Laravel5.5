<?php

namespace App\Http\Controllers\admin;

use App\Model\Guess;
use App\Model\record;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuessController extends Controller
{
    //
    public $Guess;
    public $record;

    public function __construct()
    {
        parent::__construct();

        $this->Guess = new Guess();
        $this->record = new record();
    }
//页面
    public function index(Request $request){
        $assign['pwd']=$request->input("pwd","");
        $assign['re']=$this->Guess->get();
//        print_r($assign['re']);die();
        return view("admin/guess/index",$assign);
    }

//添加竞猜
    public function doinsert(Request $request){
//        dd(12);
        $params = $request->all();

            unset($params['_token']);

//        print_r($params);die;
        $in = $this->storeRecord($params,$this->Guess);
//        dd($in);
        return redirect("/admin/guess/index");
    }

//定义比赛结束结果
public function guessResult(){
        return [
            1=>"胜",
            2=>"平",
            3=>"负"
        ];
}
//竞猜结束
    public function result(Request $request,$id){
//    dd(11);
        $assign['pwd']=$request->input();
        $result=$this->Guess->where("id",$id)->first()->toArray();
        $assign['guess']=$this->guessResult();
        return view("/admin/guess/indexrecord",["result"=>$result],$assign);
    }
    public function end( Request $request,$id){
        $all=$request->all();
        if(isset($all['pwd'])){
            unset($all['pwd']);
        }
//                print_r($all);die;
        $result=$this->Guess->where("id",$id)->first()->toArray();
        $endResult=record::where("g_id",$id)
            ->get()
            ->toArray()[0];
        $assign['guess']=$this->guessResult();
        if($result['result']==$endResult['g_result']){
            $assign['msg']=[
                1=>"恭喜您猜对了"
            ];
        }else{
            $assign['msg']=[
                1=>"恭喜您猜错了"
            ];
        }
        return view("admin/guess/indexrecord",["result"=>$result,'end'=>$endResult],$assign);
    }
    //查看竞猜结果：1 添加竞猜结果：2
    public function doresult(Request $request){
        $all=$request->all();
        if(isset($all['_token'])){
            unset($all['_token']);
        }
//        print_r($all);die;
        //用户
        if($all['pwd']==1){
            record::insert(["user_id"=>$all['user_id'],"g_id"=>$all['g_id'],"g_result"=>$all['g_result']]);
        }else{
            //管理员修改
            Guess::where("id",$all['g_id'])->update(["result"=>$all['g_result']]);
        }
        return redirect("/admin/guess/index");
    }
}
