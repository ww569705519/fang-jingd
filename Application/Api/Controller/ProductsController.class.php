<?php
namespace Api\Controller;
use Think\Controller;
/**
 ** web端导航接口
 **/
class ProductsController extends Controller {
    public function products(){
    	$id=I('class_id');
    	$arr=array();
    	$class=D('Classify')->getClassByParid($id);

    	foreach ($class as $v) {
    		# code...
    		$v['data']=D('Product')->getProductsByClassid($v['class_id']);
    		$arr[]=$v;
    	}
    	// $a=$this->aaa($class);
    	// p($arr);
   	 //    $res = $haha->query($sql); 
    	return show(1,'获取成功',$arr);

    }
    // public function getProductList($id){
    // 	$res = M('product')->join('mall_class on mall_class.class_id=mall_product.class_id')->where(array('class_id',$id))->order('class_id,sell desc')->limit(0,4)->select();
    // }
    //重组数组
    // public function aaa($class){
    // 	$arr=array();
    // 	foreach ($class as $v) {
    // 		# code...
    // 		$v['data']=$this->getProductList($v['class_id']);

    // 	}
    // 	return $arr;
    // }

}