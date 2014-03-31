<?php
/*
* 活动日历
*/
class ActiveModel extends Model{
	/*
	* 添加活动
	*/ 
	    public function addActive() {
        $M = D("Active");
		$data['active_name'] = trim($_POST['active_name']);//活动主题
		$data['sponsor'] = trim($_POST['sponsor']);//主办方
		$data['area'] = trim($_POST['area']);//活动地点
		$data['link']=trim($_POST['link']);//活动链接
		$data['introduce']=stripslashes($_POST['introduce']);//活动介绍
        $data['start_time'] = trim($_POST['start_time']);//开始时间
		$data['end_time'] = trim($_POST['end_time']);//结束时间
		$data['superman']=trim($_POST['superman']);//重要嘉宾
         if($_SESSION['ms_user_id']){
		   $data['uid'] = $_SESSION['ms_user_id'];
		 }else{
		   $data['uid'] = 0;
		 }
		 
        if ($M->add($data)) {
			return array('status' => 1, 'info' => "已经发布,请等待审核", 'url'=>U("Index/index"));
        } else {
			return array('status' => 0, 'info' => "发布失败，请刷新页面尝试操作");
        }
    }
  
		//热门文章
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
		
		

		//精彩点评
		public function wonderfulComments(){
			//要查的内容：评论内容 多出省略	评论人 评论人照片 评论人详细信息	  原文标题
			//用联合查询join即可
			$sql = "select r.id,r.username,r.msg,a.title from ms_review as r ";
			$sql .= "left join ms_article as a on a.aid=r.aid ";
			$sql .= "where recommend = '1' order by pl_time desc limit 0,2;";
			$rs = $this->query($sql);
			return $rs;
		}
		
			//最新文章
		public function newArticle(){
				//最新发布的文章
				//需要查出文章 作者 评论数
				//按照更新时间排序
				$article = M("Article");
				$rs = $article->join("ms_member on ms_article.uid = ms_member.uid")->field('aid,ms_article.uid,uname,title,content,tag,summary,click,ms_article.create_time,up,down')->limit('3')->select();
				//var_dump($rs);
				$review=M("Review");
				$rs1=$review->where("aid=".$rs[0]['aid'].' or aid='.$rs[1]['aid'].' or aid='.$rs[2]['aid'])->count('*');
				//var_dump($rs1);
				//暂时先不查了
				return $rs;
		}
		//文章详情页-文章内容
		public function articleDetail($aid){
				$article = M('Article');
				//点击次数
				$article->where("aid=".$aid)->setInc("click",1);
				//查询到文章内容和作者信息 还缺少评论数
				$rs1 = $article->join('ms_member on ms_article.uid= ms_member.uid')->where('aid='.$aid)->field("aid,ms_member.uname,title,content,tag,ms_article.fNum,ms_article.up,ms_article.down,ms_article.create_time,click")->find();
				//查询评论数
				$review=M('Review');
				$rs2=$review->where("aid=".$aid." and pid = 0")->count("*");
				//组装成大数组
				$rs = $rs1;
				$rs['rNum'] = $rs2;
				return $rs;
			}
		//显示文章评论内容
			//我自己都快看不懂了。。。。。
		public function showArticleReview($aid){
				$r=D("Review");
				// 按照id排序显示前10条记录
				$review = $r->where("aid=".$aid." and pid=0")->order('pl_time desc')->limit(10)->select();
				//print_r($review);
				$len = count($review);
				for($i=0;$i<$len;$i++){
					//时间格式化一下
					$date = date('Y-m-d H:i:s',$review[$i]['pl_time']);
					$review[$i]["pl_time"] =$date;
					$comment = $r->where("pid=".$review[$i]["id"])->order('pl_time desc')->select();
					$review[$i]["comment"] = $comment;
				}
				return $review;
			}
		//投稿
		public function contribute($title,$content){
				$sql="insert into ms_article(title,content) values('{$title}','{$content}');";
				return $this->execute($sql);
			}
		
		
		
		
		
		
		
		
		
		
  
  
  }