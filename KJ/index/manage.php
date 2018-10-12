<?php
/**
 * Author: ZhuKaihao
 * Date: 2016/3/24
 * Time: 20:26
 * 管理页面
 */
?>

<?php include_once 'include/function.php' ?>
<?php

if(!less_than_ie9()) {
    echo "<script language=javascript>location.href='manage-res.php';</script>";
    exit();
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="renderer" content="webkit">
    <meta content="telephone=no" name="format-detection">
    <title>发布通知</title>
    <LINK href=css/style.css rel=stylesheet>
    <LINK href=css/footer.css rel=stylesheet>
    <LINK href=css/header.css rel=stylesheet>
    <LINK href=css/general.css rel=stylesheet>
    <LINK rel="shortcut icon" type="image/x-icon" href="image/favicon_2.ico" media="screen"/>
    <script src="./js/javascript.js" type="text/javascript" charset="GB2312"></script>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link href="/index/ueditor/themes/default/css/ueditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="/index/ueditor/third-party/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/index/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/index/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="/index/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>

<?php
session_start();
if (unset($_session['id'])|| !($_session['category']=='5')) {
    echo "<script language=javascript>alert('无权访问!');location.href='responsive/index.php';</script>";
    exit();
}
?>

<body>

<?php include "include/header.php"; ?>
<div id="header_login" align="right">
    <a href="#">欢迎您，<?php echo "{$_session['username']}"; ?>|</a>
    <a href="../space2/index.php">后台管理|</a>
    <a href="logout.php">退出</a>
</div>
<div class="parent_div">
                <div class="left">
                    <div class="left-title">
                        <span>发布通知</span>
                    </div>
                </div>
                <?php include 'include/manage_right.php' ?>
</div>
<?php include 'include/footer.php' ?>
</body>
</html>