<?php

namespace App\Http\Controllers\Admin;

use App\Model\Permissions;
use App\Model\Role;
use App\Model\RolePermission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    //
    protected $role;

    public function __construct()
    {
        parent::__construct();

        $this->role=new Role();

    }

    public function list(){
        $assign['list']=$this->role->get();
      return view('admin.role.list',$assign);

    }
    public function create(){
       return view('admin.role.create');
    }


    public function store(Request $request){
       $params=$request->all();


       $params=$this->delToken($params);


       if (!empty($params['name'])){
           return redirect()->back()->with('msg','角色名称不能未空');
       }
       $role=new Role();

       $res=$this->storeRecord($params,$role);

       if ($res){
           return redirect('/admin/role/list');
       }else{
           return redirect()->back()->with('msg','添加失败');
       }

    }

    public function edit($id){

        $assign['info']=$this->role->where('id',$id)->first();

        return view('admin.role.edit',$assign);

    }

    public function doEdit(Request $request){

        $params=$request->all();

        $params=$this->delToken($params);

        if (empty($params['role_name'])){
            return redirect()->back()->with('msg','角色名称不能为空');
        }

        $role=Role::find($params['id']);
        $res=$this->storeRecord($params,$role);

        if ($res){
            return redirect('/admin/role/list');
        }else{
            return redirect()->back()->with('msg','修改失败');
        }

    }

    public function delete($id){

        Role::where('id',$id)->delete();

        return redirect('/admin/role/list');

    }

    public function permission($id){
        $permission=new Permissions();
        $assign['info']=Role::where('id',$id)->first();

        $assign['permissions']=$permission->getAllPermissions();

        $rolePermission=RolePermission::select('permission_id')->where('role_id',$id)->get()->toArray();
        //dd($assign['role_permission']);

        $assign['role_permission']=$this->formatPermissionId($rolePermission);

        //dd($assign);


        return view('admin.role.permission',$assign);

    }

    public function permissionSave(Request $request){
        $params=$request->all();

        $params=$this->delToken($params);
        $data=[];

        foreach ($params['permissions'] as $permission){
            $data[]=[
                'role_id'=>$params['role_id'],
                'permission_id'=>$permission
            ];
        }

        RolePermission::where('role_id',$params['role_id'])->delete();

        RolePermission::insert($data);

        return redirect('/admin/role/list');

    }

}
