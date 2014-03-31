<?php
  class MemberModel extends Model{
      /**
      +----------------------------------------------------------
     * 教师排行榜，以学科/身份/或什么查询老师(wyj)
      +----------------------------------------------------------
     */
	 public function rankinglist(){
	     //$obj_id = isset($_GET['obj_id'])?$_GET['obj_id']+0:1;
		 if(isset($_GET['obj_id'])){  //科目
			$sql = "SELECT a.uid,uname,teach_age,b.image,keshifei,subject,identity FROM ms_teacher_info as a LEFT JOIN ms_member as b ON a.uid=b.uid LEFT JOIN ms_subject as c ON b.obj_id=c.id WHERE a.ishide=0 and b.tid=2 and b.obj_id=".isset($_GET['obj_id'])." ORDER BY b.uid desc";
			$list = M()->query($sql);
			
			//增加平均分数据，好中差评数据
			foreach($list as $key=>$row){
				//平均分，取小数点后一位（wyj）
				$pingfen = D("Member")->review($row['uid']);
				$list[$key]['pingfen'] = $pingfen['pscores'];
				
				//评价统计//所有的评论
				$all = D('Member')->allReview($row['uid']);
				$list[$key]['all'] = $all['alls'];
				//好评及进度条宽度//计算好再传值
				 $good = D('Member')->goodReview($row['uid']);
				 $list[$key]['good'] = count($good);
				 $list[$key]['goodWidth'] = $list[$key]['good']/$list[$key]['all']*100;
				//中评及进度条宽度//计算好再传值
				$better = D('Member')->betterReview($row['uid']);
				$list[$key]['better'] = count($better);
				$list[$key]['betterWidth'] = $list[$key]['better']/$list[$key]['all']*100;
				//差评及进度条宽度//计算好再传值
				$bad = D('Member')->badReview($row['uid']);
				$list[$key]['bad'] = count($bad);
				$list[$key]['badWidth'] = $list[$key]['bad']/$list[$key]['all']*100;		
			}
		
			return $list;
		}else if(isset($_GET['identity'])){  //身份
			/*$list = D('Reviewinfo')->join('ms_teacher_info on ms_teacher_info .uid = ms_reviewinfo.perid')->join('ms_member on ms_teacher_info .uid = ms_member.uid')->where('ms_teacher_info.identity = "'.$_GET['identity'].'"')->group('ms_teacher_info.uid')->order('pscores desc')->limit(6)->field('ms_teacher_info .*,avg(ms_reviewinfo.scores) as pscores,ms_member.uname,ms_member.obj_id')->select();*/
			$sql = "SELECT a.uid,uname,teach_age,b.image,keshifei,subject,identity FROM ms_teacher_info as a LEFT JOIN ms_member as b ON a.uid=b.uid LEFT JOIN ms_subject as c ON b.obj_id=c.id WHERE a.ishide=0 and b.tid=2 and a.identity='".$_GET['identity']."' ORDER BY b.uid desc";
			$list = M()->query($sql);
			
			//增加平均分数据，好中差评数据
			foreach($list as $key=>$row){
				//平均分，取小数点后一位（wyj）
				$pingfen = D("Member")->review($row['uid']);
				$list[$key]['pingfen'] = $pingfen['pscores'];
				
				//评价统计//所有的评论
				$all = D('Member')->allReview($row['uid']);
				$list[$key]['all'] = $all['alls'];
				//好评及进度条宽度//计算好再传值
				 $good = D('Member')->goodReview($row['uid']);
				 $list[$key]['good'] = count($good);
				 $list[$key]['goodWidth'] = $list[$key]['good']/$list[$key]['all']*100;
				//中评及进度条宽度//计算好再传值
				$better = D('Member')->betterReview($row['uid']);
				$list[$key]['better'] = count($better);
				$list[$key]['betterWidth'] = $list[$key]['better']/$list[$key]['all']*100;
				//差评及进度条宽度//计算好再传值
				$bad = D('Member')->badReview($row['uid']);
				$list[$key]['bad'] = count($bad);
				$list[$key]['badWidth'] = $list[$key]['bad']/$list[$key]['all']*100;		
			}
			return $list;
		}else{
			$list = D('Reviewinfo')->join('ms_teacher_info on ms_teacher_info .uid = ms_reviewinfo.perid')->join('ms_member on ms_teacher_info .uid = ms_member.uid')->group('ms_teacher_info.uid')->order('pscores desc')->limit(6)->field('ms_teacher_info .*,avg(ms_reviewinfo.scores) as pscores,ms_member.uname,ms_member.obj_id')->select();
			return $list;
		}
		
	 }
	 
	 
  
    /**
      +----------------------------------------------------------
     * 教师详细信息
      +----------------------------------------------------------
     */
	 public function teacherInfo(){
	     $uid = $_GET['uid'];
	     $info = D('Member')->join('ms_teacher_info on ms_member.uid = ms_teacher_info.uid')->where('ms_member.uid = ms_teacher_info.uid and ms_member.uid = ' .$uid)->field('ms_member.*,ms_teacher_info.*')->find();
		 $classid= D('Child_class')->where('uid = '.$uid)->select();
		// foreach($classid as $k =>$v){ 
		//    $classid[$v['id']] = $v;
		// }
		// unset($classid);
		 //foreach($info as $k => $v){
		 //   $info[$k]['classname'] = $classid[$v['classid']]['name'];
		 //}		 		 
		 return $info;
	 }
	 /**
      +----------------------------------------------------------
     * 年级信息
      +----------------------------------------------------------
     */
	 public function className(){
	   $classn=D('Member')->join('ms_child_class on ms_member.classid = ms_child_class.id')->where('ms_member.uid ='.$_GET['uid'])->field('ms_member.uid,ms_child_class.*')->select();
	   return $classn;
	 }
	 
	 
	 /**
      +----------------------------------------------------------
      * 教师评分信息平均分
      +----------------------------------------------------------
    */
	 public function review($uid){
	     //$uid = isset($_GET['uid']) ? $_GET['uid'] : $uid; (wyj)
		 $uid = isset($uid) ? $uid : $_GET['uid']+0; //(wyj)
	     $pingfen = D('Member')->join('ms_reviewinfo on ms_member.uid = ms_reviewinfo.perid')->where('ms_member.uid = ' .$uid)->field('ms_member.uname,avg(ms_reviewinfo.scores) as pscores')->find();
		 return $pingfen;
	 }
	 
	/**
      +----------------------------------------------------------
      * 全部评论(wyj)
      +----------------------------------------------------------
    */
	 
	public function allReview($uid){	 
		//增加传参途径获取uid
		//$uid = isset($_GET['uid'])?$_GET['uid']:$uid; 
		$uid = isset($uid) ? $uid : $_GET['uid']+0; //(wyj)
		$all = D('Reviewinfo')->where("pid = 0 and perid = " .$uid ."")->field('count(scores) as alls')->find();
		return $all;
	}
	 
	 /**
      +----------------------------------------------------------
      * 教师  好评(wyj)   
      +----------------------------------------------------------
    */ 
	public function goodReview($uid){
		//增加传参途径获取uid
		//$uid = isset($_GET['uid'])?$_GET['uid']:$uid; 
		$uid = isset($uid) ? $uid : $_GET['uid']+0; //(wyj)
		$good = D('Member')->join('ms_reviewinfo on ms_member.uid = ms_reviewinfo.perid')->where("ms_member.uid = " .$uid ." and ms_reviewinfo.pid = 0 and  ms_reviewinfo.scores >=80")->field('ms_member.uname,ms_reviewinfo.*')->select();
		return $good;
	}
	 
	/**
     +----------------------------------------------------------
     * 教师   中评(wyj)  
     +----------------------------------------------------------
    */ 
	public function betterReview($uid){
		//增加传参途径获取uid
		//$uid = isset($_GET['uid'])?$_GET['uid']:$uid; 
		$uid = isset($uid) ? $uid : $_GET['uid']+0; //(wyj)
		$better = D('Member')->join('ms_reviewinfo on ms_member.uid = ms_reviewinfo.perid')->where("ms_member.uid = " .$uid ." and ms_reviewinfo.pid = 0 and  ms_reviewinfo.scores > 60 and ms_reviewinfo.scores<80")->field('ms_member.uname,ms_reviewinfo.*')->select();
		return $better;
	} 
	 
	/**
     +----------------------------------------------------------
     * 教师   差评(wyj)
     +----------------------------------------------------------
    */
	public function badReview($uid){
		//增加传参途径获取uid
		//$uid = isset($_GET['uid'])?$_GET['uid']:$uid; 
		$uid = isset($uid) ? $uid : $_GET['uid']+0; //(wyj)
		$bad = D('Member')->join('ms_reviewinfo on ms_member.uid = ms_reviewinfo.perid')->where("ms_member.uid = " .$uid ." and ms_reviewinfo.pid = 0 and ms_reviewinfo.scores <= 60")->field('ms_member.uname,ms_reviewinfo.*')->select();
		 return $bad;
	}
	 
	/***
     +----------------------------------------------------------
     * 我写的文章(wyj)
     +----------------------------------------------------------
    */ 
	public function myArticle(){	     
		$uid = $_GET['uid'];
		import('@.ORG.Page'); 
		$count  = M("Article")->where("uid = " .$uid)->count();
		$params = array('total_rows'=>$count,'method'=>'html','parameter' =>'__URL__/info/uid/'.$uid.'/p/?','now_page'  =>$_GET['p'],'list_rows' =>6);		
		$page = new Page($params);
		$show = $page->show_2();
		
		//$article= D('Article')->where("uid = " .$uid ."")->limit($page->first_row .','.$page->list_rows)->select();
		//文章这里，加上作者姓名及拆分tag标签
		$sql= "SELECT a.aid,a.tag,a.summary,a.title,a.firstimage,a.up_time,a.rNum,b.uname,b.uid FROM ms_article as a left join ms_member as b on a.uid=b.uid WHERE a.uid = ".$uid." ORDER BY a.aid DESC LIMIT ".$page->first_row.",".$page->list_rows;
		$result = M()->query($sql);
		//处理一下tag字段
		foreach($result as $key=>$row){
			$tag = explode(',', $row['tag']);
			$result[$key]['tag'] = $tag;
		}

		//$article['page'] = $show;
		$info_arr=array();//用于存放info和page的大数组
		$info_arr['article']= $result;
		$info_arr['page'] = $show;
		//dump($info_arr);
		return $info_arr;
	}
	 
	 
	/***
     +----------------------------------------------------------
     * 我的评论(wyj)
     +----------------------------------------------------------
    */
	 
	 public function myReview(){	 
	    $uid = $_GET['uid'];
	    /*$mreview=D('Review')->join("ms_article ON ms_article.aid = ms_review.aid")->join()->where("ms_review.uid = ".$uid." and ms_review.status =1")->order("pl_time desc")->field('ms_article.title,ms_review.*')->limit(3)->select();*/
		$sql = "SELECT a.aid,a.title,b.id,b.msg,c.uname,c.uid FROM ms_article as a LEFT JOIN ms_review as b ON a.aid=b.aid LEFT JOIN ms_member as c
ON a.uid=c.uid WHERE b.uid = ".$uid." and b.status=1 ORDER BY b.pl_time LIMIT 3";
		$mreview = M()->query($sql);
		return $mreview;
	 }
	 
	/***
     +----------------------------------------------------------
     * 我的评论
     +----------------------------------------------------------
    */	
	  public function newVisit(){
	    $uid = $_GET['uid'];
		$newVisit = D('Visit')->join('ms_member on ms_visit.uid = ms_member.uid')->where('ms_visit.vid ='.$uid)->order('v_time desc')->limit(8)->field('ms_visit.*,ms_member.uname')->select();
	    return $newVisit;
	 }
	 
	/**
      +----------------------------------------------------------
      * 教师教学科目
      +----------------------------------------------------------
    */
	 public function subject(){
	     $uid = $_GET['uid'];
	     $subject = D('Member')->join('ms_subject on ms_member.obj_id = ms_subject.id')->where('ms_member.uid = ' .$uid)->field('ms_member.uid,ms_subject.*')->select();
		 return $subject;
	 }
	 
	 
	 /***
     +----------------------------------------------------------
     * 我的故事
     +----------------------------------------------------------
    */	
	public function myStory(){
	    $uid = $_GET['uid'];
		//$myStory = D('Mystory')->join('ms_member on ms_mystory.uid = ms_member.uid')->where('ms_mystory.vid ='.$uid)->order('v_time desc')->limit(8)->field('ms_visit.*,ms_member.uname')->select();
	    $mystory=D('Mystory')->where('uid = '.$uid)->select();		
		return $mystory;
	}
	 
	 
	 /***
     +----------------------------------------------------------
     * 故事评论
     +----------------------------------------------------------
    */	
	public function storyReview(){
	    $uid = $_GET['uid'];
		$id = $_POST['id'];
        $review=D('Mystory')->where('uid = '.$uid)->select();			
	    $pid=array();
		$result = array();
	    foreach($review as $k=>$v){
		  $pid[] = $v['id'];
		  $result[$v['id']] = $v;
		}
		
		unset($review);	
	    $reviewInfo = D("Reviewstory")->join('ms_member on ms_reviewstory.perid = ms_member.uid')->where("ms_reviewstory.pid in (".implode(',',$pid).") and ms_reviewstory.perid=".$uid)->order('ms_reviewstory.pl_time desc')->field('ms_reviewstory.*,ms_member.uname,ms_member.uid')->select();
		foreach( $reviewInfo  as $key => $value){
        $result[$value['pid']]['listR'][] = $value;
		$result[$value['pid']]['countPid'] = count($result[$value['pid']]['listR']);
        }		
		return $result;
	}
	
    /***
     +----------------------------------------------------------
     * 教学案例评论
     +----------------------------------------------------------
    */	
	public function caseReview(){
	    $uid = $_GET['uid'];
		$id = $_POST['id'];
        $review=D('Teachcase')->where('uid = '.$uid)->select();			
	    $pid=array();
		$result = array();
	    foreach($review as $k=>$v){
		  $pid[] = $v['id'];
		  $result[$v['id']] = $v;
		}
		
		unset($review);	
	    $reviewInfo = D("Reviewcase")->join('ms_member on ms_reviewcase.perid = ms_member.uid')->where("ms_reviewcase.pid in (".implode(',',$pid).") and ms_reviewcase.perid=".$uid)->order('ms_reviewcase.pl_time desc')->field('ms_reviewcase.*,ms_member.uname,ms_member.uid')->select();
		foreach( $reviewInfo  as $key => $value){
        $result[$value['pid']]['listR'][] = $value;
		$result[$value['pid']]['countPid'] = count($result[$value['pid']]['listR']);
        }		
		return $result;
	}
	 
	/***
     +----------------------------------------------------------
     * 评价信息(wyj)
     +----------------------------------------------------------
    */	
	  public function reviewInfo($first_row,$list_rows,$act){
	    $uid = $_GET['uid'];
		$act = $_GET['act']?$_GET['act']:$act; //如果有请求优先取请求，没有就传参进来(wyj)
		$act = $_POST['act']?$_POST['act']:$act;  //如果有请求优先取请求，没有就传参进来(wyj)
		if($act == 'all'){
		$list = D('Reviewinfo')->join('ms_member on ms_reviewinfo.uid = ms_member.uid')->where('ms_reviewinfo.pid= 0 and ms_reviewinfo.perid = '.$uid)->order('ms_reviewinfo.pl_time desc')->limit($first_row,$list_rows)->field('ms_member.uname,ms_reviewinfo.*')->select();
		}else if($act == 'good'){
	    $list = D('Reviewinfo')->join('ms_member on ms_reviewinfo.uid = ms_member.uid')->where('ms_reviewinfo.pid= 0 and ms_reviewinfo.scores>=80 and ms_reviewinfo.perid = '.$uid)->order('ms_reviewinfo.pl_time desc')->limit($first_row,$list_rows)->field('ms_member.uname,ms_reviewinfo.*')->select();
		}else if($act == 'better'){
	    $list = D('Reviewinfo')->join('ms_member on ms_reviewinfo.uid = ms_member.uid')->where('ms_reviewinfo.pid= 0 and ms_reviewinfo.scores>60 and  ms_reviewinfo.scores<80 and ms_reviewinfo.perid = '.$uid)->order('ms_reviewinfo.pl_time desc')->limit($first_row,$list_rows)->field('ms_member.uname,ms_reviewinfo.*')->select();
		}else if($act == 'bad'){
	    $list = D('Reviewinfo')->join('ms_member on ms_reviewinfo.uid = ms_member.uid')->where('ms_reviewinfo.pid= 0 and ms_reviewinfo.scores<=60 and ms_reviewinfo.perid = '.$uid)->order('ms_reviewinfo.pl_time desc')->limit($first_row,$list_rows)->field('ms_member.uname,ms_reviewinfo.*')->select();
		}else{
		$list = D('Reviewinfo')->join('ms_member on ms_reviewinfo.uid = ms_member.uid')->where('ms_reviewinfo.pid= 0 and ms_reviewinfo.perid = '.$uid)->order('ms_reviewinfo.pl_time desc')->limit($first_row,$list_rows)->field('ms_member.uname,ms_reviewinfo.*')->select();
		}
		$pid=array();
		$result = array();
	    foreach($list as $k=>$v){
		  $pid[] = $v['id'];
		  $result[$v['id']] = $v;
		}
		unset($list);	
		//分页显示从第十条显示
	    $reviewInfo = D("Reviewinfo")->join('ms_member on ms_reviewinfo.uid = ms_member.uid')->where("ms_reviewinfo.pid in (".implode(',',$pid).") and ms_reviewinfo.perid=".$uid)->order('ms_reviewinfo.pl_time desc')->field('ms_reviewinfo.*,ms_member.uname,ms_member.uid')->select();
		foreach( $reviewInfo  as $key => $value){
        $result[$value['pid']]['listR'][] = $value;
		$result[$value['pid']]['countPid'] = count($result[$value['pid']]['listR']);
        }
		return $result;
	 }
	 
	 /**
      +----------------------------------------------------------
     * 添加会员==家长and名师（wyj）
      +----------------------------------------------------------
     */
	
	public function addMember() {
        if (empty($_POST['uname'])) {
		    header('Content-Type:application/json; charset=utf-8');
            return array('status' => 0, 'info' => "用户名不能为空");
        }
		
		if (empty($_POST['area'])) {
		    header('Content-Type:application/json; charset=utf-8');
            return array('status' => 0, 'info' => "请填写您所在区域");
        }
        $datas = array();
        $M = M("Member");
        $datas['uname'] = trim($_POST['uname']);
		//if ($M->where("uname='" . $datas['uname'] . "'")->count() > 0) {
		//   header('Content-Type:application/json; charset=utf-8');
        //   return array('status' => 0, 'info' => "用户名已存在");
        // }
       	$datas['yqm_sn']=trim($_POST['yqm_sn']);
        if ($M->where("yqm_sn='" . $datas['yqm_sn'] . "'")->count() > 0) {
		   header('Content-Type:application/json; charset=utf-8');
           return array('status' => 0, 'info' => "邀请码已被使用");
        }
        $datas['password'] = md5(trim($_POST['password']));
        $datas['regdate'] = time();
		$datas['tid']=trim($_POST['tid']);
		$datas['phone']=trim($_POST['phone']);
		$datas['classid']=trim($_POST['classid']);
		$datas['yqm_sn']=trim($_POST['yqm_sn']);
		$datas['coin']=trim($_POST['coin']) + 5;//注册送5金币
		$datas['ip']=get_client_ip(3);
		$datas['province']=trim($_POST['province']);
		$datas['city']=trim($_POST['city']);
		$datas['area']=trim($_POST['area']);
		if($_POST['obj_id']){
		$datas['obj_id']=trim($_POST['obj_id']);
		}
        if ($M->add($datas)) {
		    $vo['uid'] = D('Member')->where('phone ='.$datas['phone'])->getField('uid');
			$vo['create_time']=time();
			$vo['title']='您好，欢迎注册名师.so';
			$vo['msg']='您好，欢迎注册名师.so您好，欢迎注册名师.so您好，欢迎注册名师.so您好，欢迎注册名师.so您好，欢迎注册名师.so';
		    $mesg = D('Message')->add($vo);
			if($mesg){
		    header('Content-Type:application/json; charset=utf-8');
            return array('status' => 1, 'info' =>"注册成功,为您转到登陆页面",'url' => U("Index/login"));
			}
        } else {
		    header('Content-Type:application/json; charset=utf-8');
            return array('status' => 0, 'info' => "注册失败，请重试");
        }
    }
	
	
	
	
	/**
      +----------------------------------------------------------
     * 添加会员==名师
      +----------------------------------------------------------
     */
	
	public function addTeacher() {
        if (!isset($_POST['uname1'])) {
		    header('Content-Type:application/json; charset=utf-8');
            return array('status' => 0, 'info' => "用户名不能为空");
        }
        $datas = array();
        $M = M("Member");
       	$datas['yqm_sn']=trim($_POST['yqm_sn1']);
        if ($M->where("yqm_sn='" . $datas['yqm_sn'] . "'")->count() > 0) {
		   header('Content-Type:application/json; charset=utf-8');
           return array('status' => 0, 'info' => "邀请码已被使用");
        }
        $datas['password'] = md5(trim($_POST['password1']));
        $datas['regdate'] = time();
		$datas['tid']=trim($_POST['tid']);
		$datas['phone']=trim($_POST['phone']);
		$datas['jlpwd']=md5(trim($_POST['phone']));
		$datas['classid']=trim($_POST['classid']);
		$datas['coin']=trim($_POST['coin']) + 5;//注册送5金币
		$datas['ip']=get_client_ip(3);
		$datas['province']=trim($_POST['province']);
		$datas['city']=trim($_POST['city']);
		$datas['area']=trim($_POST['area']);
		if($_POST['obj_id']){
		$datas['obj_id']=trim($_POST['obj_id']);
		}
        if ($M->add($datas)) {
		    header('Content-Type:application/json; charset=utf-8');
            return array('status' => 1, 'info' =>"注册成功,请登录", 'url' => U("Index/login"));
        } else {
		    header('Content-Type:application/json; charset=utf-8');
            return array('status' => 0, 'info' => "注册失败，请重试");
        }
    }
	
	
	 /**
      +----------------------------------------------------------
     * 添加约课
      +----------------------------------------------------------
     */
	
	  public function addYueke() {
        if (empty($_POST['phone'])) {
		    header('Content-Type:application/json; charset=utf-8');
            return array('status' => 0, 'info' => "手机号不能为空");
        }
        $datas = array();
		$datas['phone']=trim($_POST['phone']);
		$datas['uid']=isset($_SESSION['ms_user_id'])?$_SESSION['ms_user_id']:0; //家长uid，游客为0
		$datas['tid']=isset($_POST['tid'])?trim($_POST['tid']):0; //预约老师tid，未指定名师为0
		$datas['class']=trim($_POST['class']);
		$datas['obj']=trim($_POST['obj']);
		$datas['ip']=get_client_ip(1);
		$datas['provinceId']=trim($_POST['province']);
		$datas['cityId']=trim($_POST['city']);
		$datas['areaId']=trim($_POST['area']);
		$datas['address']=trim($_POST['address']);
		$datas['msg']=trim($_POST['msg']);
		$datas['budget']=trim($_POST['budget']);
		$datas['yueke_time']=trim($_POST['yueke_time']);
		$datas['create_time']=time();
		if(trim($_POST['classid'])){
			$datas['sex']=isset($_POST['sex'])?trim($_POST['sex']):0; //性别这项，貌似忽略了
		}
        if (M('Yueke')->add($datas)) {
		    header('Content-Type:application/json; charset=utf-8');
            return array('status' => 1, 'info' =>"填写成功");
			//'url' => U("Member/regjz")
        } else {
		    header('Content-Type:application/json; charset=utf-8');
            return array('status' => 0, 'info' => "填写失败，请重试");
        }
    }
 

 }

?>