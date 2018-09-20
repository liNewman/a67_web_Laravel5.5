<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>仿微博评论</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/comment.css">
</head>
<body>
<!--
    此评论textarea文本框部分使用的https://github.com/alexdunphy/flexText此插件
-->
<div class="commentAll">
    <!--评论区域 begin-->
    <div class="reviewArea clearfix">
       {{-- <form action="http://www.admin_a67.com/admin/pl/add" method="post">--}}
           {{csrf_field()}}
        <textarea class="content comment-input" placeholder="Please enter a comment&hellip;" onkeyup="keyUP(this)" name="scores" id="con"></textarea>
        {{--<a href="javascript:;" class="plBtn">评论</a>--}}
        <input type="submit" value="评论" class="plBtn" id="btn">
       {{-- </form>--}}
    </div>
    <!--评论区域 end-->
    <!--回复区域 begin-->
    <div class="comment-show">
        <div class="comment-show-con clearfix">
            <div class="comment-show-con-img pull-left"><img src="/images/header-img-comment_03.png" alt=""></div>
            <div class="comment-show-con-list pull-left clearfix">
                <div class="pl-text clearfix">
                    <a href="#" class="comment-size-name">张三 : </a>
                    <span class="my-pl-con">&nbsp;来啊 造作啊!</span>
                </div>
                <div class="date-dz">
                    <span class="date-dz-left pull-left comment-time">2017-5-2 11:11:39</span>
                    <div class="date-dz-right pull-right comment-pl-block">
                        <a href="javascript:;" class="removeBlock">删除</a>
                        <a href="javascript:;" class="date-dz-pl pl-hf hf-con-block pull-left">回复</a>
                        <span class="pull-left date-dz-line">|</span>
                        <a href="javascript:;" class="date-dz-z pull-left"><i class="date-dz-z-click-red"></i>赞 (<i class="z-num">666</i>)</a>
                    </div>
                </div>
                <div class="hf-list-con"></div>
            </div>
        </div>
        @foreach ($list as $key=>$val)
         @if($val['fid']==0)
        <div class="comment-show-con clearfix">
            <div class="comment-show-con-img pull-left"><img src="/images/header-img-comment_03.png" alt=""></div>
            <div class="comment-show-con-list pull-left clearfix">
                <div class="pl-text clearfix">
                    <a href="#" class="comment-size-name">{{ $val->name }}: </a>
                    <span class="my-pl-con">{{ $val->content }}</span>
                </div>
                <div class="date-dz">
                    <span class="date-dz-left pull-left comment-time">2017-5-2 11:11:39</span>
                    <div class="date-dz-right pull-right comment-pl-block">
                        <input type="hidden" name="id" value="{{ $val->id }}">
                        <a href="/pl/delete/{{ $val->id }}" class="removeBlock">删除</a>
                        <a href="javascript:;" class="date-dz-pl pl-hf hf-con-block pull-left">回复</a>
                        <span class="pull-left date-dz-line">|</span>
                        <a href="javascript:;" class="date-dz-z pull-left"><i class="date-dz-z-click-red"></i>赞 (<i class="z-num">666</i>)</a>
                    </div>
                </div>
                <div class="hf-list-con">
                    @foreach ($list as $key=>$v)
                        @if($v['fid']==$val['id'])
                            <div class="pl-text clearfix">
                                <a href="#" class="comment-size-name">{{ $v->name }}: </a>
                                <span class="my-pl-con">{{ $v->content }}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        @endforeach

    </div>
    <!--回复区域 end-->
</div>



<script type="text/javascript" src="/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="/js/jquery.flexText.js"></script>
<!--textarea高度自适应-->
<script type="text/javascript">
    $(function () {
        $('.content').flexText();
    });
</script>
<!--textarea限制字数-->
<script type="text/javascript">
    function keyUP(t){
        var len = $(t).val().length;
        if(len > 139){
            $(t).val($(t).val().substring(0,140));
        }
    }
</script>
<!--点击评论创建评论条-->
<script type="text/javascript">
    $('.commentAll').on('click','.plBtn',function(){
        var myDate = new Date();
        //获取当前年
        var year=myDate.getFullYear();
        //获取当前月
        var month=myDate.getMonth()+1;
        //获取当前日
        var date=myDate.getDate();
        var h=myDate.getHours();       //获取当前小时数(0-23)
        var m=myDate.getMinutes();     //获取当前分钟数(0-59)
        if(m<10) m = '0' + m;
        var s=myDate.getSeconds();
        if(s<10) s = '0' + s;
        var now=year+'-'+month+"-"+date+" "+h+':'+m+":"+s;
        //获取输入内容
        var oSize = $(this).siblings('.flex-text-wrap').find('.comment-input').val();
        console.log(oSize);
        //动态创建评论模块
        oHtml = '<div class="comment-show-con clearfix"><div class="comment-show-con-img pull-left"><img src="images/header-img-comment_03.png" alt=""></div> <div class="comment-show-con-list pull-left clearfix"><div class="pl-text clearfix"> <a href="#" class="comment-size-name">David Beckham : </a> <span class="my-pl-con">&nbsp;'+ oSize +'</span> </div> <div class="date-dz"> <span class="date-dz-left pull-left comment-time">'+now+'</span> <div class="date-dz-right pull-right comment-pl-block"><a href="javascript:;" class="removeBlock">删除</a> <a href="javascript:;" class="date-dz-pl pl-hf hf-con-block pull-left">回复</a> <span class="pull-left date-dz-line">|</span> <a href="javascript:;" class="date-dz-z pull-left"><i class="date-dz-z-click-red"></i>赞 (<i class="z-num">666</i>)</a> </div> </div><div class="hf-list-con"></div></div> </div>';
        if(oSize.replace(/(^\s*)|(\s*$)/g, "") != ''){
            $(this).parents('.reviewArea ').siblings('.comment-show').prepend(oHtml);
            $(this).siblings('.flex-text-wrap').find('.comment-input').prop('value','').siblings('pre').find('span').text('');
        }
    });
