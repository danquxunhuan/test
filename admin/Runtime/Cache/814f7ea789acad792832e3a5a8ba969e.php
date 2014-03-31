<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>地区管理--添加区域</title>
<link rel="stylesheet" href="__PUBLIC__/css/admin/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/formvalidator.js" charset="UTF-8"></script>
<script type="text/javascript" src="__PUBLIC__/js/formvalidatorregex.js" charset="UTF-8"></script>
<script type="text/javascript" src="__PUBLIC__/js/admin.js" charset="UTF-8"></script>
<script type="text/javascript">
$(function(){
    checkSubmit();
    $.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});      
    $("#area_name").formValidator({onshow:"请输入分类名称",onfocus:"请输入分类名称"}).inputValidator({min:1,max:30,onerror:"分类名称长度为1到30位"});
    $("#a_order").formValidator({onshow:"请输入排序",onfocus:"请输入排序"}).inputValidator({min:1,max:4,onerror:"排序长度为1到4位"}).regexValidator({regexp:"num1",datatype:"enum",onerror:"排序只允许为整数"});
});
</script>

<style type="text/css"><!--
.right_list{ font-size:14px;}
.btn { background: none repeat scroll 0 0 #1B75B6; border: 1px solid #106BAB; border-radius: 3px; color: #FFFFFF; cursor: pointer; display: inline-block; font-family: inherit; font-size: 100%; letter-spacing: 5px; line-height: normal; margin-right: 10px; min-width: 80px; overflow: visible; padding: 4px 5px 4px 10px; text-align: center; text-decoration: none; text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); vertical-align: middle; white-space: nowrap;}
.inpu2 { background: none repeat scroll 0 0 #FFFFFF; border: 1px solid #DBD9D9; height: 27px;}
--></style>
</head>

<body>

<link rel="stylesheet" href="__PUBLIC__/Js/asyncbox/skins/default.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/calendar/calendar-blue.css"/>
<link rel="stylesheet" href="__PUBLIC__/css/admin.css"/>
<script src="__PUBLIC__/js/jquery-1.9.0.min.js"></script>
<script src="__PUBLIC__/js/jquery.lazyload.js"></script>
<script src="__PUBLIC__/js/functions.js"></script>
<script src="__PUBLIC__/js/jquery.form.js"></script>
<script src="__PUBLIC__/js/asyncbox/asyncbox.js"></script>
<script src="__PUBLIC__/js/calendar/calendar.js"></script>
<script src="__PUBLIC__/js/calendar/calendar.js"></script>

<!--***************************top******************************-->
	<div class="top">
    	<div class="logo fix">
        	<div class="logo_l fl"><a href="index.html"><img src="__PUBLIC__/images/top10.png" /></a></div>
            <div class="bn fl">
            	<i></i>
            	<div class="index_lm"><a href="mingshishouye.html" class="in_mo">名师</a><a href="wenzhang.html">精读</a><a href="#">教室</a></div>
            </div>
            <div class="lo_r fr">
            	<div class="togao fr"><a href="__ROOT__/index/index" class="lo_a to_bj" target="_blank">网站首页</a><a href="__APP__/Public/loginout" class="lo_a to_bj">退出登录</a></div>  
            </div>
            
        </div>
    </div>    

<!--***************************content--left---right******************************-->

 <div class="wapper">
     <div class="left fl">
    <ul class="ul1">
        <li><div class="current">&nbsp;&nbsp;&nbsp;常用操作</div></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Article" >文章列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Member" >会员列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Access" >管理员列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Access/nodeList" >节点管理</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Access/roleList" >角色管理</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Tags" >标签管理</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Active" >活动列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Area" >地区管理</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Index/yqm_list" >邀请码列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Review" >评论列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Yueke" >约课列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Fangan" >设计方案列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Lesson" >课程列表</a></li>
     </ul>
</div>
   <div class="right">
       <div class="tab1"> <div class="current"><a href="__URL__/index">地区列表</a>---<a href="__URL__/add">添加地区</a></div></div>
		  
		  <div class="right_list">
<form action="__URL__/add" method="POST">
<table>
<tr height="40"><td>请选择父级地区：</td><td><select name="pid" class="inpu2">
<option value="0">根地区</option>
<?php if(is_array($alist)): $i = 0; $__LIST__ = $alist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['fullname']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select></td></tr>

<tr height="40"><td>新的地区名称：</td><td><input type="text" name="name" class="inpu2" /></td></tr>
<tr height="40"><td><input type="submit" value="添加地区" class="btn submit" /></td></tr>
</table>
</form>
		   </div>
   </div>
   
   <div class="footer"></div>
</div>	   
</body>
</html>