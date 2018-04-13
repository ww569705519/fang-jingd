<?php
	/**
	 * 用户与角色关联模型
	 */
namespace Common\Model;
use Think\Model\RelationModel;
class ProclassModel extends RelationModel{
	protected $tableName = 'product'; 
    protected $_link = array(
      'classname' => array(
	    'mapping_type'  => self::BELONGS_TO,
	    'class_name'    => 'class',
	    'foreign_key'   => 'class_id',
	    // 'mapping_name'  => 'username',
	    // 'mapping_fields'=>'partent_id',
	    'as_fields'=>'classname',
		),
    );

}
?>