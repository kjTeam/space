<?php 
include_once '../index/include/function.php' 
?>
<?php
$query="select * from event where event_category =8";
$result=$db->query($query);
$row=$result->fetch_assoc();
$no=$row['number'];
$pay="pay".$no;

if($_POST['send_email']=='yes')
{
  $send_id=$_POST['send_id'];
  $query="select email,uid from user where id=$send_id";
  $result=$db->query($query);
  $row=$result->fetch_assoc();
  $PD['1']=$row['uid'];
  $DF['1']=$row['email'];
  $body="空间结构提醒您，您今年的年费尚未缴纳。为了不影响系列活动，请您尽快缴纳年费。";
  sendMail($PD,$DF,"空间结构分会-年费缴纳情况通知",$body,1);
  echo"<script languang='javascript'>alert('发送成功')</script>";
}
//查询以company_result为主表，company_result和pay$no 的差集
 $query="select id_p,num,company FROM company_result LEFT JOIN (select id_p as i from $pay) as t1 ON company_result.id_p=t1.i where t1.i IS NULL  limit 0,10";
$result=$db->query($query);
$num_results=$result->num_rows;
$query="select id_p,num,company FROM company_result LEFT JOIN (select id_p as i from $pay) as t1 ON company_result.id_p=t1.i where t1.i IS NULL";//查询所有的信息，这里用于计算页数和存储信息到数组
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
$query="select id_p,num,company FROM company_result LEFT JOIN (select id_p as i from $pay) as t1 ON company_result.id_p=t1.i where t1.i IS NULL limit $paper_id1,$paper_id2";
$result=$db->query($query);
$num_results=$result->num_rows;

$paper_id3=$paper_id1+$num_results;
}
if($_POST['check']=='yes')
{
  $check=$_POST['p1'];
  $state=$_POST['action'];
  $year=$_POST['year'];
  $pay ="pay".$year;
  $query="select id_p,num,company FROM company_result LEFT JOIN (select id_p as i from $pay) as t1 ON company_result.id_p=t1.i where t1.i IS NULL and company like '%$check%'";
  $result1=$db->query($query);
  $num_results=$result1->num_rows;
  if($num_results<=10)
  $paper_id3=$num_results;//查询出的结果行数
  $num_results1=ceil($num_results/10);//$num_results1是显示的页码数，ceil是向上取整函数
}
for($i=0;$i<=$num_results2;$i++)
{
$row=$result1->fetch_assoc(); 
$PA[$i]=$row['id_p'];//已缴费公司的id_p
$PS[$i]=$row['company'];//公司名称
$PD[$i]=$row['num'];//公司编号

//rename(iconv('UTF-8','GBK',"../index/upload/paper/".$PA[$i].""),iconv('UTF-8','GBK',"../index/upload/paper/".$PJ[$i].""));
}
echo"
<script language='javascript'> 
    window.onload = function()
	{   //表格隔行显示不同颜色 
      var tab = document.getElementById('tab'); 
      for(var i=0;i<tab.rows.length;i++)
          tab.rows[i].bgColor = (i%2==0) ? 'Whitesmoke' : '#fff' ; 
    } 
	function fsubmit(obj){
    obj.submit();
     }
</script> 
";
echo"<div class='container-fluid hidden-xs  text-center' style='margin-top:21px'>
<div style='margin:0.1em 0 1em 0'>
<form enctype='multipart/form-data' action='' method='post' class='form-inline noprint'>
<span style='padding-right:3%'>年份：
<select class='form-control' data-style='btn' name='year' id='year' >";
      $query="select table_name from information_schema.tables where table_schema='index' and table_name like '%pay%' ";//服务器上的数据库时space
      $result3=$db->query($query);
      $num_results3=$result3->num_rows;
      for($i=0;$i<$num_results3;$i++){
        $row3=$result3->fetch_assoc(); 
        $payyear=substr($row3['table_name'],3);
        echo"<option value='$payyear'>$payyear</option>";
      }//这里select 不能和对应的进行实时更新
     echo" </select>
     <script  type='text/javascript'> document.getElementById('year')[".$no."].selected=true; </script >
      </span>
公司名称：
<input type='hidden' value='yes' name='check' id='check' >
<input type='text' name='p1' id='p1'>
<button class='btn btn-primary' style='margin:0 5% 0 2% ' type='submit'>搜索</button><input id='btnPrint' class='noprint btn btn-warning' type='button' value='打印' onclick='javascript:window.print();'
 style='font-weight:bold;text-decoration:none;cursor:pointer;important; cursor:hand'/></form>
</span></div>
<table class='table table-responsive table-bordered text-center' id='tab' style='font-size:14px' >
<tbody>
<tr>
<td><strong>序号</strong></td>
<td><strong>公司编号</strong></td>
<td><strong>公司名称</strong></td>
<td colspan='2'><strong>操作</strong></td>
</tr>
";
for($i=$paper_id1;$i<$paper_id3;$i++)
{
	$t=$i+1;
echo"
<tr>
<td>$t</td>
<td>".$PD[$i]."</td>
<td>".$PS[$i]."</td>
<td><form enctype='multipart/form-data' action='' method='post' >
<input type='hidden' value='yes' name='send_email' id='send_email'>
<input type='hidden' value='".$PA[$i]."' name='send_id' id='send_id'>
<button type='submit' class='btn btn-default'>邮箱提醒</button>
</form>
</td>
</tr>
";
}
echo"</tbody>
</table>
<nav aria-label='Page navigation' class='noprint'>
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
 <script src='bootstrap-3.3.5-dist/js/jquery-3.0.0.min.js'></script> 
	<script type='text/javascript'>
    $(document).ready(function(h) {
    var ImgsTObj = $('.EnlargePhoto');//class=EnlargePhoto的都是需要放大的图像
    if(ImgsTObj){
    $.each(ImgsTObj,function(){
    $(this).click(function(){
    var currImg = $(this);
    CoverLayer(1);
    var TempContainer = $('<div class=TempContainer></div>');
    with(TempContainer){
    appendTo('body');
    css('top',currImg.offset().top);
    html('<img border=0 src=' + currImg.attr('src') + '>');
    }
    TempContainer.click(function(){
    $(this).remove();
    CoverLayer(0);
    });
    });
    });
    }
    else{
    return false;
    }
    //====== 使用/禁用蒙层效果 ========
    function CoverLayer(tag){
    with($('#Over')){
    if(tag==1){
    css('height',$(document).height());
    css('display','block');
    css('opacity',0.9);
    css('background-color','#000');
    }
    else{
    css('display','none');
    }
    }
    }
    });
    </script>
";



?>