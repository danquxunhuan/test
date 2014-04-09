<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>标签列表</title>
<link rel="stylesheet" href="__PUBLIC__/css/admin/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
<script type="text/javascript" src="__ROOT__/plugins/ueditor/ueditor.config.js"></script>  
<script type="text/javascript" src="__ROOT__/plugins/ueditor/ueditor.all.js"></script>  
<script src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<script src="__PUBLIC__/js/layer/layer.min.js"></script>
</head>

<body>
<link rel="stylesheet" href="__PUBLIC__/Js/asyncbox/skins/default.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/calendar/calendar-blue.css"/>
<link rel="stylesheet" href="__PUBLIC__/css/admin.css"/>
<script src="__PUBLIC__/js/jquery-1.9.0.min.js"></script>
<!--script src="__PUBLIC__/js/jquery.lazyload.js"></script-->
<script src="__PUBLIC__/js/functions.js"></script>
<script src="__PUBLIC__/js/jquery.form.js"></script>
<!-- <script src="__PUBLIC__/js/asyncbox/asyncbox.js"></script> -->
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
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Jz" >家长列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Ls" >老师列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Access" >管理员列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Access/nodelist" >节点管理</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Access/roleList" >角色管理</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Tags" >标签管理</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Active" >活动列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Area" >地区管理</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Index/yqm_list" >邀请码列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Review" >评论列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Yueke" >约课列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Fangan" >设计方案列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Lesson" >课程列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Institution" >教育机构</a></li>
     </ul>
</div>
   <div class="right">
          <div class="tab1"> <div class="current">标签管理 --- <a href="__URL__/add" >添加标签</a></div></div>
		
		     <table width="93%" border="0" cellspacing="0" cellpadding="0" class="tab">
			     <tr><th>标签ID</th><th>标签名称</th><th>添加时间 </th><th>首字母</th><th>操 作</th></tr>
				  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				   <td><?php echo ($vo["id"]); ?></td>   
				   <td><?php echo ($vo["tag"]); ?></td> 
				   <td><?php echo (date('Y-m-d H:i',$vo["time"])); ?></td>
				   <td><?php echo ($vo["first_char"]); ?></td> 
				   <td>[ <a href="__URL__/edit/id/<?php echo ($vo["id"]); ?>"> 编辑</a> ][ <a tid="<?php echo ($vo["id"]); ?>" class="del" name="<?php echo ($vo["tag"]); ?>">删除</a> ]</td>
				  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
		     </table>
			 
			 <div class="result page"><?php echo ($page); ?></div>
		  
   </div>
   
   <div class="footer"></div>
  </div>
  <script type="text/javascript">
            $(function(){
                $(".del").click(function(){
                    var delLink=$(this).attr("tid");
                   layer.confirm('确认删除?',function(){
                     $.ajax({
                       url:'__URL__/del',
                       data:{"id":delLink},
                       type:'get',
                       dataType:'json',
                       cache:false,
                       success:function(msg){
                         layer.alert(msg,9,'提示信息',function(){window.location.href='__URL__/index';})
                       }
                     });
                });
              });
            });
        </script>  
</body>
</html>