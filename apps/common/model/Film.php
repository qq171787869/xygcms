<?php

namespace app\common\model;
use think\Model;

class Film extends Model
{
    // 获取自由属性(栏目ID,数量,属性)电影列表
    // 属性：0=>无属性，1=>置顶，2=>热门点击
    public function get_diy_film_list($typeid=0, $limit=10, $property=0)
    {
        // 如果typeid为0就是取所有栏目的电影
        if($typeid==0 && $property==0)
        {
            $data = $this->order('istop desc, id desc')->limit($limit)->select();
        }elseif($typeid==0 && $property==1){
            $data = $this->where('istop', 1)->order('id desc')->limit($limit)->select();
        }elseif($typeid==0 && $property==2){
            $data = $this->order('click desc')->limit($limit)->select();
        }elseif($typeid!=0 && $property==0){
            $data = $this->where('typeid', $typeid)->order('istop desc, id desc')->limit($limit)->select();
        }elseif($typeid!=0 && $property==1){
            $data = $this->where(['typeid'=>$typeid, 'istop'=>1])->order('id desc')->limit($limit)->select();
        }elseif($typeid!=0 && $property==2){
            $data = $this->where('typeid', $typeid)->order('click desc')->limit($limit)->select();
        }
        if($data)
        {
            $data = create_list_url($data, 'index/index/film');
            return $data;
        }
    }

    // 获取栏目电影列表
    public function get_film_lists($id)
    {
        // 获取栏目信息
        $type = model('Type')->get_type_info($id);
        $data = $this->where('typeid', $type['id'])->field('id,title,year,category,poster,click,url')->order('istop desc, id desc')->paginate($type['row']);
        if($data)
        {
            $data = create_list_url($data, 'index/index/film');
            return $data;
        } 
    }

    // 获取tags电影列表数据
    public function get_tags_lists($id)
    {
        $data = $this->where('tags', 'like', "%{$id}%")->field('id,title,year,category,poster,click,url')->order('istop desc, id desc')->paginate(10);
        if($data)
        {
            $data = create_list_url($data, 'index/index/film');
            return $data;
        }
    }

    // 获取电影信息
    public function get_film_info($id)
    {
        $data = $this->where('id', $id)->whereOr('url', $id)->find();
        if($data)
        {
            $data = create_film_url($data);
            return $data;
        }  
    }

    // 获取电影信息(后台用根据ID)
    public function get_film_id_info($id)
    {
        $data = $this->where('id', $id)->find();
        return $data;
    }

    //json数据
    public function get_json($page, $limit ,$typeid, $id)
    {
        $start = ($page-1)*$limit;
        if( empty($typeid) )
        {
            $count = $this->count();
            $data = $this->limit($start, $limit)->order('id DESC')->select();
        }else{
            $count = $this->where('typeid', $typeid)->count();
            $data = $this->limit($start, $limit)->order('id DESC')->where('typeid', $typeid)->select();
        }
        return json([
            'code'  =>  0,
            'msg'   =>  '',
            'count' =>  $count,
            'data'  =>  $data
        ]);
    }
}