<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加/编辑节点</title>
<link rel="stylesheet" href="__PUBLIC__/css/admin/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
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
tr{ height:34px; }
th{ text-align:right;}
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
<script src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<script src="__PUBLIC__/js/layer/layer.min.js"></script>

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
                <div class="contentArea">
                    <div class="Item hr">
                        <div class="current">添加/编辑节点</div>
                    </div>
                  <!--   <form action="" method="post" id="add_node"> -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table1">
                            <tr>
                                <th width="120">名称：</th>
                                <td><input name="name" type="text" class="input" size="40" value="<?php echo ($info["name"]); ?>" /> 英文，为MODEL_NAME的时候首字母大写</td>
                            </tr>
                            <tr>
                                <th>显示名：</th>
                                <td><input class="input" name="title" type="text" size="40" value="<?php echo ($info["title"]); ?>" /> 中英文均可</td>
                            </tr>
                            <tr>
                                <th>状态：</th>
                                <td><select name="status" style="width: 80px;"><?php if($info["status"] == 1): ?><option value="1" selected>启用</option><option value="0">禁用</option><?php else: ?><option value="1">启用</option><option value="0" selected>禁用</option><?php endif; ?></select> 如果禁用那么只有超级管理员才可以访问，其他用户都无权访问</td>
                            </tr>
                            <tr>
                                <th>类型：</th>
                                <td><select name="level" style="min-width: 80px;">
<option value="1" <?php if($info['level'] == 1): ?>selected='selected'<?php endif; ?>>项目</option>
<option value="2" <?php if($info['level'] == 2): ?>selected='selected'<?php endif; ?>>模块</option>
<option value="3" <?php if($info['level'] == 3): ?>selected='selected'<?php endif; ?>>操作</option>
                                </select> 项目（GROUP_NAME;  模块(MODEL_NAME); 操作（ACTION_NAME）</td>
                            </tr>
                            <tr>
                                <th>父级节点：</th>
                                <td><select name="pid" style="min-width: 80px;">
                                    <?php if(is_array($allNode)): $i = 0; $__LIST__ = $allNode;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($info['pid'] == $vo['id']): ?>selected='selected'<?php endif; ?>><?php echo ($vo["fullname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                <?php echo ($info["pidOption"]); ?>

                                </select></td>
                            </tr>
                            <tr>
                                <th>显示排序：</th>
                                <td><input class="input" name="sort" type="text" size="40" value="<?php echo ($info["sort"]); ?>" /> </td>
                            </tr>
                            <tr>
                                <th>描 述：</th>
                                <td><textarea name="remark" style="width: 400px;"><?php echo ($info["remark"]); ?></textarea></td>
                            </tr>
                            <tr>
                                <td><button class="btn submit">提交</button></td>
                            </tr>
                        </table>
                        <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    <div class="clear"></div>

<script type="text/javascript">
    $(function(){
        $("select[name='level']").change(function(){
            var level=$(this).val();
            $("select[name='pid']>option").attr("disabled","disabled");
            if(level==1){
                $("select[name='pid']>option[value='0']").removeAttr("disabled").attr("selected","selected");
            }else if(level==2){
                $("select[name='pid']>option[level='1']").removeAttr("disabled");
            }else{
                $("select[name='pid']>option[level='2']").removeAttr("disabled");
            }
        });

        $(".submit").click(function(){
            
            // var url="/admin.php/Access/addNode";
            // var formObj='add_node';
            // commonAjaxSubmit();
            var id=$("input[name='id']").val();
            var name=$("input[name='name']").val();
            var title=$("input[name='title']").val();
            var status=$("select[name='status']").val();
            var level=$("select[name='level']").val();
            var pid=$("select[name='pid']").val();
            var sort=$("input[name='sort']").val();
            var remark=$("textarea[name='remark']").val();
            $.ajax({
                url:'__URL__/addNode',
                type:'POST',
                cache:false,
                dataType:'JSON',
                data:{"name":name,"title":title,"status":status,"level":level,"pid":pid,"sort":sort,"remark":remark,"id":id},
                success:function(msg){
                    if (popup.success(msg,'温馨提示')){
                        window.location.href='__URL__/nodeList';
                    };
                    
                }
            });
        });
    });
</script>
</body>
</html>