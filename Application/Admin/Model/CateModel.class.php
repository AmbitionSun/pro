<?php
namespace Admin\Model;
use Think\Model;
class CateModel extends Model{
	
	protected  $_validate = array(
			//类别名必填
			array('name','require','请输入类别名'),
	);

}

?>