/*个人空间——评价信息*/
window.onload = function (){
	var oStar = document.getElementById("star");
	var aLi = oStar.getElementsByTagName("li");
	var oUl = oStar.getElementsByTagName("ul")[0];
	var oSpan = oStar.getElementsByTagName("span")[1];
	var oP = oStar.getElementsByTagName("p")[0];
	var i = iScore = iStar = 0;
	var score = document.getElementById("scores");
	var aMsg = [
				"很不满意|","很不满意|",
				"不满意|","不满意|",
				"一般|","一般|",
				"满意|","满意|",
				"非常满意|","非常满意|"
				]
    var scores = [
				"55","60",
				"65","70",
				"75","80",
				"85","90",
				"95","100"
				]
	
	for (i = 1; i <= aLi.length; i++){
		aLi[i - 1].index = i;		
		//鼠标移过显示分数
        aLi[i - 1].onmouseover = function (){
			fnPoint(this.index);
			//浮动层显示
			//oP.style.display = "block";
			//计算浮动层位置
			//oP.style.left = oUl.offsetLeft + this.index * this.offsetWidth - 104 + "px";
			//匹配浮动层文字内容
			oSpan.HTML = "<strong>" + scores[this.index - 1] + "</strong> 分 ";
		};		
		//鼠标离开后恢复上次评分
		aLi[i - 1].onmouseout = function (){
			fnPoint();
			//关闭浮动层
			oP.style.display = "none"
		};
		
		//点击后进行评分处理
		aLi[i - 1].onclick = function (){
			iStar = this.index;
			oP.style.display = "none";
			oSpan.innerHTML = "<strong>" + scores[this.index - 1] + " 分</strong>"
			score.value=scores[this.index - 1];
		}
	}	
	//评分处理
	function fnPoint(iArg){ 
		//分数赋值
		iScore = iArg || iStar;
		for (i = 0; i < aLi.length; i++){
			//星星笑脸
			if(i%2==0){
				aLi[i].className = i < iScore ? "onleft" : "";	
			}else{
				aLi[i].className = i < iScore ? "onright" : "";	
			}
		} 
	}
	
	//点击50出现下拉
	var run =false;
	$('#shuzi').click(function(){
	  $(this).find('.kefy_posi').fadeToggle();
	  run =false;
	})
	
	$(document).click(function(e){
		if(run){
			var target  = $(e.target);
			if(target.closest("#shuzi .kefy_posi").length == 0){
				$("#shuzi .kefy_posi").css("display","none");
			}
		}
		run = true;
	});
	
	$('#shuzi ul li').hover(function(){
	   var id =$(this).find('a').attr('id');
	   $('#show_score').html('<strong>'+id+'</strong>');
	})
	
};