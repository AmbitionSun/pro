<?php
namespace Admin\Logic;
use Think\Model;
use Think\Page;
class UserLogic extends Model{
	
	public $pageSize = 10;
	
	public function reg($username, $tel, $password) {
		//第一步：校验username和tel
		$Data = M('user');
		$contition['username'] = $username;
		$nums = $Data->where($contition)->count();
		if($nums>0) {//用户名已被人占用
			return "用户名已被人占用";
		} else {
			$where['tel'] = $tel;
			$nums = $Data->where($where)->count();
			if($nums>0)	return "手机号已注册过";
		}
		//第二步：校验没问题就插入记录
		$Form = D('User');
		if($obj = $Form->create()) {
			$obj['created'] = time();
			$pk = $Form->add($obj);
			return $pk;
		} else {
			return "新增失败";
		}
	}
	
	public function login($account, $password){
		$Data = M('user');
		$condition['username|tel'] = $account;   // select count(*) from 用户表 where (username=$account or tel=$account) and password=$password
		$condition['password'] = $password;
		$result = $Data->field('uid,tel,username')->where($condition)->find();//find和select区别：select是返回二维数组，find返回一维数组
		$count = count($result);
		if($count>0) {//登陆成功，写入登陆次数+1
			$data['loginTimes'] = $result['loginTimes']+1;
			$where['username|tel'] = $account;
			$Data->where($where)->save($data);
		}
		return $result;
	}
	
	public function all($kw){
		//分页思路：1 得到符合条件的总记录数，给出每页大小算出总页数 2 有了总页数后，利用Page来实现分页功能
		$Data = M('user');
		$condition['username'] = array('like', "%$kw%");
		$condition['email'] = array('like', "%$kw%");
		$condition['_logic'] = 'OR';
		$count = $Data->where($condition)->count();
		$page = new Page($count, $this->pageSize);
		$pageBar = $page->show();//显示分页栏

		$list = $Data->where($condition)->order('uid')->limit($page->firstRow.','.$page->listRows)->select();
		return array('pageBar'=>$pageBar, 'list'=>$list, 'count'=>$count);
	}
	
	public function delete($uid) {
		$Data = M('user');
		return $Data->delete($uid);
	}
	
	public function find($uid){
		$Data = M('user');
		return $Data->find($uid);
	}
	
	public function status($uid, $status){
		$Data = M('user');
		$Data->status = $status;
		$condition['uid'] = $uid;
		return $Data->where($condition)->save();	
	}
	
}

?>