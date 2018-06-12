<?php
namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{
	// 登录页面
	public function index()
	{
		$admin = model('Admin')->is_login();
		if($admin)
		{
			$this->success('您已经登录后台！', 'admin/main/index');
		}else{
			return view();
		}
	}

	// 登录操作
	public function login()
	{
		$admin = [
			'username' => input('post.username/s'),
			'userpass' => password(input('post.userpass/s')),
		];
		$key = input('post.key/s');
        // 校验提交的数据
        $result = $this->validate($admin, 'Admin.login');
        if(true !== $result)
        {
            $this->error($result);
        }
		if($key !== 'wonima')
		{
			$this->error('口令不对！');
		}else{
			$res = model('Admin')->login($admin);
			if($res)
			{
				$this->success('登录成功！', 'admin/main/index');
			}else{
				$this->error('账号密码错误！');
			}
		}
	}

	// 退出操作页面
	public function logout()
	{
		$admin = model('Admin')->is_login();
		if(!$admin)
		{
			$this->error('您还未登录！', 'admin/index/index');
		}
		$res = model('Admin')->logout();
		if($res)
		{
			$this->success('退出成功！', 'admin/index/index');
		}else{
			$this->error('退出失败！');
		}
	}
}
