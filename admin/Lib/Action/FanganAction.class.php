<?php
/*
* 教学方案
*/
class FanganAction  extends CommonAction{
/*
* 列表页
*/
public function index(){
	$this->checkToken();//检查是否登录
	//$sql = "SELECT a.id,a.creat_time,a.status,b.uname FROM ms_fangan as a LEFT JOIN ms_member as b ON a.uid=b.uid ORDER BY a.status ASC,a.creat_time desc";
	$sql = "SELECT a.id,a.creat_time,a.status,b.uname as lsName,c.phone,d.uname as jzName FROM ms_fangan as a LEFT JOIN ms_member as b ON a.uid=b.uid LEFT JOIN ms_yueke as c ON a.kid=c.id LEFT JOIN ms_member as d ON c.uid=d.uid ORDER BY a.status ASC,a.creat_time desc";
	$list = M()->query($sql);
	$this->assign('list',$list);
	$this->display();
}

/*
* 教学方案编辑
*/
public function edit(){
	$this->checkToken();//检查是否登录
	if(IS_POST){
		$M = D("Fangan");
		$id = trim($_POST['id']);
		if ($M->save($_POST)) {
			$this->success('编辑成功',U('Fangan/index'));
		} else {
			$this->success('编辑失败');
		}
	}else{
		$id = isset($_GET['id'])?$_GET['id']:0;
		if($id==0){
			$this->error("参数不正确");
		}
		$info = D('Fangan')->where('id='.$id)->find();
		$this->assign('info',$info);
		$this->display();
	}
	
}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}

?>