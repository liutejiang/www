<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理 - 易买网</title>
<link type="text/css" rel="stylesheet" href="/dawashop/Public/css/style.css" />
<script type="text/javascript">
function checkUserName(obj){
	var username = obj;
	var checkusernameResult = document.getElementById("checkusernameResult");
	if(username.trim().length == 0){
		checkusernameResult.innerHTML = "用户名不能为空";
	}else if(username.trim()!=){
		
		}
	}else{
		checkusernameResult.innerHTML = "";
	}
	function checkPw(obj){
		var password = obj;
		var checkpwResult = document.getElementById("checkpwResult");
		if(password.trim().length == 0){
			checkpwResult.innerHTML = "密码不能为空";
		}else{
			checkpwResult.innerHTML = "";
		}
	}
	function checkName(obj){
		var name = obj;
		var checknameResult = document.getElementById("checknameResult");
		if(name.trim().length == 0){
			checknameResult.innerHTML = "名字不能为空";
		}else{
			checknameResult.innerHTML = "";
		}
	}
	function checkTel(obj){
		var tel = obj;
		var checktelResult = document.getElementById("checktelResult");
		if(tel.trim().length == 0){
			checktelResult.innerHTML = "电话不能为空";
		}else{
			checktelResult.innerHTML = "";
		}
	}
	function checkAddress(obj){
		var address = obj;
		var checkaddressResult = document.getElementById("checkaddressResult");
		if(address.trim().length == 0){
			checkaddressResult.innerHTML = "地址不能为空";
		}else{
			checkaddressResult.innerHTML = "";
		}
	}
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
		<h2>新增用户</h2>
		<div class="manage">
			<form action="/dawashop/admin.php/Admin/User/getdata"  enctype="multipart/form-data" method="post">
				<table class="form">
					<tr>
						<td class="field">用户名：</td>
						<td><input type="text" class="text" name="userName" value="" onblur="checkUserName(this.value)" /></td>
					    <td><span id="checkusernameResult" style="color:red"></span></td>
					</tr>
					<tr>
						<td class="field">姓名：</td>
						<td><input type="text" class="text" name="name" value="" onblur="checkName(this.value)" /></td>
					    <td><span id="checknameResult" style="color:red"></span></td>
					</tr>
					<tr>
						<td class="field">密码：</td>
						<td><input type="password" class="text" name="passWord" value="" onblur="checkPw(this.value)"/></td>
						<td><span id="checkpwResult" style="color:red"></span></td>
						</tr>
					<tr>
						<td class="field">性别：</td>
						<td><input type="radio" name="sex" value="1" checked="checked" />男 <input type="radio" name="sex" value="2" />女</td>
					    
					</tr>
					<tr>
						<td class="field">邮箱：</td>
						<td><input type="text" class="text" name="email" value=""></input></td>
					</tr>
					<tr>
						<td class="field">手机号码：</td>
						<td><input type="text" class="text" name="mobile" value="" onblur="checkTel(this.value)"/></td>
					    <td><span id="checktelResult" style="color:red"></span></td>
					</tr>
					<tr>
						<td class="field">送货地址：</td>
						<td><input type="text" class="text" name="address" value="" onblur="checkAddress(this.value)"/></td>
					    <td><span id="checkaddressResult" style="color:red"></span></td>
					</tr>
					<tr>
						<td class="field">头像：</td>
						<td><input type="file" name="photo"></input></td>
					</tr>
					<tr>
						<td></td>
						<td><label class="ui-blue"><input type="submit" name="submit" value="添加" /></label></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div id="footer">
	Copyright &copy; 2010 北大青鸟 All Rights Reserved. 京ICP证1000001号
</div>
</body>
</html>