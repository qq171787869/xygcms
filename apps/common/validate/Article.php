<?php

namespace app\common\validate;
use think\Validate;

class Article extends Validate
{
    protected $rule = [
        'title'  =>  'require',
        'typeid'  =>  'require',
        'url'   =>  'unique:Article',
    ];

    protected $message  =   [
        'title.require' => '文章标题未输入！',  
        'typeid.require' => '所属栏目未选择！',  
    	'url.unique'	=> '文章别名URL已存在！',  
    ];
}