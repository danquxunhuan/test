<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>名师认证-我的设置</title>
<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/tanchu.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
<link rel="stylesheet" id="change_css" href="__PUBLIC__/css/<?php echo ($userDataInfo["style"]); ?>_center.css" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script language="javascript" src="__PUBLIC__/js/autoresize.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>
<!--ajax请求-->
<script type="text/javascript" src="__PUBLIC__/js/ms_center.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/ms_ajax.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/ms_shezhi.js"></script>
<!--ajax上传图片-->
<script type="text/javascript" src="__PUBLIC__/js/AjaxFileUploaderV2.1/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/AjaxFileUploaderV2.1/ajaxfileupload.js"></script>
<script language="javascript">
function imgdragstart(){return false;}
</script>
<script type="text/javascript">
//提示框 3秒之后框框消失
function outa(){$('#tipa').css('display','none');} //已提交过了
function outb(){$('#tipb').css('display','none');} //已表过态了
function titye(){alert('刷新页面试试');}
</script>
<style type="text/css">
	#tishi{ color:red; font-size:12px;}
</style>
</head>

<body>
<script language="javascript">
for(i in document.images)document.images[i].ondragstart=imgdragstart;
</script>
<script type="text/javascript">
/*wy,好神奇单独放到js文件中就不好使了呢*/
$(function(){  
	/*
	* 名师认证-我的设置-修改头像xgtx
	*/	   	
	//头像验证
	var imgArr = ['bmp','jpg','gif','png'];
	var flag='no';
	$('#image').bind('change',function(){
		if($(this).val()==''){
			$('#tishi').text(' 请选择上传头像');
			flag='no';
		}else if($('#image')[0].files[0]['size']>102400){//头像不能超过100K
			$('#tishi').text(' 头像不能超过100K');  
			flag='no';
		}else{
			var file = $(this).val();
			var len = file.length;
			var ext = file.substring(len-3,len).toLowerCase();
			if($.inArray(ext,imgArr)== -1){
				//alert('不是图片');
				$('#tishi').text(' 仅支持图片后缀名bmp/jpg/gif/png');
				flag='no';
			}else{
				$('#tishi').text('');
				flag='ok';
			}
		}
	});
 	//上传头像
	$('#xgtx').bind('click',function(){
		if(flag=='no'){
			alert('上传文件信息有误');
		}else{
			alert('ajax发送请求')
			//反显上传图片-------------------
			var headpic = $('#image')[0].files[0];
			$('.headpic').attr('src',window.URL.createObjectURL(headpic));
			//-------------------------
			var imagesAgo = $('#imagesAgo').val();
			$.ajaxFileUpload({
				url:'test/member/headPic1',            //需要链接到服务器地址
				type:'POST',
				data:'&imagesAgo='+imagesAgo,
				secureuri:false,
				fileElementId:'image',                   //文件选择框的id属性
				dataType: 'xml',                           //服务器返回的格式，可以是json
				success: function (data, status){           //相当于java中try语句块的用法     
					console.log(data);
					$('#tishi').html('头像上传成功');
				},
				error: function (data, status, e){          //相当于java中catch语句块的用法
					console.log(data);
					$('#tishi').html('头像上传失败');
				}
			});
			//-------------------------console.log(data);
		}
	});

});
</script>
<!-- 提示框 start -->
<div style="font-family:'微软雅黑';" >
	<div id="tipa">
		<div style="font-size:20px;"><b>提示信息</b></div>
		<div style="font-size:14px;margin-top:5px;margin-left:2px;">添加成功</div>
		<div style="font-size:14px;margin-top:5px;margin-left:2px;"><span style="cursor:pointer" onclick="outa()">关闭</span></div>
	</div>
	<!-- ------提交-表态-分割线------- -->
	<div id="tipb">
	<div style="font-size:20px;"><b>提示信息</b></div>
		<div style="font-size:14px;margin-top:5px;margin-left:2px;">添加失败</div>
		<div style="font-size:14px;margin-top:5px;margin-left:2px; color:red;"><span style="cursor:pointer" onclick="outb()">关闭</span></div>
	</div>
