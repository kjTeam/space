<?php
$query="select * from pm1 where id_p=$id";
$result=$db->query($query);
$num_results=$result->num_rows;
$row=$result->fetch_assoc(); 
$state2=$row['state2'];
			
if($num_results)	
{
	
	switch ($state2)//之前设定要是通过培训才能申请，现在两个同时开放。
	{  
		
			
             case 1: 	//已提交
			 case 2:
		      case 3://给专家打分
			 echo "<h3><span class='label label-info text-center noprint'>审核中</span></h3>";break;
           case 4://通过审核
		   echo "<h3><div class='label label-info text-center'>您已通过审核,级别：".$row['result'].",证书编号：".$row['number']."</div></h3>";break;
            case 5: //未通过审核
				echo "<h3><span class='label label-info text-center noprint'>您未通过审核，请联系管理员</span></h3>";break;
			
			//case 4:	echo "<h4><span class='label label-warning text-center'>本次提交将覆盖之前数据</span></h4>";$flag=1;break; //这里的flag用于标记是否在表单里做flag标记，用于在提交时删除现有表单。
			default:break;
	}
}
else
		{
			echo "<h3><span class='label label-info'>尚未提交申请表！</span></h3>"; //没有提交则退出
			exit();
		}

        $r=2;
		$t=$id;
		include_once"print_pm.php";

		

?>