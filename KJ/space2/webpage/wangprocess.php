<?php 
//上传的文件保存在webpage的wang1文件夹下，将存储位置保存在数据库wang1的position中，用户上传word版和pdf版，
define('ROOT',dirname(__FILE__));
$db=create_database();
$query="select * from $sheet where id_p=$id ";
$result=$db->query($query);
$row=$result->fetch_assoc(); 
$num_results=$result->num_rows;
$state=$row['state'];
if($num_results!=0)
{
	switch($state)
	{
	case 1:echo"<h3><span class='label label-info text-center'>提交待审核</span></h3>";exit();break;
    case 2:
    case 3:
    case 4:
    case 5:echo"<h3><span class='label label-info text-center'>处理中，不能修改</span></h3>";exit();break;
    case 6:echo"<h3><span class='label label-info text-center'>已通过审核</span></h3>";exit();break;
    case 7:echo"<h3><span class='label label-info text-center'>未通过审核</span></h3>";exit();break;
	default:break;
		}
}
if($_POST['wang1']=='yes')
{
//sate1提交待审核//这是可改进的的代码 以后要研究
//2等待专家打分
//3专家意见
//4投递给理事会
//5理事会意见反馈
//6已通过审核
//7未通过审核
/*class Filestruct//这部分放在wang1=='yes'前面
{
	public $filename;
	public $size;
	public $type;
	public $temp_url;
}


	$array=array();
	if(is_uploaded_file($_FILES['file1']['tmp_name'])&&is_uploaded_file($_FILES['file2']['tmp_name']) )
		//这一块用http://blog.csdn.net/agangdi/article/details/8351095方法会严谨一点 ，日后注意改进.
	//判断是否有文件上传如果没有显示必须上传文件并exit();
	{
     

	for($i=0;$i<=4;$i++)
	{
	 $temp=new Filestruct();
	 $temp->filename=$_FILES['file'.($i+1)]['name'];//上传文件的文件名 
	// echo $temp->filename;
	 $temp->type=$_FILES['file'.($i+1)]['type'];
	// echo $temp->type;
	 $temp->size=$_FILES['file'.($i+1)]['size'];
	// echo $temp->size;
	 $temp->temp_url=$_FILES['file'.($i+1)]['tmp_name'];
    // echo $temp->temp_url;
	 
	 $array[$i]=$temp;
	// echo $array[$i]->temp_url;

	
/*
	 $array[$name.$i]=$_FILES['file'.$i]['name'];//上传文件的文件名 
     $type.$i=$_FILES['file'.$i']['type'];//传文件的类型 
     $size.$i=$_FILES['file'.$i']['size'];//上传文件的大小 
     $tmp_name.$i=$_FILES['file.$i']['tmp_name'];//上传文件的临时存放路径}
*/ 
	
   // echo $array1[2];
   /*
    for($i=0;$i<=4;$i++)
	{
    echo $array[$i]->temp_url;
	echo 
	}
		exit();&&is_uploaded_file($_FILES['file2']['tmp_name'])&&is_uploaded_file($_FILES['file3']['tmp_name'])&&is_uploaded_file($_FILES['file3']['tmp_name']) 
*/
if(is_uploaded_file($_FILES['file1']['tmp_name'])&&is_uploaded_file($_FILES['file2']['tmp_name'])&&is_uploaded_file($_FILES['file3']['tmp_name'])&&is_uploaded_file($_FILES['file4']['tmp_name'])&&is_uploaded_file($_FILES['file5']['tmp_name']) )
		//这一块用http://blog.csdn.net/agangdi/article/details/8351095方法会严谨一点 ，日后注意改进.
	//判断是否有文件上传如果没有显示必须上传文件并exit();
	{ 
		//因为字符串的各种连接老是处理不好 所以在这里用超级笨的方法弄，等老师检查完了再用数组的方法解决
   $name1=$_FILES['file1']['name'];//上传文件的文件名 
     $type1=$_FILES['file1']['type'];//传文件的类型 
    $size1=$_FILES['file1']['size'];//上传文件的大小 
     $tmp_name1=$_FILES['file1']['tmp_name'];//上传文件的临时存放路径

	 $name2=$_FILES['file2']['name'];//上传文件的文件名 
     $type2=$_FILES['file2']['type'];//传文件的类型 
    $size2=$_FILES['file2']['size'];//上传文件的大小 
     $tmp_name2=$_FILES['file2']['tmp_name'];//上传文件的临时存放路径

	 $name3=$_FILES['file3']['name'];//上传文件的文件名 
     $type3=$_FILES['file3']['type'];//传文件的类型 
    $size3=$_FILES['file3']['size'];//上传文件的大小 
     $tmp_name3=$_FILES['file3']['tmp_name'];//上传文件的临时存放路径
	 
	  $name4=$_FILES['file4']['name'];//上传文件的文件名 
     $type4=$_FILES['file4']['type'];//传文件的类型 
    $size4=$_FILES['file4']['size'];//上传文件的大小 
     $tmp_name4=$_FILES['file4']['tmp_name'];//上传文件的临时存放路径

	  $name5=$_FILES['file5']['name'];//上传文件的文件名 
     $type5=$_FILES['file5']['type'];//传文件的类型 
    $size5=$_FILES['file5']['size'];//上传文件的大小 
     $tmp_name5=$_FILES['file5']['tmp_name'];//上传文件的临时存放路径
	 
	  $ext_array1=explode('.',$name1);
	$ext1= $ext_array1[1];
	 $ext_array2=explode('.',$name2);
	$ext2= $ext_array2[1];
	 $ext_array3=explode('.',$name3);
	$ext3= $ext_array3[1];
	$ext_array4=explode('.',$name4);
	$ext4= $ext_array4[1];
	$ext_array5=explode('.',$name5);
	$ext5= $ext_array5[1];
	
	
	 $upfile1=ROOT."/$sheet/$id.1.$ext1"; 
	 $upfile2=ROOT."/$sheet/$id.2.$ext2"; 	//存入webpage/wang1的文件夹下。名字个人用户的id
    $upfile3=ROOT."/$sheet/$id.3.$ext3"; 
	$upfile4=ROOT."/$sheet/$id.4.$ext4"; 
	$upfile5=ROOT."/$sheet/$id.5.$ext5"; 
	//echo"$upfile1,$upfile2,$upfile3,$upfile4,$upfile5";

	if(($type1!='application/msword'&&$type1!='application/vnd.openxmlformats-officedocument.wordprocessingml.document')||($type2!='application/pdf') || (($type3!='application/octet-stream')&&($type3!='application/zip')&&($type3!='application/x-zip-compressed'))|| (($type4!='application/octet-stream')&&($type4!='application/zip')&&($type4!='application/x-zip-compressed'))|| (($type5!='application/octet-stream')&&($type5!='application/zip')&&($type5!='application/x-zip-compressed')))
		{
		 echo" <script language=javascript>alert('上传失败!请上传指定格式的文件');</script>";
		 exit();
	 }
	 if(($size1>=30000000)&&($size2>30000000)&&($size3>30000000)&&($size4>30000000)&&($size5>30000000))
		{
	 echo"<script language=javascript>alert('上传失败!请将文档中压缩至至2mb以下');</script>";
    exit();
	 }
	 if((!move_uploaded_file($tmp_name1,$upfile1))||(!move_uploaded_file($tmp_name2,$upfile2))||(!move_uploaded_file($tmp_name3,$upfile3))||(!move_uploaded_file($tmp_name4,$upfile4))||(!move_uploaded_file($tmp_name5,$upfile5)))
		{
echo"<script language=javascript>alert('移动1失败!请联系管理员');</script>";
exit();
		}
		
	 if($error!=0)
		 { 
	 echo"<script language=javascript>alert('上传失败，请联系管理员');</script>";
      exit();
	 }
	}
	else{
	
	echo"<script language=javascript>alert('必须上传文件');</script>";
      exit();
	}
	$query1="select c1 from join_form where id_p = $id";
	$result1=$db->query($query1);
	$row1=$result1->fetch_assoc(); 
	$c1=$row1['c1'];

$query="insert into $sheet (c1,position,position1,position2,position3,position4,state,id_p) values ('$c1','$id.1.$ext1','$id.2.$ext2','$id.3.$ext3','$id.4.$ext4','$id.5.$ext5','1','$id')";
$result=$db->query($query);// 把文件地址存入数据库
//将状态置为1
if($result)
	{
	echo "<script language=javascript> alert('保存成功!'); location.href='http://www.cnass.org/space2/index.php?nav1=3' ;</script>";exit();//提示提交成功 然后跳转
	}
	else{
	
	echo "<script language=javascript> alert('提交失败!请联系管理员'); </script>";exit();
	}

}
echo"
<div class='container-fluid hidden-xs' style=' margin-top:30px;' >
<form enctype='multipart/form-data' action='' method='post'>
 <table class='table table-bordered text-center table-responsive'>
 <tbody>
 <tr><td colspan='2'><strong>网格资质等级会员评审</strong></td></tr>
 <tr>
 <td rowspan='4'>请下载文件模板:</td>
 <td><a href='webpage/$sheet/网格结构专项资质申请表.doc'>网格结构专项资质申请表</a></td>
 </tr>
 <tr><td><a href='webpage/$sheet/网格结构专项资质申请表.doc'>网格结构专项资质考评表（专家评审及企业自查用)</a></td></tr>
 <tr><td><a href='webpage/$sheet/中国钢结构制造企业网格结构专项资质等级标准.doc'>中国钢结构制造企业网格结构专项资质等级标准</a></td></tr>
 <tr><td><a href='webpage/$sheet/中国钢结构制造企业网格结构专项资质管理规定.doc'>中国钢结构制造企业网格结构专项资质管理规定</a></td></tr>
