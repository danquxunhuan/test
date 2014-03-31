<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>小学/初中/高中名师库</title>
<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/tanchu.css" type="text/css" />
<?php if($userDataInfo["style"] != ''): ?><link rel="stylesheet" href="__PUBLIC__/css/<?php echo ($userDataInfo["style"]); ?>_center.css" type="text/css" />
<?php else: ?>
<link rel="stylesheet" href="__PUBLIC__/css/black.css" type="text/css" /><?php endif; ?>
<script src="__PUBLIC__/js/jquery-1.9.0.min.js"></script>
<script language="javascript" src="__PUBLIC__/js/common.js"></script>
<script language="javascript">
function imgdragstart(){return false;}
</script>
<script>
    
$(function(){
	$('.show').click(function(){
		$(this).parents('.ku_diji').find('ul').fadeToggle();
		runtel = false;
	});
	$('.ku_diji ul li a').click(function(){
		$(this).parents('li').parents('ul').fadeToggle();
		$(this).parents('li').parents('ul').parents('.ku_diji').find('.show').text($(this).text());
		var act =$(this).attr('act');
		if(act == 'keshifei'){
			window.location.href="__URL__/all/payment/"+$(this).text();
		}else if (act == "shenfen"){
			window.location.href="__URL__/all/identity/"+$(this).text();
		}
		
	});
	var runtel = false;//防止点击tel后触发document的点击事件
	$(document).click(function(e){
		if(runtel){
			var target  = $(e.target);
			if(target.closest("#show1").length == 0){
				$("#show1").css("display","none");
			}
			if(target.closest("#show2").length == 0){
				$("#show2").css("display","none");
			}
		}
		runtel = true;
	});
});	
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
        	<div class="logo_l fl"><a href="__APP__/index/login"></a></div>
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
                <div class="kefu fr"><A class="yincang" id="yincang" href="javascript:void(0);"><i class="kefu_pp"></i><span>4000-710-910</span></A>
				    <!--***************************点击显示的内容******************************-->
                	  <div class="kefy_posi" id="kefy_posi">
                    <div class="phone_none"><i></i>有什么问题？尽管拨打！<br />
					<sapn style="margin-top:6px;text-align:left;display:block;margin-left:4px;">
					分享，不仅是一种美德，还传递着我们之间的友谊。把精彩信息分享给你的朋友吧！
					</span>
                     <img width=100 height=100 src="<?php echo ($QRcodeUrl); ?>" style="margin:10px"/>
                 <script type="text/javascript">document.write('<a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+encodeURIComponent(location.href)+'" title="分享到QQ空间"  target="_blank"><img src="__PUBLIC__/images/share3.png" /></a>');</script>
                 <script type="text/javascript">document.write('<a href="http://v.t.sina.com.cn/share/share.php?url='+encodeURIComponent(location.href)+'&appkey=3172366919&title='+encodeURIComponent('<?php echo ($info["title"]); ?>')+'" title="分享到新浪微博"  target="_blank"><img src="__PUBLIC__/images/share1.png" /></a>');</script>
                 <a href="javascript:void(0);"><img src="__PUBLIC__/images/share2.png"  onclick="postToWb();" title="分享到腾讯微博"/></a>
				    <script type="text/javascript">
	                   function postToWb(){
		               var _t = encodeURI(document.title);
		               var _url = encodeURIComponent(document.location);
		               var _appkey = encodeURI("cba3558104094dbaa4148d8caa436a0b");
		               var _pic = encodeURI('<?php echo ($info["firstimage"]); ?>');
		               var _site = '';
		               var _u = 'http://v.t.qq.com/share/share.php?url='+_url+'&appkey='+_appkey+'&site='+_site+'&pic='+_pic+'&title='+_t;
		               window.open( _u,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
	                   }
                    </script>
 <script type="text/javascript">
 document.write('<a href="http://connect.qq.com/widget/shareqq/index.html?site='+encodeURIComponent('名师网')+'&pics='+encodeURIComponent('<?php echo ($info["firstimage"]); ?>')+'&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title)+'&desc='+encodeURIComponent('名师网，名师网')+'" target="_blank"><img src="__PUBLIC__/images/share4.png" /></a>');
 </script>	</div>
                    </div>

                </div>
            </div>
        </div>
       </div>      
<!--***************************content******************************-->
    <div class="content fix">
        <div class="zy_content bk fix">
        	<div class="zy_title">
                <div class="zy_one fl">
				<?php if($_GET['obj_id'] != ''): ?><A href="__URL__/all" >全 部</A>
				<?php else: ?>
				<A href="__URL__/all" class="zy_a1">全 部</A><?php endif; ?>
				     <?php if(is_array($obj)): $i = 0; $__LIST__ = $obj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["id"] == $_GET['obj_id']): ?><a href="__URL__/all/obj_id/<?php echo ($vo["id"]); ?>" class="zy_a1"><?php echo ($vo["subject"]); ?></a>
						 <?php else: ?>
						 	<a href="__URL__/all/obj_id/<?php echo ($vo["id"]); ?>" ><?php echo ($vo["subject"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</div>
                <div class="ku_right fr">
				    <div class="ku_rr"><a href="javascript:;"></a></div>
                  	<div class="ku_diji">
                    	<ul class="yinc" id="show1">
                        	<li><a act="shenfen" href="javascript:;"  >顶级名师</a></li>
                        	<li><a act="shenfen" href="javascript:;"  >VIP 名师</a></li>
                            <li><a act="shenfen" href="javascript:;"  >一线名师</a></li>
                            <li><a act="shenfen" href="javascript:;"  >机构名师</a></li>
                            <li><a act="shenfen" href="javascript:;"  >名校学生</a></li>
                        </ul>
                        <a href="javascript:;" class="show"><?php if($_GET['identity']): echo ($_GET['identity']); else: ?>身&nbsp;&nbsp;份<?php endif; ?><i></i></a>
                    </div>
                    <div class="ku_diji">
                    	<ul class="yinc" id="show2">
                        	<li><a act="keshifei" href="javascript:;">50~150</a></li>
                            <li><a act="keshifei" href="javascript:;">150~300</a></li>
                            <li><a act="keshifei" href="javascript:;">300~500</a></li>
                            <li><a act="keshifei" href="javascript:;">500~999</a></li>
                            <li><a act="keshifei" href="javascript:;">1000~+</a></li>
                        </ul>
                        <a href="javascript:;" class="show"><?php if($_GET['payment']): echo ($_GET['payment']); else: ?>课&nbsp;&nbsp;酬<?php endif; ?><i></i></a>
                    </div>
                    
                </div>
        	</div>
            <div class="ku_con">
            	<div class="zy_botom fix zy_botom_top10">
<!--老师列表-->
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="zzy_one zzy_one_duan">
        <dl class="dl_list fl">
            <dt><a href="__URL__/info/uid/<?php echo ($vo["uid"]); ?>"><img src="__PUBLIC__/images/90_1.png"  /><div class="a_posi"></div></a></dt>
            <dd>
                <p class="ms_name"><a href="__URL__/info/uid/<?php echo ($vo["uid"]); ?>"><?php echo ($vo["uname"]); ?></a></p>
                <p>学 科：<?php echo ($vo["subject"]); ?></p>
                <p>教 龄：<?php echo ($vo["teach_age"]); ?>年</p>
                <p>课 酬：<?php echo ($vo["keshifei"]); ?>元/时</p>
                <p>评 分：<i><?php echo number_format($vo['pingfen'],1); ?></i>分</p>
            </dd>
        </dl>
        <div class="zy_ping zy_zy_ping">
            <div class="zy_ping_s">全部评价（<?php echo ($vo["all"]); ?>条）</div>
            <ul class="zy_jdu">
<li>好 评：<span class="zy_span"><span style="width:<?php echo ($vo["goodWidth"]); ?>%;"></span></span><a><i><?php echo ($vo["good"]); ?></i>条</a></li>
<li>中 评：<span class="zy_span"><span style="width:<?php echo ($vo["betterWidth"]); ?>%;"></span></span><a><i><?php echo ($vo["better"]); ?></i>条</a></li>
<li>差 评：<span class="zy_span"><span style="width:<?php echo ($vo["badWidth"]); ?>%;"></span></span><a><i><?php echo ($vo["bad"]); ?></i>条</a></li>
            </ul>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>	
                </div>

            </div>
            <div class="zy_fenye ku_zy_fenye"><?php echo ($page); ?></div>
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
</body>
</html>