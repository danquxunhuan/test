define(function(require, exports){
	//加载关联微博窗体
	var aid = count_article_id
		,cWeiBoPostUrl = '/usersubmit.html?is_ajax=1&random='
		,cZtPostUrl = '/pushdata?is_ajax=1&random='
		;
	jQ(document).on('click','.btn-relation',function(){
		showSetBox('关联微博',2);
		firstShowWeiboList(aid,cWeiBoPostUrl,'add_weibo_article');
	})
	
	jQ('#connectionWeibo button').live('click',function(){
		var random = parseInt(Math.random()*100000)
			,url = cWeiBoPostUrl+random
			,iptCtt = jQ('#connectionWeibo').find('input').val()
			,postData = {
					'aid':aid
					,'act':'add_weibo_article'
					,'url':iptCtt
				}
			;
		jQ.post(url,postData,function(data){
			var data = eval('(' + data + ')');
			if(data.is_success == '1') {
				var vUrl = jQ('#connectionWeibo input').val();
				jQ('#connectionWeibo input').val();
				if(jQ('.no-list').length>0){jQ('.no-list').remove();}
				
				jQ('#connectionWeiboList').prepend('<p><a href="'+vUrl+'" target="_blank">'+vUrl+'</a><i class="icon-remove" act="del_weibo_article" title="删除关联"></i></p>');
				jQ('#connectionWeibo .info').html('<span class="success">关联成功</span>');
			}else{
				jQ('#connectionWeibo .info').html('<span class="error">关联失败</span>');
			}
		})
	})
	jQ('#connectionWeiboList .icon-remove').live('click',function(){
		var random = parseInt(Math.random()*100000)
			,url = cWeiBoPostUrl+random
			,aBox = jQ(this)
			,iptCtt = jQ(this).siblings('a').attr('href')
			,postData = {
					'aid':aid
					,'act': 'del_weibo_article'
					,'url':iptCtt
				}
			;
		jQ.post(url,postData,function(data){
			var data = eval('(' + data + ')');
			if(data.is_success == '1') {
				jQ(aBox).parents('p').remove();
				jQ('#connectionWeibo .info').html('<span class="success">删除成功</span>');
			}else{
				jQ('#connectionWeibo .info').html('<span class="error">删除失败</span>');
			}
		})
	})
			
	/**
	*	后台管理
	*	见天
	*	2013.09.30
	**/
	jQ('.manage-box2').hover(function(){
		jQ(this).find('ul').height('auto')
	},function(){
		jQ(this).find('ul').height('0')
	})

	jQ(document).on('click','.ifrome-btn',function(){
		var url = jQ(this).attr('url')
			,w = jQ(this).attr('w')
			,h = jQ(this).attr('h')
			;
		if(jQ('#gl_set_iframe_wrap').length>0){
			jQ('#gl_set_iframe_wrap').remove();
		}
		/* zhong 20130713 添加弹出拖动 */
		jQ('body').append('<div id="gl_set_iframe_wrap" style="width:'+w+'px;height:'+h+'px;margin:'+(-h/2)+'px 0 0 '+(-w/2)+'px;"><h2 id="tuodong" >点击拖动</h2><i class="close">x</i><iframe id="gl_set_iframe" src="'+url+'"></iframe></div>')
		
		jQ('#gl_set_iframe_wrap .close').live('click',function(){
			jQ('#gl_set_iframe_wrap').remove();
		})
        var oWin = document.getElementById("gl_set_iframe_wrap");
        var oH2 = oWin.getElementsByTagName("h2")[0];
        var bDrag = false;
        var disX = disY = 0;
        oH2.onmousedown = function (event)
        {		
            var event = event || window.event;
            bDrag = true;
            disX = event.clientX - oWin.offsetLeft;
            disY = event.clientY - oWin.offsetTop;
            this.setCapture && this.setCapture();
            return false
        };
        document.onmousemove = function (event)
        {
            if (!bDrag) return;
            var event = event || window.event;
            var iL = event.clientX - disX;
            var iT = event.clientY - disY;
            var maxL = document.documentElement.clientWidth - oWin.offsetWidth;
            var maxT = document.documentElement.clientHeight - oWin.offsetHeight;		
            iL = iL < 0 ? 0 : iL;
            iL = iL > maxL ? maxL : iL; 		
            iT = iT < 0 ? 0 : iT;
            iT = iT > maxT ? maxT : iT;

            oWin.style.marginTop = oWin.style.marginLeft = 0;
            oWin.style.left = iL + "px";
            oWin.style.top = iT + "px";		
            return false
        };
        document.onmouseup = window.onblur = oH2.onlosecapture = function ()
        {
            bDrag = false;				
            oH2.releaseCapture && oH2.releaseCapture();
        };
	})
		
		
	//加载关联赞助专栏
	jQ(document).on('click','.btn-submit-zt',function(){
		var t=jQ(this)
			,boxHtml = '<div id="ztnrCtt" class="form-inline"><select id="ztnrCttSelect" multiple="multiple" style="margin-right:5px;"><option>稍等更新中…</option></select><select id="ztnrClassSelect" class="span2" multiple="multiple"><option>还未选择专题</option></select><p style="margin-top:10px;"><button class="zt-btn" type="submit" class="btn">提交</button></p><span class="info"></span></div>';
		showSetBox('关联赞助专栏',0,boxHtml);
		queryShowZtList(t,aid,cZtPostUrl,'getList','pushZt');
	})
	//加载关联赞助专栏分类
	jQ(document).on('click','#ztnrCttSelect option',function(){
		var t = jQ(this);
		if(jQ(this).attr('ztnameen')!='默认无选择'){
			queryShowZtList(t,aid,cZtPostUrl,'getClass','pushZt');
		}
	})
	//关联赞助专栏提交
	jQ(document).on('click','#ztnrCtt .zt-btn',function(){
		var t = jQ(this);
		queryShowZtList(t,aid,cZtPostUrl,'getSubmit','pushZt');
	})
	

})

