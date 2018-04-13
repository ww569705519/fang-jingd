<?php
namespace Api\Controller;
use Think\Controller;
/**
 ** web端登录接口
 **/
class LoginController extends Controller {
    public function index(){
        $this->display();
    }

    //登录接口
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

	        D("User")->updateByAdminId($ret['id'],array('lastlogintime'=>time()));
	        unset($ret['password']);
	        unset($ret['lastloginip']);
	        unset($ret['status']);
	        session('userInfo', $ret);
	        return show(1,'登录成功',session('userInfo'));
        }
    }
}