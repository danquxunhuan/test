<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends PublicAction {
    /******
	文章列表页——精读
	*******/
    public function  index(){  
	   $m= D("Article");
       //$info=$m->where("status =1")->limit(5)->select();
	   //联合查询文章和发表人名称
	   $info_array=D('Index')->info();
	   $info=$info_array["info"];
	   $pageinfo = $info_array["show"];
	   //处理标签
	   $len = count($info);
	   $info_tags = array();
	   for($i=0;$i<$len;$i++){
		   	$info_tags[$i] = explode(",",$info[$i]['tag']);
		   	//覆盖原有数据
		   	$info[$i]['tag']=$info_tags[$i];
	   }
	   $this->assign("info",$info);
	   $this->assign("page",$pageinfo);
	   
	   //把字符串标签转换成数组
	   $tagInfo1=array();
	   foreach($info  as $k=>$v){
	   $tagInfo1[]=explode(',',trim($v['tag']));
	   }
	   $this->assign('tagInfo1',$tagInfo1);
	   //文章头条
	   $top=D('Index')->top();
	   $this->assign("top",$top);
	   //把字符串标签转换成数组
	   $tagInfo=array();
       $tagInfo=explode(',',$top['tag']);
	   //dump($tagInfo);
	   $tagCount=count($tagInfo);
	   //echo $tagCount;
	   $this->assign('tagCount',$tagCount);
	   $this->assign('tagInfo',$tagInfo);
	   
	    //热门文章
	   $hot=D('Index')->hot();
	   $this->assign("hot",$hot);
	    //热门评论
       $hotR=D('Index')->hotR();
	   $this->assign("hotR",$hotR);
	   //最新评论
       $newR=D('Index')->newR();
	   $this->assign("newR",$newR);
	   //标签查询
	   //$tags=D("Tags")->where("FIND_IN_SET( 'h', flag )")->select();
	   $tags=D("Tags")->order("time desc")->select();
	   $this->assign('tags',$tags);
       $this->display();
    }
	
	
   /******
	 文章详情页
   *******/
     public  function content(){
      //$this->checkULogin();	 
      $m= D("Article");
	  $aid=trim($_GET['aid']);
	  //文章详情
      $info=$m->where("aid=".$aid)->find();
	  $data['click'] = $info['click'] + 1;  //增加文章点击数
	  $m->where("aid=".$aid)->save($data);
	  
      $this->assign("info",$info);
	  //把字符串标签转换成数组
	  $tagInfo=array();
      $tagInfo=explode(',',$info['tag']);
	  $tagCount=count($tagInfo);
	  $this->assign('tagCount',$tagCount);
	  $this->assign('tagInfo',$tagInfo);
	  //向页面发送收藏数
      $fNum=M('Favorite')->where('aid ='.$info['aid'])->count();
      $this->assign("fNum",$fNum);
	  //是否赞过踩过收藏过 	1赞过 0踩过 -1没赞没踩
	  $user_id = session('ms_user_id');
	  $zanrs = M('Zan')->where("aid=".$aid." and uid =".$user_id)->find();
	  if(!empty($zanrs)){
	  	$zanOrcai = $zanrs['updown'];
	  }else{
	  	$zanOrcai = -1;//为空就是没有 值赋为-1 前台页面判断.
	  }
	  $zanOrcai = intval($zanOrcai);//获取到的数字是字符串,万一前台用来比大小可能会出错.
	  $this->assign('zanOrcai',$zanOrcai);//前台判断其数值 -1就是没赞也没踩 1赞 0踩
	  
	  //是否收藏过
	  $favorite = M('Favorite')->where('uid = '.$user_id.' and aid ='.$aid)->find();
	  if(!empty($favorite)){
	  	$favoriteOrNot = 1;//收藏过
	  }else{
	  	$favoriteOrNot = 0;//没收藏过
	  }
		$this->assign('favoriteOrNot',$favoriteOrNot);
	  
	  
	  //会员信息
	  $uid = $m->where('aid='.$aid)->getField('uid');
	  $tid = D('Member')->where('uid='.$uid)->getField('tid');
	  $uname = D('Member')->where('uid='.$uid)->getField('uname');
	  $this->assign('uid',$uid);
	  $this->assign('tid',$tid);
	  $this->assign('uname',$uname);
	  //判断会员身份，1家长，2老师
	  if($tid == 2){
	    //取老师信息(wyj)
		$teacherInfo = D('Teacher_info')->where('uid='.$uid)->find(); 
		$this->assign('teacherInfo',$teacherInfo);
		
		//所授科目信息(wyj)
		$objName = D('Subject')->join('ms_member ON ms_member.obj_id = ms_subject.id')->where('ms_member.uid='.$uid)->getField('ms_subject.subject');
		$this->assign('objName',$objName);
		
		//平均分，取小数点后一位（wyj）
		$pingfen = D('Member')->review($uid);
		$this->assign('pingfen',$pingfen['pscores']);
		
		//所有的评论
		$all= D('Member')->allReview($uid);
		$this->assign('all',$all);
		//好评
		$good = D('Member')->goodReview($uid);
		$this->assign('good',$good);
		//中评
		$better= D('Member')->betterReview($uid);
		$this->assign('better',$better);
		//差评
		$bad = D('Member')->badReview($uid);
		$this->assign('bad',$bad);
		
		//$userInfo= D('Member')->join("ms_teacher_info ON ms_member.uid = ms_teacher_info.uid where ms_member.uid = ms_teacher_info.uid and ms_member.uid = ".$uid."")->field('ms_teacher_info.*')->find();
	    //$this->assign("userInfo",$userInfo);
	  }
	  //可能喜欢的文章
	  $tagLike=D('Article')->where("tag like '%" .$info['tag']."%' and aid <> ".$aid)->limit(3)->select();
	  $this->assign('tagLike',$tagLike);
	    //热门文章
       $hot=D('Index')->hot();
	   $this->assign("hot",$hot);  
	   
		/***************评论分页******************/
		$count = D('Review')->where("pid =0 and aid=".$aid)->count();
		import("ORG.Util.Page");       //载入分页类
		$Page = new Page($count,10);
		$showPage = $Page->show();
		$this->assign("page", $showPage);
		$this->assign("count", $count);
			  
	    // 按照id排序显示前10条评论的记录
		if($_SESSION['ms_user_id']){
        $list = D("Review")->join('ms_member on ms_review.uid = ms_member.uid')->where("ms_review.pid = 0  and ms_review.status = 1 and  ms_review.flag not in('h') and ms_review.aid=".$aid)->order('ms_review.id desc')->limit($Page->firstRow.','.$Page->listRows)->field('ms_review.*,ms_member.uname,ms_member.uid')->select();
		}else{
		$list = D("Review")->join('ms_member on ms_review.uid = ms_member.uid')->where("ms_review.pid = 0  and ms_review.status = 1 and  ms_review.flag not in('h') and ms_review.aid=".$aid)->order('ms_review.id desc')->limit($Page->firstRow.','.$Page->listRows)->field('ms_review.*,ms_member.uname,ms_member.uid')->select();
		}
		$pid = array();
		$result = array(); //这个数组转化$messages用的.因为我们要把$messages的key值变成msgid
		foreach($list as $k=>$v){
		  $pid[] = $v['id'];
		  $result[$v['id']] = $v;
		 //$result[$v['msg']] = $v['msg'];
		}                                                                                         
		unset($list);
		$listR = D("Review")->join('ms_member on ms_review.uid = ms_member.uid')->where("ms_review.pid in (".implode(',',$pid).")  and ms_review.aid=".$aid)->order('ms_review.id desc')->field('ms_review.*,ms_member.uname,ms_member.uid')->select();
		foreach($listR as $key => $value){
			$result[$value['pid']]['listR'][] = $value;
			$result[$value['pid']]['countPid'] = count($result[$value['pid']]['listR']);
        }
		//这里需要再结果处，增加上踩的次数，表ms_zan
		foreach($result as $key=>$row){
			$downNum = M('Zan')->where('updown = 0 and rid = '.$row['id'])->field('count(zid) as downNum')->select();
			$result[$key]['down'] = $downNum[0]['downNum'];
		}
		$this->assign("listR",$result);
        
        //精彩评论
        $hotR=D('Index')->hotR();
	    $this->assign("hotR",$hotR);
		//最新评论
        $newR=D('Index')->newR();
	    $this->assign("newR",$newR);
				
        //标签查询
		$tags=D("Tags")->where("FIND_IN_SET( 'h', flag )")->select();
		$this->assign('tags',$tags);	
        //精彩评论
        $niceReview=D("Index")->niceReview();		
	    $this->assign('niceReview',$niceReview);
		//本文作者评论
        $userReview=D("Index")->userReview();		
	    $this->assign('userReview',$userReview);
		//共评论条数
		$countReview= D('Review')->where("aid=".$aid." and pid=0")->count();
		$this->assign('countReview',$countReview);
		$this->display();
       }
	
	
	     // 搜索页面
        public function search(){
			$this->checkULogin();
		    $tag=$_GET['tag'];
			$this->assign('tag',$tag);
			
		if(empty($tag)){
			$count = D('Article')->count();
			import("ORG.Util.Page");       //载入分页类
			$Page = new Page($count,15);
			$showPage = $Page->show();
			$this->assign("page", $showPage);
			$list=D("Article")->join("ms_member ON ms_article.uid=ms_member.uid")->where("ms_article.status=1")->field('ms_member.uname,ms_member.tid,ms_member.uid,ms_article.*')->order('create_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			//取文章内容及作者信息
		}else{
			$count = D('Article')->where("tag like '%".$tag."%'")->count();
			import("ORG.Util.Page");       //载入分页类
			$Page = new Page($count,15);
			$showPage = $Page->show();
			$this->assign("page", $showPage);
			$list=D("Article")->join("ms_member ON ms_article.uid=ms_member.uid")->field('ms_member.uname,ms_member.tid,ms_member.uid,ms_article.*')->where("ms_article.status=1 and tag like '%".$tag."%'")->order('create_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		}
			//dump($list);
			//处理标签
			$len = count($list);
			$search_tags = array();
			for($i=0;$i<$len;$i++){
				$search_tags[$i] = explode(",",$list[$i]['tag']);
				//覆盖原有数据
				$list[$i]['tag']=$search_tags[$i];
			}
			//dump($list);
			$this->assign('list',$list);
			//标签查询
			$tags=D("Tags")->where("FIND_IN_SET( 'h', flag )")->select();
			$this->assign('tags',$tags);									
			$this->display();
			
    }
   
     // 添加评论
    public function insertReview(){
	    //$this->checkULogin();
		//$this->checkToken();//表单验证
        $Form = D("Review");
		//$data['msg']= str_replace("/(^\s+)|(\s+$)/g","",trim($_POST["msg"]));
		$data['msg']= $_POST["msg"];
		$data['uid']=$_SESSION['ms_user_id'];
		$data['pl_time']=time();
		$data['aid']=trim($_POST['aid']);
        $checkMsg=D('Review')->where("msg like '%".$data['msg']."%' and uid = ".$_SESSION['ms_user_id'])->select();
		if($checkMsg){$this->error("请不要发表重复内容");}
		if($_SESSION['ms_user_id']){//判断用户是否登录
          if ($data) {
               if (false !== $Form->add($data)) {
				$rNum = $Form->where("aid=".$data['aid']." and pid=0")->count();
				$rNum = intval($rNum);
				M("Article")->where("aid=".$data['aid'])->setField("rNum",$rNum);
				
				$vo['rNum'] = M("Article")->where("aid=".$data['aid'])->getField("rNum");
				$vo['id']= M('Review')->order('pl_time desc')->limit(1)->getField('id');
				//print_r($vo_id['id']);
                $vo['pl_time'] = date('Y-m-d H:i:s', $data['pl_time']);
				//nl2p p转换
                $vo['msg'] = nl2p($data['msg']);
				$vo['uname']=D('Member')->where("uid=" .$data['uid'])->getField('uname');
				//dump($vo);
                $this->ajaxReturn($vo, '评论成功！', 1);
             } else {
                $this->error('数据写入错误！');}
           } else {
            $this->error($Form->getError());}
		}else{
		 $this->error('请先登陆');
		}
    }
	
	//点击评论按钮显示该条评论下的所有回复内容
	public function showReviewComment(){
		$id=intval($_GET['id']);
		$data= M("Review")->field('msg,username,pl_time')->where('pid = ' .$id)->order("id desc")->select();
		if($data){
		$str = json_encode($data);
               exit("$str");
	    }else{
               exit("0");
        }
		
	}
	
	//添加对评论的回复
    public function addReviewComment(){
	 //$this->checkULogin();
			$r=D('Review');
			$data['pid']=intval($_POST["id"]);
			$data['aid']=intval($_POST["aid"]);
			$data["msg"]=trim($_POST["msg1"]);
			$data['uid']=$_SESSION['ms_user_id'];
			$data['pl_time']=time();
			//print_r($data);
			if($_SESSION['ms_user_id']){
				if (false !== $r->add($data)) {
					$vo['pl_time'] = date('Y-m-d H:i:s', $data['pl_time']);
					$vo['msg'] = nl2p($data['msg']);
					$vo['uname']=D('Member')->where("uid=" .$data['uid'])->getField('uname');
					$vo['id'] = D('Review')->order('pl_time desc')->getField('id');//需要再思考 大数据量访问的时候
					$this->ajaxReturn($vo, '点评成功！', 1);
					} else {
						$this->error('数据写入错误444！');
					}
		}else{
		 $this->error('请先登陆');
		}
	}	
   
   	  
/*
*登陆
*/
public function login(){
//$this->getUloginID();

   if(!isset($_POST['uname']) & !isset($_POST['password'])){
	//统计老师总数
	$teasql="SELECT count(uid) as num FROM ms_member WHERE tid=2 and status=1";
	$teaNum = M()->query($teasql);
	$this->assign('teaNum',$teaNum[0]['num']);
	//统计家长总数
	$jzsql="SELECT count(uid) as num FROM ms_member WHERE tid=1";
	$jzNum = M()->query($jzsql);
	$this->assign('jzNum',$jzNum[0]['num']);
	
	//顶级名师,8名
	$sqltop = "SELECT a.uname,a.uid,a.image,b.teach_age,b.identity,c.subject FROM ms_member as a LEFT JOIN ms_teacher_info as b ON a.uid=b.uid LEFT JOIN ms_subject as c ON a.obj_id=c.id WHERE b.identity='顶级名师' and b.ishide=0 and a.status=1 ORDER BY a.uid DESC LIMIT 8";
	$topMem = M()->query($sqltop);
	//加上老师的平均分
	foreach($topMem as $key=>$row){
		//平均分，取小数点后一位（wyj）
		$pingfen = D('Member')->review($row['uid']);
		$topMem[$key]['pingfen'] = $pingfen['pscores'];
	}
	$this->assign('topMem',$topMem);
	
	//名师推荐,8名
	$sqltj = "SELECT a.uname,a.uid,a.image,b.teach_age,b.identity,c.subject FROM ms_member as a LEFT JOIN ms_teacher_info as b ON a.uid=b.uid LEFT JOIN ms_subject as c ON a.obj_id=c.id WHERE b.recommend=1 and b.ishide=0 and a.status=1 ORDER BY a.uid DESC LIMIT 8";
	$tjMem = M()->query($sqltj);
	//加上老师的平均分
	foreach($tjMem as $key=>$row){
		//平均分，取小数点后一位（wyj）
		$pingfen = D('Member')->review($row['uid']);
		$tjMem[$key]['pingfen'] = $pingfen['pscores'];
	}
	$this->assign('tjMem',$tjMem);
	
	//热门文章
	$hot = D('Index')->hot();
	
	$hotArtical = M('Article')->where()->select();
	$this->assign('hotArtical',$hotArtical);
	
	
	
	$this->assign('hot',$hot);
	$this->display();
   }else{
   //获取参数
	$uname=trim($_POST['uname']);
	$password=trim(md5($_POST['password']));
	$remember=trim($_POST['remember']);
	//echo $remember;
   //执行登录
	  
	  $m=D("Member");
	  $res=$m->field("uid,uname,password")->where("uname='".$uname."'and password='".$password."'")->find();
	  if($res){
			$_SESSION['user_info'] = $res; 
			$_SESSION['ms_user_name']=$uname;
			$_SESSION['ms_user_id']=$res['uid'];
			if(!empty($remember))	{
			  setcookie("uname", $uname, time()+3600*24*365);  
			  setcookie("password", $password, time()+3600*24*365); 
			}
			  
			
			$this->success('登陆成功',U('index/index'));
			
			// header('Content-Type:application/json; charset=utf-8');
			// echo "<script>window.location.href='/test';</script>";
			
			
	  }else{
		  // 如果创建失败 表示验证没有通过 输出错误提示信息
		  /*
		  *echo "<script>alert('用户名或密码错误');window.location.href='/test/index/login';</script>";
		  */
		  //$this->redirect();
		  $this->error('用户名或密码错误');
	  }
   }
   
}
	
/*
*投稿(wyj)
*/
public function tougao(){
  //$this->checkULogin();
	if (IS_POST) {
		if($_SESSION['ms_user_id'] =='' && $_SESSION['verify']!= md5($_POST['verify'])) {
        	$this->error('验证码错误！');
        }
	    //$this->checkULogin();
		header('Content-Type:application/json; charset=utf-8');
		echo json_encode(D("Article")->addArticle());
	} else {
		//$this->assign("list", D("Article")->category());
		$this->display();
	}

}
<<<<<<< HEAD
=======
/*
*投稿——验证码（wyj）
*/
Public function verify(){
	 import('ORG.Util.Image');
	 //Image::buildImageVerify(4,5,'png',60,26);
	 Image::buildImageVerify();
	 //Image::GBVerify();
}
>>>>>>> 85910056687905679e4972bd8d68c2a91acb5462

	
/*
*找名师(wyj)
*/
public function find(){
   //$this->checkULogin();这里找名师，无需登录
   if (IS_POST) {
		//var_dump($_POST);
		header('Content-Type:application/json; charset=utf-8');
		echo json_encode(D("Member")->addYueke());
	}else{
	   $area= D('Area');
	   $areaData =$area->field('id,name')->where('pid=0')->select();
	   $this->assign('areaData',$areaData);		
	   //查询年级
	   $class=$area->query("select * from ms_child_class");  
	   $this->assign('class',$class);  
	   //科目查询
	   $obj=M('Subject')->select();
	   $this->assign('obj',$obj);
	   $this->display();
	}
}
    
	//分享 by qita
	public function add_share(){
		$aid = $_GET['aid'];
		M("Article")->where("aid =".$aid)->setInc('shareNum');
		$shareNum = M('Article')->where('aid ='.$aid)->getField('shareNum');
		echo $shareNum;
	}
		
	
	//收藏
	public function addFavorite(){
	   $this->checkULogin();
	   if(empty($_GET['title']) || empty($_GET['url']) || empty($_GET['aid'])) {
	     exit('-2');	
       }else {
	    $title = $_GET['title'];
	    $title = addslashes(urldecode($title));
	    //echo $title;
	    $title = htmlspecialchars($_GET['title']);
		$aid = htmlspecialchars($_GET['aid']);
	    $url = addslashes(urldecode($_GET['url']));
      }
	 // $_GET['callback'] = safe_replace($_GET['callback']);
	  $uid= $_SESSION['ms_user_id'];
	  //$data['uid'] = $uid;
	  $data = array('title'=>$title, 'url'=>$url, 'aid'=>$aid, 'adddate'=>time(), 'uid'=>$uid);
     //根据aid判断是否已经收藏过。
      $is_exists = D('Favorite')->where("aid='".$aid. "' and uid=" .$uid)->find();   
      if(!$is_exists) {
	     D('Favorite')->add($data);
		 $fNum=M('Favorite')->where('aid ='.$aid)->count();
		 exit($fNum);
      }else{
	     exit('0');
	  }
	}
	
	//ajax return 活动 
	public function checkActive(){	
	    $start_time = $_POST['time'];
		if(empty($atart_time)){
		    $data= D('Active')->where("start_time = " .$atart_time)->select();
	        $this->ajaxReturn($data, '点评成功！', 1);
	    }
	}
	
	/*
	* 文章评论页
	*/
	public function review(){
	
	  // $this->checkULogin();
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
	  	//取老师信息(wyj)
		$teacherInfo = D('Teacher_info')->where('uid='.$uid)->find(); 
		$this->assign('teacherInfo',$teacherInfo);
		
		//所授科目信息(wyj)
		$objName = D('Subject')->join('ms_member ON ms_member.obj_id = ms_subject.id')->where('ms_member.uid='.$uid)->getField('ms_subject.subject');
		$this->assign('objName',$objName);
		
		//平均分，取小数点后一位（wyj）
		$pingfen = D('Member')->review($uid);
		$this->assign('pingfen',$pingfen['pscores']);
		
		//所有的评论
		$all= D('Member')->allReview($uid);
		$this->assign('all',$all);
		//好评
		$good = D('Member')->goodReview($uid);
		$this->assign('good',$good);
		//中评
		$better= D('Member')->betterReview($uid);
		$this->assign('better',$better);
		//差评
		$bad = D('Member')->badReview($uid);
		$this->assign('bad',$bad);
		
	    //$userInfo= D('Member')->join("ms_teacher_info ON ms_member.uid = ms_teacher_info.uid where ms_member.uid = ms_teacher_info.uid and ms_member.uid = ".$uid."")->field('ms_member.uname,ms_teacher_info.*')->find();
	    //$this->assign("userInfo",$userInfo);
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
                import("@.ORG.Page");       //载入分页类         
                $params = array('total_rows'=>$count,'method'=>'html','parameter' =>'__URL__/review/aid/'.$aid.'/p/?','now_page'  =>$_GET['p'],'list_rows' =>10);		
				$page = new Page($params);
                $showPage = $page->show_2(1);
                $this->assign("page", $showPage);		
				  
				  
	    // 按照id排序显示10-以后条记录
        $list = D("Review")->join('ms_member on ms_review.uid = ms_member.uid')->where("ms_review.pid = 0 and ms_review.aid=".$aid)->order('ms_review.id desc')->limit($page->first_row .','.$page->list_rows)->field('ms_review.*,ms_member.uname,ms_member.uid')->select();
		$pid = array();
		$result = array(); //这个数组转化$messages用的.因为我们要把$messages的key值变成msgid
		foreach($list as $k=>$v){
		  $pid[] = $v['id'];
		  $result[$v['id']] = $v;
		 // $result[$v['msg']] = $v['msg'];
		}
		unset($list);
		
		//分页显示从第十条显示
	    $listR = D("Review")->join('ms_member on ms_review.uid = ms_member.uid')->where("ms_review.pid in (".implode(',',$pid).") and ms_review.aid=".$aid)->order('ms_review.id desc')->field('ms_review.*,ms_member.uname,ms_member.tid,ms_member.uid')->select();
		foreach( $listR as $key => $value){
        $result[$value['pid']]['listR'][] = $value;
		$result[$value['pid']]['countPid'] = count($result[$value['pid']]['listR']);
        }
		$this->assign("listR",$result);

        //热门评论
        $hotR=D('Index')->hotR();
	    $this->assign("hotR",$hotR);		
        //标签查询
		$tags=D("Tags")->where("FIND_IN_SET( 'h', flag )")->select();
		$this->assign('tags',$tags);		
	    $this->display();
       }
	   
	 //评论删除
	   public function delReview(){
	     $this->checkULogin();
	     $id=trim($_POST['reviewid']);
		 if(D('Review')->where('pid = '.$id)->count() > 0){
		     exit('0');
			}else{
			   $data=D('Review')->where('id='.$id)->delete();
			    if($data){
			     exit('1');
			     }else{
		          exit('0');
		        }
	        }
       }
       
       
       
       
 }
?>
