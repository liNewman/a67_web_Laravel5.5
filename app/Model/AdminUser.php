<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    //定义常量
    const
        STATUS_NORMAL = 1, //正常
        STATUS_FAIL = 2,  //注销
        END = true;

    //获取name返回info值
    public function getUserByName($username)
    {
        $info = self::select('id', 'username', 'password')
            ->where('username', $username)
            ->where('status', self::STATUS_NORMAL)
            ->first()
            ->toArray();

            return $info;
    }
}
