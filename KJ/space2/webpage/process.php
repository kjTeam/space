<?php
$index = $_GET['index'];
if ($location == 1) //用location取出四张表中相同的部分
{
	if (isset($_GET['index'])) //说明不是企业进入
	{
		if ($category == 5) //管理员进入
		{
			$index = $_GET['index'];
			//index 是 结构表的索引
			$query = "select * from $sheet where id=$index";
			$result = $db->query($query);
			$row = $result->fetch_assoc();
			
			//if( (($row['state']!=1)&&($nav1==7))   //nav1为7
				//||(($row['state']!=2)&&($nav1==8))  //nav1为8
				//||(($row['state']!=3)&&($nav1==9))  //nav1为9
					//) { echo "<h3><span class='label label-danger'>连接过期！请刷新页面</span></h3>"; exit();}//管理员重进入 注意这里用到了nav1！！！！！这里的判断过后在更改
		} else if ($category == 3) //专家进入
		{
			//index 及id_f已经在expert.php中获取
			$query = "select * from $sheet where id=$id_f";
			$result = $db->query($query);
			$row = $result->fetch_assoc(); //获取数据
		}
		//else if($category==4) //理事会进入
		//{
		$index = $_GET['index'];
			//index 是 结构表的索引
			//if(ifthereis('director',"id_p=$id and id_f=$index")>0)  { echo "<h3><span class='label label-danger'>连接过期！请刷新页面</span></h3>"; exit();} //从director表检查重进入，结构表的state是不变的
			//$query="select * from $sheet where id=$index";
			//$result=$db->query($query);
			//$row=$result->fetch_assoc();						
		//}
		//这里还要增加其他身份的重进入
	} else {
		$db = create_database();
		$query = "select * from $sheet where id_p=$id ";
		$result = $db->query($query);
		$num_results = $result->num_rows;
		if ($num_results) //如果有提交
		{
			$row = $result->fetch_assoc();
			echo "<h4><span class='label label-info'>当前状态：";
			switch ($row['state']) {
				case 1:
					echo "提交待审核</span></h4>";
					break;//提交待审核
				case 2:
					echo "提交待审核</span></h4>";
					break;//等待专家打分
				case 3:
					echo "提交待审核</span></h4>";
					break;//专家意见反馈
				case 4:
					echo "提交待审核</span></h3>";
					break;//投递给理事会
				case 5:
					echo "提交待审核</span></h3>";
					break;//理事会意见反馈
				case 6:
					echo "已通过审核</span></h3>";
					break;//通过审核
				default:
					echo "出错</span></h3>";
					break;
			}
		} else {
			echo "<h4><span class='label label-info'>尚未提交申请表！</span></h4>"; //没有提交则退出
			exit();
		}
	}

	if ($_POST['send1'] == 'yes') //管理员提交 必须放在重进入验证之后
	{
		$experts = $_POST['experts'];
		$name = $_POST['name'];
		if (count($experts) != 0) {
			for ($i = 0; $i < count($experts); $i++) {
				$query = "insert into expert (id_p,id_f,form_category,state,name) values (" . $experts[$i] . ",$index,$category_f,1,'$name')"; //注意这个表名没有s
				$db->query($query);
			}
			$query = "update $sheet set state=2 where id=$index";
			$db->query($query);
			echo "<script language=javascript>alert('分配成功！'); location.href='http://www.cnass.org/space2/index.php?nav1=6';</script>";
			exit();
		} else {
			echo "<script language=javascript>alert('请选择专家！');</script>";
			exit();
		}
	}
}
if ($_POST['send2'] == 'yes') //专家提交 重进入验证在expert.php 这个可以放在前面，但是为了整齐就放在这里了，数据库会多加载一次。
{
	for ($i = 0; $i < 6; $i++) {
		$str = "judge" . ($i + 1);
		$s[$i] = $_POST[$str]; //获取打分
	}
	$info = $_POST['info'];
	$info = addslashes($info);
	$query = "update expert set s1='" . $s[0] . "',s2='" . $s[1] . "',s3='" . $s[2] . "',s4='" . $s[3] . "',s5='" . $s[4] . "',s6='" . $s[5] . "',state='2' where id=$index"; //注意这里变化的是expert表的state而不是form表的                                       state
	$result = $db->query($query);
	$query = "update $sheet set state=3 where id=$id_f";
	$db->query($query);
	if ($result)
		echo "<h4><span class='label label-success'>评价成功！</span></h4>";
	else echo "<h4><span class='label label-danger'>出错！请联系管理员！</span></h4>";
	exit();
}

