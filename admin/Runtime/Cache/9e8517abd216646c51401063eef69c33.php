<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加管理员</title>
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
tr{ height:34px;}
th{ text-align:right;}
</style>
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
                <div id="Right"  class="right">
                <div class="contentArea">
                    <div class="Item hr">
                        <div class="current">添加管理员</div>
                    </div>
                    <form action="" method="post">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table1">
                            <tr>
                                <th width="120">登录账号：</th>
                                <td><input name="username" type="text" class="input" size="40" value="<?php echo ($info["username"]); ?>" /></td>
                            </tr>
                            <!--tr>
                                <th width="120">昵 称：</th>
                                <td><input name="nickname" type="text" class="input" size="40" value="<?php echo ($info["nickname"]); ?>" /></td>
                            </tr-->
                            <tr>
                                <th width="120">真实姓名：</th>
                                <td><input name="realname" type="text" class="input" size="40" value="<?php echo ($info["realname"]); ?>" /></td>
                            </tr>
                            <tr>
                                <th width="120">账号邮件地址：</th>
                                <td><input name="email" type="text" class="input" size="40" value="<?php echo ($info["email"]); ?>" /></td>
                            </tr>
                            <tr>
                                <th>登录密码：</th>
                                <td><input class="input" name="password" type="password" size="40" value="<?php echo ($info["password"]); ?>" /></td>
                            </tr>
                            <tr>
                                <th>状态：</th>
                                <td>
                                    <select name="status" style="width: 80px;">
                                        <?php if($info["status"] == 1): ?><option value="1" selected>启用</option>
                                            <option value="0">禁用</option>
                                            <?php else: ?>
                                            <option value="1">启用</option>
                                            <option value="0" selected>禁用</option><?php endif; ?>
                                    </select> 如果禁用了将无法登陆本系统
									</td>
                            </tr>
                            <tr>
                                <th>所属用户组：</th>
                                <td><select name="role_id" style="min-width: 80px;"><?php echo ($info["roleOption"]); ?></select></td>
                            </tr>
                            <tr>
                                <th>备注信息：</th>
                                <td><textarea name="remark" rows="5" cols="57"><?php echo ($info["remark"]); ?></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2"><button class="btn submit">提 交</button></td>
                            </tr>
                        </table>
                        <input type="hidden" name="aid" value="<?php echo ($info["aid"]); ?>"/>
                    </form>
                </div>
            </div>
        </div>
    <div class="clear"></div>

<script type="text/javascript">
    $(".submit").click(function(){
            <?php if(ACTION_NAME != 'editAdmin'): ?>if($.trim($("input[name='username']").val())==''){
				popup.alert("用户名不能为空");
				return false;
			}
			if($.trim($("input[name='password']").val())==''){
				popup.alert("密码不能为空");
				return false;
			}<?php endif; ?>
            commonAjaxSubmit();
    });
</script>
</body>
</html>