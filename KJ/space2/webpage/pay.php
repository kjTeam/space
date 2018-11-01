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
<script type='text/javascript'>
     //判断表单带星号的不能为空，判断文件格式只能是jpg，jpeg，pdf,word,大小比如小于2M
    function checkForm(){
		if(!$('#payfile').val()){
            $('#notice').html('必须上传缴费证明');
            $('#notice').css('display','inline-block');
            return false;
        }
        var userFileType = $('#payfile').val().split('.')[1];
        if(!(userFileType=='jpg' || userFileType=='jpge' || userFileType=='png')){
          $('#notice').html('缴费证明格式不正确！');
          $('#notice').css('display','inline-block');
          return false;
        }
        return true;
    }
</script>
</head>
<?php
$no = control(8);
$id = $_SESSION['id'];
$query = "select join_result from company_result where id_p = $id"; //从company_result 找出
$result = $db->query($query);
$row = $result->fetch_assoc();
$num_results = $result->num_rows;
$query1 = "select * from join_form where id_p = $id"; //从join_form找出是否存在正在申请入会的情况
$result1 = $db->query($query1);
$row1 = $result1->fetch_assoc();
$num_results1 = $result1->num_rows;
if ($num_results == 0) //如果company表中没有记录
{
    if ($num_results1 == 0) //检查是不是正在入会申请的状态
    {
        echo "
	 <h4><span class='label label-danger'>您尚未入会，无法进行缴费</span></h4>";
        exit();
    } else {
        if ($row1['state'] == 6) {
            $flag = 1;
        }
//标记是待上传缴费凭证的状态。
        else {
            echo "<h4><span class='label label-danger'>正在审核</span></h4>";
            exit();
        }
    }

} else { //如果有记录检查是不是申请了没有通过
    if ($row['join_result'] == '未入会') {
        echo "<h4><span class='label label-danger'>您尚未入会，无法进行缴费</span></h4>";
        exit();
    }

}
if ($row['pay_result'] == '已缴费') {
    echo "<h4><span class='label label-danger'>您已缴纳当年年费，无需再次缴费</span></h4>";
    exit();
  
    if ($_FILES['userfile']['tmp_name'] != '') {
        $type = $_FILES['userfile']['type']; //上传文件的类型
		$size = $_FILES['userfile']['size']; //上传文件的大小
		                
        if (file_exists($upfile)) {
            unlink($upfile);
        }
        if ($type != 'image/pjpeg' && $type != 'image/jpeg' && $type !='image/png') {
            echo " <script language=javascript>alert('上传失败!照片必须上传规定格式');</script>";
            exit();
        }
        if ($size >= 2048000) {
            echo "<script language=javascript>alert('上传失败!请将照片压缩至2M以下');</script>";
            exit();
        }
        if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $upfile)) {
            echo "<script language=javascript>alert('出现问题，请联系管理员');</script>";
            exit();
        } //移动该文件至指定目录 注意此处保存的文件已加上后缀jpg
        if ($flag == 1) {
            $query = "update join_form set state=7 where id_p=$id";
            $result = $db->query($query);
            if ($result == null) {
                echo "<script language=javascript>alert('出现问题，请联系管理员');</script>";
                exit();
            }
        }
        // $query="insert into $pay set id_p = '$id',time=now(),state=0 ,position='$upfile1'";
        //SELECT DATE_FORMAT(time,'%Y-%m-%d') As date1 FROM pay2017
        $result1 = $db->query($query);
        if ($result1) {
            echo "<script language=javascript>alert('上传成功，等待管理员审核');</script>";
        }

    } else {
        echo "<script language=javascript>alert('请选择上传内容！');</script>";
    }

}
if($_POST['update_pay']=='yes'){//上传成功后，修改图片
	if($_FILES['userfile']['tmp_name']!=''){
	 $type=$_FILES['userfile']['type'];//上传文件的类型 
     $size=$_FILES['userfile']['size'];//上传文件的大小 
	 if($type!='image/pjpeg'&&$type!='image/jpeg')
		   {
		     echo" <script language=javascript>alert('上传失败!照片必须上传规定格式');</script>";
			 exit();
	       }
	       if($size>=2048000)
		    {
	          echo"<script language=javascript>alert('上传失败!请将照片压缩至2M以下');</script>";
			  exit();
	        }
			 unlink ($upfile);	
	     if(!move_uploaded_file($_FILES['userfile']['tmp_name'],$upfile)){
          echo"<script language=javascript>alert('出现问题，请联系管理员');</script>";
		  exit();
	     }  //移动该文件至指定目录 注意此处保存的文件已加上后缀jpg
	    //    $query="update $pay set time=now() where id_p=$id";
			//SELECT DATE_FORMAT(time,'%Y-%m-%d') As date1 FROM pay2017
			$result1=$db->query($query);
			if($result1)
			echo"<script language=javascript>alert('更改图片成功，等待管理员审核');</script>";
	}
	else{
		 echo"<script language=javascript>alert('请选择上传内容！');</script>";
	}

}
	
	echo "
	<form enctype='multipart/form-data' action='' method='post' class='form-inline' onsubmit='return checkForm()'>
		<div class='container-fluid form-group  ' style='margin-top:25px;margin-left:10%;font-size:14px'>
		<label for='userfile'> 上传缴费凭证<span class='must_wirte'>[注：上传格式为jpg、png格式，大小小于2M]:</span></label>
		<input type='file' class='form-control noborder-input' name='userfile' id='payfile'/>	
		</div>
		<hr>";
// $query="select * from $pay where id_p =$id";

// $result=$db->query($query);
// $num=$result->num_rows;
if (file_exists($upfile)) {
    echo "<div class='text-center hidden-xs'>
			<img src='webpage/pay1/" . $id . ".jpg' width='60%' style='border:2px solid gray;'>
			</div>
			<div class='text-center visible-xs'>
			<img src='webpage/pay1/" . $id . ".jpg' width='80%' style='border:2px solid gray;'>
			</div>";
    $flag1 = 'update_pay';
} else {
    $flag1 = 'pay';
}
// if($num)//检测是否已经提交，如果已经提交，则显示图片，并且设置hidden的input的name是update_pay
// {
//     $row=$result->fetch_assoc();
//     echo"<div class='text-center hidden-xs'>
//     <img src='webpage/".$row['position']."' width='60%' style='border:2px solid gray;'>
//     </div>
//     <div class='text-center visible-xs'>
//     <img src='webpage/".$row['position']."' width='80%' style='border:2px solid gray;'>
//     </div>";
//     $flag1='update_pay';
// }
// else {
//     $flag1='pay';
// }

echo "<div style='text-align: right;margin-bottom: 2%;margin-right:10%'>
		<input type='hidden' value='yes' name='pay'>
		<span class='must_wirte' id='notice' style='display:none'></span><button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交 &nbsp; &nbsp;
		</button>
		</div>
	</form>
	";
