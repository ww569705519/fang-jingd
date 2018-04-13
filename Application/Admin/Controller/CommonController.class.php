<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {

	public function __construct() {
		
		parent::__construct();
		$this->_init();
	}
	/**
	 * 初始化
	 * @return
	 */
	private function _init() {
		// 如果已经登录
		$isLogin = $this->isLogin();
		if(!$isLogin) {
			// 跳转到登录页面
			$this->redirect('login/index');
		}
	}
	//公共修改状态的方法
	public function setStatus($data, $models) {
		try {
			if ($_POST) {
				$id = $data['id'];
				$status = $data['status'];
				if (!$id) {
					return show(0, 'ID不存在');
				}
				$res = D($models)->updateStatusById($id, $status);
				if ($res) {
					return show(1, '操作成功');
				} else {
					return show(0, '操作失败');
				}
			}
			return show(0, '没有提交的内容');
		}catch(Exception $e) {
			return show(0, $e->getMessage());
		}
	}
		/**
	 * 获取登录用户信息
	 * @return array
	 */
	public function getLoginUser() {
		return session("adminUser");
	}
		/**
	 * 判定是否登录
	 * @return boolean 
	 */
	public function isLogin() {
		$user = $this->getLoginUser();
		if($user && is_array($user)) {
			return true;
		}

		return false;
	}
}