<?php
define('ROOT',dirname(__FILE__));
$query="select id_f from expert where id='$index'";
$result=$db->query($query);
$row=$result->fetch_assoc();
$idpm=$row['id_f'];//$idpm是pm1的id.
$query="select * from pm1 where id='$idpm'";
$result=$db->query($query);
$row=$result->fetch_assoc();
$id_pm=$row['id_p'];//$id_pm是user的id;
$upfile1=ROOT."/pm2/file";
              $a_array=scandir($upfile1,1);
              $num=$a_array->num_rows;
                for($i=0;$i<=$num;$i++)
          {
           $b_array=explode('.',$a_array[$i]);
            $id2=$b_array[0];
            if($id2==$id_pm)
           	{
            $ext=$b_array[1];//获取上传文件的文件格式，是rar还是zip
             }

          }
if($_POST['send']=='yes')
{

		$info=$_POST['info'];
		$info=addslashes($info);
		$query="update expert set info='$info',state='2' where id=$index"; //注意这里变化的是expert表的state而不是form表的,id是expert的id  .                            
		$result=$db->query($query);
         $query="update pm1 set state=8 where id=$idpm";
			$db->query($query);
		if($result)
			echo"<script language=javascript>alert('提交成功');location.href='http://www.cnass.org/space2/index.php?nav1=40;</script>";
		else 
			{
			echo "<script language=javascript>alert('提交失败，请联系管理员');</script>";
		exit();
	}

}
echo" <input id='btnPrint' class='noprint btn btn-sm btn-info' type='button' value='打印' onclick='javascript:window.print();' style='font-weight:bold; text-decoration:none;cursor:pointer;float:right;!important; cursor:hand;margin-top:10px' /> <div class='container-fluid hidden-xs'>

    <h3 class='text-center'>中国钢结构协会空间结构分会</h3>
  <h3 class='text-center'>膜结构工程项目经理申请表</h3>
  <table class='table table-bordered text-center table-responsive' >
            <tbody>
            <tr>
			<td colspan='1'>姓名</td>
            <td colspan='1'>".$row['c24']."</td>
            <td colspan='1'>性别</td>
			 <td colspan='1'>".$row['c25']."</td>
      <td colspan='1'>出生日期</td>
			 <td colspan='1'>".$row['c26']."</td>
			 <td colspan='1' rowspan='6'><img style='width:100%' src='webpage/pm2//$id_pm.jpg'/></td>
			</tr>
<tr>
			<td colspan='1'>专业</td>
            <td colspan='1'>".$row['c27']."</td>
            <td colspan='1'>学位/学历</td>
			 <td colspan='1'>".$row['c28']."</td>
      <td colspan='1'>毕业时间</td>
			 <td colspan='1'>".$row['c29']."</td>
			</tr>
			<tr>
			<td colspan='1'>职称</td>
            <td colspan='1'>".$row['c30']."</td>
			<td colspan='1'>发证时间</td>
            <td colspan='1'>".$row['c31']."</td>
			<td colspan='1'>证书编号</td>
            <td colspan='1'>".$row['c32']."</td>

           
			</tr>
			<tr>
			<td colspan='1'>现工作单位</td>
            <td colspan='3'>".$row['c33']."
			</td>
            <td colspan='1'>入职时间</td>
			 <td colspan='1'>".$row['c34']."</td>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>膜结构工程从业年限</td>
            <td colspan='3' rowspan='2'>".$row['c35']."</td>
            <td colspan='1'>第一申请级别</td>
			
			 <td colspan='1'>".$row['c36']."</td>
			 <tr>
 <td colspan='1'>第二申请级别</td>
			
			 <td colspan='1'>".$row['c37']."</td>
			 </tr>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>工作经历</td>
            <td colspan='1'>工作时间</td>
			<td colspan='4'>工作单位</td>
			<td colspan='1'>岗位/职务</td>
			<tr>
			<td>
			".$row['c38']."
			</td>
			<td colspan='4'>
			".$row['c39']."
			</td>
			<td colspan='1'>
			".$row['c40']."
			</td>
			</tr>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>作为项目负责人承担的Ⅰ(Ⅱ)级项目</td>
             <td colspan='3'>项目名称</td>
			   <td colspan='2'>项目级别</td>
               <td colspan='1'>竣工时间</td>
			   <tr>
			   <td colspan='3'>".$row['c41']."</td>
			   <td colspan='2'>".$row['c42']."</td>
               <td colspan='1'>".$row['c43']."</td>
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
			<td colspan='1'>".$row['c44']."</td>
			<td colspan='1'>联系方式</td>
			<td colspan='2'>".$row['c45']."</td>
             <td colspan='1'>填表时间</td>
			<td colspan='1'>".$row['c46']."</td>
			</tr>
			<tr>
			<td colspan='1'>申请人所在单位意见</td>
			<td colspan='6'>".$row['c47']."</td>
			</tr>
			<tr>
			<td colspan='1'>其他申请材料</td>
			<td colspan='6'><a href='webpage/pm2/file/$id_pm.$ext'>点击请下载</a></td>
			</tr>
           
			</tbody>
			</table>

