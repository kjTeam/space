<?php
$db=create_database();
include('send.php');
if($_POST["inform"]=='yes')
{
$content=$_POST['content'];
$category=$_POST['category'];
$query = "replace into inform2 (category, content) values ('".$category."' ,'".$content."')";
$result=$db->query($query);
if($result)
{
 echo" <script language=javascript>alert('上传成功！');</script>";
 switch($category)
	{
     case 1:send_message($content,100);break;//企业用户
	 case 2:send_message($content,107);break;//秘书处用户
	 case 3:send_message($content,109);break;//专家用户
	 case 4:send_message($content,108);break;//理事会用户
	 case 5:send_message($content,110);break;//管理员用户
	 case 6:send_message($content,111);break;//企业经理
      default:break;
     }
 
 //send_message($content);
}
else
{
echo" <script language=javascript>alert('很抱歉，上传失败！');</script>";
}
}
?>
<form class='form-signin' action=' ' method='post'>
<table class='table table-bordered table-responsive text-center' style='margin-top:22px'>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>增加公告</lead></th>
        </tr>
        <tr>
            <td colspan='10'> 
			请选择公告的对象：
			<select class='form-control' name='category'>
             <option value='1'>企业用户</option>
              <option value='3'>专家用户</option>
              <option value='2'>秘书处用户</option>
              <option value='4'>理事会用户</option>
			  <option value='5'>管理员用户</option>
			   <option value='6'>企业经理</option>
</select>
</td>
        </tr>
		<tr>
            <td colspan='4'> 公告内容</td>
            <td colspan='10'> <textarea type='text' class='form-control' name='content' rows=10></textarea></td>
        </tr>
		
</table>
	<div style='text-align: right;margin-bottom: 2%'>
	<input type='hidden' name='inform' value='yes'>
		<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
	</div>
</form>
</body>
</html>