</script>
<!--点击回复动态创建回复块-->
<script type="text/javascript">
    $('.comment-show').on('click','.pl-hf',function(){
        //获取回复人的名字
        var fhName = $(this).parents('.date-dz-right').parents('.date-dz').siblings('.pl-text').find('.comment-size-name').html();
        //回复@
        var fhN = '回复@'+fhName;
        //var oInput = $(this).parents('.date-dz-right').parents('.date-dz').siblings('.hf-con');
        var fhHtml = '<div class="hf-con pull-left"> ' +
                '{{csrf_field()}}'+
            '<textarea class="content comment-input hf-input" placeholder="" onkeyup="keyUP(this)" id="con2">' +
            '</textarea> <a href="javascript:;" class="hf-pl" id="btn2">回复</a></div>'
        ;
        $("#btn2").click(function(){
            var con2 = $("#con2").val();
            // console.log(data);
            alert(con2);
            $.ajax({
                type:'post',
                dataType:'json',
                url:'http://www.admin_a67.com/admin/pl/addSave2',
                data:{
                    _token:$("input[name='_token']").val(),returnScores:con2,name:123
                },
                success:function(res){
                    if (res.code) {
                        location.reload(0)
                    }else {
                        alert(res.msg);
                        location.reload(0);
                    }
                },
            });
        });
        //显示回复
        if($(this).is('.hf-con-block')){
            $(this).parents('.date-dz-right').parents('.date-dz').append(fhHtml);
            $(this).removeClass('hf-con-block');
            $('.content').flexText();
            $(this).parents('.date-dz-right').siblings('.hf-con').find('.pre').css('padding','6px 15px');
            //console.log($(this).parents('.date-dz-right').siblings('.hf-con').find('.pre'))
            //input框自动聚焦
            $(this).parents('.date-dz-right').siblings('.hf-con').find('.hf-input').val('').focus().val(fhN);
        }else {
            $(this).addClass('hf-con-block');
            $(this).parents('.date-dz-right').siblings('.hf-con').remove();
        }
    });
</script>
<!--评论回复块创建-->
<script type="text/javascript">
    $('.comment-show').on('click','.hf-pl',function(){
        var oThis = $(this);
        var myDate = new Date();
        //获取当前年
        var year=myDate.getFullYear();
        //获取当前月
        var month=myDate.getMonth()+1;
        //获取当前日
        var date=myDate.getDate();
        var h=myDate.getHours();       //获取当前小时数(0-23)
        var m=myDate.getMinutes();     //获取当前分钟数(0-59)
        if(m<10) m = '0' + m;
        var s=myDate.getSeconds();
        if(s<10) s = '0' + s;
        var now=year+'-'+month+"-"+date+" "+h+':'+m+":"+s;
        //获取输入内容
        var oHfVal = $(this).siblings('.flex-text-wrap').find('.hf-input').val();
        var oHfName = $(this).parents('.hf-con').parents('.date-dz').siblings('.pl-text').find('.comment-size-name').html();
        var oAllVal = '回复@'+oHfName;
        $.ajax({
            type:'post',
            dataType:'json',
            url:'/pl/create1',
            data:{
                _token:$("input[name='_token']").val(),content:oHfVal,name:123,fid:$("input[name='id']").val(),
            },
            success:function(res){
                if (res.code) {
                    location.reload(0)
                }else {
                    alert(res.msg);
                    location.reload(0);
                }
            },
        });

    });
</script>
<!--删除评论块-->
<script type="text/javascript">
    $('.commentAll').on('click','.removeBlock',function(){
        var oT = $(this).parents('.date-dz-right').parents('.date-dz').parents('.all-pl-con');
        if(oT.siblings('.all-pl-con').length >= 1){
            oT.remove();
        }else {
            $(this).parents('.date-dz-right').parents('.date-dz').parents('.all-pl-con').parents('.hf-list-con').css('display','none')
            oT.remove();
        }
        $(this).parents('.date-dz-right').parents('.date-dz').parents('.comment-show-con-list').parents('.comment-show-con').remove();

    })
</script>
<!--点赞-->
<script type="text/javascript">
    $('.comment-show').on('click','.date-dz-z',function(){
        var zNum = $(this).find('.z-num').html();
        if($(this).is('.date-dz-z-click')){
            zNum--;
            $(this).removeClass('date-dz-z-click red');
            $(this).find('.z-num').html(zNum);
            $(this).find('.date-dz-z-click-red').removeClass('red');
        }else {
            zNum++;
            $(this).addClass('date-dz-z-click');
            $(this).find('.z-num').html(zNum);
            $(this).find('.date-dz-z-click-red').addClass('red');
        }
    })
</script>
<script>
    $("#btn").click(function(){
        var content = $("#con").val();
        $.ajax({
            type:'post',
            dataType:'json',
            url:'/pl/create',
            data:{
             _token:$("input[name='_token']").val(),content:content,name:678
            },
            success:function(res){
                if (res.code) {
                    location.reload(0)
                }else {
                    alert(res.msg);
                    location.reload(0);
                }
            },
        });
    });
</script>
</body>
</html>