<?php

    class MessageAction extends PublicAction{
	  
		public function index(){
		 if(isset($_SESSION['ms_user_id'])){
		    $uid = $_SESSION['ms_user_id'];
		 }
			$list=D('Message')->where('uid ='.$uid )->select();
			$this->assign('list',$list);
            $this->display();
		}

	}
?>