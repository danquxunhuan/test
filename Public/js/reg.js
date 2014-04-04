    
function strlen(str){
    var strlength=0;
    for (i=0;i<str.length;i++){
        if (isChinese(str.charAt(i))==true)
           strlength=strlength + 2;
        else
           strlength=strlength + 1;
     }
     return strlength;
}

function isChinese(str){
    var reg = /[u00-uFF]/;       
    return !reg.test(str);      
}

function isEmail(email){
   var reg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
   return reg.test(email);
}

function checkId(pId){
    var arrVerifyCode = [1,0,"x",9,8,7,6,5,4,3,2];
    var Wi = [7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2];
    var Checker = [1,9,8,7,6,5,4,3,2,1,1];
    if(pId.length != 15 && pId.length != 18)    return false;
    var Ai=pId.length==18 ?  pId.substring(0,17)   :   pId.slice(0,6)+"19"+pId.slice(6,16);
    if (!/^\d+$/.test(Ai))  return false;
    var yyyy=Ai.slice(6,10) ,  mm=Ai.slice(10,12)-1  ,  dd=Ai.slice(12,14);
    var d=new Date(yyyy,mm,dd) ,  now=new Date();
     var year=d.getFullYear() ,  mon=d.getMonth() , day=d.getDate();
    if (year!=yyyy || mon!=mm || day!=dd || d>now || year<1940) return false;
    for(var i=0,ret=0;i<17;i++)  ret+=Ai.charAt(i)*Wi[i];    
    Ai+=arrVerifyCode[ret %=11];     
    return pId.length ==18 && pId != Ai ? false : true;        
}
    
$(function(){
    //$("#province").change(function(){ (wyj)添加默认省份选择，市县保持联动
		$("#area").empty();
		$("<li value=\"\">选择县</li>").appendTo("#area");
		var area = $("#province").val();
		if(area!=""){
			$.ajax({
				type: "GET",
				url: "__APP__/Public/getAreaName",
				datatype : "json",
				data: "&id="+encodeURIComponent(area)+"&math="+Math.floor(Math.random()*1000+1),
				success: function(msg){
					if(msg!="0"){
							var msg = eval("("+ msg+")");
							var str = "<option value=\"\">选择区</option>";
							for(var i in msg){
									str += "<option value="+msg[i].id+">"+msg[i].name+"</option>";
							}
							var city = $("#city");
							city.empty();
							$(str).appendTo("#city");
					}
				}
			});
		}
   // });
    //根据市查询县
    $("#city").change(function(){
            var city = $("#city").val();			
            if(city!=""){
                    $.ajax({
                            type: "GET",
                            url: "/test/public/getAreaName",
                            datatype : "json",
                            data: "&id="+encodeURIComponent(city)+"&math="+Math.floor(Math.random()*1000+1),
                            success: function(msg){
                                    if(msg!="0"){
                                            var msg = eval("("+ msg+")");
                                            var str = "<option value=\"\">选择县</option>";
                                            for(var i in msg){
                                                    str += "<option value="+msg[i].id+">"+msg[i].name+"</option>";
                                            }
                                            var area = $("#area");
                                            area.empty();
                                            $(str).appendTo("#area");
                                    }
                            }
                    });
            }
    });
    
});


var isUserName = false;
function msgEvent(type,flag,k){
        if( type=='uname'){
            checkUname(flag);
        }else if(type=='yqm_sn'){
            checkYqm(flag);
        }else if(type=='password'){
            checkPassword(flag);
        }else if(type=="confirmpwd"){
            checkConfirmpwd(flag);
        }else if(type=='phone' ){
            checkPhone(flag);
        }else if(type=='email'){
            checkEmail(flag);
        }else if( type=='realname'){
            checkRealname(flag);
        }else if( type=='uname1'){
            checkUname1(flag);
        }else if(type=='yqm_sn1'){
            checkYqm1(flag);
        }else if(type=='password1'){
            checkPassword1(flag);
        }else if(type=="confirmpwd1"){
            checkConfirmpwd1(flag);
        }else if(type=='phone1' ){
            checkPhone1(flag);
        }else if(type=='email1'){
            checkEmail1(flag);
        }else if( type=='realname1'){
            checkRealname1(flag);
        }
}



