<?php //共31个参数 
 //首先检查目前状态，如果不再这几种状态中则可以继续提交
//注意最下面有一个增加的flag hidden，用来标记是不是要删除数据库的。
 //检查是否有提交过，如果有提交过且正在审核中（state为0-5），更改信息是在check_pm1.php
define('ROOT',dirname(__FILE__));

$db=create_database();
$query="select * from pm1 where id_p=$id ";
$result=$db->query($query);
$num_results=$result->num_rows;

if($num_results)	
{
	$row=$result->fetch_assoc(); 
	switch ($row['state'])
	{
		   case 0:	echo "<h3><span class='label label-info text-center'>未通过审核</span></h3>";break;
			case 1: echo "<h3><span class='label label-info text-center'>审核中</span></h3>"; exit();break;
			case 2:	echo "<h3><span class='label label-info text-center'>管理员同意培训,请查看相关文件</span></h3>";exit();break;
			case 3:	echo "<h3><span class='label label-info text-center'>您已确认，如有问题请联系管理员</span></h3>";exit();break;
			case 4:	echo "<h3><span class='label label-info text-center'>未通过培训</span></h3>";exit();break;
			case 5:
				case 6:
				case 7:
				case 8:
				case 9:echo "<h3><span class='label label-info text-center'>已通过培训</span></h3>";exit();break;
			
			//case 4:	echo "<h4><span class='label label-warning text-center'>本次提交将覆盖之前数据</span></h4>";$flag=1;break; //这里的flag用于标记是否在表单里做flag标记，用于在提交时删除现有表单。
			default:break;
	}
}

