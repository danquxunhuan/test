<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>邀请码列表</title>
<link rel="stylesheet" href="__PUBLIC__/css/admin/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
<style>
.wapper{width:100%;height:auto;margin:auto 0px;}
.right{float:right;width:78%;height:600px;box-shadow:0px 3px 6px #BDBFBE}
.left{float:left;width:20%;height:600px;border:solid 1px #F1F1F1;box-shadow:0px 3px 6px #BDBFBE}
.footer{width:99%;height:100px;margin-top:20px;border:solid 1px #F1F1F1;clear:both;}
.left ul li{list-style:none;height:35px;border-bottom:1px solid #F3F3F3;line-height:36px;font-weight: 700;tezt-align:center;}
.left .cycz{background:#dedbdb no-repeat;}
.tab1{width:100%;height:35px;margin-bottom:15px;line-height: 35px;}
.current {border-bottom: 2px solid rgb(38, 106, 174);color: rgb(38, 106, 174);font-weight: 700;}
.right_list{width:100%,height:auto;}
.right_list ul li{height:40px;}
.right_list ul li p{width:130px;float:left;border:solid 1px #F1F1F1;height:30px;font-size:12px;line-height:30px;text-align:center}
div.result{border:1px solid #d4d4d4; background:#FFC;color:#393939; padding:8px 10px;float:auto; width:99%;margin:2px}
div.page{border:1px solid #d4d4d4; background:#111;color:white; padding:5px 15px;float:auto; width:91%;margin:2px;text-align:right}
div.page a{color:white;}
</style>
</head>

<body>

<link rel="stylesheet" href="__PUBLIC__/Js/asyncbox/skins/default.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/calendar/calendar-blue.css"/>
<link rel="stylesheet" href="__PUBLIC__/css/admin.css"/>
<script src="__PUBLIC__/js/jquery-1.9.0.min.js"></script>
<!-- <script src="__PUBLIC__/js/jquery.lazyload.js"></script> -->
<script src="__PUBLIC__/js/functions.js"></script>
<script src="__PUBLIC__/js/jquery.form.js"></script>
<script src="__PUBLIC__/js/asyncbox/asyncbox.js"></script>
<!-- <script src="__PUBLIC__/js/calendar/calendar.js"></script> -->

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
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Jz" >家长列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Ls" >老师列表</a></li>
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
          <div class="tab1"> <div class="current">  邀请码管理   --- <a href="__URL__/html_add" > 添加邀请码 </a></div></div>
		     <table width="93%" border="0" cellspacing="0" cellpadding="0" class="tab">
			     <tr><th>邀请码ID</th><th>邀请码</th><th>使用人</th><th>状态</th><th>添加时间 </th><th>删除</th></tr>
				  <?php if(is_array($yqm_list)): $i = 0; $__LIST__ = $yqm_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				   <td><?php echo ($vo["id"]); ?></td>   
				   <td><?php echo ($vo["yqm_sn"]); ?></td>
				   <td><?php echo ($vo["user_id"]); ?></td>
				   <td><?php echo ($vo["status"]); ?></td>
				   <td><?php echo (date('Y-m-d H:i',$vo["use_time"])); ?></td>
				   <td><a href="__URL__/del_yqm/id/<?php echo ($vo["id"]); ?>">删除</a></td>
				  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
		     </table>
			 <div class="result page"><?php echo ($page); ?></div>		  
   </div>
   
   <div class="footer"></div>
  </div>	   
</body>
</html>