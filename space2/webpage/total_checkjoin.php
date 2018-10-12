<?php


$index=$_GET['index'];
if($index=='-2')
$t=8;
if($index=='-3')
$t=9;
$query="select * from join_form where state = '$t'";
$result=$db->query($query);
$num_results=$result->num_rows;
if($_POST['send']=='yes')
{
 for($i=0;$i<$num_results;$i++)
	{
	$str="state".$i;
    $str1="companyid".$i;
	$PA[$i]=$_POST[$str];
	$PA[$i]=addslashes($PA[$i]);
	$PS[$i]=$_POST[$str1];
    $PS[$i]=addslashes($PS[$i]);
	 $query1 = "update join_form set state=".$PA[$i]." where id=".$PS[$i]."";
	 $result1=$db->query($query1);
	 if($result=null)
		{
		echo "<script language=javascript>alert('失败！');</script>";
	     exit();
		}
	}  
	echo"<script language=javascript>alert('改变成功！');</script>";
}
echo"
<script language='javascript'> 
    window.onload = function()
	{   
      var tab = document.getElementById('tab'); 
      for(var i=0;i<tab.rows.length;i++)
          tab.rows[i].bgColor = (i%2==0) ? '#f9f9f9' : '#fff' ; 
    } 
</script> 
";
$query="select * from join_form where state = '$t'";
if($_POST['check']=='yes')
{
  $checkname=$_POST['checkname']; 
   $query="select * from join_form where state = '$t' and c1 like  '%{$checkname}%'";
}
$result=$db->query($query);
$num_results=$result->num_rows;
echo"
   <div class='container-fluid' style='margin-top:21px'>
   <form enctype='multipart/form-data' action='' method='post' >
   <div class='col-xs-3' style='float:right;margin-bottom:10px'>
   <input type='text' name='checkname'> 
   <input type='hidden' name='check' value='yes'>
   <button type='submit' class='btn btn-success'>搜索</button></form></div>
	</div>
	<form enctype='multipart/form-data' action='' method='post' >
<table class='table table-responsive table-bordered text-center' id='tab'>
<tbody>
<tr>
<td colspan=''><strong>序号</strong></td>
<td colspan=''><strong>公司名称</strong></td>
<td colspan=''><strong>代表人</strong></td>
<td colspan=''><strong>联系人</strong></td>
<td colspan=''><strong>成立时间</strong></td>
<td colspan=''> </td>
</tr> ";
for($i=0;$i<$num_results;$i++)
{
	$state="state".$i;
	$companyid="companyid".$i;
	$row=$result->fetch_assoc();
	echo"<tr>
	 <td colspan=''>".($i+1)."</td>
         <td colspan=''>".$row['c1']."</td>
         <td colspan=''>".$row['c7']."</td>
         <td colspan=''>".$row['c12']."</td>
         <td colspan=''>".$row['c19']."</td>
		 <td colspan=''><select class='form-control' data-style='btn-primary' name='$state' id='$state'>
							<option value='1'> 提交待验证</option>
							<option value='2'> 投递给秘书处</option>
							<option value='3'> 秘书处意见反馈</option>
							<option value='4'> 投递给理事会</option>
							<option value='5'> 理事会意见反馈</option>
							<option value='6'> 等待缴费申请</option>
							<option value='7'> 缴费申请提交待审核</option>
							<option value='8' selected = selected> 已入会</option>
							<option value='9'> 未通过审核</option>
					</select></td>
        <input type='hidden' value='".$row['id']."' name='$companyid'>
         </tr>";
		 
}
echo"</tbody></table>
<div style='text-align: right;margin-top:2%;margin-bottom:2%;' class='noprint'>
				<input type='hidden' value='yes' name='send'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交&nbsp; &nbsp;
				</button>
			</div>
		</form>

</div>";


?>