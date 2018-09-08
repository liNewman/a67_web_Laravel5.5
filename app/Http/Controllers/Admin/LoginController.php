<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    protected $AdminUser;

    public function __construct()
    {
        $this->AdminUser = new AdminUser();
    }

    public function index(){
        return view('admin.login.login');
    }

    public function doLogin(Request $request){
        $username = $request->input('username', '');
        $password = $request->input('password', '');

        $userInfo = $this->AdminUser->getUserByName($username);

        //验证用户是否为空
        if(empty($userInfo)) {
            return redirect('/admin/login')->with('msg', '用户不存在');
        }else{
            $postPassword = md5($password);
            $userInfoPassword = json_encode($userInfo->password);
            //验证密码
            if($userInfo['password'] != $postPassword){
                return redirect('/admin/login')->with('msg', '密码错误');
            }

            $userData = [
                'username' => $userInfo['username'],
                'id'       => $userInfo['id'],
            ];

            //把登录信息存入session
            
            if(session()->put('user_info', json_encode($userData))) {
                return redirect('/admin/home');
            }else{
                return redirect('/admin/login')->with('msg', '登陆失败');
            }
            
        }
        // return view('admin.home.home');
    }
}
