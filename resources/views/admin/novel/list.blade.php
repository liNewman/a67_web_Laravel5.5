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
                <p class="mb20"><a class="btn-danger btn " href="/admin/novel/create">添加小说</a></p>
                <div class="table-responsive">


                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-success mb30">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>封面</th>
                                    <th>标题</th>
                                    <th>评分</th>
                                    <th>作者</th>
                                    <th>类型</th>
                                    <th>状态</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($novels))
                                    @foreach($novels as $key=>$novel)
                                        <tr>
                                            <td>{{$novel->id}}</td>
                                            <td><img src="@if(empty($novel->image_url)) /image/photos/loggeduser.png @else{{$novel->image_url}} @endif" style="width: 40px"></td>
                                            <td>{{$novel->title}}</td>
                                            <td>{{$novel->score}}</td>
                                            <td>{{$authors[$novel->author_id] or null}}</td>
                                            <td>{{$types[$novel->type_id] or null}}</td>
                                            <td>@if($novel->status==\App\Model\AdminUser::STATUS_NORMAL)<button class="btn btn-xs btn-danger">连载</button>@else<button class="btn btn-xs btn-black">完结</button></td>@endif
                                            <td>{{$novel->created_at}}</td>
                                            <td>
                                                <a href="/admin/user/edit/{{$novel->id}}" class="btn btn-xs btn-primary">修改</a>
                                                <a href="/admin/novelChapter/create?novel_id={{$novel->id}}" class="btn btn-xs btn-black">添加章节</a>
                                                <a href="/admin/user/delete/{{$novel->id}}" class="btn btn-xs btn-danger">删除</a>
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