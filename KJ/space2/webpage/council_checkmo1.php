<?php
error_reporting(0);
session_start();
date();
include_once "lib.php";
$db=create_database();
$id=$_SESSION['id'];
//form_category = '1'是膜结构 state = '1'表示管理员投递过来。
 //$query = "select * from council_inform where form_category = '1' and state = '1'";
		//$result = $db->query($query);
		//$num_results = $result->num_rows;
		//if($num_results==0)
			//{
		//echo"<h3><span class='label label-warning'>管理员尚未投递</span></h3>";
           // exit();
			//}
//查询投递给理事会的企业，result1不要改动。
                $query1 = "select * from mo1_chengbao where state='7'";
                $result1=$db->query($query1);
				$num_results1=$result1->num_rows;
				$query = "select * from mo1_zhuanxiang where state='7'";
				$result=$db->query($query);
				$num_results=$result->num_rows;
				if(($num_results1 + $num_results)==0)
			{
		    echo"<h3><span class='label label-warning'>管理员尚未投递</span></h3>";
            exit();
			}
				//如果理事会投递给管理员
if($_POST['send']=='yes')
{
	for($i=1;$i<=$num_results1;$i++)
		{
		    $row3=$result1->fetch_assoc(); 
			$str="p".$i;
			$PA[$i]=$_POST[$str];
			$PA[$i]=addslashes($PA[$i]);//需要问孙老师理事会的名字需要更改吗？
            $query2 = "replace into director (id_p,id_f,result,form_category) values ('".$id."' ,'".$row3['id']."','".$PA[$i]."','1')";
            $result2=$db->query($query2);
        }
        if($result)
			echo "<h3><span class='label label-success'>保存成功</span></h3>";
		else
			echo "<h3><span class='label label-danger'>出现问题，请联系管理员</span></h3>";
        exit();
  }
  $query = "select * from council_inform where form_category=1";
		$result = $db->query($query);
	$row=$result->fetch_assoc(); //council_inform这个表
echo"
<div class='container-fluid'>
<form enctype='multipart/form-data' action='' method='post'>
<table class='table table-bordered table-responsive text-left' style='margin-top:1em;font-size:1.2em;'>
<tr><td colspan='7' class='noborder-table'style='font-family:仿宋;'><strong>各位常务理事：</strong></td></tr>
<script  type='text/javascript'> document.getElementById('txt1').readOnly=true;  </script> 
<tr><td colspan='31' class='noborder-table' style='font-family:仿宋'>
<strong><textarea class='form-control noborder-input' rows='10' id ='txt1' style='font-size:1em;resize: none;overflow:hidden;background-color:#fff;' disabled=true>
". $row['preface']."</textarea></strong></td>
</table>
	<div style='margin-top:3em'>
    <table class='table table-bordered table-responsive text-center' style='margin-top:2em;font-size:1em;'>
	<h3 class='text-center'style='line-height:8px'>". $row['headline1']."</h3>
<h3 class='text-center' style='line-height:10px'>". $row['headline2']."</h3>
         <tr>
            <th colspan='1' style='text-align:center;'>序号</th>
			 <th colspan='6' style='text-align:center;width:14%'>单位名称</th>
			  <th colspan='6' style='text-align:center;'>申报等级</th>
              <th colspan='6' style='text-align:center;'>评审结果</th>
             <th colspan='3' style='text-align:center;'>意见</th>
        </tr>";
		//这里从mo1表中查找要投递给理事会的企业
           
				for($i=1;$i<=$num_results1;$i++)
					{
						$p="p".$i;
				$row2=$result1->fetch_assoc();
				$p="p".$i;
				$state="state".$i;//后面的管理员意见
				$query="select * from director where id_p=$id and id_f=".$row2[id]." and form_category=1";
				$result=$db->query($query);
				$row5=$result->fetch_assoc(); 
				$ww=$row5['result']-1;
				if($row2['c16']!=NULL&&$row2['c17']!=NULL)
					{
				echo" 
				<tr>
            <td colspan='1' rowspan='2' style='text-align:center;'>$i</td>
			 <td colspan='6' rowspan='2' style='text-align:center;'>
			 ". $row2['c1']."</td>
			 <td colspan='6'> ". $row2['c16']." </td>
			<td colspan='6'>". $row2['result1']."</td>
			 <td colspan='3' rowspan='2'>	
		<select class='form-control' data-style='btn-primary' name='$p' id='$state'>
			<option value='1'> 同意</option>
			<option value='2'> 不同意</option>
					</select> 
					<script  type='text/javascript'> document.getElementById('$state')[".$ww."].selected=true; </script>
					</td> </tr>
			  <tr><td colspan='6'>". $row2['c17']." </td> 
			 <td colspan='6'> ". $row2['result2']." </td></tr>
			
        ";
					}
				else
						{
          //这里有疑惑
		  echo" 
				<tr>
            <td colspan='1' style='text-align:center;'>$i</td>
			 <td colspan='6' style='text-align:center;'>
			 ". $row2['c1']."</td>
			 <td colspan='6'> ". $row2['c16']." </td>
			 <td colspan='6'> ". $row2['result1']." </td>
             <td colspan='3'> <select class='form-control' data-style='btn-primary' name='$p' id='$state'>
			<option value='1'> 同意</option>
			<option value='2'> 不同意</option>
					</select> <script  type='text/javascript'> document.getElementById('$state')[".$ww."].selected=true; </script></td> </tr>
        "; 
						}
		}

$query3 = "select * from user where id = '$id'"; 
$result3=$db->query($query3);
$row3=$result3->fetch_assoc(); 				
		echo"
<tr>
<td colspan='4' class='noborder-table'>审批人:</td>
<td colspan='6' class='noborder-table'>". $row3['name']."</td>

<td colspan='2' class='noborder-table'>日期：</td>
<td colspan='6' class='noborder-table'> 
".date('Y年n月d日')."</td>
</tr>
<tr>
<td colspan='4'class='noborder-table'>备注：</td>
<td colspan='27'class='noborder-table'>". $row['remark']."</td>
</tr>
        </table></div>
<div style='text-align: right;margin-bottom: 2%'>
				<input type='hidden' value='yes' name='send'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 投递给管理员&nbsp; &nbsp;
				</button>
			</div>		
		</form>
		</div>";
					
	
		?>