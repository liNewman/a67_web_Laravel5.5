<?php

namespace App\Http\Controllers\admin;

use App\Model\CjActivity;
use App\Model\CjRecord;
use App\Model\CjUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LotteryController extends Controller
{
    //
    protected $cj_activity;
    public function __construct()
    {
        parent::__construct();
    }

    public function list()
    {
        $assign['record_list'] = CjUser::select('phone','real_name')
            ->join('cj_record','cj_record.user_id','=','cj_user.id')
            ->orderBy('cj_record.id','desc')
            ->get()
            ->toArray();

        return view('lottery.list',$assign);
    }

    public function doLottery(Request $request)
    {
        //获取用户id
        $userId = $request->input('user_id',0);
        //获取活动id
        $actId = $request->input('act_id',0);
        //抽奖时间
        $currentTime = date('Y-m-d H:i:s',time());
        //活动开始时间
        $stime = strtotime(date('Y-m-d 10:00:00',time()));
        //活动结束时间
        $etime = strtotime(date('Y-m-d 11:00:00',time()));

        //获取活动配置信息
        $activity = CjActivity::first()->toArray();
        //判断活动时间
       /* if($currentTime < $activity['s_time'] || $currentTime > $activity['e_time']){
            $result = [
                'code'=>500,
                'msg'=>"不在活动时间内"
            ];

            return json_encode($result);
        }*/

//        if(time() < $stime || time() > $etime){
//
//            $result = [
//                'code'=>500,
//                'msg'=>"不在活动时间内"
//            ];
//
//            return json_encode($result);
//        }

        //获取用户的获奖记录
        $res = CjRecord::where('user_id',$userId)
            ->where('act_id',$actId)
            ->where('cj_date',date('Y-m-d',time()))
            ->count();


        if($res >= 3){
            $result = [
                'code'=>500,
                'msg'=>"今天抽奖次数用完"
            ];

            return json_encode($result);
        }


        $cjUser = CjUser::select('id','phone')
            ->get()
            ->toArray();

        $user = [];

        foreach ($cjUser as $value){
            $user[$value['id']] = $value['phone'];
        }

        $userId = array_rand($user);


        //添加获奖记录
        $data = [
            'user_id'=>$userId,
            'act_id'=>$actId,
            'cj_date'=>date('Y-m-d',time())
        ];

        CjRecord::insert($data);

        $result = [
            'code'=>200,
            'msg'=>'抽奖成功',
            'data'=>$user[$userId]
        ];

        return json_encode($result);
    }
}
