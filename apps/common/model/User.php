<?php

namespace app\common\model;
use think\Model;

class User extends Model
{
	// 新用户注册入库
    public function add($data)
    {
    	$data['lastlogin'] = time();
    	$data['regdate'] = time();
    	$data['userpass'] = password($data['userpass']);
    	$data['key'] = password($data['email'] . $data['userpass']);
    	$this->allowField(true)->save($data);
    	return $this->id;
    }

    // 用户登录操作
    public function login($data)
    {
    	$res = $this->where($data)->find();
    	// 帐号密码正确->设置登录cookie
    	if($res)
    	{
    		cookie('email', $data['email'], 3600*6);
    		cookie('userpass', $data['userpass'], 3600*6);
    	}
    	return $res;
    }

    // 检测用户是否登录
    public function is_login()
    {
    	$user = [
    		'email' => cookie('email'),
    		'userpass' => cookie('userpass')
    	];
    	$res = $this->where($user)->find();
        return $res;
    }

    // json数据
    public function get_json($page, $limit)
    {
        $start = ($page-1)*$limit;
        $count = $this->count();
        $data = $this->limit($start, $limit)->order('id DESC')->select();
        return json([
            'code'  =>  0,
            'msg'   =>  '',
            'count' =>  $count,
            'data'  =>  $data
        ]);
    }
}