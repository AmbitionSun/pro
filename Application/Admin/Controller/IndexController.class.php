<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class IndexController extends BaseController {
    public function index(){
        //查询各项商品数等统计数字
        $MItem = M('item');
        $MComment = M('comment');
        $MUser = M('user');
        $this->assign('itemNums', $MItem->count());
        $this->assign('commentNums', $MComment->count());
        $this->assign('userNums', $MUser->count());
        
        //查询最新发布的商品
        $this->assign('items', $MItem->limit(5)->order('id desc')->select());
        
        //查询最近的留言
        $this->assign('comments', $MComment->field("tp_comment.*,i.title")->join(" LEFT JOIN tp_item i ON tp_comment.itemId=i.id")
        						->limit(5)->order('tp_comment.id desc')->select());
        
        //查询最活跃的用户
        $this->assign('users', $MUser->limit(8)->order('loginTimes desc')->select());
    	$this->display();
    }
}