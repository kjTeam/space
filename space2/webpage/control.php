<?php
//设立一个control表，入会申请、膜初审、膜复审、网初审、网复审、膜经理培训的category分别是1、2、3、4、5、6、7。state分为1和2，2是开通，1不开通。输入秘书处、管理员应该回复的时间，时间保存用户的时间戳。之前数据库里就存了记录，所以用update。如果直接开通没有输入的话，就出来弹出窗提示，确定提交。（这个还要学）
//6月3号更新，输入缴纳年费的年数，判断是否是数字；年数随之在数据库中建立pay_year的表；其他存入数据库中，不用在服务器上
//当显示结束时，除了缴费一项以外，其他的文件都会导出。
//设置自动提醒的时间 这个功能回头再加
define('ROOT',dirname(__FILE__));
if($_POST['control']=='yes'){
$gategory=$_POST['category'];//这是传入的是事件的类别
$s_time=$_POST['s_time']*24*60*60;//这是管理员设置的秘书处回复时间，将时间换算成秒数
$c_time=$_POST['c_time']*24*60*60;//这是管理员设置的理事会回复时间，将时间换算成秒数
$state=$_POST['state'];
$no=$_POST['no'];
$payno="pay".$no;
/*switch($gategory)//因为session有category,为了防止混淆把category改成gategory了
{
   case 1:$url=ROOT."/join_form/$no/";break; 
   case 2:$url=ROOT."/mo1/$no/";break;
   case 3:$url=ROOT."/mo2/$no/";break;
   case 4:$url=ROOT."/wang1/$no/";break;
   case 5:$url=ROOT."/wang2/$no/";break;
   case 8:$url=ROOT."/pay1/$no/";break;
}
if($state==1)
	{
      if(!is_dir($url))//当同期数时，直接跳过建立的这一步
		{
	        $result=mkdir($url, 0700);//如果不存在tmp目录，则建立
			if ($result==null){
              echo"<script language='javascript'>alert('出现问题！');</script>";
			  exit();
			}
		}
		*/
		if ($gategory=='8' && $state ==1){
            $query="CREATE TABLE '$payno' (
			 'id' INT(10) NOT NULL AUTO_INCREMENT ,
			 'id_p' INT(10) NOT NULL ,
			  'time' TIMESTAMP(6) on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
			  'position' VARCHAR(50) NOT NULL , 
			  'state' INT(3) NULL DEFAULT NULL ) ENGINE = InnoDB;";
			  $result2=$db->query($query);
			  //在pay1文件夹中建立以年数为名字的文件夹
			  $url=ROOT."/pay1/$no/";
			  if(!is_dir($url))//当同期数时，直接跳过建立的这一步
		      {
	             $result3=mkdir($url, 0700);//如果不存在tmp目录，则建立
			     if ($result3==null){
                 echo"<script language='javascript'>alert('建立目录时出现问题！');</script>";
			      exit();
			      }
			  }
			  if(!$result2)
			  {
                echo"<script language='javascript'>alert('创建表时出现问题!');</script>";
	            exit();
			  }

		}
		if($state==0){
		  switch($gategory)//因为session有category,为了防止混淆把category改成gategory了
          {
           case 1:$url=ROOT."/join_form";break; 
           case 2:$url=ROOT."/mo1";break;
           case 3:$url=ROOT."/mo2";break;
           case 4:$url=ROOT."/wang1";break;
           case 5:$url=ROOT."/wang2";break;
		   case 6:$url=ROOT."/pm1";break;
		   case 7:$url=ROOT."/pm2";break;
           case 8:$url=ROOT."/pay1";break;
		   default:break;
          }	
		  //先确实是否导入文件并且删除。如果确认了以后，
		  //这个文件导入的还没实现。导入后删除文件
		  $open_file=file_get_contents('$url');
		  echo $open_file;
		}	
     $query1="update event set s_time='$s_time',c_time='$c_time',state='$state',number='$no' where event_category='$gategory'";
     $result1=$db->query($query1);
     if($result1)
	    echo"<script language='javascript'>alert('提交成功！');</script>";
        else{
	         echo"<script language='javascript'>alert('出现问题!');</script>";
	         exit();
        }
	  

}