</div>



<div class='visible-xs container-fluid'>
<h5 class='text-center'><strong>中国钢结构协会空间结构分会</strong></h5>
<h5 class='text-center'><strong>膜结构工程项目经理申请表</strong></h5>
<table class='table table-bordered text-center table-responsive' style='font-size:14px'>
 <tbody>
 <tr>
 <td colspan='1'>姓名</td>
 <td colspan='2'>".$row['c24']."</td>
 </tr>
 <tr>
 <td colspan='1'>性别</td>
 <td colspan='2'>".$row['c25']."</td>
 </tr>
 <tr>
 <td colspan='1'>出生日期</td>
 <td colspan='2'>".$row['c26']."</td>
 </tr>
 <tr>
 <td colspan='1'>一寸照片上传</td>
 <td colspan='2'><img style='width:100%' src='webpage/pm2//$id_pm.jpg'/></td>
 </tr>
<tr>
 <td colspan='1'>专业</td>
 <td colspan='2'>".$row['c27']."</td>
 </tr>
 <tr>
 <td colspan='1'>学位/学历</td>
<td colspan='2'>".$row['c28']."</td>
 </tr>
 <tr>
 <td colspan='1'>毕业时间</td>
<td colspan='2'>".$row['c29']."</td>
 </tr>
  <tr>
 <td colspan='1'>职称</td>
<td colspan='2'>".$row['c30']."</td>
 </tr>
 <tr>
 <td colspan='1'>发证时间</td>
<td colspan='2'>".$row['c31']."</td>
 </tr>
  <tr>
 <td colspan='1'>证书编号</td>
<td colspan='2'>".$row['c32']."</td>
 </tr>
 <tr>
 <td colspan='1'>现工作单位</td>
<td colspan='2'>".$row['c33']."</td>
 </tr>
 <tr>
 <td colspan='1'>入职时间</td>
<td colspan='2'>".$row['c34']."</td>
 </tr>
 <tr>
 <td colspan='1'>膜结构工程从业年限</td>
<td colspan='2'>".$row['c35']."</td>
 </tr>
  <tr>
 <td colspan='1'>第一申请级别</td>
<td colspan='2'>".$row['c36']."</td>
 </tr>
  <tr>
 <td colspan='1'>第二申请级别</td>
<td colspan='2'>".$row['c37']."</td>
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
 <td colspan='1'>".$row['c38']."</td>
 <td colspan='1'>".$row['c39']."</td>
 <td colspan='1'>".$row['c40']."</td>
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
 <td colspan='1'>".$row['c41']."</td>
 <td colspan='1'>".$row['c42']."</td>
 <td colspan='1'>".$row['c43']."</td>
 </tr>
 <tr>
<td colspan='1'>申请人承诺</td>
<td colspan='2' style='font-family:仿宋;font-size:14px;'>本人承诺：该表所填内容属实，如与事实不符，本人自愿放弃申报资格。
<br>
</td>
</tr>
<tr>
			<td colspan='1'>填表人</td>
			<td colspan='2'>".$row['c44']."</td></tr>
			<tr>
			<td colspan='1'>联系方式</td>
			<td colspan='2'>".$row['c45']."</td></tr>
<tr>
             <td colspan='1'>填表时间</td>
			<td colspan='2'>".$row['c46']."</td>
			</tr>
			<tr>
			<td colspan='3'>申请人所在单位意见</td></tr>
				<tr>
			<td colspan='3'>".$row['c47']."</td>
			</tr>
			<tr>
			<td colspan='1'>其他申请材料</td>
			<td colspan='2'><a href='webpage/pm2/file/$id_pm.$ext'>点击请下载</a></td>
			</tr>
 </tbody>
 </table>
</div>
<div class='container-fluid'>
<form enctype='multipart/form-data' action='' method='post'>
<table class='table table-bordered text-center table-responsive'>
<tr>
<td>
<textarea type='text' class='form-control' rows='3' name='info'>请输入您的意见</textarea>
</td>
</tr>
<input type='hidden' value='yes' name='send'>
</table>
<div style='float: right; margin-top:10px'> <button type='submit' class='btn btn-md btn-primary noprint'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div></form></div>

";
?>