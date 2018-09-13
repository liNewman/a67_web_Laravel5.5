<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/images/favicon.png" type="image/png">

    <title>后台管理系统</title>

    <link href="/css/style.default.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
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

                <form method="post" action="/admin/doLogin">
                    {{csrf_field()}}
                    <h4 class="nomargin">登录</h4>
                    <p class="mt5 mb20"></p>

                    <input type="text" name="username" class="form-control uname" value="{{old('username') or null}}" placeholder="用户名" />
                    <input type="password" name="password" class="form-control pword" placeholder="密码" />
                    <a href=""><small>Forgot Your Password?</small></a>
                    <p style="color:red" id="error_msg"></p>
                    @if(session('msg'))
                        {{session('msg')}}
                        @endif

                    <button class="btn btn-success btn-block login">立即登录</button>

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
<script src="/js/jquery-1.11.1.min.js"></script>
<script>
   $(".login").click(function () {
     var username=$("input[name='username']").val();
     var password=$("input[name='password']").val();
     
     if (username==''){
         $("#error_msg").text('用户名不能为空');
         return false;
     }

     
     if (password==''){
         $("#error_msg").text('密码不能为空');
         return false;
     }

       if (username.length<6){
           $("#error_msg").text('用户名不能小于6位');
           return false;
       }

     if (password.length<6){
         $("#error_msg").text('密码不能小于6位');
         return false;
     }
   });
</script>
</body>
</html>
