<?php
//单页模型
class AboutModel extends Model{
	//建议反馈分页列表——暂时不加，废弃中
	public function showlist(){
		//取该分类下所有分类
		$catObja = D('Category');
		$allCata = $catObja -> catTreeList2($catId);
		
		//将各分类拼接成字符串
		foreach($allCata as $val){
			$allCatb[] = $val['cat_id'];
		}
		$catStr = implode(',',$allCatb);
		
		//1 引入分页类
		import('@.components.Page');
		//2 计算当前记录总数目
		//$sql = "select * from `she_goods` where cat_id={$catId}";
		$total = $this -> where("cat_id in ({$catStr}) and goods_state = 1") -> count();
		$per = 16;
		//3 实例化分页类对象
		$page = new Page($total, $per);
		//4 制作一条sql语句获得每页信息
		$sql = "select * from `she_goods` where cat_id in ({$catStr}) and goods_state = 1 order by goods_id desc ".$page->limit;
		$arr['goodsList'] = $this -> query($sql); 
		//5 获得页面列表
		$arr['goodsPage'] = $page->fpage(array(1,2,3,4,5,6,7,8));
		
		return $arr;
	}

}