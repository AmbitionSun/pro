<?php
namespace Api\Controller;
use Admin\Logic\CateLogic;
use Api\Controller\BaseController;
class CateController extends BaseController{
	//所有一级类别
	public function cate1(){
		$cateLogic = new CateLogic();
		echo u2_json_encode($cateLogic->cate1());
	}
	
	//热搜关键字
	public function hot_word(){
		$res = array("红米2","魅族Note","G3","智能手表","运动手环","佳能","自行车","mac air");
		echo u2_json_encode($res);
	}
}

?>