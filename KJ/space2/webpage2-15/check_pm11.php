<?php
define('ROOT',dirname(__FILE__));
$upfile=ROOT."/pm2//$id.jpg";
$upfile1=ROOT."/pm2/file";
$a_array=scandir($upfile1);
$num=count($a_array);
for($i=0;$i<=$num;$i++)
{
	echo $a_array[$i];
$b_array=explode('.',$a_array[$i]);
$id2=$b_array[0];
if($id2==$id)
	{
$ext=$b_array[1];
}
}
$upfile2=ROOT."/pm2/file//$id.$ext";
if($_POST['pm2']=='yes')
{
	if($_FILES['file1']['tmp_name']!='')
	{ 
		  unlink($upfile);
			if(!move_uploaded_file($_FILES['file1']['tmp_name'],$upfile))
			echo "<script language=javascript>alert('保存失败，请联系管理员');</script>";	
			 //移动该文件至指定目录
		}
		if($_FILES['file2']['tmp_name']!='')
	{ 
		  unlink($upfile2);
			if(!move_uploaded_file($_FILES['file2']['tmp_name'],$upfile2))
			echo "<script language=javascript>alert('保存失败，请联系管理员');</script>";	
			 //移动该文件至指定目录
		}

		
for($i=1;$i<25;$i++)
	{
		$str="p".$i;
		$PA[$i]=$_POST[$str];		
	}
$query2="select id from join_form where c1='$PA[10]'";

			$result2=$db->query($query2);
			$row2=$result2->fetch_assoc(); 
			$id_f=$row2['id'];
			$db=create_database();

		$query="update pm1 set ";
		for($i=1;$i<25;$i++)
	{
			$i1=$i+23;
			$query=$query.'c'.$i1."='".$PA[$i]."',";	
	}$query=$query.'id_f='.$id_f." where id_p=$id";
	$result=$db->query($query);
	if($result) {
		echo "<script language=javascript> alert('保存成功!'); location.href='http://www.cnass.org/space2/index.php?nav1=61&nav2=57' ;</script>";exit();
		}
	else 
	{
		echo "<script language=javascript> alert('保存失败，请联系管理员！')</script>";
	}
	 
}

$query="select * from pm1 where id_p=$id";
$result=$db->query($query);
$num_results=$result->num_rows;
$row=$result->fetch_assoc(); 
$state=$row['state'];
			
if($num_results)	
{
	
	switch ($row['state'])
	{  
		case 0:	//未通过培训审核
			case 1://提交待审核
			case 2://管理员确认
			case 3:	//对方确认
			case 4:	//未通过培训
			 echo "<h3><span class='label label-info text-center noprint'>未通过培训</span></h3>";exit();break;
			 case 5://已通过培训
				 echo "<h3><span class='label label-info text-center noprint'>尚未提交申请表</span></h3>";exit();break;
             case 6: echo "<h3><span class='label label-info text-center noprint'>已提交，等待管理员审核</span></h3>";break;	//已提交,管理员还没有给分配专家之前，是可以更改的。
			 case 7:
		      case 8://给专家打分
			 echo "<h3><span class='label label-info text-center noprint'>已提交，等待管理员审核</span></h3>";break;
           case 9://通过审核
		   echo "<h3><span class='label label-info text-center noprint'>您已通过审核</span></h3>";break;
            case 10: //未通过审核
				echo "<h3><span class='label label-info text-center noprint'>您未通过审核</span></h3>";break;
			
			//case 4:	echo "<h4><span class='label label-warning text-center'>本次提交将覆盖之前数据</span></h4>";$flag=1;break; //这里的flag用于标记是否在表单里做flag标记，用于在提交时删除现有表单。
			default:break;
	}
}
else
		{
			echo "<h3><span class='label label-info'>尚未提交申请表！</span></h3>"; //没有提交则退出
			exit();
		}



		echo"
		<input id='btnPrint' class='noprint btn btn-info' type='button' value='打印' onclick='javascript:window.print();' style='font-weight:bold; text-decoration:none;cursor:pointer;float:right;!important; cursor:hand'/>

