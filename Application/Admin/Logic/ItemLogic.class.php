<?php
namespace Admin\Logic;
use Think\Model;
use Think\Page;
class ItemLogic extends Model{
	
	public $pageSize = 3;
	
	public function all($kw, $cid='', $order='', $uid, $p=1){
		//分页思路：1 得到符合条件的总记录数，给出每页大小算出总页数 2 有了总页数后，利用Page来实现分页功能
		$Data = M('item');
		if(substr($kw, 0, 1)=='@') {
			$condition['username'] = substr($kw,1);
		} else {
			$condition['title'] = array('like', "%$kw%");
		}
		if(!empty($cid))	$condition['cateId1'] = $cid;		$totalCount = $Data->where($condition)->count();//echo $Data->_sql();exit();
		$page = new Page($totalCount, $this->pageSize);
		$totalPage = ceil($totalCount/$this->pageSize);
		$pageBar = $page->show();//显示分页栏
	
		$field = "id,username,title,pic,price,currentPrice,created,comments,collections,content";
		if(empty($uid)) {
			$field .= ",(select 0) as flag";
		} else {
			$field .= ",(select count(1) from tp_collection_item where uid=$uid and itemId=tp_item.id) as flag";
		}
			
		if(!empty($order) and $order=='time')	
			$Data->order('created desc');
		else
			$Data->order('id');
		$list = $Data->field($field)->where($condition)->select();
		//遍历每个商品，查询每个商品的图片
		$Model = M('pic');
		foreach ($list as $k=>$v) {
			$itemId = $v['id'];
			$pics = $Model->field("url")->where("itemId=$itemId")->select();
			$list[$k]['picList'] = $pics;
		}
		return array('totalCount'=>$totalCount, 'totalPage'=>$totalPage, 'list'=>$list);
	}
	
	public function find($id){
		$Data = M('item');
		return $Data->cache('item',10)->find($id);
	}
	
	public function delete($id) {
		$Data = M('item');
		return $Data->delete($id);
	}
	
	//查询我发布的商品(可根据uid、username查询)
	public function myItem($account){
		$Data = M('item');
		$condition['uid|username'] = $account;
		$totalCount = $Data->where($condition)->count();//总记录数
		$page = new Page($totalCount, $this->pageSize);
		$totalPage = ceil($totalCount/$this->pageSize);//总页数
		$list = $Data->where($condition)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
		return array('totalCount'=>$totalCount, 'totalPage'=>$totalPage, 'list'=>$list);
	}
	
	//查询我收藏的商品(可根据uid查询)
	public function myFavorItem($uid){
		$Data = M('collection_item');
		$condition['tp_collection_item.uid'] = $uid;
		$totalCount = $Data->where($condition)->count();//收藏的商品数
		$page = new Page($totalCount, $this->pageSize);
		$totalPage = ceil($totalCount/$this->pageSize);//总页数
		$list = $Data->field("tp_item.id,tp_item.username,tp_item.title,tp_item.content,tp_item.pic,tp_item.collections,tp_item.comments,(select 1) as flag")->where($condition)->
									join(" INNER JOIN tp_item ON tp_item.id=tp_collection_item.itemId")->order('tp_collection_item.created')
									->limit($page->firstRow.','.$page->listRows)->select();
		return array('totalCount'=>$totalCount, 'totalPage'=>$totalPage, 'list'=>$list);
	}

	//为商品的浏览次数+1
	public function hits($id){
		$Data = M('item');
		$Data->where("id=$id")->setInc("hits", 1);
	}
}

?>