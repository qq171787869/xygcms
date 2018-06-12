<?php

namespace app\common\validate;
use think\Validate;

class Link extends Validate
{
    protected $rule = [
        'name'  =>  'require',
        'url'  =>  'require',
    ];

    protected $message  =   [
        'name.require' => '网站名称未输入！',  
        'url.require' => '网站地址未输入！',  
    ];
}