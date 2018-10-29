 
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>空间结构分会</title>
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="./bootstrap-3.3.5-dist/css/bootstrap.min.css">
<!-- 下边这个文件是网上下载的，bootstrap多选框控件，还有后边的js文件一起下载的，下载地址：http://silviomoreto.github.io/bootstrap-select/ -->
<link rel="stylesheet" href="./bootstrap-3.3.5-dist/css/bootstrap-select.min.css">
<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="./bootstrap-3.3.5-dist/css/bootstrap-theme.min.css">
<script src="./bootstrap-3.3.5-dist/js/jquery-3.0.0.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="./bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script src=".">
<script>
  function  kk() {
    alert(1);
        // swal({
        //     title: '提交成功！',
        //     text: '3秒后自动关闭。',
        //     timer: 3000
        // }).then(
        //     function () {},
        //     // handling the promise rejection
        //     function (dismiss) {
        //         if (dismiss === 'timer') {
        //             console.log('I was closed by the timer')
        //         }
        //     }
        // )
    }
</script>
</head>
<?php //共41个参数  p42为隐藏参数
 //首先检查目前状态，如果不再这几种状态中则可以继续提交
$no=control(1);//获取到本次入会的期数
 define('ROOT',dirname(__FILE__)); //用于上传文件
if(ifthereis("join_form","id_p=$id and state=1")) //已经提交，等待审核
	{
		echo "<h4><span class='label label-info'>您已提交，等待审核。</span></h4>";
	}
if(ifthereis("join_form","id_p=$id and state=2")||ifthereis("join_form","id_p=$id and state=3")||ifthereis("join_form","id_p=$id and state=4")||ifthereis("join_form","id_p=$id and state=5"))
   {
		echo "<h4><span class='label label-info'>管理员正在处理</span></h4>";
		exit();
	}
if(ifthereis("join_form","id_p=$id and state=6")>0) //审核完成，通过
	{
		echo "<h4><span class='label label-info'>您已通过，请上传缴费凭证。</span></h4>";
		exit();
	}
if(ifthereis("join_form","id_p=$id and state=7")>0) //入会完成！
	{
		echo "<h4><span class='label label-info'>缴费证明审核中！</span></h4>";
		exit();
	}
if(ifthereis("join_form","id_p=$id and state=8")>0) //入会完成！
	{
		echo "<h3><span class='label label-info'>您已入会</span></h3>";
		exit();
	}
if(ifthereis("join_form","id_p=$id and state=9")>0) //未通过审核！
	{
		echo "<h3><span class='label label-info'>未通过审核，请联系管理员</span></h3>";
		exit();
	}
if(ifthereis("conpany_result","id_p=$id and join_result=='已入会'"))
    {
        echo "<h3><span class='label label-info'>您已入会</span></h3>";
		exit();
		}

