<?php
/*
* 后台—活动日历
*/
class ActiveAction extends CommonAction{
  	/*
	* 活动列表
	*/
    public function index(){
	    $this->assign("list", D("Active")->activeList());
        $this->display();
	}
 	
	/*
	* 添加活动
	*/
    public function add(){
	   if (IS_POST) {
            $this->checkToken();
			//var_dump($_POST);
            header('Content-Type:application/json; charset=utf-8');
            echo json_encode(D("Active")->addActive());
        } else {
            $this->display();
        }

	}
	
	/*
	* 编辑活动
	*/
	public function edit(){
	  if (IS_POST)  {
            $this->checkToken();
            header('Content-Type:application/json; charset=utf-8');
            echo json_encode(D("Active")->editActive());
        } else {
            $M = M("Active");
            $id = (int) $_GET['id'];
            $pre = C("DB_PREFIX");
            $info = $M->where("`id`=" . $id)->find();
            $this->assign("info",$info);
            $this->display("add");
        }
	}
    
	
	public function del(){
	
	   $this->checkToken();//检查是否登录
	   $m= D("Active");
	   $id=trim($_GET['id']);
	   if($m->where("id=".$id."")->delete()){
		   $this->success("删除成功");
	   }else{
		   $this->error("删除失败");
	   }
	
	
	}
  
  
  
  
  }