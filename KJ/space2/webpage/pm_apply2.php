<?php include_once '../index/include/function.php' ?>
<?php
//这是项目经理申请表格，和pm_apply1绑定的是一个数据库，多出来的发证时间、证书编号、申请人所在单位意见、填表时间、申请状态分别对应数据库中的C24 C25 C26 C27 state2.
control(7);
define('ROOT',dirname(__FILE__));
$db=create_database();
$query="select * from pm1 where id_p=$id ";
$result=$db->query($query);
$num_results=$result->num_rows;
if($num_results)	
{
	$row=$result->fetch_assoc(); 
	switch ($row['state2'])
	{
             case 1://已提交
			 case 2: //给专家打分
			 echo "<h3><span class='label label-info text-center'>已提交，等待管理员审核</span></h3>";break;
             case 3://专家意见反馈
		     echo "<h3><span class='label label-info text-center'>已提交，等待管理员审核</span></h3>";break;
            case 4: //通过审核
				echo "<h3><div class='label label-info text-center'>您已通过审核,级别：".$row['result'].",证书编号：".$row['number']."</div></h3>";break;
				case 5: //未通过审核
				echo "<h3><span class='label label-info text-center'>您未通过审核，请联系管理员</span></h3>";break;
			      default:break;
	}
}

if($_POST["pm2"]=='yes') //检测是否是此表单提交
{
	if(is_uploaded_file($_FILES['file1']['tmp_name']))
	{
     $name=$_FILES['file1']['name'];//上传文件的文件名 
     $type=$_FILES['file1']['type'];//上传文件的类型 
     $size=$_FILES['file1']['size'];//上传文件的大小 
     $tmp_name=$_FILES['file1']['tmp_name'];//上传文件的临时存放路径
	 $upfile=ROOT."/pm1/photo//$id.jpg"; 
	 if(file_exists($upfile))
		 unlink($upfile);
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
	//else{
	
	//echo"<script language=javascript>alert('必须上传一寸照片');</script>";
    //  exit();
	//}

	if(is_uploaded_file($_FILES['file2']['tmp_name']))
	{
     $name1=$_FILES['file2']['name'];//上传文件的文件名 
     $type1=$_FILES['file2']['type'];//上传文件的类型 
     $size1=$_FILES['file2']['size'];//上传文件的大小 
     $tmp_name1=$_FILES['file2']['tmp_name'];//上传文件的临时存放路径
	 $ext_array=explode(".",$name1);
	 $ext=$ext_array[1];
	 $upfile1=ROOT."/pm2/file//$id.$ext"; 

    if(file_exists($upfile1))
		 unlink($upfile1);
	 if($type1!='application/octet-stream'&&$type!='application/zip'&&$type!='image/x-zip-compressed')
		{
		 echo" <script language=javascript>alert('上传失败!必须上传zip、rar格式');</script>";
		exit();
	 }
	 if($size>=30000000)
		{
	 echo"<script language=javascript>alert('上传失败!文件大小需在20M以下');</script>";
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
		 if(isset($row['id_p']))
	     	{
		   $query="update pm1 set position='$id.$ext' where id_p='$id'";
			}
			else
	     	{
			 $query="insert into pm1('position','id_p') values = ('$id.$ext','$id')";
			}
		  $result=$db->query($query);
		  if($result==NULL)
			{ 
	        echo"<script language=javascript>alert('失败，请联系管理员');</script>";
            exit();
	        }    
	}
	/*else{
	
	echo"<script language=javascript>alert('必须上传附件');</script>";
      exit();
	}*/
  if(is_uploaded_file($_FILES['file3']['tmp_name']))
	{
     $name3=$_FILES['file3']['name'];//上传文件的文件名 
     $type3=$_FILES['file3']['type'];//上传文件的类型 
     $size3=$_FILES['file3']['size'];//上传文件的大小 
     $tmp_name3=$_FILES['file3']['tmp_name'];//上传文件的临时存放路径
	 $upfile3=ROOT."/pm2/pay//$id.jpg"; 
	  if(file_exists($upfile3))
		 unlink($upfile3);
	 if($type3!='image/pjpeg'&&$type3!='image/jpeg'&&$type3!='image/png'&&$type3!='image/x-png')
		{
		 echo" <script language=javascript>alert('上传失败!必须上传pjpeg、jpeg或png格式');</script>";
		 exit();
	 }
	 if($size3>=500000)
		{
	 echo"<script language=javascript>alert('上传失败!请将照片压缩至30K以下');</script>";
     exit();
	 }
	 if(!move_uploaded_file($tmp_name3,$upfile3))
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
	   for($i=1;$i<25;$i++)
	  {
		$str="p".$i;
		$PA[$i]=$_POST[$str];		
	  }
      $query2="select id from join_form where c1='$PA[8]'";
	  $result2=$db->query($query2);
	  $row2=$result2->fetch_assoc(); 
	  $id_f=$row2['id'];
	  $db=create_database();
	  for($i=1;$i<28;$i++)
	  {
		$str="p".$i;
		$PA[$i]=$_POST[$str];
		$PA[$i]=addslashes($PA[$i]);
	   }
		//$p23=$PA[23];因为之前将附件的地址插入到数据库中了，所以这里用更新
        if(!isset($row['state2']))
			 $flag=1;
		$query="update pm1 set ";
		   for($i=1;$i<28;$i++)
	       {
			 $query=$query.'c'.$i."='".$PA[$i]."',";	
	       }
	       $query=$query.'id_f='.$id_f.",state2='1' where id_p=$id";
	       $result=$db->query($query);	
           if(!isset($result)) 
			   {
		        echo "<script language=javascript> alert('保存失败!请联系管理员'); </script>";exit();
		        }
	         else
		        {
	    	      echo "<script language=javascript> alert('保存成功!')</script>"; 
				  if($flag==1)
					{
                      $query3="select name,email from user where category = 5";
                      $result3=$db->query($query3);
	                  $num_results3=$result3->num_rows;
	                  for($i=1;$i<=$num_results3;$i++)
		              {
                       $row3=$result3->fetch_assoc(); 
		               $PD[$i]=$row3['name'];
		               $DF[$i]=$row3['email'];
	                  }
		              $body=$PA['1']."向您投递了企业膜经理申请表，请及时处理";
		              sendMail($PD,$DF,"空间结构分会-企业膜经理申请情况通知",$body, $num_results3);	
				   }
				 echo"<script language='javascript'>location.href='http://www.cnass.org/space2/index.php?nav1=61&nav2=57';</script>";	
		       }
    }
echo"

<div class='container-fluid hidden-xs'>
<div class='col-xs-12' style='background-image:url(titlebackground.jpg);font-size:1.3em;padding:0.2em;margin-top:22px;'>
<strong>基本信息</strong>
</div>
<form enctype='multipart/form-data' action='' method='post'>
 <table class='table table-bordered text-center table-responsive'>
            <tbody>
            <tr>
			<td colspan='1' ><span style='color:red'>*</span>姓名</td>
            <td colspan='1'><input type='text' class='form-control input-mini' name='p1' value=".$row['c1']."></td>
            <td colspan='1' ><span style='color:red'>*</span>性别</td>
			 <td colspan='1'><input type='text' class='form-control' name='p2' value=".$row['c2']."></td>
			  <td colspan='1' rowspan='8' width='200px' hight='280px'>一寸照片上传处
			 <input type='file' class='form-control' name='file1' id='file1'><p style='color:red'><small>备注：格式为pjpeg、jpeg或png格式，大小小于30k</small></p>
			<img  width='150px' hight='210px' src='webpage/pm1/photo//$id.jpg'/></td></tr>

<tr>
			<td colspan='1' ><span style='color:red'>*</span>出生日期</td>
            <td colspan='1'><input type='text' class='form-control input-mini' name='p3' value=".$row['c3']."></td>
            <td colspan='1' ><span style='color:red'>*</span>专业</td>
			 <td colspan='1'><input type='text' class='form-control' name='p4' value=".$row['c4']."></td>
			  </tr>
			  <tr>
			<td colspan='1'><span style='color:red'>*</span>学位/学历</td>
            <td colspan='1'><input type='text' class='form-control input-mini' name='p5' value=".$row['c5']."></td>
            <td colspan='1'><span style='color:red'>*</span>毕业时间</td>
			 <td colspan='1'><input type='text' class='form-control' name='p6' value=".$row['c6']."></td>
			  </tr>
			   <tr>
			   <td colspan='1'><span style='color:red'>*</span>职称</td>
			 <td colspan='3'><input type='text' class='form-control' name='p7' value=".$row['c7']."></td></tr>
			  <tr>
			<td colspan='1'><span style='color:red'>*</span>发证时间</td>
            <td colspan='1'><input type='text' class='form-control input-mini' name='p24' value=".$row['c24']."></td>
            <td colspan='1'><span style='color:red'>*</span>证书编号</td>
			 <td colspan='1'><input type='text' class='form-control' name='p25' value=".$row['c25']."></td>
			  </tr>
			 
			 
			 <tr>
			<td colspan='1'><span style='color:red'>*</span>现工作单位</td>
            <td colspan='3'>
			<select name='p8' id='p8' class='form-control'>";
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
			 <td colspan='1'><input type='text' class='form-control' name='p26' value=".$row['c26']."></td>
			  </tr>
            <tr>
			<td colspan='1' ><span style='color:red'>*</span>申请人所在单位意见</td>
            <td colspan='5'><input type='text' class='form-control input-mini' name='p27' value=".$row['c27']."></td></tr>
			<tr>
			<td colspan='1' ><span style='color:red'>*</span>请下载装订目录</td>
            <td colspan='5'><a href='webpage/pm2/膜结构工程项目经理申请材料装订目录.doc'>膜结构工程项目经理申请材料装订目录</a></td></tr>
			<tr>
			<td colspan='1' ><span style='color:red'>*</span>请上传附件</td>
            <td colspan='5'>	
			<input type='file' class='form-control' name='file2' id='file2'>
			<p style='color:red'><small>[备注]：格式为rar或zip,文件大小在15m以下。</small></p>
			</td>
			</tr>
			
</table>
<div class='col-xs-12' style='background-image:url(titlebackground.jpg);font-size:1.3em;padding:0.2em;'>
<strong>请上传缴费凭证</strong> <span style='color:red'><small>[备注]：格式为pjpeg、jpeg或png格式，大小小于30k</small></span>
</div>
 <table class='table table-bordered text-center table-responsive'>
   <tbody>
      <tr>
	  <td>
        <input type='file' class='form-control' name='file3' id='file3'>
        <img  src='webpage/pm2/pay//$id.jpg'/>
	  </td></tr>
</tbody></table>
<input type='hidden' value='yes' name='pm2'> 
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
 <td>一寸照片上传<p><small>[备注]：格式为pjpeg、jpeg或png格式，大小小于30k</small></p></td>
 <td colspan='2'>
			 <input type='file' class='form-control' name='file1' id='file1' >
			  <img width='160px' hight='210px' src='webpage/pm1/photo//$id.jpg'>
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
<td colspan='2'><select name='p8' id='p8' class='form-control'>";
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
			<td colspan='3'>请下载装订目录</td></tr>
				<tr>
			<td colspan='3'><a href='webpage/pm2/膜结构工程项目经理申请材料装订目录.doc'>膜结构工程项目经理申请材料装订目录</a>
			</td>
		</tr>	
		<tr>
			<td colspan='3'>请上传附件<p style='color:red'><small>[备注]：格式为rar或zip,文件大小在1m以下。</small></p></td></tr>
				<tr>
			<td colspan='3'>
			<input type='file' class='form-control' name='file2' id='file2'>
			
			</td>
		</tr>	
		<tr>
			<td colspan='3'>请上传缴费凭证<p style='color:red;'><small>备注：格式为pjpeg、jpeg或png格式，大小小于30k</small><p></td></tr>
				<tr>
			<td colspan='3'>
            <input type='file' id='file3' name='file3'>
			 <img with='150px' hight='210px' src='webpage/pm2/pay//$id.jpg'>
			</td>
		</tr>				
</tbody>
</table>
<input type='hidden' value='yes' name='pm2'> 
<div style='float: right'> <button type='submit' class='btn btn-md btn-primary'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div>
  </form>
</div>

";


?>