<!--startprint-->
<div class='container-fluid hidden-xs'>
<form enctype='multipart/form-data' action='' method='post'>
    <h3 class='text-center'>中国钢结构协会空间结构分会</h3>
  <h3 class='text-center'>膜结构工程项目经理申请表</h3>
  <table class='table table-bordered text-center table-responsive'>
            <tbody>
            <tr>
			<td colspan='1'>姓名</td>
            <td colspan='1'><input type='text' class='form-control input-mini' name='p1' value=".$row['c24']."></td>
            <td colspan='1'>性别</td>
			 <td colspan='1'><input type='text' class='form-control' name='p2' value=".$row['c25']."></td>
      <td colspan='1'>出生日期</td>
			 <td colspan='1'><input type='text' class='form-control' name='p3' value=".$row['c26']."></td>
			 <td colspan='1' rowspan='6'>一寸照片上传处<input type='hidden' name='MAX_FILE_SIZE' value='50000'/>
			 <input type='file' class='form-control' name='file1' id='file1' ><img style='width:100%' src='webpage/pm2//$id.jpg'/></td>
			</tr>
<tr>
			<td colspan='1'>专业</td>
            <td colspan='1'><input type='text' class='form-control' name='p4' value=".$row['c27']."></td>
            <td colspan='1'>学位/学历</td>
			 <td colspan='1'><input type='text' class='form-control' name='p5' value=".$row['c28']."></td>
      <td colspan='1'>毕业时间</td>
			 <td colspan='1'><input type='text' class='form-control' name='p6' value=".$row['c29']."></td>
			</tr>
			<tr>
			<td colspan='1'>职称</td>
            <td colspan='1'><input type='text' class='form-control' name='p7' value=".$row['c30']."></td>
			<td colspan='1'>发证时间</td>
            <td colspan='1'><input type='text' class='form-control' name='p8' value=".$row['c31']."></td>
			<td colspan='1'>证书编号</td>
            <td colspan='1'><input type='text' class='form-control' name='p9' value=".$row['c32']."></td>

           
			</tr>
			<tr>
			<td colspan='1'>现工作单位</td>
            <td colspan='3'>
			<select name='p10' id='p8' class='form-control' >";
			$query1="select id,c1 from join_form where state=8";
			$result1=$db->query($query1);
			$num_results1=$result1->num_rows;
			for($i=0;$i<$num_results1;$i++)
			{
				$row1=$result1->fetch_assoc(); 
				if($row1['c1']==$row['c33'])
				{
       echo"<option value='".$row1['c1']."'selected = 'selected'> ".$row1['c1']."</option >";
				}
				else{

				echo"<option value='".$row1['c1']."'> ".$row1['c1']."</option >
				";	
				}
			}
			 echo "  </select></td>
            <td colspan='1'>入职时间</td>
			 <td colspan='1'><input type='text' class='form-control' name='p11' value=".$row['c34']."></td>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>膜结构工程从业年限</td>
            <td colspan='3' rowspan='2'><input type='text' class='form-control' name='p12' value=".$row['c35']."></td>
            <td colspan='1'>第一申请级别</td>
			
			 <td colspan='1'><input type='text' class='form-control' name='p13' value=".$row['c36']."></td>
			 <tr>
 <td colspan='1'>第二申请级别</td>
			
			 <td colspan='1'><input type='text' class='form-control' name='p14' value=".$row['c37']."></td>
			 </tr>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>工作经历</td>
            <td colspan='1'>工作时间</td>
			<td colspan='4'>工作单位</td>
			<td colspan='1'>岗位/职务</td>
			<tr>
			<td>
			<textarea type='text' class='form-control' rows='3' name='p15' >".$row['c38']."</textarea>
			</td>
			<td colspan='4'>
			<textarea type='text' class='form-control' rows='3' name='p16' >".$row['c39']."</textarea>
			</td>
			<td colspan='1'>
			<textarea type='text' class='form-control' rows='3' name='p17'>".$row['c40']."</textarea>
			</td>
			</tr>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>作为项目负责人承担的Ⅰ(Ⅱ)级项目</td>
             <td colspan='3'>项目名称</td>
			   <td colspan='2'>项目级别</td>
               <td colspan='1'>竣工时间</td>
			   <tr>
			   <td colspan='3'><textarea type='text' class='form-control' rows='5' name='p18'>".$row['c41']."</textarea></td>
			   <td colspan='2'><textarea type='text' class='form-control' rows='5' name='p19'>".$row['c42']."</textarea></td>
               <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p20'>".$row['c43']."</textarea></td>
			   </tr>
			</tr>
			<tr>
			<td colspan='1'>申请人承诺</td>
			<td colspan='6' style='font-family:仿宋;font-size:20px;'>本人承诺：该表所填内容属实，如与事实不符，本人自愿放弃申报资格。
			<br>
			</td>
			</tr>
			<tr>
			<td colspan='1'>填表人</td>
			<td colspan='1'><input type='text' class='form-control' name='p21' value=".$row['c44']."></td>
			<td colspan='1'>联系方式</td>
			<td colspan='2'><input type='text' class='form-control' name='p22' value=".$row['c45']."></td>
             <td colspan='1'>填表时间</td>
			<td colspan='1'><input type='text' class='form-control' name='p23' value=".$row['c46']."></td>
			</tr>
			<tr>
			<td colspan='1'>申请人所在单位意见</td>
			<td colspan='6'><textarea type='text' class='form-control' rows='5' name='p24'>".$row['c47']."</textarea></td>
			</tr>
			<tr class='noprint'>
			<td colspan='1'>查看附件</td>
			<td colspan='6'> <input type='hidden' name='MAX_FILE_SIZE' value='1500000'/><input type='file' class='form-control' name='file2' id='file2'>备注：格式为rar或zip,文件大小在1mb以下。
			<a href='webpage/pm2/file/$id.$ext'>您已经上传的文件</a></td>
			</tr>
			<input type='hidden' value='yes' name='pm2'> 
			</tbody>
			</table>";
			if($state==6)
			{
			echo"
			<div style='float: right;'> <button type='submit' class='btn btn-md btn-primary noprint'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div>";
  }
  echo"
