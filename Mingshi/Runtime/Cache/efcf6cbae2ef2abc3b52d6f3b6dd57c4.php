<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>名师认证—个人资料</title>
<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/tanchu.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
<link rel="stylesheet" id="change_css" href="__PUBLIC__/css/<?php echo ($userDataInfo["style"]); ?>_center.css" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script language="javascript" src="__PUBLIC__/js/autoresize.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>
<!--ajax表单提交ms_center.js-->
<script type="text/javascript" src="__PUBLIC__/js/ms_center.js"></script>
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
<style type="text/css">
.prompt{ color:red; font-size:12px;}
</style>
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
		<div style="font-size:14px;margin-top:5px;margin-left:2px;color:red;"><span style="cursor:pointer" onclick="outb()">关闭</span></div>
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
                	<li class="yq_amo"><a href="__APP__/member/renzheng/uid/<?php echo ($_GET['uid']); ?>"  >个人资料</a></li>
                    <li><a href="__APP__/teachcase/index/uid/<?php echo ($_GET['uid']); ?>">教学案例</a></li>
                    <li><a href="__APP__/mystory/index/uid/<?php echo ($_GET['uid']); ?>">我的故事</a></li>
                    <li><a href="__APP__/member/shezhi/uid/<?php echo ($_GET['uid']); ?>">我的设置</a></li>
                    <li class="yq_guize"><a href="__APP__/member/guanfang/uid/<?php echo ($_GET['uid']); ?>">官方信息</a></li>
                </ul>
				<div id="con1" class="cons">
                <div class="jbxx_yk_list">
                   <dl class="fix pad0">
                        <dt class="ms_xiugai"><a href="javascript:void(0);"><img src="__PUBLIC__/images/xg.png" /></a></dt>
                        <dd>
                           <h3>可授课时间</h3>
                           <div id="showtime">
						   <div id="morning"></div>
						   <div id="afternoon"></div>
						   <div id="evening"></div>
						   </div>
                           <div class="zyxx_www">
						      <form>
                                <div class="zyxx_sk">
                                    <div class="zyxx_time">可授课时间</div>
                                    <ul class="zyxx_uuu">
                                        <li class="zyxx_li">日期</li>
                                        <li>一</li>
                                        <li>二</li>
                                        <li>三</li>
                                        <li>四</li>
                                        <li>五</li>
                                        <li>六</li>
                                        <li>日</li>
                                    </ul>
                                    <ul class="zyxx_uuu" id="study_time1">
                                        <li class="zyxx_li">上午</li>
                                        <li id="1"><a href="javascript:void(0);"></a></li>
                                        <li id="2"><a href="javascript:void(0);"></a></li>
                                        <li id="3"><a href="javascript:void(0);"></a></li>
                                        <li id="4"><a href="javascript:void(0);"></a></li>
                                        <li id="5"><a href="javascript:void(0);"></a></li>
                                        <li id="6"><a href="javascript:void(0);"></a></li>
                                        <li id="7"><a href="javascript:void(0);"></a></li>
                                    </ul>
                                    <ul class="zyxx_uuu" id="study_time2">
                                        <li class="zyxx_li">下午</li>
                                        <li id="1"><a href="javascript:void(0);"></a></li>
                                        <li id="2"><a href="javascript:void(0);"></a></li>
                                        <li id="3"><a href="javascript:void(0);"></a></li>
                                        <li id="4"><a href="javascript:void(0);"></a></li>
                                        <li id="5"><a href="javascript:void(0);"></a></li>
                                        <li id="6"><a href="javascript:void(0);"></a></li>
                                        <li id="7"><a href="javascript:void(0);" class="zyxx_abj"></a></li>
                                    </ul>
                                    <ul  class="zyxx_uuu" id="study_time3">
                                        <li class="zyxx_li">晚上</li>
                                        <li id="1"><a href="javascript:void(0);"></a></li>
                                        <li id="2"><a href="javascript:void(0);"></a></li>
                                        <li id="3"><a href="javascript:void(0);"></a></li>
                                        <li id="4"><a href="javascript:void(0);"></a></li>
                                        <li id="5"><a href="javascript:void(0);"></a></li>
                                        <li id="6"><a href="javascript:void(0);"></a></li>
                                        <li id="7"><a href="javascript:void(0);" class="zyxx_abj"></a></li>
                                    </ul>
                                </div>
                                <div class="zyxx_lin36">为了更好的为您服务，建议您认真填写</div>
                                <div class="zyxx_cun mar_left197"><a class="zyxx_pj_fb gbbox" href="javascript:;">关 闭</a>
								<a class="zyxx_pj_fb zyxx_lan_a" href="javascript:void(0);">确 定</a></div>
                              </form>
						   </div>
                       </dd>
                   </dl>
                </div>
            	<div class="jbxx_yk_list">
                   <dl class="fix">
                        <dt class="ms_xiugai"><a href="javascript:void(0);"><img src="__PUBLIC__/images/xg.png" /></a></dt>
                        <dd>
                           <h3>目前工作</h3>
                           <div class="infomsg"><?php echo ($info["now_job"]); ?></div>
                           <div class="zyxx_www">
						      <form>
                            	<div class="zyxx_inp zyxx_256">
								<input type="text" value="目前工作" class="inpu1" id="now_job" name="now_job" />
								<input type="hidden" value="add_info" name="act" />
								</div>
                                <div class="hui_lan">
                                    <div class="zyxx_lin36 fl">让关心你的人知道你在哪里工作</div>
                                    <div class="zyxx_cun mar_left116 fl">
                                        <a class="zyxx_pj_fb gbbox" href="javascript:;">关 闭</a>
                                        <a class="zyxx_pj_fb zyxx_lan_a now_job" href="javascript:void(0);">确 定</a>
									</div>
                       	   		</div>
							  </form>	
                           </div>
                       </dd>
                   </dl>
                </div>
                <div class="jbxx_yk_list">
                   <dl class="fix">
                        <dt class="ms_xiugai"><a href="javascript:void(0);"><img src="__PUBLIC__/images/xg.png" /></a></dt>
                        <dd>
                           <h3>个人简介</h3>
                           <div class="infomsg"><?php echo ($info["msg"]); ?></div>
                           <div class="zyxx_www">
						      <form>
                                <div class="zyxx_625 fix">
								<textarea name="msg" id="msg">让关心你的人时刻知道你在做神马</textarea></div>
                                <div class="hui_lan">
                                    <div class="zyxx_lin36 fl" id="notice">用100个字介绍自己</div>
                                    <div class="zyxx_cun mar_left116 fr"><a class="zyxx_pj_fb gbbox" href="javascript:;">关 闭</a>
									<a class="zyxx_pj_fb zyxx_lan_a now_msg" href="javascript:void(0);">确 定</a>
									</div>
                       	   		</div>
							  </form>	
                           </div>
                       </dd>
                   </dl>
                </div>
                <div class="jbxx_yk_list">
                   <dl class="fix">
                        <dt class="ms_xiugai"><a href="javascript:void(0);"><img src="__PUBLIC__/images/xg.png" /></a></dt>
                        <dd>
                           <h3>我的强项</h3>
                           <div class="infomsg"><?php echo ($info["my_strong"]); ?></div>
                           <div class="zyxx_www">
						    <form>
                                <div class="zyxx_625 zyxx_h_34 fix">
								<textarea name="my_strong" id="strong" class="inpu1">填写你的强项</textarea>
								</div>
                                <div class="hui_lan">
                                    <div class="zyxx_lin36 fl" id="notice_strong">用50个字讲述你的核心价值，即你能帮学生解决什么问题</div>
                                    <div class="zyxx_cun mar_left116 fr"><a class="zyxx_pj_fb gbbox" href="javascript:;">关 闭</a>
									<a class="zyxx_pj_fb zyxx_lan_a strong" href="javascript:void(0);">确 定</a></div>
                       	   		</div>
						    </form>		
                           </div>
                       </dd>
                   </dl>
                </div>
                <div class="jbxx_yk_list">
                   <dl class="fix">
                        <dt class="ms_xiugai"><a href="javascript:void(0);"><img src="__PUBLIC__/images/xg.png" /></a></dt>
                        <dd>
                           <h3>教学风格</h3>
                           <div><?php if(is_array($mytag)): $i = 0; $__LIST__ = $mytag;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vom): $mod = ($i % 2 );++$i;?><span style="padding-right:10px;"><?php echo ($vom["name"]); ?></span><?php endforeach; endif; else: echo "" ;endif; ?></div>
                           <div class="zyxx_www">
						     <form>
                                <div class="zyxx_625 zyxx_h_34 fix">
                                    <div class="taxt_div fix">
                                        <div class="b_qian fl" id="tags">
										<?php if(is_array($mytag)): $i = 0; $__LIST__ = $mytag;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vom): $mod = ($i % 2 );++$i;?><a class="tag_remove" id="<?php echo ($vom["id"]); ?>" href="javascript:void(0);"><?php echo ($vom["name"]); ?><i>×</i></a><?php endforeach; endif; else: echo "" ;endif; ?>
										</div>
                                        <input type="text" class="inpu1" id="tagMsg" name="tag" value="" />
                                    </div>
                                    <div class="zyxx_biaoqian fix">
                                    	<div class="fengge fl">风格标签：</div>
                                        <div class="fengge_r fl" id="tag_hyih">
										   <?php if(is_array($tagList)): $i = 0; $__LIST__ = $tagList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vot): $mod = ($i % 2 );++$i;?><a href="javascript:void(0);" id="<?php echo ($vot["id"]); ?>"><i>+</i><span><?php echo ($vot["name"]); ?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>	
                                    	</div>
                                        <div class="huan_yi"><a href="javascript:void(0);" id="hyih">换一换</A></div>
                                    </div>
                                </div>
                                <div class="hui_lan">
                                    <div class="zyxx_lin36 fl">用5-8个词语定格自己，词语之间用逗号隔开</div>
                                    <div class="zyxx_cun mar_left116 fr">
									   <a class="zyxx_pj_fb gbbox" href="javascript:;">关 闭</a>
									   <a class="zyxx_pj_fb zyxx_lan_a tags" href="javascript:void(0);">确 定</a>
									</div>
                       	   		</div>
							 </form>	
                           </div>
                       </dd>
                   </dl>
                </div>
                <div class="jbxx_yk_list">
                   <dl class="fix">
                        <dt class="ms_xiugai"><a href="javascript:void(0);"><img src="__PUBLIC__/images/xg.png" /></a></dt>
                        <dd>
                           <h3>教学经历</h3>
                           <div class="zyxx_zshi mrt_10" id="workinfo">
                                <ul class="zyxx_zshi_t">
                                    <li>工作时间</li>
                                    <li>工作单位</li>
                                    <li>工作内容</li>
                                    <li class="wid_73"></li>
                                </ul>
								<?php if(is_array($worklist)): $i = 0; $__LIST__ = $worklist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vow): $mod = ($i % 2 );++$i;?><ul class="zyxx_zshi_t zyxx_zshi_b">
                                     <li><?php echo ($vow["start_time"]); ?>~<?php echo ($vow["end_time"]); ?></li>
                                     <li><?php echo ($vow["company"]); ?>...  </li>
                                     <li><?php echo (msubstr($vow["content"],0,10,'utf-8',false)); ?>...  </li>
                                     <li class="wid_73"><a href="javascript:void(0);" id="<?php echo ($vow["id"]); ?>" cont="<?php echo ($vow["content"]); ?>" com="<?php echo ($vow["company"]); ?>" str="<?php echo ($vow["start_time"]); ?>" end="<?php echo ($vow["end_time"]); ?>" class="editwork">修改</a>/
									 <a class="delwork" id="<?php echo ($vow["id"]); ?>" act="delwork"  href="javascript:void(0);">删除</a>
									 </li>
                                </ul><?php endforeach; endif; else: echo "" ;endif; ?>
                           </div>
                           <div class="zyxx_www fix">
						      <form>
                                <div class="zyxx_xixi">
                                    <div class="zyxx_form mr_t25 fix">
                                        <div class="zyxx_gzuo fr">
										<input type="text"  name="company" id="company" value="" placeholder="工作单位" /></div>
                                        <div class="zyxx_101 fl">
										<input type="text" name="start_time" value="" placeholder="##年##月" />
										
										<span>至</span>
										<input type="text" name="end_time" value="" placeholder="##年##月" />
										</div>
                                    </div>
                                    <div class="zyxx_625 zyxx_486 fix">
									<textarea class="inpu1" name="content" id="content">填写工作内容</textarea>
									</div>
                                </div>
                                <div class="hui_lan">
                                    <div class="zyxx_lin36 fl">每一段经历，都是人生的一次成长</div>
                                    <div class="zyxx_cun mar_left116 fr">
									<a class="zyxx_pj_fb gbbox" href="javascript:;">关 闭</a>
									<a class="zyxx_pj_fb zyxx_lan_a work" href="javascript:void(0);">确 定</a></div>
                       	   		</div>
							  </form>	
                            </div>
                       </dd>
                   </dl>
                </div>
                <div class="jbxx_yk_list">
                   <dl class="fix">
                        <dt class="ms_xiugai"><a href="javascript:void(0);"><img src="__PUBLIC__/images/xg.png" /></a></dt>
                        <dd>
                           <h3>学习经历</h3>
                           <div class="zyxx_zshi mrt_10" id="studyinfo">
                                <ul class="zyxx_zshi_t">
                                    <li>时间</li>
                                    <li>学习阶段</li>
                                    <li>学校</li>
                                    <li class="wid_73"></li>
                                </ul>
							 <?php if(is_array($schlist)): $i = 0; $__LIST__ = $schlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?><ul class="zyxx_zshi_t zyxx_zshi_b">
                                     <li><?php echo ($vos["start_time"]); ?>~<?php echo ($vos["end_time"]); ?> </li>
                                     <li><?php echo ($vos["study_stage"]); ?></li>
                                     <li><?php echo ($vos["school"]); ?>...  </li>
                                     <li class="wid_73"><a  class="editschool" id="<?php echo ($vos["id"]); ?>" href="javascript:void(0);">修改</a>/
									 <a id="<?php echo ($vos["id"]); ?>" class="delschool" href="javascript:void(0);">删除</a>
									 </li>
                                </ul><?php endforeach; endif; else: echo "" ;endif; ?>	
                           </div>
                           <div class="zyxx_www fix">
						      <form>
                                <div class="zyxx_xixi">
                                    <div class="zyxx_form mr_t25 fix">
                                    	<div class="zyxx_101 fl">
										<input type="text" value="" placeholder="##年##月" name="school_start" />
										<span>至</span>
										<input type="text" value="" placeholder="##年##月" name="school_end" /></div>
                                        <div class="zyxx_gzuo zyxx_280 fr">
										<div class="zyxx_101 fl">
										<select name="study_stage" class="select7" id="select1">
										<option value="小学">小学</option>
										<option value="初中">初中</option>
										<option value="高中">高中</option>
										<option value="大专">大专</option>
                                        <option value="本科">本科</option>
										<option value="研究生">研究生</option>
										<option value="硕士">硕士</option>
										<option value="博士">博士</option>
										<option value="博士后">博士后</option>
										</select>
										</div>
										<input type="text" value="" placeholder="学校名称" name="school" id="school" class="zyxx_inp280"/>
										</div>                                        
                                    </div>
                                </div>
                                <div class="hui_lan">
                                    <div class="zyxx_lin36 fl">填写基本信息，增加你的信任度</div>
                                    <div class="zyxx_cun mar_left116 fr">
									<a class="zyxx_pj_fb gbbox" href="javascript:;">关 闭</a>
									<a class="zyxx_pj_fb zyxx_lan_a school" href="javascript:;">确 定</a></div>
                       	   		</div>
							  </form>	
                            </div>
                       </dd>
                   </dl>
                </div>
                <!---->
                <div class="zyxx_dandu fix">
               		<div class="jbxx_yk_list">
                   <dl class="fix" style="border-bottom:none;padding-bottom:0px;">
                        <dt id="person"><a href="javascript:void(0);"><img src="__PUBLIC__/images/xg.png" /></a></dt>
                        <dd>
                           <h3>基本信息</h3>
                           <div class="zxyy_xin" id="jbxx">
                           		<span>真实姓名：<?php echo ($info["uname"]); ?></span>
                                <span>手机号码：<?php echo ($info["phone"]); ?></span>
                                <span>常用邮箱：<?php echo ($info["emile"]); ?></span>
                                <span>教学科目：<?php echo ($classname["id"]); ?>数学</span>
                                <span>教学经验：<?php echo ($info["teach_age"]); ?>年</span>
                                <span>常住地区：北京市  海淀区  上地七街</span>
                                <span>农历生日：<?php echo ($info["year"]); ?>-<?php echo ($info["month"]); ?>-<?php echo ($info["day"]); ?></span>
                                <span>性别：<?php if($info["sex"] == 0): ?>男<?php else: ?>女<?php endif; ?></span>
                                <span>身份：<?php echo ($info["identity"]); ?></span>
                                <span>家乡：<?php echo ($info["home"]); ?></span>
                                <span>学历：<?php echo ($info["education"]); ?></span>
                                <span>毕业院校：<?php echo ($info["school"]); ?></span>
                                <span>专业：<?php echo ($info["major"]); ?></span>
                                <span>爱好：<?php echo ($info["hobby"]); ?>...</span>
                          </div>
                       </dd>
                   </dl>
                </div>
                <div class="zyxx_person" id="zyxx_person">
				    <form>
                    	<dl class="zc_dl">
                            <dt class="ms_xiugai">真实姓名：</dt>
                            <dd><input type="text" class="zc_input" value="<?php echo ($info["uname"]); ?>" name="uname" /></dd>
                        </dl>
                        <dl class="zc_dl">
                            <dt class="ms_xiugai">手机号码：</dt>
                            <dd><input type="text" class="zc_input" value="<?php echo ($info["phone"]); ?>" name="phone" /></dd>
                        </dl>
                        <dl class="zc_dl">
                            <dt class="ms_xiugai">常用邮箱：</dt>
                            <dd><input type="text" class="zc_input" value="<?php echo ($info["emile"]); ?>" name="emile" /></dd>
                        </dl>
                        <dl class="zc_dl">
                            <dt class="ms_xiugai">教学科目：</dt>
                            <dd class="dd_posi1">
      
								<select class="select3" name="classid" id="select2" style="margin-right:10px;">
								 <option value="" selected>请选择年级</option>
								 <?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voc): $mod = ($i % 2 );++$i;?><option value="<?php echo ($voc["id"]); ?>"><?php echo ($voc["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
								<select class="select3" id="select3" name="obj_id">
								<option value="" selected>请选择科目</option>
								 <?php if(is_array($obj)): $i = 0; $__LIST__ = $obj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vos["id"]); ?>"><?php echo ($vos["subject"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
                           
                            </dd>
                        </dl>
                        <dl class="zc_dl">
                            <dt class="ms_xiugai">常住地区：</dt>
                            <dd class="dd_posi">
                                <div class="zc_text_box" >
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
                        <dl class="zc_dl">
                            <dt class="letter">教龄：</dt>
                            <dd>
							<input type="text" class="zc_input" name="teach_age" value="<?php echo ($info["teach_age"]); ?>" />
							
							</dd>
                        </dl>
                        <dl class="zc_dl">
                            <dt class="letter">身份：</dt>
                            <dd>
							   <select name="identity" class="select1" id="select5">
							     <option value="" select="true">请选择身份类型</option>
							     <option value="在校大学生">在校大学生</option>
								 <option value="公立教师">公立教师</option>
								 <option value="培训机构教师">培训机构教师</option>
								 <option value="自由职业者">自由职业者</option>
							   </select>
							</dd>
                        </dl>
                        <dl class="zc_dl">
                            <dt class="letter">学历：</dt>
                            <dd>
							           <select name="education" class="select1" id="select6">
									    <option value="" select="true">请选择学历</option>
										<option value="小学">小学</option>
										<option value="初中">初中</option>
										<option value="高中">高中</option>
										<option value="大专">大专</option>
                                        <option value="本科">本科</option>
										<option value="研究生">研究生</option>
										<option value="硕士">硕士</option>
										<option value="博士">博士</option>
										<option value="博士后">博士后</option>
										</select>
						    </dd>
                        </dl>
                        <dl class="zc_dl">
                            <dt class="ms_xiugai">毕业院校：</dt>
                            <dd><input type="text" class="zc_input" value="<?php echo ($info["school"]); ?>" name="school" /></dd>
                        </dl>
                        <dl class="zc_dl">
                            <dt class="letter">专业：</dt>
                            <dd><input type="text" class="zc_input" value="<?php echo ($info["major"]); ?>" name="major"/></dd>
                        </dl>
                        <dl class="zc_dl">
                            <dt class="letter">家乡：</dt>
                            <dd><input type="text" class="zc_input" value="<?php echo ($info["home"]); ?>" name="home" /></dd>
                        </dl>
                        <dl class="zc_dl">
                            <dt class="letter">爱好：</dt>
                            <dd><input type="text" class="zc_input" value="<?php echo ($info["hoby"]); ?>" name="hobby" /></dd>
                        </dl>
                        <dl class="zc_dl">
                            <dt class="letter">生日：</dt>
                            <dd class="dd_posi3">
							   <select name="bir_type" id="xuanze_riqi">
                                  <option value="" selected>选择类型</option>
								  <option value="0">阳历</option>
								  <option value="1">公立</option>
							   </select>
                            </dd>
                            <dd class="dd_posi">
                                <select name="" style="margin-left:8px;" class="select8" id="xuanze_year">
							    </select>
                            </dd>
                            <dd>
							    <select name="" style="margin-left:8px;" class="select8" id="xuanze_month">
							    </select>
						    </dd>
                            <dd class="dd_posi3">
                                <select name="" style="margin-left:8px;" class="select8" id="xuanze_day">
							    </select>
                            </dd>
                        </dl>
                        <dl class="zc_dl">
                            <dt class="letter">性别：</dt>
                            <dd>
							   <div class="jbxx_radio jbxx_radio_col">
							   <label><input type="radio" name="sex" value="0" /><span>男</span></label>
							   <label><input type="radio" name="sex" value="1"/>女</label>
							   </div>
							</dd>
                        </dl>
                        <div class="hui_lan zyxx_hui_lan">
                            <div class="zyxx_cun"><a class="zyxx_pj_fb gbbox_person" href="javascript:;">关 闭</a>
							<a class="zyxx_pj_fb zyxx_lan_a jbzl_info" href="javascript:;">确 定</a></div>
                       	</div>
					</form>	
                    </div>	 
                </div>
                <!--荣誉证书-->
                <div class="jbxx_yk_list">
                   <dl class="fix">
                        <dt class="ms_xiugai"><a href="javascript:void(0);"><img src="__PUBLIC__/images/xg.png" /></a></dt>
                        <dd>
                           <h3>荣誉证书</h3>
                           <div class="zyxx_zhengshu" id="ryzs">
<!----------荣誉证书------------>
<?php if(is_array($ryzs)): foreach($ryzs as $key=>$val): ?><a href="javascript:void(0);"><img src="<?php echo ($val['image']); ?>" /><i>×</i></a><?php endforeach; endif; ?>
<!----------荣誉证书------------>
                           </div>
<script type="text/javascript">
$(function(){
	//验证荣誉证书图片大小控制在100K以内
	$('#ryzsform').submit(function(evt){
		//console.log($('#ryzs_pic')[0]);
		if($('#ryzs_pic')[0].files[0]['size']>102400){
			$('#pic').text(' 请将图片控制在100K以下！');
			evt.preventDefault(); //阻止默认行为
		}else{
			$('#pic').text('');
		}
	});
});
</script>						   
                             <div class="zyxx_www">
<form id='ryzsform' method="post" action="<?php echo (__SELF__); ?>/test/member/add_info" enctype="multipart/form-data">
	<input type="hidden" name="uid" id="uid" value="" />
    <div class="zyxx_inp zyxx_285">
        <!--input type="text" value="请上传荣誉证书" class="" /-->
        <!--a href="javascript:void(0);" class="zyxx_ll">浏 览</a-->
        <input type="file" name="ryzs_pic" id="ryzs_pic" /><span id="pic" class="prompt"></span>
    </div>
    <div class="zyxx_cun mar_left208 mart_25">
        <a class="zyxx_pj_fb gbbox" href="javascript:;">关 闭</a>
        <input type="submit" value="确 定吗" class="zyxx_pj_fb zyxx_lan_a" />
    </div>
</form>	
  
    <!--form action="{:U('upload/photo')}" method="post" enctype="multipart/form-data">
        <p>图片1：<input type="file" name="photo[]"></p>
        <p>图片2：<input type="file" name="photo[]"></p>
        <p>图片3：<input type="file" name="photo[]"></p>
        <p><button type="submit">确定上传</button></p>
    </form-->							  
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
<script type="text/javascript" src="__PUBLIC__/js/iepng.js"></script>
</body>
</html>