if($_POST["pm1"]=='yes') //检测是否是此表单提交
{
	//if($_POST['flag']=='yes')//如果之前提交过这里重复提交，将会删除之前数据。
	//{
		//$query="delete from wang1 where id_p=$id";
		//$result=$db->query($query);
	//}
	if(is_uploaded_file($_FILES['file1']['tmp_name']))
	{
     $name=$_FILES['file1']['name'];//上传文件的文件名 
     $type=$_FILES['file1']['type'];//上传文件的类型 
     $size=$_FILES['file1']['size'];//上传文件的大小 
     $tmp_name=$_FILES['file1']['tmp_name'];//上传文件的临时存放路径
	 $upfile=ROOT."/pm1//$id.jpg"; 
	 if($type!='image/pjpeg'&&$type!='image/jpeg'&&$type!='image/png')
		{
		 echo" <script language=javascript>alert('上传失败!必须上传pjpeg、jpeg或png格式');</script>";
		 exit();
	 }
	 if($size>=500000)
		{
	 echo"<script language=javascript>alert('上传失败!请将照片压缩至30K以下');</script>";
     exit();
	 }
	 if(!move_uploaded_file($tmp_name,$upfile))
		{
echo"<script language=javascript>alert('移动失败');</script>";
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
	$query="insert into pm1 (";
		for($i=1;$i<24;$i++)
			$query=$query."c".$i.",";
		$query=$query."state,id_p,id_f) values(";
		for($i=1;$i<24;$i++)
			$query=$query."'".$PA[$i]."',";
		$query=$query."1,$id,$id_f)";
		$result=$db->query($query);	
	
	if($result) {
		echo "<script language=javascript> alert('保存成功!'); location.href='http://www.cnass.org/space2/index.php?nav1=61&nav2=56' ;</script>";exit();
		}
	else 
	{
		echo "<script language=javascript> alert('保存失败，请联系管理员！')</script>";
	}
	 
}
$query1="select id,c1 from join_form where state=8";
			$result1=$db->query($query1);
			$num_results1=$result1->num_rows;
echo"
<div class='container-fluid hidden-xs'>
<form enctype='multipart/form-data' action='' method='post'>
    <h3 class='text-center'>中国钢结构协会空间结构分会</h3>
  <h3 class='text-center'>膜结构工程项目经理培训班报名表</h3>
  <table class='table table-bordered text-center table-responsive'>
            <tbody>
            <tr>
			<td colspan='1'>姓名</td>
            <td colspan='1'><input type='text' class='form-control input-mini' name='p1'></td>
            <td colspan='1'>性别</td>
			 <td colspan='1'><input type='text' class='form-control' name='p2'></td>
      <td colspan='1'>出生日期</td>
			 <td colspan='1'><input type='text' class='form-control' name='p3' value='X年X月X日'></td>
			 <td colspan='1' rowspan='6'>一寸照片上传处
			 <input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
			 <input type='file' class='form-control' name='file1' id='file1' >备注：格式为pjpeg、jpeg或png格式，大小小于30k</td>
			</tr>
<tr>
			<td colspan='1'>专业</td>
            <td colspan='1'><input type='text' class='form-control' name='p4'></td>
            <td colspan='1'>学位/学历</td>
			 <td colspan='1'><input type='text' class='form-control' name='p5'></td>
      <td colspan='1'>毕业时间</td>
			 <td colspan='1'><input type='text' class='form-control' name='p6' value='X年X月X日'></td>
			</tr>
			<tr>
			<td colspan='1'>职称</td>
            <td colspan='5'><input type='text' class='form-control' name='p7'></td>
           
			</tr>
			<tr>
			<td colspan='1'>现工作单位</td>
            <td colspan='3'>
			<select name='p8' class='selectpicker form-control' data-live-search='true'>";
			
			for($i=0;$i<$num_results1;$i++)
			{
				$row1=$result1->fetch_assoc(); 
				echo"<option value='".$row1['c1']."'> ".$row1['c1']."</option >
				";	
			}

			 echo "  </select></td>
            <td colspan='1'>入职时间</td>
			 <td colspan='1'><input type='text' class='form-control' name='p9'></td>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>膜结构工程从业年限</td>
            <td colspan='3' rowspan='2'><input type='text' class='form-control' name='p10'></td>
            <td colspan='1'>第一申请级别</td>
			
			 <td colspan='1'><input type='text' class='form-control' name='p11'></td>
			 <tr>
 <td colspan='1'>第二申请级别</td>
			
			 <td colspan='1'><input type='text' class='form-control' name='p12'></td>
			 </tr>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>工作经历</td>
            <td colspan='1'>工作时间</td>
			<td colspan='4'>工作单位</td>
			<td colspan='1'>岗位/职务</td>
			<tr>
			<td>
			<textarea type='text' class='form-control' rows='3' name='p13'></textarea>
			</td>
			<td colspan='4'>
			<textarea type='text' class='form-control' rows='3' name='p14'></textarea>
			</td>
			<td colspan='1'>
			<textarea type='text' class='form-control' rows='3' name='p15'></textarea>
			</td>
			</tr>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>作为项目负责人承担的Ⅰ(Ⅱ)级项目</td>
             <td colspan='3'>项目名称</td>
			   <td colspan='2'>项目级别</td>
               <td colspan='1'>竣工时间</td>
			   <tr>
			   <td colspan='3'><textarea type='text' class='form-control' rows='5' name='p16'></textarea></td>
			   <td colspan='2'><textarea type='text' class='form-control' rows='5' name='p17'></textarea></td>
               <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p18'></textarea></td>
			   </tr>
			</tr>
			<tr>
			<td colspan='1'>是否需要预订住宿</td>
			<td colspan='6'><input type='text' class='form-control' name='19'></td>
			</tr>
			<tr>
			<td colspan='1'>填表人</td>
			<td colspan='1'><input type='text' class='form-control' name='20'></td>
			<td colspan='1'>联系方式</td>
			<td colspan='2'><input type='text' class='form-control' name='21'></td>
             <td colspan='1'>填表时间</td>
			<td colspan='1'><input type='text' class='form-control' name='22'></td>
			</tr>
			<tr>
			<td colspan='1'>申请人所在单位意见</td>
			<td colspan='6'><textarea type='text' class='form-control' rows='5' name='p23'></textarea></td>
			</tr>
			<tr>
			</tbody>
			</table>
			<input type='hidden' value='yes' name='pm1'> 
			<div style='float: right'> <button type='submit' class='btn btn-md btn-primary'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div>
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
 <td colspan='2'><input type='text' class='form-control' name='p1'></td>
 </tr>
 <tr>
 <td colspan='1'>性别</td>
 <td colspan='2'><input type='text' class='form-control' name='p2'></td>
 </tr>
 <tr>
 <td colspan='1'>出生日期</td>
 <td colspan='2'><input type='text' class='form-control' name='p3'></td>
 </tr>
 <tr>
 <td>一寸照片上传</td>
 <td><input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
			 <input type='file' class='form-control' name='file1' id='file1' >备注：格式为pjpeg、jpeg或png格式，大小小于30k</td>
 </tr>
<tr>
 <td colspan='1'>专业</td>
 <td colspan='2'><input type='text' class='form-control' name='p4'></td>
 </tr>
 <tr>
 <td colspan='1'>学位/学历</td>
<td colspan='2'><input type='text' class='form-control' name='p5'></td>
 </tr>
 <tr>
 <td colspan='1'>毕业时间</td>
<td colspan='2'><input type='text' class='form-control' name='p6' value='X年X月X日'></td>
 </tr>
  <tr>
 <td colspan='1'>职称</td>
<td colspan='2'><input type='text' class='form-control' name='p7'></td>
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
<td colspan='2'><input type='text' class='form-control' name='p9'></td>
 </tr>
  <tr>
 <td colspan='1'>膜结构工程从业年限</td>
<td colspan='2'><input type='text' class='form-control' name='p10'></td>
 </tr>
  <tr>
 <td colspan='1'>第一申请级别</td>
<td colspan='2'><input type='text' class='form-control' name='p11'></td>
 </tr>
  <tr>
 <td colspan='1'>第二申请级别</td>
<td colspan='2'><input type='text' class='form-control' name='p12'></td>
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
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p13'></textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p14'></textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p15'></textarea></td>
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
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p16'></textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p17'></textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p18'></textarea></td>
 </tr>
 <tr>
<td colspan='1'>是否需要预订住宿</td>
<td colspan='2'><input type='text' class='form-control' name='19'></td>
</tr>
<tr>
			<td colspan='1'>填表人</td>
			<td colspan='2'><input type='text' class='form-control' name='p20'></td></tr>
			<tr>
			<td colspan='1'>联系方式</td>
			<td colspan='2'><input type='text' class='form-control' name='p21'></td></tr>
<tr>
             <td colspan='1'>填表时间</td>
			<td colspan='2'><input type='text' class='form-control' name='p22'></td>
			</tr>
			<tr>
			<td colspan='3'>申请人所在单位意见</td></tr>
				<tr>
			<td colspan='3'><textarea type='text' class='form-control' rows='5' name='p23'></textarea></td>
			</tr>
			<input type='hidden' value='yes' name='pm1'> 
</tbody>
</table>
</form>
</div>
";


?>