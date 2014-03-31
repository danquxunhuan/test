<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=7" />
<title>找名师</title>
<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<?php if($userDataInfo["style"] != ''): ?><link rel="stylesheet" href="__PUBLIC__/css/<?php echo ($userDataInfo["style"]); ?>_center.css" type="text/css" />
<?php else: ?>
<link rel="stylesheet" href="__PUBLIC__/css/black.css" type="text/css" /><?php endif; ?>
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/Js/asyncbox/skins/default.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/calendar/calendar-blue.css"/>
<script src="__PUBLIC__/js/jquery-1.9.0.min.js"></script>
<script src="__PUBLIC__/js/jquery.lazyload.js"></script>
<script src="__PUBLIC__/js/functions.js"></script>
<script src="__PUBLIC__/js/jquery.form.js"></script>
<script src="__PUBLIC__/js/asyncbox/asyncbox.js"></script>
<script src="__PUBLIC__/js/calendar/calendar.js"></script>
<script language="javascript" src="__PUBLIC__/js/common.js"></script>
<script src="__PUBLIC__/js/reg.js"></script>
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
        <div class="ms_content bk fix">
            <div class="ms_title">五种方式 帮您孩子找名师</div>
            <p class="ms_p">名师.SO聘请各科名师，并将名师信息以文字、图片、视频等多种方式全面展现，还请顶级专家为名师评价打分。在这里，家长们可以真的了解名师，找到自己孩子的名师，因材施教，高效培优。
</p>
            <ul class="ms_5 fix">
            	<li class="ms_no1">
                	<a href="__APP__/member/all" target="_blank" class="ms_a1"><img src="__PUBLIC__/images/ms_5.png" /><span class="ms_phone">自助找名师</span>
                    <div class="ms_a2"><span class="ms_phone ms_phone1">自助找名师</span><p>您在排行榜或名师库中查找名师，看中谁就预约谁上课试讲。<br /><span class="ms_zx">马上查找</span>
