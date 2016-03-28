<?php
namespace Api\Controller;
use Api\Controller\BaseController;
use Admin\Logic\UserLogic;
class UserController extends BaseController{
	
	public $mainLogic;
	
	public function _initialize(){
		$this->mainLogic = new UserLogic();
	}
	
	public function login(){
		if(IS_POST){
			//处理登录表单
			$result = $this->mainLogic->login(I('account'), I('password'));
			$nums = empty($result)?0:1;
			if($nums>0) {
				session('username', $result['username']);
				setcookie("uid", $result['uid']);//设置coockie，把uid、username、tel写入到coockie
				setcookie("username", $result['username']);
				setcookie("tel", $result['tel']);
				$res = wrap_json(parent::CODE_OK, "登陆成功", $result);
			} else {
				$res = wrap_json(parent::CODE_FAIL, "你输入的用户名或密码有误");
			}
			echo u2_json_encode($res);
		}
	}
	
	public function reg(){
		if(IS_POST){
			//处理登录表单
			$result = $this->mainLogic->reg(I('username'), I('tel'), I('password'));
			if(is_numeric($result)) {//注册成功
				$res = wrap_json(parent::CODE_OK, "注册成功");
			} else {//注册失败
				$res = wrap_json(parent::CODE_FAIL, $result);
			}
			echo u2_json_encode($res);
		}
	}
	
}

?>