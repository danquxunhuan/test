<?php
class ReviewAction extends PublicAction{
     public function index(){
	
	  $this->checkULogin();
      $m= D("Article");
	  $aid=trim($_GET['aid']);
	  //��������
      $info=$m->where("aid=".$aid)->find();
	  $data['click'] = $info['click'] + 1;
	  $m->where("aid=".$aid)->save($data);
      $this->assign("info",$info);
	  //���ַ�����ǩת��������
	  $tagInfo=array();
      $tagInfo=explode(',',$info['tag']);
	  //dump($tagInfo);
	  $tagCount=count($tagInfo);
	  //echo $tagCount;
	  $this->assign('tagCount',$tagCount);
	  $this->assign('tagInfo',$tagInfo);
	  //��Ա��Ϣ
	  $uid = $m->where('aid='.$aid)->getField('uid');
	  $tid = D('Member')->where('uid='.$uid)->getField('tid');
	  $uname = D('Member')->where('uid='.$uid)->getField('uname');
	  $this->assign('tid',$tid);
	  $this->assign('uname',$uname);
	  //�жϼҳ�����
	  if($tid == 2){
	    $userInfo= D('Member')->join("ms_teacher_info ON ms_member.uid = ms_teacher_info.uid where ms_member.uid = ms_teacher_info.uid and ms_member.uid = ".$uid."")->field('ms_member.uname,ms_teacher_info.*')->find();
	    $this->assign("userInfo",$userInfo);
	  }
	  //����ϲ��������
	  $tagLike=D('Article')->where("tag like '%" .$info['tag']."%' and aid <> ".$aid)->limit(3)->select();
	  $this->assign('tagLike',$tagLike);
	    //��������
		$hot=$m->order("rNum desc")->limit(3)->select();
       //$hot=$m->where("FIND_IN_SET( 'h', flag ) and status =1")->order("rNum desc")->limit(3)->select();
	   $this->assign("hot",$hot);  
		        /***************���۷�ҳ******************/
			            $count = D('Review')->where("pid =0 and aid=".$aid)->count();
                        import("ORG.Util.Page");       //�����ҳ��
                        $Page = new Page($count,20);
                        $showPage = $Page->show();
                        $this->assign("page", $showPage);
				  
				  
	    // ����id������ʾ10-�Ժ�����¼
        $list = D("Review")->join('ms_member on ms_review.uid = ms_member.uid')->where("ms_review.pid = 0 and ms_review.aid=".$aid)->order('ms_review.id desc')->limit($Page->firstRow .','.$Page->listRows)->field('ms_review.*,ms_member.uname,ms_member.uid')->select();
		$pid = array();
		$result = array(); //�������ת��$messages�õ�.��Ϊ����Ҫ��$messages��keyֵ���msgid
		foreach($list as $k=>$v){
		  $pid[] = $v['id'];
		  $result[$v['id']] = $v;
		 // $result[$v['msg']] = $v['msg'];
		}
		unset($list);
		
		//��ҳ��ʾ�ӵ�ʮ����ʾ
	    $listR = D("Review")->join('ms_member on ms_review.uid = ms_member.uid')->where("ms_review.pid in (".implode(',',$pid).") and ms_review.aid=".$aid)->order('ms_review.id desc')->field('ms_review.*,ms_member.uname,ms_member.uid')->select();
		foreach( $listR as $key => $value){
        $result[$value['pid']]['listR'][] = $value;
		$result[$value['pid']]['countPid'] = count($result[$value['pid']]['listR']);
        }
		//dump($result);
		$this->assign("listR",$result);
        //��������
        $hotR=D('Index')->hotR();
	    $this->assign("hotR",$hotR);		
        //��ǩ��ѯ
		$tags=D("Tags")->where("FIND_IN_SET( 'h', flag )")->select();
		$this->assign('tags',$tags);		
	    $this->display();
       }
	   
}	   
?>