@extends('layouts.base')

@section('title', '后台管理系统-签到')

@section('content')
    <div>
        <br><br><br><br>
        <div class="col-md-5">
            <button class="btn btn-primary btn-sm sign">点我签到</button>
        </div>
        <br><br>
        <div class="col-md-5">
                <input type="date" class="form-control" name="date"  />
        </div>
        <br><br><br><br>
        <div>
            <div class="row class="col-md-9"">
                <div class="col-md-7">
                    <div class="table-responsive">
                        <table class="table table-primary mb30">
                            <thead>
                            <tr>
                                <th>总计签到</th>
                                <th>最近连续签到</th>
                                <th>获得积分</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>125次</td>
                                <td>7天</td>
                                <td>114分</td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- table-responsive -->
                </div>
        </div>

        <script type="text/javascript">
            $('.sign').on('click', function() {
                alert('签到成功');
                $.ajax({
                    type: "GET",
                    url: "",
                    data: "name=garfield&age=18",
                    success: function(data){
                        alert('签到成功');
                    }
                    error: function(data){
                        alert('签到失败');
                    }
                });
            });
        </script>

    </div>

@endsection

