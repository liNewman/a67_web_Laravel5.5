@extends('layouts.base')

@section('content')


    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 添加竞猜 <span>Subtitle goes here...</span></h2>
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

        <div class="panel panel-default">
            <div class="panel-heading">

                <h4 class="panel-title">添加竞猜</h4>
                <p></p>
            </div>
            <div class="panel-body panel-body-nopadding">

                <form class="form-horizontal form-bordered" method="post" action="addguess.blade.php">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">添加球队</label>
                        <div class="col-sm-8">
                            <div class="col-sm-3">
                                <input type="text" name="team1" placeholder="球队1" class="col-lg-4" />

                                <input type="text" name="team2" placeholder="球队2" class="col-lg-4" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">添加球队</label>
                        <div class="col-sm-8">
                            <div class="col-sm-3">
                                <input type="date" name="team1" placeholder="球队1" class="col-lg-4" />
                            </div>
                        </div>
                    </div>



            </div><!-- panel-body -->

            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <button class="btn btn-primary btn-success">添加竞猜</button>&nbsp;
                    </div>
                </div>
            </div><!-- panel-footer -->

        </div><!-- panel -->
        </form>


    </div><!-- contentpanel -->
    @endsection