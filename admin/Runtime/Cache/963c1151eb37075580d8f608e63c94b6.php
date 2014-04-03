<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑约课信息</title>
<link rel="stylesheet" href="__PUBLIC__/css/admin/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
<script src="__PUBLIC__/js/jquery-1.9.0.min.js"></script>
<script src="__PUBLIC__/js/reg.js"></script>
<style type="text/css"><!--
.ms_form dt{width:80px;}
.wyjTab tr{ height:36px; font-size:14px;}
.wyjName{ text-decoration:underline;}
input.ms_sub{float:right;display:block;width:70px;height:26px;line-height:26px;background:#A7A7A7;text-align:center;border-radius:3px;color:#fff;border:1px solid #9B9A9A;font-weight:bold;}
input.ms_sub:hover{border:1px solid #545353;background:#5E5E5E}
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
                <div id="Right"  class="right">
				   <div class="contentArea">
                    <div class="tab1">
                        <div class="current">编辑约课信息</div>
                    </div>
            <div class="yk_biao">
                    	<div class="yk_tt">约课信息表</div>
                        <div class="yk_bb fix">
<form action="__APP__/Yueke/edit" method="post">
<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />
<table class="wyjTab">
<tr><td align="right" width="100">家 长：</td><td align="left" width="140"><span class="wyjName"><?php echo ($info["jzName"]); ?></span></td>
<td align="right" width="100">预约老师：</td><td align="left" width="140"><span class="wyjName"><?php echo ($info["lsName"]); ?></span></td>
<td align="right" width="100">课 酬：</td><td align="left" width="140"><span class="wyjName"><?php echo ($info["budget"]); ?>元/时</span></td></tr>

<tr><td align="right">孩子年级：</td><td align="left"><?php echo ($info["className"]); ?></td>
<td align="right">辅导科目：</td><td align="left"><?php echo ($info["objName"]); ?></td>
<td align="right">上课时间：</td><td align="left"><?php echo ($info["yueke_time"]); ?></td></tr>

<tr><td align="right">家长手机号：</td><td align="left"><?php echo ($info["phone"]); ?></td>
<td align="right">上课区域：</td><td align="left" colspan="3"><?php echo ($info["province"]); ?>-<?php echo ($info["city"]); ?>-<?php echo ($info["area"]); ?>-<?php echo ($info["address"]); ?></td></tr>

<tr><td align="right" width="100">家长寄语：</td><td align="left" colspan="5"><textarea name="msg" ><?php echo ($info["msg"]); ?></textarea></td></tr>

<tr><td align="right" width="100">当前状态：</td><td colspan="3">
<input type="radio" name="status" value="0" <?php if($info['status']==0){echo "checked='checked'"; } ?> />&nbsp;未审核&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="status" value="1" <?php if($info['status']==1){echo "checked='checked'"; } ?> />&nbsp;已审核&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="status" value="2" <?php if($info['status']==2){echo "checked='checked'"; } ?> />&nbsp;已结束</td></tr>
<?php if(!empty($teacherList)): ?><tr><td colspan="6">
<!--推荐老师信息-->
<div class="center fix">
    <div class="mingshi fix">
        <div class="titl"><span>系统推荐老师</span></div>
        <div class="ms_list">
<?php if(is_array($teacherList)): $i = 0; $__LIST__ = $teacherList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl class="dl_list fl bk">
        <dt><a href="__ROOT__/member/info/uid/<?php echo ($vo["uid"]); ?>" target="_blank"><img src="__PUBLIC__/images/90.png"  /><div class="a_posi"></div></a></dt>
        <dd>
            <p class="ms_name"><a href="__ROOT__/member/info/uid/<?php echo ($vo["uid"]); ?>" target="_blank"><?php echo ($vo["uname"]); ?></a>&nbsp;&nbsp;
            <input type="checkbox" name="tjid[]" value="<?php echo ($vo["uid"]); ?>" 
            <?php  $arr = explode(',',$info['tjid']); if(in_array($vo['uid'],$arr)){ echo "checked='checked'"; } ?> /></p>
            
            <p>学 科：<?php echo ($vo["subject"]); ?></p>
            <p>教 龄：<?php echo ($vo["teach_age"]); ?>年</p>
            <p>课 酬：<?php echo ($vo["keshifei"]); ?>元/时</p>
            <p>评 分：<i><?php echo number_format($vo['pingfen'],1); ?></i>分</p>
        </dd>
    </dl><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
</td></tr><?php endif; ?>
<tr><td align="right"><input type="submit" name="act" value="提 交" class="ms_sub" /></td></tr></table>
</form>
                  </div>
                </div>
            </div>
			 </div>
             </div>
             </div>
        <div class="clear"></div>
 </body>
</html>