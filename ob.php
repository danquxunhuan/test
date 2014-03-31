<?php
//如果静态页存在，直接读取静态页
if( file_existe('test.html') && (filemtime('test.html')+30>time()) ){
	echo file_get_contents('test.html');
	exit;  //退出，不再执行该php页
}
//打开ob
ob_start();
?>

<?php
echo 'hello100';
header("Content-Type:text/html;charset=utf-8"); 
echo 'hello200';
echo "<hr />";
?>

<?php
//获取ob内容，输出静态页
$str = ob_get_contents();
file_put_contents('test.html',$str);
?>