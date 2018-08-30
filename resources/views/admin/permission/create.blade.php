@extends('layouts.base')

@section('title', '添加权限')

@section('content')


    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 权限表单 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">你在这:</span>
            <ol class="breadcrumb">
                <li><a href="http://www.a67web.com/admin/home">首页</a></li>
                <li><a href="http://www.a67web.com/admin/permission/list">权限表单</a></li>
                <li class="active">添加权限</li>
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

                <h4 class="panel-title">添加权限</h4>
                <p>添加 <code>权限</code></p>
            </div>
            <div class="panel-body panel-body-nopadding">

                <form class="form-horizontal form-bordered" method="post" action="/admin/permission/store">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3 control-label">顶级分类</label>
                        <div class="col-sm-6">
                            <select class="col-sm-6 form-control" name="fid" >
                                <option class="col-sm-6 form-control" value="0">--顶级分类--</option>
                                @if(!empty($permissions))
                                    @foreach($permissions as $permission)
                                        <option value="{{$permission->id}}" class="form-control">{{$permission->name}}</option>
                                    @endforeach
                                    @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" >权限名称</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="输入权限名称"  name="name" id="disabledinput" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" >权限Url</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="输入权限Url" name="url" id="disabledinput" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">是否菜单</label>
                        <div class="col-sm-6">
                            <div class="radio"><label><input type="radio" value="1" name="is_menu"> 是 </label></div>
                            <div class="radio"><label><input type="radio" value="2" name="is_menu" checked=""> 否 </label></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">权限排序</label>
                        <div class="col-sm-9">
                            <input type="text" id="spinner" name="sort" />
                            <span class="help-block"> 输入权限排序.</span>
                        </div>
                    </div>



            </div><!-- panel-body -->

            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <button class="btn btn-primary btn-danger">Submit</button>&nbsp;
                        <button class="btn btn-default">Cancel</button>
                    </div>
                </div>
            </div><!-- panel-footer -->
            </form>
        </div><!-- panel -->



    </div><!-- contentpanel -->
@endsection