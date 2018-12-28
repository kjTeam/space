
<?php
error_reporting(0);
session_start();
date();
include_once "lib.php";
$db=create_database();
$id=$_SESSION['id'];
//form_category = '0'表示是入会申请表
$query = "select * from join_form where state='5'";
$result1=$db->query($query);
$num_results1=$result1->num_rows;
		
//查询投递给理事会的企业，result1不要改动。

				//如果理事会投递给管理员
if($_POST['send']=='yes')
{
	for($i=1;$i<=$num_results1;$i++)
		{
		$row3=$result1->fetch_assoc(); 
			$str="p".$i;
			$PA[$i]=$_POST[$str];
			$PA[$i]=addslashes($PA[$i]);
			$str1="info".$i;
			$INFO[$i]=$_POST[$str1];
			$INFO[$i]=addslashes($INFO[$i]);
			//如果该纪录就插入，如果有的话执行更新命令
			$queryCheckRepeat = "select * from director where  id_f = '".$row3['id']."' and form_category = 0" ;
			$resulC = $db->query($queryCheckRepeat);
			$num_resultsC=$resulC->num_rows;
			if($num_resultsC==0){
				$query2 = "insert into director (id_f,result,form_category,info) values ('".$row3['id']."','".$PA[$i]."','0','".$INFO[$i]."')";
			}else{
				$query2 = "update director set result = '".$PA[$i]."',info = '".$INFO[$i]."' where  id_f = '".$row3['id']."' and form_category = 0";
			}
			$result2=$db->query($query2);
		}
				//将每个企业的join_form中的state更新为5,之前要判断是否所有的理事都评价完（之前是理事会评价完了管理员那里才能显示，后来要求只要有人评价就显示，所以这里麻烦了一些。）
	/*$query = "select * from user where category='4'";
		$result = $db->query($query);
		$num_results = $result->num_rows;
		$directornum = $num_results;//找出有多少理事
		$query = "select * from director where form_category='0' and id_f='".$row3['id']."'";
		$result = $db->query($query);
		$num_results = $result->num_rows;
		$companynum = $num_results;//找出有多少企业评价完
        $query3 = "update join_form set state='5' where id = '".$row3['id']."'"; 
        $result3=$db->query($query3);
		}
		使council_inform的state置为2，则理事会投递成功。理事界面将不出现该表格。
        if($companynum==$directornum)
	    {
         $query4 = "update council_inform set state='2' where form_category=0";
          $result4 = $db->query($query4);
     	}*/
      if($result2)
			echo "<script language=javascript>alertAtuoClose()</script>";
		else
			echo "<script language=javascript>alert('出现问题，请联系管理员')</script>";
  }
    $query = "select * from council_inform where form_category = '0' and state = '1'";
	$result = $db->query($query);
	$row=$result->fetch_assoc(); 
			if($num_results1==0)
			{
		    echo"<h3><span class='label label-warning'>管理员尚未投递</span></h3>";
            exit();
			}
echo"
<div class='container-fluid visible-lg'>
<form enctype='multipart/form-data' action='' method='post'>
<table class='table table-bordered table-responsive text-left' style='margin-top:1em;font-size:1.2em;'>
<tr><td colspan='7' class='noborder-table'style='font-family:仿宋;'><strong>各位常务理事：</strong></td></tr>
<script  type='text/javascript'> document.getElementById('txt1').readOnly=true;  </script> 
<tr><td colspan='31' class='noborder-table' style='font-family:仿宋'>
<strong><textarea class='form-control noborder-input' rows='8' id ='txt1' style='font-size:1em;resize: none;overflow:hidden;background-color:#fff;' disabled=true>
". $row['preface']."</textarea></strong></td>
</table>
	<div style='margin-top:3em'>
    <table class='table table-bordered table-responsive text-center' style='margin-top:2em;font-size:1em;'>
	<h3 class='text-center'style='line-height:8px'>中国钢结构协会空间结构分会</h3>
