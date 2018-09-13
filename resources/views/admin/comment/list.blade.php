@extends('layouts.admin-app')
@section('title','小说表单')
@section('content')

    <div class="pageheader">
        <h2><i class="fa fa-table"></i> 小说表单 <span>Subtitle goes here...</span></h2>
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

                <div class="table-responsive">


                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-success mb30">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>评论者</th>
                                    <th>评论者头像</th>
                                    <th>标题</th>
                                    <th>内容</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($comment_list))
                                    @foreach($comment_list as $key=>$comment)
                                        <tr>
                                            <td>{{$comment->cid}}</td>
                                            <td>{{$comment->username}}</td>
                                            <td><img src="@if(empty($comment->image_url)) /image/photos/loggeduser.png @else{{$comment->image_url}} @endif" style="width: 40px"></td>
                                            <td>{{$comment->title}}</td>
                                            <td>{{$comment->comment_desc or null}}</td>
                                            <td>{{$comment->created_at}}</td>
                                            <td>
                                                <a href="/admin/comment/delete?id={{$comment->cid}}" class="btn btn-xs btn-danger">删除</a>
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