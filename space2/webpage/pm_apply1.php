<?php 
include_once '../index/include/function.php' 
?>
<?php //共31个参数 
 //首先检查目前状态，如果不再这几种状态中则可以继续提交
 //检查是否有提交过，如果有提交过且正在审核中（state为0-5），更改信息是在check_pm1.php
 //17-2-15更改，将这个文件改成表单填写 ，另外改变了表单的格式，
control(6);
define('ROOT',dirname(__FILE__));
$db=create_database();
$query="select * from pm1 where id_p=$id ";
$result=$db->query($query);
$num_results=$result->num_rows;
$row=$result->fetch_assoc(); 
if($num_results)	
{
	switch ($row['state'])
	{
		   case 0:	echo "<h3><span class='label label-info text-center'>未通过审核</span></h3>";break;
			case 1: echo "<h3><span class='label label-info text-center'>您已提交，等待审核</span></h3>";break;
			case 2:	echo "<h3><span class='label label-info text-center'>管理员同意培训,请查看相关文件</span></h3>";exit();break;
			case 3:	echo "<h3><span class='label label-info text-center'>您已确认，如有问题请联系管理员</span></h3>";exit();break;
			case 4:	echo "<h3><span class='label label-info text-center'>未通过培训</span></h3>";break;
			case 5:
				echo "<h3><span class='label label-info text-center'>已通过培训</span></h3>";exit();break;
			
			//case 4:	echo "<h4><span class='label label-warning text-center'>本次提交将覆盖之前数据</span></h4>";$flag=1;break; //这里的flag用于标记是否在表单里做flag标记，用于在提交时删除现有表单。
			default:break;
	}
}

if($_POST["pm1"]=='yes') //检测是否是此表单提交
{
	
	if(is_uploaded_file($_FILES['file1']['tmp_name']))
	{
     $name=$_FILES['file1']['name'];//上传文件file1的文件名 
     $type=$_FILES['file1']['type'];//上传文件的类型 
     $size=$_FILES['file1']['size'];//上传文件的大小 
     $tmp_name=$_FILES['file1']['tmp_name'];//上传文件file2的临时存放路径 
	 $upfile=ROOT."/pm1/photo//$id.jpg"; 
	  if(file_exists($upfile))
		 unlink($upfile);
	 if($type!='image/pjpeg'&&$type!='image/jpeg'&&$type!='image/png')
		{
		 echo" <script language=javascript>alert('上传失败!照片必须上传pjpeg、jpeg或png格式);</script>";
		 exit();
	 }
	 if($size>=500000)
		{
	 echo"<script language=javascript>alert('上传失败!请将照片压缩至30K以下');</script>";
     exit();
	 }
	 if(!move_uploaded_file($tmp_name,$upfile))
		{
echo"<script language=javascript>alert('移动图片失败');</script>";
exit();
		}

	 if($error!=0)
		 { 
	 echo"<script language=javascript>alert('上传图片失败，请联系管理员');</script>";
      exit();
	 }
	}
if(is_uploaded_file($_FILES['file3']['tmp_name']))
	{
     $name3=$_FILES['file3']['name'];//上传文件file1的文件名 
     $type3=$_FILES['file3']['type'];//上传文件的类型 
     $size3=$_FILES['file3']['size'];//上传文件的大小 
     $tmp_name3=$_FILES['file3']['tmp_name'];//上传文件file2的临时存放路径 
	 $upfile3=ROOT."/pm1/pay//$id.jpg"; 
	 if(file_exists($upfile3))
		 unlink($upfile3);
	 if($type3!='image/pjpeg'&&$type3!='image/jpeg'&&$type3!='image/png')
		{
		 echo" <script language=javascript>alert('上传失败!缴费凭证必须上传pjpeg、jpeg或png格式);</script>";
		 exit();
	 }
	 if($size3>=500000)
		{
	 echo"<script language=javascript>alert('上传失败!请将凭证压缩至30K以下');</script>";
     exit();
	 }
	 if(!move_uploaded_file($tmp_name3,$upfile3))
		{
echo"<script language=javascript>alert('移动图片失败');</script>";
exit();
		}

	 if($error!=0)
		 { 
	 echo"<script language=javascript>alert('上传图片失败，请联系管理员');</script>";
      exit();
	 }
	}
	for($i=1;$i<24;$i++)
	{
		$str="p".$i;
		$PA[$i]=$_POST[$str];		
	}
$query2="select id from join_form where c1='$PA[8]'";

			$result2=$db->query($query2);
			$row2=$result2->fetch_assoc(); 
			$id_f=$row2['id'];
			$db=create_database();
			if($row['state']==NULL)
				{
	             $query="insert into pm1 (";
		         for($i=1;$i<24;$i++)
			        $query=$query."c".$i.",";
		            $query=$query."state,id_p,id_f) values(";
		         for($i=1;$i<24;$i++)
			        $query=$query."'".$PA[$i]."',";
		            $query=$query."1,$id,$id_f)";
		            $result=$db->query($query);	
				if($result)
				{
		          echo "<script language=javascript> alert('保存成功!'); </script>";
                   $query3="select name,email from user where category = 5";
                    $result3=$db->query($query3);
	                $num_results3=$result3->num_rows;
	                for($i=1;$i<=$num_results3;$i++)
		            {
                      $row3=$result3->fetch_assoc(); 
		              $PD[$i]=$row3['name'];
		              $DF[$i]=$row3['email'];
		             }
		           $body=$PA['1']."向您投递了企业膜经理培训班报名表，请及时处理";
		           sendMail($PD,$DF,"空间结构分会-膜经理培训班报名情况通知",$body, $num_results3);	echo"<script language='javascript'>location.href='http://www.cnass.org/space2/index.php?nav1=61&nav2=56';</script>";	
             	}
	         else 
	        {
		       echo "<script language=javascript> alert('保存失败，请联系管理员！')</script>";
	         }
		        }
		    else{
		       change1("pm1",24,$PA,$id_f,$id);	
			   if($result)
				{
		          echo "<script language=javascript> alert('保存成功!');location.href='http://www.cnass.org/space2/index.php?nav1=61&nav2=56'; </script>";    
              	}
	           else 
	           {
		         echo "<script language=javascript> alert('保存失败，请联系管理员！')</script>";
	           }
		}
	
}
$query1="select id,c1 from join_form where state=8";
			$result1=$db->query($query1);
			$num_results1=$result1->num_rows;

