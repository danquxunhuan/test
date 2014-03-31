<?php
//添加mem扩展库
//1、创建memcache对象
$mem = new Memcache;
//2、连接到mem服务
$conn = $mem -> connect('127.0.0.1',11211);
if(!$conn){
	die("成功失败！");
}
//3、添加数据
////字符串
if($mem -> add('name','王余洁')){
	echo "add ok";
}
////添加整数
if($mem -> add('num',100)){
	echo "add ok";
}
////添加布尔值
if($mem -> add('bool',true)){
	echo "add ok";
}
////添加数组
$arr = array('no1'=>'北京','no2'=>'石家庄');
if($mem -> add('arr',$arr)){
	echo "add ok";
}
////资源类型无法加入
////null可以存进去，可是没有意义

//关于数据在mem中的有效时间
//1、如果你希望数据永远存在，把时间设为0
//2、如果我们希望时间超过30天，不能直接给一个秒数
//可以通过time()+时间秒数的形式来延长时间

//循环遍历memcache

//如何同时使用两个memcached来存放数据
$mem = new Memcache();
$mem -> addServer('127.0.0.1',11210);
$mem -> addServer('127.0.0.1',11211);

$mem -> add('key1','hello100',MEMCACHE_COMPRESSED,2000);
$mem -> add('key2','hello200',MEMCACHE_COMPRESSED,2000);

echo 'add ok';





