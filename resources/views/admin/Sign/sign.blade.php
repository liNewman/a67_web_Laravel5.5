@extends('layouts.admin-app')
@section('title','首页')
@section('content')


    <div class="row">
{{csrf_field()}}
        <div class="col-md-12">
            <h4 class="submit mb5">签到功能</h4>
            <p class="mb20"><button class="btn btn-danger btn-primary sign">签到</button></p>
            <p><input class="form-control" name="sign_date" style="width: 150px" type="date"></p>
            <div class="table-responsive">
                <table class="table mb30">
                    <thead>
                    <tr>
                        <th>总计签到</th>
                        <th>最近连续签到</th>
                        <th>获得的积分</th>
                    </tr>
                    </thead>
                    <tbody>



                    </tbody>
                </table>
            </div><!-- table-responsive -->
        </div><!-- col-md-6 -->

    </div>
<script type="application/javascript">
    $(".sign").on('click',function () {
       $.ajax({
           url:'/admin/doSign',
           type:'post',
           dataType:"json",
           data:{_token:$("input[name='_token']").val(),user_id:1,sign_date:$("input[name='sign_date']").val()},
           success:function (res) {
                alert(res.msg);
           },
           error:function () {

           }
       })
    });

</script>
@endsection



