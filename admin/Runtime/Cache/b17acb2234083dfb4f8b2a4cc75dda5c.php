<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文章分类管理</title>
<link rel="stylesheet" href="__PUBLIC__/css/admin/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/base.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/layout.css" type="text/css" />
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
                <div id="Right" class="right">
                    <div class="Item hr">
                        <div class="current">资讯分类管理</div>
                    </div>
                    <form action="" method="post" id="quickForm">
                        <b>添加分类：</b>
                        <input type="hidden" name="act" value="add" /> &nbsp;
                        <select name="data[pid]">
                            <option value="0">顶级分类</option>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["cid"]); ?>"><?php echo ($vo["fullname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>  &nbsp;
                        <input placeholder="你要添加的分类名称" id="newName" class="input" type="text" name="data[name]" value="" /> &nbsp;
                        <button class="btn quickSubmit">确定添加</button>
                    </form>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tab">
                        <thead>
                            <tr align="center">
                                <td width="10%">原分类CID</td>
                                <td width="20%">原分类结构 <b title="单击分类隐藏/显示该分类下在子类">[i]</b></td>
                                <td width="20%" align="left">操作属性</td>
                                <td width="20%">新分类</td>
                                <td width="20%">修改后的名称</td>
                                <td width="10%">操作</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tree): $mod = ($i % 2 );++$i;?><tr pid="<?php echo ($tree["pid"]); ?>" cid="<?php echo ($tree["cid"]); ?>">
                                    <td width="10%" align="center"><?php echo ($tree["cid"]); ?><input type="hidden" name="cid" value="<?php echo ($tree["cid"]); ?>"/></td>
                                    <td width="20%" class="tree" style="cursor: pointer;"><?php echo ($tree["fullname"]); ?></td>
                                    <td width="20%">
                                        <select name="act" class="act">
                                            <option selected="selected" value="edit">修改该分类</option>
                                            <option value="del">删除该分类</option>
                                            <option value="add">在该分类中添加子类</option>
                                        </select>
                                    </td>
                                    <td width="20%">
                                        <select name="pid">
                                            <option value="0">顶级分类</option>
                                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i; if($vo1['cid'] == $tree['cid']): ?><option value="<?php echo ($vo1["cid"]); ?>" selected="selected" readonly><?php echo ($vo1["fullname"]); ?></option>
                                                    <?php else: ?>
                                                    <option value="<?php echo ($vo1["cid"]); ?>"><?php echo ($vo1["fullname"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </td>
                                    <td width="20%"><input type="text" value="" name="name" class="input" placeholder="你要修改分类的新名称"/></td>
                                    <td align="center" width="10%"><button class="btn opCat">确定</button></td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
              </div>
        <form action="" method="post" id="opForm">
            <input id="cid" type="hidden" name="data[cid]" />
            <input id="act" type="hidden" name="act" />
            <input id="pid" type="hidden" name="data[pid]" />
            <input id="name" type="hidden" name="data[name]" />
        </form>
        <div class="clear"></div>

        <script type="text/javascript">
            $(function(){
                $(".opCat").click(function(){
                    var obj=$(this).parents("tr");
                    $("#cid").val(obj.find("input[name='cid']").val());
                    $("#act").val(obj.find("select[name='act']").val());
                    $("#pid").val(obj.find("select[name='pid']").val());
                    $("#name").val(obj.find("input[name='name']").val());
                    if($("#act").val()=="del"){
                        popup.confirm('你真的打算删除该分类吗?','温馨提示',function(action){
                            if(action == 'ok'){
                                commonAjaxSubmit("","#opForm");
                            }
                        });
                        return false;
                    }
                    commonAjaxSubmit("","#opForm");
                });
                $(".quickSubmit").click(function(){
                    if($("#newName").val()==''){
                        popup.alert("分类名称不能为空滴！");
                        return false;
                    }
                    commonAjaxSubmit("","#quickForm");
                    return false;
                });

                var chn=function(cid,op){
                    if(op=="show"){
                        $("tr[pid='"+cid+"']").each(function(){
                            $(this).removeAttr("status").show();
                            chn($(this).attr("cid"),"show");
                        });
                    }else{
                        $("tr[pid='"+cid+"']").each(function(){
                            $(this).attr("status",1).hide();
                            chn($(this).attr("cid"),"hide");
                        });
                    }
                }
                $(".tree").click(function(){
                    if($(this).attr("status")!=1){
                        chn($(this).parent().attr("cid"),"hide");
                        $(this).attr("status",1);
                    }else{
                        chn($(this).parent().attr("cid"),"show");
                        $(this).removeAttr("status");
                    }
                });
            });
        </script>
    </body>
</html>