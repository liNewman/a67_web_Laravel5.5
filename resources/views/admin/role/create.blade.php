@extends('layouts.admin-app')
@section('title','添加角色')
@section('content')
    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 添加角色 <span>Subtitle goes here...</span></h2>
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
                <h4 class="panel-title">角色表单</h4>
            </div>
            <div class="panel-body panel-body-nopadding">

                <form class="form-horizontal form-bordered" action="/admin/role/store" method="post">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">角色名称</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="输入角色名称" value="{{old('role_name')}}"  class="form-control"  name="role_name"/>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">角色描述</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="输入角色描述" value="{{old('descs')}}" class="form-control" name="descs" />
                            <span class="help-block"></span>
                        </div>
                    </div>



                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <button class="btn btn-primary btn-danger">添加角色</button>&nbsp;
                                <button class="btn btn-default">取消</button>
                            </div>
                        </div>
                    </div><!-- panel-footer -->

                </form>

            </div><!-- panel-body -->



        </div><!-- panel -->



    </div><!-- contentpanel -->


@endsection