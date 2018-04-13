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
		<h3 class="page-header">订单详情</h3>
	<div class="padding10">
		<div class="panel panel-primary">
			<div class="panel-heading">订单编号:<?php echo ($data[0]['order_id']); ?></div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>商品详情</th>
							<th class="text-center">单价</th>
							<th class="text-center">购买数量</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-center">
							<td class="text-left" style="vertical-align: middle !important;border-top:none !important">
										<img src="<?php echo ($v["img"]); ?>" height="80" style="margin-right: 20px;">
										<a href="<?php echo U('productinfo/index',array('id'=>$v['id']));?>"><?php echo ($v["name"]); ?></a>
									</td>
									<td style="vertical-align: middle !important;border-top:none !important"> 
										<h5>￥<span><?php echo ($v["price"]); ?></span></h5>
									</td>
									<td style="vertical-align: middle !important;border-top:none !important">
										数量：<?php echo ($v["product_num"]); ?>
									</td>
									
									
								
						</tr><?php endforeach; endif; ?>
					</tbody>
					<tfoot>
							<td class="text-left">
								<h3>订单总价：<span style="color: #c9302c;font-size: 25px;">￥<?php echo ($num); ?></span></h3>
							</td>
							<td colspan="2" class="text-right">
										<?php if($v["order_send"] == 0): ?><a class="singg-delete btn btn-danger btn-sm" >
											等待发货</a>
										
										<?php elseif($v["order_send"] == 1 and $v["order_get"] == 0): ?>
										<span class="btn btn-danger btn-sm"   >
											用户未收货</span>
										<?php else: endif; ?>
										<span  attr-id="<?php echo ($v["cart_id"]); ?>" class="btn btn-danger btn-sm" >
											查看物流</span>
									</td>
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