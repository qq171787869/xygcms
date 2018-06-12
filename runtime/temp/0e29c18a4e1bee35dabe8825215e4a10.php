<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:31:"template/index/member\info.html";i:1528702279;s:57:"D:\wamp64\www-root\xygcms\template\index\public\foot.html";i:1527126152;}*/ ?>
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
	<div class="head z" style="border-bottom:2px solid #666">
		<a href="<?php echo url('index/index/index'); ?>"><img src="/static/index/img/logo.png" class="logo"></a>
	</div>
	<div class="user z">
		<h1>一个帐号享受我们的所有服务！</h1>
		<div class="user-l fl">
				<p>会员账号</p>
				<p><input type="text" name="email" id="email" value="<?php echo $user['email']; ?>"></p>
				<p>密钥key</p>
				<p><input type="text" name="key" id="key" value="<?php echo $user['key']; ?>"></p>
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
</html>