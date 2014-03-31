$(function(){		
	/*
	* 绑定 enter 提交查询
	*/
	$('input[id=tag]').keyup(function(event){
        if(event.keyCode ==13){
       $("#search").trigger("click");
    }
    });		
 });		