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

    <title>购物车</title>

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
<form action="<?php echo U('order/index');?>" method="post">
<div class="container">
	<div class="col-xs-12">
		<div class="col-xs-9" style="padding-top: 10px;">
			<?php if($cart): ?><div class="col-xs-12" >
					<table class="table">
						<thead>
							<th>商品详情</th>
							<th class="text-center">单价</th>
							<th class="text-center">购买数量</th>
							<th class="text-center">小计</th>
						</thead>
						<tbody>
							<?php if(is_array($cart)): foreach($cart as $key=>$v): ?><tr>
									<td style="vertical-align: middle !important;border-top:none !important">
										<img src="<?php echo ($v["img"]); ?>" height="80" style="margin-right: 20px;">
										<a href="<?php echo U('productinfo/index',array('id'=>$v['id']));?>"><?php echo ($v["name"]); ?></a>
									</td>
									<td style="vertical-align: middle !important;border-top:none !important"> 
										<h5>￥<span><?php echo ($v["price"]); ?></span></h5>
									</td>
									<td style="vertical-align: middle !important;border-top:none !important">
										<div class="btn-group" role="group" >
											<a class="btn btn-danger" onclick="add(<?php echo ($v["cart_id"]); ?>,<?php echo ($v["price"]); ?>)">
												<span class="glyphicon glyphicon-plus"></span>
											</a>
											<input type="number" class="btn btn-default" style="cursor: default!important;width: 60px" value="<?php echo ($v["product_num"]); ?>" id="num-<?php echo ($v["cart_id"]); ?>" oninput="valChange(<?php echo ($v["cart_id"]); ?>,this.value,<?php echo ($v["price"]); ?>)" name="product_num[]"/>
											<a class="btn btn-danger" onclick="cut(<?php echo ($v["cart_id"]); ?>,<?php echo ($v["price"]); ?>)">
												<span class="glyphicon glyphicon-minus"  ></span>
											</a>
										</div>
									</td>
									
									<td style="vertical-align: middle !important;border-top:none !important">
										<h5 >￥<span id="price-<?php echo ($v["cart_id"]); ?>"><?php echo ($v['product_num']*$v['price']); ?></span></h5>
									</td>
									<td style="vertical-align: middle !important;border-top:none !important">
										<a  attr-id="<?php echo ($v["cart_id"]); ?>" class="singg-delete" style="cursor:pointer">
											<span class="glyphicon glyphicon-remove" ></span>
										</a>
									</td>

									<input type="hidden" name="product_id[]" value="<?php echo ($v["id"]); ?>">
								</tr><?php endforeach; endif; ?>
						</tbody>
					</table>
				</div>
				<?php else: ?>
				<div class="col-xs-12" >
					<div class="jumbotron" style="background: none !important">
						<h2>你的购物车空空如也，赶紧去购物吧！</h2>
						<p style="margin-top: 20px;">
							<a class="btn btn-lg btn-danger" href="<?php echo U('index/index');?>" role="button">去购物</a>
						</p>
					</div>
				</div><?php endif; ?>
		</div>
		<div class="col-xs-3" style="border-radius: 5px; border:1px solid #e7e7e7">
			<h3>商品购物车</h3>
			<hr>
			<p>
				购物车总价
				<span style="float: right" >￥<span class="total"><?php echo ($total); ?></span></span>
			</p>
			<p>订单总价</p>
			<h3 class="text-right" >
				￥
				<span class="total"><?php echo ($total); ?></span>
			</h3>
			<p class="text-right">
				<input class="btn btn-danger" value="去结算" type="submit" />
			</p>
			<p class="text-right">
				<a href="<?php echo U('index/index');?>">继续购物</a>
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
</form>
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

<script type="text/javascript">
	var SCOPE = {
        'set_status_url' : '/index.php/home/cart/delCart',
    }
    function add(id,price){
		   var num=$("#num-"+id).val();
			num++;
			$("#num-"+id).val(num);
			valChange(id,num,price);
	}
	function valChange(id,num,price){
		if(num>0){
			var newprice=(price*num);
			var url="<?php echo U('cart/upCart');?>";
			data={cart_id:id,product_num:num};
			$.post(url,data,function(result){
				if(result.status==1){
					$("#price-"+id).html(newprice);
					$(".total").each(function(){
					    $(this).html(result.data);
					  });
				}
			},"JSON");
		}else{
			$("#num-"+id).val(1);
		}
		
	}
    function cut(id,price){
		   var num=$("#num-"+id).val();
		   if(num>1){
			   	num--;
				$("#num-"+id).val(num);
				valChange(id,num,price);
		   }
			
	}
    $('.singg-delete').on('click',function(){
    	var a=$(this);
	    var id = $(this).attr('attr-id');
	    var url = SCOPE.set_status_url; 
	    data = {};
	    data['id'] = id;
	    layer.confirm('是否确定删除？', {
			  btn: ['确定','取消'] 
			}, function(){
				 $.post(
			        url,
			        data,
			        function(s){
			            if(s.status == 1) {
			                  a.parents("tr").remove();
			                  $(".total").each(function(){
							    $(this).html(s.data);
							  });
			                 layer.msg('删除成功', {icon: 1,time: 700});
			            }else {
			                return pop.error(s.message);
			            }
			        }
			    ,"JSON");
			}, function(){
			  });
			});
	    
</script>