</div>
<!-- 提示框  end-->
<div class="box">
<!--***************************top******************************-->
	<div class="top">
    	<div class="logo fix">
        	<div class="logo_l fl"><a href="__APP__/index/login" id="logo"></a></div>
            <div class="bn fl">
            	<i></i>
            	<div class="index_lm"><a href="__APP__/Member" class="in_mo" >名师</a><a href="__APP__/Index">精读</a></div>
            </div>
            <div class="lo_r fr">
            	<div class="togao fr">
				<a href="__APP__/index/find" class="lo_a">找名师</a>				
				<a href="__APP__/index/tougao" class="to_bj">投 稿</a>
				<a href="__APP__/member/center/uid/<?php echo ($userDataInfo["uid"]); ?>" class="a_nopad"><?php echo ($userDataInfo["uname"]); ?></a>
				<a href="javascript:;" class="lo_abj index_xiala"></a>
                    <ul class="lo_abj_ul" id="index_show">
                    	<li><a href="__APP__/index/loginout">退出登录</a></li>
                    	<li><a href="__APP__/index/index/type/1">小学版</a></li>
                        <li><a href="__APP__/index/index/type/2">初中版</a></li>
                        <li><a href="__APP__/index/index/type/3">高中版</a></li>
                    </ul>
				</div>
                   <div class="color_box fix">
                	<div class="color_div11 fl">
                    	<a href="__APP__/message" class="color_box_a11 show" title="站内信"><img src="__PUBLIC__/images/xinfeng.png" /></a>
                    </div>
                	<div class="color_div1 fl show_all">
					<a href="javascript:;" class="color_box_a1 show" id="show_top"><img src="__PUBLIC__/images/black_center.png" /></a>
                    	<ul class="color_ul" id="show_style">
                        	<li><a href="javascript:;" act="top1"><img src="__PUBLIC__/images/se1.png" /></a></li>
                            <li><a href="javascript:;" act="top2"><img src="__PUBLIC__/images/se2.png" /></a></li>
                            <li><a href="javascript:;" act="top3"><img src="__PUBLIC__/images/se3.png" /></a></li>
                            <li><a href="javascript:;" act="top4"><img src="__PUBLIC__/images/se4.png" /></a></li>
                            <li><a href="javascript:;" act="top5"><img src="__PUBLIC__/images/se5.png" /></a></li>
                            <li><a href="javascript:;" act="top6"><img src="__PUBLIC__/images/se6.png" /></a></li>
                            <li><a href="javascript:;" act="top7"><img src="__PUBLIC__/images/se7.png" /></a></li>
                            <li><a href="javascript:;" act="top8"><img src="__PUBLIC__/images/se8.png" /></a></li>
                            <li><a href="javascript:;" act="top9"><img src="__PUBLIC__/images/se9.png" /></a></li>
                            <li><a href="javascript:;" act="top10"><img src="__PUBLIC__/images/se10.png" /></a></li>
                            <li><a href="javascript:;" act="top11"><img src="__PUBLIC__/images/se11.png" /></a></li>
							<li><a href="javascript:;" act="black"><img src="__PUBLIC__/images/black_center.png" /></a></li>
                        </ul>
                    </div>
                    <div class="color_div2 fr show_all">
					    <a href="javascript:;" class="color_box_a2 show"><img src="__PUBLIC__/images/fangkuai.png" /></a>
                    	<ul class="color_ul2" id="color_ul2">
                        	<li><a href="__URL__/info/uid/<?php echo ($_GET['uid']); ?>">我的空间</a></li>
                            <li><a href="javascript:;">修改头像</a></li>
                            <li><a href="__APP__/index/loginout">注销登录</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>         
<!--***************************content******************************-->
    <div class="content_geren fix">
    <div class="jbxx_con fix">
      	 <div class="jbxx_left fr">
           <!---------老师身份的右侧---------->
<div class="jbxx_zp">
    <div class="jbxx_zp_la fix">
        <dl class="dl_list zy_dl_list">
            <dt><a href="__APP__/member/info/uid/<?php echo ($_GET['uid']); ?>"><img src="__PUBLIC__/images/90_1.png"  width="100" height="100" />
            <div class="zy_a_posi"></div></a></dt>
        </dl>
    </div>
    <div class="jinbi"><a href=""><i>20</i>文章</a><a href=""><i>359</i>评论</a>
    <!--a href="#" class="jinbi_no"><i><?php echo ($info["coin"]); ?></i>金币</a--></div>
