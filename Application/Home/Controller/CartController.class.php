<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller {
    public function index(){
    	$userinfo=session('userinfo');
        if($userinfo){
            $res = M('cart')->join('mall_product on mall_product.id=mall_cart.product_id')->where(array('user_id',$userinfo['user_id']))->select();
            $data=D('Cart')->getCartListById($userinfo['user_id']);
            $total=getCartNum($res);
            $this->assign(array(
                    'total'=>$total,
                    'cart'=>$res,
                    'username'=>session('userinfo'),
                    'cartList'=>$data
                ));
            $this->display();
        }else{
            $res=D('Classify')->getClasses();
            $this->assign('navs',$res);
            $this->display('Login/index');
        }
		
    }
    public function add(){
    	if($_POST){
    		$userinfo=session('userinfo');
    		if($userinfo){
    			$_POST['user_id']=$userinfo['user_id'];
    			$res=D('Cart')->addCart($_POST);
    			if ($res) {
    				$data=D('Cart')->getCartListById($userinfo['user_id']);
    				return show(1,'加入成功',$data);
    			}else{
    				return show(0,'加入失败');
    			}
    		}else{
    			return show(0,'请登录');
    		}
    	}
    }

    public function delCart(){
    	if($_POST){
    		$userinfo=session('userinfo');
    		$cart_id=$_POST['id'];
    		$res=D('Cart')->delCart($cart_id);
    		if ($res) {
    			$r = M('cart')->join('mall_product on mall_product.id=mall_cart.product_id')->where(array('user_id',$userinfo['user_id']))->select();
				$total=getCartNum($r);
    			return show(1,'删除成功',$total);
    		}else{
    			return show(0,'删除失败');
    		}
    	}else{
    		$this->error('SB');
    	}
    }

    public function upCart(){
    	if($_POST){
    		$userinfo=session('userinfo');
    		$cart_id=$_POST['cart_id'];
    		$product_num=$_POST['product_num'];
    		$res=D('Cart')->upCart($cart_id,$product_num);
    		if ($res) {
    			$r = M('cart')->join('mall_product on mall_product.id=mall_cart.product_id')->where(array('user_id',$userinfo['user_id']))->select();
				$total=getCartNum($r);
				return show(1,'操作成功',$total);
    		}else{
    			return show(0,'操作失败');
    		}
    	}else{
    		$this->error('异常操作');
    	}
    }
}