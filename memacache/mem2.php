<?php
//1、创建memcache对象
$mem = new Memcache;
//2、连接到mem服务
$conn = $mem -> connect('127.0.0.1',11211);
if(!$conn){
	die("成功失败！");
}
//3、取出数据
$name = $mem -> get('name');
$num = $mem -> get('num');
$bool = $mem -> get('bool');
$arr = $mem -> get('arr');
header('Content-type:text/html; charset=utf-8');
echo "<pre>";
var_dump($name);
var_dump($num);
var_dump($bool);
var_dump($arr);


//数组在mem中是以什么形式存放的？==>以序列化方式存放。
//什么是序列化？就是在保存数据时，不但保存数据本身，还保存数据类型
//他的作用是：1、利于在网络间进行数据传输2、便于重新读取并恢复数据
//
//在反序列化对象时，我们应当把该类的定义用类的自动加载方式引入。