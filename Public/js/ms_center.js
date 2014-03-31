$(function(){	
    var g = 'g';
	var showMsg = $('#msg');
	var strongMsg = $('#strong');
	/******后台中心首页*******/	
	//小图切换大图
	$(document).on('click','.change_big',function(){
		var box = $('.wzsy'),
		bigbox= box.find('.wzsy_bigimg'),
		bbox= box.find('.wz_lists');

		if(bbox.hasClass("wzsy_bigimg")){
		 $(".wzsy .wzsy_bigimg").removeClass("wzsy_bigimg");  
		}else{
         bbox.addClass('wzsy_bigimg');
		}
	})
	

	//xtxx 系统消息 点击隐藏
	$('.xtxx').click(function(){
	    var box=$(this).parents('li').find('.zhan_none');
	    if(box.is(':hidden')){
		   box.show();		   
		}else{
		   box.hide();
		}
	
	})
	
    $('.yuyue').click(function(){
	    var box=$(this).parents('dl').find('.xuqiu_yincang');
	    if(box.is(':hidden')){
		   box.show();		   
		}else{
		   box.hide();
		}
	
	})
	
	
	//教学方案提交
	$('.fangan').click(function(){
	   var content = trim($('#content').val(),g);
	   var kid = $('#kid').val();
	   if(content == ''){
			alert('内容不能为空');
			return false;
	   }
	$.ajax({
    type: "POST",
	url: "/test/fangan/addFangan",  
    datatype : "json",
    async:'false',
    data: "&content="+encodeURIComponent(content)+"&kid="+kid+"&math="+Math.floor(Math.random()*1000+1),
    success: function(data){
           if(data.status==1){
		            $('#content').val("");
					$('.yuyue').text('已预约')
					alert('添加成功');
			}else{
				alert('不可重复提交！');
		    }
        }
     });
	})
	
	/**********导航切换***********/
	//点击六方形  下拉
	var runshow =false;
	$('.show').click(function(){
		$(this).parents('.show_all').find('ul').fadeToggle();
		runshow = false;
	}); 
    	$(document).click(function(e){
		if(runshow){
			var target  = $(e.target);
			if(target.closest("#color_ul2").length == 0){
				$("#color_ul2").css("display","none");
			}
		}
		runshow = true;
	});	
	$('#show_style li a').live('click',function(){
	   var act = $(this).attr('act');
	   var src =$(this).find('img').attr('src');
		
    $.ajax({
    type: "POST",
	url: "/test/member/add_style",  
    datatype : "json",
    async:'false',
    data: "&style="+encodeURIComponent(act)+"&math="+Math.floor(Math.random()*1000+1),
    success: function(data){
           if(data.status==1){
					$('#show_top').html('<img src="'+src+'" />');
					$('#logo').html('<img src="/test/Public/images/'+act+'.png" />');
					//$('#show_style').append('<li><a href="javascript:;" act="black"><img src="/test/Public/images/black_center.png" /></a></li>');
					document.getElementById('change_css').href ="/test/Public/css/"+act+"_center.css";
			    }else{
			        alert('选择失败');
			   }
        }
     });
	 
	})
	
	
    /******个人简介 字数*******/	
	$(showMsg).keyup(function(){
	       var msgs = trim($('#msg').val(),g);
		   if(msgs.length<100){		    
		   $('#notice').html("<span style='color:#01ae05'>"+(msgs.length)+"个字<span>");
		   }else{
		    $('#notice').html("可以发布了");
		   }
	  })
	/******我的强项 字数*******/	
	$(strongMsg).keyup(function(){
	       var msgs = trim($('#strong').val(),g);
		   if(msgs.length<50){		    
		   $('#notice_strong').html("<span style='color:#01ae05'>"+(msgs.length)+"个字<span>");
		  }else{
		    $('#notice_strong').html("可以发布了");
		   }
	  })
	 	/**
	*	textarea自动高度
	**/ 
	$('form textarea').autoResize({
	    onResize : function() {
	        $(this).css({opacity:0.8});
	    },
	    animateCallback : function() {
	        $(this).css({opacity:1});
	    },
	    animateDuration : 300,
	    extraSpace : 0
	});
	 
	
    /**
	*	by sasa
	*    禁用表单
	**/
    $('.zyxx_www form').submit(function(){return false;});	
	$('.xuqiu_yincang form').submit(function(){return false;});
    /*********************	
	 **  by sasa  导航切换(这是哪里的)
	 **  2014-01-08
	*********************/
	    $("#news li").click(function (){
            var a = $(this).find(".mli").get(0);
            var id = a.id;
            var index = id.replace("mli", "");
            $("#news .yq_amo").removeClass("yq_amo");
			$(this).addClass("yq_amo");
            $(".cons").hide();
            $("#con" + index).show();
            return false;
        });
		
    /*********************	
	 **  by sasa  可授课时间
	 **  2014-01-08
	*********************/		
		$("#study_time1 li").live('click',function(){
        //li的id 
        //alert($(this).attr("id"));
		var morning = $(this).attr("id");
		
		if($(this).children("a").hasClass("zyxx_abj")){
		$(this).children("a").removeClass("zyxx_abj");
		//$('#morning').remove();
		}else{
		$(this).children("a").addClass("zyxx_abj");
		$('#morning').append('<span>星期'+ morning+'上午</span>');
		//info[] = morning;
		}
        //ul的id  
        //alert($(this).parent().attr("id"));
		
		
        });
		
				
		$("#study_time2 li").click(function(){
        //li的id 
        //alert($(this).attr("id"));
		var afternoon = $(this).attr("id");
		if($(this).children("a").hasClass("zyxx_abj")){
		$(this).children("a").removeClass("zyxx_abj");
		}else{
		$(this).children("a").addClass("zyxx_abj");
		$('#afternoon').append('<span>星期'+ afternoon+'下午</span>');
		}
        //ul的id  
        //alert($(this).parent().attr("id"));
        });
		
		$("#study_time3 li").click(function(){
        //li的id 
        //alert($(this).attr("id"));
		var day =new Array();
		
		var evening = $(this).attr("id");
		if($(this).children("a").hasClass("zyxx_abj")){
		$(this).children("a").removeClass("zyxx_abj");
		$('#evening').html('');
		}else{
		$(this).children("a").addClass("zyxx_abj");
		$('#evening').append('<span>星期'+ evening+'晚上</span>');
		day = $(this).attr("id");
		}
		//alert(day);
        //ul的id  
        //alert($(this).parent().attr("id"));
        });
		
	//点击显示  年月日  有bug 重复点击  重复添加	
$('#xuanze_riqi').click(function(){
   for(var i = 115;i >0;i--){
    var year =1900 + i;
    var html = '<option value="'+year+'">'+year+'</option>';
	 // $('#xuanze_riqi').click(function(event){
     //    event.stopPropagation();
     // });
   $('#xuanze_year').append(html);
  }
})

$('#xuanze_year').click(function(){
   for(var i = 12;i >0;i--){
    var month =0 + i;
    var html = '<option value="'+month+'">'+month+'</option>';
	 $('#xuanze_month').append(html);
  }
 
})

$('#xuanze_month').click(function(){
   for(var i = 31;i >0;i--){
    var day =0 + i;
    var html = '<option value="'+day+'">'+day+'</option>'; 
	 $('#xuanze_day').append(html);	
  }
	
})	
	
	 /*********************	
	 **  by sasa  点击修改
	 **  2014-01-08
	 *********************/	
	  $('.ms_xiugai,.gbbox').click(function(){
	    var box=$(this).parents('dl').find('.zyxx_www');
	    if(box.is(':hidden')){
		   box.show();		   
		}else{
		   box.hide();
		}

	  })
	 /*********************	
	 **  by sasa 个人资料 点击修改
	 **  2014-01-08
	 *********************/	
	  $('.gbbox_person,#person').click(function(){
	    var person=$('#zyxx_person');
		if(person.is(':hidden')){
		  person.show();
		}else{
		  person.hide();
		}	  
	  })
	  
	 /*********************	
	 **  by sasa 个人资料 点击修改
	 **  2014-01-08
	 *********************/	
	  $('.mima,.gbox').click(function(){
	    var mima=$(this).parents('dl').parents('.jbxx_yk_list').parents('.zyxx_dandu').find('.zyxx_www');
		if(mima.is(':hidden')){
		  mima.show();
		}else{
		  mima.hide();
		}	  
	  })
	  
	 /*********************	
	 **  by sasa 标签删除
	 **  2014-01-10
	 *********************/	
	  $('.tag_remove').live('click',function(){
            var id =$(this).attr('id'),
			    act= $(this).attr('act');
			    deltag(id,act,$(this));

		})
	 /*********************	
	 **  by sasa 工作经历删除
	 **  2014-01-10
	 *********************/	
	  $('.delwork').live('click',function(){
            var id =$(this).attr('id'),
			    act= $(this).attr('act');
				 var dqid=$(this).parents('ul');
				 delwork(id,act,dqid);
	  })
	 /*********************	
	 **  by sasa 学习经历删除
	 **  2014-01-10
	 *********************/	
	  $('.delschool').live('click',function(){
            var id =$(this).attr('id'),
			    act= $(this).attr('act');
				 var dqid=$(this).parents('ul');
				 delschool(id,act,dqid);
	  })
	 /*********************	
	 **  by sasa 工作经历修改
	 **  2014-01-10
	 *********************/	
	  $('.editwork').live('click',function(){
        var id =$(this).attr('id')
		   ,act= $(this).attr('act')
		   ,str= $(this).attr('str')
		   ,end= $(this).attr('end')
		   ,dqid=$(this).parents('ul')
		   ,content    = trim($('#content').val(),g)
		   ,start_time= box.find('input[name="start_time"]').val()
		   ,end_time= box.find('input[name="end_time"]').val()
		   ,company= box.find('input[name="company"]').val();
		   editwork(id,content,company,start_time,end_time,dqid);
	  })
    
    /*********************	
	 **  by sasa 删除教学案例
	 **  2014-01-20
	 *********************/	
	  $('.delcase').live('click',function(){
            var id =$(this).attr('id'),
			    act= $(this).attr('act');
				 var dqid=$(this).parents('dl');
				 delcase(id,act,dqid);
	  })
	/*********************	
	 **  by sasa 删除我的故事
	 **  2014-01-20
	 *********************/	
	  $('.delstory').live('click',function(){
            var id =$(this).attr('id'),
			    act= $(this).attr('act');
				 var dqid=$(this).parents('dl');
				 delstory(id,act,dqid);
	  })
	 /**
	 **删除标签alax
	 **2014-01-13
	 **/
	function deltag(id,action,btnid){
    $.ajax({
    type: "POST",
	url: "/test/tag/deltag",  
    datatype : "json",
    async:'false',
    data: "&id="+encodeURIComponent(id)+"&math="+Math.floor(Math.random()*1000+1),
    success: function(data){
           if(data.status==1)	{
					htmlDelete(btnid);
			    }else{
			    alert('删除失败');
			   }
        }
     });
    }
	 /**
	 **删除工作经历alax
	 **2014-01-14
	 **/
    function delwork(id,action,btnid){
    $.ajax({
    type: "POST",
	url: "/test/workexperience/del_work",   
    datatype : "json",
    async:'false',
    data: "&id="+encodeURIComponent(id)+"&math="+Math.floor(Math.random()*1000+1),
    success: function(data){
           if(data.status==1)	{
					htmlDelete(btnid);
			    }else{
			    alert('删除失败');
			   }
        }
     });
    }
	
	/**
	 **删除工作经历alax
	 **2014-01-14
	 **/
    function delschool(id,action,btnid){
    $.ajax({
    type: "POST",
	url: "/test/studyexperience/del_school",   
    datatype : "json",
    async:'false',
    data: "&id="+encodeURIComponent(id)+"&math="+Math.floor(Math.random()*1000+1),
    success: function(data){
           if(data.status==1)	{
					htmlDelete(btnid);
			    }else{
			    alert('删除失败');
			   }
        }
     });
    }
	
	/**
	 **删除教学案例alax
	 **2014-01-14
	 **/
    function delcase(id,action,btnid){
    $.ajax({
    type: "POST",
	url: "/test/teachcase/del_case",   
    datatype : "json",
    async:'false',
    data: "&id="+encodeURIComponent(id)+"&math="+Math.floor(Math.random()*1000+1),
    success: function(data){
           if(data.status==1)	{
					htmlDelete(btnid);
			    }else{
			    alert('删除失败');
			   }
        }
     });
    }
	
		/**
	 **删除教学案例alax
	 **2014-01-14
	 **/
    function delstory(id,action,btnid){
    $.ajax({
    type: "POST",
	url: "/test/mystory/del_story",   
    datatype : "json",
    async:'false',
    data: "&id="+encodeURIComponent(id)+"&math="+Math.floor(Math.random()*1000+1),
    success: function(data){
           if(data.status==1)	{
					htmlDelete(btnid);
			    }else{
			    alert('删除失败');
			   }
        }
     });
    }
	
    /**
	*    删除标签动画效果
	**/
	function htmlDelete(box){
		$(box).animate({opacity:'0',left:'150'},300,function(){
			$(this).remove();
		})
	}
	  
	 /*********************	
	 **  by sasa 标签添加效果
	 **  2014-01-10
	 *********************/	
	  $('.fengge_r a').live('click',function(){
	        var tag = $(this).find('span').text(),
			    tid= $(this).attr('id');

			    $.ajax({
                   type: "POST",
                   url: "/test/tag/addtag",
                   datatype : "json",
                   async:'false',
                   data: "&tid="+encodeURIComponent(tid)+"&math="+Math.floor(Math.random()*1000+1),
                   success: function(data){				    
                    if(data.status==1){
					    data = data.data;
					    var box='<a class="tag_remove" href="javascript:void(0);" id ="'+data.id+'">'+data.name+'<i> ×</i></a>';
	                    $('#tags').append(box);
			        }else if (data.status == 2){
			            alert('不允许重复添加');
			        }else if(data.status == 0){
					    alert('添加失败');
					}
                  }
                });
      })
	  //标签换一换
	$('#hyih').click(function(){
			    $.ajax({
                   type: "POST",
                   url: "/test/tag/hyih",
                   datatype : "json",
                   async:'false',
                   data: "&math="+Math.floor(Math.random()*1000+1),
                   success: function(data){				    
                    if(data!==0){
						var data = eval("("+ data+")");
					    var box = '';
						for(var i in data){
						   box +='<a href="javascript:void(0);" id ="'+data[i].id+'"><i>+</i>'+data[i].name+'</a>';
						}
						$('#tag_hyih').empty();
	                    $(box).appendTo("#tag_hyih");
			        }else{
					    alert('换一换失败');
					}
                  }
                });
      })
	 
	/*********************	
	 **  by sasa  表单提交
	 **  2014-01-08
	 **  .add_btn 所有的表单提交按钮
	 **  dqbox 当前input 值
	 **  msg 个人简介
	 **  now_job 当前工作
	 **  dgid 当前id
	*********************/
	 $('.now_job').live('click',function(){
	    var box = $(this).parents('form')
		   ,now_job= box.find('input[name="now_job"]').val()
		   ,action = box.find('input[name="act"]').val();
		   if(now_job == '' || now_job == '目前工作'){
		    alert('亲，还没有填写内容呦');
            return false;			
		   }
		   add_job(now_job,$(this));
		   
	 })
	 $('.now_msg').live('click',function(){
	    var box = $(this).parents('form')
		   ,msg    = trim($('#msg').val(),g)
		   if(msg == '' || msg == '让关心你的人时刻知道你在做神马'){
		    alert('亲，还没有填写内容呦');
            return false;			
		   }
		   if(msg.length < 100){
		    $("#notice").html("<span style='color:rgb(3, 181, 246)'>亲还不到100个字哦</span>");
			return false;
		   }


		   add_msg(msg,$(this));
		   
	 })
	 
	 $('.strong').live('click',function(){
	    var box = $(this).parents('form')
		   ,strong    = trim($('#strong').val(),g)
		   if(strong == '' || strong == '填写你的强项'){
		    alert('亲，还没有填写内容呦');
            return false;			
		   }
		   if(strong.length < 50){
		    $("#notice_strong").html("<span style='color:rgb(3, 181, 246)'>亲还不到50个字哦</span>");
			return false;
		   }


		   add_strong(strong,$(this));
		   
	 })
	 
	  $('.tags').live('click',function(){
	    var box = $(this).parents('form')
		   ,tagname    = trim($('#tagMsg').val(),g);
		   if(tagname == '' || tagname == '填写你的标签'){
		    alert('亲，还没有填写内容呦');
            return false;			
		   } 
		   if(tagname.length >7){
		     alert('最多7个字');
			 return false;
		   }
		   add_tag(tagname,$(this));
		   
	 })
	 
	$('.work').live('click',function(){
	    var box = $(this).parents('form')
		   ,content    = trim($('#content').val(),g)
		   ,start_time= box.find('input[name="start_time"]').val()
		   ,end_time= box.find('input[name="end_time"]').val()
		   ,company= box.find('input[name="company"]').val();
		   if(content == '' || content == '填写工作内容'){
		    alert('亲，还没有填写内容呦');
            return false;			
		   }
		   if(company == '' || company == '填写工作单位'){
		    alert('亲，还没有填写工作单位呦');
            return false;			
		   } 		   
		   if(content.length <10){
		     alert('最少10个字');
			 return false;
		   }
		   add_work(content,company,start_time,end_time,$(this));
		   
	 })
	 
	$('.school').live('click',function(){
	    var box = $(this).parents('form')
		   ,start_time= box.find('input[name="school_start"]').val()
		   ,end_time= box.find('input[name="school_end"]').val()
		   ,study_stage= box.find('#select1  option:selected').val()
		   ,school= trim(box.find('input[name="school"]').val(),g);
		   if(school == '' || school == '填写学校'){
		    alert('亲，还没有填写内容呦');
            return false;			
		   }		   
		   add_school(school,study_stage,start_time,end_time,$(this));		   
	})
	
    $('.jbzl_info').live('click',function(){
	    var box = $(this).parents('form')
		   ,uname= box.find('input[name="uname"]').val()
		   ,phone= box.find('input[name="phone"]').val()
		   ,classid= box.find('#select2  option:selected').val()
		   ,obj_id= box.find('#select3  option:selected').val()
		   ,emile= trim(box.find('input[name="emile"]').val(),g)
		   ,teach_age= box.find('input[name="teach_age"]').val()
		   ,identity= box.find('#select5  option:selected').val()
		   ,province=box.find('#province  option:selected').val()
		   ,city=box.find('#city  option:selected').val()
		   ,area=box.find('#area  option:selected').val()
		   ,education=box.find('#select6  option:selected').val()
		   ,school= box.find('input[name="school"]').val()
		   ,major=box.find('input[name="major"]').val()
		   ,home=box.find('input[name="home"]').val()
		   ,hobby=box.find('input[name="hobby"]').val()
		   ,bir_type=box.find('#xuanze_riqi  option:selected').val()
		   ,xuanze_year=box.find('#xuanze_year  option:selected').val()
		   ,xuanze_month=box.find('#xuanze_month  option:selected').val()
		   ,xuanze_day=box.find('#xuanze_day  option:selected').val()
		   ,sex=box.find('input[name="sex"]').val();
		   
		   if(uname == '' || uname == '填写姓名'){
		     alert('亲，还没有填写内容呦');
            return false;			
		   }		   
add_jbxx(uname,phone,classid,obj_id,emile,teach_age,identity,province,city,area,education,school,major,home,hobby,bir_type,xuanze_year,xuanze_month,xuanze_day,sex,$(this));		   
	})
	
	$('.ryzs').live('click',function(){
	    var box = $(this).parents('form')
		   ,image= $('#ryzs_sc').val();
		   if(image == ''){
		    alert('亲，还没有上传图片哦');
            return false;			
		   }		   
		   add_ryzs(image,$(this));		   
	})
	
	$('.jiaoxue').live('click',function(){
	    var box = $(this).parents('form')
		   ,title= box.find('input[name="title"]').val();
		   var content= $('#case').val();
		   if(title == ''){
		    alert('亲，还没有填写标题');
            return false;			
		   }		   
		   add_jiaoxue(title,content,$(this));		   
	})
	
	$('.jiaoxue_edit').live('click',function(){
	    var box = $(this).parents('form')
		   ,id =$(this).attr('id')
		   ,title= box.find('input[name="title"]').val();
		   var content=box.find('.case').val();
		   if(title == ''){
		    alert('亲，还没有填写标题');
            return false;			
		   }
           if(content == ''){
		    alert('亲，填写具体内容');
            return false;			
		   }			   
		   edit_jiaoxue(id,title,content,$(this));		   
	})
	
	$('.story').live('click',function(){
	    var box = $(this).parents('form')
		   ,title= box.find('input[name="title"]').val();
		   var content= $('#content').val();
		   if(title == ''){
		    alert('亲，还没有填写标题');
            return false;			
		   }		   
		   add_story(title,content,$(this));		   
	})
	
	$('.story_edit').live('click',function(){
	    var box = $(this).parents('form')
		   ,id =$(this).attr('id')
		   ,title= box.find('input[name="title"]').val();
		   var content=box.find('.content').val();
		   if(title == ''){
		    alert('亲，还没有填写标题');
            return false;			
		   }
           if(content == ''){
		    alert('亲，填写具体内容');
            return false;			
		   }			   
		   edit_story(id,title,content,$(this));		   
	})
	 
	 function add_msg(msg,dqid){
	   	 $.ajax({
                type: "POST",
                url: "/test/member/add_info",
                datatype : "json",
                async:'false',
                data: "&msg="+encodeURIComponent(msg)+"&math="+Math.floor(Math.random()*1000+1),
                success: function(data){
                 if(data.status==1)	{
				    data = data.data;
					 var html = data.msg;
					 dqid.parents('.zyxx_www').parents('dd').find('.infomsg').html(html);
					 $("#msg").val("");
					 $("#notice").html("用100个字介绍自己");
			      }else if(data.status == -1){
			          alert(data.info);
			      }else if(data.status == 0){
				      alert('no ok');
				  }
                 }
                });	
	 }
	 function add_job(now_job,dqid){
	   	 $.ajax({
                type: "POST",
                url: "/test/member/add_info",
                datatype : "json",
                async:'false',
                data: "&now_job="+encodeURIComponent(now_job)+"&math="+Math.floor(Math.random()*1000+1),
                success: function(data){
                 if(data.status==1)	{
				    data = data.data;
					 var html = data.now_job;
					 dqid.parents('.zyxx_www').parents('dd').find('.infomsg').html(html);
					 $("#now_job").val("");
			      }else if(data.status == -1){
			          alert(data.info);
			      }else if(data.status == 0){
				      alert('no ok');
				  }
                 }
                });	
	 }
	 
	function add_strong(my_strong,dqid){
	   	 $.ajax({
                type: "POST",
                url: "/test/member/add_info",
                datatype : "json",
                async:'false',
                data: "&my_strong="+encodeURIComponent(my_strong)+"&math="+Math.floor(Math.random()*1000+1),
                success: function(data){
                 if(data.status==1)	{
				    data = data.data;
					 var html = data.my_strong;
					 dqid.parents('.zyxx_www').parents('dd').find('.infomsg').html(html);
					 $("#strong").val("");
					 $("#notice_strong").html("用50个字讲述你的核心价值，即你能帮学生解决什么问题");
			      }else if(data.status == -1){
			          alert(data.info);
			      }else if(data.status == 0){
				      alert('no ok');
				  }
                 }
                });	
	 }
	 
	function add_tag(tag,dqid){
	   	 $.ajax({
                type: "POST",
                url: "/test/tag/add_tag",
                datatype : "json",
                async:'false',
                data: "&tag="+encodeURIComponent(tag)+"&math="+Math.floor(Math.random()*1000+1),
                success: function(data){
                 if(data.status==1)	{
				    data = data.data;
					 var tag='<a class="tag_remove" href="javascript:void(0);" id ="'+data.id+'">'+data.name+'<i> ×</i></a>';
	                 $('#tags').append(tag);
					 $("#tagMsg").val("");
					 //$("#notice_tag").html("用50个字讲述你的核心价值，即你能帮学生解决什么问题");
			      }else if(data.status == 2){
			          alert("该标签已经存在");
			      }else if(data.status == 3){
			          alert("已贴上该标签");
			      }else if(data.status == 0){
				      alert('no ok');
				  }
                 }
                });	
	 }
	 
	function add_work(content,company,start_time,end_time,dqid){
	   	 $.ajax({
                type: "POST",
                url: "/test/workexperience/add_work",
                datatype : "json",
                async:'false',
                data: "&content="+encodeURIComponent(content)+"&company="+encodeURIComponent(company)+"&start_time="+encodeURIComponent(start_time)+"&end_time="+encodeURIComponent(end_time)+"&math="+Math.floor(Math.random()*1000+1),
                success: function(data){
                 if(data.status==1)	{
				    data = data.data;
					 var workinfo='<ul class="zyxx_zshi_t zyxx_zshi_b"><li>'+data.start_time+'~'+data.end_time+'</li><li>'+data.company+'...</li><li>'+data.content+'...</li><li class="wid_73"><a class="editwork" href="javascript:void(0);">修改</a>/<a class="delwork" id="'+data.id+'" href="javascript:void(0);">删除</a></li></ul>';
	                 $('#workinfo').append(workinfo);
					 $("#content").val("");
					 $("#company").val('');
					 //$("#notice_tag").html("用50个字讲述你的核心价值，即你能帮学生解决什么问题");
			      }else if(data.status == 0){
				      alert('no ok');
				  }
                 }
                });	
	 }
	function edit_work(id,content,company,start_time,end_time,dqid){
	   	 $.ajax({
                type: "POST",
                url: "/test/workexperience/edit_work",
                datatype : "json",
                async:'false',
                data: "&id="+encodeURIComponent(id)+"&content="+encodeURIComponent(content)+"&company="+encodeURIComponent(company)+"&start_time="+encodeURIComponent(start_time)+"&end_time="+encodeURIComponent(end_time)+"&math="+Math.floor(Math.random()*1000+1),
                success: function(data){
                 if(data.status==1)	{
				    data = data.data;
					 var workinfo='<ul class="zyxx_zshi_t zyxx_zshi_b"><li>'+data.start_time+'~'+data.end_time+'</li><li>'+data.company+'...</li><li>'+data.content+'...</li><li class="wid_73"><a class="editwork" href="javascript:void(0);">修改</a>/<a class="delwork" id="'+data.id+'" href="javascript:void(0);">删除</a></li></ul>';
	                 dqid.remove();
					 $('#workinfo').append(workinfo);
					 $("#content").val("");
					 $("#company").val('');
					 //$("#notice_tag").html("用50个字讲述你的核心价值，即你能帮学生解决什么问题");
			      }else if(data.status == 0){
				      alert('no ok');
				  }
                 }
                });	
	 }
	 
	function add_school(school,study_stage,start_time,end_time,dqid){
	   	 $.ajax({
                type: "POST",
                url: "/test/studyexperience/add_school",
                datatype : "json",
                async:'false',
                data: "&school="+encodeURIComponent(school)+"&study_stage="+encodeURIComponent(study_stage)+"&start_time="+encodeURIComponent(start_time)+"&end_time="+encodeURIComponent(end_time)+"&math="+Math.floor(Math.random()*1000+1),
                success: function(data){
                 if(data.status==1)	{
				    data = data.data;
					 var workinfo='<ul class="zyxx_zshi_t zyxx_zshi_b"><li>'+data.start_time+'~'+data.end_time+'</li><li>'+data.study_stage+'...</li><li>'+data.school+'...</li><li class="wid_73"><a class="editwork" href="javascript:void(0);">修改</a>/<a class="delwork" id="'+data.id+'" href="javascript:void(0);">删除</a></li></ul>';
	                 $('#studyinfo').append(workinfo);
					 $("#school").val("");
			      }else if(data.status == 0){
				      alert('no ok');
				  }
                 }
                });	
	}
	
	function add_jbxx(uname,phone,classid,obj_id,emile,teach_age,identity,province,city,area,education,school,major,home,hobby,bir_type,xuanze_year,xuanze_month,xuanze_day,sex,dqid){
	   	 $.ajax({
                type: "POST",
                url: "/test/studyexperience/add_jbxx",
                datatype : "json",
                async:'false',
                data: "&uname="+encodeURIComponent(uname)
				+"&phone="+encodeURIComponent(phone)
				+"&classid="+encodeURIComponent(classid)
				+"&obj_id="+encodeURIComponent(obj_id)
				+"&emile="+encodeURIComponent(emile)
				+"&teach_age="+encodeURIComponent(teach_age)
				+"&identity="+encodeURIComponent(identity)
				+"&province="+encodeURIComponent(province)
				+"&city="+encodeURIComponent(city)
				+"&area="+encodeURIComponent(area)
				+"&education="+encodeURIComponent(education)
				+"&school="+encodeURIComponent(school)
				+"&major="+encodeURIComponent(major)
				+"&home="+encodeURIComponent(home)
				+"&hobby="+encodeURIComponent(hobby)
				+"&bir_type="+encodeURIComponent(bir_type)
				+"&xuanze_year="+encodeURIComponent(xuanze_year)
				+"&xuanze_month="+encodeURIComponent(xuanze_month)
				+"&xuanze_day="+encodeURIComponent(xuanze_day)
				+"&sex="+encodeURIComponent(sex)+
				"&math="+Math.floor(Math.random()*1000+1),
                success: function(data){
                 if(data.status==1)	{
				    data = data.data;
					 var jbxxinfo='<span>真实姓名：'+data.uname+'</span><span>手机号码：'+data.phone
					 +'</span><span>常用邮箱：'+data.emile+'</span><span>教学科目：'+data.classid
					 +'</span><span>教学经验：'+data.teach_age+'</span><span>常住地区：'+data.city+data.area
					 +'</span><span>农历生日：'+data.teach_age+'</span><span>性别：'+data.sex
					 +'</span><span>身份：'+data.identity+'</span><span>家乡：'+data.home
					 +'</span><span>学历：'+data.education+'</span><span>毕业院校：'+data.school
					 +'</span><span>专业：'+data.major+'</span><span>爱好：'+data.hobby;
					 
	                 $("#jbxx").empty();
					 $('#jbxx').append(jbxxinfo);
					 $('#zyxx_person').hide();
			      }else if(data.status == 0){
				      alert('no ok');
				  }
                 }
                });	
	}
	
	function add_ryzs(image,dqid){
	   	 $.ajax({
                type: "POST",
                url: "/test/ryzs/upload",
                datatype : "json",
                async:'false',
                data: "&file="+encodeURIComponent(image)+"&math="+Math.floor(Math.random()*1000+1),
                success: function(data){
                 if(data.status==1)	{
				     data = data.data;
					 var image='<a href="javascript:void(0);" id="'+data.id+'"><img src="'+data.image+'" /><i>×</i></a>';
	                 $('#ruzs').append(image);
					 $("#yuzs_sc").val("");
			      }else if(data.status == 0){
				     alert('no ok');
				  }
                 }
                });	
	}
	
	function add_jiaoxue(title,content,dqid){
	   	 $.ajax({
                type: "POST",
                url: "/test/teachcase/add_case",
                datatype : "json",
                async:'false',
                data: "&title="+encodeURIComponent(title)+"&content="+encodeURIComponent(content)+"&math="+Math.floor(Math.random()*1000+1),
                success: function(data){
                if(data.status==1){
					 $("#case").val("");
					 $("#title").val("");
					 //alert('添加成功，刷新页面试试');
					 $('#tipb').css('display','none');
			         $('#tipa').css("top",$(document).scrollTop()+($(window).height())/2-100+"px");
			         $('#tipa').css('display','block');
			         setTimeout(location.href="", 3000);
			    }else if(data.status == 0){
				      alert('no ok');
				}
                }
                });	
	}
	
    function edit_jiaoxue(id,title,content,dqid){
	   	 $.ajax({
                type: "POST",
                url: "/test/teachcase/edit_case",
                datatype : "json",
                async:'false',
                data: "&id="+encodeURIComponent(id)+"&title="+encodeURIComponent(title)+"&content="+encodeURIComponent(content)+"&math="+Math.floor(Math.random()*1000+1),
                success: function(data){
                 if(data.status==1)	{
				    
					 $('#tipb').css('display','none');
			         $('#tipa').css("top",$(document).scrollTop()+($(window).height())/2-100+"px");
			         $('#tipa').css('display','block');
			         setTimeout(location.href="", 3000);
			      }else if(data.status == 0){
				      alert('no ok');
				  }
                 }
                });	
	}
	
	
    function add_story(title,content,dqid){
	   	 $.ajax({
                type: "POST",
                url: "/test/mystory/add_story",
                datatype : "json",
                async:'false',
                data: "&title="+encodeURIComponent(title)+"&content="+encodeURIComponent(content)+"&math="+Math.floor(Math.random()*1000+1),
                success: function(data){
                if(data.status==1){
					 $("#content").val("");
					 $("#title").val("");
					 //alert('添加成功，刷新页面试试');
					 $('#tipb').css('display','none');
			         $('#tipa').css("top",$(document).scrollTop()+($(window).height())/2-100+"px");
			         $('#tipa').css('display','block');
			         setTimeout(location.href="", 3000);
			    }else if(data.status == 0){
				      alert('no ok');
				}
                }
                });	
	}
    function edit_story(id,title,content,dqid){
	   	 $.ajax({
                type: "POST",
                url: "/test/mystory/edit_story",
                datatype : "json",
                async:'false',
                data: "&id="+encodeURIComponent(id)+"&title="+encodeURIComponent(title)+"&content="+encodeURIComponent(content)+"&math="+Math.floor(Math.random()*1000+1),
                success: function(data){
                 if(data.status==1)	{
				    
					 $('#tipb').css('display','none');
			         $('#tipa').css("top",$(document).scrollTop()+($(window).height())/2-100+"px");
			         $('#tipa').css('display','block');
			         setTimeout(location.href="", 3000);
			      }else if(data.status == 0){
				      alert('no ok');
				  }
                 }
                });	
	}



	
})	