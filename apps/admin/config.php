<?php

// 前台应用配置文件

return [
	'template'	=>	[
	    // 模板路径
	    'view_path'	=>	config('template.view_path').config('admin.model_name').'/',
	]
];