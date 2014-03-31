<?php
class AreaModel extends Model{
		protected $_auto=array(
			array('path','tclm',3,'callback'),
		
		
		);
		
		//thinkphp如何实分页
		
		//thinkphp如何实现中文验
		
		//thinkphp如何生成html
		
		//ajax
		
		
		function tclm(){
			//查询方法要记住不用  $this->where
			$pid=isset($_POST['pid'])?(int)$_POST['pid']:0;
			
			if($pid==0){
				
				return 0;
			}
			$list=$this->where("id=$pid")->find();
			
			//dump($list);
			$data=$list['path'].'-'.$list['id'];	
			
			return $data;
		}
	
}

?>