<?php

//打印功能不需要

define('ROOT',dirname(__FILE__));
$db=create_database();
$query="select * from $sheet where id_p=$id ";
$result=$db->query($query);
$row=$result->fetch_assoc(); 
$num_results=$result->num_rows;
$state=$row['state'];
$position=$row['position'];
$position1=$row['position1'];
$position2=$row['position2'];
$position3=$row['position3'];
$position4=$row['position4'];//从数据库里获取名字。
$info=$row['info1'];
if($num_results!=0)
{
	switch($state)

	{
	case 1:echo"<h3><span class='label label-info text-center'>提交待审核</span></h3>";break;
    case 2:
    case 3:
    case 4:
    case 5:echo"<h3><span class='label label-info text-center'>处理中，不能修改</span></h3>";break;
    case 6:echo"<h3><span class='label label-info text-center'>已通过审核</span></h3>";break;
    case 7:echo"<h3><span class='label label-info text-center'>未通过审核</span></h3>";break;
	default:break;
		}
}
else{
echo"<h3><span class='label label-info text-center'>尚未提交申请表</span></h3>";exit();break;
}

if($_POST['wang1']=='yes')//判断是否要更新，如要更新，则先删除 再将地址存入，state置为1（审核未通过的时候可以再次提交。）
{//||is_uploaded_file($_FILES['file2']['tmp_name'])||is_uploaded_file($_FILES['file3']['tmp_name'])||is_uploaded_file($_FILES['file4']['tmp_name'])||is_uploaded_file($_FILES['file5']['tmp_name'])
if(is_uploaded_file($_FILES['file1']['tmp_name']) )
		//这一块用http://blog.csdn.net/agangdi/article/details/8351095方法会严谨一点 ，日后注意改进.
	//判断是否有文件上传如果没有显示必须上传文件并exit();
	{ 
		unlink(ROOT."/$sheet/$position");
		//因为字符串的各种连接老是处理不好 所以在这里用超级笨的方法弄，等老师检查完了再用数组的方法解决
   $name1=$_FILES['file1']['name'];//上传文件的文件名 
     $type1=$_FILES['file1']['type'];//传文件的类型 
    $size1=$_FILES['file1']['size'];//上传文件的大小 
     $tmp_name1=$_FILES['file1']['tmp_name'];//上传文件的临时存放路径
    $ext_array1=explode('.',$name1);
	$ext1= $ext_array1[1];
	 $upfile1=ROOT."/$sheet/$id.1.$ext1"; 
	 if($type1!='application/msword'&&$type1!='application/vnd.openxmlformats-officedocument.wordprocessingml.document')
		{
		 echo" <script language=javascript>alert('上传失败!请上传指定格式的文件');</script>";
		 exit();
		}
 if($size1>=30000000)
		{
	 echo"<script language=javascript>alert('上传失败!请将文档中压缩至至2mb以下');</script>";
    exit();
	 }
	 if(!move_uploaded_file($tmp_name1,$upfile1))
		{
echo"<script language=javascript>alert('移动失败!请联系管理员');</script>";
exit();
		}
$query1="update $sheet set position='$id.1.$ext1',state='1' where id_p=$id ";
$result1=$db->query($query1);// 把文件地址存入数据库 要分开写
//将状态置为1
	}
if(is_uploaded_file($_FILES['file2']['tmp_name']) )
{
 
unlink(ROOT."/$sheet/$position1" );
		//因为字符串的各种连接老是处理不好 所以在这里用超级笨的方法弄，等老师检查完了再用数组的方法解决
    $name2=$_FILES['file2']['name'];//上传文件的文件名 
     $type2=$_FILES['file2']['type'];//传文件的类型 
    $size2=$_FILES['file2']['size'];//上传文件的大小 
     $tmp_name2=$_FILES['file2']['tmp_name'];//上传文件的临时存放路径
    $ext_array2=explode('.',$name2);
	$ext2= $ext_array2[1];
	 $upfile2=ROOT."/$sheet/$id.2.$ext2"; 
	 if($type2!='application/pdf') 
		{
		 echo" <script language=javascript>alert('上传失败!请上传指定格式的文件');</script>";
		 exit();
		}
 if($size2>=30000000)
		{
	 echo"<script language=javascript>alert('上传失败!请将文档中压缩至至2mb以下');</script>";
    exit();
	 }
	 if(!move_uploaded_file($tmp_name2,$upfile2))
		{
echo"<script language=javascript>alert('移动失败!请联系管理员');</script>";
exit();
}
$query2="update $sheet set position='$id.2.$ext2',state='1' where id_p=$id ";
$result2=$db->query($query2);// 把文件地址存入数据库 要分开写
//将状态置为1
}

if(is_uploaded_file($_FILES['file3']['tmp_name']) )
{
 
unlink(ROOT."/$sheet/$position2"); 
		//因为字符串的各种连接老是处理不好 所以在这里用超级笨的方法弄，等老师检查完了再用数组的方法解决
     $name3=$_FILES['file3']['name'];//上传文件的文件名 
     $type3=$_FILES['file3']['type'];//传文件的类型 
    $size3=$_FILES['file3']['size'];//上传文件的大小 
     $tmp_name3=$_FILES['file3']['tmp_name'];//上传文件的临时存放路径
   $ext_array3=explode('.',$name3);
	$ext3= $ext_array3[1];
	 $upfile3=ROOT."/$sheet/$id.3.$ext3"; 
	 if(($type3!='application/octet-stream')&&($type3!='application/zip')&&($type3!='application/x-zip-compressed'))
		{
		 echo" <script language=javascript>alert('上传失败!请上传指定格式的文件');</script>";
		 exit();
		}
 if($size3>=30000000)
		{
	 echo"<script language=javascript>alert('上传失败!请将文档中压缩至至2mb以下');</script>";
    exit();
	 }
	 if(!move_uploaded_file($tmp_name3,$upfile3))
		{
echo"<script language=javascript>alert('移动失败!请联系管理员');</script>";
exit();
}
$query3="update $sheet set position='$id.3.$ext3',state='1' where id_p=$id ";
$result3=$db->query($query3);// 把文件地址存入数据库 要分开写
}
if(is_uploaded_file($_FILES['file4']['tmp_name']) )
{
 
unlink(ROOT."/$sheet/$position3"); 
		//因为字符串的各种连接老是处理不好 所以在这里用超级笨的方法弄，等老师检查完了再用数组的方法解决
     
	  $name4=$_FILES['file4']['name'];//上传文件的文件名 
     $type4=$_FILES['file4']['type'];//传文件的类型 
    $size4=$_FILES['file4']['size'];//上传文件的大小 
     $tmp_name4=$_FILES['file4']['tmp_name'];//上传文件的临时存放路径
 $ext_array4=explode('.',$name4);
	$ext4= $ext_array4[1];
	 $upfile4=ROOT."/$sheet/$id.4.$ext4"; 
	 if(($type4!='application/octet-stream')&&($type4!='application/zip')&&($type4!='application/x-zip-compressed'))
		{
		 echo" <script language=javascript>alert('上传失败!请上传指定格式的文件');</script>";
		 exit();
		}
 if($size3>=30000000)
		{
	 echo"<script language=javascript>alert('上传失败!请将文档中压缩至至2mb以下');</script>";
    exit();
	 }
	 if(!move_uploaded_file($tmp_name4,$upfile4))
		{
echo"<script language=javascript>alert('移动失败!请联系管理员');</script>";
exit();
}
$query4="update $sheet set position='$id.4.$ext4',state='1' where id_p=$id ";
$result4=$db->query($query4);// 把文件地址存入数据库 要分开写
}
if(is_uploaded_file($_FILES['file5']['tmp_name']) )
{
unlink(ROOT."/$sheet/$position4"); 
		//因为字符串的各种连接老是处理不好 所以在这里用超级笨的方法弄，等老师检查完了再用数组的方法解决
     
	  $name5=$_FILES['file5']['name'];//上传文件的文件名 
     $type5=$_FILES['file5']['type'];//传文件的类型 
    $size5=$_FILES['file5']['size'];//上传文件的大小 
     $tmp_name5=$_FILES['file5']['tmp_name'];//上传文件的临时存放路径
	 
$ext_array5=explode('.',$name5);
	$ext5= $ext_array5[1];
	 $upfile5=ROOT."/$sheet/$id.5.$ext5"; 
	 if(($type5!='application/octet-stream')&&($type5!='application/zip')&&($type5!='application/x-zip-compressed'))
		{
		 echo" <script language=javascript>alert('上传失败!请上传指定格式的文件');</script>";
		 exit();
		}
 if($size3>=30000000)
		{
	 echo"<script language=javascript>alert('上传失败!请将文档中压缩至至2mb以下');</script>";
    exit();
	 }
	 if(!move_uploaded_file($tmp_name5,$upfile5))
		{
echo"<script language=javascript>alert('移动失败!请联系管理员');</script>";
exit();
}
$query5="update $sheet set position='$id.5.$ext5',state='1' where id_p=$id ";
$result5=$db->query($query5);// 把文件地址存入数据库 要分开写
}

if($result1||$result2||$result3||$result4||$result5)
	{
	echo "<script language=javascript>alert('更改成功!');</script>";//提示提交成功
	}
	else{
	
	echo "<script language=javascript> alert('更改失败!请联系管理员'); </script>";
	}


}
echo"
<div class='container-fluid hidden-xs' style=' margin-top:30px;' >
<form enctype='multipart/form-data' action='' method='post'>
 <table class='table table-bordered text-center table-responsive'>
 <tbody>
 <tr><td colspan='2'><strong>网格资质等级会员评审</strong></td></tr>
 <tr>
 <td>请下载文件模板:</td>
 <td><a href='webpage/$sheet/网格结构专项资质申请表.doc'>网格结构专项资质申请表</a></td>
 </tr>
