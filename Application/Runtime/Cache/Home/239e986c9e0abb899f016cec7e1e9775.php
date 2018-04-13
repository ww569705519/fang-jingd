<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
  <div class="col-xs-12" style="margin-bottom: 30px;">
   
<div class="col-xs-9">
  <h2 style="font: bold 20px/40px 'microsoft yahei' !important;color:#75A9E5">推荐商品</h2>
  
  <div class="col-xs-12" style="padding:20px 0px;border:1px solid #ddd;border-radius: 2px;height: 312px;padding:10px 22px;">
            <div class="floordata" style="border: none;width:200px;" >
              <div class="movedraw center">
                <figure class="movedraw1" style="height: 206px;padding-top: 10px;">
                   <img src="/Public/img/bb1.jpg" height="160"  width="160 " alt="" />
                </figure>

                <div style="width:100%;height:36px;padding:0px 10px;">
                  <a href="">LG 24MP77HM-P 23.8英寸</a>
                </div>
                <div style="width:100%;height:18px;margin-top: 10px;" class="aad">￥1099</div>
              </div>
              <div style=""></div>
            </div>
            <div class="floordata" style="border-left:1px solid #e7e7e7;width:200px;" >
              <div class="movedraw center">
                <figure class="movedraw1" style="height: 206px;padding-top: 10px;">
                   <img src="/Public/img/bb2.jpg" height="160"  width="160 " alt="" />
                </figure>

                <div style="width:100%;height:36px;padding:0px 10px;">
                  <a href="">LG 24MP77HM-P 23.8英寸</a>
                </div>
                <div style="width:100%;height:18px;margin-top: 10px;" class="aad">￥1099</div>
              </div>
              <div style=""></div>
            </div>
            <div class="floordata" style="border-left:1px solid #e7e7e7;width:200px;" >
              <div class="movedraw center">
                <figure class="movedraw1" style="height: 206px;padding-top: 10px;">
                   <img src="/Public/img/bb3.jpg" height="160"  width="160 " alt="" />
                </figure>

                <div style="width:100%;height:36px;padding:0px 10px;">
                  <a href="">LG 24MP77HM-P 23.8英寸</a>
                </div>
                <div style="width:100%;height:18px;margin-top: 10px;" class="aad">￥1099</div>
              </div>
              <div style=""></div>
            </div>
            <div class="floordata" style="border-left:1px solid #e7e7e7;width:200px;" >
              <div class="movedraw center">
                <figure class="movedraw1" style="height: 206px;padding-top: 10px;">
                   <img src="/Public/img/bb1.jpg" height="160"  width="160 " alt="" />
                </figure>

                <div style="width:100%;height:36px;padding:0px 10px;">
                  <a href="">LG 24MP77HM-P 23.8英寸</a>
                </div>
                <div style="width:100%;height:18px;margin-top: 10px;" class="aad">￥1099</div>
              </div>
              <div style=""></div>
            </div>
            
        
      </div>



  <!-- <div class="col-xs-4" style="background-color:white !important;border:1px solid #e7e7e7">
    <div class="movedraw center">
      <figure class="movedraw1">
        <img src="/Public/img/bb1.jpg" height="200"  width="200" alt="" />
      </figure>

      <img src="/Public/img/movedraw.png" class="movedraw-pos">
      <p >
        <a href="">LG 24MP77HM-P 23.8英寸</a>
      </p>
      <hr>
      <p style="font-weight: bold;font-size: 18px;color:#C40000">￥1099</p>
    </div>
  </div>
  <div class="col-xs-4" style="background-color:white !important;border:1px solid #e7e7e7">
    <div class="movedraw center">
      <figure class="movedraw1">
        <img src="/Public/img/bb2.jpg" height="200"  width="200" alt="" />
      </figure>

      <img src="/Public/img/movedraw.png" class="movedraw-pos">
      <p >
        <a href="">飞利浦（PHILIPS）277E7EDSW</a>
      </p>
      <hr>
      <p style="font-weight: bold;font-size: 18px;color:#C40000">￥1199</p>
    </div>
  </div>
  <div class="col-xs-4" style="background-color:white !important;border:1px solid #e7e7e7">
    <div class="movedraw center">
      <figure class="movedraw1">
        <img src="/Public/img/bb3.jpg" height="200"  width="200" alt="" />
      </figure>

      <img src="/Public/img/movedraw.png" class="movedraw-pos">
      <p >
        <a href="">三星（SAMSUNG）C27F591FD</a>
      </p>
      <hr>
      <p style="font-weight: bold;font-size: 18px;color:#C40000">￥1599</p>
    </div>
  </div> -->






