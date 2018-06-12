<?php

namespace app\common\model;
use think\Model;

class Admin extends Model
{
    // 管理员登录操作
    public function login($data)
    {
    	$res = $this->where($data)->find();
    	// 帐号密码正确->设置登录cookie
    	if($res)
    	{
            cookie('id', $res['id'], 3600*2);
    		cookie('username', $data['username'], 3600*2);
    		cookie('userpass', $data['userpass'], 3600*2);
    	}
    	return $res;
    }

    // 检测管理员是否登录
    public function is_login()
    {
    	$admin = [
            'id' => cookie('id'),
    		'username' => cookie('username'),
    		'userpass' => cookie('userpass')
    	];
    	$res = $this->where($admin)->find();
        return $res;
    }

    // 管理员退出登录
    public function logout()
    {
        $id = cookie('id', null);
        $username = cookie('username', null);
        $userpass = cookie('userpass', null);
        if( empty($id) && empty($username) && empty($userpass) )
        {
           return true;
        }else{
            return false;
        }
    }
}