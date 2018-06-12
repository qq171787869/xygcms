<?php

namespace app\index\controller;
use app\index\controller\Base;

class Image extends Base
{
	// 图床首页
	public function index()
	{
        return view();
	}

	// 图传上传接口
	public function upload()
	{
		$key = input('post.key');
	    $files = request()->file('xyg-image');
	    //dump($files);
	    if(empty($files))
	    {
	        $res = [
                'code' => 202,
                'msg'  => '上传为空！'
            ];
        }else if($key !== 'demo'){
        	$res = [
                'code' => 203,
                'msg'  => 'key错误！'
            ];
        }else{
		    // 静态资源路径
		    $file_path = ROOT_PATH . 'static' . DS . 'upload';
		    $file_url = $_SERVER['HTTP_HOST'] . DS . 'static' . DS . 'upload';
		    foreach($files as $file)
		    {
		    	// 移动/static/upload/目录下
			    $info = $file->validate(['size'=>2048*1024, 'ext'=>'JPEG,jpg,png,gif'])
			    ->rule('uniqid')->move($file_path);
			    if($info)
			    {
			    	$img[] = [
			    		'name' => $info->getFilename(),
			    		'url' => str_replace('\\', '/', $file_url . DS . $info->getFilename())
			    	];
			    	$res = [
		                'code'  => 200,
		                'msg'   => '上传成功',
		                'img'   => $img
		            ];
			    }else{
			        $res = [
		                'code' => 201,
		                'msg'  => $file->getError()
		            ];
			    }
			}
	    }
	    return json($res);
	}

	// 图片删除接口
	public function del()
	{

	}
}
