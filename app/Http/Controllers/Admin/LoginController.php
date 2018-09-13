<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    protected $adminUser;
    public function __construct()
    {
        $this->adminUser=new AdminUser();
    }


    public function login(){

        if (!empty($this->getUser())){
            return redirect('/admin/home');
        }

        $assign['login']="后台管理系统-登陆";
       return view('admin.login.login');
    }

    public function doLogin(Request $request){
        $username=$request->input('username','');
        $password=$request->input('password','');

        $userInfo=$this->adminUser->getUserByName($username);

        //dd($userInfo);

        if (empty($userInfo)){
           return redirect('/admin/login')->with('msg','用户不存在');
        }else{

            $postPassword=md5($password);

            if ($userInfo->password!=$postPassword){
                return redirect('/admin/login')->with('msg','密码错误');
            }

            $userData=[
                'username'=>$userInfo->username,
                'id'=>$userInfo->id,
            ];


            //session()->put('user_info',json_encode($userData));
            $_SESSION['user_info']=json_encode($userData);
            //session()->put('user_info',json_encode($userData));

            return redirect('/admin/home');

        }


    }

    public function logout(){
        if(isset($_SESSION['user_info'])){
            unset($_SESSION['user_info']);
        }
        return redirect('admin/login');
    }



}
