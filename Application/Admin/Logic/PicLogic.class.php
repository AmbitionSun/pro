<?php
namespace Admin\Logic;
use Think\Model;
use Think\Page;
class PicLogic extends Model{
	
	//根据商品ID查询旗下所有图片
	public function all($id){
		//分页思路：1 得到符合条件的总记录数，给出每页大小算出总页数 2 有了总页数后，利用Page来实现分页功能
		$Data = M('pic');
		$condition['itemId'] = $id;
		$count = $Data->where($condition)->count();
		$page = new Page($count, $this->pageSize);
		$pageBar = $page->show();//显示分页栏
	
		$list = $Data->where($condition)->order('id')->limit($page->firstRow.','.$page->listRows)->select();
		return $list;
	}
	
	public function delete($id) {
		$Data = M('pic');
		return $Data->delete($id);
	}
	
}

?>