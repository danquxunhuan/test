<?php
   class  LessonModel extends Model{
   
       /**
      +----------------------------------------------------------
     * 活动列表
      +----------------------------------------------------------
     */
    public function lessonList() {
        $list = M("Lesson")->select();
        foreach ($list as $k => $v) {
            $list[$k]['statusTxt'] = $v['status'] == 1 ? "启用" : "禁用";
        }
        return $list;
    }
	
	 /**
      +----------------------------------------------------------
     * 添加活动
      +----------------------------------------------------------
     */
	
	  public function addLesson() {
        if (!isset($_POST['Lesson_name'])) {
            return array('status' => 0, 'info' => "活动名称不能为空");
        }
        $datas = array();
        $M = M("Lesson");
        $datas['lesson_name'] = trim($_POST['Lesson_name']);
        if ($M->where("lesson_name='" . $datas['lesson_name'] . "'")->count() > 0) {
            return array('status' => 0, 'info' => "已经存在该活动");
        }
        $datas['status'] = md5(trim($_POST['status']));
        $datas['start_time'] = trim($_POST['start_time']);
		$datas['end_time'] =trim($_POST['end_time']);
		$datas['sponsor']=trim($_POST['sponsor']);
		$datas['area']=trim($_POST['area']);
		$datas['link']=trim($_POST['link']);
		$datas['introduce']=trim($_POST['introduce']);
        if ($M->add($datas)) {
            return array('status' => 1, 'info' => "添加活动成功", 'url' => U("Lesson/index"));
        } else {
            return array('status' => 0, 'info' => "添加新活动失败，请重试");
        }
    }
	
	
	
    /**
      +----------------------------------------------------------
     * 编辑活动
      +----------------------------------------------------------
     */
    public function editLesson() {
        $M = M("Lesson");

        $id = trim($_POST['id']);
        if ($M->save($_POST)) {
//            , 'url' => U("Access/index")
            return  array('status' => 1, 'info' => "成功更新", 'url' => U("Lesson/index"));
        } else {
            return  array('status' => 0, 'info' => "更新失败，请重试");
        }
    }
     
   }