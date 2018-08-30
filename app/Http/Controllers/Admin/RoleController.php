<?php

namespace App\Http\Controllers\Admin;

use App\Model\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    //
    protected $role;

    public function __construct()
    {
        parent::__construct();
        $this->role = new Role();
    }
    /**
     * @desc 查看角色 页面
     */
    public function index()
    {
        $assign['list'] = $this->role->get();
        return view('admin.role.index', $assign);
    }

    /**
     * @desc 跳转 添加 页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('admin.role.add');
    }

    /**
     * @desc 添加方法
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addfunction(Request $request)
    {
        //接收传过来的所有 数据
        $params = $request->all();

        //销毁csrf对象
        $params = $this->delToken($params);

        //数据校验
        if(empty($params['role_name']) || empty($params['description'])){
            return redirect()->back()->with('msg', '角色名称和角色描述不能为空');
        }
        $roles = new Role();

        $res = $this->doRecord($params, $roles);

        if($res){
            return redirect('/admin/role/list');
        }else{
            return redirect()->back()->with('msg', '添加角色失败');
        }
    }

    /**
     * @desc 执行修改方法
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $assign['info'] = $this->role->where('id', $id)->first();

        return view('admin.role.edit', $assign);
    }

    /**
     * @desc 执行修改的方法
     * @param Request $request
     */
    public function doEdit(Request $request)
    {
        #执行 修改 方法
        //接收传过来的所有 数据
        $params = $request->all();

        //销毁csrf对象
        $params = $this->delToken($params);

        //数据校验
        if(empty($params['role_name']) || empty($params['description'])){
            return redirect()->back()->with('msg', '角色名称和角色描述不能为空');
        }
        $roles = Role::find($params['id']);

        $res = $this->doRecord($params, $roles);

        if($res){
            return redirect('/admin/role/list');
        }else{
            return redirect()->back()->with('msg', '修改角色失败');
        }
    }

    /**
     * @desc 执行删除的方法--无页面
     * @param $id
     */
    public function delete($id)
    {
        #执行 删除 方法
        Role::where('id', $id)->delete();

        return redirect('/admin/role/list');
    }
}
