<?php include_once 'include/function.php' ?>

<?php
if (less_than_ie9()) {
    echo "<script language=javascript>location.href='../index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>空间结构分会</title>

    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0"
    ">
    <meta content="telephone=no" name="format-detection">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/index-rsp.css" rel="stylesheet">
    <link href="css/header-rsp.css" rel="stylesheet">
    <link href="css/footer-rsp.css" rel="stylesheet">
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
include_once("../include/function.php");

//分会简介表格链接
$fenhuijianjielink = get_num_of_column_form_datatable('index_fenhuijianjie', 'content', 8);

//分会简介
$fenhuijianjie = get_num_of_column_form_datatable('index_fenhuijianjie', 'title', 8);

//通知文件id
$tongzhiwenjianid = get_num_of_column_form_datatable('index_tongzhiwenjian', 'id', 8);

//通知文件链接
$tongzhiwenjianlink = array();
for ($i = 0; $i < 8; $i++) {
    $tongzhiwenjianlink[$i] = "announcement_content.php?id=" . $tongzhiwenjianid[$i] . "&&pagename=tongzhiwenjian";
}

//通知文件
$tongzhiwenjian = get_num_of_column_form_datatable('index_tongzhiwenjian', 'title', 8);

//优秀工程id
$youxiugongchengid = get_num_of_column_form_datatable('index_youxiugongcheng', 'id', 8);

//优秀工程链接
$youxiugongchenglink = array();
for ($i = 0; $i < 8; $i++) {
    $youxiugongchenglink[$i] = "announcement_content.php?id=" . $youxiugongchengid[$i] . "&&pagename=youxiugongcheng";
}

//优秀工程·
$youxiugongchengtitle = get_num_of_column_form_datatable('index_youxiugongcheng', 'title', 8);

//膜结构表格id
$mojiegouid = get_num_of_column_form_datatable('index_mojiegou', 'id', 8);

//膜结构链接
$mojiegoulink = array();
for ($i = 0; $i < 8; $i++) {
    $mojiegoulink[$i] = "announcement_content.php?id=" . $mojiegouid[$i] . "&&pagename=mojiegou";
}

//膜结构
$mojiegoutitle = get_num_of_column_form_datatable('index_mojiegou', 'title', 8);

//网格结构id
$wanggejiegouid = get_num_of_column_form_datatable('index_wanggejiegou', 'id', 8);

//网格结构链接
$wanggejiegoulink = array();
for ($i = 0; $i < 8; $i++) {
    $wanggejiegoulink[$i] = "announcement_content.php?id=" . $wanggejiegouid[$i] . "&&pagename=wanggejiegou";
}

//网格结构
$wanggejiegoutitle = get_num_of_column_form_datatable('index_wanggejiegou', 'title', 8);

//索结构id
$suojiegouid = get_num_of_column_form_datatable('index_suojiegou', 'id', 8);

//索结构链接
$suojiegoulink = array();
for ($i = 0; $i < 8; $i++) {
    $suojiegoulink[$i] = "announcement_content.php?id=" . $suojiegouid[$i] . "&&pagename=suojiegou";
}

//索结构
$suojiegoutitle = get_num_of_column_form_datatable('index_suojiegou', 'title', 8);

?>

<body>

<?php
include_once "../include/function.php";
$res = user_name_psw_check($_COOKIE['user_name'], $_COOKIE['user_password']);
if ($res['user_name_psw_match'] == 'yes')
    include "include/header-login.php";
else
    include "include/header.php";
?>

<!--通知文件-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 index-col">
            <div class="col-div">
                <div class="col-div-title">
                    <span><a href="fenhuijianjie.php"><img src="/index/image/titlebarbefore.gif">分会简介</a></span>
                    <span class="more"><a href="fenhuijianjie.php">more...</a> </span>
                </div>
                <table class="table_mid">
                    <?php
                    for ($i = 0; $i < 5; $i++)
                        echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px style="border-bottom:1px dotted #ced6e1;">
                        <a href="$fenhuijianjielink[$i]"  class="tablelink"><img src="/index/image/titlebefore.gif">$fenhuijianjie[$i]
                        </a>
                    </td>
                </tr>
EOD;
                    for ($i = 0; $i < 3; $i++)
                        echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px >
                        <a href=""  class="tablelink">
                        </a>
                    </td>
                </tr>
EOD;
                    ?>
                </table>
            </div>
        </div>
        <div class="col-sm-6 index-col">
            <div class="col-div">
                <div class="col-div-title">
                    <span><a href="more.php?pagename=tongzhiwenjian"><img src="/index/image/titlebarbefore.gif">通知文件</a></span>
                    <span class="more"><a href="more.php?pagename=tongzhiwenjian">more...</a></span>
                </div>
                <table class="table_mid">
                    <?php
                    for ($i = 0; $i < 8; $i++) {
                        echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px style="border-bottom:1px dotted #ced6e1;">
                        <a href="$tongzhiwenjianlink[$i]"  class="tablelink">&nbsp&nbsp$tongzhiwenjian[$i]
EOD;
                        if ($tongzhiwenjian[$i])
                            echo <<<EOD
                        <img src = "/index/image/gif-new.gif" border = "0" ></a >
EOD;
                        echo <<<EOD
                    </td >
                </tr >
EOD;
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="col-sm-3 index-col">
            <div class="col-div">
                <div class="col-div-title">
                    <span><a href="more.php?pagename=youxiugongcheng"><img src="/index/image/titlebarbefore.gif">优秀工程</a></span>
                    <span class="more"><a href="more.php?pagename=youxiugongcheng">more...</a> </span>
                </div>
                <table class="table_mid">
                    <?php
                    for ($i = 0; $i < 8; $i++)
                        echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px style="border-bottom:1px dotted #ced6e1;">
                        <a href="$youxiugongchenglink[$i]"  class="tablelink"><img src="/index/image/titlebefore.gif">$youxiugongchengtitle[$i]</a>
                    </td>
                </tr>
EOD;
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 index-col">
            <div class="col-div">
                <div class="col-div-title">
                    <span><a href="more.php?pagename=mojiegou"><img src="/index/image/titlebarbefore.gif">膜结构</a></span>
                    <span class="more"><a href="more.php?pagename=mojiegou">more...</a> </span>
                </div>
                <table class="table_bottom" width="328">
                    <?php
                    for ($i = 0; $i < 6; $i++)
                        echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px style="border-bottom:1px dotted #ced6e1;">
                        <a href="$mojiegoulink[$i]"  class="tablelink"><img src="/index/image/titlebefore.gif">$mojiegoutitle[$i]</a>
                    </td>
                </tr>
EOD;
                    for ($i = 0; $i < 2; $i++)
                        echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px>
                        <a href="#"  class="tablelink"></a>
                    </td>
                </tr>
EOD;
                    ?>
                </table>
            </div>
        </div>
        <div class="col-sm-4 index-col">
            <div class="col-div">
                <div class="col-div-title">
                    <span><a href="more.php?pagename=wanggejiegou"><img src="/index/image/titlebarbefore.gif">网格结构</a></span>
                    <span class="more"><a href="more.php?pagename=wanggejiegou">more...</a> </span>
                </div>
                <table class="table_bottom" width="330px">
                    <?php
                    for ($i = 0; $i < 3; $i++)
                        echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px style="border-bottom:1px dotted #ced6e1;">
                        <a href="$wanggejiegoulink[$i]"  class="tablelink"><img src="/index/image/titlebefore.gif">$wanggejiegoutitle[$i]</a>
                    </td>
                </tr>
EOD;
                    for ($i = 0; $i < 5; $i++)
                        echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px>
                        <a href="#"  class="tablelink"></a>
                    </td>
                </tr>
EOD;
                    ?>
                </table>
            </div>
        </div>
        <div class="col-sm-4 index-col">
            <div class="col-div">
                <div class="col-div-title">
                    <span><a href="more.php?pagename=suojiegou"><img src="/index/image/titlebarbefore.gif">索结构</a></span>
                    <span class="more"><a href="more.php?pagename=suojiegou">more...</a> </span>
                </div>
                <table class="table_bottom" width="328px">
                    <?php
                    for ($i = 0; $i < 2; $i++)
                        echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px style="border-bottom:1px dotted #ced6e1;">
                        <a href="$suojiegoulink[$i]"  class="tablelink"><img src="/index/image/titlebefore.gif">$suojiegoutitle[$i]</a>
                    </td>
                </tr>
EOD;
                    for ($i = 0; $i < 6; $i++)
                        echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px>
                        <a href="#"  class="tablelink"></a>
                    </td>
                </tr>
EOD;
                    ?>
                </table>
            </div>
        </div>
    </div>
</div><!--index content-->

<?php include "include/footer.php"; ?>


</body>


</html>