
<?php
//这里存放的是膜经理培训申请表和膜经理申请表的查看和打印,这里定义一个参数$r,当$r是1的时候，输出的是培训申请表，当$r是2的时候，输出的是经理申请表。这个参数$t在膜经理系统里是$id,在管理员系统里是通过$index query出的$id_p。
switch ($r)
{
case 1:
	echo"
<div class='container-fluid hidden-xs noprint'>
		<input id='btnPrint' class='noprint btn btn-info' type='button' value='打印' onclick='javascript:window.print();' style='font-weight:bold; margin-right:2em;text-decoration:none;cursor:pointer;float:right;!important; cursor:hand'/>
<form enctype='multipart/form-data' action='' method='post'>
    <h3 class='text-center'>中国钢结构协会空间结构分会</h3>
  <h3 class='text-center'>膜结构工程项目经理培训班报名表</h3>
  <table class='table table-bordered text-center table-responsive'>
            <tbody>
            <tr>
			<td colspan='1'>姓名</td>
            <td colspan='1'>".$row['c1']."</td>
            <td colspan='1'>性别</td>
			 <td colspan='1'>".$row['c2']."</td>
      <td colspan='1'>出生日期</td>
			 <td colspan='1'>".$row['c3']."</td>
			 <td colspan='1' rowspan='6'>
			 <img  width='150px' hight='210px' src='webpage/pm1/photo//$t.jpg'/></td>
			</tr>
<tr>
			<td colspan='1'>专业</td>
            <td colspan='1'>".$row['c4']."</td>
            <td colspan='1'>学位/学历</td>
			 <td colspan='1'>".$row['c5']."</td>
      <td colspan='1'>毕业时间</td>
			 <td colspan='1'>".$row['c6']."</td>
			</tr>
			<tr>
			<td colspan='1'>职称</td>
            <td colspan='5'>".$row['c7']."</td>
           
			</tr>
			<tr>
			<td colspan='1'>现工作单位</td>
            <td colspan='3'>
			".$row['c8']."
			  </td>
            <td colspan='1'>入职时间</td>
			 <td colspan='1'>".$row['c9']."</td>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>膜结构工程从业年限</td>
            <td colspan='3' rowspan='2'>".$row['c10']."</td>
            <td colspan='1'>第一申请级别</td>
			
			 <td colspan='1'>".$row['c11']."</td>
			 <tr>
 <td colspan='1'>第二申请级别</td>
			
			 <td colspan='1'>".$row['c12']."</td>
			 </tr>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>工作经历</td>
            <td colspan='2'>工作时间</td>
			<td colspan='3'>工作单位</td>
			<td colspan='1'>岗位/职务</td>
			<tr>
			<td colspan='2'>
			<textarea type='text' class='form-control noborder-input' rows='6' name='p13' >".$row['c13']."</textarea>
			</td>
			<td colspan='3'>
			<textarea type='text' class='form-control noborder-input'' rows='6' name='p14' >".$row['c14']."</textarea>
			</td>
			<td colspan='1'>
			<textarea type='text' class='form-control noborder-input'' rows='6' name='p15' >".$row['c15']."</textarea>
			</td>
			</tr>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>作为项目负责人承担<br>的Ⅰ(Ⅱ)级项目</td>
             <td colspan='3'>项目名称</td>
			   <td colspan='2'>项目级别</td>
               <td colspan='1'>竣工时间</td>
			   <tr>
			   <td colspan='3'><textarea type='text' class='form-control noborder-input'' rows='6' name='p16'>".$row['c16']."</textarea></td>
			   <td colspan='2'><textarea type='text' class='form-control noborder-input'' rows='6' name='p17'>".$row['c17']."</textarea></td>
               <td colspan='1'><textarea type='text' class='form-control noborder-input'' rows='6' name='p18'>".$row['c18']."</textarea></td>
			   </tr>
			</tr>
			<tr>
			<td colspan='1'>是否需要预订住宿</td>
			<td colspan='6'>".$row['c19']."</td>
			</tr>
			<tr>
			<td colspan='1'>填表人</td>
			<td colspan='1'>".$row['c20']."</td>
			<td colspan='1'>联系方式</td>
			<td colspan='2'>".$row['c21']."</td>
             <td colspan='1'>填表时间</td>
			<td colspan='1'>".$row['c22']."</td>
			</tr>
			<tr>
			<td colspan='1'>申请人所在单位意见</td>
			<td colspan='6'>".$row['c23']."</td>
			</tr>
			<tr>
		 
		 	<tr>
			<td colspan='1'>上传缴费凭证</td>
			<td colspan='6'><img width='300px' src='webpage/pm1/pay//$t.jpg'></td>
			</tr>
		 </tbody>
		 </table>
</form>
</div>
<div class='visible-xs container-fluid noprint'>
<input id='btnPrint' class='noprint btn btn-info' type='button' value='打印' onclick='javascript:window.print();' style='font-weight:bold; margin-top:-2em;text-decoration:none;cursor:pointer;float:right;!important; cursor:hand'/>
<form class='noprint' enctype='multipart/form-data' action='' method='post'>
  <h4 class='text-center'>中国钢结构协会空间结构分会</h4>
  <h4 class='text-center'>膜结构工程项目经理培训班报名表</h4>
<table class='table table-bordered text-center table-responsive noprint' style='font-size:14px'>
 <tbody>
 <tr>
 <td colspan='1'>姓名</td>
 <td colspan='2'>".$row['c1']."</td>
 </tr>
 <tr>
 <td colspan='1'>性别</td>
 <td colspan='2'>".$row['c2']."</td>
 </tr>
 <tr>
 <td colspan='1'>出生日期</td>
 <td colspan='2'>".$row['c3']."</td>
 </tr>
 <tr>
 <td colspan='1'>一寸照片上传</td>
 <td  colspan='2'> <img  width='70px'src='webpage/pm1/photo//$t.jpg'/></td>
 </tr>
<tr>
 <td colspan='1'>专业</td>
 <td colspan='2'>".$row['c4']."</td>
 </tr>
 <tr>
 <td colspan='1'>学位/学历</td>
<td colspan='2'>".$row['c5']."</td>
 </tr>
 <tr>
 <td colspan='1'>毕业时间</td>
<td colspan='2'>".$row['c6']."</td>
 </tr>
  <tr>
 <td colspan='1'>职称</td>
<td colspan='2'>".$row['c7']."</td>
 </tr>
  <tr>
 <td colspan='1'>现工作单位</td>
<td colspan='2'>".$row['c7']."
</td>
 </tr>
 <tr>
 <td colspan='1'>入职时间</td>
<td colspan='2'>".$row['c9']."</td>
 </tr>
  <tr>
 <td colspan='1'>膜结构工程从业年限</td>
<td colspan='2'>".$row['c10']."</td>
 </tr>
  <tr>
 <td colspan='1'>第一申请级别</td>
<td colspan='2'>".$row['c11']."</td>
 </tr>
  <tr>
 <td colspan='1'>第二申请级别</td>
<td colspan='2'>".$row['c12']."</td>
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
 <td colspan='1'><textarea type='text' class='form-control noborder-input' rows='5' name='p13' >".$row['c13']."</textarea></td>
 <td colspan='1'><textarea type='text' class='form-control noborder-input' rows='5' name='p14'>".$row['c14']."</textarea></td>
 <td colspan='1'><textarea type='text' class='form-control noborder-input' rows='5' name='p15'>".$row['c15']."</textarea></td>
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
 <td colspan='1'><textarea type='text' class='form-control noborder-input' rows='5' name='p16'>".$row['c16']."</textarea></td>
 <td colspan='1'><textarea type='text' class='form-control noborder-input' rows='5' name='p17'> ".$row['c17']."</textarea></td>
 <td colspan='1'><textarea type='text' class='form-control noborder-input' rows='5' name='p18'> ".$row['c18']."</textarea></td>
 </tr>
 <tr>
<td colspan='1'>是否需要预订住宿</td>
<td colspan='2'>".$row['c19']."</td>
</tr>
<tr>
			<td colspan='1'>填表人</td>
			<td colspan='2'>".$row['c20']."</td></tr>
			<tr>
			<td colspan='1'>联系方式</td>
			<td colspan='2'>".$row['c21']."</td></tr>
<tr>
             <td colspan='1'>填表时间</td>
			<td colspan='2'>".$row['c22']."</td>
			</tr>
			<tr>
			<td colspan='3'>申请人所在单位意见</td></tr>
				<tr>
			<td colspan='3'>".$row['c23']."</textarea></td>
			</tr>
		
			<tr>
			<td colspan='3'>缴费凭证</td></tr>
				<tr>
			<td colspan='3'><img width='100px' src='webpage/pm1/pay//$t.jpg'></td>
			</tr>
</tbody>
</table>
</form>
</div>
<div class='container-fluid print1'>
<form enctype='multipart/form-data' action='' method='post'>
    <h4 class='text-center'>中国钢结构协会空间结构分会</h4>
  <h4 class='text-center'>膜结构工程项目经理培训班报名表</h4>
  <table class='table-bordered text-center print1' width='100%' style='font-size:12px'>
            <tbody>
            <tr>
			<td colspan='1'>姓名</td>
            <td colspan='1'>".$row['c1']."</td>
            <td colspan='1'>性别</td>
			 <td colspan='1'>".$row['c2']."</td>
      <td colspan='1'>出生日期</td>
			 <td colspan='1'>".$row['c3']."</td>
			 <td colspan='1' rowspan='6'>
			 <img  width='150px' hight='210px' src='webpage/pm1/photo//$t.jpg'/></td>
			</tr>
<tr>
			<td colspan='1'>专业</td>
            <td colspan='1'>".$row['c4']."</td>
            <td colspan='1'>学位/学历</td>
			 <td colspan='1'>".$row['c5']."</td>
      <td colspan='1'>毕业时间</td>
			 <td colspan='1'>".$row['c6']."</td>
			</tr>
			<tr>
			<td colspan='1'>职称</td>
            <td colspan='5'>".$row['c7']."</td>
           
			</tr>
			<tr>
			<td colspan='1'>现工作单位</td>
            <td colspan='3'>
			".$row['c8']."
			  </td>
            <td colspan='1'>入职时间</td>
			 <td colspan='1'>".$row['c9']."</td>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>膜结构工程<br>从业年限</td>
            <td colspan='3' rowspan='2'>".$row['c10']."</td>
            <td colspan='1'>第一申请<br>级别</td>
			
			 <td colspan='1'>".$row['c11']."</td>
			 <tr>
 <td colspan='1'>第二申请<br>级别</td>
			
			 <td colspan='1'>".$row['c12']."</td>
			 </tr>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>工作经历</td>
            <td colspan='3'>工作时间</td>
			<td colspan='2'>工作单位</td>
			<td colspan='1'>岗位/职务</td>
			<tr>
			<td colspan='3'>
			<textarea type='text' class='form-control noborder-input' rows='5' name='p13' >".$row['c13']."</textarea>
			</td>
			<td colspan='2'>
			<textarea type='text' class='form-control noborder-input' rows='5' name='p14' >".$row['c14']."</textarea>
			</td>
			<td colspan='1'>
			<textarea type='text' class='form-control noborder-input' rows='5' name='p15' >".$row['c15']."</textarea>
			</td>
			</tr>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>作为项目<br>负责人承担<br>的Ⅰ(Ⅱ)级项目</td>
             <td colspan='3'>项目名称</td>
			   <td colspan='2'>项目级别</td>
               <td colspan='1'>竣工时间</td>
			   <tr>
			   <td colspan='3'><textarea type='text' class='form-control noborder-input' rows='5' name='p16'>".$row['c16']."</textarea></td>
			   <td colspan='2'><textarea type='text' class='form-control noborder-input' rows='5' name='p17'>".$row['c17']."</textarea></td>
               <td colspan='1'><textarea type='text' class='form-control noborder-input' rows='5' name='p18'>".$row['c18']."</textarea></td>
			   </tr>
			</tr>
			<tr>
			<td colspan='1'>是否需要<br>预订住宿</td>
			<td colspan='6'>".$row['c19']."</td>
			</tr>
			<tr>
			<td colspan='1'>填表人</td>
			<td colspan='1'>".$row['c20']."</td>
			<td colspan='1'>联系方式</td>
			<td colspan='2'>".$row['c21']."</td>
             <td colspan='1'>填表时间</td>
			<td colspan='1'>".$row['c22']."</td>
			</tr>
			<tr>
			<td colspan='1'>申请人所在<br>单位意见</td>
			<td colspan='6'>".$row['c23']."</td>
			</tr>
			
		 </tbody>
		 </table>
</form>
</div>
";break;
case 2:echo"

<!--startprint-->
<div class='container-fluid hidden-xs noprint'>
<input id='btnPrint' class='noprint btn btn-info' type='button' value='打印' onclick='javascript:window.print();' style='font-weight:bold; text-decoration:none;cursor:pointer;float:right;!important; cursor:hand'/>
<form enctype='multipart/form-data' action='' method='post'>
    <h3 class='text-center noprint'>中国钢结构协会空间结构分会</h3>
  <h3 class='text-center noprint'>膜结构工程项目经理申请表</h3>
  <table class='table table-bordered text-center table-responsive noprint'>
            <tbody>
            <tr>
			<td colspan='1'>姓名</td>
            <td colspan='1'>".$row['c1']."</td>
            <td colspan='1'>性别</td>
			 <td colspan='1'>".$row['c2']."</td>
      <td colspan='1'>出生日期</td>
			 <td colspan='1'>".$row['c3']."</td>
			 <td colspan='1' rowspan='6'><img  width='150px' hight='210px' src='webpage/pm1/photo//$t.jpg'/></td>
			</tr>
<tr>
			<td colspan='1'>专业</td>
            <td colspan='1'>".$row['c4']."</td>
            <td colspan='1'>学位/学历</td>
			 <td colspan='1'>".$row['c5']."</td>
      <td colspan='1'>毕业时间</td>
			 <td colspan='1'>".$row['c6']."</td>
			</tr>
			<tr>
			<td colspan='1'>职称</td>
            <td colspan='1'>".$row['c7']."</td>
			<td colspan='1'>发证时间</td>
            <td colspan='1'>".$row['c24']."</td>
			<td colspan='1'>证书编号</td>
            <td colspan='1'>".$row['c25']."</td>

           
			</tr>
			<tr>
			<td colspan='1'>现工作单位</td>
            <td colspan='3'>".$row['c8']."</td>
            <td colspan='1'>入职时间</td>
			 <td colspan='1'>".$row['c9']."</td>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>膜结构工程从业年限</td>
            <td colspan='3' rowspan='2'>".$row['c10']."</td>
            <td colspan='1'>第一申请级别</td>
			
			 <td colspan='1'>".$row['c11']."</td>
			 <tr>
 <td colspan='1'>第二申请级别</td>
			
			 <td colspan='1'>".$row['c12']."</td>
			 </tr>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>工作经历</td>
            <td colspan='2'>工作时间</td>
			<td colspan='3'>工作单位</td>
			<td colspan='1'>岗位/职务</td>
			<tr>
			<td  colspan='2'>
			<textarea type='text' class='form-control noborder-input' rows='7' name='p15' >".$row['c13']."</textarea>
			</td>
			<td colspan='3'>
			<textarea type='text' class='form-control noborder-input' rows='7' name='p16' >".$row['c14']."</textarea>
			</td>
			<td colspan='1'>
			<textarea type='text' class='form-control noborder-input' rows='7' name='p17'>".$row['c15']."</textarea>
			</td>
			</tr>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>作为项目负责人承担<br>的Ⅰ(Ⅱ)级项目</td>
             <td colspan='3'>项目名称</td>
			   <td colspan='2'>项目级别</td>
               <td colspan='1'>竣工时间</td>
			   <tr>
			   <td colspan='3'><textarea type='text' class='form-control noborder-input' rows='7' name='p18'>".$row['c16']."</textarea></td>
			   <td colspan='2'><textarea type='text' class='form-control noborder-input' rows='7' name='p19'>".$row['c17']."</textarea></td>
               <td colspan='1'><textarea type='text' class='form-control noborder-input' rows='7' name='p20'>".$row['c18']."</textarea></td>
			   </tr>
			</tr>
			<tr>
			<td colspan='1'>申请人承诺</td>
			<td colspan='6' style='font-family:仿宋;font-size:16px;'>本人承诺：该表所填内容属实，如与事实不符，本人自愿放弃申报资格。
			<br>
			</td>
			</tr>
			<tr>
			<td colspan='1'>填表人</td>
			<td colspan='1'>".$row['c20']."</td>
			<td colspan='1'>联系方式</td>
			<td colspan='2'>".$row['c21']."</td>
             <td colspan='1'>填表时间</td>
			<td colspan='1'>".$row['c26']."</td>
			</tr>
			<tr>
			<td colspan='1'>申请人所在单位意见</td>
			<td colspan='6'>".$row['c27']."</td>
			</tr>
			<tr class='noprint'>
			<td colspan='1'>查看附件</td>
			<td colspan='6'> 
			<a href='webpage/pm2/file/".$row['position']."'>您已经上传的文件</a></td>
			</tr>
			<tr class='noprint'>
			<td colspan='1'>查看缴费凭证</td>
			<td colspan='6'> 
			<img width='300px' src='webpage/pm2/pay//$t.jpg'></td>
			</tr>
			</tbody>
			</table>
			</form>
</div>



<div class='visible-xs container-fluid'>
<input id='btnPrint' class='noprint btn btn-info' type='button' value='打印' onclick='javascript:window.print();' style='margin-top:-2em;font-weight:bold; text-decoration:none;cursor:pointer;float:right;!important; cursor:hand'/>
<form enctype='multipart/form-data' action='' method='post'>
<h4 class='text-center noprint'>中国钢结构协会空间结构分会</h4>
<h4 class='text-center noprint'>膜结构工程项目经理申请表</h4>
<table class='table table-bordered text-center table-responsive noprint' style='font-size:14px'>
 <tbody>
 <tr>
 <td colspan='1'>姓名</td>
 <td colspan='2'>".$row['c1']."</td>
 </tr>
 <tr>
 <td colspan='1'>性别</td>
 <td colspan='2'>".$row['c2']."</td>
 </tr>
 <tr>
 <td colspan='1'>出生日期</td>
 <td colspan='2'>".$row['c3']."</td>
 </tr>
 <tr>
 <td colspan='1'>一寸照片上传</td>
 <td colspan='2'><img width='70px'  src='webpage/pm1/photo//$t.jpg'/></td>
 </tr>
<tr>
 <td colspan='1'>专业</td>
 <td colspan='2'>".$row['c4']."</td>
 </tr>
 <tr>
 <td colspan='1'>学位/学历</td>
<td colspan='2'>".$row['c5']."</td>
 </tr>
 <tr>
 <td colspan='1'>毕业时间</td>
<td colspan='2'>".$row['c6']."</td>
 </tr>
  <tr>
 <td colspan='1'>职称</td>
<td colspan='2'>6".$row['c7']."</td>
 </tr>
 <tr>
 <td colspan='1'>发证时间</td><td colspan='2'>".$row['c24']."</td>
 </tr>
  <tr>
 <td colspan='1'>证书编号</td>
<td colspan='2'>".$row['c25']."</td>
 </tr>
 <tr>
 <td colspan='1'>现工作单位</td>
<td colspan='2'>".$row['c8']."</td>
 </tr>
 <tr>
 <td colspan='1'>入职时间</td>
<td colspan='2'>".$row['c9']."</td>
 </tr>
 <tr>
 <td colspan='1'>膜结构工程从业年限</td>
<td colspan='2'>".$row['c10']."</td>
 </tr>
  <tr>
 <td colspan='1'>第一申请级别</td>
<td colspan='2'>".$row['c11']."</td>
 </tr>
  <tr>
 <td colspan='1'>第二申请级别</td>
<td colspan='2'>".$row['c12']."</td>
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
 <td colspan='1'><textarea type='text' class='form-control noborder-input' rows='5' name='p15'>".$row['c13']."</textarea></td>
 <td colspan='1'><textarea type='text' class='form-control noborder-input' rows='5' name='p16'>".$row['c14']."</textarea></td>
 <td colspan='1'><textarea type='text' class='form-control noborder-input' rows='5' name='p17'>".$row['c15']."</textarea></td>
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
 <td colspan='1'><textarea type='text' class='form-control noborder-input' rows='5' name='p18'>".$row['c16']."</textarea></td>
 <td colspan='1'><textarea type='text' class='form-control noborder-input' rows='5' name='p19'>".$row['c17']."</textarea></td>
 <td colspan='1'><textarea type='text' class='form-control noborder-input' rows='5' name='p20'>".$row['c18']."</textarea></td>
 </tr>
 <tr>
<td colspan='1'>申请人承诺</td>
<td colspan='2' style='font-family:仿宋;font-size:14px;'>本人承诺：该表所填内容属实，如与事实不符，本人自愿放弃申报资格。
<br>
</td>
</tr>
<tr>
			<td colspan='1'>填表人</td>
			<td colspan='2'>".$row['c19']."</td></tr>
			<tr>
			<td colspan='1'>联系方式</td>
			<td colspan='2'>".$row['c20']."</td></tr>
<tr>
             <td colspan='1'>填表时间</td>
			<td colspan='2'>".$row['c26']."</td>
			</tr>
			<tr>
			<td colspan='3'>申请人所在单位意见</td></tr>
				<tr>
			<td colspan='3'>".$row['c27']."</td>
			</tr>
			<tr class='noprint'>
			<td colspan='1'>查看附件</td>
			<td colspan='2'> 
			<a href='webpage/pm2/file/".$row['position']."'>您已经上传的文件</a></td>
			</tr>
			<tr class='noprint'>
			<td colspan='1'>查看缴费凭证</td>
			<td colspan='2'> 
			<img width='100px' src='webpage/pm2/pay/$t.jpg'></td>
			</tr>
 </tbody>
 </table>

  </form>
</div>

<div class='container-fluid print1'>
<form enctype='multipart/form-data' action='' method='post'>
    <h4 class='text-center'>中国钢结构协会空间结构分会</h4>
  <h4 class='text-center'>膜结构工程项目经理申请表</h4>
  <table class='table-bordered text-center' style='font-size:12px' width='100%'>
            <tbody>
            <tr>
			<td colspan='1'>姓名</td>
            <td colspan='1'>".$row['c1']."</td>
            <td colspan='1'>性别</td>
			 <td colspan='1'>".$row['c2']."</td>
      <td colspan='1'>出生日期</td>
			 <td colspan='1'>".$row['c3']."</td>
			 <td colspan='1' rowspan='6'><img  width='150px' hight='210px' src='webpage/pm1/photo//$t.jpg'/></td>
			</tr>
<tr>
			<td colspan='1'>专业</td>
            <td colspan='1'>".$row['c4']."</td>
            <td colspan='1'>学位/学历</td>
			 <td colspan='1'>".$row['c5']."</td>
      <td colspan='1'>毕业时间</td>
			 <td colspan='1'>".$row['c6']."</td>
			</tr>
			<tr>
			<td colspan='1'>职称</td>
            <td colspan='1'>".$row['c7']."</td>
			<td colspan='1'>发证时间</td>
            <td colspan='1'>".$row['c24']."</td>
			<td colspan='1'>证书编号</td>
            <td colspan='1'>".$row['c25']."</td>

           
			</tr>
			<tr>
			<td colspan='1'>现工作单位</td>
            <td colspan='3'>".$row['c8']."</td>
            <td colspan='1'>入职时间</td>
			 <td colspan='1'>".$row['c9']."</td>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>膜结构工程<br>从业年限</td>
            <td colspan='3' rowspan='2'>".$row['c10']."</td>
            <td colspan='1'>第一申请级别</td>
			
			 <td colspan='1'>".$row['c11']."</td>
			 <tr>
 <td colspan='1'>第二申请级别</td>
			
			 <td colspan='1'>".$row['c12']."</td>
			 </tr>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>工作经历</td>
            <td colspan='2'>工作时间</td>
			<td colspan='3'>工作单位</td>
			<td colspan='1'>岗位/职务</td>
			<tr>
			<td colspan='2'>
			<textarea type='text' class='form-control noborder-input' rows='7' name='p15' >".$row['c13']."</textarea>
			</td>
			<td colspan='3'>
			<textarea type='text' class='form-control noborder-input' rows='7' name='p16' >".$row['c14']."</textarea>
			</td>
			<td colspan='1'>
			<textarea type='text' class='form-control noborder-input' rows='7' name='p17'>".$row['c15']."</textarea>
			</td>
			</tr>
			</tr>
			<tr>
			<td colspan='1' rowspan='2'>作为项目<br>负责人承担<br>的Ⅰ(Ⅱ)级项目</td>
             <td colspan='3'>项目名称</td>
			   <td colspan='2'>项目级别</td>
               <td colspan='1'>竣工时间</td>
			   <tr>
			   <td colspan='3'><textarea type='text' class='form-control noborder-input' rows='5' name='p18'>".$row['c16']."</textarea></td>
			   <td colspan='2'><textarea type='text' class='form-control noborder-input' rows='5' name='p19'>".$row['c17']."</textarea></td>
               <td colspan='1'><textarea type='text' class='form-control noborder-input' rows='5' name='p20'>".$row['c18']."</textarea></td>
			   </tr>
			</tr>
			<tr>
			<td colspan='1'>申请人承诺</td>
			<td colspan='6' style='font-family:仿宋;font-size:14px;'>本人承诺：该表所填内容属实，如与事实不符，本人自愿放弃申报资格。
			<br>
			</td>
			</tr>
			<tr>
			<td colspan='1'>填表人</td>
			<td colspan='1'>".$row['c20']."</td>
			<td colspan='1'>联系方式</td>
			<td colspan='2'>".$row['c21']."</td>
             <td colspan='1'>填表时间</td>
			<td colspan='1'>".$row['c26']."</td>
			</tr>
			<tr>
			<td colspan='1'>申请人所在<br>单位意见</td>
			<td colspan='6'>".$row['c27']."</td>
			</tr>
			</tbody>
			</table>
			
</form>
</div>
";break;
default:break;
}

?>