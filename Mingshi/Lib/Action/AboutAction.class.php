<?php
  class  AboutAction extends PublicAction{
	/*
	*名师.so
	*/
    public function index(){
	   $this->display();
	}
	
	/*
	*联系我们
	*/
	public function contact(){
	   $this->display();
	}
	
	/*
	*网站地图
	*/
	public function map(){
	   $this->display();
	}
	
	/*
	*人才招聘
	*/
	public function job(){
	   $this->display();
	}
	
	/*
	*合作伙伴
	*/
	public function partner(){
	   $this->display();
	}
	
	/*
	*建议反馈
	*/
	public function jianyi(){
		$obj = D('Suggest');
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
				$upload->savePath =  './Uploads/suggest/';// 设置附件上传目录
				if(!$upload->upload()) {// 上传错误提示错误信息
					$this->error($upload->getErrorMsg());
				}else{// 上传成功 获取上传文件信息
					$info = $upload->getUploadFileInfo();
				}
				$data['sug_pic'] = $info[0]['savename'];//图片的
			}		
			//验证内容将字数控制在10-500之内
			//$sug_content = $_POST['sug_content'];
			if(mb_strlen($sug_content,'utf8')<10 or mb_strlen($sug_content,'utf8')>500){
				$this->error('请检查您的输入内容！');
			}else{
				//剔除html标签
				$sug_content = strip_tags($sug_content);
				$data['sug_content'] = $sug_content;
			}
			
			$data['sug_uid'] = $sug_uid; //建议人信息，0为游客
			$data['sug_date'] = date('Y-m-d',time());
			$sugid = $obj->data($data)->add();
			if($sugid){
				$this->success('提交成功，感谢您的支持！');
				exit;
			}else{
				//var_dump($data);
				$this->error('您的建议未能成功提交，请稍后重试！');
			}
		}else{
			//获取‘建议反馈’与‘建议人’信息
			////获取‘建议反馈’信息展示
			$info = M()->table('ms_suggest')->order('sug_id desc')->select();
			//分页不加！$info = D('about')->showpage();
			////遍历意见表，添加建议人信息
			foreach($info as $key=>$value){
				//判断会员/游客
				if($value['sug_uid']==0){//游客uid值为0
					$info[$key]['uname']='游客';
					$info[$key]['upic']= HOME_IMG.'90_1.png';
					$info[$key]['uid']=0;
				}else{
					//取会员信息
					$Uinfo=M()->table('ms_member')->where('uid='.$value['sug_uid'])->find();
					$info[$key]['uname']=$Uinfo['uname'];
					$info[$key]['uid']=$Uinfo['uid'];
					if(empty($Uinfo['image'])){//会员无头像
						$info[$key]['upic']= HOME_IMG.'90_1.png';
					}else{
						$info[$key]['upic']=$Uinfo['image'];
					}
					
				}
			}
			$this->assign('info',$info);
			$this->display(); 
		}
		
	}
	
	/*
	*名师寄语
	*/
	public function jiyu(){
	   $this->display();
	}
  
  
  
  
  
  
  
  
  
  
  }
  
 ?>
