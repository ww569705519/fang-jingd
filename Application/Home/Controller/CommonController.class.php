<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {

    public function index(){
        $this->display();
    }

    public function getLoginUser() {
		return session('userinfo');
	}

    public function isLogin() {
		$user = $this->getLoginUser();
		if($user && is_array($user)) {
			return true;
		}

		return false;
	}

	public function isLogin2() {
		$user = $this->getLoginUser();
		if($user && is_array($user)) {
			return show(1,'sueess',$user);
		}
		return show(0,'false');
	}

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
}