</div>
<ul class="center_tab fix">
    <li class="center_li1 center_li1mo1"><a href="__URL__/center/uid/<?php echo ($_GET['uid']); ?>"><i></i>后台主页</a></li>
    <li class="center_li2 center_li1mo2"><a href="__APP__/member/renzheng/uid/<?php echo ($_GET['uid']); ?>"><i></i>名师认证</a></li>
    <!--li class="center_li3"><a href="__APP__/member/coin/uid/<?php echo ($_GET['uid']); ?>"><i></i>金 币</a></li-->
    <li class="center_li6 center_li1mo6"><a href="__APP__/member/create/uid/<?php echo ($_GET['uid']); ?>"><i></i>创 作</a></li>
    <li class="center_li5 center_li1mo5"><a href="__APP__/member/favorite/uid/<?php echo ($_GET['uid']); ?>"><i></i>收 藏</a></li>
</ul>             
         </div>
       <div class="jbxx_right nob_jbxx_right fl">
            <div class="zyxx_box zyxx_box_fff">
            	<div class="yk_title">名师认证</div>
                <p class="yk_p">填写完整的认证信息，你的网站才精彩！</p>
                <ul class="yq_tab" id="news">
                	<span class="ge"></span>
                	<li><a href="__APP__/member/renzheng/uid/<?php echo ($_GET['uid']); ?>"  >个人资料</a></li>
                    <li><a href="__APP__/teachcase/index/uid/<?php echo ($_GET['uid']); ?>"  >教学案例</a></li>
                    <li><a href="__APP__/mystory/index/uid/<?php echo ($_GET['uid']); ?>" >我的故事</a></li>
                    <li  class="yq_amo"><a href="__APP__/member/shezhi/uid/<?php echo ($_GET['uid']); ?>" >我的设置</a></li>
                    <li class="yq_guize"><a href="__APP__/member/guanfang/uid/<?php echo ($_GET['uid']); ?>">官方信息</a></li>
                </ul>
				<!----------------我的设置----------------->
				 <div class="cons" id="con4">
				  <div class="jbxx_yk_list">
                   <dl class="fix" style="padding-top:0;">
                        <dt class="ms_xiugai"><a href="javascript:void(0);"><img src="__PUBLIC__/images/xg.png" /></a></dt>
                        <dd>
                           <h3>修改头像</h3>
                           <div class="gfxx"><!--span>300</span--></div>
                           <div class="zyxx_wwww" style="margin-top:20px;">
<!--伪ajax上传图片-->
<iframe style="width:500px; height:250px;" name="ifr"></iframe>
<form id="headpic" target="ifr" enctype="multipart/form-data" action="__APP__/member/headPic">
<!--用户id><input type="hidden" name="uid" id="uid" value="<?php echo (session('ms_user_id')); ?>" /-->
<!--以前的头像信息-->
<input type="hidden" name="imagesAgo" id="imagesAgo" value="<?php echo ($headpic); ?>" />
                                <div class="xgtx">
                                    <div class="xgtx_right fr">
<img src="__PUBLIC__/images/90_1.png" width="40" height="40" /><img src="__PUBLIC__/images/90_1.png" width="40" height="40" /><p>我使用过的头像</p>
                                    </div>
                                    <div class="xgtx_left fl">
<div class="xgtx_tu">
    <img class="headpic" src="" width="100" height="100" alt="头像" />
    <img class="headpic" src="" width="90" height="90" alt="头像" />
    <img class="headpic" src="" width="50" height="50" alt="头像" />
    <img class="headpic" src="__PUBLIC__/images/90_1.png" width="40" height="40" alt="头像" />
</div>
<div class="zyxx_inp zyxx_285 xgtx_zyxx_inp">
    <input type="file" name="image" id="image" /><span id="tishi"></span>
    <a class="btn" id="xgtx">上 传</a>
</div>
                                    </div>                                 
                                </div>
