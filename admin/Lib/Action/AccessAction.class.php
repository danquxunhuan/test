<?php

class AccessAction  extends CommonAction{
/*
* 管理员列表
*/
public function index() {
	$this->assign("list", D("Access")->adminList());
	$this->display();
}

/*
* 添加管理员
*/
public function addAdmin() {
	if (IS_POST) {
		$this->checkToken();
		if (!isset($_POST['username'])) {
            return array('status' => 0, 'info' => "用户名不能为空");
        }
        $datas = array();
        $M = M("Admin");
        $datas['username'] = trim($_POST['username']);
        if ($M->where("`username`='" . $datas['username'] . "'")->count() > 0) {
            return array('status' => 0, 'info' => "已经存在该账号");
        }
        $datas['password'] = md5(trim($_POST['password']));
		$datas['email'] = trim($_POST['email']);
		$datas['remark'] = trim($_POST['remark']);
		$datas['realname'] = trim($_POST['realname']);
		$datas['status'] = trim($_POST['status']);
		$datas['role_id'] = (int) $_POST['role_id'];
        $datas['time'] = time();
        if ($M->add($datas)) {
            M("RoleUser")->add(array('user_id' => $M->getLastInsID(), 'role_id' => (int) $_POST['role_id']));
            $this->success('账号已开通，请通知相关人员', U("Access/index"));
			exit();
        } else {
			$this->error('添加新账号失败，请重试');
        }
	} else {
		$this->assign("info", $this->getRoleListOption(array('role_id' => 0)));
		$this->display();
	}
}

/*
* 添加管理员
*/
public function editAdmin() {
	if (IS_POST)  {
		$this->checkToken();
		//header('Content-Type:application/json; charset=utf-8');
		//echo json_encode(D("Access")->editAdmin());
		$M = M("Admin");
        if (!empty($_POST['password'])) {
            $_POST['password'] = md5(trim($_POST['password']));
        } else {
            unset($_POST['password']);
        }
        $user_id = (int) $_POST['aid'];
        $role_id = (int) $_POST['role_id'];
        $roleStatus = M("RoleUser")->where("`user_id`=$user_id")->save(array('role_id' => $role_id));
        if ($M->save($_POST)) {
			$this->success('编辑成功', U("Access/index"));
			exit();
        } else {
            $this->error('编辑失败，请稍后重试');
        }
	} else {
		$M = M("Admin");
		$aid = (int) $_GET['aid'];
		$pre = C("DB_PREFIX");
		$info = $M->where("`aid`=" . $aid)->join($pre . "role_user ON " . $pre . "admin.aid = " . $pre . "role_user.user_id")->find();
		if (empty($info['aid'])) {
			$this->error("不存在该管理员ID", U('Access/index'));
		}
		if ($info['username'] == C('ADMIN_AUTH_KEY')) {
			$this->error("超级管理员信息不允许操作", U("Access/index"));
			exit;
		}
		$this->assign("info", $this->getRoleListOption($info));
		$this->display("addAdmin");
	}
}

/*
* 删除管理员
*/
public function delAdmin(){
	$art = D("Admin");
	$id = trim($_GET['aid']);
	if($art->where("aid=".$id)->delete()){
		$this->success("删除成功");
	}else{
		$this->error("删除失败");
	}	
}

/*
* 角色列表
*/
public function nodeList() {
	$this->assign("list", D("Access")->nodeList());
	$this->display();
}
	
/*
* 角色管理
*/
public function roleList() {
	$this->assign("list", D("Access")->roleList());
	$this->display();
}

/*
* 添加角色
*/
public function addRole() {
	if (IS_POST) {
		$this->checkToken();
		$M = M("Role");
		if ($M->add($_POST)) {
			$this->success('添加成功！');
			exit;
		} else {
			$this->error('发布失败，请稍后重试！');
		}
	} else {
		$this->assign("info", $this->getRole());
		$this->display("editRole");
	}
}

/*
* 编辑角色
*/
public function editRole() {
	if (IS_POST) {
		$this->checkToken();
		$M = M("Role");
		if ($M->save($_POST)) {
			$this->success('成功更新！', U("Access/roleList"));
		} else {
			$this->error('更新失败，请稍后重试！');
		}
	} else {
		$M = M("Role");
		$info = $M->where("id=" . (int) $_GET['id'])->find();
		if (empty($info['id'])) {
			$this->error("不存在该角色", U('Access/roleList'));
		}
		$this->assign("info", $this->getRole($info));
		$this->display();
	}
}

/*
* 删除角色
*/
public function delRole(){
	$art = D("Role");
	$id = trim($_GET['id']);
	if($art->where("id=".$id)->delete()){
		$this->success("删除成功");
	}else{
		$this->error("删除失败");
	}	
}

    public function opNodeStatus() {
        header('Content-Type:application/json; charset=utf-8');
        echo json_encode(D("Access")->opStatus("Node"));
    }

    public function opRoleStatus() {
        header('Content-Type:application/json; charset=utf-8');
        echo json_encode(D("Access")->opStatus("Role"));
    }

