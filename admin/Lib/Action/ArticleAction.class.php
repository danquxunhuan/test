<?php

class ArticleAction extends CommonAction{
  
/*
* 文章列表
*/
public function index() {
	$M = M("Article");
	$count = $M->count();
	import("ORG.Util.Page");       //载入分页类
	$page = new Page($count, 13);
	$showPage = $page->show();
	$this->assign("page", $showPage); //分页
	
	$list = D("Article")->listArticle($page->firstRow, $page->listRows);
	$this->assign("list",$list);
	$this->display();
}


    public function category() {
        if (IS_POST) {
			header('Content-Type:application/json; charset=utf-8');
            echo json_encode(D("Article")->category());
        } else {
            $this->assign("list", D("Article")->category());
            $this->display();
        }
    }
		
/*
* 后台添加文章
*/
public function add() {
	$obj = D('Article');
	//判断是否是表单数据
	if(IS_POST){
		//获取表单数据并添加
		extract($_POST);
		//上传图片的话，图片的验证
		if(!empty($_FILES['firstimage']['name'])){
			//图片上传类
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 102400 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Uploads/article/';// 设置附件上传目录
			if(!$upload->upload()) {// 上传错误提示错误信息
				$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
				$info = $upload->getUploadFileInfo();
			}
			$data['firstimage'] = $info[0]['savename'];//图片的
		}		
		//表单其他项数据整理
		$data['title'] = $title; 
		$data['status'] = $status;
		$data['cid'] = $cid;
		$data['click'] = $click;
		$data['tag'] = $tag;
		$data['keywords'] = $keywords;
		$data['description'] = $description;
		$data['summary'] = $summary;
		$data['content'] = $content;
		$data['create_time'] = time();
		$data['up_time'] = time();
		//后台管理员可以指定文章作者
		if($uid){ //指定文章作者
			$data['uid'] = $uid;
		}else{ //未指定-游客
			$data['uid'] = 0;
		}
		$flag = implode(',',$flag);
		$data['flag'] = $flag;
		
		$artId = $obj->data($data)->add();
		if($artId){
			$this->success('添加成功！');
			exit;
		}else{  
			$this->error('发布失败，请稍后重试！');
		}
	}else{
		//获取文章分类信息
		$list = M('Category')->select();
		$this->assign('list',$list);
		$this->display(); 
	}
}


/*
* 后台添加文章——检查文章标题是否重复
*/
public function checkArticleTitle() {
	$M = M("Article");
	$where = "title='" . $this->_get('title') . "'";
	if (!empty($_GET['aid'])) {
		$where.=" And aid !=" . (int) $_GET['aid'];
	}
	if ($M->where($where)->count() > 0) {
		header('Content-Type:application/json; charset=utf-8');
		echo json_encode(array("status" => 0, "info" => "已经存在，请修改标题"));
	} else {
		header('Content-Type:application/json; charset=utf-8');
		echo json_encode(array("status" => 1, "info" => "可以使用"));
	}
}


/*
* 后台添加文章——检查指定作者(通过审核的老师)是否存在
*/
public function checkUid() {
	$M = M("Member");
	$where = "status=1 and uid='" . $this->_get('uid') . "'";
	$uname = $M->where($where)->getField('uname');
	//var_dump($uname);
	//die();
	if ($uname) {
		header('Content-Type:application/json; charset=utf-8');
		echo json_encode(array("status" => 1, "info" => $uname));
	} else {
		header('Content-Type:application/json; charset=utf-8');
		echo json_encode(array("status" => 0, "info" => "不存在该会员"));
	}
}




