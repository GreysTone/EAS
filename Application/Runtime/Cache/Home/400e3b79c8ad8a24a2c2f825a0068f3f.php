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
    <link rel="stylesheet" type="text/css" href="/~GreysTone/eas/Public/css/administration.css" />

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
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="http://v3.bootcss.com/examples/dashboard/#">概况 <span class="sr-only">(current)</span></a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li><a href="#USER">用户管理</a></li>
                    <li><a href="#SECTOR">部门管理</a></li>
                    <li><a href="#STATUS">状态管理</a></li>
                    <li><a href="#TIME">考核时间管理</a></li>
                    <li><a href="#ROOM">考核地点管理</a></li>
                    <li><a href="#TAGSMETA">考核Tags管理</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li><a href="#INTERVIEWEE">考核人员管理</a></li>
                    <li><a href="#GROUP">分组清单</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li><a href="">实时状态</a></li>
                    <li><a href="">日志清单</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

                <h1># 0</h1>
                <h2 class="sub-header">全局不可逆控制</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>
                                <form action="<?php echo ($dangerctl_url); ?>" method="post">
                                    <input type="hidden" name="request" value="resetRemoteDatabase">
                                    <button class="btn btn-m btn-danger">重置远程数据库</button>
                                </form>
                            </th>
                            <th>
                                <form action="<?php echo ($dangerctl_url); ?>" method="post">
                                    <input type="hidden" name="request" value="dropInterviewee">
                                    <button class="btn btn-m btn-danger">丢弃本地已检录数据</button>
                                </form>
                            </th>
                            <th>
                                <form action="<?php echo ($dangerctl_url); ?>" method="post">
                                    <input type="hidden" name="request" value="dropWaitingList">
                                    <button class="btn btn-m btn-danger">丢弃本地等候队列</button>
                                </form>
                            </th>
                            <th>
                                <form action="<?php echo ($dangerctl_url); ?>" method="post">
                                    <input type="hidden" name="request" value="resetRoom">
                                    <button class="btn btn-m btn-danger">重置本地考点状态</button>
                                </form>
                            </th>
                            <th>
                                <form action="<?php echo ($dangerctl_url); ?>" method="post">
                                    <input type="hidden" name="request" value="dropGroup">
                                    <button class="btn btn-m btn-danger">丢弃本地分组信息</button>
                                </form>
                            </th>
                            <th>
                                <form action="<?php echo ($dangerctl_url); ?>" method="post">
                                    <input type="hidden" name="request" value="dropRTC">
                                    <button class="btn btn-m btn-danger">丢弃全部考核数据</button>
                                </form>
                            </th>
                        </thead>
                        <tbody>
                            <th>
                                <form action="<?php echo ($dangerctl_url); ?>" method="post">
                                    <input type="hidden" name="request" value="dropRoom">
                                    <button class="btn btn-m btn-danger">丢弃本地考点信息</button>
                                </form>
                            </th>
                            <th>
                                <form action="<?php echo ($dangerctl_url); ?>" method="post">
                                    <input type="hidden" name="request" value="simuEnroll">
                                    <button class="btn btn-m btn-warning">以中文基准神经连接</button>
                                </form>
                            </th>
                            <th>
                                <form action="<?php echo ($dangerctl_url); ?>" method="post">
                                    <input type="hidden" name="request" value="dropSimuEnroll">
                                    <button class="btn btn-m btn-warning">丢弃安全装置信息</button>
                                </form>
                            </th>
                            <th>
                                <form action="<?php echo ($dangerctl_url); ?>" method="post">
                                    <input type="hidden" name="request" value="confirmGrades">
                                    <button class="btn btn-m btn-success">确认全部面试成绩</button>
                                </form>
                            </th>
                        </tbody>
                    </table>
                </div>


                <a name="USER"></a>
                <h1># 1</h1>
                <h2 class="sub-header">用户管理</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>用户名</th>
                                <th>密码</th>
                                <th>邮件地址</th>
                                <th>所属部门</th>
                                <th>权限</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($fetchUser)): $i = 0; $__LIST__ = $fetchUser;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?><tr>
                                    <th><?php echo ($u["uid"]); ?></th>
                                    <th><?php echo ($u["username"]); ?></th>
                                    <th><?php echo ($u["password"]); ?></th>
                                    <th><?php echo ($u["email"]); ?></th>
                                    <th>
                                        <?php
 foreach ($fetchSector as $f) { if($f['sid'] == $u['sector']){ echo $f['description']; break; } } ?>
                                    </th>
                                    <th>
                                        <?php
 switch($u['authority']){ case 16: echo '系统管理员'; break; case 1: echo '检录工作人员'; break; case 2: echo '引导工作人员'; break; case 3: echo '屏幕展示'; break; case 4: echo '副面试人员'; break; case 8: echo '主面试人员'; break; } ?>
                                            - <?php echo ($u["authority"]); ?>
                                    </th>
                                    <th>
                                        <form action="<?php echo ($management_url); ?>" method="post">
                                            <input type="hidden" name="request" value="delete">
                                            <input type="hidden" name="target" value="USER">
                                            <input type="hidden" name="uid" value="<?php echo ($u["uid"]); ?>">
                                            <button class="btn btn-xs btn-danger btn-block" type="submit">DEL</button>
                                        </form>
                                    </th>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            <tr>
                                <form action="<?php echo ($management_url); ?>" method="post">
                                    <input type="hidden" name="request" value="insert">
                                    <input type="hidden" name="target" value="USER">
                                    <th></th>
                                    <th>
                                        <input type="text" name="username" class="form-control" required="">
                                    </th>
                                    <th>
                                        <input type="password" name="password" class="form-control" required="">
                                    </th>
                                    <th>
                                        <input type="email" name="email" class="form-control" required="">
                                    </th>
                                    <th>
                                        <input type="text" name="sector" class="form-control" required="">
                                    </th>
                                    <th>
                                        <input type="text" name="authority" class="form-control" required="">
                                    </th>
                                    <th>
                                        <button class="btn btn-sm btn-success btn-block" type="submit">ADD</button>
                                    </th>
                                </form>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <a name="SECTOR"></a>
                <h1># 2</h1>
                <h2 class="sub-header">部门管理</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>部门描述</th>
                                <th>表单命名</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($fetchSector)): $i = 0; $__LIST__ = $fetchSector;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?><tr>
                                    <th><?php echo ($s["sid"]); ?></th>
                                    <th><?php echo ($s["description"]); ?></th>
                                    <th><?php echo ($s["naming"]); ?></th>
                                    <th>
                                        <form action="<?php echo ($management_url); ?>" method="post">
                                            <input type="hidden" name="request" value="delete">
                                            <input type="hidden" name="target" value="SECTOR">
                                            <input type="hidden" name="sid" value="<?php echo ($s["sid"]); ?>">
                                            <button class="btn btn-xs btn-danger btn-block" type="submit">DEL</button>
                                        </form>
                                    </th>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            <tr>
                                <form action="<?php echo ($management_url); ?>" method="post">
                                    <input type="hidden" name="request" value="insert">
                                    <input type="hidden" name="target" value="SECTOR">
                                    <th></th>
                                    <th>
                                        <input type="text" name="description" class="form-control" required="">
                                    </th>
                                    <th>
                                        <input type="text" name="naming" class="form-control" required="">
                                    </th>
                                    <th>
                                        <button class="btn btn-sm btn-success btn-block" type="submit">ADD</button>
                                    </th>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <a name="STATUS"></a>
                <h1># 3</h1>
                <h2 class="sub-header">状态管理</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>当前状态</th>
                                <th>操作</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><?php echo ($fetchRound); ?></th>
                                <th>
                                    <form action="<?php echo ($management_url); ?>" method="post">
                                        <input type="hidden" name="request" value="update">
                                        <input type="hidden" name="target" value="STATUS">
                                        <input type="hidden" name="value" value="1">
                                        <button class="btn btn-xs btn-warning btn-block" type="submit">等待</button>
                                    </form>
                                </th>
                                <th>
                                    <form action="<?php echo ($management_url); ?>" method="post">
                                        <input type="hidden" name="request" value="update">
                                        <input type="hidden" name="target" value="STATUS">
                                        <input type="hidden" name="value" value="2">
                                        <button class="btn btn-xs btn-warning btn-block" type="submit">一面</button>
                                    </form>
                                </th>
                                <th>
                                    <form action="<?php echo ($management_url); ?>" method="post">
                                        <input type="hidden" name="request" value="update">
                                        <input type="hidden" name="target" value="STATUS">
                                        <input type="hidden" name="value" value="6">
                                        <button class="btn btn-xs btn-warning btn-block" type="submit">二面</button>
                                    </form>
                                </th>
                                <th>
                                    <form action="<?php echo ($management_url); ?>" method="post">
                                        <input type="hidden" name="request" value="update">
                                        <input type="hidden" name="target" value="STATUS">
                                        <input type="hidden" name="value" value="14">
                                        <button class="btn btn-xs btn-warning btn-block" type="submit">结束</button>
                                    </form>
                                </th>
                                <th>
                                    <form action="<?php echo ($management_url); ?>" method="post">
                                        <input type="hidden" name="request" value="update">
                                        <input type="hidden" name="target" value="STATUS">
                                        <input type="hidden" name="value" value="254">
                                        <button class="btn btn-xs btn-danger btn-block" type="submit">零号机</button>
                                    </form>
                                </th>
                                <th>
                                    <form action="<?php echo ($management_url); ?>" method="post">
                                        <input type="hidden" name="request" value="update">
                                        <input type="hidden" name="target" value="STATUS">
                                        <input type="hidden" name="value" value="255">
                                        <button class="btn btn-xs btn-danger btn-block" type="submit">初号机</button>
                                    </form>
                                </th>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <a name="TIME"></a>
                <h1># 4</h1>
                <h2 class="sub-header">考核时间管理</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>考核日期</th>
                                <th>考核时刻</th>
                                <th>描述</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($fetchTime)): $i = 0; $__LIST__ = $fetchTime;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?><tr>
                                    <th><?php echo ($t["tid"]); ?></th>
                                    <th><?php echo ($t["datespec"]); ?></th>
                                    <th><?php echo ($t["timespec"]); ?></th>
                                    <th><?php echo ($t["description"]); ?></th>
                                    <th>
                                        <form action="<?php echo ($management_url); ?>" method="post">
                                            <input type="hidden" name="request" value="delete">
                                            <input type="hidden" name="target" value="TIME">
                                            <input type="hidden" name="tid" value="<?php echo ($t["tid"]); ?>">
                                            <button class="btn btn-xs btn-danger btn-block" type="submit">DEL</button>
                                        </form>
                                    </th>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            <tr>
                                <form action="<?php echo ($management_url); ?>" method="post">
                                    <input type="hidden" name="request" value="insert">
                                    <input type="hidden" name="target" value="TIME">
                                    <th></th>
                                    <th>
                                        <input type="text" name="datespec" class="form-control" required="">
                                    </th>
                                    <th>
                                        <input type="text" name="timespec" class="form-control" required="">
                                    </th>
                                    <th>
                                        <input type="text" name="description" class="form-control" required="">
                                    </th>
                                    <th>
                                        <button class="btn btn-sm btn-success btn-block" type="submit">ADD</button>
                                    </th>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <a name="ROOM"></a>
                <h1># 5</h1>
                <h2 class="sub-header">考核地点管理</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>考点</th>
                                <th>状态</th>
                                <th>部门</th>
                                <th>GID</th>
                                <th>开放</th>
                                <th>C1</th>
                                <th>S1</th>
                                <th>S2</th>
                                <th>S3</th>
                                <th>S4</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>S5</th>
                                <th>S6</th>
                                <th>S7</th>
                                <th>S8</th>
                                <th>S9</th>
                                <th>S10</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($fetchRoom)): $i = 0; $__LIST__ = $fetchRoom;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><tr>
                                    <th><?php echo ($r["rid"]); ?></th>
                                    <th><?php echo ($r["roomnumber"]); ?></th>
                                    <th><?php echo ($r["roomstatus"]); ?></th>
                                    <th><?php echo ($r["sector"]); ?></th>
                                    <th><?php echo ($r["gid"]); ?></th>
                                    <th><?php echo ($r["susr_count"]); ?></th>
                                    <th><?php echo ($r["suid_core"]); ?></th>
                                    <th><?php echo ($r["suid1"]); ?></th>
                                    <th><?php echo ($r["suid2"]); ?></th>
                                    <th><?php echo ($r["suid3"]); ?></th>
                                    <th><?php echo ($r["suid4"]); ?></th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th><?php echo ($r["suid5"]); ?></th>
                                    <th><?php echo ($r["suid6"]); ?></th>
                                    <th><?php echo ($r["suid7"]); ?></th>
                                    <th><?php echo ($r["suid8"]); ?></th>
                                    <th><?php echo ($r["suid9"]); ?></th>
                                    <th><?php echo ($r["suid10"]); ?></th>
                                    <th>
                                        <form action="<?php echo ($management_url); ?>" method="post">
                                            <input type="hidden" name="request" value="delete">
                                            <input type="hidden" name="target" value="ROOM">
                                            <input type="hidden" name="rid" value="<?php echo ($r["rid"]); ?>">
                                            <button class="btn btn-xs btn-danger btn-block" type="submit">DEL</button>
                                        </form>
                                    </th>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                            <form action="<?php echo ($management_url); ?>" method="post">
                                <input type="hidden" name="request" value="insert">
                                <input type="hidden" name="target" value="ROOM">
                                <tr>
                                    <th></th>
                                    <th>
                                        <input type="text" name="roomnumber" class="form-control" required="">
                                    </th>
                                    <th></th>
                                    <th>
                                        <input type="text" name="sector" class="form-control" required="">
                                    </th>
                                    <th></th>
                                    <th></th>
                                    <th>
                                        <input type="text" name="suid_core" class="form-control" required="">
                                    </th>
                                    <th>
                                        <input type="text" name="suid1" class="form-control" required="">
                                    </th>
                                    <th>
                                        <input type="text" name="suid2" class="form-control" required="">
                                    </th>
                                    <th>
                                        <input type="text" name="suid3" class="form-control" required="">
                                    </th>
                                    <th>
                                        <input type="text" name="suid4" class="form-control" required="">
                                    </th>
                                </tr>
                                <tr></tr>
                                <th></th>
                                <th>
                                    <input type="text" name="suid5" class="form-control" required="">
                                </th>
                                <th>
                                    <input type="text" name="suid6" class="form-control" required="">
                                </th>
                                <th>
                                    <input type="text" name="suid7" class="form-control" required="">
                                </th>
                                <th>
                                    <input type="text" name="suid8" class="form-control" required="">
                                </th>
                                <th>
                                    <input type="text" name="suid9" class="form-control" required="">
                                </th>
                                <th>
                                    <input type="text" name="suid10" class="form-control" required="">
                                </th>
                                <th>
                                    <button class="btn btn-sm btn-success btn-block" type="submit">ADD</button>
                                </th>
                                </tr>
                            </form>

                        </tbody>
                    </table>
                </div>

                <a name="TAGSMETA"></a>
                <h1># 6</h1>
                <h2 class="sub-header">考核Tags管理</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tags描述</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($fetchTagsmeta)): $i = 0; $__LIST__ = $fetchTagsmeta;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?><tr>
                                    <th><?php echo ($t["tagid"]); ?></th>
                                    <th><?php echo ($t["description"]); ?></th>
                                    <th>
                                        <form action="<?php echo ($management_url); ?>" method="post">
                                            <input type="hidden" name="request" value="delete">
                                            <input type="hidden" name="target" value="TAGSMETA">
                                            <input type="hidden" name="tagid" value="<?php echo ($t["tagid"]); ?>">
                                            <button class="btn btn-xs btn-danger btn-block" type="submit">DEL</button>
                                        </form>
                                    </th>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            <tr>
                                <form action="<?php echo ($management_url); ?>" method="post">
                                    <input type="hidden" name="request" value="insert">
                                    <input type="hidden" name="target" value="TAGSMETA">
                                    <th></th>
                                    <th>
                                        <input type="text" name="description" class="form-control" required="">
                                    </th>
                                    <th>
                                        <button class="btn btn-sm btn-success btn-block" type="submit">ADD</button>
                                    </th>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <a name="INTERVIEWEE"></a>
                <h1># 7</h1>
                <h2 class="sub-header">考核人员管理</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>学号</th>
                                <th>姓名</th>
                                <th>状态</th>
                                <th>SN</th>
                                <th>转换</th>
                                <th>操作</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <form action="<?php echo ($transfer_url); ?>" method="post">
                                        <input type="hidden" name="request" value="transfer">
                                        <input type="hidden" name="studentid" value="all">
                                        <button class="btn btn-xs btn-primary">全部转换</button>
                                    </form>
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($fetchEnroll)): $i = 0; $__LIST__ = $fetchEnroll;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$e): $mod = ($i % 2 );++$i;?><tr>
                                    <th><?php echo ($e["studentid"]); ?></th>
                                    <th><?php echo ($e["studentname"]); ?></th>
                                    <?php
 for($i = 0; $i < count($fetchInterviewee); $i++) { if($fetchInterviewee[$i]['studentid'] === $e['studentid']){ echo '<th>' . $fetchInterviewee[$i]['status'] . '</th>'; echo '<th>' . $fetchInterviewee[$i]['serialnumber'] . '</th>'; echo '<th>' . '</th>'; echo '<th>'; echo '<form action="' . $transfer_url . '" method="post">'; echo '<input type="hidden" name="request" value="remove">'; echo '<input type="hidden" name="studentid" value="' . $e['studentid'] . '">'; echo '<button class="btn btn-xs btn-danger">强制移除</button>'; echo '</form>'; echo '</th>'; break; } } if($i == count($fetchInterviewee)) { echo '<th>未转换</th>'; echo '<th>未转换</th>'; echo '<th>'; echo '<form action="' . $transfer_url . '" method="post">'; echo '<input type="hidden" name="request" value="transfer">'; echo '<input type="hidden" name="studentid" value="' . $e['studentid'] . '">'; echo '<button class="btn btn-xs btn-primary">转换</button>'; echo '</form>'; echo '</th>'; echo '<th>' . '</th>'; } ?>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>

                <a name="GROUP"></a>
                <h1># 8</h1>
                <h2 class="sub-header">分组清单</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>环节</th>
                                <th>开放</th>
                                <th>M1</th>
                                <th>M2</th>
                                <th>M3</th>
                                <th>M4</th>
                                <th>M5</th>
                                <th>M6</th>
                                <th>M7</th>
                                <th>M8</th>
                                <th>M9</th>
                                <th>MA</th>
                                <th>MB</th>
                                <th>MC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($fetchGroup)): $i = 0; $__LIST__ = $fetchGroup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><tr>
                                    <th><?php echo ($g["gid"]); ?></th>
                                    <th><?php echo ($g["round"]); ?></th>
                                    <th><?php echo ($g["member_count"]); ?></th>
                                    <th>
                                        <?php echo substr($g['member1_sn'], 36, 4); ?>
                                    </th>
                                    <th>
                                        <?php echo substr($g['member2_sn'], 36, 4); ?>
                                    </th>
                                    <th>
                                        <?php echo substr($g['member3_sn'], 36, 4); ?>
                                    </th>
                                    <th>
                                        <?php echo substr($g['member4_sn'], 36, 4); ?>
                                    </th>
                                    <th>
                                        <?php echo substr($g['member5_sn'], 36, 4); ?>
                                    </th>
                                    <th>
                                        <?php echo substr($g['member6_sn'], 36, 4); ?>
                                    </th>
                                    <th>
                                        <?php echo substr($g['member7_sn'], 36, 4); ?>
                                    </th>
                                    <th>
                                        <?php echo substr($g['member8_sn'], 36, 4); ?>
                                    </th>
                                    <th>
                                        <?php echo substr($g['member9_sn'], 36, 4); ?>
                                    </th>
                                    <th>
                                        <?php echo substr($g['member10_sn'], 36, 4); ?>
                                    </th>
                                    <th>
                                        <?php echo substr($g['member11_sn'], 36, 4); ?>
                                    </th>
                                    <th>
                                        <?php echo substr($g['member12_sn'], 36, 4); ?>
                                    </th>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>-->
    <script type="text/javascript" src="/~GreysTone/eas/Public/js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="/~GreysTone/eas/Public/js/bootstrap.min.js"></script>

</body>

</html>