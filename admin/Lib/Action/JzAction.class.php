<?php
class JzAction extends CommonAction{
/*
* 会员管理列表
*/
public function index() {
	$User = M('Member'); // 实例化User对象
	import('ORG.Util.Page');// 导入分页类
	$count      = $User->where('tid=1')->count();// 查询满足要求的总记录数
	$Page       = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
	$show       = $Page->show();// 分页显示输出
	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
	$list = $User->where('tid=1')->limit($Page->firstRow.','.$Page->listRows)->select();
	$this->assign('list',$list);// 赋值数据集
	$this->assign('page',$show);// 赋值分页输出
	$this->display();
}    
    

/*
* 删除会员
*/
public function del(){
	$this->checkToken(); //令牌验证
	$m = D("Member");
	$uid = trim($_GET['uid']);
	if($m->where("uid=".$uid."")->delete()){
		$msg = '删除成功';
	}else{
		$msg = '删除失败';
	}
	echo json_encode($msg);	
}


/*
* 添加家长会员展示页
*/
public function add(){
	$M = M("Member");
	if(isset($_GET['uid'])){  //修改页
		$uid = (int)$_GET['uid'];
		$pre = C("DB_PREFIX");
		//取会员信息
		$info = $M->where("`uid`=" . $uid)->find(); 
		if (empty($info['uid'])) {
			//$this->error("不存在该家长ID", U('Member/index'));
			$msg = '不存在该家长ID';
			exit;
		}	
		$this->assign('info', $info);
		//取会员省市区具体信息
		$city = M('Area')->field('id,name')->where('id='.$info['city'])->find();
		$area = M('Area')->field('id,name')->where('id='.$info['area'])->find();
		$this->assign('city',$city);
		$this->assign('area',$area);
	}

	//孩子年级
	$class=M('Child_class')->where('id<13')->select();
	$this->assign("class", $class);
	
	$this->display();

}

/*
* 添加家长会员方法
*/	
public function addMem(){
	$obj=M('Member');
	$data=array(
		'uname'=>trim($_POST['uname']),
		'password'=>md5(trim($_POST['password'])),
		'phone'=>trim($_POST['phone']),
		'classid'=>trim($_POST['classid']),
		'rankid'=>trim($_POST['rankid']),
		'coin'=>trim($_POST['coin']),
		'province'=>trim($_POST['province']),
		'city'=>trim($_POST['city']),
		'area'=>trim($_POST['area']),
		);
	//增加家长固定信息
	$data['status'] = 1;  //后台添加会员直接审核通过
	$data['tid'] = 1;
	$data['regdate'] = time();
	$info = $obj -> add($data);
	if($info){
		$msg = '添加家长成功';
	}else{
		$msg = '添加家长失败';
	}
   echo json_encode($msg);	
}	

	
/*
* 修改家长会员信息展示页
*/
public function edit(){
	$M = M("Member");
	if(isset($_GET['uid'])){  //修改页
		$uid = (int)$_GET['uid'];
		$pre = C("DB_PREFIX");
		//取会员信息
		$info = $M->where("`uid`=" . $uid)->find(); 
		if (empty($info['uid'])) {
			$msg = '不存在该家长ID';
			exit;
		}	
		$this->assign('info', $info);
		//取会员省市区具体信息
		$city = M('Area')->field('id,name')->where('id='.$info['city'])->find();
		$area = M('Area')->field('id,name')->where('id='.$info['area'])->find();
		$this->assign('city',$city);
		$this->assign('area',$area);
	}
	
	//地区——北京
	$area= D('Area');
	$areaData =$area->field('id,name')->where('pid=0')->select();
	$this->assign('areaData',$areaData);		

	//孩子年级
	$class=M('Child_class')->where('id<13')->select();
	$this->assign("class", $class);
	
	$this->display();
}


/*
* 修改家长会员信息
*/
public function editMem() {
	//$this->checkToken(); //令牌验证
	$obj=M('Member');
	$uid=trim($_POST['uid']);
	$data=array(
		'uname'=>trim($_POST['uname']),
		'password'=>md5(trim($_POST['password'])),
		'status'=>trim($_POST['status']),
		'phone'=>trim($_POST['phone']),
		'classid'=>trim($_POST['classid']),
		'rankid'=>trim($_POST['rankid']),
		'coin'=>trim($_POST['coin']),
		'uid'=>trim($_POST['uid']),
		'province'=>trim($_POST['province']),
		'city'=>trim($_POST['city']),
		'area'=>trim($_POST['area']),
	);
	//编辑
   $data['uid'] = $uid;
   $info = $obj -> save($data);
   if($info){
		$msg = '修改家长信息成功';
   }else{
		$msg = '修改家长信息失败';
   }

   echo json_encode($msg);
}


















  
}