</div>
 <div class="col-xs-3" >
      <h2 style="font: bold 20px/40px 'microsoft yahei' !important;color:#7FD077">销量排行</h2>
      <div class="right-content">
        <ul>
          <li class="num1 curr">
            <p><img src="/Public/img/bb2.jpg"  width="140"></p>
            <a target="_blank" href="#" style="width: 100%;font-size: 14px;text-decoration: none">LG 24MP77HM-P 23.8英寸</a>
            <div class="intro">￥1199</div>
          </li>
          <li class="num2 curr">
            <a target="_blank" href="#" style="width: 100%;font-size: 14px;text-decoration: none">飞利浦（PHILIPS）277E7EDSW</a>
          </li>
          <li class="num3 curr">
            <a target="_blank" href="#4" style="width: 100%;font-size: 14px;text-decoration: none">三星（SAMSUNG）C27F591FD#</a>
          </li>
          <li class="num4 curr">
            <a target="_blank" href="#" style="width: 100%;font-size: 14px;text-decoration: none">小米（MI）L48M3-AF 48英寸</a>
          </li>
        </ul>
      </div>
</div>
</div>
<div class="row" style="padding:0px 50px;">
<div class="col-xs-2">
<h2 style="font: bold 20px/40px 'microsoft yahei' !important;color:#FC8158">热销商品</h2>
  
</div>
<div class="col-xs-10 floor" style="padding-top:19px;">
          <ul>
            <?php if(is_array($floordata)): foreach($floordata as $key=>$v): ?><li class="libg-<?php echo ($key%4+1); ?>">
                <a href="<?php echo U('product/index',array('class_id'=>$v['class_id']));?>" style="font-size: 14px;color: white;"><?php echo ($v["classname"]); ?></a>
              </li><?php endforeach; endif; ?>
          </ul>
        </div>
<hr style=" height:2px;border:none;border-top:2px double black;" />
</div>
<?php if(is_array($floordata)): $i = 0; $__LIST__ = array_slice($floordata,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$x): $mod = ($i % 2 );++$i;?><div class="col-xs-12"  >
      <div class="col-xs-12 floor-color-<?php echo ($key%4+1); ?>" >
        <div class="col-xs-2">
          <h2 style="font: bold 20px/40px 'microsoft yahei' !important;">F<?php echo ($key+1); ?>   <?php echo ($x["classname"]); ?></h2>
        </div>
        <div class="col-xs-10 floor" style="padding-top:19px;">
          <ul>
            <?php if(is_array($x["child"])): foreach($x["child"] as $key=>$v): ?><li class="libg-<?php echo ($key%4+1); ?>">
                <a href="<?php echo U('product/index',array('class_id'=>$v['class_id']));?>" style="font-size: 14px;color: white;"><?php echo ($v["classname"]); ?></a>
              </li><?php endforeach; endif; ?>
          </ul>
        </div>
      </div>
      <div class="col-xs-12" style="padding:20px 0px;border:1px solid #ddd;border-radius: 2px;height: 312px;">
          <?php if(is_array($x["data"])): $i = 0; $__LIST__ = $x["data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="floordata" <?php if($key != 0): ?>style="border-left:1px solid #e7e7e7"<?php else: endif; ?> >
              <div class="movedraw center">
                <figure class="movedraw1" style="height: 206px;padding-top: 10px;">
                  <img src="<?php echo ($v["img"]); ?>" height="180"  width="180" alt="" />
                </figure>

                <div style="width:100%;height:36px;padding:0px 10px;">
                  <a href="<?php echo U('Productinfo/index',array('id'=>$v['id']));?>"><?php echo ($v["name"]); ?></a>
                </div>
                <div style="width:100%;height:18px;margin-top: 10px;" class="aad">￥<?php echo ($v["price"]); ?></div>
              </div>
              <div style=""></div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        
      </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
</div>
</foreach>
</div>
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