<?php
//定义项目名称
 define('APP_NAME', 'Mingshi');
 //定义项目路径
 define('APP_PATH', './Mingshi/');
 //开启调试模式
 define('APP_DEBUG', true);
 
 define("MS_PATH",'/Conf/');
 
//把css和img图片路径定义为常量，以便使用
//公共图片
define('HOME_IMG','/Public/images/'); 
//建议反馈图片上传文件
define('UPLOADS','/Uploads/'); 
define('SUGPIC','/Uploads/suggest/'); 
 
 require './ThinkPHP/ThinkPHP.php';
 
 ?>