<?php
namespace app\admin\controller;
use think\Controller;

class Base extends Controller
{
	// 校验管理员是否登录
	protected function _initialize()
	{
		$res = model('Admin')->is_login();
		if(!$res)
		{
			$this->error('管理员尚未登陆！', 'admin/index/index');
		}
		// 校验cookie是否相匹配
		$user = [
            'id' => cookie('id'),
    		'username' => cookie('username'),
    		'userpass' => cookie('userpass')
		];
		$is_patch = model('Admin')->where($user)->find();
		if(!$is_patch)
		{
			$this->error('权限校验失败！请重新登录！', 'admin/index/index');
		}else{
			$this->assign('level', $is_patch['level']);
		}
        // 获取网站配置信息
        $web = model('Config')->get_config_info();
        $this->assign('web', $web);
	}
}
