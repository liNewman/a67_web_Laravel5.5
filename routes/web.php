<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/study/sign', 'Study\StudyController@sign');//签到页面
Route::get('/study/doSign', 'Study\StudyController@doSign');//执行签到

//登录路由
Route::group(['prefix'=>'admin'], function (){
    //登录路由
    Route::get('login', 'Admin\LoginController@index');
    Route::post('doLogin', 'Admin\LoginController@doLogin');

    //退出操作
    Route::get('logout', 'Admin\LoginController@logout');

    //后台管理路由
    Route::get('home', 'Admin\HomeController@index');
    Route::get('input', 'Admin\InputController@index');
    Route::get('table', 'Admin\TableController@index');

    //权限管理-页面
    Route::get('permission/list', 'Admin\PermissionController@list');
    //权限添加-页面
    Route::get('permission/create', 'Admin\PermissionController@create');
    //添加权限-方法
    Route::post('permission/store', 'Admin\PermissionController@store');

    //角色管理
    Route::get('role/list', 'Admin\RoleController@index');//角色 展示
    Route::get('role/add', 'Admin\RoleController@add');//角色 添加
    Route::post('role/doadd', 'Admin\RoleController@addfunction');//角色 添加 操作
    Route::get('role/edit/{id}', 'Admin\RoleController@edit');//角色 修改
    Route::post('role/doEdit', 'Admin\RoleController@doEdit');//角色 修改 操作
    Route::get('role/delete/{id}', 'Admin\RoleController@delete');//角色 删除 操作

});