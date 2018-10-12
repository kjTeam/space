<?php
$index=$_GET['index'];
if($category=='1')
{
	 $query="select * from join_form where id_p=$id";
				$result=$db->query($query);
				$row=$result->fetch_assoc(); 
				$select=$row['state']-1;
	$query="select * from join_form where id_p=$id";
		$result=$db->query($query);
		$num_results=$result->num_rows;
		if($num_results) //如果有提交
		{
			$row=$result->fetch_assoc(); 
			echo "<h4><span class='label label-info'>当前状态：";
			switch($row['state'])
			{
				case 1: echo "审核中</span></h4>";break;
				case 2: echo "审核中</span></h4>";break;
				case 3: echo "审核中</span></h4>";break;
				case 4: echo "审核中</span></h4>";break;
				case 5: echo "审核中</span></h4>";break;
                case 6: echo "等待缴费申请</span></h4>";break;
				case 7: echo "缴费申请提交待审核</span></h4>";break;
				case 8: echo "已入会</span></h4>";break;
				case 9: echo "未通过审核</span></h4>";break;
				default:break;
			}			
		}
		else
		{
			echo "<script language=javascript>alert('尚未提交申请表');location.href='http://www.cnass.org/space2/index.php?nav1=2&nav2=1';</script>"; //没有提交则退出
			exit();
		}
	}
else{
	if($index!='0')
	{
      $query="select * from join_form where id=$index";
				$result=$db->query($query);
				$row=$result->fetch_assoc(); 
				$select=$row['state']-1;
				//$managerinfo=$row['info'];
	}
}
if($_POST['send']=='yes')
{
$result=$_POST['state'];
		$result=intval($result);
		$info=$_POST['info'];
		$info=addslashes($info);
		$number=$_POST['number'];
		//此处是自刷新，还带着index	
		$query = "update join_form set state='$result',info='$info',num='$number'where id=$index";
		$result=$db->query($query);
		if($result)
			echo "<script language=javascript>alert('保存成功');location.href='http://www.cnass.org/space2/index.php?nav1=5';</script>";
		else
			echo "<script language=javascript>alert('保存失败，请联系管理员');</script>";
		exit();
}
if($_POST['send2']=='yes')
{     
        $result2=$_POST['result'];
		$result2=intval($result2);
		$info2=$_POST['info2'];
		$info2=addslashes($info2);
		//插入到secret表中，其中id_p代表秘书处id;id_f是企业id,result是同意结果，是布尔值；info是意思。	
		$query = "insert into secret (id_p,id_f,result,info) values ('$id','$index','$result2','$info2')"; 
		$result = $db->query($query);
		if($result){
			echo "<script language=javascript>alert('保存成功');location.href='http://www.cnass.org/space2/index.php?nav1=30';</script>";
			}
		else{
			echo "<script language=javascript>alert('保存失败，请联系管理员');</script>";
		}
		//找到有几个秘书处人员。
        //$query2 = "select * from user where category='2'";
		//$result = $db->query($query2);
		//$num_results = $result->num_rows;
		//$secretnum = $num_results;
		//找到现在已经有多少秘书处成员评价。
       // $query3 = "select * from secret where id_f=$index";
		//$result = $db->query($query3);
		//$num_results1 = $result->num_rows;
		//$companynum = $num_results1;
		//如果都评价完了，那么将该企业的state更新到3
        //if($companynum==$secretnum)
	//{
		$query = "update join_form set state = '3' where id=$index";
		$result=$db->query($query);			
	//}
		exit();
}
if($_POST['send22']=='yes')//如果秘书处已经填写完，要更改。
{
$result2=$_POST['result'];
		$result2=intval($result2);
		$info2=$_POST['info2'];
		$info2=addslashes($info2);
$query = "update secret set info = '$info2',result='$result2'where id_f=$index and id_p=$id";
		$result=$db->query($query);		
		if ($result)
	{
			echo"<script language=javascript>alert('保存成功');location.href='http://www.cnass.org/space2/index.php?nav1=30';</script>";
	}
		else
	{
			echo"<script language=javascript>alert('保存失败，请联系管理员');</script>";
		}
}
if($_POST['send3']=='yes')//管理员投递给理事会的过程
{
	$p3=$_POST['p3'];$p4=$_POST['p4'];
	$num=$_POST['num'];
	for($i=1;$i<=$num;$i++)
	{
	$str="cid".$i;
	$PA[$i]=$_POST[$str];
	$PA[$i]=addslashes($PA[$i]);
	 $query1 = "update join_form set state='5'where id=".$PA[$i]."";
	 $result1=$db->query($query1);
	}
	$query = "update council_inform set preface='$p4',remark='$p3',state='1' where form_category='0'";
		$result=$db->query($query);

   
		if($result)
			echo "<script language=javascript>alert('保存成功');location.href='http://www.cnass.org/space2/index.php?nav1=5';</script>";
		else
			echo "<script language=javascript>alert('保存失败，请联系管理员');</script>";
		exit();
}
if($_POST['send4']=='yes')//管理员最后通过审核，等待缴费证明的过程
{
  $query= "select * from join_form where state='5'";
	$result=$db->query($query);
	$num_results=$result->num_rows;
	for($i=1;$i<=$num_results;$i++)
	{
       $companyidd="companyidd".$i;
	$CO[$i]=$_POST[$companyidd];	
	$state2="state2".$i;	
	$state2[$i]=$_POST[$state2];
    $state2[$i]=addslashes($state2[$i]);
    $query1 = "update join_form set state = '".$state2[$i]."' where id='".$CO[$i]."'";
	$result1=$db->query($query1);
	exit();
	}
 //$query2 = "update council_inform set state = '3' where form_category=0";
	//$result2=$db->query($query2);
	if($result1)
		echo "<script language=javascript>alert('保存成功');location.href='http://www.cnass.org/space2/index.php?nav1=5';</script>";
	else
		echo "<script language=javascript>alert('保存失败，请联系管理员');</script>";

}

