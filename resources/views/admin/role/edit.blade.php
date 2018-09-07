@extends('layouts.base')

@section('title', '添加权限')

@section('content')


    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 角色表单 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">你在这:</span>
            <ol class="breadcrumb">
                <li><a href="http://www.a67web.com/admin/home">首页</a></li>
                <li><a href="http://www.a67web.com/admin/role/list">角色表单</a></li>
                <li class="active">添加角色</li>
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

                <h4 class="panel-title">修改角色</h4>
                <p>修改<code>角色</code></p>
            </div>
            <div class="panel-body panel-body-nopadding">

                <form class="form-horizontal form-bordered" method="post" action="/admin/role/doEdit">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$info->id}}">
                    <div class="form-group">
                        <label class="col-sm-3 control-label"  >角色名称</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="输入角色名称"  name="role_name" value="{{$info->role_name}}" id="disabledinput" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" >角色描述</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="输入角色描述"  name="description" value="{{$info->description}}" id="disabledinput" class="form-control" />
                        </div>
                    </div>




            </div><!-- panel-body -->

            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <button class="btn btn-primary btn-danger">添加角色 </button>&nbsp;
                        <button class="btn btn-default">Cancel</button>
                    </div>
                </div>
            </div><!-- panel-footer -->
            </form>
        </div><!-- panel -->



    </div><!-- contentpanel -->
@endsection