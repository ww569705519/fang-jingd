<?php
namespace Common\Model;
use Think\Model;
/**
*  
*/
class OrderModel extends Model
{
	
	private $_db = '';
    public function __construct() {
        $this->_db = M('order');
    }
    //插入数据
    public function insert($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }
    
    public function orderGet($order_id){
        if(!$order_id || !is_numeric($order_id)) {
            throw_exception("ID不合法");
        }
        $data=array(
            'order_id'=>$order_id,
            );
        return $this->_db->where($data)->save(array('order_get'=>1));

    }
    public function orderDel($order_id){
        if(!$order_id || !is_numeric($order_id)) {
            throw_exception("ID不合法");
        }
        $data=array(
            'order_id'=>$order_id,
            );
        return $this->_db->where($data)->save(array('status'=>-1));

    }
    public function orderSend($id){
        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
         $data=array(
            'order_id'=>$id,
            );
         return $this->_db->where($data)->save(array('order_send'=>1));
    }
}
?>