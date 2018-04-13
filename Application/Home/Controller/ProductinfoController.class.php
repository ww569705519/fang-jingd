<?php
namespace Home\Controller;
use Think\Controller;
class ProductinfoController extends Controller {
    public function index(){
    	$userinfo=session('userinfo');
    	$data=D('Classify')->getClasses();
    	$id=I('id');
    	$res=D('Product')->find($id);
    	$cartList=D('Cart')->getCartListById($userinfo['user_id']);
        $this->assign(array(
    		'username'=>session('userinfo'),
			'navs'=>$data,
			'productdata'=>$res,
			'cartList'=>$cartList,
        	));
        $this->display();
    }
   
}