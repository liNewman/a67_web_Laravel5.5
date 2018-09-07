@extends('layouts.base')

@section('content')
    <div class="pageheader">
        <h2><i class="fa fa-table"></i> 角   色 <span>Subtitle goes here...</span></h2>
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

            <div class="col-md-10">
                <div class="col-md-2 ">
                    <a class="btn btn-danger btn-block btn-lg btn" href="http://www.a67web.com/admin/role/add">----添加角色----</a>
                </div>
                <br><br><br>
    <div class="col-md-5">
        <div class="table-responsive">
            <table class="table table-hidaction table-hover table-primary mb10">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>角色名称 role_name 20</th>
                    <th>描    述 description 50</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($list))
                    @foreach($list as $key => $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->role_name}}</td>
                            <td>{{$role->description}}</td>
                            <td class="table-action">
                                <a href="/admin/role/edit/{{$role->id}}">编辑<i class="fa fa-pencil"></i></a>
                                <a href="/admin/role/delete/{{$role->id}}" class="delete-row">删除<i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div><!-- table-responsive -->
    </div><!-- col-md-6 -->

@endsection
