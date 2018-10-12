<?php
		//这里判断是否可以get到index，如果获得，说明这是管理员发来的消息，改变的id是别人的
		if(isset($_GET['index']))
		{
			$id_index=$_GET['index'];
		}
		else
		{
			$id_index=$id;  //这个还是用户的id，这里修改时小心，不要让管理员误把自己的用户名密码改了
		}
		$db=create_database();
		$query="select * from user where id=$id_index"; //下面都是为了获得分类
		$result=$db->query($query);
		$row=$result->fetch_assoc();
		$name=$row['name'];
		$tel=$row['tel'];
		$psw=$row['psw'];
		$email=$row['email'];
		$uid=$row['uid'];

		if($_POST['change']=='yes')
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
				$query="select * from user where id='$id_index'";
				$result=$db->query($query);
			
					$query="update user set name='$name',tel='$tel',psw='$psw',email='$email',uid='$uid' where id=$id_index";
					$result=$db->query($query);
					if($result)
				{
					$flag=1;//修改成功！
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
		switch ($flag)
		{
			case 1: echo "<h3><span class='label label-success'>修改成功！</span></h3>";break;
			case 2: echo "<h3><span class='label label-danger'>用户名占用!</span></h3>";break;
			case 3: echo "<h3><span class='label label-danger'>密码需相同!</span></h3>";break;
			default:break;
		}
	
if($_POST['delete']=='yes')
{
	$query="delete from user where id='$id_index'";
	$result=$db->query($query);
	if($result)
	{ 
		echo"<h3><span class='label label-success'>删除成功！</span></h3>";
	}
else
	{

echo"<h3><span class='label label-danger'>出现问题，请联系管理员</span></h3>";
}
exit();
}
		

echo "
<div class='container-fluid'>
<form class='form-signin' action='' method='post'  style='margin-top:10px;'>
<table class='table table-bordered table-responsive text-center'>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>用户资料</lead></th>
        </tr>
        <tr>
            <td colspan='2'> 用户名</td>
            <td colspan='10'> <input type='text' id='uid' name='uid' class='form-control' value='$uid' ></td>
        </tr>
		<tr>
            <td colspan='2'> 密码</td>
            <td colspan='10'> <input type='password' id='psw1'  name='psw1' class='form-control' value='$psw'></td>
        </tr>
		<tr>
            <td colspan='2'> 重复密码</td>
            <td colspan='10'> <input type='password' id='psw2' name='psw2' class='form-control' value='$psw'></td>
        </tr>
		<tr>
            <td colspan='2'> 邮箱</td>
            <td colspan='10'> <input type='text' id='email' name='email' class='form-control' value='$email'></td>
        </tr>
		<tr>
            <td colspan='2'> 真实姓名</td>
            <td colspan='10'> <input type='text' id='name' name='name' class='form-control' value='$name'></td>
        </tr>
		<tr>
            <td colspan='2'> 电话</td>
            <td colspan='10'> <input type='text' id='tel' name='tel' class='form-control' value='$tel'></td>
        </tr>
		
</table>

";

		echo"
	<div style='position:absolute;left:85%;margin-bottom:10px' class='col-md-1 hidden-xs'>
	<input type='hidden' value='yes' name='change'>
		<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
	</div>
	<div style='position:absolute;left:65%;margin-bottom:10px' class='col-md-1 visible-xs'>
	<input type='hidden' value='yes' name='change'>
		<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
	</div>
	</form></div>";
	if(isset($_GET['index']))
		{
			echo"
			<form action='' method='post'>
			<div style='position:absolute;left:70%;margin-bottom:10px'class='col-md-1 hidden-xs'>
	<input type='hidden' value='yes' name='delete'>
		<button type='submit' class='btn btn-md btn-danger'>&nbsp;&nbsp; 删除 &nbsp; &nbsp;</button>
	</div>
	<div style='position:absolute;left:35%;margin-bottom:10px'class='col-md-1 visible-xs'>
	<input type='hidden' value='yes' name='delete'>
		<button type='submit' class='btn btn-md btn-danger'>&nbsp;&nbsp; 删除 &nbsp; &nbsp;</button>
	</div>
			</form></div>";
		}
?>