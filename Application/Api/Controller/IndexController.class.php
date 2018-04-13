<?php
namespace Api\Controller;
use Think\Controller;
/**
 ** web端首页接口
 **/
class IndexController extends Controller {
    public function index(){
        $this->display();
    }
    //首页导航数据
    public function nav(){
    	$res=D('Classify')->getClasses();
    	return show(1,'获取成功',$res);
    }
    
    //楼层接口数据
    public function floor(){
    	// header('Content-type:application/json;charset=UTF-8');
    	$res=D('Classify')->allClass();
    	$data=classNav($res);
    	// p(indexFloorData(41));
    	return show(1,'获取成功',$data);
    	// p($data);
    }
}