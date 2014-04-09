<?php
 

    class TagsAction extends CommonAction{
	
	    public function  index(){
        //$this->checkUser();//检查用户名	  
        $this->assign("list",D('Tags')->tagList());  		
		$this->display();			
		}
	
/*
*添加标签（wyj）
*/
public function add() {
	if (IS_POST) {
		$this->checkToken();
		if (!isset($_POST['tag'])) {
			$this->error('用户名不能为空');
		}
		$datas = array();
		$M = M("Tags");
		$datas['tag'] = trim($_POST['tag']);
		$datas['first_char'] = D('Tags')->getfirstchar($datas['tag']);
		if ($M->where("tag='" . $datas['tag'] . "'")->count() > 0) {
			$this->error('已经存在该标签');
		}
		$datas['time'] = time();
		if ($M->add($datas)) {
			$this->success("添加新标签成功",U("Tags/index"));
		} else {
			$this->error('添加新标签失败，请重试');
		}
	} else {
		$this->display();
	}
}
	   
/*
*编辑标签（wyj）
*/
public function edit(){
	if (IS_POST)  {
		$this->checkToken();
		if (!isset($_POST['tag'])) {
			$this->error('标签不能为空');
		}
		$M = M("Tags");
		$datas = array();
		$datas['id'] = trim($_POST['id']);
		$datas['tag'] = trim($_POST['tag']);
		$datas['first_char'] = D('Tags')->getfirstchar($datas['tag']);
		$datas['time'] = time();
		if ($M->where("id='".$datas['id']."'")->save($datas)) {
			$this->success("成功更新", U("Tags/index"));
		} else {
			$this->error('更新失败，请重试');
		}
	} else {
		$M = M("Tags");
		$id = (int) $_GET['id'];
		$pre = C("DB_PREFIX");
		$info = $M->where("`id`=" . $id)->find();
		$this->assign("info",$info);
		$this->display("add");
	}
}
		
		public function del(){
	      $this->checkToken();//检查是否登录
	      $m= D("Tags");
	      $id=trim($_GET['id']);
	      if($m->where("id=".$id."")->delete()){
	        $msg='删除成功';
	      //$this->success("删除成功");
	      }else{
	        $msg='删除失败';
	       //$this->error("删除失败");
	      }
	      echo json_encode($msg);
		}



		
	}



?>