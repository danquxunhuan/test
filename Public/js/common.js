$(function(){
  //导航 滑过显示
    var run =false;
  	 $('.index_xiala').click(function () {
    	  var btn = $('#index_show');
		if(btn.is(':hidden')){			
			btn.show();
		}else{
			btn.hide();
		}
		run = false;
    })
	
	$(document).click(function(e){
		if(run){
			var target  = $(e.target);
			if(target.closest("#index_show").length == 0){
				$("#index_show").css("display","none");
			}
		}
		run = true;
	});

   //全站 input内容 点击消失
	$('.inpu1').bind({ 
		focus:function(){ 
		//这几句是消除默认显示内容的
			$(this).css("color","black");
			$(this).css("font-size","14px");
			$(this).css("font-family","微软雅黑");
			if (this.value == this.defaultValue){
			this.value=""; 
			} 
		}, 
		mouseover:function(){$(this).css("borderColor","#42b3f9");},
		mouseout:function(){$(this).css("borderColor","#CCC");},
		blur:function(){ 
			if (this.value == ""){ //如果为空，则恢复默认文字且字体恢复到12px颜色恢复到默认浅黑色。
			this.value = this.defaultValue; 
			$(this).css("color","#CCC");
			$(this).css("font-size","12px");
			$(this).css("font-family","宋体");
			} 
		} 
	}); 
	})
	
function doZoom(size){
	    document.getElementById('zoom').style.fontSize=size+'px'
       //	setTailPosition()
	   return false;
      }
	  //去掉空格
function trim(str,is_global){
      var result; 
      result = str.replace(/(^\s+)|(\s+$)/g,"");
      if(is_global.toLowerCase()=="g")
      result = result.replace(/\s/g,"");
      return result;
    }
function SetFont(size)
     {
        //var leadText = document.getElementById("boxshadow");
        var divBody = document.getElementById("neirong_box");
        if(!divBody)
     {
	  return;
     }
      //leadText.style.fontSize = size-3 + "px";
      divBody.style.fontSize = size + "px";
      var divChildBody = divBody.childNodes;
     for(var i = 0; i < divChildBody.length; i++)
     {
	   if (divChildBody[i].nodeType==1)
	   {
		  //leadText[i].style.fontSize = size-3 + "px";
		  divChildBody[i].style.fontSize = size + "px";
		  //document.getElementById(size).className="curt";
	   }
     }
  //document.body.scrollTop = document.body.scrollHeight;
}
	
$(function(){
		//点击默认字符消失
	$('#msg').bind({ 
		focus:function(){ 
		//这几句是消除默认显示内容的
			$(this).css("color","black");
			//$(this).css("font-size","14px");
			$(this).css("font-family","微软雅黑");
			//$(this).css("borderColor","#f6b37f");
			if (this.value == this.defaultValue){
			this.value=""; 
			} 
		}, 
		mouseover:function(){$(this).css("borderColor","#A8DBF5");},
		mouseout:function(){$(this).css("borderColor","#CCC");},
		blur:function(){ 
			//$(this).css("borderColor","#CCC");
			if (this.value == ""){ //如果为空，则恢复默认文字且字体恢复到12px颜色恢复到默认浅黑色。
			this.value = this.defaultValue; 
			$(this).css("color","#CCC");
			//$(this).css("font-size","12px");
			$(this).css("font-family","宋体");
			} 
		} 
	}); 
	//点击默认字符消失
	$('.msg1').bind({ 
		focus:function(){ 
		//这几句是消除默认显示内容的
			$(this).css("color","black");
			//$(this).css("font-size","14px");
			$(this).css("font-family","微软雅黑");
			//$(this).css("borderColor","#f6b37f");
			if (this.value == this.defaultValue){
			this.value=""; 
			} 
		}, 
		mouseover:function(){$(this).css("borderColor","#A8DBF5");},
		mouseout:function(){$(this).css("borderColor","#CCC");},
		blur:function(){ 
			//$(this).css("borderColor","#CCC");
			if (this.value == ""){ //如果为空，则恢复默认文字且字体恢复到12px颜色恢复到默认浅黑色。
			this.value = this.defaultValue; 
			$(this).css("color","#CCC");
			//$(this).css("font-size","12px");
			$(this).css("font-family","宋体");
			} 
		} 
	});

   //实现点击密码框 其类型属性变为password，密码框输入文字后，文字将变为圆点，而失去焦点时 如果框内为空则填入密码二字且类型变为text
	$('#password').bind({//需要给输入框加个id
		focus:function()
		{
			if(this.type == "text" && this.value !== this.defaultValue)
			{this.type = "password";}
		},
		blur:function()
		{
			if(this.type == "password" && this.value == this.defaultValue || this.value=="")
			{
				this.type = "text";
			}
		}
	});	
	
	//给字号A改变颜色     加了两个id
	$("#font_small").click(function(){
		if($(this).attr('class') !== "xq_amo"){
			$(this).addClass('xq_amo');
			$("#font_big").toggleClass("xq_amo");
		}
	});
	$("#font_big").click(function(){
		if($(this).attr('class') != "xq_amo"){
			$(this).addClass('xq_amo');
			$("#font_small").toggleClass("xq_amo");
		}
	});

});	

//实现提交表单功能：
	function fsubmit(obj){
		obj.submit();
	}

	