</form>
</div>



<div class='visible-xs container-fluid'>
<form enctype='multipart/form-data' action='' method='post'>
<h5 class='text-center'><strong>中国钢结构协会空间结构分会</strong></h5>
<h5 class='text-center'><strong>申请表</strong></h5>
<table class='table table-bordered text-center table-responsive' style='font-size:14px'>
 <tbody>
 <tr>
 <td colspan='1'>姓名</td>
 <td colspan='2'><input type='text' class='form-control' name='p1' value=".$row['c24']."></td>
 </tr>
 <tr>
 <td colspan='1'>性别</td>
 <td colspan='2'><input type='text' class='form-control' name='p2' value=".$row['c25']."></td>
 </tr>
 <tr>
 <td colspan='1'>出生日期</td>
 <td colspan='2'><input type='text' class='form-control' name='p3' value=".$row['c26']."></td>
 </tr>
 <tr>
 <td colspan='1'>一寸照片上传</td>
 <td colspan='2'><input type='hidden' name='MAX_FILE_SIZE' value='50000'/>
			 <input type='file' class='form-control' name='file1' id='file1' ><img style='width:100%' src='webpage/pm2//$id.jpg'/></td>
 </tr>
<tr>
 <td colspan='1'>专业</td>
 <td colspan='2'><input type='text' class='form-control' name='p4' value=".$row['c27']."></td>
 </tr>
 <tr>
 <td colspan='1'>学位/学历</td>
