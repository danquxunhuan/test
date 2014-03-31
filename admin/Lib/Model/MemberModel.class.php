<?php


   class  MemberModel extends Model{
   
       /**
      +----------------------------------------------------------
     * 会员列表
      +----------------------------------------------------------
     */
    public function memberList() {
        $list = M("Member")->select();
        foreach ($list as $k => $v) {
            $list[$k]['statusTxt'] = $v['status'] == 1 ? "启用" : "禁用";
			$list[$k]['type'] = $v['tid'] == 1 ? "家长" : "教师";
        }
        return $list;
    }
	
	 /**
      +----------------------------------------------------------
     * 添加会员
      +----------------------------------------------------------
     */
	
	  public function addMember() {
        if (!isset($_POST['uname'])) {
            return array('status' => 0, 'info' => "用户名不能为空");
        }
        $datas = array();
        $M = M("Member");
        $datas['uname'] = trim($_POST['uname']);
        if ($M->where("uname='" . $datas['uname'] . "'")->count() > 0) {
            return array('status' => 0, 'info' => "已经存在该账号");
        }
        $datas['password'] = md5(trim($_POST['password']));
        $datas['regdate'] = time();
		$datas['tid']=trim($_POST['tid']);
		$datas['classid']=trim($_POST['classid']);
		$datas['rankid']=trim($_POST['rankid']);
		$datas['obj_id']=trim($_POST['obj_id']);
		$datas['coin']=trim($_POST['coin']);
        if ($M->add($datas)) {
            if (C("SYSTEM_EMAIL")) {
                $body = "你的账号已开通，登录地址：" . C('WEB_ROOT') . U("Public/index") . "<br/>登录账号是：" . $datas["email"] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;登录密码是：" . $_POST['password'];
                $info = send_mail($datas["email"], "", "开通账号", $body) ? "添加新账号成功并已发送账号开通通知邮件" : "添加新账号成功但发送账号开通通知邮件失败";
            } else {
                $info = "账号已开通，请通知相关人员";
            }
            return array('status' => 1, 'info' => $info, 'url' => U("Member/index"));
        } else {
            return array('status' => 0, 'info' => "添加新账号失败，请重试");
        }
    }
	
	
	
    /**
      +----------------------------------------------------------
     * 编辑会员
      +----------------------------------------------------------
     */
    public function editMember() {
        $M = M("Member");
        if (!empty($_POST['password'])) {
            $_POST['password'] = md5(trim($_POST['password']));
        } else {
            unset($_POST['password']);
        }
        $user_id = trim($_POST['uid']);
        if ($M->save($_POST)) {
//            , 'url' => U("Access/index")
            return $roleStatus == TRUE ? array('status' => 1, 'info' => "成功更新") : array('status' => 1, 'info' => "成功更新", 'url' => U("Member/index"));
        } else {
            return $roleStatus == TRUE ? array('status' => 1, 'info' => "更新失败，但更改用户所属组更新成功") : array('status' => 0, 'info' => "更新失败，请重试");
        }
    }
	
	 /**
      +----------------------------------------------------------
      * 教师评分信息平均分(wyj)
      +----------------------------------------------------------
    */
	 public function review($uid){
	     //$uid = isset($_GET['uid']) ? $_GET['uid'] : $uid; //(wyj)
	     $pingfen = D('Member')->join('ms_reviewinfo on ms_member.uid = ms_reviewinfo.perid')->where('ms_member.uid = ' .$uid)->field('ms_member.uname,avg(ms_reviewinfo.scores) as pscores')->find();
		 return $pingfen;
	 }   
   
   
   }