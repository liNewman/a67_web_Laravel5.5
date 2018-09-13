@extends('layouts.admin-app')
@section('title','足球竞猜')
@section('content')

    <form action="/admin/guess/doresult" method="post">
        <input type="hidden" name="user_id" value="{{mt_rand(1,3211)}}">
        <input type="hidden" name="g_id" value="{{$result['id']}}">
        @if(isset($pwd))
            @foreach($pwd as $k=>$v)
                <input type="hidden" name="pwd" value="{{$v}}">
            @endforeach
        @endif
        {{csrf_field()}}
        <div class="col-md-12">
            <h5 class="subtitle mb5">Table With Actions</h5>
            <div class="table-responsive">
                <button class="btn btn-danger"><a href="/admin/guess/index">返回</a></button>
                <h1>我要竞猜</h1>
                <h1 style="color:red;">{{$result['team1']}} VS {{$result['team2']}}</h1>
                @foreach($guess as $k=>$v)
                    <input type="radio"
                           @if(isset($end))
                    @if($end['g_result']==$k)
                    checked
                     @endif
                           @endif name="g_result" value="{{$k}}">{{$v}}
                @endforeach
                <br>
                @if(isset($msg))
                    @foreach($msg as $k=>$v)
                        <span style="color:red;">{{$v}}</span>
                    @endforeach
                @endif
                <input type="submit" value="提交结果" class="btn btn-danger">
            </div><!-- table-responsive -->
        </div><!-- col-md-6 -->
    </form>


@endsection