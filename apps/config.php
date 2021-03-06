<?php

// 应用配置文件

return [
    // 开启调试模式
    'app_debug'				=>	true,
    // 应用Trace
    'app_trace'              => false,
    // 路由配置文件（支持配置多个）
    'route_config_file'      => ['route'],
    // 是否强制使用路由
    'url_route_must'         => false,
    // 域名部署
    'url_domain_deploy'      => false,
    // 域名根，如thinkphp.cn
    'url_domain_root'        => '',
    // 默认全局过滤方法 用逗号分隔多个
    'default_filter'         => 'htmlspecialchars',

    // 模板引擎设置
    'template'				=>	[
    	// 模板路径
    	'view_path'				=>	'template/',
    ],
    
    // 前台模块配置
    'index' => [
        // 模快名称
        'model_name' =>'index',
        // 默认模板文件名称
        'default_template' => 'default',	// 这里可以切换模块下的默认模板名称
    ],

    // 后台模块配置
    'admin'=>[
        // 模快名称
        'model_name' =>'admin',
        // 默认模板文件名称
        'default_template' =>'default',		// 这里可以切换模块下的默认模板名称
    ],
];
