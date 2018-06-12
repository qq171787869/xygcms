<?php
namespace app\admin\controller;
use app\admin\controller\Base;

class Link extends Base
{
	// 列表
	public function lists()
	{
		return view();
	}

    // 添加
    public function add()
    {
        return view();
    }

    // 删除
    public function del($id=0)
    {
        $res = model('Link')->where('id', 'in', $id)->delete();
        if($res)
        {
            return json(['code'=>1, 'msg'=>'删除成功！']);
        }else{
            return json(['code'=>0, 'msg'=>'删除失败！']);
        }
    }

    // 编辑
    public function edit($id)
    {
        $link = model('Link')->where('id', $id)->find();
        $this->assign('link', $link);
        return view();
    }

    // 保存
    public function save()
    {
        $post = input('post.');
        // 校验数据
        $result = $this->validate($post, 'Link');
        if(true !== $result)
        {
            $this->error($result);
        }
        // 编辑+插入
        if( isset($post['id']) )
        {
            $res = model('Link')->where('id', $post['id'])->update($post);
        }else{
        	$post['time'] = time();
            $res = model('Link')->insert($post);
        }
        if($res)
        {
            $this->success('保存成功！');
        }else{
            $this->error('保存失败！');
        }
    }

    // json数据
    public function json($page=1, $limit=30)
    {
        $data = model('Link')->get_json($page, $limit);
        return $data;
    }
}
