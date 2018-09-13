@extends('layouts.admin-app')
@section('title','小说章节表单')
@section('content')

    <div class="pageheader">
        <h2><i class="fa fa-table"></i> 小说章节表单 <span>Subtitle goes here...</span></h2>
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
                <h5 class="subtitle mb5">小说章节表单</h5>
                <p class="mb20"><a class="btn-danger btn " href="/admin/novel/list">小说章节表单</a></p>
                <div class="table-responsive">


                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-success mb30">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>标题</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($chapters))
                                    @foreach($chapters as $key=>$chapter)
                                        <tr>
                                            <td>{{$chapter->id}}</td>
                                            <td>{{$chapter->title}}</td>
                                            <td>{{$chapter->created_at}}</td>
                                            <td>
                                                <a href="/admin/novelChapter/delete?id={{$chapter->id}}" class="btn btn-xs btn-danger">删除</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                @endif
                                </tbody>
                            </table>

                        </div><!-- table-responsive -->
                        {{$chapters->links()}}
                    </div>

                </div><!-- row -->



            </div><!-- contentpanel -->

@endsection