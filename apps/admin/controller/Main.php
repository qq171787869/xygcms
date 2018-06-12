<?php
namespace app\admin\controller;
use app\admin\controller\Base;

class Main extends Base
{
	// 后台首页外框架
	public function index()
	{
        return view();
	}

    // 后台首页内框架
    public function main()
    {
        return view();
    }

	// 网站设置
	public function setting()
	{
		return view();
	}

    // 设置保存
    public function save()
    {
        $data = input('param.');
        foreach ($data as $key => $value)
        {
            db('config')->where('field', $key)->update(['value'=>$value]);
        }
        $this->success('保存成功！');
    }

    // 修改密码
    public function pass()
    {
        $action = input('post.action');
        if($action)
        {
            $userpass = trim(input('post.userpass/s'));
            $userpass2 = trim(input('post.userpass2/s'));
            if($userpass !== $userpass2)
            {
                $this->error('两次密码输入不一致！');
            }else if(empty($userpass) || empty($userpass2)){
                $this->error('密码输入为空！');
            }else{
                $res = model('Admin')->where('id', 1)->update(['userpass'=>password($userpass)]);
                $this->success('密码修改成功！');
            }
        }else{
            return view();
        }  
    }

    // QQ登录配置
    public function qqlogin()
    {
        return view();
    }
}
