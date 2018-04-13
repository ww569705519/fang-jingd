<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends CommonController {
    public function index(){
    	$res = M('order')->join('mall_address on mall_address.address_id=mall_order.address_id')->where('mall_order.status=0')->select();	
    	$reb = M('order')->join('mall_address on mall_address.address_id=mall_order.address_id');
  	  	$count      = count($res);// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
	    $show       = $Page->show();// 分页显示输出
        $Page->setConfig('next','下一页');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('end','末页');
        $Page->setConfig('first','首页');
        $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%'); 
        $show       = $Page->show();// 分页显示输出
  		$list = $reb->where('mall_order.status=0')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); 
    }
    //订单发货
    public function orderSend(){
    	if($_POST){
    		if(!$_POST['id']){
    			return show(0,'ID不能为空');
    		}
    		$res=D('Order')->orderSend($_POST['id']);
    		if ($res) {
    			# code...
    			return show(1,'发货成功','/index.php/admin/order/index');
    		}else{
    			return show(0,'发货失败');
    		}
    	}
    }
    //订单详情
    public function info(){
    	$id=I('id');
    	$res = M('op')->join('mall_product on mall_product.id=mall_op.product_id')->join('mall_order on mall_op.order_id=mall_order.order_id')->where(array('mall_product.status'=>1,'mall_op.order_id'=>$id))->select();	
    	$num=0;
    	foreach ($res as $key => $v) {
    		# code...
    		$num+=$v['price']*$v['product_num'];
    	}
    	$this->assign('num',$num);
    	$this->assign('data',$res);
    	$this->display();
    }
}