<?php include_once '../index/include/function.php' ?>
<?php
define('ROOT',dirname(__FILE__));
$query="select id_f,id_p,name from expert where id='$index'";
$result=$db->query($query);
$row=$result->fetch_assoc();
$idpm=$row['id_f'];//$idpm是pm1中的的id.
$id_p=$row['id_p'];//专家的id
$name=$row['name'];//企业膜经理的姓名
$query="select * from pm1 where id='$idpm'";
$result=$db->query($query);
$row=$result->fetch_assoc();
$id_pm=$row['id_p'];//$id_pm是user中的id;

if($_POST['send']=='yes')
{

		$info=$_POST['info'];
		$info=addslashes($info);
		$query="update expert set info='$info',state='2' where id=$index"; //注意这里变化的是expert表的state而不是form表的,id是expert的id  .                            
		$result=$db->query($query);
         $query1="update pm1 set state2=3 where id=$idpm";
			$db->query($query1);
		if($result)
	    { 
			echo"<script language=javascript>alert('提交成功');</script>";
             $query3="select name,email from user where category = 5";
             $result3=$db->query($query3);
	          $num_results3=$result3->num_rows;
	          for($i=1;$i<=$num_results3;$i++)
		          {
                    $row3=$result3->fetch_assoc(); 
		            $PD[$i]=$row3['name'];
		            $DF[$i]=$row3['email'];
	              }
              $query4="select name from user where id='$id_p'";
			  $result4=$db->query($query4);
               $row4=$result4->fetch_assoc(); 
		          $ename=$row4['name'];
		        $body="专家".$ename;
				 $body=$body."向您反馈了";
                 $body=$body.$name."的企业膜经理申请，请及时前往网站查看";
		        sendMail($PD,$DF,"空间结构分会-企业膜经理申请专家反馈通知",$body, $num_results3);	
		echo"<script language=javascript>location.href='http://www.cnass.org/space2/index.php?nav1=40;</script>";
		}
		else 
			{
			echo "<script language=javascript>alert('提交失败，请联系管理员');</script>";
		exit();
	}

}
 $r=2;
    $t=$id_pm;
	include_once"print_pm.php";		
echo"<div class='container-fluid'>
<form enctype='multipart/form-data' action='' method='post'>
<table class='table table-bordered text-center table-responsive'>
<tr>
<td>
<textarea type='text' class='form-control' rows='3' name='info'>请输入您的意见</textarea>
</td>
</tr>
<input type='hidden' value='yes' name='send'>
</table>
<div style='float: right; margin-top:10px'> <button type='submit' class='btn btn-md btn-primary noprint'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div></form></div>

";
?>