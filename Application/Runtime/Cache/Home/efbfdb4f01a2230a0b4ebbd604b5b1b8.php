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
        <link rel="stylesheet" type="text/css" href="/~GreysTone/eas/Public/css/list.css" />

        <script>
            function check_student(){
                var studentid = prompt('请输入要快速检录的学号', '');
                var element = document.getElementById('list_enroll_with_studentid_' + studentid);
                if(element == null){
                    alert('未发现该生信息，尝试刷新页面');
                    return ;
                }else{
                    var tarName = element.firstChild.nextSibling.nextSibling.nextSibling;
                    var tarGender = tarName.nextSibling.nextSibling;
                    var tarPhone = tarGender.nextSibling.nextSibling;
                    var outId = document.getElementById('row_check_output_id');
                    outId.innerHTML = studentid;
                    var outName = document.getElementById('row_check_output_name');
                    outName.innerHTML = tarName.innerHTML;
                    var outGender = document.getElementById('row_check_output_gender');
                    outGender.innerHTML = tarGender.innerHTML;
                    var outPhone = document.getElementById('row_check_output_phone');
                    outPhone.innerHTML = tarPhone.innerHTML;
                    var outForm = document.getElementById('row_check_output_checkinForm');
                    outForm.setAttribute('action', outForm.getAttribute('url'));
                    var outInput = document.getElementById('row_check_output_checkinInput');
                    outInput.setAttribute('value', studentid);
                    var outButton = document.getElementById('row_check_output_checkinButton');
                    outButton.setAttribute('class', 'btn btn-xs btn-success btn-block')
                }
            }
        </script>
    </head>

    <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo ($profile_url); ?>">面试考核系统</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo ($profile_url); ?>">个人页面</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo ($logout_url); ?>">登出</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
          <div class="table-responsive">
              <h2>快速检录</h2>
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>学号</th>
                          <th>姓名</th>
                          <th>性别</th>
                          <th>联系方式</th>
                          <th>操作</th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <th id="row_check_output_id">-</th>
                          <th id="row_check_output_name">-</th>
                          <th id="row_check_output_gender">-</th>
                          <th id="row_check_output_phone">-</th>
                          <th><button class="btn btn-xs btn-primary btn-block" onclick="check_student()">查询</button></th>
                          <th>
                              <form id="row_check_output_checkinForm" action="" method="post" url="<?php echo ($checkin_url); ?>">
                                  <input id="row_check_output_checkinInput" type="hidden" name="stuid" value="">
                                  <button id="row_check_output_checkinButton" class="btn btn-xs btn-default btn-block">检录</button>
                              </form>
                          </th>
                      </tr>
                  </tbody>
              </table>

              <br />
              <h2>待检录队列</h2>
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>学号</th>
                      <th>姓名</th>
                      <th>性别</th>
                      <th>联系方式</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php if(is_array($fetchEnroll)): $i = 0; $__LIST__ = $fetchEnroll;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$e): $mod = ($i % 2 );++$i;?><tr id="list_enroll_with_studentid_<?php echo ($e["studentid"]); ?>">
                            <th><?php echo ($e["studentid"]); ?></th>
                            <th><?php echo ($e["studentname"]); ?></th>
                            <th>
                                <?php
 switch ($e['gender']){ case 0: echo '女'; break; case 1: echo '男'; break; } ?>
                            </th>
                            <th><?php echo ($e["mobilephone"]); ?>/<?php echo ($e["shortphone"]); ?></th>
                            <th>
                                <form action="<?php echo ($checkin_url); ?>" method="post">
                                    <input type="hidden" name="stuid" value=<?php echo ($e["studentid"]); ?>>
                                    <button class="btn btn-xs btn-success btn-block" type="submit">检录</button>
                                </form>
                            </th>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                  </tbody>
                </table>

                <br />
                <h2>已检录队列</h2>
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>学号</th>
                        <th>面试部门</th>
                        <th>面试状态</th>
                        <th>检录时间</th>
                        <th>随机流水</th>
                        <th>正式流水</th>
                        <th>一面时间</th>
                        <th>二面时间</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                <tbody>
                    <?php if(is_array($fetchInterviewee)): $i = 0; $__LIST__ = $fetchInterviewee;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$i): $mod = ($i % 2 );++$i;?><tr>
                          <th><?php echo ($i["studentid"]); ?></th>
                          <th>
                              <?php
 switch ($i['multisector']) { case 0: echo '未知'; break; case 1: echo '电视台'; break; case 2: echo '广播台'; break; case 3: echo '电视台 广播台'; break; case 4: echo '校报社'; break; case 5: echo '电视台 校报社'; break; case 6: echo '广播台 校报社'; break; case 7: echo '电视台 广播台 校报社'; break; } ?>
                          </th>
                          <th>
                              <?php
 switch ($i['status']) { case 0: echo '未知'; break; case 1: echo '未检录'; break; case 2: echo '放弃面试'; break; case 4: echo '等待第一轮面试'; break; case 8: echo '正在进行第一轮面试'; break; case 12: echo '未检录'; break; case 16: echo '等待第二轮面试'; break; case 32: echo '正在进行第二轮面试'; break; case 64: echo '面试不通过'; break; case 128: echo '面试通过'; break; } ?>
                          </th>
                          <th><?php echo ($i["checkintime"]); ?></th>
                          <th><?php echo ($i["serialdigit"]); ?></th>
                          <th><?php echo ($i["serialnumber"]); ?></th>
                          <th><?php echo ($i["time1tid"]); ?></th>
                          <th><?php echo ($i["time2tid"]); ?></th>
                          <th>
                              <!-- <form action="<?php echo ($checkout_url); ?>" method="post"> -->
                                  <!-- <input type="hidden" name="stuid" value=<?php echo ($i["studentid"]); ?>> -->
                                  <!-- <button class="btn btn-xs btn-danger btn-block" type="submit">移除</button> -->
                              <!-- </form> -->
                          </th>
                      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
              </table>

            </div>
        </div>

    </div><!-- /.container -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script type="text/javascript" src="/~GreysTone/eas/Public/js/jquery-1.11.3.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript" src="/~GreysTone/eas/Public/js/bootstrap.min.js"></script>

    </body>
</html>