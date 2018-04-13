<?php
namespace Home\Controller;
use Think\Controller;
class ProductsController extends Controller {
    public function index(){
    	$userinfo=session('userinfo');
        $cartList=D('Cart')->getCartListById($userinfo['user_id']);
    	$id=I('class_id');
    	$arr=array();
    	$class=D('Classify')->getClassByParid($id);
    	$res=D('Classify')->getClasses();
    	foreach ($class as $v) {
    		$v['data']=D('Product')->getProductsByClassid($v['class_id']);
    		$arr[]=$v;
    	}
        $this->assign('username',$userinfo);
		$this->assign('navs',$res);
    	$this->assign('floordata',$arr);
        $this->assign('cartList',$cartList);
        $this->display();
    }
}