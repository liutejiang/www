<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理 - 易买网</title>
<link type="text/css" rel="stylesheet" href="/dawashop/Public/css/style.css" />
<script type="text/javascript" src="/dawashop/Public/scripts/function-manage.js"></script>
<script type="javascript">

</script>
</head>
<body>
<div id="header" class="wrap">
	<div id="logo"><img src="/dawashop/Public/images/logo.gif" /></div>
	<div class="help"><a href="../index.html">返回前台页面</a></div>
	<div class="navbar">
		<ul class="clearfix">
			<li><a href="index.html">首页</a></li>
			<li class="current"><a href="<?php echo U('Admin/User/index');?>">用户</a></li>
			<li><a href="<?php echo U('Admin/Product/index');?>">商品</a></li>
			<li><a href="order.html">订单</a></li>
			<li><a href="guestbook.html">留言</a></li>
			<li><a href="news.html">新闻</a></li>
		</ul>
	</div>
</div>
<div id="childNav">
	<div class="welcome wrap">
		管理员pillys您好，今天是2012-12-21，欢迎回到管理后台。
	</div>
</div>
<div id="position" class="wrap">
	您现在的位置：<a href="index.html">易买网</a> &gt; 管理后台
</div>
<div id="main" class="wrap">
	<div id="menu-mng" class="lefter">
		<div class="box">
			<dl>
				<dt>用户管理</dt>
				<dd><em><a href="<?php echo U('Admin/User/add');?>">新增</a></em><a href="<?php echo U('Admin/User/index');?>">用户管理</a></dd>
				<dt>商品信息</dt>
				<dd><em><a href="<?php echo U('Admin/Productattr/add');?>">新增</a></em><a href="<?php echo U('Admin/Productattr/index');?>">分类管理</a></dd>
				<dd><em><a href="<?php echo U('Admin/Product/productadd');?>">新增</a></em><a href="<?php echo U('Admin/Product/index');?>">商品管理</a></dd>
				<dt>订单管理</dt>
				<dd><a href="order.html">订单管理</a></dd>
				<dt>留言管理</dt>
				<dd><a href="guestbook.html">留言管理</a></dd>
				<dt>新闻管理</dt>
				<dd><em><a href="news-add.html">新增</a></em><a href="news.html">新闻管理</a></dd>
			</dl>
		</div>
	</div>
	<div class="main">
		<h2>用户管理</h2>
		<div class="manage">
			<table class="list">
				<tr>
					<th>ID</th>
					<th>姓名</th>
					<th>性别</th>
					<th>Email</th>
					<th>手机</th>
					<th>地址</th>
					<th>操作</th>
				</tr>
				<?php if(is_array($user)): foreach($user as $key=>$vo): ?><tr>
					<td class="first w4 c"><?php echo ($vo["id"]); ?></td>
					<td class="w1 c"><?php echo ($vo["name"]); ?></td>
					<td class="w2 c"><?php echo ($vo["sex"]); ?></td>
					<td><?php echo ($vo["email"]); ?></td>
					<td class="w4 c"><?php echo ($vo["telno"]); ?></td>
					<td><?php echo ($vo["address"]); ?></td>
					<td><a href="<?php echo U('Admin/User/change',array('userid' => $vo[id]));?>">修改
					&nbsp<a href="<?php echo U('Admin/User/deleteUserinfo',array('userid' => $vo[id]));?>">删除</td>
				</tr><?php endforeach; endif; ?>
			</table>
			<div class="page">
			<?php echo ($page); ?>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div id="footer">
	This is liudawa
</div>
</body>
</html>