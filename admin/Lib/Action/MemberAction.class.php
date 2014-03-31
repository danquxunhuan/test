<?php
  class MemberAction  extends CommonAction{
  	/*
	* 会员管理列表
	*/
    public function index() {
        $this->assign("list", D("Member")->memberList());
        $this->display();
    }
    
	/*
	* 删除会员
	*/
    public function del(){
	   $this->checkToken();//检查是否登录
	   $m= D("Member");
	   $uid=trim($_GET['uid']);
	   if($m->where("uid=".$uid."")->delete()){
	   $this->success("删除成功");
	   }else{
	   $this->error("删除失败");
	   }
    }
    
    //public function add(){
	  //var_dump($_POST);
    	//$this->display();
    //}
	
    /*
	*修改会员信息
	*/
    public function editMember(){
	  if (IS_POST)  {
            $this->checkToken();
            header('Content-Type:application/json; charset=utf-8');
            echo json_encode(D("Member")->editMember());
        } else {
            $M = M("Member");
            $uid = (int)$_GET['uid'];
            $pre = C("DB_PREFIX");
            $info = $M->where("`uid`=" . $uid)->find(); //取会员信息
            
			if (empty($info['uid'])) {
                $this->error("不存在该会员ID", U('Member/index'));
            }
            if ($info['uname'] == C('ADMIN_AUTH_KEY')) {
                $this->error("超级管理员信息不允许操作", U("Access/index"));
                exit;
            }
			$this->assign("sbj", M('Subject')->select());
            $this->assign("info",$info);
            $this->display("add");
        }
    }
	
	  /**
      +----------------------------------------------------------
     * 添加管理员
      +----------------------------------------------------------
     */
    public function add() {
        if (IS_POST) {
            $this->checkToken();
			//var_dump($_POST);
            header('Content-Type:application/json; charset=utf-8');
            echo json_encode(D("Member")->addMember());
        } else {
            $this->assign("sbj", M('Subject')->select());
			//$this->assign("info", M('Subject')->select());
            $this->display();
        }
    }
	
	
	public function getUserInfo(){

	}
  
  
  }
  
  
  
  
 ?>