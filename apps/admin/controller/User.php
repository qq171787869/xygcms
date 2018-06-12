<?php
namespace app\admin\controller;
use app\admin\controller\Base;

class User extends Base
{
	//管理
	public function lists()
	{
		return view();
	}

    //添加
    public function add()
    {
        return view();
    }

    //删除
    public function ban($id=0)
    {
        $res = model('User')->where('id', 'in', $id)->update(['status'=>0]);
        if($res)
        {
            return json(['code'=>1, 'msg'=>'封禁成功！']);
        }else{
            return json(['code'=>0, 'msg'=>'封禁失败！']);
        }
    }

    //编辑
    public function edit($id)
    {
        $user = model('User')->where('id', $id)->find();
        $this->assign('user', $user);
        return view();
    }

    // 保存
    public function save()
    {
        $post = input('post.');
        // 校验用户数据
        $result = $this->validate($post, 'User.edit');
        if(true !== $result)
        {
            $this->error($result);
        }
        // 编辑+插入
        if( isset($post['id']) ) 
        {
            $res = model('User')->where('id', $post['id'])->update($post);
        }else{
            $post['userpass'] = password($post['userpass']);
            $post['key'] = password($post['email'].$post['userpass']);
            $post['regdate'] = time();
            $post['lastlogin'] = time();
            $res = model('User')->insert($post);
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
        $data = model('User')->get_json($page, $limit);
        return $data;
    }
}
