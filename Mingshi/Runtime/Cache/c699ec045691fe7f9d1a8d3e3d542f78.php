<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>精读</title>
<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<?php if($userDataInfo["style"] != ''): ?><link rel="stylesheet" href="__PUBLIC__/css/<?php echo ($userDataInfo["style"]); ?>_center.css" type="text/css" />
<?php else: ?>
<link rel="stylesheet" href="__PUBLIC__/css/black.css" type="text/css" /><?php endif; ?>
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/tanchu.css" type="text/css" />
<script language="javascript" charset="utf-8" src="__PUBLIC__/js/jquery.js"></script>
<script language="javascript" charset="utf-8" src="__PUBLIC__/js/hx_act_calendar.js"></script>
<script language="javascript" charset="utf-8" src="__PUBLIC__/js/common.js"></script>
<script src="__PUBLIC__/js/search.js"></script>  
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
    <div class="content">
        <div class="wz_content bk fix">
        	<div class="wz_left fl">
			   <?php if(($_GET['p'] == 1) OR ($_GET['p'] == '')): ?><div class="wz_title"><a href="__URL__/content/aid/<?php echo ($top["aid"]); ?>"><?php echo ($top["title"]); ?></a></div>
                <p class="wz_p"><?php echo (msubstr($top["summary"],0,100,'utf-8',false)); ?></p>
                <div class="wz_img"><a href="__URL__/content/aid/<?php echo ($top["aid"]); ?>"><img src="<?php echo (UPLOADS); ?>article/<?php echo ($top["firstimage"]); ?>" alt="<?php echo ($top["title"]); ?>" /></a></div>
                    <div class="wz_time">

<?php if($top['tid'] == 2): ?><!--作者为老师即可跳转到其个人空间-->
    <a href="__APP__/member/info/uid/<?php echo ($top["uid"]); ?>"><?php echo ($top["uname"]); ?></a>  				     
<?php else: ?>
    <a><?php echo ($top["uname"]); ?></a><?php endif; ?>
  
                    <i class="wz_lr"><?php echo (date("Y-m-d",$top["create_time"])); ?></i>
				          <!------tag标签----->
      <?php for($i=0;$i<$tagCount;$i++){ echo "<a href='__URL__/search/tag/$tagInfo[$i]' class='wz_lixian'>".$tagInfo[$i]."</a>"; } ?>
						<a href="__URL__/review/aid/<?php echo ($top["aid"]); ?>" class="wz_xinxi"><?php echo ($top["rnum"]); ?></a>
				    </div><?php endif; ?>
<!--------左侧.文章列表--------->	
                <div class="wz_lists">
				   <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl class="fix">
                      	<dt><a href="__URL__/content/aid/<?php echo ($vo["aid"]); ?>">
						     <?php if(empty($vo[firstimage])): ?><img src="__PUBLIC__/images/thumb.jpg" />						     
							 <?php else: ?>
							 	<img src="<?php echo (UPLOADS); ?>article/<?php echo ($vo["firstimage"]); ?>" alt="<?php echo ($vo["title"]); ?>" /><?php endif; ?>
						     </a>
						 </dt>
                        <dd>
<p class="wz_p1"><a href="__URL__/content/aid/<?php echo ($vo["aid"]); ?>"><?php echo ($vo["title"]); ?></a></p>
<p class="wz_p2">
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
<?php echo (date("Y-m-d",$vo["up_time"])); ?></p>
<p class="wz_p3">摘要：<?php echo (msubstr($vo["summary"],1,95,'utf-8',false)); ?></p>
<p class="wz_p4">
      <a href="__URL__/review/aid/<?php echo ($vo["aid"]); ?>" class="wz_a1 fr"><?php echo ($vo["rNum"]); ?></a>
          <?php if(is_array($vo["tag"])): foreach($vo["tag"] as $key=>$vo2): ?><a href='__URL__/search/tag/<?php echo ($vo2); ?>' class='wz_lixian'><?php echo ($vo2); ?></a><?php endforeach; endif; ?>
