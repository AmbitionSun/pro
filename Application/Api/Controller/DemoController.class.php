<?php
namespace Api\Controller;
use Think\Controller\RestController;
class DemoController extends RestController{
	
	public function read(){
		switch ($this->_method) {
			case 'get':
				if($this->_type=='json'){
					echo 'get json';
				} else if($this->_type=='xml'){
					echo 'get xml';
				} else {
					echo 'get html';
				}
				break;
			case 'post':
				echo 'post';
				break;
			case 'put':
				echo 'put'.I('username').I('password');
				break;
			case 'delete':
				echo 'delete'.I('username').I('password');
				break;
		}
	}
}

?>