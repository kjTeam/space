<?php
$index=$_GET['index'];
if($_POST['send']=='yes'){
  $state=$_POST['state'];
  $query="update expertjoin set state='$state' where id='$index'";
  $result=$db->query($query);
  if($result){
  			   echo "<script language=javascript>alert('提交成功');location.href='';</script>"; //没有提交则退出
  }
}
if($_POST['send2']=='yes'){
  $opinion =$_POST['optionsRadios'];
  $info = $_POST['notagree'];//id_p是专家的id，id_f是exportjoin的id,form_category为6
  $query="insert into expert (id_p,id_f,form_category,state,info,opinion) values ('$id','$index','6','2',' $info','$opinion')";
  echo $query;
   $result=$db->query($query);
  if($result){
   			   echo "<script language=javascript>alert('提交成功');location.href='';</script>"; //没有提交则退出
   }
}
if($_POST['send1']=='yes'){
  $preface=$_POST['preface'];
  $remark=$_POST['remark'];
  $num=$_POST['num'];
  for($i=1;$i<=$num;$i++)
	{
	 $str="pid".$i;
	 $PA[$i]=$_POST[$str];
	 $PA[$i]=addslashes($PA[$i]);
	 $query = "update expertjoin set state='4' where id=".$PA[$i]."";
	 $result = $db->query($query);
	}
  $query1="update council_inform set preface = '$preface' ,remark='$remark',state='1' where form_category = 5";
  $result1=$db->query($query1);
  if($result1 && $result){
    echo"<script language=javascript>alert('提交成功');location.href='';</script>";
  }
}
?>
<?php
  $query="select * from expertjoin where id=$index";
  $result=$db->query($query);
	$row=$result->fetch_assoc();
  $select = $row['state'];
  if($index==-1){
    $query1="select *from expertjoin";
    $result1=$db->query($query1);
    $num_results1=$result1->num_rows;
    echo<<< EOD
    <table id="exporttable"
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
            <th data-field="name">姓名</th>
            <th data-field="company">所在单位</th>
            <th data-field="tel">电话</th>
            <th data-field="state">目前状态</th>
            <th>操作</th>
        </tr>
  </thead>
  <tbody>
EOD;
for($i=1;$i<=$num_results1;$i++){
$row1=$result1->fetch_assoc();
$stateshow=state_show($row1['state']);
echo<<< EOD
 <tr>
            <td>$i</td>
            <td>$row1[c1]</td>
            <td>$row1[c7]</td>
            <td>$row1[c12]</td>
            <td>$stateshow</td>
            <td><button class="btn btn-xs btn-default">查看</button>&nbsp;&nbsp;
            <button class="btn btn-xs btn-danger">删除</button></td>
        </tr>
EOD;
}
echo<<< EOD
   </tbody>
</table>

EOD;
  }
  if($index==-2)//投递给理事会
  {
    $query = "select * from expertjoin where state='3'";
    $result=$db->query($query);
    $num_results=$result->num_rows;
    $num=$num_results;
    if($num_results==0)
	    {
      	echo"<h3><span class='label label-warning'>尚未有企业提交</span></h3>";
            exit();
      }
    echo"
        <div class='container-fluid noprint'>
             <form enctype='multipart/form-data' action='' method='post'>
                   <table class='table table-bordered table-responsive text-left noprint' style='margin-top:1em;font-size:1.2em;'>
                      <tr>
                          <td style='font-family:仿宋;' colspan='7' class='noborder-table'>
                           <strong>各位常务理事：</strong>
                          </td>
                      </tr>
                      <tr>
                          <td colspan='31' class='noborder-table' style='font-family:仿宋;'>
                              <strong>
                              <textarea class='form-control' name='preface' rows='10' style='font-size:1em'></textarea>
                              </strong>
                          </td>
                   </table>
	                 <div style='margin-top:3em'>
                      <h4 class='text-center' style='line-height:20px'>中国钢协空间结构分会专家委员会专家审批名单</h3>
                      <table data-toggle='table'
                             data-pagination='ture'
                             data-classes='table table-hover'
                             class='text-center noprint' >
                          <thead>
                          <tr>
                             <th style='text-align:center;'>序号</th>
			                       <th style='text-align:center;width:14%'>姓名</th>
			                       <th style='text-align:center;'>单位</th>
                             <th style='text-align:center;'>职称</th>
                             <th style='text-align:center;'>职务</th>
                             <th style='text-align:center;'>学历</th>
                             <th style='text-align:center;'>工作年限</th>
                          </tr>
                          </thead>
                          <tbody>";
		//这里从join_form表中查找要投递给理事会的企业
                          $p_arrary=array();
				                  for($i=1;$i<=$num_results;$i++)
					                {
				                      $row2=$result->fetch_assoc();//指针
                              $p_arrary[$i]=$row2;
			     	                  echo"
				                          <tr>
                                     <td>$i</td>
			                               <td>". $row2['c1']."</td>
                                     <td>". $row2['c7']." </td>
                                     <td>". $row2['c9']." </td>
                                     <td>". $row2['c8']." </td>
                                     <td>". $row2['c21']."</td>
                                     <td>". $row2['c21']."</td>

                                  </tr> ";
	    	                  }
                           echo"
                             </tbody>
                             </table>
                              <div class='row' style='margin:10px 0'>
                                <div class='col-xs-2 col-xs-offset-2'>备注：</div>
                                   <div class='col-xs-7' ><input class='form-control' name='remark'></div>
                                </div>
                              </div>";
                               for($i=1;$i<=$num_results;$i++)//input在bootstrap table中不显示，所以这里又先加了一栏
					                     {
			                          	$p="pid".$i;
			     	                      echo"<input type='hidden' name='$p' value='".$p_arrary[$i]['id']."'> ";
	    	                       }
                              echo"
                             <div style='text-align: right;margin-bottom: 2%'>
				                        <input type='hidden' value='yes' name='send1'>
                                <input type='hidden' name='num' value='$num'>
				                        <button type='submit' class='btn btn-md btn-primary'>投递给理事会
			   	                      </button>
			                      </div>
		                 </form>
		          </div>";
  }
  if($index>0){
  echo<<< EOD
  <div class='container-fluid hidden-xs noprint' style="margin-bottom:30px">
		<input id='btnPrint' class='noprint btn btn-info' type='button' value='打印' onclick='javascript:window.print();' style='font-weight:bold; margin-right:2em;text-decoration:none;cursor:pointer;float:right;!important; cursor:hand'/>
	<h3 class='text-center'>专家委员会专家申请表</h3>
	<br/>
    <table  class='table table-bordered table-responsive text-center'>
    <tbody>
     <tr>
       <td>姓名</td><td>$row[c1]</td>
       <td>性别</td><td>$row[c2]</td>
       <td>出生年月</td><td>$row[c3]</td>
       <td rowspan='5' style="padding:0px;"><img width=150px height=180px src='../index/responsive/include/export/userphoto/$row[photo].jpg'></td>
     </tr>
      <tr>
       <td>民族</td><td>$row[c4]</td>
       <td>党派</td><td>$row[c5]</td>
       <td>出生地</td><td>$row[c6]</td>
     </tr>
     <tr>
       <td>工作单位</td><td colspan='5'>$row[c7]</td>
     </tr>
      <tr>
       <td>现任职务</td><td colspan='3'>$row[c8]</td>
       <td>职称</td><td>$row[c9]</td>
     </tr>
      <tr>
       <td>身份证号</td><td colspan='5'>$row[c9]</td>
     </tr>
      <tr>
       <td>通讯地址</td><td colspan='6'>$row[c10]</td>
     </tr>
      <tr>
       <td>办公电话</td><td>$row[c11]</td>
       <td>手机</td><td colspan='2'>$row[c12]</td>
       <td>邮政编码</td><td >$row[c13]</td>
     </tr>
     <tr>
       <td>微信号</td><td colspan='2'>$row[c20]</td>
       <td>学历</td><td colspan='3'>$row[c21]</td>
     </tr>
      <tr>
       <td>外语</td><td colspan='2'>$row[c14]</td>
       <td>应用能力</td><td colspan='3'></td>
     </tr>
      <tr>
       <td>电子邮件</td><td colspan='6'>$row[c15]</td>
     </tr>
      <tr>
       <td rowspan='3'>从事专业</td>
       <td colspan='6'></td>
      </tr>
      <tr>
       <td colspan='6'></td>
      </tr>
      <tr>
       <td colspan='6'>详细说明最擅长的专业：$row[c16]</td>
     </tr>
      <tr>
       <td>主要工作及学习经历</td>
       <td colspan='6'>$row[c17]</td>
     </tr>
     <tr>
       <td>主要工作业绩</td>
       <td colspan='6'>$row[c19]</td>
     </tr>
     <tr>
       <td>曾获何种重大奖励</td>
       <td colspan='6'>$row[c19]</td>
     </tr>
      </tbody>
   </table>
EOD;
if ($category==5) {
  if($select>=2){
    // $query2="select * from user where category like '%3%'";
    // $result2=$db->query($query2);
    //$enum=$result2->num_rows;
        //$row2=$result2->fetch_assoc();
     $query2="select opinion,info,id_p from expert where id_f = '$index' and form_category ='6'";
     $result2=$db->query($query2);
     $enum=$result2->num_rows;
     echo<<< EOD
    <table data-toggle="table"
    data-search="ture"
    data-pagination="ture"
    data-page-size="3"
    class="text-center">
    <thead>
    <th>序号</th>
    <th>专家姓名</th>
    <th>是否同意</th>
    <th>意见</th>
    </thead>
    <tbody>
EOD;
    for($i=1;$i<=$enum;$i++){ 
        $row2=$result2->fetch_assoc(); 
        $query="select name from user where id=$row2[id_p]";
        $result=$db->query($query);
        $row=$result->fetch_assoc();
        echo<<< EOD
        <tr>
       <td>$i</td>
       <td>$row[name]</td>
       <td>$row2[opinion]</td>
       <td>$row2[info]</td>
       </tr>
EOD;
    }
    $query="select name from user where id not in (select id_p from expert where form_category = '6' and id_f = '$index') and category like '%3%'";
    $result=$db->query($query);
    $num=$result->num_rows;
    for($i=($enum+1);$i<=($enum+$num);$i++){ 
    $row=$result->fetch_assoc();
     echo<<< EOD
        <tr>
       <td>$i</td>
       <td>$row[name]</td>
       <td><span class="label label-warning">尚未投递！</span></td>
       <td></td>
       </tr>
EOD;
    }
    echo"</tbody></table>";
  }
  if($select>=4)
  {
    $query="select * from director where id_f ='$index' and form_category = '5'";
    $result=$db->query($query);
    $enum=$result->num_rows;
     echo<<< EOD
    <table data-toggle="table"
    data-search="ture"
    data-pagination="ture"
    data-page-size="3"
    class="text-center">
    <thead>
    <th>序号</th>
    <th>理事姓名</th>
    <th>是否同意</th>
    <th>意见</th>
    </thead>
    <tbody>
EOD;
    for($i=1;$i<=$enum;$i++){
      $row=$result->fetch_assoc();
      $query="select name from user where id='$row[id_p]'";
      $result=$db->query($query);
      $row2=$result->fetch_assoc();
      echo <<< EOD
      <tr>
       <td>$i</td>
       <td>$row2[name]</td>
       <td>$row[result]</td>
       <td>$row[info]</td>
       </tr>
EOD;
}
    $query="select name from user where id not in (select id_p from director where form_category = '5' and id_f = '$index') and category like '%4%'";
    $result=$db->query($query);
    $num=$result->num_rows;
    for($i=($enum+1);$i<=($enum+$num);$i++){
      $row=$result->fetch_assoc();
    echo<<< EOD
        <tr>
       <td>$i</td>
       <td>$row[name]</td>
       <td><span class="label label-warning">尚未投递！</span></td>
       <td></td>
       </tr>
EOD;
    }
    echo"</tbody></table>";
    echo<<< EOD
    <table class='table table-bordered table-responsive text-center'>
    <tr>
    <td>请选择需要隐藏的对象</td>
    <td>
       <label class="checkbox-inline">
       <input type="checkbox" id="tel" value="yes">隐藏办公电话
       </label>
       <label class="checkbox-inline">
       <input type="checkbox" id="tel1" value="yes">隐藏手机号
       </label>
       <label class="checkbox-inline">
       <input type="checkbox" id="wechat" value="yes">隐藏微信号
       </label>
       <label class="checkbox-inline">
       <input type="checkbox" id="email" value="yes">隐藏邮箱
       </label>
       <label class="checkbox-inline">
       <input type="checkbox" id="personal" value="yes">隐藏身份证号
       </label>
       </td>
    </tr></table>
EOD;
  }
  echo <<< EOD
  <div class="row" style="margin-top:10px">
  <div class="col-md-4 text-center">
    目前进度：
    </div>
    <form enctype='multipart/form-data' action='' method='post'>
    <div class="col-md-7">
					<select class='form-control' data-style='btn-primary' name='state' id='state'>
							<option value='1'>提交待验证</option>
							<option value='2'>投递给专家委员会</option>
							<option value='3'>投递给理事会</option>
							<option value='4'>理事会意见反馈</option>
							<option value='5'>已通过审核</option>
							<option value='6'>未通过审核</option>
					</select>
    </div>
  </div>
    <input type="hidden" value="yes" name="send">
					<script  type='text/javascript'> document.getElementById('state')[".$select."].selected=true; </script >
          <button type='submit' class="btn btn-md btn-primary" style='float:right;margin:2%'>提交</button>
        </form>
    </div>
EOD;
}
  if ($category==3) {
         echo <<< EOD
  <div class="col-md-4 text-center">
    请填写您的意见：
    </div>
    <form enctype='multipart/form-data' action='' method='post'>
    <div class="col-md-8" >
				<div class="radio-inline">

              <input type="radio" name="optionsRadios" id="optionsRadios1" value="同意">
              同意

        </div>
        <div class="radio-inline">
               <input type="radio" name="optionsRadios" id="optionsRadios2" value="不同意"  onclick='e_submit1()'>
               不同意
        </div>
        <div id='options1'></div>
    </div>
    <input type="hidden" value="yes" name="send2">
          <button type='submit' class="btn btn-md btn-primary" style='float:right;margin:2%' id='e_submit'>提交</button>
        </form>
    </div>
EOD;
  }
}
?>

