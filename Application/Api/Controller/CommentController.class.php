<?php
namespace Api\Controller;
use Api\Controller\BaseController;
use Admin\Logic\CommentLogic;
class CommentController extends BaseController{
	
	public $mainLogic;
	
	public function _initialize(){
		parent::_initialize();
		$this->mainLogic = new CommentLogic();
	}
	
	//根据商品ID查询某个商品的所有评论
	public function all(){
		$res = wrap_json(parent::CODE_OK, 'OK', $this->mainLogic->allByItem(I('id')));
		echo u2_json_encode($res);
	}
	
	//发表以及回复商品评论
	public function post(){
		if(IS_POST) {
			$Form = D('comment');
			if($Form->create()) {
				$pk = $Form->add();
				if($pk>0)	$res = wrap_json(parent::CODE_OK, '发布成功', $pk);
			} else {
				$Form->getError();
				$res = wrap_json(parent::CODE_FAIL, '发布失败');
			}
			echo u2_json_encode($res);
		}
	}
	
	//删除自己的评论
	public function del(){
		$nums = $this->mainLogic->deleteMyComment(I('id'), I('username'));
		$res = $nums==0?wrap_json(parent::CODE_FAIL, '操作失败：不能删除别人的评论'):wrap_json(parent::CODE_OK, '删除成功');
		echo u2_json_encode($res);
	}
	
	//查看给自己发布商品的留言
	public function my(){
		$res = wrap_json(parent::CODE_OK, 'ok', $this->mainLogic->my(I('username')));
		echo u2_json_encode($res);
	}

	//重置某条消息为已读状态
	public function read(){
		$res = wrap_json(parent::CODE_OK, 'ok', $this->mainLogic->read(I('get.id')));
		echo u2_json_encode($res);
	}
}

?>