<h3 class='text-center' style='line-height:10px'>中国钢协空间结构分会入会单位审批名单</h3>
        <tr>
            <th style='text-align:center;'>序号</th>
			 <th style='text-align:center;width:10%'>单   位 </th>
			  <th style='text-align:center; width:5%'>代表人</th>
              <th style='text-align:center;'>成立时间（年月）</th>
              <th style='text-align:center;'>注册资金（万元）</th>
			  <th style='text-align:center;width:5%'>技术人员</th>
			  <th style='text-align:center;width:5%'>占地/建筑面积（m^2）</th>
          <th style='text-align:center;width:8%'>近三年产量（m^2）</th>
		   <th style='text-align:center;width:8%'>近三年产值（万元）</th>
		   	<th style='text-align:center;width:8%'>单位性质</th>
				<th style='text-align:center;'>状态</th>
				<th style='text-align:center;'>意见</th>
				<th style='text-align:center;'>意见</th>
        </tr>";
		$query = "select * from join_form where state='5'";
                $result1=$db->query($query);
				$num_results1=$result1->num_rows;
	//这里从join_form表中查找要投递给理事会的企业，这里和管理员的界面是一样的。
		   
				for($i=1;$i<=$num_results1;$i++)
					{
				$row2=$result1->fetch_assoc();
				$add1=$row2['c30']+$row2['c34']+$row2['c38'];
                $add2=$row2['c32']+$row2['c36']+$row2['c40'];
				$p="p".$i;
				$state="state".$i;//后面的管理员意见
				$info="info".$i;//带有意见的td
				$query="select * from director where id_p=$id and id_f=".$row2[id]." and form_category=0";
				$result=$db->query($query);
				$row5=$result->fetch_assoc(); 
				$ww=$row5['result']-1;
				$infoSingle = $row5['info'];
				echo"
				<tr>
            <td style='text-align:center;'>$i</td>
			 <td style='text-align:center;'>
			 ". $row2['c1']."</td>
			  <td style='text-align:center;'>
			   ". $row2['c7']." </td>
              <td style='text-align:center;'>
			  ". $row2['c19']." </td>
              <td style='text-align:center;'>". $row2['c23']." </td>
			  <td style='text-align:center;'>". $row2['c28']." </td>
			  <td style='text-align:center;'>". $row2['c21']." </td>
              <td style='text-align:center;'>$add1</td>
		      <td style='text-align:center;'>$add2</td>
		      <td style='text-align:center;'>". $row2['c3']."</td>
			  <td style='text-align:center;'>
			";
           if(($ww+1)!==0)
			   echo"<span class='badge' style='background:green'>已处理</span>";
			else
				echo"<span class='badge' style='background:red'>未处理</span>";
			
			echo"</td>
			<td style='text-align:center;width:10%' id='$state1'>
			
			<select class='form-control' data-style='btn-primary' name='$p' id='$state' onchange='changeState(this);'>
			<option value='1'> 同意</option>
			<option value='2'> 不同意</option>
					</select>
                       </td>
                    <td>
					<input class='form-control' name='$info' id='$info' placeholder='请您输入意见' value='$infoSingle'>
					<script  type='text/javascript'> document.getElementById('$state')[".$ww."].selected=true; </script>
              
					 </td>
					 
        </tr> ";
		}
		echo"</table></div>";
        $query3 = "select * from user where id = '$id'"; 
        $result3=$db->query($query3);
        $row3=$result3->fetch_assoc(); 				
		echo"
		<div class='row-fluid'>
		<div class='col-xs-3'>审批人:". $row3['name']."</div>
		<div  class='col-xs-3'>
		日期:".date('Y年n月d日')."
		</div></div>
        <div class='row-fluid'>
        <div class='col-xs-12'>备注：". $row['remark']."</div></div>
        <div style='text-align: right;margin-bottom: 2%'>
				<input type='hidden' value='yes' name='send'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 投递给管理员&nbsp; &nbsp;
				</button>
			</div>		
		</form>
		</div>
		

		<div class='container-fluid hidden-lg'>
		<form enctype='multipart/form-data' action='' method='post'>
