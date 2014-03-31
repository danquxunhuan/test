<?php
	class ArticleAction extends PublicAction{
		
			//赞 
			public function add_zan(){
				$action = $_GET['action'];
				$data['uid'] = intval($_SESSION['ms_user_id']);
				$data['updown']=0;
				$zan = M("zan");
				if($action == "article"){
					$data['aid'] = intval($_GET['aid']);
					$find = $zan->where($data)->find();
					if(!empty($find)){
						echo"已踩不赞";
					}else{
						$data['updown']=1;
						$find = $zan->where($data)->find();
						if(!empty($find)){
							echo"已赞";
						}else{
							$data['zan_time'] = time();
							$rs = $zan->add($data);
							$article = M("Article");
							$article->where("aid=".$data['aid'])->setInc("up",1);
							$rs1 = $article->where("aid=".$data['aid'])->getField("up");
							echo "$rs1";
						}
					}
				}elseif ($action == "review")
				{
					$data["rid"] = $_GET["rid"];
					$find = $zan->where($data)->find();
					if(!empty($find)){
						echo"已踩不赞";
					}else{
						$data['updown']=1;
						$find = $zan->where($data)->find();
						if(!empty($find)){
							echo "已赞";
						}else{
							$data['zan_time'] = time();
							$rs = $zan->add($data);
							$review = M("Review");
							$review->where("id=".$data['rid'])->setInc("up",1);
							$rs1 = $review->where("id=".$data['rid'])->getField("up");
							echo "$rs1";
						}
					}
				}
			}
			
			//踩
			public function add_cai(){
				$action = $_GET['action'];
				$data['uid'] = intval($_SESSION['ms_user_id']);
				$data['updown']=1;//1为赞0为踩 这里是为了判断是否赞过故为1
				$zan = M("zan");
				if($action == "article"){
					$data['aid'] = intval($_GET['aid']);
					$find = $zan->where($data)->find();
					if(!empty($find)){
						echo"已赞不踩";
					}else{
						$data['updown']=0;
						$find = $zan->where($data)->find();
						if(!empty($find)){
							echo"已踩";
						}else{
							$data['zan_time'] = time();
							$rs = $zan->add($data);
							$article = M("Article");
							$article->where("aid=".$data['aid'])->setInc("down",1);
							$rs1 = $article->where("aid=".$data['aid'])->getField("down");
							echo "$rs1";
						}
					}
				}elseif ($action == "review")
				{
					$data["rid"] = $_GET["rid"];
					$find=$zan->where($data)->find();
					if(!empty($find)){
						echo"已赞不踩";
					}else{//如果没有赞过则继续
						$data['updown']=0;
						$find = $zan->where($data)->find();
						if(!empty($find)){
							echo"已踩";
						}else{
							$data['zan_time'] = time();
							$rs = $zan->add($data);
							$review = M("Review");
							$review->where("id=".$data['rid'])->setInc("down",1);
							$rs1 = $review->where("id=".$data['rid'])->getField("down");
							echo "$rs1";
						}
					}
				}
			}
			//收藏  
			public function add_favorite(){
				$data['aid'] = $_GET['aid'];
				$data['userid'] = $_SESSION['ms_user_id'];
				$favorite = M('Favorite');
				$find = $favorite->where($data)->find();
				if(!empty($find)){
					echo"已收藏";
				}else{
					$data['title'] = $_GET['title'];
					$data['adddate'] = time();
					$data['url'] = $_GET['url'];
					$rs = $favorite->add($data);
					if(!empty($rs)){//写入收藏表 成功则写入文章字段
						$article = M('Article');
						$rs1 = $article->where("aid=".$data['aid'])->setInc("fNum",1);
						if(!empty($rs1)){//如果写入文章表字段成功则返回 msg
							echo"已收藏";
						}
					}
				}
			}
		
		
		

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}
?>