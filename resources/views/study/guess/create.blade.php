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
                                <input type="text" id="team1" name="team1" placeholder="球队1" class="form-control" />
                        </div>
                      <div class="col-sm-2"><h2>VS</h2></div>
                        <div class="col-sm-2">
                                <input type="text" id="team2" name="team2" placeholder="球队2" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">结束竞猜时间</label>
                        <div class="col-sm-4">
                                <input type="date" id="last_time" name="last_time" placeholder="结束竞猜时间" name="last_time" />
                        </div>
                    </div>

            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <button class="btn btn-primary btn-success add_guess">添加竞猜</button>&nbsp;
                    </div>
                </div>
            </div><!-- panel-footer -->

        </div><!-- panel -->
        </form>

        <div class="table-responsive">
                        <table class="table mb30">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>赛  事</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $k=>$v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->team1}}VS{{$v->team2}}</td>
                                    <td>
                                            <button class="btn btn-primary-alt"><a href="/study/guess/doguess?id={{$v->id}}">竞猜</a></button>
                                            <button class="btn btn-primary"><a href="/study/guess/result?id={{$v->id}}">查看结果</a></button>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div><!-- table-responsive -->
                </div><!-- col-md-6 -->


    </div><!-- contentpanel -->

    <script>
        $('.add_guess').click(function (){
            var team1 = $("#team1").val();
            var team2 = $("#team2").val();
            var last_time = $("#last_time").val();
            $.ajax({
                url: "/study/guess/store",     //提交到controller的url路径
                type: "post",//提交方式
                dataType: "json",//服务端返回的数据类型
                data: {
                    _token: $("input[name=_token]").val(),
                    team1:team1,
                    team2:team2,
                    last_time:last_time
                },
                success: function (data) {

                    if(data.code == 200){
                        alert(data.msg);
                    }else {
                        alert(data.msg);
                    }

                }
            })
        });
    </script>
@endsection