	public function  checkImg(){
	    //有上传文件时
        if (empty($_FILES) === false) {
	             $this->_uploads();
				 $vo['image']=$fileUrl;
		         $this->ajaxReturn($vo, '上传成功！', 1);
	   }
	}

/*
* 后台编辑文章(wyj)
*/
public function edit() {
	$M = M("Article");
	if (IS_POST) {
		/*$this->checkToken();
		header('Content-Type:application/json; charset=utf-8');
		echo json_encode(D("Article")->edit());*/
		//获取表单数据并添加
		extract($_POST);
		//上传图片的话，图片的验证
		if(!empty($_FILES['firstimage']['name'])){
			//图片上传类
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 102400 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Uploads/article/';// 设置附件上传目录
			if(!$upload->upload()) {// 上传错误提示错误信息
				$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
				$info = $upload->getUploadFileInfo();
			}
			$data['firstimage'] = $info[0]['savename'];//图片的
		}		
		//表单其他项数据整理
		$data['title'] = $title; 
		$data['status'] = $status;
		$data['cid'] = $cid;
		$data['click'] = $click;
		$data['tag'] = $tag;
		$data['keywords'] = $keywords;
		$data['description'] = $description;
		$data['summary'] = $summary;
		$data['content'] = $content;
		$data['up_time'] = time();
		//后台管理员可以指定文章作者
		if($uid){ //指定文章作者
			$data['uid'] = $uid;
		}else{ //未指定-游客
			$data['uid'] = 0;
		}
		$flag = implode(',',$flag);
		$data['flag'] = $flag;
		//$data['aid'] = $aid;
		
		$artId = $M->where('aid='.$aid)->save($data);
		if($artId){
			$this->success('编辑成功！',U('Article/index'));
			exit;
		}else{  
			$this->error('编辑失败，请稍后重试！');
		}

	} else {
		$info = $M->where("aid=" . (int) $_GET['aid'])->find();
		if ($info['aid'] == '') {
			$this->error("不存在该记录");
		}
		$this->assign("info", $info);
		$this->assign("list", D("Article")->category());
		$this->display();
	}
}


    public function del() {
        if (M("Article")->where("aid=" . (int) $_GET['id'])->delete()) {
            $msg=1;
            //$this->success("成功删除");
//           echo json_encode(array("status"=>1,"info"=>""));
        } else {
            // $this->error("删除失败，可能是不存在该ID的记录");
            $msg=0;
        }
        echo json_encode($msg);
    }
	
	
//上传头像美图秀秀
    public function mei(){
        $this->display();
    }
    //得到一个数据库中不存在的记录了
    public function check($save_path){
        $uniqid = uniqid();
        //判断数据库中是否已经有此记录了
        $mem = M('Article');
        $filename = substr($save_path . '/' . $uniqid . '.jpg',25);
        $n = $mem->where(array('avatar'=>$filename))->count();
        if($n != false){
            return $this->check($save_path);
        }else{
            return $filename;
        }
    }
	
	
    //上传到空间
    public function meichuan(){
            $post_input = 'php://input';
            $save_path = '__APP__/Public/uploads/avatars/'.date('Ymd',time());    //定义一个要上传头像的目录
            is_dir($save_path) || mkdir($save_path);    //如果没有这么目录,那么就创建这个目录
            $postdata = file_get_contents( $post_input );
            if ( isset( $postdata ) && strlen( $postdata ) > 0 ) {
                $filename = $this->check($save_path);
                $picname = substr($save_path,0,25).$filename;
                $handle = fopen( $picname, 'w+' );
                fwrite( $handle, $postdata );
                fclose( $handle );
                if ( is_file( $picname ) ) {
                    //$mem = M('Article');
                    //删除原先的头像图片
                    //$ava = $mem->where(array('uid'=>$_SESSION['uid']))->getField('avatar');
                    //$oldavapath = substr($save_path,0,25).$ava;
                   // if(($ava!=false)&&(is_file($oldavapath))) unlink($oldavapath);
                    //$data['avatar'] = $filename;
                    //$mem->where(array('aid'=>$_POST('aid')))->save($data);
                    echo '上传头像成功!';
                    exit ();
                }else {
                    die ( '上传头像失败!' );
                }
            }else {
                die ( '没有图片信息!' );
            }
    }
  
  
  /****************************以下后期需删除*******************************/
  
	
	/**
     * 文章列表
     * @author shasha 2013-11-04
     */
	public  function article_list(){
	//$this->checkUser();
    import('ORG.Util.Page');// 导入分页类
	$art= M("Article");
	$count = $art->count();//计算总数
	//print_r($count);
	$Page   = new Page($count,10);// 实例化分页类 传入总记录数
    // 进行分页数据查询
    $list = $art->limit($Page->firstRow . ',' . $Page->listRows)->order('aid desc')->select();
	
	 // 模拟设置分页额外传入的参数
        $Page->parameter    =   'search=key&name=thinkphp';
	// 设置分页显示
        $Page->setConfig('header', '条数据');
        $Page->setConfig('first', '<<');
        $Page->setConfig('last', '>>');
        $page = $Page->show();
	//	var_dump($page);
        $this->assign("page", $page);
        $this->assign('article_list',$list);// 赋值数据集
        $this->display();
	}
	
