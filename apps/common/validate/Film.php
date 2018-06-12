<?php

namespace app\common\validate;
use think\Validate;

class Film extends Validate
{
    protected $rule = [
        'title'  =>  'require',
        'typeid'  =>  'require',
        'url'   =>  'unique:Article',
    ];

    protected $message  =   [
        'title.require' => '电影标题未输入！',  
        'typeid.require' => '所属栏目未选择！',  
    	'url.unique'	=> '电影别名URL已存在！',  
    ];
}