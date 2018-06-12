<?php
namespace app\admin\controller;
use app\admin\controller\Base;

class Film extends Base
{
    // 列表
    public function lists()
    {
        $option = model('Type')->option();
        $this->assign('option', $option);
        return view();
    }

    // 添加
    public function add()
    {
        $option = model('Type')->option(0,0,3);
        $this->assign('option', $option);
        return view();
    }

    // 编辑
    public function edit($id)
    {
        // 获取文章信息
        $film = model('Film')->get_film_id_info($id);
        $this->assign('film', $film);
        $option = model('Type')->option($film['id'], $film['typeid']);
        $this->assign('option', $option);
        return view();
    }

    // 保存
    public function save()
    {
        $post = input('post.');
        unset($post['file']);
        // 校验文章数据
        $result = $this->validate($post, 'Film');
        if(true !== $result)
        {
            $this->error($result);
        }
        // 编辑+插入
        if( isset($post['id']) ) 
        {
            model('Film')->where('id', $post['id'])->update($post);
        }else{
            model('Film')->insert($post);
        }
        $this->success('保存成功！');
    }

    // 删除
    public function del($id=0)
    {
        $res = model('Film')->where('id', 'in', $id)->delete();
        if($res)
        {
            return json(['code'=>1, 'msg'=>'删除成功！']);
        }else{
            return json(['code'=>0, 'msg'=>'删除失败！']);
        }
    }

    // json数据
    public function json($page=1, $limit=30, $typeid='', $id='')
    {
        $data = model('Film')->get_json($page, $limit, $typeid, $id);
        return $data;
    }
}
