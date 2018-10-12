<?php include_once '../index/include/function.php' ?>
<?php
define('ROOT',dirname(__FILE__));
$index=$_GET['index'];
 $query="select * from pm1 where id=$index";
				$result=$db->query($query);
				$row=$result->fetch_assoc(); 
				$state2=$row['state2'];
				$id_pm=$row['id_p'];//这是企业膜经理的id
				

		  if($_POST['send3']=='yes')//专家反馈意见后，管理员选择是否成为膜经理，4为同意，5为不同意
		  {
		    $state=$_POST['state'];
			$result=$_POST['result'];
			$number=$_POST['number'];
		    switch($state)
			  {
              case 4:$body="您已成为项目膜经理，具体信息请前往网站查看";break;
			  case 5:$body="很抱歉您没有通过膜经理的申请，具体信息请前往网站查看";break;
			  default:break;
			  }
		  $query="update pm1 set state2='$state', result='$result', number='$number' where id=$index";
		  $result=$db->query($query);
		  if($result)
			  {
		        echo"<script language=javascript>alert('操作成功！');</script>";
                 $query3="select name,email from user where id = $id_pm";
                 $result3=$db->query($query3);
                 $row3=$result3->fetch_assoc(); 
		         $PD['1']=$row3['name'];
		         $DF['1']=$row3['email'];
                 sendMail($PD,$DF,"空间结构分会-企业膜经理报名情况反馈通知",$body,1);
		        //echo"<script language=javascript>location.href='http://www.cnass.org/space2/index.php?nav1=10';</script>";
		     }
		  else{
		  
		   echo"<script language=javascript>alert('操作失败，请联系后台管理员！');</script>";
		  }
		  }
				if($_POST['send2']=='yes')//管理员分配转接提交
				{
				$experts=$_POST['experts'];
		         $name=$row['c1'];
		     if(count($experts)!=0)
		{
			for($i=0;$i<count($experts);$i++)
			{
				$query="insert into expert (id_p,id_f,form_category,state,name) values (".$experts[$i].",$index,5,1,'$name')"; //注意这个表名没有s,id_p和之前的id_p不一样，是指专家的id,id_f是指pm中的id
				$db->query($query);
				$query="select name,email from user where id='$experts[$i]'";
				$result3=$db->query($query);
				$row3=$result3->fetch_assoc(); 
				$PD[$i+1]=$row3['name'];
		        $DF[$i+1]=$row3['email'];
			}
			//发送邮箱，先获取专家的id,然后通过专家的id,查找到专家的姓名和邮箱依次放入数组中，获取到投递企业的姓名，放入body.
           $body="管理员向您投递了企业膜经理申请表，申请人姓名:".$name;
			$body=$body."。请及时查看。";
			$query="update pm1 set state2=2 where id=$index";
			$db->query($query);
			echo "<script language=javascript>alert('分配成功！');</script>";
			 sendMail($PD,$DF,"空间结构分会-企业膜经理申请情况通知",$body, count($experts));	
			echo "<script language=javascript> location.href='http://www.cnass.org/space2/index.php?nav1=10';</script>'";
		}
		else
		{
			echo "<script language=javascript>alert('请选择专家！');</script>";
			exit();
		}
	}
				
    $r=2;
    $t=$id_pm;
	include_once"print_pm.php";					
echo"
<div class='container-fluid'>
<form enctype='multipart/form-data' action='' method='post'>
<table class='table table-bordered text-center table-responsive'>
";

if($state2==1)
		{
	echo"
<select  name='experts[]' class='selectpicker show-tick form-control' multiple data-live-search='true' noneSelectedText='选择专家'>";
											
			//这里展开专家列表，这种格式：<option value='专家的id'> 专家的name</option >
			$query="select id,name from user where category=3";
			$db->query($query);
			$result=$db->query($query);
			$num_results=$result->num_rows;
			for($i=0;$i<$num_results;$i++)
			{
				$row1=$result->fetch_assoc(); 
				echo "<option value='".$row1['id']."'> ".$row1['name']."</option >"; //这里使用row1 ，因为下面有一个隐藏表单项还要用到row
			}

			 echo " </select> 
			 <input type='hidden' value='yes' name='send2'>	
			 <input type='hidden' value='".$row['c1']."' name='name'>";

}
if($state2>=2)

		{
print_experts($index,5);
echo"
<table class='table table-bordered text-center table-responsive'>
<tr><td colspan='2'><strong>管理员意见</strong></td></tr>
<tr><td colspan='2'>
<select class='form-control noprint' data-style='btn-primary' name='state'>
							<option value='4'> 通过审核,同意成为项目经理</option>
							<option value='5'> 未通过审核</option>
</select>
</td></tr>
<tr><td>请输入审评结果</td><td> <input type='text' class='form-control' name='result' value='".$row['result']."'></td></tr>
<tr><td>请输入证书编号</td><td> <input type='text' class='form-control' name='number' value='".$row['number']."'></td></tr>
<input type='hidden' value='yes' name='send3'>				
	</table>				
					";

}

echo"</table>
<div style='float: right; margin-top:10px'> <button type='submit' class='btn btn-md btn-primary noprint'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div>
  </form></div>
";			
				
							
				
?>