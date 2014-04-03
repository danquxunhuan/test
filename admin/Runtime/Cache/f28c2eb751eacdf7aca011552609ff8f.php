<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>权限分配</title>
<link rel="stylesheet" href="__PUBLIC__/css/admin/style.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/css/mstang123.css" type="text/css" />
<style>
.wapper{width:100%;height:auto;margin:auto 0px;}
.right{float:right;width:78%;height:600px;box-shadow:0px 3px 6px #BDBFBE}
.left{float:left;width:20%;height:600px;border:solid 1px #F1F1F1;box-shadow:0px 3px 6px #BDBFBE}
.footer{width:99%;height:100px;margin-top:20px;border:solid 1px #F1F1F1;clear:both;}
.left ul li{list-style:none;height:35px;border-bottom:1px solid #F3F3F3;line-height:36px;font-weight: 700;tezt-align:center;}
.left .cycz{background:#dedbdb no-repeat;}
.tab1{width:100%;height:35px;margin-bottom:15px;line-height: 35px;}
.current {border-bottom: 2px solid rgb(38, 106, 174);color: rgb(38, 106, 174);font-weight: 700;}
</style>
</head>
<body>
<link rel="stylesheet" href="__PUBLIC__/Js/asyncbox/skins/default.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/calendar/calendar-blue.css"/>
<link rel="stylesheet" href="__PUBLIC__/css/admin.css"/>
<script src="__PUBLIC__/js/jquery-1.9.0.min.js"></script>
<script src="__PUBLIC__/js/jquery.lazyload.js"></script>
<script src="__PUBLIC__/js/functions.js"></script>
<script src="__PUBLIC__/js/jquery.form.js"></script>
<script src="__PUBLIC__/js/asyncbox/asyncbox.js"></script>
<script src="__PUBLIC__/js/calendar/calendar.js"></script>

<!--***************************top******************************-->
	<div class="top">
    	<div class="logo fix">
        	<div class="logo_l fl"><a href="index.html"><img src="__PUBLIC__/images/top10.png" /></a></div>
            <div class="bn fl">
            	<i></i>
            	<div class="index_lm"><a href="mingshishouye.html" class="in_mo">名师</a><a href="wenzhang.html">精读</a><a href="#">教室</a></div>
            </div>
            <div class="lo_r fr">
            	<div class="togao fr"><a href="__ROOT__/index/index" class="lo_a to_bj" target="_blank">网站首页</a><a href="__APP__/Public/loginout" class="lo_a to_bj">退出登录</a></div>  
            </div>
            
        </div>
    </div>    

<!--***************************content--left---right******************************-->   
             <div class="wapper">
                <div class="left fl">
    <ul class="ul1">
        <li><div class="current">&nbsp;&nbsp;&nbsp;常用操作</div></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Article" >文章列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Member" >会员列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Access" >管理员列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Access/nodeList" >节点管理</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Access/roleList" >角色管理</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Tags" >标签管理</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Active" >活动列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Area" >地区管理</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Index/yqm_list" >邀请码列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Review" >评论列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Yueke" >约课列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Fangan" >设计方案列表</a></li>
        <li>&nbsp;&nbsp;&nbsp;<a href="__APP__/Lesson" >课程列表</a></li>
     </ul>
</div>
                <div id="Right"  class="right">
                    <div class="Item hr">
                        <div class="current">权限分配</div>
                    </div>
                    <p>你正在为用户组：<b><?php echo ($info["name"]); ?></b> 分配权限 。项目和版块有全选和取消全选功能</p>
                    <form>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab">
                            <?php if(is_array($nodeList)): $i = 0; $__LIST__ = $nodeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$level1): $mod = ($i % 2 );++$i;?><tr>
                                    <td style="font-size: 14px;"><label><input name="data[]" level="1" type="checkbox" obj="node_<?php echo ($level1["id"]); ?>" value="<?php echo ($level1["id"]); ?>:1:0"/> <b>[项目]</b> <?php echo ($level1["title"]); ?></label></td>
                                </tr>
                                <?php if(is_array($level1['data'])): $i = 0; $__LIST__ = $level1['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$level2): $mod = ($i % 2 );++$i;?><tr>
                                        <td style="padding-left: 30px; font-size: 14px;"><label><input name="data[]" level="2" type="checkbox" obj="node_<?php echo ($level1["id"]); ?>_<?php echo ($level2["id"]); ?>" value="<?php echo ($level2["id"]); ?>:2:<?php echo ($level2["pid"]); ?>"/> <b>[模块]</b> <?php echo ($level2["title"]); ?></label></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 50px;">
                                            <?php if(is_array($level2['data'])): $i = 0; $__LIST__ = $level2['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$level3): $mod = ($i % 2 );++$i;?><label><input name="data[]" level="3" type="checkbox" obj="node_<?php echo ($level1["id"]); ?>_<?php echo ($level2["id"]); ?>_<?php echo ($level3["id"]); ?>" value="<?php echo ($level3["id"]); ?>:3:<?php echo ($level3["pid"]); ?>"/> <?php echo ($level3["title"]); ?></label> &nbsp;&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                        <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>
                    </form>
                    <div class="commonBtnArea" >
                        <button class="btn submit">提交</button>
                        <button class="btn reset">重置</button>
                        <button class="btn empty">清空</button>
                    </div>
                </div>
            </div>
        <div class="clear"></div>
        <script type="text/javascript">
            //初始化数据
            function setAccess(){
                //清空所有已选中的
                $("input[type='checkbox']").prop("checked",false);
                //数据格式：
                //节点ID：node_id；1，项目；2，模块；3，操作
                //节点级别：level；
                //父级节点ID：pid
                var access=$.parseJSON('<?php echo ($info["access"]); ?>');
                var access_length=access.length;
                if(access_length>0){
                    for(var i=0;i<access_length;i++){
                        $("input[type='checkbox'][value='"+access[i]['val']+"']").prop("checked","checked");
                    }
                }
            }
            $(function(){
                //执行初始化数据操作
                setAccess();
                //为项目时候全选本项目所有操作
                $("input[level='1']").click(function(){
                    var obj=$(this).attr("obj")+"_";
                    $("input[obj^='"+obj+"']").prop("checked",$(this).prop("checked"));
                });
                //为模块时候全选本模块所有操作
                $("input[level='2']").click(function(){
                    var obj=$(this).attr("obj")+"_";
                    $("input[obj^='"+obj+"']").prop("checked",$(this).prop("checked"));
                    //分隔obj为数组
                    var tem=obj.split("_");
                    //将当前模块父级选中
                    if($(this).prop('checked')){
                        $("input[obj='node_"+tem[1]+"']").prop("checked","checked");
                    }
                });
                //为操作时只要有勾选就选中所属模块和所属项目
                $("input[level='3']").click(function(){
                    var tem=$(this).attr("obj").split("_");
                    if($(this).prop('checked')){
                        //所属项目
                        $("input[obj='node_"+tem[1]+"']").prop("checked","checked");
                        //所属模块
                        $("input[obj='node_"+tem[1]+"_"+tem[2]+"']").prop("checked","checked");
                    }
                });
                //重置初始状态，勾选错误时恢复
                $(".reset").click(function(){
                    setAccess();
                });
                //清空当前已经选中的
                $(".empty").click(function(){
                    $("input[type='checkbox']").prop("checked",false);
                });
                $(".submit").click(function(){
                    commonAjaxSubmit();
                });
            });
        </script>
    </body>
</html>