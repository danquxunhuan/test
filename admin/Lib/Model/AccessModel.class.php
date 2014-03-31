<?php

class AccessModel extends Model {

    public function nodeList() {
        import("@.ORG.Category");
        $cat = new Category('Node', array('id', 'pid', 'title', 'fullname'));
        $temp = $cat->getList();               //获取分类结构
        $level = array("1" => "项目（GROUP_NAME）", "2" => "模块(MODEL_NAME)", "3" => "操作（ACTION_NAME）");
        foreach ($temp as $k => $v) {
            $temp[$k]['statusTxt'] = $v['status'] == 1 ? "启用" : "<span style='color:red;'>禁用</span>";
            $temp[$k]['chStatusTxt'] = $v['status'] == 0 ? "启用" : "禁用";
            $temp[$k]['level'] = $level[$v['level']];
            $list[$v['id']] = $temp[$k];
        }
        unset($temp);
        return $list;
    }
/*
* 角色管理
*/    
public function roleList() {
	$M = M("Role");
	$list = $M->select();
	foreach ($list as $k => $v) {
		$list[$k]['statusTxt'] = $v['status'] == 1 ? "启用" : "禁用";
		$list[$k]['chStatusTxt'] = $v['status'] == 0 ? "启用" : "禁用";
	}
	return $list;
}

    public function opStatus($op = 'Node') {
        $M = M("$op");
        $datas['id'] = (int) $_GET["id"];
        $datas['status'] = $_GET["status"] == 1 ? 0 : 1;
        if ($M->save($datas)) {
            return array('status' => 1, 'info' => "处理成功", 'data' => array("status" => $datas['status'], "txt" => $datas['status'] == 1 ? "禁用" : "启动"));
        } else {
            return array('status' => 0, 'info' => "处理失败");
        }
    }

    public function editNode() {
        $M = M("Node");
        return $M->save($_POST) ? array('status' => 1, info => '更新节点信息成功', 'url' => U('Access/nodeList')) : array('status' => 0, info => '更新节点信息失败');
    }

    public function addNode() {
        $M = M("Node");
        return $M->add($_POST) ? array('status' => 1, info => '添加节点信息成功', 'url' => U('Access/nodeList')) : array('status' => 0, info => '添加节点信息失败');
    }

/*
* 管理员列表
*/
public function adminList() {
	$list = M("Admin")->select();
	foreach ($list as $k => $v) {
		$list[$k]['statusTxt'] = $v['status'] == 1 ? "启用" : "禁用";
	}
	return $list;
}


/**
+----------------------------------------------------------
* 添加角色
+----------------------------------------------------------
*/
public function addRole() {
	$M = M("Role");
	if ($M->add($_POST)) {
		return array('status' => 1, 'info' => "成功添加");
	} else {
		return array('status' => 0, 'info' => "添加失败，请重试");
	}
}


    public function changeRole() {
        $M = M("Access");
        $role_id = (int) $_POST['id'];
        $M->where("role_id=" . $role_id)->delete();
        $data = $_POST['data'];
        if (count($data) == 0) {
            return array('status' => 1, 'info' => "清除所有权限成功", 'url' => U("Access/roleList"));
        }
        $datas = array();
        foreach ($data as $k => $v) {
            $tem = explode(":", $v);
            $datas[$k]['role_id'] = $role_id;
            $datas[$k]['node_id'] = $tem[0];
            $datas[$k]['level'] = $tem[1];
            $datas[$k]['pid'] = $tem[2];
        }
        if ($M->addAll($datas)) {
            return array('status' => 1, 'info' => "设置成功", 'url' => U("Access/roleList"));
        } else {
            return array('status' => 0, 'info' => "设置失败，请重试");
        }
    }

}

?>