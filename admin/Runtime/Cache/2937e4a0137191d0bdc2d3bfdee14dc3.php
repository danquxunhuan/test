<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加/编辑活动</title>
<link rel="stylesheet" href="__PUBLIC__/css/admin/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
<!--时间插件开始-->
<link href="__PUBLIC__/css/bootstrap/bootstrap.css" rel="stylesheet" media="screen">
<link href="__PUBLIC__/css/bootstrap/bootstrap-datetimepicker.css" rel="stylesheet" media="screen">
<script src="__PUBLIC__/js/jquery-1.9.0.min.js"></script>
<script src="__PUBLIC__/js/jquery.form.js"></script>
<!--时间插件结束-->
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
                    <div class="tab1">
                        <div class="current">添加/编辑活动</div>
                    </div>
                    <form>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab">
                            <tr>
                                <th width="100">活动名称：</th>
                                <td><input id="title" type="text" class="input" size="60" name="active_name" value="<?php echo ($info["active_name"]); ?>" /> <!--a href="javascript:void(0)" id="checkArticleTitle">检测是否重复</a--></td>
                            </tr>

                            <tr>
                                <th width="100">活动状态：</th>
<td><label><input style="display:inline" type="radio" name="status" value="0" <?php if($info["status"] == 0): ?>checked="checked"<?php endif; ?> />未审核</label> &nbsp;<label><input style="display:inline" type="radio" name="status" value="1" <?php if($info["status"] == 1): ?>checked="checked"<?php endif; ?> />通过审核</label> </td>
                            </tr>

							    <tr>
                                <th width="100">主办单位：</th>
                                <td><label><input type="text" class="input" name="sponsor" value="<?php echo ($info["sponsor"]); ?>" /> </label>
									 </td>
                            </tr>
                             <tr>
                                <th width="100">重要嘉宾：</th>
                                <td><label><input type="text" class="input" name="superman" value="<?php echo ($info["superman"]); ?>" /> </label>
									 </td>
                            </tr>
                            <tr>
                                <th>活动地点：</th>
                                <td><input type="text" class="input" size="60" name="area" value="<?php echo ($info["area"]); ?>"/></td>
                            </tr>
                            <tr>
                                <th>活动链接：</th>
                                <td><input type="text" class="input" size="60" name="link" value="<?php echo ($info["link"]); ?>"/>&nbsp;注意：请以http://开头。</td>
                            </tr>
				
							    <tr>
                                <th>开始时间：</th>
                                <td><!--input type="text" class="input date" size="30" name="start_time" id="start_time" value="<?php echo ($info["start_time"]); ?>"/>
								        <script language="javascript" type="text/javascript">
                                            Calendar.setup({
                                            inputField     :    "start_time",
                                            ifFormat       :    "%Y-%m-%d",
                                            showsTime      :    'true',
                                            timeFormat     :    "24"
                                            });
                                          </script-->
<input id="from_datetime" name="start_time" type="text" class="input date" value="<?php echo ($info["start_time"]); ?>" data-date-format="yyyy-mm-dd hh:ii" data-date="<?php echo date('Y-m-d',time());?>T14:25:07Z" />
									</td>
                            </tr> 
							    <tr>
                                <th>结束时间：</th>
                                <td><!--input type="text" class="input endDate" size="30" name="end_time" id="end_time" value="<?php echo ($info["end_time"]); ?>"/>
								        <script language="javascript" type="text/javascript">
                                           Calendar.setup({
                                           inputField     :    "end_time",
                                           ifFormat       :    "%Y-%m-%d",
                                           showsTime      :    'true',
                                           timeFormat     :    "24"
                                           });
                                         </script-->
<input id="to_datetime" name="end_time" type="text" class="input endDate" value="<?php echo ($info["end_time"]); ?>" data-date-format="yyyy-mm-dd hh:ii" data-date="<?php echo date('Y-m-d',time());?>T14:25:07Z" />
								    </td>
                            </tr>
                            <tr>
                                <th>活动介绍：</th>
                                <td><textarea class="input" cols="80" rows="10" id="introduce" name="introduce"><?php echo ($info["introduce"]); ?></textarea></td>
                            </tr>

                        </table>
                        <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />
                        <input type="hidden" name="year" value="<?php echo date('Y',strtotime($info['start_time'])); ?>" />
                        <input type="hidden" name="month" value="<?php echo date('m',strtotime($info['start_time'])); ?>" />
                        <input type="hidden" name="day" value="<?php echo date('d',strtotime($info['start_time'])); ?>" />
                        
                    </form>
                    <div class="commonBtnArea" >
                        <button class="btn submit">提交</button>
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
<!--时间插件开始-->
<script type="text/javascript" src="__PUBLIC__/jquery/bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="__PUBLIC__/jquery/bootstrap/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="__PUBLIC__/jquery/bootstrap/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('#from_datetime').datetimepicker({
        language:  'zh-CN',
        format: 'yyyy-mm-dd hh:ii',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1,
		initialDate:2013-12-23
        //pickerPosition: "bottom-left"
    });
    $('#to_datetime').datetimepicker({
        language:  'zh-CN',
        format: 'yyyy-mm-dd hh:ii',
        weekStart: 1,
        todayBtn:  0,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1,
        //pickerPosition: "bottom-left"
    });
</script>
 </body>
</html>