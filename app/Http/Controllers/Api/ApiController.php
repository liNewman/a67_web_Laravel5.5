<?php

namespace App\Http\Controllers\Api;

use App\Model\Novel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController
{

    public function getCategory(Request $request)
    {

        $novel = Novel::where('score', $request['score'])->get()->toArray();
        $novels=Novel::all();

        if (empty($novel)){
          return $result = [
              'code' => 4000,
              'msg'  => 'not found table'
          ];

        }else{
            return $result=[
                'code' => 2000,
                'msg'  => 'found success',
                'result'=>$novels
            ];
        }

    }






}
