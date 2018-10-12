<?php
session_start();
	include_once "lib.php";
$db=create_database();
  if($_POST['addsend']=='yes')
  {
	 $uid=$_POST['uid'];
	 $tel=$_POST['tel'];
	 $eamil=$_POST['email'];
	 $name=$_POST['name'];
	 $category=$_POST['category'];
	 $password=$_POST['password'];
	 /*$query="select from user where uid='$uid'";
    $result=$db->query($query);
	$num_results1=$result->num_rows;
	if($num_results1!==0)
		echo"<script lanuage='javasript'>alert('已存在相同的用户名');location.href='index1.html';</script>";*/
	 $query2="insert into user (uid,tel,email,name,category,psw) values ('$uid','$tel'
	 ,'$eamil','$name','$category','$password')";
	 $result2=$db->query($query2);
	 if($result2)
		 echo"<script lanuage='javasript'>alert('插入成功');location.href='index1.html';</script>";
	 else
		 echo $query2;


  }
 
$query="select * from user";
$result=$db->query($query);
$num_results=$result->num_rows;
$data=array();
class User
{
public $id;
public $uid;
public $name;
public $category;
}
for($i=0;$i<$num_results;$i++)
{
$row=$result->fetch_assoc();
$user=new User();
$user->id = $row["id"];
$user->uid = $row["uid"];
$user->name = $row["name"];
$user->category = $row["category"];
$data[$i]=$user;
}
$json=json_encode($data);
echo $json;
?>