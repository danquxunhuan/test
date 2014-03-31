<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>家长注册</title>
<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/black.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/Js/asyncbox/skins/zcms.css"/>
<link rel="stylesheet" href="__PUBLIC__/css/zuce.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/tanchu.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/calendar/calendar-blue.css"/>
<script src="__PUBLIC__/js/jquery-1.9.0.min.js"></script>
<script src="__PUBLIC__/js/jquery.lazyload.js"></script>
<script src="__PUBLIC__/js/functions.js"></script>
<script src="__PUBLIC__/js/jquery.form.js"></script>
<script src="__PUBLIC__/js/asyncbox/asyncbox.js"></script>
<script src="__PUBLIC__/js/calendar/calendar.js"></script>
<script language="javascript" src="__PUBLIC__/js/common.js"></script>
<script src="__PUBLIC__/js/reg.js"></script>
<script src="__PUBLIC__/js/iepng.js"></script>
<style type="text/css"><!--
body{ font-size:12px;}
--></style>
</head>

<body>
<div class="box">
<!--***************************top******************************-->
<!--***************************top******************************-->
		<div class="top">
    	<div class="logo fix">
        	<div class="logo_l fl"><a href="__APP__/index/login"></a></div>
            <div class="bn fl">
            	<i></i>
            	<div class="index_lm"><a href="__APP__/Member">名师</a><a href="__APP__/Index">精读</a></div>
            </div>
            <div class="lo_r fr">
            	<div class="togao fr">
				<a href="__APP__/index/find" class="lo_a">找名师</a>				
				<a href="__APP__/index/tougao" class="to_bj">投 稿</a>
				<a href="__APP__/member/center/uid/<?php echo ($userDataInfo["uid"]); ?>" class="a_nopad"><?php echo ($userDataInfo["uname"]); ?></a>
				<a href="javascript:;" class="lo_abj index_xiala"></a>
                    <ul class="lo_abj_ul" id="index_show">
                    	<li><a href="__APP__/index/loginout">退出登录</a></li>
                    	<li><a href="#">小学版</a></li>
                        <li><a href="#">初中版</a></li>
                        <li><a href="#">高中版</a></li>
                    </ul>
				</div>
                <div class="kefu fr"><A class="yincang" id="yincang" href="javascript:void(0);"><i class="kefu_pp"></i><span>4000-710-910</span></A>
				    <!--***************************点击显示的内容******************************-->
                	  <div class="kefy_posi" id="kefy_posi">
                    <div class="phone_none"><i></i>有什么问题？尽管拨打！<br /><sapn style="margin-top:6px;text-align:left;display:block;margin-left:4px;">分享，不仅是一种美德，还传递着我们之间的友谊。把精彩信息分享给你的朋友吧！</span>
                     <img width=110 height=110 src="<?php echo ($QRcodeUrl); ?>" style="margin:10px"/>
                 <script type="text/javascript">document.write('<a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+encodeURIComponent(location.href)+'" title="分享到QQ空间"  target="_blank"><img src="__PUBLIC__/images/share3.png" /></a>');</script>
                 <script type="text/javascript">document.write('<a href="http://v.t.sina.com.cn/share/share.php?url='+encodeURIComponent(location.href)+'&appkey=3172366919&title='+encodeURIComponent('<?php echo ($info["title"]); ?>')+'" title="分享到新浪微博"  target="_blank"><img src="__PUBLIC__/images/share1.png" /></a>');</script>
                 <a href="javascript:void(0);"><img src="__PUBLIC__/images/share2.png"  onclick="postToWb();" title="分享到腾讯微博"/></a>
				    <script type="text/javascript">
	                   function postToWb(){
		               var _t = encodeURI('【<?php echo ($info["title"]); ?>】<?php echo ($info["summary"]); ?>');
		               var _url = encodeURIComponent(document.location);
		               var _appkey = encodeURI("cba3558104094dbaa4148d8caa436a0b");
		               var _pic = encodeURI('<?php echo ($info["firstimage"]); ?>');
		               var _site = '';
		               var _u = 'http://v.t.qq.com/share/share.php?url='+_url+'&appkey='+_appkey+'&site='+_site+'&pic='+_pic+'&title='+_t;
		               window.open( _u,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
	                   }
                    </script>
 <script type="text/javascript">
 document.write('<a href="http://connect.qq.com/widget/shareqq/index.html?site='+encodeURIComponent('<?php echo ($info["firstimage"]); ?>')+'&pics='+encodeURIComponent('<?php echo ($info["firstimage"]); ?>')+'&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent('<?php echo ($info["summary"]); ?>')+'&desc='+encodeURIComponent('<?php echo ($info["summary"]); ?>')+'" target="_blank"><img src="__PUBLIC__/images/share4.png" /></a>');
 </script>	</div>
                    </div>

                </div>
            </div>
        </div>
       </div>   
<!--***************************content******************************-->
    <div class="content">
        <div class="zc_content bk">
            <div class="zc_title">
                <div class="zc_left fl" >
				<ul id="news">
				<li class="zc_momo"><a  href="javascript:;"  class="mli zc_moo" id="mli1">家长注册</a></li>
				<li><a href="__URL__/regms" class="mli zc_moo" id="mli2" >名师注册</a></li>
				</ul>
				</div>
                <div class="zc_right fr">已有<i>名师.SO</i>账号<a href="index.html" class="zc_ys">登录</a></div>
            </div>
			  <div class="jianzhang cons" id="con1">
             <div class="zc_zuo">
			    <form method="post" action="__URL__/insert" id='form1' name='fm'  >
            	  <!--dl class="xinzc_dl">
                	  <dt class="letter">邀请码：</dt>
                    <dd>
					<div class="xinzc_div">
					<input type="text" id="yqm_sn" name="yqm_sn" class="xinzc_input" onfocus='msgEvent("yqm_sn",1);' onblur='msgEvent("yqm_sn",0)' />
					<div id="msg_yqm" style="display:none;float:right" class="error"></div>
					</div>   
					</dd>
                </dl-->
            	  <dl class="xinzc_dl">
				    <dt class="letter">用户名：</dt>
					  <dd>
                	  <div class="xinzc_div">
					    <input type="text" id="uname" name="uname" class="xinzc_input"   onfocus='msgEvent("uname",1);' onblur='msgEvent("uname",0)' />
						 <div id="msg_username" style="display: none;float:right"class="error" ></div>
					  </div>
					  </dd>
                </dl>
                
                <dl class="xinzc_dl"><table><tr><td><dt class="letter">手机号：</dt></td><td><dd><div class="xinzc_div xinzc_div178"> 
					    <input type="text" id="phone" name="phone" class="xinzc_input xinzc_div73" onfocus='msgEvent("phone",1);' onblur='msgEvent("phone",0)' />
						 <div id="msg_phone" style="display:none;float:left" class="error" ></div>
					</div>
					</dd></td><td><div class="inptyqm zc_yz fr"><a href="#">获取验证码</a></div></td></tr></table></dl>
                <dl class="xinzc_dl">
                	<dt class="letter">验证码：</dt>
                    <dd><div class="xinzc_div xinzc_div1"><input type="text" class="xinzc_input" /></div></dd>
                </dl>
                <dl class="xinzc_dl">
                	<dt>孩子年级：</dt>
                    <dd class="dd_posi1">
					     
		                     <select id="m1" name="classid" class="select1">
							     <option value="">-选择年级-</option>
					               <?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($voo["id"]); ?>"><?php echo ($voo['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
							    </select>
						 
					  </dd>
                </dl>
                <dl class="xinzc_dl">
                	<dt>常住地区：</dt>
				   
				   
				    <dd class="zc_tab">
                                        <div class="zc_text_box">
                                               <select id="province" name="province" class="select2">
                                                    <option value="">市</option>
                                                <?php if(is_array($areaData)): $i = 0; $__LIST__ = $areaData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>"><?php echo ($val["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                                </select>&nbsp;&nbsp;
                                                <select id="city" name="city" class="select2">
                                                    <option value="">区</option>
                                                </select>&nbsp;&nbsp;
                                                <select id="area" name="area" class="select2">
                                                    <option value="">县</option>
                                                </select>
					                        </div>
				    </dd>				   
                </dl>	
                <dl class="xinzc_dl">
                	<dt class="letter1">密码：</dt>
                    <dd>
					<div class="xinzc_div">
					     <input type="password" id="password" name="password" class="xinzc_input" onfocus='msgEvent("password",1);' onblur='msgEvent("password",0)' />
					     <div id="msg_password" style="display: none;float:left" class="error"></div>
					</div>
					</dd>
                </dl>
                <dl class="xinzc_dl">
                	<dt>确认密码：</dt>
                    <dd>
					<div class="xinzc_div">
					<input type="password" id="confirmpwd"  name="confirmpwd"  class="xinzc_input" onfocus='msgEvent("confirmpwd",1);' onblur='msgEvent("confirmpwd",0)' />
					      <div id="msg_confirmpwd" style="display: none;float:left"  class="error" ></div>
					</dd>
                </dl>
				   <input type="hidden" name="tid" value="1" />
				  
                <div class="zc_check"><p class="fl"><input type="checkbox"  id="chk_treaty" /></p><p class="fl">我已阅读并同意<a href="#" class="zc_colo">《名师.SO用户使用协议》</a></p></div>
                <div class="zc_login"><a href="javascript:void(0);" class="zc_mr submit">免费注册</a><a href="index.html">返回登录</a></div>
               </form>
			</div>
            <div class="zc_you">
                <div class="apple_title"><span>我们为家长做三件很酷的事情</span></div>
                <div class="apple_fff fff">
                    <dl class="zc_5tiao">
                            <dt><img src="__PUBLIC__/images/zc_4.png" /></dt>
                            <dd>
                                <p class="zc_sx">第一，帮您孩子找名师</p>
                                <p class="zc_p">勤奋聪明的学生只有幸遇良师才能如虎添翼，我们乐此不疲！</p>
                            </dd>
                        </dl>
                        <dl class="zc_5tiao">
                            <dt><img src="__PUBLIC__/images/zc_5.png" /></dt>
                            <dd>
                                <p class="zc_sx">第二，帮您监管教学内容</p>
                                <p class="zc_p">教学目标、计划、内容都有学科专家帮您层层把关，学习效果当然更好！</p>
                            </dd>
                        </dl>
                        <dl class="zc_5tiao">
                            <dt><img src="__PUBLIC__/images/zc_6.png" /></dt>
                            <dd>
                                <p class="zc_sx">第三，帮您获取重要信息</p>
                                <p class="zc_p">百里挑一，让您用最少的时间实现最想要的阅读！</p>
                            </dd>
                        </dl>
                </div>
            </div>
			</div>			 
			<!-------------------------------------------------名师----------------------------------------------------------->
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
<script type="text/javascript">
 $(".submit").click(function(){
             regSubmit();
            commonAjaxSubmit('insert');
});
 $(".submit1").click(function(){
            regSubmit1();
            commonAjaxSubmit('insert1');
});	   
</script>

</body>
</html>