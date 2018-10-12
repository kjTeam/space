 <?php
$index=$_GET['index'];
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
			echo "<script language=javascript>alert('尚未提交申请表');location.href='http://www.cnass.org/space2/index.php?nav1=2&nav2=1';</script>";
		}
echo "
	<div class='container-fluid hidden-xs'>
	<h3 class='text-center'>中国钢结构协会空间结构分会团体会员入会申请表</h3>
	<br/>
    <table class='table table-bordered table-responsive text-center'>";
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
	</div>";
	
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