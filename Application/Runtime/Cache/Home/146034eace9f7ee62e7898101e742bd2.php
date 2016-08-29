<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ZJUBTV 面试考核系统</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" type="text/css" href="/~GreysTone/eas/Public/css/bootstrap.min.css" />
        <!-- Custom CSS-->
        <link rel="stylesheet" type="text/css" href="/~GreysTone/eas/Public/css/profile.css" />

    </head>
    <body>

    <!-- Static navbar -->
        <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">面试考核系统</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">
            <li class="active"><a>个人页面</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo ($logout_url); ?>">登出</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <p>
            <h2>浙江大学广播电视台面试考核系统</h2>
            <h1>欢迎 <?php echo ($profile['username']); ?></h1>
        </p>
        <br />
        <p>
            <h4><b>您隶属于</b>
                <?php
 switch($profile['sector']){ case 0: echo '未知'; break; case 1: echo '电视台'; break; case 2: echo '广播台'; break; case 3: echo '校报部'; break; } ?>
            </h4>
            <h4><b>您的用户ID号码</b>
                <?php echo ($profile['uid']); ?>
            </h4>
        </p>
        <br />
        <p>
            <h4><b>当前环节</b> <?php echo ($round); ?></h4>
            <h4><b>有效操作</b></h4>
            <?php if(is_array($actions)): $i = 0; $__LIST__ = $actions;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$act): $mod = ($i % 2 );++$i; echo ($act); endforeach; endif; else: echo "" ;endif; ?>
        </p>
        <br />
        <p>
            <h5>更改用户密码请登陆 <b>bbs.zjutv.com</b></h5>
        </p>
        <br />
        <p><h5>浙江大学广播电视台 广电中心</h5></p>
      </div>
    </div> <!-- /container -->


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>-->
        <script type="text/javascript" src="/~GreysTone/eas/Public/js/jquery-1.11.3.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript" src="/~GreysTone/eas/Public/js/bootstrap.min.js"></script>

    </body>
</html>