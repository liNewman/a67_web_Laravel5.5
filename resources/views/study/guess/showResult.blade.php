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

                <form class="form-horizontal form-bordered" id="send-bonus" method="post" onsubmit="return false" >
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-sm-3 control-label">添加球队</label>
                        <div class="col-sm-2">
                            {{$info['team1']}}
                        </div>
                        <div class="col-sm-2"><h2>VS</h2></div>
                        <div class="col-sm-2">
                            {{$info['team2']}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">竞猜结果</label>
                        <div class="col-sm-4">
                            @if($info['results'] == 1)
                                <label class="col-sm-3 control-label">你赢了</label>
                                @else
                                <label class="col-sm-3 control-label">很抱歉</label>
                                @endif
                        </div>
                    </div>
            </div><!-- panel -->
            </form>

@endsection