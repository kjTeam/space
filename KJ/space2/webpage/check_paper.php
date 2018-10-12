<?php
//word文档存入服务器时会乱码，要找到解决方法
if($_POST['del']=='yes')
  {
   $del_id=$_POST['del_id'];
   $query="delete from submit_paper where id='$del_id'";
   $result=$db->query($query);
   if($result)
	   echo"<script languang='javascript'>alert('删除成功')</script>";

	}
$query="select * from submit_paper limit 0,10";//查询前10行的信息，用于显示第一页
$result=$db->query($query);
$num_results=$result->num_rows;
$query="select * from submit_paper ";//查询所有的信息，这里用于计算页数和存储信息到数组
$result1=$db->query($query);
$num_results2=$result1->num_rows;//所有行数
 $num_results1=ceil($num_results2/10);//向上取整函数，计算出页数
 $paper_id1=0;//初始定义paper_id3是0
 $paper_id3=$num_results;
if($_POST['fs1']=='yes')//分页的实现，是对每一个a标签绑定一个js提交函数，通过提交的值来计算query,这里代码很糟糕，由于时间问题和数据量很小（大约30条左右），以后要更改，利用JQuery;
{
$paper_id=$_POST['fs'];
$paper_id1=$paper_id*10-10;
$paper_id2=$paper_id*10;
$query="select *from submit_paper limit $paper_id1,$paper_id2";
$result=$db->query($query);
$num_results=$result->num_rows;

$paper_id3=$paper_id1+$num_results;
}
if($_POST['check']=='yes')
{
  $check=$_POST['p1'];
    $wherelist = array();//将语句放在数组中
	$wherelist[] = "title like '%{$check}%'";
	$wherelist[] = "author like '%{$check}%'";
    $wherelist[] = "correspond like '%{$check}%'";
	$wherelist[] = "email like '%{$check}%'";
	$wherelist[] = "tel like '%{$check}%'";
    if(count($wherelist) > 0)
		{
          $where = " where ".implode(' or ' , $wherelist); //利用implode函数,将where链接起来。
        }
	 $query="select * from submit_paper {$where}";
     $result1=$db->query($query);
     $num_results=$result1->num_rows;
	 if($num_results<=10)
      $paper_id3=$num_results;//查询出的结果行数
	  $num_results1=ceil($num_results/10);//$num_results1是显示的页码数，ceil是向上取整函数
}
for($i=0;$i<=$num_results2;$i++)
{
$row=$result1->fetch_assoc(); 
$PA[$i]=$row['id'];
$PS[$i]=$row['author'];
$PD[$i]=$row['title'];
$PF[$i]=$row['correspond'];
$PG[$i]=$row['email'];
$PH[$i]=$row['tel'];
$PJ[$i]=$row['paper_name'];
//rename(iconv('UTF-8','GBK',"../index/upload/paper/".$PA[$i].""),iconv('UTF-8','GBK',"../index/upload/paper/".$PJ[$i].""));
}
echo"
<script language='javascript'> 
    window.onload = function()
	{   //表格隔行显示不同颜色 
      var tab = document.getElementById('tab'); 
      for(var i=0;i<tab.rows.length;i++)
          tab.rows[i].bgColor = (i%2==0) ? '#f9f9f9' : '#fff' ; 
    } 
	function fsubmit(obj){
    obj.submit();
     }
</script> 
";
echo"<div class='container-fluid hidden-xs noprint text-center' style='margin-top:21px'>
<div style='float:right;margin:0.1em 0.5em 0.4em 0'>
<span>
<form enctype='multipart/form-data' action='' method='post' >
<input type='hidden' value='yes' name='check' id='check' >
<input type='text' name='p1' id='p1'></span>
<button class='btn btn-primary' style='margin-left:10px' type='submit' >搜索</button>
<input id='btnPrint' class='noprint btn btn-warning' type='button' value='打印' onclick='javascript:window.print();' style='font-weight:bold; margin-left:1em;text-decoration:none;cursor:pointer;float:right;!important; cursor:hand'/></form></div>
<table class='table table-responsive table-bordered text-center' id='tab' style='font-size:14px' >
<tbody>
<tr>
<td><strong>序号</strong></td>
<td><strong>论文编号</strong></td>
<td><strong>作者</strong></td>
<td><strong>题目</strong></td>
<td><strong>通讯作者</strong></td>
<td><strong>邮箱</strong></td>
<td><strong>电话</strong></td>
<td colspan='2'><strong>操作</strong></td>
</tr>
";
for($i=$paper_id1;$i<$paper_id3;$i++)
{
	$t=$i+1;
echo"
<tr>
<td>$t</td>
<td>2017CASS-".$PA[$i]."</td>
<td>".$PS[$i]."</td>
<td>".$PD[$i]."</td>
<td>".$PF[$i]."</td>
<td>".$PG[$i]."</td>
<td>".$PH[$i]."</td>
<td><a  role='button' href='../index/upload/paper/".$PJ[$i]."'>下载</a>
</td>
<td><form enctype='multipart/form-data' action='' method='post' >
<input type='hidden' value='yes' name='del' id='del'>
<input type='hidden' value='".$PA[$i]."' name='del_id' id='del_id'>
<button type='submit' class='btn'>删除</button>
</form>
</td>

</tr>
";
}
echo"</tbody>
</table>
<nav aria-label='Page navigation'>
  <ul class='pagination'>";
  for($i=1;$i<=$num_results1;$i++)
  {
   echo"
    <li><a onclick='javascript:fsubmit(document.form$i);'>$i</a></li>
	";
	}
	 for($i=1;$i<=$num_results1;$i++)
  {
   echo"
    <form enctype='multipart/form-data' action='' method='post' id='form$i' name='form$i'><input type='hidden' id='fs' name='fs' value='$i'><input type='hidden' name='fs1' value='yes' ></form>
	";
	}
	echo"
  </ul>
</nav>
</div>
<div class='container-fluid print1 text-center'>
<h4>2017年年会投稿</h4>
<table class='table table-bordered text-center' width='100%' style='font-size:12px' id='tab'>
<tbody>
<tr>
<td><strong>序号</strong></td>
<td><strong>论文编号</strong></td>
<td><strong>作者</strong></td>
<td><strong>题目</strong></td>
<td><strong>通讯作者</strong></td>
<td><strong>邮箱</strong></td>
<td><strong>电话</strong></td>
</tr>
";
for($i=0;$i<$num_results2;$i++)
{
	$t=$i+1;
echo"
<tr>
<td>$t</td>
<td>2017cass-".$PA[$i]."</td>
<td>".$PS[$i]."</td>
<td>".$PD[$i]."</td>
<td>".$PF[$i]."</td>
<td>".$PG[$i]."</td>
<td>".$PH[$i]."</td>
</tr>
";
}
echo"</tbody>
</table>
</div>

";

?>