if ($_POST['send3'] == 'yes') //管理员将专家的结果提交至理事会。
{
	$info = $_POST['info'];
	$info = addslashes($info);
	$query = "update $sheet set state=4,info1='$info' where id=$index";
	$db->query($query);
	echo "<h4><span class='label label-success'>投递成功</span></h4>";
	exit();
}
if ($_POST['send4'] == 'yes') {
	$p3 = $_POST['p3'];
	$p4 = $_POST['p4'];
	$p1 = $_POST['p1'];
	$p2 = $_POST['p2'];
	$num = $_POST['num'];
	for ($i = 1; $i <= $num; $i++) {
		$str = "cid" . $i;
		$PA[$i] = $_POST[$str];
		$PA[$i] = addslashes($PA[$i]);
		$r = "r" . $i;
		$RA[$i] = $_POST[$r];
		$RA[$i] = addslashes($RA[$i]);
		$t = "t" . $i;
		$TA[$i] = $_POST[$t];
		$TA[$i] = addslashes($TA[$i]);

		$query1 = "update $sheet set state='5',result1='" . $RA[$i] . "',result2='" . $TA[$i] . "'  where id=" . $PA[$i] . "";
		$result1 = $db->query($query1);
	}
	$query = "replace into council_inform (headline1,headline2, preface,remark,state,form_category) values ('$p1','$p2','$p4','$p3','1','$category_f')";
	$result = $db->query($query);

	if ($result)
		echo "<script language=javascript>alert('提交成功！'); location.href='http://www.cnass.org/space2/index.php?nav1=6';</script>";
	else
		echo "<script language=javascript>alert('出错！');</script>";
	exit();
}
if ($_POST['send5'] == 'yes') {
	$query = "select * from $sheet where state='5'";
	$result = $db->query($query);
	$num_results = $result->num_rows;
	for ($i = 1; $i <= $num_results; $i++) {
		$companyid1 = "companyid" . $i;
		$companyid[$i] = $_POST[$companyid1];
		$companyid[$i] = addslashes($companyid[$i]);
		$result = "result" . $i;
		$RE[$i] = $_POST[$result];
		$RE[$i] = addslashes($RE[$i]);
		$state2 = "state2" . $i;
		$state2[$i] = $_POST[$state2];
		$state2[$i] = addslashes($state2[$i]);
		$query1 = "update $sheet set state = 6 where id='" . $companyid[$i] . "'";
		$result1 = $db->query($query1);
		$query2 = " update join_form set level2 = '$RE[$i]' where $sheet.id = '" . $companyid[$i] . "' and join_form.id_p = $sheet.id_p";
	//if($state2[$i]=='6')
		//{ 
        // $query1 = "select * from $sheet where id='".$companyid[$i]."'";
         //$result=$db->query($query1);
         //$row=$result->fetch_assoc();
		 //$result1=$row['c16'];
		// $result2=$row['c17'];
        // $query2 = "update $sheet set result1='".$row['c16']."',result2='".$row['c17']."' where id='$companyid[$i]'";
		  //$db->query($query2);
		 // echo $query2;
	   // }
	}
	$query2 = "update council_inform set state = '3' where form_category='$category_f'";
	$result2 = $db->query($query2);
	if ($result2)
		echo "<script language=javascript>alert('提交成功！'); </script>";
	else
		echo "<script language=javascript>alert('出错！'); </script>";
	exit();
}
	//if($_POST['send4']=='yes') //理事会提交，内容是从check_join.php 沾过来的
	//{
		//$result=$_POST['judge'];
		//$result=intval($result);
		//$info=$_POST['info'];
		//$info=addslashes($info);
		//此处是自刷新，还带着index		
		//$query="insert into director set id_p=$id, id_f=$index, result=$result, //info='$info', form_category=$category_f";
		//$result=$db->query($query);
		//if($result)
			//echo "<h4><span class='label label-success'>保存成功</span></h4>";
		//else
			//echo "<h4><span class='label label-danger'>出现问题，请联系管理员</span></h4>";
		//exit();
	//}
	//if($_POST['send5']=='yes') //管理员对理事会评审提交，内容是从check_join.php 沾过来的
	//{//
		//$result=$_POST['judge'];
		//$result=intval($result);
		//$info=$_POST['info'];
		//$info=addslashes($info);
		//此处是自刷新，还带着index		
		//id_p=$_POST['id_p'];
		//$id_p=intval($id_p); //获取创建表的人，用于获得与其匹配的join_form表
		//$query="update $sheet set state=$result, info2='$info' where id=$index";
		//$result=$db->query($query);
		//switch($category_f)
		//{
			//case 1: $level='level1';break;
			//case 2: $level='level2';break;
			//case 3: $level='level3';break;
			//case 4: $level='level4';break;
			//default:break;
		//}
		//$query="update join_form set $level='$info' where id_p=$id_p";
		//$result=$db->query($query);
		//if($result)
			//echo "<h4><span class='label label-success'>保存成功</span></h4>";
		//else
			//echo "<h4><span class='label label-danger'>出现问题，请联系管理员</span></h4>";
		//exit();
	//}


