@extends('layouts.base')

@section('title', '输入')

@section('content')


    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 表单 <span>Subtitle goes here...</span></h2>
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
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Well done!</strong> You successfully read this <a href="" class="alert-link">important alert message</a>.
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">&times;</a>
                    <a href="" class="minimize">&minus;</a>
                </div>

                <h4 class="panel-title">Input Fields</h4>
                <p>Individual form controls automatically receive some global styling. All textual elements with <code>.form-control</code> are set to width: 100%; by default. Wrap labels and controls in <code>.form-group</code> for optimum spacing.</p>
            </div>
            <div class="panel-body panel-body-nopadding">

                <form class="form-horizontal form-bordered">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">文章</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Default Input" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">文章</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Default Input" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">文章</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Default Input" class="form-control" />
                        </div>
                    </div>
                    
                   

                </form>

            </div><!-- panel-body -->

            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <button class="btn btn-primary btn-danger">Submit</button>&nbsp;
                        <button class="btn btn-default">Cancel</button>
                    </div>
                </div>
            </div><!-- panel-footer -->

        </div><!-- panel -->



    </div><!-- contentpanel -->
@endsection