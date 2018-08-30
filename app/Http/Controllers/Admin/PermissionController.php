<?php

namespace App\Http\Controllers\Admin;

use App\Model\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    //?
    protected $permission;

    /**
     * @desc 构造函数
     * PermissionController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->permission = new Permission();
    }

    /**
     * @desc 权限列表页面展示
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list($id = 0)
    {
        $assign['list'] = $this->permission->getPermissionByFid();
        return view('admin.permission.list', $assign);
    }

    /**
     * @desc 添加权限节点的页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $assign['permissions'] = $this->permission->getPermissionByFid();
        return view('admin.permission.create',$assign);
    }

    /**
     * @desc 执行添加页面方法
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $params = $request->all();

        $params = $this->delToken($params);

        //数据校验
        if(empty($params['name']) || empty($params['url']))
        {
            return redirect()->back()->with('msg', '名称或者URL不能为空');
        }
        $permission = new Permission();

        $res = $this->doRecord($params, $permission);

        if($res)
        {
            return redirect('/admin/permission/list');
        }else{
            return redirect()->back()->with('msg', '添加权限失败');
        }
    }

}
