<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    //定义常量
    const
        STATUS_NORMAL = 1, //正常
        STATUS_FAIL = 2,   //注销
        IS_ADMIN_T = 1,    //不是超管
        END = true;

    //获取name返回info值
    public function getUserByName($username)
    {
        $info = self::select('id', 'username', 'password', 'is_super')
            ->where('username', $username)
            ->where('status', self::STATUS_NORMAL)
            ->where('is_admin', self::IS_ADMIN_T)
            ->first();
            return $info;
    }

    public function getUserList()
    {
        $list = self::orderBy('id', 'desc')
        ->paginate(2);

        return $list;
    }
}
