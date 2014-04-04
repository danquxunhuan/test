<?php
/*
 *author:wangqing
 *教育机构操作action
 *
 *
 */

/**
* 
*/
class InstitutionAction extends CommonAction{
	
	public function index(){
		$edu=M("Institution_edu")->select();
		$this->assign('list',$edu);
		$this->display();
	}

	public function del(){
		$id=intval($_POST['id']);
		$inst=M("Institution_edu");
		$info=$inst->where('id='.$id)->delete();
		if($info){
			$msg=1;
		}else{
			$msg=0;
		}
		echo json_encode($msg);
	}

	public function add(){
		$this->display();
	}
}


?>