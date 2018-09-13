<?php

namespace App\Http\Controllers\Admin;

use App\Model\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //
    protected $comment;

    public function __construct()
    {
        parent::__construct();

        $this->comment=new Comment();

    }


    public function list()
    {
        $assign['comment_list']=$this->comment->getCommentList();


        return view('admin.comment.list',$assign);

    }

    public function delete(Request $request)
    {
        $id=$request->input('id',0);

        $comment=Comment::find($id)->delete();

        return redirect('admin/comment/list');

    }






}
