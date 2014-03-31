<?php

  class WorkexperienceAction extends PublicAction{
         public function index(){
           $this->show("ffffffffff"); 
            }
  
    public function add_work(){
	  $data['company'] =$_POST['company'];
	  $data['content'] =$_POST['content'];
	  $data['start_time']=$_POST['start_time'];
	  $data['end_time'] = $_POST['end_time'];
	  $data['uid'] = $_SESSION['ms_user_id'];
	  if($data['uid']){
	    $info = D('Workexperience')->add($data);
		if($info){
		  $vo['id'] = M('Workexperience')->where('uid = '.$data['uid'])->order('id desc')->getField('id');
		  $vo['company'] = $data['company'];
		  $vo['content'] =$data['content'];
		  $vo['start_time'] = $data['start_time'];
		  $vo['end_time'] = $data['end_time'];
		  $this->ajaxReturn($vo, 'фюбшЁи╧╕ё║', 1);
		}else{
		  $this->error('no ok');
		}
	  }
	
	}
	
		public function del_work(){
		 $data['id']  = $_POST['id'];
		  if($data['id']){
		   $delok =D('Workexperience')->where('id = '.$data['id'])->delete();
		   if($delok){
		     $this->ajaxReturn('','ok',1);
		   }else{
		     $this->error('no');
		   }
		  }
		
		}
	
    public function edit_work(){
	
	
	
	
	}
  
  
  
  
  
  
  
  
  
  
  
  }
















?>