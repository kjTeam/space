<?php
//这是企业膜经理检索的表，表中最上栏是检索，分为单位检索、等级检索、名字检索（以后要使用lucene）采用分页 每一栏显示 姓名 申报等级 现有等级 评审结果 有 查看、删除 修改三个按钮的选项。
//表格隔行显示不同颜色 
echo"
<script language='javascript'> 
    window.onload = function()
	{   
      var tab = document.getElementById('tab'); 
      for(var i=0;i<tab.rows.length;i++)
          tab.rows[i].bgColor = (i%2==0) ? '#f9f9f9' : '#fff' ; 
    } 
</script> 
";
$query="select * from pm1 where state2 = 4";
$result=$db->query($query);
$row=$result->fetch_assoc(); 
$num_results=$result->num_rows;
echo"
   <div class='container-fluid' style='margin-top:21px'>
   <div class='col-xs-3' style='float:right;margin-bottom:10px'><input type='text'> <button type='submit' class='btn btn-success'>搜索</button></div>
	</div>
<table class='table table-responsive table-bordered text-center' id='tab'>
<tbody>
<tr>
<td colspan=''><strong>姓名</strong></td>
<td colspan=''><strong>所属公司</strong></td>
<td colspan=''><strong>申报等级</strong></td>
<td colspan=''><strong>评审结果</strong></td>
<td colspan=''></td>
</tr>";
for($i=0;$i<$num_results;$i++)
{
	echo"<tr>
         <td colspan=''>".$row['c1']."</td>
         <td colspan=''>".$row['c8']."</td>
         <td colspan=''>".$row['c12']."</td>
         <td colspan=''>".$row['result']."</td>
         <td><button type='submit' class='btn btn-warning'>修改</button>$nbsp $nbsp $nbsp
         <button type='submit' class='btn btn-danger'>删除</button>
         </tr>";
}
echo"</tbody></table></div>";


?>