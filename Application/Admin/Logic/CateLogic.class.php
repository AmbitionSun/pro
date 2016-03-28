<?php
namespace Admin\Logic;
use Think\Model;
class CateLogic extends Model{
	
	public function delete($id) {
		$Data = M('cate');
		return $Data->delete($id);
	}
	
	public function all(){
		$Data = M('cate');
		$cate = $Data->where("tid=0")->select();
		
		foreach ($cate as $k=>$v) {
			$subCate = $Data->where("tid=".$v['id'])->select();
			$cate[$k]['subCate'] = $subCate;
			$count += count($subCate);
		}
		$allCate['data'] = $cate;
		$allCate['subCount'] = $count;//全部子类数量
		return $allCate;
	}
	
	//根据一级类别查询下面的子类集合
	public function one($id){
		$Data = M('cate');
		$condition['tid'] = $id;
		return $Data->where($condition)->select();
	}
	
	//根据主键查询某个类别
	public function find($id){
		$Data = M('cate');
		return $Data->find($id);
	}
	
	//根据传入的类别查询旗下的商品数
	public function countByCate($id){
		$Data = M('item');
		$condition['cateId1|cateId2'] = $id;
		return $Data->where($condition)->count();
	}

	public function status($id, $status){
		$Data = M('cate');
		$Data->status = $status;
		$condition['id'] = $id;
		return $Data->where($condition)->save();
	}
	
	//查询所有一级类别
	public function cate1(){
		$Data = M('cate');
		return $Data->field("id,name,pic")->where("tid=0")->select();
	}
	
}

?>