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
		<h3 class="page-header">商品管理</h3>
	<div class="row">
		<div class="col-md-10">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">添加商品</button>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form id="singcms-form" action="<?php echo U('Product/add');?>"  method="post">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">添加顶级分类</h4>
							</div>
							<div class="modal-body">

								<div class="row"></div>
								<div class="row">
									<div class="col-md-4"></div>

									<div class="col-md-4">
										<div class="form-group">
											<select class="form-control" name="class_id">
												<option value="">==请选择分类==</option>
												<?php if(is_array($class)): foreach($class as $key=>$v): ?><option value="<?php echo ($v["class_id"]); ?>"><?php echo ($v["classname"]); ?></option><?php endforeach; endif; ?>
											</select>
											<div class="col-md-4"></div>
										</div>
									</div>

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
									<input type="submit" value='确定' class="btn btn-primary"  />
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
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
	</div>

	<div class="padding10">
		<div class="panel panel-primary">
			<div class="panel-heading">商品列表</div>
			<div class="panel-body">
				<table class="table table-hover singcms-table">
					<thead>
						<tr>
							<th>id</th>
							<th>商品名称</th>
							<th>商品类型</th>
							<th>价格</th>
							<th>库存</th>
							<th>状态</th>
							<th>操作</th>
						</tr>
					</thead>

					<tbody>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($v["id"]); ?></td>
								<td style="vertical-align: middle !important; text-align: left">
									<img src="<?php echo ($v["img"]); ?>" width="50" height="50"><?php echo ($v["name"]); ?></td>
								<td style="vertical-align: middle !important;"><?php echo ($v["classname"]); ?></td>
								<td style="vertical-align: middle !important;">￥<?php echo ($v["price"]); ?></td>
								<td style="vertical-align: middle !important;"><?php echo ($v["count"]); ?></td>
								<td style="vertical-align: middle !important;">
									<span><?php echo (shelf($v["shelf"])); ?></span>
								</td>
								<td style="vertical-align: middle !important;">
									<a href="<?php echo U('Product/edit',array('id'=> $v['id'],'class_id'=>$v['class_id']));?>" >
										<span class="glyphicon glyphicon-record" ></span>
									</a>
									<input type="hidden" name="class_id" value="<?php echo ($v["class"]["id"]); ?>">
									<a href="javascript:void(0)" attr-id="<?php echo ($v["id"]); ?>" id="singcms-delete"  attr-a="admin" attr-message="删除">
										<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
									</a>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
					<tfoot>
						<tr >
							<td colspan="7" style="text-align:right">
							<div class="pagelist" style="text-align: right"><?php echo ($page); ?></div>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	<script>

	    var SCOPE = {
	        'add_url' : '/index.php/admin/Product/add',
	        'jump_url' : '/index.php/admin/Classify/index',
	        'edit_url' : '/index.php/admin/Classify/edit',
	        'set_status_url' : '/index.php/admin/Product/setstatus',
	        'listorder_url' : '/index.php?c=menu&a=listorder',
	        'update_url':'/index.php/admin/Classify/updatename',
	    }
	</script>
	
<script src="/Public/js/admin/common.js"></script>
</div>
</body>
</html>