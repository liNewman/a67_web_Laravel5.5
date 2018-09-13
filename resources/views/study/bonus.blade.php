@extends('layouts.admin-app')
@section('title','发红包')
@section('content')


    <div class="row">

        <div class="col-md-12">
            <h4 class="submit mb5">发红包</h4>

            <div class="panel-body panel-body-nopadding">
                <form class="form-horizontal form-bordered" onsubmit="return false" id="send_bonus">
                    {{csrf_field()}}


                    <div class="form-group">
                    <label class="col-sm-3 control-label">设置口令</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="口令" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">红包个数</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="红包个数" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">红包金额</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="红包金额" class="form-control">
                        </div>
                    </div>


                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3">
                        <button class="btn btn-primary btn-danger send-bonus">塞钱</button>&nbsp;
                    </div>
                </div>


            </form>
        </div>
        </div>
    </div>

<div class="row">
    <div class="col-md-12">
        <table class="table-responsive">
                <table class="table mb30">
                    <thead>
                    <tr>
                        <th>红包id</th>
                        <th>剩余金额</th>
                        <th>剩余个数</th>
                    </tr>
                </table>

         </table>
    </div>
    </div><!-- table-responsive -->


    <script>



        $(".send-bonus").on('click',function () {
            $.ajax({
                url:'/study/send/bonus',
                type:'post',
                dataType:'json',
                data:$("#send_bonus").serialize(),
                success:function(res){
                  alert(res.code);
                },
                error:function () {
                    
                }
                
            });
        })

    </script>
@endsection



