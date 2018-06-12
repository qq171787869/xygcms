<?php

namespace app\index\controller;
use app\index\controller\Base;

class Member extends Base
{
	// 用户注册
	public function reg()
	{
		// 检测用户是否已经登录
		$user = model('User')->is_login();
		if($user)
		{
			$this->error('您已经登录', 'index/member/info');
		}
		// 获取post提交的数据
		$user = [
			'email'	=>	input('post.email/s'),
			'userpass'	=>	input('post.userpass/s'),
			'userpass2'	=>	input('post.userpass2/s'),
		];
		if(empty(array_filter($user)))
		{
			return view();
		}else{
			// 校验提交的数据
			$result = $this->validate($user, 'User.reg');
			if(true !== $result)
			{
				$this->error($result);
			}else{
				$res_id = model('User')->add($user);
				if($res_id)
				{
					$this->success('注册成功！', 'index/member/login');
				}else{
					$this->error('注册失败！');
				}	
			}
		} 
	}

	// 用户登录
	public function login()
	{
		// 检测用户是否已经登录
		$user = model('User')->is_login();
		if($user)
		{
			$this->error('您已经登录', 'index/member/info');
		}
		// 获取登录提交的数据
		$user = [
			'email'	=>	input('post.email/s'),
			'userpass'	=>	input('post.userpass/s'),
		];
		if(empty(array_filter($user)))
		{
			return view();
		}else{
			// 校验提交的数据
			$result = $this->validate($user, 'User.login');
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
					$this->success('登录成功！', 'index/member/info');
				}else{
					$this->error('登录失败！帐号或密码错误！');
				}	
			}	
		}
	}

	// 用户中心
	public function info()
	{
		// 检测用户是否已经登录
		$user = model('User')->is_login();
		if($user)
		{
			$this->assign('user', $user);
			return view();
		}else{
			$this->error('尚未登陆！', 'index/member/login');
		}	
	}

	// 修改密码
	public function pass()
	{
		// 检测用户是否已经登录
		$user = model('User')->is_login();
		if(!$user)
		{
			$this->error('您还未登录', 'index/member/login');
		}else{
			$this->assign('user', $user);
		}
		$user_email = input('post.email/s');
		if($user_email)
		{
			$user = [
				'id'	=>	$user['id'],
				'email'	=>	$user_email,
				'userpass'	=>	password(input('post.userpass/s'))
			];
			$res = model('User')->update($user);
			if($res)
			{
				$this->success('密码修改成功！');
			}else{
				$this->error('密码修改失败！');
			}
		}else{
			return view();
		}
	}

	// 用户退出操作
	public function logout()
	{
		// 检测用户是否已经登录
		$user = model('User')->is_login();
		if(!$user)
		{
			$this->error('您还未登录', 'index/member/login');
		}
		cookie('email', null);
		cookie('userpass', null);
		$this->success('退出成功！', 'index/member/login');
	}
}
