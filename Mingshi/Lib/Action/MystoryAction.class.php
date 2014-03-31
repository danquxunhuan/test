<?php

  class MystoryAction extends PublicAction{
    public function index(){
	    $this->checkULogin();//检查是否登录
        $this->checkUid();
	    //我的故事
        $mystory=D('Mystory')->where('uid ='.$_GET['uid'])->order('create_time desc')->select();
        $this->assign('mystory',$mystory);	
        $this->display();   
    }
  
    public function add_story(){
	  $data['msg'] =$_POST['content'];
	  $data['uid'] = $_SESSION['ms_user_id'];
	  $data['title'] =$_POST['title'];
	  $data['create_time'] = time();
	  if($data['uid']){
	    $info = D('Mystory')->add($data);
		if($info){
		  $this->ajaxReturn($data, '评论成功！', 1);
		}else{
		  $this->error('no ok');
		}
	  }
	
	}
	
		public function del_story(){
		 $data['id']  = $_POST['id'];
		  if($data['id']){
		   $delok =D('Mystory')->where('id = '.$data['id'])->delete();
		   if($delok){
		     $this->ajaxReturn('','ok',1);
		   }else{
		     $this->error('no');
		   }
		  }
		
		}
	
	    public function edit_story(){
		 $id  = $_POST['id'];
		 $data['title'] = $_POST['title'];
		 $data['msg'] = $_POST['content'];
		 $data['create_time']=time();
		  if(isset($id)){
		   $saveok =D('Mystory')->where('id = '.$id)->save($data);
		   if($saveok){
		     $this->ajaxReturn('','ok',1);
		   }else{
		     $this->error('no');
		   }
		  }		
		}
		
		
		//给故事添加评论
		public function add_review(){
		    $data['msg'] = $_POST['msg'];
			$data['pl_time']=time();
			if(isset($_POST['pid'])){
			$data['pid']= $_POST['pid'];
			}			
			if(isset($_SESSION['ms_user_id'])){
			$data['uid'] = $_SESSION['ms_user_id'];
			}
			$data['perid'] = $_POST['perid'];
            //dump($data);
			if($data){
			  $m= D('Reviewstory');
			  if($m->add($data)){
			    $vo['id']= M('Reviewstory')->order('pl_time desc')->limit(1)->getField('id');
                $vo['pl_time'] = date('Y-m-d H:i:s', $data['pl_time']);
				//nl2p p转换
                $vo['msg'] = nl2p($data['msg']);
				$vo['uname']=D('Member')->where("uid=" .$data['uid'])->getField('uname');
			    $this->ajaxReturn($vo,'ok',1);
				//echo json_encode($data);
			  }else{
			    $this->error('nook');
			  }
			}
		
		}
		
		public function del_review(){
		 $data['id']  = $_POST['id'];
		  if($data['id']){
		   $delok =D('Reviewstory')->where('id = '.$data['id'])->delete();
		   if($delok){
		     $this->ajaxReturn('','ok',1);
		   }else{
		     $this->error('no');
		   }
		  }
		
		}
  
  
  
  
  
  
  
  
  
  
  
  }
















?>