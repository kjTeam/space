<?php
error_reporting(0);
session_start();
date();
include_once "lib.php";
$db = create_database();
$id = $_SESSION['id'];
//form_category = '1'是膜结构 state = '1'表示管理员投递过来。
//$query = "select * from council_inform where form_category = '1' and state = '1'";
//$result = $db->query($query);
//$num_results = $result->num_rows;
//if($num_results==0)
//{
//echo"<h3><span class='label label-warning'>管理员尚未投递</span></h3>";
// exit();
//}
//查询投递给理事会的企业，result1不要改动。
$query1 = "select * from mo2_chengbao where state='7'";
$result1 = $db->query($query1);
$num_results1 = $result1->num_rows;
$query = "select * from mo2_zhuanxiang where state='7'";
$result2 = $db->query($query);
$num_results = $result2->num_rows;
if (($num_results1 + $num_results) == 0) {
    echo "<h3><span class='label label-warning'>管理员尚未投递</span></h3>";
    exit();
}
//如果理事会投递给管理员
if ($_POST['send'] == 'yes') {
	$num = $_POST['num'];
	$num1 = $_POST['num1'];
	for($i=1;$i<= $num;$i++){
		$str = "p" . $i;
		$PA[$i] = $_POST[$str];
		$PA[$i] = addslashes($PA[$i]);
		$z = "id" . $i;
		$PI[$i] = $_POST[$z];
		$PI[$i] = addslashes($PI[$i]);
		$flag1 = "flag1" . $i;
		$PF[$i] = $_POST[$flag1];
		$PF[$i] = addslashes($PF[$i]);
		if($PF[$i]==1){
			$query2 = "update director set result = '".$PA[$i]."' where id_p = '" . $id . "' and id_f = '" . $PI[$i] . "' and form_category='3_1'";
		}else{
			$query2 = "insert into director (id_p,id_f,result,form_category) values ('" . $id . "' ,'" . $PI[$i] . "','" . $PA[$i] . "','3_1')";
		}
        $result2 = $db->query($query2);
	}
    for ($i = ($num+1); $i <= ($num+$num1); $i++) {
		$str = "p" . $i;
        $PA[$i] = $_POST[$str];
        $PA[$i] = addslashes($PA[$i]); //需要问孙老师理事会的名字需要更改吗？
		$c = "cid" .$i;
		$PI[$i] = $_POST[$c];
        $PI[$i] = addslashes($PI[$i]);
		$flag2 = "flag2" . $i;
		$PF[$i] = $_POST[$flag2];
		$PF[$i] = addslashes($PF[$i]);
		if($PF[$i]==1){
			$query2 = "update director set result = '".$PA[$i]."' where id_p = '" . $id . "' and id_f = '" . $PI[$i] . "' and form_category='3_2'";
		}else{
			$query2 = "insert into director (id_p,id_f,result,form_category) values ('" . $id . "' ,'" . $PI[$i] . "','" . $PA[$i] . "','3_2')";
		}
		$result2 = $db->query($query2);
	}
    if ($result) {
		echo "<script language=javascript>alertAtuoClose();</script>";
    } else {
        echo "<script language=javascript>alert('出现问题，请联系管理员')</script>";
    }
}
$query = "select * from council_inform where form_category=1";
$result = $db->query($query);
$row = $result->fetch_assoc(); //council_inform这个表
echo "
<div class='container-fluid'>
<form enctype='multipart/form-data' action='' method='post'>
<table class='table table-bordered table-responsive text-left' style='margin-top:1em;font-size:1.2em;'>
<tr><td colspan='7' class='noborder-table'style='font-family:仿宋;'><strong>各位常务理事：</strong></td></tr>
<script  type='text/javascript'> document.getElementById('txt1').readOnly=true;  </script>
<tr><td colspan='31' class='noborder-table' style='font-family:仿宋'>
<strong><textarea class='form-control noborder-input' rows='10' id ='txt1' style='font-size:1em;resize: none;overflow:hidden;background-color:#fff;' disabled=true>
" . $row['preface'] . "</textarea></strong></td>
</table>
	<div style='margin-top:3em'>
    <table class='table table-bordered table-responsive text-center' style='margin-top:2em;font-size:1em;'>
	<h3 class='text-center'style='line-height:8px'>" . $row['headline1'] . "</h3>
<h3 class='text-center' style='line-height:10px'>" . $row['headline2'] . "</h3>
         <tr>
            <th colspan='1' style='text-align:center;'>序号</th>
			 <th colspan='6' style='text-align:center;width:14%'>单位名称</th>
			  <th colspan='6' style='text-align:center;'>申报等级</th>
              <th colspan='6' style='text-align:center;'>评审结果</th>
			  <th colspan='3' style='text-align:center;'>状态</th>
			  <th colspan='3' style='text-align:center;'>意见</th>
        </tr>";
//这里从mo2表中查找要投递给理事会的企业

