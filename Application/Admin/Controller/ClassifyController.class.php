<?php
namespace Admin\Controller;
use Think\Controller;
class ClassifyController extends CommonController {
    public function index(){
    	/**
         * 分页操作逻辑
         */
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 5;
        $class = D("Classify")->getclass($data,$page,$pageSize,0);
        $classCount = D("Classify")->getClassCount($data,0);

        $res = new \Think\Page($classCount, $pageSize);
        
        $res->setConfig('next','下一页');
        $res->setConfig('prev','上一页');
        $res->setConfig('end','末页');
        $res->setConfig('first','首页');
        $res->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%'); 
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('class',$class);
        $this->display();
    }
     //添加商品分类
    public function add(){
        if($_POST) {
            if(!isset($_POST['classname']) || !$_POST['classname']) {
                return show(0,'商品分类名不能为空');
            }
            if($_POST['class_id']) {
                return $this->save($_POST);
            }
            $menuId = D("Classify")->insert($_POST);
            if($menuId) {
                return show(1,'新增成功',$menuId);
            }
            return show(0,'新增失败',$menuId);

        }else {
            $this->display();
        }
    	// $this->display();
    }
        //修改状态
    public function setStatus() {

        $data = array(
            'id' => intval($_POST['id']),
            'status' => intval($_POST['status']),
        );
        return parent::setStatus($data, 'Classify');
    }
    //编辑页面
    public function edit(){
        $type = $_REQUEST['class_id'] ? $_REQUEST['class_id'] : 0;
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 4;
        $class = D("Classify")->getclass($data,$page,$pageSize,$type);
        $classCount = D("Classify")->getClassCount($data,$type);
        $res = new \Think\Page($classCount, $pageSize);
        $res->setConfig('next','下一页');
        $res->setConfig('prev','上一页');
        $res->setConfig('end','末页');
        $res->setConfig('first','首页');
        $res->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%'); 
        
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('class',$class);
        $this->assign('class_id',I('class_id'));
        $this->display();
    }
    //添加二级分类
    public function addChild(){
        if($_POST) {
            if(!isset($_POST['classname']) || !$_POST['classname']) {
                return show(0,'商品分类名不能为空');
            }
            if($_POST['class_setid']) {
                return $this->save($_POST);
            }
            $class_id=I('class_id');
            $_POST['partent_id']=$class_id;
            unset($_POST['class_id']);
            $menuId = D("Classify")->insert($_POST);
            if($menuId) {
                return show(1,'新增成功',$menuId);
            }
            return show(0,'新增失败',$menuId);

        }else {
            $this->display();
        }
    }
    //更改名称
    public function updatename(){
    	try {
    	 	if ($_POST) {
	            if(!isset($_POST['classname']) || !$_POST['classname']) {
	                return show(0,'商品分类名不能为空');
	            }
           		 $menuId = D("Classify")->updatename($_POST);
	            if($menuId) {
	                return show(1,'更改成功',$menuId);
	            }
            	return show(0,'更改失败',$menuId);
       		 }
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }

        return show(0,'没有提交的数据');
    	
    }
}