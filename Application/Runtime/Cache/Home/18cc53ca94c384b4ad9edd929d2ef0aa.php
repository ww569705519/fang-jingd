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
<div class="container" >
	<div class="col-xs-5 text-center" style="padding: 10px ">
		<div class="col-xs-12" style="padding: 0px">
			<div style="border:1px solid #e7e7e7;padding: 20px;">
				<img src="<?php echo ($productdata["img"]); ?>" width="370" ></div>
		</div>
		<div class="col-xs-12" style="margin-top: 10px;padding: 0px">
			<div class="col-xs-3" style="border:1px solid #e7e7e7;padding: 20px;">
				<img src="/Public/img/a.jpg" width="55"></div>
			<div class="col-xs-3" style="border:1px solid #e7e7e7;padding: 20px;">
				<img src="/Public/img/a.jpg" width="55"></div>
			<div class="col-xs-3" style="border:1px solid #e7e7e7;padding: 20px;">
				<img src="/Public/img/a.jpg" width="55"></div>
			<div class="col-xs-3" style="border:1px solid #e7e7e7;padding: 20px;">
				<img src="/Public/img/a.jpg" width="55"></div>
		</div>
	</div>
	<div class="col-xs-7" style="padding: 10px 40px;font-weight: 700 !important;color: #666 !important;">
		<h3 style="padding:30px 0px;padding-top: 0px"><?php echo ($productdata["name"]); ?></h3>
		<h3 style="padding:30px 0px;">
			库存
			<span style="color:green;font-size: 20px;margin-left: 30px" id="count"><?php echo ($productdata["count"]); ?></span>
		</h3>
		<div class="col-xs-12">
			<div class="form-inline " style="padding:30px 0px;">
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon" style="cursor: pointer" onclick="add()">
							<span class="glyphicon glyphicon-plus"  ></span>
						</div>
						<input type="number" id="num" class="form-control" style="width: 50px !important;" value="1">
						<div class="input-group-addon" style="cursor: pointer" onclick="cut()">
							<span class="glyphicon glyphicon-minus"  ></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12" style="padding:30px 0px;">
			<div class="col-xs-5">
				<a class="btn btn-danger" style="padding:10px 30px;font-weight: 700 !important;font-size:18px"  onclick="post(<?php echo ($productdata["id"]); ?>)" id="buy">立即购买</a>
			</div>
			<div class="col-xs-5">
				<a class="btn btn-danger" style="padding:10px 30px;font-weight: 700 !important;font-size: 18px" onclick="addCart(<?php echo ($productdata["id"]); ?>)" id="addCart">加入购物车</a>
			</div>
		</div>
	</div>
	<div class="col-xs-12" style="margin-top: 30px;">
		<ul class="nav nav-tabs">
			<li role="presentation" class="active" >
				<a href="#">商品详情</a>
			</li>
			<li role="presentation" >
				<a href="#">累计评论</a>
			</li>
		</ul>
		<div class="col-xs-12 text-center" style="padding:30px" id="info">
			<?php echo ($productdata["info"]); ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		var count=parseInt($("#count").text());
		if(count<=0){
			$('#buy').attr("disabled",true).removeAttr("onclick"); 
			$('#addCart').attr("disabled",true).removeAttr("onclick"); 
		}
	});
	function post(a){
		// $.post()
		var isurl='/index.php/home/common/isLogin2';
		  $.getJSON(isurl,function(result){
		  if(result.status==0){
		    	return pop.success('请先登录', '/index.php/home/login');	
		    }else if(result.status==1){
		    	var count=parseInt($("#count").text());
			    	if($("#num").val()>count){
			    		return pop.error('库存不足');
			    	}else{
			    		var num=parseInt($("#num").val());
						var url='/index.php/home/order/proOrder/id/'+a+'/num/'+num;
						window.location.href=url;
			    	}
		    }
		  });
	}
	function addCart(product_id){
		// $.post()
		var url='/index.php/home/cart/add';
		var num=$("#num").val();
		  $.post(url,{product_id:product_id,product_num:num},function(result){
		  if(result.status==0){
		    	return pop.error(result.message);	
		    }else if(result.status==1){
		    	var cartList=result.data;
		    	$('#cartList').html(cartList);
		    	return pop.successshow(result.message);
		    }
		  },"JSON");
	}
	
	function add(){
		var count=parseInt($("#count").text());
		var num=$("#num").val();
		if(num<count){
			num++;
			$("#num").val(num);
		}
		
	}
	function cut(){
		var num=$("#num").val();
		if (num>1) {
			num--;
			$("#num").val(num);
		}
	}
	$("#num").blur(function(){
		var count=parseInt($("#count").text());
		var num=$(this).val();
		if(num<=0){
			$(this).val(1);
			return pop.error('购买数量不能少于1');
		}else if(num>0 && num<count){
			$(this).val(num);
		}else{
			$(this).val(count);
		}
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