@extends('layouts.base')

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

            <div class="col-md-10">
                <h3 >权限展示</h3>
                <p class="mb20">权限列表</p>
                <div class="col-sm-2 ">
                    <a class="btn btn-primary btn-block btn-lg btn" href="http://www.a67web.com/admin/permission/create">添加权限</a>
                </div>
                <br><br><br>
                <div class="table-responsive">
                    <table class="table mb30">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>权限名称</th>
                            <th>URL</th>
                            <th>是否菜单</th>
                            <th>排序</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($list))
                            @foreach($list as $key => $permissin)

                                <tr>
                                    <td>{{$permissin->id}}</td>
                                    <td>{{$permissin->name}}</td>
                                    <td>{{$permissin->url}}</td>
                                    <td>
                                        @if($permissin->is_menu == 1)
                                            <a class="btn btn-primary btn-xs ">是</a>
                                        @else
                                            <a class="btn btn-primary btn-xs ">否</a>
                                        @endif
                                    </td>
                                    <td>{{$permissin->sort}}</td>
                                    <td>{{$permissin->created_at}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs " href="#">修改</a>
                                        <a class="btn btn-success btn-xs " href="#">子权限</a>
                                        <a class="btn btn-danger btn-xs " href="#">删除</a>
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div><!-- table-responsive -->
            </div><!-- col-md-6 -->

        </div>

</div>

@endsection