
<?php
$index = $_GET['index'];
$nav1 = $_GET['nav1'];
$nav2 = $_GET['nav2'];
// $checkOption='';
// if($_POST['checkOption']=='查看意见'){
// 	echo'ssssssssss';
	
// }
if ($category == '1') {
	$query = "select * from join_form where id_p=$id";
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	$select = $row['state'] - 1;
	$query = "select * from join_form where id_p=$id";
	$result = $db->query($query);
	$num_results = $result->num_rows;
	if ($num_results) //如果有提交
	{
		$row = $result->fetch_assoc();
		echo "<h4><span class='label label-info noprint'>当前状态：";
		switch ($row['state']) {
			case 1:
				echo "审核中</span></h4>";
				break;
			case 2:
				echo "审核中</span></h4>";
				break;
			case 3:
				echo "审核中</span></h4>";
				break;
			case 4:
				echo "审核中</span></h4>";
				break;
			case 5:
				echo "审核中</span></h4>";
				break;
			case 6:
				echo "等待缴费申请</span></h4>";
				break;
			case 7:
				echo "缴费申请提交待审核</span></h4>";
				break;
			case 8:
				echo "已入会</span></h4>";
				break;
			case 9:
				echo "未通过审核</span></h4>";
				break;
			default:
				break;
		}
	} else {
		echo "<script language=javascript>alert('尚未提交申请表');location.href='index.php?nav1=2&nav2=1';</script>"; //没有提交则退出
		exit();
	}
} else {
	if ($index != '0') {
		$query = "select * from join_form where id=$index";
		$result = $db->query($query);
		$row = $result->fetch_assoc();
		$select = $row['state'] - 1;
				//$managerinfo=$row['info'];
	}
}
$stateSelected = '';
if ($_POST['serachByState'] == 'yes') {
	$searchStateResult = $_POST['searchState'];
	if (sizeof($searchStateResult) > 0) {
		if (array_search("all", $searchStateResult) === false) {
			$stateSelected = ' where state in (' . implode(',', $searchStateResult) . ')';
		}
	}
}

if ($_POST['send'] == 'yes')//管理员的意见
{
	$result = $_POST['state'];
	$state = intval($result);
	$info = $_POST['info'];
	$info = addslashes($info);
	$number = $_POST['number'];
	$date = date('Y-m-d');
	if ($state == '8') {
		$query2 = "insert into company_result (id_p,company,join_result,pay_result) values ('" . $row['id_p'] . "','" . $row['c1'] . "','已入会','已缴费')";

		$result2 = $db->query($query2);
		if ((!$result2)) {
			echo "<script language=javascript>alert('保存失败，请联系管理员');</script>";
			exit();
		}
	}

		//此处是自刷新，还带着index	
	$query = "update join_form set state='$state',info='$info',num='$number' where id=$index";
	$result = $db->query($query);
	if ($result)
		echo "<script language=javascript>
			alertAtuoClose();location.href='index.php?nav1=5';</script>";
	else
		echo "<script language=javascript>alert('保存失败，请联系管理员');</script>";
	exit();
}
if ($_POST['send2'] == 'yes')//秘书处填写意见
{
	$result2 = $_POST['result'];
	$result2 = intval($result2);
	$info2 = $_POST['info2'];
	$info2 = addslashes($info2);
		//插入到secret表中，其中id_p代表秘书处id;id_f是企业id,result是同意结果，是布尔值；info是意思。	
	$query = "insert into secret (id_p,id_f,result,info) values ('$id','$index','$result2','$info2')";
	$result = $db->query($query);
	if ($result) {
		echo "<script language=javascript>alertAtuoClose();location.href='index.php?nav1=30';</script>";
	} else {
		echo "<script language=javascript>alert('保存失败，请联系管理员');</script>";
	}
		//找到有几个秘书处人员。这个功能现在不用了
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
	$result = $db->query($query);			
	//}
	exit();
}
if ($_POST['send22'] == 'yes')//如果秘书处已经填写完，要更改。
{
	$result2 = $_POST['result'];
	$result2 = intval($result2);
	$info2 = $_POST['info2'];
	$info2 = addslashes($info2);
	$query = "update secret set info = '$info2',result='$result2'where id_f=$index and id_p=$id";
	$result = $db->query($query);
	$query = "update join_form set state = '3' where id=$index";
	$result = $db->query($query);
	if ($result) {

		echo "<script language=javascript>alertAtuoClose();location.href='index.php?nav1=30';</script>";
	} else {
		echo "<script language=javascript>alert('保存失败，请联系管理员');</script>";
	}
}
if ($_POST['send3'] == 'yes')//管理员投递给理事会的过程
{
	$p3 = $_POST['p3'];
	$p4 = $_POST['p4'];
	$num = $_POST['num'];
	for ($i = 1; $i <= $num; $i++) {
		$str = "cid" . $i;
		$PA[$i] = $_POST[$str];
		$PA[$i] = addslashes($PA[$i]);
		$query1 = "update join_form set state='5'where id=" . $PA[$i] . "";
		$result1 = $db->query($query1);
	}
	$query = "update council_inform set preface='$p4',remark='$p3',state='1' where form_category='0'";
	$result = $db->query($query);
	if ($result)
		echo "<script language=javascript>alertAtuoClose();location.href='index.php?nav1=5';</script>";
	else
		echo "<script language=javascript>alert('保存失败，请联系管理员');</script>";
	exit();
}
if ($_POST['send4'] == 'yes')//管理员最后通过审核，等待缴费证明的过程
{
	$query = "select * from join_form where state='5'";
	$result = $db->query($query);
	$num_results = $result->num_rows;
	for ($i = 1; $i <= $num_results; $i++) {
		$companyidd = "companyidd" . $i;
		$CO[$i] = $_POST[$companyidd];
		$CO[$i] = addslashes($_POST[$companyidd]);
		$state2 = "state2" . $i;
		$state2[$i] = $_POST[$state2];
		$state2[$i] = addslashes($state2[$i]);
		$query1 = "update join_form set state = '" . $state2[$i] . "' where id='" . $CO[$i] . "'";
		$result1 = $db->query($query1);
	}
 //$query2 = "update council_inform set state = '3' where form_category=0";
	//$result2=$db->query($query2);
	if ($result1)
		echo "<script language=javascript>alertAtuoClose();location.href='index.php?nav1=5';</script>";
	else
		echo "<script language=javascript>alert('保存失败，请联系管理员');</script>";

}

