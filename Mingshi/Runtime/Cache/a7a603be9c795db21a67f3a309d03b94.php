<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>名师.SO</title>
<link rel="stylesheet" href="__APP__/Public/css/style.css" type="text/css" />
<link rel="stylesheet" href="__APP__/Public/css/mstang.css" type="text/css" />
<link rel="stylesheet" href="__APP__/Public/css/tanchu.css" type="text/css" />
<link rel="stylesheet" href="__APP__/Public/css/mstang123.css" type="text/css" />
<?php if($userDataInfo["style"] != ''): ?><link rel="stylesheet" href="__PUBLIC__/css/<?php echo ($userDataInfo["style"]); ?>_center.css" type="text/css" />
<?php else: ?>
    <link rel="stylesheet" href="__PUBLIC__/css/black.css" type="text/css" /><?php endif; ?>
<script language="javascript" src="__PUBLIC__/js/jquery-1.10.2.js"></script>
<script language="javascript" src="__PUBLIC__/js/common.js"></script>

</head>
<body>
<div class="box">
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
    <div class="shipin fix">
    	<div class="left fl"><img src="__APP__/Public/images/sx2.png" /></div>
        <div class="right fr bk">
        	<!--div class="change" id="banner1" style="overflow:hidden">
        		<img src="__APP__/Public/images/change.jpg" />
				<img src="__APP__/Public/images/change1.jpg" />
				<img src="__APP__/Public/images/change2.jpg" />
				<img src="__APP__/Public/images/change3.jpg" />
			</div-->
            <div class="change"><a href="javascript:;"></a></div>
            <div class="user">用户登录</div>
			<form name="frm1" method="post" action="__URL__/login">
            <div class="forms">
            	<input type="text" value="用户名/手机号" class="inpu1" id="uname" name="uname" />
                <input type="text" value="密码" class="inpu1" id="password" name="password" />
                <div class="passwor">
                	<input type="checkbox" class="chk" name="remember" checked="true" />
					<i>下次自动登录</i>
					<a href="javascript:;">忘记密码？</a></div>
                <div class="login">
                	<a href="javascript:fsubmit(document.frm1);" class="a1">登 录</a>
					<a href="__APP__/Member/regjz" class="a2">注 册</a>
				</div>
            </div>
			</form>
        </div>
    </div>
	
    <div class="center fix">
    	<div class="mingshi fix">
        	<div class="titl"><span>顶级名师</span><a href="__APP__/member/all" target="_blank" class="fr you yoo">有<i><?php echo ($teaNum); ?></i>位名师在这里</a></div>
            <div class="ms_list">
<?php if(is_array($topMem)): $i = 0; $__LIST__ = $topMem;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$topVo): $mod = ($i % 2 );++$i;?><dl class="dl_list fl bk">
        <dt><a href="__APP__/member/info/uid/<?php echo ($topVo["uid"]); ?>" target="_blank"><img src="__PUBLIC__/images/90.png"  /><div class="a_posi"></div></a></dt>
        <dd>
            <p class="ms_name"><a href="__APP__/member/info/uid/<?php echo ($topVo["uid"]); ?>" target="_blank"><?php echo ($topVo["uname"]); ?></a></p>
            <p>学 科：<?php echo ($topVo["subject"]); ?></p>
            <p>教 龄：<?php echo ($topVo["teach_age"]); ?>年</p>
            <p>身 份：<?php echo ($topVo["identity"]); ?></p>
            <p>得 分：<i><?php echo number_format($topVo['pingfen'],1) ?></i>分</p>
        </dd>
    </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                      
            </div>
        </div>
        <div class="mingshi fix">
        	<div class="titl"><span>名师推荐</span><a href="__APP__/member/all" target="_blank" class="fr you yoo">挖掘名师中的黑马</a></div>
            <div class="ms_list">         
<?php if(is_array($tjMem)): $i = 0; $__LIST__ = $tjMem;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tjVo): $mod = ($i % 2 );++$i;?><dl class="dl_list fl bk">
        <dt><a href="__APP__/member/info/uid/<?php echo ($tjVo["uid"]); ?>" target="_blank"><img src="__PUBLIC__/images/90.png"  /><div class="a_posi"></div></a></dt>
        <dd>
            <p class="ms_name"><a href="__APP__/member/info/uid/<?php echo ($tjVo["uid"]); ?>" target="_blank"><?php echo ($tjVo["uname"]); ?></a></p>
            <p>学 科：<?php echo ($tjVo["subject"]); ?></p>
            <p>教 龄：<?php echo ($tjVo["teach_age"]); ?>年</p>
            <p>身 份：<?php echo ($tjVo["identity"]); ?></p>
            <p>得 分：<i><?php echo number_format($tjVo['pingfen'],1) ?></i>分</p>
        </dd>
    </dl><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    	<div class="wenzhang fix">
        	<div class="titl"><span>热门文章</span><a href="#"class="fr you">有<i><?php echo ($jzNum); ?></i>位家长在阅读</a></div>
            <div class="wz_list fix">
<?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl class="dl_wz bk fl">
        <dt><a href="__URL__/content/aid/<?php echo ($vo["aid"]); ?>" title="<?php echo ($vo["title"]); ?>">
            
<?php if(empty($vo[firstimage])): ?><img src="__PUBLIC__/images/thumb.jpg" alt="<?php echo ($vo["title"]); ?>" width="120" height="100" />						     
<?php else: ?>
	<img src="<?php echo (UPLOADS); ?>article/<?php echo ($vo["firstimage"]); ?>" alt="<?php echo ($vo["title"]); ?>" width="120" height="100" /><?php endif; ?>

           </a></dt>
        <dd>
            <p class="p_title"><a href="__APP__/Index/review/aid/<?php echo ($vo["aid"]); ?>" class="fr spann"><i></i><?php echo ($vo["rNum"]); ?></a><a href="__URL__/content/aid/<?php echo ($vo["aid"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo (msubstr($vo["title"],0,20,'utf-8',false)); ?></a></p>
            <p><span class="fr bqia">
<?php if(is_array($vo["tag"])): $i = 0; $__LIST__ = $vo["tag"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><a href="__APP__/Index/search/tag/<?php echo ($vo2); ?>" class="wz_lixian"><?php echo ($vo2); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </span><span class="nam">
            
<?php if($vo['uid'] == 0): ?><!--游客-->
	<a>游客</a>
<?php else: ?>
    <?php if($vo['ishid'] == 1): ?><!--匿名投稿-->
    	<a>佚名</a>
    <?php else: ?>
        <?php if($vo['tid'] == 2): ?><!--作者为老师即可跳转到其个人空间-->
        	<a href="__APP__/member/info/uid/<?php echo ($vo["uid"]); ?>"><?php echo ($vo["uname"]); ?></a>  				     
        <?php else: ?>
            <a><?php echo ($vo["uname"]); ?></a><?php endif; endif; endif; ?>          
            
            </span><span class="hui"></span></p>
            <p>摘要：<?php echo (msubstr($vo["summary"],0,46,'utf-8',false)); ?>...</p>
        </dd>
    </dl><?php endforeach; endif; else: echo "" ;endif; ?>
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

</body>
</html>