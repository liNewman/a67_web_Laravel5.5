<?php

namespace App\Http\Controllers\Study;

use App\Model\Guess;
use App\Model\GuessRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuessController extends Controller
{
    //足球竞猜
    public function create(Request $request){
    	//$assign['pwd'] = $request->input('pwd', '');
    	$assign['list'] = Guess::get();
    	return view('study.guess.create', $assign);
    }

    public function doCreate(Request $request){
    	$params = $request->all();

    	$result = [
    		'code' => 200,
    		'msg'  => '添加球队成功',
    	];

    	if(isset($params['_token']))
    		unset($params['_token']);

    	$guess = new Guess();

    	foreach($params as $key => $item){
    		$guess->$key = $item;
    	}

    	$res = $guess->save();

    	if(!$res){
    		$result = [
    			'code' => 500,
    			'msg'  => "添加球队失败"
    		];
    	}

    	return json_encode($result);
    }


    /**
     * @desc 执行竞猜
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function doGuess(Request $request)
    {
        $id = $request->input('id',0);
        $type = $request->input('type',1);

        $assign['info'] = Guess::where('id', $id)->first();

        $assign['results'] = $this->getResults();
        $assign['type'] = $type;

        return view('study.guess.doGuess',$assign);
    }

    /**
     * @desc 竞猜记录
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function guessRecord(Request $request)
    {
        $params = $request->input();

        $params = $this->delToken($params);
        //执行竞猜
        if($params['type'] == 1){

            GuessRecord::insert(['user_id'=>$params['user_id'],'g_id'=>$params['g_id'], 'g_result'=>$params['g_result']]);

        }else{

            Guess::where('id', $params['g_id'])->update(['result'=>$params['g_result']]);
        }

        return redirect('study.guess.look');
    }

    /**
     * @desc 展示竞猜
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResult(Request $request)
    {
        $id = $request->input('id',0);
        $userId = $request->input('user_id',1);

        $assign['info'] = Guess::where('id', $id)->first();

        $assign['guess_record'] = GuessRecord::where('g_id', $id)
            ->where('user_id', $userId)
            ->first();

        $assign['results'] = $this->getResults();

        return view('study.guess.showResult',$assign);
    }

    /**
     * @desc 获取比赛结果
     * @return array
     */
    public function getResults()
    {
        return [
            1 => "胜",
            2 => "负",
            3 => "平",
        ];
    }
}