<?php
namespace Home\Controller;
use Think\Controller;
class ProductController extends Controller {
    public function index(){
        $userinfo=session('userinfo');
        $cartList=D('Cart')->getCartListById($userinfo['user_id']);
        $id=I('class_id');
        $product=D('Product')->getById($id);
        $res=D('Classify')->getClasses();
        $this->assign('username',$userinfo);
        $this->assign('navs',$res);
        $this->assign('product',$product);
        $this->assign('cartList',$cartList);
        $this->display();
    }
}