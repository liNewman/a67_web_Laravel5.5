@extends('layouts.admin-app')
@section('title','日志')
@section('content')



    <div class="pageheader">
        <h2><i class="fa fa-table"></i> 日志管理 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li><a href="#">日志管理</a></li>
                <li class="active">Tables</li>
            </ol>
        </div>
    </div>





        {{csrf_field()}}
        <p class="mb20"><a class="btn btn-danger btn-xs add">添加日志</a></p>
        <span>头像:</span>
    <div>
        <!-- 加载编辑器的容器 -->
        <textarea id="container" name="content" type="text/plain"></textarea>
        <!-- 配置文件 -->
        <script type="text/javascript" src="/UEeditor/ueditor.config.js" ></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="/UEeditor/ueditor.all.js"></script>
    </div>
        <br><br>
        <span>工作内容:</span>
    <div>
        <textarea id="container1" name="content" type="text/plain"></textarea>
    <!-- 配置文件 -->
         <script type="text/javascript" src="/UEeditor/ueditor.config.js" ></script>
    <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="/UEeditor/ueditor.all.js"></script>
    </div>
        <br><br>
        <span>工作计划:</span>
    <div>
        <textarea id="container2" name="content" type="text/plain"></textarea>
    <!-- 配置文件 -->
       <script type="text/javascript" src="/UEeditor/ueditor.config.js" ></script>
    <!-- 编辑器源码文件 -->
         <script type="text/javascript" src="/UEeditor/ueditor.all.js"></script>
    </div>
        <br><br>


<script>
    var content=UE.getEditor('container');
    var content1=UE.getEditor('container1');
    var content2=UE.getEditor('container2');
</script>






        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-primary mb30">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>附件图片</th>
                                <th>工作内容</th>
                                <th>工作计划</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $k=>$v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td>{!! $v->image_url !!}</td>
                                    <td>{!! $v->content !!}  </td>
                                    <td>{!! $v->title !!}  </td>
                                    <td>
                                        <a href="/admin/log/delete/{{ $v->id }}" class="btn btn-danger">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{--{{$list->links()}}--}}
                </div><!-- table-responsive -->
            </div>
        </div><!-- row -->








    <script>
        $('.add').on('click',function(){

            $.ajax({
                url:'/admin/log/addSave',
                type:'post',
                // dataType:'json',
                data:{
                    _token:$('input[name="_token"]').val(),content:content,content1:content1,content2:content2
                },
                success:function(res){
                    alert(res);
                    if(res.code==200){
                        alert(res.msg);
                        location.reload(0);
                    }
                }
            })
        })
    </script>
@endsection()
