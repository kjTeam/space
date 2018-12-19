<?php include_once '../include/function.php' ?>
<?php
session_start();
if (less_than_ie9()) {
    $id = $_GET['id'];
    $page_name = $_GET["pagename"];
    echo "<script language=javascript>location.href='../announcement_content.php?id=$id&&pagename=$page_name';</script>";
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
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
            case"zhuanjia":
                echo"专家组";
                break;
        }
        ?>
    </title>

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
    <style type="text/css">
    .tableborder{
    }
.tableborder td{
border:1px solid black;
}
</style>

</head>

<body>

<?php
include_once "../include/function.php";
$res = user_name_psw_check($_COOKIE['user_name'], $_COOKIE['user_password']);
if ($res['user_name_psw_match'] == 'yes') {
    if ($res['user_is_manager'] == 'yes') {
        $id = $_GET['id'];
        $page_name = $_GET["pagename"];
        include "include/header-manage-content-page.php";
    }
    else
        include "include/header-login.php";
}
else
    include "include/header.php";
?>

<div class="container content-page-container">
    <div class="row parent">
        <div class="col-md-2 col-xs-12 left-col">
            <div class="left">
                <div class="left-title">
                    <span><?php switch ($_GET["pagename"]) {
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
                            case "zhuanjia":
                                echo "专家组";
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
            <a href="/index/responsive/pingshenbanfa.php"> “空间结构奖”评审办法</a>
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
        </div>
        <div class="col-md-10 col-xs-12 right-col">
            <?php
            $id = $_GET['id'];
            $page_name = $_GET["pagename"];
            $res = get_info_of_id_in_datatable($id, 'index_' . $page_name);
            ?>

            <div class="right">
                <div class="right-title">
                    <p><strong><?php echo $res['title']; ?></strong></p>
                </div>
                <div class="right-time">
                    <p>发布时间：<?php echo $res['time']; ?></p>
                </div>
                <hr/>
                <div class="right-file-no">
                    <p><?php echo $res['file_no']; ?></p>
                </div>
                <div class="right-content">
                    <p><?php echo $res['content']; ?></p>
                        <p class="right-end"><?php echo $res['end']; ?></p>
                        <p class="right-date"><?php echo $res['date']; ?></p>
                </div>
                <?php
                if (!$res['file_dir'] == '' && !$res['file_name'] == '') {
                    $file_name = explode("|", $res["file_name"]);
                    $file_dir = explode("|", $res["file_dir"]);
                    $count = count($file_name);
                    echo "<div class=\"right-file\"><p>附件:<br/>";
                    for ($i = 0; $i < $count; $i++)
                        echo <<<EOD
        <a href="../download.php?file_name={$file_name[$i]}&file_dir={$file_dir[$i]}">{$file_name[$i]}</a></br>
EOD;
                    echo "</p></div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include "include/footer.php"; ?>

</body>