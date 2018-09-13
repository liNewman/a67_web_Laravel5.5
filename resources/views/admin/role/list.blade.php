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
                <p class="mb20"><a class="btn-danger btn " href="/admin/role/create">添加角色</a></p>
                <div class="table-responsive">


                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-success mb30">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>角色名称</th>
                                    <th>描述</th>
                                    <th>修改时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($list))
                                    @foreach($list as $key=>$role)
                                        <tr>
                                            <td>{{$role->id}}</td>
                                            <td>{{$role->role_name}}</td>
                                            <td>{{$role->descs}}</td>
                                            <td>{{$role->created_at}}</td>
                                           <td>
                                               <a href="/admin/role/edit/{{$role->id}}" class="btn btn-xs btn-primary">修改</a>
                                               <a href="/admin/role/permission/{{$role->id}}" class="btn btn-xs btn-black">权限</a>
                                               <a href="/admin/role/delete/{{$role->id}}" class="btn btn-xs btn-danger">删除</a>
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