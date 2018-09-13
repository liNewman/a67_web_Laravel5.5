<?php

namespace App\Http\Controllers\Admin;

use App\Model\Permissions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class permissionsController extends Controller
{
    //

    protected $permissions;

    public function __construct()
    {
        parent::__construct();
        $this->permissions=new Permissions();
    }

    public function list($id=0){

        //dd($_SERVER);die();

        $this->permissions->menus();

       $assign['list']=$this->permissions->getPermissionsByFid($id);
       return view('admin.permissions.list',$assign);
    }


    public function create()
    {
        $assign['permissions']=$this->permissions->getPermissionsByFid();
        return view('admin.permissions.create',$assign);
    }

    public function store(Request $request){
        $params=$request->all();
        $params=$this->delToken($params);

        /*if (empty($params['name'])||empty($params['url'])){
            return redirect()->back()->with('msg','名称或url不能未空');
        }*/

        $permissions=new Permissions();

        foreach ($params as $key=>$item){
            $permissions->$key=$item;
        }

        $res=$permissions->save();

        if ($res){
            return redirect('/admin/permissions/list');
        }else{
            return redirect()->back()->with('msg','添加权限失败');
        }

    }








}
