<?php
  class MemberAction  extends CommonAction{
  	/*
	* 会员管理列表
	*/
    public function index() {
        $User = M('Member'); // 实例化User对象
        import('ORG.Util.Page');// 导入分页类
        $count      = $User->count();// 查询满足要求的总记录数
        $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
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
     *+----------------------------------------------------------
     * 添加管理员
     *+----------------------------------------------------------
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