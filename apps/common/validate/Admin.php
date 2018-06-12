<?php

namespace app\common\validate;
use think\Validate;

class Admin extends Validate
{
    protected $rule = [
        'username'	=>	'require',
        'userpass'	=>	'require',
    ];

    protected $message  =   [ 
    	'username.require'	=> '管理员账号未输入！',
        'userpass.require'	=> '管理员密码未输入！',
    ];

    protected $scene = [
        'login'   =>  ['username', 'userpass'],
    ];
}