<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>角色列表</title>
<link rel="stylesheet" href="__PUBLIC__/css/admin/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
<script src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<script src="__PUBLIC__/js/layer/layer.min.js"></script>
<style>
.wapper{width:100%;height:auto;margin:auto 0px;}
.right{float:right;width:78%;height:600px;box-shadow:0px 3px 6px #BDBFBE}
.left{float:left;width:20%;height:600px;border:solid 1px #F1F1F1;box-shadow:0px 3px 6px #BDBFBE}
.footer{width:99%;height:100px;margin-top:20px;border:solid 1px #F1F1F1;clear:both;}
.left ul li{list-style:none;height:35px;border-bottom:1px solid #F3F3F3;line-height:36px;font-weight: 700;tezt-align:center;}
.left .cycz{background:#dedbdb no-repeat;}
.tab1{width:100%;height:35px;margin-bottom:15px;line-height: 35px;}
.current {border-bottom: 2px solid rgb(38, 106, 174);color: rgb(38, 106, 174);font-weight: 700;}
</style>
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
                <div id="Right"  class="right">
                    <div class="Item hr">
                        <div class="current">角色管理--<a href="__URL__/addRole">添加角色</a></div>
                    </div>
                    <table width="93%" border="0" cellspacing="0" cellpadding="0" class="tab">
                        <thead>
                            <tr>
                                <!--th>序号</th-->
                                <th>组ID</th>
                                <th>组名</th>
                                <th>描述</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr align="center" id="<?php echo ($vo["id"]); ?>">
                                <!--td><?php echo ($k); ?></td-->
                                <td><?php echo ($vo["id"]); ?></td>
                                <td><?php echo ($vo["name"]); ?></td>
                                <td align="left"><?php echo ($vo["remark"]); ?></td>
                                <td><?php echo ($vo["statusTxt"]); ?></td>
                                <td><?php if($vo["pid"] == 0): ?>--<?php else: ?>[ <a href="javascript:void(0);" class="opStatus" val="<?php echo ($vo["status"]); ?>"><?php echo ($vo["chStatusTxt"]); ?></a> ] [ <a href="__URL__/editRole?id=<?php echo ($vo["id"]); ?>" class="edit">编辑</a> ] [<a tid="<?php echo ($vo['id']); ?>" name="<?php echo ($vo['name']); ?>" class="del" >删除</a>] [ <a href="__URL__/changeRole?id=<?php echo ($vo["id"]); ?>" class="edit">权限分配</a> ]<?php endif; ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                </div>
            </div>
        <div class="clear"></div>
        
<script type="text/javascript">
    $(function(){
        $(".del").click(function(){ 
            var id=$(this).attr("tid"); 
            layer.confirm('确认删除?',function(){
                 $.ajax({
                   url:'__URL__/delRole',
                   data:{"id":id},
                   type:'get',
                   dataType:'json',
                   cache:false,
                   success:function(msg){
                     layer.alert(msg,9,'提示信息',function(){window.location.href='__URL__/roleList';})
                   }
                 });
           });
        }); 
    });
</script>
        <script type="text/javascript">
            $(function(){
                //快捷启用禁用操作
                $(".opStatus").click(function(){
                    var obj=$(this);
                    var id=$(this).parents("tr").attr("id");
                    var status=$(this).attr("val");
                    $.getJSON("__URL__/opRoleStatus", { id:id, status:status }, function(json){
                        if(json.status==1){
                            popup.success(json.info);
                            $(obj).attr("val",json.data.status).html(status==1?"启用":"禁用").parents("td").prev().html(status==1?"禁用":"启用");
                        }else{
                            popup.alert(json.info);
                        }
                    });
                });
            });
        </script>
    </body>
</html>