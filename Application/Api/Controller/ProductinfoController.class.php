<?php
namespace Api\Controller;
use Think\Controller;
/**
 ** web端导航接口
 **/
class ProductinfoController extends Controller {
    public function product(){
    	$id=I('id');
    	$res=D('Product')->find($id);
    	return show(1,'获取成功',$res);
    }
}