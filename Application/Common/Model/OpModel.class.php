<?php
namespace Common\Model;
use Think\Model;
/**
*  
*/
class OpModel extends Model
{
	
	private $_db = '';
    public function __construct() {
        $this->_db = M('op');
    }
    //插入数据
    public function insert($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->addAll($data);
    }
    //插入数据
    public function insertPro($data = array()) {
        if(!$data) {
            return 0;
        }
        return $this->_db->add($data);
    }
}
?>