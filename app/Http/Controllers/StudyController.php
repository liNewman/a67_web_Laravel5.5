<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/4
 * Time: 20:08
 */

namespace App\Http\Controllers;


use yii\web\Request;

class StudyController extends Controller
{

    public function bonus(){
        $assign=[];
        return view('study.bonus',$assign);

    }


    public function sendBonus(Request $request){

        $params=$request->all();

        $result=[
           'code'=>200,
           'msg'=>'发送红包成功',
           'data'=>$params,
        ];

        return json_encode($result);


    }


}