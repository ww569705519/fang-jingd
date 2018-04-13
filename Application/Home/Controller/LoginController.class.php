<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends CommonController {
    public function index(){
    	$userinfo=session('userinfo');
    	$cartList=D('Cart')->getCartListById($userinfo['user_id']);
    	$res=D('Classify')->getClasses();
		$this->assign('navs',$res);
    	$this->assign('username',$userinfo);
    	$this->assign('cartList',$cartList);
        $this->display();
    }
    public function check(){
    	if($_POST){
	    	$email = $_POST['email'];
	        $password = $_POST['password'];
	        if(!trim($email)) {
	            return show(0,'用户名不能为空');
	        }
	        if(!trim($password)) {
	            return show(0,'密码不能为空');
	        }

	        $ret = D('User')->getAdminByUsername($email);
	        if(!$ret || $ret['status'] !=1) {
	            return show(0,'该用户不存在');
	        }

	        if($ret['password'] != getMd5Password($password)) {
	            return show(0,'密码错误');
	        }

	        D("User")->updateByAdminId($ret['user_id'],array('lastlogintime'=>time()));
	        unset($ret['password']);
	        unset($ret['lastloginip']);
	        unset($ret['status']);
	        session('userinfo', $ret);
	        return show(1,'登录成功',session('userinfo'));
        }
    }

     public function loginout() {
        session('userinfo', null);
        $this->redirect('/home/login');
    }

}