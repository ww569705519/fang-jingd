<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$userinfo=session('userinfo');
    	$res=D('Classify')->getClasses();
    	$data=D('Classify')->allClass();
    	$floordata=classNav($data);
    	$cartList=D('Cart')->getCartListById($userinfo['user_id']);
    	$this->assign(array(
    		'username'=>session('userinfo'),
    		'floordata'=>$floordata,
    		'cartList'=>$cartList,
    		'navs'=>$res,
        	));
        $this->display();

    }
}