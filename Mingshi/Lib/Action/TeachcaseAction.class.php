<?php
/*
* 名师认证——默认首页，教学案例
*/
class TeachcaseAction extends PublicAction{

/*
* 名师认证——教学案例
*/
public function index(){
	$this->checkULogin();//检查是否登录
	$this->checkUid();
	//教学案例
	$case=D('Teachcase')->where('uid ='.$_GET['uid'])->order('create_time desc')->select();
	$this->assign('case',$case);
	$this->display();
}
		
/*
* 添加案例
*/
public  function add_case(){
	if(isset($_SESSION['ms_user_id'])){
		$uid = $_SESSION['ms_user_id'];
	}
	if($uid){		    
		if(!empty($_POST['title'])){
			$data['title'] = $_POST['title'];
		}
		$data['case'] = $_POST['content'];
		$data['create_time'] =time();
		$data['uid'] =$uid;
			if(D('Teachcase')->add($data)){
				$vo['id']= D('Teachcase')->where('uid = "'.$data['uid'].'"' )->order('id desc')->getField('id');
				$vo['title'] = $data['title'];
				$vo['content'] = $data['content'];   
				$this->ajaxReturn($vo,'ok',1);
			}else{
				$this->error('no');
			}
	}
}
		
		public function del_case(){
		 $data['id']  = $_POST['id'];
		  if($data['id']){
		   $delok =D('Teachcase')->where('id = '.$data['id'])->delete();
		   if($delok){
		     $this->ajaxReturn('','ok',1);
		   }else{
		     $this->error('no');
		   }
		  }		
		}
        //点击色块添加标签
		public function addtag(){		
		 $data['uid'] = $_SESSION['ms_user_id'];
		 $data['tid'] = $_POST['tid'];
		  if($data['tid']){
		  if(D('Usertags')->where('uid = '.$data['uid'].' and tid ='.$data['tid'])->getField('tid')){
		    $this->ajaxReturn('','',2);
		  }else{
		    $add =D('Usertags')->add($data);
			 if($add){
		      $newtag = D('Usertags')->join('ms_tag on ms_usertags.tid = ms_tag.id')->where('ms_usertags.tid = '.$data['tid'])->field('ms_tag.name,ms_usertags.*')->find();
			  $this->ajaxReturn($newtag,'ok',1);
		     }else{
		      $this->error('no');
		     }
		  }

		  }
		}
		
		
	    public function edit_case(){
		 $id  = $_POST['id'];
		 $data['title'] = $_POST['title'];
		 $data['case'] = $_POST['content'];
		  if(isset($id)){
		   $saveok =D('Teachcase')->where('id = '.$id)->save($data);
		   if($saveok){
		     $this->ajaxReturn('','ok',1);
		   }else{
		     $this->error('no');
		   }
		  }		
		}
		
		//给案例添加评论
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
			  $m= D('Reviewcase');
			  if($m->add($data)){
			    $vo['id']= M('Reviewcase')->order('pl_time desc')->limit(1)->getField('id');
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
		   $delok =D('Reviewcase')->where('id = '.$data['id'])->delete();
		   if($delok){
		     $this->ajaxReturn('','ok',1);
		   }else{
		     $this->error('no');
		   }
		  }
		
		}

  
  
  
  
  }


















?>