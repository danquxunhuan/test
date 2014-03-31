$(function(){	
    var postUrl = '/ms.so/index/insertReview?random=';
	var showMsgId = $('#msg');
	
	$(showMsgId).keyup(function(){
		//定义最少输入数字
		var min=10;
			not_state = '1';
		
		//取得用户输入的字符的长度
		var length = $(this).val().length;
		if(length<min){
			$("#notice").html("最少输入<span id='notice_span'>"+(min-length)+"</span>个字");
			$("#msg").css("background","#fff");
		    $('#result').css("display","none");
		}else{
			$("#notice").html("<span style='color:rgb(3, 181, 246)'>可以发布了<span>");
			
		}
	});

	/**
	*	textarea自动高度
	**/
	$('#form1 textarea').autoResize({
	    onResize : function() {
	        $(this).css({opacity:0.8});
	    },
	    animateCallback : function() {
	        $(this).css({opacity:1});
	    },
	    animateDuration : 300,
	    extraSpace : 30
	});
	$('#list .textarea-txt,.author-ask .textarea-txt').autoResize({
	    onResize : function() {
	        $(this).css({opacity:0.8});
	    },
	    animateCallback : function() {
	        $(this).css({opacity:1});
	    },
	    animateDuration : 300,
	    extraSpace : 30,
		limit: 150
	});
	
	//@作者回复
	$('.pinglun-reply-btn').live('click',function(){

	    	//获取要回复用户名和内容
	    	var name = $(this).parents('.dianping-box-text').find('.ms_name').text()
	    		,msg = $(this).parents('.dianping-box-text').find('.dd-s').text()
	    		,box = $(this).parents('.pl_hfu').find('.msg1').focus();
	    	//过滤msg代码保证只引用一条
	    	msg = htmlGroup(msg);
	    	//存储要回复的用户名并写入输入框
	    	box.data({'name':name,'msg':'//@'+msg}).val('回复@'+name+' ：').focus();
    	});
		
		
		
	//提交评论和点评
    $('.ms-btn').live('click',function () {
	        //评论
		             var box = $(this).parents('form')
		        	,boxTextarea = box.find('.textarea-txt')
		        	,random = parseInt(Math.random()*100000)
					,formUrl = postUrl+random
		        	,formMsg = boxTextarea.val()
		        	,action = box.find('input[name="act"]').val()
		        	,idtype = ''
		        	,aid = box.find('input[name="aid"]').val()
		        	,pid = box.find('input[name="id"]').val()
		        	,t = $(this);
		        //内容不能为空
		        if(formMsg==''||formMsg==null){
		        	var formBox = t.parents('form')
		        		,textareaBox = formBox.find('.textarea-txt').parent()
		        		,boxHtml = '<div class="error-box" style="position:absolute;margin:0 auto;top:0;right:100px;color:#f00;width:200px;">亲，内容为空你好意思么</div>'
		        		;
		        	t.after(boxHtml).parent().css({'position':'relative'});
		        	formBox.find('.textarea-txt').css({'background-color':'#fdf4eb'});
		        	textareaBox.stop(true,true)
		        		.animate({'right':'10px'},100)
						.animate({'right':'-10px'},100)
		        		.animate({'right':'7px'},90)
						.animate({'right':'-7px'},90)
		        		.animate({'right':'4px'},80)
						.animate({'right':'-4px'},80)
						.animate({'right':'0'},70,function(){
		        			formBox.find('.textarea-txt').css({'background-color':'#fff'});
		        			formBox.find('.error-box').remove();
						});
		        	return false;
		        }
               //提交表单
		        pinglunPost(formUrl,formMsg,action,idtype,aid,pid)				
    });	
	
	/**添加评论、点评alax**/
	function addReview(reviewid,action,aid,pid,btnid){
    //alert(yqm_sn);
     var ispost = false;
    $.ajax({
    type: "POST",
    url: "/ms.so/index/delReview",
    datatype : "json",
    async:'false',
    data: "&reviewid="+encodeURIComponent(reviewid)+"&action="+encodeURIComponent(action)+"&aid="+encodeURIComponent(aid)+"&pid="+encodeURIComponent(pid)+"&math="+Math.floor(Math.random()*1000+1),
    success: function(data){
           if(data==1)	{
		         if(action=='del_post'){
					var box = $(btnid).parents('.pinglun-box');
					htmlDelete(box);
				}else if(action=='del_postcomment'){
					var box = $(btnid).parents('.dianping-box');
					htmlDelete(box);
				}
			    }else{
			    alert('删除失败');
			   }
    }
     });
      return ispost;
    }
	
		/**
	*	by jiantian
	*	time 2013.01.30
	*	提交评论
	*	url 提交的URL
	*	message 内容
	*	action 操作类型
	*	idtype 帖子类型
	*	aid 文章id
	*	pid 评论id
	*	reppid 点评id
	*	btnid 点击对象
	**/
	function pinglunPost(url,msg,action,idtype,aid,pid,reppid,btnid){

		var url = url
			,msg = encodeURI(msg)
			,action = action
			,idtype = idtype
			,aid =aid
			,pid =pid
			,reppid =pid
	,postData = {'msg':msg,'act':action,'idtype':idtype,'aid':aid,'pid':pid,'reppid':reppid}
			,boxid = '';
		$.post(url,postData,function(data){
	        var data = eval('(' + data + ')');
			if(data.is_success=='1'){
				if(action=='insertReview'){
					htmlWiter('#pinglun_list',action,aid,data.pid,data.reppid,data.username,data.yijuhua,data.msg);
				}else if(action=='addReviewComment'){
						htmlWiter($('#g_pid'+pid).find('.dianping-form'),action,aid,data.pid,data.reppid,data.username,data.yijuhua,data.msg);
				}
				
			}else{
				alert('失败');
			}
			//成功后打开提交
			plStart='1';
		})
		
	}
		
		
    /**
	*	by SASA
	*	time 2013.12.23
	*	点评收缩展开
	**/
	$(document).on('click','.ms_reply,.dianping-mini-box,.dianping-close',function(){
		var box = $(this).parents('.pinglun-box').find('.dianping-list'),
			miniBox = $(this).parents('.pinglun-box').find('.dianping-mini-list');
		/*如果是关闭的就打开它，否则就关闭它*/
		if(box.is(':hidden')){
			//缓存点评内容
			$('.textarea-txt').data({'name':'','msg':''});
			
			box.show();
			miniBox.hide();
		}else{
			box.hide();
			miniBox.show();
		}
	})	
		
		
	 /**
     *    删除评论和点评；添加删除有料、优问
     *    view-delete-btn 	 删除评论
     *    view-del-btn		 删除点评
     *    view-recommend-btn 添加删除有料
     *    toauthor-btn 添加删除优问
     **/
    $('.view-delete-btn,.view-del-btn,.view-recommend-btn,.toauthor-btn').live('click',function () {
    	var box = $(this).parents('.pinglun-box')
		    ,action = $(this).attr('action')
		    ,aid = box.find('input[name="aid"]').val()
        	,pid = box.find('input[name="id"]').val()
        	,reviewid = $(this).attr('reviewid');
    	    delpinglun(reviewid,action,aid,pid,$(this));
    })
	
	/**删除点评alax**/
	function delpinglun(reviewid,action,aid,pid,btnid){
    //alert(yqm_sn);
     var ispost = false;
    $.ajax({
    type: "POST",
    url: "/ms.so/index/delReview",
    datatype : "json",
    async:'false',
    data: "&reviewid="+encodeURIComponent(reviewid)+"&action="+encodeURIComponent(action)+"&aid="+encodeURIComponent(aid)+"&pid="+encodeURIComponent(pid)+"&math="+Math.floor(Math.random()*1000+1),
    success: function(data){
           if(data==1)	{
		         if(action=='del_post'){
					var box = $(btnid).parents('.pinglun-box');
					htmlDelete(box);
				}else if(action=='del_postcomment'){
					var box = $(btnid).parents('.dianping-box');
					htmlDelete(box);
				}
			    }else{
			    alert('删除失败');
			   }
    }
     });
      return ispost;
    }
	
    /**
	*    删除评论和点评加动画效果
	**/
	function htmlDelete(box){
		$(box).animate({opacity:'0',left:'150'},300,function(){
			$(this).remove();
		})
	}
	
    /**
	*    过滤多余“回复@”并增加@代码
	*    点评引用时用
	**/
	function htmlGroup(t) {
		var reg = /\/\//g;
		var reg2 = /回复@.*?：/g;
		t = t.replace(reg2, '');
		if(reg.test(t)){
			var t = t.split("//");
		    var re = ">"+name+"</g";
		    var m = t[0]+"//"+t[1];
		    return m;
	    }else{
	    	return t;
	    }
	}

	/**
	*    添加评论和点评加动画效果
	**/
	function htmlWiter(boxid,action,aid,pid,reppid,username,signature,msg){
        var pinglunBox =  '<dl class="result pinglun-box"><dt><a href="#"><img src="__PUBLIC__/images/90_1.png" width="50" height="50" /></a></dt><dd><div class="xq_name"><a href="#">'+username+'</a><a class="view-delete-btn" action="del_post" title="确定删除?" reviewid="'+reppid+'" href="javascript:void(0);">删除</a></div><p>'+msg+'</p><div class="pj_time xq_pj_time"><div class="fr"><a href="#" class="pj_zan">0</a><a href="#" class="xq_a2">0</a><A href="javascript:void(0);" class="pl_a ms_reply"><i></i>评论</A></div><i>'+data.pl_time+'</i></div><div class="pl_hfu fix dianping-list" id="div_{ms:$vo.id}_1" style="display:none">    <div class="pl_hfu_top fix"><form  action="__URL__/addReviewComment" method="post"><p class="pl_hfu_p"></p><textarea name="msg1" class="msg1 textarea-txt"  value="请输入您的点评"/></textarea><input type="hidden" name="aid" id="aid" value="{ms:$info.aid}" /><input type="hidden" name="id"  value="'+data.id+'" /><button type="submit" class="xq_sub ms-btn">发布</button><span class="s-num" id="notice">最少输入<em id="notice_span">10</em>字</span> <span class="review" style="display:none;color:rgb(3, 181, 246);margin:40px 0 0 0;"></span></form></div><div class="xq_guanbi dianping-close"><A href="javascript:void(0)"></A></div></div></dd> </dl>';
		var dianipingBox = '<div class="clearfix dianping-box dianping-box-set"><div class="user-img"><a href="/member/'+uid+'.html" title="'+username+'" c="1" class="tx-img" target="_blank"><img src="http://user.huxiu.com/auth/avatar.php?uid='+uid+'&size=small" ></a></div><div class="dianping-box-text"><span class="dd-s"><a class="name" href="/member/'+uid+'.html" target="_blank" title="'+username+'">'+username+'</a>：'+msg+'</span><div class="clearfix dianping-func"><time class="pull-left s-time"><span title="刚刚">刚刚</span></time><span class="pull-right"><a href="javascript:void(0);" class="view-del-btn" reppid="'+reppid+'" title="确定删除?">删除</a><span class="pinglun-reply-btn">回复</span></span></div></div></div>';
		
		var box = '<div class="post-box" style="width:100%;height:123px;background-color:#fefefe;border:2px solid #ccc;padding:5px;position:absolute;right:-13px;bottom:9px;">'+msg+'</div>';
		if(action=='add_post'){
			jQ('.textarea-box').prepend(box).find('#textarea').val('');
			jQ('.post-box').animate({opacity:'0',width:'0',height:'0'}, 400,function(){
				jQ(this).remove();
				jQ(boxid).prepend(pinglunBox)
					.find(".pinglun-box:first").css({opacity:".2"}).animate({opacity:"1"}, 800);
			});
		}else if(action=='add_postcomment'){
			jQ(boxid).find('textarea').val('');
			var boxidHeight = jQ(boxid).find('textarea').height();
			jQ(boxid).find('.dianping-textarea').prepend(box);
			jQ('.post-box').height(boxidHeight).animate({opacity:'0',width:'0',height:'0'}, 400,function(){
				jQ(this).remove();
				jQ(boxid).after(dianipingBox)
					.find('.dianping-box:first').css({opacity:'.4'}).animate({opacity:'1'}, 500);
			})
		}
		
	}
	
	
});