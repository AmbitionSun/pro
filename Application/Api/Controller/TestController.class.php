<?php
namespace Api\Controller;
use Think\Controller\RestController;
class TestController extends RestController {
	
	/* public function read_get_json(){
		echo 'read_get_json'.I('id');
	}
	
	public function read_get_json(){
		echo 'read_get_json'.I('id');
	} */
	
	public function rest() {
		switch ($this->_method){
			case 'get': // get请求处理代码
				if ($this->_type == 'html'){
					echo 'html';
				}elseif($this->_type == 'xml'){
					echo 'xml';
				}
				break;
			case 'put': // put请求处理代码
				break;
			case 'post': // post请求处理代码
				break;
		}
	}
}

?>