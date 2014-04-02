<?php
/*
* 会员
*/
    class MemberAction extends PublicAction{
	  
		public function index(){
		    //科目
		    $obj = D('Subject')->select();
			$this->assign('obj',$obj);
			//名师排行榜
			$list = D('Member')->rankinglist();
			$this->assign('list',$list);
            $this->display();
		}
		
		/*
		* 家长注册
		*/
		public function regjz(){
		if($_SESSION['ms_user_id'] == true){
		  $this->error('您已登录，请先退出');
		}
		 $area =M("Area");
        // 查询所有地区
        $list = $area->where('')->select();
		$this->assign('list',$list);
		
		$plist = $area->where('pid=0')->select();
		$this->assign('plist',$plist);
		
		$list2 = $area->where('pid=1')->select();
		$this->assign('list2',$list2);
		
		$list3 = $area->where('pid>2')->select();
		$this->assign('list3',$list3);
		
		$areaData =$area->field('id,name')->where('pid=0')->select();
        $this->assign('areaData',$areaData);		
		//查询年级		  
		$class=$area->query("select * from ms_child_class");  		  
		$this->assign('class',$class);  		
		//科目
		$obj = D('Subject')->select();
	    $this->assign('obj',$obj);
        $this->display();
		}
		
/*
* 名师注册
*/
public function regms(){
	if($_SESSION['ms_user_id'] == true){
		$this->error('您已登录，请先退出');
	}
	$area =M("Area");
	// 查询所有地区
	$list = $area->where('')->select();
	$this->assign('list',$list);
	
	$plist = $area->where('pid=0')->select();
	$this->assign('plist',$plist);
	
	$list2 = $area->where('pid=1')->select();
	$this->assign('list2',$list2);
	
	$list3 = $area->where('pid>2')->select();
	$this->assign('list3',$list3);
	
	$areaData =$area->field('id,name')->where('pid=0')->select();
	$this->assign('areaData',$areaData);		
	//查询年级		  
	$class=$area->query("select * from ms_child_class");  		  
	$this->assign('class',$class);  		
	//科目
	$obj = D('Subject')->select();
	$this->assign('obj',$obj);
	$this->display();
}
		
		/*
		* 
		*/
        public function show(){
		 header("content-type:text/html;charset=utf8");
		 $member=D('Member');
		 var_dump($top=$member->topN());
		}

		 /*
		 *会员注册
		 */
		public function insert() {
        if (IS_POST) {
             //$this->checkULogin();
			var_dump($_POST);
			exit;
            header('Content-Type:application/json; charset=utf-8');
            echo json_encode(D("Member")->addMember());
          } else {
            $this->display();
        }
        }
		
		/*
		 *名师注册
		 */
		public function insert1() {
        if (IS_POST) {
             //$this->checkULogin();
			//var_dump($_POST);
            header('Content-Type:application/json; charset=utf-8');
            echo json_encode(D("Member")->addTeacher());
          } else {
            $this->display();
        }
        }
		
		/*
		*姓名验证
		*/
	    public function checkRes($uname=''){	
	       if (!empty($uname)) {
              $Form = M("Member");
              if ($Form->getByUname($uname)) {
                $this->error('姓名已经存在');
               } else {
                $this->success('姓名可以使用!');
               }
            }else{
             $this->error('姓名必须');
            }
	    }
		
		/*
		*邀请码验证
		*/
	    public function checkYqm($yqm_sn=''){
		     //print_r($yqm_sn);
		    if (!empty($yqm_sn)) {
              $Form = M("Yqm");
              if ($Form->where("status =0  and yqm_sn = '$yqm_sn'")->select()) {
                 $this->success('您填写的邀请码正确');
               } else {
                 $this->error('您填写的邀请码错误');
               }
            }else{
             $this->error('您填写的邀请码错误');
            }
	    }
		
		/*
		*手机验证
		*/
	    public function checkPhone($phone=''){
	         
			if (!empty($phone)) {
			     $Form = M("Member");
			   if($Form->getByPhone($phone)){
                $this->error('<div class="error"><p class="nok"></p></div>');
				}else{
				$this->success('<div class="error"><p class="ok"></p></div>');
				}
            }else{
             $this->error('<div class="error"><p class="nok"></p></div>');
            }
	    }
		
		
		/*
		*密码验证
		*/
		public function checkPwd($password=''){
		
		   if (!empty($password)) {
                $this->success('密码可以使用');
            }else{
             $this->error('请填写密码');
            }
	    }
	   	
		/*
		* 个人空间—名师主页
		*/
		public function info(){
			if(empty($_GET['uid'])){
				$this->error('非法操作');
			}	
			$uid = isset($_GET['uid'])?$_GET['uid']+0:0;
			//登陆老师信息
			$data['vid'] = $_GET['uid'];
			$data['uid']=$_SESSION['ms_user_id'];
			$data['v_time'] = time();
			$data['ip']  = get_client_ip();
				if($data){
				   if($data['vid']!=$data['uid']){
					  $check = D('Visit')->where('uid ='.$data['uid'].' and vid ='.$data['vid'])->getField('id');
						if($check){
						   M('Visit')->where('id ='.$check.'')->setField('v_time',time());
						}else{
						  M('Visit')->add($data);
						}		  
				   }
				}
			$newVisit = D('Member')->newVisit();
			$this->assign('visit',$newVisit);		
			 //end 最近访客	
			$info = D('Member')->teacherInfo();
			$this->assign('info',$info);
			
			//所授科目信息(wyj)
		$objName = D('Subject')->join('ms_member ON ms_member.obj_id = ms_subject.id')->where('ms_member.uid='.$uid)->getField('ms_subject.subject');
		$this->assign('objName',$objName);

			//平均分，取小数点后一位（wyj）
			$pingfen = D('Member')->review();
			$this->assign('pingfen',$pingfen['pscores']);
						
			//所有的评论
			$all= D('Member')->allReview();
			$this->assign('all',$all);
			//好评
			$good = D('Member')->goodReview();
			$this->assign('good',$good);
			//中评
			$better= D('Member')->betterReview();
			$this->assign('better',$better);
			//差评
			$bad = D('Member')->badReview();
			$this->assign('bad',$bad);

			//我的文章(wyj)
			$art = D('Member')->myArticle();
			$this->assign('article',$art['article']);
			$this->assign('page',$art['page']);
			
			//我的评论(wyj)
			$mreview = D('Member')->myReview();
			$this->assign('mreview',$mreview);
			
			$this->display();
		}
		
		/*
		*个人空间—评价信息
		*/
		public function review(){
		 if(empty($_GET['uid'])){
		    $this->error('非法操作');
		 }	
		 $uid = $_GET['uid'];
	    //所有的评论
		$all= D('Member')->allReview();
		$this->assign('all',$all);
		//好评
		$good = D('Member')->goodReview();
		$this->assign('good',$good);
		//中评
		$better= D('Member')->betterReview();
		$this->assign('better',$better);
		//差评
		$bad = D('Member')->badReview();
		$this->assign('bad',$bad);
		 
		  //平均分，取小数点后一位（wyj）
		  $pingfen = D('Member')->review();
		  $this->assign('pingfen',$pingfen['pscores']);
		  
		  //老师信息
		  $info = D('Member')->teacherInfo();
		  $this->assign('info',$info);
		  
		//所授科目信息(wyj)
		$objName = D('Subject')->join('ms_member ON ms_member.obj_id = ms_subject.id')->where('ms_member.uid='.$uid)->getField('ms_subject.subject');
		$this->assign('objName',$objName);
		  
		  
		  //全部评论信息
		  import('@.ORG.Page'); //导入分页
		  $count  = M("Reviewinfo")->where("pid = 0 and perid = " .$uid)->count();
		  $params = array('total_rows'=>$count,
		                   'method'=>'ajax',
						   'parameter' =>'__URL__/review/uid/'.$uid.'/p/?','now_page'  =>$_GET['p'],
						   'list_rows' =>3,
						   //'ajax_func_name' =>'goToPage',
                           // 'now_page'  =>1,	                      
						   #'parameter' =>"'jiong','username'",
						   );		
		  $page = new Page($params);
          $show = $page->show_2();
		  $this->assign('page',$show);
		  $reviewInfo = D('Member')->reviewInfo($page->first_row,$page->list_rows);
		  $this->assign('reviewInfo',$reviewInfo);
		   //全部好评信息
			$goodCount = M('Reviewinfo')->where('pid = 0 and scores >=80 and perid = '.$uid)->count();
			$goodParams = array('total_rows'=>$goodCount,
								'method'=>'ajax',
								'parameter' =>'__URL__/review/act/good/uid/'.$uid.'/p/','now_page' =>$_GET['p'],
								'list_rows' =>3,
								'ajax_func_name' =>'goToPage',
						   		'now_page'  =>1,
								);			
			$goodPage = new Page($goodParams);
			$goodShow = $goodPage->show_2();
			$this->assign('goodPage',$goodShow);
			$goodInfo = D('Member')->reviewInfo($goodPage->first_row,$goodPage->list_rows,'good');
			$this->assign('goodInfo',$goodInfo);
			//全部中评信息
			$betterCount = M('Reviewinfo')->where('pid = 0 and scores >60 and scores<80 and perid = '.$uid)->count();
			$betterParams = array('total_rows'=>$betterCount,
								'method'=>'ajax',
								'parameter' =>'__URL__/review/act/better/uid/'.$uid.'/p/?','now_page' =>$_GET['p'],
								'list_rows' =>3,
								'ajax_func_name' =>'goToPage',
						   		'now_page'  =>1,
								);			
			$betterPage = new Page($betterParams);
			$betterShow = $betterPage->show_2();
			$this->assign('betterPage',$betterShow);
			$betterInfo = D('Member')->reviewInfo($betterPage->first_row,$betterPage->list_rows,'better');
			//echo '<pre>';
			//var_dump($betterCount);
			//var_dump($betterInfo);
			$this->assign('betterInfo',$betterInfo);
			 //全部差评信息
			$badCount = M('Reviewinfo')->where('pid = 0 and scores <=60 and perid = '.$uid)->count();
			$badParams = array('total_rows'=>$badCount,
								'method'=>'ajax',
								'parameter' =>'__URL__/review/act/bad/uid/'.$uid.'/p/?','now_page' =>$_GET['p'],
								'list_rows' =>3,
								'ajax_func_name' =>'goToPage',
						   		'now_page'  =>1,
								);			
			$badPage = new Page($badParams);
			$badShow = $badPage->show_2();
			$this->assign('badPage',$badShow);
			$badInfo = D('Member')->reviewInfo($badPage->first_row,$badPage->list_rows,'bad');
			$this->assign('badInfo',$badInfo);
		  //评论信息结束
		  $this->display();
		}
		
		/*
		* 全部评价——ajax无刷新全部评价
		*/
		public function allReview(){
			if(empty($_GET['uid'])){
				$this->error('非法操作');
			}	
			$uid = $_GET['uid'];
			 //导入分页类
			import('@.ORG.Page');
			$count  = M("Reviewinfo")->where("pid = 0 and perid = " .$uid)->count();
			$params = array('total_rows'=>$count,
						   'method'=>'ajax',
						   'parameter' =>'__URL__/review/uid/'.$uid.'/p/?','now_page'  =>$_GET['p'],
						   'list_rows' =>3,
						   'ajax_func_name' =>'goToPage',
						   'now_page'  =>1,	                      
						   #'parameter' =>"'jiong','username'",
						   );		
			$page = new Page($params);
			$show = $page->show_2();
			$this->assign('page',$show);
			$reviewInfo = D('Member')->reviewInfo($page->first_row,$page->list_rows);
			$this->assign('reviewInfo',$reviewInfo);
		}
		
		/*
		* 全部评价——ajax无刷新好评
		*/
		public function goodReview(){
			if(empty($_GET['uid'])){
				$this->error('非法操作');
			}	
			$uid = $_GET['uid'];
			 //导入分页类
			import('@.ORG.Page');
			 //全部好评信息
			$goodCount = M('Reviewinfo')->where('pid = 0 and scores >=80 and perid = '.$uid)->count();
			$goodParams = array('total_rows'=>$goodCount,
								'method'=>'ajax',
								'parameter' =>'__URL__/review/act/good/uid/'.$uid.'/p/','now_page' =>$_GET['p'],
								'list_rows' =>3,
								'ajax_func_name' =>'goToPage',
						   		'now_page'  =>1,
								);			
			$goodPage = new Page($goodParams);
			$goodShow = $goodPage->show_2();
			$this->assign('goodPage',$goodShow);
			$goodInfo = D('Member')->reviewInfo($goodPage->first_row,$goodPage->list_rows,'good');
			$this->assign('goodInfo',$goodInfo);
		}
		
		/*
		* 全部评价——ajax无刷新中评
		*/
		public function betterReview(){
			if(empty($_GET['uid'])){
				$this->error('非法操作');
			}	
			$uid = $_GET['uid'];
			 //导入分页类
			import('@.ORG.Page');
			//全部中评信息
			$betterCount = M('Reviewinfo')->where('pid = 0 and scores >60 and scores<80 and perid = '.$uid)->count();
			$betterParams = array('total_rows'=>$betterCount,
								'method'=>'ajax',
								'parameter' =>'__URL__/review/act/better/uid/'.$uid.'/p/?','now_page' =>$_GET['p'],
								'list_rows' =>3,
								'ajax_func_name' =>'goToPage',
						   		'now_page'  =>1,
								);			
			$betterPage = new Page($betterParams);
			$betterShow = $betterPage->show_2();
			$this->assign('betterPage',$betterShow);
			$betterInfo = D('Member')->reviewInfo($betterPage->first_row,$betterPage->list_rows,'better');
			//echo '<pre>';
			//var_dump($betterCount);
			//var_dump($betterInfo);
			$this->assign('betterInfo',$betterInfo);
		}

		/*
		* 全部评价——ajax无刷新差评
		*/
		public function badReview(){
			if(empty($_GET['uid'])){
				$this->error('非法操作');
			}	
			$uid = $_GET['uid'];
			 //导入分页类
			import('@.ORG.Page');
			 //全部差评信息
			$badCount = M('Reviewinfo')->where('pid = 0 and scores <=60 and perid = '.$uid)->count();
			$badParams = array('total_rows'=>$badCount,
								'method'=>'ajax',
								'parameter' =>'__URL__/review/act/bad/uid/'.$uid.'/p/?','now_page' =>$_GET['p'],
								'list_rows' =>3,
								'ajax_func_name' =>'goToPage',
						   		'now_page'  =>1,
								);			
			$badPage = new Page($badParams);
			$badShow = $badPage->show_2();
			$this->assign('badPage',$badShow);
			$badInfo = D('Member')->reviewInfo($badPage->first_row,$badPage->list_rows,'bad');
			$this->assign('badInfo',$badInfo);
		}
		
		/*
		*基本资料
		*/
		public function base(){	
		 if(empty($_GET['uid'])){
		    $this->error('非法操作');
		 }
		 $uid = $_GET['uid']+0;
		//教学案例+评论
		$case= D('Member')->caseReview();
		//dump($story);
		$this->assign('case',$case);				
        //所有的评论
		$all= D('Member')->allReview();
		$this->assign('all',$all);
		//好评
		$good = D('Member')->goodReview();
		$this->assign('good',$good);
		//中评
		$better= D('Member')->betterReview();
		$this->assign('better',$better);
		//差评
		$bad = D('Member')->badReview();
		$this->assign('bad',$bad);
		
		//平均分，取小数点后一位（wyj）
		$pingfen = D('Member')->review();
		$this->assign('pingfen',$pingfen['pscores']);
		
		//老师信息
		$info = D('Member')->teacherInfo();
		$this->assign('info',$info);
		
		//所授科目信息(wyj)
		$objName = D('Subject')->join('ms_member ON ms_member.obj_id = ms_subject.id')->where('ms_member.uid='.$uid)->getField('ms_subject.subject');
		$this->assign('objName',$objName);
		
        //教学经历
        $teachinfo=D('Workexperience')->where('uid = '.$_GET['uid'])->select();
        $this->assign('teachinfo',$teachinfo);
		$this->display();
		}
		
	    /*
		*会员后台
		*/	
	   public function jianli(){
	    // $this->checkULogin();//检查是否登录
        // $this->checkUid();
	    //教师信息
		$info = D('Member')->teacherInfo();
		$this->assign('info',$info);
		//教学经历
        $teachinfo=D('Workexperience')->where('uid = '.$_GET['uid'])->select();
        $this->assign('teachinfo',$teachinfo);
		//学习经历
        $studyinfo=D('Studyexperience')->where('uid = '.$_GET['uid'])->select();
        $this->assign('studyinfo',$studyinfo);
	    $this->display();
	   }
		
		/*
		 *名师个人空间——约课页面
		 */
		public  function  yueke(){
		  $this->checkULogin();
		 if (IS_POST) {           
			//var_dump($_POST);
			header('Content-Type:application/json; charset=utf-8');
            echo json_encode(D("Member")->addYueke());
          }else{
			if(empty($_GET['uid'])){
				$this->error('非法操作');
			}
			$uid = $_GET['uid']+0;
			
		   $area= D('Area');
		   $areaData =$area->field('id,name')->where('pid=0')->select();
           $this->assign('areaData',$areaData);		
		   //查询年级
		   $class=$area->query("select * from ms_child_class");  
		   $this->assign('class',$class);  
		   //科目查询
		   $obj=M('Subject')->select();
		   $this->assign('obj',$obj);
		   $info = D('Teacher_info')->where('uid = '.$_GET['uid'])->select();
		   $this->assign('info',$info);
		   //所有的评论
		   $all= D('Member')->allReview();
		   $this->assign('all',$all);
		   //好评
		   $good = D('Member')->goodReview();
		   $this->assign('good',$good);
		   //中评
		   $better= D('Member')->betterReview();
		   $this->assign('better',$better);
		   //差评
		   $bad = D('Member')->badReview();
		   $this->assign('bad',$bad);
		   
			//平均分，取小数点后一位（wyj）
			$pingfen = D('Member')->review();
			$this->assign('pingfen',$pingfen['pscores']);
			
			//老师信息
			$info = D('Member')->teacherInfo();
			$this->assign('info',$info);
			
			//所授科目信息(wyj)
			$objName = D('Subject')->join('ms_member ON ms_member.obj_id = ms_subject.id')->where('ms_member.uid='.$uid)->getField('ms_subject.subject');
			$this->assign('objName',$objName);
			
		   //教学风格
		   $mytag = D('Tag')->mytag();//我的标签
		   $this->assign('mytag',$mytag);
		   //我的故事+评论
		   $story= D('Member')->storyReview();
		   //dump($story);
		   $this->assign('storyReview',$story);
		   $this->display();
		  } 
		}

/*
*名师库(wyj)
*/
public  function  all(){
	//课酬
	if(!empty($_GET['payment'])){
		$payment = $_GET['payment'];
		$payment = explode('~',$payment);
		$payment[0] = intval($payment[0]);
		$payment[1] = intval($payment[1]);
		
		//*********分页查询条件***********
		$map['keshifei']=array('between',"$payment[0],$payment[1]");
		$map['ishide'] = 0;
		//符合条件的总数
		$count = M("Teacher_info")->where($map)->count();
	}else{
		//******* 不带任何查询时的总数 *******
		$count = M("Teacher_info")->where('ms_teacher_info.ishide = 0 and ms_member.tid = 2')->join('ms_member on ms_teacher_info.uid = ms_member.uid')->count();
	}
	//载入分页类
	import("ORG.Util.Page");       
	$Page = new Page($count,6);
	$Page->setConfig('prev','<');
	$Page->setConfig('next','>');
	$Page->setConfig('theme','%upPage%  %linkPage% %downPage%');
	$showPage = $Page->show();
	$this->assign("page", $showPage);
	//查询列表 
	if(!empty($_GET['payment'])){ //课酬
		/*$list = M("Teacher_info")->where($map)->join('ms_member on ms_teacher_info.uid = ms_member.uid')->field('ms_member.uid,uname,teach_age,ms_member.image,keshifei,major,identity')->order('ms_member.uid desc')->limit($Page->firstRow.','.$Page->listRows)->select();*/
		
		$sql = "SELECT a.uid,uname,teach_age,b.image,keshifei,subject,identity FROM ms_teacher_info as a LEFT JOIN ms_member as b ON a.uid=b.uid LEFT JOIN ms_subject as c ON b.obj_id=c.id WHERE a.ishide=0 and b.tid=2 and a.keshifei between ".$payment[0]." and ".$payment[1]." ORDER BY b.uid desc LIMIT ".$Page->firstRow.",".$Page->listRows;
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
	}else{
		$sql = "SELECT a.uid,uname,teach_age,b.image,keshifei,subject,identity FROM ms_teacher_info as a LEFT JOIN ms_member as b ON a.uid=b.uid LEFT JOIN ms_subject as c ON b.obj_id=c.id WHERE a.ishide=0 and b.tid=2 ORDER BY b.uid desc LIMIT ".$Page->firstRow.",".$Page->listRows;
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

	}
	if(isset($_GET['obj_id'])){ //科目
		$list = D('Member')->rankinglist();
	}
	if(isset($_GET['identity'])){ //身份
		$list = D('Member')->rankinglist();
	}
	
	$this->assign("list",$list);
	//科目查询
	$obj=M('Subject')->select();
	$this->assign('obj',$obj);
	$this->display();
}
	    
		/*
		*给名师评分
		*/
		public function add_post(){
		    $data['msg'] = $_POST['msg'];
			if(isset($_POST['scores'])){
			$data['scores'] = $_POST['scores'];
			}
			$data['pl_time']=time();
			if(isset($_POST['pid'])){
			$data['pid']= $_POST['pid'];
			}			
			if(isset($_SESSION['ms_user_id'])){
			$data['uid'] = $_SESSION['ms_user_id'];
			}
			$data['perid'] = $_POST['perid'];
					 $perid = trim($_POST['perid']);
		    if($perid == $_SESSION['ms_user_id']){
		       //exit(-1);
			   $this->ajaxReturn('','Do not review to youself',-1);
		    }
			if($data){
			  $m= D('Reviewinfo');
			  if($m->add($data)){
			    $vo['id']= M('Reviewinfo')->order('pl_time desc')->limit(1)->getField('id');
                $vo['pl_time'] = date('Y-m-d H:i:s', $data['pl_time']);
				//nl2p p转换
                $vo['msg'] = nl2p($data['msg']);
				if($_POST['action'] == 'add_post'){
				  $vo['scores'] = $data['scores']; //分数
				}
				$vo['uname']=D('Member')->where("uid=" .$data['uid'])->getField('uname');
			    $this->ajaxReturn($vo,'ok',1);
				//echo json_encode($data);
			  }else{
			    $this->error('nook');
			  }
			}
		}
		
		
		/*
		 *收藏名师
		 */
		public function add_favorite_teacher(){
			$data['uid'] = intval($_SESSION['ms_user_id']);
			$data['t_uid'] =intval($_GET['uid']);
			$rs1 = M("Favorite_teacher")->where($data)->find();
			if(empty($rs1)){
				$data['create_time'] = time();
				M("Favorite_teacher")->add($data);
				$rs = M("Favorite_teacher")->where('t_uid ='.$data['t_uid'])->count();
				echo "$rs";
			}else{
				echo"您已收藏";
			}
			
		}
		
		/*
		* 创作------默认首页是我的评论(wyj)
		*/
		public function create(){
		           $this->checkULogin();//检查是否登录
		           $this->checkUid();
			$uid = intval($_SESSION['ms_user_id']);
			$action = $_GET['action'];
			if($action=="myArticle"){ //我的文章
				$data['ms_article.uid'] = intval($uid);
				$data['ms_article.status'] = 1;
					/* 分页   */
					$count = D("Article")->where($data)->count();
					import("@.ORG.Page");       //载入分页类
					$params = array('total_rows'=>$count,'method'=>'html','parameter' =>'__APP__/Member/create_favorite/action/myArticle/p/?','now_page'  =>$_GET['p'],'list_rows' =>10);
					$page = new Page($params);
					$showPage = $page->show_2(1);
					$this->assign("page", $showPage);

				$sql= "SELECT a.aid,a.tag,a.summary,a.title,a.firstimage,a.up_time,a.rNum,b.uname,b.uid FROM ms_article as a left join ms_member as b on a.uid=b.uid WHERE a.uid = ".$uid." ORDER BY a.aid DESC LIMIT ".$page->first_row.",".$page->list_rows;

				$maList = M()->query($sql);
				/*tag要处理一下*/
				$len = count($maList);
				for($i=0;$i<$len;$i++){
					$tag = explode(',', $maList[$i]["tag"]);
					$maList[$i]["tag"] = $tag;
				}
				//dump($maList);
				$this->assign("maList",$maList);
				$this->display('my_article');
				
			}else{
				//我的评论
				
				/* 分页   */
				$count = M("Review")->where("ms_review.uid =".$uid." and ms_review.status = 1")->count();
				import("@.ORG.Page");       //载入分页类
				$params = array('total_rows'=>$count,'method'=>'html','parameter' =>'__APP__/Member/create_favorite/p/?','now_page'  =>$_GET['p'],'list_rows' =>10);
				$page = new Page($params);
				$showPage = $page->show_2(1);
				$this->assign("page", $showPage);
				
				$mrList = M("Review")->where("ms_review.uid =".$uid." and ms_review.status = 1")->join("ms_article on ms_article.aid = ms_review.aid")->join("ms_member on ms_member.uid = ms_review.uid")->field("ms_review.*,ms_article.title,ms_member.uname")->limit($page->first_row .','.$page->list_rows)->order("ms_review.pl_time")->select();
				$this->assign("mrList",$mrList);
				$this->display("my_review");
			}
		}
		

		/*
		*删除我的评论
		*/
		public function delect_R(){
			$id = $_GET['id'];
			$rs = M("Review")->where("id =".$id)->delete();
			if($rs){
				$aid = M("Review")->where("id =".$id)->getField("aid");
				M("Article")->where("aid=".$aid)->setDec("rNum");
				//评论数是放在文章表字段里的，所以 删除时要减一，但这段貌似无效。。
				echo"已删除";
			}else{
				echo "删除失败";
			}
		}
		
		/*
		*删除我收藏的文章
		*/
		public function delect_Fa(){
			$id = $_GET['id'];
			$rs = M("Favorite")->where("id =".$id)->delete();
			if($rs){
				echo"已删除";
			}else{
				echo "删除失败";
			}
		}
		
		/*
		*删除收藏的名师
		*/
		public function delect_Ft(){
			$id = $_GET['id'];
			$rs = M("Favorite_teacher")->where("id =".$id)->delete();
			if($rs){
				echo"已删除";
			}else{
				echo "删除失败";
			}
		}
		
		
	 	/*
		 *评论删除
		 */
	   public function delReview(){
	     $this->checkULogin();
	     $id=trim($_POST['id']);
		 $action = $_POST['action'];
		 if($action == 'del_post'|| $action == "del_postcomment"){
			if(D('Reviewinfo')->where('pid = '.$id)->count() > 0){
		     exit('0');
			}else{
			   $data=D('Reviewinfo')->where('id='.$id)->delete();
			    if($data){
			     exit('1');
			     }else{
		          exit('0');
		        }
	        }
		 }else if($action == 'del_post_story'){	    
			   $data=D('Reviewstory')->where('id='.$id)->delete();
			    if($data){
			     exit('1');
			     }else{
		          exit('0');
		        }
	     }

       }
	   
	    /*
		* 会员后台首页
		*/
	   public function center(){
	    $this->checkULogin();//检查是否登录
        $this->checkUid();
		$uid = isset($_GET['uid'])?$_GET['uid']:0;
		//今日头条
		$today=D('Article')->top();
		$this->assign('today',$today);
		//学生推荐
		//$tuijian = D('Yueke')->where('status != 0')->order('status asc')->select();
		$sql = $sql = "SELECT a.*,b.name as className,c.subject FROM ms_yueke as a LEFT JOIN ms_child_class as b ON a.class=b.id LEFT JOIN ms_subject as c ON a.obj=c.id WHERE a.status!=0 AND a.tid=".$uid ." ORDER BY a.status ASC";
		//$sql = "SELECT a.*,b.name as className,c.subject FROM ms_yueke as a LEFT JOIN ms_child_class as b ON a.class=b.id LEFT JOIN ms_subject as c ON a.obj=c.id WHERE a.status!=0 AND (a.tid=".$uid ." OR '".$uid."' in (a.tjid)) ORDER BY a.status ASC";	  这里有一个sql语句的查询问题
		//var_dump($sql);
		$tuijian = M()->query($sql);
		
		foreach($tuijian as $key=>$row){
			//增加省、市、区信息
			$province = M('Area')->where('id='.$row['provinceId'])->getField('name');
			$city = M('Area')->where('id='.$row['cityId'])->getField('name');
			$area = M('Area')->where('id='.$row['areaId'])->getField('name');
			$tuijian[$key]['province'] = $province;
			$tuijian[$key]['city'] = $city;
			$tuijian[$key]['area'] = $area;
			//判断该老师是否已经提交过教学方案
			$tuijian[$key]['flag'] = M('Fangan')->where('uid='.$row['tid'].' and kid='.$row['id'])->find();
			
		}
		//var_dump($tuijian['flag']['id']);
		$this->assign('tuijian',$tuijian);
	    $this->display();
	   }

/*
* 名师—de—教学方案(wyj)
*/
public function fangan(){
	$this->checkULogin();//检查是否登录
	$uid = $_SESSION['ms_user_id']; //当前用户uid
	$id = isset($_GET['id'])?$_GET['id']+0:0; //方案id
	if($id==0){
		$this->error('没有正确的传参,访问手法不对哦');
		exit();
	}
	//方案信息
	$fangan = M('Fangan')->where('id='.$id)->find();
	$this->assign('fangan',$fangan);
	
	//判断会员身份tid：1家长2老师
	$tid = M('Member')->where('uid='.$uid)->getField('tid');
	$this->assign('tid',$tid); 
	
	if($tid==2){/*老师查看教学案例的话，传递过去需求信息*/
		$kid = $fangan['kid'];  //约课id
		//约课信息
		$yueke = M('Yueke')->where('id='.$kid)->find();
		$this->assign('yueke',$yueke);
		//孩子年级及所约科目
		$className = M('Child_class')->where('id='.$yueke['class'])->getField('name');
		$objName = M('Subject')->where('id='.$yueke['obj'])->getField('subject');
		$this->assign('className',$className);
		$this->assign('objName',$objName);
		//省市区信息
		$province=M('Area')->where('id='.$yueke['provinceId'])->getField('name');
		$city=M('Area')->where('id='.$yueke['cityId'])->getField('name');
		$area=M('Area')->where('id='.$yueke['areaId'])->getField('name');
		$this->assign('province',$province);
		$this->assign('city',$city);
		$this->assign('area',$area);
	}else{ /*家长页面的话，传递过去老师的信息*/
		$teacherid = $fangan['uid']; //老师id
		//取老师信息
		$uname = D('Member')->where('uid='.$teacherid)->getField('uname');
		$this->assign('uname',$uname);
		$teacherInfo = D('Teacher_info')->where('uid='.$teacherid)->find(); 
		$this->assign('teacherInfo',$teacherInfo);
		
		//所授科目信息
		$objName = D('Subject')->join('ms_member ON ms_member.obj_id = ms_subject.id')->where('ms_member.uid='.$teacherid)->getField('ms_subject.subject');
		$this->assign('objName',$objName);
		
		//平均分，取小数点后一位
		$pingfen = D('Member')->review($teacherid);
		$this->assign('pingfen',$pingfen['pscores']);
		
		//所有的评论
		$all= D('Member')->allReview($teacherid);
		$this->assign('all',$all);
		//好评
		$good = D('Member')->goodReview($teacherid);
		$this->assign('good',$good);
		//中评
		$better= D('Member')->betterReview($teacherid);
		$this->assign('better',$better);
		//差评
		$bad = D('Member')->badReview($teacherid);
		$this->assign('bad',$bad);
	}

	$this->display();
	
}
	   
/*
* 我的名师——家长（我预约的名师+官方推荐名师）
*/
//我预约的名师
public function mymingshi(){
	$this->checkULogin();//检查是否登录
	//处理传过来的家长id号
	$uid = isset($_GET['uid'])?$_GET['uid']:0;
	$sql ="SELECT a.id as yuekeId,a.uid,a.tid,b.uname,b.image,c.teach_age,c.keshifei,d.subject FROM ms_yueke as a LEFT JOIN ms_member as b ON a.tid=b.uid LEFT JOIN ms_teacher_info as c ON a.tid=c.uid LEFT JOIN ms_subject as d ON b.obj_id=d.id WHERE a.tid!=0 AND a.uid=".$uid;
	$teacherInfo = M()->query($sql);
	
	//增加平均分数据，好中差评数据
	foreach($teacherInfo as $key=>$row){
		//平均分，取小数点后一位（wyj）
		$pingfen = D("Member")->review($row['tid']);
		$teacherInfo[$key]['pingfen'] = $pingfen['pscores'];
		
		//评价统计//所有的评论
		$all = D('Member')->allReview($row['tid']);
		$teacherInfo[$key]['all'] = $all['alls'];
		//好评及进度条宽度//计算好再传值
		 $good = D('Member')->goodReview($row['tid']);
		 $teacherInfo[$key]['good'] = count($good);
		 $teacherInfo[$key]['goodWidth'] = $teacherInfo[$key]['good']/$teacherInfo[$key]['all']*100;
		//中评及进度条宽度//计算好再传值
		$better = D('Member')->betterReview($row['tid']);
		$teacherInfo[$key]['better'] = count($better);
		$teacherInfo[$key]['betterWidth'] = $teacherInfo[$key]['better']/$teacherInfo[$key]['all']*100;
		//差评及进度条宽度//计算好再传值
		$bad = D('Member')->badReview($row['tid']);
		$teacherInfo[$key]['bad'] = count($bad);
		$teacherInfo[$key]['badWidth'] = $teacherInfo[$key]['bad']/$teacherInfo[$key]['all']*100;	
		
		//判断该老师是否已经提交过教学方案
		$teacherInfo[$key]['flag'] = M('Fangan')->where('status = 1 and uid='.$row['tid'].' and kid='.$row['yuekeId'])->find();	
	}
	//var_dump($teacherInfo);	
	$this->assign('teacherInfo',$teacherInfo);
	$this->display();
}

//官方推荐的名师
public function officialmingshi(){
	$this->checkULogin();//检查是否登录
	//处理传过来的家长id号
	$uid = isset($_GET['uid'])?$_GET['uid']:0;
	//这里应当先取出推荐的老师id来，也就是tjid(已结束的不算考虑范围内)
	$tjid = M('Yueke')->where('status!=2 and tjid!=0 and uid='.$uid)->getField('tjid',true);
	//筛选重复老师id，拼合成数组
	$tjids = array();
	foreach($tjid as $key=>$row){
		$tjids = explode(',',$row); 
	}
	//var_dump($tjids); array(3) { [0]=> string(1) "1" [1]=> string(1) "2" [2]=> string(1) "3" } 
	//转成字符串
	$tjids = implode(',',$tjids);
	$sql ="SELECT b.uid,b.uname,b.image,c.teach_age,c.keshifei,d.subject FROM  ms_member as b LEFT JOIN ms_teacher_info as c ON b.uid=c.uid LEFT JOIN ms_subject as d ON b.obj_id=d.id WHERE b.uid in (".$tjids.")";
	$teacherInfo = M()->query($sql);
	//var_dump($sql);
	//增加平均分数据，好中差评数据
	foreach($teacherInfo as $key=>$row){
		//平均分，取小数点后一位（wyj）
		$pingfen = D("Member")->review($row['uid']);
		$teacherInfo[$key]['pingfen'] = $pingfen['pscores'];
		
		//评价统计//所有的评论
		$all = D('Member')->allReview($row['uid']);
		$teacherInfo[$key]['all'] = $all['alls'];
		//好评及进度条宽度//计算好再传值
		 $good = D('Member')->goodReview($row['uid']);
		 $teacherInfo[$key]['good'] = count($good);
		 $teacherInfo[$key]['goodWidth'] = $teacherInfo[$key]['good']/$teacherInfo[$key]['all']*100;
		//中评及进度条宽度//计算好再传值
		$better = D('Member')->betterReview($row['uid']);
		$teacherInfo[$key]['better'] = count($better);
		$teacherInfo[$key]['betterWidth'] = $teacherInfo[$key]['better']/$teacherInfo[$key]['all']*100;
		//差评及进度条宽度//计算好再传值
		$bad = D('Member')->badReview($row['uid']);
		$teacherInfo[$key]['bad'] = count($bad);
		$teacherInfo[$key]['badWidth'] = $teacherInfo[$key]['bad']/$teacherInfo[$key]['all']*100;		
	}
	
	//var_dump($teacherInfo);	
	$this->assign('teacherInfo',$teacherInfo);
	$this->display();
}
	   
	     /*
		 *名师认证
		 */
	   public function renzheng(){
        $this->checkULogin();//检查是否登录
        $this->checkUid();
		//处理传过来的会员id号
		$uid = isset($_GET['uid'])?$_GET['uid']:0;
		if($uid==0){
			$this->error('没有正确的传参,访问手法不对哦');
			exit();
		}
        $info = D('Member')->teacherInfo();	
        $this->assign('info',$info);
        //查询标签
		$tagList = D('Tag')->order('rand()')->limit(10)->select();//所有标签
		$this->assign('tagList',$tagList);
		$mytag = D('Tag')->mytag();//我的标签
		$this->assign('mytag',$mytag);
		//工作经历
		$worklist=D('Workexperience')->where('uid = '.$uid)->select();
		$this->assign('worklist',$worklist);
		//学习经历
		$schlist=D('Studyexperience')->where('uid = '.$uid)->select();
		$this->assign('schlist',$schlist);
	    //查询年级		  
		$class=D('Child_class')->select();  		  
		$this->assign('class',$class);  		
		//科目
		$obj = D('Subject')->select();
	    $this->assign('obj',$obj);
		//地区查询
		$area= D('Area');
	    $areaData =$area->field('id,name')->where('pid=0')->select();
        $this->assign('areaData',$areaData);
        $classname=D('Member')->className();
        $this->assign('classname',$classname);	
        //荣誉证书
        $ryzs = D('Ryzs')->order('create_time')->where('uid = '.$uid)->limit(3)->select();
        $this->assign('ryzs',$ryzs);		
	    $this->display();	   
	   }
	   
	   //荣誉证书——会员提交处理
		public function ryzs(){
			$obj = D('Ryzs');
			//判断是否是表单数据
			if($this->isPost()){
				//获取表单数据并添加
				extract($_POST);
				//上传图片的话，图片的验证
				if(!empty($info[0]['savename'])){
					//图片上传类
					import('ORG.Net.UploadFile');
					$upload = new UploadFile();// 实例化上传类
					$upload->maxSize  = 102400 ;// 设置附件上传大小
					$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
					$upload->savePath =  './Uploads/ryzs/';// 设置附件上传目录
					if(!$upload->upload()) {// 上传错误提示错误信息
						$this->error($upload->getErrorMsg());
					}else{// 上传成功 获取上传文件信息
						$info = $upload->getUploadFileInfo();
					}
					$data['image'] = $info[0]['savename'];//图片的
				}		
				$data['uid'] = $uid; //建议人信息，0为游客
				$data['create_time'] = time();
				$sugid = $obj->data($data)->add();
				if($sugid){
					$this->success('上传成功！');
					exit;
				}else{
					$this->error('荣誉证书上传失败，请稍后重试！');
				}
			}
		}
		
	   
	   /*
	   * 名师认证—我的设置
	   */
	   public function shezhi(){
	    $this->checkULogin();//检查是否登录
        $this->checkUid();
		if(isset($_SESSION['ms_user_id'])){
			$uid = $_SESSION['ms_user_id'];
		}
		if($_POST){
		//------------
		if($uid){
			if(!empty($info[0]['savename'])){
				//图片上传类
				import('ORG.Net.UploadFile');
				$upload = new UploadFile();// 实例化上传类
				$upload->maxSize  = 102400 ;// 设置附件上传大小
				$upload->allowExts  = array('jpg', 'gif', 'png', 'bmp');// 设置附件上传类型
				$upload->savePath =  './Uploads/thumb/';// 设置附件上传目录
				if(!$upload->upload()) {// 上传错误提示错误信息
					$this->error($upload->getErrorMsg());
				}else{// 上传成功 获取上传文件信息
					$info = $upload->getUploadFileInfo();
				}
				//头像的数据，需要添加上以前的记录
				$imagesAgo=$_POST['imagesAgo']?$_POST['imagesAgo']:'';
				if($imagesAgo){
					$data['image'] = $info[0]['savename'].','.$imagesAgo;
				}else{
					$data['image'] = $info[0]['savename'];
				}
				
			}		    
			//验证用户是否存在
			$checkuid = D('Member')->where('uid = '.$uid)->find();
			if(true){
				if(D('Member')->where('uid = '.$uid)->save($data)){
					$this->ajaxReturn($data,'ok',1);
				}else{
					$this->error('no');
				}
			}else{
				$this->error('不存在该会员');			  
			}
		}	
	//-------------
		}else{
			//修改头像的话，我觉得另外起个方法比较好
			//显示头像(这里含用户使用过的所有头像，以逗号分隔)(wyj)
			//$thumb = D('Teacher_info')->where('uid='.$uid)->getField('thumb');
			$headpic = D('Member')->where('uid='.$uid)->getField('image');
			//切割图片
			$this->assign('headpic',$headpic);
			
			//是否隐藏		
			$ishide = D('Teacher_info')->where('uid ='.$uid)->getField('ishide');
			$this->assign('ishide',$ishide);
			//判断是否存在url 存在 说明已经修改过 不允许再修改
			$url = D('Teacher_info')->where('uid ='.$uid)->getField('url');
			$this->assign('url',$url);
			$this->display();
		}
		
	   }


	   
/*
* 修改头像（wyj）//////////做到这里了~！
*/
public function headPic(){
	echo '123';
	die;
	//到底过来没啊~~~~
	return $_SESSION['ms_user_id'];
	//判断修改头像用户
	if(isset($_SESSION['ms_user_id'])){
		$uid = $_SESSION['ms_user_id'];
	}
	/*$uid = isset($_POST['uid'])?$_POST['uid']+0:0;*/
	if($uid){
		var_dump($uid);
		if(!empty($info[0]['savename'])){
			//图片上传类
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 102400 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'bmp');// 设置附件上传类型
			$upload->savePath =  './Uploads/thumb/';// 设置附件上传目录
			if(!$upload->upload()) {// 上传错误提示错误信息
				$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
				$info = $upload->getUploadFileInfo();
			}
			//头像的数据，需要添加上以前的记录
			$imagesAgo=$_POST['imagesAgo']?$_POST['imagesAgo']:'';
			if($imagesAgo){
				$data['image'] = $info[0]['savename'].','.$imagesAgo;
			}else{
				$data['image'] = $info[0]['savename'];
			}
			
		}		    
		//验证用户是否存在
		$checkuid = D('Member')->where('uid = '.$uid)->find();
		if(true){
			if(D('Member')->where('uid = '.$uid)->save($data)){
				$this->ajaxReturn($data,'ok',1);
			}else{
				$this->error('no');
			}
		}else{
			$this->error('不存在该会员');			  
		}
	}	
$this->display();
}
	   
	   
	   //官方信息
	   public  function guanfang(){
	    $this->checkULogin();//检查是否登录
        $this->checkUid();	
	    $this->display();
	   }
	   
	   
       //金币管理
	   public function coin(){	 
        $this->checkULogin();//检查是否登录
        $this->checkUid();	
	    $this->display();	   
	   }
	   
	   
	   /*
	   * 个人空间—收藏
	   */
	   public function favorite(){	    
        $this->checkULogin();//检查是否登录
		$this->checkUid();
		$uid = intval($_SESSION['ms_user_id']);
		$action = $_GET['action'];
		 if($action=="myFavorite_teacher"){ //我收藏的名师
				/* 分页  */
				$count = M("Favorite_teacher")->where("ms_favorite_teacher.uid =".$uid)->count();
				import("@.ORG.Page");       //载入分页类
				$params = array('total_rows'=>$count,'method'=>'html','parameter' =>'__APP__/Member/create_favorite/action/myFavorite_teacher/p/?','now_page'  =>$_GET['p'],'list_rows' =>10);
				$page = new Page($params);
				$showPage = $page->show_2(1);
				$this->assign("page", $showPage);
			
			//取被收藏的老师的各种信息
			$sql = 'SELECT a.*,b.teach_age,b.identity,c.uname,c.image,c.tid,d.subject FROM ms_favorite_teacher as a left join ms_teacher_info as b on a.t_uid
=b.uid left join ms_member as c on b.uid=c.uid left join ms_subject as d on c.obj_id=d.id WHERE a.uid='.$uid;
			$mtList = M() -> query($sql); //执行原生的sql语句
			//遍历结果集，添加上每位老师的平均分
			foreach($mtList as $key=>$row){
				$sqlpf = 'SELECT avg(scores) as fen FROM ms_member as mem LEFT JOIN ms_reviewinfo as rev ON mem.uid = rev.perid WHERE mem.uid ='.$row['t_uid'];
				$fen = M() -> query($sqlpf);
				$mtList[$key]['fen'] = (float)($fen[0]['fen']);
			}

				$this->assign("mtList",$mtList);
				$this->display('my_addmingshi');
				
			}else{ //我收藏的文章	
				/* 分页   */
				$count = M("Favorite")->where("ms_favorite.uid =".$uid)->count();
				import("@.ORG.Page");       //载入分页类
				$params = array('total_rows'=>$count,'method'=>'html','parameter' =>'__APP__/Member/create_favorite/action/myFavorite_article/p/?','now_page'  =>$_GET['p'],'list_rows' =>10);
				$page = new Page($params);
				$showPage = $page->show_2(1);
				$this->assign("page", $showPage);
				
				//这里取文章信息
				$sql = 'SELECT a.id,b.tag,b.aid,b.firstimage,b.title,b.ishid,c.tid,c.uname,b.uid as zzid,b.up_time,b.summary,b.keywords,b.rNum FROM ms_favorite as a left join ms_article as b on a.aid = b.aid left join ms_member as c on b.uid = c.uid where a.uid ='.$uid;
				$mfList = M() -> query($sql);
 				//tag要处理一下
				$len = count($mfList);
				for($i=0;$i<$len;$i++){
					$tag = explode(',', $mfList[$i]["tag"]);
					$mfList[$i]["tag"] = $tag;
				}
				//dump($mfList);
				$this->assign("mfList",$mfList);
				$this->display('my_addarticle');
			}
	   }	   		   	   
	   //添加详细信息
	   public function add_info(){	   
	     if(isset($_SESSION['ms_user_id'])){
		    $uid = $_SESSION['ms_user_id'];
		 }
		  if($uid){		    
			if(!empty($_POST['now_job'])){
			$data['now_job'] = $_POST['now_job'];
			}
			if(!empty($_POST['msg'])){
			$data['msg'] = $_POST['msg'];
			}
			if(!empty($_POST['my_strong'])){
			$data['my_strong'] = $_POST['my_strong'];
			}
			$checkuid = D('Teacher_info')->where('uid = '.$uid)->find();
			if($checkuid){
			  if(D('Teacher_info')->where('uid = '.$uid)->save($data)){
			    $this->ajaxReturn($data,'ok',1);
			  }else{
			    $this->error('no');
			  }
			}else{
			  $data['uid'] = $uid;
			  if(D('Teacher_info')->add($data)){
			    $this->ajaxReturn($data,'ok',1);
			  }else{
			    $this->error('no');
			  }
			}
		  
		  }	   
	   }
	   	   //添加工作
	   public  function add_job(){
	   
	     if(isset($_SESSION['ms_user_id'])){
		    $uid = $_SESSION['ms_user_id'];
		 }
		  if($uid){		    
			if(!empty($_POST['msg'])){
			$data['msg'] = $_POST['msg'];
			}
			$checkuid = D('Teacher_info')->where('uid = '.$uid)->find();
			if($checkuid){
			  if(D('Teacher_info')->where('uid = '.$uid)->save($data)){
			    $this->ajaxReturn($data,'ok',1);
			  }else{
			    $this->error('no');
			  }
			}else{
			  $data['uid'] = $uid;
			  if(D('Teacher_info')->add($data)){
			    $this->ajaxReturn($data,'ok',1);
			  }else{
			    $this->error('no');
			  }
			}
		  
		  }
	   
	   }
	   
	   //添加样式
	   public  function add_style(){
	   
	     if(isset($_SESSION['ms_user_id'])){
		    $uid = $_SESSION['ms_user_id'];
		 }
		  if($uid){		    
			if(!empty($_POST['style'])){
			$data['style'] = $_POST['style'];
			}
			$checkuid = D('Member')->where('uid = '.$uid)->find();
			if($checkuid){
			  if(D('Member')->where('uid = '.$uid)->save($data)){
			    $this->ajaxReturn($data,'ok',1);
			  }else{
			    $this->error('no');
			  }
			}else{
			    $this->error('不存在该会员');			  
			}
		  
		  }
	   
	   }
	  //检查密码  更新密码 
	   public function checkCode(){
	    if(isset($_SESSION['ms_user_id'])){
		    $uid = $_SESSION['ms_user_id'];
		}
		$action = $_POST['act'];
		if($uid){
		  if($action = 'pwd'){
		    if(!empty($_POST['old'])){ 
			        //检查两次输入密码是否一致
				if(!empty($_POST['newpassword'])){
		           if($_POST['newpassword'] == $_POST['querenpassword']){
		            $data['password'] = MD5($_POST['newpassword']);
		           }
		        }
		     $oldpwd =md5($_POST['old']);
			 $pwd = D('Member')->where('uid ='.$uid)->getField('password');
			  if($oldpwd == $pwd){
			      $new = D('Member')->where('uid ='.$uid)->save($data);  
				  if($new){
				    $this->ajaxReturn($data,'更新成功',1);
				  }else{
				    $this->error('更新失败');
				  }
			  }else{
			   $this->error('原始密码不正确');
			  }
		    }else{
			  $this->error('原始密码 不能为空');
			}
		 }else if($action == 'jlpwd'){
		    if(!empty($_POST['old'])){ 
			        //检查两次输入密码是否一致
				if(!empty($_POST['newpassword'])){
		           if($_POST['newpassword'] == $_POST['querenpassword']){
		            $data['jlpwd'] = md5($_POST['newpassword']);
		           }
		        }
		     $oldpwd =md5($_POST['old']);
			 $pwd = D('Member')->where('uid ='.$uid)->getField('jlpwd');
			  if($oldpwd == $pwd){
			      $new = D('Member')->where('uid ='.$uid)->save($data);  
				  if($new){
				    $this->ajaxReturn($data,'更新成功',1);
				  }else{
				    $this->error('更新失败');
				  }
			  }else{
			   $this->error('原始密码不正确');
			  }
		    }else{
			  $this->error('原始密码 不能为空');
			}
		 
		 }

		}else{
		  $this->error('用户不存在');
		}
	   
	   }
     
	   	//添加样式  是否隐藏
	   public  function checkIshide(){
	   
	     if(isset($_SESSION['ms_user_id'])){
		    $uid = $_SESSION['ms_user_id'];
		 }
		  if($uid){		    
			if(isset($_POST['ishide'])){
			$data['ishide'] = $_POST['ishide'];//是否隐藏
			}
			if(!empty($_POST['url'])){
			$data['url'] = 'www.'.$_POST['url'].'.mingshi.so';//检查地址
			}
			$checkuid = D('Teacher_info')->where('uid = '.$uid)->find();
			if($checkuid){
			  if(D('Teacher_info')->where('uid = '.$uid)->save($data)){
			    $this->ajaxReturn($data,'ok',1);
			  }else{
			    $this->error('no');
			  }
			}else{
			    $this->error('不存在该会员');			  
			}
		  
		  }
	   
	}
	
	
	
    //会员头像  生成三张 上传头像
	public function uploadImg(){
		import('ORG.UploadFile');
		$upload = new UploadFile();						// 实例化上传类
		$upload->maxSize = 1*1024*1024;					//设置上传图片的大小
		$upload->allowExts = array('jpg','png','gif');	//设置上传图片的后缀
		$upload->uploadReplace = true;					//同名则替换
		$upload->saveRule = 'avatar';					//设置上传头像命名规则(临时图片),修改了UploadFile上传类
		//完整的头像路径
		$path = './avatar/';
		$upload->savePath = $path;
		if(!$upload->upload()) {						// 上传错误提示错误信息
			$this->ajaxReturn('',$upload->getErrorMsg(),0,'json');
		}else{											// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			$temp_size = getimagesize($path.'temp.jpg');
			if($temp_size[0] < 100 || $temp_size[1] < 100){//判断宽和高是否符合头像要求
				$this->ajaxReturn(0,'图片宽或高不得小于100px！',0,'json');
			}
			$this->ajaxReturn(__ROOT__.'/avatar/'.$user_path.'temp.jpg',$info,1,'json');
		}
	}
	//裁剪并保存用户头像
	public function cropImg(){
		//图片裁剪数据
		$params = $this->_post();						//裁剪参数
		if(!isset($params) && empty($params)){
			return;
		}		
		//头像目录地址
		$path = './avatar/';
		//要保存的图片
		$real_path = $path.'avatar.jpg';
		//临时图片地址
		$pic_path = $path.'temp.jpg';
		import('ORG.ThinkImage.ThinkImage');
		$Think_img = new ThinkImage(THINKIMAGE_GD); 
		//裁剪原图
		$Think_img->open($pic_path)->crop($params['w'],$params['h'],$params['x'],$params['y'])->save($real_path);
		//生成缩略图
		$Think_img->open($real_path)->thumb(100,100, 1)->save($path.'avatar_100.jpg');
		$Think_img->open($real_path)->thumb(60,60, 1)->save($path.'avatar_60.jpg');
		$Think_img->open($real_path)->thumb(30,30, 1)->save($path.'avatar_30.jpg');
		$this->success('上传头像成功');
	}
	
	
	
	}
?>