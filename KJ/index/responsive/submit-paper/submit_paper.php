<?php
include_once "../include/function.php";
if(less_than_ie9()) {
    echo "<script language=javascript>location.href='../more.php?pagename={$_GET['pagename']}';</script>";
    exit();
}
//将文件的名字存入数据库，但是中文会乱码。
//为了防止用户使用不同的电脑上传，要判断客户的名字和论文名字，同事一致的话，也是和上面一样的操作。
?>
<!DOCTYPE html>
<html>
<head>
    <title>2017年年会投稿</title>

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
if ($res['user_name_psw_match'] == 'yes')
    include "include/header-login.php";
else
    include "include/header.php";
?>
<div class="container content-page-container">
 <div class="row parent">
        <div class="col-md-2 left-col">
            <div class="left">
                <div class="left-title hidden-xs">
                    <span>投稿系统</span>
                </div> </div></div>
				 <div class="col-md-10 right-col">
            <div class="right  " style="padding:0px 15px 20px 15px">
                <div class="right-title ">
                    <p>
                      欢迎您前来投稿，
					  请您填写以下信息<a href='update_paper.php'><small>（如果查看已上传的文件或者更改，请点击）</small></a>
                    </p>
                </div>
                <div class="right-content">
				


<form enctype='multipart/form-data' action='paperaction.php' method='post'>
  <div class="form-group">
  <label for="authorname">作者</label>
    <input type="text" class="form-control" name="authorname" id="authorname" placeholder="author">
  </div>
  <div class="form-group">
  <label for="papertitle">论文题目</label>
    <input type="text" class="form-control" name="papertitle" id="papertitle" placeholder="paper title">
  </div>
  <div class="form-group">
  <label for="correspondingauthor">通讯作者</label>
    <input type="text" class="form-control" name="correspondingauthor" id="correspondingauthor" placeholder="corresponding author">
  </div>
  <div class="form-group">
    <label for="email">邮箱</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="email">
  </div>
   <div class="form-group">
    <label for="tel">电话</label>
    <input type="tellphone" class="form-control" id="tel" name="tel" placeholder="tellphone">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">上传论文word版 </label>&nbsp &nbsp ||&nbsp&nbsp<a href="" style="font-color:#ccc">点击下载论文模板</a>
    <input type="file" id="file" name="file">
  </div>
  <div class="text-right">
  <button type="submit" class="btn btn-primary">提交</button>
  </div>
</form>
</div></div></div></body>
<?php include "include/footer.php";?>
</html>