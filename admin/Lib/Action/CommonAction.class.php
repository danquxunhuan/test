<?php

  class CommonAction extends Action{
  
  
     /**
     * 初始接口
     * @author shasha 2013-11-11
     */
  function _initialize() {
  
		// 用户权限检查
		if (C ( 'USER_AUTH_ON' ) && !in_array(MODULE_NAME,explode(',',C('NOT_AUTH_MODULE')))) {
			import ('ORG.Util.RBAC');
			if (! RBAC::AccessDecision ()) {
				//检查认证识别号
				if (! $_SESSION [C ( 'USER_AUTH_KEY' )]) {
					//跳转到认证网关
					redirect ( PHP_FILE . C ( 'USER_AUTH_GATEWAY' ) );
				}
					//var_dump($_SESSION [C ( 'USER_AUTH_KEY' )]);
				// 没有权限 抛出错误
				if (C ( 'RBAC_ERROR_PAGE' )) {
					// 定义权限错误页面
					redirect ( C ( 'RBAC_ERROR_PAGE' ) );
				} else {
					if (C ( 'GUEST_AUTH_ON' )) {
						$this->assign ( 'jumpUrl', PHP_FILE . C ( 'USER_AUTH_GATEWAY' ) );
					}
					// 提示错误信息
					$this->error ( L ('_VALID_ACCESS_') );
				}
			}
		}
	}

   
    /**
    //_initialize()方法是ThinkPHP提供的入口方法，类似于原PHP中__condition()构造函数。可以存放所有公用信息。
    Public  function _initialize(){
        //判断是否开启认证，并且当前模块需要验证
        if(C('USER_AUTH_ON')&&!in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE')))){
            //导入RBAC类，开始验证
            import('ORG.Util.RBAC');
            //通过accessDecision获取权限信息
            if(!RBAC::AccessDecision()){
                //没有获取到权限信息时需要执行的代码
                //1、用户没有登录
                if(!$_SESSION[C('USER_AUTH_KEY')]){
                    $url= U('Public/login');
                    $this->error("您还没有登录不能访问",$url);
                }
                $this->error("您没有操作权限");
            }
        }
    }
	
	 /**
      +----------------------------------------------------------
     * 验证token信息
      +----------------------------------------------------------
     */
    protected function checkToken() {
        if (IS_POST) {
            if (!M("Admin")->autoCheckToken($_POST)) {
			    header('Content-Type:application/json; charset=utf-8');
                die(json_encode(array('status' => 0, 'info' => '令牌验证失败,不允许重复提交')));
            }
            unset($_POST[C("TOKEN_NAME")]);
        }
    }
  
	 /**
     * 引入header文件
     * @author shasha 2013-11-01
     */
	Public function header () {
    $this->header = M('Cate')->select();
    $this->display();
    }
  
  
    /**
     * 引入left文件
     * @author shasha 2013-11-01
     */
	Public function left () {
    $this->left = M('Cate')->select();
    $this->display();
    }
	
	 /**
     * 引入footer文件
     * @author shasha 2013-11-01
     */
	Public function footer () {
    $this->footer = M('Cate')->select();
    $this->display();
    }
	
	
	/**
     * 头像上传
     * @author shasha 2013-11-08
     */
    protected function _upload() {
        import('@.ORG.UploadFile');
        //导入上传类
        $upload = new UploadFile();
        //设置上传文件大小
        $upload->maxSize            = 3292200;
        //设置上传文件类型
        $upload->allowExts          = explode(',', 'jpg,gif,png,jpeg');
        //设置附件上传目录
        $upload->savePath           = './Uploads/';
        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb              = true;
        // 设置引用图片类库包路径
        $upload->imageClassPath     = '@.ORG.Image';
        //设置需要生成缩略图的文件前缀
        $upload->thumbPrefix        = 'b_,m_,s_,l_';  //生产2张缩略图
        //设置缩略图最大宽度
        $upload->thumbMaxWidth      = '150,90,50,40';
        //设置缩略图最大高度
        $upload->thumbMaxHeight     = '150,90,50,40';
        //设置上传文件规则
        $upload->saveRule           = 'uniqid';
        //删除原图
        $upload->thumbRemoveOrigin  = true;
        if (!$upload->upload()) {
            //捕获上传异常
            $this->error($upload->getErrorMsg());
        } else {
            //取得成功上传的文件信息
            $uploadList = $upload->getUploadFileInfo();
            import('@.ORG.Image');
            //给m_缩略图添加水印, Image::water('原文件名','水印图片地址')
            Image::water($uploadList[0]['savepath'] . 'm_' . $uploadList[0]['savename'], APP_PATH.'Tpl/Public/Images/logo.png');
            $_POST['image'] = $uploadList[0]['savename'];
        }
        //$model  = M('Article');
        //保存当前数据对象
        // $data['image']          = $_POST['image'];
        //  $data['tj_time']    = time();
        //  $list   = $model->add($data);
        //  if ($list !== false) {
        //      $this->success('上传图片成功！');
        //  } else {
        //     $this->error('上传图片失败!');
        //  }
	  
	     $art =M('Article');
		  $data['image']= $_POST['image'];
		  $data['title']= $_POST['title'];
		  $data['content']= $_POST['content'];
		  $data['tag']= $_POST['tag'];
		  $data['uid']= $_SESSION['manager_id'];
		  $data['tj_time']    = time();
		  if ($art->add($data)){		   
		    $this->success('添加成功');
		   }else{		    
		    $this->error('添加失败');
		   }
    }
	
	
	
	
	
	 /**
     * 文件上传
     * @author shasha 2013-11-08
     */
    protected function _uploads(){
	    $ymd = date("Ymd");
        import('@.ORG.UploadFile'); //导入上传类
        $upload = new UploadFile();//设置上传文件大小
        $upload->maxSize            = 3292200;//设置上传文件类型
        $upload->allowExts          = explode(',', 'jpg,gif,png,jpeg');
        $upload->savePath           = './Uploads/file'; //设置附件上传目录
        $upload->thumb              = true;//是否开启缩略图       
		$upload->thumbPath          ='./Uploads/image/'.date("Ymd"). '/';// 缩略图保存路径
	    if (!file_exists($upload->thumbPath)) {
		mkdir($upload->thumbPath );
	    }//判断文件是否存在  不存在自动创建
        $upload->thumbFile          =  date("YmdHis") . '_' . rand(10000, 99999) . '.' . $upload->thumbExt;// 缩略图文件名
        $upload->imageClassPath     = '@.ORG.Image';// 设置引用图片类库包路径
        //$upload->thumbPrefix        = 'b_,m_';  //生产2张缩略图//设置需要生成缩略图的文件后缀      
        $upload->thumbMaxWidth      = '450'; //设置缩略图最大宽度       
        $upload->thumbMaxHeight     = '450';//设置缩略图最大高度       
        $upload->saveRule           = 'uniqid';//设置上传文件规则
        $upload->thumbRemoveOrigin  = true;   //删除原图
        if (!$upload->upload()) {
            //捕获上传异常
            $this->error($upload->getErrorMsg());
        } else {
            //取得成功上传的文件信息
            $uploadList = $upload->getUploadFileInfo();
            import('@.ORG.Image');
            //给m_缩略图添加水印, Image::water('原文件名','水印图片地址')
            Image::water($uploadList[0]['savepath'] . 'm_' . $uploadList[0]['savename'], APP_PATH.'Tpl/Public/Images/logo.png');
            $_POST['image'] = $uploadList[0]['savename'];
        }
		$fileUrl=$upload->thumbPath .$upload->thumbFile;

       //$model  = M('Article');
       //保存当前数据对象
       // $data['image']          = $_POST['image'];
       //  $data['tj_time']    = time();
       //  $list   = $model->add($data);
       //  if ($list !== false) {
       //      $this->success('上传图片成功！');
       //  } else {
       //     $this->error('上传图片失败!');
       //  }
	  
	  //  $art =M('Article');
		//  $data['image']= $_POST['image'];
		//  if ($art->add($data)){
		   
		//    $this->success('添加成功');
		//   }else{		    
		//    $this->error('添加失败');
		//   }
    }
	
	Public function verify(){
         import('ORG.Util.Image');
         Image::buildImageVerify(4,5,'png',100,40);
		 //Image::GBVerify();
    }
  
  
  }