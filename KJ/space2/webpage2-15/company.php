<?php
$id_index=$_GET['index'];

//表单提交
define('ROOT',dirname(__FILE__)); //用于上传文件
$upfile=ROOT."/join_form//$id_index.jpg";   //保存上传文件的路径：index所在目录
//webpage/join_form/id号
if($_POST["p42"]=='join') //检测是否是此表单提交
{
		$state=$_POST['state'];
		$state=intval($state);
        $level1=$_POST['level1'];
		$level2=$_POST['level2'];
        $level3=$_POST['level3'];
		$level4=$_POST['level4'];
		for($i=1;$i<42;$i++)
		{
			$str="p".$i;
			$PA[$i]=$_POST[$str];
			$PA[$i]=addslashes($PA[$i]);
		}
		$result=change("join_form",42,$PA,$state,$id_index);
		$query1="update join_form set level1='$level1' , level2='$level2' , level3='$level3' , level4='$level4'";
		$result1=$db->query($query1);
		if($_FILES['userfile']['tmp_name']!='')
	{ 
		    unlink($upfile);  
			move_uploaded_file($_FILES['userfile']['tmp_name'],$upfile);  //移动该文件至指定目录
		}
		if($result && $result1) 
		{
			echo "<h4><span class='label label-success'>保存成功！</span></h4>";			
		}
		else echo "<h4><span class='label label-danger'>出现问题，请仔细检查输入要求！</span></h4>";
}

//获得企业信息
$db=create_database();
$query="select * from join_form where id=$id_index";
$result=$db->query($query);
$row=$result->fetch_assoc(); //因为二级菜单从join_form 提取出来，所以这里肯定存在
$select=$row['state']-1;




//下面是表单，注意action一定要为空才可以送回当前页面进行处理 注意select标签结束后的script，用于选择默认select选项
echo "

