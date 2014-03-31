<?php
class ReviewAction extends PublicAction{
     public function index(){
	
	  $this->checkULogin();
      $m= D("Article");
	  $aid=trim($_GET['aid']);
	  //文章详情
      $info=$m->where("aid=".$aid)->find();
	  $data['click'] = $info['click'] + 1;
	  $m->where("aid=".$aid)->save($data);
      $this->assign("info",$info);
	  //把字符串标签转换成数组
	  $tagInfo=array();
      $tagInfo=explode(',',$info['tag']);
	  //dump($tagInfo);
	  $tagCount=count($tagInfo);
	  //echo $tagCount;
	  $this->assign('tagCount',$tagCount);
	  $this->assign('tagInfo',$tagInfo);
	  //会员信息
	  $uid = $m->where('aid='.$aid)->getField('uid');
	  $tid = D('Member')->where('uid='.$uid)->getField('tid');
	  $uname = D('Member')->where('uid='.$uid)->getField('uname');
	  $this->assign('tid',$tid);
	  $this->assign('uname',$uname);
	  //判断家长类型
	  if($tid == 2){
	    $userInfo= D('Member')->join("ms_teacher_info ON ms_member.uid = ms_teacher_info.uid where ms_member.uid = ms_teacher_info.uid and ms_member.uid = ".$uid."")->field('ms_member.uname,ms_teacher_info.*')->find();
	    $this->assign("userInfo",$userInfo);
	  }
	  //可能喜欢的文章
	  $tagLike=D('Article')->where("tag like '%" .$info['tag']."%' and aid <> ".$aid)->limit(3)->select();
	  $this->assign('tagLike',$tagLike);
	    //热门文章
		$hot=$m->order("rNum desc")->limit(3)->select();
       //$hot=$m->where("FIND_IN_SET( 'h', flag ) and status =1")->order("rNum desc")->limit(3)->select();
	   $this->assign("hot",$hot);  
		        /***************评论分页******************/
			            $count = D('Review')->where("pid =0 and aid=".$aid)->count();
                        import("ORG.Util.Page");       //载入分页类
                        $Page = new Page($count,20);
                        $showPage = $Page->show();
                        $this->assign("page", $showPage);
				  
				  
	    // 按照id排序显示10-以后条记录
        $list = D("Review")->join('ms_member on ms_review.uid = ms_member.uid')->where("ms_review.pid = 0 and ms_review.aid=".$aid)->order('ms_review.id desc')->limit($Page->firstRow .','.$Page->listRows)->field('ms_review.*,ms_member.uname,ms_member.uid')->select();
		$pid = array();
		$result = array(); //这个数组转化$messages用的.因为我们要把$messages的key值变成msgid
		foreach($list as $k=>$v){
		  $pid[] = $v['id'];
		  $result[$v['id']] = $v;
		 // $result[$v['msg']] = $v['msg'];
		}
		unset($list);
		
		//分页显示从第十条显示
	    $listR = D("Review")->join('ms_member on ms_review.uid = ms_member.uid')->where("ms_review.pid in (".implode(',',$pid).") and ms_review.aid=".$aid)->order('ms_review.id desc')->field('ms_review.*,ms_member.uname,ms_member.uid')->select();
		foreach( $listR as $key => $value){
        $result[$value['pid']]['listR'][] = $value;
		$result[$value['pid']]['countPid'] = count($result[$value['pid']]['listR']);
        }
		//dump($result);
		$this->assign("listR",$result);
        //热门评论
        $hotR=D('Index')->hotR();
	    $this->assign("hotR",$hotR);		
        //标签查询
		$tags=D("Tags")->where("FIND_IN_SET( 'h', flag )")->select();
		$this->assign('tags',$tags);		
	    $this->display();
       }
	   
}	   
?>