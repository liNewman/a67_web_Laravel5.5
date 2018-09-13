@extends('layouts.admin-app')
@section('title','用户添加')
@section('content')
    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 用户添加 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li><a href="index.html">Bracket</a></li>
                <li><a href="general-forms.html">Forms</a></li>
                <li class="active">General Forms</li>
            </ol>
        </div>
    </div>

    <div class="contentpanel">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                @if(session('msg'))


                    <div class="panel-btns">
                        <a href="" clcvass="panel-close">&times;</a>
                        <a href="" class="minimize">&minus;</a>
                    </div>
                @endif
                <h4 class="panel-title">用户表单</h4>
            </div>
            <div class="panel-body panel-body-nopadding">

                <form class="form-horizontal form-bordered" action="/admin/user/store" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">用户角色</label>
                        <div class="col-sm-6">
                            <select name="role_id" class="form-control">
                                @if(!empty($role_list))
                                    @foreach($role_list as $role)
                                    <option value="{{$role->id}}">{{$role->role_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">用户名</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="输入用户名" value="{{old('username')}}"  class="form-control"  name="username"/>
                            <span class="help-block"></span>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label">密码</label>
                        <div class="col-sm-6">
                            <input type="password" placeholder="输入密码" value="{{old('password')}}" class="form-control" name="password" />
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">用户头像</label>
                        <div class="col-sm-6">
                           <input type="file" value="{{old('image_url')}}" class="form-control" name="image_url">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">是否超管</label>
                        <div class="col-sm-6">
                            <div class="radio"><label><input name="is_super" type="radio" value="1" checked="">否</label></div>
                            <div class="radio"><label><input name="is_super" type="radio" value="2" >是</label></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">用户状态</label>
                        <div class="col-sm-6">
                            <div class="radio"><label><input name="status" type="radio" value="1" checked="">正常</label></div>
                            <div class="radio"><label><input name="status" type="radio" value="2" >注销</label></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">是否管理员</label>
                        <div class="col-sm-6">
                            <div class="radio"><label><input name="is_admin" type="radio" value="1" checked="">否</label></div>
                            <div class="radio"><label><input name="is_admin" type="radio" value="2" >是</label></div>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <button class="btn btn-primary btn-danger">添加用户</button>&nbsp;
                                <button class="btn btn-default">取消</button>
                            </div>
                        </div>
                    </div><!-- panel-footer -->

                </form>

            </div><!-- panel-body -->



        </div><!-- panel -->



    </div><!-- contentpanel -->


@endsection