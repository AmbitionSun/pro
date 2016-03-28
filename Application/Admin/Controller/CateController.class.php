<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Admin\Logic\CateLogic;
class CateController extends BaseController{
	
	public function add(){
		if(IS_POST) {
			$Data = D('cate');
			if($Data->create()) {
				$msg = $Data->add()>0?'数据添加成功':'数据添加失败';
			} else {
				$msg = $Data->getError();
			}
			$this->assign('msg', $msg);
		}
		
		$cateLogic = new CateLogic();
		$this->assign('list', $cateLogic->one(I('id')));
		$this->display();
	}

	public function del(){
		$cateLogic = new CateLogic();
		
		//判断该类别下商品数量，如果有商品则给提示，无的话可以删
		if($cateLogic->countByCate(I('id'))>0) {
			$this->redirect('cate/all', 'show=1');
		} else {
			$cateLogic->delete(I('id'));
			$this->redirect('cate/all');
		}
	}
	
	public function edit() {
		$cateLogic = new CateLogic();
		if(IS_POST){
			$Data = D('cate');
			if($Data->create()) {
				$msg = $Data->save()>0?'数据编辑成功':'数据编辑失败';
	
			} else {
				$msg = $Data->getError();
			}
			$this->assign('msg', $msg);
		}
		$this->assign('cate', $cateLogic->find(I('id')));
		$this->assign('list', $cateLogic->all());
		$this->display('add');
	}

	public function batch(){
		if(I('post.batchSave')!='') {//批量保存
			$id = $_POST['id'];//获取复选框的值，类似于array(1,3,5)
			$hid = $_POST['hid'];//获取每个类别的主键
			$name = $_POST['name'];//获取每个类别的名称
	
			foreach ($hid as $k=>$v){
				if(in_array($v, $id))  $vv[] = $k;
			}//$vv保存的就是选中记录对应name的索引
			
			$Data = M('cate');
			foreach ($id as $k=>$v) {
				$Data->find($v);
				$Data->name = $name[$vv[$k]];
				$Data->save();
			}
			$this->redirect(I('server.HTTP_REFERER'));
		}
	}
	
	public function status(){
		$cateLogic = new CateLogic();
		$status = I('status')==1?0:1;
		$cateLogic->status(I('id'), $status);
		$this->redirect(I('server.HTTP_REFERER'));
	}
	
	public function all(){
		$cateLogic = new CateLogic();
		$allCate = $cateLogic->all();
		$this->assign('list', $allCate['data']);
		$this->assign('count', count($allCate['data']));
		$this->assign('subCount', $allCate['subCount']);
		$this->show = I('show');
		$this->display('list');
	}

}

?>