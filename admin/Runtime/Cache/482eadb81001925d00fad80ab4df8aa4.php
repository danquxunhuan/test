<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页</title>
<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
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

<div class="box">
<!--***************************top******************************-->
	<div class="top">
    	<div class="logo fix">
        	<div class="logo_l fl"><a href="index.html"><img src="__PUBLIC__/images/top10.png" /></a></div>
            <div class="bn fl">
            	<i></i>
            	<div class="index_lm"><a href="mingshishouye.html" class="in_mo">名师</a><a href="wenzhang.html">精读</a><a href="#">教室</a></div>
            </div>
            <div class="lo_r fr">
            	<div class="togao fr"><a href="__APP__/index/index" class="lo_a"" class="to_bj">网站首页</a><a href="__APP__/Public/loginout" class="lo_a"" class="to_bj">退出登录</a></div>  
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
			 <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Lesson" >课程列表</a></li>
		 </ul>
  </div>
                <div id="Right"  class="right">
				   <div class="contentArea">
                    <div class="tab1">
                        <div class="current">添加编辑评论</div>
                    </div>
                    <form>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab">
                            <tr>
                                <th width="100">评论状态：</th>
                                <td><label><input type="radio" name="status" value="0" <?php if($info["status"] == 0): ?>checked="checked"<?php endif; ?> /> 评论审核状态</label> &nbsp;
								        <label><input type="radio" name="status" value="1" <?php if($info["status"] == 1): ?>checked="checked"<?php endif; ?> /> 评论已发布状态</label> 
									 </td>
                            </tr>
                            
							    <tr>
                                <th width="100">文章显示级别：</th>
                                <td><label><input type="checkbox" name="info[flag][]" value="a" <?php if(explode('',$info[flag]) == t): ?>checked="checked"<?php endif; ?> /> 推荐</label> &nbsp;
								        <label><input type="checkbox" name="info[flag][]" value="t" <?php if(explode('',$info[flag]) == h): ?>checked="checked"<?php endif; ?> />热门 </label>
									 </td>
                            </tr>
							
							    <tr>
                                <th width="100">评论人：</th>
                                <td>
								        <label><input type="text" class="input" name="username" value="<?php echo ($info["username"]); ?>" /> </label> &nbsp;
									 </td>
                            </tr>
							    <tr>
                                <th>评论时间：</th>
                                <td><input type="text" class="input" size="60" name="pl_time" value="<?php echo ($info["pl_time"]); ?>"/></td>
                            </tr>
                            <tr>
                                <th>评论内容：</th>
                                <td><textarea class="input" style="height: 60px; width: 600px;" id="msg" name="msg"><?php echo ($info["msg"]); ?></textarea> 评论介绍</td>
                            </tr>

                        </table>
                        <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />
                    </form>
                    <div class="commonBtnArea" >
                        <button class="btn submit">提交</button>
                    </div>
                </div>
            </div>
			 </div>
        <div class="clear"></div>
        <script type="text/javascript">
		  $(".submit").click(function(){
            <?php if(ACTION_NAME != 'edit'): ?>if($.trim($("input[name='pl_time']").val())==''){
            popup.alert("评论时间不能为空");
            return false;
            }
			if($.trim($("#msg").val())==''){
            popup.alert("请填写活动介绍");
            return false;
            }<?php endif; ?>
            commonAjaxSubmit();
       });
        </script>
 </body>
</html>