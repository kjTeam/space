<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php include_once 'include/function.php' ?>
<?php
session_start();
if(!less_than_ie9()) {
    echo "<script language=javascript>location.href='responsive/member_units.php';</script>";
    exit();
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <meta name="renderer" content="webkit">
    <meta content="telephone=no" name="format-detection">
    <title>会员单位
    </title>
    <LINK href=css/style.css rel=stylesheet>
    <LINK href=css/footer.css rel=stylesheet>
    <LINK href=css/header.css rel=stylesheet>
    <LINK href=css/general.css rel=stylesheet>
    <LINK rel="shortcut icon" type="image/x-icon" href="image/favicon_2.ico" media="screen"/>
    <script src="./js/javascript.js" type="text/javascript" charset="GB2312"></script>
</head>

<body>

<?php
include_once "include/function.php";
$res = user_name_psw_check($_COOKIE['user_name'], $_COOKIE['user_password']);
if (isset($_SESSION['id']))
    include "include/header-login.php";
else
    include "include/header.php";
?>

<div class="parent_div">
    <div class="left">
        <div class="left-title">
            <span>会员单位</span>
        </div>
    </div>
    <?php include 'include/member_units_right.php' ?>
</div>
<?php include 'include/footer.php' ?>
</body>

</html>
