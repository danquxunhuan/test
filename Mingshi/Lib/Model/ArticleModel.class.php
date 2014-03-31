<?php



  class ArticleModel extends Model{

	   /*
	   *今日头条
	   */
	   public function top(){
	     $top=D('Article')->join("ms_member ON ms_article.uid=ms_member.uid where ms_article.uid=ms_member.uid and  FIND_IN_SET( 't', flag ) and ms_article.status=1 and ms_article.cid = 4")->order('ms_article.up_time desc')->limit(5)->field('ms_member.uname,ms_member.uid,ms_article.*')->select();
         $rnum = D('Review')->where('pid = 0 and aid = '.$top['aid'])->count();
		 $top['rnum'] = $rnum;
		 return $top;
	   }

/*
*投稿
*/
public function addArticle() {
	$M = D("Article");
	$data = $_POST['info'];	
	$data['create_time'] = time();
	
	/*if(!empty($_POST['info']["flag"])){
		for($i=0;$i<count($_POST['info']['flag']);$i++){
			$arr[]=$_POST["info"]["flag"][$i];
		}
		$data['flag']=implode(',' ,$arr);//数组转化成字符串
	}*/
	$data['content']=stripslashes($_POST['info']['content']);
	if(!empty($_FILES)) {
		//如果有文件上传 上传附件
		$this->_uploads();
	}
	if($_SESSION['ms_user_id']){
		$data['uid'] = $_SESSION['ms_user_id'];
	}else{ //游客
		$data['uid'] = 0;
	}
	if (empty($data['summary'])) {
		$data['summary'] = msubstr($data['content'],200);
	}
	if ($M->add($data)) {
		return array('status' => 1, 'info' => "已经发布,请等待审核", 'url' => U('Index/index'));
	} else {
		return array('status' => 0, 'info' => "发布失败，请刷新页面尝试操作");
	}
}
  

		/*
		* 热门文章
		*/
		public function hotArticle(){
			//评论最多的
			//要有个评论数 	标题	时间	作者
			$hot=array();		//大数组
			$num = 3;			//遍历出来的文章条数
			//先确定评论最多的几个的aid
			$sql = "select aid,count(*) as rNum from ms_review where pid = 0 group by aid 
					order by rNum desc limit 0,{$num};";
			$rs1 = $this->query($sql);
			$hot = $rs1;
				//查文章标题 时间和作者id
				$sql="select a.uid,a.title,a.create_time,m.uname from ms_article as a ";
				$sql.="left join ms_member as m on a.uid = m.uid ";
				$sql.="where a.aid={$hot[0]['aid']} or a.aid={$hot[1]['aid']} or a.aid={$hot[2]['aid']};";
				$rs2 = $this->query($sql);
				for($i=0;$i<$num;$i++){
				//格式化时间
					$rs2[$i]["create_time"] = date("Y-m-d",$rs2[$i]["create_time"]);
				//放入大数组
					$hot[$i]['uid'] = $rs2[$i]['uid'];
					$hot[$i]['title'] = $rs2[$i]['title'];
					$hot[$i]['create_time'] = $rs2[$i]['create_time'];
					$hot[$i]['uname'] = $rs2[$i]['uname'];
				}
			return $hot;
		}
		
  }