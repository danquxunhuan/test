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
                        <div class="current">添加编辑课程</div>
                    </div>
                    <form>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table1">
                            <tr>
                                <th width="100">课程名称：</th>
                                <td><input id="title" type="text" class="input" size="60" name="active_name" value="<?php echo ($info["active_name"]); ?>"/> <a href="javascript:void(0)" id="checkArticleTitle">检测是否重复</a></td>
                            </tr>

                            <tr>
                                <th width="100">活动状态：</th>
                                <td><label><input type="radio" name="status" value="0" <?php if($info["status"] == 0): ?>checked="checked"<?php endif; ?> /> 文章审核状态</label> &nbsp;
								        <label><input type="radio" name="status" value="1" <?php if($info["status"] == 1): ?>checked="checked"<?php endif; ?> /> 文章已发布状态</label> </td>
                            </tr>
							    <tr>
                                <th width="100">课时费：</th>
                                <td><label><input type="radio" name="status" value="0" <?php if($info["status"] == 0): ?>checked="checked"<?php endif; ?> /> 文章审核状态</label> &nbsp;
								        <label><input type="radio" name="status" value="1" <?php if($info["status"] == 1): ?>checked="checked"<?php endif; ?> /> 文章已发布状态</label> </td>
                            </tr>

							    <tr>
                                <th width="100">授课教师：</th>
                                <td><label><input type="text" name="sponsor" value="<?php echo ($info["uname"]); ?>" /> </label> &nbsp;
									 </td>
                            </tr>
                            <tr>
                                <th>地点：</th>
                                <td><input type="text" class="input" size="60" name="area" value="<?php echo ($info["area"]); ?>"/></td>
                            </tr>
                            <tr>
                                <th>教师主页link：</th>
                                <td><input type="text" class="input" size="60" name="link" value="<?php echo ($info["link"]); ?>"/> url地址</td>
                            </tr>

                            <tr>
                                <th>活动介绍：</th>
                                <td><textarea class="input" style="height: 60px; width: 600px;" id="introduce" name="introduce"><?php echo ($info["introduce"]); ?></textarea> 活动介绍</td>
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
                $("#checkArticleTitle").click(function(){
                    $.getJSON("__URL__/checkArticleTitle", { title:$("#title").val(),aid:"<?php echo ($info["id"]); ?>"}, function(json){
                        $("#checkArticleTitle").css("color",json.status==1?"#0f0":"#f00").html(json.info);
                    });
                });
		  $(".submit").click(function(){
            <?php if(ACTION_NAME != 'edit'): ?>if($.trim($("input[name='active_name']").val())==''){
            popup.alert("活动名称不能为空");
            return false;
            }
             if($.trim($("input[name='sponsor']").val())==''){
            popup.alert("主办方不能为空");
            return false;
            }
			 if($.trim($("input[name='area']").val())==''){
            popup.alert("地点不能为空");
            return false;
            }
			if($.trim($("input[name='start_time']").val())==''){
            popup.alert("开始时间不能为空");
            return false;
            }
			if($.trim($("input[name='end_time']").val())==''){
            popup.alert("结束时间不能为空");
            return false;
            }
			if($.trim($("#introduce").val())==''){
            popup.alert("请填写活动介绍");
            return false;
            }<?php endif; ?>
            commonAjaxSubmit();
       });
        </script>
 </body>
</html>