if ($location == '2') {

	if ($category == '5') //是管理员查看 注意下面select的name 必须带[]符号，post获得时将其去掉，但是获得的是一个数组，注意有s。noneselectedtext属性没有响应，可能需要js控制。
	{
		if ($index != '-1' && $index != '0' && $index != '-2')//不是投递给理事会或者理事会意见反馈
		{ 
		
			//index 是 结构表的索引
			$query = "select * from $sheet where id=$index";
			$result = $db->query($query);
			$row = $result->fetch_assoc();
			$select = $row['state'] - 1;
			echo "<div class='container-fluid noprint' style='padding:0px 15px'>
				<form enctype='' action='' method='post'>
				<table class='table table-bordered table-responsive text-center noprint'>
		     
			 <tr>
				<td colspan='2' >目前进度：</td>
				<td colspan='10'>
					<select class='form-control' data-style='btn-primary' name='state' id='state'>
							<option value='1'> 提交待验证</option>
							<option value='2'> 等待专家意见</option>
							<option value='3'> 专家意见反馈</option>
							<option value='4'> 投递给理事会</option>
							<option value='5'> 理事会意见反馈</option>
							<option value='6'> 审核成功</option>
					</select>
					<script  type='text/javascript'> document.getElementById('state')[" . $select . "].selected=true; </script > 
				</td>
			</tr></table></form>";
			if ($row['state'] == '1')  //nav==1 评审分组
			{
				echo "<div class='container-fluid noprint' style='padding:0px 15px'>
				<form class='noprint' enctype='' action='' method='post'>
					<select  name='experts[]' class='selectpicker show-tick form-control' multiple data-live-search='true' noneSelectedText='选择专家'>";
											
			//这里展开专家列表，这种格式：<option value='专家的id'> 专家的name</option >
				$query = "select id,name from user where category=3";
				$db->query($query);
				$result = $db->query($query);
				$num_results = $result->num_rows;
				for ($i = 0; $i < $num_results; $i++) {
					$row1 = $result->fetch_assoc();
					echo "<option value='" . $row1['id'] . "'> " . $row1['name'] . "</option>"; //这里使用row1 ，因为下面有一个隐藏表单项还要用到row
				}
				echo "  </select>
					<div style='text-align: right;margin:10px 0'>
						<input type='hidden' value='yes' name='send1'>
						<input type='hidden' value='" . $row['c1'] . "' name='name'>
						<button type='submit' class='btn btn-sm btn-primary' >&nbsp;&nbsp; 提交 &nbsp; &nbsp;
						</button>
					</div>
				</form></div>";
			} else if ($row['state'] == 3) //这里是从check_join沾过来的 nav==2 评审结果查看
			{
				print_experts($index, $category_f); //注意这个函数里面是一个table		
				echo "					
					<form enctype='multipart/form-data' action='' method='post'>
						<table class='table table-bordered table-responsive text-center'>
													<tr>
														<td colspan='12'>
														<textarea  type='text' class='form-control' name='info' placeholder='管理员意见及留言'></textarea>
														</td>
													</tr>
						</table>
						<div style='text-align: right;margin-bottom: 2%'>
							<input type='hidden' value='yes' name='send3'>
							<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 投递至理事会 &nbsp; &nbsp;</button>
						</div>
					</form>";
			}
		} else if ($index == '0') {
			$query = "select * from $sheet where state='4'";
			$result = $db->query($query);
			$num_results = $result->num_rows;
			if ($num_results == 0) {
				echo "<h3><span class='label label-warning'>尚未有企业提交</span></h3>";
				exit();
			}

//if($row1['state']==1)
	//echo"<div class='container-fluid'><h3><span class='label label-warning'>您已向管理员投递，本次提交数据会覆盖上次数据</span></h3></div>";
//if($row1['state']==2||$row1['state']==3)
	//echo"<div class='container-fluid'><h3><span class='label label-warning'>管理员已返回意见，本次提交数据会再次发送给管理员</span></h3></div>";
			echo "
<div class='container-fluid'>
<form enctype='multipart/form-data' action='' method='post'>
<table class='table table-bordered table-responsive text-left' style='margin-top:1em;font-size:1.2em;'>
<tr><td style='font-family:仿宋;' colspan='7' class='noborder-table'><strong>各位常务理事：</strong></td></tr>
<tr><td colspan='31' class='noborder-table' style='font-family:仿宋;'>
<strong><textarea class='form-control' name='p4' rows='10' style='font-size:1em'></textarea></strong></td>
</table>
	<div style='margin-top:3em'>
    <table class='table table-bordered table-responsive text-center' style='margin-top:2em;font-size:1em;'>
	<input type='text' class='form-control noborder-input text-center input-lg' style='font-size:22px;' name='p1' value='中国钢结构协会空间结构分会'>
<input class='form-control noborder-input text-center input-lg' style='font-size:22px' name='p2'value='膜结构企业等级会员第十七次评审暨第九次评审结果'>
        <tr>
            <th colspan='1' style='text-align:center;'>序号</th>
			 <th colspan='6' style='text-align:center;width:14%'>单位名称</th>
			  <th colspan='6' style='text-align:center;'>申报等级</th>
              <th colspan='6' style='text-align:center;'>评审结果</th>
            
        </tr>";
		//这里从mo1表中查找要投递给理事会的企业
			$num = $num_results;
			for ($i = 1; $i <= $num_results; $i++) {
				$r = "r" . $i;//两个评审结果
				$t = "t" . $i;//需要问孙老师，用不用修改评审结果。
				$row2 = $result->fetch_assoc();
				$p = "cid" . $i;
				echo "<input type='hidden' name='$p' value='" . $row2['id'] . "'>
				<input type='hidden' name='num' value='$num'>";
				if ($row2['c16'] != null && $row2['c17'] != null) {
					echo " 
				<tr>
            <td colspan='1' rowspan='2' style='text-align:center;'>$i</td>
			 <td colspan='6' rowspan='2' style='text-align:center;'>
			 " . $row2['c1'] . "</td>
			 <td colspan='6'> " . $row2['c16'] . " </td>
			<td colspan='6'> <input type='text' name='$r' class='form-control noborder-input text-center' style='font-size:14px;' value='" . $row2['c16'] . "'>  </td>
			  <tr><td colspan='6'>" . $row2['c17'] . " </td> 
			 <td colspan='6'> <input type='text' name='$t' class='form-control noborder-input text-center' style='font-size:14px;' value='" . $row2['c17'] . "'>  </td></tr>
        </tr> ";
				} else {

					echo " 
				<tr>
            <td colspan='1' style='text-align:center;'>$i</td>
			 <td colspan='6' style='text-align:center;'>
			 " . $row2['c1'] . "</td>
			 <td colspan='6'> " . $row2['c16'] . " </td>
			 <td colspan='6'> <input type='text' name='$r' class='form-control noborder-input text-center' style='font-size:14px;' value='" . $row2['c16'] . "'>
			 <input type='hidden' name='$t'></td>
        </tr> ";
				}
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
				<input type='hidden' value='yes' name='send4'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 投递给理事会&nbsp; &nbsp;
				</button>
			</div>
		</form>
		</div>";
		}

		$query1 = "select * from council_inform where form_category='1'";
		$result1 = $db->query($query1);
		$row1 = $result1->fetch_assoc();
		if ($index == '-1')//当点击理事会结果的时候，传来index=-1
		{
			echo " <div class='container-fluid'>
	<form enctype='multipart/form-data' action='' method='post'>
	<table class='table table-bordered table-responsive text-center' style='margin-top:2em;font-size:1em;'>
	 <h3 class='text-center'style='line-height:8px'>" . $row1['headline1'] . "</h3>
<h3 class='text-center' style='line-height:10px'>" . $row1['headline2'] . "</h3>
   <tbody>
   <tr>
   <td colspan='1'>序号</td>
   <td colspan='6'>公司名称</td>
   ";
			$query2 = "select name,id from user where category=4";//查找所有的常务理事
			$result2 = $db->query($query2);
			$num_results2 = $result2->num_rows;
			for ($i2 = 1; $i2 <= $num_results2; $i2++) {
				$row2 = $result2->fetch_assoc();
				$p[$i2] = $row2['id'];//将理事会的id依次存放在$p[]中。
				echo " <td colspan='6'>常务理事" . $row2['name'] . "意见</td>";
			}
			echo "<td>审批结果</td></tr>";
//找出理事会已经给出意见的企业
			$query = "select id,c1 from $sheet where state='5'";
			$resultTotal = $db->query($query);
			$num_results = $resultTotal->num_rows;
			for ($i = 1; $i <= $num_results; $i++) {//大循环作为输出每一行的循环，小循环作为将常务理事会的名称和结果输出循环。
				$row = $resultTotal->fetch_assoc();
				$companyid1 = "companyid" . $i;
				$state2 = "state2" . $i;
				$result = "result" . $i;
				$moID = $row['id'];
				echo "<tr>
	       <td colspan='1'>$i</td>
	       <td colspan='6'>" . $row['c1'] . "</td>";
				for ($i2 = 1; $i2 <= $num_results2; $i2++) {
					$id2 = $p[$i2];
					$query1 = "select result from director where form_category=1 and id_f='$id' and id_p='$id2'";//id是企业的id ,id2是常务理事的id
					$result1 = $db->query($query1);
					$row1 = $result1->fetch_assoc();
					$re = $row1['result'];//为了和之前的result分开避免混淆。
					echo "<td colspan='6'>";
					if ($re == 1)
						echo "同意";
					else if ($re == 2)
						echo "不同意";
					echo "</td>";
				}
				echo "
	      <td colspan='4'>
	         <input type='text' class='form-control' name='$result'>
	      </td> 
	    </tr>
	       <input type='hidden' value='$moID' name='$companyid1'>
		";
			}
			echo "
			</tbody>
</table>
<div style='text-align: right;margin-bottom: 2%'>
				<input type='hidden' value='yes' name='send5'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交&nbsp; &nbsp;
				</button>
			</div></form></div>";
		}  if ($index == '-2') {				
		  //汇总名单
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
			echo"</table>";
		}

		//else if($row['state']==3) //nav==3 理事会结果查看
		//{
			//print_sod($index,$category_f);
		//}
		//投递给理事会的内容

	}
	/*else if($category==3)  //专家
	{
		echo "
		<form enctype='multipart/form-data' action='' method='post'>
		<table class='table table-bordered table-responsive text-center'>";
		for($i=0;$i<6;$i++)
		{
			echo "
				<tr>
				<td colspan='2' >支撑材料".($i+1)."意见：</td>
				<td colspan='10'>
				<textarea type='text' class='form-control'rows='2' name='judge".($i+1)."'></textarea>
					
				</td>
				</tr>
			";
		}
		echo "			
	
		</table>
			<div style='text-align: right;margin-bottom: 2%'>
				<input type='hidden' value='yes' name='send2'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交 &nbsp; &nbsp;
				</button>
			</div>
		</form>";
		
	}
	 */

	//else if($category==4) //理事会进入，这里是从上面管理员查看评审结果沾过来的
	//{
		//print_experts($index,$category_f);
		//echo " 
			//<form enctype='multipart/form-data' action='' method='post'>
			//<table class='table table-bordered table-responsive text-center'>
			//<tr>
			//<tr><td colspan='2'>管理员留言：</td><td colspan='10'>".$row['info1']." </td></tr>
			//<td colspan='2' >理事会意见：</td>
				//<td colspan='10'>
					//<select class='form-control' data-style='btn-primary' //name='judge'>
							//<option value='1'> 同意！</option>
							//<option value='2'> 不同意！</option>
							//<option value='3'> 其他！</option>
					//</select>
				//</td>
			//</tr>
			//<tr>
				//<td colspan='12'>
				//<textarea  type='text' class='form-control' name='info' placeholder='意见及留言'></textarea>
				//</td>
			//</tr>
		//</table>
			//<div style='text-align: right;margin-bottom: 2%'>
				//<input type='hidden' value='yes' name='send4'>
				////<input type='hidden' value='".$row['id_p']."' name='id_p'>
				//<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交 &nbsp; &nbsp;
				//</button>
			//</div>
		//</form>";
	//}

}
?>