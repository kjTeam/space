<?php
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
		echo"<script language=javascript>alert('提交成功');location.href='http://www.cnass.org/space2/index.php?nav1=61&nav2=56';</script>";
		}
		else{
		
		echo"<script language=javascript>alert('提交失败，请联系管理员');</script>";
		}

}
if($_POST['changepm1']=='yes')
{
for($i=1;$i<24;$i++)
		{
			$str="p".$i;
			$PA[$i]=$_POST[$str];
			$PA[$i]=addslashes($PA[$i]);
		}
		$p23=$PA[23];
		$query="update pm1 set ";
		for($i=1;$i<24;$i++)
	{
			if($i==23)
	{
		$query=$query.'c'.$i."='".$PA[$i]."'";
		}
		else{
			$query=$query.'c'.$i."='".$PA[$i]."',";
		}
	}
		" where id=$id_index";
		$result1=$db->query($query);


if($_FILES['file1']['tmp_name']!='')
	{ 
		  unlink($upfile);
			move_uploaded_file($_FILES['file1']['tmp_name'],$upfile);  //移动该文件至指定目录
		}
		if($result1) 
		{
			echo "<script language=javascript>alert('保存成功');</script>";			
		}
		else{
			echo "<script language=javascript>alert('保存失败，请联系管理员');</script>";}
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
			case 5:
			case 6:
			case 7:
		    case 8:
			case 9:
			case 10:
				echo "<h3><span class='label label-info text-center noprint'>已通过培训</span></h3>";break;
			
			//case 4:	echo "<h4><span class='label label-warning text-center'>本次提交将覆盖之前数据</span></h4>";$flag=1;break; //这里的flag用于标记是否在表单里做flag标记，用于在提交时删除现有表单。
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
  <tr><td colspan='4'><a href='webpage/pm_inform/".$row['id'].".doc'/>查看通知文件</a>【备注】查看相关通知无误后，请点击确认按钮）</td></tr>
  </table>
  <input type='hidden' value='yes' name='send2'> 
  ";
		
  if($state==2)
	{
	  echo"
			<div style='float: right'> <button type='submit' class='btn btn-md btn-primary noprint'>&nbsp;&nbsp; 确认 &nbsp; &nbsp;</button>
    <br> <br>
	</div>";
	}
	echo"
</form></div>  
  
  ";}
		echo"
		<input id='btnPrint' class='noprint btn btn-info' type='button' value='打印' onclick='javascript:window.print();' style='font-weight:bold; text-decoration:none;cursor:pointer;float:right;!important; cursor:hand'/>
<div class='container-fluid hidden-xs'>
<form enctype='multipart/form-data' action='' method='post'>
    <h3 class='text-center'>中国钢结构协会空间结构分会</h3>
  <h3 class='text-center'>膜结构工程项目经理培训班报名表</h3>
  <table class='table table-bordered text-center table-responsive'>
            <tbody>
            <tr>
			<td colspan='1'>姓名</td>
            <td colspan='1'><input type='text' class='form-control input-mini' name='p1' value='".$row['c1']."'></td>
            <td colspan='1'>性别</td>
			 <td colspan='1'><input type='text' class='form-control' name='p2' value='".$row['c2']."'></td>
      <td colspan='1'>出生日期</td>
			 <td colspan='1'><input type='text' class='form-control' name='p3' value='".$row['c3']."'></td>
			 <td colspan='1' rowspan='6'>一寸照片上传处
			 <input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
			 <input type='file' class='form-control noprint' name='file1' id='file1' ><img style='width:100%' src='webpage/pm1//$id.jpg'/></td>
			</tr>
<tr>
			<td colspan='1'>专业</td>
            <td colspan='1'><input type='text' class='form-control' name='p4'value='".$row['c4']."'></td>
            <td colspan='1'>学位/学历</td>
			 <td colspan='1'><input type='text' class='form-control' name='p5'value='".$row['c5']."'></td>
      <td colspan='1'>毕业时间</td>
			 <td colspan='1'><input type='text' class='form-control' name='p6' value='".$row['c6']."'></td>
			</tr>
			<tr>
			<td colspan='1'>职称</td>
            <td colspan='5'><input type='text' class='form-control' name='p7'value='".$row['c7']."'></td>
           
			</tr>
			<tr>
			<td colspan='1'>现工作单位</td>
            <td colspan='3'>
			<select name='p8' id='p8' class='form-control' >";
			$query1="select id,c1 from join_form where state=8";
			$result1=$db->query($query1);
			$num_results1=$result1->num_rows;
			for($i=0;$i<$num_results1;$i++)
			{
				$row1=$result1->fetch_assoc(); 
				if($row1['c1']==$row['c8'])
				{
       echo"<option value='".$row1['c1']."'selected = 'selected'> ".$row1['c1']."</option >";
				}
				else{

				echo"<option value='".$row1['c1']."'> ".$row1['c1']."</option >
				";	
				}
			}
			 echo "  </select>
			  </td>
            <td colspan='1'>入职时间</td>
			 <td colspan='1'><input type='text' class='form-control' name='p9' value='".$row['c9']."'></td>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>膜结构工程从业年限</td>
            <td colspan='3' rowspan='2'><input type='text' class='form-control' name='p10' value='".$row['c10']."'></td>
            <td colspan='1'>第一申请级别</td>
			
			 <td colspan='1'><input type='text' class='form-control' name='p11' value='".$row['c11']."'></td>
			 <tr>
 <td colspan='1'>第二申请级别</td>
			
			 <td colspan='1'><input type='text' class='form-control' name='p12' value='".$row['c12']."'></td>
			 </tr>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>工作经历</td>
            <td colspan='1'>工作时间</td>
			<td colspan='4'>工作单位</td>
			<td colspan='1'>岗位/职务</td>
			<tr>
			<td>
			<textarea type='text' class='form-control' rows='3' name='p13' >".$row['c13']."</textarea>
			</td>
			<td colspan='4'>
			<textarea type='text' class='form-control' rows='3' name='p14' >".$row['c14']."</textarea>
			</td>
			<td colspan='1'>
			<textarea type='text' class='form-control' rows='3' name='p15' >".$row['c15']."</textarea>
			</td>
			</tr>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>作为项目负责人承担的Ⅰ(Ⅱ)级项目</td>
             <td colspan='3'>项目名称</td>
			   <td colspan='2'>项目级别</td>
               <td colspan='1'>竣工时间</td>
			   <tr>
			   <td colspan='3'><textarea type='text' class='form-control' rows='5' name='p16'>".$row['c16']."</textarea></td>
			   <td colspan='2'><textarea type='text' class='form-control' rows='5' name='p17'>".$row['c17']."</textarea></td>
               <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p18'>".$row['c18']."</textarea></td>
			   </tr>
			</tr>
			<tr>
			<td colspan='1'>是否需要预订住宿</td>
			<td colspan='6'><input type='text' class='form-control' name='19' value='".$row['c19']."'></td>
			</tr>
			<tr>
			<td colspan='1'>填表人</td>
			<td colspan='1'><input type='text' class='form-control' name='20' value='".$row['c20']."'></td>
			<td colspan='1'>联系方式</td>
			<td colspan='2'><input type='text' class='form-control' name='21' value='".$row['c21']."'></td>
             <td colspan='1'>填表时间</td>
			<td colspan='1'><input type='text' class='form-control' name='22' value='".$row['c22']."'></td>
			</tr>
			<tr>
			<td colspan='1'>申请人所在单位意见</td>
			<td colspan='6'><textarea type='text' class='form-control' rows='5' name='p23'> ".$row['c23']."</textarea></td>
			</tr>
			<tr>
			</tbody>
			</table>
			";
			if($state==1)
			{echo"
			<input type='hidden' value='yes' name='changepm1'> 
			<div style='float: right'> <button type='submit' class='btn btn-md btn-primary'>&nbsp;&nbsp; 更改 &nbsp; &nbsp;</button>
    <br> <br>
  </div>";
			}
		echo"
</form>
</div>
<div class='visible-xs container-fluid'>
<form enctype='multipart/form-data' action='' method='post'>
<h5 class='text-center'><strong>中国钢结构协会空间结构分会</strong></h5>
<h5 class='text-center'><strong>膜结构工程项目经理申请表</strong></h5>
<table class='table table-bordered text-center table-responsive' style='font-size:14px'>
 <tbody>
 <tr>
 <td colspan='1'>姓名</td>
 <td colspan='2'><input type='text' class='form-control' name='p1' value='".$row['c1']."'></td>
 </tr>
 <tr>
 <td colspan='1'>性别</td>
 <td colspan='2'><input type='text' class='form-control' name='p2' value='".$row['c2']."'></td>
 </tr>
 <tr>
 <td colspan='1'>出生日期</td>
 <td colspan='2'><input type='text' class='form-control' name='p3' value='".$row['c3']."'></td>
 </tr>
 <tr>
 <td colspan='1'>一寸照片上传</td>
 <td  colspan='2'> <input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
			 <input type='file' class='form-control' name='file1' id='file1' ><img style='width:100%' src='webpage/pm1//$id.jpg'/></td>
 </tr>
<tr>
 <td colspan='1'>专业</td>
 <td colspan='2'><input type='text' class='form-control' name='p4' value='".$row['c4']."'></td>
 </tr>
 <tr>
 <td colspan='1'>学位/学历</td>
<td colspan='2'><input type='text' class='form-control' name='p5' value='".$row['c5']."'></td>
 </tr>
 <tr>
 <td colspan='1'>毕业时间</td>
<td colspan='2'><input type='text' class='form-control' name='p6' value='X年X月X日' value='".$row['c6']."'></td>
 </tr>
  <tr>
 <td colspan='1'>职称</td>
<td colspan='2'><input type='text' class='form-control' name='p7' value='".$row['c7']."'></td>
 </tr>
  <tr>
 <td colspan='1'>现工作单位</td>
<td colspan='2'>
<select name='p8' id='p8' class='form-control' >";
			$query1="select id,c1 from join_form where state=8";
			$result1=$db->query($query1);
			$num_results1=$result1->num_rows;
			for($i=0;$i<$num_results1;$i++)
			{
				$row1=$result1->fetch_assoc(); 
				if($row1['c1']==$row['c8'])
				{
       echo"<option value='".$row1['c1']."'selected = 'selected'> ".$row1['c1']."</option >";
				}
				else{

				echo"<option value='".$row1['c1']."'> ".$row1['c1']."</option >
				";	
				}
			}

			 echo "  </select></td>
 </tr>
 <tr>
 <td colspan='1'>入职时间</td>
<td colspan='2'><input type='text' class='form-control' name='p9' value='".$row['c9']."'></td>
 </tr>
  <tr>
 <td colspan='1'>膜结构工程从业年限</td>
<td colspan='2'><input type='text' class='form-control' name='p10' value='".$row['c10']."'></td>
 </tr>
  <tr>
 <td colspan='1'>第一申请级别</td>
<td colspan='2'><input type='text' class='form-control' name='p11' value='".$row['c11']."'></td>
 </tr>
  <tr>
 <td colspan='1'>第二申请级别</td>
<td colspan='2'><input type='text' class='form-control' name='p12' value='".$row['c12']."'></td>
 </tr>
 <tr>
 <td colspan='3'>工作经历</td>
 </tr>
 <tr>
 <td colspan='1'>工作时间</td>
 <td colspan='1'>工作单位</td>
 <td colspan='1'>岗位/职务</td>
 </tr>
<tr>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p13'>'".$row['c13']."'</textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p14'>'".$row['c14']."'</textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p15'>'".$row['c15']."'</textarea></td>
 </tr>
 <tr>
 <td colspan='3'>作为项目负责人承担的Ⅰ(Ⅱ)级项目</td>
 </tr>
 <tr>
 <td colspan='1'>项目名称</td>
 <td colspan='1'>项目级别</td>
 <td colspan='1'>竣工时间</td>
 </tr>
<tr>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p16'>'".$row['c16']."'</textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p17'> '".$row['c17']."'</textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p18'> '".$row['c18']."'</textarea></td>
 </tr>
 <tr>
<td colspan='1'>是否需要预订住宿</td>
<td colspan='2'><input type='text' class='form-control' name='19' value='".$row['c19']."' ></td>
</tr>
<tr>
			<td colspan='1'>填表人</td>
			<td colspan='2'><input type='text' class='form-control' name='p20' value='".$row['c20']."'></td></tr>
			<tr>
			<td colspan='1'>联系方式</td>
			<td colspan='2'><input type='text' class='form-control' name='p21' value='".$row['c21']."'></td></tr>
<tr>
             <td colspan='1'>填表时间</td>
			<td colspan='2'><input type='text' class='form-control' name='p22' value='".$row['c22']."'></td>
			</tr>
			<tr>
			<td colspan='3'>申请人所在单位意见</td></tr>
				<tr>
			<td colspan='3'><textarea type='text' class='form-control' rows='5' name='p23'>'".$row['c23']."'</textarea></td>
			</tr>
</tbody>
</table>
";
if($state==1){
echo"<input type='hidden' value='yes' name='changepm1'> 
			<div style='float: right'> <button type='submit' class='btn btn-md btn-primary'>&nbsp;&nbsp; 更改 &nbsp; &nbsp;</button>
    <br> <br>
  </div>";
}
echo"
</form>
</div>

";
	

?>