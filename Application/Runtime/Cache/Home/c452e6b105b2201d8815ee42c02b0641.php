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

    <title>订单页面</title>

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
<hr>
<form  id="formaaa">
	<div class="container" >
		<div class="col-xs-12">
			<h3>收货地址</h3>
		</div>
		<div class="col-xs-12">
			<?php if(is_array($address)): foreach($address as $key=>$x): ?><div class="col-xs-3">
					<?php if($x["active"] == 1): ?><div  class='col-xs-12 get-adress adress'>
							<?php else: ?>
							<div  class='col-xs-12 nol-adress adress'><?php endif; ?>
							<p ><?php echo ($x["adress_name"]); ?></p>
							<p  style="width: 100%;height: 70px;"><?php echo ($x["address"]); ?></br>
							(<?php echo ($x["phone"]); ?>)
						</p>
						<a  style="float: left" class="sing-active" attr-id="<?php echo ($x["address_id"]); ?>">设置为默认地址</a>
						<a  style="float: right" class="sing-delete" attr-id="<?php echo ($x["address_id"]); ?>">
							<span class="glyphicon glyphicon-remove"></span>
						</a>
					</div>
				</div><?php endforeach; endif; ?>
			<input type="hidden" name="address_id" id="address_id" value="">
			<div class="col-xs-3">
				<div class="text-left" style="width: 100%;height: 100px;padding-top:20px;padding-left: 0px;">
					<a href="<?php echo U('userinfo/index');?>" class="btn btn-danger btn-sm">新建联系人</a>
				</div>
			</div>
		</div>
	</form>
	<div class="col-xs-12">
		<h3 >你的订单详情</h3>
	</div>

	<hr>
	<div class="col-xs-12">
		<table class="table " style="border-bottom: 2px ridge #DDDDDD">
			<thead >
				<th>商品名称</th>
				<th class="text-center" >商品数量</th>
				<th class="text-center">商品单价</th>
				<th class="text-center" >小计</th>
			</thead>
			<tbody class="text-center">
					<tr>
						<td style="vertical-align: middle !important;" class="text-left">
							<img src="<?php echo ($product["img"]); ?>" height="70"><?php echo ($product["name"]); ?></div>
					</td>
					<td style="vertical-align: middle !important;"><?php echo ($product["num"]); ?></td>
					<td style="vertical-align: middle !important;">￥<?php echo ($product["price"]); ?></td>
					<td style="vertical-align: middle !important;">￥<?php echo ($product['price']*$product['num']); ?></td>
					<input type="hidden" name="product_id" value="<?php echo ($product["id"]); ?>">
					<input type="hidden" name="product_num" value="<?php echo ($product["num"]); ?>">
				</tr>
		</tbody>
	</table>
</div>
<div class="col-xs-12">
	<div class="col-xs-4"></div>
	<div class="col-xs-5"></div>
	<div class="col-xs-3">
		<div class="col-xs-12">
			<div class="col-xs-6" style="padding:10px 0px">商品总价</div>
			<div class="col-xs-6" style="padding:10px 0px">￥<?php echo ($product['price']*$product['num']); ?></div>
		</div>
		<div class="col-xs-12" style="border-bottom:1px solid #e7e7e7">
			<div class="col-xs-6" style="padding:10px 0px">选择快递</div>
			<div class="col-xs-6" style="padding:10px 0px">
				<p>
					<div class="checkbox">
						<label>
							<input type="checkbox" checked>中通快递</label>
					</div>
				</p>
				<p>
					<div class="checkbox">
						<label>
							<input type="checkbox">顺丰快递</label>
					</div>
				</p>
			</div>
		</div>
		<div class="col-xs-12" style="margin-top: 20px;">
			<div class="col-xs-6">订单总额</div>
			<div class="col-xs-6">
				<h3 style="color: #c9302c">￥<?php echo ($product['price']*$product['num']); ?></h3>
			</div>
			<div class="col-xs-12 text-center" style="margin-top: 20px;">
				<a class="btn btn-danger" id="submit">提交订单</a>
			</div>
		</div>
	</div>
	</form>
</div>
	</div>
<script type="text/javascript">
    var SCOPE = {
        'set_status_url' : '/index.php/home/userinfo/setstatus',
        'set_active_url':'/index.php/home/userinfo/setActive',
    }
    $(function(){
    	$(".adress").click(function(){
    		$('.get-adress').addClass('nol-adress').removeClass('get-adress');
    		$(this).addClass('get-adress').removeClass('nol-adress');
    	});
    })
    $(function(){
    	    $("#submit").click(function(){
	    	var address_id=$(".get-adress").find("a").attr('attr-id');
	    	$("#address_id").val(address_id);

	    	var url="/index.php/home/order/addOrder";
	    	var data=$("#formaaa").serialize();
		    $.post(url,data,function(result){
	   			if (result.status==0) {
	   				return pop.error(result.message);
	   			}else if(result.status==1){
	   				return pop.success(result.message,result.data);
	   			}
	  	  },"JSON");
	    	
	    });
    });

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