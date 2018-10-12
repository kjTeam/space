<?php
include_once '../index/include/function.php'
?>
<?php
//只是管理员查看企业膜经理培训申请表的界面
define('ROOT',dirname(__FILE__));
$index=$_GET['index'];
 $query="select * from pm1 where id=$index";
				$result=$db->query($query);
				$row=$result->fetch_assoc(); 
				$state=$row['state'];
				$id_pm=$row['id_p'];//企业膜经理的个人id
				if($_POST['send']=='yes')
				{
			if(is_uploaded_file($_FILES['file1']['tmp_name']))
	{
     $name=$_FILES['file1']['name'];//上传文件的文件名 
     $type=$_FILES['file1']['type'];//上传文件的类型 
     $tmp_name=$_FILES['file1']['tmp_name'];//上传文件的临时存放路径
	   $upfile=ROOT."/pm_inform//$id_pm.doc"; 
	   
      if(!move_uploaded_file($tmp_name,$upfile))
		{
		unlink($upfile);
       echo"<script language=javascript>alert('移动失败');</script>";
          exit();
		}
		}
			$result1=$_POST['result1'];
			$info=$_POST['info'];
            $query = "update pm1 set state='$result1',info='$info' where id=$index";
		    $result=$db->query($query);
			switch ($result1)//这是给用户发邮件时的内容，3月1日更改。
			{
              case 0 : $body="很抱歉管理员没有同意您的培训班申请";break;
			  case 2 : $body="管理员通过了您的培训班申请，具体反馈信息请前往网站中查看";break;
			  case 4 : $body="很抱歉您未通过培训";break;
			  case 5 : $body="您已通过培训，具体反馈信息请前往网站中查看";break;
              default: break;
			}
			if($result)
		    {
				//3月1日更改
				echo"<script language=javascript>alert('提交成功');</script>";
                 $query3="select name,email from user where id = $id_pm";
                 $result3=$db->query($query3);
                 $row3=$result3->fetch_assoc(); 
		         $PD['1']=$row3['name'];
		         $DF['1']=$row3['email'];
                 sendMail($PD,$DF,"空间结构分会-膜经理培训班报名情况反馈通知",$body,1);
				echo"<script language=javascript>location.href='http://www.cnass.org/space2/index.php?nav1=10';</script>";	 
			}
			else{
			
			echo"<script language=javascript>alert('提交失败');</script>";
			
			}
				 exit();
				
				}
  
 switch($state)
	{
	  case 1:echo"<h3><span class='label label-info noprint'>该用户提交待审核</span></h3>";break;
	  case 2:echo"<h3><span class='label label-info noprint'>您已同意培训，等待对方确认</span></h3>";break;
	  case 3:echo"<h3><span class='label label-info noprint'>对方已确认培训</span></h3>";break;
       default:break;
    }
    $r=1;
    $t=$id_pm;
	include_once"print_pm.php";	
	echo"
	<div class='container-fluid'>
   <form enctype='multipart/form-data' action='' method='post'>
	 <table class='table table-bordered text-center table-responsive noprint' style='font-size:14px'>
			 <tr>
				<td colspan='7'>
					<select class='form-control' data-style='btn-primary' name='result1' id='result1'>
							<option value='2'> 同意培训</option>
							<option value='0'> 不同意培训</option>
							<option value='4'> 未通过培训</option>
							<option value='5'> 通过培训</option>
					</select>

			</tr>
			<tr>
<td colspan='2'>给用户的反馈意见</td>
			<td colspan='5'><textarea type='text' class='form-control' rows='2' name='info'>".$row['info']."</textarea></td>
			</tr>
			<tr>
<td colspan='2'>给用户的反馈文件</td>
			<td colspan='5'><input type='file' id='file1' name='file1'></td>
			</tr> 
			 </table>
<input type='hidden' name='send' value='yes'>	
			<div style='float: right'> <button type='submit' class='btn noprint btn-md btn-primary'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div>
</form>
</div>	";		
				
							
				
?>