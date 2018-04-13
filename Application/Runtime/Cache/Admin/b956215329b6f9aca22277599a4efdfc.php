<?php if (!defined('THINK_PATH')) exit(); $username = session('adminUser'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>后台主页</title>

  <link href="/Public/css/public.css" type="text/css" rel="stylesheet">
  <link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/Public/css/public.css" rel="stylesheet">
  <link rel="stylesheet" href="/Public/font-awesome/css/font-awesome.min.css">
  <link href="/Public/css/public-html.css" rel="stylesheet">
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
    <nav class="navbar navbar-inverse navbar-fixed-top">
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
<ul class="nav navbar-nav side-nav">
    <li>
        <a href="<?php echo U('Index/index');?>" style="color: #9d9d9d">首页</a>
    </li>
    <?php if(is_array($navs)): foreach($navs as $key=>$v): ?><li>
            <a href="<?php echo (getAdminMenuUrl($v)); ?>" style="color: #9d9d9d"><?php echo ($v["name"]); ?></a>
        </li><?php endforeach; endif; ?>
</ul>
<div id="page-wrapper" >

	<div class="col-lg-12">
		<h3 class="page-header">菜单管理</h3>
	</div>
	<div class="row">
		<form action="<?php echo U('menu/index');?>" method="get">

			<div class="col-md-10">
				<a class="btn btn-default" type="submit" href="<?php echo U('menu/add');?>">添加</a>
				<div class="btn-group">
					<div class="dropdown">
						<select class="form-control" name="type">
                            <option value='' >请选择类型</option>

                            <option value="1" <?php if($type == 1): ?>selected="selected"<?php endif; ?>
                            >后台菜单
                        </option>
                        <option value="0" <?php if($type == 0): ?>selected="selected"<?php endif; ?>
                        >前端导航
                    </option>
                    <select>
                    </div>
				</div>
				<button class="btn btn-default" type="submit">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</div>
			<div class="col-md-2">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="请输入关键字">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>
			</div>
		</form>
	</div>

	<div class="padding10">
		<div class="panel panel-primary">
			<div class="panel-heading">菜单列表</div>
			<div class="panel-body">
				<table class="table table-hover singcms-table">
					<thead>
						<tr>
							<th>排序</th>
							<th>id</th>
							<th>菜单名</th>
							<th>模块名</th>
							<th>类型</th>
							<th>状态</th>
							<th>操作</th>
						</tr>
					</thead>

					<tbody>
						<?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($v["listorder"]); ?></td>
								<td><?php echo ($v["menu_id"]); ?></td>
								<td><?php echo ($v["name"]); ?></td>
								<td><?php echo ($v["m"]); ?></td>
								<td><?php echo (getMenuType($v["type"])); ?></td>
								<td><?php echo (status($v["status"])); ?></td>
								<td>
									<a href="javascript:void(0)">
										<span class="glyphicon glyphicon-edit" aria-hidden="true" id="singcms-edit" attr-id="<?php echo ($v["menu_id"]); ?>"></span>
									</a>
									<a href="javascript:void(0)"  >
										<span class="glyphicon glyphicon-remove-sign" attr-id="<?php echo ($v["menu_id"]); ?>" attr-message="删除" id="singcms-delete"  attr-message="删除"></span>
									</a>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script>

	    var SCOPE = {
	        'add_url' : '/index.php?c=menu&a=add',
	        'edit_url' : '/index.php/admin/menu/edit',
	        'set_status_url' : '/index.php/admin/menu/setstatus',
	        'listorder_url' : '/index.php?c=menu&a=listorder',

	    }
	</script>
	
<script src="/Public/js/admin/common.js"></script>
</div>
</body>
</html>