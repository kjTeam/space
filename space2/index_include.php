<?php
//这是在企业用户、膜经理用户、秘书处和管理员的PC端，在左侧没有点击的情况下显示的页面，显得更人性化。
session_start();
date_default_timezone_set("Asia/Shanghai");
$id=$_SESSION['id'];
$category=$_SESSION['category'];
$username=$_SESSION['username'];
$time=date('Y-m-d H:i:s');
$timeunix=strtotime($time);//当前日期的时间戳
$timeunix1=strtotime(date('Y-m-d 0:0:0'));//当前日期0点的时间戳
$timeunix2=strtotime(date('Y-m-d 12:0:0'));//当前日期12点的时间戳
$timeunix3=strtotime(date('Y-m-d 18:0:0'));//当前日期18点的时间戳
$timeunix4=strtotime(date('Y-m-d 24:0:0'));//当前日期24点的时间戳
switch($category)
{
	case 1:$url="index.php?nav1=3&nav2=9";break;
	case 6:$url="index.php?nav1=64&nav2=62";break;
	default:$url=null;
}
echo"
  <div class='container-fluid' style='margin-top:23px'>
  <div class='col-xs-10 col-xs-offset-1' style='border:1px solid #ddd;padding:2em'>";
  if(($timeunix>=$timeunix1) && ($timeunix<=$timeunix2))
     echo"<p><img src='sun.png'><strong>上午好，".$username."。";
       else if(($timeunix>=$timeunix2) && ($timeunix<=$timeunix3))
            echo"<p><img src='sun.png' class='img-respective'> $nbsp $nbsp<strong>下午好，".$username."。";
       else
             echo"<p><img src='moon.png' class='img-respective'>$nbsp $nbsp<strong>晚上好，".$username."。";
			 echo"欢迎进入空间结构分会用户服务系统,<span style='padding-left:5%'><a href='$url' >账号设置</a></span></strong></p><hr>
			 <p><img src='caozuo.png' class='img-respective'style='margin-right:10px'> 进行入会申请等操作，请点击业务办理->左侧工具栏</p>
			 <p><img src='check.png' class='img-respective'style='margin-right:10px'> 查看打印已经递交的申请表，请点击查看->左侧工具栏</p>
			 <hr>
             <p><img src='help.png' class='img-respective'style='margin-right:10px'> 如您对操作有疑问，请点击下载<a href=''>用户操作说明</a></p>
			 <hr>
			 
			 
			 ";


  echo" </div></div>";




?>