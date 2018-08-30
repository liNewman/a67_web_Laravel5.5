<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
       /* //数据共享
        view()->share('$userInfo', $this->getUser());

        if(empty($this->getUser()))
        {
            return redirect('/admin/login')->send();
        }*/
    }

    /*public function getUser()
    {
        $session = $_SESSION;

        if(isset($session['user_Info']) && $session['user_Info'])
        {
            return json_decode($session['user_info'], true);
        }else{
            return [];
        }
    }*/

    /**
     * @desc 销毁csrf对象
     * @param array $params
     * @return array
     */
    public function delToken(array $params)
    {
        if(empty($params))
        {
            return [];
        }

        if(isset($params['_token']))
        {
            unset($params['_token']);
        }

        return $params;
    }

    /**
     * @desc 执行添加和修改的操作
     * @param array $params
     * @param $object
     * @return bool
     */
    public function doRecord(array $params, $object)
    {
        if(empty($params)){
            return false;
        }

        foreach($params as $key => $item){
            $object->$key = $item;
        }

        return $object->save();
    }
}
