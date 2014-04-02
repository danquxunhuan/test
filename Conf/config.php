<?php
if (!defined('MS_PATH')) exit();
return array(
	//'配置项'=>'配置值'
	'URL_MODEL'	=>	2, // 如果你的环境不支持PATHINFO 请设置为3
    'DB_TYPE'	=>	'mysql',
    'DB_HOST'	=>	'localhost',
    'DB_NAME'	=>	'mingshi',
    'DB_USER'	=>	'root',
    'DB_PWD'	=>	'',
    'DB_PORT'	=>	'3306',
    'DB_PREFIX'	=>	'ms_',
	'TMPL_L_DELIM'=>'{ms:',
    'TMPL_R_DELIM'=>'}',
	'URL_CASE_INSENSITIVE' =>true,//URL访问不再区分大小写
	'SHOW_PAGE_TRACE' =>true,//开启页面调试
	'VAR_PAGE'          =>  'p',//分页显示
    'TOKEN_ON' => true, // 是否开启令牌验证
    'TOKEN_NAME' => '__hash__', // 令牌验证的表单隐藏字段名称
    'TOKEN_TYPE' => 'md5', //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET' => FALSE, //令牌验证出错后是否重置令牌 默认为true
	'TMPL_PARSE_STRING'  =>array(
		 //'__PUBLIC__' => '/Public',  // 更改默认的__PUBLIC__ 替换规则
		 //'__JS__' => '/Public/JS/', // 增加新的JS类库路径替换规则
		 //'__SUGPIC__'  =>  __ROOT__.'/Uploads/suggest', // 增加新的上传路径替换规则(建议反馈)
     ),  
    'ms_webPath' => '/test/',
);
?>