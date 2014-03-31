<?php

class ArticleModel extends Model {
/*
* 新闻列表（wyj）
*/
public function listArticle($firstRow = 0, $listRows = 20) {
	$M = M("Article");
	//读取文章作者信息——前台用户发布新闻
	$sql = "SELECT a.aid,a.title,b.uname,a.ishid,a.contact,a.status,a.create_time,a.up_time FROM ms_article as a LEFT JOIN ms_member as b ON a.uid=b.uid ORDER BY a.status ASC,a.aid desc LIMIT ".$firstRow.",".$listRows;
	$list['qian'] = M()->query($sql);
	return $list;
}
	
	
	public function category() {
        if (IS_POST) {
            $act = $_POST[act];
            $data = $_POST['data'];
            $data['name'] = addslashes($data['name']);
            $M = D("Category");
            if ($act == "add") { //添加分类
                unset($data[cid]);
                if ($M->where($data)->count() == 0) {
                    return ($M->add($data)) ? array('status' => 1, 'info' => '分类 ' . $data['name'] . ' 已经成功添加到系统中', 'url' => U('Article/category', array('time' => time()))) : array('status' => 0, 'info' => '分类 ' . $data['name'] . ' 添加失败');
                } else {
                    return array('status' => 0, 'info' => '系统中已经存在分类' . $data['name']);
                }
            } else if ($act == "edit") { //修改分类
                if (empty($data['name'])) {
                    unset($data['name']);
                }
                if ($data['pid'] == $data['cid']) {
                    unset($data['pid']);
                }
                return ($M->save($data)) ? array('status' => 1, 'info' => '分类 ' . $data['name'] . ' 已经成功更新', 'url' => U('Article/category', array('time' => time()))) : array('status' => 0, 'info' => '分类 ' . $data['name'] . ' 更新失败');
            } else if ($act == "del") { //删除分类
                unset($data['pid'], $data['name']);
                return ($M->where($data)->delete()) ? array('status' => 1, 'info' => '分类 ' . $data['name'] . ' 已经成功删除', 'url' => U('Article/category', array('time' => time()))) : array('status' => 0, 'info' => '分类 ' . $data['name'] . ' 删除失败');
            }
        } else {
            import("@.ORG.Category");
            $cat = new Category('Category', array('cid', 'pid', 'name', 'fullname'));
            return $cat->getList();               //获取分类结构
        }
    }
	
/*
* 后台发布新闻
*/
public function addArticle() {
	$M = D("Article");
	$data = $_POST['info'];	
	$data['create_time'] = time();
	if(!empty($_POST['info']["flag"])){
		$flag = str_replace('，',',',$_POST['info']["flag"]);
		for($i=0;$i<count($flag);$i++){
			$arr[]=$flag[$i];
		}
	}
	$data['flag']=implode(',' ,$arr);//数组转化成字符串
	$data['content']=stripslashes($_POST['info']['content']);
	if (!empty($_FILES)) {
		//如果有文件上传 上传附件
		$imageInfo = $this->_uploads();
		var_dump($imageInfo);
	}
	//后台管理员可以指定文章作者
	if($data['uid']){ //指定文章作者
	}else{ //未指定-游客
		$data['uid'] = 0;
	}
	//如果摘要没有，截取内容前200字充当
	if (empty($data['summary'])) {
		$data['summary'] = substr($data['content'], 200);
	}
	
	echo '<hr />';
	var_dump($data);
	
	if ($M->add($data)) {
		return true;
	} else {
		return false;
	}
	
	/*if ($M->add($data)) {
		return array('status' => 1, 'info' => "已经发布",'url' => U('Article/index'));
	} else {
		return array('status' => 0, 'info' => "发布失败，请刷新页面尝试操作");
	}*/
}
	
/**
* 文件上传
*/
Public function _upload(){
	import('ORG.Net.UploadFile');
	$upload = new UploadFile();// 实例化上传类
	$upload->maxSize  = 102400 ;// 设置附件上传大小
	$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	$upload->savePath =  './Uploads/thumb/';// 设置附件上传目录
	if(!$upload->upload()) {// 上传错误提示错误信息
		$this->error($upload->getErrorMsg());
	}else{// 上传成功 获取上传文件信息
		$info =  $upload->getUploadFileInfo();
	}
	//返回附件信息
	return $info;
}
	 
    protected function __shasha_uploads() {
        import('@.ORG.Net.UploadFile');
        //导入上传类
        $upload = new UploadFile();
        //设置上传文件大小
        $upload->maxSize            = 102400;
        //设置上传文件类型
        $upload->allowExts          = array('jpg', 'gif', 'png', 'jpeg');
        //设置附件上传目录
        $upload->savePath           = './Uploads/thumb';
        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb              = true;
        // 设置引用图片类库包路径
        $upload->imageClassPath     = '@.ORG.Image';
        //设置需要生成缩略图的文件后缀
        $upload->thumbPrefix        = 'b_,m_';  //生产2张缩略图
        //设置缩略图最大宽度
        $upload->thumbMaxWidth      = '450,90';
        //设置缩略图最大高度
        $upload->thumbMaxHeight     = '450,90';
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
		 if ($art->add($data)){
		    $this->success('添加成功');
		 }else{		    
		    $this->error('添加失败');
		 }
    }  

/*
* 后台发布新闻
*/
public function edit() {
	$M = M("Article");
	$datas = $_POST['info'];
	$datas['up_time'] = time();
	$datas['content']=stripslashes($_POST['info']['content']);
	if(!empty($_POST['info']["flag"])){
		$flag = str_replace('，',',',$_POST['info']["flag"]);
		for($i=0;$i<count($flag);$i++){
			$arr[]=$flag[$i];
		}
	}
	$datas['flag']=implode(',' ,$arr);//数组转化成字符串
	if ($M->save($datas)) {
		return array('status' => 1, 'info' => "已经更新",'url' => U('Article/index'));
	} else {
		return array('status' => 0, 'info' => "更新失败，请刷新页面尝试操作");
	}
}





   }

?>
