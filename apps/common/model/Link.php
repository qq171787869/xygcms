<?php

namespace app\common\model;
use think\Model;

class Link extends Model
{
    // 获取友情链接数据
    public function get_link_list($limit)
    {
        $data = $this->limit($limit)->select();
        if($data)
        {
            return $data;
        }
    }

    // json数据
    public function get_json($page, $limit)
    {
        $start = ($page-1)*$limit;
        $count = $this->count();
        $data = $this->limit($start, $limit)->order('id DESC')->select();
        return json([
            'code'  =>  0,
            'msg'   =>  '',
            'count' =>  $count,
            'data'  =>  $data
        ]);
    }
}