<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:30:"template/index/member\reg.html";i:1528823950;s:57:"D:\wamp64\www-root\xygcms\template\index\public\head.html";i:1528709265;s:57:"D:\wamp64\www-root\xygcms\template\index\public\foot.html";i:1527126152;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>会员注册</title>
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
			<form action="<?php echo url('index/member/reg'); ?>" method="post" id="form">
				<p>请用您的邮箱账号创建会员：</p>
				<p><input type="text" name="email" id="email" value="" placeholder="输入您的邮箱注册帐号（必填）"></p>
				<p><input type="password" name="userpass" id="userpass" value="" placeholder="输入密码（必填）"></p>
				<p><input type="password" name="userpass2" id="userpass2" value="" placeholder="二次确认密码（必填）"></p>
				<p><input type="submit" class="reg" value="创建账号"></p>
			</form>
		</div>
		<div class="user-r fl">
			<p>余幼时即嗜学。家贫，无从致书以观，每假借于藏书之家，手自笔录，计日以还。</p>
			<p>天大寒，砚冰坚，手指不可屈伸，弗之怠。录毕，走送之，不敢稍逾约。</p>
			<p>以是人多以书假余，余因得遍观群书。既加冠，益慕圣贤之道 ，又患无硕师、名人与游，尝趋百里外，从乡之先达执经叩问。</p>
			<p>先达德隆望尊，门人弟子填其室，未尝稍降辞色。余立侍左右，援疑质理，俯身倾耳以请；</p>
			<p>或遇其叱咄，色愈恭，礼愈至，不敢出一言以复；俟其欣悦，则又请焉。故余虽愚，卒获有所闻。</p>
			<p>------明*宋濂《送东阳马生序》</p>
		</div>
	</div>
	
	<div class="foot z">
	<p><?php echo $web['description']; ?></p>
	<p><?php echo $web['copyright']; ?></p>
</div>
	
</body>
<script>
	$('#form').submit(function(){
		if($('#username').val()=='')
		{
			layer.alert('帐号未输入！');
			return false;
		};
		var email=$('#email').val();
		if(email=='')
		{
			layer.alert('邮箱未输入！');
			return false;
		};

		if(email!=='')
		{
			if(!email.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/))
			{
				layer.alert("邮箱格式不正确！请重新输入！");
				return false;
			}
		}
		if($('#userpass').val()=='')
		{
			layer.alert('密码未输入！');
			return false;
		};
		if($('#userpass2').val()=='')
		{
			layer.alert('二次确认密码未输入！');
			return false;
		};
		if($('#userpass').val()!==$('#userpass2').val())
		{
			layer.alert('两次密码输入不相同！');
			return false;
		};
		if($('#userpass').val().length<6)
		{
			layer.alert('密码长度不能小于6位！');
			return false;
		};
	})
</script>
</html>