</form>	
                           </div>
                       </dd>
                   </dl>
                </div>
                <div class="jbxx_yk_list">
                   <dl class="fix">
                        <dt class="ms_xiugai"><a href="javascript:void(0);"><img src="__PUBLIC__/images/sq.png" /></a></dt>
                        <dd>
                           <h3>尊贵域名</h3>
                           <div>您的域名:<span id="ms_url"><?php echo ($url); ?></span></div>
                            <div class="zyxx_www">
							<form>
                                <div class="zyxx_inp">www.<input type="text" placeholder="建议您的姓名拼音" name="url" id="url" value="" class="zyxx_tet"/>.mingshi.so<span class="yming">申请你的个人网站域名，方便别人记住你</span></div>
                                <div class="zyxx_cun mart_25">保存了就不能再修改
								<a class="zyxx_pj_fb gbbox" href="javascript:;">关 闭</a>
								<?php if($url == ''): ?><a class="zyxx_pj_fb zyxx_lan_a ms_url" href="javascript:;">确 定</a>
								<?php else: ?>
								<a class="zyxx_pj_fb" href="javascript:;">确 定</a><?php endif; ?>
								</div>
                            </form>
						   </div>
                        </dd>
                   </dl>
                </div>
                <!---->
                <div class="zyxx_dandu fix">
                    <div class="jbxx_yk_list">
                       <dl class="fix" style="border:none">
                            <dt class="mima"><a href="javascript:void(0);">
							<img src="__PUBLIC__/images/xg.png" /></a></dt>
                            <dd>
                               <h3>修改登录密码</h3>
                           </dd>
                       </dl>
                    </div>
                    <div class="zyxx_www zyxx_www_fu15">
					<form>
                        <div class="xgtx">
                            <div class="xgmm">
                                <dl class="zc_dl">
                                    <dt class="ms_xiugai">当前密码：</dt>
                                    <dd><input type="password"  name="password" class="zc_input" /><span class="old"></span></dd>
                                </dl>
                                <dl class="zc_dl">
                                    <dt class="ms_xiugai">新密码：</dt>
                                    <dd><input type="password" id="password" name="newpassword" class="zc_input" /><span class="new"></span></dd>
                                </dl>
                                <dl class="zc_dl">
                                    <dt class="ms_xiugai">确认密码：</dt>
                                    <dd><input type="password" id="confirmpwd" name="querenpassword" class="zc_input" /><span class="msg_confirmpwd"></span></dd>
                                </dl>
                            </div>
                        </div>
                        <div class="zyxx_cun mar_left247  mart_25 fumsg">
						<a href="javascript:;" class="chenggong"></a>
						<a class="zyxx_pj_fb gbox" href="javascript:;">关 闭</a>
						<a class="zyxx_pj_fb zyxx_lan_a mima" href="javascript:;" act="pwd">确 定</a></div>
					</form>	
                    </div>
                </div>
                <!---->
                <!---->
                <div class="zyxx_dandu fix">
                    <div class="jbxx_yk_list">
                       <dl class="fix" style="border:none">
                            <dt class="mima"><a href="javascript:void(0);"><img src="__PUBLIC__/images/xg.png" /></a></dt>
                            <dd>
                               <h3>设置简历密码</h3>
                           	   <div>默认密码为您的手机号</div>
                           </dd>
                       </dl>
                    </div>
                    <div class="zyxx_www zyxx_www_fu15">
					<form>
                        <div class="xgtx">
                            <div class="xgmm">
                                <dl class="zc_dl">
                                    <dt class="ms_xiugai">默认密码：</dt>
                                    <dd><input type="password" name="password" class="zc_input" /><span class="old"></span></dd>
                                </dl>
                                <dl class="zc_dl">
                                    <dt class="ms_xiugai">新密码：</dt>
                                    <dd><input type="password" id="password" name="newpassword" class="zc_input" /><span class="new"></span></dd>
                                </dl>
                                <dl class="zc_dl">
                                    <dt class="ms_xiugai">确认密码：</dt>
                                    <dd><input type="password" id="confirmpwd" name="querenpassword" class="zc_input" /><span class="msg_confirmpwd"></span></dd>
                                </dl>
                            </div>
                        </div>
                        <div class="zyxx_cun mar_left247  mart_25 fumsg">
						<a class="chenggong" href="javascript:;"></a>
						<a class="zyxx_pj_fb gbox" href="javascript:;">关 闭</a>
						<a class="zyxx_pj_fb zyxx_lan_a jlmima" href="javascript:;" act="jlpwd">确 定</a></div>
					</form>
                    </div>
                </div>
                <!---->
                <div class="jbxx_yk_list">
                   <dl class="fix">
                        <dt class="ms_xiugai"><a href="javascript:void(0);"><img src="__PUBLIC__/images/sq.png" /></a></dt>
                        <dd>
                           <h3>申请隐身</h3>
                           <div>让别人暂时看不到自己的个人网站信息</div>
                           <div class="zyxx_www">
                           		<div class="sqys">