echo"

<div class='container-fluid hidden-xs'>
<div class='col-xs-12' style='background-image:url(titlebackground.jpg);font-size:1.3em;padding:0.2em;margin-top:22px;'>
<strong>基本信息</strong>
</div>
<form enctype='multipart/form-data' action='' method='post' >
 <table class='table table-bordered text-center table-responsive'>
            <tbody>
            <tr>
			<td colspan='1' ><span style='color:red'>*</span>   姓名</td>
            <td colspan='1'><input type='text' class='form-control input-mini' name='p1' value=".$row['c1']."></td>
            <td colspan='1' ><span style='color:red'>*</span>   性别</td>
			 <td colspan='1'><input type='text' class='form-control' name='p2' value=".$row['c2']."></td>
			  <td colspan='1' rowspan='7' width='200px' hight='280px'>一寸照片上传处
			 <input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
			 <input type='file' class='form-control' name='file1' id='file1'><p style='color:red'><small>备注：格式为pjpeg、jpeg或png格式，大小小于30k</small></p>
			<img  width='150px' hight='210px' src='webpage/pm1/photo//$id.jpg'/></td></tr>

<tr>
			<td colspan='1' ><span style='color:red'>*</span>  出生日期</td>
            <td colspan='1'><input type='text' class='form-control input-mini' name='p3' value=".$row['c3']."></td>
            <td colspan='1' ><span style='color:red'>*</span>  专业</td>
			 <td colspan='1'><input type='text' class='form-control' name='p4' value=".$row['c4']."></td>
			  </tr>
			  <tr>
			<td colspan='1'><span style='color:red'>*</span>    学位/学历</td>
            <td colspan='1'><input type='text' class='form-control input-mini' name='p5' value=".$row['c5']."></td>
            <td colspan='1'><span style='color:red'>*</span>    毕业时间</td>
			 <td colspan='1'><input type='text' class='form-control' name='p6' value=".$row['c6']."></td>
			  </tr>
			   <tr>
			   <td colspan='1'><span style='color:red'>*</span>    职称</td>
			 <td colspan='3'><input type='text' class='form-control' name='p7' value=".$row['c7']."></td></tr>
			 <tr>
			<td colspan='1'><span style='color:red'>*</span>    现工作单位</td>
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
			 echo "  </select></td>
			  </tr>