if($index!='0' and $index!='-1')
{

	echo "<input id='btnPrint' type='button' value='button' onclick='javascript:window.print();' style='color:#00f; font-weight:bold; text-decoration:none;cursor:pointer!important; cursor:hand'/>
<!--startprint-->
	<div class='container-fluid hidden-xs'>
	<h3 class='text-center'>中国钢结构协会空间结构分会团体会员入会申请表</h3>
	<br/>
    <table  id = 'PrintA' class='table table-bordered table-responsive text-center'>";
  if($select==7)
	{
		echo"
		<tr><td colspan='2'>企业编号</td><td colspan='10'>". $row['num']." </td></tr>
		";
	 }
       echo" <tr>
            <th colspan='12' style='text-align:center;'><lead>一、单 位 基 本 情 况</lead></th>
        </tr>
        <tr>
            <td colspan='2'>单位名称（公章）</td>
            <td colspan='4'>". $row['c1']." </td>
            <td colspan='2'>企事业级别</td>
            <td colspan='4'>". $row['c2']."</td>
        </tr>
<tr>
            <td colspan='2'>单位性质</td>
            <td colspan='4'>".$row['c3']."  </td>
            <td colspan='2'>产权所有</td>
            <td colspan='4'>".$row['c4']." </td>
        </tr>
        <tr>
            <td colspan='2'>注册资金</td>
            <td colspan='4'>".$row['c5']."  </td>
            <td colspan='2'>上级单位</td>
            <td colspan='4'>".$row['c6']." </td>
        </tr>
        <tr>
            <td colspan='2' rowspan='2'>负责人姓名</td>
            <td colspan='2' rowspan='2'>".$row['c7'] ."</td>
            <td colspan='2'>职务</td>
            <td colspan='2'>".$row['c8'] ."</td>
            <td colspan='2'>电话传真</td>
            <td colspan='2'>".$row['c9']." </td>
        </tr>
        <tr>
            <td colspan='2'>职称</td>
            <td colspan='2'>".$row['c10']." </td>
            <td colspan='2'>手机</td>
            <td colspan='2'>".$row['c11']." </td>
        </tr>
        <tr>
            <td colspan='2' rowspan='2'>联系人（代表）姓名</td>
            <td colspan='2' rowspan='2'>".$row['c12']."</td>
            <td colspan='2'>职务</td>
            <td colspan='2'>".$row['c13']." </td>
            <td colspan='2'>电话传真</td>
            <td colspan='2'>".$row['c14'] ."</td>
        </tr>
        <tr>
            <td colspan='2'>职称</td>
            <td colspan='2'>".$row['c15']." </td>
            <td colspan='2'>手机</td>
            <td colspan='2'>".$row['c16']." </td>
        </tr>
        <tr>
            <td colspan='2'>通讯地址</td>
            <td colspan='6'>".$row['c17'] ."</td>
            <td colspan='2'>邮编</td>
            <td colspan='2'>".$row['c18']." </td>
        </tr>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>二、单 位 规 模</lead></th>
        </tr>
        <tr>
            <td colspan='2'>创立时间</td>
            <td colspan='4'>".$row['c19'] ." </td>
            <td colspan='2'>从事空间结构时间</td>
            <td colspan='4'>".$row['c20']." </td>
        </tr>
        <tr>
            <td colspan='2'>占地面积</td>
            <td colspan='4'>".$row['c21'] ." </td>
            <td colspan='2'>建 筑 面 积</td>
            <td colspan='4'>".$row['c22'] ."</td>
        </tr>
        <tr>
        <td colspan='2'>资金总额</td>
        <td colspan='2'>".$row['c23'] ." </td>
        <td colspan='2'>固定资产</td>
        <td colspan='2'>".$row['c24']." </td>
        <td colspan='2'>流动资金</td>
        <td colspan='2'>".$row['c25']." </td>
    </tr>
        <tr>
            <td colspan='2'>企业人数</td>
            <td colspan='2'>".$row['c26'] ." </td>
            <td colspan='2'>管理人员</td>
            <td colspan='2'>".$row['c27']." </td>
            <td colspan='2'>技术人员</td>
            <td colspan='2'>".$row['c28']." </td>
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
            <td colspan='3'>".$row['c29'] ."</td>
            <td colspan='3'>".$row['c30']." </td>
            <td colspan='3'>".$row['c31']." </td>
            <td colspan='3'>".$row['c32'] ."</td>
        </tr>
        <tr>
            <td colspan='3'>".$row['c33']." </td>
            <td colspan='3'>".$row['c34']." </td>
            <td colspan='3'>".$row['c35']." </td>
            <td colspan='3'>".$row['c36']." </td>
        </tr>
        <tr>
            <td colspan='3'>".$row['c37']." </td>
            <td colspan='3'>".$row['c38']." </td>
            <td colspan='3'>".$row['c39']." </td>
            <td colspan='3'>".$row['c40'] ."</td>
        </tr>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>四、从事空间结构工作的详细情况</lead></th>
        </tr>
		<tr>
        <td colspan='12'>
        <textarea  type='text' class='form-control' rows='12' name='p41'  >".$row['c41']."</textarea></td></tr>
		
      <tr>
			<td colspan='12'>
			<input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
			<label for='userfile'> 营业执照</label>
			<img style='width:100%' src='webpage/join_form/".$row['id'].".jpg'/>
			</td>
		</tr> 
		";

		if($select>='6'&&$select!=8)
		{
			echo"
			<tr>
            <th colspan='12' style='text-align:center;'><lead>缴费凭证</lead></th>
        </tr>
			<tr>
				<td colspan='12'>
				<img style='width:100%' src='webpage/pay1/".$row['id'].".jpg'/>
				</td>
			</tr>
		";}
		echo"
    </table>
	</div>
	<!---endprint-->";
	
echo"
	<div class='container-fluid visible-xs' style='margin-top:-10px;'>
	<form class='form-horizontal'>
 <h5 class='text-center'><strong>中国钢结构协会空间结构分会团体会员入会申请表</strong></h5>";
  if($select==7)
	{
		echo"
		<div class='form-group text-center'>
		 <label class='col-xs-4 control-label'>企业编号</label>
		  <div class='col-xs-7'>". $row['num']." </div></div>
		";
	 }    
	 echo"
	<h6 class='text-center'><strong>单位基本情况</strong></h6>
	<div class='form-group text-center'>
    <label class='col-xs-4 control-label'>单位名称</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p1' value='". $row['c1']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>企事业级别</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p2' value='". $row['c2']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>单位性质</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p3' value='". $row['c3']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产权所有</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p4' value='". $row['c4']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>注册资金</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p5' value='". $row['c5']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>上级单位</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p6' value='". $row['c6']." '>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>负责人姓名</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p7' value='". $row['c7']." '>
  </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p8' value='". $row['c8']." '>
  </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p9' value='". $row['c9']." '>
  </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>电话传真</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p10' value='". $row['c10']." '>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>手机</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p11' value='". $row['c11']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>联系人姓名</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p12' value='". $row['c12']." '>
  </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p13' value='". $row['c13']." '>
  </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p14' value='". $row['c14']." '>
  </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>电话传真</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p15' value='". $row['c15']." '>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>手机</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p16' value='". $row['c16']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>通讯地址</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p17' value='". $row['c17']." '>
    </div>
  </div>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>手机</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p18' value='". $row['c18']." '>
    </div>
  </div>
  <h6 class='text-center'><strong>单位规模</strong></h6>
<div class='form-group text-center'>
    <label class='col-xs-4 control-label'>创立时间</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p19' value='". $row['c19']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>从事空间结构时间</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p20' value='". $row['c20']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>占地面积</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p21' value='". $row['c21']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>建筑面积</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p22' value='". $row['c22']." '>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>资金总额</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p23' value='". $row['c23']." '>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>固定资产</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p24' value='". $row['c24']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>流动资金</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p25' value='". $row['c25']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>企业人数</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p26' value='". $row['c26']." '>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>管理人员</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p27' value='". $row['c27']." '>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>技术人员</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p28' value='". $row['c28']." '>
    </div>
  </div>
   <h6 class='text-center'><strong>近三年的生产经营概况</strong></h6>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>年度</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p29' value='". $row['c29']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产量</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p30' value='". $row['c30']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label' >面积</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p31' value='". $row['c31']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产值</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p32' value='". $row['c32']." '>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>年度</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p33' value='". $row['c33']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产量</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p34' value='". $row['c34']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>面积</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p35' value='". $row['c35']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产值</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p36' value='". $row['c36']." '>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>年度</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p37' value='". $row['c37']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产量</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p38' value='". $row['c38']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>面积</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p39' value='". $row['c39']." '>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产值</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p40' value='". $row['c40']." '>
    </div>
  </div>
  <div class='col-xs-12'>
<h6 class='text-center'><strong>从事空间结构工作的详细情况</strong></h6>  
      <textarea class='form-control' name='p41' rows='4'>". $row['c41']." </textarea>
    </div> 
	<div class='col-xs-12'>
     <input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
			<h6 class='text-center'><strong>营业执照</strong></h6>
			<table class='table table-bordered table-respective'>
			<tr>
			<td>
			<img style='width:100%' src='webpage/join_form/".$row['id'].".jpg'/></td></tr>
			</table>
    </div>
	</form>
  </div> 
 ";
 if($category=='5' and $select!='7')//如果是管理员身份且本企业没有入会，那么这个表格后面将输出：
	 {
 echo"<div class='container-fluid'>
 <form enctype='multipart/form-data' action='' method='post'>
		<table class='table table-bordered table-responsive text-center'>
			<tr>
				<td colspan='2' >目前进度：</td>
				<td colspan='10'>
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
				</td>
			</tr>";
			if ($select>='2')//如果秘书处投递了意见，这块应该输出秘书处的意见和管理员的意见 秘书处有多人，所以用FOR循环。
				{
				echo"
				
			<tr>
				<td colspan='12'>秘书处意见：</td></tr>";
				$query = "select * from secret where id_f='$index'";
				//这里从secet表中查找秘书处的意见
                $result=$db->query($query);
				$num_results=$result->num_rows;
				for($i=0;$i<$num_results;$i++)
					{
				$row2=$result->fetch_assoc(); 
				$secretresult=$row2['result'];
				$query2= "select * from user where id=".$row2['id_p']."";
				$result2=$db->query($query2);
                $row3=$result2->fetch_assoc();
				echo"<tr><td colspan='2'>".($i+1)."</td>
				          <td colspan='2'> ".$row3['name']."</tr>";
				if($secretresult=='1'){
					echo"
					<tr>
					<td colspan='2'>
				同意!
				</td>";
				}
				else{
                  echo"
					<tr>
					<td colspan='2'>
				不同意!
				</td>";
				}
				echo"
			
				<td colspan='10'>
				".$row2['info']."
				</td>
				</tr>
				
			";
					}
    if ($select=='6')
					{

		echo " <tr><td colspan='2'> 请输入企业编号：</td>
		<td colspan='10'> <input class='form-control' name='number' value='". $row['id']." '></td></tr>";
					}
			
				}

echo"
           </table>
			<div style='text-align: right;margin-bottom: 2%'>
				<input type='hidden' value='yes' name='send'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交&nbsp; &nbsp;
				</button>
			</div>
		</form>
		</div>";
		 }

if($category=='2')//如果是秘书处且提交给秘书处,这里的state写在query上了。
	{ 
$query="select * from secret where id_p=$id and id_f=$index";
$result=$db->query($query);
$num_results=$result->num_rows;
$row=$result->fetch_assoc(); 
$select2=$row['result']-1;
if($num_results!=0)
		{
echo"
<div class='container-fluid'>
 <form enctype='multipart/form-data' action='' method='post'>
		<table class='table table-bordered table-responsive text-center'>
			<tr>
				<td colspan='2' >秘书处意见：</td>
				<td colspan='10'>
					<select class='form-control' data-style='btn-primary' name='result' id='state'>
							<option value='1'> 同意入会</option>
							<option value='2'> 不同意入会</option>
					</select>
			<script  type='text/javascript'> document.getElementById('state')[".$select2."].selected=true; </script > 
				</td>
			</tr>
			<tr>
				<td colspan='12'>
				<textarea  type='text' class='form-control' name='info2'>".$row['info']."</textarea>
				</td>
			</tr>
		</table>
			<div style='text-align: right;margin-bottom: 2%'>
				<input type='hidden' value='yes' name='send22'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 投递给管理员&nbsp; &nbsp;
				</button>
			</div>
		</form>
		</div>
";

}
else{
 echo"<div class='container-fluid'>
 <form enctype='multipart/form-data' action='' method='post'>
		<table class='table table-bordered table-responsive text-center'>
			<tr>
				<td colspan='2' >秘书处意见：</td>
				<td colspan='10'>
					<select class='form-control' data-style='btn-primary' name='result' id='state'>
							<option value='1'> 同意入会</option>
							<option value='2'> 不同意入会</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan='12'>
				<textarea  type='text' class='form-control' name='info2' placeholder='意见及留言'></textarea>
				</td>
			</tr>
		</table>
			<div style='text-align: right;margin-bottom: 2%'>
				<input type='hidden' value='yes' name='send2'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 投递给管理员&nbsp; &nbsp;
				</button>
			</div>
		</form>
		</div>";
}
 }
}
//因为在index等于-1和0的时候，需要知道council中的state.所以写在两个判断的前面。
//$query1= "select * from council_inform where form_category='0'";
//$result1=$db->query($query1);
//$row1=$result1->fetch_assoc(); 

if($index=='0'){
$query = "select * from join_form where state='4'";
$result=$db->query($query);
$num_results=$result->num_rows;
$num=$num_results;
if($num_results==0)
	{
	echo"<h3><span class='label label-warning'>尚未有企业提交</span></h3>";
            exit();
}

//if($row1['state']==1)
	//echo"<div class='container-fluid'><h3><span class='label label-warning'>您已向管理员投递，本次提交数据会覆盖上次数据</span></h3></div>";
//if($row1['state']==2||$row1['state']==3)
	//echo"<div class='container-fluid'><h3><span class='label label-warning'>管理员已返回意见，本次提交数据会再次发送给管理员</span></h3></div>";
echo"
<div class='container-fluid'>
<form enctype='multipart/form-data' action='' method='post'>
<table class='table table-bordered table-responsive text-left' style='margin-top:1em;font-size:1.2em;'>
<tr><td style='font-family:仿宋;' colspan='7' class='noborder-table'><strong>各位常务理事：</strong></td></tr>
<tr><td colspan='31' class='noborder-table' style='font-family:仿宋;'>
<strong><textarea class='form-control' name='p4' rows='10' style='font-size:1em'></textarea></strong></td>
</table>
	<div style='margin-top:3em'>
    <table class='table table-bordered table-responsive text-center' style='margin-top:2em;font-size:1em;'>
	<h3 class='text-center'style='line-height:8px'>中国钢结构协会空间结构分会</h3>
<h3 class='text-center' style='line-height:10px'>中国钢协空间结构分会入会单位审批名单</h3>
        <tr>
            <th colspan='1' style='text-align:center;'>序号</th>
			 <th colspan='6' style='text-align:center;width:14%'>单   位 </th>
			  <th colspan='2' style='text-align:center;'>代表人</th>
              <th colspan='3' style='text-align:center;'>成立时间（年月）</th>
              <th colspan='3' style='text-align:center;'>注册资金（万元）</th>
			  <th colspan='2' style='text-align:center;'>技术人员</th>
			  <th colspan='4' style='text-align:center;'>占地/建筑面积（m^2）</th>
          <th colspan='3' style='text-align:center;'>近三年产量（m^2）</th>
		   <th colspan='3' style='text-align:center;'>近三年产值（万元）</th>
		   	<th colspan='4' style='text-align:center;'>单位性质</th>
        </tr>";
		//这里从join_form表中查找要投递给理事会的企业
           
				for($i=1;$i<=$num_results;$i++)
					{
				$row2=$result->fetch_assoc();
				$add1=$row2['c30']+$row2['c34']+$row2['c38'];
                $add2=$row2['c32']+$row2['c36']+$row2['c40'];
				$p="cid".$i;
				echo" 
				<tr>
				<input type='hidden' name='$p' value='".$row2['id']."'>
				<input type='hidden' name='num' value='$num'>
            <td colspan='1' style='text-align:center;'>$i</td>
			 <td colspan='6' style='text-align:center;'>
			 ". $row2['c1']."</td>
			  <td colspan='2' style='text-align:center;'>
			   ". $row2['c7']." </td>
              <td colspan='3' style='text-align:center;'>
			  ". $row2['c19']." </td>
              <td colspan='3' style='text-align:center;'>". $row2['c23']." </td>
			  <td colspan='2' style='text-align:center;'>". $row2['c28']." </td>
			  <td colspan='4' style='text-align:center;'>". $row2['c21']." </td>
          <td colspan='3' style='text-align:center;'>$add1</td>
		   <td colspan='3' style='text-align:center;'>$add2</td>
		   	<td colspan='4' style='text-align:center;'>". $row2['c3']." </td>
        </tr> ";
		}		
echo"
<tr class='text-righ'>
<td colspan='4' class='noborder-table'>审批人:</td>
<td colspan='6' class='noborder-table'>
</td>
<td colspan='2' class='noborder-table'>日期：</td>
<td colspan='6' class='noborder-table'>
</td>
</tr>
<tr>
<td colspan='4'class='noborder-table'>备注：</td>
<td colspan='27'class='noborder-table'><input class='form-control' name='p3'></td>
</tr>
        </table></div>
<div style='text-align: right;margin-bottom: 2%'>
				<input type='hidden' value='yes' name='send3'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 投递给理事会&nbsp; &nbsp;
				</button>
			</div>
		</form>
		</div>";
	
}


if($index=='-1')//当点击理事会结果的时候，传来index=-1
{ 
	$query= "select id,c1 from join_form where state='5'";
	$result=$db->query($query);
	$num_results=$result->num_rows;
	if($num_results==0)
	{
	echo"<h3><span class='label label-info'>尚未有企业投递</span></h3>";
	exit();
	}
	else{
	echo" <div class='container-fluid'>
	<form enctype='multipart/form-data' action='' method='post'>
	<table class='table table-bordered table-responsive text-center' style='margin-top:2em;font-size:1em;'>
	 <h3 class='text-center'style='line-height:8px'>中国钢结构协会空间结构分会</h3>
<h3 class='text-center' style='line-height:10px'>中国钢协空间结构分会入会单位常务理事会审批结果</h3>
   <tbody>
   <tr>
   <td colspan='1'>序号</td>
   <td colspan='6'>公司名称</td>
   ";
  $query2="select name,id from user where category=4";//查找所有的常务理事
  $result2=$db->query($query2);
  $num_results2=$result2->num_rows;
	for($i2=1;$i2<=$num_results2;$i2++)
	{
	$row2=$result2->fetch_assoc();
	  $p[$i2]=$row2['id'];//将理事会的id依次存放在$p[]中。
	echo" <td colspan='6'>常务理事".$row2['name']."意见</td>";
	}
	echo"<td>审批结果</td></tr>";
//找出理事会已经给出意见的企业
	
	for($i=1;$i<=$num_results;$i++)//大循环作为输出每一行的循环，小循环作为将常务理事会的名称和结果输出循环。
	{
	$row=$result->fetch_assoc();
	$id1=$row['id'];
   $companyidd="companyidd".$i;
   $state2="state2".$i;
  
	echo"<tr>
	<td colspan='1'>$i</td>
	<td colspan='6'>".$row['c1']."</td> 
	";
  for($i2=1;$i2<=$num_results2;$i2++)
	   {
	  $id2=$p[$i2];
	$query1="select result from director where form_category=0 and id_f='$id1' and id_p='$id2'";//id是企业的id ,id2是常务理事的id
	$result1=$db->query($query1);
	$row1=$result1->fetch_assoc();
	$re=$row1['result'];//为了和之前的result分开避免混淆。
	echo"<td colspan='6'>";
	if($re==1)
		echo"同意入会";
	else if($re==2)
		echo"不同意入会";
	echo"</td>";
	    }
    echo"
	<td colspan='4'>
	<select class='form-control' data-style='btn-primary' name='$state2'>
							<option value='6'> 通过审核，等待缴费证明</option>
							<option value='9'> 未通过审核</option>
					</select>
					<input type='hidden' value='$id1' name='$companyidd'>
	</td> 
	</tr>
	
	";
	}	
echo"
			</tbody>
</table>
<div style='text-align: right;margin-bottom: 2%'>
				<input type='hidden' value='yes' name='send4'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交&nbsp; &nbsp;
				</button>
			</div></form></div>";	
	}
}
?>