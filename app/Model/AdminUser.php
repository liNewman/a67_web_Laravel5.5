<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{



    const
    STATUS_NORMAL=1,//正常
    STATUS_FAIL=2,//注销
    IS_ADMIN_F=1,
    IS_ADMIN_T=2,
    END=true;
    //
    public function getUserByName($username)
    {
       $info=self::select('id','username','password','is_super')
           ->where('username',$username)
           ->where('status',self::STATUS_NORMAL)
           ->where('is_admin',self::IS_ADMIN_T)
           ->first();
       return $info;

    }

    public function getUserList(){
       $list=self::orderBy('id','desc')
           ->paginate(2);

       return $list;
    }



}