<div class='container-fluid hidden-xs'>
<form enctype='multipart/form-data' action='' method='post'>
		
	<h3 class='text-center'>中国钢结构协会空间结构分会团体会员入会信息</h3>
	<span>当前状态</span>
	<select class='form-control' data-style='btn-primary' name='state' id='state'>
			<option value='1'> 提交待验证</option>
							<option value='2'> 投递给秘书处</option>
							<option value='3'> 秘书处意见反馈</option>
							<option value='4'> 投递给理事会</option>
							<option value='5'> 理事会意见反馈</option>
							<option value='6'> 等待缴费申请</option>
							<option value='7'> 缴费申请提交待审核</option>
							<option value='8'> 已入会</option>
							<option value='9'> 未通过审核</option>
	</select>

	<script  type='text/javascript'> document.getElementById('state')[".$select."].selected=true; </script > 

	<br/>
    <table class='table table-bordered table-responsive text-center'>";
	if($select==7)
	{
		echo"
		<tr><td colspan='2'>企业编号</td><td colspan='10'>". $row['num']." </td></tr>
		";
	 }
	 echo"
        <tr>
            <th colspan='12' style='text-align:center;'><lead>一、单 位 基 本 情 况</lead></th>
        </tr>
        <tr>
            <td colspan='2'>单位名称（公章）</td>
            <td colspan='4'><input type='text' class='form-control' name='p1' value='".$row['c1']."'> </td>
            <td colspan='2'>企事业级别</td>
            <td colspan='4'><input type='text' class='form-control' name='p2' value='".$row['c2']."'></td>
        </tr>
        <tr>
            <td colspan='2'>单位性质</td>
            <td colspan='4'><input type='text' class='form-control' name='p3'  value='".$row['c3']."'> </td>
            <td colspan='2'>产权所有</td>
            <td colspan='4'><input type='text' class='form-control' name='p4'  value='".$row['c4']."'></td>
        </tr>
        <tr>
            <td colspan='2'>注册资金</td>
            <td colspan='4'><input type='text' class='form-control' name='p5'  value='".$row['c5']."'> </td>
            <td colspan='2'>上级单位</td>
            <td colspan='4'><input type='text' class='form-control' name='p6'  value='".$row['c6']."'></td>
        </tr>
        <tr>
            <td colspan='2' rowspan='2'>负责人姓名</td>
            <td colspan='2' rowspan='2'><textarea type='text' class='form-control' rows='3' name='p7'>".$row['c7']."</textarea></td>
            <td colspan='2'>职务</td>
            <td colspan='2'><input type='text' class='form-control' name='p8'  value='".$row['c8']."'></td>
            <td colspan='2'>电话传真</td>
            <td colspan='2'><input type='text' class='form-control' name='p9'  value='".$row['c9']."'></td>
        </tr>
        <tr>
            <td colspan='2'>职称</td>
            <td colspan='2'><input type='text' class='form-control' name='p10'  value='".$row['c10']."'></td>
            <td colspan='2'>手机</td>
            <td colspan='2'><input type='text' class='form-control' name='p11'  value='".$row['c11']."'></td>
        </tr>
        <tr>
            <td colspan='2' rowspan='2'>联系人（代表）姓名</td>
            <td colspan='2' rowspan='2'><textarea type='text' class='form-control' rows='3' name='p12'>".$row['c12']."</textarea></td>
            <td colspan='2'>职务</td>
            <td colspan='2'><input type='text' class='form-control' name='p13'  value='".$row['c13']."'></td>
            <td colspan='2'>电话传真</td>
            <td colspan='2'><input type='text' class='form-control' name='p14'  value='".$row['c14']."'></td>
        </tr>
        <tr>
            <td colspan='2'>职称</td>
            <td colspan='2'><input type='text' class='form-control' name='p15'  value='".$row['c15']."'></td>
            <td colspan='2'>手机</td>
            <td colspan='2'><input type='text' class='form-control' name='p16'  value='".$row['c16']."'></td>
        </tr>
        <tr>
            <td colspan='2'>通讯地址</td>
            <td colspan='6'><input type='text' class='form-control' name='p17'  value='".$row['c17']."'></td>
            <td colspan='2'>邮编</td>
            <td colspan='2'><input type='text' class='form-control' name='p18'  value='".$row['c18']."'></td>
        </tr>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>二、单 位 规 模</lead></th>
        </tr>
        <tr>
            <td colspan='2'>创立时间</td>
            <td colspan='4'><input type='text' class='form-control' name='p19'  value='".$row['c19']."'> </td>
            <td colspan='2'>从事空间结构时间</td>
            <td colspan='4'><input type='text' class='form-control' name='p20'  value='".$row['c20']."'></td>
        </tr>
        <tr>
            <td colspan='2'>占地面积</td>
            <td colspan='4'><input type='text' class='form-control' name='p21'  value='".$row['c21']."'> </td>
            <td colspan='2'>建 筑 面 积</td>
            <td colspan='4'><input type='text' class='form-control' name='p22'  value='".$row['c22']."'></td>
        </tr>
        <tr>
        <td colspan='2'>资金总额</td>
        <td colspan='2'><input type='text' class='form-control' name='p23'  value='".$row['c23']."'> </td>
        <td colspan='2'>固定资产</td>
        <td colspan='2'><input type='text' class='form-control' name='p24'  value='".$row['c24']."'></td>
        <td colspan='2'>流动资金</td>
        <td colspan='2'><input type='text' class='form-control' name='p25'  value='".$row['c25']."'></td>
    </tr>
        <tr>
            <td colspan='2'>企业人数</td>
            <td colspan='2'><input type='text' class='form-control' name='p26'  value='".$row['c26']."'> </td>
            <td colspan='2'>管理人员</td>
            <td colspan='2'><input type='text' class='form-control' name='p27'  value='".$row['c27']."'></td>
            <td colspan='2'>技术人员</td>
            <td colspan='2'><input type='text' class='form-control' name='p28'  value='".$row['c28']."'></td>
        </tr>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>三、近三年的生产经营概况</lead></th>
        </tr>
        <tr>
        <td colspan='3' >年    度</td>
        <td colspan='3' >产    量</td>
        <td colspan='3' >面积（平方米）</td>
        <td colspan='3' >产值（万元）</td>
        </tr>
        <tr>
            <td colspan='3'><input type='text' class='form-control' name='p29'  value='".$row['c29']."'></td>
            <td colspan='3'><input type='text' class='form-control' name='p30'  value='".$row['c30']."'></td>
            <td colspan='3'><input type='text' class='form-control' name='p31'  value='".$row['c31']."'></td>
            <td colspan='3'><input type='text' class='form-control' name='p32'  value='".$row['c32']."'></td>
        </tr>
        <tr>
            <td colspan='3'><input type='text' class='form-control' name='p33'  value='".$row['c33']."'></td>
            <td colspan='3'><input type='text' class='form-control' name='p34'  value='".$row['c34']."'></td>
            <td colspan='3'><input type='text' class='form-control' name='p35'  value='".$row['c35']."'></td>
            <td colspan='3'><input type='text' class='form-control' name='p36'  value='".$row['c36']."'></td>
        </tr>
        <tr>
            <td colspan='3'><input type='text' class='form-control' name='p37'  value='".$row['c37']."'></td>
            <td colspan='3'><input type='text' class='form-control' name='p38'  value='".$row['c38']."'></td>
            <td colspan='3'><input type='text' class='form-control' name='p39'  value='".$row['c39']."'></td>
            <td colspan='3'><input type='text' class='form-control' name='p40'  value='".$row['c40']."'></td>
        </tr>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>四、从事空间结构工作的详细情况</lead></th>
        </tr>
		<tr>
        <td colspan='12'>
       <textarea type='text' class='form-control' rows='3' name='p41'>".$row['c41']."</textarea></td></tr>
		
		<tr>
			<td colspan='12'>
			<label for='userfile'> 营业执照</label>
			<div style='padding:6px'>
			<div style='padding:8px'>
			<img style='width:100%' src='webpage/join_form/".$row['id'].".jpg'/></div>
			<input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>			
			<input type='file' style='margin:auto; width:80%;' name='userfile' id='userfile'/>
			</div></td>
		</tr>
		<tr>
            <th colspan='12' style='text-align:center;'><lead>膜结构等级会员情况</lead></th>
        </tr>
		<tr>
			<td colspan='12'>
			<textarea  type='text' class='form-control' rows='2' name='level1'  >".$row['level1']." </textarea></td>
		</tr>
		<tr>
            <th colspan='12' style='text-align:center;'><lead>膜结构年审情况</lead></th>
        </tr>
		<tr>
        <td colspan='12'>
        <textarea  type='text' class='form-control' rows='2' name='level2'  >".$row['level2']." ".$row2['result2']."</textarea></td></tr>
		<tr>
            <th colspan='12' style='text-align:center;'><lead>网格资质等级会员情况</lead></th>
        </tr>
		<tr>
        <td colspan='12'>
        <textarea  type='text' class='form-control' rows='2' name='level3' >".$row['level3']."</textarea></td></tr>
		<tr>
            <th colspan='12' style='text-align:center;'><lead>网格资质年审情况</lead></th>
        </tr>
		<tr>
        <td colspan='12'>
        <textarea  type='text' class='form-control' rows='2' name='level4'>".$row['level4']."</textarea></td></tr>


    </table>
	<div style='text-align: right;margin-bottom: 2%'>
	<input type='hidden' value='join' name='p42'>
    <button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交 &nbsp; &nbsp;
    </button>
	</div>
	</form></div>
	
	<div class='container-fluid visible-xs'> 
	<form class='form-horizontal' action='' method='post'>
 <h5 class='text-center'><strong>中国钢结构协会空间结构分会团体会员入会申请表</strong></h5>	
 <div class='text-center'>
	<h6><strong>当前状态</strong></h6>
	<div tyle='float:right'>
	<select class='form-control' data-style='btn-primary' name='state' id='state'>
			<option value='1'> 提交待审核</option>
			<option value='2'> 等待缴费证明</option>
			<option value='3'> 缴费证明提交待验证</option>
			<option value='4'> 已入会</option>
	</select>

	<script  type='text/javascript'> document.getElementById('state')[".$select."].selected=true; </script> </div></div>
   <h6 class='text-center'><strong>单位基本情况</strong></h6>
	<div class='form-group text-center'>
    <label class='col-xs-4 control-label'>单位名称</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p1' value='". $row['c1']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>企事业级别</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p2' value='". $row['c2']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>单位性质</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p3' value='". $row['c3']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产权所有</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p4' value='". $row['c4']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>注册资金</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p5' value='". $row['c5']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>上级单位</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p6' value='". $row['c6']." '>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>负责人姓名</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p7' value='". $row['c7']." '>
  </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p8' value='". $row['c8']." '>
  </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p9' value='". $row['c9']." '>
  </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>电话传真</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p10' value='". $row['c10']." '>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>手机</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p11' value='". $row['c11']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>联系人姓名</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p12' value='". $row['c12']." '>
  </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p13' value='". $row['c13']." '>
  </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p14' value='". $row['c14']." '>
  </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>电话传真</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p15' value='". $row['c15']." '>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>手机</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p16' value='". $row['c16']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>通讯地址</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p17' value='". $row['c17']." '>
    </div>
  </div>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>手机</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p18' value='". $row['c18']." '>
    </div>
  </div>
  <h6 class='text-center'><strong>单位规模</strong></h6>
