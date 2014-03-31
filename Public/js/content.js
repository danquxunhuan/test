$(function(){
        		 //提示框 3秒之后框框消失
		$('.xq_a1,.pj_zan').mouseover(function(){$(this).addClass("yizan1");});
		$('.xq_a1,.pj_zan').mouseout(function(){$(this).removeClass("yizan1");});
		$('.xq_a2').mouseover(function(){$(this).addClass("yizan2");});
		$('.xq_a2').mouseout(function(){$(this).removeClass("yizan2");});
		$('.xq_a3').mouseover(function(){$(this).addClass("yizan3");});
		$('.xq_a3').mouseout(function(){$(this).removeClass("yizan3");});
		 //给文章点赞
		 var azid;
		$("a.zhan").click(function(){
			var id = $(this).attr("id");
			azid = id;
			var aid=id.match(/\d+/).join("");
			var aid = parseInt(aid);
		    $.ajax({
		        type:"post",
		        url:"__APP__/Article/add_zan?aid="+aid+" & action=article",
		        data:"idid="+new Date(),
		        dataType:"html",
		        success:function(msg){
		        	if(msg == "已赞"){
		        			$('#tipb').css('display','none');
		        			$('#tipa').css("top",$(document).scrollTop()+($(window).height())/2-100+"px");
		        			$('#tipa').css('display','block');
		        			setTimeout(outa, 3000);
		        	}else if(msg == "已踩不能赞"){
		        			$('#tipa').css('display','none');
		        			$('#tipb').css("top",$(document).scrollTop()+($(window).height())/2-100+"px");
		        			$('#tipb').css('display','block');
		        			setTimeout(outb, 3000);
		        	}else{
		        		$("#"+id).html(msg);
		        	}
		    	  }
		    });
		});
        //给文章点踩
        $(".xq_a2").click(function(){
        	if("acai" == $(this).attr("name"))
        	{
	        	var id = $(this).attr("id");
				var aid=id.replace(/[^\d]*/ig,"");
				var aid = parseInt(aid);
	        		$.ajax({
	    		        type:"post",
	    		        url:"__APP__/index.php/Article/add_cai?aid="+aid+" & action=article",
	    		        data:"idid="+new Date(),
	    		        dataType:"html",//注意
	    		        success:function(msg){
	    		        	if(msg == "已踩"){
			        			$('#tipb').css('display','none');
			        			$('#tipa').css("top",$(document).scrollTop()+($(window).height())/2-100+"px");
			        			$('#tipa').css('display','block');
			        			setTimeout(outa, 3000);
			        	}else if(msg == "已赞不踩"){
			        			$('#tipa').css('display','none');
			        			$('#tipb').css("top",$(document).scrollTop()+($(window).height())/2-100+"px");
			        			$('#tipb').css('display','block');
			        			setTimeout(outb, 3000);
			        	}else{
			        		$("#"+id).html(msg);
			        	}	    		        	
	    		    	}
	    		    });
        		}
        });

        //给评论点踩
        $(".xq_a2").click(function(){
        	if($(this).attr("name") !== "acai")
        	{
	        	var rid = $(this).attr("name");
	        	var id = $(this).attr("id");
		    		$.ajax({
				        type:"post",
				        url:"__APP__/index.php/Article/add_cai?rid="+rid+" & action=review",
				        data:"idid="+new Date(),
				        dataType:"html",//注意
				        success:function(msg){
				        	if(msg == "已踩"){
			        			$('#tipb').css('display','none');
			        			$('#tipa').css("top",$(document).scrollTop()+($(window).height())/2-100+"px");
			        			$('#tipa').css('display','block');
			        			setTimeout(outa, 3000);
			        	}else if(msg == "已赞不踩"){
			        			$('#tipa').css('display','none');
			        			$('#tipb').css("top",$(document).scrollTop()+($(window).height())/2-100+"px");
			        			$('#tipb').css('display','block');
			        			setTimeout(outb, 3000);
			        	}else{
			        		$("#"+id).html(msg);
			        	}
				    	  }
				    });
        	}
    	});
        //给评论点赞
        $(".pj_zan").click(function(){
        	 var rid = $(this).attr("id");
        	 $.ajax({
        	        type:"post",
        	        url:"__APP__/index.php/Article/add_zan?rid="+$(this).attr('id')+" & action=review",
        	        data:"idid="+new Date(),
        	        dataType:"html",
        	        success:function(msg){
        	        	if(msg == "已赞"){
		        			$('#tipb').css('display','none');
		        			$('#tipa').css("top",$(document).scrollTop()+($(window).height())/2-100+"px");
		        			$('#tipa').css('display','block');
		        			setTimeout(outa, 3000);
		        	}else if(msg == "已踩不赞"){
		        			$('#tipa').css('display','none');
		        			$('#tipb').css("top",$(document).scrollTop()+($(window).height())/2-100+"px");
		        			$('#tipb').css('display','block');
		        			setTimeout(outb, 3000);
		        	}else{
		        		$("#"+rid).html(msg);
		        	}
        	    	  }
        	    });
        });
        //给评论点赞结束
    });