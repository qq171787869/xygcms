<?php
namespace app\admin\controller;
use app\admin\controller\Base;

class Article extends Base
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
        $option = model('Type')->option(0,0,1);
        $this->assign('option', $option);
        return view();
    }

    // 编辑
    public function edit($id)
    {
        // 获取文章信息
        $art = model('Article')->get_art_id_info($id);
        $this->assign('art', $art);
        $option = model('Type')->option($art['id'], $art['typeid']);
        $this->assign('option', $option);
        return view();
    }

    // 保存
    public function save()
    {
        $post = input('post.');
        unset($post['file']);
        // 校验文章数据
        $result = $this->validate($post, 'Article');
        if(true !== $result)
        {
            $this->error($result);
        }
        // 编辑+插入
        if( isset($post['id']) ) 
        {
            unset($post['pubdate']);
            model('Article')->where('id', $post['id'])->update($post);
        }else{
            $post['pubdate'] = time();
            model('Article')->insert($post);
        }
        $this->success('保存成功！');
    }

    // 删除
    public function del($id=0)
    {
        $res = model('Article')->where('id', 'in', $id)->delete();
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
        $data = model('Article')->get_json($page, $limit, $typeid, $id);
        return $data;
    }

    // 图片上传
    public function upload()
    {
        $file = $this->request->file('file');
        $info = $file->validate(['size'=>204800, 'ext'=>'jpg,png,gif'])
        ->move(ROOT_PATH . 'static' . DS . 'upload');
        if($info)
        {
            $result = [
                'code'  => 0,
                'msg'   => '上传成功',
                'src'   => '/static/upload/' . str_replace('\\', '/', $info->getSaveName())
            ];
        }else{
            $result = [
                'code' => -1,
                'msg'  => $file->getError()
            ];
        }
        return json($result);
    }
}
