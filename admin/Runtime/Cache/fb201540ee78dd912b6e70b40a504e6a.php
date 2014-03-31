<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页</title>
<link rel="stylesheet" href="__PUBLIC__/css/admin/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/admin/houtai.css" />
<script>
//实现提交表单功能：
	function fsubmit(obj){
		obj.submit();
	}
</script>
<script language="JavaScript">
function changeVerify(){
var timenow =new Date().getTime();
document.getElementById('verifyImg').src='__URL__/verify/'+timenow;
}
</script>
</head>

<body style="background:#313131">

<!--***************************************登录****************************************-->
<div class="login_box">
	<ul class="login_left">
    	<li class="lo_1"><a href="#"></a></li>
        <li class="lo_1"><a href="#"></a></li>
        <li class="lo_1"><a href="#"></a></li>
        <li class="lo_2"><a href="#"></a></li>
        <li class="lo_2"><a href="#"></a></li>
        <li class="lo_2"><a href="#"></a></li>
        <li class="lo_3"><a href="#"></a></li>
        <li class="lo_3"><a href="#"></a></li>
        <li class="lo_3"><a href="#"></a></li>
    </ul>
    <div class="login_right">
    	<div class="tc_forms">
		<form action="__URL__/checkLogin" method="post" name="f1" >
            <input type="text" placeholder="用户名/手机号" value="" name="username" class="inpu1 tc_inpu1"/>
            <input type="password" placeholder="密码" value="" name="password" class="tc_inpu1"/>
            <div class="tc_passwor"> <img  class="fr" src="__URL__/verify/" id="verifyImg" onclick="return changeVerify();" style="" alt="点击刷新验证码" title="点击刷新验证码"/>
			<input type="text" name="verify" placeholder="验证码"  value="" class="tc_inpu1"/></div>
            <div class="tc_login"><a href="javascript:;" onclick="fsubmit(document.f1)" class="tc_a1">工 作 登 录</a></div>
        </form>
		</div>
    </div>
</div>

</body>
</html>