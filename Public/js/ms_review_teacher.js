$(function(){	
	var showMsgId = $('#msg');

	var g='g';
	$(showMsgId).keyup(function(){
		//定义最少输入数字
		var min=50;
		var middle=450;
		var max=500;
		var not_state = '1';
		
		var mvalue =trim($(this).val(),g);
		
		//取得用户输入的字符的长度
		var length = mvalue.length;
		if(length == 0){
		$('#notice').html("<em id='notice_span'>50-500</em>字");
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
	
	/**
	*	by sasa
	*    禁用表单
	**/
    $('.review form').submit(function(){return false;});
	
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
	$('form[id=ter_form]').keypress(function(e){
	if(e.ctrlKey && e.which == 13 || e.which == 10) {
		$('.subscribe-btn').click();
	}
    });
	
	/**
	*	textarea自动高度
	**/
	$('#ter_form textarea').autoResize({
	    onResize : function() {
	        $(this).css({opacity:0.8});
	    },
	    animateCallback : function() {
	        $(this).css({opacity:1});
	    },
	    animateDuration : 300,
	    extraSpace : 30
	});
	$('#list .textarea-ter,.author-ask .textarea-txt').autoResize({
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
	    	//msg = htmlGroup(msg);
	    	//存储要回复的用户名并写入输入框
	    	box.data({'name':name,'msg':'//@'+msg}).val('回复@'+name+' ：').focus();
    	});
		
		
		
	//提交评论和点评
    $('.ms-btn').live('click',function () {
	        //评论
		        var box = $(this).parents('form')
		        	,boxTextarea = box.find('.textarea-ter')
		        	,random = parseInt(Math.random()*100000)
		        	,formMsg = trim(boxTextarea.val(),g)
					,perid = box.find('input[name="perid"]').val() //被评论老师的id
					,pid = box.find('input[name="pid"]').val()
					,action = box.find('input[name="act"]').val()
					,scores = box.find('input[name="scores"]').val()
		        	,t = $(this);
				if(scores == ''||formMsg==null){
					 alert('您还没有打分呢');
					 return false;
			    }
		        //内容不能为空
		        if(formMsg==''||formMsg==null){
		        	var formBox = t.parents('form')
		        		,textareaBox = formBox.find('.textarea-ter').parent()
		        		,boxHtml = '<div class="error-box" style="position:absolute;margin:0 auto;top:0;right:100px;color:#f00;width:200px;">亲，写点内容哦</div>'
		        		;
		        	t.after(boxHtml).parent().css({'position':'relative'});
		        	formBox.find('.textarea-ter').css({'background-color':'#fdf4eb'});
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
		        			formBox.find('.textarea-ter').css({'background-color':'#fff'});
		        			formBox.find('.error-box').remove();
						});
		        	return false;
		        }	
                 
                //提交表单
		        addpinglun(formMsg,action,perid,pid,scores)
		        //关闭提交
		        plStart='0';				 
    });		
	


     /**添加 评论 点评alax**/
	function addpinglun(msg,action,perid,pid,scores,btnid){			
			    $.ajax({
                type: "POST",
                url: "/test/member/add_post",
                datatype : "json",
                async:'false',
                data: "&pid="+encodeURIComponent(pid)+"&msg="+encodeURIComponent(msg)+"&action="+encodeURIComponent(action)+"&scores="+encodeURIComponent(scores)+"&perid="+encodeURIComponent(perid)+"&math="+Math.floor(Math.random()*1000+1),
                success: function(data){
                 if(data.status==1)	{
				    data = data.data;
		           if(action=='add_post'){
					 var html =  '<dl class="pinglun-box"><dt><a href=""><img src="/test/Public/images/90.png" /><i>'+data.uname+'</i></a></dt><dd><div class="pj_fen">'+data.scores+'</div><p>'+data.msg+'</p><div class="pj_time xq_pj_time"><div class="fr"><a class="view-delete-btn no_icon_color" action="del_post" title="确定删除?" reviewid="'+data.id+'" href="javascript:void(0);">删除</a><a href="javascript:void(0);" onclick="titye()" class="pj_zan">0</a><A href="javascript:void(0);" onclick="titye()" class="pl_a ms_reply"><i></i>评论</A></div><i>'+data.pl_time+'</i></div></dd> </dl>';
                     $('#list').prepend(html);
					 $("#msg").val("");
				   }else if(action=='add_postcommon'){
                       var html = '<dl class="dianping-box" > <dt><a href="__URL__/info/uid/'+data.uid+'"><img src="/test/Public/images/90_1.png" width="50" height="50" /></a></dt><dd class="dianping-box-text"><div class="xq_name"><a href="#" title="" class="ms_name">'+data.uname+'</a></div> <p>'+data.msg+'</p><div class="pj_time xq_pj_time"><div class="fr"><a class="view-del-btn no_icon_color" title="确定删除?" reviewid="'+data.id+'" action="del_postcomment" href="javascript:void(0);">删除</a><A href="javascript:void(0);" title="回复" class="no_tu pinglun-reply-btn">回复</A></div><i>'+data.pl_time+'</i></div></dd></dl>';
                       $('#commentList'+pid).prepend(html);
                      $(".msg1").val("");
				   }
			      }else if(data.status == -1){
			          alert(data.info);
			      }else if(data.status == 0){
				      alert('评论失败');
				  }
                 }
                });												
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
		    ,perid = box.find('input[name="perid"]').val()
        	,pid = box.find('input[name="id"]').val()
        	,reviewid = $(this).attr('reviewid');
    	    delpinglun(reviewid,action,perid,pid,$(this));
    })
	
//评论滑过删除	
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
	//名师主页
    $('.ms_shipin').live('click',function () {
    	   var miniBtn = $('.left_posi');
		   var anniu = $('.left_posi1');
		if(miniBtn.is(':hidden')){			
			miniBtn.show();
			anniu.hide();
		}else{
			miniBtn.hide();
			anniu.show();
		}
    });
	
    $('#left_posi1').click(function(){
	    var ttt = $('#per_video');
	    if(ttt.is(':hidden')){
		  ttt.show();
		  $(this).hide();
		}else{
		  ttt.hide();
		  $(this).show();
		}	
	  });
	
	//视频滑过显示播放按钮	  评价页面
    $('.pj_shipin li').hover(function() {
		$(this).children('.black').hide();
		$(this).children('div.video').show();
	},
	function() {
		$(this).children('.black').show();
		$(this).children('div.video').hide();
	});
	
	/**删除点评alax**/
	function delpinglun(id,action,perid,pid,btnid){
    //alert(yqm_sn);
     var ispost = false;
    $.ajax({
    type: "POST",
    url: "/test/member/delReview",
    datatype : "json",
    async:'false',
    data: "&id="+encodeURIComponent(id)+"&action="+encodeURIComponent(action)+"&perid="+encodeURIComponent(perid)+"&pid="+encodeURIComponent(pid)+"&math="+Math.floor(Math.random()*1000+1),
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
	*    添加评论和点评加动画效果
	**/
	function htmlWiter(boxid,action,aid,pid,reppid,username,signature,msg){
		var pinglunBox =  '<dl class="result pinglun-box"><dt><a href="#"><img src="__PUBLIC__/images/90_1.png" width="50" height="50" /></a></dt><dd><div class="xq_name"><a href="#">--</a></div><p>uname</p><div class="pj_time xq_pj_time"><div class="fr"><a class="view-delete-btn no_icon_color" action="del_post" title="确定删除?" reviewid="" href="javascript:void(0);">删除</a><a href="javascript:void(0);" onclick="titye()" class="pj_zan">0</a><a href="javascript:void(0);" onclick="titye()" class="xq_a2">0</a><A href="javascript:void(0);" onclick="titye()" class="pl_a ms_reply"><i></i>评论</A></div><i>====</i></div></dd> </dl>';

		//var dianipingBox = '<div class="clearfix dianping-box dianping-box-set"><div class="user-img"><a href="/member/'+uid+'.html" title="'+username+'" c="1" class="tx-img" target="_blank"><img src="http://user.huxiu.com/auth/avatar.php?uid='+uid+'&size=small" ></a></div><div class="dianping-box-text"><span class="dd-s"><a class="name" href="/member/'+uid+'.html" target="_blank" title="'+username+'">'+username+'</a>：'+msg+'</span><div class="clearfix dianping-func"><time class="pull-left s-time"><span title="刚刚">刚刚</span></time><span class="pull-right"><a href="javascript:void(0);" class="view-del-btn" reppid="'+reppid+'" title="确定删除?">删除</a><span class="pinglun-reply-btn">回复</span></span></div></div></div>';
		
		var box = '<div class="post-box" style="width:100%;height:123px;background-color:#fefefe;border:2px solid #ccc;padding:5px;position:absolute;right:-13px;bottom:9px;">'+msg+'</div>';
		if(action=='add_post'){
			$('.textarea-box').prepend(box).find('#textarea').val('');
			$('.post-box').animate({opacity:'0',width:'0',height:'0'}, 400,function(){
				$(this).remove();
				$(boxid).prepend(pinglunBox)
					.find(".pinglun-box:first").css({opacity:".2"}).animate({opacity:"1"}, 800);
			});
		}else if(action=='add_postcomment'){
			$(boxid).find('textarea').val('');
			var boxidHeight = $(boxid).find('textarea').height();
			$(boxid).find('.dianping-textarea').prepend(box);
			$('.post-box').height(boxidHeight).animate({opacity:'0',width:'0',height:'0'}, 400,function(){
				$(this).remove();
				$(boxid).after(dianipingBox)
					.find('.dianping-box:first').css({opacity:'.4'}).animate({opacity:'1'}, 500);
			})
		}
		
	}
	
    /**
	* by sasa 
	* time 2013-12-31 登陆框
	**/
	 $('.ms-btn-nologin').live('click',function () {
		   $('.theme-popover-mask').fadeIn(100);
		   $('.login-out').slideDown(200);	               
	 });
     $('.tc_box .close').click(function(){
		            $('.theme-popover-mask').fadeOut(100);
		            $('.login-out').slideUp(200);
	 });	
	 
	/**
	* by sasa 
	* ajax 分页 2014-01-03
	**/
	 function goToPage(num){
	      $.ajax({
        type: "POST",
        url: "/test/member/goToPage",
        datatype : "json",
        async:'false',
        data: "&num="+encodeURIComponent(num)+"&math="+Math.floor(Math.random()*1000+1),
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
	
	}
	
	/*
	* 好评/中评/差评切换(wyj)
	*/
	$("#reviews li").click(function () {
            var a = $(this).find(".mli").get(0);
            var id = a.id;
            var index = id.replace("mli", "");
            $("#reviews .pj_bold").removeClass("pj_bold");  //清除所有项的加粗
			$("#reviews .mli").children('p').css('display','none'); //所有项不显示 
			$(this).children('.mli').addClass("pj_bold"); //选中项加粗
			$(this).children('.pj_bold').children('p').css('display','block');  //选中项显示
            $(".cons").hide(); //隐藏内容
            $("#con" + index).show(); //显示当前选中内容列表
            return false;
    });
	
});
function titye(){alert('刷新页面试试');}





