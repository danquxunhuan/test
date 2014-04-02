<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//Dp XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dp/xhtml1-transitional.dp">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理——约课列表</title>
<link rel="stylesheet" href="__PUBLIC__/css/admin/style.css" type="text/css" />
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
                        <div class="current">约课列表<!---<a href="__URL__/add">添加约课</a--></div>
                    </div>
					 <div class="right_list"> 
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab">
                        <tr>
                                <th>家 长</th>
                                <th>联系方式</th>
								<th>教 师</th>
							    <th>课酬</th>
                                <!--th>课程</th-->
                                <th>约课时间</th>
                                <th>添加时间</th>
                                <th>用户IP</th>
							    <th>当前状态</th>
                                <th>操作</th>
                        </tr>
<!--约课信息-->
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="center" id="<?php echo ($vo["id"]); ?>">
        <td><?php echo ($vo["jzName"]); ?></td>
        <td><?php echo ($vo["phone"]); ?></td>
        <td><?php echo ($vo["lsName"]); ?></td>
        <td><?php echo ($vo["budget"]); ?>元/时</td>
        <!--td><?php echo ($vo["obj"]); ?></td-->
        <td><?php echo ($vo["yueke_time"]); ?></td>
        <td><?php echo (date("m-d H:i",$vo["create_time"])); ?></td>
        <td><?php echo ($vo["ip"]); ?></td>
        <td>
<?php if($vo["status"] == 0): ?><span style="color:red;">未审核</span>
<?php elseif($vo["status"] == 1): ?>已审核
<?php else: ?>已结束<?php endif; ?></td>
        <td>[ <a href="__URL__/edit?id=<?php echo ($vo["id"]); ?>">编辑 </a> ] [ <a link="__URL__/del/id/<?php echo ($vo["id"]); ?>" href="javascript:void(0)" name="此次约课" class="del">删除 </a> ]</td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
					
					<div class="result page"><?php echo ($page); ?></div>
					 </div>
                </div>
            </div>
        <div class="clear"></div>
        
        <script type="text/javascript">
            $(function(){
                $(".del").click(function(){
                    var delLink=$(this).attr("link");
                    popup.confirm('你真的打算删除'+$(this).attr("name")+'吗?','温馨提示',function(action){
                        if(action == 'ok'){
                            top.window.location.href=delLink;
                        }
                    });
                    return false;
                });
            });
        </script>
    </body>
</html>