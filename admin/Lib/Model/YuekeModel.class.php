<?php
    class YuekeModel extends Model{
  
    /**
      +----------------------------------------------------------
     * 约课列表（wyj）
      +----------------------------------------------------------
    */
    public function yuekeList() {
        $list = M("Yueke")->order('status asc,ip asc,create_time desc')->select();		
		//取老师姓名与家长姓名
		foreach($list as $key=>$row){
			//取家长姓名信息
			$sql1="select uname from ms_member where uid = ".$row['uid'];
			$jzName = M()->query($sql1);
			$list[$key]['jzName'] = isset($jzName[0]['uname'])?$jzName[0]['uname']:'<span style="color:#6800C9;">游客</span>';
			//取老师姓名信息
			$sql2="select uname from ms_member where uid = ".$row['tid'];
			$lsName = M()->query($sql2);
			$list[$key]['lsName'] = isset($lsName[0]['uname'])?$lsName[0]['uname']:'<span style="color:#6800C9;">未指定</span>';
		}
		//echo '<pre>';
		//var_dump($list);
        return $list;
    }
  
    
    /**
      +----------------------------------------------------------
     * 添加活动
      +----------------------------------------------------------
    */
	
	  public function addYueke() {
        if (empty($_POST['phone'])) {
		    header('Content-Type:application/json; charset=utf-8');
            return array('status' => 0, 'info' => "手机号不能为空");
        }
        $datas = array();
		$datas['phone']=trim($_POST['phone']);
		$datas['classid']=trim($_POST['classid']);
		$datas['objId']=trim($_POST['objId']);
		$datas['ip']=get_client_ip(1);
		$datas['provinceId']=trim($_POST['province']);
		$datas['cityId']=trim($_POST['cityId']);
		$datas['areaId']=trim($_POST['areaId']);
		$datas['msg']=trim($_POST['msg']);
		$datas['yueke_time']=trim($_POST['yueke_time']);
        if (M('Yueke')->add($datas)) {
		    header('Content-Type:application/json; charset=utf-8');
            return array('status' => 1, 'info' =>"填写成功");
			//'url' => U("Member/regjz")
        } else {
		    header('Content-Type:application/json; charset=utf-8');
            return array('status' => 0, 'info' => "填写失败，请重试");
        }
    }
	
	
	
/**
+----------------------------------------------------------
* 编辑约课信息(wyj)
+----------------------------------------------------------
public function editYueke() {
	$M = M("Yueke");
	$id = trim($_POST['id']);
	if ($M->save($_POST)) {
		$this->success('编辑成功');
		//return  array('status' => 1, 'info' => "成功更新", 'url' => U("Yueke/index"));
	} else {
		return  array('status' => 0, 'info' => "更新失败，请重试");
	}
}
*/
  
    }
  

?>