<?php

namespace app\index\controller;
use think\Controller;

class Base extends Controller
{
	public function _initialize()
	{
        // 获取网站配置信息
        $web = model('Config')->get_config_info();
        $this->assign('web', $web);
    }
}
