<?php
/**
 * User: ZhuKaihao
 * Date: 16/4/11
 * Time: 下午8:37
 */
?>


<?php include_once 'include/function.php' ?>
<?php
if(!less_than_ie9()) {
    echo "<script language=javascript>location.href='responsive/more.php?pagename={$_GET["pagename"]}';</script>";
    exit();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <meta name="renderer" content="webkit">
    <meta content="telephone=no" name="format-detection">
    <title>
        <?php switch ($_GET["pagename"]) {
            case "tongzhiwenjian":
                echo "通知文件";
                break;
            case "youxiugongcheng":
                echo "优秀工程";
                break;
            case "mojiegou":
                echo "膜结构";
                break;
            case "wanggejiegou":
                echo "网格结构";
                break;
            case "suojiegou":
                echo "索结构";
                break;
        }
        ?>
    </title>
    <LINK href=css/style.css rel=stylesheet>
    <LINK href=css/footer.css rel=stylesheet>
    <LINK href=css/header.css rel=stylesheet>
    <LINK href=css/general.css rel=stylesheet>
    <LINK rel="shortcut icon" type="image/x-icon" href="image/favicon_2.ico" media="screen"/>
    <script src="./js/javascript.js" type="text/javascript" charset="GB2312"></script>
</head>

<body>

<?php include 'include/header.php' ?>
<?php
$res = user_name_psw_check($_COOKIE['user_name'], $_COOKIE['user_password']);
if ($res['user_name_psw_match'] == 'yes')
    if ($res['user_is_manager'] == 'yes') {
        echo <<<EOD
<div id="header_login" align="right">
        <a href="#">欢迎你，{$_COOKIE['user_name']}|</a>
        <a href="manage.php">发布通知|</a>
        <a href="/index2/manager.php?a=2">后台管理|</a>
        <a href="logout.php">退出</a>
</div>
EOD;
    }
    else
        echo <<<EOD
<div id="header_login" align="right">
        <a href="#">欢迎你，{$_COOKIE['user_name']}|</a>
        <a href="logout.php">退出</a>
</div>
EOD;
else
    include "include/header_login_register.html";
?>
    <div class="parent_div">
        <div class="left">
            <div class="left-title">
            <span>
                <?php switch ($_GET["pagename"]) {
                    case "tongzhiwenjian":
                        echo "通知文件";
                        break;
                    case "youxiugongcheng":
                        echo "优秀工程";
                        break;
                    case "mojiegou":
                        echo "膜结构";
                        break;
                    case "wanggejiegou":
                        echo "网格结构";
                        break;
                    case "suojiegou":
                        echo "索结构";
                        break;
                }
                ?></span>
            </div>
            <?php
            if($_GET["pagename"]=="youxiugongcheng")
                echo <<<EOD
<table class="youxiugongcheng-table">
    <tr>
        <td>
            <a href="/index/pingshenbanfa.php"> “空间结构奖”评审办法</a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="/index/download.php?file_name=空间结构奖申请表.doc&file_dir=file/shenqingbiao.doc" >“空间结构奖”申请表下载</a>
        </td>
    </tr>
</table>
EOD;
            ?>
        </div>
        <?php include 'include/more_right.php' ?>
    </div>
<?php include 'include/footer.php' ?>
</body>

</html>
