<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>发布文章</title>
<link rel="stylesheet" href="__PUBLIC__/css/admin/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
<style type="text/css"><!--
#thumpic{ border:1px solid #ddd; width:160px; height:170px; margin-left:74px; display:none;}
.prompt{ color:red; font-size:12px;}
--></style>
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
                        <div class="current">发布文章</div>
                    </div>
<form action="__URL__/add" method="post" enctype="multipart/form-data">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table1">
        <tr height="34">
            <th width="100">文章标题：</th>
            <td><input id="title" type="text"  class="input" size="60" name="title" /> <a href="javascript:void(0)" id="checkArticleTitle">检测是否重复</a></td>
        </tr>
        <tr height="34">
            <th width="100">指定作者ID：</th>
            <td>
            <input id="uid" type="text" name="uid" class="input" value="0" /><a href="javascript:void(0)" id="checkUid"> 查看作者姓名</a>
            </td>
        </tr>
        <tr height="34">
            <th width="100">文章发布状态：</th>
            <td><label><input  type="radio" name="status" value="0" checked="checked" /> 未审核</label> &nbsp; <label><input type="radio" name="status" value="1" /> 已发布</label> </td>
        </tr>
            <tr height="34">
            <th width="100">文章显示级别：</th>
            <td><label><input type="checkbox" name="flag[]" value="a" /> 推荐</label> &nbsp;
               <label><input type="checkbox" name="flag[]" value="t" /> 头条</label>
               <label><input type="checkbox" name="flag[]" value="j" /> 精品</label>
               <label><input type="checkbox" name="flag[]" value="h" /> 热门</label></td>
        </tr>
            <tr height="34">
            <th>文章所属分类：</th>
            <td>
                <select name="cid">
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["cid"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </td>
        </tr>
            <tr height="34">
            <th width="100">点击量：</th>
            <td><label><input type="text" class="input" name="click" value="0" /> 次</label> &nbsp;
                 </td>
        </tr>
        <tr height="34">
            <th>文章标签：</th>
            <td><input type="text" class="input" size="60" name="tag" /></td>
        </tr>
        <tr height="34">
            <th>文章关键词：</th>
            <td><input type="text" class="input" size="60" name="keywords" /> 多关键词间用半角逗号（,）分开，可用于做文章关联阅读条件</td>
        </tr>
        <tr>
            <th>文章描述：</th>
            <td><textarea class="input" style="height: 60px; width:500px;" name="description"></textarea> 用于SEO的description</td>
        </tr>
        <tr>
            <th>文章摘要：</th>
            <td><textarea class="input" style="height: 60px; width:500px;" name="summary"></textarea> 如果不填写则系统自动截取文章前200个字符</td>
        </tr>
           
		<tr height="36">
              <th>新闻图片：</th>
               <td>
                <input type="file" name="firstimage" id="firstimage" onchange="showpic()"  />
                <img id="thumpic" src="" alt="" /><span id="pic" class="prompt">请将图片控制在100K以内</span>    
              </td>
        </tr>
        <tr>
            <th>文章内容：</th>
            <td><textarea id="content" class="input" style="height: 300px; width:80%;" name="content"></textarea></td>
        </tr>
    </table><input type="submit" class="btn submit" value="提交" />
</form>
                    
                </div>
            </div>
			 </div>
        <div class="clear"></div>
		
        <script type="text/javascript" src="__PUBLIC__/kindeditor/kindeditor.js"></script><script type="text/javascript" src="__PUBLIC__/kindeditor/lang/zh_CN.js"></script>
        <script type="text/javascript">
            $(function(){var  content ;
                KindEditor.ready(function(K) {
                    content = K.create('#content',{
			allowFileManager : true,
			autoHeightMode : true,
            resizeType:0,
			afterCreate : function() {
				this.loadPlugin('autoheight');
			},
			afterUpload : function(url) {
				var firstimageoption = '<option value="' + url + '">' + url + '</option>';
				var selectoption = '<option value="' + url + '" selected="selected">' + url + '</option>';
				$("#firstimage").append(firstimageoption);
				$("#images").append(selectoption);
			}
		    }
					
		    );
                });
				//检查标题是否重复
                $("#checkArticleTitle").click(function(){
                    $.getJSON("__URL__/checkArticleTitle", { title:$("#title").val(),aid:"<?php echo ($info["aid"]); ?>"}, function(json){
                        $("#checkArticleTitle").css("color",json.status==1?"#0f0":"#f00").html(json.info);
                    });
                });
				//检查指定作者是否存在
				$("#checkUid").click(function(){
                    $.getJSON("__URL__/checkUid", { uid:$("#uid").val(),aid:"<?php echo ($info["aid"]); ?>"}, function(json){
                        $("#checkUid").css("color",json.status==1?"#00f":"#f00").html(json.info);
                    });
                });
				
            });
        </script>
<script type="text/javascript">
//大量使用到dom获取id
function $wyj(id){
	return document.getElementById(id);
}

//立即显示上传的图片
function showpic(){
	//利用dom对象的files属性获得被上传附件的信息	
	var mypic = $wyj('firstimage').files[0];
	//console.log($wyj('firstimage').files[0]);
	//URL——html5新标准属性,获得图像的url地址（二进制源码）
	$wyj('thumpic').src = window.URL.createObjectURL(mypic);	
	$wyj('thumpic').style = 'display:inline;';		
	//图片大小控制在100K以内
	if($wyj('firstimage').files[0]['size']>102400){
		$wyj('pic').innerHTML = ' 请将图片控制在100K以下！<br />';
	}else{
		$wyj('pic').innerHTML = '<br />';
	}
}
//表单数据的验证
function checkForm(){
	//flag：事物状态  true，成功；false，失败。
	if($wyj('firstimage').files[0]['size']>102400){   //图片大小控制在100K以内
		$wyj('pic').innerHTML = ' 请将图片控制在100K以下！<br />';
		var flag = false;
	}else{
		var flag = true;  
	}
	return flag; 
}
</script>  	
 </body>
</html>