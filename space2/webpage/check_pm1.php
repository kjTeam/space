<?php
include_once '../index/include/function.php' //3月1日更改
?>
<?php
//这是客户查看企业膜经理培训班申请的页面
define('ROOT',dirname(__FILE__));
$query="select * from pm1 where id_p=$id";
$result=$db->query($query);
$num_results=$result->num_rows;
$row=$result->fetch_assoc(); 
$upfile=ROOT."/pm1//$id.jpg";
$state=$row['state'];
if($_POST['send2']=='yes')
{
  $query = "update pm1 set state='3' where id_p=$id";
  $result=$db->query($query);
		if($result)
	{
		echo"<script language=javascript>alert('提交成功');</script>";
		
	   $query3="select name,email from user where category = 5";//3月1号改
       $result3=$db->query($query3);
	   $num_results3=$result3->num_rows;
	   for($i=1;$i<=$num_results3;$i++)
		{
         $row3=$result3->fetch_assoc(); 
		 $PD[$i]=$row3['name'];
		 $DF[$i]=$row3['email'];
		}
         $name2=$row['c1'];
		 $body=$name2."已经确认收到您的反馈文件，请及时处理";
		 sendMail($PD,$DF,"空间结构分会-膜经理培训班报名情况通知",$body, $num_results3);
		echo"
		<script language=javascript>location.href='http://www.cnass.org/space2/index.php?nav1=61&nav2=56';</script>";
		}

}
if($num_results)	
{
	
	switch ($row['state'])
	{  
		case 0: echo "<h3><span class='label label-info text-center noprint'>您未通过报名审核     </span></h3>";     break;
			case 1: echo "<h3><span class='label label-info text-center noprint'>审核中</span></h3>"; break;
			case 2:	echo "<h3><span class='label label-info text-center noprint'>管理员同意培训</span></h3>";break;
			case 3:	echo "<h3><span class='label label-info text-center noprint'>您已确认</span></h3>";break;
			case 4:	echo "<h3><span class='label label-info text-center noprint'>未通过培训</span></h3>";break;
			case 5:	echo "<h3><span class='label label-info text-center noprint'>已通过培训</span></h3>";break;
			default:break;
	}
}
else
		{
			echo "<h3><span class='label label-info'>尚未提交申请表！</span></h3>"; //没有提交则退出
			exit();
		}
		if($state>=2)
		{
		echo"
<div class='container-fluid noprint' style='margin-top:30px'>
<form enctype='multipart/form-data' action='' method='post'>
  <table class='table table-bordered text-center table-responsive'>
  <tr>
  <td colspan='1' rowspan='2'>管理员反馈意见</td>
  <td colspan='4'>".$row['info']."</td></tr>
  <tr><td colspan='4'><a href='webpage/pm_inform/".$row['id_p'].".doc'/>查看通知文件</a>【备注】查看相关通知无误后，请点击确认按钮）
  <input type='hidden' value='yes' name='send2'> 
  ";
		
  if($state==2)
	{
	  echo"
			<div style='float: right'> <button type='submit' class='btn btn-md btn-primary noprint'>确认</button>
    <br> <br>
	</div>";
	}
	echo"
</td></tr>
  </table></form></div>  
  
  ";}
		$r=1;
		$t=$id;
		include_once"print_pm.php";
	

?>