<tr>
 <td colspan='2'>您上传的word格式文档:</td></tr>
 <tr>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' id='file1' name='file1'><span style='font-size:10px'>[注]：上传文件大小小于2mb <span></td>
 <td>
 <a href='webpage/$sheet/$position'>查看您已上传的word文档</a>
 </td>
 </tr>
 <tr>
 <td colspan='2'>您上传的pdf格式文档:</td> </tr>
 <tr>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' id='file2' name='file2'><span style='font-size:10px'>[注]：上传文件大小小于2mb <span></td>
 <td>
 <a href='webpage/$sheet/$position1'>查看您已上传的pdf文档</a>
 </td>
 </tr>
 <tr>
 <td colspan='2'>您上传的申请材料附件第一册:</td> </tr>
 <tr>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' id='file3' name='file3'><span style='font-size:10px'>[注]：上传文件大小小于2mb <span></td>
 <td>
 <a href='webpage/$sheet/$position2'>查看申请材料附件第一册</a>
 </td>
 </tr>
 <tr>
 <td colspan='2'>您上传的申请材料附件第二册:</td> </tr>
 <tr>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' id='file4' name='file4'><span style='font-size:10px'>[注]：上传文件大小小于2mb <span></td>
 <td>
 <a href='webpage/$sheet/$position3'>查看申请材料附件第二册</a>
 </td>
 </tr>
 <tr>
 <td colspan='2'>您上传的申请材料附件第三册:</td> </tr>
 <tr>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' id='file5' name='file5'><span style='font-size:10px'>[注]：上传文件大小小于2mb <span></td>
 <td>
 <a href='webpage/$sheet/$position4'>查看申请材料附件第三册</a>
 </td>
 </tr>
