<?php
	session_start();
	include_once 'lib.php';	//这段php用于接收表单提交数据
		if($_GET['regist']=='0')  //说明是登录表单
		{			
			$uid=$_GET['input'];
			$psw=$_GET['psw'];
			$category1=$_GET['category1'];
			$db=create_database();
			$query="select * from user where email='$uid' and psw='$psw' and category like '%".$category1."%'"; //查找用户是否存在
			$result=$db->query($query);
			$num_results=$result->num_rows;
			if($num_results!=0) //用户是存在的
			{   
				$row=$result->fetch_assoc();
				$_SESSION['id']=$row['id'];
				$_SESSION['username']=$row['name'];
				$_SESSION['category']=$category1;
				$_SESSION['danwei']=$row['danwei'];
				setcookie('user_name', $row['name'],time()+9999999,'/');
				setcookie('user_password', $row['psw'],time()+9999999,'/');
				$flag=0;
			}
			else
			{
				$flag=1; //用于显示notice
			}
		}
		else if($_GET['regist']=='1') //说明是注册表单
		{
			$email=$_GET['email'];
			$pswR=$_GET['psw'];
			$user=$_GET['user'];
			$tel=$_GET['tel'];
			$unit=$_GET['unit'];
			$db=create_database();
			$query="select * from user where email='$email' ";
			$result=$db->query($query);
			$num_results=$result->num_rows;
			if($num_results==0) //检查是否重名
			{
				$query="insert into user (email,tel,category,psw,name,unit) values ('$email','$tel',1,'$pswR','$user','$unit')";
				$result=$db->query($query);
				$query="select * from user where email='$email'";
				$result=$db->query($query);
				$row=$result->fetch_assoc();
				$_SESSION['id']=$row['id'];
				$_SESSION['username']=$row['name'];
				$_SESSION['category']=$row['category'];
				setcookie('user_name', $row['name'],time()+9999999,'/');
				setcookie('user_password', $row['psw'],time()+9999999,'/');
				$flag=2;
					// jump_to('index.php');
			}else{
				$flag=3;
			}
		}
		    echo $flag;
		?>
