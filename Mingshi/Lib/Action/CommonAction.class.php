<?php

  class CommonAction extends Action{
  
  
     /**
     * 初始接口
     * @author shasha 2013-11-11
     */
  function _initialize() {
  
		// 用户权限检查
		if (C ( 'USER_AUTH_ON' ) && !in_array(MODULE_NAME,explode(',',C('NOT_AUTH_MODULE')))) {
			import ('ORG.Util.RBAC');
			if (! RBAC::AccessDecision ()) {
				//检查认证识别号
				if (! $_SESSION [C ( 'USER_AUTH_KEY' )]) {
					//跳转到认证网关
					redirect ( PHP_FILE . C ( 'USER_AUTH_GATEWAY' ) );
				}
					//var_dump($_SESSION [C ( 'USER_AUTH_KEY' )]);
				// 没有权限 抛出错误
				if (C ( 'RBAC_ERROR_PAGE' )) {
					// 定义权限错误页面
					redirect ( C ( 'RBAC_ERROR_PAGE' ) );
				} else {
					if (C ( 'GUEST_AUTH_ON' )) {
						$this->assign ( 'jumpUrl', PHP_FILE . C ( 'USER_AUTH_GATEWAY' ) );
					}
					// 提示错误信息
					$this->error ( L ('_VALID_ACCESS_') );
				}
			}
		}
	}

   
    /**
    //_initialize()方法是ThinkPHP提供的入口方法，类似于原PHP中__condition()构造函数。可以存放所有公用信息。
    Public  function _initialize(){
        //判断是否开启认证，并且当前模块需要验证
        if(C('USER_AUTH_ON')&&!in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE')))){
            //导入RBAC类，开始验证
            import('ORG.Util.RBAC');
            //通过accessDecision获取权限信息
            if(!RBAC::AccessDecision()){
                //没有获取到权限信息时需要执行的代码
                //1、用户没有登录
                if(!$_SESSION[C('USER_AUTH_KEY')]){
                    $url= U('Public/login');
                    $this->error("您还没有登录不能访问",$url);
                }
                $this->error("您没有操作权限");
            }
        }
    }
	
	 /**
      +----------------------------------------------------------
     * 验证token信息
      +----------------------------------------------------------
     */
    protected function checkToken() {
        if (IS_POST) {
            if (!M("Member")->autoCheckToken($_POST)) {
                die(json_encode(array('status' => 0, 'info' => '令牌验证失败')));
            }
            unset($_POST[C("TOKEN_NAME")]);
        }
    }

  
  
  }