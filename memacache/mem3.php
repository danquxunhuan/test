<?php
//���session
session_start();
$_SESSION['name'] = 'wyj';
//ȡ��session����һ���ļ���
$val = $_SESSION['name'];
echo $val;
//////////////////////
//���php.ini�ļ�û��Ȩ�ޣ���ô�죿
ini_set('session.save_handler','memcache');
ini_set('session.save_path','tcp://127.0.0.1:11211');
session_start();
///////////////////////////////////////
//�ֱ�
//regist.php
//���ղ���
extract($_GET);
if(empty($name)||empty($email)||empty($pwd)){
	//����������֤
	die('��������Ϊ��');
}
//����һ��uuidֵ
$con = mysql_connect('127.0.0.1','root',123);
if(!$con){
	die('����ʧ��');
}
mysql_select_db('temp');
$sql = "insert into uuid values(null)";
if(mysql_query($sql,$con)){
	$id = mysql_insert_id();
	//ȷ���Ѹ��û����뵽�ĸ�����
	$tab_name = 'qq_user' . $id%3;
	$pwd = md5($pwd);
	$sql = "insert into $tab_name values($id,'$name','$pwd','$email')";
	if(mysql_query($sql,$con)){
		echo 'id='.$id.' user��ӵ���'."$tab_name��";
	}else{
		echo '���ʧ��';
	}
}
//ȡ���ݣ�����id�������жϵ��ĸ����ѯ
//��¼
extract($_GET);
if(empty($id)||empty($pwd)){
	die('��������Ϊ��');
}
//����һ��uuidֵ
$con = mysql_connect('127.0.0.1','root',123);
if(!$con){
	die('����ʧ��');
}
mysql_select_db('temp');
$tab_name = 'qq_user'.$id%3;
$sql = "select pwd from $tab_name where id = $id";
if($row = mysql_fetch_assoc($sql,$con)){
	$db_pwd = $row['pwd'];
	if($db_pwd==md5($pwd)){
		echo "��$tab_name�ҵ��û�idΪ".$id;
	}else{
		echo "��������";
	}
}else{
	echo '�������id����ȷ';
}
////�Դ���˼�������������Ҫͨ���ʼ������û�����¼����ô�죿



/////////����
//��php�����б������ݿ�
date_default_timezone_set('');





















