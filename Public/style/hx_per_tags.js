define(function(require, exports){

/*
* 查询标签
* 
*/
var postTagsUrl = '/userdata'
	,allowTagNum = '10'
	;

jQ(document).delegate('.btn-add-tag','click',function(){
	var t = jQ(this)
	    ,title = '<h3>设置个人标签</h3>'
	    ,uid = t.parents('li').attr('uid')
	    ,tagsNewNum = t.parents('ul').find('li').length-1
	    ,tagSurpNum = allowTagNum-tagsNewNum
	    ,url = postTagsUrl
	    ,msg = '<form id="set_tags_form" uid="'+uid+'" class="form-inline" action="" method="post"><div class="author-tag-box"><div class="author-name-wrap">已设置<span class="tag-new-num">'+tagsNewNum+'</span>个标签</div><div class="author-tag-ctt"><ul class="clearfix inline"><li class="no-data-li">暂无标签</li></ul></div></div><div class="system-author-tags"><h5>可选择<span class="tag-surp-num">'+tagSurpNum+'</span>个标签</h5><ul class="clearfix inline"></ul></div><div class="add-author-tag-wrap"><h5>添加新标签</h5><input type="text" class="input" placeholder="添加新的标签"><button type="submit" class="btn">添加</button></div></form>'
	    ;
	showBox(title,msg)
	postTags(t,'get_user_info',url,'author',uid);
})

/*
* 添加标签
*/
jQ(document).delegate('#set_tags_form button','click',function(){
	//标签数保持10个
	if(parseInt(jQ('.tag-new-num').text())>=10){
		queryShow('#set_tags_form','最多可以设置10个标签','alert-error');
		return false;
	}
	jQ('#set_tags_form').submit(function(){
		return false;
	})

	var t = jQ(this)
		,boxWrap = t.parents('form')
		,uid = boxWrap.attr('uid')
		,msg = boxWrap.find('.input').val()
	    ,url = postTagsUrl
		;

		if(!msg || msg == 0){
			queryShow('#set_tags_form','新添加标签不能为空','alert-error');
			return false;
		}
		postTags(t,'add_hx_tag',url,'author',uid);
})
	
/*
* 添加作者标签
*/
jQ(document).delegate('.system-author-tags li','click',function(){
	if(!jQ(this).hasClass('disable')){
		var t = jQ(this)
			,boxWrap = t.parents('form')
			,uid = boxWrap.attr('uid')
	    	,url = postTagsUrl
			;
		//标签数保持10个
		if(parseInt(jQ('.tag-new-num').text())>=10){
			queryShow('#set_tags_form','最多可以设置10个标签','alert-error');
			return false;
		}
		postTags(t,'add_user_tag',url,'author',uid);
	}else{
		return false;
	}
})

/*
* 删除作者标签
*/
jQ(document).delegate('.author-tag-ctt li','click',function(){
	var t = jQ(this)
		,boxWrap = t.parents('form')
		,uid = boxWrap.attr('uid')
    	,url = postTagsUrl
		;
	postTags(t,'del_user_tag',url,'author',uid);
})
jQ(document).delegate('.tags-btn-del','click',function(){
	var t = jQ(this).parent('li')
		,boxWrap = t.parents('form')
		,uid = jQ(this).parents('#zzbq_list>li').attr('uid')
    	,url = postTagsUrl
		;
	postTags(t,'del_user_tag',url,'author',uid);
})

/*
* 删除标签
*/
jQ(document).delegate('.btn-tags-close','click',function(){
	var t = jQ(this).parent('li')
			,boxWrap = t.parents('#zzbq_list')
    		,url = postTagsUrl
		;
	postTags(t,'del_hx_tag',url,'author');
})

/*
* postTags
* uid,tagid,act,idtype,tagname
* act = 'add_user_tag/del_user_tag/add_hx_tag/del_hx_tag/get_user_info'
* idtype = 'author/member'
* globaldata = tagid
* data.author_tags[],.data.all_tags[]
*/
function postTags(t,act,url,idtype,uid){
	var t = jQ(t)
		,uid = isUndefined(uid)?'':uid
		,tagid = isUndefined(t.attr('tagid'))?'':t.attr('tagid')
		,random = parseInt(Math.random()*100000)
		,postUrl = url+'?is_ajax=1&random='+random
		,ulWrap = jQ('.territory-tags-wrap ul')
		;
	if(act == 'get_user_info'){
		var postData = {
			'uid':uid
			,'act':act
			,'idtype':idtype
		}
		var author_tags = new Array();
		jQ(t.parents('ul').find('li:not(.li-btm)')).each(function(i){
			var tagid = jQ(this).attr('tagid')
				,tagname = jQ(this).find('a').text();

			author_tags[i] = {
				'globaldata' : tagid
				,'tagname' : tagname
			};
		})
	}
	if(act == 'add_user_tag'){
		var tagname = jQ(t).text()
			,postData = {
			'uid':uid
			,'globaldata':tagid
			,'act':act
			,'idtype':idtype
			,'tagname':tagname
		}
	}
	if(act == 'del_user_tag'){
		var tagname = jQ(t).text()
			,postData = {
			'uid':uid
			,'globaldata':tagid
			,'act':act
			,'idtype':idtype
			,'tagname':tagname
		}
	}
	if(act == 'add_hx_tag'){
		var tagname = jQ(t).parents('form').find('.input').val()
			,postData = {
			'uid':uid
			,'globaldata':tagid
			,'act':act
			,'idtype':idtype
			,'tagname':tagname
		}
	}
	if(act == 'del_hx_tag'){
		var postData = {
			'globaldata':tagid
			,'act':act
		}
	}
	jQ.post(postUrl,postData,function(data){
		var data = eval('(' + data + ')');
		if(act == 'get_user_info'){
			if(data.is_success == '1') {
				loopDataHtml('.author-tag-ctt ul',author_tags,'1');
				loopDataHtml('.system-author-tags ul',data.all_tags);
			}else{
				alert(data.msg);
			}
		}
		if(act == 'add_user_tag'){
			if(data.is_success == '1') {
				jQ(t).addClass('disable');
				jQ('.author-tag-ctt ul').prepend('<li tagid="'+tagid+'"><a href="javascript:void(0)" class="a-tag-btn">'+tagname+'<i class="icon-remove icon-white" title="删除"></i></a></li>');
				ulWrap.prepend('<li tagid="'+tagid+'" class="clearfix"><a href="javascript:void(0)">'+tagname+'</a><i class="icon-remove icon-white tags-btn-del" title="删除" tagid="1"></i></li>');
				queryShow('#set_tags_form','添加成功','alert-success');
				//更改数量
				updataTagNum('add');
			}else{
				queryShow('#set_tags_form',data.msg,'alert-error');
			}
		}
		if(act == 'del_user_tag'){
			if(data.is_success == '1') {
				jQ(t).remove();
				jQ('.system-author-tags li[tagid='+tagid+']').removeClass('disable');
				ulWrap.find('li[tagid='+tagid+']').remove();
				queryShow('#set_tags_form','取消成功','alert-success');
				//更改数量
				updataTagNum('minus');
			}else{
				queryShow('#set_tags_form',data.msg,'alert-error');
			}
		}
		if(act == 'add_hx_tag'){
			if(data.is_success == '1') {
				jQ('.author-tag-ctt ul').prepend('<li tagid="'+data.tagid+'"><a href="javascript:void(0)" class="a-tag-btn">'+tagname+'<i class="icon-remove icon-white" title="删除"></i></a></li>');
				jQ('.system-author-tags ul').prepend('<li tagid="'+tagid+'" class="disable">'+tagname+'</li>');
				ulWrap.prepend('<li tagid="'+tagid+'" class="clearfix"><a href="javascript:void(0)">'+tagname+'</a><i class="icon-remove icon-white tags-btn-del" title="删除" tagid="1"></i></li>');
				queryShow('#set_tags_form','添加成功','alert-success');
				//更改数量
				t.siblings('input').val('');
				updataTagNum('add');
			}else{
				queryShow('#set_tags_form',data.msg,'alert-error');
			}
		}
		if(act == 'del_hx_tag'){
			if(data.is_success == '1') {
				jQ('#zzbq_list li[tagid='+tagid+']').remove();
				//更改数量
				updataTagNum('minus');
				//alert(data.msg)
			}else{
				alert(data.msg)
			}
		}
	})
}

/*
* 更新已有标签数量
* act = 'add'/'minus'
*/
function updataTagNum(act){
	var tagsNew = jQ('.tag-new-num')
		,tagsSurp = jQ('.tag-surp-num')
		,tagsNewNum = parseInt(tagsNew.text())
		,tagsSurpNum = parseInt(tagsSurp.text())
		;
	if(act=='add'){
		tagsNew.text(tagsNewNum+1);
		tagsSurp.text(tagsSurpNum-1);
	}else if(act=='minus'){
		tagsNew.text(tagsNewNum-1);
		tagsSurp.text(tagsSurpNum+1);
	}
}

function loopDataHtml(t,ctt,type){
	var htmlBox = ''
		,val = ctt
		;
	if(type == '1'){
		jQ(val).each(function(i){
			htmlBox += '<li tagid="'+val[i]['tagid']+'"><a href="javascript:void(0)" class="a-tag-btn">'+val[i]['tagname']+'<i class="icon-remove icon-white" title="删除"></i></a></li>';
		})
	}else{
		jQ(val).each(function(i){
			if(val[i]['status']=='1'){
				htmlBox += '<li tagid="'+val[i]['tagid']+'" class="disable">'+val[i]['tagname']+'</li>';
			}else{
				htmlBox += '<li tagid="'+val[i]['tagid']+'">'+val[i]['tagname']+'</li>';
			}
		})
	}
	jQ(t).html(htmlBox);
}


/*
* 表单错误展示
* type="alert-error/alert-success"
*/
function queryShow(id,s,type){
	var box = '<div class="alert '+type+'"><button type="button" class="close" data-dismiss="alert">x</button><div class="box-ctt">'+s+'</div></div>'
	;
	if(jQ('#showBoxModal .alert').length>0){
		jQ('#showBoxModal .alert').attr('class','alert '+type).find('.box-ctt').html(s);
	}else{
		jQ(id).after(box);
	}
}


/*
* 显示框
*/
function showBox(t,m){
	if(jQ('#showBoxModal').length>0){
		jQ('#showBoxModal').find('.t-h2').html(t);
		jQ('#showBoxModal').find('.modal-body').html(m);
	}else{
		var box = '<div id="showBoxModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><div class="show-box-t-h2">'+t+'</div></div><div class="modal-body">'+m+'</div><div class="modal-footer"><button type="button" class="btn" data-dismiss="modal" aria-hidden="true">关闭</button></div></div>'
		jQ('body').append(box);
	}
	jQ('#showBoxModal').modal('toggle');
}

function isUndefined(variable) {
	return typeof variable == 'undefined' ? true : false;
}


})