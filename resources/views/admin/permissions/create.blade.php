@extends('layouts.admin-app')
@section('title','首页')
@section('content')
    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 表单 <span>Subtitle goes here...</span></h2>
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
                <h4 class="panel-title">权限表单</h4>
            </div>
            <div class="panel-body panel-body-nopadding">

                <form class="form-horizontal form-bordered" action="/admin/permissions/store" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label">父级分类</label>
                        <div class="col-sm-6">
                            <select name="fid" class="form-control">
                             <option value="0">--顶级分类--</option>
                                @if(!empty($permissions))
                                    @foreach($permissions as $permission)
                                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                                    @endforeach
                                @endif


                                  {{-- <option  value="0">顶级分类</option>
                                    @foreach($permissions as $v)
                                        <option value="{{$v->id}}">{{$v->name}}</option>
                                    @endforeach--}}

                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">权限名称</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="输入权限名称" value="{{old('name')}}"  class="form-control"  name="name"/>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">权限url</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="输入权限url" value="{{old('url')}}" class="form-control" name="url" />
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">是否菜单</label>
                        <div class="col-sm-6">
                           <div class="radio"><label><input name="is_menu" type="radio" value="1" >是</label></div>
                            <div class="radio"><label><input type="radio" name="is_menu" value="2" checked="">否</label></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">排序</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="输入权限排序" value="{{old('sort')}}"  name="sort" class="form-control tooltips" />
                        </div>
                    </div>

                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <button class="btn btn-primary btn-danger">添加权限</button>&nbsp;
                                <button class="btn btn-default">取消</button>
                            </div>
                        </div>
                    </div><!-- panel-footer -->

                </form>

            </div><!-- panel-body -->



        </div><!-- panel -->



    </div><!-- contentpanel -->


@endsection