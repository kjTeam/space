<?php
	$index=$_GET['index'];
$query="select state from join_form where id=$index";
$result=$db->query($query);
$row=$result->fetch_assoc();
if($row['state']!=7||$row['state']!=8)
{
	echo "<h3><span class='label label-danger'>连接过期！</span></h3>";
	exit();
}


if($_POST['send']=='yes')
{
	if($_POST['judge']=='1') $query="update join_form set state=4 where id=$index";
	else $query="update join_form set state=9 where id=$index";
	$result=$db->query($query);
	echo "<h3><span class='label label-success'>保存成功！</span></h3>";
	exit();
}


echo "
		<form enctype='multipart/form-data' action='' method='post'>
		<table class='table table-bordered table-responsive text-center'>
		<tr>
            <th colspan='12' style='text-align:center;'><lead>缴费凭证</lead></th>
        </tr>
			<tr>
				<td colspan='12'>
				<img style='width:100%' src='webpage/pay1/".$index.".jpg'/>
				</td>
			</tr>
			<tr>
				<td colspan='2' >评审结果：</td>
				<td colspan='10'>
					<select class='form-control' data-style='btn-primary' name='judge'>
							<option value='1'> 同意！</option>
							<option value='2'> 不同意！</option>
					</select>
				</td>
			</tr>			
		</table>
			<div style='text-align: right;margin-bottom: 2%'>
				<input type='hidden' value='yes' name='send'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交 &nbsp; &nbsp;
				</button>
			</div>
		</form>	";

?>