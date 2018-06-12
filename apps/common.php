<?php

// 应用公共文件

/**
 * [password 密码加密]
 * @param  [string] $password      [密码原文]
 * @param  [string] $password_code [加密字串]
 * @return [string]                [返回密文]
 */
function password($password, $password_code='as3fasaQd12WE')
{
    return md5(md5($password).md5($password_code));
}

// 电影演员过滤重组(首台)
function tag_filter($str)
{
	$str = preg_replace(array("/[a-zA-Z0-9]+/","/[[:space:]]/", "[-]"), "", $str);
	$arr = array_values(array_unique(array_filter(explode(',', $str))));
	$count = count($arr);
	for ($i=0; $i < $count; $i++)
	{ 
		$arr[$i] = preg_replace(array("/[a-zA-Z0-9]+/","/[[:punct:]]/"), "", $arr[$i]);
		if(strlen($arr[$i])<4)
		{
			unset($arr[$i]);
		}
	}
	$tag = implode(',', $arr);
	return $tag;
}

function tags($str)
{
	$html = '';
	$arr = explode(',', $str);
	$count = count($arr);
	for ($i=0; $i < $count; $i++)
	{
		$href = url('index/index/tags', 'id='.$arr[$i]);
		$html .= '<a href="'.$href.'">'.$arr[$i].'</a>';
	}
	return $html;
}

/**
 * [create_url 生成url]
 * @param  [array] $arr [传入的数组] 
 * @param  [sting] $url [传入的方法] 例如 'index/article/detail'
 * @return [array]      [生成的数组]
 */
function create_list_url($arr, $url)
{
	$count = count($arr);
	for ($i=0; $i < $count; $i++)
	{
		if( empty($arr[$i]['url']) )
		{
			$arr[$i]['url'] = url($url, 'id='.$arr[$i]['id']);
		}else{
			$arr[$i]['url'] = url($url, 'id='.$arr[$i]['url']);
		}
	}
	return $arr;
}

function create_art_url($arr)
{
	if( empty($arr['url']) )
	{
		$arr['url'] = url('index/index/article', 'id='.$arr['id']);
	}else{
		$arr['url'] = url('index/index/article', 'id='.$arr['url']);
	}
	return $arr;
}

function create_film_url($arr)
{
	if( empty($arr['url']) )
	{
		$arr['url'] = url('index/index/film', 'id='.$arr['id']);
	}else{
		$arr['url'] = url('index/index/film', 'id='.$arr['url']);
	}
	return $arr;
}

function create_type_url($arr)
{
	if( empty($arr['url']) )
	{
		$arr['url'] = url('index/index/lists', 'id='.$arr['id']);
	}else{
		$arr['url'] = url('index/index/lists', 'id='.$arr['url']);
	}
	return $arr;
}

function jj_substr($str, $length)
{
	$str = mb_substr($str,0,$length,'utf-8');
	return $str;
}

function typeinfo($typeid)
{
	$data = model('Type')->get_diy_type_info($typeid);
	return $data;
}

function typelist($pid, $limit)
{
	$data = model('Type')->get_diy_type_list($pid, $limit);
	return $data;
}

function artlist($typeid, $limit, $property)
{
	$data = model('Article')->get_diy_art_list($typeid, $limit, $property);
	return $data;
}

function friendlink($limit)
{
	$data = model('Link')->get_link_list($limit);
	return $data;
}

function litpic2img($str)
{
	$src = '';
	$img = explode('|', $str);
	if(empty($str))
	{
		return $src;
	}else{
		for ($i=0; $i < count($img); $i++)
		{ 
			$src .= '<img src="' . $img[$i] . '">';
		}
		return $src;
	}
	
}