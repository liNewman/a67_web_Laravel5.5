<?php

namespace App\Http\Controllers\Study;

use App\Study\Article;
use App\Study\ClickRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class ArticleClickController extends Controller
{
    //
    public function __construct()
    {
        parent::__construct();
    }

    public function create()
    {
        return view('study.article.create');

    }

    public function store(Request $request)
    {
        $params=$request->all();
        $params=$this->delToken($params);

        $res=Article::insert($params);

        if ($res){
            return redirect('/study/article/list');
        }
        return redirect('/study/article/create');

    }


    public function list()
    {
        $assign['article_list']=Article::get();
        return view('study.article.list',$assign);

    }

    public function clicks(Request $request)
    {
        $result=[
            'code'=>200,
            'msg'=>'点赞成功'
        ];

        $params=$request->all();

        if (!isset($params['user_id'])||$params['user_id']==''){
            $result=[
                'code'=>500,
                'msg'=>'用户未登陆'
            ];
            return json_encode($result);
        }

        $clickRecord=ClickRecord::where('user_id',$params['user_id'])
            ->where('a_id',$params['id'])
            ->get()
            ->toArray();

        if (!empty($clickRecord)){
            $result=[
                'code'=>500,
                'msg'=>'您已经点赞过了'
            ];

            return json_encode($result);
        }else{
            ClickRecord::insert(['a_id'=>$params['id'],'user_id'=>$params['user_id']]);

            DB::update('update article set hits=hits+1 where id=?',[$params['id']]);
        }

        return json_encode($result);
    }

    public function detail($id)
    {
        return view('study.article.detail');

    }


}
