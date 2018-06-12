<?php

// 应用配置文件

return [
    // 开启调试模式
    'app_debug'				=>	true,
    'url_route_must'        =>  false,
    'app_trace'              => false, 

    // 模板引擎设置
    'template'				=>	[
    	// 模板路径
    	'view_path'				=>	'template/',
    ],
    
    /**
     * 前台文件配置
     * */
    'index' => [
        // 模快名称
        'model_name' =>'index',
        // 默认模板文件名称
        'default_template' => 'default',	// 这里可以切换模块下的默认模板名称
    ],
    /**
     * 后台文件配置
     * */
    'admin'=>[
        // 模快名称
        'model_name' =>'admin',
        // 默认模板文件名称
        'default_template' =>'default',		// 这里可以切换模块下的默认模板名称
    ],
];
