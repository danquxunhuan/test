<?php
/*
* 活动日历
*/
class ActiveAction extends PublicAction{
/*
* 添加活动
*/ 
public function active(){
	$this->checkToken();//表单重复提交验证
	//var_dump($_POST);
	if (IS_POST) {
		//$this->checkULogin();
		header('Content-Type:application/json; charset=utf-8');
		echo json_encode(D("Active")->addActive());
	} else {
		$this->display();
	}
}
	
	
		//日历返回活动
	public function active_show(){
	    if(empty($_GET['year']) || empty($_GET['month'])) {
	     exit('-2');
	    }else{
		$year = trim($_GET['year']);
		$month = trim($_GET['month']);
		}
		//查询当前月份所有活动。
	    $day=array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>6,'7'=>7,'8'=>8,'9'=>9,'10'=>10,'11'=>11,'12'=>12,'13'=>13,
		           '14'=>14,'15'=>15,'16'=>16,'17'=>17,'18'=>18,'19'=>19,'20'=>20,'21'=>21,'22'=>22,'23'=>23,'24'=>24,
				   '25'=>25,'26'=>26,'27'=>27,'28'=>28,'29'=>29,'30'=>30,'31'=>31);	
        $data = D('Active')->where("year='".$year. "' and month=" .$month." and day in (".implode(',',$day).")")->select();
		$newData=array();//I am so clever;
		foreach($data as $k=>$v){	
	    //$data[$v['day']][]= $v;
		//$data[$k] = $v['day'];
		$newData[$v['day']]= $v;//把值付给day
		}		   
		echo json_encode($newData);
		//$this->ajaxRetrun($data);报错
	}
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 }