<tr>
			<td colspan='1' ><span style='color:red'>*</span> 入职时间 </td>
            <td colspan='1'><input type='text' class='form-control input-mini' name='p9' value=".$row['c9']."></td>
            <td colspan='1' ><span style='color:red'>*</span>  膜结构工程从业年限</td>
			 <td colspan='1'><input type='text' class='form-control' name='p10' value=".$row['c10']."></td>
			  </tr>
			  <tr>
			<td colspan='1' ><span style='color:red'>*</span> 第一申请级别 </td>
            <td colspan='1'><input type='text' class='form-control input-mini' name='p11' value=".$row['c11']."></td>
            <td colspan='1' ><span style='color:red'>*</span>  第二申请级别</td>
			 <td colspan='1'><input type='text' class='form-control' name='p12' value=".$row['c12']."></td>
			  </tr></table>

<div class='col-xs-12' style='background-image:url(titlebackground.jpg);font-size:1.3em;padding:0.2em;'>
<strong>工作经历</strong>
</div>
	 <table class='table table-bordered text-center table-responsive' id='myTable' name='myTable'>
            <tbody>
            <tr>
			<td colspan='1' ><span style='color:red'>*</span>  工作时间</td>
			 <td colspan='1' ><span style='color:red'>*</span>   工作单位</td>
			  <td colspan='1' ><span style='color:red'>*</span>   岗位/职务</td>
			  </tr>
			  <tr>
            <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p13' >".$row['c13']."</textarea></td>
           
			 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p14' >".$row['c14']."</textarea></td>
			  
			 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p15' >".$row['c15']."</textarea></td>
			  </tr>
			 
</table>
 
<div class='col-xs-12' style='background-image:url(titlebackground.jpg);font-size:1.3em;padding:0.2em;'>
<strong>作为项目负责人承担的Ⅰ(Ⅱ)级项目</strong>
</div>
	 <table class='table table-bordered text-center table-responsive'>
            <tbody>
            <tr>
			<td colspan='1' ><span style='color:red'>*</span>  项目名称</td>
			<td colspan='1' ><span style='color:red'>*</span>   项目级别</td>
			 <td colspan='1' ><span style='color:red'>*</span>   竣工时间</td>
			 </tr>
			 <tr>
            <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p16' >".$row['c16']."</textarea></td>
           
			 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p17' >".$row['c17']."</textarea></td>
			  
			 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p18' >".$row['c18']."</textarea></td>
			  </tr>

<tr></table>
<div class='col-xs-12' style='background-image:url(titlebackground.jpg);font-size:1.3em;padding:0.2em;'>
<strong>其他信息</strong>
</div>
	 <table class='table table-bordered text-center table-responsive'>
            <tbody>
            <tr>
			<td colspan='1' ><span style='color:red'>*</span>  是否需要预订住宿</td>
            <td colspan='5'><input type='text' class='form-control input-mini' name='p19' value=".$row['c19']."></td></tr>
			  <tr>
            <td colspan='1' ><span style='color:red'>*</span>   填表人</td>
			 <td colspan='1'><input type='text' class='form-control' name='p20' value=".$row['c20']."></td>
			   <td colspan='1' ><span style='color:red'>*</span>   联系方式</td>
			 <td colspan='1'><input type='text' class='form-control' name='p21' value=".$row['c21']."></td>
			  <td colspan='1' ><span style='color:red'>*</span>   填表时间</td>
			 <td colspan='1'><input type='text' class='form-control' name='p22' value=".$row['c22']."></td>
			  </tr>
<tr>
			<td colspan='1' ><span style='color:red'>*</span>申请人所在单位意见</td>
            <td colspan='5'><input type='text' class='form-control input-mini' name='p23' value=".$row['c23']."></td></tr>
			
</table>
<div class='col-xs-12' style='background-image:url(titlebackground.jpg);font-size:1.3em;padding:0.2em;'>
<strong>请上传缴费凭证</strong> <span style='color:red'><small>[备注]：格式为pjpeg、jpeg或png格式，大小小于30ka</small></span>
</div>
 <table class='table table-bordered text-center table-responsive'>
   <tbody>
      <tr>
	  <td>
		<input type='hidden' name='MAX_FILE_SIZE' alue='10000000'/>	
        <input type='file' class='form-control' name='file3' id='file3'>
        <img  src='webpage/pm1/pay//$id.jpg'/>
	  </td></tr>
</tbody></table>
<input type='hidden' value='yes' name='pm1'> 
			<div style='float: right'> <button type='submit' class='btn btn-md btn-primary'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div>
  </form>
</div>