</p>
                        </dd>
                     </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="zy_fenye"><?php echo ($page); ?></div>
        	</div>
<!--------右侧---------->
            <div class="wz_right fr">
            <!--------右侧.搜索---------->
            	<div class="wz_so">
                	<div class="wz_so_t">
					  <?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="__URL__/search/tag/<?php echo ($vo["tag"]); ?>"><?php echo ($vo["tag"]); ?></a><span>|</span><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<div class="wz_so_b"><input type="text" value="" name="tag" placeholder="搜索" id="tag" /><a href="javascript:void(0);" id="search">搜索</a></div>
                </div>
              <!--------右侧.活动日历----------> 
				  <div class="wz_rili">
                	<div class="wz_hot_titl wz_hot_titlyy"><a href="__APP__/active/active">添加活动</a>活动日历</div>
                    <div class="wz_rili_img Calendar">
						<div id="idCalendarPre">&lt;&lt;</div>
                        <div id="idCalendarNext">&gt;&gt;</div>
                          <span id="idCalendarYear"></span>年 <span id="idCalendarMonth"></span>月
                      <table cellspacing="0" class="table-top">
                        <thead>
                            <tr>
                             <td>日</td>
                             <td>一</td>
                             <td>二</td>
                             <td>三</td>
                             <td>四</td>
                             <td>五</td>
                             <td>六</td>
                            </tr>
                        </thead>
                      </table>
                       <table cellspacing="0">
                         <tbody id="idCalendar"></tbody>
                       </table>
                      <div id="showIformation" tabindex="0"></div>
                    </div>
                </div>
                <!--------右侧.活动日历----------> 
<!--热门文章--><!--精彩评论--><!--最新评论-->
<!--热门文章-->	
<div class="wz_hot">
<div class="wz_hot_titl">热门文章</div>
     <?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voh): $mod = ($i % 2 );++$i;?><dl class="wz_p_no">
        <dt>
            <a href="__URL__/content/aid/<?php echo ($voh["aid"]); ?>">
            <?php if(empty($voh[firstimage])): ?><img src="__PUBLIC__/images/100.png" />						     
            <?php else: ?>
            	<img src="<?php echo (UPLOADS); ?>article/<?php echo ($voh["firstimage"]); ?>" alt="<?php echo ($voh["title"]); ?>" width=100 height=60 /><?php endif; ?>
            </a>
        </dt>
        <dd>
            <p><a href="__URL__/content/aid/<?php echo ($voh["aid"]); ?>"><?php echo (msubstr($voh["title"],0,12,'utf-8',false)); ?></a></p>
            <div>
<?php if($voh['uid'] == 0): ?><!--游客-->
	<a class="su">游客</a>
<?php else: ?>
    <?php if($voh['ishid'] == 1): ?><!--匿名投稿-->
        <a class="su">佚名</a>
    <?php else: ?>
        <?php if($voh['tid'] == 2): ?><!--作者为老师即可跳转到其个人空间-->
        	<a href="__APP__/member/info/uid/<?php echo ($voh["uid"]); ?>"><?php echo ($voh["uname"]); ?></a>			     
        <?php else: ?>
            <a class="su"><?php echo ($voh["uname"]); ?></a><?php endif; endif; endif; ?>        
            
            </div>

            <p class="wz_hot_p"><a href="__URL__/review/aid/<?php echo ($voh["aid"]); ?>"><?php echo ($voh["rNum"]); ?></a><span><?php echo (date("Y-m-d",$voh["up_time"])); ?></span></p>
        </dd>
    </dl><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<!--精彩评论-->
