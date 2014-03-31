<?php
   class  ActiveModel extends Model{
   
       /**
      +----------------------------------------------------------
     * 活动列表
      +----------------------------------------------------------
     */
    public function activeList() {
        $list = M("Active")->order("status asc,end_time desc,start_time asc")->select();
        foreach ($list as $k => $v) {			
			if(strtotime($v['end_time'])<time()){
				$list[$k]['statusTxt'] = "已结束";
			}else{
				$list[$k]['statusTxt'] = $v['status'] == 1 ? "已审核" : "<span style='color:blue;'>未审核</span>";
			}
            
        }
        return $list;
    }
	
	 /**
      +----------------------------------------------------------
     * 添加活动
      +----------------------------------------------------------
     */
	
	  public function addActive() {
        if (!isset($_POST['active_name'])) {
            return array('status' => 0, 'info' => "活动名称不能为空");
        }
        $datas = array();
        $M = M("Active");
        $datas['active_name'] = trim($_POST['active_name']);
        if ($M->where("active_name='" . $datas['active_name'] . "'")->count() > 0) {
            return array('status' => 0, 'info' => "已经存在该活动");
        }
        $datas['status'] = md5(trim($_POST['status']));
        $datas['start_time'] = $_POST['start_time'];
		$datas['end_time'] =trim($_POST['end_time']);
		$datas['sponsor']=trim($_POST['sponsor']);
		$datas['superman'] = trim($_POST['superman']);
		$datas['area']=trim($_POST['area']);
		$datas['link']=trim($_POST['link']);
		$datas['introduce']=trim($_POST['introduce']);
        if ($M->add($datas)) {
            return array('status' => 1, 'info' => "添加活动成功", 'url' => U("Active/index"));
        } else {
            return array('status' => 0, 'info' => "添加新活动失败，请重试");
        }
    }
	
	
	
    /**
      +----------------------------------------------------------
     * 编辑活动(wyj)
      +----------------------------------------------------------
     */
    public function editActive() {
        $obj = M("Active");
        $id = trim($_POST['id']);
        if ($obj->save($_POST)) {
//            , 'url' => U("Access/index")
            return  array('status' => 1, 'info' => "成功更新", 'url' => U("Active/index"));
        } else {
            return  array('status' => 0, 'info' => "更新失败，请重试");
        }
    }
     
   }