<?php
error_reporting(0);
session_start();
date();
include_once "lib.php";
$db=create_database();
$id=$_SESSION['id'];
$query = "select * from expertjoin where state='4' or state='5'";
$result1=$db->query($query);
$num_results1=$result1->num_rows;
if($_POST['send']=='yes'){
   for($i=1;$i<=$num_results1;$i++){
      $str="p".$i;//传递的是意见
      $cstr="c".$i;//传递的是企业的id
	    $PA[$i]=$_POST[$str];
      $PI=$_POST[$cstr];
      $PA[$i]=addslashes($PA[$i]);   
      $query2 = "insert into director (id_p,id_f,result,form_category) values ('".$id."' ,'$PI','".$PA[$i]."','5')"; //
      echo $query2;
      $result2=$db->query($query2);
   }
   if($result2){
     echo "<script language=javascript>alert('提交成功');location.href='';</script>"; //没有提交则退出
   }
   else{
     echo "<script language=javascript>alert('抱歉提交失败，请联系管理员');location.href='';</script>"; //没有提交则退出
   }
}
if($num_results1==0)
{
  echo"<h3><span class='label label-warning'>管理员尚未投递</span></h3>";
  exit();
}
$query = "select * from council_inform where form_category=5";//council_inform的category是5
$result = $db->query($query);
$row=$result->fetch_assoc(); //council_inform这个表
 echo" <div class='container-fluid noprint'>
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
                              ".$row['preface']."
                              </strong>
                          </td>
                   </table>
	                 <div style='margin-top:3em'>
                      <h4 class='text-center' style='line-height:20px'>中国钢协空间结构分会专业组专家审批名单</h3>
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
                            <th style='text-align:center;'>操作</th>
                          </tr>
                          </thead>
                          <tbody>";
                for($i=1;$i<=$num_results1;$i++){
                    $p="p".$i;
                    $c="c".$i;
                    $state="state".$i;//后面的管理员意见
                    $row1=$result1->fetch_assoc();  
                    $expertid= $row1['id']; 
                    //备注：
                 echo<<< EOD
                          <tr> 
                          <td>$i</td>
			              <td>$row1[c1]</td>
                          <td>$row1[c7]</td>
                          <td>$row1[c9]</td>
                          <td>$row1[c8]</td>
                          <td>$row1[c21]</td>
                          <td>$row1[c21]</td>
                          <td>
                          <select hidden="hidden" name="$c">
                          <option selected>$row1[id]</option>
                          </select>
                          <select class="form-control" name="$p" id="$state">
                          <option>同意</option>
                          <option>不同意</option>
                          </select>
        <script type='text/javascript'> document.getElementById('$state')[".$ww."].selected=true; </script>
                          </td>
                          </tr> 
EOD;
                }
                echo"</tbody></table>
                <div style='margin-top:10px'>[备注]：".$row['remark']."</div>
                <div style='text-align: right;margin:2% 0'>
				<input type='hidden' value='yes' name='send'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 投递给管理员&nbsp; &nbsp;
				</button>
			    </div></form>		";               
?>