for ($i=1;$i<=8;$i++){
 $query="select * from event where event_category=$i ";
 $result=$db->query($query);
 $row=$result->fetch_assoc(); 
 $ST[$i]=$row['state'];//ST存储了每个时间的state
 $TI[$i]=$row['s_time']/(24*60*60);//这是秘书处的时间
 $CT[$i]=$row['c_time']/(24*60*60);//理事会的时间
 if($CT[$i]==0)
	$CT[$i]=NULL;
 if($TI[$i]==0)
	 $TI[$i]=NULL;
}

echo"
<script language='javascript'> 
    window.onload = function()
	{   //表格隔行显示不同颜色 
      var tab = document.getElementById('tab'); 
      for(var i=0;i<tab.rows.length;i++)
          tab.rows[i].bgColor = (i%2==0) ? '#f9f9f9' : '#fff' ; 
    } 
</script> 


";

$PA = array('入会申请', '膜结构等级会员初审','膜结构等级会员复审','网格资质等级会员申请', '网格资质等级会员年检', '企业膜经理培训','企业膜经理申请','缴纳年费' );//将名称放入数组中
echo"<div class='container-fluid' style='margin-top:21px'>
<table class='table table-responsive table-bordered text-center' id='tab'>
<tbody>
<tr>
<td colspan='6'><strong>进程控制</strong></td>
</tr>
<tr>
<td><strong>内容名称</strong></td>
<td><strong>专家回复时间</strong></td>
<td><strong>理事会回复时间</strong></td>
<td><strong>期数<small>（请输入数字）</small></strong></td>
<td><strong>当前状态</strong></td>
<td></td>
</tr>";
for($i=0;$i<=7;$i++){
	$t=$i+1;
	echo"
<form enctype='multipart/form-data' action='' method='post' >
<input type='hidden' name='category' value='$t'>
<input type='hidden' name='control' value='yes'>
<tr>	
<td>".$PA[$i]."</td>
<td>
<form class='form-horizontal'> 
";
if($i!==7)
	{
	$b="期";
	echo"
<div class='form-group'>
<div class='col-xs-4 col-xs-offset-2'>
<input type='text' class='form-control input-sm' name='s_time' value='$TI[$t]'>
</div>
<div class='col-xs-2'>日
</div>
</div>";
}
else
	$b="年";
echo"
</td><td class='text-center'>";
if($i!==5 && $i!==6&& $i!==7)
	{
	 echo"
      
      <div class='form-group'>
      <div class='col-xs-4 col-xs-offset-2'>
      <input type='text' class='form-control input-sm text-center' name='c_time' value='$CT[$t]'>
      </div>
      <div class='col-xs-2'>日
      </div>
      </div>
     ";
	  }
     echo"  </td><td><div class='form-group'>
      <div class='col-xs-4 col-xs-offset-2'>
      <input type='text' class='form-control input-sm' name='no' >
      </div>
      <div class='col-xs-2'>
	  $b
      </div>
      </div><td>";
	
switch($ST[$t])
	{
	case 1:echo"已开通";break;
	case 0:echo"未开通";break;
	default:break;
	}
echo"</td>
<td>";
switch($ST[$t])
	{
	case 1:echo"<input type='hidden' name='state' value='0'><button type='submit' class='btn btn-warning'>关闭</button>";break;
	case 0:echo"<input type='hidden' name='state' value='1'><button type='submit' class='btn btn-success'>开通</button>";break;
	default:break;
	}
echo"
</td>
</tr>
</form>	";
	}


echo"</tbody></table>
</div>
";
?>
