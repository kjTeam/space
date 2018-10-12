<?php
$c=$_GET['nav2'];
switch ($c)
{
	case 15:$category=1;$a='企业';break;
	case 16:$category=2;$a='秘书处';break;
	case 17:$category=3;$a='专家';break;
	case 18:$category=4;$a='理事会';break;
	default:break;
}
		if(isset($_POST['add']))
		{
			$uid=$_POST['uid'];
			$psw=$_POST['psw1'];
			$email=$_POST['email'];
			$name=$_POST['name'];
			$tel=$_POST['tel'];
			$category=$_POST['add'];
			$category=intval($category);
			$db=create_database();
			$query="select * from user where uid='$uid' ";
			$result=$db->query($query);
			$num_results=$result->num_rows;
			if($num_results==0) //检查是否重名
			{
				$query="insert into user (name,tel,category,psw,email,uid) values ('$name','$tel',$category,'$psw','$email','$uid')";
				$result=$db->query($query);
				$flag=1;//修改成功！
			}
			else
			{
				$flag=2;//用于显示notice
			}
		}

		switch ($flag)
		{
			case 1: echo "<h3><span class='label label-success'>修改成功！</span></h3>";break;
			case 2: echo "<h3><span class='label label-danger'>用户名占用!</span></h3>";break;
			default:break;
		}

echo "
<form class='form-signin' action='' method='post'>
<table class='table table-bordered table-responsive text-center'>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>增加 $a 用户</lead></th>
        </tr>
        <tr>
            <td colspan='2'> 用户名</td>
            <td colspan='10'> <input type='text' id='uid' name='uid' class='form-control' ></td>
        </tr>
		<tr>
            <td colspan='2'> 密码</td>
            <td colspan='10'> <input type='text' id='psw1'  name='psw1' class='form-control' value='123456'></td>
        </tr>
		<tr>
            <td colspan='2'> 邮箱</td>
            <td colspan='10'> <input type='text' id='email' name='email' class='form-control' ></td>
        </tr>
		<tr>
            <td colspan='2'> 真实姓名</td>
            <td colspan='10'> <input type='text' id='name' name='name' class='form-control' ></td>
        </tr>
		<tr>
            <td colspan='2'> 电话</td>
            <td colspan='10'> <input type='text' id='tel' name='tel' class='form-control' ></td>
        </tr>
		
</table>
	<div style='text-align: right;margin-bottom: 2%'>
	<input type='hidden' value='$category' name='add'>
		<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
	</div>
</form>";
?>