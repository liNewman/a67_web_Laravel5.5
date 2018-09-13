@extends('layouts.admin-app')
@section('title','文章列表')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="pageheader">
        <h2><i class="fa fa-table"></i> 文章列表 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li><a href="index.html">Bracket</a></li>
                <li class="active">Tables</li>
            </ol>
        </div>
    </div>

    <div class="contentpanel">

        <div class="row">
       {{csrf_field()}}
            <div class="col-md-12">
                <h5 class="subtitle mb5">Table With Actions</h5>
                <p class="mb20"><a class="btn-danger btn " href="/study/article2/create">添加文章</a></p>
                <div class="table-responsive">


                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-success mb30">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>文章标题</th>
                                    <th>作者</th>
                                    <th>点赞数</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($article_list))
                                    @foreach($article_list as $object)
                                        <tr>
                                            <td>{{$object->id}}</td>
                                            <td>{{$object->title or null}}</td>
                                            <td>{{$object->author or null}}</td>
                                            <td>{{$object->hits or 0}}</td>
                                            <td>
                                               <button class="btn btn-danger btn-xs click_article" data-id="{{$object->id}}" user-id="{{rand(1,100)}}" >点赞</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div><!-- table-responsive -->
                    </div>

                </div><!-- row -->



            </div><!-- contentpanel -->
            <script type="text/javascript">
                $(".click_article").on('click',function () {
                    $.ajax({
                        url:'/study/article/click',
                        type:'post',
                        dataType:'json',
                        data:{_token:$("input[name='_token']").val(),id:$(this).attr('data-id'),user_id:$(this).attr('user-id')},
                        success:function (res) {
                            if (res.code==200){
                                location.reload(0);
                            } else {
                               alert(res.msg)
                            }
                        },
                        error:function () {
                        }
                    })
                })


            </script>
@endsection