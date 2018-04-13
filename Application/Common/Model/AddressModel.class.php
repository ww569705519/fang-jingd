<?php
namespace Common\Model;
use Think\Model;

/**
 * 用户组操作
 * @author  singwa
 */
class AddressModel extends Model {
	private $_db = '';

	public function __construct() {
		$this->_db = M('address');
	}

 	public function insert($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }

    public function all($user_id){
    	$data = array(
            'status' => array('neq',-1),
            'user_id'=>array('eq',$user_id),
        );
        return $this->_db->where($data)->order('active desc')->select();
    }
     //更新状态
	public function updateStatusById($id, $status) {
		if(!is_numeric($status)) {
			throw_exception("status不能为非数字");
		}
		if(!$id || !is_numeric($id)) {
			throw_exception("ID不合法");
		}
		$data['status'] = $status;
		return  $this->_db->where('address_id='.$id)->save($data); // 根据条件更新记录

	}
	public function setActive($post){
		$data = array(
            'status' => array('neq',-1),
            'user_id'=>array('eq',$post['user_id']),
        );
        $data2 = array(
            'status' => array('neq',-1),
            'address_id'=>array('eq',$post['id'])
        );
        $this->_db->where($data)->save(array('active'=>0));
        return $this->_db->where($data2)->save(array('active'=>1));
	}
   
}