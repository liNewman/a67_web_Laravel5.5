@extends('layouts.base')

@section('content')
 <div class="pageheader">
            <h2><i class="fa fa-table"></i> Tables <span>Subtitle goes here...</span></h2>
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

                <div class="col-md-12">
                    <h5 class="subtitle mb5">Table With Actions</h5>
                    <p class="mb20">An example of table with actions in every rows.</p>
                    <a href="http://www.a67web.com/yesadd" class="btn btn-xs">添加</a>
                    <div class="table-responsive">
                        <table class="table mb30">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>标题</th>
                                <th>作者</th>
                                <th>点赞数</th>
                                <th><a href="" class="btn btn-xs">点赞</a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>哈哈</td>
                                <td>呼呼</td>
                            	<td><p class="aa"></p></td>
                                <td><a href="" class="btn btn-xs yes">点赞</a></td>
                                <td class="table-action">
                                    <a href=""><i class="fa fa-pencil"></i></a>
                                    <a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        
                            </tbody>
                        </table>
                    </div><!-- table-responsive -->
                </div><!-- col-md-6 -->

            </div>
       

            </div><!-- row -->

<script type="text/javascript">
	  $(".yes").on("click",function () {
	  	alert('点赞成功');

        $.ajax({
            url:'/index.php?r=admin/user/ajax-disable',
            type:'get',
            dataType:'json',
            data: {id:user_id, type:type},
            success: function (){
                $(.aa).num+1;
            },
            error: function (res) {
                alert('error');
            }
        });
    });
</script>

        </div><!-- contentpanel -->

@endsection