<div class='form-group text-center'>
    <label class='col-xs-4 control-label'>创立时间</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p19' value='". $row['c19']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>从事空间结构时间</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p20' value='". $row['c20']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>占地面积</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p21' value='". $row['c21']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>建筑面积</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p22' value='". $row['c22']." '>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>资金总额</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p23' value='". $row['c23']." '>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>固定资产</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p24' value='". $row['c24']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>流动资金</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p25' value='". $row['c25']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>企业人数</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p26' value='". $row['c26']." '>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>管理人员</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p27' value='". $row['c27']." '>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>技术人员</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p28' value='". $row['c28']." '>
    </div>
  </div>
   <h6 class='text-center'><strong>近三年的生产经营概况</strong></h6>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>年度</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p29' value='". $row['c29']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产量</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p30' value='". $row['c30']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label' >面积</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p31' value='". $row['c31']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产值</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p32' value='". $row['c32']." '>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>年度</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p33' value='". $row['c33']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产量</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p34' value='". $row['c34']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>面积</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p35' value='". $row['c35']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产值</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p36' value='". $row['c36']." '>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>年度</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p37' value='". $row['c37']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产量</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p38' value='". $row['c38']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>面积</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p39' value='". $row['c39']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产值</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p40' value='". $row['c40']." '>
    </div>
  </div>
  <div class='col-xs-12'>
