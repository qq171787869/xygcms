<?php

namespace app\common\model;
use think\Model;

class Config extends Model
{
    // 获取网站配置
    public function get_config_info()
    {
        $data = $this->field('field, value')->select();
        $count = count($data);
        for ($i=0; $i < $count; $i++)
        { 
            $data[$i] = $data[$i]->toArray();
            $web[$data[$i]['field']] = $data[$i]['value'];
        }
        $click = explode(',', $web['click']);
        $web['preclick'] = $web['click'];
        $web['click'] = rand($click[0], $click[1]);
        return $web;
    }
}