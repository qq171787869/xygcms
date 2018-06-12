<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:38:"template/index/index\list_article.html";i:1528702214;s:57:"D:\wamp64\www-root\xygcms\template\index\public\head.html";i:1528709265;s:58:"D:\wamp64\www-root\xygcms\template\index\public\right.html";i:1527124006;s:57:"D:\wamp64\www-root\xygcms\template\index\public\foot.html";i:1527126152;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $type['name']; ?>-<?php echo $web['name']; ?></title>
	<meta name="keywords" content="<?php echo $type['keywords']; ?>"/>
	<meta name="description" content="<?php echo $type['description']; ?>"/>
	<script src="http://apps.bdimg.com/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/layer/2.1/layer.js"></script>
	<link rel="stylesheet" href="/static/index/css/blog.css?ver=<?php echo $web['version']; ?>">
</head>
<body>
	<div class="head z">
	<a href="<?php echo url('index/index/index'); ?>"><img src="/static/index/img/logo.png" class="logo"></a>
</div>
<div class="menu z">
	<a href="<?php echo $web['cmsurl']; ?>">博客首页</a>
	<?php $_result=typelist(0,0);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$typelist): $mod = ($i % 2 );++$i;?>
	<a href="<?php echo $typelist['url']; ?>"><?php echo $typelist['name']; ?></a>
	<?php endforeach; endif; else: echo "" ;endif; ?>
	<a href="<?php echo url('index/member/reg'); ?>" class="reg">会员注册</a>
	<a href="<?php echo url('index/member/login'); ?>" class="login">会员登陆</a>
</div>
	<div class="blog z">
		<div class="blog-l fl">
			<div class="list">
				<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
				<li>
					<a href="<?php echo $list['url']; ?>" title="<?php echo $list['title']; ?>"><?php echo jj_substr($list['title'],20); ?></a>
					<em><?php echo date("Y-m-d",$list['pubdate']); ?></em>
				</li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<?php echo $page; ?>
		</div>
		<div class="blog-r fl">
			<h2><?php $_result=typeinfo('7,8,9,10');if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$typeinfo): $mod = ($i % 2 );++$i;?>
<a href="<?php echo $typeinfo['url']; ?>"><?php echo $typeinfo['name']; ?></a>
<?php endforeach; endif; else: echo "" ;endif; ?></h2>

<hr><h2>【当前栏目子栏目】</h2>
<p>参数1：栏目ID 0=>所有栏目 <?php echo $type['id']; ?></p>
<p>参数2：数据数量</p><hr>
<?php $_result=typelist($type['id'],0);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$typelist): $mod = ($i % 2 );++$i;?>
<a href="<?php echo $typelist['url']; ?>"><?php echo $typelist['name']; ?></a>
<?php endforeach; endif; else: echo "" ;endif; ?>

<hr><h2>【自由获取文章列表标签】</h2>
<p>参数1：栏目ID 0=>所有栏目</p>
<p>参数2：数据数量</p>
<p>参数3：属性 0=>无属性，1=>置顶，2=>热门点击</p><hr>
<?php $_result=artlist($type['id'],5,1);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$artlist): $mod = ($i % 2 );++$i;?>
<li><a href="<?php echo $artlist['url']; ?>" title="<?php echo $artlist['title']; ?>"><?php echo $artlist['title']; ?></a></li>
<?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>
	<div class="foot z">
	<p><?php echo $web['description']; ?></p>
	<p><?php echo $web['copyright']; ?></p>
</div>
</body>
</html>