<?php  class AdminModel extends Model{        //数据验证     protected $_validate = array(        array('name', 'require', '用户名必须！'),        array('pwd', 'require', '密码不能为空！'),        array('realname', 'require', '真实姓名不能为空！'),           array('name','','帐号名称已经存在！',0,'unique',1),     );        //自动填充设置,默认数据    protected $_auto = array(        array('pwd','md5',1,'function') , // 对password字段在新增的时候使md5函数处理        array('time', 'time', 1, 'function'),    );      }?>