<?php

namespace App\Http\Controllers\Admin;

use App\Model\Author;
use App\Model\Novel;
use App\Model\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NovelController extends Controller
{
    //
    protected $novel;

    public function __construct()
    {
        parent::__construct();
        $this->novel=new Novel();
    }

    public function list()
    {
        $assign['type_list']=Type::get()->toArray();

        foreach ($assign['type_list'] as $key=>$value){
            $assign['types'][$value['id']]=$value['type_name'];
        }
        $assign['author_list']=Author::get()->toArray();

        foreach ($assign['author_list'] as $key=>$value){
            $assign['authors'][$value['id']]=$value['author_name'];
        }

        $assign['novels']=$this->novel->getNovelList();

        return view('admin.novel.list',$assign);

    }

    public function create()
    {
        $assign['type_list']=Type::get();
        $assign['author_list']=Author::get();

        return view('admin.novel.create',$assign);
    }

    public function store(Request $request)
    {
        $params=$request->all();

        $params=$this->delToken($params);

        $params['image_url']=$this->uploadFile($params['image_url']);

        $novel=new Novel();

        $res=$this->storeRecord($params,$novel);

        if ($res){
            return redirect('/admin/novel/list');
        }else{
            return redirect()->back()->with('msg','添加失败');
        }

    }


}
