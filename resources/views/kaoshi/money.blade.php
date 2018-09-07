@extends('layouts.base')

@section('content')

<h3>发红包</h3>
<form method="post" action="http://www.a67web.com/addmoney">
    红包个数<input type="text" name="price">个
    总金额 <input type="text" name="num">元
    <input type="submit" class="btn btn-xs btn-primary" value="塞钱">
</form>


@endsection