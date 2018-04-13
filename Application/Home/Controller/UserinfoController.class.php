<?php
namespace Home\Controller;
use Think\Controller;
class UserinfoController extends CommonController {
    public function index(){
    	$userinfo=session('userinfo');
    	if($userinfo){
            $cartList=D('Cart')->getCartListById($userinfo['user_id']);
	    	$res=D('Classify')->getClasses();
	    	$data=D('Classify')->allClass();
	    	$address=D('Address')->all($userinfo['user_id']);
	    	$floordata=classNav($data);
	    	$this->assign(array(
	    			'address'=>$address,
	    			'username'=>$userinfo,
					'floordata'=>$floordata,
					'navs'=>$res,
                    'cartList'=>$cartList,
	    		));
	        $this->display();
	    }else{
	    	$this->error('请先登录');
	    }
    }
    public function add(){
    	if ($_POST) {
    		# code...
    		if(!isset($_POST['adress_name']) || !$_POST['adress_name']) {
                return show(0,'收件人不能为空');
            }
            if(!isset($_POST['address']) || !$_POST['address']) {
                return show(0,'地址不能为空');
            }
            if(!isset($_POST['phone']) || !$_POST['phone']) {
                return show(0,'电话号码不能为空');
            }
            if(!is_numeric($_POST['phone'])) {
                return show(0,'电话号码不能为非数字');
            }
    		if(session('userinfo')){
    			$userinfo=session('userinfo');
    			$_POST['user_id']=$userinfo['user_id'];
    			$res=D('Address')->insert($_POST);
    			if($res){
    				return show(1,'添加成功!',$res);
    			}else{
    				return show(0,'添加失败!',$res);
    			}
    		}
    	}else{
    		$this->error('非法操作!');
    	}
    	
    }
     //修改状态
    public function setStatus() {

        $data = array(
            'id' => intval($_POST['id']),
            'status' => intval($_POST['status']),
        );
        return parent::setStatus($data, 'Address');
    }

    public function setActive(){
    	if ($_POST) {
    		# code...
    		if(session('userinfo')){
    			$userinfo=session('userinfo');
    			$_POST['user_id']=$userinfo['user_id'];
    			$res=D('Address')->setActive($_POST);
    			if($res){
    				return show(1,'设置成功!',$res);
    			}else{
    				return show(0,'设置失败!',$res);
    			}
    		}
    	}else{
    		$this->error('非法操作!');
    	}
    }
}