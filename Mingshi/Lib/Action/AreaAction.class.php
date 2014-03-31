<?php

/**
 * 地区控制层
 * @author xiaolong 2012-05-22
 */
class AreaAction extends PublicAction {
    

    //AJAX查询市
    public function getAreaName(){
	
        $id = intval($_GET['id']);
        if($id){
           $data = M()->Table("area")->field('id,name')->where("pid=$id")->select();
           if($data){
               $str = json_encode($data);
               exit("$str");
           }else{
               exit("0");
           }
        }
    }
    
    
}