//检查邀请码
function checkYqm(flag){
    var ispost = true;
    var yqm_sn = $.trim($("#yqm_sn").val());
      var reg = /[^a-z0-9]/g;
    if(yqm_sn!=''){
        var msg = "";
		var len =strlen(yqm_sn); 
        if(reg.test(yqm_sn)){
            msg = "验证码不正确";
        }else if(len<5){
		    msg = "验证码不能小于5个数字";
		}
        if(msg!=''){
            $("#msg_yqm").empty().html("<div class='error'><p class='nok'></p><div>").show();
            ispost = false;
        }else{
            if( _ajaxYqm(yqm_sn)){
                ispost = false;
            }
        }
    }else{
        $("#msg_yqm").empty()
        if(flag){
             $("#msg_yqm").html('<div class="error"><span>请联系客服获取邀请码</span><b></b></div>').show();
        }
        
    }
    return ispost;
}


//检查用户名
function checkUname(flag){
    var ispost = true;
    var uname = $.trim($("#uname").val());
    var reg=/[^0-9a-zA-Z]/g;
    if( uname!=''){
        var len =strlen(uname); 
        var msg = "";
        if( uname.match("^[\\d]+$")){
            msg = "用户名不能全为数字！";
        }else if(len<1){
            msg = "用户名长度须大于2个字符";
        }else if( len >20){
            msg = "用户名长度不能大于20个字符";
        }
        if(msg!=''){
            $("#msg_username").empty().html('<div class="error"><span>'+msg+'</span><b></b></div>').show();
            ispost = false;
        }else{
            if( _ajaxUame(uname)){
                ispost = false;
            }
        }
    }else{
        $("#msg_username").empty()
        if(flag){
             $("#msg_username").html('<div class="error"><span>英文字母或中文组合</span><b></b></div>').show();
        } 
    }
    return ispost;
}

//检查手机号
function checkPhone(flag){
    var ispost = true;
    var phone = $.trim($('#phone').val());
    if( phone!=''){
        var msg = '<div class="error_o"></div>';
        if(  !(/^1[3|4|5|8][0-9]\d{4,8}$/).test(phone)  ){
             msg = '<i>×</i>'; 
			 $("#msg_phone").empty().html(msg).show();
			 ispost = false;	
		}else{
			if(_ajaxPhone(phone)){
				ispost = false;
			}
		}
    }else{
        $("#msg_phone").empty();
        if(flag){
            $("#msg_phone").html('<i>×</i>').show();
        }
    }
    return ispost;
}

function _ajaxYqm(yqm_sn){
    //alert(yqm_sn);
	//alert('这是什么节奏');
var ispost = false;
$.ajax({
    type: "POST",
    url: "checkYqm",
    datatype : "xml",
    async:'false',
    data: "&yqm_sn="+encodeURIComponent(yqm_sn)+"&math="+Math.floor(Math.random()*1000+1),
    success: function(data){
           $("#msg_yqm").html(data.info).show();
    }
});
return ispost;

}

function _ajaxUame(uname){
    
var ispost = false;
$.ajax({
    type: "POST",
    url: "checkRes",
    datatype : "xml",
    async:'false',
    data: "&uname="+encodeURIComponent(uname)+"&math="+Math.floor(Math.random()*1000+1),
    success: function(data){
           $("#msg_username").html(data.info).show();
    }
});
return ispost;

}

//AJAX查询手机
function _ajaxPhone(phone){
    
var ispost = false;
$.ajax({
    type: "POST",
    url: "checkPhone",
    datatype : "xml",
    async:'false',
    data: "&phone="+encodeURIComponent(phone)+"&math="+Math.floor(Math.random()*1000+1),
    success: function(data){
        if(data=='true'){
           $("#msg_phone").empty().html('<div class="error">对不起，该手机号已经存在<b></b></div>').show();
           ispost = true;
        }else{
            //isUserName = true;
            $("#msg_phone").html(data.info).show();
            return false;
        }
    }
});
return ispost;

}

