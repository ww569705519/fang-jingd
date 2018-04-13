<?php if (!defined('THINK_PATH')) exit(); $username = session('adminUser'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>后台主页</title>

  <link href="/Public/css/public.css" type="text/css" rel="stylesheet">
  <link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/Public/css/public.css" rel="stylesheet"></head>
  <link rel="stylesheet" href="/Public/css/party/bootstrap-switch.css" />
  <link rel="stylesheet" type="text/css" href="/Public/css/party/uploadify.css">

  <script src="/Public/js/jquery-1.9.0.js"></script>
  <script src="/Public/bootstrap/js/bootstrap.min.js"></script>
  <script src="/Public/js/layer/layer.js"></script>
  <script src="/Public/js/popup.js"></script>
  <script src="/Public/js/admin/image.js"></script>
  <script type="text/javascript" src="/Public/js/party/jquery.uploadify.js"></script>

<body>
  <div id="wrapper">
    <nav class="navbar  navbar-fixed-top navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo U('Index/index');?>">商城管理系统</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-user"></span>
                你好，
                <?php echo $username['username'];?>
                !
                <span class="glyphicon glyphicon-triangle-bottom"></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="#">
                    <span class="glyphicon glyphicon-cog"></span>
                    个人设置
                  </a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a href="<?php echo U('Login/loginout');?>">
                    <span class="glyphicon glyphicon-off"></span>
                    用户退出
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse --> </div>
      <!-- /.container-fluid --> </nav>
<?php
 $navs = D("Menu")->getAdminMenus(); ?>
<ul class="nav navbar-nav side-nav navbar-default">
    <li>
        <a href="<?php echo U('Index/index');?>">首页</a>
    </li>
    <?php if(is_array($navs)): foreach($navs as $key=>$v): ?><li>
            <a href="<?php echo (getAdminMenuUrl($v)); ?>" ><?php echo ($v["name"]); ?></a>
        </li><?php endforeach; endif; ?>
</ul>
<div id="page-wrapper" >
	<div class="col-lg-12">
		<h1 class="page-header">用户添加</h1>
	</div>
	<form class="form-horizontal" id="singcms-form">
		<div class="form-group">
			<label class="col-md-2 control-label">用户名</label>
			<div class="col-md-7">
				<input type="text" class="form-control"  placeholder="请输入用户名" name="username"></div>
		</div>
		
		
		<div class="form-group">
			<label class="col-md-2 control-label">密码</label>
			<div class="col-md-7">
				<input type="password" class="form-control"  placeholder="请填写密码" name="password"></div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">真实姓名</label>
			<div class="col-md-7">
				<input type="text" class="form-control"  name="realname" placeholder="请填写真实姓名"></div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label"></label>
			<div class=" col-md-7">
				<button type="button" class="btn btn-default" id="singcms-button-submit">提交</button>
			</div>
		</div>
	</form>
	<script>

    var SCOPE = {
        'save_url' : '/index.php/admin/AdminUser/add',
        'jump_url' : '/index.php/admin/AdminUser',
    }
	</script>
	
<script src="/Public/js/admin/common.js"></script>
</div>
</body>
</html>