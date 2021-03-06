

<?php include_once '../include/function.php' ?>

<?php
if(less_than_ie9()) {
    echo "<script language=javascript>location.href='../manage.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>发布通知</title>

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
    <link href="css/manage-page.css" rel="stylesheet">
    <LINK rel="shortcut icon" type="image/x-icon" href="../image/favicon_2.ico" media="screen"/>

    <link href="/index/ueditor/themes/default/css/ueditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="/index/ueditor/third-party/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/index/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/index/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="/index/ueditor/lang/zh-cn/zh-cn.js"></script>


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
if ($res['user_name_psw_match'] == 'yes')
    include "include/header-login.php";
else
    include "include/header.php";
?>

<div class="container content-page-container">
    <div class="row parent">
        <div class="col-md-2 col-xs-12 left-col">
            <div class="left">
                <div class="left-title">
                    <span>发布通知</span>
                </div>
            </div>
        </div>
        <div class="col-md-10 col-xs-12 right-col">
            <div class="right manage-right">
                <form name="index_update" method="post" enctype="multipart/form-data" action="../updata.php"
                      style="margin:0 0 0 0;">
                    <div class="form-group">
                        <label for="manage-class">文件类别:</label>
                        <select name="class" class="form-control">
                            <option value="index_tongzhiwenjian" id="manage-class">通知文件</option>
                            <option value="index_youxiugongcheng">优秀工程</option>
                            <option value="index_mojiegou">膜结构</option>
                            <option value="index_wanggejiegou">网格结构</option>
                            <option value="index_suojiegou">索结构</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="manage-title">标题</label>
                        <input type="text" class="form-control" id="manage-title" placeholder="标题" name="title">
                    </div>
                    <div class="form-group">
                        <label for="manage-file-no">编号</label>
                        <input type="text" class="form-control" id="manage-file-no" placeholder="编号" name="file_no">
                    </div>
                    <div>
                        <label>正文</label>
                        <script type="text/plain" id="manage_right_publish_editor" class="manage-editor"
                                name="content">
                </script>
                        <script type="text/javascript">
                            //实例化编辑器
                            // window.UMEDITOR_HOME_URL = "";
                            var um = UM.getEditor('manage_right_publish_editor',
                                {
                                    initialContent: '',
                                    imageUrl: "../upimage.php", //处理图片上传的接口
                                    imagePath: "", //路径前缀
                                    imageFieldName: "image" //上传图片的表单的name
                                });

                        </script>
                    </div>
                    <div class="form-group">
                        <label for="manage-end">作者</label>
                        <input type="text" class="form-control" id="manage-end" placeholder="作者" name="end">
                    </div>
                    <div class="form-group">
                        <label for="manage-date">日期</label>
                        <input type="text" class="form-control" id="manage-date" placeholder="日期" name="date">
                    </div>
                    <div class="form-group">
                        <label for="manage-file">上传附件</label>
                        <input type="file" id="manage-file" name="file[]" multiple>
                        <p class="help-block">按下Ctrl键以上传多个附件</p>
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div>
        </div>

    </div>
</div>

<?php include "include/footer.php"; ?>

</body>