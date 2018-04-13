<?php
namespace Common\Model;
use Think\Model;

/**
 * 用户组操作
 * @author  singwa
 */
class CartModel extends Model {
	private $_db = '';

	public function __construct() {
		$this->_db = M('cart');
	}

	  //插入数据
    public function addCart($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        $con=array(
        		'user_id'=>array('eq',$data['user_id']),
        		'product_id'=>array('eq',$data['product_id']),
        	);
        $res=$this->_db->where($con)->select();
        if($res){
        	$updata['product_num']=$data['product_num']+$res[0]['product_num'];
        	return $this->_db->where($con)->save($updata);
        }
        return $this->_db->add($data);
    }

  	//获取购物车数量根据用户id
  	public function getCartListById($user_id) {
        $data = array(
            'user_id' => array('eq',$user_id),
        );

        return $this->_db->where($data)->count();
    }

    public function delCart($cart_id){
    	if(!$cart_id || !is_numeric($cart_id)) {
            return array();
        }
        $data=array(
        	'cart_id'=>array('eq',$cart_id),
        	);
        return $this->_db->where($data)->delete();
    }
    public function upCart($cart_id,$product_num){
    	if(!$cart_id || !is_numeric($cart_id)) {
            return array();
        }
        if(!$product_num || !is_numeric($product_num)) {
            return array();
        }
        $data=array(
        	'cart_id'=>array('eq',$cart_id),
        	);
        return $this->_db->where($data)->save(array('product_num'=>$product_num));
    }
    //获取购物车信息
    public function getCartById($id){
    	if(!$id || !is_numeric($id)) {
            return array();
        }
        $data=array(
        	'user_id'=>array('eq',$id),
        	);
        return $this->_db->where($data)->field('product_id,product_num')->select();
    }
}