</p></div></a>
                </li>
            	<li class="ms_no1">
                	<a class="ms_a1"><img src="__PUBLIC__/images/ms_1.png" /><span class="ms_phone">400电话</span>
                	<div class="ms_a2"><span class="ms_phone ms_phone1">400电话</span><p>拨打<i>4000-710-910</i>，让对名师了如指掌的教育咨询师帮助您一步到位。</p></div></a>
                </li>
                <li class="ms_no1">
                	<a href="#ppp" class="ms_a1" ><img src="__PUBLIC__/images/ms_4.png" /><span class="ms_phone">填表找名师</span>
                    <div class="ms_a2"><span class="ms_phone ms_phone1">填表找名师</span><p>请您填写找名师的需求信息，教育咨询师帮您精挑细选。<br /><span class="ms_zx sj_x">现在填写</span><span class="ms_zx sj_s dis_no">关闭填写</span></p></div></a>
                </li>
                <li class="ms_no1">
                	<a class="ms_a1"><img src="__PUBLIC__/images/ms_3.png" /><span class="ms_phone">微 信</span>
                    <div class="ms_a2"><span class="ms_phone ms_phone1">微 信</span><p>查找名师.SO微信号：<i>mingshi12345</i>，或扫描二维码加好友，手机沟通更便捷。</p></div></a>
                </li>
                <li class="ms_no1">
                	<a href="#" class="ms_a1"><img src="__PUBLIC__/images/ms_2.png" /><span class="ms_phone">在线咨询</span>
                    <div class="ms_a2"><span class="ms_phone ms_phone1">在线咨询</span><p>点击即可联系教育咨询师，高效沟通，事半功倍。<br /><span class="ms_zx">现在咨询</span></p></div></a>
                </li>
            </ul>
            <div class="ms_zuce fix" id="ppp">
            	<div class="ms_ce"></div>
            	<div class="ms_sjiao"></div>
                <div class="ms_all fix">
                	<div class="ms_tx">填写需求表</div>
					  <form action="" method="POST">
                    <div class="ms_dlall fix">
                        <dl class="ms_form fix">
                            <dt>孩子年级：</dt>
                            <dd class="ms_ph">
                            	<select id="m1" name="class" class="select5">
							          <option value="">-选择年级-</option>
					                  <?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($voo["id"]); ?>"><?php echo ($voo['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
							        </select>
                            </dd>
                        </dl>
                        <dl class="ms_form fix">
                            <dt>辅导科目：</dt>
                            <dd class="ms_fu" style="z-index:101">
                            	<select id="m1" name="obj" class="select3">
							          <option value="">-选择科目-</option>
					                  <?php if(is_array($obj)): $i = 0; $__LIST__ = $obj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vob): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vob["id"]); ?>"><?php echo ($vob['subject']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
							        </select>
                            </dd>
                        </dl>
                         <dl class="ms_form fix">
                            <dt>上课区域：</dt>
                            <dd class="zc_tab">
                                        <div class="zc_text_box">
                                               <select id="province" name="province">
                                                    <!--option value="1">市</option-->
                                                <?php if(is_array($areaData)): $i = 0; $__LIST__ = $areaData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>"><?php echo ($val["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                                </select>&nbsp;&nbsp;&nbsp;
                                                <select id="city" name="city" class="select6">
                                                    <option value="">区</option>
                                                </select>&nbsp;&nbsp;&nbsp;
                                                <select id="area" name="area" class="select6">
                                                    <option value="">县</option>
                                                </select>
					                        </div>
				                </dd>
                          </dl>
						<dl class="ms_form fix">
                            <dt>上课时间：</dt>
                            <dd class="ms_ph"><input type="text"  class="select5 inpu1" name="yueke_time" id="yueke_time" /></dd>
                        </dl>  
                        <dl class="ms_form fix">
                            <dt>您手机号：</dt>
                            <dd class="ms_ph ms_ph1"><input type="text" class="inpu1"  name="phone" /></dd>
                        </dl>
                        <dl class="ms_form fix">
                            <dt></dt>
                            <dd class="ms_time"><input type="text"  value="具体上课地址" name="address" class="inpu1 co_hui"/></dd>
                        </dl>

                    </div>
                    <div class="ms_area fix"><textarea name="msg" id="msg" class="inpu1" />请您描述孩子要辅导的学科现状、辅导需求，以及您期望达到的辅导效果等</textarea></div>
                    <div class="ms_our">我们会根据您填写的上述信息，为您孩子精选3位名师，他们将精心为您孩子设计教学方案。您三选其一，来体验教学！</div>
                    <div class="ms_kchou"><a href="javascript:void(0);" class="ms_sub submit">提 交</a><div>课 酬<input type="text" name="budget" value="" /><i>元/时</i></div></div>
					 </form>
                </div>
                <div class="ms_ce ms_ddd"></div>
            </div>
        </div>
    </div>
	
	<div class="content fix bk mrt10">
    	<div class="ms_title ms_title1">服务流程</div>
            <div class="lc_box fix">
            	
            	<dl class="lc_dl">
                	<dt><img src="__PUBLIC__/images/lcx1.png" /></dt>
                    <dd>
                    	<div>告知需求，帮您精选</div>
                        <p>告诉我们您想要找什么样的教师？我们免费帮您精挑细选，24小时内给您回复。</p>
                    </dd>
                </dl>
                <dl class="lc_dl lc_dl2">
                	<dt><img src="__PUBLIC__/images/lcx2.png" /></dt>
                    <dd>
                    	<div>三位名师，三个方案</div>
                        <p>一位主选，两位备选，他们都将精心为您孩子设计教学方案。</p>
                    </dd>
                </dl>
                <dl class="lc_dl lc_dl3">
                	<dt><img src="__PUBLIC__/images/lcx3.png" /></dt>
                    <dd>
                    	<div>选定名师，体验教学</div>
                        <p>您对比三位教师的信息和教学方案，选定一位体验教学，并预交2次课的学费。</p>
                    </dd>
                </dl>
                <dl class="lc_dl lc_dl4">
                	<dt><img src="__PUBLIC__/images/lcx4.png" /></dt>
                    <dd>
                    	<div>正式上课，全程服务</div>
                        <p>体验课不满意，更换教师；满意，签订协议正式上课。名师.SO将全程为您服务。</p>
                    </dd>
                </dl>
            	<!--<div class=" fw_tltl fl">服务流程</div>
                <ul class="fw_ul fl">
                	<li class="fw_li1 fw_li1_mo"><a href="#">告知需求，有求必应</a></li>
                    <li class="fw_li2"><a href="#">三位名师，三个方案</a></li>
                    <li class="fw_li3"><a href="#">选定名师，体验教学</a></li>
                    <li class="fw_li4"><a href="#">签订协议，正式上课</a></li>
                    <li class="fw_li5"><a href="#">全程服务，提升效果</a></li>
                </ul>
                <div class="heiban fl">
                	<div>告知需求，有求必应</div>
                	<p>告诉我们您想找什么样的名师？我们免费帮您精挑细选。告诉我们您想找什么样的名师？我们免费帮您精挑细选。告诉我们您想找什么样的名师？我们免费帮您精挑细选。告诉我们您想找什么样的名师？我们免费帮您精挑细选。告诉我们您想找什么样的名师？我们免费帮您精挑细选。告诉我们您想找什么样的名师？我们免费帮您精挑细选。告诉我们您想找什么样的名师？我们免费帮您精挑细选。告诉我们您想找什么样的名师？我们免费帮您精挑细选。</p>
                </div>-->
            </div>
            
    </div>
    <div class="content fix bk mrt10">
    	<div class="ms_title ms_title1">名师.SO<i>6</i>个不一样</div>
            <div class="six fix">
            	<div class="pubu">
                	<div class="six_bold">1、教师精挑细选</div>
                	<div><img src="__PUBLIC__/images/six1.png" height="180" width="283" /></div>
                    <div class="six_div">
                        <p class="six_p">只有帮助孩子找到了好老师，名师.SO才会有收益，而前期名师.SO为教师制作网站、录制视频、宣传推广的费用总和极高，赢利模式决定了我们必须对老师精挑细选。</p>
                    </div>
                </div>
                <div class="pubu">
                	<div class="six_bold">2、教师信息透明</div>
                	<div><img src="__PUBLIC__/images/six2.png" height="180" width="283" /></div>
                    <div class="six_div">
                        <p class="six_p">名师.SO的每一位教师信息都非常真实全面：包括教师介绍、教学经历、讲课视频、评价评分等应有尽有，家长可以自助为孩子选择最合适的教师。</p>
                    </div>
                </div>
                <div class="pubu">
                	<div class="six_bold">3、师生精准匹配</div>
                	<div><img src="__PUBLIC__/images/six3.png" height="180" width="283" /></div>
                    <div class="six_div">
                        <p class="six_p">孩子的弱项先和教师的强项匹配，然后在强项相同的教师之间对比细选三位，让他们写教学方案，根据教学方案确定教师试讲。</p>
                    </div>
                </div>
                <div class="pubu pubu4">
                	<div class="six_bold">4、厚待每位教师</div>
                	<div><img src="__PUBLIC__/images/six4.png" height="180" width="283" /></div>
                    <div class="six_div">
                        <p class="six_p">名师.SO发现并帮助实力派教师展现自我，让苦于找不到好教师的家长们知道他们，更重要的是，学生交的学费90%以上给教师。</p>
                    </div>
                </div>
                <div class="pubu">
                	<div class="six_bold">5、学习效果更好</div>
                	<div><img src="__PUBLIC__/images/six5.png" height="180" width="283" /></div>
                    <div class="six_div">
                        <p class="six_p">为什么更好呢？原因是名师.SO紧盯三个关键点：第一，学前紧盯师生精准匹配；第二，学中紧盯教师的教学内容；第三，全程跟踪，紧盯家长的评价反馈。</p>
                    </div>
                </div>
                <div class="pubu">
                	<div class="six_bold">6、家长培优帮手</div>
                	<div><img src="__PUBLIC__/images/six6.png" height="180" width="283" /></div>
                    <div class="six_div">
                        <p class="six_p">除了帮助孩子找名师，名师.SO还能为家长们做些啥呢？如果您不想在家上课，想找个教学场地，名师.SO能帮您；如果您想参加线下活动或者听讲座，名师.SO能帮您；如果您想用最少的时间来获取孩子教育的重要信息，名师.SO还能帮您；还有……。总之，在您育才成龙的过程中，名师.SO总能助您一臂之力！</p>
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
<script type="text/javascript" src="__PUBLIC__/js/iepng.js"></script>
    <script>
        $("#news li").click(function () {
            var a = $(this).find(".mli").get(0);
            var id = a.id;
            var index = id.replace("mli", "");
            $("#news .num_current").removeClass("num_current");
            $(".cons").hide();
            $("#con" + index).show();
            return false;
        });
    </script>