if ($index > 0 || ($nav1 == 3 & $nav2 == 10))//如果是用户点击企业资料的话也能看见
{

	echo "<div class='container-fluid hidden-xs noprint'>
		<input id='btnPrint' class='noprint btn btn-info' type='button' value='打印' onclick='javascript:window.print();' style='font-weight:bold; margin-right:2em;text-decoration:none;cursor:pointer;float:right;!important; cursor:hand'/>
	<h3 class='text-center'>中国钢结构协会空间结构分会团体会员入会申请表</h3>
	<br/>
    <table  class='table table-bordered table-responsive text-center'>";
	if ($select == 7) {
		echo "
		<tr><td colspan='2'>企业编号</td><td colspan='10'>" . $row['num'] . " </td></tr>
		";
	}
	echo " <tr>
            <th colspan='12' style='text-align:center;'><lead>一、单 位 基 本 情 况</lead></th>
        </tr>
        <tr>
            <td colspan='2'>单位名称（公章）</td>
            <td colspan='4'>" . $row['c1'] . " </td>
            <td colspan='2'>企事业级别</td>
            <td colspan='4'>" . $row['c2'] . "</td>
        </tr>
<tr>
            <td colspan='2'>单位性质</td>
            <td colspan='4'>" . $row['c3'] . "  </td>
            <td colspan='2'>产权所有</td>
            <td colspan='4'>" . $row['c4'] . " </td>
        </tr>
        <tr>
            <td colspan='2'>注册资金</td>
            <td colspan='4'>" . $row['c5'] . "  </td>
            <td colspan='2'>上级单位</td>
            <td colspan='4'>" . $row['c6'] . " </td>
        </tr>
        <tr>
            <td colspan='2' rowspan='2'>负责人姓名</td>
            <td colspan='2' rowspan='2'>" . $row['c7'] . "</td>
            <td colspan='2'>职务</td>
            <td colspan='2'>" . $row['c8'] . "</td>
            <td colspan='2'>电话传真</td>
            <td colspan='2'>" . $row['c9'] . " </td>
        </tr>
        <tr>
            <td colspan='2'>职称</td>
            <td colspan='2'>" . $row['c10'] . " </td>
            <td colspan='2'>手机</td>
            <td colspan='2'>" . $row['c11'] . " </td>
        </tr>
        <tr>
            <td colspan='2' rowspan='2'>联系人（代表）姓名</td>
            <td colspan='2' rowspan='2'>" . $row['c12'] . "</td>
            <td colspan='2'>职务</td>
            <td colspan='2'>" . $row['c13'] . " </td>
            <td colspan='2'>电话传真</td>
            <td colspan='2'>" . $row['c14'] . "</td>
        </tr>
        <tr>
            <td colspan='2'>职称</td>
            <td colspan='2'>" . $row['c15'] . " </td>
            <td colspan='2'>手机</td>
            <td colspan='2'>" . $row['c16'] . " </td>
        </tr>
        <tr>
            <td colspan='2'>通讯地址</td>
            <td colspan='6'>" . $row['c17'] . "</td>
            <td colspan='2'>邮编</td>
            <td colspan='2'>" . $row['c18'] . " </td>
        </tr>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>二、单 位 规 模</lead></th>
        </tr>
        <tr>
            <td colspan='2'>创立时间</td>
            <td colspan='4'>" . $row['c19'] . " </td>
            <td colspan='2'>从事空间结构时间</td>
            <td colspan='4'>" . $row['c20'] . " </td>
        </tr>
        <tr>
            <td colspan='2'>占地面积</td>
            <td colspan='4'>" . $row['c21'] . " </td>
            <td colspan='2'>建 筑 面 积</td>
            <td colspan='4'>" . $row['c22'] . "</td>
        </tr>
        <tr>
        <td colspan='2'>资金总额</td>
        <td colspan='2'>" . $row['c23'] . " </td>
        <td colspan='2'>固定资产</td>
        <td colspan='2'>" . $row['c24'] . " </td>
        <td colspan='2'>流动资金</td>
        <td colspan='2'>" . $row['c25'] . " </td>
    </tr>
        <tr>
            <td colspan='2'>企业人数</td>
            <td colspan='2'>" . $row['c26'] . " </td>
            <td colspan='2'>管理人员</td>
            <td colspan='2'>" . $row['c27'] . " </td>
            <td colspan='2'>技术人员</td>
            <td colspan='2'>" . $row['c28'] . " </td>
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
            <td colspan='3'>" . $row['c29'] . "</td>
            <td colspan='3'>" . $row['c30'] . " </td>
            <td colspan='3'>" . $row['c31'] . " </td>
            <td colspan='3'>" . $row['c32'] . "</td>
        </tr>
        <tr>
            <td colspan='3'>" . $row['c33'] . " </td>
            <td colspan='3'>" . $row['c34'] . " </td>
            <td colspan='3'>" . $row['c35'] . " </td>
            <td colspan='3'>" . $row['c36'] . " </td>
        </tr>
        <tr>
            <td colspan='3'>" . $row['c37'] . " </td>
            <td colspan='3'>" . $row['c38'] . " </td>
            <td colspan='3'>" . $row['c39'] . " </td>
            <td colspan='3'>" . $row['c40'] . "</td>
        </tr>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>四、从事空间结构工作的详细情况</lead></th>
        </tr>
		<tr>
        <td colspan='12'>
       " . $row['c41'] . "
		</td></tr>
		
      <tr>
			<td colspan='12'>
			<label for='userfile'> 营业执照</label></td></tr>
			<tr>
			<td colspan='12'>
			<img  src='webpage/" . $row['position'] . "' width='450px'/>
			</td>
		</tr> 
		";

	if ($select >= '6' && $select != 8) {
		echo "
			<tr>
            <th colspan='12' style='text-align:center;'><lead>缴费凭证</lead></th>
        </tr>
			<tr>
				<td colspan='12'>
				<img src='webpage/pay1/" . $row['id_p'] . ".jpg' width='450px'/>
				</td>
			</tr>
		";
	}
	echo "
    </table>
	</div>
";

	echo "
	<div class='container visible-xs noprint' style='margin-top:40px;'>
	<input id='btnPrint' class='noprint btn btn-info' type='button' value='打印' onclick='javascript:window.print();' style='font-weight:bold; margin-top:-2em;text-decoration:none;cursor:pointer;float:right;!important; cursor:hand'/>
 <h5 class='text-center noprint'><strong>中国钢结构协会空间结构分会团体会员入会申请表</strong></h5>
 <table  class='table noprint table-bordered table-responsive text-center' style='font-size:14px'>";
	if ($select == 7) {
		echo "
		<tr><td>企业编号</td><td>" . $row['num'] . " </td></tr>
		";
	}
	echo " <tr>
            <th style='text-align:center;'><lead>一、单 位 基 本 情 况</lead></th>
        </tr>
        <tr>
            <td>单位名称（公章）</td> </tr>
            <tr><td>" . $row['c1'] . " </td> </tr>
            <tr><td>企事业级别</td> </tr>
            <tr><td>" . $row['c2'] . "</td> </tr>
<tr>
            <td>单位性质</td></tr>
             <tr><td>" . $row['c3'] . "  </td></tr>
            <tr> <td>产权所有</td></tr>
             <tr><td>" . $row['c4'] . " </td></tr>
        <tr>
            <td>注册资金</td></tr>
            <tr><td>" . $row['c5'] . " </td></tr>
            <tr><td>上级单位</td></tr>
            <tr><td>" . $row['c6'] . " </td>
        </tr>
        <tr>
            <td>负责人姓名</td> </tr>
             <tr><td>" . $row['c7'] . "</td> </tr>
             <tr><td>职务</td> </tr>
             <tr><td>" . $row['c8'] . "</td> </tr>
             <tr><td>电话传真</td> </tr>
            <tr> <td>" . $row['c9'] . " </td> </tr>
        <tr>
            <td>职称</td> </tr>
            <tr><td>" . $row['c10'] . " </td> </tr>
            <tr><td>手机</td> </tr>
            <tr><td>" . $row['c11'] . " </td> </tr>
        <tr>
            <td>联系人（代表）姓名</td></tr>
             <tr><td>" . $row['c12'] . "</td></tr>
             <tr><td>职务</td></tr>
             <tr><td>" . $row['c13'] . " </td></tr>
             <tr><td>电话传真</td></tr>
             <tr><td>" . $row['c14'] . "</td>
        </tr>
        <tr>
            <td>职称</td></tr>
            <tr><td>" . $row['c15'] . " </td> </tr>
            <tr><td>手机</td> </tr>
            <tr><td>" . $row['c16'] . " </td> </tr>
       
        <tr>
            <td>通讯地址</td> </tr>
            <tr><td>" . $row['c17'] . "</td> </tr>
            <tr><td>邮编</td> </tr>
            <tr><td>" . $row['c18'] . " </td> </tr>
      
        <tr>
            <th style='text-align:center;'><lead>二、单 位 规 模</lead></th>
        </tr>
        <tr>
              <tr><td>创立时间</td>  </tr>
              <tr><td>" . $row['c19'] . " </td>  </tr>
              <tr><td>从事空间结构时间</td>  </tr>
             <tr> <td>" . $row['c20'] . " </td>
        </tr>
        <tr>
            <td>占地面积</td></tr>
             <tr><td>" . $row['c21'] . " </td></tr>
             <tr><td>建 筑 面 积</td></tr>
             <tr><td>" . $row['c22'] . "</td>
        </tr>
        <tr>
        <td>资金总额</td></tr>
         <tr><td>" . $row['c23'] . " </td></tr>
        <tr> <td>固定资产</td></tr>
        <tr> <td>" . $row['c24'] . " </td></tr>
         <tr><td>流动资金</td></tr>
         <tr><td>" . $row['c25'] . " </td></tr>
        <tr>
            <td>企业人数</td></tr>
             <tr><td>" . $row['c26'] . " </td></tr>
            <tr> <td>管理人员</td></tr>
             <tr><td>" . $row['c27'] . " </td></tr>
             <tr><td>技术人员</td></tr>
            <tr> <td>" . $row['c28'] . " </td>
        </tr>
        <tr>
            <th style='text-align:center;'><lead>三、近三年的生产经营概况</lead></th>
        </tr>
        <tr><td>年度</td></tr>
         <tr><td>" . $row['c29'] . "</td></tr>
         <tr><td>产    量</td></tr>
         <tr><td>" . $row['c30'] . " </td></tr>
         <tr><td>面积（平方米）</td></tr>
		 <tr><td>" . $row['c31'] . " </td></tr>
         <tr><td>产值（万元）</td></tr>
		 <tr><td>" . $row['c32'] . "</td></tr>
          <tr><td>年度</td></tr>
         <tr><td>" . $row['c33'] . " </td></tr>
         <tr><td>产    量</td></tr>
         <tr><td>" . $row['c34'] . "</td></tr>
         <tr><td>面积（平方米）</td></tr>
		 <tr><td>" . $row['c35'] . " </td></tr>
         <tr><td>产值（万元）</td></tr>
		 <tr><td>" . $row['c36'] . " </td></tr>
		 <tr><td>年度</td></tr>
         <tr><td>" . $row['c37'] . "</td></tr>
         <tr><td>产    量</td></tr>
         <tr><td>" . $row['c38'] . " </td></tr>
         <tr><td>面积（平方米）</td></tr>
		 <tr><td>" . $row['c39'] . "</td></tr>
         <tr><td>产值（万元）</td></tr>
		 <tr><td>" . $row['c40'] . " </td></tr>
           
      
        <tr>
            <th style='text-align:center;'><lead>四、从事空间结构工作的详细情况</lead></th>
        </tr>
		<tr>
        <td>
       " . $row['c41'] . "
		</td></tr>
		
      <tr>
			<td>
			<label for='userfile'> 营业执照</label></td></tr>
			<tr>
			<td>
			<img class='img-responsive' src='webpage/" . $row['position'] . "' />
			</td>
		</tr> 
		";

	if ($select >= '6' && $select != 8) {
		echo "
			<tr>
            <thstyle='text-align:center;'><lead>缴费凭证</lead></th>
        </tr>
			<tr>
				<td>
				<img  class='img-responsive' src='webpage/pay1/" . $row['id_p'] . ".jpg' />
				</td>
			</tr>
		";
	}
	echo "
    </table></div>";

	include_once 'print_joinform.php';
	if ($category == '5')//如果是管理员身份且本企业没有入会，那么这个表格后面将输出：
	{
		echo "<div class='container-fluid noprint'>
     <form enctype='multipart/form-data' action='' method='post'>
		<table class='table table-bordered table-responsive text-center noprint'>
			<tr>
				<td colspan='2' >下一进度：</td>
				<td colspan='10'>
					<select class='form-control' data-style='btn-primary' name='state' id='state'>
							<option value='1'> 提交待验证</option>
							<option value='2'> 秘书处意见反馈</option>
							<option value='3'> 秘书处意见反馈</option>
							<option value='4'> 投递给理事会汇总名单</option>
							<option value='5'> 理事会意见反馈</option>
							<option value='6'> 等待缴费申请</option>
							<option value='7'> 缴费申请提交待审核</option>
							<option value='8'> 已入会</option>
							<option value='9'> 未通过审核</option>
					</select>
					<script  type='text/javascript'> document.getElementById('state').value = " . ($select + 2) . "; </script > 
				</td>
			</tr></table>";
		if ($select >= '2')//如果秘书处投递了意见，这块应该输出秘书处的意见和管理员的意见 秘书处有多人，所以用FOR循环。
		{
			echo "
			    <table class='table table-bordered table-responsive text-center noprint'  style='display:table'>	
			    <th id='tab2' colspan='4' onclick='removeElement()'>
				<span class='glyphicon glyphicon-th-list' aria-hidden='true'> 
				 秘书处意见</th>
				<tbody  id='tab100' style='display:none'>";
			$query = "select * from secret where id_f='$index'";
				//这里从secet表中查找秘书处的意见
			$result = $db->query($query);
			$num_results = $result->num_rows;
			for ($i = 0; $i < $num_results; $i++) {
				$row2 = $result->fetch_assoc();
				$secretresult = $row2['result'];
				$query2 = "select * from user where id=" . $row2['id_p'] . "";
				$result2 = $db->query($query2);
				$row3 = $result2->fetch_assoc();
				echo "<tr><td colspan='2'>" . ($i + 1) . "</td>
				          <td colspan='2'> " . $row3['name'] . "</tr>";
				if ($secretresult == '1') {
					echo "
					 <tr>
					 <td colspan='2'>
				     同意!
				      </td>";
				} else {
					echo "
					<tr>
					<td colspan='2'>
				     不同意!
				    </td>";
				}
				echo "
				   <td colspan='10'>
				   " . $row2['info'] . "
				   </td>
				   </tr>";
			}
			echo "<tbody></table>";
			if ($select >= '5') {
				echo "<table class='table table-bordered table-responsive text-center noprint'  style='display:table'>	
			    <th colspan='4' onclick='removeElement1()'>
				<span class='glyphicon glyphicon-th-list' aria-hidden='true'> 
				 理事会意见</th>
				<tbody id='tab101' style='display:none'>";
				$query = "select * from director where id_f='$index' and form_category=0";
				//这里从secret表中查找秘书处的意见
				$result = $db->query($query);
				$num_results = $result->num_rows;
				for ($i = 0; $i < $num_results; $i++) {
					$row2 = $result->fetch_assoc();
					$directorresult = $row2['result'];
					$query2 = "select * from user where id=" . $row2['id_p'] . "";
					$result2 = $db->query($query2);
					$row3 = $result2->fetch_assoc();
					echo "<tr><td colspan='2'>" . ($i + 1) . "</td>
				          <td colspan='2'> " . $row3['name'] . "</tr>";
					if ($directorresult == '1') {
						echo "
					 <tr>
					 <td colspan='2'>
				     同意!
				      </td>";
					} else {
						echo "
					<tr>
					<td colspan='2'>
				     不同意!
				    </td>";
					}
					echo "
				   <td colspan='10'>
				   " . $row2['info'] . "
				   </td>
				   </tr>";
				}
				echo "<tbody></table>";
			}
			if ($select == '6') {
				echo " <tr><td colspan='2'> 请输入会员证书编号：</td>
		         <td colspan='10'> <input class='form-control' name='number' ></td></tr>";
			}

		}

		echo "
           </table>
			<div style='text-align: right;margin-top:2%;margin-bottom:2%;' class='noprint'>
				<input type='hidden' value='yes' name='send'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交&nbsp; &nbsp;
				</button>
			</div>
		</form>
		</div>";
	}

	if ($category == '2')//如果是秘书处且提交给秘书处,这里的state写在query上了。
	{
		$query = "select * from secret where id_p=$id and id_f=$index";
		$result = $db->query($query);
		$num_results = $result->num_rows;
		$row = $result->fetch_assoc();
		$select2 = $row['result'] - 1;
		if ($num_results != 0) {
			echo "
<div class='container-fluid noprint'>
 <form enctype='multipart/form-data' action='' method='post'>
		<table class='table table-bordered table-responsive text-center noprint'>
			<tr>
				<td colspan='2' >秘书处意见：</td>
				<td colspan='10'>
					<select class='form-control' data-style='btn-primary' name='result' id='state' onchange='changeState(this);'>
							<option value='1'> 同意入会</option>
							<option value='2'> 不同意入会</option>
					</select>
			<script  type='text/javascript'> document.getElementById('state')[" . $select2 . "].selected=true; </script > 
				</td>
			</tr>
			<tr>
				<td colspan='12'>
				<textarea  type='text' class='form-control' name='info2'>" . $row['info'] . "</textarea>
				</td>
			</tr>
		</table>
			<div style='text-align: right;margin-bottom: 2%' class='noprint'>
				<input type='hidden' value='yes' name='send22'>
				<button type='submit' class='btn btn-md btn-primary noprint' >&nbsp;&nbsp; 投递给管理员&nbsp; &nbsp;
				</button>
			</div>
		</form>
		</div>
";

		} else {
			echo "<div class='container-fluid' class='noprint'>
 <form enctype='multipart/form-data' action='' method='post'>
		<table class='table table-bordered table-responsive text-center noprint'>
			<tr>
				<td colspan='2' >秘书处意见：</td>
				<td colspan='10'>
					<select class='form-control' data-style='btn-primary' name='result' id='state' onchange='changeState(this);'>
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

if ($index == '0') {
	$query = "select * from join_form where state='4'";
	$result = $db->query($query);
	$num_results = $result->num_rows;
	$num = $num_results;
	if ($num_results == 0) {
		echo "<h3><span class='label label-warning'>尚未有企业提交</span></h3>";
		exit();
	}

//if($row1['state']==1)
	//echo"<div class='container-fluid'><h3><span class='label label-warning'>您已向管理员投递，本次提交数据会覆盖上次数据</span></h3></div>";
//if($row1['state']==2||$row1['state']==3)
	//echo"<div class='container-fluid'><h3><span class='label label-warning'>管理员已返回意见，本次提交数据会再次发送给管理员</span></h3></div>";
	echo "
<div class='container-fluid noprint'>
<form enctype='multipart/form-data' action='' method='post'>
<table class='table table-bordered table-responsive text-left noprint' style='margin-top:1em;font-size:1.2em;'>
<tr><td style='font-family:仿宋;' colspan='7' class='noborder-table'><strong>各位常务理事：</strong></td></tr>
<tr><td colspan='31' class='noborder-table' style='font-family:仿宋;'>
<strong><textarea class='form-control' name='p4' rows='10' style='font-size:1em'></textarea></strong></td>
</table>
	<div style='margin-top:3em'>
    <table class='table table-bordered table-responsive text-center noprint' style='margin-top:2em;font-size:1em;'>
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

	for ($i = 1; $i <= $num_results; $i++) {
		$row2 = $result->fetch_assoc();
		$add1 = $row2['c30'] + $row2['c34'] + $row2['c38'];
		$add2 = $row2['c32'] + $row2['c36'] + $row2['c40'];
		$p = "cid" . $i;
		echo " 
				<tr>
				<input type='hidden' name='$p' value='" . $row2['id'] . "'>
				<input type='hidden' name='num' value='$num'>
            <td colspan='1' style='text-align:center;'>$i</td>
			 <td colspan='6' style='text-align:center;'>
			 " . $row2['c1'] . "</td>
			  <td colspan='2' style='text-align:center;'>
			   " . $row2['c7'] . " </td>
              <td colspan='3' style='text-align:center;'>
			  " . $row2['c19'] . " </td>
              <td colspan='3' style='text-align:center;'>" . $row2['c23'] . " </td>
			  <td colspan='2' style='text-align:center;'>" . $row2['c28'] . " </td>
			  <td colspan='4' style='text-align:center;'>" . $row2['c21'] . " </td>
          <td colspan='3' style='text-align:center;'>$add1</td>
		   <td colspan='3' style='text-align:center;'>$add2</td>
		   	<td colspan='4' style='text-align:center;'>" . $row2['c3'] . " </td>
        </tr> ";
	}
	echo "
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

//汇总名单
if ($index == '-4') {
	$searchStateResultj = json_encode($searchStateResult);
	echo <<< EOD
	<div class="container-fluid">
	    <form enctype='multipart/form-data' action='' method='post'>
            <label class="checkbox-inline">
	          <input  type="checkbox" id="inlineCheckbox1" name='searchState[]' value="1" > 提交待验证
            </label>
            <label class="checkbox-inline">
	          <input type="checkbox" id="inlineCheckbox2" name='searchState[]' value="3"> 秘书处意见反馈
            </label>
            <label class="checkbox-inline">
	          <input type="checkbox" id="inlineCheckbox3" name='searchState[]' value="4"> 投递给理事会
            </label>
		    <label class="checkbox-inline">
	          <input type="checkbox" id="inlineCheckbox1" name='searchState[]' value="5"> 理事会意见反馈
            </label>
            <label class="checkbox-inline">
	          <input type="checkbox" id="inlineCheckbox2" name='searchState[]' value="6"> 等待缴费申请
            </label>
            <label class="checkbox-inline">
	          <input type="checkbox" id="inlineCheckbox3" name='searchState[]' value="7"> 缴费申请提交待审核
            </label>
		    <label class="checkbox-inline">
		      <input type="checkbox" id="inlineCheckbox2" name='searchState[]' value="8"> 已入会
	        </label>
	        <label class="checkbox-inline">
		      <input type="checkbox" id="inlineCheckbox3" name='searchState[]' value="9"> 未通过审核
			</label>
			<label class="checkbox-inline">
		      <input type="checkbox" id="inlineCheckbox3" name='searchState[]' value="all"> 全部状态
			</label>
			<input type='hidden' value='yes' name='serachByState'/>
			<button type='submit' class="btn btn-primary btn-xs" style="float:right"> 查询</button>
		</form>
	</div>
	<script type='text/javascript'>
	$searchStateResultj.forEach(function(v){
	   var checkBox = document.getElementsByName('searchState[]');
	   for(var i=0;i<checkBox.length;i++){
	      if(checkBox[i].value == v){
			  checkBox[i].checked = true;
		  }
	   }
	})
	</script>
EOD;
	$query = "select *from join_form" . $stateSelected;
	$result = $db->query($query);
	$num_results = $result->num_rows;
	echo <<< EOD
    <table id="joinTable"
    data-toggle="table"
    data-striped="ture"
    data-search="ture"
    data-pagination="ture"
    data-show-columns="true"
    class="text-center"
    >
      <thead>
	      <tr>
		    <th data-field="num">序号</th>
		    <th data-field="name">公司名称</th>
		    <th data-field="company">代表人</th>
		    <th data-field="tel">联系人</th>
		    <th data-field="time">成立时间</th>
			<th data-field="state">状态</th>
			<th>操作</th>
	      </tr>
     </thead>
EOD;
	for ($i = 1; $i <= $num_results; $i++) {
		$row = $result->fetch_assoc();
		$stateshow = state_show_join($row['state']);
		echo <<< EOD
        <tr>
            <td>$i</td>
            <td>$row[c1]</td>
            <td>$row[c7]</td>
            <td>$row[c12]</td>
			<td>$row[c19]</td>
			<td>$stateshow</td>
            <td><a class="btn btn-xs btn-default" href="index.php?nav1=$nav1&nav2=$nav2&index=$row[id]">查看</a>
        </tr>
EOD;
	}
}
if ($index == '-1')//当点击理事会结果的时候，传来index=-1
{
	$query = "select id,c1 from join_form where state='5'";
	$result = $db->query($query);
	$num_results = $result->num_rows;
	if ($num_results == 0) {
		echo "<h4><span class='label label-info'>尚未有企业投递</span></h4>";
		exit();
	} else {
		echo <<< EOD
		<script type='text/javascript'>
		function checkOption(id,str_accept,str_reject){ 
			var acc_one=new Array();
			var rej_one=new Array();
			rej_one=str_reject.split("!");
			acc_one=str_accept.split("!");
			var tb_start='<div style="margin-left:2.5%;height:150px	;overflow:auto"><table style="border:1px solid 	#666666;text-align: center;width:95%"><tr style="border:1px solid #666666;"><td style="border:1px solid #666666;">姓名</td><td style="border:1px solid #666666;">是否同意</td><td style="border:1px solid #666666;">管理员意见</td></tr>';
			var tb_row='';
			for(var i=0;i<rej_one.length-1;i++){
				var rej_two=new Array();
				rej_two=rej_one[i].split(";");
				tb_row +='<tr style="border:1px solid #666666;"><td style="border:1px solid #666666;">'+rej_two[0]+'</td><td style="border:1px solid 	#666666;">'+rej_two[1]+'</td><td style="border:1px solid #666666;">'+rej_two[2]+'</td></tr>'
			}
			
			for(var i=0;i<acc_one.length-1;i++){
				var acc_two=new Array();
				acc_two=acc_one[i].split(";");
				tb_row +='<tr style="border:1px solid #666666;"><td style="border:1px solid #666666;">'+acc_two[0]+'</td><td style="border:1px solid 	#666666;">'+acc_two[1]+'</td><td style="border:1px solid #666666;">'+acc_two[2]+'</td></tr>'
			}			
			var tb_end='</table></div>';
			var string = tb_start+tb_row+tb_end;
			swal({
				title: '意见显示',
				html:string,
				showCloseButton: true,
				confirmButtonText:
				  '<i class="fa fa-thumbs-up"></i> 确定',
			  });
		}
		</script>
		<div class='container-fluid'>
		   <form enctype='multipart/form-data' action='' method='post'>
		   <h3 class='text-center'style='line-height:8px'>中国钢结构协会空间结构分会</h3>
		   <h3 class='text-center' style='line-height:10px'>中国钢协空间结构分会入会单位常务理事会审批结果</h3>
		   <br>
		   <table id="expertTable"
			   data-toggle="table"
			   data-striped="ture"
			   data-search="ture"
			   data-pagination="ture"
			   data-show-columns="true"
			   class="text-center"
		   >		      
					<tr>
					<td>序号</td>
					<td>公司名称</td>
					<td>人数</td>
					<td>意见</td>					
					<td>审核</td>
					<td>管理员意见</td>
					</tr>
			   
EOD;
		$query2 = "select * from join_form where state = 5";
		$result2 = $db->query($query2);
		$num_results2 = $result2->num_rows;
		for ($i = 1; $i <= $num_results2; $i++) {
			$row2 = $result2->fetch_assoc();
			$id_f = $row2['id'];
			$query_accept = "select a.*,u.name from director a, user u where a.form_category=0 and a.id_f='$id_f' and a.result = 1 and a.id_p =u.id";
			$query_reject = "select a.*,u.name from director a, user u where a.form_category=0 and a.id_f='$id_f' and a.result = 2 and a.id_p =u.id";
			$accept = $db->query($query_accept);
			$reject = $db->query($query_reject);
			$num_accept = $accept->num_rows;
			$num_reject = $reject->num_rows;
			$string_accept = "";
			$string_reject = "";
			while ($row3 = $reject->fetch_assoc()) {
				$string_reject = $string_reject . $row3["name"].";不同意;" . $row3["info"] . ";!";
			}
			$string_reject = "'" . $string_reject . "'";
			while ($row4 = $accept->fetch_assoc()) {
				$string_accept = $string_accept . $row4["name"] . ";同意;" . $row4["info"] . "!";
			}
			$string_accept = "'" . $string_accept . "'";
			$c1 = "'" . $row2['id'] . "'";
			echo "
	   <tr>
		  <td>$i</td>
		  <td>" . $row2['c1'] . "</td>
		  <td>同意:$num_accept 人;不同意:$num_reject 人</td>
		  <td><input type='button' value='查看意见' onclick=checkOption($c1,$string_accept,$string_reject)></td>

		  <td width='12%'>
			   <select class='form-control' data-style='btn-primary' name='$state2'>
					 <option value='6'> 通过审核，等待缴费证明</option>
					 <option value='9'> 未通过审核</option>
				 </select>
		   </td>
		   <td>
		   <input type='text' class='btn  btn-default'  style='width:100%;height:100%' > 
		   </td>
	   </tr>
";
		}
		echo "</table>";
// 	echo" <div class='container-fluid hidden-xs'>
// 	<form enctype='multipart/form-data' action='' method='post'>
// 	<table class='table table-bordered table-responsive text-center noprint' style='margin-top:2em;font-size:1em;'>
// 	 <h3 class='text-center'style='line-height:8px'>中国钢结构协会空间结构分会</h3>
// <h3 class='text-center' style='line-height:10px'>中国钢协空间结构分会入会单位常务理事会审批结果</h3>
//    <tbody>
//    <tr>
//    <td colspan='1'>序号</td>
//    <td colspan='6'>公司名称</td>
//    ";
//    //更改后user可以有很多类别，这里做一个改动。
//   $query2="select name,id from user where category like '%4%'";//查找所有的常务理事
//   $result2=$db->query($query2);
//   $num_results2=$result2->num_rows;
// 	for($i2=1;$i2<=$num_results2;$i2++)
// 	{
// 	$row2=$result2->fetch_assoc();
// 	  $p[$i2]=$row2['id'];//将理事会的id依次存放在$p[]中。
// 	echo" <td colspan='6'>".$row2['name']."意见</td>";
// 	}
// 	echo"<td>审批结果</td></tr>";
// //找出理事会已经给出意见的企业
	
// 	for($i=1;$i<=$num_results;$i++)//大循环作为输出每一行的循环，小循环作为将常务理事会的名称和结果输出循环。
// 	{
// 	$row=$result->fetch_assoc();
// 	$id1=$row['id'];
//    $companyidd="companyidd".$i;
//    $state2="state2".$i;
  
// 	echo"<tr>
// 	<td colspan='1'>$i</td>
// 	<td colspan='6'>".$row['c1']."</td> 
// 	";
//   for($i2=1;$i2<=$num_results2;$i2++)
// 	   {
// 	  $id2=$p[$i2];
// 	$query1="select result from director where form_category=0 and id_f='$id1' and id_p='$id2'";//id是企业的id ,id2是常务理事的id
// 	$result1=$db->query($query1);
// 	$row1=$result1->fetch_assoc();
// 	$re=$row1['result'];//为了和之前的result分开避免混淆。
// 	echo"<td colspan='6'>";
// 	if($re==1)
// 		echo"同意入会";
// 	else if($re==2)
// 		echo"不同意入会";
// 	echo"</td>";
// 	    }
//     echo"
// 	<td colspan='4'>
// 	<select class='form-control' data-style='btn-primary' name='$state2'>
// 							<option value='6'> 通过审核，等待缴费证明</option>
// 							<option value='9'> 未通过审核</option>
// 					</select>
// 					<input type='hidden' value='$id1' name='$companyidd'>
// 	</td> 
// 	</tr>
	
// 	";
// 	}	
// echo"
// 			</tbody>
// </table>";
		echo "
<div style='text-align: right;margin-bottom: 2%' class='noprint'>
				<input type='hidden' value='yes' name='send4'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交&nbsp; &nbsp;
				</button>
			</div></form></div>";
	}
}
if ($index == '-2' || $index == '-3')//这是已入会和未入会的统计
{
	switch ($index) {
		case '-2':
			$t = 8;
			break;
		case '-3':
			$t = 9;
			break;
		default:
			break;
	}
	$query = "select * from join_form where state = '$t'";
	$result = $db->query($query);
	$num_results = $result->num_rows;
	if ($_POST['total_send'] == 'yes') {
		for ($i = 0; $i < $num_results; $i++) {
			$str = "state" . $i;
			$str1 = "companyid" . $i;
			$PA[$i] = $_POST[$str];
			$PA[$i] = addslashes($PA[$i]);
			$PS[$i] = $_POST[$str1];
			$PS[$i] = addslashes($PS[$i]);
			$query1 = "update join_form set state=" . $PA[$i] . " where id=" . $PS[$i] . "";
			$result1 = $db->query($query1);
			if ($result = null) {
				echo "<script language=javascript>alert('失败！');</script>";
				exit();
			}
		}
		echo "<script language=javascript>alertAtuoClose();</script>";
	}

	$query = "select * from join_form where state = '$t'";
	if ($_POST['total_check'] == 'yes') {
		$checkname = $_POST['checkname'];
		$query = "select * from join_form where state = '$t' and c1 like  '%{$checkname}%'";
	}
	$result = $db->query($query);
	$num_results = $result->num_rows;
	echo "
   <div class='container-fluid' style='margin-top:21px'>
   <form enctype='multipart/form-data' action='' method='post' >
   <div class='col-xs-3' style='float:right;margin-bottom:10px'>
   <input type='text' name='checkname'> 
   <input type='hidden' name='total_check' value='yes'>
   <button type='submit' class='btn btn-success'>搜索</button></form></div>
	</div>
	<form enctype='multipart/form-data' action='' method='post' >
<table class='table table-responsive table-bordered text-center'>
<tbody>
<tr>
<td colspan=''><strong>序号</strong></td>
<td colspan=''><strong>公司名称</strong></td>
<td colspan=''><strong>代表人</strong></td>
<td colspan=''><strong>联系人</strong></td>
<td colspan=''><strong>成立时间</strong></td>
<td colspan=''> </td>
</tr> ";
	for ($i = 0; $i < $num_results; $i++) {
		$state = "state" . $i;
		$companyid = "companyid" . $i;
		$row = $result->fetch_assoc();
		echo "<tr>
	     <td colspan=''>" . ($i + 1) . "</td>
         <td colspan=''>" . $row['c1'] . "</td>
         <td colspan=''>" . $row['c7'] . "</td>
         <td colspan=''>" . $row['c12'] . "</td>
         <td colspan=''>" . $row['c19'] . "</td>
		 <td colspan=''>
		 <select class='form-control' data-style='btn-primary' name='$state' id='$state'>
							<option value='1'> 提交待验证</option>
							<option value='3'> 秘书处意见反馈</option>
							<option value='4'> 投递给理事会</option>
							<option value='5'> 理事会意见反馈</option>
							<option value='6'> 等待缴费申请</option>
							<option value='7'> 缴费申请提交待审核</option>";
		if ($t == 8) {
			echo "<option value='8' selected = selected> 已入会</option>
							<option value='9'> 未通过审核</option>";
		}
		if ($t == 9) {
			echo "<option value='8' > 已入会</option>
							<option value='9' selected = selected> 未通过审核</option>";
		}
		echo "</select>
				</td>
        <input type='hidden' value='" . $row['id'] . "' name='$companyid'>
         </tr>";

	}
	echo "</tbody></table>
<div style='text-align: right;margin-top:2%;margin-bottom:2%;' class='noprint'>
				<input type='hidden' value='yes' name='total_send'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交&nbsp; &nbsp;
				</button>
			</div>
		</form>

</div>

";

}
?>