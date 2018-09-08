<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">

  <title>Bracket Responsive Bootstrap3 Admin</title>

  <link href="/css/style.default.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
  <script src="/js/jquery-1.11.1.min.js"></script>
  <script src="/js/jquery-migrate-1.2.1.min.js"></script>
  <script src="/js/jquery-ui-1.10.3.min.js"></script>
  <script src="/js/jquery.cookies.js"></script>
  <!-- js文件 -->
  <script src="/js/jquery-1.11.1.min.js"></script>
  <script src="/js/jquery-migrate-1.2.1.min.js"></script>
  <script src="/js/jquery-ui-1.10.3.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/modernizr.min.js"></script>
  <script src="/js/jquery.sparkline.min.js"></script>
  <script src="/js/toggles.min.js"></script>
  <script src="/js/retina.min.js"></script>
  <script src="/js/jquery.cookies.js"></script>

  <script src="/js/flot/jquery.flot.min.js"></script>
  <script src="/js/flot/jquery.flot.resize.min.js"></script>
  <script src="/js/flot/jquery.flot.spline.min.js"></script>
  <script src="/js/morris.min.js"></script>
  <script src="/js/raphael-2.1.0.min.js"></script>

  <script src="/js/custom.js"></script>
  <script src="/js/dashboard.js"></script>
</head>

<body>
<!-- Preloader -->

<section>

  <div class="leftpanel">

    <div class="logopanel">
      <h1><span>[</span> 后台管理系统 <span>]</span></h1>
    </div><!-- logopanel -->

    <div class="leftpanelinner">

      <!-- This is only visible to small devices -->
      <div class="visible-xs hidden-sm hidden-md hidden-lg">
        <div class="media userlogged">
          <img alt="" src="images/photos/loggeduser.png" class="media-object">
          <div class="media-body">
            <h4>John Doe</h4>
            <span>"Life is so..."</span>
          </div>
        </div>

        <h5 class="sidebartitle actitle">Account</h5>
        <ul class="nav nav-pills nav-stacked nav-bracket mb30">
          <li><a href="profile.html"><i class="fa fa-user"></i> <span>Profile</span></a></li>
          <li><a href=""><i class="fa fa-cog"></i> <span>Account Settings</span></a></li>
          <li><a href=""><i class="fa fa-question-circle"></i> <span>Help</span></a></li>
          <li><a href="signout.html"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
        </ul>
      </div>

      <h5 class="sidebartitle">管理列表</h5>
      <ul class="nav nav-pills nav-stacked nav-bracket">
        <li class="active"><a href="http://www.a67web.com"><i class="fa fa-home"></i> <span>首页</span></a></li>
        <li class="nav-parent"><a href="http://www.a67web.com/admin/rbac"><i class="fa fa-edit"></i> <span>RBAC管理</span></a>
          <ul class="children">
            <li><a href="http://www.a67web.com/admin/permission/list"><i class="fa fa-caret-right"></i> 权限列表</a></li>
            <li><a href="http://www.a67web.com/admin/permission/create"><i class="fa fa-caret-right"></i> 添加权限列表</a></li>
            <li><a href="http://www.a67web.com/admin/role/list"><i class="fa fa-caret-right"></i> 角色列表</a></li>
            <li><a href="http://www.a67web.com/admin/role/add"><i class="fa fa-caret-right"></i> 添加角色列表</a></li>
            <li><a href="http://www.a67web.com/admin/user/list"><i class="fa fa-caret-right"></i> 用户列表</a></li>
            <li><a href="http://www.a67web.com/admin/user/add"><i class="fa fa-caret-right"></i> 添加用户列表</a></li>
          </ul>
        </li>

        <li class="nav-parent"><a href="#"><i class="fa fa-edit"></i> <span>签到管理</span></a>
          <ul class="children">
            <li><a href="http://www.a67web.com/admin/permission/list"><i class="fa fa-caret-right"></i> 权限列表</a></li>
          </ul>
        </li>
        <li class="nav-parent"><a href="#"><i class="fa fa-edit"></i> <span>点赞管理</span></a>
          <ul class="children">
            <li><a href="http://www.a67web.com/yes"><i class="fa fa-caret-right"></i> 添加页面</a></li>
            <li><a href="http://www.a67web.com/admin/permission/list"><i class="fa fa-caret-right"></i> 列表页面</a></li>
          </ul>
        </li>

        <li class="nav-parent"><a href="#"><i class="fa fa-edit"></i> <span>红包管理</span></a>
          <ul class="children">
            <li><a href="http://www.a67web.com/redmoney"><i class="fa fa-caret-right"></i> 添加红包</a></li>
            <li><a href="http://www.a67web.com/getmoney"><i class="fa fa-caret-right"></i> 抢红包</a></li>
          </ul>
        </li>
      </ul>

    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->

  <div class="mainpanel">

    <div class="headerbar">

      <a class="menutoggle"><i class="fa fa-bars"></i></a>

      <form class="searchform" action="index.html" method="post">
        <input type="text" class="form-control" name="keyword" placeholder="从这里搜索..." />
      </form>

      <div class="header-right">
        <ul class="headermenu">
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <img src="/images/photos/media2.png" alt="" />
                Newman
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> 账户设置</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> 修改密码</a></li>
                <li><a href="http://www.a67web.com/admin/login"><i class="glyphicon glyphicon-log-out"></i> 退出登录</a></li>
              </ul>
            </div>
          </li>
        </ul>
        
        {{--@if(!empty($permissions))
          @foreach($permissions as $permission)
          <div class="top-permission col-md-12">
            @if(!empty($permission))
              @foreach($permission as $permission)
              <div class="top-ermission col-md-12">
                <a href="javascript:;" class="display-sub-permission-togglt">
                  <span class="glyphicon glyphicon-minus"></span>
                </a>
                <input type="checkbox" name="permissions[]" value="{{$permission['id']}}" class="top-permission-checkbox" {{ in_array($permission['id'], $role_permission) ? "checked" : ""  }}/>
                <label ><h5>&nbsp;&nbsp;{{$permission['name']}}</h5></label>
              </div>
              @if(isset($permission['son']))
                <div class="col-sm-3">
                  @foreach($permission['son'] as $sub)
                    <label ><input type="checkbox" name="permissins[]" value="{{$sub['id']}}" class="sub-permission-checkbox" {{in_array($sub['id'],$role_permission) ? "checked" : ""}} />@if($sub['is_menu'] == 1)<span class="fa fa-bars"></span>@endif&nbsp;&nbsp;{{$sub['name']}}</label>

                    @endforeach
                </div>
          </div>--}}
        
        
      </div><!-- header-right -->

    </div><!-- headerbar -->

   @yield('content')

  </div><!-- mainpanel -->
  <script type="application/javascript">
      //判断菜单
      $("#left-menus li").each(function () {
            if($(this).hasClass('nav-active')){
              $(this).children('ul').css('display', 'block');
            }
      });
  </script>
</section>

</body>
</html>
