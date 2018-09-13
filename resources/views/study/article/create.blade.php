@extends('layouts.admin-app')
@section('title','文章添加')
@section('content')
    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 添加文章 <span>Subtitle goes here...</span></h2>
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
                <h4 class="panel-title">添加文章</h4>
            </div>
            <div class="panel-body panel-body-nopadding">

                <form class="form-horizontal form-bordered" action="/study/article/store" method="post">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-sm-3 control-label" >文章标题</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="输入文章标题"   class="form-control"  name="title"/>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">作者</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="输入作者" class="form-control" name="author" />
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">文章内容</label>
                        <div class="col-sm-6">
                            <textarea name="content" class="form-control" style="height: 150px">

                            </textarea>
                        </div>
                    </div>



                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <button class="btn btn-primary btn-danger">添加文章</button>&nbsp;
                                <button class="btn btn-default">取消</button>
                            </div>
                        </div>
                    </div><!-- panel-footer -->

                </form>

            </div><!-- panel-body -->



        </div><!-- panel -->



    </div><!-- contentpanel -->


@endsection