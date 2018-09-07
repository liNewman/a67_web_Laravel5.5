<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    protected $AdminUser;

    public function __construct()
    {
        parent::__construct();
        $this->AdminUser = new AdminUser();
    }

    /**
     * @desc  列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        $assign['list'] = $this->AdminUser->get();
        return view('admin.user.list');
    }



    /**
     * @desc 跳转 添加 页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('admin.user.add');
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

        //文件上传
        $params['image_url'] = $this->uploadFile($params['image_url']);

        //数据校验
        if(empty($params['adminuser_name']) || empty($params['description'])){
            return redirect()->back()->with('msg', '用户名称和用户描述不能为空');
        }
        $adminusers = new adminuser();

        $res = $this->doRecord($params, $adminusers);

        if($res){
            return redirect('/admin/admin-user/list');
        }else{
            return redirect()->back()->with('msg', '添加用户失败');
        }
    }

    /**
     * @desc 执行修改方法
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $assign['info'] = $this->adminuser->where('id', $id)->first();

        return view('admin.user.edit', $assign);
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
        if(empty($params['adminuser_name']) || empty($params['description'])){
            return redirect()->back()->with('msg', '用户信息不能为空');
        }
        $adminusers = adminuser::find($params['id']);

        $res = $this->doRecord($params, $adminusers);

        if($res){
            return redirect('/admin/adminuser/list');
        }else{
            return redirect()->back()->with('msg', '修改用户失败');
        }
    }

    /**
     * @desc 执行删除的方法--无页面
     * @param $id
     */
    public function delete($id)
    {
        #执行 删除 方法
        adminuser::where('id', $id)->delete();

        return redirect('/admin/user/list');
    }
}
