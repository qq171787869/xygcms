<?php

namespace app\index\controller;
use app\index\controller\Base;

class Index extends Base
{
    // 网站首页
    public function index()
    {
    	return view();
    }

    // 栏目文章列表
    public function lists($id)
    {
        // 过滤非法
        $id = strval($id);
        // 获取栏目信息
        $type = model('type')->get_type_info($id);
        // 如果当前栏目不存在
        if (!$type)
        {
            return view('404');
        }
        $this->assign('type', $type);
        // 判断所属模型
        switch ($type['model'])
        {
            case 1: // 文章
                $list =model('Article')->get_art_lists($id);
                break;
            case 2: // 下载
                $list =model('Soft')->get_soft_lists($id);
                break;
            case 3: // 电影
                $list =model('Film')->get_film_lists($id);
                break;
        }
        $this->assign('list', $list);
        // 获取分页列表
        $page = $list->render();
        $this->assign('page', $page);
        return view($type['listtpl']);
    }

    // 电影tags标签
    public function filmtags($id)
    {
        // 过滤非法
        $id = strval($id);
        $id = preg_replace("/[a-zA-Z0-9]+/", "", $id);
        $this->assign('tags', $id);
        // 获取tags文章列表
        $list =model('Film')->get_tags_lists($id);
        $this->assign('list', $list);
        // 获取分页列表
        $page = $list->render();
        $this->assign('page', $page);
        return view();
    }

    // 文章内页
    public function article($id)
    {
        // 过滤非法
        $id = strval($id);
        // 获取文章信息
        $article = model('Article')->get_art_info($id);
        // 如果当前文章不存在
        if(!$article)
        {
            return view('404');
        }
        $this->assign('article', $article);
        // 获取栏目信息
        $type = model('type')->get_type_info($article['typeid']);
        $this->assign('type', $type);
        return view($type['itemtpl']);
    }

    // 下载内页
    public function soft($id)
    {
        // 过滤非法
        $id = strval($id);
        // 获取文章信息
        $soft = model('Soft')->get_soft_info($id);
        // 如果当前文章不存在
        if(!$soft)
        {
            return view('404');
        }
        $this->assign('soft', $soft);
        // 获取栏目信息
        $type = model('type')->get_type_info($soft['typeid']);
        $this->assign('type', $type);
        return view($type['itemtpl']);
    }

    // 电影内页
    public function film($id)
    {
        // 过滤非法
        $id = strval($id);
        // 获取文章信息
        $film = model('Film')->get_film_info($id);
        // 如果当前文章不存在
        if(!$film)
        {
            return view('404');
        }
        $this->assign('film', $film);
        // 获取栏目信息
        $type = model('type')->get_type_info($film['typeid']);
        $this->assign('type', $type);
        return view($type['itemtpl']);
    }

    // 获取评论内容
    public function comment($aid)
    {
        // 过滤非法
        $aid = intval($aid);
        $comment = model('Comment')->get_json($aid);
        return $comment;
    }
}
