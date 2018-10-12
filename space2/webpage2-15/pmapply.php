<?php//一共有23个参数
$db=create_database();
$query="select * from pm1 where id_p=$id";
$result=$db->query($query);
$num_results=$result->num_rows;
if($num_results)	
{
	$row=$result->fetch_assoc(); 
	 echo"<h3><span class='label label-info'>";
	switch ($row['state'])
	{       
			case 1: echo "提交待审核";exit();break;//提交待审核
			case 2:	echo "以通过审核，请查看通知";exit();break;//管理员同意
			case 3:	echo "未通过审核,请联系管理员";exit();break;//管理未同意
			default: echo "出错";exit();break;
						
	}
	echo"</span></h3>";
}

if($_POST["p24"]=='pm1') //检测是否是此表单提交
{
	
	for($i=1;$i<24;$i++)
	{
		$str="p".$i;
		$PA[$i]=$_POST[$str];		
	}
	$result=insert("mo1",23,$PA,$id);
	define('ROOT',dirname(__FILE__)); //用于上传文件
	   $upfile1=ROOT."\pm1\\$id.jpg"; 
	move_uploaded_file($_FILES['file1']['tmp_name'], $upfile1);
	if($result) {echo "<h3><span class='label label-success'>保存成功！</span><h3>";exit();}
	else echo "<h3><span class='label label-danger'>出现问题，请联系管理员</span><h3>";

}
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
			 <input type='file' class='form-control' name='file1' id='file1' ></td>
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
            <td colspan='3'><input type='text' class='form-control' name='p8'></td>
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
			<input type='hidden' value='pm1' name='p24'> 
			<div style='float: right'> <button type='submit' class='btn btn-md btn-primary'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div>
</form>
</div>


";


?>