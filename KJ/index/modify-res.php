<?php include_once 'include/function.php' ?>

<?php
if (less_than_ie9()) {
    echo "<script language=javascript>location.href='modify.php?id={$_GET['id']}&&pagename={$_GET['pagename']}';</script>";
    exit();
}
else {
    $id = $_GET['id'];
    $page_name = $_GET["pagename"];
    if(!$content = get_info_of_id_in_datatable($id, 'index_' . $page_name, 0)) {
        echo "<script language=javascript>alert('无此文件!');location.href='responsive/index.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>修改文件</title>

    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="responsive/css/header-rsp.css" rel="stylesheet">
    <link href="responsive/css/footer-rsp.css" rel="stylesheet">
    <link href="responsive/css/index-rsp.css" rel="stylesheet">
    <link href="responsive/css/content-page.css" rel="stylesheet">
    <link href="responsive/css/manage-page.css" rel="stylesheet">
    <LINK rel="shortcut icon" type="image/x-icon" href="image/favicon_2.ico" media="screen"/>

    <link href="/index/ueditor/themes/default/css/ueditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="/index/ueditor/third-party/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/index/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/index/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="/index/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script language="JavaScript">
        function goBack() {
            //获取当前URL
            var local_url = document.location.href;
            var get = local_url.indexOf("?");
            if (get == -1) {
                return false;
            }
            //截取字符串
            var get_par = local_url.slice(get + 1);
            location.href="responsive/announcement_content.php?"+get_par;
        }
    </script>


    <!-- Bootstrap -->
    <link href="responsive/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="responsive/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="responsive/bootstrap/js/bootstrap-filestyle.min.js"></script>

    <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
    <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
    <!--[if IE 9]>
    <script src="responsive/bootstrap/js/respond.min.js"></script>
    <script src="responsive/bootstrap/js/html5shiv.js"></script>
    <![endif]-->


</head>

<body>

<?php
include_once "include/function.php";
$res = user_name_psw_check($_COOKIE['user_name'], $_COOKIE['user_password']);
if ($res['user_name_psw_match'] == 'yes')
    include "responsive/include/header-login_manage.php";
else
    include "responsive/include/header_manage.php";
?>

<div class="container content-page-container">
    <div class="row parent">
        <div class="col-md-2 col-xs-12 left-col">
            <div class="left">
                <div class="left-title">
                    <span>修改文件</span>
                </div>
            </div>
        </div>
        <div class="col-md-10 col-xs-12 right-col">
            <div class="right manage-right">
                <form name="update" method="post" enctype="multipart/form-data" action="modify.php"
                      style="margin:0 0 0 0;">
                    <div class="form-group">
                        <label for="manage-class">文件类别:</label>
                        <select name="class" class="form-control">
                            <?php
                            switch ($page_name) {
                                case 'tongzhiwenjian':
                                    echo <<<EOD
                <option value="tongzhiwenjian" selected="selected">通知文件</option>
                <option value="youxiugongcheng">优秀工程</option>
                <option value="mojiegou">膜结构</option>
                <option value="wanggejiegou">网格结构</option>
                <option value="suojiegou">索结构</option>
                <option value="zhuanjia">专业组</option>
EOD;
                                    break;
                                case 'youxiugongcheng':
                                    echo <<<EOD
                <option value="tongzhiwenjian">通知文件</option>
                <option value="youxiugongcheng" selected="selected">优秀工程</option>
                <option value="mojiegou">膜结构</option>
                <option value="wanggejiegou">网格结构</option>
                <option value="suojiegou">索结构</option>
                <option value="zhuanjia">专业组</option>
EOD;
                                    break;
                                case 'mojiegou':
                                    echo <<<EOD
                <option value="tongzhiwenjian">通知文件</option>
                <option value="youxiugongcheng">优秀工程</option>
                <option value="mojiegou" selected="selected">膜结构</option>
                <option value="wanggejiegou">网格结构</option>
                <option value="suojiegou">索结构</option>
                <option value="zhuanjia">专业组</option>
EOD;
                                    break;
                                case 'wanggejiegou':
                                    echo <<<EOD
                <option value="tongzhiwenjian">通知文件</option>
                <option value="youxiugongcheng">优秀工程</option>
                <option value="mojiegou">膜结构</option>
                <option value="wanggejiegou" selected="selected">网格结构</option>
                <option value="suojiegou">索结构</option>
                <option value="zhuanjia">专业组</option>
EOD;
                                    break;
                                case 'suojiegou':
                                    echo <<<EOD
                <option value="tongzhiwenjian">通知文件</option>
                <option value="youxiugongcheng">优秀工程</option>
                <option value="mojiegou">膜结构</option>
                <option value="wanggejiegou">网格结构</option>
                <option value="suojiegou" selected="selected">索结构</option>
                <option value="zhuanjia">专业组</option>
EOD;
                                    break;
                         case 'zhuanjia':
                                    echo <<<EOD
                <option value="tongzhiwenjian">通知文件</option>
                <option value="youxiugongcheng">优秀工程</option>
                <option value="mojiegou">膜结构</option>
                <option value="wanggejiegou">网格结构</option>
                <option value="suojiegou">索结构</option>
                <option value="zhuanjia" selected="selected">专业组</option>
EOD;
                                    break;           
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="modify-title">标题:</label>
                        <input type="text" class="form-control" id="manage-title"
                                  name="title" value="<?php echo $content['title']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="modify-file-no">编号:</label>
                        <input type="text" class="form-control" id="modify-file-no"
                                  name="file_no" value="<?php echo $content['file_no']; ?>">
                    </div>
                    <div class="form-group">
                        <lable>正文:</lable>
                        <script type="text/plain" id="manage_right_publish_editor" class="manage-editor"
                                name="content">
                    <?php if ($content['content'] != "") echo $content['content']; ?>



                        </script>
                        <script type="text/javascript">
                            //实例化编辑器
                            // window.UMEDITOR_HOME_URL = "";
                            var um = UE.getEditor('manage_right_publish_editor',
                                {
                                    initialContent: '',
                                    imageUrl: "upimage.php", //处理图片上传的接口
                                    imagePath: "", //路径前缀
                                    imageFieldName: "image" //上传图片的表单的name
                                });

                        </script>
                    </div>
                    <div class="form-group">
                        <lable for="modify-end">作者:</lable>
                        <input name="end" class="form-control"
                                  id="modify-end" value="<?php echo $content['end']; ?>">
                    </div>
                    <div class="form-group">
                        <lable for="modify-date">日期:</lable>
                        <input class="form-control" id="modify-date"
                                  name="date" value="<?php echo $content['date']; ?>">
                    </div>
                    <div class="form-group">
                        <lable for="modify-file">添加附件:</
                        >
                        <input type="file" id="modify-file" class="filestyle" data-buttonBefore="true"
                               data-buttonText="选择文件" data-input="false" name="file[]" multiple>
                        <p class="help-block">按下Ctrl键选择多个附件</p>
                    </div>
                    <?php
                    if (!$content['file_dir'] == '' && !$content['file_name'] == '') {
                        $file_name = explode("|", $content["file_name"]);
                        $file_dir = explode("|", $content["file_dir"]);
                        $count = count($file_name);
                        echo "<div class=\"form-group\">";
                        echo "<lable>删除附件:</lable>";
                        for ($i = 0; $i < $count; $i++)
                            echo <<<EOD
                        <div class="checkbox-inline"><lable><input type="checkbox" name="file_delete[]" value="$i"/>
        <a href="download.php?file_name={$file_name[$i]}&file_dir={$file_dir[$i]}">{$file_name[$i]}</a></lable></div>
EOD;
                        echo "<p class=\"help-block\">选择以删除已上传附件</p></div>";
                    }
                    ?>
                    <button type="submit" class="btn btn-default">提交</button>
                    <input type="button"  class="btn btn-default" value="取消" onclick="goBack()"/>
                    <!--Send parameter to modify.php -->
                    <input type="hidden" value="<?php echo $id; ?>" name="id"/>
                    <input type="hidden" value="<?php echo $page_name; ?>" name="page_name"/>
                    <input type="hidden" value="<?php echo $content['file_name']; ?>" name="file_name"/>
                    <input type="hidden" value="<?php echo $content['file_dir']; ?>" name="file_dir"/>

                </form>

            </div>
        </div>
    </div>
</div>

<?php include "responsive/include/footer.php"; ?>

</body>
</html>