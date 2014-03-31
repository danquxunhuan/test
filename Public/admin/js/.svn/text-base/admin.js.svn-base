function check(id,val){
    var isChecked = "";
    isChecked = $("#"+id).attr("checked");
    var str=new String();
    var str = $("#privilist").val();
    if(isChecked==true){
        if(str==""){
            str = val;
        }else{
            str += ","+val;
        }
    }else{
        arr=str.split(',');//注split可以用字符或字符串分割
        for(var i=0;i<arr.length;i++){
            if(val==arr[i]){
                arr.splice(i,1);
            }
        }
        str = arr.join(",");
    }
    $("#privilist").val(str);
}

//表单提交禁止回车事件
function checkSubmit(){
	$("input").keypress(function (e) {
	  var keyCode = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;
	  if (keyCode == 13){
		  for (var i = 0; i < this.form.elements.length; i++) {
			 if (this == this.form.elements[i]) break;
		  }
		i = (i + 1) % this.form.elements.length;
		this.form.elements[i].focus();
		return false;
	  }else{
		  return true;
	  }
	})
}


//AJAX 查询区域代理商
function ajaxSearchAgent(){
	$("#search_agent").click(function(){
                var province = $("#province").val();//省
                var city = $("#city").val();//市
		var area = $("#area").val();//县
                var pData = "";
		if(province != ""  ){
                    if(province != ""  && city !="" && area !=""){
                        pData = "&province="+encodeURIComponent(province)+"&city="+encodeURIComponent(city)+"&area="+encodeURIComponent(area)+"&math="+Math.floor(Math.random()*1000+1);
                    }else if(province != ""  && city !=""){
                        pData = "&province="+encodeURIComponent(province)+"&city="+encodeURIComponent(city)+"&math="+Math.floor(Math.random()*1000+1);
                    }else if(province != "" ){
                        pData = "&province="+encodeURIComponent(province)+encodeURIComponent(area)+"&math="+Math.floor(Math.random()*1000+1);
                    }
			$.ajax({
				type: "GET",
				url: "/admin.php/user_info/searchagent",
				datatype : "json",
				data: pData,
				success: function(msg){
					if(msg!="0"){
						var msg = eval("("+ msg+")")
						var str = "";
						for(var i in msg){
							str += "<span style='padding-left:15px;padding-right:5px;font-size:14px;font-weight:bold'>"+msg[i].realname+"</span>:<span>"+msg[i].username+"</span>";
						}
						$("#show_agent").empty();
						$("#show_agent").html(str);
					}
				}
			});
	    }else{
			alert("请选择区域查询");
		}
	});
}

//验证区域
function checkArea(){
	//根据省查询市
	$("#province").change(function(){
		$("#area").empty();
		$("<option value=\"\">-请选择县-</option>").appendTo("#area");
		var area = $("#province").val();
		if(area!=""){
			$.ajax({
				type: "GET",
				url: "/admin.php/user_info/getAreaName",
				datatype : "json",
				data: "&aid="+encodeURIComponent(area)+"&math="+Math.floor(Math.random()*1000+1),
				success: function(msg){
					if(msg!="0"){
						var msg = eval("("+ msg+")");
						var str = "<option value=\"\">-请选择市-</option>";
						for(var i in msg){
							str += "<option value="+msg[i].aid+">"+msg[i].area_name+"</option>";
						}
						var city = $("#city");
						city.empty();
						$(str).appendTo("#city");
					}
				}
			});
		}
	});
	//根据市查询县
	$("#city").change(function(){
		var city = $("#city").val();
		if(city!=""){
			$.ajax({
				type: "GET",
				url: "/admin.php/user_info/getAreaName",
				datatype : "json",
				data: "&aid="+encodeURIComponent(city)+"&math="+Math.floor(Math.random()*1000+1),
				success: function(msg){
					if(msg!="0"){
						var msg = eval("("+ msg+")");
						var str = "<option value=\"\">-请选择县-</option>";
						for(var i in msg){
							str += "<option value="+msg[i].aid+">"+msg[i].area_name+"</option>";
						}
						var area = $("#area");
						area.empty();
						$(str).appendTo("#area");
					}
				}
			});
		}
	});
	//判断区域是否有值
	$("#area").change(function(){
		 checkAreaValue();
	});
}

//验证区域的值
function checkAreaValue(){
	var area = $("#area");
	if(area.val()!=""){
		$("#areaTip").removeClass("onShow").addClass("onCorrect").html("选择正确"); 
		return true;
	}else{
		$("#areaTip").removeClass("onCorrect").addClass("onShow").html("选择区域")
		alert("请选择区域");
		return false;
	}
}

//验证用户银行相关信息
function checkBank(){
	var objPayType = $("#pay_type").val();
	var objPayAddress = $("#pay_address").val().trim();
	var objPayAccount = $("#pay_account").val().trim();
	if((objPayType !="" || objPayAddress !="" || objPayAccount !="") && !(objPayType !="" && objPayAddress !="" && objPayAccount !="")){
		alert("请输入银行相关信息");
		return false;
	}else{
		return true;
	}

}

//删除确认
function checkCom() { 
	if(confirm("是否进行此操作?")){
		return true;
	}else{
		return false;
	}
} 