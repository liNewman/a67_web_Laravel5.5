@extends('layouts.base')

@section('title', '添加权限')

@section('content')


    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 用户表单 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">你在这:</span>
            <ol class="breadcrumb">
                <li><a href="http://www.a67web.com/admin/home">首页</a></li>
                <li><a href="http://www.a67web.com/admin/role/list">用户表单</a></li>
                <li class="active">添加用户</li>
            </ol>
        </div>
    </div>

    <div class="contentpanel">
        @if(session('msg'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <span>{{session('msg')}}</span>
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">&times;</a>
                    <a href="" class="minimize">&minus;</a>
                </div>

                <h4 class="panel-title">添加用户</h4>
                <p>添加 <code>用户</code></p>
            </div>
            <div class="panel-body panel-body-nopadding">

                <form class="form-horizontal form-bordered" enctype="multipart/form-data" method="post" action="/admin/user/doadd">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3 control-label" >用户名称</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="输入用户名称"  name="username" id="disabledinput" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" >用户密码</label>
                        <div class="col-sm-6">
                            <input type="password" placeholder="输入用户密码"  name="password" id="disabledinput" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" >用户头像</label>
                        <div class="col-sm-6">
                            <input type="file" name="image_url" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">是否超管</label>
                        <div class="col-sm-6">
                            <div class="radio"><label><input type="radio" value="1" name="is_super"> 是 </label></div>
                            <div class="radio"><label><input type="radio" value="2" name="is_super" checked=""> 否 </label></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">状态</label>
                        <div class="col-sm-6">
                            <div class="radio"><label><input type="radio" value="1" name="status"> 正常 </label></div>
                            <div class="radio"><label><input type="radio" value="2" name="status" checked=""> 注销 </label></div>
                        </div>
                    </div>
            </div><!-- panel-body -->

            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <button class="btn btn-primary btn-danger">添加用户 </button>&nbsp;
                    </div>
                </div>
            </div><!-- panel-footer -->
            </form>
        </div><!-- panel -->



    </div><!-- contentpanel -->
@endsection