<?php
//存放session
session_start();
$_SESSION['name'] = 'wyj';
//取出session（另一个文件）
$val = $_SESSION['name'];
echo $val;
//////////////////////
//如果php.ini文件没有权限，怎么办？
ini_set('session.save_handler','memcache');
ini_set('session.save_path','tcp://127.0.0.1:11211');
session_start();
///////////////////////////////////////
//分表
//regist.php
//接收参数
extract($_GET);
if(empty($name)||empty($email)||empty($pwd)){
	//用正则来验证
	die('参数不能为空');
}
//生成一个uuid值
$con = mysql_connect('127.0.0.1','root',123);
if(!$con){
	die('链接失败');
}
mysql_select_db('temp');
$sql = "insert into uuid values(null)";
if(mysql_query($sql,$con)){
	$id = mysql_insert_id();
	//确定把该用户放入到哪个表中
	$tab_name = 'qq_user' . $id%3;
	$pwd = md5($pwd);
	$sql = "insert into $tab_name values($id,'$name','$pwd','$email')";
	if(mysql_query($sql,$con)){
		echo 'id='.$id.' user添加到了'."$tab_name表";
	}else{
		echo '添加失败';
	}
}
//取数据，接收id，计算判断到哪个表查询
//登录
extract($_GET);
if(empty($id)||empty($pwd)){
	die('参数不能为空');
}
//生成一个uuid值
$con = mysql_connect('127.0.0.1','root',123);
if(!$con){
	die('链接失败');
}
mysql_select_db('temp');
$tab_name = 'qq_user'.$id%3;
$sql = "select pwd from $tab_name where id = $id";
if($row = mysql_fetch_assoc($sql,$con)){
	$db_pwd = $row['pwd'];
	if($db_pwd==md5($pwd)){
		echo "在$tab_name找到用户id为".$id;
	}else{
		echo "密码有误";
	}
}else{
	echo '您输入的id不正确';
}
////对代码思考，如果我们需要通过邮件或者用户名登录，怎么办？



/////////备份
//在php程序中备份数据库
date_default_timezone_set('');





















