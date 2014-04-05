<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>节点列表</title>
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
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Institution" >教育机构</a></li>
     </ul>
</div>
                <div id="Right"  class="right">
                    <div class="Item hr">
                        <div class="current">节点管理--<a href="__URL__/show_editnode" title="添加节点" >添加节点</a></div>
                    </div>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab">
                        <thead>
                            <tr>
                                <th>序号</th>
                                <th>节点结构  <b title="单击分类隐藏/显示该分类下在子类">[i]</b></th>
                                <th>节点ID</th>
                                <th>名称</th>
                                <th>显示名</th>
                                <th>排序名称</th>
                                <th>类型</th>
                                <th>状态</th>
                                <th width="150">操作</th>
                            </tr>
                        </thead>
                        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr align="center" id="<?php echo ($vo["id"]); ?>" pid="<?php echo ($vo["pid"]); ?>">
                                <td><?php echo ($k); ?></td>
                                <td align="left" class="tree" style="cursor: pointer;"><?php echo ($vo["fullname"]); ?></td>
                                <td><?php echo ($vo["id"]); ?></td>
                                <td><?php echo ($vo["name"]); ?></td>
                                <td><?php echo ($vo["title"]); ?></td>
                                <td edit="0" fd="sort"><?php echo ($vo["sort"]); ?></td>
                                <td><?php echo ($vo["level"]); ?></td>
                                <td><?php echo ($vo["statusTxt"]); ?></td>
                                <td>[ <a href="javascript:void(0);" class="opStatus" val="<?php echo ($vo["status"]); ?>"><?php echo ($vo["chStatusTxt"]); ?></a> ] [ <a href="__URL__/editNode?id=<?php echo ($vo["id"]); ?>" class="edit">编辑</a> ] [ <a  name="<?php echo ($vo['name']); ?>" class="del" tid="<?php echo ($vo["id"]); ?>" >删除</a> ]</td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                </div>
            </div>
        <div class="clear"></div>
        
<script type="text/javascript">
    $(function(){
       $(".del").click(function(){
        var id=$(this).attr('tid');
          if(confirm('删除不可恢复！你确认要删除？')){
            $.ajax({
                url:'__URL__/delNode',
                data:{"id":id},
                dataType:'json',
                cache:false,    
                success:function(msg){
                    if(msg==1){
                        alert('删除节点成功');
                    }else{
                       alert('删除节点失败'); 
                    }
                }
            });
          }else{
           return false;
          }
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
                    $.getJSON("__URL__/opNodeStatus", { id:id, status:status }, function(json){
                        if(json.status==1){
                            popup.success(json.info);
                            $(obj).attr("val",json.data.status).html(status==1?"启用":"禁用").parents("td").prev().html(status==1?"禁用":"启用");
                        }else{
                            popup.alert(json.info);
                        }
                    });
                });

                //快捷改变操作排序dblclick
                $("tbody>tr>td[fd]").click(function(){
                    var inval = $(this).html();
                    var infd = $(this).attr("fd");
                    var inid =  $(this).parents("tr").attr("id");
                    if($(this).attr('edit')==0){
                        $(this).attr('edit','1').html("<input class='input' size='5' id='edit_"+infd+"_"+inid+"' value='"+inval+"' />").find("input").select();
                    }
                    $("#edit_"+infd+"_"+inid).focus().bind("blur",function(){
                        var editval = $(this).val();
                        $(this).parents("td").html(editval).attr('edit','0');
                        if(inval!=editval){
                            $.post("__URL__/opSort",{id:inid,fd:infd,sort:editval});
                        }
                    })
                });

                var chn=function(cid,op){
                    if(op=="show"){
                        $("tr[pid='"+cid+"']").each(function(){
                            $(this).removeAttr("status").show();
                            chn($(this).attr("id"),"show");
                        });
                    }else{
                        $("tr[pid='"+cid+"']").each(function(){
                            $(this).attr("status",1).hide();
                            chn($(this).attr("id"),"hide");
                        });
                    }
                }
                $(".tree").click(function(){
                    if($(this).attr("status")!=1){
                        chn($(this).parent().attr("id"),"hide");
                        $(this).attr("status",1);
                    }else{
                        chn($(this).parent().attr("id"),"show");
                        $(this).removeAttr("status");
                    }
                });
            });
        </script>
    </body>
</html>