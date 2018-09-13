@extends('layouts.admin-app')
@section('title','足球竞猜')
@section('content')

    <form action="/admin/guess/doinsert" method="post">
        <div class="pageheader">
            <h2><i class="fa fa-table"></i> 足球竞猜 <span>Subtitle goes here...</span></h2>
            <div class="breadcrumb-wrapper">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li><a href="index.html">Bracket</a></li>
                    <li class="active">Tables</li>
                </ol>
            </div>
        </div>
        <div class="contentpanel">

            <div class="form-group">
                {{csrf_field()}}
                <label class="col-sm-3 control-label">球队</label>
                <div class="col-sm-6">
                    <input type="text"  placeholder="球队1" name="team1" />
                    <span style="color:red; font-size: 40px">VS</span>
                    <input type="text" id="pwd" placeholder="球队2" name="team2" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">结束竞猜时间</label>
                <div class="col-sm-6">
                    <input type="date"  name="last_date" class="form-inline" />
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <button class="btn btn-primary btn-danger">添加球队</button>
                </div>
            </div>
            <div class="row">
            </div>
        </div><!-- contentpanel -->
    </form>
    <form action="#" method="post">
        <div class="col-md-12">
            <h5 class="subtitle mb5">赛事详情</h5>
            <div class="table-responsive">
                <table class="table mb30">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>赛事</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($re as $k=>$v)
                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->team1}}VS{{$v->team2}}</td>
                            <td>
                                @if($v->last_date > date("Y-m-d",time()))
                                    <button class="btn btn-darkblue"><a href="/admin/guess/result/{{$v->id}}?pwd=1">竞猜</a></button>
                                @else
                                    <button class="btn btn-purple"><a href="/admin/guess/end/{{$v->id}}?pwd=1">查看结果</a></button>
                                @endif
                                @if(!empty($pwd) && $pwd==123)
                                    <button class="btn btn-black"><a href="/admin/guess/result/{{$v->id}}?pwd=2">添加结果</a></button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- table-responsive -->
        </div><!-- col-md-6 -->
    </form>



@endsection