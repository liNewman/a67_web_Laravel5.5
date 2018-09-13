<?php

namespace App\Http\Controllers\Admin;

use App\Model\NovelChapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NovelChapterController extends Controller
{
    //
    protected $novelChapter;

    public function __construct()
    {
        parent::__construct();

        $this->novelChapter=new NovelChapter();
    }


    public function list()
    {
        $assign['chapters']=$this->novelChapter->getChapterList();
        return view('admin.novelChapter.list',$assign);

    }

    public function create(Request $request)
    {
        $novelId=$request->input('novel_id',0);

        $assign['novel_id']=$novelId;

        return view('admin.novelChapter.create',$assign);
    }

    public function store(Request $request)
    {
        $params=$request->all();

        $params=$this->delToken($params);

        $novelChapter=new NovelChapter();

        $res=$this->storeRecord($params,$novelChapter);

        if ($res){
            return redirect('/admin/novelChapter/list');
        }else{
            return redirect()->back()->with('mag','章节添加失败');
        }

    }


    public function destory(Request $request)
    {
        $id=$request->input('id',0);

        $res=NovelChapter::where('id',$id)->delete();

        return redirect('/admin/novelChapter/list');
    }


}
