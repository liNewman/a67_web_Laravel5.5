<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdminUser;
use App\Model\Role;
use App\Model\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    //
    protected $adminUser;

    protected $roles;

    public function __construct()
    {
        parent::__construct();

        $this->adminUser=new AdminUser();

        $this->roles=new Role();
    }


    public function index(){
        $assign['users']=$this->adminUser->getUserList();
        return view('admin.user.index',$assign);
    }

    public function create(){
        //获取用户角色列表
        $assign['role_list']=$this->roles->get();
        return view('admin.user.create',$assign);
    }

    /***
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */

    public function store(Request $request){
        $params=$request->all();
        //$file=$_FILES['image_url'];
        $params=$this->delToken($params);


       $params['image_url']=$this->uploadFile($params['image_url']);

       $params['password']=md5($params['password']);

       $roleId=$params['role_id'];
       unset($params['role_id']);


       $users=new AdminUser();
       $res=$this->storeRecord($params,$users);

       $userRole=new UserRole();
       $userRoleData=[
           'admin_user_id'=>$users->id,
           'role_id'=>$roleId
       ];

       $res1=$this->storeRecord($userRoleData,$userRole);

       //$users=new AdminUser();
       //$res=$this->storeRecord($params,$users);


       if ($res&&$res1){
           return redirect('/admin/user/list');
       }else{
           return redirect()->back()->with('msg','添加用户失败');
       }
    }

    public function edit($id){
        $assign['role_list']=$this->roles->get();

        $assign['info']=$this->adminUser->where('id',$id)->first();

        $assign['role_id']=UserRole::where('admin_user_id',$id)->first();
       //dd($assign);
        return view('admin.user.edit',$assign);
    }

    public function doEdit(Request $request){
        $params=$request->all();
        $params=$this->delToken($params);

        if (isset($params['image_url'])){
            $params['image_url']=$this->uploadFile($params['image_url']);
        }

        $roleId=$params['role_id'];
        unset($params['role_id']);

        $users=AdminUser::find($params['id']);
        $res=$this->storeRecord($params,$users);

        UserRole::where('admin_user_id',$params['id'])->update(['role_id'=>$roleId]);

        if($res){
            return redirect('/admin/user/list');
        }else{
            return redirect()->back()->with('msg','修改用户失败');
        }

    }

    public function delete($id){
        UserRole::where('admin_user_id',$id)->delete();
        AdminUser::find($id)->delete();

        return redirect('/admin/user/list');


    }


}
