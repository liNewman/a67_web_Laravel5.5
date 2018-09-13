@extends('layouts.admin-app')
@section('title','首页')
@section('content')

    <div class="pageheader">
        <h2><i class="fa fa-table"></i> Tables <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li><a href="index.html">Bracket</a></li>
                <li class="active">Tables</li>
            </ol>
        </div>
    </div>

    <div class="contentpanel">

        <div class="row">

            <div class="col-md-12">
                <h5 class="subtitle mb5">Table With Actions</h5>
                <p class="mb20"><a class="btn-danger btn" href="/admin/permissions/list">返回</a><a class="btn-danger btn " href="/admin/permissions/create">添加权限</a></p>
                <div class="table-responsive">


            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-success mb30">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>显示名称</th>
                            <th>URL</th>
                            <th>是否菜单</th>
                            <th>排序</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($list))
                            @foreach($list as $key=>$permissions)
                                <tr>
                                    <td>{{$permissions->id}}</td>
                                    <td>{{$permissions->name}}</td>
                                    <td>{{$permissions->url}}</td>
                                    <td>{{$permissions->is_menu=='1'?"是":"否"}}</td>
                                    <td>{{$permissions->sort}}</td>
                                    <td>{{$permissions->created_at}}</td>
                                    <td>
                                        <a class="btn btn-xs btn-primary">修改</a>
                                        @if($permissions->fid==0)
                                            <a href="/admin/permissions/list/{{$permissions->id}}}" class="btn btn-xs btn-success">子权限</a>
                                            @endif
                                        <a class="btn btn-xs btn-danger">删除</a>
                                    </td>
                                </tr>
                            @endforeach

                            @endif
                        </tbody>
                    </table>
                </div><!-- table-responsive -->
            </div>

        </div><!-- row -->



    </div><!-- contentpanel -->

@endsection