<?php
namespace Common\Model;
use Think\Model;
/**
*  
*/
class ClassifyModel extends Model
{
	private $_db = '';

	public function __construct() {
		$this->_db = M('class');
	}
	//获取全部数据
	public function allClass(){
		$data['status']=array('eq',1);
		return $this->_db->where($data)->select();
	}
	//插入数据
    public function insert($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }
    //获取
    public function getClass($data,$page,$pageSize=10,$type) {
        $data['status'] = array('neq',-1);
        $data['partent_id']=array('eq',$type);
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($data)->order('listorder desc,class_id ')->limit($offset,$pageSize)->select();
        return $list;
    }
    //获取数据
    public function getClasses($partent_id=0){
    	$data['status']=array('eq',1);
    	$data['partent_id']=array('eq',$partent_id);
    	$list=$this->_db->where($data)->order('listorder desc,class_id ')->select();
    	return $list;
    }
    //获取分类数量
    public function getClassCount($data= array(),$type) {
        $data['status'] = array('neq',-1);
        $data['partent_id']=array('eq',$type);
        return $this->_db->where($data)->count();
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
		return  $this->_db->where('class_id='.$id)->save($data); // 根据条件更新记录

	}
	//更改名称
	public function updatename($post=array()){
		$id=$post['id'];
		if(!$id || !is_numeric($id)) {
			throw_exception("ID不合法");
		}
		$data['class_id']=$id;
		$data['status']=array('neq',-1);
		unset($post['id']);
		return  $this->_db->where($data)->save($post);
	}

	//搜索分类
	public function getType($class_id){
		$data['status']=array('eq',1);
    	$data['class_id']=array('eq',$class_id);
    	$list=$this->_db->where($data)->order('listorder desc,class_id ')->select();
    	return $list;
	}
	//根据子类id找到父类id
	public function getParentId($class_id){
		$data['status']=array('eq',1);
    	$data['class_id']=array('eq',$class_id);
    	$partent_id=$this->_db->where($data)->field('partent_id')->find();
    	return $partent_id;
	}
	//根据partent_id找到所有符合的
	public function getClassByParid($partent_id){
		$data['status']=array('eq',1);
    	$data['partent_id']=array('eq',$partent_id);
    	$list=$this->_db->where($data)->field('class_id,classname')->select();
    	return $list;
	}
	//批量注入用的方法
	public function getMost(){
		$data=array(
				'status'=>1,
				'partent_id'=>array('neq',0),
				'class_id'=>array('gt',95),
			);
		return $this->_db->where($data)->select();
	}

}
?>
