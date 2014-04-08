<?php
class AreaAction extends CommonAction{
/*
*地区管理
*/
public	function index(){
	import("@.ORG.Category");
	$cat = new Category('Area', array('id', 'pid', 'name', 'fullname'));
	$temp = $cat->getList();  //获取树形结构
	
	$this->assign('alist',$temp);
	$this->display();
}

/*
*添加地区
*/	
public	function add(){
	if(IS_POST){  //添加
		$cate=new AreaModel();
		if($vo=$cate->create()){
			if($cate->add()){
				$this->success('添加成功');
			}else{
				$this->error('添加栏目失败');
			}
		}else{
			$this->error($cate->getError());
		}
	}else{	//展示
		//全部地区树形图
		import("@.ORG.Category");
		$cat = new Category('Area', array('id', 'pid', 'name', 'fullname'));
		$temp = $cat->getList();  //获取树形结构
		$this->assign('alist',$temp);
		$this->display();
	}
	
}

/*
*编辑地区（wyj）
*/	
public	function edit(){
	if(IS_POST){  //编辑
		$cate=new AreaModel();
		if($vo=$cate->create()){
			if($cate->save($_POST)){
				$this->success('编辑成功',U('Area/index'));
			}else{
				$this->error('编辑失败');
			}
		}else{
			$this->error($cate->getError());
		}
	}else{	//展示
		$info = M('Area')->where("id=" . (int) $_GET['id'])->find();
		if ($info['id'] == '') {
			$this->error("不存在该记录");
		}
		$this->assign("info", $info);
		//全部地区树形图
		import("@.ORG.Category");
		$cat = new Category('Area', array('id', 'pid', 'name', 'fullname'));
		$temp = $cat->getList();  //获取树形结构
		$this->assign('alist',$temp);
	
		$this->display();
	}
	
}

/*
*删除地区
*/	
public function del(){
	$this->checkToken(); //令牌验证
	$id=isset($_GET['id'])?$_GET['id']+0:0;
	//删除地区前应保证其为最下级
	$zi = M('Area')->where('pid='.(int)$id)->find();
	if($zi){
		$msg = '该地区下存在子地区，不可删除！';
	}else{
		if(M('Area')->where('id='.(int)$id)->delete()){
			$msg = '删除成功';
		}else{
			$msg = '删除失败，可能是不存在该ID的记录';
		}
	}
	echo json_encode($msg);	
}

	
        //添加页面
    public function add1(){
        $id = intval($_GET['id']);
        $area_type = intval($_GET['type']);
        if($id){
            $Area = D('Area');
            $list = $Area->field('name')->where("id=$id")->find();
            $this->assign('list',$list);
        }
        $this->assign('id',$aid);
        $this->assign('type',$area_type);
        $this->display();
    }
    
    public function insert(){
        $jumpUrl = U('/Area');
        if ($this->isPost()){
           $Area = D('Area');
           if(intval($_POST['id']) != 0){
               $_POST['pid'] = $_POST['id'];
               $_POST['type'] = intval($_POST['type'])+1;
               unset($_POST['id']);
           }else{
               $_POST['pid'] == 0;
               $_POST['type'] = 1;
           }
           //$_POST['a_order'] = intval($_POST['a_order']);
           $_POST['name'] = trim($_POST['name']);
           if ($Area->create($_POST,1)) {
                $list = $Area->add();
                if ($list) {
                    $this->success("操作成功",$jumpUrl);
                } else {
                    $this->error("操作失败",$jumpUrl);
                }
            } else {
                $this->error($Area->getError());
            }
         }else{
            $this->error('非法请求',$jumpUrl);
         }
    }	
		//AJAX查询市
    public function getAreaName(){
	
        $aid = intval($_GET['id']);
        if($id){
           $data = M()->Table("area")->field('id,name')->where("pid=$id")->select();
           if($data){
               $str = json_encode($data);
               exit("$str");
           }else{
               exit("0");
           }
        }
    }
	
	
}


?>