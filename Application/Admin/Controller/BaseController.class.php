<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller{
	
	function _initialize(){
		if(empty(I('session.admin_username'))) {
			$this->redirect(U('user/login'));
		}
	}
	
}

?>