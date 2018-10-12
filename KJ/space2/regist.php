<?php
	session_start();
	include_once 'lib.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>空间结构分会</title>
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="bootstrap-3.3.5-dist/bootstrap.min.css">
<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap-theme.min.css">
<script src="jquery-3.0.0.min.js"></script>
<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
</head>
  <body style='background-image:url(loginbeijing2.png);'>
	<?php		//这段php用于接收表单提交数据
		if($_POST['regist']=='0')  //说明是登录表单
		{
			$uid=$_POST['input'];
			$psw=$_POST['psw'];
			$db=create_database();
			$query="select * from user where uid='$uid' and psw='$psw'"; //查找用户是否存在
			$result=$db->query($query);
			$num_results=$result->num_rows;
			if($num_results!=0) //用户是存在的
			{
				$row=$result->fetch_assoc();
				$_SESSION['id']=$row['id'];
				$_SESSION['username']=$row['uid'];
			//用户id放入session
				jump_to('index.php');
			}
			else
			{
				$flag=1; //用于显示notice
			}
		}
		else if($_POST['regist']=='1') //说明是注册表单
		{
			$uid=$_POST['uid'];
			$psw=$_POST['psw1'];
			$psw2=$_POST['psw2'];
			if($psw==$psw2) //判断两个密码是否相同
			{
				$email=$_POST['email'];
				$name=$_POST['name'];
				$tel=$_POST['tel'];
				$db=create_database();
				$query="select * from user where uid='$uid' ";
				$result=$db->query($query);
				$num_results=$result->num_rows;
				if($num_results==0) //检查是否重名
				{
					$query="insert into user (name,tel,category,psw,email,uid) values ('$name','$tel',1,'$psw','$email','$uid')";
					$result=$db->query($query);
					$query="select * from user where uid='$uid' and psw='$psw'";
					$result=$db->query($query);
					$row=$result->fetch_assoc();
					$_SESSION['id']=$row['id'];
					$_SESSION['username']=$row['uid'];
					jump_to('index.php');
				}
				else
				{
					$flag=2;//用于显示notice
				}
			}
			else
			{
				$flag=3;
			}
		}

	?>
<div class='container-fluid hidden-xs hidden-sm'>
<div class='col-md-6 col-md-offset-3' style='margin-top:5%; border-radius:1em;-moz-border-radius:1em;-webkit-border-radius:1em;background-color:#fff; -moz-box-shadow:2px 2px 2px 2px rgba(40%,40%,20%,0.2);
-webkit-box-shadow:2px 2px 2px 2px rgba(40%,40%,20%,0.2);          
box-shadow:
            2px 2px 2px 2px 
             rgba(40%,40%,20%,0.2);'>
	<form class='form-horizontal' action='../index/register.php' method='post' >
	<h3><strong>请注册</strong></h3>
	<hr>
	<div style='padding: 1% 10%'>
  <div class="form-group">
    <label class="col-sm-2 control-label">用户名</label>
    <div class="col-sm-10">
      <input name='uid' class="form-control" placeholder="username">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="psw1" name='psw1' placeholder="Password">
    </div></div>
	 <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">重复密码</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="psw2" name='psw2' placeholder="Password">
    </div></div>
	<div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">邮箱</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name='email' placeholder="Email">
    </div></div>
	<div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">真实姓名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name='name' placeholder="Real Name ">
    </div></div>
	<div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">电话</label>
    <div class="col-sm-10">
      <input type="tellphone" class="form-control" id="tel" name='tel' placeholder="tellphone">
    </div></div>
	<div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">身份选择</label>
    <div class="col-sm-10">
      <select class='form-control' data-style='btn-primary' name='state' id='state'>
							<option value='1'> 企业用户</option>
							<option value='6'> 膜结构项目经理</option>
					</select>
    </div></div>

	<input type="hidden" id="regist" name='regist' value="1">
  <hr>
  <div class="form-group">
 <div style='float:right;'>
      <button type="submit" class="btn btn-md btn-danger">注册</button>
    </div>
	<div id='notice'>
		<p>
		<?php
				switch ($flag)
				{
				case 1: echo "<div style='float:right;color:red;font-size:14px'>用户名或密码不正确</div>";break;
				case 2: echo "<div style='float:right; color:red;font-size:14px'>用户名占用,请使用其他用户名</div>";break;
				case 3: echo "<div style='float:right; color:red;'>两次输入密码需相同</div>";break;
				default:break;
				}
		?>
		</p>
		</div>
  </div>
</form>
</div></div></div>
    <div class="container-fluid visible-xs visible-sm" style='background-image:url(loginbeijing3.png); height:600px;padding:1% 10%'>
	<div class='col-md-6 col-md-offset-3'>
		<form class="form-signin" action='../index/register.php'  method='post'>
        <h2 class="form-signin-heading" >请注册</h2>  	
		
		<div>
			<form class="form-signin" action='login.php' method='post'>
			<div style='margin-bottom:10px'>
				<input type="text" id="uid" name='uid' class="form-control" placeholder="用户名"></div>
				<div style='margin-bottom:10px'>
				<input type="password" id="psw1"  name='psw1' class="form-control" placeholder="密码"></div>
				<div style='margin-bottom:10px'>
				<input type="password" id="psw2" name='psw2' class="form-control" placeholder="重复密码"></div>
				<div style='margin-bottom:10px'>
				<input type="text" id="email" name='email' class="form-control" placeholder="邮箱"></div>
				<div style='margin-bottom:10px'>
				<input type="text" id="name" name='name' class="form-control" placeholder="真实姓名"></div>
				<div style='margin-bottom:10px'>
				<input type="text" id="tel" name='tel' class="form-control" placeholder="电话"></div>
				<input type="hidden" id="regist" name='regist' value="1">
				<div style='margin-bottom:10px'>
                 <select class='form-control' data-style='btn-primary' name='state' id='state'>
							<option value='1'> 企业用户</option>
							<option value='6'> 膜结构项目经理</option>
					</select>
    </div>
				<button class="btn btn-lg btn-danger btn-block" type="submit" style='height:35px;padding-top:5px;!import'>注册</button>
			</form>
		</div>
		<div id='notice'>
		<p>
		<?php
				switch ($flag)
				{
				case 1: echo "<div style='float:right;color:red;font-size:14px'>用户名或密码不正确</div>";break;
				case 2: echo "<div style='float:right; color:red;font-size:14px'>用户名占用,请使用其他用户名</div>";break;
				case 3: echo "<div style='float:right; color:red;'>两次输入密码需相同</div>";break;
				default:break;
				}
		?>
		</p>
		</div></div>
		</div>
	</div> 
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
  </body>
</html>
