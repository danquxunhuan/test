<?php
class LsAction extends CommonAction{
/*
* 会员管理列表
*/
public function index() {
	$User = M('Member'); // 实例化User对象
	import('ORG.Util.Page');// 导入分页类
	$count      = $User->where('tid=2')->count();// 查询满足要求的总记录数
	$Page       = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
	$show       = $Page->show();// 分页显示输出
	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
	$list = $User->where('tid=2')->limit($Page->firstRow.','.$Page->listRows)->select();
	
	//添加教育机构信息
	foreach($list as $key=>$val){
		$list[$key]['edu'] = M('Institution_edu')->where('id='.$val['edu_id'])->getfield('name');
	}
	
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
* 添加教师.展示页
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
			$msg = '不存在该教师ID';
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
	$class = M('Child_class')->where('id>12')->select();
	$this->assign("class", $class);
	//科目
	$subject = M('Subject')->select();
	$this->assign("subject", $subject);
	//教育机构
	$edulist = M('Institution_edu')->select();
	$this->assign("edulist", $edulist);
	
	$this->display();
}

/*
* 添加教师.方法
*/	
public function addMem(){
	$obj=M('Member');
	$data=array(
		'uname'=>trim($_POST['uname']),
		'password'=>md5(trim($_POST['password'])),
		'jlpwd'=>md5(trim($_POST['jlpwd'])),
		'phone'=>trim($_POST['phone']),
		'classid'=>trim($_POST['classid']),
		'obj_id'=>trim($_POST['obj_id']),
		'province'=>trim($_POST['province']),
		'city'=>trim($_POST['city']),
		'area'=>trim($_POST['area']),
		'rankid'=>trim($_POST['rankid']),
		'edu_id'=>trim($_POST['edu_id']),
		'coin'=>trim($_POST['coin']),
		'image'=>trim($_POST['image']),
		'remarks'=>trim($_POST['remarks']),		
	);
	
	//增加教师固定信息
	$data['status'] = 1;  //后台添加会员直接审核通过
	$data['tid'] = 2;
	$data['regdate'] = time();
	$info = $obj -> add($data);
	if($info){
		//教师附属信息表，相应生成对应教师数据ms_teacher_info
		$data2 = array(
			'uid' => $info,
		);
		$info2 = M('Teacher_info') -> add($data2);
		if($info2){
			$msg = '添加教师成功';
		}
	}else{
		$msg = '添加教师失败';
	}
   echo json_encode($msg);	
}	

	
/*
* 修改教师.展示页
*/
public function edit(){
	$M = M("Member");
	if(isset($_GET['uid'])){  //修改页
		$uid = (int)$_GET['uid'];
		$pre = C("DB_PREFIX");
		//取会员信息
		$info = $M->where("`uid`=" . $uid)->find(); 
		if (empty($info['uid'])) {
			$msg = '不存在该教师ID';
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
	$class=M('Child_class')->where('id>12')->select();
	$this->assign("class", $class);
	//科目
	$subject = M('Subject')->select();
	$this->assign("subject", $subject);
	//教育机构
	$edulist = M('Institution_edu')->select();
	$this->assign("edulist", $edulist);
	
	$this->display();
}


/*
* 修改教师.方法
*/
public function editMem() {
	//$this->checkToken(); //令牌验证
	$obj=M('Member');
	$uid=trim($_POST['uid']);
	$data=array(
		'uname'=>trim($_POST['uname']),
		'password'=>md5(trim($_POST['password'])),
		'status'=>trim($_POST['status']),
		'jlpwd'=>md5(trim($_POST['jlpwd'])),
		'phone'=>trim($_POST['phone']),
		'classid'=>trim($_POST['classid']),
		'obj_id'=>trim($_POST['obj_id']),
		'province'=>trim($_POST['province']),
		'city'=>trim($_POST['city']),
		'area'=>trim($_POST['area']),
		'rankid'=>trim($_POST['rankid']),
		'edu_id'=>trim($_POST['edu_id']),
		'coin'=>trim($_POST['coin']),
		'image'=>trim($_POST['image']),
		'remarks'=>trim($_POST['remarks']),		
		'uid'=>trim($_POST['uid']),
	);
	//编辑
   $data['uid'] = $uid;
   $info = $obj -> save($data);
   if($info){
		$msg = '修改教师信息成功';
   }else{
		$msg = '修改教师信息失败';
   }
   echo json_encode($msg);
}


/*
* 修改教师附属表.展示页 ms_teacher_info
*/
public function editinfo(){
	$M = M("Teacher_info");
	if(isset($_GET['uid'])){  //修改页
		$uid = (int)$_GET['uid'];
		$pre = C("DB_PREFIX");
		//取会员信息
		$sql = "SELECT a.uname,b.* FROM ms_member as a LEFT JOIN ms_teacher_info as b ON a.uid=b.uid WHERE a.uid=".$uid;
		//$info = $M->where("`uid`=" . $uid)->join('ms_member')->find(); 
		$info = M()->query($sql);
		if (empty($info[0]['uid'])) {
			$msg = '不存在该教师附属信息ID';
		}	
		$this->assign('info', $info[0]);
		//教学风格各标签 ms_tag
		$tags=M('Tag')->select();
		$this->assign("tags", $tags);
		
	}		
	$this->display();
}


/*
* 修改教师附属表.方法 ms_teacher_info
*/
public function editinfoMem() {
	//$this->checkToken(); //令牌验证
	$obj=M('Member');
	$uid=trim($_POST['uid']);
	$data=array(
		'uname'=>trim($_POST['uname']),
		'password'=>md5(trim($_POST['password'])),
		'status'=>trim($_POST['status']),
		'jlpwd'=>md5(trim($_POST['jlpwd'])),
		'phone'=>trim($_POST['phone']),
		'classid'=>trim($_POST['classid']),
		'obj_id'=>trim($_POST['obj_id']),
		'province'=>trim($_POST['province']),
		'city'=>trim($_POST['city']),
		'area'=>trim($_POST['area']),
		'rankid'=>trim($_POST['rankid']),
		'edu_id'=>trim($_POST['edu_id']),
		'coin'=>trim($_POST['coin']),
		'image'=>trim($_POST['image']),
		'remarks'=>trim($_POST['remarks']),		
		'uid'=>trim($_POST['uid']),
	);
	//编辑
   $data['uid'] = $uid;
   $info = $obj -> save($data);
   if($info){
		$msg = '修改教师信息成功';
   }else{
		$msg = '修改教师信息失败';
   }
   echo json_encode($msg);
}


















  
}
