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












Route::get('student/index','StudentController@index');





Route::get('/study/sign','StudyController@Sign');
Route::post('/study/doSign','StudyController@doSign');
Route::get('/study/bonus','StudyController@Bonus');
Route::get('/study/send/bonus','StudyController@sendBonus');


//文章点赞
Route::get('/study/article/create','Study\ArticleClickController@create');
Route::post('/study/article/store','Study\ArticleClickController@store');
Route::get('/study/article/list','Study\ArticleClickController@list');
Route::post('/study/article/click','Study\ArticleClickController@clicks');
Route::get('/study/article/detail','Study\ArticleClickController@detail');

//文章点赞2
Route::get('/study/article2/create','Study\ArticleClick2Controller@create');
Route::post('/study/article2/store','Study\ArticleClick2Controller@store');
Route::get('/study/article2/list','Study\ArticleClick2Controller@list');
Route::post('/study/article2/click','Study\ArticleClick2Controller@clicks');
Route::get('/study/article2/detail','Study\ArticleClick2Controller@detail');




//A场考试评论功能
Route::group(['prefix'=>'pl'],function (){
    //列表展示
    Route::get('index','Admin\PinglunController@index');
    //添加
    Route::post('create','Admin\PinglunController@create');
    //回复
    Route::post('create1','Admin\PinglunController@create1');
    //删除
    Route::get('delete/{id}','Admin\PinglunController@delete');
});

//万能查询
Route::group(['prefix'=>'set'],function (){
   Route::get('index','Admin\SetController@index');


});




//管理后台的路由
Route::group(['prefix'=>'admin'],function(){


    //    足球竞猜
    Route::get("guess/index",'Admin\GuessController@index');    //展示列表
    Route::post("guess/doinsert",'Admin\GuessController@doinsert');  //添加列表
    Route::post("guess/indexrecord",'Admin\GuessController@indexrecord');   //添加方法
    Route::get("guess/result/{id?}",'Admin\GuessController@result');   //删除
    Route::post("guess/doresult",'Admin\GuessController@doresult');
    Route::get("guess/end/{id?}",'Admin\GuessController@end');




    //登陆的路由
    Route::get('login','Admin\LoginController@login');
    Route::post('doLogin','Admin\LoginController@doLogin');
    Route::get('logout','Admin\LoginController@logout');

    //后台首页的路由
    Route::get('home','Admin\HomeController@home');
    
    //列表的路由
    Route::get('list','Admin\ListController@list');
    //表单的路由
    Route::get('form','Admin\FormController@form');
    //签到的路由
    Route::get('sign','Admin\SignController@sign');
    Route::post('doSign','Admin\SignController@doSign');


    //权限管理
    Route::get('permissions/list/{id?}','Admin\permissionsController@list');

    //权限提交页面
    Route::get('permissions/create','Admin\permissionsController@create');


    Route::post('permissions/store','Admin\PermissionsController@Store');

    Route::get('user/list','Admin\AdminUserController@index');
    Route::get('user/create','Admin\AdminUserController@create');
    Route::post('user/store','Admin\AdminUserController@store');
    Route::get('user/edit/{id}','Admin\AdminUserController@edit');
    Route::post('user/doEdit','Admin\AdminUserController@doEdit');
    Route::get('user/delete/{id}','Admin\AdminUserController@delete');


    //角色管理路由
    Route::get('role/list','Admin\RoleController@list');
    Route::get('role/create','Admin\RoleController@create');
    Route::post('role/store','Admin\RoleController@store');
    Route::get('role/edit/{id}','Admin\RoleController@edit');
    Route::post('role/doEdit','Admin\RoleController@doEdit');
    Route::get('role/delete/{id}','Admin\RoleController@delete');


    Route::get('role/permission/{id}','Admin\RoleController@permission');
    Route::post('role/permission/store','Admin\RoleController@permissionSave');


    //小说管理
    Route::get('novel/create','Admin\NovelController@create');
    Route::get('novel/list','Admin\NovelController@list');
    Route::any('novel/store','Admin\NovelController@store');


    //抽奖
    //pc端抽奖页面
    Route::get('lottery/list','admin\LotteryController@list');
    //开始抽奖
    Route::get('lottery/doLottery','admin\LotteryController@doLottery');

    //小说章节管理
    Route::get('novelChapter/list','Admin\NovelChapterController@list');
    Route::get('novelChapter/create','Admin\NovelChapterController@create');
    Route::any('novelChapter/store','Admin\NovelChapterController@store');
    Route::get('novelChapter/delete','Admin\NovelChapterController@delete');

    //评论列表
    Route::get('comment/list','Admin\CommentController@list');
    Route::get('Comment/delete','Admin\CommentController@delete');

    //文本域
    Route::get('text/index','Admin\TextController@index');

    //日志
    Route::get('log/index','Admin\LogController@index');

    Route::post('log/addSave', 'Admin\LogController@addSave');

    Route::get('log/delete/{id}','Admin\LogController@delete');





});




