@extends('layouts.base')
@section('content')
    <form action="/dolucky" method="post">
        {{ csrf_field() }}
        活动名称<input type="text" name="title"><br>
        开始时间 <input type="date" name="s_time">
        结束时间 <input type="date" name="e_time">
        活动说明 <input type="text" name="a_desc">
        <input type="submit" value="添加活动">
    </form>

    @endsection