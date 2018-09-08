<?php

namespace App\Http\Controllers;

use App\Model\Permission;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpFoundation\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $permission = new Permission();

        view()->share('menus', $permission->menus());
        //数据共享
        //view()->share('$userInfo', $this->getUser());

        //用户是否登陆
      /* if(empty($this->getUser()))
        {

            return redirect('/admin/login')->send();
        }

        //获取用户的权限信息
        $userInfo = $this->getUser();
        $tmpPermissions = $permission->fgetUserPermission($userInfo['id']);

        //判断当前的url是否在权限节点 之内
        $currentUrl = $_SERVER['REDIRECT_URL'];
        if(!in_array($currentUrl, $tmpPermissions) && $userInfo['is_super'] == 1){
            return redirect('403')->send();
        }*/
    }

    public function getUser()
    {
       dd($_session);

       if(isset($session['user_Info']) && $session['user_Info'])
       {
           return json_decode($session['user_info'], true);
       }else{
           return [];
       }
    }

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



    /**
     * @desc 通过递归生成权限节点树
     * @param array $menus
     * @param int $fid
     * @return array
     */
    public function getTreeByRecursive(array $menus, $fid = 0){
        if(empty($menus)){
            return [];
        }

        static $list = [];//定义一个静态数组，用户递归调用时，训话存储数据

        //循环数据库查询的权限节点的数据
        foreach ($menus as $key => $menu) {
            if($menu['id'] == $fid){  //判断循环体的fid是否等于当前递归调用传递的$fid参数

                //判断$list 里面有没有fid这个key
                if(isset($list[$fid])){
                    $list[$fid]['son'][$menu['id']] = $menu;  //添加组装子级分类
                }else{
                    $list[$menu['id']] = $menu;
                }

                unset($menus[$key]);  //执行完以后unset 进度

                $this->getTreeByRecursive($menus, $menu['id']);//递归调用

            }
        }

        return $list;
    }

        public function uploadFile($files)
    {
       if(empty($files)){
            return '/images/photos/loggeduser.png';
        }

        $basePath = "uploads/";//文件上传的目录

        if(!file_exists($basePath)){
            mkdir($basePath, 755, true);
        }

        $filename = "/".date('YmdHis',time()).".".$files->extension();

        move_uploaded_file($files->path(),$basePath.$filename);

        return "/".$basePath.$filename;
        /*$folder = date('Ymd');
        //判断文件夹是否已存在
        if(!Storage::disk('public')->exists($folder)){
        Storage::makeDirectory($folder);
        }
        //判断文件是否有效
        if($file->isValid()) {
        $newFileName = md5(microtime()).'.'.$file->getClientOriginalExtension();
        Storage::disk('public')->put($folder.'/'.$newFileName, file_get_contents($file));

        return "/uploads/".$folder."/".$newFileName;*/

    }

}
