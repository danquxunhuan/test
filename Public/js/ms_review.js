$(function(){	
	var showMsgId = $('#msg');
	var g='g';
	$(showMsgId).keyup(function(){
		//定义最少输入数字
		var min=10;
		var middle=450;
		var max=500;
		var not_state = '1';
		
		var mvalue =trim($(this).val(),g);
		
		//取得用户输入的字符的长度
		var length = mvalue.length;
		if(length == 0){
		$('#notice').html("<em id='notice_span'>10-500</em>字");
		}
		if(1<length<min){
		    $('#notice').html("<span style='color:rgb(127, 127, 127)'>"+(length)+"个字<span>");
		}
		if(length >= min){
			$("#notice").html("<span style='color:#01ae05'>"+(length)+"个字<span>");
		}
		if(length>middle){
		 $("#notice").html("<span style='color:rgb(3, 181, 246)'>还能写"+(max-length)+"个字<span>");
		}
		if(length>max){
		 $("#notice").html("<span style='color:#f30'>"+(max-length)+"个字<span>");
		}
	});
	
   	/*
	* 绑定 enter 提交查询
	*/
	$('input[id=tag]').keyup(function(event){
        if(event.keyCode ==13){
       $("#search").trigger("click");
    }
    });	
	
	/*
	* 绑定 ctrl+enter 提交查询
	*/
	$('form[id=form1]').keypress(function(e){
	if(e.ctrlKey && e.which == 13 || e.which == 10) {
		$('.subscribe-btn').click();
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
		        	,formMsg = trim(boxTextarea.val(),g)
		        	,t = $(this);
		        //内容不能为空
		        if(formMsg==''||formMsg==null){
		        	var formBox = t.parents('form')
		        		,textareaBox = formBox.find('.textarea-txt').parent()
		        		,boxHtml = '<div class="error-box" style="position:absolute;margin:0 auto;top:0;right:100px;color:#f00;width:200px;">亲，写点内容哦</div>'
		        		;
		        	t.after(boxHtml).parent().css({'position':'relative'});
		        	formBox.find('.textarea-txt').css({'background-color':'#fdf4eb'});
		        	textareaBox.stop(true,true)
					    .animate({'right':'10px'},190)
						.animate({'right':'-10px'},190)
						.animate({'right':'10px'},180)
						.animate({'right':'-10px'},180)
		        		.animate({'right':'10px'},170)
						.animate({'right':'-10px'},170)
		        		.animate({'right':'7px'},160)
						.animate({'right':'-7px'},160)
		        		.animate({'right':'4px'},150)
						.animate({'right':'-4px'},150)
						.animate({'right':'0'},160,function(){
		        			formBox.find('.textarea-txt').css({'background-color':'#fff'});
		        			formBox.find('.error-box').remove();
						});
		        	return false;
		        }	        
    });		
	
	
	 $('.ms-btn-nologin').live('click',function () {
		   $('.theme-popover-mask').fadeIn(100);
		   $('.login-out').slideDown(200);	               
	 });
     $('.tc_box .close').click(function(){
		            $('.theme-popover-mask').fadeOut(100);
		            $('.login-out').slideUp(200);
	 });	 
		
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
	
	
	 $('.pinglun-box').live('hover',function () {
    	  var btn = $(this).find('.view-delete-btn');
		if(btn.is(':hidden')){			
			btn.show();
		}else{
			btn.hide();
		}
    })
	
	$('.dianping-box').live('hover',function () {
    	   var miniBtn = $(this).find('.view-del-btn');
		if(miniBtn.is(':hidden')){			
			miniBtn.show();
		}else{
			miniBtn.hide();
		}
    });
	
	/**删除点评alax**/
	function delpinglun(reviewid,action,aid,pid,btnid){
    //alert(yqm_sn);
     var ispost = false;
    $.ajax({
    type: "POST",
    url: "/test/index/delReview",
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
	function pinglunPost(url,message,action,idtype,aid,pid,reppid,btnid){
		var toauthor = '0';
			if($('input[name="toauthor"]').val()>0||filterToAuthor(message)){
				toauthor = '1';
			}
		var url = url
			,msg = encodeURI(message)
			,action = action
			,idtype = idtype
			,aid = isUndefined(aid) ? '' : aid
			,pid = isUndefined(pid) ? '' : pid
			,reppid = isUndefined(reppid) ? '' : reppid
	        ,postData = {'message':msg,'act':action,'idtype':idtype,'aid':aid,'pid':pid,'reppid':reppid,'toauthor':toauthor}
			,boxid = '';
		    $.post(url,postData,function(data){
	        var data = eval('(' + data + ')');
			if(data.is_success=='1'){
				data.username = isUndefined(data.username)?'名师网友':data.username;
				if(action=='add_post'){
					htmlWiter('#pinglun_list',action,aid,data.pid,data.reppid,data.username,data.yijuhua,data.message);
				}else if(action=='add_postcomment'){
						htmlWiter($('#g_pid'+pid).find('.dianping-form'),action,aid,data.pid,data.reppid,data.username,data.yijuhua,data.message);
				}else if(action=='del_post'){
					var box = $(btnid).parents('.pinglun-box');
					htmlDelete(box);
				}else if(action=='del_postcomment'){
					var box = $(btnid).parents('.dianping-box');
					htmlDelete(box);
				}else if(action=='add_recommend' || action == 'del_recommend'|| action=='add_article_eye'||action=='del_article_eye'||action=='add_toauthor'||action=='del_toauthor'){
					var boxid = '#g_pid'+pid;
					recommendSet(boxid,btnid,action)
				}
				
			}else{
				showDialog(data.msg,'notice','提示信息','','0','','','','','5','')
			}
			//成功后打开提交
			plStart='1';
		})
		
	}


	
});