/**
*	by jiantian
*	time 2013.09.30
*	提示框，使用方法↓
*	m = 1 '消息，参数c'
*	m = 2 '关联微博'
**/
function showSetBox(t,m,c){
	var random = parseInt(Math.random()*100000)
		,url = '/usersubmit.html?is_ajax=1&random='+random
		,m = isUndefined(m)?'':m
		,c = isUndefined(c)?'':c
		,setCtt = ''
		;
	
	if(m=='0'){
		setCtt = c;
	}
	if(m=='1'){
		setCtt = SetBoxShowMessage(c);
	}
	if(m=='2'){
		setCtt = SetBoxCtt();
	}
	
	var box = '<div id="showSetBox" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="showSetBoxLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="myModalLabel">管理-'+t+'</h3></div><div class="modal-body">'+setCtt+'</div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button></div></div>'
		;
	if(!jQ('#showSetBox').length>0){
		jQ('body').append(box);
	}
	jQ('#showSetBox').modal('show');
	
}

/**
*	by jiantian
*	time 2013.09.30
*	提示框内容-提示内容
**/
function SetBoxShowMessage(c){
	return c;
}

/**
*	by jiantian
*	time 2013.09.30
*	提示框内容-管理-关联微博
**/
function SetBoxCtt(){
	var box = '<div id="connectionWeibo" class="form-inline" ><input type="text" class="span3" style="margin-right:10px;"><button type="submit" class="btn">提交</button><span class="info"></span><h4>已关联微博</h4></div><div id="connectionWeiboList"><p class="no-list">没有关联微博</p></div>';
	return box;
}

/**
*	by jiantian
*	time 2013.09.30
*	管理-关联微博-第一次列表
**/
function firstShowWeiboList(aid,postUrl,act){
	var random = parseInt(Math.random()*100000)
		,url = postUrl+random
		,postData = {
				'aid':aid
				,'act': 'add_weibo_article'
				,'url':''
			}
		;

	jQ.post(url,postData,function(data){
		var data = eval('(' + data + ')')
			,hData = '';
		if(data.is_success == '1') {
			var vUrl = jQ('#connectionWeibo input').val();
			
			if(jQ('.no-list').length>0){jQ('.no-list').remove();}
			for(i=0;i<data.mid_urls.length;i++){
				hData = hData+'<p><a href="'+data.mid_urls[i]+'" target="_blank">'+data.mid_urls[i]+'</a><i class="icon-remove" act="del_weibo_article" title="删除关联"></i></p>';
			}
			jQ('#connectionWeiboList').html(hData);
		}else{
		}
	})

}

/**
*	by jiantian
*	time 2013.10.31
*	管理-关联赞助专栏
*	ftype = 'pushZt' 赞助专栏
*	ftype = 'pushAd' 推送客户端广告
*	act = getList '查询专题列表'
*	act = getClass '查询专题分类'
*	act = getSubmit '提交绑定'
**/
function queryShowZtList(t,aid,postUrl,act,ftype){
	var random = parseInt(Math.random()*100000)
		,url = postUrl+random
		,postData = {
				'aid':aid
				,'zid':isUndefined(t.attr('zid'))?'':t.attr('zid')
				,'act':act
				,'url':url
				,'ftype':ftype
			}
		if(act=='getSubmit'){
			postData.zid =jQ('#ztnrCttSelect option:selected').attr('zid');
			postData.ztnameen =jQ('#ztnrCttSelect option:selected').attr('ztnameen')=='默认无选择'?'':jQ('#ztnrCttSelect option:selected').attr('ztnameen');
			postData.tid = jQ('#ztnrClassSelect option:selected').attr('tid');
		}

	jQ.post(url,postData,function(data){
		var data = eval('(' + data + ')')
			,hData = '';
			if(data.is_success == '1'){
				if(ftype=='pushZt'){
					if(act=='getList'){
						for(i=0;i<data.content.length;i++){
							hData += '<option zid="'+data.content[i].zid+'" ztnameen="'+data.content[i].ztnameen+'">'+data.content[i].zanzhushang+'</option>';
						}
						jQ('#ztnrCttSelect').html('<option zid="0" ztnameen="默认无选择">默认无选择</option>'+hData);	
					}
					if(act=='getClass'){
						for(i=0;i<data.content.length;i++){
							hData += '<option tid="'+data.content[i].tid+'" val="'+data.content[i].ztclassname+'">'+data.content[i].ztclassname+'</option>';
						}
						jQ('#ztnrClassSelect').html(hData);
						jQ('#ztnrClassSelect option[val="列表"]').attr('selected','selected');
					}
					if(act=='getSubmit'){
						queryShow('#ztnrCtt',data.msg,'alert-success');
						if(postData.ztnameen!=''){
							setTimeout(window.top.location.reload(),800)
						}
					}
				}
			}else{
				queryShow('#ztnrCtt',data.msg,'alert-error');
			}
	})
}


/*
* 表单错误展示
* type="alert-error/alert-success"
*/
function queryShow(id,s,type){
	var box = '<div class="alert '+type+'"><button type="button" class="close" data-dismiss="alert">x</button><div class="box-ctt">'+s+'</div></div>'
	;
	if(jQ('#showSetBox .alert').length>0){
		jQ('#showSetBox .alert').stop().animate({opacity:1}, 100).attr('class','alert '+type).find('.box-ctt').html(s);
	}else{
		jQ(id).before(box);
	}
	jQ('#showSetBox .alert').delay(1500).animate({opacity:0}, 400,function(){
		jQ(this).remove();
	});
}