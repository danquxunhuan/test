<?php
 class RyzsAction extends Action{
	//荣誉证书
	public  function index(){
		   
    }
	 
	public function add_ryzs(){
	  $data['image'] =$_POST['image'];
	  $data['create_time']=time();
	  $data['uid'] = $_SESSION['ms_user_id'];
	  if($data['uid']){
	    $info = D('Ryzs')->add($data);
		if($info){
		  $vo['id'] = M('Ryzs')->where('uid = '.$data['uid'])->order('id desc')->getField('id');
		  $vo['company'] = $data['company'];
		  $this->ajaxReturn($vo, '评论成功！', 1);
		}else{
		  $this->error('no ok');
		}
	  }
	
	}
	
    public function del_ryzs(){
		 $data['id']  = $_POST['id'];
		  if($data['id']){
		   $delok =D('Ryzs')->where('id = '.$data['id'])->delete();
		   if($delok){
		     $this->ajaxReturn('','ok',1);
		   }else{
		     $this->error('no');
		   }
		  }
		
		}
	
    public function edit_ryzs(){
	
	
	
	
	}
	
	public function upload() {
        if (!empty($_FILES)) {
            //如果有文件上传 上传附件
            $this->_upload();
        }else{
		 $this->error('没有上传文件00');
		}
    }
	

	 
	 public function _upload(){
        import('@.ORG.UploadFile');
        //导入上传类
        $upload = new UploadFile();
        //设置上传文件大小
        $upload->maxSize            = 3292200;
        //设置上传文件类型
        $upload->allowExts          = explode(',', 'jpg,gif,png,jpeg');
        //设置附件上传目录
        $upload->savePath           = './Uploads/images';
	
        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb              = true;
        // 设置引用图片类库包路径
        $upload->imageClassPath     = '@.ORG.Image';
        //设置需要生成缩略图的文件后缀
        $upload->thumbPrefix        = 'm_,s_';  //生产2张缩略图
        //设置缩略图最大宽度
        $upload->thumbMaxWidth      = '400,100';
        //设置缩略图最大高度
        $upload->thumbMaxHeight     = '400,100';
        //设置上传文件规则
        $upload->saveRule           = 'uniqid';
        //删除原图
        $upload->thumbRemoveOrigin  = true;
        if(!$upload->upload()) {
            //捕获上传异常
            $this->error($upload->getErrorMsg());
        }else {
            //取得成功上传的文件信息
            $uploadList = $upload->getUploadFileInfo();
            import('@.ORG.Image');
            //给m_缩略图添加水印, Image::water('原文件名','水印图片地址')
            Image::water($uploadList[0]['savepath'] . 'm_' . $uploadList[0]['savename'], APP_PATH.'Tpl/Public/Images/logo.png');
            $_POST['image'] = $uploadList[0]['savename'];
        }

    $U = M("Ryzs"); // 实例化User对象
    $data['image']=$_POST['image'];
	$data['create_time'] = time();
	$data['uid'] = $_SESSION['ms_user_id'];
    //$User->photo = $info[0]['savename']; // 保存上传的照片根据需要自行组装
    $U->add($data); // 写入用户数据到数据库
    $this->success('数据保存成功！');
		 //$vo['id'] = M('Ryzs')->where('uid = '.$data['uid'])->order('id desc')->getField('id');
		 //$vo['image'] = $info;
		//$this->ajaxReturn($vo, '评论成功！', 1);
	 
	 
   }
   
   
   


}









?>