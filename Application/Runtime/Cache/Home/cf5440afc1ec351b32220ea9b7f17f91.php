<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 2 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Note there is no responsive meta tag here -->

    <link rel="icon" href="../../favicon.ico">

    <title>热销产品</title>

    <!-- Bootstrap core CSS -->
    <link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Public/font-awesome/css/font-awesome.min.css">
    <link href="/Public/css/no-respose.css" rel="stylesheet">
    <link href="/Public/css/home.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->
    <!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
-->
<script src="/Public/js/jquery-1.9.0.js"></script>
<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
<script src="/Public/js/layer/layer.js"></script>
<script src="/Public/js/popup.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<nav class="navbarr navbar-default ">
    <div class="container " >
        <div id="navbar">
            <ul class="nav navbar-nav navv nav-height">
                <li>
                    <a href="/index.php">首页</a>
                </li>
                <li>
                    <a href="<?php echo U('cart/index');?>">我的购物车</a>
                </li>
                <li>
                    <a href="<?php echo U('order/myOrder');?>">我的订单</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right navv">
                <?php if($username): ?><li>
                    <a href="<?php echo U('userinfo/index');?>"><span style="color: #d9534f">欢迎你，</span><?php echo ($username["email"]); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo U('login/loginout');?>">退出</a>
                    </li>
                    <?php else: ?>
                    <li>
                        <a href="/index.php/Home/login/index">登录</a>
                    </li>
                    <li>
                        <a href="/index.php/Home/login/index">注册</a>
                    </li><?php endif; ?>
            </ul>
        </div>
        <!--/.nav-collapse --> </div>
</nav>

<div class="container" >
    <div class="row">
        <div class="col-xs-3 center" >
            <a href="/index.php" >
                <img src="/Public/img/logo.png" ></a>
        </div>
        <div class="col-xs-7 text-center" style="padding-left:50px;padding-top:20px;">

            <div class="searchbox">
                <span class="glyphicon glyphicon-search" style="position:absolute;left:10px;font-size: 17px;top:11px;color: #e8e8e8"></span>
                <input type="text" style="outline:none;border: 2px #d9534f solid;height:37px;width:400px;float: left;padding-left: 28px;"/>
                <input type="button" value="搜索" style="background-color: #d9534f;color: white;float:left;outline:none;border: none;height: 37px;font-size: 16px;padding: 0px 30px;"></div>
        </div>
        <div class="col-xs-2" style="padding-top: 20px;">
            <div class="col-xs-6">
                <a class="btn btn-danger" type="button" href="<?php echo U('cart/index');?>">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                    购物车
                    <span class="badge" style="margin-left: 10px;" id="cartList">
                        <?php if($cartList): echo ($cartList); ?>
                            <?php else: ?>
                            0<?php endif; ?>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- header -->
    <nav class="navsty"  >
        <div class="container" style="padding-left: 120px;">
                <ul>
                    <?php if(is_array($navs)): foreach($navs as $key=>$v): ?><li>
                            <a href="<?php echo U('Products/index',array('class_id'=>$v['class_id']));?>" class="nav-pub" style=""><?php echo ($v["classname"]); ?></a>
                        </li><?php endforeach; endif; ?>
                </ul>

        </div>
    </nav>
    <hr>    
	<div class="container">
	<?php if($order): ?><div class="col-xs-12">
	
		<?php if(is_array($order)): foreach($order as $key=>$v): ?><form class="orderform">
		<div class="panel panel-danger">
			<div class="panel-heading" style="color: white;background-color: #D9534F !important"><?php echo (date("Y-m-d H:i",$v["order_time"])); ?><span style="margin-left: 30px;">订单号13143435123<?php echo ($v["order_id"]); ?></span></div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>商品详情</th>
							<th class="text-center">单价</th>
							<th class="text-center">购买数量</th>
							<th class="text-center">订单总价</th>
							<th class="text-center">订单状态</th>
						</tr>
					</thead>
					<tbody>
						<tr class="text-center">
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
									
									<td style="vertical-align: middle !important;border-top:none !important" class="text-center">
										<h5 >￥<span id="price-<?php echo ($v["cart_id"]); ?>"><?php echo ($v['product_num']*$v['price']); ?></span>
										<p>(含运费￥0.00)</p></h5>
									</td>
									<td style="vertical-align: middle !important;border-top:none !important">
										<?php if($v["order_send"] == 0): ?><a class="singg-delete btn btn-danger" >
											等待发货</a>
										
										<?php elseif($v["order_send"] == 1 and $v["order_get"] == 0): ?>
										<span   class="btn btn-danger" onclick="orderGet(<?php echo ($v["order_id"]); ?>)">
											确认收货</span>
											<input type="hidden"  value="<?php echo ($v["order_id"]); ?>">
										
										<?php else: endif; ?>
										<span  attr-id="<?php echo ($v["cart_id"]); ?>" class="singg-delete btn btn-danger" >
											查看物流</span>
										<?php if($v["order_send"] == 1 and $v["order_get"] == 1): ?><p style="margin-bottom: -40px;padding: 20px;"><a onclick="orderDel(<?php echo ($v["order_id"]); ?>)" class="btn btn-danger">删除订单</a></p>
										<?php else: endif; ?>
									</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<input type="hidden" name="order_id<?php echo ($v["oreder_id"]); ?>" />
		</form><?php endforeach; endif; ?>
	</div>
	<?php else: ?>
		<div class="jumbotron" style="background: none !important">
			<h1>暂无任何订单消息，请赶紧去购物吧</h1>
			<p style="margin-top: 20px;">
				<a class="btn btn-lg btn-danger" href="<?php echo U('index/index');?>" role="button">商城主页</a>
			</p>
		</div><?php endif; ?>
