<?php
/*
* 设计教学方案
*/
class FanganAction extends PublicAction{
/*
* 添加教学方案
*/ 
public function addFangan(){
	$this->checkULogin();
	$data['uid'] = $_SESSION['ms_user_id'];
	$data['content'] = $_POST['content'];
	$data['creat_time']	= time();
	$data['kid'] = $_POST['kid'];
	
	
	//针对一个推荐的学生，每个老师只可以有一个设计方案（这里数据库建立了uid与kid的唯一索引）
	$flag = M('Fangan')->where('uid='.$data['uid'].' and kid='.$data['kid'])->find();
 	//var_dump($flag);
	if($flag){
		//var_dump($data);
		$this->error('重复提交');
	}else{
		$add = D('Fangan')->add($data);
		if($add){
			$this->ajaxReturn($data,'ok',1);
		}else{
			$this->error('添加失败');
		}
	}
	
	
}
  
  
  
  
  
  
  
  }









?>