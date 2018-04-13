<?php
namespace Admin\Controller;
use Think\Controller;
class ProductController extends CommonController {
    public function index(){
  		    $class=D('Classify')->getClasses(0);
          $this->assign('class',$class);
      		$Proclass = D('Proclass'); // 实例化order对象
      		$count      = $Proclass->where('status!='.-1)->count();// 查询满足要求的总记录数
    			$Page       = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    			$show       = $Page->show();// 分页显示输出
          $Page->setConfig('next','下一页');
          $Page->setConfig('prev','上一页');
          $Page->setConfig('end','末页');
          $Page->setConfig('first','首页');
          $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%'); 
          $show       = $Page->show();// 分页显示输出
  		  	$list = $Proclass->relation(true)->where('status!='.-1)->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
    			$this->assign('list',$list);// 赋值数据集
    			$this->assign('page',$show);// 赋值分页输出
    			$this->display(); 
    }

    //添加商品页面
    public function add(){
    	if($_POST){
    		$class_id=I('class_id');
    		if($class_id){
    			$class=D('Classify')->getClasses($class_id);
    			$this->assign('class',$class);
    			$this->display();
    		}else{
    			$this->error('请选择分类','',1);
    		}
    	}else{
    		$this->error('非法操作','',1);
    	}
    	
    }
    //批量注入数据
    public function addMost(){
      $a=array('1','1','1','1','1','1','1','1','1','1',);
      $class=D('Classify')->getMost();
      $data=array(
            'name'=>'小米（MI）L48M3-AF 48英寸',
            'price'=>'2099',
            'info'=>'<img src="/upload/2016/08/14/57afbb3690c75.jpg" alt="" />',
            'count'=>'40',
            'shelf'=>'1',
            'img'=>'/upload/2016/08/14/57afbb2d09aea.jpg',
            'status'=>'1',
            'sell'=>'10',
        );
      foreach ($class as $key => $v) {
        # code...
        // p($v['class_id']);
        $data['class_id']=$v['class_id'];
        foreach ($a as $key => $v) {
        //   # code...
        //   // p("里面的循环");
          D('Product')->insert($data);
        }
      }
      // p($class);
    }
    //提交添加商品接口
    public function save(){
    	if($_POST) {
            if(!isset($_POST['name']) || !$_POST['name']) {
                return show(0,'商品名称不存在');
            }
            if(!isset($_POST['class_id']) || !$_POST['class_id']) {
                return show(0,'请选择分类');
            }
            if(!isset($_POST['img']) || !$_POST['img']) {
                return show(0,'请上传图片');
            }
            if(!isset($_POST['info']) || !$_POST['info']) {
                return show(0,'请输入商品详情');
            }
            if(!isset($_POST['price']) || !is_numeric($_POST['price'])) {
                return show(0,'价格未填或填写错误');
            }
            if(!isset($_POST['count']) || !is_numeric($_POST['count'])){
                return show(0,'详情未填或填写错误');
            }
            if($_POST['id']) {
            	$res=D('Product')->updateById($_POST['id'],$_POST);
            	if($res){
            		return show(1,'修改成功');
            	}
                return show(0,'修改失败'); 
            }
            $pid = D("Product")->insert($_POST);
           	if ($pid) {
           		# code...
           		return show (1,'添加成功');
           	}else{
           		return show(0,'添加失败');
           	}

        }else{
        	return show(0,'非法操作');
        }
    }

    public function edit() {
    	$class_id=I('class_id');
        $id = I('id');
        $partent_id=D('Classify')->getParentId($class_id);
    	$class=D('Classify')->getClassByParid($partent_id['partent_id']);
	        if(!$id) {
            // 执行跳转
            $this->redirect('/index.php/Admin/Product');
        }
        $products = D("Product")->find($id);
        if(!$products) {
            $this->redirect('/index.php/Admin/Product');
        }
        $this->assign('class',$class);
        $this->assign('products', $products);
        $this->display();
    }

    //修改状态
    public function setStatus() {

        $data = array(
            'id' => intval($_POST['id']),
            'status' => intval($_POST['status']),
        );
        return parent::setStatus($data, 'Product');
    }


}