<?php if($ishide == 0): ?><div class="sqys_top sqs_mo fl"><a id="ms_green" href="javascript:void(0);" ishide="0">所有人可见</a></div>
<?php else: ?>
	<div class="sqys_top fl"><a id="ms_green" href="javascript:void(0);" ishide="0">所有人可见</a></div><?php endif; ?>
<?php if($ishide == 1): ?><div class="sqys_bottom sqs_mo1 fl"><a id="ms_red" href="javascript:void(0);" ishide="1">仅自己可见</a></div>
<?php else: ?>
	<div class="sqys_bottom fl"><a id="ms_red" href="javascript:void(0);" ishide="1">仅自己可见</a></div><?php endif; ?>
                                </div>
                           </div>
                       </dd>
                   </dl>
                </div>
			 </div>				 
				</div>
            </div>            	
       </div>
    </div>
    </div>
<!--***************************bottom******************************-->  
<link rel="stylesheet" href="__PUBLIC__/css/lr.css"/>
<!-- js效果 -->
<script type="text/javascript">
$(function(){
//400电话下的那个隐藏的div默认隐藏，且400默认黑色
//$("#yincang").find('span').css("color","black");
$('#kefy_posi').css('display','none');
	//400电话
	var runtel = false;//防止点击tel后触发document的点击事件，
	var runxin = false;
	$("#yincang").click(function(){
		//$("#kefy_posi").toggle();
		//$(this).find('span').css("color","black");
		 $('#kefy_posi').fadeToggle();
		$(this).find('span').css("color","red");
		runtel = false;
	});
	$(document).click(function(e){
		if(runtel){
			var target  = $(e.target);
			if(target.closest("#kefy_posi").length == 0){
				$("#kefy_posi").css("display","none");
				$("#yincang").find('span').css("color","black");
			}
		}
		runtel = true;
	});
	
	//400电话end
});
jQuery(document).ready(function($) {
	$('.weixin').click(function(){
		$('.theme-popover-mask').fadeIn(100);
		$('.theme-popover').slideDown(200);
	})
	$('.theme-poptit .close').click(function(){
		$('.theme-popover-mask').fadeOut(100);
		$('.theme-popover').slideUp(200);
	})

})
</script>	
	<div class="xinlang">
    	<div class="sina sina4"><a href="#"><i></i>用户手册</a></div>
    	<div class="sina sina1"><a href="__APP__/about/jiyu"><i></i>名师寄语</a></div>
        <div class="sina sina3"><a href="#"><i></i>合作机会</a></div>
        <div class="sina sina5"><a href="__APP__/about/jianyi"><i></i>建议反馈</a></div>
        <div class="sina sina2" style="background:none"><a href="javascript:;" class="weixin"><i></i>极速分享</a></div>  
    </div>
    <div class="bottom">
	<a href="__APP__/about">名师.SO</a><span>|</span>
	<a href="__APP__/about/contact">联系我们</a><span>|</span>
	<a href="__APP__/about/job">招聘人才</a><span>|</span>
	<a href="__APP__/about/map">网站地图</a><span>|</span>
	<a href="__APP__/about/partner">合作伙伴</a>
	</div>
 
 
 
 <!-------极速分享弹出页面-------->
 <div class="theme-popover">
     <div class="theme-poptit">
          <a href="javascript:;" title="关闭" class="close">×</a>
          <h3>分享 是一种美德</h3>
     </div>
     <div class="theme-popbod dform">
	      <div class="jsu_box">
    	     <div class="jsu_titl"><span>分享</span> 这个页面，只需3步 <span>15</span>秒钟</div>
             <div class="jsu_1">1、打开您的微信，点击<img src="__PUBLIC__/images/fx.png" />中的
			   <img src="__PUBLIC__/images/fx1.png" />
			   <span>扫一扫</span>
			   </div>
    	       <div class="jsu_2">2、对准下面的二维码扫描，跳转到这个页面</div>
               <div class="jsu_3">
			          <img width=155 height=155 src="<?php echo ($QRcodeUrl); ?>"/>
			     </div>
                 <div class="jsu_1">3、点击微信右上角的<img src="__PUBLIC__/images/fx2.png" /> ,  就可以将这个页面分享、转发和收藏</div>	
                        <div class="jsu_4 fix"><div class="fl">分享给更多人，点击</div>
						<div class="zy_share fl">
