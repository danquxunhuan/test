<?php
   /**
   * 前端控制层基类
   * @author 莎莎 2013-11-22
   */
   class  PublicAction  extends Action{   
    /**
     * 初始化
     */
    public function _initialize(){
	
	    define("MS_PUB_PATH",__APP__."/Public");
    	$this->assign("MS_PUB_PATH",MS_PUB_PATH);
		
        $uid = $this->getUloginID();
         if( $uid ){
             $userDataInfo = $this->getUserMsg();
             $this->assign('userDataInfo', $userDataInfo);
         }
		 $this->getQRCode();
    }

     /**
      * 获取登陆id
      * @return type 
      */
     protected function getUloginID(){
         if( !isset($_SESSION['ms_user_id']) ){
             return false;
         }
		 //echo $_SESSION['ms_user_id'];
         return $_SESSION['ms_user_id'];
		 
		if(empty($_SESSION['user_info'])){ //检查一下session是不是为空  
        if(empty($_COOKIE['uname']) || empty($_COOKIE['password'])){ //如果session为空，并且用户没有选择记录登录状  
              $this->error("请先登录",U('Index/login')); 
        }else{ //用户选择了记住登录状态  
            $user = M('Member')->where('uname ='.$_COOKIE['uname'].' and password ='.md5($_COOKIE['password']))->select(); //去取用户的个人资料  
            if(empty($user)){ //用户名密码不对没到取到信息，转到登录页面  
                $this->error("请先登录",U('Index/login'));   
            }else{  
                $_SESSION['user_info'] = $user; //用户名和密码对了，把用户的个人资料放到session里面
                return $_SESSION['user_info']; 				
            }  
        }  
        } 
     } 

     /**
      * 检查用户是否登录
      */
     protected function checkUlogin(){
         if( !($this->getUloginID()) ){
             //跳到登录页面
			 $this->error("请先登录",U('Index/login'));
             //$this->redirect("Index/login");
         }
     }
	 //后台中心 检查uid
	 public function checkUid(){
	     if(empty($_GET['uid'])){
		    $this->error('非法操作');
		 }else{
		 $checkUid = D('Member')->where('uid = '.$_GET['uid'])->find();
		  if(!$checkUid){
		    $this->error('不存在该会员');
		  }else{
		    $i =M('Member')->where('uid ='.$_GET['uid'])->getField('tid');
            //dump($i);		
            $this->assign('i',$i);
		  }
	     if($_GET['uid'] !== $_SESSION['ms_user_id']){
		    $this->error('非法操作');
		 }
	     }
	  } 

    /**
     * ajax返回数据格式
     * @param type $str
      *@author tangw 2012-05-16
     */
    protected function ajaxRstr($str){
        header('Content-Type: text/xml');
        echo "<?xml version='1.0' encoding='utf-8'?>";
        echo "<response>";
        echo $str;
        echo "</response>";   
    }
	//空操作
	public function _empty($name){
            //把所有城市的操作解析到city方法
            $this->error($name.'不存在','');
    }
		 /**
      +----------------------------------------------------------
     * 验证token信息
      +----------------------------------------------------------
     */
    protected function checkToken() {
        if (IS_POST) {
            if (!M("Admin")->autoCheckToken($_POST)) {
			    header('Content-Type:application/json; charset=utf-8');
                 die(json_encode(array('status' => 0, 'info' => '令牌验证失败,不允许重复提交')));
            }
            unset($_POST[C("TOKEN_NAME")]);
        }
    }
    
    protected function getUserMsg(){
        $uid = $this->getUloginID();
        $field = "uid,tid,uname,phone,coin,lastdate,style";
        $rs_user =D("Member")->field($field)->where("uid=$uid")->find();
        return $rs_user;
    }
	
	public  function loginout(){
		if(isset($_SESSION['ms_user_id'])) {
			unset($_SESSION['ms_user_id']);
			unset($_SESSION);
			session_destroy();
            $this->assign("jumpUrl",U('Index/login'));
            $this->success('登出成功！');
        }else {
            //$this->error('已经登出！');
			 $this->redirect('index.php/Index/login','页面跳转中...');
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
	
	
	  
	 /**
     * 引入头部文件
     * @author shasha 2013-11-01
     */
	Public function header_a () {
    $this->header_a = M('Cate')->select();
    $this->display();
    }
	
	 /**
     * 引入头部文件
     * @author shasha 2013-11-01
     */
	Public function header_m() {
    $this->header_m = M('Cate')->select();
    $this->display();
    }
	
	
    /**
     * 引入个人中心头部文件
     * @author shasha 2013-11-01
     */
	Public function header_c () {
    $this->header_c = M('Cate')->select();
    $this->display();
    }
	
	 /**
     * 引入头部文件
     * @author shasha 2013-11-01
     */
	Public function header () {
    $this->header = M('Cate')->select();
    $this->display();
    }
	
    /**
     * 引入分享文件
     * @author shasha 2013-11-01
     */
	Public function share() {
    $this->share = M('Cate')->select();
    $this->display();
    }		
	/**
     * 引入review文件
     * @author shasha 2013-12-27
     */
	Public function niceReview () {
    $this->niceReview = M('Cate')->select();
    $this->display();
    }
	
     /**
     * 引入userreview文件
     * @author shasha 2013-12-27
     */
	Public function userReview(){
    $this->userReview = M('Cate')->select();
    $this->display();
    }
	
	
	 /**
     * 引入userreview文件
     * @author shasha 2013-12-27
     */
	Public function  right(){	
	$this->right = M('Cate')->select();   
	$this->display();   
	}
	
	 /**
     * 引入login文件
     * @author shasha 2013-12-27
     */
	Public function login () {
    $this->login = M('Cate')->select();
    $this->display();
    }
  
    /**
     * 引入footer文件
     * @author shasha 2013-11-01
     */
	Public function footer () {
    $this->footer = M('Cate')->select();
    $this->display();
    }
	
	/*
	* 个人空间——会员信息，引入memberinfo文件
	*/
	Public function memberinfo () {
    //$this->memberinfo = M('Cate')->select();
    $this->display();
    }
	
	/*
	* 精读，引入author文件
	*/
	Public function authorinfo () {
    //$this->memberinfo = M('Cate')->select();
    $this->display();
    }
	
	/*
	* 精读，引入热门文章、精彩评论、最新评论
	*/
	Public function newsRight() {
    //$this->memberinfo = M('Cate')->select();
    $this->display();
    }
	
	//二维码
	protected function getQRCode($url = NULL) {
        if (IS_POST) {
            $this->assign("QRcodeUrl", "");
        } else {
//          $url = empty($url) ? C('WEB_ROOT') . $_SERVER['REQUEST_URI'] : $url;
            $url = empty($url) ? C('WEB_ROOT') . U(MODULE_NAME . '/' . ACTION_NAME) : $url;
            import('@.ORG.QRCode');
            $QRCode = new QRCode('', 150);
            $QRCodeUrl = $QRCode->getUrl($url);
            $this->assign("QRcodeUrl", $QRCodeUrl);
        }
    }		  
   }
   
   
 

?>