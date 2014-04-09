<?php  
/*
* 后台，约课
*/
class YuekeAction extends CommonAction{
/*
* 约课列表
*/   
public function index(){
	$this->checkToken();//检查是否登录
	$list = D("Yueke")->YuekeList();
	$this->assign("list", $list);
	$this->display();
}
   
   
    public function add(){
		$this->checkToken();//检查是否登录
	   if (IS_POST) {
            $this->checkToken();
			//var_dump($_POST);
            header('Content-Type:application/json; charset=utf-8');
            echo json_encode(D("Yueke")->addYueke());
        } else {
		      $area= D('Area');
		   $areaData =$area->field('id,name')->where('pid=0')->select();
           $this->assign('areaData',$areaData);		
		   //查询年级
		   $class=$area->query("select * from ms_child_class");  
		   $this->assign('class',$class); 
            //科目查询
		   $obj=M('Subject')->select();
		   $this->assign('obj',$obj);		   
            $this->display();
        }
	}
	
	 //AJAX查询市
       public function getAreaName(){
	
        $id = intval($_GET['id']);
        if($id){
           $data = M("Area")->field('id,name')->where("pid=$id")->select();
           if($data){
               $str = json_encode($data);
               exit("$str");
           }else{
               exit("0");
           }
        }
        }
		
/*
* 编辑约课信息（wyj）  
*/
public function edit(){
	//$this->checkToken();//检查是否登录
	if (IS_POST)  {
		$M = D("Yueke");
		$id = trim($_POST['id']);
		$data['id']=$_POST['id'];
		$data['msg']=$_POST['msg'];
		$data['status']=$_POST['status'];
		$data['tjid']=implode(',',$_POST['tjid']) ;
		
		if ($M->save($data)) {
			echo json_encode(1);
			// $this->success('编辑成功',U('Yueke/index'));
		} else {
			echo json_encode(0);
			// $this->success('编辑失败');
		}
	} else {
		$M = M("Yueke");
		$id = (int) $_GET['id'];
		//约课信息（含家长及老师姓名信息）
		$pre = C("DB_PREFIX");
		$info = $M->where("`id`=" . $id)->find();
			//取家长姓名信息
			$sql1="select uname from ms_member where uid = ".$info['uid'];
			$jzName = M()->query($sql1);
			$info['jzName'] = isset($jzName[0]['uname'])?$jzName[0]['uname']:'<span style="color:#6800C9;">游客</span>';
			//取老师姓名信息
			$sql2="select uname from ms_member where uid = ".$info['tid'];
			$lsName = M()->query($sql2);
			$info['lsName'] = isset($lsName[0]['uname'])?$lsName[0]['uname']:'<span style="color:#6800C9;">未指定</span>';
			//取地区名信息
			$info['province'] = M('Area')->where('id='.$info['provinceId'])->getField('name');
			$info['city'] = M('Area')->where('id='.$info['cityId'])->getField('name');
			$info['area'] = M('Area')->where('id='.$info['areaId'])->getField('name');
			//取孩子年级及辅导科目信息
			$info['className'] = M('Child_class')->where('id='.$info['class'])->getField('name');
			$info['objName'] = M('Subject')->where('id='.$info['obj'])->getField('subject');
		
		//如果是游客的约课信息的话，取推荐老师信息
		if($info['tid']==0){ //指定老师tid为0，即未指定
			if($info['class']>0 and $info['class']<7){ //小学
				$sql = "SELECT a.uid,a.uname,a.image,b.teach_age,b.keshifei,c.subject FROM ms_member as a LEFT JOIN ms_teacher_info as b ON a.uid=b.uid LEFT JOIN ms_subject as c ON a.obj_id=c.id WHERE a.tid=2 AND a.obj_id=".$info['obj']." AND a.classid in(1,2,3,4,5,6) AND b.keshifei between ".($info['budget']-100)." and ".($info['budget']+200);
			}elseif($info['class']>6 and $info['class']<10){ //初中
				$sql = "SELECT a.uid,a.uname,a.image,b.teach_age,b.keshifei,c.subject FROM ms_member as a LEFT JOIN ms_teacher_info as b ON a.uid=b.uid LEFT JOIN ms_subject as c ON a.obj_id=c.id WHERE a.tid=2 AND a.obj_id=".$info['obj']." AND a.classid in(7,8,9) AND b.keshifei between ".($info['budget']-100)." and ".($info['budget']+200);
			}else{ //高中
				$sql = "SELECT a.uid,a.uname,a.image,b.teach_age,b.keshifei,c.subject FROM ms_member as a LEFT JOIN ms_teacher_info as b ON a.uid=b.uid LEFT JOIN ms_subject as c ON a.obj_id=c.id WHERE a.tid=2 AND a.obj_id=".$info['obj']." AND a.classid in(10,11,12) AND b.keshifei between ".($info['budget']-100)." and ".($info['budget']+200);
			}
			$teacherList = M()->query($sql);
			//增加老师被评分情况,//增加平均分数据
			foreach($teacherList as $key=>$row){
				//平均分，取小数点后一位（wyj）
				$pingfen = D("Member")->review($row['uid']);
				$teacherList[$key]['pingfen'] = $pingfen['pscores'];
			}
			
			$this->assign("teacherList",$teacherList);
		}
		$this->assign("info",$info);
		/*/地区
		$area= D('Area');
		$areaData =$area->field('id,name')->where('pid=0')->select();
		$this->assign('areaData',$areaData);		
		//查询年级
		$class=$area->query("select * from ms_child_class");  
		$this->assign('class',$class);  
		//科目查询
		$obj=M('Subject')->select();
		$this->assign('obj',$obj);*/
		
		$this->display("add");
	}
}

    
	
	public function del(){	
	   $this->checkToken();//检查是否登录
	   $m= D("Yueke");
	   $id=trim($_GET['id']);
	   if($m->where("id=".$id."")->delete()){
	      $msg='删除成功';
	      //$this->success("删除成功");
	   }else{
	      $msg='删除失败';
	      //$this->error("删除失败");
	   }
		
		echo json_encode($msg);
	}
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   }
?>