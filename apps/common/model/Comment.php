<?php

namespace app\common\model;
use think\Model;

class Comment extends Model
{
    //json数据
    public function get_json($aid)
    {
        $count = $this->where('aid', $aid)->count();
        $data = $this->order('id DESC')->where('aid', $aid)->select();
        return json([
            'code'  =>  0,
            'msg'   =>  '',
            'count' =>  $count,
            'data'  =>  $data
        ]);
    }
}