<?php
/*
* 课程
*/
class LessonAction extends CommonAction{
  
    public function index(){
	    $this->assign("list", D("Lesson")->lessonList());
        $this->display();
	}
  
    public function add(){
	   if (IS_POST) {
            $this->checkToken();
			//var_dump($_POST);
            header('Content-Type:application/json; charset=utf-8');
            echo json_encode(D("Lesson")->addLesson());
        } else {
		    
            $this->display();
        }
	
	
	
	}
	
	public function edit(){
	  if (IS_POST)  {
            $this->checkToken();
            header('Content-Type:application/json; charset=utf-8');
            echo json_encode(D("Lesson")->editLesson());
        } else {
            $M = M("Lesson");
            $id = (int) $_GET['id'];
            $pre = C("DB_PREFIX");
            $info = $M->where("`id`=" . $id)->find();
            $this->assign("info",$info);
            $this->display("add");
        }
	}
    
	
	public function del(){
	
	   $this->checkToken();//检查是否登录
	   $m= D("Lesson");
	   $id=trim($_GET['id']);
	   if($m->where("id=".$id."")->delete()){
	   $this->success("删除成功");
	   }else{
	   $this->error("删除失败");
	   }
	
	
	}
  
  
  
  
  }