<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller {
    public function index(){
    		$userinfo=session('userinfo');
	    	if(session('userinfo')){
	    		$cartList=D('Cart')->getCartListById($userinfo['user_id']);
	    		$res = M('cart')->join('mall_product on mall_product.id=mall_cart.product_id')->where(array('user_id',$userinfo['user_id']))->select();
	    		$out=array();

	    		//判断是否超过库存
	    		foreach ($res as $key => $v) {
	    			# code...
	    			if($v['product_num']>$v['count']){
	    				unset($res[$key]);
	    				$out[]=$v;
	    			}
	    		}
	    		//由于超过库存而无法购买的商品
	    		$outProduct=$out;

	    		$total=getCartNum($res);
		    	$address=D('Address')->all($userinfo['user_id']);
		    	$this->assign(array(
		    			'outProduct'=>$out,
		    			'username'=>session('userinfo'), 
		    			'order'=>$res,
		    			'total'=>$total,
		    			'address'=>$address,
		    			'cartList'=>$cartList,
		    		));
		        $this->display();
    	}else{
    		$this->display('Login/index');
    	}
    }
    public function add(){
    	if($_POST){
    		$userinfo=session('userinfo');
    		if(!$_POST['address_id'] || !is_numeric($_POST['address_id'])){
    			return show(0,'请选择地址');
    		}
    		$data=array();
    		$data['address_id']=$_POST['address_id'];
    		$data['user_id']=$userinfo['user_id'];

    		$res = M('cart')->join('mall_product on mall_product.id=mall_cart.product_id')->where(array('user_id',$userinfo['user_id']))->select();
    		foreach ($res as $key => $v) {
	    			# code...
	    			if($v['product_num']>$v['count']){
	    				unset($res[$key]);
	    			}
	    		}
    		$total=getCartNum($res);
    		$data['order_price']=$total;
    		$data['order_time']=time();

    		$result=D('Order')->insert($data);
    		if($result){
    			$op=array();
    			//库存以及销量的相关操作
    			//删除购物车关联的数据
    			foreach ($res as $key => $v) {
    				# code...
    				$v['order_id']=$result;
    				$op[]=$v;
    				D('Cart')->delCart($v['cart_id']);
    				D('Product')->upProCount($v['product_id'],$v['product_num']);
    			}
    			$r=D('Op')->insert($op);
    			if($r){
    				return show(1,'下单成功','/index.php/home/order/myOrder');
    			}else{
    				return show(0,'op数据表没有操作');
    			}
    		}else{
    			return show(0,'下单失败');
    		}
    	}else{
    		$this->error('非法操作');
    	}
    }
    //订单页面
    public function myOrder(){
    	$userinfo=session('userinfo');
    	if($userinfo){
    		$navs=D('Classify')->getClasses();
    		$Model = M('order');
			$res=$Model->join('mall_op on mall_order.order_id = mall_op.order_id', 'left')
				  ->join('mall_product on mall_op.product_id = mall_product.id', 'left')
				  ->where(array('user_id'=>$userinfo['user_id'],'mall_order.status'=>0))->select();
			$this->assign(array(
					'order'=>$res,
					'navs'=>$navs,
				));
			$this->display();
    		}else{
    			$res=D('Classify')->getClasses();
				$this->assign('navs',$res);
				$this->assign('username',$userinfo);
    			$this->display('Login/index');
    		}
    	
    }
    //立即下单
    public function proOrder(){
    		$userinfo=session('userinfo');
	    	if(session('userinfo')){
	    		$id=I('id');
	    		$num=I('num');
	    		$product=D('Product')->find($id);
	    		$product['num']=$num;
		    	$address=D('Address')->all($userinfo['user_id']);
		    	$this->assign(array(
		    			'product'=>$product,
		    			'username'=>session('userinfo'), 
		    			'order'=>$res,
		    			'address'=>$address,
		    		));
		        $this->display();
    		}else{
    			$this->error('请登录');
    		}
		}

	public function addOrder(){
		if ($_POST) {
			$userinfo=session('userinfo');
    		if(!$_POST['address_id'] || !is_numeric($_POST['address_id'])){
    			return show(0,'请选择地址');
    		}
    		$data=array();
    		$data['address_id']=$_POST['address_id'];
    		$data['user_id']=$userinfo['user_id'];
    		$product=D('Product')->find($_POST['product_id']);
    		$data['order_price']=$_POST['product_num']*$product['price'];
    		$data['order_time']=time();
    		
    		$result=D('Order')->insert($data);
    		if($result){
    			$v['order_id']=$result;
    			$v['product_id']=$_POST['product_id'];
    			$v['product_num']=$_POST['product_num'];

    			D('Product')->upProCount($v['product_id'],$v['product_num']);
    			$r=D('Op')->insertPro($v);
    			if($r){
    				return show(1,'下单成功','/index.php/home/order/myOrder');
    			}else{
    				return show(0,'op数据表没有操作');
    			}
    		}else{
    			$this->error('下单失败');
    		}

		}
	}
	//确认收货操作
	public function orderGet(){
		if($_POST){
			
			$order_id=I('order_id');
			$res=D('Order')->orderGet($order_id);
			if($res){
				return show(1,'收货成功','/index.php/home/order/myOrder');
			}else{
				return show(0,'收货失败');
			}
		}else{
			$this->error('非法操作');
		}
	}
	//删除订单操作
	public function orderDel(){
		if($_POST){
			
			$order_id=I('order_id');
			$res=D('Order')->orderDel($order_id);
			if($res){
				return show(1,'删除成功','/index.php/home/order/myOrder');
			}else{
				return show(0,'删除失败');
			}
		}else{
			$this->error('非法操作');
		}
	}
}