<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    //
    protected $table="novel";


    public function getNovelList()
    {
        $list=self::paginate(5);

        return $list;

    }

}
