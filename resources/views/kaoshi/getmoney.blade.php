@extends('layouts.base')

@section('content')
    <div class="form-group">
    <h2>抢</h2>

    <a href="" class="btn btn-primary btn-lg getmoney">抢红包</a>
        <p>一个用户只能抢一次哦！！</p>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-danger mb30">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>红包</th>
                    <th>剩余金额</th>
                    <th>是否幸运王</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
        </div><!-- table-responsive -->
    </div>
    <script type="text/javascript">
        $('.getmoney').click(function() {
                alert('恭喜您抢到红包了');
        });
    </script>
@endsection