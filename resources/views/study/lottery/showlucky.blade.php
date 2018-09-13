@extends('layouts.base')

@section('content')
<h3>奇葩的中奖者名单</h3>
<div style="margin-top: 50px;width:100%;">
    <table style="margin: 10px auto; background: #f0f0f0; width:30%; text-align: left; padding: 5px 8px;">
        <tr><td style="text-align: center;"><h4>中奖者名单</h4></td></tr>
        @if(!empty($record_list))
            @foreach($record_list as $key => $record)
                <tr><td style="padding-left:7%;height: 30px;">{{$key+1}}&nbsp; {{$record['real_name']}} -- {{$record['phone']}}</td></tr>
            @endforeach
        @endif
    </table>
</div>
@endsection