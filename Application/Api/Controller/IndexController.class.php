<?php
namespace Api\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$this->show('这是API模块', 'utf-8');
    }
}