@extends('layouts.base')

@section('content')
    <div class="pageheader">
        <h2><i class="fa fa-table"></i>用户<span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">您在这</span>
            <ol class="breadcrumb">
                <li><a href="http://www.a67web.com/admin/rbac">RBAC管理</a></li>
                <li class="active">用户管理</li>
            </ol>
        </div>
    </div>

    <div class="contentpanel">

        <div class="row">

            <div class="col-md-10">
                <div class="col-md-2 ">
                    <a class="btn btn-danger btn-block btn-xs btn" href="http://www.a67web.com/admin/user/add">添加用户</a>
                </div>
                <br><br><br>
                <div class="col-md-5">
                    <div class="table-responsive">
                        <table class="table table-hidaction table-hover table-primary mb10">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>用户名  username</th>
                                <th>密码    password</th>
                                <th>图片    image_url</th>
                                <th>是否超管is_super</th>
                                <th>状态    status  </th>
                                <th>                </th>
                                <th>                </th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--@if(!empty($list))--}}
                                {{--@foreach($list as $key => $role)--}}
                                    <tr>
                                        <td>ID      ID</td>
                                        <td>用户名  username</td>
                                        <td>密码    password</td>
                                        <td>图片    image_url</td>
                                        <td>是否超管is_super</td>
                                        <td>状态    status  </td>
                                        <td class="table-action">
                                            <a href="{{--/admin/role/edit/{{$role->id}}--}}">编辑<i class="fa fa-pencil"></i></a>
                                            <a href="{{--/admin/role/delete/{{$role->id}}--}}" class="delete-row">删除<i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                {{--@endforeach--}}
                            {{--@endif--}}
                            </tbody>
                        </table>

                    </div><!-- table-responsive -->
                </div><!-- col-md-6 -->

@endsection