<div class='visible-xs container-fluid'>
<h5 class='text-center'><strong>中国钢结构协会空间结构分会</strong></h5>
<h5 class='text-center'><strong>膜结构工程项目经理申请表</strong></h5>
<form enctype='multipart/form-data' action='' method='post' >
<table class='table table-bordered text-center table-responsive' style='font-size:14px'>
 <tbody>
 <tr>
 <td colspan='1'>姓名</td>
 <td colspan='2'><input type='text' class='form-control' name='p1' value=".$row['c1']."></td>
 </tr>
 <tr>
 <td colspan='1'>性别</td>
 <td colspan='2'><input type='text' class='form-control' name='p2' value=".$row['c2']." ></td>
 </tr>
 <tr>
 <td colspan='1'>出生日期</td>
 <td colspan='2'><input type='text' class='form-control' name='p3' value=".$row['c3']." ></td>
 </tr>
 <tr>
 <td>一寸照片上传</td>
 <td colspan='2'><input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
			 <input type='file' class='form-control' name='file1' id='file1' >备注：格式为pjpeg、jpeg或png格式，大小小于30k
			  <img with='150px' hight='210px' src='webpage/pm1/photo//$id.jpg'>
			 </td>
 </tr>
<tr>
 <td colspan='1'>专业</td>
 <td colspan='2'><input type='text' class='form-control' name='p4' ></td>
 </tr>
 <tr>
 <td colspan='1'>学位/学历</td>
<td colspan='2'><input type='text' class='form-control' name='p5' ></td>
 </tr>
 <tr>
 <td colspan='1'>毕业时间</td>
<td colspan='2'><input type='text' class='form-control' name='p6' ></td>
 </tr>
  <tr>
 <td colspan='1'>职称</td>
<td colspan='2'><input type='text' class='form-control' name='p7' ></td>
 </tr>
  <tr>
 <td colspan='1'>现工作单位</td>
<td colspan='2'><select name='p8' class='selectpicker form-control' data-live-search='true'>";
			$query1="select id,c1 from join_form where state=8";
			$result1=$db->query($query1);
			$num_results1=$result1->num_rows;
			for($i=0;$i<$num_results1;$i++)
			{
				$row1=$result1->fetch_assoc(); 
				echo"<option value='".$row1['c1']."'> ".$row1['c1']."</option >
				";	
			}

			 echo "  </select></td>
 </tr>
 <tr>
 <td colspan='1'>入职时间</td>
<td colspan='2'><input type='text' class='form-control' name='p9' ></td>
 </tr>
  <tr>
 <td colspan='1'>膜结构工程从业年限</td>
<td colspan='2'><input type='text' class='form-control' name='p10' ></td>
 </tr>
  <tr>
 <td colspan='1'>第一申请级别</td>
<td colspan='2'><input type='text' class='form-control' name='p11' ></td>
 </tr>
  <tr>
 <td colspan='1'>第二申请级别</td>
<td colspan='2'><input type='text' class='form-control' name='p12' ></td>
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
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p13' ></textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p14' ></textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p15' ></textarea></td>
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
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p16' ></textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p17' ></textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p18' ></textarea></td>
 </tr>
 <tr>
<td colspan='1'>是否需要预订住宿</td>
<td colspan='2'><input type='text' class='form-control' name='19' ></td>
</tr>
<tr>
			<td colspan='1'>填表人</td>
			<td colspan='2'><input type='text' class='form-control' name='p20' ></td></tr>
			<tr>
			<td colspan='1'>联系方式</td>
			<td colspan='2'><input type='text' class='form-control' name='p21' ></td></tr>
<tr>
             <td colspan='1'>填表时间</td>
			<td colspan='2'><input type='text' class='form-control' name='p22' ></td>
			</tr>
			<tr>
			<td colspan='3'>申请人所在单位意见</td></tr>
				<tr>
			<td colspan='3'><textarea type='text' class='form-control' rows='5' name='p23' ></textarea></td>
			</tr>

		<tr>
			<td colspan='3'>请上传缴费凭证<p style='color:red;'><small>备注：格式为pjpeg、jpeg或png格式，大小小于30k</small><p></td></tr>
				<tr>
			<td colspan='3'><input type='hidden' name='MAX_FILE_SIZE' value='1000000'/>
            <input type='file' id='file3' name='file3'>
			 <img with='150px' hight='210px' src='webpage/pm1/pay//$id.jpg'>
			</td>
		</tr>	
			
</tbody>
</table>
<input type='hidden' value='yes' name='pm1'> 
			<div style='float: right'> <button type='submit' class='btn btn-md btn-primary'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div>
</form></div>
";
?>