<script type="text/javascript">document.write('<a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+encodeURIComponent(location.href)+'&title=<?php echo ($info["title"]); ?>&desc=【<?php echo ($info["title"]); ?>】<?php echo ($info["summary"]); ?>...@名师网&pics=<?php echo ($info["firstimage"]); ?>&summary='+encodeURIComponent('<?php echo ($info["summary"]); ?>')+'"  target="_blank"><img src="__PUBLIC__/images/share3.png" /></a>');</script>
<script type="text/javascript">document.write('<a href="http://v.t.sina.com.cn/share/share.php?url='+encodeURIComponent(location.href)+'&appkey=3172366919&title='+encodeURIComponent('【<?php echo ($info["title"]); ?>】<?php echo ($info["summary"]); ?>...@名师网')+'&pic=<?php echo ($info["firstimage"]); ?>" title="分享到新浪微博"  target="_blank"><img src="__PUBLIC__/images/share1.png" /></a>');</script>
 <a href="javascript:;"><img src="__PUBLIC__/images/share2.png"  onclick="postToWb();" class="cu" title="分享到腾讯微博"/></a>
 <script type="text/javascript">
	                   function postToWb(){
		               var _url = encodeURIComponent(document.location);
		               var _appkey = encodeURI("cba3558104094dbaa4148d8caa436a0b");
		               var _pic = encodeURI('<?php echo ($info["firstimage"]); ?>');
		               var _site = '';
		               var _u = 'http://v.t.qq.com/share/share.php?url='+_url+'&appkey='+_appkey+'&site='+_site+'&pic='+_pic+'&title=【<?php echo ($info["title"]); ?>】<?php echo ($info["summary"]); ?>...名师网';
		               window.open( _u,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
	                   }
 </script>
 <script type="text/javascript">document.write('<a href="http://widget.renren.com/dialog/share?resourceUrl='+encodeURIComponent(location.href)+'&title='+encodeURIComponent('<?php echo ($info["title"]); ?>')+'&pic=<?php echo ($info["firstimage"]); ?>&description='+encodeURIComponent('<?php echo ($info["summary"]); ?>')+'" title="分享到人人" target="_blank"><img src="__PUBLIC__/images/share5.png" /></a>');</script>

 <script type="text/javascript">
 document.write('<a href="http://connect.qq.com/widget/shareqq/index.html?site='+encodeURIComponent('名师网')+'&pics='+encodeURIComponent('<?php echo ($info["firstimage"]); ?>')+'&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent('<?php echo ($info["title"]); ?>')+'&desc='+encodeURIComponent('名师网名师网')+'" target="_blank"><img src="__PUBLIC__/images/share4.png" /></a>');
 </script>
						</div>
				</div>
            </div>

     </div>
</div>
<div class="theme-popover-mask"></div>

<script type="text/javascript">
$(document).ready(function(e) {	
	   //点击评论弹出微信框
	   $('.yincang1').click( function () {
	       $('#k1').fadeToggle();
	   });
	   
	   //点击日历
	   $('.rili').click( function () {
	       $('#showIformation').fadeToggle();
		   var boxOff = $(this).position();
           $("#showIformation").css('top',boxOff.top+20);
           $(".i-jiao").css('left',boxOff.left+3);
		   $('#showIformation a').on('mousedown', function(event){
                return false;
            });
	        $('#showIformation').blur(function(){
	        	$("#showIformation").hide();
	        });
			
			$.ajax({
             type: "POST",
             url: "/Index/checkActive/time/",
             datatype : "xml",
             async:'false',
             data: "&time="+encodeURIComponent(time)+"&math="+Math.floor(Math.random()*1000+1),
             success: function(data){
             var flag = $(r_msg).find("flag").text();
             if(flag=='true'){
               $("#showIformation").empty().html('<h2>'+data.title+'</h2><p></p>').show();
               ispost = true;
              }else{
                //isUserName = true;
               $("#showIformation").empty().html('<div class="error"></div>').show();
               return false;
             }
            }
          });
	   });
	  
	  $("#search").click(function(){
      var tagval=$.trim($("input[name='tag']").val());
      if($.trim($("input[name='tag']").val())==''){
      alert('请填写查询标签');
	  return false;
       }else{
       window.location.href="__URL__/search/tag/" + tagval;
       }
       });
	});
</script>   
</div>
<script type="text/javascript" src="../js/iepng.js"></script>
</body>
</html>