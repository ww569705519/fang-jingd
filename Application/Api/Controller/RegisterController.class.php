<?php
namespace Api\Controller;
use Think\Controller;
/**
 ** web端注册接口
 **/
class RegisterController extends Controller {
    public function index(){
        $this->display();
    }
    //注册
    public function register(){
    	try{
    		if(IS_POST) {
    			p($_POST);
    			die;
	            if(!isset($_POST['email']) || !$_POST['email']) {
	                return show(0, '账号不能为空');
	            }
	            if(!isset($_POST['password']) || !$_POST['password']) {
	                return show(0, '密码不能为空');
	            }
	            if(!isset($_POST['password1']) || !$_POST['password1']) {
	                return show(0, '确认密码不能为空');
	            }
	            if($_POST['password1']!=$_POST['password']){
	            	return show(0,'密码不一致');
	            }
	            $_POST['password'] = getMd5Password($_POST['password']);
	            // 判定用户名是否存在
	            $admin = D("User")->getAdminByUsername($_POST['email']);
	            if($admin && $admin['status']!=-1) {
	                return show(0,'该用户存在');
	            }

	            // 新增
	            $id = D("User")->insert($_POST);
	            if(!$id) {
	                return show(0, '新增失败');
	            }
	            return show(1, '新增成功');
        }

    	}catch(Exception $e) {
            return show(0,$e->getMessage());
        }
    }
}