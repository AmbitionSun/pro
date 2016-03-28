<?php
namespace Admin\Logic;
use Think\Model;
use Think\Page;
class CommentLogic extends Model{
	
	public $pageSize = 10;
	
	//根据商品ID查询某个商品的所有评论
	public function allByItem($id){
		//分页思路：1 得到符合条件的总记录数，给出每页大小算出总页数 2 有了总页数后，利用Page来实现分页功能
		$Data = M('comment');
		$condition['itemId'] = $id;
		$count = $Data->where($condition)->count();
		$list = $Data->where($condition)->order('id desc')->select();
		return $list;
	}
	
	//根据关键字查询所有的评论
	public function all($kw){
		//分页思路：1 得到符合条件的总记录数，给出每页大小算出总页数 2 有了总页数后，利用Page来实现分页功能
		$Data = M('comment');
		$condition['tp_comment.content'] = array('like', "%$kw%");
		$count = $Data->where($condition)->count();
		$page = new Page($count, $this->pageSize);
		$pageBar = $page->show();//显示分页栏
	
		$list = $Data->field('tp_comment.*,i.title')->where($condition)->join(" INNER JOIN tp_item as i ON i.id=tp_comment.itemId")
					->order('tp_comment.id')->limit($page->firstRow.','.$page->listRows)->select();
		return array('pageBar'=>$pageBar, 'list'=>$list, 'count'=>$count);
	}
	
	//根据用户名查询给自己的留言
	public function my($username){
		$Data = M('comment');
		$condition['i.username'] = $username;
		$list = $Data->field("c.*,i.pic")->alias("c")->join(" JOIN tp_item i ON c.itemId=i.id")->where($condition)->select();
		return $list;
	}
	
	public function delete($id) {
		$Data = M('comment');
		return $Data->delete($id);
	}
	
	//删除自己发布的评论
	public function deleteMyComment($id, $username){
		$Data = M('comment');
		$result = $Data->find($id);
		if($result['username']==$username) {
			return $Data->delete($id);//返回影响的行数，肯定大于0
		} else {
			return 0;
		}
	}
	
	//重置某条消息为已读状态
	public function read($id){
		$Data = M('comment');
		return $Data->where("id=$id")->setField("readed", 1);
	}
}

?>