

<?php
include_once "../include/function.php";
session_start();
if(less_than_ie9()) {
    echo "<script language=javascript>location.href='../more.php?pagename={$_GET['pagename']}';</script>";
    exit();
}
?>



<!DOCTYPE html>
<html>
<head>
    <title><?php switch ($_GET["pagename"]) {
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
                echo "专家委员会";
                break;
        }
        ?></title>

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

<body>

<?php
include_once "../include/function.php";
$res = user_name_psw_check($_COOKIE['user_name'], $_COOKIE['user_password']);
if (isset($_SESSION['id']))
    include "include/header-login.php";
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
                                echo "专家委员会";
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
            <div class="right">
                <div class="right-title">
                    <p>
                        <?php
                        $page_name=$_GET["pagename"];
                        switch ($page_name) {
                            case "tongzhiwenjian":echo "通知文件";break;
                            case "youxiugongcheng":echo "优秀工程";break;
                            case "mojiegou":echo "膜结构";break;
                            case "wanggejiegou":echo "网格结构";break;
                            case "suojiegou":echo "索结构";break;
                            case "zhuanjia":echo "专家委员会";break;
                        }
                        ?>
                    </p>
                </div>
                <hr/>
                <br/>
                <div class="right-content">
                    <?php
                    $title = get_all_of_column_from_datatable_by_visibility('index_'.$page_name, 'title');
					$tongzhiwenjiantime = get_all_of_column_from_datatable_by_visibility('index_'.$page_name, 'time');
                    $id = get_all_of_column_from_datatable_by_visibility('index_'.$page_name, 'id');
                    $num = count($title);
                    for ($i = 0; $i <$num; $i++) {        
                     echo <<<EOD
	<table class="table no-border"style="margin-bottom:-10px;!import;" >					 
<tr class="no-border"><td class="no-border" colspan=10><p><a href="announcement_content.php?id=$id[$i]&&pagename=$page_name"class="tablelink">$title[$i]</a></p></td>
EOD;
if ($title[$i] and $page_name=="tongzhiwenjian")
	 $date=substr($tongzhiwenjiantime[$i],0,11);
echo <<<EOD
	<td class="text-center no-border" colspan=2>
<div class="hidden-xs" style="font-size:12px;float:right;"><p>$date</p></div>
	<div class="visible-xs" style="font-size:10px;float:right;"><p>$date</p></div>
</td>
	</tr>
	</table>
EOD;
						
                    }
                    ?>
                    <br>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include "include/footer.php";?>

</body>