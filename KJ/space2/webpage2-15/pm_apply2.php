<?php
define('ROOT',dirname(__FILE__));
$db=create_database();
if($_POST["pm2"]=='yes') //检测是否是此表单提交
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
	 $upfile=ROOT."/pm2//$id.jpg"; 
	 if($type!='image/pjpeg'&&$type!='image/jpeg'&&$type!='image/png'&&$type!='image/x-png')
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
echo"<script language=javascript>alert('移动失败，请联系管理员');</script>";
exit();
		}
	 if($error!=0)
		 { 
	 echo"<script language=javascript>alert('上传图片失败，请联系管理员');</script>";
      exit();
	 }
	}
	else{
	
	echo"<script language=javascript>alert('必须上传一寸照片');</script>";
      exit();
	}

	if(is_uploaded_file($_FILES['file2']['tmp_name']))
	{
     $name1=$_FILES['file2']['name'];//上传文件的文件名 
     $type1=$_FILES['file2']['type'];//上传文件的类型 
     $size1=$_FILES['file2']['size'];//上传文件的大小 
     $tmp_name1=$_FILES['file2']['tmp_name'];//上传文件的临时存放路径
	 $ext_array=explode(".",$name1);
	 $ext=$ext_array[1];
	 $upfile1=ROOT."/pm2/file//$id.$ext"; 
	 if($type1!='application/octet-stream'&&$type!='application/zip'&&$type!='image/x-zip-compressed')
		{
		 echo" <script language=javascript>alert('上传失败!必须上传zip、rar格式');</script>";
		exit();
	 }
	 if($size>=1500000)
		{
	 echo"<script language=javascript>alert('上传失败!文件大小需在1mb以下');</script>";
     exit();
	 }
	 if(!move_uploaded_file($tmp_name1,$upfile1))
		{
echo"<script language=javascript>alert('移动失败,请联系管理员');</script>";
exit();
		}
	 if($error!=0)
		 { 
	 echo"<script language=javascript>alert('上传图片失败，请联系管理员');</script>";
      exit();
	 }
	}
	else{
	
	echo"<script language=javascript>alert('必须上传附件');</script>";
      exit();
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
	for($i=1;$i<25;$i++)
		{
			$str="p".$i;
			$PA[$i]=$_POST[$str];
			$PA[$i]=addslashes($PA[$i]);
		}
		$p23=$PA[23];
		$query="update pm1 set ";
		for($i=1;$i<25;$i++)
	{
			$i1=$i+23;
			$query=$query.'c'.$i1."='".$PA[$i]."',";	
	}
	$query=$query.'id_f='.$id_f." where id_p=$id";
	$result=$db->query($query);	
if(!isset($result)) {
		echo "<script language=javascript> alert('保存失败!请联系管理员'); </script>";exit();
		}
	$query="update pm1 set state='6' where id_p=$id";
		$result=$db->query($query);	
	
	if($result) {
		echo "<script language=javascript> alert('保存成功!'); location.href='http://www.cnass.org/space2/index.php?nav1=61&nav2=57' ;</script>";exit();
		}
	else 
	{
		echo "<script language=javascript> alert('保存失败，请联系管理员！')</script>";
	}
	 
}
$query="select * from pm1 where id_p=$id ";
$result=$db->query($query);
$num_results=$result->num_rows;
if($num_results)	
{
	$row=$result->fetch_assoc(); 
	switch ($row['state'])
	{
		   case 0:	//未通过培训审核
			case 1://提交待审核
			case 2://管理员确认
			case 3:	//对方确认
			case 4:	//未通过培训
			 echo "<h3><span class='label label-info text-center'>未通过培训</span></h3>";exit();break;
			 case 5://已通过培训
				 echo "<h3><span class='label label-info text-center'>已通过培训</span></h3>";break;
             case 6:	//已提交
			 case 7: //给专家打分
			 echo "<h3><span class='label label-info text-center'>已提交，等待管理员审核</span></h3>";exit();break;
           case 8://专家意见反馈
		   echo "<h3><span class='label label-info text-center'>已提交，等待管理员审核</span></h3>";exit();break;
            case 9: //通过审核
				echo "<h3><span class='label label-info text-center'>您已通过审核</span></h3>";exit();break;
				case 10: //未通过审核，下次填写申请可在查看下更新资料
				echo "<h3><span class='label label-info text-center'>您已通过审核</span></h3>";exit();break;

			default:break;
	}
}
else{
echo"<h3><span class='label label-info text-center'>尚未申请企业膜结构经理培训班</span></h3>";exit();

}

