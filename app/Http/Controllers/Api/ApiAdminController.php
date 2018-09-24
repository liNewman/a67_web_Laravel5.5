<?php

namespace App\Http\Controllers\Api;

use App\Model\Admin;
use App\Model\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiAdminController
{
    //

    public function type(Request $request)
    {
        $admin=Admin::where('username',$request['username'])->get()->toArray();
        $admins=Admin::all();

        if (empty($admin)){
            return $result = [
                'code' => 4000,
                'msg'  => 'not found table'
            ];

        }else{
            return $result=[
                'code' => 2000,
                'msg'  => 'found success',
                'result'=>$admins
            ];
        }

    }




}
