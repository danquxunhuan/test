<?php

  class SktimeAction extends PublicAction{
    	//添加标签
	    public  function add_sktime(){
	   
	     if(isset($_SESSION['ms_user_id'])){
		    $uid = $_SESSION['ms_user_id'];
		 }
		  if($uid){		    
			if(!empty($_POST['moring'])){
			$data['moring'] = $_POST['moring'];
			}
			
		    if(!empty($_POST['afternoon'])){
			$data['afternoon'] = $_POST['afternoon'];
			}
			
		    if(!empty($_POST['eveing'])){
			$data['eveing'] = $_POST['eveing'];
			}
			$data['uid'] = $uid;
			$data['create_time'] = time();
			$checkuid = D('Sktime')->where('uid = "'.$uid.'"')->count();
			if($checkuid >0){
			   $savetime = D('Sktime')->where('uid  = '$uid)->save($data);
			}else{
			  if(D('Sktime')->add($data)){
			    $vo['id']= D('Sktime')->where('uid = "'.$data['uid'].'"' )->getField('id');
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
	 
  
  }


















?>