    public function opSort() {
        $M = M("Node");
        $datas['id'] = (int) $this->_post("id");
        $datas['sort'] = (int) $this->_post("sort");
        header('Content-Type:application/json; charset=utf-8');
        if ($M->save($datas)) {
            echo json_encode(array('status' => 1, 'info' => "处理成功"));
        } else {
            echo json_encode(array('status' => 0, 'info' => "处理失败"));
        }
    }

    public function editNode() {
        if (IS_POST) {
            $this->checkToken();
            header('Content-Type:application/json; charset=utf-8');
            echo json_encode(D("Access")->editNode());
        } else {
            $M = M("Node");
            $info = $M->where("id=" . (int) $_GET['id'])->find();
            if (empty($info['id'])) {
                $this->error("不存在该节点", U('Access/nodeList'));
            }
            $this->assign("info", $this->getPid($info));
            $this->display();
        }
    }

    public function addNode() {
        if (IS_POST) {
            $this->checkToken();
            header('Content-Type:application/json; charset=utf-8');
            echo json_encode(D("Access")->addNode());
        } else {
            $this->assign("info", $this->getPid(array('level' => 1)));
            $this->display("editNode");
        }
    }

/*
* 删除节点
*/
public function delNode(){
	$art = D("Node");
	$id = trim($_GET['id']);
	if($art->where("id=".$id)->delete()){
		$this->success("删除成功");
	}else{
		$this->error("删除失败");
	}	
}


    /**
      +----------------------------------------------------------
     * 给用户组添加权限
      +----------------------------------------------------------
     */
    public function changeRole() {
        header('Content-Type:application/json; charset=utf-8');
        if (IS_POST) {
            $this->checkToken();
            echo json_encode(D("Access")->changeRole());
        } else {
            $M = M("Node");
            $info = M("Role")->where("id=" . (int) $_GET['id'])->find();
            if (empty($info['id'])) {
                $this->error("不存在该用户组", U('Access/roleList'));
            }
            $access = M("Access")->field("CONCAT(`node_id`,':',`level`,':',`pid`) as val")->where("`role_id`=" . $info['id'])->select();
            $info['access'] = count($access) > 0 ? json_encode($access) : json_encode(array());
            $this->assign("info", $info);
            $datas = $M->where("level=1")->select();
            foreach ($datas as $k => $v) {
                $map['level'] = 2;
                $map['pid'] = $v['id'];
                $datas[$k]['data'] = $M->where($map)->select();
                foreach ($datas[$k]['data'] as $k1 => $v1) {
                    $map['level'] = 3;
                    $map['pid'] = $v1['id'];
                    $datas[$k]['data'][$k1]['data'] = $M->where($map)->select();
                }
            }
            $this->assign("nodeList", $datas);
            $this->display();
        }
    }



    private function getRole($info = array()) {
        import("@.ORG.Category");
        $cat = new Category('Role', array('id', 'pid', 'name', 'fullname'));
        $list = $cat->getList();               //获取分类结构
        foreach ($list as $k => $v) {
            $disabled = $v['id'] == $info['id'] ? ' disabled="disabled"' : "";
            $selected = $v['id'] == $info['pid'] ? ' selected="selected"' : "";
            $info['pidOption'].='<option value="' . $v['id'] . '"' . $selected . $disabled . '>' . $v['fullname'] . '</option>';
        }
        return $info;
    }

    private function getRoleListOption($info = array()) {
        import("@.ORG.Category");
        $cat = new Category('Role', array('id', 'pid', 'name', 'fullname'));
        $list = $cat->getList();               //获取分类结构
        $info['roleOption'] = "";
        foreach ($list as $v) {
            $disabled = $v['id'] == 1 ? ' disabled="disabled"' : "";
            $selected = $v['id'] == $info['role_id'] ? ' selected="selected"' : "";
            $info['roleOption'].='<option value="' . $v['id'] . '"' . $selected . $disabled . '>' . $v['fullname'] . '</option>';
        }
        return $info;
    }

    private function getPid($info) {
        $arr = array("请选择", "项目", "模块", "操作");
        for ($i = 1; $i < 4; $i++) {
            $selected = $info['level'] == $i ? " selected='selected'" : "";
            $info['levelOption'].='<option value="' . $i . '" ' . $selected . '>' . $arr[$i] . '</option>';
        }
        $level = $info['level'] - 1;
        import("@.ORG.Category");
        $cat = new Category('Node', array('id', 'pid', 'title', 'fullname'));
        $list = $cat->getList();               //获取分类结构
        $option = $level == 0 ? '<option value="0" level="-1">根节点</option>' : '<option value="0" disabled="disabled">根节点</option>';
        foreach ($list as $k => $v) {
            $disabled = $v['level'] == $level ? "" : ' disabled="disabled"';
            $selected = $v['id'] != $info['pid'] ? "" : ' selected="selected"';
            $option.='<option value="' . $v['id'] . '"' . $disabled . $selected . '  level="' . $v['level'] . '">' . $v['fullname'] . '</option>';
        }
        $info['pidOption'] = $option;
        return $info;
    }
	 
	 
	 
	 
	 
}
?>