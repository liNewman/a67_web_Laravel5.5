@extends('layouts.admin-app')
@section('title','小说添加')
@section('content')
    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 小说添加 <span>Subtitle goes here...</span></h2>
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
                <h4 class="panel-title">用户表单</h4>
            </div>
            <div class="panel-body panel-body-nopadding">

                <form class="form-horizontal form-bordered" action="/admin/novel/store" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-sm-3 control-label">小说标题</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="小说标题" value="{{old('title')}}"  class="form-control"  name="title"/>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">评分</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="评分" value="{{old('score')}}"  class="form-control"  name="score"/>
                            <span class="help-block"></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label" >小说类型</label>
                        <div class="col-sm-6">
                            <select name="type_id" class="form-control">
                                @if(!empty($type_list))
                                    @foreach($type_list as $type)
                                        <option value="{{$type->id}}">{{$type->type_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" >小说作者</label>
                        <div class="col-sm-6">
                            <select name="author_id" class="form-control">
                                @if(!empty($author_list))
                                    @foreach($author_list as $author)
                                        <option value="{{$author->id}}">{{$author->author_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">小说标签</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="小说标签" value="{{old('tags')}}"  class="form-control"  name="tags"/>
                            <span class="help-block"></span>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label">小说图片</label>
                        <div class="col-sm-6">
                            <input type="file" value="{{old('image_url')}}" class="form-control" name="image_url">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">小说简介</label>
                        <div class="col-sm-6">
                           <textarea name="content" class="form-control"></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label">小说状态</label>
                        <div class="col-sm-6">
                            <div class="radio"><label><input name="status" type="radio" value="1" checked="">连载</label></div>
                            <div class="radio"><label><input name="status" type="radio" value="2" >完结</label></div>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <button class="btn btn-primary btn-danger">添加小说</button>&nbsp;
                                <button class="btn btn-default">取消</button>
                            </div>
                        </div>
                    </div><!-- panel-footer -->

                </form>

            </div><!-- panel-body -->



        </div><!-- panel -->



    </div><!-- contentpanel -->


@endsection