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

    /**
     * @desc 无限极分类-后台首页菜单显示功能
     */
    public function menus()
    {
        //获取用户的权限信息
        /*$userInfo = json_decode($_SESSION['user_info'], true);
        $permissions = $this->getUserPermission($userInfo['id']);
        $permissionsIds = array_keys($permissions);

        //获取用户的权限节点，分非超管和超管
        $obj = self::select('id', 'fid', 'url')
            ->where('is_menu', 1);

        //非超管
        if($userInfo['is_super'] == 1) {
            $obj = $obj->whereIn('id', $permissionsIds);
        }

        $menus = $obj->orderBy('id', 'desc')
            ->orderBy('sort', 'asc')
            ->get()
            ->toArray();

        $menus = $this->getTreeByRecursive($menus);*/

        /*$menus = self::select('id', 'fid', 'name', 'url')
            ->where('is_menu', 1)
            ->orderby('id', 'desc')
            ->orderby('sort', 'asc')
            ->get()
            ->toArray();
        $menus = $this->getTreeByRecursive($menus);

        //菜单样式处理
        $currentUrl = $_SERVER['REDIRECT_URL'];//当前urld地址

        foreach ($menus as $key => $menu) {

            //自己分类循环
            if(isset($menu['son'])){
                $class = "nav-parent";
            }
        }*/
    }

    public function getUserPermission($userId)
    {
        //获取用户的角色id
        $role = UserRole::where('admin_user_id', $userId)->first();

        //根据脚色获取用户的权限id
        $permissionIds = UserRole::select('permission_id')
            ->where('role_id', $role->role_id)
            ->get()
            ->toArray();

        //获取用户权限信息
        $permissions = self::select('id', 'url')
            ->whereIn('id', $permissionIds)
            ->get()
            ->toArray();

        //格式化处理权限的id
        $tmpPermission = [];
        foreach ($permissions as $permission) {
            $tmpPermission[$permission['id']] = $permission['url'];
        }

        return $tmpPermission;
    }
}