<td colspan='2'><input type='text' class='form-control' name='p5' value=".$row['c28']."></td>
 </tr>
 <tr>
 <td colspan='1'>毕业时间</td>
<td colspan='2'><input type='text' class='form-control' name='p6' value='X年X月X日' value=".$row['c29']."></td>
 </tr>
  <tr>
 <td colspan='1'>职称</td>
<td colspan='2'><input type='text' class='form-control' name='p7' value=".$row['c30']."></td>
 </tr>
 <tr>
 <td colspan='1'>发证时间</td>
<td colspan='2'><input type='text' class='form-control' name='p8' value=".$row['c31']."></td>
 </tr>
  <tr>
 <td colspan='1'>证书编号</td>
<td colspan='2'><input type='text' class='form-control' name='p9' value=".$row['c32']."></td>
 </tr>
 <tr>
 <td colspan='1'>现工作单位</td>
<td colspan='2'><select name='p10' class='selectpicker form-control' data-live-search='true'>";
			$query1="select id,c1 from join_form where state=8";
			$result1=$db->query($query1);
			$num_results1=$result1->num_rows;
			for($i=0;$i<$num_results1;$i++)
			{
				$row1=$result1->fetch_assoc(); 
				if($row1['c1']==$row['c33'])
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
<td colspan='2'><input type='text' class='form-control' name='p11' value=".$row['c34']."></td>
 </tr>
 <tr>
 <td colspan='1'>膜结构工程从业年限</td>
<td colspan='2'><input type='text' class='form-control' name='p12' value=".$row['c35']."></td>
 </tr>
  <tr>
 <td colspan='1'>第一申请级别</td>
<td colspan='2'><input type='text' class='form-control' name='p13' value=".$row['c36']."></td>
 </tr>
  <tr>
 <td colspan='1'>第二申请级别</td>
<td colspan='2'><input type='text' class='form-control' name='p14' value=".$row['c37']."></td>
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
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p15'>".$row['c38']."</textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p16'>".$row['c39']."</textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p17'>".$row['c40']."</textarea></td>
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
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p18'>".$row['c41']."</textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p19'>".$row['c42']."</textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p20'>".$row['c43']."</textarea></td>
 </tr>
 <tr>
<td colspan='1'>申请人承诺</td>
<td colspan='2' style='font-family:仿宋;font-size:14px;'>本人承诺：该表所填内容属实，如与事实不符，本人自愿放弃申报资格。
<br>
</td>
</tr>
<tr>
			<td colspan='1'>填表人</td>
			<td colspan='2'><input type='text' class='form-control' name='p21' value=".$row['c44']."></td></tr>
			<tr>
			<td colspan='1'>联系方式</td>
			<td colspan='2'><input type='text' class='form-control' name='p22' value=".$row['c45']."></td></tr>
<tr>
             <td colspan='1'>填表时间</td>
			<td colspan='2'><input type='text' class='form-control' name='p23' value=".$row['c46']."></td>
			</tr>
			<tr>
			<td colspan='3'>申请人所在单位意见</td></tr>
				<tr>
			<td colspan='3'><textarea type='text' class='form-control' rows='5' name='p24'>".$row['c47']."</textarea></td>
			</tr>
			<tr class='noprint'>
			<td colspan='1'>查看附件</td>
			<td colspan='2'> <input type='hidden' name='MAX_FILE_SIZE' value='15000000'/><input type='file' class='form-control' name='file2' id='file2'>备注：格式为rar或zip,文件大小在1mb以下。
			<a href='webpage/pm2/file/$id.$ext'>$id.$ext您已经上传的文件</a></td>
			</tr>
			<input type='hidden' value='yes' name='pm2'> 
 </tbody>
 </table>
<!---endprint-->
";
if($state==6)
{
	echo"
<div style='float: right;'> <button type='submit' class='btn btn-md btn-primary noprint'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div>";
  }
  echo"
  </form>
</div>


";

?>