$(function(){	
	 var g = 'g';
	$('.mima,.jlmima').click(function(){
	  var box =$(this).parents('form')
	  ,oldpassword =$.trim(box.find('input[name="password"]').val())
	  ,newpassword = box.find('input[name="newpassword"]').val()
	  ,querenpassword = box.find('input[name="querenpassword"]').val()
	  ,act = $(this).attr('act');
	  
	if(oldpassword ==''){
	   box.find('.old').html('<span style="color:red;">当前密码不能为空</span>');
	   //alert('当前密码不能为空');
	   return false; 
	}else{
	 box.find('.old').empty();
	}
	
	if(newpassword ==''){
	   box.find('.new').html('<span style="color:red;">新密码不能为空</span>');
	   //alert('当前密码不能为空');
	   return false; 
	}else{
	 box.find('.new').empty();
	}
	
	if(querenpassword ==''){
	  box.find('.msg_confirmpwd').html('<span style="color:red">确认密码不能为空</span>');
	   return false;
	   }else{
	   box.find('.msg_confirmpwd').empty();
	     
	     if( !checkConfirmpwd('',$(this)) ){
            return false;
       }
	}
     ajax_password(act,oldpassword,newpassword,querenpassword,$(this));
    })
function ajax_password(act,old,newpassword,querenpassword,dqid){
 var ispost = false;
$.ajax({
    type: "POST",
    url: "/test/member/checkCode",
    datatype : "jason",
    async:'false',
    data: "&action="+encodeURIComponent(act)+"&old="+encodeURIComponent(old)+"&newpassword="+encodeURIComponent(newpassword)+"&querenpassword="+encodeURIComponent(querenpassword)+"&math="+Math.floor(Math.random()*1000+1),
    success: function(data){
            if(data.status == 1){
			 var box =dqid.parents('form');
			 box.find('input[name="password"]').empty();
	         box.find('input[name="newpassword"]').empty();
	         box.find('input[name="querenpassword"]').empty();
			 dqid.parents('.fumsg').find('.chenggong').html(data.info);
			  
			}else{
			 dqid.parents('.fumsg').find('.chenggong').html(data.info);
			}
    }
});
return ispost;


}	

	//检查确认密码
function checkConfirmpwd(flag,dqid){
    var ispost = true;
    var pwd =  $.trim(dqid.parents('form').find("input[name='newpassword']").val());
    var pwd2 =  $.trim(dqid.parents('form').find("input[name='querenpassword']").val());
    if( pwd2!='' ){
         var msg = '<span class="error_o"></div>';
        if( pwd!=pwd2 ){
             msg = '<span style="color:red">×两次输入密码不一致<span>';
             ispost = false;
			 dqid.parents('form').find(".msg_confirmpwd").empty().html(msg).show();
        }else{
		msg = '<span style="color:green">√<span>';
        dqid.parents('form').find(".msg_confirmpwd").empty().html(msg).show();
		}
    }else{
        dqid.parents('form').find(".msg_confirmpwd").empty();
        if(flag){
            dqid.parents('form').find(".msg_confirmpwd").html('<div class="error"><span>请重复输入密码</span></div>').show();
        }
    }
    return ispost;
}


//隐身 2014-01-24
    $('#ms_green,#ms_red').click(function(){
      var ishide = $(this).attr('ishide');
      var fu =$('#ms_green').parents('.sqys_top');
	  var red =$('#ms_red').parents('.sqys_bottom');
	  if(fu.hasClass("sqs_mo")){
		 fu.removeClass("sqs_mo");  
		 red.addClass('sqs_mo1');
		}else{
         fu.addClass('sqs_mo');
		 red.removeClass('sqs_mo1');
		}
	  ajax_ishide(ishide);	
    })

function ajax_ishide(ishide){
 var ispost = false;
$.ajax({
    type: "POST",
    url: "/test/member/checkIshide",
    datatype : "xml",
    async:'false',
    data: "&ishide="+encodeURIComponent(ishide)+"&math="+Math.floor(Math.random()*1000+1),
    success: function(data){
            if(data.status == 1){
			 
			}
    }
});
return ispost;
}	 
$('.ms_url').click(function(){
  var url =trim($('#url').val(),g);
  if(url == ''){alert('您还没有填写域名');return false;}
  ajax_url(url);
})

function ajax_url(url){
 var ispost = false;
$.ajax({
    type: "POST",
    url: "/test/member/checkIshide",
    datatype : "json",
    async:'false',
    data: "&url="+encodeURIComponent(url)+"&math="+Math.floor(Math.random()*1000+1),
    success: function(data){
	        
            if(data.status == 1){
			  data=data.data;
			  $('#ms_url').html(data.url);
			}
    }
});
return ispost;
}

})