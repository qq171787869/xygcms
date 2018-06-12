<?php

namespace app\index\controller;
use app\index\controller\Base;

class Member extends Base
{
	// 用户注册
	public function reg()
	{
		// 获取post提交的数据
		$user = input('post.');
		if($user)
		{
			// 校验提交的数据
			$result = $this->validate($user, 'UserReg');
			if(true !== $result)
			{
				$this->error($result);
			}else{
				$res_id = model('User')->add($user);
				if($res_id)
				{
					$this->success('注册成功！', 'index/user/login');
				}else{
					$this->error('注册失败！');
				}	
			}
		}else{
			return view();
		} 
	}

	// 用户登录
	public function login()
	{
		// 获取登录提交的数据
		$user = input('post.');
		if($user)
		{
			// 校验提交的数据
			$result = $this->validate($user, 'UserLogin');
			if(true !== $result)
			{
				$this->error($result);
			}else{
				// 密码加密
				$user['userpass'] = password($user['userpass']);
				// 调用user模型login方法
				$res = model('User')->login($user);
				if($res)
				{
					$this->success('登录成功！', 'index/user/info');
				}else{
					$this->error('登录失败！帐号或密码错误！');
				}	
			}
		}else{
			return view();	
		}
	}

	// 用户中心
	public function info()
	{
		$user = model('User')->is_login();
		if($user)
		{
			$this->assign('user', $user);
			return view();
		}else{
			$this->error('尚未登陆！', 'index/user/login');
		}	
	}

	// 用户退出操作
	public function logout()
	{
		cookie('email', null);
		cookie('userpass', null);
		$this->success('退出成功！', 'index/user/login');
	}
}
