<?php

namespace app\common\validate;
use think\Validate;

class Type extends Validate
{
    protected $rule = [
        'pid'  =>  'require',
        'model'  =>  'require',
        'name'  =>  'require',
        'listtpl'  =>  'require',
        'itemtpl'   =>  'require',
        'row'   =>  'require',
        'url'   =>  'unique:type',
    ];

    protected $message  =   [
        'pid.require' => '父栏目未选择！',  
        'model.require' => '栏目模型未选择！',  
        'name.require' => '栏目名称未输入！',  
        'listtpl.require' => '列表模板未输入！',  
        'itemtpl.require' => '内页模版未输入！',  
        'row.require'   => '列表数量未输入！',  
    	'url.unique'	=> '栏目别名URL已存在！',  
    ];
}