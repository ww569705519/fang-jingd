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

    <title>商城首页</title>

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
    <script src="/Public/js/angular/angular1.5.5.min.js"></script>
    <script src="/Public/js/home/app.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body ng-app="myApp">

<!-- Fixed navbar -->
<nav class="navbarr navbar-default ">
    <div class="container " >
        <div id="navbar">
            <ul class="nav navbar-nav navv nav-height">
                <li>
                    <a href="/index.php">首页</a>
                </li>
                <li>
                    <a href="#"> 
                        我的购物车
                    </a>
                </li>
                <li>
                    <a href="#about">我的订单</a>
                </li>
            </ul>
            <!--           <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search"></div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        -->
        <ul class="nav navbar-nav navbar-right navv">
            <?php if($username): ?><li><a href="<?php echo U('userinfo/index');?>"><?php echo ($username["email"]); ?></a></li>
                <li><a href="<?php echo U('login/loginout');?>">退出</a></li>
            <?php else: ?>
                <li>
                    <a href="/index.php/Home/login/index">登录</a>
                </li>
                <li>
                    <a href="/index.php/Home/login/index">注册</a>
                </li><?php endif; ?>
            <!-- <li>
                <a href="#" style="color: #C40000 !important">退出</a>
            </li> -->

        </ul>
    </div>
    <!--/.nav-collapse -->
</div>
</nav>

<div class="container">
<div class="row">
    <div class="col-xs-3 center" >
        <a href="/index.php" >
            <img src="/Public/img/logo.png" width="160" height="50"></a>
    </div>
    <div class="col-xs-6">
        <div class="col-xs-12"> <i class="fa fa-phone" style="font-weight:bold;color:#DE0202;font-size: 18px;"></i>
            (+086) 123 456 7890
            <i class="fa fa-envelope mar-l-10" style="font-weight:bold;color:#DE0202;font-size: 18px;"></i>
            569705519@qq.com
        </div>
        <div class="col-xs-12 mar-t-10">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="搜索商品">
                <span class="input-group-btn" >
                    <button class="btn btn-default" type="button" style="background-color:#DE0202 !important">
                        <i class="fa fa-search" style="color:white"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>
    <div class="col-xs-3 left" style="padding-top: 20px;">
        <div class="col-xs-3">
            <span class="glyphicon glyphicon-shopping-cart" style="font-size: 35px;color:#928585;"></span>
        </div>
        <div class="col-xs-6">
            <div class="clo-xs-12">
                <span style="font-family:'微软雅黑';">你的购物车</span>
            </div>
            <div class="clo-xs-12" style="font-size: 20px;color:#DE0202;font-weight: bold">
                <i class="fa fa-rmb"></i>
                0
            </div>
        </div>
    </div>
</div>
</div>
<hr>
<div class="container">
	<div class="col-xs-12">
		<div class="col-xs-9" style="padding-top: 50px;">
			<div class="col-xs-12" >
				<table class="table">
					<tbody>
						<tr>
							<td style="vertical-align: middle !important;border-top:none !important">
								<img src="/Public/img/a.jpg" height="80" style="margin-right: 20px;">
								<a href="">aaaaaaa</a>
							</td>
							<td style="vertical-align: middle !important;border-top:none !important">
								<div class="btn-group" role="group" >
									<button class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span></button>
									<input type="text" class="btn btn-default" style="cursor: default!important;width: 60px" value="1" />
									<button class="btn btn-danger"><span class="glyphicon glyphicon-minus"  ></span></button>
								</div>
							</td>
							<td style="vertical-align: middle !important;border-top:none !important">
								<h4>￥6690.00</h4>
							</td>
							<td style="vertical-align: middle !important;border-top:none !important">
								<span class="glyphicon glyphicon-remove" style="cursor:pointer"></span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-xs-3" style="border-radius: 5px; border:1px solid #e7e7e7">
			<h3>商品购物车</h3>
			<hr>
			<p>
				购物车总价
				<span style="float: right">￥6690</span>
			</p>
			<p>订单总价</p>
			<h3 class="text-right">￥6690</h3>
			<p class="text-right">
				<button class="btn btn-danger">去结算</button>
			</p>
			<p class="text-right">
				<a href="">继续购物</a>
			</p>
			<h3>使用优惠券</h3>
			<hr>
			<p class="text-right">
				<input type="text" class="form-control"  placeholder="输入优惠码"></p>
			<p class="text-right">
				<button class="btn btn-danger">使用</button>
			</p>
		</div>
	</div>
</div>