<tr>
 <td>请上传申请表word格式:</td>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' id='file1' name='file1'><span style='font-size:10px'>[注]：上传文件大小小于2mb <span></td>
 </tr>
 <tr>
 <td>请上传申请表pdf格式:</td>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' id='file2' name='file2'><span style='font-size:10px'>[注]：上传文件大小小于2mb <span></td>
 </tr>
  <tr>
 <td>请上传申请材料附件第一册:</td>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' id='file3' name='file3'><span style='font-size:10px'>[注]：上传文件格式为rar或zip,大小小于2mb <span></td>
 </tr>
  <tr>
 <td>请上传申请材料附件第二册:</td>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' id='file4' name='file4'><span style='font-size:10px'>[注]：上传文件格式为rar或zip,大小小于2mb <span></td>
 </tr>
  <tr>
 <td>请上传申请材料附件第三册:</td>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' id='file5' name='file5'><span style='font-size:10px'>[注]：上传文件格式为rar或zip,大小小于2mb <span></td>
 </tr>

</table>
<input type='hidden' value='yes' name='wang1'> 
			<div style='float: right'> <button type='submit' class='btn btn-md btn-primary'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div>
</form>
</div>


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
 <tr><td><a href='webpage/$sheet/网格结构专项资质申请表.doc'>网格结构专项资质考评表（专家评审及企业自查用)</a></td></tr>
 <tr><td><a href='webpage/$sheet/中国钢结构制造企业网格结构专项资质等级标准.doc'>中国钢结构制造企业网格结构专项资质等级标准</a></td></tr>
 <tr><td><a href='webpage/$sheet/中国钢结构制造企业网格结构专项资质管理规定.doc'>中国钢结构制造企业网格结构专项资质管理规定</a></td></tr>
