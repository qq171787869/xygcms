<?php

// 路由配置文件

return [

    'route_config_file' =>['index', 'admin'],

    // 网站前台
    'lists/:id'     =>  'index/index/lists',    // 栏目分类
    'article/:id'   =>  'index/index/article',  // 文章内页
    'soft/:id'      =>  'index/index/soft',     // 下载内页
    'film/:id'      =>  'index/index/film',     // 电影内页
    'tags/:id'      =>  'index/index/tags',     // tags标签
    'comment/:aid'  =>  'index/index/comment',  // 文章评论
    'member/reg'    =>  'index/member/reg',     // 用户注册
    'member/login'  =>  'index/member/login',   // 用户登录
    'member/pass'   =>  'index/member/pass',    // 用户登录
    'member/info'   =>  'index/member/info',    // 用户中心
    'member/logout' =>  'index/member/logout',  // 用户中心
    'image'         =>  'index/image/index',    // 图床页面
    'image/upload'  =>  'index/image/upload',   // 图床上传
    'image/del'     =>  'index/image/del',      // 图床删除

    // 网站后台
    'article/lists' =>  'admin/article/lists',
    'article/add'   =>  'admin/article/add',
    'article/del'   =>  'admin/article/del',
    'article/edit'  =>  'admin/article/edit',
    'article/json'  =>  'admin/article/json',

    'soft/lists' =>  'admin/soft/lists',
    'soft/add'   =>  'admin/soft/add',
    'soft/del'   =>  'admin/soft/del',
    'soft/edit'  =>  'admin/soft/edit',
    'soft/json'  =>  'admin/soft/json',

    'film/lists' =>  'admin/film/lists',
    'film/add'   =>  'admin/film/add',
    'film/del'   =>  'admin/film/del',
    'film/edit'  =>  'admin/film/edit',
    'film/json'  =>  'admin/film/json',
    
];
