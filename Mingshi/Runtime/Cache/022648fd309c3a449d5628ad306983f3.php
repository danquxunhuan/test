<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>官方信息—名师认证</title>
<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/tanchu.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
<link rel="stylesheet" id="change_css" href="__PUBLIC__/css/<?php echo ($userDataInfo["style"]); ?>_center.css" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script language="javascript" src="__PUBLIC__/js/autoresize.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/ms_center.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jwplayer.js"></script>
<script src="__PUBLIC__/js/reg.js"></script>
<script language="javascript">
function imgdragstart(){return false;}
</script>
<script type="text/javascript">
//提示框 3秒之后框框消失
function outa(){$('#tipa').css('display','none');} //已提交过了
function outb(){$('#tipb').css('display','none');} //已表过态了
function titye(){alert('刷新页面试试');}
</script>
</head>

<body>
<script language="javascript">
for(i in document.images)document.images[i].ondragstart=imgdragstart;
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
                    <li><a href="__APP__/member/shezhi/uid/<?php echo ($_GET['uid']); ?>" >我的设置</a></li>
                    <li class="yq_guize yq_amo"><a href="__APP__/member/guanfang/uid/<?php echo ($_GET['uid']); ?>">官方信息</a></li>
                </ul>
				 <!----------------官方信息------------------>
				 <div class="jbxx_yk_list">
                   <dl class="fix pad0">
                        <dt><a href="javascript:void(0);"><img src="__PUBLIC__/images/gf.png" /></a></dt>
                        <dd>
                           <h3>官方身份</h3>
                           <div class="gfxx">在校大学生</div>
                       </dd>
                   </dl>
                </div>
				<div class="jbxx_yk_list">
                   <dl class="fix">
                        <dt class="ms_xiugai"><a href="javascript:void(0);"><img src="__PUBLIC__/images/gf.png" /></a></dt>
                        <dd>
                           <h3>课时费</h3>
                           <div class="gfxx"><span>300</span> 元/时</div>
                       </dd>
                   </dl>
                </div>
                <div class="jbxx_yk_list">
                   <dl class="fix">
                        <dt class="ms_xiugai"><a href="javascript:void(0);"><img src="__PUBLIC__/images/gf.png" /></a></dt>
                        <dd>
                           <h3>退课次数</h3>
                           <div class="gfxx"><i>已通过本站成功为8位学生授课，<em>0</em>次退课记录</i></div>
                       </dd>
                   </dl>
                </div>
                <div class="jbxx_yk_list">
                   <dl class="fix">
                        <dt class="ms_xiugai"><a href="javascript:void(0);"><img src="__PUBLIC__/images/gf.png" /></a></dt>
                        <dd>
                           <h3>我的照片</h3>
                           <div>上传自己的照片，让别人快速认识你</div>
                           <div class="zyxx_www" style="display:black">
                             <div class="gfxx_img">
<a href="javascript:void(0);"><image src="__PUBLIC__/images/ter/001.jpg" width=165 height=100 /></a>
<a href="javascript:void(0);"><image src="__PUBLIC__/images/ter/002.jpg" width=165 height=100 /></a>
<a href="javascript:void(0);"><image src="__PUBLIC__/images/ter/003.jpg" width=165 height=100 /></a>
                             </div>
                           </div>
                       </dd>
                       
                   </dl>
                </div>
                <div class="jbxx_yk_list">
                   <dl class="fix" style="border:none">
                        <dt class="ms_xiugai"><a href="javascript:void(0);"><img src="__PUBLIC__/images/gf.png" /></a></dt>
                        <dd>
                           <h3>我的视频</h3>
                           <div class="zyxx_ym_tit">1分钟的宣传片+10分钟的网课+5分钟的才艺展示 <i>名师.SO免费为您拍摄制作！</i></div>
                           
                       </dd>
                        
                   </dl>
                   <div class="zyxx_www_fu">
                   		<div class="left_posi">
                            <a href="javascript:void(0);">
							<div type="video" width=640 height=400 file="__PUBLIC__/images/ter/003.mp4" image="__PUBLIC__/images/001.jpg">
					                </div>
									</a>
                        </div>
                        <div class="gfxx_color">用1分钟时间展现自己的核心价值，即你能帮学生解决什么问题！</div>
                        <div class="gfxx_little fix">
                            <div class="fl">
                                <div class="left_posi">
                                    <a href="javascript:void(0);">
									<div type="video" width=300 height=190 file="__PUBLIC__/images/ter/001.mp4" image="__PUBLIC__/images/001.jpg">
					                </div>
									</a>
                                </div>
                                <div class="gfxx_color gfxx_303">用10分钟讲解一个知识点+一道题目，充分展现自己的讲课魅力！</div>
                            </div>
                            <div class="fr">
                                <div class="left_posi">
                                    <a href="javascript:void(0);">
									<div type="video" width=300 height=190 file="__PUBLIC__/images/ter/002.mp4" image="__PUBLIC__/images/001.jpg">
					                </div></a>
                                </div>
                                <div class="gfxx_color gfxx_303">用5分钟展现自己的才艺，譬如：唱歌、弹琴、跳舞、魔术、参赛作品等！</div>
                            </div>
                        </div>
                   </div>
				 </div>
				 <!--------------官方信息end------------->
			
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
<script type="text/javascript">
    //末尾增加这段代码就可以了
    var allDIV = document.getElementsByTagName("div");
    for(var i= 0,l=allDIV.length;i<l;i++){
        var div = allDIV[i];
        if(div.getAttribute("type") == 'video'){
            var file = div.getAttribute("file");
            if(!file){
                continue;
            }
            if(!div.id){
                div.id = Math.random();
            }
            var image = div.getAttribute("image");
			
            jwplayer(div).setup({
                flashplayer: "__PUBLIC__/js/player.swf",
                file: file,
                image: image,
                aspectratio: '16:10',
                //fallback: 'true',
                //mute: 'true',
				//autostart: 'true',
				//screencolor:'#f30', 背景颜色
				'controlbar.idlehide': "true",
				//showicons:'true',
				//shownavigation:'false',
				//linktarget:'_blank'
            });
        }
    }
</script>
</body>
</html>