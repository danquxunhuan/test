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
    //show add html
	public function add(){
		$this->display();
	}

    //insert institution edu
	public function add_edu(){
		$date=array(
			'name'=>trim($_POST['name']),
			'tel'=>trim($_POST['tel']),
			'address'=>trim($_POST['add']),
			'info'=>trim($_POST['info']),
			'linkman'=>trim($_POST['linkman'])
			);
		$Institution=M("Institution_edu");
		$info=$Institution->add($date);
		if($info){
			$msg=1;
		}else{
			$msg=0;
		}
		echo json_encode($msg);
	}

	// show modify institution edu info html
	public function modify(){
		$id=intval($_GET['id']);
		$Institution=M("Institution_edu");
		$info=$Institution->where("id=".$id)->find();
		$this->assign("info",$info);
		$this->display();
	}

	//modify institution edu on update
	public function modify_info(){
		$date=array(
			'id'=>intval($_POST['id']),
			'name'=>trim($_POST['name']),
			'tel'=>trim($_POST['tel']),
			'address'=>trim($_POST['add']),
			'info'=>trim($_POST['info']),
			'linkman'=>trim($_POST['linkman'])
			);
		$Institution=M("Institution_edu");
		$info=$Institution->save($date);
		if($info){
			$msg=1;
		}else{
			$msg=0;
		}
		echo json_encode($msg);
	}
}


?>