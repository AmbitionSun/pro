<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Admin\Logic\ItemLogic;
use Admin\Logic\PicLogic;
use Admin\Logic\CommentLogic;

class ItemController extends BaseController {
	
	public function all(){
		$itemLogic = new ItemLogic();
		$result = $itemLogic->all(I('kw'));
		$this->assign('pageBar', $result['pageBar']);
		$this->assign('list', $result['list']);
		$this->assign('count', $result['count']);
		$this->display('list');
	}
	
	public function view(){
		$itemLogic = new ItemLogic();
		$picLogic = new PicLogic();
		$commentLogic = new CommentLogic();
		$this->assign('vo', $itemLogic->find(I('id')));
		$this->assign('pic_list', $picLogic->all(I('id')));
		$this->assign('comment_list', $commentLogic->allByItem(I('id')));
		$this->display();
	}
	
	public function del(){
		$itemLogic = new ItemLogic();
		if($itemLogic->delete(I('id'))>0) {
			$this->redirect(I('server.HTTP_REFERER'));
		}
	}
	
	public function batch(){
		if(IS_POST && $_POST['id']) {//批量删除
			$id = $_POST['id'];//获取复选框的值，类似于array(1,3,5)
			$id = implode($id, ',');//得到的id是字符串"1,3,5"
	
			$Data = M('item');
			$condition['id'] = array('in', $id);
			$Data->where($condition)->delete();
		}
		$this->redirect(I('server.HTTP_REFERER'));
	}
	
}

?>