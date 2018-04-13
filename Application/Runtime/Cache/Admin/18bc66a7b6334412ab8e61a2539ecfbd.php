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
		<h3 class="page-header">订单管理</h3>
	<div class="padding10">
		<div class="panel panel-primary">
			<div class="panel-heading">商品列表</div>
			<div class="panel-body">
			<form id="singcms-listorder">
				<table class="table table-hover singcms-table">
					<thead>
						<tr>
							<th>订单编号</th>
					        <th>订单生成时间</th>
					        <th>收货人姓名</th>
					        <th>地址</th>
					        <th>联系电话</th>
					        <th>发货状态</th>
					        <th>操作</th>
						</tr>
					</thead>
 
					<tbody>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($v["order_id"]); ?></td>
								<td style="vertical-align: middle !important;"><?php echo (date("Y-m-d H:i",$v["order_time"])); ?></td>
								<td style="vertical-align: middle !important;"><?php echo ($v["adress_name"]); ?></td>
								<td style="vertical-align: middle !important;"><?php echo ($v["address"]); ?></td>
								<td style="vertical-align: middle !important;">
									<span><?php echo ($v["phone"]); ?></span>
								</td>
								<td style="vertical-align: middle !important;">
									<?php if($v["order_send"] == 0): ?><a class="btn btn-danger" id="singcms-delete" attr-id="<?php echo ($v["order_id"]); ?>" attr-message="发货">
											发货
										</a>
									<?php elseif($v["order_send"] == 1 and $v["order_get"] == 0): ?>
										<a class="btn btn-info" >
											已发货
										</a>
									<?php elseif($v["order_send"] == 1 and $v["order_get"] == 1): ?>
										<a class="btn btn-danger">
											已收货
										</a><?php endif; ?>
									<input type="hidden" name="class_id" value="<?php echo ($v["class"]["id"]); ?>">
									<a href="javascript:void(0)" attr-id="<?php echo ($v["id"]); ?>" id="singcms-delete"  attr-a="admin" attr-message="删除">
										
									</a>
								</td>
								<td style="vertical-align: middle !important;">
										<a class="btn btn-danger"　 href="<?php echo U('order/info',array('id'=>$v['order_id']));?>">
											查看明细
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
			</form>
			</div>
		</div>
	</div>
	<script>

	    var SCOPE = {
	        'add_url' : '/index.php/admin/Product/add',
	        'jump_url' : '/index.php/admin/Classify/index',
	        'edit_url' : '/index.php/admin/Classify/edit',
	        'set_status_url' : '/index.php/admin/order/orderSend',
	        'listorder_url' : '/index.php?c=menu&a=listorder',
	        'update_url':'/index.php/admin/Classify/updatename',
	    }
	</script>
	
<script src="/Public/js/admin/common.js"></script>
</div>
</body>
</html>