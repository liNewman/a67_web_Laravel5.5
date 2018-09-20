<?php

namespace App\Http\Controllers;

use App\Model\Reply;
use App\Model\Replyback;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->reply = new Reply();
	}
	
    public function create()
    {
		$assign['list'] = $this->reply->get();
        return view('study.reply.index', $assign);
    }
	
	public function doCreate(Request $request)
	{
		$params = $request->all();
		
		$result = [
			'code' => 200,
			'msg'  => "成功 了"
		];
		
		if(isset($params['_token']))
    		unset($params['_token']);
		
		$reply = new Reply();
			
		$res = $reply->insert($params);
		
		if(!$res){
			$result = [
				'code' => 500,
				'msg'  => "失败 了"
			];
		}
		
		
		//返回值
		return json_encode($result);
	}
	
	/**
     * @desc 执行删除的方法--无页面
     * @param $id
     */
    public function delete($id)
    {
        #执行 删除 方法
        Reply::where('id', $id)->delete();

        return redirect('/commentreply');
    }
	
	
	
	public function replyback(Request $request )
	{
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

}