<div class="wz_jingcai">
	<div class="wz_hot_titl wz_hot_titl2">精彩评论</div>
    <?php if(is_array($hotR)): $i = 0; $__LIST__ = $hotR;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vor): $mod = ($i % 2 );++$i;?><div class="wz_bor">
            <p class="wz_y"><a href="__URL__/content/aid/<?php echo ($vor["aid"]); ?>">原文：<?php echo ($vor["title"]); ?></a></p>
            <dl class="wz_y_dl">
                <dt><a href="__APP__/member/info/uid/<?php echo ($vor["uid"]); ?>"><img src="__PUBLIC__/images/37.png" alt="<?php echo ($vor["image"]); ?>" /></a></dt>
                <dd>
                    <p class="wz_mi"><a href="__APP__/member/info/uid/<?php echo ($vor["uid"]); ?>"><?php echo ($vor["username"]); ?></a></p>
                    <p class="wz_mi_b">详细内容</p>
                </dd>
            </dl>
            <div class="wz_posi"><i></i><a href="__URL__/content/aid/<?php echo ($vor["aid"]); ?>#auto_<?php echo ($vor["id"]); ?>1"><?php echo ($vor["msg"]); ?>...</a></div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<!--最新评论-->
<div class="wz_jingcai">
	<div class="wz_hot_titl wz_hot_titl2">最新评论</div>
	<?php if(is_array($newR)): $i = 0; $__LIST__ = $newR;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$von): $mod = ($i % 2 );++$i;?><div class="wz_bor">
    <p class="wz_y"><a href="__URL__/content/aid/<?php echo ($von["aid"]); ?>">原文：<?php echo ($von["title"]); ?></a></p>
    <dl class="wz_y_dl">
        <dt><a href="__APP__/member/info/uid/<?php echo ($von["uid"]); ?>"><img src="__PUBLIC__/images/37.png" /></a></dt>
        <dd>
            <p class="wz_mi"><a href="__APP__/member/info/uid/<?php echo ($von["uid"]); ?>"><?php echo ($von["uname"]); ?></a></p>
            <p class="wz_mi_b">详细内容</p>
        </dd>
    </dl>
    <div class="wz_posi"><i></i><a href="__URL__/review/aid/<?php echo ($von["aid"]); ?>#auto_<?php echo ($von["id"]); ?>1"><?php echo ($von["msg"]); ?>...</a></div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<!--最新评论结束-->  
            </div>
        </div>
    </div>
<!-----------bottom--------> 
<script src="__PUBLIC__/js/jquery.min.js"></script>  
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
<?php if($userDataInfo["uid"] != ''): ?><div id="overlay" class="box" style="padding-top:30px;display:none">
<?php else: ?>
    <div id="overlay" class="box" style="padding-top:30px;"><?php endif; ?>
	<div class="tc_box tc_box1" style="margin:0 auto">
    	<div class="tc_title tc_title1 screenAdClose"><a href="javascript:;">×</a></div>
        <div class="tc_forms tc_forms1">
		<a href="__APP__/index/index/type/1" class="xiao_chu1"></a>
		<a href="__APP__/index/index/type/2" class="xiao_chu2"></a>
		<a href="__APP__/index/index/type/3" class="xiao_chu3"></a>
		</div>
    </div>
</div>

<script>
    $(document).ready(function () {
        //遮罩层
        var tipOverlay = $('#overlay');
        if (tipOverlay.length> 0) {
            $(".screenAdClose,.xiao_chu1,.xiao_chu2,.xiao_chu3", tipOverlay).click(function () { tipOverlay.fadeOut(); });
            window.setTimeout(function () { tipOverlay.fadeOut(); }, 5000);
        }
    });
</script>
<script type="text/javascript">
function add_favorite(title) {
		$.getJSON('__URL__/add_favorite/title/'+encodeURIComponent(title)+'/url/'+encodeURIComponent(location.href)+'&'+Math.random()+'/callback/?', function(data){
			if(data.status==1)	{
				$("#favorite").html('收藏成功');
			} else {
				alert('请登录');
			}
		});
	}
</script>
<script language="javascript" for="document" event="onkeydown"> 
if(event.keyCode==13) 
document.getElementById("search").click();
</script>
<script type="text/javascript" src="__PUBLIC__/js/iepng.js"></script>
</body>

</html>