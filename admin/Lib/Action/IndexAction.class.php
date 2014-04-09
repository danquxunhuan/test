<?php
   // 本类由系统自动生成，仅供测试用途

class IndexAction extends CommonAction {
    public function index(){
	   $this->display();
	} 
	     
/*
* 邀请码列表
* @author shasha 2013-11-01
*/
public  function yqm_list(){
	//$this->checkUser();//检查是否登录	
	import('ORG.Util.Page');// 导入分页类
	$yqm= M("Yqm");
	$count = $yqm->count();//计算总数
	//print_r($count);
	$Page   = new Page($count,15);// 实例化分页类 传入总记录数
	//进行分页数据查询
	//$list = $yqm->limit($Page->firstRow . ',' . $Page->listRows)->order('status  use_time')->select();	
	//这里需要取出使用该邀请码的用户姓名
	$sql = "SELECT a.*,b.uname FROM ms_yqm as a LEFT JOIN ms_member as b ON a.user_id=b.uid ORDER BY a.status ASC,a.id ASC LIMIT ".$Page->firstRow.','.$Page->listRows;
	$list = M()->query($sql);
	// 模拟设置分页额外传入的参数
	$Page->parameter  =  'search=key&name=thinkphp';
	// 设置分页显示
	$Page->setConfig('header', '条数据');
	$Page->setConfig('first', '<<');
	$Page->setConfig('last', '>>');
	$page = $Page->show();
	//var_dump($page);
	$this->assign("page", $page);
	$this->assign('yqm_list',$list);// 赋值数据集
	$this->display();
}		

/**
* 添加邀请码
* @author shasha 2013-11-01
*/
public function html_add(){	
	$this->checkToken();//检查是否登录
	$this->display();
} 
	
/**
* 添加邀请码
* @author shasha 2013-11-01
*/
public  function add_yqm(){
	//$this->checkToken();//检查是否登录
	$yqm= D("Yqm");
	
	$data['use_time'] = time();
	$yqm_nm=trim($_POST['yqm']);
	//var_dump($yqm_nm);
	for($i=0;$i<$yqm_nm;$i++){
		$data['yqm_sn']=$this->get_unique_id(6);
		$yqm->add($data);	
	}
	$msg='添加成功';
	echo json_encode($msg);
	//$this->success("添加成功",U('Index/yqm_list'));
}

    	
	/**
     * 删除邀请码
     * @author shasha 2013-11-01
     */
    public  function del_yqm(){
	   //$this->checkToken();//检查是否登录
	   $yqm= D("Yqm");
	   $id=trim($_GET['id']);
	   if($yqm->where("id=".$id."")->delete()){
	   		$msg='删除成功';
	   		//$this->success("删除成功");
	   }else{
	   		$msg='删除失败';
	   		//$this->error("删除失败");
	   }	
	   echo json_encode($msg);
    }
	
	
	 /**
     * 随机邀请码
     * @author shasha 2013-11-01
     */
	public function get_unique_id($length=32, $pool=""){
         if($pool == "") $pool .= "abcdefghigklmnopqrstuvwxyz012356789";
         mt_srand ((double) microtime() * 1000000);
         $unique_id = "";
         for ($index = 0; $index < $length; $index++) {
         $unique_id .= substr($pool,(mt_rand()%(strlen($pool))), 1);
         }
         return $unique_id;
    }
	
	
	public  function del(){
    	echo 'index下面的删除';
    }
    
	
	
	}