<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NovelChapter extends Model
{
    //
    protected $table='novel_chapter';

    public function getChapterList()
    {
        $list=self::orderBy('id','desc')
            ->paginate(2);
       /* $list=self::select('novel_chapter.id','novel_chapter.title','novel.title','novel_chapter.created_at')
           ->leftJoin('novel','novel.id','=','novel_chapter.novel_id')
            ->orderBy('id','desc')
            ->paginate(2);*/


        return $list;

    }


}