//AJAX查询身份证
function _ajaxIcard(Icard){
    
var ispost = false;
$.ajax({
    type: "POST",
    url: "/Common/checkIcard",
    datatype : "xml",
    async:'false',
    data: "&icard="+encodeURIComponent(Icard)+"&math="+Math.floor(Math.random()*1000+1),
    success: function(r_msg){
        var flag = $(r_msg).find("flag").text();
        if(flag=='true'){
           $("#msg_icard").empty().html('<div class="error"><span>对不起，该身份证号已经存在</span><b></b></div>').show();
           ispost = true;
        }else{
            //isUserName = true;
            $("#msg_icard").empty().html('<div class="error"></div>').show();
            return false;
        }
    }
});
return ispost;

}

//AJAX查询验证码
function _ajaxCode(Code){
    
var ispost = false;
$.ajax({
    type: "POST",
    url: "/Common/checkCode",
    datatype : "xml",
    async:'false',
    data: "&code="+encodeURIComponent(Code)+"&math="+Math.floor(Math.random()*1000+1),
    success: function(r_msg){
        var flag = $(r_msg).find("flag").text();
        if(flag=='true'){
           $("#msg_code").empty().html('<div class="error"><span>验证码输入不正确,重新输入</span><b></b></div>').show();
           ispost = true;
        }else{
            //isUserName = true;
            $("#msg_code").empty().html('<div class="error"><span></span></div>').show();
            return false;
        }
    }
});
return ispost;

}

//检查登陆密码
function checkPassword(flag){
    var ispost = true;
    var pwd = $.trim($("#password").val());
    if( pwd !=''){
        var msg = '<div class="error_o"></div>';
        if( !(/^[0-9a-zA-Z]{6,16}$/).test(pwd) ){
            msg = '<div class="error"><span>6至16位英文或数字</span></div>';
            ispost = false;
		   $("#msg_password").empty().html(msg).show();
        }else{
		msg = "<div class='error'><p class='ok'></p></div>";
        $("#msg_password").empty().html(msg).show();
		}
       
    }else{
        $("#msg_password").empty();
        if(flag){
             $("#msg_password").html('<div class="error"><span>6-16位数字和字母组成</span></div>').show();
        }
    }
    return ispost;
    
}

//检查确认密码
function checkConfirmpwd(flag){
    var ispost = true;
    var pwd =  $.trim($("#password").val());
    var pwd2 =  $.trim($("#confirmpwd").val());
    if( pwd2!='' ){
         var msg = '<div class="error_o"></div>';
        if( pwd!=pwd2 ){
             msg = '<div class="error"><span>两次输入的密码不一致</span></div>';
             ispost = false;
			 $("#msg_confirmpwd").empty().html(msg).show();
        }else{
		msg = '<div class="error"><p class="ok"></p></div>';
        $("#msg_confirmpwd").empty().html(msg).show();
		}
    }else{
        $("#msg_confirmpwd").empty();
        if(flag){
            $("#msg_confirmpwd").html('<div class="error"><span>请重复输入密码</span></div>').show();
        }
    }
    return ispost;
}

//检查邮箱
function checkEmail(flag){
    var ispost = true;
    var email = $.trim( $('#email').val() );
    if( email!='' ){
        var msg = '<div class="error_o"></div>';
        if( !isEmail(email) ){
            msg = '<div class="error"><span>邮箱格式不正确，请重新输入</span></div>';
            ispost = false;
        }
        $("#msg_email").empty().html(msg).show();
    }else{
        $("#msg_email").empty();
        if(flag){
            $("#msg_email").html('<div class="error"><span>请输入您常用的电子邮箱，如果没有可不填写.</span></div>').show();
        }
    }
    return ispost;
}


