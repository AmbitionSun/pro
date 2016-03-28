<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Admin\Logic\CommentLogic;
class CommentController extends BaseController {
	
	public function all(){
		$commentLogic = new CommentLogic();
		$result = $commentLogic->all(I('kw'));
		$this->assign('pageBar', $result['pageBar']);
		$this->assign('list', $result['list']);
		$this->assign('count', $result['count']);
		$this->display('list');
	}
	
	public function del(){
		$commentLogic = new CommentLogic();
		if($commentLogic->delete(I('id'))>0) {
			$this->redirect(I('server.HTTP_REFERER'));
		}
	}
	
	public function batch(){
		if(IS_POST && $_POST['id']) {//批量删除
			$id = $_POST['id'];//获取复选框的值，类似于array(1,3,5)
			$id = implode($id, ',');//得到的id是字符串"1,3,5"
	
			$Data = M('comment');
			$condition['id'] = array('in', $id);
			$Data->where($condition)->delete();
		}
		$this->redirect(I('server.HTTP_REFERER'));
	}
	
}

?>