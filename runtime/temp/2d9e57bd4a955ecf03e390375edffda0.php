<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:31:"template/index/member\pass.html";i:1528830157;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改密码</title>
	<script src="http://apps.bdimg.com/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/layer/2.1/layer.js"></script>
	<link rel="stylesheet" href="/static/index/css/blog.css?ver=<?php echo $web['version']; ?>">
</head>
<body>
	
	<form action="<?php echo url('index/member/pass'); ?>" method="post" id="form">
		<p><input type="text" name="email" id="email" value="<?php echo $user['email']; ?>"></p>
		<p><input type="password" name="userpass" id="userpass" value=""></p>
		<p><input type="submit" class="reg" value="修改密码"></p>
	</form>

</body>
</html>