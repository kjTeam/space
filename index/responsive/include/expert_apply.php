
<!DOCTYPE html>
<html>
<head>
    <title>
       专家申请
    </title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta content="telephone=no" name="format-detection">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../css/sweetalert2.min.css" rel="stylesheet">
    <LINK rel="shortcut icon" type="image/x-icon" href="../../image/favicon_2.ico" media="screen"/>
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../scripts/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript"  src="../scripts/sweetalert2.min.js"></script>
    <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
    <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
    <!--[if IE 9]>
    <script src="bootstrap/js/respond.min.js"></script>
    <script src="bootstrap/js/html5shiv.js"></script>
    <![endif]-->


</head>
<body>
<?php include_once '../../include/function.php' ?>
<?php
define('ROOT',dirname(__FILE__)); //用于上传文件
$db = connect_mysql();
for($i=1;$i<20;$i++)
		{
			$str="p".$i;
			$PA[$i]=$_POST[$str];
			$PA[$i]=addslashes($PA[$i]);
		}
$English_arr = array();
$Major_arr = array();
$Major_arr1 = array();
$English_arr = $_POST['English'];
$Major_arr = $_POST['Major'];
$Major_arr1 = $_POST['Major1'];
$English = implode(' ',$English_arr); //将数组转化为字符串，存储在数组中
$Major = implode(' ',$Major_arr); 
$Major1 = implode(' ',$Major_arr1); 
$othermajor=$_POST['othermajor'];
$othermajor1=$_POST['othermajor1'];
if(is_uploaded_file($_FILES['userphoto']['tmp_name']))
{
	 echo"<script language=javascript>alert('1');</script>";
     $tmp_name=$_FILES['userphoto']['tmp_name'];//上传文件file的临时存放路径
	 $name=uniqid('photo',true);
     $upfile=ROOT."/export/userphoto//$name.jpg"; 
	 echo $upfile;
	 if(!move_uploaded_file($tmp_name,$upfile))
		{ 
            echo <<<EOD
			<script language=javascript>
			sweetAlert({
                          title: "出现错误！",
                          text: "请重新提交或联系管理员",
						   type: "error", 
						  showCloseButton: false,
                          showCancelButton: false
                     }).then(function(){
						   window.location.href='../apply.php';
						 });
            </script>
EOD;
            exit();
		}
}
if(is_uploaded_file($_FILES['file']['tmp_name']))
{
	 $name1=$_FILES['file']['name'];//上传文件的名字，utf-8格式。用于存入数据库。
	 //$name=iconv('UTF-8','GBK',$name1);//文件存储到服务器，转码到GBK格式。(部署到服务器以后就不用转码了)
     //$type=$_FILES['userphoto']['type'];//上传文件的类型 
     //$size=$_FILES['userphoto']['size'];//上传文件的大小 
	 $tmp_name=$_FILES['file']['tmp_name'];//上传文件file的临时存放路径
     $upfile=ROOT."/export/file//$name1"; 
	  echo $upfile;
	 if(!move_uploaded_file($tmp_name,$upfile))
		{ 
             echo <<<EOD
			<script language=javascript>
			sweetAlert({
                          title: "出现错误！",
                          text: "请重新提交或联系管理员",
						   type: "error", 
						  showCloseButton: false,
                          showCancelButton: false
                     }).then(function(){
						   window.location.href='../apply.php';
						 });
            </script>
EOD;
            exit();
		}
}
$newid=insertexport("expertjoin",21,$PA,$English,$Major,$othermajor,$Major1,$othermajor1);
$query="update expertjoin set photo='$name', filename='$name1',state='1' where id='$newid'";
$result1=$db->query($query);
if($result1){
	 echo <<<EOD
			<script language=javascript>
			swal({
                          title: "提交成功！",
                          text: "正在跳转……",
						  timer: "1000",
						   type: "success", 
						  showCloseButton: false,
                          showCancelButton: false
                         }).then(function(){
						   window.location.href='../index.php';
						 });
            </script>
EOD;
}
else{
	echo <<<EOD
			<script language=javascript>
			sweetAlert({
                          title: "出现错误！",
                          text: "请重新提交或联系管理员",
						   type: "error", 
						  showCloseButton: false,
                          showCancelButton: false
                     }).then(function(){
						   window.location.href='../apply.php';
						 });
            </script>
EOD;
 }
?>
</body>
</html>