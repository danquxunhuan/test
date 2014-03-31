<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>添加活动</title>
<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<!--
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
-->
<link rel="stylesheet" href="__PUBLIC__/css/black.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/js/asyncbox/skins/default.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/calendar/calendar-blue.css"/>
<link href="<?php echo ($MS_PUB_PATH); ?>/css/bootstrap/bootstrap.css" rel="stylesheet" media="screen">
<link href="<?php echo ($MS_PUB_PATH); ?>/css/bootstrap/bootstrap-datetimepicker.css" rel="stylesheet" media="screen">
<script src="__PUBLIC__/js/jquery-1.9.0.min.js"></script>
<script src="__PUBLIC__/js/jquery.lazyload.js"></script>
<script src="__PUBLIC__/js/functions.js"></script>
<script src="__PUBLIC__/js/jquery.form.js"></script>
<script src="__PUBLIC__/js/asyncbox/asyncbox.js"></script>
<script src="__PUBLIC__/js/calendar/calendar.js"></script>
<script language="javascript" src="__PUBLIC__/js/common.js"></script>
<script language="javascript">
function imgdragstart(){return false;}
</script>

</head>

<body>
<script language="javascript">
for(i in document.images)document.images[i].ondragstart=imgdragstart;
</script>
<div class="box">
<!--***************************top******************************-->
<!--***************************top******************************-->
		<div class="top">
    	<div class="logo fix">
        	<div class="logo_l fl"><a href="/test/index/login"></a></div>
            <div class="bn fl">
            	<i></i>
            	<div class="index_lm"><a href="__APP__/Member">名师</a><a href="__APP__/Index" class="in_mo">精读</a></div>
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
                <div class="kefu fr"><A class="yincang" id="yincang" href="javascript:void(0);"><i class="kefu_pp"></i><span>4000-710-910</span></A>
				    <!--***************************点击显示的内容******************************-->
                	  <div class="kefy_posi" id="kefy_posi">
                    <div class="phone_none"><i></i>有什么问题？尽管拨打！<br /><sapn style="margin-top:6px;text-align:left;display:block;margin-left:4px;">分享，不仅是一种美德，还传递着我们之间的友谊。把精彩信息分享给你的朋友吧！</span>
                     <img width=100 height=100 src="<?php echo ($QRcodeUrl); ?>" style="margin:10px"/>
