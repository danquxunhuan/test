<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加/编辑会员信息</title>
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
.table1 th{ text-align:right; height:30px;}
.input{ height:18px; line-height:18px;}
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
          <div class="tab1"> <div class="current">会员管理---<a href="__URL__/add" >添加会员</a>---<a href="__URL__/del" >删除会员</a>---<a href="__URL__/update" >更新会员</a></div></div>
		                  
                    <form action="" method="post">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table1">
                            <tr>
                                <th width="120">账号：</th>
                                <td><input <?php if(ACTION_NAME == 'editMember'): ?>disabled="disabled"<?php endif; ?> name="uname" type="text" class="input" size="40" value="<?php echo ($info["uname"]); ?>" /></td>
                            </tr>
                            <tr>
                                <th>新密码：</th>
                                <td><input class="input" name="password" type="password" size="40" value="" /></td>
                            </tr>
                            <tr>
                                <th>状态：</th>
                                <td>
                                    <select name="status" style="width: 80px;">
                                        <?php if($info["status"] == 1): ?><option value="1" selected>通过审核</option>
                                            <option value="0">未通过审核</option>
                                            <?php else: ?>
                                            <option value="1">通过审核</option>
                                            <option value="0" selected>未通过审核</option><?php endif; ?>
                                    </select>
                                    如果禁用了将无法登陆本系统
									 </td>
                            </tr>
                            <tr>
                                <th>用户类别：</th>
                                <td> 
								       <select name="tid">
								        <?php if($info["tid"] == 1): ?><option value="1" selected>家长</option>
										  <option value="2"> 老师</option>
										 <?php else: ?>
										 <option value="1">家长</option>
										  <option value="2" selected> 老师</option><?php endif; ?>
										 </select>
								    </td>
                            </tr>
							    <tr>
                                <th>科目：</th>
                                <td> 
								    <select name="obj_id" style="width: 80px;">
								    	<?php if(is_array($sbj)): $i = 0; $__LIST__ = $sbj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($vo["id"]); ?>" <?php if($vo["id"] == $info['obj_id']): ?>selected="selected"<?php endif; ?> ><?php echo ($vo["subject"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
								</td>
                            </tr>
							    <tr>
                                <th>孩子年级：</th>
                                <td> 
								        <select name="classid" style="width: 80px;">
											<?php if($info["classid"] == 0): ?><option value="0">请选择</option>
                                              <option value="1">一年级</option>
                                              <option value="2">二年级</option>
                                              <option value="3">三年级</option>
                                            <else if condition="$info.classid eq 1"/>
											    <option value="1" selected>一年级</option>
                                            	<option value="2">二年级</option>
											    <option value="3">三年级</option>
                                            <else if condition="$info.classid eq 2"/>
												<option value="1">一年级</option>
                                            	<option value="2" selected>二年级</option>
											    <option value="3">三年级</option>
											<?php else: ?>
												 <option value="1" >一年级</option>
                                            	 <option value="2">二年级</option>
											     <option value="3" selected>三年级</option><?php endif; ?>
                                    </select>
								    </td>
                            </tr>
							    <tr><th>用户级别：</th>
                                 <td><select name="rankid" style="min-width: 80px;">
								     <option value="1" selected>注册用户</option>
                                      <option value="2">认证用户</option>
									<option value="3">VIP用户</option></select>
								</td>
                            </tr>
                            </tr>
							    <tr><th>教师身份：</th>
                                 <td><select name="identity" style="min-width: 80px;">
								     <option value="1" selected>顶级名师</option>
                                     <option value="2">VIP名师</option>
									 <option value="3">一线名师</option>
                                     <option value="4">机构名师</option>
                                     <option value="5">名校学生</option></select><br />
                                     这里因为教师的表分为两个了，考虑是不是将教师的信息页分为两个部分进行修改呢？
								</td>
                            </tr>
							     <tr>
                                <th>金币：</th>
                                <td><input  name="coin" class="input" style="min-width: 80px;" value="" /></td>
                            </tr>
							   <tr>
                                <th>视频1：</th>
                                <td><input type="file" name="video" style="min-width: 80px;" value="" /></td>
                            </tr>
							    <tr>
                                <th>视频2：</th>
                                <td><input type="file" name="video" style="min-width: 80px;" value="" /></td>
                            </tr>
							    <tr>
                                <th>视频3：</th>
                                <td><input type="file" name="video" style="min-width: 80px;" value="" /></td>
                            </tr>
							    <tr>
                                <th>个人生活照1：</th>
                                <td><input type="file" name="images" style="min-width: 80px;" value="" /></td>
                            </tr>
							    <tr>
                                <th>个人生活照2：</th>
                                <td><input type="file" name="images" style="min-width: 80px;" value="" /></td>
                            </tr>
							    <tr>
                                <th>个人生活照3：</th>
                                <td><input type="file" name="images" style="min-width: 80px;" value="" /></td>
                            </tr>
                            <tr>
                                <th>备注：</th>
                                <td><textarea name="" rows="5" cols="57"></textarea></td>
                            </tr>
                        </table>
                        <input type="hidden" name="uid" value="<?php echo ($info["uid"]); ?>"/>
                    </form>
                    <div class="commonBtnArea">
                        <button class="btn submit">提交</button>
                    </div>
        
            </div>
        </div>
    <div class="clear"></div>

<script type="text/javascript">
    $(".submit").click(function(){
            <?php if(ACTION_NAME != 'editMember'): ?>if($.trim($("input[name='uname']").val())==''){
               popup.alert("用户名不能为空");
               return false;
            }<?php endif; ?>
            commonAjaxSubmit();
    });
</script>  
</body>
</html>