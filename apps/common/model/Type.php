<?php

namespace app\common\model;
use think\Model;

class Type extends Model
{
    // 获取栏目信息
    public function get_type_info($id)
    {
        $data = $this->where('id', $id)->whereOr('url', $id)->find();
        if($data)
        {
            $data = $data->toArray();
            // 生成栏目url
            $data = create_type_url($data);
        }
        return $data;
    }

    // 获取栏目信息(根据栏目ID后台用)
    public function get_type_id_info($id)
    {
        $data = $this->where('id', $id)->find();
        return $data;
    }
    
    // 自由获取栏目信息
    public function get_diy_type_info($typeid)
    {
        $typeid = explode(',', $typeid);
        $data = $this->where('id', 'in', $typeid)->select();
        if($data)
        {
            $count = count($data);
            for ($i=0; $i < $count; $i++)
            { 
                $typeinfo = $data[$i]->toArray();
                $typeinfo = create_type_url($typeinfo);
                $typeinfolist[] = $typeinfo;
            }
            return $typeinfolist;
        }
    }

    // 自由获取栏目列表
    public function get_diy_type_list($pid=0, $limit=0)
    {
        if($pid==0 && $limit==0)
        {
            $data = $this->where('pid', 0)->order(['sort'=>'asc','id'=>'asc'])->select();
        }elseif($pid==0 && $limit!=0){
            $data = $this->where('pid', 0)->order(['sort'=>'asc','id'=>'asc'])->limit($limit)->select();
        }elseif($pid!=0 && $limit==0){
            $data = $this->where('pid', $pid)->order(['sort'=>'asc','id'=>'asc'])->select();
        }elseif($pid!=0 && $limit!=0){
            $data = $this->where('pid', $pid)->order(['sort'=>'asc','id'=>'asc'])->limit($limit)->select();
        }
        $count = count($data);
        for ($i=0; $i < $count; $i++)
        { 
            $sontype = $data[$i]->toArray();
            $sontype = create_type_url($sontype);
            $sontypelist[] = $sontype;
        }
        if(isset($sontypelist))
        {
            return $sontypelist;
        } 
    }

    // 后台专用
    public function typelist($cate, $id=0, $level=0){
        static $cates = array();
        foreach ($cate as $value) {
            if ($value['pid']==$id) {
                $value['level'] = $level+1;
                if($level == 0)
                {
                    $value['str'] = str_repeat('',$value['level']);
                    $value['rename'] = $value['str'].$value['name'];
                }
                elseif($level == 2)
                {
                    //$value['str'] = '&emsp;&emsp;&emsp;&emsp;'.'└ ';
                    $value['str'] = '&emsp;'.'└ ';
                    $value['rename'] = $value['str'].$value['name'];
                }
                else
                {
                    //$value['str'] = '&emsp;&emsp;'.'└ ';
                    $value['str'] = '└ ';
                    $value['rename'] = $value['str'].$value['name'];
                }
                $cates[] = $value;
                $this->typelist($cate, $value['id'], $value['level']);
            }
        }
        $cates;
        return $cates;
    }

    //栏目列表（作为select用）
    public function option($id=0, $typeid=0, $typeModel=0)
    {
        if($typeModel == 0)
        {
            $cate = $this->select();
        }else{
            $cate = $this->where('model', $typeModel)->select();
        }
        $cates = $this->typelist($cate);
        $count = count($cates);
        $select = [];
        for ($i=0; $i < $count; $i++)
        { 
            $select[] = $cates[$i]->toArray();
        }
        $option = '';
        for ($i=0; $i < $count; $i++)
        { 
            if($typeid == $select[$i]['id'])
            {
                $option .= '<option value="' . $select[$i]['id'] . '" selected="">' . $select[$i]['rename'] . '</option>';
            }else{
                $option .= '<option value="' . $select[$i]['id'] . '">' . $select[$i]['rename'] . '</option>';
            }
        }
        return $option;
    }

    //json数据
    public function get_json($page=1, $limit=30)
    {
        $start = ($page-1)*$limit;
        $count = $this->count();
        $cate = $this->limit($start, $limit)->order(['sort'=>'asc','id'=>'asc'])->select();
        $cates = $this->typelist($cate);
        return json([
            'code'=>0,
            'msg'=>'OK',
            'count'=>count($count),
            'data'=>$cates
        ]);
    }
}