</table>
 <table class='table table-bordered table-responsive text-center'>
													<tr>
														<td colspan='12'>";
														if($info==NULL)
														{
														echo"暂无";
														}
														else
														{
														echo "$info";
														}
														echo"
														</td>
													</tr>
						</table>
<input type='hidden' value='yes' name='wang1'> ";
if($state==1||$state==7)
{//判断是否提交如提交则显示状态 状态1和7的时候可以修改  未提交则显示您尚未提交
echo"
			<div style='float: right'> <button type='submit' class='btn btn-md btn-primary'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div>";
}
  echo"
</form>
</div>";

echo"
<div class='container-fluid visible-xs' style=' margin-top:30px;'>
<form enctype='multipart/form-data' action='' method='post'>
 <table class='table table-bordered text-center table-responsive'>
 <tbody>
 <tr><td><strong>网格资质等级会员评审</strong></td></tr>
 <tr>
 <td>请下载文件模板:</td></tr>
<tr>
 <td><a href='webpage/$sheet/网格结构专项资质申请表.doc'>网格结构专项资质申请表</a></td>
 </tr>
<tr>
 <td>您上传的word格式文档:</td> </tr>
  <tr>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' id='file1' name='file1'><span style='font-size:10px'>[注]：上传文件大小小于2mb <span></td>
 </tr>
 <tr>
 <td>
 <a href='webpage/$sheet/$position'>查看您已上传的word文档</a>
</td>
 </tr>
 <tr>
 <td>您上传的pdf格式文档:</td> </tr>
  <tr>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' id='file2' name='file2'><span style='font-size:10px'>[注]：上传文件大小小于2mb <span></td>
 </tr>
 <tr>
 <td>
 <a href='webpage/$sheet/$position1'>查看您已上传的pdf文档</a>
</td>
 </tr>
  <tr>
 <td>您上传申请材料附件第一册:</td> </tr>
  <tr>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' id='file3' name='file3'><span style='font-size:10px'>[注]：上传文件大小小于2mb <span></td>
 </tr>
 <tr>
 <td>
 <a href='webpage/$sheet/$position2'>申请材料附件第一册</a>
</td>
 </tr>
  <tr>
 <td>您上传申请材料附件第二册:</td> </tr>
  <tr>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' id='file4' name='file4'><span style='font-size:10px'>[注]：上传文件大小小于2mb <span></td>
 </tr>
 <tr>
 <td>
 <a href='webpage/$sheet/$position3'>申请材料附件第二册</a>
</td>
 </tr>
  <tr>
 <td>您上传申请材料附件第三册:</td> </tr>
  <tr>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' id='file5' name='file5'><span style='font-size:10px'>[注]：上传文件大小小于2mb <span></td>
 </tr>
 <tr>
 <td>
 <a href='webpage/$sheet/$position3'>申请材料附件第一册</a>
</td>
 </tr>
</table>
<input type='hidden' value='yes' name='wang1'> 
";
if($state==1 || $state==7)//判断是否提交如提交则显示状态 状态1和7的时候可以修改  未提交则显示您尚未提交
{
	echo"
			<div style='float: right'> <button type='submit' class='btn btn-md btn-primary'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div>";
}
echo"
</form>
</div>

";

?>