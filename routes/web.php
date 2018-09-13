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

//首页
Route::get('/', 'Admin\HomeController@index');

//后台管理
Route::group(['prefix'=>'admin'], function (){

    //点赞-------------------------------------------------------
    Route::get('yes', 'Admin\Yescontroller@index');//点赞列表
    Route::get('yesadd', 'Admin\Yescontroller@add');//点赞列表

    //Ueditor测试
    Route::get('tor', 'UeditorController@index');

    //首页
    Route::get('home', 'Admin\HomeController@index');

    //登录路由---------------------------------------------------
    Route::get('login', 'Admin\LoginController@index');
    Route::post('doLogin', 'Admin\LoginController@doLogin');

    //退出操作-------------------------------------------------
    Route::get('logout', 'Admin\LoginController@logout');

    //输入表单-表格页面
    Route::get('input', 'Admin\InputController@index');
    Route::get('table', 'Admin\TableController@index');

    //权限管理-页面-------------------------------------------------
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

    //用户管理
    Route::get('user/list', 'Admin\AdminUserController@list');//用户 展示
    Route::get('user/add', 'Admin\AdminUserController@add');//角色 添加
    Route::post('user/doadd', 'Admin\AdminUserController@addfunction');//角色 添加 操作
    Route::get('user/edit/{id}', 'Admin\AdminUserController@edit');//角色 修改
    Route::post('user/doEdit', 'Admin\AdminUserController@doEdit');//角色 修改 操作
    Route::get('user/delete/{id}', 'Admin\AdminUserController@delete');//角色 删除 操作

    //角色权限分配
    Route::get('permission/role/{id}', 'Admin\PermissionRoleController@index');
});

// 期中考试红包
Route::get('redmoney', 'Kaoshi\RedmoneyController@index');//发红包页面
Route::post('addmoney', 'Kaoshi\RedmoneyController@domoney');//执行发红包方法
Route::get('getmoney', 'Kaoshi\RedmoneyController@getmoney');//抢红包页面

//足球竞猜
Route::any('/study/guess/create', 'Study\GuessController@create');//添加竞猜
Route::any('/study/guess/store', 'Study\GuessController@doCreate');//执行竞猜
Route::any('/study/guess/doguess', 'Study\GuessController@doGuess');//竞猜人竞猜
Route::any('/study/guess/result', 'Study\GuessController@showResult');

//抽奖A
Route::any('/lucky', 'Study\LotteryController@index');
Route::any('/study/doLottery', 'Study\LotteryController@doLottery');
Route::any('/study/showlucky', 'Study\ShowluckyController@showLucky');

//登陆路由--laravel自带的
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
