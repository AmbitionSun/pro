<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Admin\Logic\PicLogic;
class PicController extends BaseController {
	
	public function del(){
		$picLogic = new PicLogic();
		if($picLogic->delete(I('id'))>0) {
			$this->redirect(I('server.HTTP_REFERER'));
		}
	}
	
}

?>