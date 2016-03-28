<?php
namespace Api\Controller;
use Api\Controller\BaseController;
use Admin\Logic\ItemLogic;
use Admin\Logic\PicLogic;
use Admin\Logic\CommentLogic;
use Think\Model;
class ItemController extends BaseController{
	
	public $mainLogic;
	
	public function _initialize(){
		$this->mainLogic = new ItemLogic();
	}
	
	//发布闲置商品
	public function post(){
		if(IS_POST) {
			$Form = D('item');
			if($Form->create()) {
				$pk = $Form->add();
				//插入商品图片
				$urls = I('urls');
				$nums = count($urls);
				foreach ($urls as $k=>$v) {
					$values .= "('$v',$pk)";
					if($k!=$nums-1) $values .= ',';
					//把存放在临时文件夹下的图片移动到正式目录下
					rename(C('uploadDirTemp').$v, C('uploadDir').$v);
				}
				$Model = new Model();
				$sql = "insert into tp_pic(url,itemId) values $values";
				$Model->execute($sql);
				if($pk>0)	$res = wrap_json(parent::CODE_OK, '发布成功');
			} else {
				$Form->getError();
				$res = wrap_json(parent::CODE_FAIL, '发布失败');
			}
			echo u2_json_encode($res);
		}
	}
	
	//编辑我发布的商品
	public function edit(){
		if(IS_PUT) {
			$Form = D('item');
			if($bean=$Form->create()) {
				$pk = $Form->save(I('put.'));
				if($pk>0)	$res = wrap_json(parent::CODE_OK, '编辑成功', $bean);
			} else {
				$Form->getError();
				$res = wrap_json(parent::CODE_FAIL, $Form->getError());
			}
			echo u2_json_encode($res);
		}
	}
	
	//删除商品
	public function del(){
		//先找到该商品的所有图片名
		$Pic = M('pic');
		$pics = $Pic->where("itemId=".I('get.id'))->select();
		foreach ($pics as $v) {
			unlink(C("uploadDir").$v['url']);
		}
		if($this->mainLogic->delete(I('get.id'))>0) {
			$res = wrap_json(parent::CODE_OK, '成功删除商品');
			echo u2_json_encode($res);
		}
	}
	
	//我发布的商品
	public function my_item(){
		$res = $this->mainLogic->myItem(I('account'), I('p'));
		echo u2_json_encode($res);
	}
	
	//收藏商品和取消收藏商品
	public function favor(){
		$data['uid'] = I('uid');
		$data['itemId'] = I('itemId');
		$Model = M('collection_item');
		$nums = $Model->where($data)->count();
		if($nums>0) {//代表当前已收藏状态
			$nums = $Model->where($data)->delete();
			if($nums>0)	$res = wrap_json(parent::CODE_OK, '删除成功', 0); else $res = wrap_json(parent::CODE_FAIL, '失败：该收藏已删除');
		} else {
			$data['created'] = time();
			try {
				$pk = $Model->add($data);
			} catch (\Exception $e) {}
			if($pk>0)	$res = wrap_json(parent::CODE_OK, '添加成功', 1); else $res = wrap_json(parent::CODE_FAIL, '失败：请勿重复添加');
		}
		echo u2_json_encode($res);
	}
	
	//显示我收藏的商品
	public function my_favor(){
		$res = $this->mainLogic->myFavorItem(I('uid'), I('p'));
		echo u2_json_encode($res);
	}
	
	//搜索商品
	public function search(){
		$res = $this->mainLogic->all(I('kw'), I('cid'), I('order'), I('uid'), I('p'));
		echo u2_json_encode($res);
	}
	
	//查看商品详情
	public function view(){
		//为该商品的浏览次数+1
		$this->mainLogic->hits(I('id'));
		$item = $this->mainLogic->find(I('id'));
		
		$picLogic = new PicLogic();
		$item['picList'] = $picLogic->all(I('id'));//查询该商品所有图片
		$commentLogic = new CommentLogic();
		$item['commentList'] = $commentLogic->allByItem(I('id'));//查询该商品所有图片
		
		$res = $item;
		echo u2_json_encode($res);
	}
	
	
	
}

?>