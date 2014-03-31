<?php
   class  YqmModel extends Model{
    protected $_validate = array(
	 array('yqm','require','邀请码必填！'),
     array('yqm','','邀请码已存在！',0,'unique',self::MODEL_INSERT),       
    );
	
    protected $_auto     =     array(
        array( 'use_time','time',3,'function'), 
    );
   
  
   
   }






?>