</div>
<script type="text/javascript">
	function orderGet(order_id){
		var url='/index.php/home/order/orderGet';
		var data={order_id:order_id};
		$.post(url,data,function(res){
			if (res.status==1) {
				return pop.success(res.message,res.data);
			}else{
				return pop.error(res.message);
			}
		},"JSON");
	}
	function orderDel(order_id){
		var url='/index.php/home/order/orderDel';
		var data={order_id:order_id};
		// $.post(url,data,function(res){
		// 	if (res.status==1) {
		// 		return pop.success(res.message,res.data);
		// 	}else{
		// 		return pop.error(res.message);
		// 	}
		// },"JSON");
	    layer.confirm('是否确定删除订单？', {
			  btn: ['确定','取消'] 
			}, function(){
				 $.post(
			        url,
			        data,
			        function(res){
			            if(res.status == 1) {
			                  return pop.success(res.message,res.data);
			            }else {
			                return pop.error(res.message);
			            }
			        }
			    ,"JSON");
			}, function(){
			  });
	}
</script>
<footer style="margin-top: 50px;">
<div style="height: 260px;background-color: #000;width: 100%">
	<div class="container" style="padding-top: 40px;">
		<div class="col-xs-8" style="color:#fff">
			<div class="col-xs-3 text-center">
				<h4>购物指南</h4>
				<ul>
					<li class="footer-li">购物流程</li>
					<li class="footer-li">会员介绍</li>
					<li class="footer-li">生活旅行/团购</li>
					<li class="footer-li">常见问题</li>
					<li class="footer-li">大家电</li>
					<li class="footer-li">联系客服</li>
				</ul>
			</div>
			<div class="col-xs-3 text-center">
			<h4>配送方式</h4>
				<ul>
				<li class="footer-li">上门自提</li>
				<li class="footer-li">211限时达</li>
				<li class="footer-li">配送服务查询</li>
				<li class="footer-li">配送费收取标准</li>
				<li class="footer-li">海外配送</li>
				</ul>
			</div>
			<div class="col-xs-3 text-center">
			<h4>售后服务</h4>
				<ul>
					<li class="footer-li">售后政策</li>
					<li class="footer-li">价格保护</li>
					<li class="footer-li">退款说明</li>
					<li class="footer-li">返修/退换货</li>
					<li class="footer-li">取消订单</li>
				</ul>
			</div>
			<div class="col-xs-3 text-center">
			<h4>支付方式</h4>
				<ul>
					<li class="footer-li">货到付款</li>
					<li class="footer-li">在线支付</li>
					<li class="footer-li">分期付款</li>
					<li class="footer-li">邮局汇款</li>
					<li class="footer-li">公司转账</li>
				</ul>
			</div>
		</div>
		<div class="col-xs-4" style="padding: 30px;color: #fff">
			<div style="width: 180px;border-radius: 20px;background-color: #ff5b5a;height: 40px;
    line-height: 40px;text-align: center;display: inline-block;border-radius: 20px;color: #fff;font-size: 14px;">
				<span class="glyphicon glyphicon-earphone" style="font-size: 16px;"></span>
				<span style="margin-left: 6px;font-size: 16px;">411-222-9512</span>
			</div>
			<p style="margin-top: 20px;font-size: 12px">周一至周六: 09:00 - 17:30</p>
			<p style="margin-top: 20px;font-size: 12px">个人QQ: 569705519</p>
		</div>
		
	</div>
</div>
</footer>
</body>
<script src="/Public/js/admin/common.js"></script>
<script src="/Public/js/public.js"></script>
</html>