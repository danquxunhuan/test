<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页</title>
<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<script type="text/javascript" src="__ROOT__/plugins/ueditor/ueditor.config.js"></script>  
<script type="text/javascript" src="__ROOT__/plugins/ueditor/ueditor.all.js"></script>  
<style>
.wapper{width:100%;height:auto;margin:auto 0px;}
.right{float:right;width:78%;height:600px;box-shadow:0px 3px 6px #BDBFBE}
.left{float:left;width:20%;height:600px;border:solid 1px #F1F1F1;box-shadow:0px 3px 6px #BDBFBE}
.footer{width:99%;height:100px;margin-top:20px;border:solid 1px #F1F1F1;clear:both;}
.left ul li{list-style:none;height:35px;border-bottom:1px solid #F3F3F3;line-height:36px;font-weight: 700;tezt-align:center;}
.left .cycz{background:#dedbdb no-repeat;}
.tab1{width:100%;height:35px;margin-bottom:15px;line-height: 35px;}
.current {border-bottom: 2px solid rgb(38, 106, 174);color: rgb(38, 106, 174);font-weight: 700;}
	input.button,input.submit{width:68px; margin:2px 5px;letter-spacing:4px;font-size:16px; font-weight:bold;border:1px solid silver; text-align:center; background-color:#F0F0FF;cursor:pointer}
	div.result{border:1px solid #d4d4d4; background:#FFC;color:#393939; padding:8px 20px;float:auto; width:450px;margin:2px}
	img {border:1px solid silver;padding:1px;margin:5px}
</style>

<script type="text/javascript">
    function art(){
	 var title =document.getElementById("title").value;
	 var tag =document.getElementById("tag").value;
	 var cont =ocument.getElementById("cont").value;
	 alert(cont);
	  if(title == ''){
	   alert("标题不能为空");
	   return false;
	  }  
	
	  if(tag ==''){
	   alert("标签不能为空");
	   return false;
	  } 
	  if(cont == ''){
	   alert("内容不能为空");
	   return false;
	  }
	
	}
</script>
<script type="text/javascript">
    <!--
    $(function(){
        $('#form1').ajaxForm({
            beforeSubmit:  checkForm,  // pre-submit callback
            success:       complete,  // post-submit callback
            dataType: 'json'
        });
	
		 function checkForm(){
            if( '' == $.trim($('#msg').val())){
                $('#result').html('内容不能为空').show();
                return false;
            }
        }
		function complete(data){
            if (data.status==1){
                $('#result').html(data.info).show();
                // 更新列表
                data = data.data;
                var html =  '<dl class="result"><dt><a href="#"><img src="__PUBLIC__/images/90_1.png" width="50" height="50" /></a></dt><dd><div class="xq_name"><a href="#">'+data.uname+'</a></div><p>内容：'+data.msg+'</p><div class="pj_time xq_pj_time"><div class="fr"><a href="#" class="pj_zan">5</a><a href="#" class="xq_a2">0</a><A href="javascript:void(0)" class="pl_a" id="div_<?php echo ($vo["id"]); ?>"><i></i>评论</A></div><i>'+data.pl_time+'</i></div></dd> </dl>';
				$('#list').prepend(html);
            }else{
                $('#result').html(data.info).show();
            }
        }
		
		

    });
    //-->
</script>
</head>

<body>
<link rel="stylesheet" href="__PUBLIC__/Js/asyncbox/skins/default.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/calendar/calendar-blue.css"/>
<link rel="stylesheet" href="__PUBLIC__/css/admin.css"/>
<link rel="stylesheet" href="__PUBLIC__/css/black.css"/>
<script src="__PUBLIC__/js/jquery-1.9.0.min.js"></script>
<script src="__PUBLIC__/js/jquery.lazyload.js"></script>
<script src="__PUBLIC__/js/functions.js"></script>
<script src="__PUBLIC__/js/jquery.form.js"></script>
<script src="__PUBLIC__/js/asyncbox/asyncbox.js"></script>
<script src="__PUBLIC__/js/calendar/calendar.js"></script>
<script src="__PUBLIC__/js/calendar/calendar.js"></script>

<div class="box">
<!--***************************top******************************-->
	<div class="top">
    	<div class="logo fix">
        	<div class="logo_l fl"><a href="#"><img src="__PUBLIC__/images/logo.png" /></a></div>
            <div class="bn fl">后台登陆界面</div>
            <div class="lo_r fr">
            	<div class="togao fr"><a href="__APP__/Public/loginout" class="lo_a">退出</a></div>
                <div class="kefu fr">首页-文章-会员管理</div>
            </div>
        </div>
    </div>
</div>


<!--***************************content--left---right******************************-->

 <div class="wapper">
    <div class="left">
        <ul>
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
			 <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Lesson" >课程列表</a></li>
		 </ul>
  </div>
   <div class="right">
          <div class="tab1"> <div class="current">添加文章</div></div>
		   <div class="tj_article">
		   
		   			  
           
		   
		   
		     <table>
			        <form action="__URL__/add_article"　 method="post"  enctype="multipart/form-data" onsubmit="return art();" >
		            <tr><td>标题：</td><td><input type="text" value="" id="title" size='30' name="title"  placeholder="请填写标题"/></td><td></td></tr>
					 <tr><td><input type="checkbox" name="isgood" value="1" />头条<input type="checkbox" name="isgood" value="2" />精品</tr>
					 <tr><td>标签：</td><td><input type="text" value="" id="tag" size='30' name="tag"  placeholder="标签不能为空" /></td><td></td></tr>
					 <tr><td>作者：</td><td><input type="text" value="" id="auther" size='30' name="uid"  placeholder="作者姓名" /></td><td></td></tr>
					 <tr><td>内容：</td><td><textarea  id="cont" name="content" placeholder="内容必填" style="width:700px;height:300px;"></textarea>  
					   
					       <script type="text/javascript" charset="utf-8">
         window.UEDITOR_HOME_URL = "/Public/ueditor/";  //UEDITOR_HOME_URL、config、all这三个顺序不能改变
         window.onload=function(){
            window.UEDITOR_CONFIG.initialFrameHeight=300;//编辑器的高度
            window.UEDITOR_CONFIG.imageUrl="{:U('admin.php/Public/checkPic')}";          //图片上传提交地址
            window.UEDITOR_CONFIG.imagePath=' /Uploads/thumb/';//编辑器调用图片的地址
            UE.getEditor('cont');//里面的contents是我的textarea的id值
           
            }
    </script>
					   
					   
					   </td></tr>
					   <tr><td>上传图片:</td><td>
             <div class="result" >上传允许文件类型：gif png jpg 图像文件，并生成4张缩略图，其中大图带水印，生成后会删除原图。</div>
             <input name="image" id="image" type="file" /><span id="result"></span>
               </td></tr>

					 <tr><td><input type="submit" value="提交" onclick="art();" /></td><td><input type="reset" value="重置" name=""　／></td></tr>
					 
                  </form>
				      <?php if(!empty($data)): ?><img src="__UPLOAD__/b_<?php echo ($data['image']); ?>" />
					   <img src="__UPLOAD__/m_<?php echo ($data['image']); ?>" /> 
					   <img src="__UPLOAD__/s_<?php echo ($data['image']); ?>" />
					   <img src="__UPLOAD__/l_<?php echo ($data['image']); ?>" /><?php endif; ?>
		     </table>
		   </div>
   </div>
   
   <div class="footer"></div>
  </div>	   
</body>
</html>