@extends('layouts.admin-app')
@section('title','小说章节')
@section('content')
    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 小说章节 <span>Subtitle goes here...</span></h2>
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
                <h4 class="panel-title">小说章节</h4>
            </div>
            <div class="panel-body panel-body-nopadding">

                <form class="form-horizontal form-bordered" action="/admin/novelChapter/store" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="novel_id" value="{{$novel_id}}">


                    <div class="form-group">
                        <label class="col-sm-3 control-label">小说章节标题</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="输入小说标题" value="{{old('title')}}"  class="form-control"  name="title"/>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">小说章节内容</label>
                        <div class="col-sm-6">
                            <textarea name="content" class="form-control"></textarea>
                        </div>
                    </div>



                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <button class="btn btn-primary btn-danger">添加小说章节内容</button>&nbsp;
                                <button class="btn btn-default">取消</button>
                            </div>
                        </div>
                    </div><!-- panel-footer -->

                </form>

            </div><!-- panel-body -->



        </div><!-- panel -->



    </div><!-- contentpanel -->


@endsection