if($_POST["p42"]=='join') //检测是否是此表单提交
{
	if($_FILES['userfile']['tmp_name']!='')
	{
        $type=$_FILES['userfile']['type'];//上传文件的类型 
        $size=$_FILES['userfile']['size'];//上传文件的大小 
        $upfile=ROOT."/join_form/check//$id.jpg";   //保存上传文件的路径：index所在目录/webpage/join_form/id号
		$upfile1="/join_form/check//$id.jpg";
		if($type!='image/pjpeg'&&$type!='image/jpeg'&&$type!='image/png')
		{
		 echo" <script language=javascript>alert('上传失败!照片必须上传pjpeg、jpeg或png格式');</script>";
		 exit();
	    }
	    if($size>=600000)
		{
	     echo"<script language=javascript>alert('上传失败!请将照片压缩至500K以下');</script>";
         exit();
	    }
	    if(!move_uploaded_file($_FILES['userfile']['tmp_name'],$upfile))//移动该文件至指定目录 注意此处保存的文件已加上后缀jpg
		{
         echo"<script language=javascript>alert('移动图片失败');</script>";
          exit();
		}

	    if($error!=0)
		 { 
	     echo"<script language=javascript>alert('上传图片失败，请联系管理员');</script>";
         exit();
	     }
	 }
	 else
	 {
		echo  "<script language=javascript>alert('必须上传营业执照');</script>";
		exit();
	 }
		for($i=1;$i<42;$i++)
		{
			$str="p".$i;
			$PA[$i]=$_POST[$str];
			$PA[$i]=addslashes($PA[$i]);
		}
		$result=insert("join_form",41,$PA,$id);	
		$query="update join_form set position = '$upfile1' where id_p=$id";
		$result1=$db->query($query);
		if($result && $result1) 
		{
			echo "<script language=javascript>alert('提交成功');</script>";
			 
		}
		else echo "<script language=javascript>alert('出现问题，请尝试重新输入');</script>";
	
}
if($_POST["p43"]=='update')
{
 if($_FILES['userfile']['tmp_name']!='')
	{
        $type=$_FILES['userfile']['type'];//上传文件的类型 
        $size=$_FILES['userfile']['size'];//上传文件的大小 
        $upfile=ROOT."/join_form/check//$id.jpg";   //保存上传文件的路径：index所在目录/webpage/join_form/id号
		unlink($upfile);
		$upfile1="/join_form/check//$id.jpg";
		if($type!='image/pjpeg'&&$type!='image/jpeg'&&$type!='image/png')
		{
		 echo" <script language=javascript>alert('上传失败!照片必须上传pjpeg、jpeg或png格式);</script>";
		 exit();
	    }
	    if($size>=600000)
		{
	     echo"<script language=javascript>alert('上传失败!请将照片压缩至500K以下');</script>";
         exit();
	    }
	    if(!move_uploaded_file($_FILES['userfile']['tmp_name'],$upfile))//移动该文件至指定目录 注意此处保存的文件已加上后缀jpg
		{
         echo"<script language=javascript>alert('移动图片失败');</script>";
          exit();
		}

	    if($error!=0)
		 { 
	     echo"<script language=javascript>alert('上传图片失败，请联系管理员');</script>";
         exit();
	     }
	 }
		for($i=1;$i<42;$i++)
		{
			$str="p".$i;
			$PA[$i]=$_POST[$str];
			$PA[$i]=addslashes($PA[$i]);
		}
		$result=change2("join_form",42,$PA,1,$id);	
		if($result) 
		{
			echo "<script language=javascript>alertAtuoClose(11223);</script>";
			 
		}
		else echo "<script language=javascript>alert('出现问题，请尝试重新输入');</script>";
	
}

 $query="select * from join_form where id_p = $id";
 $result=$db->query($query);
 $row=$result->fetch_assoc();
 $num_results=$result->num_rows;
