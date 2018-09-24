<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>新建工作日志</title>
    <link href="/css/bootstrap.min.css" type="text/css"  rel="stylesheet"/>
    <link href="/css/bootstrap-editable.css" type="text/css"  rel="stylesheet"/>
    <link href="/css/bootstrap-override.css" type="text/css"  rel="stylesheet"/>
    <link href="/css/bootstrap-timepicker.css" type="text/css"  rel="stylesheet"/>
    <script language="javascript" src="/js/scrollpic.js"></script>
    <SCRIPT src="/js/jquery-1.4.2.min.js" type=text/javascript></SCRIPT>
    <SCRIPT src="/js/top.js" type=text/javascript></SCRIPT>
</head>


<h2>新建工作日志</h2>


<div class="form-group">
    <div class="col-sm-6">
        日期: <input type="date" id="date" name="date">
    </div>
</div>



<div class="col-sm-6">
    <!-- 加载编辑器的容器 -->
    <textarea id="container" name="content" type="text/plain"></textarea>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/UEeditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/UEeditor/ueditor.all.js"></script>
</div>

<div class="col-sm-6">
    <!-- 加载编辑器的容器 -->
    <textarea id="container1" name="content" type="text/plain"></textarea>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/UEeditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/UEeditor/ueditor.all.js"></script>
</div>




<div class="form-control">
    <button class="btn btn-success" id="addbutton">添加</button>
</div>
<div class="col-md-12">


    <p style="margin-left: 400px">姓名: 管理员&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp部门：小微企业&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 时间：2015.4.7-2015.4.8</p>

        <table border="1" width="1500" cellpadding="0" style="margin-left: 100px">
            <tr>
                <td>1</td>
                <td>1</td>
            </tr>
        </table>

</div>
<script >
    var ue1 = UE.getEditor('container');
    var ue = UE.getEditor('container1');


    $("#addbutton").click(function (){
        var date = $("#date").val();
        var content = ue.getContent();
        var content1 = ue1.getContent();
        alert(content);
    });
</script>

</html>