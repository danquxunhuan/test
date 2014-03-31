<?php

    class IndexModel extends Model{
	
	   public function info(){
	   $info_array=array();//用于存放info和page的大数组
	   //联合查询文章  和发表人名称   
		if(isset($_SESSION['ms_user_id'])){
		  $classId = M()->table("ms_member")->where("uid = ".$_SESSION['ms_user_id']."")->getField('classid');
		
		//最新文章分页  		
		if(isset($_GET['type'])){
		if( $classId < 6){
				//分页
			  $count1  = M("Article")->where("status=1 and FIND_IN_SET( 'h', flag) and  cid = ".$_GET['type'])->count();
		      import('@.ORG.Page');   
              $params = array('total_rows'=>$count1,'method'=>'html','parameter' =>'__URL__/index/p/?','now_page'  =>$_GET['p'],'list_rows' =>9);		
			  $page = new Page($params);
              $show = $page->show_2(1);
		      $info=M('Article')->join("ms_member ON ms_article.uid=ms_member.uid where  ms_article.uid=ms_member.uid and FIND_IN_SET( 'h', ms_article.flag) and ms_article.status=1 and ms_article.cid =".$_GET['type'])->order('ms_article.create_time desc')->limit($page->first_row .','.$page->list_rows)->field('ms_member.uname,ms_member.tid,ms_member.uid,ms_article.*')->select();
		      }elseif( $classId >6 and $classId < 10){
			  //分页
			  $count2  = M("Article")->where("status=1 and cid =".$_GET['type'])->count();
			  import('@.ORG.Page');   
		      $params = array('total_rows'=>$count2,'method'=>'html','parameter' =>'__URL__/index/p/?','now_page'  =>$_GET['p'],'list_rows' =>9);		
			  $page = new Page($params);
              $show = $page->show_2(1);
	          $info=M('Article')->join("ms_member ON ms_article.uid=ms_member.uid where  ms_article.uid=ms_member.uid and ms_article.status=1 and ms_article.cid =".$_GET['type'])->order('ms_article.create_time desc')->limit($page->first_row.','.$page->list_rows)->field('ms_member.uname,ms_member.tid,ms_member.uid,ms_article.*')->select();
              }else{
			  //分页
			  $count3  = M("Article")->where("status=1 and cid =".$_GET['type'])->count();
			  import('@.ORG.Page');   
		      $params = array('total_rows'=>$count3,'method'=>'html','parameter' =>'__URL__/index/p/?','now_page'  =>$_GET['p'],'list_rows' =>9);		
			  $page = new Page($params);
              $show = $page->show_2(1);
	          $info=M('Article')->join("ms_member ON ms_article.uid=ms_member.uid where  ms_article.uid=ms_member.uid and ms_article.status=1 and ms_article.cid =".$_GET['type'])->order('ms_article.create_time desc')->limit($page->first_row.','.$page->list_rows)->field('ms_member.uname,ms_member.tid,ms_member.uid,ms_article.*')->select();
	        }
		}else{
		     if( $classId < 6){
				//分页
			  $count1  = M("Article")->where("status=1 and FIND_IN_SET( 'h', flag) and  cid = 1")->count();
		      import('@.ORG.Page');   
              $params = array('total_rows'=>$count1,'method'=>'html','parameter' =>'__URL__/index/p/?','now_page'  =>$_GET['p'],'list_rows' =>9);		
			  $page = new Page($params);
              $show = $page->show_2(1);
		      $info=M('Article')->join("ms_member ON ms_article.uid=ms_member.uid where  ms_article.uid=ms_member.uid and FIND_IN_SET( 'h', ms_article.flag) and ms_article.status=1 and ms_article.cid = 1")->order('ms_article.create_time desc')->limit($page->first_row .','.$page->list_rows)->field('ms_member.uname,ms_member.tid,ms_member.uid,ms_article.*')->select();
		      }elseif( $classId >6 and $classId < 10){
			  //分页
			  $count2  = M("Article")->where("status=1 and cid = 2")->count();
			  import('@.ORG.Page');   
		      $params = array('total_rows'=>$count2,'method'=>'html','parameter' =>'__URL__/index/p/?','now_page'  =>$_GET['p'],'list_rows' =>9);		
			  $page = new Page($params);
              $show = $page->show_2(1);
	          $info=M('Article')->join("ms_member ON ms_article.uid=ms_member.uid where  ms_article.uid=ms_member.uid and ms_article.status=1 and ms_article.cid = 2")->order('ms_article.create_time desc')->limit($page->first_row.','.$page->list_rows)->field('ms_member.uname,ms_member.tid,ms_member.uid,ms_article.*')->select();
              }else{
			  //分页
			  $count3  = M("Article")->where("status=1 and cid = 3")->count();
			  import('@.ORG.Page');   
		      $params = array('total_rows'=>$count3,'method'=>'html','parameter' =>'__URL__/index/p/?','now_page'  =>$_GET['p'],'list_rows' =>9);		
			  $page = new Page($params);
              $show = $page->show_2(1);
	          $info=M('Article')->join("ms_member ON ms_article.uid=ms_member.uid where  ms_article.uid=ms_member.uid and ms_article.status=1 and ms_article.cid = 3")->order('ms_article.create_time desc')->limit($page->first_row.','.$page->list_rows)->field('ms_member.uname,ms_member.tid,ms_member.uid,ms_article.*')->select();
	        }
		}
        }else{
		      //判断选择  小学 初中 高中
			  if(isset($_GET['type'])){
		 	  //分页
			  $count1  = M("Article")->where("status=1 and FIND_IN_SET( 'h', flag) and cid= ".$_GET['type'])->count();
		      import('@.ORG.Page');   
              $params = array('total_rows'=>$count1,'method'=>'html','parameter' =>'__URL__/index/p/?','now_page'  =>$_GET['p'],'list_rows' =>9);		
			  $page = new Page($params);
              $show = $page->show_2(1);
		      $info=M('Article')->join("ms_member ON ms_article.uid=ms_member.uid where  ms_article.uid=ms_member.uid and FIND_IN_SET( 'h', ms_article.flag) and ms_article.cid= ".$_GET['type']."")->order('ms_article.create_time desc')->limit($page->first_row .','.$page->list_rows)->field('ms_member.uname,ms_member.tid,ms_member.uid,ms_article.*')->select();
		      }else{
			    //分页
			  $count1  = M("Article")->where("status=1 and FIND_IN_SET( 'h', flag)")->count();
		      import('@.ORG.Page');   
              $params = array('total_rows'=>$count1,'method'=>'html','parameter' =>'__URL__/index/p/?','now_page'  =>$_GET['p'],'list_rows' =>9);		
			  $page = new Page($params);
              $show = $page->show_2(1);
		      $info=M('Article')->join("ms_member ON ms_article.uid=ms_member.uid where  ms_article.uid=ms_member.uid and FIND_IN_SET( 'h', ms_article.flag)")->order('ms_article.create_time desc')->limit($page->first_row .','.$page->list_rows)->field('ms_member.uname,ms_member.tid,ms_member.uid,ms_article.*')->select();
		    
			  }
		
		}
		 
		 $allaid = M('Article')->join('ms_review On ms_article.aid = ms_review.aid')->field('ms_article.aid,count(ms_review.id) as allaid')->select();
		 foreach ($allid as $k => $v) {
            $aids[$v['allaid']] = $v;
         }
         unset($allaid);
		 foreach ($info as $k => $v) {
            $info[$k]['allaid'] =$aids[$v['allaid']]['allaid'];
           // $list[$k]['cidName'] = $cids[$v['cid']]['name'];
        }
		$info_array['info']=$info;
		$info_array['show']=$show;
	     return $info_array;
	   }
	   
/*
* 精读，头条（wyj），游客与匿名投稿文章不可成为头条显示
*/
public function top(){
	$top=D('Article')->join("ms_member ON ms_article.uid=ms_member.uid")->where("FIND_IN_SET( 't', flag ) and ms_article.status=1 and ms_article.ishid=0 and ms_article.uid !=0 and ms_article.cid<3")->order('ms_article.up_time desc')->field('ms_member.uname,ms_member.tid,ms_member.uid,ms_article.*')->find();
	$rnum = D('Review')->where('pid = 0 and aid = '.$top['aid'])->count();
	$top['rnum'] = $rnum;
	return $top;
}
	   
	   /*
	   * 热门文章（wyj）
	   */
	   public function hot(){
	    $hot =M('Article')->join("ms_member ON ms_article.uid=ms_member.uid")->where("ms_article.status=1 and FIND_IN_SET('h', flag)")->order('ms_article.up_time desc')->limit(6)->field('ms_member.uname,ms_member.tid,ms_member.uid,ms_article.*')->select();
		//tag要处理一下
		$len = count($hot);
		for($i=0;$i<$len;$i++){
			$tag = explode(',', $hot[$i]["tag"]);
			$hot[$i]["tag"] = $tag;
		}
		return $hot;
	   }
	   
	   /*
	   * 精彩评论(wyj)
	   */
	   public function hotR(){	 
	   	//取被评论文章信息，评论人信息，评论信息
	    $hotR=D('Review')->join("ms_article ON ms_article.aid = ms_review.aid")->join("ms_member ON ms_review.uid = ms_member.uid")->where("ms_review.status =1 and FIND_IN_SET( 'h',ms_review.flag)")->order("pl_time desc")->field('ms_article.title,ms_member.image,ms_review.*')->limit(2)->select();
	    return $hotR;
	   }
	   
	    /*
		* 最新评论(wyj)
		*/
	   public function newR(){
	    $newR=D('Review')->join("ms_article ON ms_article.aid = ms_review.aid")->join("ms_member ON ms_review.uid = ms_member.uid")->where("ms_review.status =1")->order("pl_time desc")->field('ms_article.title,ms_member.image,ms_member.uname,ms_review.*')->limit(5)->select();
	    return $newR;
	   }
	   
	 
	 
	 //精彩评论 单片文章
	   public function niceReview(){
	    $aid = $_GET['aid'];
	    $niceReview=D('Review')->join("ms_member ON ms_member.uid = ms_review.uid where ms_review.aid = ".$aid." and ms_review.pid = 0 and ms_review.status =1 and FIND_IN_SET( 'h',ms_review.flag)")->order("pl_time desc")->field('ms_member.uname,ms_review.*')->select();
	    return $niceReview;
	   }
	   
	   //已登录用户已发表评论 status(0 and 1) 
	   public function userReview(){
	    $aid = $_GET['aid'];
		  if(isset($_SESSION['ms_user_id'])){
	        $userReview=D('Review')->join("ms_member ON ms_member.uid = ms_review.uid where ms_review.aid = ".$aid." and ms_review.pid = 0 and ms_review.uid = ".$_SESSION['ms_user_id']." and ms_review.flag not in('h')")->order("pl_time desc")->field('ms_member.uname,ms_review.*')->select();
	        return $userReview;
	     }else{
		   return false;
		 }
	   }
	 
	 
	}
	 
	 




?>