<tr>
 <td>请上传申请表word格式:</td> </tr>
  <tr>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' ><span style='font-size:10px'>[注]：上传文件大小小于2mb <span></td>
 </tr>
 <tr>
 <td>请上传申请表pdf格式:</td> </tr>
  <tr>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file'><span style='font-size:10px'>[注]：上传文件大小小于2mb <span></td>
 </tr>
 <tr>
 <td>请上传申请材料附件第一册:</td> </tr>
  <tr>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' id='file3' name='file3'><span style='font-size:10px'>[注]：上传文件格式为rar或zip,大小小于2mb <span></td>
 </tr>
  <tr>
 <td>请上传申请材料附件第二册:</td> </tr>
  <tr>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' id='file4' name='file4'><span style='font-size:10px'>[注]：上传文件格式为rar或zip,大小小于2mb <span></td>
 </tr>
  <tr>
 <td>请上传申请材料附件第三册:</td> </tr>
  <tr>
 <td>
 <input type='hidden' name='MAX_FILE_SIZE' value='30000000'/>
 <input type='file' id='file5' name='file5'><span style='font-size:10px'>[注]：上传文件格式为rar或zip,大小小于2mb <span></td>
 </tr>
</table>
<input type='hidden' value='yes' name='wang1'> 
			<div style='float: right'> <button type='submit' class='btn btn-md btn-primary'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div>
</form>
</div>

";
?>