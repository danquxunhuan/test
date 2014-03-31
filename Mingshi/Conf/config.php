<?php
if (!defined('MS_PATH')) exit();

$config = include(MS_PATH."config.php");

$array=array(
	//'配置项'=>'配置值'
	'USER_AUTH_KEY'	=>'authId',	// 用户认证SESSION标记
	'TMPL_STRIP_SPACE' =>false,//去掉空格换行符等
);

return array_merge($config,$array);
?>