echo"
<div class='container-fluid hidden-xs'>
<form enctype='multipart/form-data' action='' method='post'>
    <h3 class='text-center'>中国钢结构协会空间结构分会</h3>
  <h3 class='text-center'>膜结构工程项目经理申请表</h3>
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
			 <input type='hidden' name='MAX_FILE_SIZE' value='10000000'/><input type='file' class='form-control' name='file1' id='file1'>备注：格式为pjpeg、jpeg，大小小于30k</td>
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
            <td colspan='1'><input type='text' class='form-control' name='p7'></td>
			<td colspan='1'>发证时间</td>
            <td colspan='1'><input type='text' class='form-control' name='p8'></td>
			<td colspan='1'>证书编号</td>
            <td colspan='1'><input type='text' class='form-control' name='p9'></td>

           
			</tr>
			<tr>
			<td colspan='1'>现工作单位</td>
            <td colspan='3'>
			<select name='p10' class='selectpicker form-control' data-live-search='true'>";
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
            <td colspan='1'>入职时间</td>
			 <td colspan='1'><input type='text' class='form-control' name='p11'></td>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>膜结构工程从业年限</td>
            <td colspan='3' rowspan='2'><input type='text' class='form-control' name='p12'></td>
            <td colspan='1'>第一申请级别</td>
			
			 <td colspan='1'><input type='text' class='form-control' name='p13'></td>
			 <tr>
 <td colspan='1'>第二申请级别</td>
			
			 <td colspan='1'><input type='text' class='form-control' name='p14'></td>
			 </tr>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>工作经历</td>
            <td colspan='1'>工作时间</td>
			<td colspan='4'>工作单位</td>
			<td colspan='1'>岗位/职务</td>
			<tr>
			<td>
			<textarea type='text' class='form-control' rows='3' name='p15'></textarea>
			</td>
			<td colspan='4'>
			<textarea type='text' class='form-control' rows='3' name='p16'></textarea>
			</td>
			<td colspan='1'>
			<textarea type='text' class='form-control' rows='3' name='p17'></textarea>
			</td>
			</tr>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>作为项目负责人承担的Ⅰ(Ⅱ)级项目</td>
             <td colspan='3'>项目名称</td>
			   <td colspan='2'>项目级别</td>
               <td colspan='1'>竣工时间</td>
			   <tr>
			   <td colspan='3'><textarea type='text' class='form-control' rows='5' name='p18'></textarea></td>
			   <td colspan='2'><textarea type='text' class='form-control' rows='5' name='p19'></textarea></td>
               <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p20'></textarea></td>
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
			<td colspan='1'><input type='text' class='form-control' name='p21'></td>
			<td colspan='1'>联系方式</td>
			<td colspan='2'><input type='text' class='form-control' name='p22'></td>
             <td colspan='1'>填表时间</td>
			<td colspan='1'><input type='text' class='form-control' name='p23'></td>
			</tr>
			<tr>
			<td colspan='1'>申请人所在单位意见</td>
			<td colspan='6'><textarea type='text' class='form-control' rows='5' name='p24'></textarea></td>
			</tr>
			<tr>
			<td colspan='1'>请下载装订目录</td>
			<td colspan='6'><a href='webpage/pm1/膜结构工程项目经理申请材料装订目录.doc'>膜结构工程项目经理申请材料装订目录</a></td>
			</tr>
			<tr>
			<td colspan='1'>请上传附件</td>
			<td colspan='6'> <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/><input type='file' class='form-control' name='file2' id='file2'>备注：格式为rar或zip,文件大小在2mb以下。</td>
			</tr>
			<input type='hidden' value='yes' name='pm2'> 
			</tbody>
			</table>
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
 <td colspan='1'>一寸照片上传</td>
 <td colspan='2'> <input type='hidden' name='MAX_FILE_SIZE' value='10000000'/><input type='file' class='form-control' name='file1' id='file1'>备注：格式为pjpeg、jpeg或png格式，大小小于30k</td>
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
 <td colspan='1'>发证时间</td>
<td colspan='2'><input type='text' class='form-control' name='p8'></td>
 </tr>
  <tr>
 <td colspan='1'>证书编号</td>
<td colspan='2'><input type='text' class='form-control' name='p9'></td>
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
				echo"<option value='".$row1['c1']."'> ".$row1['c1']."</option >
				";	
			}

			 echo "  </select></td>
 </tr>
 <tr>
 <td colspan='1'>入职时间</td>
<td colspan='2'><input type='text' class='form-control' name='p11'></td>
 </tr>
 <tr>
 <td colspan='1'>膜结构工程从业年限</td>
<td colspan='2'><input type='text' class='form-control' name='p12'></td>
 </tr>
  <tr>
 <td colspan='1'>第一申请级别</td>
<td colspan='2'><input type='text' class='form-control' name='p13'></td>
 </tr>
  <tr>
 <td colspan='1'>第二申请级别</td>
<td colspan='2'><input type='text' class='form-control' name='p14'></td>
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
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p15'></textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p16'></textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p17'></textarea></td>
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
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p18'></textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p19'></textarea></td>
 <td colspan='1'><textarea type='text' class='form-control' rows='5' name='p20'></textarea></td>
 </tr>
 <tr>
<td colspan='1'>申请人承诺</td>
<td colspan='2' style='font-family:仿宋;font-size:14px;'>本人承诺：该表所填内容属实，如与事实不符，本人自愿放弃申报资格。
<br>
</td>
</tr>
<tr>
			<td colspan='1'>填表人</td>
			<td colspan='2'><input type='text' class='form-control' name='p21'></td></tr>
			<tr>
			<td colspan='1'>联系方式</td>
			<td colspan='2'><input type='text' class='form-control' name='p22'></td></tr>
<tr>
             <td colspan='1'>填表时间</td>
			<td colspan='2'><input type='text' class='form-control' name='p23'></td>
			</tr>
			<tr>
			<td colspan='3'>申请人所在单位意见</td></tr>
				<tr>
			<td colspan='3'><textarea type='text' class='form-control' rows='5' name='p24'></textarea></td>
			</tr>
			<tr>
			<td colspan='1'>请下载装订目录</td>
			<td colspan='2'><a href='webpage/pm1/膜结构工程项目经理申请材料装订目录.doc'>膜结构工程项目经理申请材料装订目录</a></td>
			</tr>
			<tr>
			<td colspan='1'>请上传附件</td>
			<td colspan='2'> <input type='hidden' name='MAX_FILE_SIZE' value='1500000'/><input type='file' class='form-control' name='file2' id='file2'>备注：格式为rar,文件大小在1mb以下。</td>
			</tr>
			<input type='hidden' value='yes' name='pm2'> 
 </tbody>
 </table>

<div style='float: right'> <button type='submit' class='btn btn-md btn-primary'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div>
  </form>
</div>

";


?>