<script type="text/javascript">document.write('<a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+encodeURIComponent(location.href)+'&title=<?php echo ($info["title"]); ?>&desc=【<?php echo ($info["title"]); ?>】<?php echo ($info["summary"]); ?>...@名师网&pics=<?php echo ($info["firstimage"]); ?>&summary='+encodeURIComponent('<?php echo (msubstr($info["summary"],1,100,'utf-8',false)); ?>')+'"  target="_blank"><img src="__PUBLIC__/images/share3.png" /></a>');</script>
<script type="text/javascript">document.write('<a href="http://v.t.sina.com.cn/share/share.php?url='+encodeURIComponent(location.href)+'&appkey=3172366919&title='+encodeURIComponent('【<?php echo ($info["title"]); ?>】<?php echo ($info["summary"]); ?>...@名师网')+'&pic=<?php echo ($info["firstimage"]); ?>" title="分享到新浪微博"  target="_blank"><img src="__PUBLIC__/images/share1.png" /></a>');</script>
                <a href="javascript:void(0);" ><img src="__PUBLIC__/images/share2.png"  onclick="postToWb();" title="分享到腾讯微博"/></a>
				     <script type="text/javascript">
	                   function postToWb(){
		               var _t = encodeURIComponent('【<?php echo ($info["title"]); ?>】<?php echo (msubstr($info["summary"],1,100,'utf-8',false)); ?>...名师网');
		               var _url = encodeURIComponent(document.location);
		               var _appkey = encodeURI("cba3558104094dbaa4148d8caa436a0b");
		               var _pic = encodeURI('<?php echo ($info["firstimage"]); ?>');
		               var _site = '';
		               var _u = 'http://v.t.qq.com/share/share.php?url='+_url+'&appkey='+_appkey+'&site='+_site+'&pic='+_pic+'&title=【<?php echo ($info["title"]); ?>】<?php echo ($info["summary"]); ?>...名师网';
		               window.open( _u,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
	                   }
                    </script>
 <script type="text/javascript">
 document.write('<a href="http://connect.qq.com/widget/shareqq/index.html?site='+encodeURIComponent('名师网')+'&pics='+encodeURIComponent('<?php echo ($info["firstimage"]); ?>')+'&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent('<?php echo ($info["title"]); ?>')+'&desc='+encodeURIComponent('<?php echo (msubstr($info["summary"],1,100,'utf-8',false)); ?>')+'" target="_blank"><img src="__PUBLIC__/images/share4.png" /></a>');
 </script>	</div>
                    </div>

                </div>
            </div>
        </div>
       </div>      
<!--***************************content******************************-->
    <div class="content fix">
        <div class="tg_content bk">
            <div class="togo">添加活动</div>
            <div class="tj_box fix">
            	<div class="ti_dll_list fix">
				  <form action="__URL__/index" method="POST">
					<dl class="zc_dl ti_zc_dl">
                        <dt>活动主题：</dt>
                        <dd><input type="text" name="active_name" class="zc_input" value=""/></dd>
                    </dl>
					
                    <dl class="zc_dl ti_textarea fix">
                        <dt>活动介绍：</dt>
                        <dd><textarea name="introduce" id="introduce">活动</textarea></dd>
                    </dl>
                    <dl class="zc_dl ti_zc_dl318">
                        <dt>重要嘉宾：</dt>
                        <dd><input type="text" name="superman" class="zc_input" value=""/></dd>
                    </dl>
					
                    <dl class="zc_dl ti_zc_dl318">
                        <dt>活动地点：</dt>
                        <dd><input type="text" name="area" class="zc_input" value=""/></dd>
                    </dl>
					
                    <dl class="zc_dl">
                        <dt>活动时间：</dt>
                        <dd class="ms_fu mrr_12" style="z-index:101">
					<!-- 时间输入框    start -->
<input id="from_datetime" name="start_time" type="text" class="zc_input" placeholder="开始日期" data-date-format="yyyy-mm-dd hh:ii" data-date="<?php echo date('Y-m-d',time());?>T14:25:07Z" />
					<!-- 时间输入框    end -->
                        </dd>
                        <dd class="ms_fu" style="z-index:101">
                    <!-- 时间输入框    start -->
<input id="to_datetime" name="end_time" type="text" class="zc_input" placeholder="结束日期" data-date-format="yyyy-mm-dd hh:ii" data-date="<?php echo date('Y-m-d',time());?>T14:25:07Z" />
            		<!-- 时间输入框    end -->
                        </dd>
                    </dl>
					
                    <dl class="zc_dl ti_zc_dl318">
                        <dt>主办单位：</dt>
                        <dd><input type="text" name="sponsor" class="zc_input" value=""/></dd>
                    </dl>
                    
                    <dl class="zc_dl ti_zc_dl318">
                        <dt>活动链接：</dt>
                        <dd><input type="text" name="link" class="zc_input" value="http://" /></dd>
                    </dl>
					
					
				  </form>	
                </div>
            	<div class="tg_ck ti_tg_ck fix"><a class="pj_fb submit" href="javascript:void(0);">提 交</a></div>
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
<script type="text/javascript" src="__PUBLIC__/js/iepng.js"></script>
        <script type="text/javascript">
		
		function getLength(str) {
           var realLength = 0, len = str.length;
          return realLength;
        };
             $(".submit").click(function(){
				 if($.trim($("input[name='active_name']").val())==''){
					 popup.alert("亲,活动主题不能为空");
					 return false;
				 }
				 var len =$('#introduce').val().length;
				 if($.trim($("#introduce").val().length) < 50){
					 popup.alert("亲,多多写一些,让更多的人关注");
					 return false;
				 }
				 if($.trim($("input[name='superman']").val())==''){
					 popup.alert("亲,请填写重要嘉宾");
					 return false;
				 }
				 if($.trim($("input[name='area']").val())==''){
					 popup.alert("亲,活动地点不能为空呀");
					 return false;
				 }
				 if($.trim($("input[name='start_time']").val())==''){
					 popup.alert("亲,活动开始时间不能为空呀");
					 return false;
				 }
				 if($.trim($("input[name='end_time']").val())==''){
					 popup.alert("亲,活动结束时间不能为空呀");
					 return false;
				 }
				 if($.trim($("input[name='sponsor']").val())==''){
					 popup.alert("亲,请填写主办单位");
					 return false;
				 }
				 if($.trim($("input[name='link']").val())=='http://' || $("input[name='link']").val())==''){
					 popup.alert("亲,请填写活动的具体链接地址");
					 return false;
				 }
					
                    commonAjaxSubmit();
                    return false;
                });
        </script>
<!--时间插件开始-->
<script type="text/javascript" src="<?php echo ($MS_PUB_PATH); ?>/jquery/bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo ($MS_PUB_PATH); ?>/jquery/bootstrap/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo ($MS_PUB_PATH); ?>/jquery/bootstrap/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('#from_datetime').datetimepicker({
        language:  'zh-CN',
        format: 'yyyy-mm-dd hh:ii',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1,
		initialDate:2013-12-23
        //pickerPosition: "bottom-left"
    });
    $('#to_datetime').datetimepicker({
        language:  'zh-CN',
        format: 'yyyy-mm-dd hh:ii',
        weekStart: 1,
        todayBtn:  0,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1,
        //pickerPosition: "bottom-left"
    });
</script>
<!--时间插件结束-->
<script type="text/javascript" src="<?php echo ($MS_PUB_PATH); ?>/js/iepng.js"></script>
</body>
</html>