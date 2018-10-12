<?php
	$index=$_GET['index'];
	$query="select * from expert where id=$index";
	$result=$db->query($query);
	$row=$result->fetch_assoc();
	if($row['state']!=1) { echo "<h3><span class='label label-danger'>连接过期！请刷新页面</span></h3>"; exit();}//专家重进入
	$category_f=$row['form_category'];
	$id_f=$row['id_f'];
	switch ($category_f)
	{
		case 1:include "check_mo1.php";break;//膜初审
		case 2:include "check_mo2.php";break;//膜复审
		case 3:include "mcheck_wang1.php";break;//网格初审
		case 4:include "mcheck_wang2.php";break;//网格复审
		case 5:include "expert_checkpm.php";break;//企业膜经理
		default:break;
	}

?>