<script type="text/javascript">		
$(function(){
	$(".submit").click(function(){
		 <?php if(ACTION_NAME != 'edit'): ?>if($.trim($("select[name='class']").val())==''){
			 popup.alert("请选择孩子年级");
			 return false;
		 }
		 if($.trim($("select[name='obj']").val())==''){
			 popup.alert("请选择辅导科目");
			 return false;
		 }
		 if($.trim($("select[name='province']").val())==''){
			 popup.alert("您所在市？");
			 return false;
		 }
		 if($.trim($("select[name='city']").val())==''){
			 popup.alert("您所在区？");
			 return false;
		 }
		 if($.trim($("select[name='area']").val())==''){
			 popup.alert("您所在县？");
			 return false;
		 }
		 if($.trim($("#yueke_time").val())==''){
			 popup.alert('请填写约课时间');
			 return false;
		 }
		 if($.trim($("input[name='phone']").val())=='' ){
			 popup.alert("手机号不能为空");
			 return false;
		 }
		 if($.trim($("input[name='address']").val())=='' || $("input[name='address']").val()=='具体上课地址'){
			 popup.alert('请填写具体上课地址');
			 return false;
		 }
		 if($.trim($("#msg").val())==''){
			 popup.alert('备注信息必填');
			 return false;
		 }
		 if($.trim($("#msg").val())=='请您描述孩子要辅导的学科现状、辅导需求，以及您期望达到的辅导效果等'){
			 popup.alert('备注信息好像不对呦');
			 return false;
		 }
		 if($.trim($("input[name='budget']").val())==''){
			 popup.alert("课酬不能为空");
			 return false;
		 }<?php endif; ?>
		commonAjaxSubmit();
		return false;
	});
});
</script>	
</body>
</html>