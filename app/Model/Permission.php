<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //table name
    protected $table = "permissions";

    public function getPermissionByFid($id = 0)
    {

        $list = self::where('fid', $id)
            ->orderby('id', 'desc')
            ->get();
        return $list;
    }
}
