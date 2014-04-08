<?php

   class  PublicAction  extends CommonAction{
   
   
    function index(){
		    $this->login();
	    }	
		
	function login(){
		    $this->display();
	    }
		
	
	 function checkLogin(){
		if(empty($_POST['username'])) {
			$this->error('帐号错误！');
		}elseif (empty($_POST['password'])){
			$this->error('密码必须！');
		}
		
		if($_SESSION['verify']!= md5($_POST['verify'])) {
        $this->error('验证码错误！');
        }
        //生成认证条件
        $map  =  array();
		// 支持使用绑定帐号登录
		$map['username']= $_POST['username'];
		
		import ( 'ORG.Util.RBAC' );
        $authInfo = RBAC::authenticate($map,Admin);
        //使用用户名、密码和状态的方式进行认证
        if(false === $authInfo) {
            $this->error('帐号不存在或已禁用！');
        }else {
            if($authInfo['password'] != md5($_POST['password'])) {
            	$this->error('密码错误！');
            }
            $_SESSION[C('USER_AUTH_KEY')]	=	$authInfo['aid'];
            if($authInfo['username']=='admin') {
            	$_SESSION['administrator']		=	true;
				echo $_SESSION['administrator'];
            }
          

			// 缓存访问权限
            RBAC::saveAccessList();
			// $this->success('登录成功！');
            $this->redirect('admin.php/Index/index','页面跳转中...');//跳转
		}
	}
		
    function loginout(){
		if(isset($_SESSION[C('USER_AUTH_KEY')])) {
			unset($_SESSION[C('USER_AUTH_KEY')]);
			unset($_SESSION);
			session_destroy();
            $this->assign("jumpUrl",__URL__.'/login/');
            $this->success('登出成功！');
        }else {
            //$this->error('已经登出！');
			 $this->redirect('admin.php/Public/login','页面跳转中...');
        }
	}

	
   
    
	
	
	
	public function checkPic(){
            import('@.ORG.UploadFile');
             $upload = new UploadFile();// 实例化上传类
             $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
             $upload->autoSub =true ;
             $upload->subType ='date' ;
             $upload->dateFormat ='ym' ;
             $upload->savePath =  './Uploads/thumb/';// 设置附件上传目录
             if($upload->upload()){
                 $info =  $upload->getUploadFileInfo();
                 echo json_encode(array(
                   'url'=>$info[0]['savename'],
                   'title'=>htmlspecialchars($_POST['pictitle'], ENT_QUOTES),
                   'original'=>$info[0]['name'],
                   'state'=>'SUCCESS'
                 ));
              }else{
                 echo json_encode(array(
                  'state'=>$upload->getErrorMsg()
                 ));
            }
    }
			
/*
* AJAX查询市
*/
public function getAreaName(){	
	$id = intval($_GET['id']);
	if($id){
	   $data = M("Area")->field('id,name')->where("pid=".$id)->select();
	   if($data){
		   $str = json_encode($data);
		   exit("$str");
	   }else{
		   exit("0");
	   }
	}
}		
			
   
  
  
  
   }
 

?>