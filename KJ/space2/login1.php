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
<script type="text/javascript">
	function regist()
	{
		$("#register").toggle(); 
	}
</script>
</head>
  <body style='background-image:url(loginbeijing2.png);background-repeat:norepeat'>
	
<div class='container-fluid hidden-xs hidden-sm'>
<div class='col-md-6 col-md-offset-3' style='margin-top:10%; border-radius:1em;-moz-border-radius:1em;-webkit-border-radius:1em;background-color:#fff; -moz-box-shadow:2px 2px 2px 2px rgba(40%,40%,20%,0.2);
-webkit-box-shadow:2px 2px 2px 2px rgba(40%,40%,20%,0.2);          
box-shadow:
            2px 2px 2px 2px 
             rgba(40%,40%,20%,0.2);'>
	<form class='form-horizontal' action='login1.php' method='post' >
	<h3 style='padding: 0 10%'><strong>请登录</strong></h3>
	<hr>
	<div style='padding: 3% 10%'>
  <div class="form-group">
    <label class="col-sm-3 control-label">用户名</label>
    <div class="col-sm-9">
      <input name='input'class="form-control" placeholder="username">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">密码</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="inputPassword3" name='psw' placeholder="Password">
    </div></div>
	 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">请选择您的身份</label>
    <div class="col-sm-9">
      <select class="form-control" data-style="btn-primary" name="category1" id='category1'>
      <option value="1" >企业用户</option>
      <option value="2" >秘书处用户</option>
      <option value="3" >专家用户</option>
      <option value="4" >理事会用户</option>
      <option value="5" >管理员用户</option>
      <option value="6" >企业膜经理</option>
      </select>
    </div></div>
	<input type="hidden" id="regist" name='regist' value="0">
  <hr>
  <div class="form-group">
 <div style='float:right'>
      <button type="submit" class="btn btn-md btn-danger">登&nbsp 陆</button>
    </div>
	<?php		//这段php用于接收表单提交数据
		if($_POST['regist']=='0')  //说明是登录表单
		{
			$uid=$_POST['input'];
			$psw=$_POST['psw'];
			$select_category=$_POST['category1'];//这是用户选择，从表单里传过来的用户分类。
			$db=create_database();
			$query="select * from user where uid='$uid' and psw='$psw'"; //查找用户是否存在
			$result=$db->query($query);
			$num_results=$result->num_rows;
			if($num_results!=0) //用户是存在的
			{
				$row=$result->fetch_assoc();
				$user_category=explode(',',$row['category']);
                $num=sizeof($user_category);
				$i=0;
				do
				{
           if($user_category[$i]!==$select_category)
					{
					 $i++;
					}
					else {
						break;
					}
				}while($i<$num);
				if($i==($num))
					{
            echo"<script language='javascript'>alert('您选择的用户类型不匹配');location.href='';</script>";
					}
				$_SESSION['id']=$row['id'];
				$_SESSION['username']=$row['uid'];
				$_SESSION['category']=$select_category;
				setcookie('user_name', $uid,time()+9999999,'/');
				setcookie('user_password', $psw,time()+9999999,'/');
			//用户id放入session
				jump_to('index.php');
			}
			else
			{
				echo"<div style='float:right;color:red;'>用户名或密码不正确</div>"; //用于显示notice
			}
		}


	?>
  </div>
</form>
</div></div></div>
    <div class="container-fluid visible-xs visible-sm">
	<div class='col-md-6 col-md-offset-3'>
		<form class="form-signin" action='login1.php' method='post'>
        <h2 class="form-signin-heading" >请登录</h2>  
		<div style='margin-bottom:10px'>
        <input type="text" id="input" name='input' class="form-control" placeholder="用户名">   
		</div>
		<div style='margin-bottom:10px'>
        <input type="password" id="psw" name='psw' class="form-control" placeholder="密码">
		</div>
		<div style='margin-bottom:10px'>
      <select class="form-control" data-style="btn-primary" name="category1" id='category1'>
      <option value="1" >企业用户</option>
      <option value="2" >秘书处用户</option>
      <option value="3" >专家用户</option>
      <option value="4" >理事会用户</option>
      <option value="5" >管理员用户</option>
      <option value="6" >企业膜经理</option>
      </select>
    </div>
		<div style='margin-bottom:10px'>
		<input type="hidden" id="regist" name='regist' value="0">
		<button class="btn btn-lg btn-danger btn-block" style='height:35px;padding-top:5px;!import'type="submit">登  录</button>
		</div>
		</form>
		</div>
		</div>
		
			
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
  </body>
</html>