for ($i = 1; $i <= $num_results; $i++) {
	$p = "p" . $i;
	$z= "id" . $i;
	$flag_z = "flag1".$i;
    $row2 = $result2->fetch_assoc();
    $state = "state" . $i; //后面的管理员意见
    $query = "select * from director where id_p=$id and id_f=" . $row2[id] . " and form_category='3_1'";
    $result = $db->query($query);
	$flag1 = (($result->num_rows>0)?1:'');
	$row5 = $result->fetch_assoc();
	$ww = $row5['result'] - 1;
	echo"<input type='hidden' name='$z' value='".$row2[id]."'/>
	<input type='hidden' name='num' value='$num_results'/>
	<input type='hidden' name='$flag_z' value='$flag1'/>";
	if ($row2['c16'] != null && $row2['c17'] != null) {
        echo "
			<tr>
                <td colspan='1' rowspan='2' style='text-align:center;'>$i</td>
			    <td colspan='6' rowspan='2' style='text-align:center;'>
			          " . $row2['c1'] . "</td>
			    <td colspan='6'> " . $row2['c16'] . " </td>
			    <td colspan='6'>" . $row2['result1'] . "</td>";
			    if($flag1==1){
					echo"<td colspan='3' rowspan='2'><span class='badge' style='background:green'>已处理</span></td>";
				}else{
					echo"<td colspan='3' rowspan='2'><span class='badge' style='background:red'>未处理</span></td>";
				}
				echo"<td colspan='3' rowspan='2'>
		<select class='form-control' data-style='btn-primary' name='$p' id='$state'>
			<option value='1'> 同意</option>
			<option value='2'> 不同意</option>
					</select>
					<script  type='text/javascript'> document.getElementById('$state')[" . $ww . "].selected=true; </script>
					</td> </tr>
			  <tr><td colspan='6'>" . $row2['c17'] . " </td>
			 <td colspan='6'> " . $row2['result2'] . " </td></tr>

        ";
    } else {
        //这里有疑惑
        echo "
				<tr>
            <td colspan='1' style='text-align:center;'>$i</td>
			 <td colspan='6' style='text-align:center;'>
			 " . $row2['c1'] . "</td>
			 <td colspan='6'> " . $row2['c16'] . " </td>
			 <td colspan='6'> " . $row2['result1'] . " </td>";
			 if($flag1==1){
				echo"<td colspan='3'><span class='badge' style='background:green'>已处理</span></td>";
			}else{
				echo"<td colspan='3'><span class='badge' style='background:red'>未处理</span></td>";
			}
             echo"<td colspan='3'> <select class='form-control' data-style='btn-primary' name='$p' id='$state'>
			<option value='1'> 同意</option>
			<option value='2'> 不同意</option>
					</select> <script  type='text/javascript'> document.getElementById('$state')[" . $ww . "].selected=true; </script></td> </tr>
        ";
    }
}
for ($i = ($num_results+1); $i <= ($num_results1+$num_results); $i++) {
	$c = "cid" .$i;
	$p = "p" . $i;
	$flag_c = "flag2".$i;
    $row2 = $result1->fetch_assoc();
    $state = "state" . $i; //后面的管理员意见
    $query = "select * from director where id_p=$id and id_f=" . $row2[id] . " and form_category='3_2'";
    $result = $db->query($query);
	$flag2 = (($result->num_rows>0)?1:'');
	$row5 = $result->fetch_assoc();
    $ww = $row5['result'] - 1;
	echo"<input type='hidden' name='$c' value='".$row2[id]."'/>
	<input type='hidden' name='num1' value='$num_results1'/>
	<input type='hidden' name='$flag_c' value='$flag2'/>";
	if ($row2['c16'] != null && $row2['c17'] != null) {
        echo "
			<tr>
                <td colspan='1' rowspan='2' style='text-align:center;'>$i</td>
			    <td colspan='6' rowspan='2' style='text-align:center;'>
			          " . $row2['c1'] . "</td>
			    <td colspan='6'> " . $row2['c16'] . " </td>
				<td colspan='6'>" . $row2['result1'] . "</td>";
				if($flag2==1){
					echo"<td colspan='3' rowspan='2'><span class='badge' style='background:green'>已处理</span></td>";
				}else{
					echo"<td colspan='3' rowspan='2'><span class='badge' style='background:red'>未处理</span></td>";
				}	
			 echo"<td colspan='3' rowspan='2'>
		<select class='form-control' data-style='btn-primary' name='$p' id='$state'>
			<option value='1'> 同意</option>
			<option value='2'> 不同意</option>
					</select>
					<script  type='text/javascript'> document.getElementById('$state')[" . $ww . "].selected=true; </script>
					</td> </tr>
			  <tr><td colspan='6'>" . $row2['c17'] . " </td>
			 <td colspan='6'> " . $row2['result2'] . " </td></tr>

        ";
    } else {
        echo "
				<tr>
            <td colspan='1' style='text-align:center;'>$i</td>
			 <td colspan='6' style='text-align:center;'>
			 " . $row2['c1'] . "</td>
			 <td colspan='6'> " . $row2['c16'] . " </td>
			 <td colspan='6'> " . $row2['result1'] . " </td>";
             if($flag2==1){
				echo"<td colspan='3'><span class='badge' style='background:green'>已处理</span></td>";
			}else{
				echo"<td colspan='3'><span class='badge' style='background:red'>未处理</span></td>";
			}	
             echo"<td colspan='3'> <select class='form-control' data-style='btn-primary' name='$p' id='$state'>
			<option value='1'> 同意</option>
			<option value='2'> 不同意</option>
					</select> <script  type='text/javascript'> document.getElementById('$state')[" . $ww . "].selected=true; </script></td> </tr>
        ";
    }
}

$query3 = "select * from user where id = '$id'";
$result3 = $db->query($query3);
$row3 = $result3->fetch_assoc();
echo "
<tr>
<td colspan='4' class='noborder-table'>审批人:</td>
<td colspan='6' class='noborder-table'>" . $row3['name'] . "</td>

<td colspan='2' class='noborder-table'>日期：</td>
<td colspan='6' class='noborder-table'>
" . date('Y年n月d日') . "</td>
</tr>
<tr>
<td colspan='4'class='noborder-table'>备注：</td>
<td colspan='27'class='noborder-table'>" . $row['remark'] . "</td>
</tr>
</table></div>
<div style='text-align: right;margin-bottom: 2%'>
				<input type='hidden' value='yes' name='send'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 投递给管理员&nbsp; &nbsp;
				</button>
			</div>
		</form>
		</div>";
