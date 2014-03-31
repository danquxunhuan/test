<?php 

    class ReviewModel extends Model{
       
	   
	   //评论列表页
    public function reviewList(){	  
	    $m=M("Review");
	    $list=$m->select();
		return $list;	    
		}
		
		
		
		
	/**
      +----------------------------------------------------------
     * 编辑评论
      +----------------------------------------------------------
     */
    public function addReview(){	  
	    $datas = array();
	    $m=M("Review");
		$datas['msg']=$_POST['msg'];
		$datas['status']=$_POST['status'];
		$datas['username']=trim($_POST['username']);
		$datas['ip']=get_client_ip();
		var_dump($datas);
	    if($m->add($datas)){
		   return   array('status'=>1,'info'=>"成功发布",'url' => U("Review/index"));
		}else {
            return  array('status' => 0,'info' => "发布失败，请重试");
        }
		    
		}
		
		
	/**
      +----------------------------------------------------------
     * 编辑评论
      +----------------------------------------------------------
     */
    public function editReview() {
        $M = M("Review");
        $id = trim($_POST['id']);
        if ($M->save($_POST)) {
//      , 'url' => U("Access/index")
            return  array('status' => 1, 'info' => "成功更新", 'url' => U("Review/index"));
        } else {
            return  array('status' => 0, 'info' => "更新失败，请重试");
        }
    }
  
  
  
  
  
  
  










    }





?>