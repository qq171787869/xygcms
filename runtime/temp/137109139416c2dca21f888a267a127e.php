<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:32:"template/index/member\login.html";i:1528709314;s:57:"D:\wamp64\www-root\xygcms\template\index\public\head.html";i:1528709265;s:57:"D:\wamp64\www-root\xygcms\template\index\public\foot.html";i:1527126152;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>会员登陆</title>
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

	<div class="user z">
		<h1>一个帐号享受我们的所有服务！</h1>
		<div class="user-l fl">
			<form action="<?php echo url('index/member/login'); ?>" method="post" id="form">
				<p>会员账号登陆</p>
				<p><input type="text" name="email" id="email" placeholder="输入邮箱帐号"></p>
				<p><input type="password" name="userpass" id="userpass" placeholder="输入密码"></p>
				<p><input type="submit" class="reg" value="创建账号"></p>
			</form>
		</div>
		<div class="user-r fl">
			<p>娉(pīng)娉袅(niǎo)袅十三馀(yú)，</p>
			<p>豆蔻梢头二月初。</p>
			<p>春风十里扬州路，</p>
			<p>卷上珠帘总不如。</p>
			<p>------唐*杜牧《赠别二首》</p>
		</div>
	</div>
	
	<div class="foot z">
	<p><?php echo $web['description']; ?></p>
	<p><?php echo $web['copyright']; ?></p>
</div>
	
</body>
<script>
	$('#form').submit(function(){
		if($('#email').val()=='')
		{
			layer.alert('邮箱账号未输入！');
			return false;
		};
		if($('#userpass').val()=='')
		{
			layer.alert('密码未输入！');
			return false;
		};
	})
</script>
</html>