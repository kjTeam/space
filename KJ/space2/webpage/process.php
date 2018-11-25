<?php
$index = $_GET['index'];
$stateSelected = '';
if($_POST['chengbao'] == 'yes'){
	$searchStateResult = $_POST['searchState'];
	if(sizeof($searchStateResult)>0){
	    if(array_search("all",$searchStateResult)===false){
			$stateSelected_c = ' where state in ('.implode(',',$searchStateResult).')';
	}
}
}
if($_POST['zhuanxiang'] == 'yes'){
	$searchStateResult = $_POST['searchState'];
	if(sizeof($searchStateResult)>0){
	    if(array_search("all",$searchStateResult)===false){
			$stateSelected_z = ' where state in ('.implode(',',$searchStateResult).')';
	}
}
}
$index = $_GET['index'];
if ($location == 1) //用location取出四张表中相同的部分
{
    if (isset($_GET['index'])) //说明不是企业进入
    {
          //index 是 结构表的索引
        if ($category == 5) //管理员进入
        {
            $query = "select * from $sheet where id=$index";
            $result = $db->query($query);
            $row = $result->fetch_assoc();
        } else if ($category == 3) //专家进入
        {
            //index 及id_f已经在expert.php中获取
            $query = "select * from $sheet where id=$index";
            $result = $db->query($query);
            $row = $result->fetch_assoc(); //获取数据
        }else if($category == 2) //秘书处进入
        {
            $query = "select * from $sheet where id=$index";
            $result = $db->query($query);
            $row = $result->fetch_assoc(); //获取数据
        }
        //else if($category==4) //理事会进入
        //{
        //$index = $_GET['index'];
        //index 是 结构表的索引
        //if(ifthereis('director',"id_p=$id and id_f=$index")>0)  { echo "<h3><span class='label label-danger'>连接过期！请刷新页面</span></h3>"; exit();} //从director表检查重进入，结构表的state是不变的
        //$query="select * from $sheet where id=$index";
        //$result=$db->query($query);
        //$row=$result->fetch_assoc();
        //}
        //这里还要增加其他身份的重进入
    } 
}
    //根据$sheet判断form_category.入会是1；膜评审专项设计是2_1,工程承包是2_2;膜复审专项设计是3_1;工程承包是3_2
    switch ($sheet){
        case 'mo1_zhuanxiang':  $category_f = '2_1';break;
        case 'mo1_chengbao':  $category_f = '2_2';break;
        case 'mo2_zhuanxiang':  $category_f = '3_1';break;
        case 'mo2_chengbao':  $category_f = '3_2';break;
    }
    if ($_POST['send_toSecretary'] == 'yes') //管理员分配给秘书处形式审查
    {
        $secretary = $_POST['secretary'];
        $state_tos = $_POST['state'];
        $info = $_POST['info'];
        if (count($secretary) != 0) {
            for ($i = 0; $i < count($secretary); $i++) {
                $query = "insert into secret (id_p,id_f,form_status,form_category) values (" . $secretary[$i] . ",$index,'1','$category_f')"; //注意这个表名没有s
                $db->query($query);
            }
            $query = "update $sheet set state='$state_tos',info1='$info' where id=$index";
            $db->query($query);
            echo "<script language=javascript>alertAtuoClose();</script>";
            exit();
        } else {
            echo "<script language=javascript>alert('请选择专家！');</script>";
            exit();
        }
    }
    //秘书处提交
    if($_POST['secret_commit']=='yes'){
        $secret_isok = $_POST['secret_isok'];
        $secret_opinion = $_POST['secret_opinion'];
        $query = "update secret set result = '$secret_isok',info = '$secret_opinion',form_status = '2' where id_p = $id and id_f = $index and form_category = '$category_f'";
        $result = $db->query($query);
        $query = "update $sheet set state=3 where id=$index";
        $result = $db ->query($query);
        if($result){
            echo "<script language=javascript>alertAtuoClose();</script>";  
        }else{
            echo "<script language=javascript>alert('出现错误，请联系管理员！');</script>";
        }
    }
    //管理员分配专家
    if ($_POST['send1'] == 'yes') //管理员提交 必须放在重进入验证之后
    {
        $experts = $_POST['experts'];
        $name = $_POST['name'];
        $state_toe = $_POST['state'];
        $info = $_POST['info'];
        if (count($experts) != 0) {
            for ($i = 0; $i < count($experts); $i++) {
                $query = "insert into expert (id_p,id_f,form_category,state,name) values (" . $experts[$i] . ",$index,'$category_f',1,'$name')"; //注意这个表名没有s
                $db->query($query);
            }
            $query = "update $sheet set state='$state_toe',info1='$info' where id=$index";
            $db->query($query);
            echo "<script language=javascript>alertAtuoClose();</script>";
            exit();
        } else {
            echo "<script language=javascript>alert('请选择专家！');</script>";
            exit();
        }
    }
    //专家提交
