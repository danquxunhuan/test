$(function(){
	//收藏名师
	var f_run = 1;//这个仅能阻止在不刷新页面的情况下的连续点击
	$(".zy_scang").click(function(){
		var strId = $(this).attr('id').replace(/[^\d]*/ig,"");
		var id = parseInt(strId);
		if(f_run =="1"){
		    $.ajax({
		        type:"post",
		        url:APP+"/Member/add_favorite_teacher?uid="+id,
		        data:"idid="+new Date(),
		        dataType:"html",
		        success:function(msg){
		        	if(msg=="您已收藏"){
		        		alert(msg);
		        	}else{
		        		$(".zy_scang span").text(msg);
		        	}
		    	}
		    });
		    f_run = 0;
		}
	});

});
