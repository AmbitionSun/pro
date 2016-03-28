<?php
namespace Api\Controller;
use Think\Controller;
class BaseController extends Controller{
	const CODE_OK = 200;//逻辑正确的返回码
	const CODE_FAIL = 400;//逻辑错误的返回码
	
	function _initialize(){
		/* if(empty(I('session.username'))) {
			$res = wrap_json(CODE_FAIL, '操作需登录');
			echo u2_json_encode($res);
			exit();
		} */
	}
}

?>