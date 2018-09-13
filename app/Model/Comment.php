<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table="comment";
    public function getCommentList()
    {
        $comment=Comment::select('comment.id as cid','username','image_url','title','comment_desc','comment.created_at')
            ->leftJoin('admin_users','comment.user_id','=','admin_users.id')
            ->orderBy('cid','desc')
            ->paginate(2);

        return $comment;
    }


}