//检查验证码
function checkCode(flag){
    var ispost = true;
    var code = $.trim($('#code').val());
    if( code!=''){
        var msg = '<div class="error_o"></div>';
        if(  !(/\w{4}/).test(code)  ){
             msg = '<div class="error"><span>验证码格式不正确，请重新输入</span></div>'; 
			 $("#msg_code").empty().html(msg).show();
			 ispost = false;	
		}else{
			if(_ajaxCode(code)){
				ispost = false;
			}
		}
    }else{
        $("#msg_code").empty();
        if(flag){
            $("#msg_code").html('<div class="error"><span>请输入正确的验证码</span></div>').show();
        }
    }
    return ispost;
}

//注册提交
function regSubmit(){
    var post = true; 
	
	
	   //邀请码
		var yqm_sn= $.trim($("#yqm_sn").val());
		 if (yqm_sn.length ==0)
        {  
           $("#msg_yqm").empty().html('<div class="error"><span>请输入邀请码</span></div>').show();
           post = false;
        }
         else
          {
         var reg = /^[a-z0-9]{6}$/;
        if ( !reg.test(yqm_sn))
          {
           $("#msg_yqm").empty().html('<div class="error"><span>请输入邀请码</span></div>').show();
           post = false;
           }
          }
    //用户名
    var username = $.trim($("#uname").val());
    if( username==""){
        $("#msg_username").empty().html('<div class="error"><span>请输入用户名</span></div>').show();
        post = false;
    }else{ 
       if(!checkUname(username)){
           post =false;          
       }
    }
	

      
	if($("#msg_username").html().indexOf('对不起，该用户名已存在') != -1){
	$("#msg_username").empty().html('<div class="error"><span>对不起，该用户名已存在</span></div>').show();
		post = false;
	}  

    //密码
    var password = $.trim($("#password").val());
    if( password=='' ){
        $("#msg_password").empty().html('<div class="error"><span>请输入登陆密码</span></div>').show();
        post = false;
    }else{
        if( !checkPassword() ){
            post = false;
        }
    }
    //确认密码
    var confirmpwd = $.trim($("#confirmpwd").val());
    if( confirmpwd=='' ){
        $("#msg_confirmpwd").empty().html('<div class="error">请输入确认密码<b></b></div>').show();
        post = false;
    }else{
        if( !checkConfirmpwd() ){
            post = false;
        }
    }
    //手机号码
    var phone = $.trim($("#phone").val());
    if( phone=='' ){
        $("#msg_phone").empty().html('<div class="error">请输入手机号码<b></b></div>').show();
        post = false;
    }else{
        if( !checkPhone() ){
            post = false;
        }
    }
	if($("#msg_phone").html().indexOf('对不起，该手机号已经存在！') != -1){
		$("#msg_phone").empty().html('<div class="error"><span>对不起，该手机号已经存在！</span></div>').show();
        post = false;
	}  

    //邮箱
    var email = $.trim( $("#email").val() );
    if( email!='' ){
        if(!checkEmail()){
            post = false;
        }
    }

   
    //所属地区
    var province = $("#province").val();
    if( province!=''){
         var city = $("#city").val();
         var area = $("#area").val();
         $("#msg_area").empty();
         if( city=='' || area==''){
             $("#msg_area").html('<div class="error">请选择市/县<b></b></div>').show();
         }else{
             $("#msg_area").html('<div class="error_o"></div>');
         }
    }
    //验证码
    var code = $.trim($("#code").val());
    if( code==""){
        $("#msg_code").empty().html('<div class="error">请输入验证码<b></b></div>').show();
        return false;
    }else{ 
       if(!checkCode(code)){
           post =false;          
       }
    }
      
	if($("#msg_username").html().indexOf('对不起，该用户名已存在') != -1){
	$("#msg_username").empty().html('<div class="error">对不起，该用户名已存在<b></b></div>').show();
		return false;
	}

    if($("#chk_treaty").attr("checked") == false){
        $("#msg_chk_treaty").empty().html('<div class="error">您必须同意服务协议后才能正确免费注册<b></b></div>').show();
        
        return false;
    }
    if(post){
        if( isUserName ){
            $("#myform").submit();
        }
        
    }
}

//重载验证码    
function freshVerify() {
   document.getElementById('verifyImg').src='/Index/verify/'+Math.random();
}

