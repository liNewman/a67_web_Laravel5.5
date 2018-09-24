<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>艺术家页面</title>
</head>
<link rel="stylesheet" type="text/css" href="/css/best.css"/>
<link rel="stylesheet" type="text/css" href="/css/yishujia.css"/>
<script type="text/javascript" src="/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="/js/index.js"></script>
<script type="text/jscript">
	$(function(){
		$('.Artist .cent ul li').click(function(){
			$(this).addClass('act').siblings().removeClass('act')
		});
		//跳转页面按钮
		$('.Artist .anniu li').click(function(event) {
            $(this).addClass('act').siblings().removeClass('act')
        });
				//艺术家名称搜索
		$('.Artist .cent .pinyin ul li').click(function(){
			var val = $(this).html();
			var ipt = $('.Artist .cent .pinyin ol li input').val();
			$('.Artist .cent .pinyin ol li input').val(ipt+val);
			console.log(input);
		});

	});

</script>
<body>
<!--头部分-->
<div class="header clearfix">
    <div class="header_top">
        <div class="logo">
            <h1>
                <a href="#" title="全球最大的书画专业在线免费交易平台">书画拍拍</a>
            </h1>
        </div>
        <div class="wz">
            <h2>全球最大的书画专业在线免费交易平台</h2>
        </div>
        <div class="r_nav">
            <ul>
                <li><a href="#" class="red">推广赚钱</a><span>|</span></li>
                <li><a href="#">新手指引</a><span>|</span></li>
                <li><a href="zhuce.html">注册</a><span>|</span></li>
                <li><a href="denglu.html" class="red">登录</a><span>|</span></li>
                <li><a href="changjianwenti.html">帮助</a></li>
            </ul>
        </div>
    </div>
    <div class="header_b">
        <div class="b_nav">
            <ul>
                <li><a href="index.html">首 页</a></li>
                <li><a href="huihuayemian.html">绘 画</a><ol class="huihua"><li class="jiacu" style="cursor:auto;"><b>国画</b></li><li>山水</li><li>花鸟</li><li>人物</li><li>动物</li><li>其他</li><br /><li class="jiacu" style="cursor:auto"><b>西画</b></li><li>油画</li><li>水彩</li><li>水粉</li><li>版画</li><li>其他</li></ol></li>
                <li><a href="shufa.html">书 法</a><ol><li>篆书</li><li>隶书</li><li>楷书</li><li>行书</li><li>草书</li><li>行草</li><li>其它</li></ol></li>
                <li><a href="zhuanke.html">篆 刻</a><ol class="kezhuan"><li>印章</li><li>印谱</li><li>刻字艺术</li><li>其它</li></ol></li>
                <li class="act_act"><a href="yishujiayemian.html">艺术家</a><ol><li>书法家</li><li>国画家</li><li>西画家</li><li>篆刻家</li><li>其它</li></ol></li>
                <li><a href="#">级 别</a><ol><li>24级至21级</li><li>20至17级</li><li>16至13级</li><li>12至9级</li><li>8级至5级</li><li>4级至1级</li></ol></li>
                <li><a href="#">社 区</a></li>
            </ul>
        </div>
        <div class="input">
            <input type="text" value=""  placeholder="输入后的字体及色值" class="text" />
            <input type="submit" value=""  class="btn" />
            <div class="chooseS layout">
                <table width="100%">
                </table>
            </div>
        </div>
    </div>
</div>
<!--banner部分-->
<div class="banner">
    <a href="#"><img src="/img/3ji/banner_top.jpg" width="1083" height="90"></a>