if ($_POST['expert_commit'] == 'yes') //专家提交 重进入验证在expert.php 这个可以放在前面，但是为了整齐就放在这里了，数据库会多加载一次。
{
    for ($i = 0; $i < 6; $i++) {
        $str = "judge" . ($i + 1);
        $s[$i] = $_POST[$str]; //获取打分
    }
    $info = $_POST['info'];
    $info = addslashes($info);
    $query = "update expert set s1='" . $s[0] . "',s2='" . $s[1] . "',s3='" . $s[2] . "',s4='" . $s[3] . "',s5='" . $s[4] . "',s6='" . $s[5] . "',state='2' where id_f=$index and id_p = $id and form_category = '$category_f'"; //注意这里变化的是expert表的state而不是form表的                                       state
    $result = $db->query($query);
    $query = "update $sheet set state=5 where id=$index";
    $db->query($query);
    if ($result) {
        echo "<script language=javascript>alertAtuoClose();</script>";
    } else {
        echo "<script language=javascript>alert('出现错误，请联系管理员！');</script>";
    }
}
if ($_POST['send3'] == 'yes') //管理员将专家的结果提交至理事会。
{
    $info = $_POST['info'];
    $info = addslashes($info);
    $state_tolishi = $_POST['state'];
    $query = "update $sheet set state='$state_tolishi',info1='$info' where id=$index";
    $db->query($query);
    echo "<script language=javascript>alertAtuoClose();</script>";
    exit();
}
if ($_POST['send4'] == 'yes') {
    $num = $_POST['num'];
    $num_c = $_POST['num_c'];
    $p1 = $_POST['p1'];
    $p2 = $_POST['p2'];
    $p3 = $_POST['p3'];
    $p4 = $_POST['p4'];
    if($nav1 ==6){
        $category_f_d = '1';
    }else if($nav1 ==7){
        $category_f_d = '2';
    }
    $sheet_z = "mo".$category_f_d."_zhuanxiang";
    $sheet_c = "mo".$category_f_d."_chengbao";
    for ($i = 1; $i <= $num; $i++) {
        $str = "id" . $i;
        $PA[$i] = $_POST[$str];
        $PA[$i] = addslashes($PA[$i]);
        $r = "z" . $i;
        $RA[$i] = $_POST[$r];
        $RA[$i] = addslashes($RA[$i]);
        $t = "z1" . $i;
        $TA[$i] = $_POST[$t];
        $TA[$i] = addslashes($TA[$i]);
        $query1 = "update $sheet_z set state='7',result1='" . $RA[$i] . "',result2='" . $TA[$i] . "'  where id=" . $PA[$i] . "";
        $db->query($query1);
        $db->query($query2);
    }
    for ($i = ($num+1); $i <= ($num_c+$num); $i++) {
        $str = "cid" . $i;
        $PA[$i] = $_POST[$str];
        $PA[$i] = addslashes($PA[$i]);
        $r = "c" . $i;
        $RA[$i] = $_POST[$r];
        $RA[$i] = addslashes($RA[$i]);
        $t = "c1" . $i;
        $TA[$i] = $_POST[$t];
        $TA[$i] = addslashes($TA[$i]);
        $query2 = "update $sheet_c set state='7',result1='" . $RA[$i] . "',result2='" . $TA[$i] . "'  where id=" . $PA[$i] . "";
        $db->query($query1);
        $db->query($query2);
    }
    $query = "update council_inform set headline1='$p1',headline2='$p2',preface='$p4',remark='$p3',state='1' where form_category='$category_f_d'";//在coucil_inform中，form_category入会为0，膜初审为1，膜复审为2
    $result = $db->query($query);
    if ($result) {
        echo "<script language=javascript>alertAtuoClose();</script>";
    } else {
        echo "<script language=javascript>alert('出错！');</script>";
    }
    exit();
}
//理事会意见反馈后管理员选择
if ($_POST['send5'] == 'yes') {
    $sheetType = ($nav1==6)?'mo1':'mo2';
    for($i=0;$i<=2;$i++){
        $num = "num".$i;
        $sheetName = (($i==0)?'zhuanxiang':'chengbao');
        $sheetFinal = $sheetType."_".$sheetName;
        $result_num = $_POST[$num];
        for($i1=1;$i1<=$result_num;$i1++){
            $companyidd="companyidd".$i.$i1;
            $state="state".$i.$i1;
            $opinion="opinion".$i.$i1; 
            $pc =  $_POST[$companyidd];
            $pc = addslashes($pc);
            $ps = $_POST[$state];
            $ps = addslashes($ps);
            $po = $_POST[$opinion];
            $po = addslashes($po);
            $query = "update $sheetFinal set state='$ps',info1='$po' where id='$pc'";
            $result2 = $db->query($query);
            if ($result2) {
                echo "<script language=javascript>alertAtuoClose();</script>";
            } else {
                echo "<script language=javascript>alert('出错！'); </script>";
            }
        }
    }
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
        if ($index != '-1' && $index != '0' && $index != '-2') //不是投递给理事会或者理事会意见反馈
        {
            //index 是 结构表的索引
            $query = "select * from $sheet where id=$index";
            $result = $db->query($query);
            $row = $result->fetch_assoc();
            $select = $row['state'];
            echo "<div class='container-fluid noprint' style='padding:0px 15px'>
				<form enctype='' action='' method='post'>
				    <table class='table table-bordered table-responsive text-center noprint'>
			          <tr>
				        <td colspan='2' >下一进度：</td>
				           <td colspan='10'>
					<select class='form-control' data-style='btn-primary' name='state' id='state'>
                        <option value='1'> 提交待审核</option>
                        <option value='2'> 分配给秘书处</option>
                        <option value='3'> 秘书处意见反馈</option>
                        <option value='4'> 分配给专家</option>
						<option value='5'> 专家意见反馈</option>
						<option value='6'> 投递给理事会</option>
						<option value='7'> 理事会意见反馈</option>
                        <option value='8'> 审核成功</option>
                        <option value='10'> 未通过</option>
					</select>
					<script  type='text/javascript'> document.getElementById('state')[" . $select . "].selected=true; </script >
				</td>
               </tr> 
				<tr>
                    <td colspan='2'> 管理员意见及留言</td>
                    <td colspan='10'>
						<textarea  type='text' class='form-control' name='info' placeholder='您的留言将反馈给用户'></textarea>
					</td>
				</tr>
            </table>";
            //选择秘书处进行形式审查
            if($row['state'] == '1'){
                echo "
				<select  name='secretary[]' id='secretary' class='selectpicker show-tick form-control' multiple data-live-search='true'>";
                //这里展开秘书处列表，这种格式：<option value='秘书处的id'> 秘书处的name</option >
                $query = "select id,name from user where category=2";
                $db->query($query);
                $result = $db->query($query);
                $num_results = $result->num_rows;
                for ($i = 0; $i < $num_results; $i++) {
                    $row1 = $result->fetch_assoc();
                    echo "<option value='" . $row1['id'] . "'> " . $row1['name'] . "</option>"; //这里使用row1 ，因为下面有一个隐藏表单项还要用到row
                }
                echo "  </select>
					<div style='text-align: right;margin:10px 0'>
						<input type='hidden' value='yes' name='send_toSecretary'>
						<button type='submit' class='btn btn-sm btn-primary' >&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
					</div>
				</form>";
            }else if ($row['state'] == '3') //nav==1 评审分组
            { 
                $query = "select s.result,s.info,u.name from secret s, user u where  s.id_f = $index and form_category = '$category_f' and s.id_p = u.id";
                $result_info = $db -> query($query);
                $num_results = $result_info->num_rows;               
                echo"
                <table class='table table-bordered table-responsive text-center noprint'>
                    <tr>
                      <td>秘书处姓名</td>
                      <td>是否同意</td>
                      <td>意见</td>
                    </tr>";
                for($i=0;$i<$num_results;$i++){
                    $row_info = $result_info->fetch_assoc();
                    $opinion_s='';
                    $opinion_s = ($row_info[result]==1)?'同意':(($row_info[result]==2)?'不同意':'');
                    echo"<tr>
                    <td>".$row_info[name]."</td>
                    <td>$opinion_s</td>
                    <td>".$row_info[info]."</td>
                    </tr>
                ";  
                }
                echo"</table>
                ";
                echo "<div class='container-fluid noprint' style='padding:0px 15px'>
				<form class='noprint' enctype='' action='' method='post'>
					<select  name='experts[]' class='selectpicker show-tick form-control' multiple data-live-search='true' >";
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
            } else if ($row['state'] == 5) //这里是从check_join沾过来的 nav==2 评审结果查看
            {
                print_experts($index, $category_f); //注意这个函数里面是一个table
                echo "
					<form enctype='multipart/form-data' action='' method='post'>
						<div style='text-align: right;margin-bottom: 2%'>
							<input type='hidden' value='yes' name='send3'>
							<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 投递至理事会 &nbsp; &nbsp;</button>
						</div>
					</form>";
            }
           
        } else if ($index == '0') {
            //理事会审核膜评审
            if($nav1==6){
                $query = "select * from mo1_zhuanxiang  where state='6'";
                $query1 = "select * from mo1_chengbao  where state='6'";
                $result = $db->query($query);
                $result1 = $db->query($query1);
                $num_results = $result->num_rows;
                $num_results1 = $result1->num_rows;
                $num = $num_results + $num_results1;
                if ($num == 0) {
                echo "<h3><span class='label label-warning'>尚未有企业提交</span></h3>";
                exit();
                } 
            }else if($nav1==7){
                $query = "select * from mo2_zhuanxiang  where state='6'";
                $query1 = "select * from mo2_chengbao  where state='6'";
                $result = $db->query($query);
                $num_results = $result->num_rows;
                $result1 = $db->query($query1);
                $num_results1 = $result1->num_rows;
                if (($num_results+$num_results1) == 0) {
                echo "<h3><span class='label label-warning'>尚未有企业提交</span></h3>";
                exit();
                } 
            }
            
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
            for ($i = 1; $i <= $num_results; $i++) {
                $row2 = $result->fetch_assoc();
                $z = "z" . $i; //专项设计
                $z1 = "z1" . $i; 
                $cid = "id".$i;
                echo"<input type='hidden' name='num' value='$num_results'/>
                <input type='hidden' name='$cid' value='".$row2[id]."'/>
                ";
                if ($row2['c16'] != null && $row2['c17'] != null) {
                    echo "
				<tr>
            <td colspan='1' rowspan='2' style='text-align:center;'>$i</td>
			<td colspan='6' rowspan='2' style='text-align:center;'>
			 " . $row2['c1'] . "</td>
			<td colspan='6'> " . $row2['c16'] . " </td>
            <td colspan='6'> 
                <input type='text' name='$z' class='form-control noborder-input text-center' style='font-size:14px;' value='" . $row2['c16'] . "'>  
            </td>
			<tr><td colspan='6'>" . $row2['c17'] . " </td>
            <td colspan='6'> 
                <input type='text' name='$z1' class='form-control noborder-input text-center' style='font-size:14px;' value='" . $row2['c17'] . "'>  
            </td></tr>
        </tr> ";
                } else {
                    echo "
				<tr>
            <td colspan='1' style='text-align:center;'>$i</td>
			 <td colspan='6' style='text-align:center;'>
			 " . $row2['c1'] . "</td>
			 <td colspan='6'> " . $row2['c16'] . " </td>
			 <td colspan='6'> <input type='text' name='$z' class='form-control noborder-input text-center' style='font-size:14px;' value='" . $row2['c16'] . "'>
			 <input type='hidden' name='$z1'></td>
        </tr> ";
                }
            }
            for ($i = ($num_results+1); $i <= ($num_results+$num_results1); $i++) {
                $row2 = $result1->fetch_assoc();
                $c = "c" . $i; //工程承包
                $c1 = "c1" . $i; 
                $p = "cid" . $i;
                echo"<input type='hidden' name='num_c' value='$num_results1'/>
                <input type='hidden' name='$p' value='".$row2[id]."'/>
                ";
                if ($row2['c20'] != null && $row2['c21'] != null) {
                    echo "
				<tr>
            <td colspan='1' rowspan='2' style='text-align:center;'>$i</td>
			 <td colspan='6' rowspan='2' style='text-align:center;'>
			 " . $row2['c1'] . "</td>
			 <td colspan='6'> " . $row2['c20'] . " </td>
			<td colspan='6'> <input type='text' name='$c' class='form-control noborder-input text-center' style='font-size:14px;' value='" . $row2['c20'] . "'>  </td>
			  <tr><td colspan='6'>" . $row2['c21'] . " </td>
			 <td colspan='6'> <input type='text' name='$c1' class='form-control noborder-input text-center' style='font-size:14px;' value='" . $row2['c21'] . "'>  </td></tr>
        </tr> ";
                } else {
                    echo "
				<tr>
            <td colspan='1' style='text-align:center;'>$i</td>
			 <td colspan='6' style='text-align:center;'>
			 " . $row2['c1'] . "</td>
			 <td colspan='6'> " . $row2['c20'] . " </td>
			 <td colspan='6'> <input type='text' name='$c' class='form-control noborder-input text-center' style='font-size:14px;' value='" . $row2['c20'] . "'>
			 <input type='hidden' name='$c1'></td>
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
        if($nav1 == 6){
            $sheet_mo = ['mo1_zhuanxiang','mo1_chengbao'];
            $formtcategory = 1;
        }else if($nav1 == 7){
            $sheet_mo = ['mo2_zhuanxiang','mo2_chengbao'];
            $formtcategory = 2;
        }
        $query1 = "select * from council_inform where form_category='$formtcategory'";
        $result1 = $db->query($query1);
        $row1 = $result1->fetch_assoc();
        if ($index == '-1') //当点击理事会结果的时候，传来index=-1
        {
            echo <<< EOD
            <div class='container-fluid'>
		   <form enctype='multipart/form-data' action='' method='post'>
            <script type='text/javascript'>
            function checkOption(id,str_accept,str_reject){ 
               var acc_one=new Array();
               var rej_one=new Array();
               rej_one=str_reject.split('!');
               acc_one=str_accept.split('!');
               var tb_start="<div style='margin-left:2.5%;height:150px	;overflow:auto'><table style='border:1px solid 	#666666;text-align: center;width:95%'><tr style='border:1px solid #666666;'><td style='border:1px solid #666666;'>姓名</td><td style='border:1px solid #666666;'>是否同意</td><td style='border:1px solid #666666;'>意见</td></tr>";
               var tb_row='';
               for(var i=0;i<rej_one.length-1;i++){
                   var rej_two=new Array();
                   rej_two=rej_one[i].split(';');
                   tb_row +="<tr style='border:1px solid #666666;'><td style='border:1px solid #666666;'>"+rej_two[0]+"</td><td style='border:1px solid 	#666666;'>"+rej_two[1]+"</td><td style='border:1px solid #666666;'>"+rej_two[2]+"</td></tr>"
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
EOD;
            
		       echo"<h3 class='text-center'style='line-height:8px'>" . $row1['headline1'] . "</h3>
               <h3 class='text-center' style='line-height:10px'>" . $row1['headline2'] . "</h3>
		       <br>
               <table id='expertTable'
			   data-toggle='table'
			   data-striped='ture'
			   data-search='ture'
			   data-pagination='ture'
			   data-show-columns='true'
			   class='text-center'
               >
               <tr>
				 <td>序号</td>
				 <td>公司名称</td>
				 <td>审批结果</td>
                 <td>人数</td>
                 <td>意见</td>					
				 <td>审核</td>
                 <td>管理员意见</td>
                 <td>查看申请表格</td>
			   </tr>";		      

            for($i_e=0;$i_e<2;$i_e++){
                //在council_inform中膜结构评审中的两个表是一起的，所以form_category就是1，但是在秘书处评审（secret）,专家评审（expert）,
                //理事会评审（director）里都是分开审核，所以form_category 分别为2_1(膜结构评审专项设计)2_2 (膜结构评审工程承包) 3_1(膜结构复审专项设计)3_2(膜结构复审工程承包) 
                $formtcategory_d = ($formtcategory+1).'_'.($i_e+1);
                $query = "select id,c1,result1,result2 from $sheet_mo[$i_e] where state='7'";
                $resultTotal = $db->query($query);
                $num_results = $resultTotal->num_rows;
                for($i=1;$i<=$num_results;$i++){
                    $row2 = $resultTotal->fetch_assoc();
                    $id_f = $row2['id'];
                    $query_accept = "select a.*,u.name from director a, user u where a.form_category='$formtcategory_d' and a.id_f='$id_f' and a.result = 1 and a.id_p =u.id";
                    $query_reject = "select a.*,u.name from director a, user u where a.form_category='$formtcategory_d' and a.id_f='$id_f' and a.result = 2 and a.id_p =u.id";
                    $accept = $db->query($query_accept);
                    $reject = $db->query($query_reject);
                    $num_accept = $accept->num_rows;
                    $num_reject = $reject->num_rows;
                    $string_accept = "";
                    $string_reject = "";
                    while ($row3 = $reject->fetch_assoc()) {
                        $string_reject = $string_reject . $row3["name"] . ";不同意;" . $row3["info"] . ";!";
                    }
                    $string_reject = "'" . $string_reject . "'";
                    while ($row4 = $accept->fetch_assoc()) {
                        $string_accept = $string_accept . $row4["name"] . ";同意;" . $row4["info"] . "!";
                    }
                    $string_accept = "'" . $string_accept . "'";
			        $c1 = "'" . $row2['id'] . "'";
			        $companyidd="companyidd".$i_e.$i;
			        $state="state".$i_e.$i;
                    $opinion="opinion".$i_e.$i; 
                    $num = "num".$i_e;
                    echo"
                    <input type='hidden' value='$num_results' name='$num'></input>
                    <tr>
		                 <td>$i</td>
		                 <td>" . $row2['c1'] . "</td>
                         <td>" . $row2['result1'] . " ".$row2['result2']."</td>
                         <td>同意:$num_accept 人;不同意:$num_reject 人</td>
		                 <td><input type='button' value='查看意见' onclick=checkOption($c1,$string_accept,$string_reject)></td>

                         <td width='12%'>
			                <select class='form-control' data-style='btn-primary' name='$state'>
					            <option value='8'> 通过审核，等待缴费证明</option>
					            <option value='10'> 未通过审核</option>
				            </select>
				         <input type='hidden' value='".$row2['id']."' name='$companyidd'>
		                </td>
		                <td>
		                     <input type='text'  style='width:100%;height:100%' value='".$row2['info1']."' name='$opinion' > 
		                </td>
                        <td>
                        <a class='btn btn-xs btn-default' href='index.php?nav1=$nav1&nav2=$nav2&index=$row2[id]&type=$sheet_mo[$i_e]'>查看</a>
                        </td>
                    </tr>" ;
                }
            }
            echo <<< EOD
            </table>
            <input type='hidden' value='yes' name='send5'>
 			<button type='submit' class='btn btn-md btn-primary' style='margin:10px 0 10px 0 ;float:right'>&nbsp;&nbsp; 提交&nbsp; &nbsp;
             </button>
             </form></div>
             
             
EOD;
//             echo " <div class='container-fluid'>
// 	<form enctype='multipart/form-data' action='' method='post'>
// 	<table class='table table-bordered table-responsive text-center' style='margin-top:2em;font-size:1em;'>
// 	 <h3 class='text-center'style='line-height:8px'>" . $row1['headline1'] . "</h3>
// <h3 class='text-center' style='line-height:10px'>" . $row1['headline2'] . "</h3>
//    <tbody>
//    <tr>
//    <td colspan='1'>序号</td>
//    <td colspan='6'>公司名称</td>
//    ";
//             $query2 = "select name,id from user where category=4"; //查找所有的常务理事
//             $result2 = $db->query($query2);
//             $num_results2 = $result2->num_rows;
//             for ($i2 = 1; $i2 <= $num_results2; $i2++) {
//                 $row2 = $result2->fetch_assoc();
//                 $p[$i2] = $row2['id']; //将理事会的id依次存放在$p[]中。
//                 echo " <td colspan='6'>常务理事" . $row2['name'] . "意见</td>";
//             }
//             echo "<td>审批结果</td></tr>";
// //找出理事会已经给出意见的企业
//             if($nav1 == 6){
//                 $sheet = ['mo1_zhuanxiang','mo1_chengbao'];
//             }else if($nav1 == 7){
//                 $sheet = ['mo2_zhuanxiang','mo2_chengbao'];
//             }
//             for($i_e=0;$i_e<2;$i_e++){
//                 $query = "select id,c1 from $sheet[$i] where state='7'";
//                 $resultTotal = $db->query($query);
//                 $num_results = $resultTotal->num_rows;
//                 for ($i = 1; $i <= $num_results; $i++) { //大循环作为输出每一行的循环，小循环作为将常务理事会的名称和结果输出循环。
//                     $row = $resultTotal->fetch_assoc();
//                     $companyid1 = "companyid" . $i;
//                     $state2 = "state2" . $i;
//                     $result = "result" . $i;
//                     $moID = $row['id'];
//                     echo "<tr>
//                <td colspan='1'>$i</td>
//                <td colspan='6'>" . $row['c1'] . "</td>";
//                     for ($i2 = 1; $i2 <= $num_results2; $i2++) {
//                         $id2 = $p[$i2];
//                         $query1 = "select result from director where form_category=1 and id_f='$id' and id_p='$id2'"; //id是企业的id ,id2是常务理事的id
//                         $result1 = $db->query($query1);
//                         $row1 = $result1->fetch_assoc();
//                         $re = $row1['result']; //为了和之前的result分开避免混淆。
//                         echo "<td colspan='6'>";
//                         if ($re == 1) {
//                             echo "同意";
//                         } else if ($re == 2) {
//                             echo "不同意";
//                         }
//                         echo "</td>";
//                     }
//                     echo "
//               <td colspan='4'>
//                  <input type='text' class='form-control' name='$result'>
//               </td>
//             </tr>
//                <input type='hidden' value='$moID' name='$companyid1'>
//             ";
//          }
//         }

//             echo "
// 			</tbody>
// </table>
// <div style='text-align: right;margin-bottom: 2%'>
// 				<input type='hidden' value='yes' name='send5'>
// 				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交&nbsp; &nbsp;
// 				</button>
// 			</div></form></div>";
   }
    if ($index == '-2') {
            $searchStateResultj = json_encode($searchStateResult);
            $select_table="";
			if($nav1==6){
				$select_table=['mo1_zhuanxiang','mo1_chengbao'];
			}else if($nav1==7){
				$select_table=['mo2_zhuanxiang','mo2_chengbao'];
            }
        for($i_t=0;$i_t<2;$i_t++){
              $apply_level =  ($i_t==0)?'c16':'c20';
              $apply_level1 = ($i_t==0)?'c17':'c21';
              $button_flag =  ($i_t==0)?'zhuanxiang':'chengbao';
              echo <<< EOD
                <div style="padding:10px;border:solid 1px #ccc;margin-top:20px">
                <div class="container-fluid"  >
                    <form enctype='multipart/form-data' action='' method='post'>
                        <label class="checkbox-inline">
                          <input  type="checkbox" id="inlineCheckbox1" name='searchState[]' value="1" > 提交待审核
                        </label>
                        <label class="checkbox-inline">
                          <input  type="checkbox" id="inlineCheckbox2" name='searchState[]' value="2" > 等待秘书处反馈
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox3" name='searchState[]' value="3"> 秘书处意见反馈
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox4" name='searchState[]' value="4"> 等待专家审核
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox5" name='searchState[]' value="5"> 专家意见反馈
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox6" name='searchState[]' value="6"> 投递给理事会
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox7" name='searchState[]' value="7"> 理事会意见反馈
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox7" name='searchState[]' value="8"> 审核成功
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox7" name='searchState[]' value="10"> 审核未通过
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox8" name='searchState[]' value="all"> 全部状态
                        </label>
                        <input type='hidden' value='yes' name='$button_flag'/>
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
                        if($i_t==0){
                            $query = "select *from $select_table[0]" . $stateSelected_z;                        
                        }else if($i_t==1){
                            $query = "select *from $select_table[1]" . $stateSelected_c;                        
                        }
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
                        <th data-field="name">单位名称</th>
                        <th data-field="location">单位地址</th>
                        <th data-field="grade">现有等级</th>
                        <th data-field="firstGrade">第一申请级别</th>
                        <th data-field="secondGrade">第二申请级别</th>
                        <th data-field="state">状态</th>
                        <th>操作</th>
                      </tr>
                 </thead>
EOD;
                        for ($i = 1; $i <= $num_results; $i++) {
                            $row = $result->fetch_assoc();
                            $stateshow = state_show_mo1($row[state]);
                            echo <<< EOD
                    <tr>
                        <td>$i</td>
                        <td>$row[c1]</td>
                        <td>$row[c3]</td>
                        <td>$row[c4]</td>
                        <td>$row[$apply_level]</td>
                        <td>$row[$apply_level1]</td>
                        <td>$stateshow</td>
                        <td><a class="btn btn-xs btn-default" href="index.php?nav1=$nav1&nav2=$nav2&index=$row[id]&type=$select_table[$i_t]">查看</a>
                    </tr>
EOD;
                        }
                        echo "</table></div>";
            }
        }
        //else if($row['state']==3) //nav==3 理事会结果查看
        //{
        //print_sod($index,$category_f);
        //}
        //投递给理事会的内容
    }else if($category==2){
        //秘书处审查
        $query = "select result,info from secret where id_p = $id and id_f = $index and form_category = '$category_f'";
        $result_info = $db -> query($query);
        $row_info = $result_info->fetch_assoc();
        $opinion = $row_info['result'] -1;//1是同意 2是不同意
        echo"
	    <form enctype='multipart/form-data' action='' method='post'>
              <table class='table table-bordered table-responsive text-center'>
                <tr>
                  <td>
                    是否同意
                  </td>
                  <td>
                  <select class='form-control' data-style='btn-primary' name='secret_isok' id='secret_isok'>
                      <option value='1'> 同意</option>
                      <option value='2'> 未同意</option>
                  </select>
                  <script  type='text/javascript'> document.getElementById('secret_isok')[" . $opinion . "].selected=true; </script >
                  </td>
                </tr>
                <tr>
                  <td>
                     请填写您的意见
                  </td>
                  <td>
                     <input class='form-control' name='secret_opinion' value='".$row_info[info]."'/>
                  </td>
              </tr>
            </table>
            <input type='hidden' class='text-control' value='yes' name='secret_commit'/>
            <button type='submit' class='btn btn-primary' style='float:right;margin-bottom:10px'> 提&nbsp;&nbsp;&nbsp;&nbsp交</button>
            </form>
        ";
    }else if($category==3){
        echo "
        <form enctype='multipart/form-data'  action='' method='post'>
        <table class='table table-bordered table-responsive text-center noprint'>";
        $query = "select * from expert where id_f =$index and id_p =$id and form_category = '$category_f' "; 
        $result = $db->query($query);
        $row_r=$result->fetch_assoc();
        for ($i = 0; $i < 6; $i++) {
            $s = "s".($i+1);
            echo "
				<tr>
				<td colspan='2' >支撑材料" . ($i + 1) . "意见：</td>
				<td colspan='10'>
				<textarea type='text' class='form-control' rows='2' name='judge" . ($i + 1) . "'>$row_r[$s]</textarea>
				</td>
				</tr>
			";
        }
        echo "</table>
        <input type='hidden' class='text-control' value='yes' name='expert_commit'/>
        <button type='submit' class='btn btn-primary' style='float:right;margin-bottom:10px'> 提&nbsp;&nbsp;&nbsp;&nbsp交</button>
        </form></div>";
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