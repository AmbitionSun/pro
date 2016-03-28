<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Logic\UserLogic;
use Think\Page;
class UserController extends Controller {
	public $mainLogic;

	public function _initialize(){
		$this->mainLogic = D('user', 'Logic');
	}
	
	public function test(){
		$data = array('username'=>I('username'), 'password'=>I('password'));
		echo json_encode($data);
	}
	
	public function login(){
		if(IS_POST){
			//处理登录表单
			$result = $this->mainLogic->login(I('username'), I('password'));
			$nums = empty($result)?0:1;
			if($nums>0) {
				session('admin_username', I('username'));
				$this->redirect('index/index');
			} else {
				$this->assign('message', '你输入的用户名或密码有误');
			}
		}
		$this->display();
	}
	
	public function logout(){
		session('admin_username', null);
		$this->redirect('user/login');
	}
	
	public function all(){
		$this->chkSession();
		$result = $this->mainLogic->all(I('kw'));
		$this->assign('pageBar', $result['pageBar']);
		$this->assign('list', $result['list']);
		$this->assign('count', $result['count']);
		$this->display('list');
	}
	
	public function del(){
		$this->chkSession();
		$this->mainLogic = new UserLogic();
		if($this->mainLogic->delete(I('uid'))>0) {
			$this->redirect(I('server.HTTP_REFERER'));
		}
	}
	
	public function add(){
		$this->chkSession();
		if(IS_POST) {
			$Data = D('user');
			if($Data->create()) {
				$msg = $Data->add()>0?'数据添加成功':'数据添加失败';
			} else {
				$msg = $Data->getError();
			}
			$this->assign('msg', $msg);
		}
		$this->display();
	}
	
	public function edit() {
		$this->chkSession();
		$this->mainLogic = new UserLogic();
		if(IS_POST){
			$Data = D('user');
			if($Data->create()) {
				$msg = $Data->save()>0?'数据编辑成功':'数据编辑失败';
				
			} else {
				$msg = $Data->getError();
			}
			$this->assign('msg', $msg);
		}
		$this->assign('vo', $this->mainLogic->find(I('uid')));
		$this->display('add');
	}
	
	public function status(){
		$this->chkSession();
		$status = I('status')==1?0:1;
		$this->mainLogic->status(I('uid'), $status);
		$this->redirect(I('server.HTTP_REFERER'));
	}
	
	protected function chkSession(){
		if(empty(I('session.admin_username'))) {
			$this->redirect('user/login');
		}
	}
}

?>