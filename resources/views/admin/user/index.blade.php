@extends('layouts.admin-app')
@section('title','用户列表')
@section('content')

    <div class="pageheader">
        <h2><i class="fa fa-table"></i> 用户列表 <span>Subtitle goes here...</span></h2>
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
                <p class="mb20"><a class="btn-danger btn " href="/admin/user/create">添加用户</a></p>
                <div class="table-responsive">


                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-success mb30">
                                <thead>
                                <tr>
                                    <th>头像</th>
                                    <th>ID</th>
                                    <th>用户名</th>
                                    <th>是否超管</th>
                                    <th>状态</th>
                                    <th>是否管理员</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($users))
                                    @foreach($users as $key=>$user)
                                        <tr>
                                            <td><img src="{{$user->image_url}}" style="width: 40px"></td>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->is_super=='1'?"否":"是"}}</td>
                                            <td>@if($user->status==\App\Model\AdminUser::STATUS_NORMAL)<button class="btn btn-xs btn-danger">正常</button>@else<button class="btn btn-xs btn-black">注销</button></td>@endif
                                            <td>{{$user->is_admin=='1'?"否":"是"}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>
                                                <a href="/admin/user/edit/{{$user->id}}" class="btn btn-xs btn-primary">修改</a>
                                                <a href="/admin/user/delete/{{$user->id}}" class="btn btn-xs btn-danger">删除</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                @endif
                                </tbody>
                            </table>
                        </div><!-- table-responsive -->
                        {{$users->links()}}
                    </div>

                </div><!-- row -->



            </div><!-- contentpanel -->

@endsection