<h6 class='text-center'><strong>从事空间结构工作的详细情况</strong></h6>  
      <textarea class='form-control' name='p41' rows='4'>".$row['c41']." </textarea>
    </div> 
	<div class='col-xs-12'>
			<h6 class='text-center'><strong>营业执照</strong></h6>
			<table class='table table-bordered table-respective'>
			<tr>
			<td>
			<img style='width:100%' src='webpage/join_form/".$row['id'].".jpg'/><input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>			
			<input type='file' style='margin:auto; width:80%; font-size:12px;margin-top:5px' name='userfile' id='userfile'/></td></tr>
   </table> </div>
		  <div class='col-xs-12'>
		  <h6 class='text-center'><strong>膜结构等级会员情况</strong></h6> 
			<textarea  type='text' class='form-control' rows='2' name='level1'  >".$row['level1']."</textarea>
		</div>
		 <div class='col-xs-12'>
             <h6 class='text-center'><strong>膜结构年审情况</strong></h6>
        <textarea  type='text' class='form-control' rows='2' name='level2'>".$row['level2']."</textarea></div>
		<div class='col-xs-12'>
             <h6 class='text-center'><strong>网格资质等级会员情况</strong></h6>
        <textarea  type='text' class='form-control' rows='2' name='level3'  >".$row['level3']."</textarea></div>
		<div class='col-xs-12'>
            <h6 class='text-center'><strong>网格资质年审情况</strong></h6>
     
        <textarea  type='text' class='form-control' rows='2' name='level4'  >".$row['level4']."</textarea>  </div>

	<div class='col-xs-12' style='margin:4% 0'>
	<input type='hidden' value='join' name='p42'>
    <input type='submit' class='btn btn-xs btn-primary form-control' value='提交'>
	</div>
	</form></div>";  //注意往上4行这里的hidden，这里是必须的！！！



?>