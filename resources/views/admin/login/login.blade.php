<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">

    <title>后台管理系统-登录</title>

    <link href="/css/style.default.css" rel="stylesheet">

    <!-- js文件 -->
    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="/js/jquery-ui-1.10.3.min.js"></script>
    <script src="/js/jquery.cookies.js"></script>

  

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="signin">
<section>
  
    <div class="signinpanel">
        
        <div class="row">
            
            <div class="col-md-7">
                
                <div class="signin-info">
                    <div class="logopanel">
                        <h1><span>[</span> 后台管理系统 <span>]</span></h1>
                    </div><!-- logopanel -->
                
                    <div class="mb20"></div>
                
                    <p>
                        <img src="/images/admin-icon.png" width="300">
                    </p>
                </div><!-- signin0-info -->
            
            </div><!-- col-sm-7 -->
            
            <div class="col-md-5">
                
                <form method="post" action="/admin/dologin">
                {{ csrf_field() }}

                     <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Well done!</strong> You successfully read this <a href="" class="alert-link">important alert message</a>.
        </div>

                    <h4 class="nomargin">登录</h4>
                    <p class="mt5 mb20"></p>
                
                    <input type="text" name="username" class="form-control uname" placeholder="用户名" />
                    <input type="password" name="password" class="form-control pword" placeholder="密码" />
                    <span color="pink" id="error_msg">
                        @if(session('msg'))
                            
                        @endif
                    </span>
                    <button class="btn btn-success btn-block loginin">立即登录</button>
                    
                </form>
            </div><!-- col-sm-5 -->
            
        </div><!-- row -->
        
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2014. All Rights Reserved. Bracket Bootstrap 3 Admin Template
            </div>
        </div>
        
    </div><!-- signin -->
  
</section>

<script type="text/javascript">
    $(".loginin").click(function () {
        var username = $("input[name='username']").val();
        var password = $("input[name='password']").val();
        //username 验证
        if(username == ''){
            $("#error_msg").text('用户名不能为空');
            return false;
        }
        //password 验证
        if(password == ''){
            $("#error_msg").text('密码不能为空');
            return false;
        }
        //username length验证
        if(username.length < 6){
            $("#error_msg").text('用户名不能少于6位');
            return false;
        }
        //password length验证
        if(password.length < 6){
            $("#error_msg").text('密码不能少于6位');
            return false;
        }

        
    });
</script>

</body>
</html>
