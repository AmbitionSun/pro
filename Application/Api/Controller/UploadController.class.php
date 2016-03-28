<?php
namespace Api\Controller;
use Think\Controller;
class UploadController extends Controller{
	
	public function _initialize(){
		if(!file_exists(C('uploadDirTemp')))	mkdir(C('uploadDirTemp'));
		if(!file_exists(C('uploadDir')))	mkdir(C('uploadDir'));
	}
	
	//单文件上传
	public function index(){
		$nums = 0;
		foreach ($_FILES['pic']['tmp_name'] as $k=>$v) {
			$fileName = time().mt_rand(1, 100000).'.jpg';
			$arr[] = $fileName;
			if(@move_uploaded_file($_FILES['pic']['tmp_name'][$k], C('uploadDirTemp').$fileName)) {
				$nums++;		
			}
		}
		echo json_encode(wrap_json(200, "ok", implode(",", $arr)));
	}
	
	//删除单个文件
	public function del(){
		$file = I('fileName');
		if(!file_exists($file)) return;
		unlink($this->uploadDirTemp.$file);
	}
	
}

?>