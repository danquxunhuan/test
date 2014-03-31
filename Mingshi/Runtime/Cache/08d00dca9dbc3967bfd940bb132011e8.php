<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php echo ($userDataInfo["uname"]); ?>个人管理中心</title>
<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/tanchu.css" type="text/css" />
<?php if($userDataInfo["style"] != ''): ?><link rel="stylesheet" id="change_css" href="__PUBLIC__/css/<?php echo ($userDataInfo["style"]); ?>_center.css" type="text/css" />
<?php else: ?>
<link rel="stylesheet" href="__PUBLIC__/css/black.css" type="text/css" /><?php endif; ?>
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script language="javascript" src="__PUBLIC__/js/autoresize.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/ms_center.js"></script>
<script language="javascript" src="__PUBLIC__/js/common.js"></script>
<script language="javascript">
function imgdragstart(){return false;}
</script>
<style type="text/css"><!--
.zyxx_pj_wyj { border-radius: 1px; color: #FFFFFF; display: inline-block; font-size: 12px; font-weight:100; height: 24px; line-height: 24px; text-align: center; width:85px;}
--></style>
</head>

<body>
<script language="javascript">
for(i in document.images)document.images[i].ondragstart=imgdragstart;
</script>
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
	   <!----------会员管理中心右边导航开始------------->
    <div class="jbxx_left fr">
        <?php if($i == 2): ?><!--老师身份-->
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
        <?php else: ?><!--家长身份-->
        	<!---------家长身份的右侧---------->
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
    <li class="center_li2 center_li1mo2"><a href="__APP__/member/mymingshi/uid/<?php echo ($_GET['uid']); ?>"><i></i>我的名师</a></li>
    <!--li class="center_li2 center_li1mo2"><a href="__APP__/member/renzheng/uid/<?php echo ($_GET['uid']); ?>"><i></i>名师认证</a></li>
    <!--li class="center_li3"><a href="__APP__/member/coin/uid/<?php echo ($_GET['uid']); ?>"><i></i>金 币</a></li-->
    <li class="center_li6 center_li1mo6"><a href="__APP__/member/create/uid/<?php echo ($_GET['uid']); ?>"><i></i>创 作</a></li>
    <li class="center_li5 center_li1mo5"><a href="__APP__/member/favorite/uid/<?php echo ($_GET['uid']); ?>"><i></i>收 藏</a></li>
</ul><?php endif; ?>		   
    </div>
	   <!-----------后台右边导航结束------------->
      <div class="jbxx_right nob_jbxx_right fl">
        <div class="zyxx_box zyxx_box_fff">
        	<div class="wzsy">
            	<div class="wzsy_title" >
                	<div class="wzsy_1 fl">今日头条</div>
                    <ul class="wzsy_ul fr" id="news">
                    	<li class="wasy_amo"><a href="javascript:void(0);" class="mli" id="mli1">1</a></li>
                        <li><a href="javascript:void(0);" class="mli" id="mli2">2</a></li>
                        <li><a href="javascript:void(0);" class="mli" id="mli3">3</a></li>
                        <li><a href="javascript:void(0);" class="mli" id="mli4">4</a></li>
                        <li><a href="javascript:void(0);" class="mli" id="mli5">5</a></li>
                        <li class="wzsy_te"><a href="javascript:void(0);"><img src="__PUBLIC__/images/lj.png" /></a></li>
                    </ul>
                </div>
				<?php if(is_array($today)): $k = 0; $__LIST__ = $today;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k == 1): ?><div class="wz_lists wzsy_lists cons" id="con<?php echo ($k); ?>"><!--大图片样式给本行div加上 wzsy_bigimg -->
				<?php else: ?>
				<div class="wz_lists wzsy_lists cons" id="con<?php echo ($k); ?>" style="display:none"><!--大图片样式给本行div加上 wzsy_bigimg --><?php endif; ?>
                	<div class="wzsy_bt"><?php echo ($vo["title"]); ?></div>
                	<dl class="fix dd">
                    	<dt class="wzsy_2 change_big"><a href="javascript:void(0);">
						<img src="<?php echo ($vo["firstimage"]); ?>"/></a></dt>
                        <dd>
                            <p class="wz_p3 wzsy_p3"><?php echo ($vo["content"]); ?>
							<i>www.mingshi.so</i></p>
                        </dd>
                    </dl>
                    <div class="zy_share wzsy_share">分享到：
					 <script type="text/javascript">
 document.write('<a href="http://connect.qq.com/widget/shareqq/index.html?site='+encodeURIComponent(document.title)+'&pics='+encodeURIComponent('<?php echo ($vo["firstimage"]); ?>')+'&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent('<?php echo ($vo["title"]); ?>')+'&desc='+encodeURIComponent('<?php echo ($vo["summary"]); ?>')+'" target="_blank"><img src="__PUBLIC__/images/share4.png" /></a>');
 </script>

<script type="text/javascript">document.write('<a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+encodeURIComponent(location.href)+'&title=<?php echo ($vo["title"]); ?>&desc=【<?php echo ($vo["title"]); ?>】<?php echo (msubstr($vo["summary"],1,100,'utf-8',false)); ?>...@名师网&pics=<?php echo ($vo["firstimage"]); ?>&summary='+encodeURIComponent('<?php echo (msubstr($vo["summary"],1,100,'utf-8',false)); ?>')+'"  target="_blank"><img src="__PUBLIC__/images/share3.png" /></a>');</script>
<script type="text/javascript">document.write('<a href="http://v.t.sina.com.cn/share/share.php?url='+encodeURIComponent(location.href)+'&appkey=3172366919&title='+encodeURIComponent('【<?php echo ($vo["title"]); ?>】<?php echo (msubstr($vo["summary"],1,100,'utf-8',false)); ?>...@名师网')+'&pic=<?php echo ($vo["firstimage"]); ?>" title="分享到新浪微博"  target="_blank"><img src="__PUBLIC__/images/share1.png" /></a>');</script>
 <script type="text/javascript">document.write('<a href="http://widget.renren.com/dialog/share?resourceUrl='+encodeURIComponent(location.href)+'&title='+encodeURIComponent('<?php echo ($vo["title"]); ?>')+'&pic=<?php echo ($vo["firstimage"]); ?>&description='+encodeURIComponent('<?php echo (msubstr($vo["summary"],1,100,'utf-8',false)); ?>')+'" title="分享到人人" target="_blank"><img src="__PUBLIC__/images/share5.png" /></a>');</script>
<a class="ht_aa yincang1" href="javascript:void(0);">
<img src="__PUBLIC__/images/share.png" />
 <div class="ht_div" id="k1">
<div>
<img src="<?php echo ($QRcodeUrl); ?>"/>
</div>
</div>
</a>		
					<a href="#"><img src="__PUBLIC__/images/share6.png" /></a>
					<a href="#"><img src="__PUBLIC__/images/share7.png" /></a>
					<a href="#"><img src="__PUBLIC__/images/share8.png" /></a>
					<a href="#"><img src="__PUBLIC__/images/share9.png" /></a>
					</div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

            </div>
        </div>
<!--------------老师，学生推荐------------------->
		<?php if($i == 2): ?><!----------学生推荐---------->
		    <div class="xuqiu_box">
                <div class="wzsy_title"><div class="wzsy_1 fl fix">学生推荐</div></div>
<?php if(is_array($tuijian)): $i = 0; $__LIST__ = $tuijian;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vt): $mod = ($i % 2 );++$i;?><dl class="xuqiu_dl">
        <dt>
        <?php if($vt["status"] == 1): ?><img src="__PUBLIC__/images/zhan_logo.png" alt="学生推荐" />
        <?php else: ?><img src="__PUBLIC__/images/zhan_logo_no.png" alt="学生推荐" /><?php endif; ?><!--黑白的logo 图片名称zhan_logo_no  --></dt>
        <dd>
            <ul class="xuqiu_div fix">
                <li>孩子年级：<i><?php echo ($vt["className"]); ?></i></li>
                <li>辅导科目：<i><?php echo ($vt["subject"]); ?></i></li>
                <li>上课区域：<i><?php echo ($vt["province"]); ?> <?php echo ($vt["city"]); ?> <?php echo ($vt["area"]); ?></i></li>
                <li>上课时间：<i><?php echo ($vt["yueke_time"]); ?></i></li>
                <li>课酬：<i><?php echo ($vt["budget"]); ?>元/时</i></li>
            </ul>
        </dd>
        <dd class="xuqiu">家长描述：<span><?php echo ($vt["msg"]); ?></span></dd>
        <dd class="xuqiu_a">
<?php if($vt["status"] == 1): if(!empty($vt['flag'])): ?><a href="__APP__/member/fangan/id/<?php echo ($vt['flag']['id']); ?>" class="zyxx_pj_wyj zyxx_pj_fb_lan" target="_blank">查看教学方案</a><?php endif; ?>&nbsp;&nbsp;<a class="zyxx_pj_fb zyxx_pj_fb_lan yuyue" href="javascript:;">预 约</a>
<?php else: ?>
	<?php if(!empty($vt['flag'])): ?><a href="__APP__/member/fangan/id/<?php echo ($vt['flag']['id']); ?>" class="zyxx_pj_wyj zyxx_pj_fb_lan" target="_blank">查看教学方案</a><?php endif; ?>&nbsp;&nbsp;<span class="zyxx_pj_fb">已结束</span><?php endif; ?>       
        </dd>
<!--已审核,未结束需提交设计教学案例-->     
<?php if($vt["status"] == 1): if(empty($vt['flag'])): ?><!--教学案例不可重复提交-->
    <dd class="xuqiu_yincang">
      <form>
<input type="hidden" name="kid" id="kid" value="<?php echo ($vt["id"]); ?>" /><!--教学案例id-->
<div class="xuqiu_titl">设计教学方案</div>
<div class="xuqiu_area"><textarea name="content" id="content" placeholder="根据家长描述的孩子学习情况，以及期望达到的辅导效果，欢迎您为孩子精心设计教学方案！"></textarea></div>
<div class="xuqiu_a xuqiu_a_r"><a class="zyxx_pj_fb fangan" href="javascript:;">提 交</a></div>
      </form>
<script type="text/javascript">
$('#content').focus(function(){
	$('#content').attr('placeholder','');	
});
$('#content').blur(function(){
	if($('#content').attr('placeholder')==''){
		$('#content').attr('placeholder','根据家长描述的孩子学习情况，以及期望达到的辅导效果，欢迎您为孩子精心设计教学方案！');
	}	
});
</script> 
    </dd><?php endif; endif; ?>
    </dl><?php endforeach; endif; else: echo "" ;endif; ?>

            </div>
		<?php else: ?>	
<!--------------家长，名师推荐-------------->	
	    <div class="jz_geren">
                    <div class="jz_geren_tit"><span>名师推荐</span></div>
                    <div class="jz_geren_box fix">
                    	<div class="zzy_one">
                            <dl class="dl_list fl">
                                <dt><a href="mingshizhuye.html"><img src="__PUBLIC__/images/90_1.png"  /><div class="a_posi"></div></a></dt>
                                <dd>
                                    <p class="ms_name"><a href="#">胡先友</a></p>
                                    <p>学 科：小学奥数</p>
                                    <p>教 龄：7年</p>
                                    <p>课 酬：300元/时</p>
                                    <p>评 分：<i>92.7</i>分</p>
                                </dd>
                            </dl>
                            <div class="zy_ping zy_zy_ping">
                                <div class="zy_ping_s">全部评价（5条）</div>
                                <ul class="zy_jdu">
                                    <li>好 评：<span class="zy_span"><span></span></span><a href="#"><i>4</i>条</a></li>
                                    <li>中 评：<span class="zy_span zy_span1"><span></span></span><a href="#"><i>1</i>条</a></li>
                                    <li>差 评：<span class="zy_span zy_span2"></span><a href="#"><i>0</i>条</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="zzy_one">
                            <dl class="dl_list fl">
                                <dt><a href="mingshizhuye.html"><img src="__PUBLIC__/images/90_1.png"  /><div class="a_posi"></div></a></dt>
                                <dd>
                                    <p class="ms_name"><a href="#">胡先友</a></p>
                                    <p>学 科：小学奥数</p>
                                    <p>教 龄：7年</p>
                                    <p>课 酬：300元/时</p>
                                    <p>评 分：<i>92.7</i>分</p>
                                </dd>
                            </dl>
                            <div class="zy_ping zy_zy_ping">
                                <div class="zy_ping_s">全部评价（5条）</div>
                                <ul class="zy_jdu">
                                    <li>好 评：<span class="zy_span"><span></span></span><a href="#"><i>4</i>条</a></li>
                                    <li>中 评：<span class="zy_span zy_span1"><span></span></span><a href="#"><i>1</i>条</a></li>
                                    <li>差 评：<span class="zy_span zy_span2"></span><a href="#"><i>0</i>条</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="zzy_one">
                            <dl class="dl_list fl">
                                <dt><a href="mingshizhuye.html"><img src="__PUBLIC__/images/90_1.png"  /><div class="a_posi"></div></a></dt>
                                <dd>
                                    <p class="ms_name"><a href="#">胡先友</a></p>
                                    <p>学 科：小学奥数</p>
                                    <p>教 龄：7年</p>
                                    <p>课 酬：300元/时</p>
                                    <p>评 分：<i>92.7</i>分</p>
                                </dd>
                            </dl>
                            <div class="zy_ping zy_zy_ping">
                                <div class="zy_ping_s">全部评价（5条）</div>
                                <ul class="zy_jdu">
                                    <li>好 评：<span class="zy_span"><span></span></span><a href="#"><i>4</i>条</a></li>
                                    <li>中 评：<span class="zy_span zy_span1"><span></span></span><a href="#"><i>1</i>条</a></li>
                                    <li>差 评：<span class="zy_span zy_span2"></span><a href="#"><i>0</i>条</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="zzy_one">
                            <dl class="dl_list fl">
                                <dt><a href="mingshizhuye.html"><img src="__PUBLIC__/images/90_1.png"  /><div class="a_posi"></div></a></dt>
                                <dd>
                                    <p class="ms_name"><a href="#">胡先友</a></p>
                                    <p>学 科：小学奥数</p>
                                    <p>教 龄：7年</p>
                                    <p>课 酬：300元/时</p>
                                    <p>评 分：<i>92.7</i>分</p>
                                </dd>
                            </dl>
                            <div class="zy_ping zy_zy_ping">
                                <div class="zy_ping_s">全部评价（5条）</div>
                                <ul class="zy_jdu">
                                    <li>好 评：<span class="zy_span"><span></span></span><a href="#"><i>4</i>条</a></li>
                                    <li>中 评：<span class="zy_span zy_span1"><span></span></span><a href="#"><i>1</i>条</a></li>
                                    <li>差 评：<span class="zy_span zy_span2"></span><a href="#"><i>0</i>条</a></li>
                                </ul>
                            </div>
                        </div>
                	</div>
        </div><?php endif; ?>
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
            $("#news .wasy_amo").removeClass("wasy_amo");
			$(this).addClass("wasy_amo");
            $(".cons").hide();
            $("#con" + index).show();
            return false;
        });

    </script>
</body>
</html>