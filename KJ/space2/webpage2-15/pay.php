<?php
$query="select id,state from join_form where id_p='$id' ";
$result=$db->query($query);
$num_results=$result->num_rows; //注意变量名有s
if($num_results==0) {echo "<h4><span class='label label-danger'>尚未提交入会申请表！</span></h4>"; exit();} //如果没有提交申请表直接退出
else 
{
	$row=$result->fetch_assoc();
	if($row['state']==1||$row['state']==2||$row['state']==3||$row['state']==4||$row['state']==5) {
		echo "<h4><span class='label label-danger'>入会申请表尚未审核通过</span></h4>"; exit();}//管理员还没有通过
	$id_f=$row['id'];
}




 define('ROOT',dirname(__FILE__)); //用于上传文件
if($_POST["pay"]=='yes') //检测是否是此表单提交
{
	if($_FILES['userfile']['tmp_name']!='')
	{
			$upfile=ROOT."/pay1//$id_f.jpg";   //保存上传文件的路径：index所在目录/webpage/join_form/id号
			move_uploaded_file($_FILES['userfile']['tmp_name'],$upfile);  //移动该文件至指定目录 注意此处保存的文件已加上后缀jpg
			$query="update join_form set state=7 where id=$id_f";
			$result=$db->query($query);
			echo "<h4><span class='label label-success'>上传成功！</span></h4>";
	}
	else
	{
		echo  "<h4><span class='label label-danger'>请选择上传内容！</span></h4>";
	}
	
}

	
	echo "
	<form enctype='multipart/form-data' action='' method='post'>
		<input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
		<label for='userfile'> 上传缴费凭证</label>
		<input type='file' style='margin:auto; width:80%;' name='userfile' id='userfile'/>	
		<div style='text-align: right;margin-bottom: 2%'>
		<input type='hidden' value='yes' name='pay'>
		<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交 &nbsp; &nbsp;
		</button>
		</div>
	</form>
	";
?>