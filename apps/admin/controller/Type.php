<?php
namespace app\admin\controller;
use app\admin\controller\Base;

class Type extends Base
{
	// 列表
	public function lists()
	{
		return view();
	}

    // 添加
    public function add()
    {
        $option = model('Type')->option();
        $this->assign('option', $option);
        return view();
    }

    //批量添加
    public function addall()
    {
        $option = model('Type')->option();
        $this->assign('option', $option);
        return view();
    }

    //批量添加
    public function saveall()
    {
        $post = input('post.');
        $names = array_filter(array_slice($post, 0, 6));
        if( empty($names) )
        {
            $this->error('全部未输入');
        }else{
            $types = [];
            foreach ($names as $value) {
                $types[] = [
                    'name'      =>  $value,
                    'pid'       =>  $post['pid'],
                    'liststpl'  =>  $post['liststpl'],
                    'itemstpl'  =>  $post['itemstpl'],
                    'row'       =>  $post['row'],
                ];
            }
            model('Type')->insertAll($types);
        }
        $this->success('保存成功！');
    }

    //删除
    public function del($id=0)
    {
        $res = model('Type')->where('id', 'in', $id)->delete();
        if($res)
        {
            return json(['code'=>1, 'msg'=>'删除成功！']);
        }else{
            return json(['code'=>0, 'msg'=>'删除失败！']);
        }
    }

    //编辑
    public function edit($id)
    {
        $type = model('Type')->get_type_id_info($id);
        $this->assign('type', $type);
        $option = model('Type')->option($type['id'], $type['pid']);
        $this->assign('option', $option);
        return view();
    }

    //保存
    public function save()
    {
        $post = input('post.');
        unset($post['file']);
        // 校验栏目数据
        $result = $this->validate($post, 'Type');
        if(true !== $result)
        {
            $this->error($result);
        }
        // 编辑+插入
        if( isset($post['id']) ) 
        {
            model('Type')->where('id', $post['id'])->update($post);
        }else{
            model('Type')->insert($post);
        }
        $this->success('保存成功！');
    }

    //json数据
    public function json($page=1, $limit=30)
    {
        $data = model('Type')->get_json($page, $limit);
        return $data;
    }
}