	/**
     * 显示增加文章
     * @author shasha 2013-11-4
     */
	public  function html_article(){
	  //$this->checkUser();
	   $aid=$_GET["aid"];
        //显示上传图片
        $Photo  =   M('Article');
        $data   =   $Photo->where("aid=".$aid."")->order('create_time desc')->find();
		
        $this->assign('data', $data);
        $this->display();
	}
	
	
	/**
     * 显示修改文章
     * @author shasha 2013-11-7
     */
	public  function save_article(){
	 // $this->checkUser();
	  $aid=$_GET["aid"];
	  $save=M("Article");
	  $Article=$save->where("aid=".$aid)->select();
	  $this->assign("Article",$Article);
	  $this->display();
	}
	
	
	
	/**
     * 增加文章
     * @author shasha 2013-11-4
     */
	public function add_article(){
	     // $this->checkUser();
	     
		  var_dump($_POST);
		// if (!empty($_FILES)) {
            //如果有文件上传 上传附件
         //   $this->_uploads();
       // }
		
		//有上传文件时
if (empty($_FILES) === false) {

	//创建文件夹
	if ($dir_name !== '') {
		$save_path .= $dir_name . "/";
		$save_url .= $dir_name . "/";
		if (!file_exists($save_path)) {
			mkdir($save_path);
		}
	}
	$ymd = date("Ymd");
	$save_path .= $ymd . "/";
	$save_url .= $ymd . "/";
	if (!file_exists($save_path)) {
		mkdir($save_path);
	}
	//新文件名
	$new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
	//移动文件
	$file_path = $save_path . $new_file_name;
	if (move_uploaded_file($tmp_name, $file_path) === false) {
		//alert("上传文件失败。");
	}
	@chmod($file_path, 0644);
	$file_url = $save_url . $new_file_name;

	 $this->_uploads();
	exit;
}
		   
	}
	
	
	/**
     * 增加文章
     * @author shasha 2013-11-4
     */
	public function add_image(){
	     // $this->checkUser();
	     
		  var_dump($_POST);
		 if (!empty($_FILES)) {
            //如果有文件上传 上传附件
            $this->_uploads();
        }
		   
	}
	
	
	/**
     * 修改文章
     * @author shasha 2013-11-7
     */
	 
	 
	public function sv_article(){
	   //$this->checkUser();
	   $art=D("Article");
	   $aid= $_POST["aid"];
	   $data["tag"]=$_POST["tag"];
	   $data["catid"]=$_POST["catid"];
	   $data["title"] = $_POST["title"];
	   $data["content"] = $_POST["content"];
	   $data["time"] = time();
	   if (!empty($_FILES)) {
            //如果有文件上传 上传附件
            $this->_upload();
        }
		var_dump($data);
	   $Article=$art->where("aid=" .$aid."")->data($data)->save();
	   if($Article){   
	    $this->success("修改成功");
	   }else{
	    $this->error($art->getError());
	   }
	} 
  
    
	
	/**
     * 删除文章
     * @author shasha 2013-11-04
     */
    public  function del_article(){
	//$this->checkUser();
	$art= D("Article");
	$aid=trim($_GET['aid']);
	if($art->where("aid=".$aid."")->delete()){
	$this->success("删除成功");
	}else{
	$this->error("删除失败");
	}	
    }
  
  }



?>