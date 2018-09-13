<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SignController extends Controller
{
    //
    public function sign(){

        return view('admin.sign.sign');
    }



    public function doSign(Request $request)
    {


        $result=[
            'code'=>200,
            'msg'=>'签到成功',
            'data'=>[],
        ];




        $signTime=$request->input('sign_date',date('Y-m-d',time()));


        $userId=$request->input('user_id',0);

        if (!$userId){
            $result=[
                'code'=>500,
                'msg'=>'请先登陆后在签到',
            ];
            return json_encode($result);
        }

        $signData=DB::select('select * from sign limit 1');

        if (empty($signData)){

            $res=DB::insert('insert into sign values (null,?,?,?,?,?)',[1,1,1,$signTime,$userId]);
            if ($res){
                $result['data']=DB::select('select * from sign limit 1');
            }else{
                $result=[
                    'code'=>500,
                    'msg'=>'签到失败',
                ];
            }


        }else{
            $lastDate=$signData[0]->sign_date;
            $days=$this->diffDay($signTime,$lastDate);

            if ($days <=0){
                $result=[
                    'code'=>500,
                    'msg'=>'您今天已经签到过了,不能重复签到',
                ];

                return json_encode($result);
            }

            if ($days==1){
               $continueDays=$signData[0]->continue_num+1;
            }

            if ($days>1){
              $continueDays=1;
            }
            $score=$signData[0]->score+$continueDays;
            $totalNums=$signData[0]->total_num+1;

            $res=DB::update('update sign set total_num=?,score=?,continue_num=?,sign_date=? where id=?',
                [$totalNums,$score,$continueDays,$signTime,$signData[0]->id]);

            if ($res){
                $result['data']=DB::select('select * from sign limit 1');
            }else{
                $result=[
                    'code'=>500,
                    'msg'=>'签到失败',
                ];
            }



            }


        $result['data']=$signData;


        return json_encode($result);

    }

    public function diffDay($date1,$date2)
    {

        if ($date1<$date2){
            $tmp=$date1;

            $date1=$date2;
            $date2=$tmp;
        }

        return(strtotime($date1)-strtotime($date2))/3600/24;


    }




}