echo "
<div class='container-fluid hidden-xs'>
<form enctype='multipart/form-data' action='' method='post'>
	<h3 class='text-center'>中国钢结构协会空间结构分会团体会员入会申请表</h3>
	<br/>
    <table class='table table-bordered table-responsive text-center'>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>一、单 位 基 本 情 况</lead></th>
        </tr>
        <tr>
            <td colspan='2'>单位名称（公章）</td>
            <td colspan='4'><input type='text' class='form-control' name='p1' value=".$row[c1]."> </td>
            <td colspan='2'>企事业级别</td>
            <td colspan='4'><input type='text' class='form-control' name='p2' value=".$row[c2]."></td>
        </tr>
        <tr>
            <td colspan='2'>单位性质</td>
            <td colspan='4'><input type='text' class='form-control' name='p3' value=".$row[c3]."> </td>
            <td colspan='2'>产权所有</td>
            <td colspan='4'><input type='text' class='form-control' name='p4' value=".$row[c4]."></td>
        </tr>
        <tr>
            <td colspan='2'>注册资金</td>
            <td colspan='4'><input type='text' class='form-control' name='p5' value=".$row[c5]."> </td>
            <td colspan='2'>上级单位</td>
            <td colspan='4'><input type='text' class='form-control' name='p6' value=".$row[c6]."></td>
        </tr>
        <tr>
            <td colspan='2' rowspan='2'>负责人姓名</td>
            <td colspan='2' rowspan='2'><textarea type='text' class='form-control' rows='3' name='p7'>".$row[c7]."</textarea></td>
            <td colspan='2'>职务</td>
            <td colspan='2'><input type='text' class='form-control' name='p8' value=".$row[c8]."></td>
            <td colspan='2'>电话传真</td>
            <td colspan='2'><input type='text' class='form-control' name='p9' value=".$row[c9]."></td>
        </tr>
        <tr>
            <td colspan='2'>职称</td>
            <td colspan='2'><input type='text' class='form-control' name='p10' value=".$row[c10]."></td>
            <td colspan='2'>手机</td>
            <td colspan='2'><input type='text' class='form-control' name='p11' value=".$row[c11]."></td>
        </tr>
        <tr>
            <td colspan='2' rowspan='2'>联系人（代表）姓名</td>
            <td colspan='2' rowspan='2'><textarea type='text' class='form-control' rows='3' name='p12'>".$row[c12]."</textarea></td>
            <td colspan='2'>职务</td>
            <td colspan='2'><input type='text' class='form-control' name='p13' value=".$row[c13]."></td>
            <td colspan='2'>电话传真</td>
            <td colspan='2'><input type='text' class='form-control' name='p14' value=".$row[c14]."></td>
        </tr>
        <tr>
            <td colspan='2'>职称</td>
            <td colspan='2'><input type='text' class='form-control' name='p15' value=".$row[c15]."></td>
            <td colspan='2'>手机</td>
            <td colspan='2'><input type='text' class='form-control' name='p16' value=".$row[c16]."></td>
        </tr>
        <tr>
            <td colspan='2'>通讯地址</td>
            <td colspan='6'><input type='text' class='form-control' name='p17' value=".$row[c17]."></td>
            <td colspan='2'>邮编</td>
            <td colspan='2'><input type='text' class='form-control' name='p18' value=".$row[c18]."></td>
        </tr>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>二、单 位 规 模</lead></th>
        </tr>
        <tr>
            <td colspan='2'>创立时间</td>
            <td colspan='4'><input type='text' class='form-control' name='p19' value=".$row[c19]."> </td>
            <td colspan='2'>从事空间结构时间</td>
            <td colspan='4'><input type='text' class='form-control' name='p20' value=".$row[c20]."></td>
        </tr>
        <tr>
            <td colspan='2'>占地面积</td>
            <td colspan='4'><input type='text' class='form-control' name='p21' value=".$row[c21]."> </td>
            <td colspan='2'>建 筑 面 积</td>
            <td colspan='4'><input type='text' class='form-control' name='p22' value=".$row[c22]."></td>
        </tr>
        <tr>
        <td colspan='2'>资金总额</td>
        <td colspan='2'><input type='text' class='form-control' name='p23' value=".$row[c23]."> </td>
        <td colspan='2'>固定资产</td>
        <td colspan='2'><input type='text' class='form-control' name='p24' value=".$row[c24]."></td>
        <td colspan='2'>流动资金</td>
        <td colspan='2'><input type='text' class='form-control' name='p25' value=".$row[c25]."></td>
    </tr>
        <tr>
            <td colspan='2'>企业人数</td>
            <td colspan='2'><input type='text' class='form-control' name='p26' value=".$row[c26]."> </td>
            <td colspan='2'>管理人员</td>
            <td colspan='2'><input type='text' class='form-control' name='p27' value=".$row[c27]."></td>
            <td colspan='2'>技术人员</td>
            <td colspan='2'><input type='text' class='form-control' name='p28' value=".$row[c28]."></td>
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
            <td colspan='3'><input type='text' class='form-control' name='p29' value=".$row[c29]."></td>
            <td colspan='3'><input type='text' class='form-control' name='p30' value=".$row[c30]."></td>
            <td colspan='3'><input type='text' class='form-control' name='p31' value=".$row[c31]."></td>
            <td colspan='3'><input type='text' class='form-control' name='p32' value=".$row[c32]."></td>
        </tr>
        <tr>
            <td colspan='3'><input type='text' class='form-control' name='p33' value=".$row[c33]."></td>
            <td colspan='3'><input type='text' class='form-control' name='p34' value=".$row[c34]."></td>
            <td colspan='3'><input type='text' class='form-control' name='p35' value=".$row[c35]."></td>
            <td colspan='3'><input type='text' class='form-control' name='p36' value=".$row[c36]."></td>
        </tr>
        <tr>
            <td colspan='3'><input type='text' class='form-control' name='p37' value=".$row[c37]."></td>
            <td colspan='3'><input type='text' class='form-control' name='p38' value=".$row[c38]."></td>
            <td colspan='3'><input type='text' class='form-control' name='p39' value=".$row[c39]."></td>
            <td colspan='3'><input type='text' class='form-control' name='p40' value=".$row[c40]."></td>
        </tr>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>四、从事空间结构工作的详细情况</lead></th>
        </tr>
        <td colspan='12'>
        <textarea  type='text' class='form-control' rows='12' name='p41'>".$row[c41]."</textarea></td>
		<tr>
		<td colspan='12'><label for='userfile'> 上传营业执照</label></td></tr>
			<td colspan='12'>
			<img src='webpage/".$row[position]."' width=450px>
			
			<input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
			<input type='file' style='margin:auto; width:80%;' name='userfile' id='userfile'/>
			</td>
		</tr>
    </table>
	<div style='text-align: right;margin-bottom: 2%'>";
	if($num_results==0)
	echo"<input type='hidden' value='join' name='p42'>";
	else
	echo"<input type='hidden' value='update' name='p43'>";
    echo"<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交 &nbsp; &nbsp;
    </button>
	</div>
	</form>
	</div>


	<div class='container-fluid visible-xs' style='margin-top:-10px;'>
	<form class='form-horizontal' enctype='multipart/form-data' action='' method='post'>
 <h5 class='text-center'><strong>中国钢结构协会空间结构分会团体会员入会申请表</strong></h5>
	<h6 class='text-center'><strong>单位基本情况</strong></h6>
	<div class='form-group text-center'>
    <label class='col-xs-4 control-label'>单位名称</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p1' value=".$row[c1].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>企事业级别</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p2' value=".$row[c2].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>单位性质</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p3' value=".$row[c3].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产权所有</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p4' value=".$row[c4].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>注册资金</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p5' value=".$row[c5].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>上级单位</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p6' value=".$row[c6].">
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>负责人姓名</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p7' value=".$row[c7].">
  </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p8' value=".$row[c8].">
  </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p9' value=".$row[c9].">
  </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>电话传真</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p10' value=".$row[c10].">
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>手机</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p11' value=".$row[c11].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>联系人姓名</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p12' value=".$row[c12].">
  </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p13' value=".$row[c13].">
  </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p14' value=".$row[c14].">
  </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>电话传真</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p15' value=".$row[c15].">
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>手机</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p16' value=".$row[c16].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>通讯地址</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p17' value=".$row[c17].">
    </div>
  </div>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>手机</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p18' value=".$row[c18].">
    </div>
  </div>
  <h6 class='text-center'><strong>单位规模</strong></h6>
