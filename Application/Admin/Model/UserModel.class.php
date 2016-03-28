<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model {
	
	protected $_validate = array(
		//用户名长度
		array('username','6,12','用户名须在6到12位之间',0,'length',1),
		//用户名唯一性
		array('username','','用户名已存在！',0,'unique',1),
	);
	
	protected $_auto = array(
		array('created','time',self::MODEL_BOTH,'function'),
	);

}

?>