<table class='table table-bordered table-responsive text-left' style='margin-top:1em;font-size:1em;'>
<tr><td colspan='7' class='noborder-table'style='font-family:仿宋;'><strong>各位常务理事：</strong></td></tr>
<script  type='text/javascript'> document.getElementById('txt1').readOnly=true;  </script> 
<tr><td colspan='31' class='noborder-table' style='font-family:仿宋'>
<strong><textarea class='form-control noborder-input' rows='20' id ='txt1' style='font-size:1em;resize: none;overflow:hidden;background-color:#fff;' disabled=true>
". $row['preface']."</textarea></strong></td>
</table>
<div style='margin-top:2em'>
<h4 class='text-center'style='line-height:15px'>中国钢结构协会空间结构分会</h4>
<h4 class='text-center' style='line-height:20px'>中国钢协空间结构分会入会单位审批名单</h4>";
$query = "select * from join_form where state='5'";
                $result1=$db->query($query);
for($i=1;$i<=$num_results1;$i++)
					{
						$row2=$result1->fetch_assoc();
				$add1=$row2['c30']+$row2['c34']+$row2['c38'];
                $add2=$row2['c32']+$row2['c36']+$row2['c40'];
				$p="p".$i;
				$state1="state1".$i;//后面的管理员意见
				$query="select * from director where id_p=$id and id_f=".$row2[id]." and form_category=0";
				$info="info".$i;
				$result=$db->query($query);
				$row5=$result->fetch_assoc(); 
				$ww=$row5['result']-1;
				$infoSingle=$row5['info'];
				echo"
    <table class='table table-bordered table-responsive text-center' style='margin-top:2em;font-size:0.8em;'>
      <tr><td colspan='12'>$i</td></tr>
	   <tr><td colspan='2'>单位</td>
	   <td colspan='10'>". $row2['c1']."</td></tr>
 <tr><td colspan='2'>代表人</td>
	   <td colspan='10'>". $row2['c7']."</td></tr>
	   <tr><td colspan='5'>成立时间（年月）</td>
	   <td colspan='7'>". $row2['c19']."</td></tr>
	    <tr><td colspan='5'>注册资金（万元）</td>
	   <td colspan='7'>". $row2['c23']."</td></tr>
	    <tr><td colspan='5'>技术人员</td>
	   <td colspan='7'>". $row2['c28']."</td></tr>
	   <tr><td colspan='5'>占地/建筑面积（m^2）</td>
	   <td colspan='7'>". $row2['c21']."</td></tr>
	    <tr><td colspan='5'>近三年产量（m^2）</td>
	   <td colspan='7'>". $row2['c21']."</td></tr>
	    <tr><td colspan='5'>近三年产值（万元）</td>
	   <td colspan='7'>". $row2['c21']."</td></tr>
	   <tr><td colspan='5'>单位性质</td>
	   <td colspan='7'>". $row2['c21']."</td></tr>
	   <tr><td colspan='5'>状态</td>
	   <td colspan='7'>";
	   if(($ww+1)!==0)
			   echo"<span class='badge' style='background:green'>已处理</span>";
			else
				echo"<span class='badge' style='background:red'>未处理</span>";
	   echo"</td></tr>
	     <tr><td colspan='2' rowspan='2'>意见</td>
		 <td colspan='10'><select class='form-control' data-style='btn-primary' name='$p' id='$state1' onchange='changeState(this);'>
			<option value='1'> 同意</option>
			<option value='2'> 不同意</option>
					</select>
					<script  type='text/javascript'> document.getElementById('$state1')[".$ww."].selected=true; </script></td></tr>
					<tr><td colspan='10'><input class='form-control' name='$info' id='$info' placeholder='请您输入意见' value='$infoSingle'></td></tr>
		
		";}
		$query3 = "select * from user where id = '$id'"; 
        $result3=$db->query($query3);
        $row3=$result3->fetch_assoc(); 				
		echo"
<tr>
<td colspan='12' class='noborder-table text-left'>审批人：". $row3['name']."</td></tr>
<tr>
<td colspan='12' class='noborder-table text-left'> 
日期：".date('Y年n月d日')."</td>
</tr>
<tr><td colspan='12'class='noborder-table text-left'>备注：". $row['remark']."</td>
</tr>
        </table></div>
<div style='text-align: right;margin-bottom: 2%'>
				<input type='hidden' value='yes' name='send'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 投递给管理员&nbsp; &nbsp;
				</button>
			</div>		

					";
					
	echo"</div></form></div>"
		?>