</div>
<!--中间内容部分-->
<div class="Artist">
    <div class="top">
        <h3>全部艺术家<span>(65462)</span></h3>
    </div>
    <div class="cent">
        <div class="t clearfix">
            <h3>艺术家分类：</h3>
            <ul>
            <li><a href="{{$asso_url}}" @if(!isset($info['asso_id'])) class="act1" @endif>全部</a></li>
            @foreach($asso as $k=>$v)
                <li>
                    <a href="{{$asso_url.'&asso_id='.$v->id}}" @if(isset($info['asso_id']) && $v->id==$info['asso_id']) class="act1" @endif>
                        {{ $v->name }}</a>
                </li>
            @endforeach
            </ul>
        </div>
        <div class="diqu clearfix">
            <h3>地<span></span>区：</h3>
            <div class="diqu_r">
                <ul class="clearfix">
                </ul>
                @foreach($area as $k=>$v)
                <ul class="clearfix">
                    <li>{{$v->area_name}}</li>
                </ul>
                @endforeach
                <ul class="clearfix">
                </ul>
                <ul class="clearfix";>
                </ul>
                <ul class="clearfix";>
                </ul>
            </div>
        </div>
        <div class="xuexiao clearfix">
            <h3>毕业学校：</h3>
            <div class="diqu_r">
             @foreach($school as $k=>$v)
                <ul class="clearfix">
                    <li>{{$v->name}}</li>
                </ul>
                @endforeach
            </div>
        </div>
        <div class="huiyuan clearfix">
            <h3>委会会员：</h3>
            <div class="diqu_r">
             @foreach($asso as $k=>$v)
                <ul class="clearfix">
                    <li>{{$v->name}}</li>
                </ul>
                @endforeach
            </div>
        </div>
        <div class="pinyin clearfix">
            <h3>拼音搜索：</h3>
            <div class="diqu_r">
                <ul class="clearfix">
                </ul>
                <ol>
                    <li>艺术家名称：</li>
                    <li><input type="text" placeholder="艺术家名称" /></li>
                    <li><button>搜索</button></li>
                </ol>
            </div>
        </div>
    </div>
    <div class="btm clearfix">
        <div class="l">
            <ul>
                @foreach($info as $k=>$v)
                <li>
                    <s><span class="juse">24</span><p>级</p></s>
                    <a href="#"><img src="{{$v->image}}" width="246" height="186" /> </a>
                    <p>姓名:<span>{{$v->name}}</span></p>
                    <p>地区：<span>{{$v->area_type_name->area_name}}</span></p>
                    <p>艺术类型：<span>{{$v->art_type_name->name}}</span></p>
                    <p>毕业院校：<span>{{$v->area_school_name->name}}</span></p>
                    <p>协会会员：<span>{{$v->area_asso_name->name}}</span></p>
                    <p><span class="juse">2009</span><span class="j666">份已售出</span></p>

                </li>
                @endforeach
            </ul>
        </div>
        <div class="r">
            <div class="t">
                <h3>拍卖公告</h3>
                <ul>
                    <li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    </li>
                </ul>
            </div>
            <div class="t">
                <h3>拍卖公告</h3>
                <ul>
                    <li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    </li>
                </ul>
            </div>
            <div class="t">
                <h3>拍卖公告</h3>
                <ul>
                    <li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    </li>
                </ul>
            </div>
            <div class="t">
                <h3>拍卖公告</h3>
                <ul>
                    <li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    <li>出价<span class="red">1200</span>元 竞拍 人物画 镇关西</li>
                    </li>
                </ul>
            </div>
            <a href="#"><img src="/img/yishujiayemian/guang gao.jpg" width="235" height="191" /></a>
        </div>
    </div>
    <!--跳转页面按钮-->
    <ol class="clearfix anniu">
        <li class="act">1</li>
        <li>2</li>
        <li>3</li>
        <li>4</li>
        <li>5</li>
        <li>6</li>
        <li>7</li>
        <li>...</li>
        <li>99</li>
        <li>100</li>
        <li><s></s></li>
        <li>跳转到</li>
        <li style="width:auto; height:auto; border:0 none;"><input type="text" /></li>
        <li>GO</li>
    </ol>

</div>
<!--下边广告banner-->
<div class="footBanner">
    <img src="/img/footBanner.jpg" width="1083" height="90" />
</div>
<!--底部分-->
<div class="Foot" style="background:#4e4e4e;">
    <div class="font_in">
        <div class="wei">
            <p></p>
            <span>扫扫有好礼</span>
        </div>
        <div class="E-male">
            <span>亲，留下您的邮箱，会有惊喜呦~</span>
            <input type="text" placeholder="请输入您的E-mail" >
            <button>立即订阅</button>
        </div>
        <div class="dingbu">返<br/>回<br/>顶<br/>部</div>
        <ul>
            <li><h2>拍卖学堂</h2></li>
            <li><a href="#">如何注册</a></li>
            <li><a href="#">如何提升级别</a></li>
            <li><a href="#">如何买</a></li>
            <li><a href="#">如何卖</a></li>
        </ul>
        <ul>
            <li><h2>拍卖支付方式</h2></li>
            <li><a href="#">网上付款</a></li>
            <li><a href="#">亲自到公司付款</a></li>
            <li><a href="#">银行汇款</a></li>
            <li><a href="#">邮局汇款</a></li>
        </ul>
        <ul>
            <li><h2>配送方式</h2></li>
            <li><a href="#">拍品总价组成</a></li>
            <li><a href="#">计算运费</a></li>
            <li><a href="#">物流配送方案</a></li>
            <li><a href="#">配送常见问题</a></li>
        </ul>
        <ul>
            <li><h2>账户及服务</h2></li>
            <li><a href="#">账户功能</a></li>
            <li><a href="#">查找拍品</a></li>
            <li><a href="#">常见问题</a></li>
            <li><a href="#">联系客服</a></li>
        </ul>
        <ul>
            <li><h2>网上拍卖规则</h2></li>
            <li><a href="#">隐私政策</a></li>
            <li><a href="#">艺术品拍卖方式</a></li>
            <li><a href="#">艺术品拍卖规则</a></li>
            <li><a href="#">更多帮助</a></li>
        </ul>
        <ul>
            <li style="color:#fff;">版权信息</li>
            <li>北京渊源国学文化传播有限公司</li>
            <li>ICP经营许可证编号</li>
            <li>京ICP备14041313号-4</li>
            <li>北京市通讯公司提供网络宽带</li>
            <li>京公网安备110101003008号</li>
            <li>北京市公安局朝阳分局备案编号：11010500</li>
            <li>Copyright@2014 - 2015 SHUHUAPAIPAI 全景统计</li>
        </ul>
    </div>
</div>

</body>
</html>
