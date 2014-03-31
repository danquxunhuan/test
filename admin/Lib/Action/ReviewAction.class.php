<?php
  
  class ReviewAction extends CommonAction{
  
    public function index(){
	$this->assign("list",D('Review')->reviewList());
	$this->display();
	}
    
	
	public function add(){
	 if (IS_POST) {
            $this->checkToken();
            header('Content-Type:application/json; charset=utf-8');
            echo json_encode(D("Review")->addReview());
        } else {
            $this->display();
        }
	}
	
    public function del(){
	   $this->checkToken();//检查是否登录
	   $m= D("Review");
	   $id=trim($_GET['id']);
	   if($m->where("id=".$id."")->delete()){
	   $this->success("删除成功");
	   }else{
	   $this->error("删除失败");
	   }
	}
	
  
    public function edit(){
	if (IS_POST)  {
            $this->checkToken();
            header('Content-Type:application/json; charset=utf-8');
            echo json_encode(D("Review")->editReview());
        } else {
            $M = M("Review");
            $id = (int) $_GET['id'];
            $pre = C("DB_PREFIX");
            $info = $M->where("`id`=" . $uid)->find();
            $this->assign("info",$info);
            $this->display("add");
        }
	}
  
  }