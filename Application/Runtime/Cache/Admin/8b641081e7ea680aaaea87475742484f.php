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
<script src="/Public/js/kindeditor/kindeditor-all.js"></script>
<div id="page-wrapper" >
	<div class="col-lg-12">
		<h3 class="page-header">商品添加</h3>
	</div>
	<form class="form-horizontal" id="singcms-form">
		<div class="form-group">
			<label class="col-md-2 control-label">商品名称</label>
			<div class="col-md-4">
				<input type="text" class="form-control"  placeholder="请输入商品名称" name="name" value="<?php echo ($products['name']); ?>"></div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">商品价格</label>
			<div class="col-md-2">
				<input type="text" class="form-control"  placeholder="请输入商品价格" name="price" value="<?php echo ($products['price']); ?>"></div>
		</div>

		<div class="form-group">
			<label class="col-md-2 control-label">所属分类</label>
			<div class="col-md-4">
				<select class="form-control" name="class_id">
					<option value="">==请选择分类==</option>
					<?php if(is_array($class)): foreach($class as $key=>$v): ?><option value="<?php echo ($v["class_id"]); ?>"><?php echo ($v["classname"]); ?></option><?php endforeach; endif; ?>
				</select>

			</div>

		</div>
		<div class="form-group">
			<label for="inputname" class="col-sm-2 control-label">商品图片</label>
			<div class="col-sm-5">
				<input id="file_upload"  type="file" multiple="true" >
				<img style="display: none" id="upload_org_code_img" src="" width="150" height="150">
				<input id="file_upload_image" name="img" type="hidden" multiple="true" value=""></div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">商品详情</label>
			<div class="col-md-4">
				<textarea class="input js-editor" id="editor_singcms" name="info" rows="20" ></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">商品库存</label>
			<div class="col-md-2">
				<input type="text" class="form-control"  placeholder="请输入商品库存" name="count"></div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">是否上架</label>
			<div class="col-md-4">
				<label class="radio-inline">
					<input type="radio" name="shelf" id="inlineRadio1" value="1" checked>上架</label>
				<label class="radio-inline">
					<input type="radio" name="shelf" id="inlineRadio2" value="0">下架</label>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-2 control-label"></label>
			<div class=" col-md-7">
				<button type="button" class= "btn btn-default" id="singcms-button-submit">提交</button>
			</div>
		</div>
	</form>
	<script>

    var SCOPE = {
        'save_url' : '/index.php/Admin/Product/save',
        'jump_url' : '/index.php/Admin/Product',
        'ajax_upload_image_url' : '/index.php/Admin/Image/ajaxuploadimage',
   		'ajax_upload_swf' : '/Public/js/party/uploadify.swf',
    }
	</script>
	<script>
	  // 6.2
	  KindEditor.ready(function(K) {
	    window.editor = K.create('#editor_singcms',{
	      uploadJson : '/index.php/Admin/Image/kindupload',
	      afterBlur : function(){this.sync();}, //
	    });
	  });
	</script>
	
<script src="/Public/js/admin/common.js"></script>
</div>
</body>
</html>