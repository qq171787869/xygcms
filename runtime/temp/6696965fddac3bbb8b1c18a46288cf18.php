<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:31:"template/index/index\index.html";i:1528702191;s:57:"D:\wamp64\www-root\xygcms\template\index\public\head.html";i:1528709265;s:57:"D:\wamp64\www-root\xygcms\template\index\public\foot.html";i:1527126152;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $web['name']; ?></title>
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
		<div class="list">
			<div class="blog-l fl">
				<?php $_result=artlist(0,10,0);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$artlist): $mod = ($i % 2 );++$i;?>
				<li>
					<a href="<?php echo $artlist['url']; ?>" title="<?php echo $artlist['title']; ?>"><?php echo jj_substr($artlist['title'],20); ?></a>
					<em><?php echo date("Y-m-d",$artlist['pubdate']); ?></em>
				</li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
		<div class="blog-r">
			<div class="link">
				<h2>友情链接</h2>
				<?php $_result=friendlink(0);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$friendlink): $mod = ($i % 2 );++$i;?>
				    <li><a href="<?php echo $friendlink['url']; ?>" target="_blank"><?php echo $friendlink['name']; ?></a></li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
	</div>
	<div class="foot z">
	<p><?php echo $web['description']; ?></p>
	<p><?php echo $web['copyright']; ?></p>
</div>
</body>
</html>