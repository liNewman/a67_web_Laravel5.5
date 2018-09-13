<?php

namespace App\Http\Controllers\Study;

use App\Model\CjActivity;
use App\Model\CjRecord;
use App\Model\CjUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LotteryController extends Controller
{
	

	//抽奖页面
    public function index(){
        $assign['record_list'] = CjUser::select('phone','real_name')
            ->rightJoin('cj_record','cj_record.user_id','=','cj_user.id')
            ->orderBy('cj_record.id','desc')
            ->get()
            ->toArray();

        return view('study.lottery.index',$assign);
    }

    //执行抽奖操作
    public function doLottery(Request $request){
        $userId = $request->input('user_id', 0);
    //    $actId = $request->input('act_id',4);//huodongid

        $currentTime = date('Y-m-d 10:00:00', time());

        $stime = strtotime(date('Y-m-d 10:00:00', time()));

        $etime = strtotime(date('Y-m-d 12:00:00', time()));

        //获取活动的配置信息
        $activity = CjActivity::first()->toArray();

        //判断活动的时间
//       if($currentTime < $activity['s_time'] || $currentTime > $activity['s_time']){
//            $result = [
//                'code' => 500,
//                'msg'  =>'不在活动时间内'
//            ];
//
//            return json_encode($result);
//        }

        //获取用户的获奖记录
        $res = CjRecord::where('user_id', $userId)
        ->where('cj_date', date('Y-m-d', time()))
        ->count();

        if($res >= 3){
            $result = [
                'code' => 500,
                'msg'  => '今天已经抽奖完毕'
            ];

            return json_encode($result);
        }

        //查询用户列表
        $cjUser = CjUser::select('id', 'phone')
        ->get()
        ->toArray();

        $user = [];

        //格式化用户的数据
        foreach ($cjUser as $value){
            $user[$value['id']] = $value['phone'];
        }

        //随机获取用户的id 
        $userId = array_rand($user);

        //获取用户的获奖记录
        $res = CjRecord::where('user_id', $userId)
        ->where('cj_date', date('Y-m-d', time()))
        ->count();

        if($res > 3){
            $result = [
                'code' => 500,
                'msg'  => "今天已经抽奖完毕"
            ];
        }

        foreach($cjUser as $value){
            $user[$value['id']] = $value['phone'];
        }

        //添加获奖记录
        $data = [
            'user_id' => $userId,
         /*   'act_id'  => $actId,//活动ID*/
            'cj_date' => date('Y-m-d', time())
        ];

        $result = CjRecord::insert($data);

        $result = [
            'code' => 200,
            'msg'  => "抽奖成功",
            'data' => $user[$userId]
        ];

        return json_encode($result);
    }


}
