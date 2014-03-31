<?php

  class TagAction extends PublicAction{
    	//添加标签
	    public  function add_tag(){
	   
	     if(isset($_SESSION['ms_user_id'])){
		    $uid = $_SESSION['ms_user_id'];
		 }
		  if($uid){		    
			if(!empty($_POST['tag'])){
			$data['name'] = $_POST['tag'];
			}
			$checkuid = D('Tag')->where('name = "'.$data['name'].'"')->count();
			if($checkuid >0){
			    $this->ajaxReturn(data,"该标签已经存在",2);
			}else{
			  if(D('Tag')->add($data)){
			    $vo['id']= D('Tag')->where('name = "'.$data['name'].'"' )->getField('id');
				$vo['name'] = $data['name'];
			      $info['uid'] = $uid;
				  $info['tid'] = $vo['id'];
				  $checktag =D('Usertags')->where('uid = '.$uid.' and tid ='.$info['tid'].'')->count();
				   if($checktag> 0){
				     $this->ajaxReturn('',"已贴上该标签",3); 
				   }else{
                     D('Usertags')->add($info);				 
				   }
			       
			    $this->ajaxReturn($vo,'ok',1);
			  }else{
			    $this->error('no');
			  }
			}
		  
		  }
	   
	    }
		
		public function deltag(){
		 $data['id']  = $_POST['id'];
		  if($data['id']){
		   $delok =D('Usertags')->where('id = '.$data['id'])->delete();
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
		
		public function hyih(){
		    $tagList = D('Tag')->order('rand()')->limit(10)->select();
		    if($tagList){
               $str = json_encode($tagList);
               exit("$str");
           }else{
               exit("0");
           }
		}
  
  
  
  
  
  
  
  }


















?>