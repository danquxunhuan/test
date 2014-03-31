<?php

  class StudyexperienceAction extends PublicAction{
    public function index(){
           $this->show("ffffffffff"); 
            }
  
    public function add_school(){
	  $data['school'] =$_POST['school'];
	  $data['study_stage'] =$_POST['study_stage'];
	  $data['start_time']=$_POST['start_time'];
	  $data['end_time'] = $_POST['end_time'];
	  $data['uid'] = $_SESSION['ms_user_id'];
	  if($data['uid']){
	    $info = D('Studyexperience')->add($data);
		if($info){
		  $vo['id'] = M('Studyexperience')->where('uid = '.$data['uid'])->order('id desc')->getField('id');
		  $vo['school'] = $data['school'];
		  $vo['study_stage'] =$data['study_stage'];
		  $vo['start_time'] = $data['start_time'];
		  $vo['end_time'] = $data['end_time'];
		  $this->ajaxReturn($vo, 'фюбшЁи╧╕ё║', 1);
		}else{
		  $this->error('no ok');
		}
	  }
	
	}
	
	public function del_school(){
		 $data['id']  = $_POST['id'];
		  if($data['id']){
		   $delok =D('Studyexperience')->where('id = '.$data['id'])->delete();
		   if($delok){
		     $this->ajaxReturn('','ok',1);
		   }else{
		     $this->error('no');
		   }
		  }
		
		}
	
    public function edit_work(){
	
	
	
	
	}
  
  
  
  
    public function add_jbxx(){	
	  $info['uname'] = $_POST['uname'];
	  $info['phone'] =$_POST['phone'];
	  $info['classid'] = $_POST['classid'];
	  $info['obj_id'] = $_POST['obj_id'];
	  $info['city'] =$_POST['city'];
	  $info['area']=$_POST['area'];
	  $info['province'] =$_POST['province'];
	  $data['emile'] = $_POST['emile'];
	  $data['teach_age'] = $_POST['teach_age'];
	  $data['identity'] =$_POST['identity'];
	  $data['education'] = $_POST['education'];
	  $data['school'] = $_POST['school'];
	  $data['major'] =$_POST['major'];
	  $data['home'] = $_POST['home'];
	  $data['hobby'] = $_POST['hobby'];
	  $data['bir_type'] = $_POST['bir_type'];
	  $data['year'] = $_POST['xuanze_year'];
	  $data['month'] = $_POST['xuanze_month'];
	  $data['day'] = $_POST['xuanze_day'];
	  $data['sex'] = $_POST['sex'];
	  
	  	if(isset($_SESSION['ms_user_id'])){
		    $uid = $_SESSION['ms_user_id'];
		}
		
		if($uid){		    
			$checkuid = D('Teacher_info')->where('uid = '.$uid)->find();
			if($checkuid){
			  if(D('Teacher_info')->where('uid = '.$uid)->save($data) && D('Member')->where('uid = '.$uid)->save($info)){
			     $vo['uname'] = $_POST['uname'];
	             $vo['phone'] =$_POST['phone'];
	             $vo['classid'] = $_POST['classid'];
	             $vo['obj_id'] = $_POST['obj_id'];
	             $vo['city'] =$_POST['city'];
	             $vo['area']=$_POST['area'];
	             $vo['province'] =$_POST['province'];
	             $vo['emile'] = $_POST['emile'];
	             $vo['teach_age'] = $_POST['teach_age'];
	             $vo['identity'] =$_POST['identity'];
	             $vo['education'] = $_POST['education'];
	             $vo['school'] = $_POST['school'];
	             $vo['major'] =$_POST['major'];
	             $vo['home'] = $_POST['home'];
	             $vo['hobby'] = $_POST['hobby'];
	             $vo['bir_type'] = $_POST['bir_type'];
	             $vo['year'] = $_POST['xuanze_year'];
	             $vo['month'] = $_POST['xuanze_month'];
	             $vo['day'] = $_POST['xuanze_day'];
	             $vo['sex'] = $_POST['sex'];
			    $this->ajaxReturn($vo,'ok',1);
			  }else{
			    $this->error('nook');
			  }
			}else{
			  $data['uid'] = $uid;
			  if(D('Teacher_info')->add($data)){
			    $this->ajaxReturn($data,'ok',1);
			  }else{
			    $this->error('no');
			  }
			}
		  
		}
	  
	
	}
	
  
  
  
  
  
  
  }
















?>