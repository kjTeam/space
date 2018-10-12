<?php 
include_once "../include/function.php";
?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta content="telephone=no" name="format-detection">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/header-rsp.css" rel="stylesheet">
    <link href="css/footer-rsp.css" rel="stylesheet">
    <link href="css/index-rsp.css" rel="stylesheet">
    <link href="css/content-page.css" rel="stylesheet">
    <LINK rel="shortcut icon" type="image/x-icon" href="../image/favicon_2.ico" media="screen"/>


    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
    <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
    <!--[if IE 9]>
    <script src="bootstrap/js/respond.min.js"></script>
    <script src="bootstrap/js/html5shiv.js"></script>
    <![endif]-->


</head>
<?php
include_once "../include/function.php";
   $res = user_name_psw_check($_COOKIE['user_name'], $_COOKIE['user_password']);
   if ($res['user_name_psw_match'] == 'yes')
       include "include/header-login.php";
    else
       include "include/header.php";
?>
<body>
<div class="container-fluid text-center" >
<div class='col-xs-6 col-xs-offset-3' style='margin-top:3%; border-radius:1em;-moz-border-radius:1em;-webkit-border-radius:1em;background-color:#fff; -moz-box-shadow:2px 2px 2px 2px rgba(40%,40%,20%,0.2);
-webkit-box-shadow:2px 2px 2px 2px rgba(40%,40%,20%,0.2);          
box-shadow:2px 2px 2px 2px rgba(40%,40%,20%,0.2);'>
<div style="margin:10px 23%;">
<p>
<h3 style="letter-spacing: 0.1em">
<img src='../image/wrong.png' width='80px' height='80px' >
&nbsp提交失败！请重试
</h3>
</p>
</div>
<div style="float:right"><a href='http://localhost/cms/index/responsive/index.php' class="btn btn-primary" role="button">返回上传界面</a><div> 
<br>
</div>
</div>
</html>