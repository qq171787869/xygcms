<?php

namespace app\common\validate;
use think\Validate;

class User extends Validate
{
    protected $rule = [
        'email'	=>	'email|require|unique:user',
        'userpass'	=>	'require|min:6',
        'userpass2'	=>  'require|min:6|confirm:userpass',
    ];

    protected $message  =   [
    	'email.email'	=> '邮箱格式错误',  
    	'email.require'	=> '邮箱账号未输入！',  
    	'email.unique'	=> '邮箱账号已存在！',  
        'userpass.require' => '密码没有输入！',
        'userpass.min'     => '密码长度不能小于6位！',
        'userpass2.require' => '二次确认密码没有输入！',
        'userpass2.min'     => '二次确认密码长度不能小于6位！', 
        'userpass2.confirm' => '两次密码输入不相同！',
    ];

    protected $scene = [
        'add'   =>  ['email', 'userpass', 'userpass2'],
        'login'  =>  ['email', 'userpass'],
        'edit'  =>  ['email'],
    ];
}