<div class='form-group text-center'>
    <label class='col-xs-4 control-label'>创立时间</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p19' value=".$row[c19].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>从事空间结构时间</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p20' value=".$row[c20].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>占地面积</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p21' value=".$row[c21].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>建筑面积</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p22' value=".$row[c22].">
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>资金总额</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p23' value=".$row[c23].">
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>固定资产</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p24' value=".$row[c24].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>流动资金</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p25' value=".$row[c25].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>企业人数</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p26' value=".$row[c26].">
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>管理人员</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p27' value=".$row[c27].">
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>技术人员</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p28' value=".$row[c28].">
    </div>
  </div>
   <h6 class='text-center'><strong>近三年的生产经营概况</strong></h6>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>年度</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p29' value=".$row[c29].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产量</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p30' value=".$row[c30].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label' >面积</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p31'placeholder='X 平方米' value=".$row[c31].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产值</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p32' placeholder='X 万元' value=".$row[c32].">
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>年度</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p33' value=".$row[c33].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产量</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p34' value=".$row[c34].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>面积</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p35' placeholder='X 平方米' value=".$row[c35].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产值</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p36' placeholder='X 万元' value=".$row[c36].">
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>年度</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p37' value=".$row[c37].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产量</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p38' value=".$row[c38].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>面积</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p39' placeholder='X 平方米' value=".$row[c39].">
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产值</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p40' placeholder='X 万元' value=".$row[c40].">
    </div>
  </div>
  <div class='col-xs-12'>
<h6 class='text-center'><strong>从事空间结构工作的详细情况</strong></h6>  
      <textarea class='form-control' name='p41' rows='4'>".$row[c41]."</textarea>
    </div> 
	<div class='col-xs-12'>
	<table class='table table-bordered text-center' style='margin-top:10px'>
     <input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
	 
	 <tr>
	 <td>
			<h5><strong>上传营业执照</strong></h5></td></tr>
	<tr>
	<td>
	<img src='webpage/".$row[position]."' width='80%'>
			<input type='file' class='form-control' name='userfile' id='userfile'/>
    </td></tr></table>
	<div style='text-align: right;margin-bottom: 2%'>
	<input type='hidden' value='join' name='p42'>
	<div class='col-xs-12' style='padding:5px;'> <input type='submit' class='btn btn-xs btn-primary form-control' value='提交'></input></div></div>
	</form>
  </div> </div>"
	
	
	
	;  //注意往上4行这里的hidden，目前不是必须的，但是建议加上，避免恶意提交