<?php
/***********************************************************
    [EasyTalk] (C)2009 - 2011 nextsns.com
    This is NOT a freeware, use is subject to license terms

    @Filename EmptyAction.class.php $

    @Author hjoeson $

    @Date 2011-08-09 08:45:20 $
*************************************************************/

class EmptyAction extends PublicAction {

    public function index() {
		parent::init();
		$this->assign('type','error404');
		$this->display('Error:index');
        exit;
    }
}
?>