

<!--标题栏-->
<div class="navbar navbar-default navbar-fixed-top" id="navbar-title">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="hidden-xs" id="navbar-logo-lg">
                <img src="image/logo.png"></div>
            <div class="visible-xs" id="navbar-logo-xs"><img src="image/logo.png"></div>
            <a class="navbar-brand" href="responsive/index.php">空间结构分会</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php
				session_start();
                include_once "include/function.php";
                 if (isset($_SESSION['username']))
				{
                    if ($_SESSION['category'] == '5') {
                        echo"
                        <li class='dropdown'>
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>欢迎您,{$_SESSION['username']}<span class='caret'></span></a>
          <ul class='dropdown-menu'>
            <li><a href='../manage-res.php'>发布通知</a></li>
            <li role='separator' class='divider'></li>
            <li><a href='../../space2/index.php?nav1=10'>后台管理</a></li>
            <li role='separator' class='divider'></li>
            <li><a href='../logout.php'>退出</a></li>
          </ul>
        </li>";}
                   
                    else{
                       echo "
                  <li class='dropdown'>
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>欢迎您,{$_SESSiON['username']}<span class='caret'></span></a>
          <ul class='dropdown-menu'>
		   <li role='separator' class='divider'></li>
            <li><a href='../../space2/index.php'>后台管理</a></li>
            <li><a href='../logout.php'>退出</a></li>
          </ul>
        </li>
";}
		}
				else{
                    echo"
                <li>
                    <a href='../../space2/login1.php'>登录</a>
                </li>
                <li>
                   <a href='../../space2/regist.php'>注册</a>
                </li>
";}

                ?>
            </ul>
        </div>
    </div>
</div><!--title-->


<!--背景图-->
<div class="col-md-12" id="background-img">
    <img class="img-responsive hidden-xs" src="image/back1.jpg">
    <img class="img-responsive visible-xs" src="image/back2_xs.jpg">
</div>


<!--导航栏-->
<div class="col-md-12 nav-menu-div-xs visible-xs">
    <button type="button" id="menu-button" data-toggle="collapse" href="#nav-menu-xs" aria-expanded="false" aria-controls="collapseNavMenu">
        导航&nbsp;&#9776;
    </button>
    <ul class="nav nav-pills nav-stacked collapse" id="nav-menu-xs">
        <li><a href="responsive/index.php">分会首页</a></li>
        <li><a href="responsive/fenhuijianjie.php">分会简介</a></li>
        <li><a href="/index/member_apply.php">入会申请</a></li>
        <li><a href="responsive/more.php?pagename=tongzhiwenjian">通知文件</a></li>
        <li><a href="responsive/more.php?pagename=mojiegou">膜结构</a></li>
        <li><a href="responsive/more.php?pagename=wanggejiegou">网格结构</a></li>
        <li><a href="responsive/more.php?pagename=suojiegou">索结构</a></li>
        <li><a href="responsive/more.php?pagename=youxiugongcheng">优秀工程</a></li>
        <li><a href="#">简讯书刊</a></li>
        <li><a href="#">审批</a></li>
        <li><a href="http://www.cncscs.org/">协会首页</a></li>
    </ul>
</div>

<div><hr class="header-hr visible-xs"></div>

<div class="col-md-12 nav-menu-div-lg hidden-xs" id="nav-menu-lg">
    <ul class="nav nav-pills nav-justified">
        <li><a href="responsive/index.php">分会首页</a></li>
        <li><a href="responsive/fenhuijianjie.php">分会简介</a></li>
        <li><a href="/index/member_apply.php">入会申请</a></li>
        <li><a href="responsive/more.php?pagename=tongzhiwenjian">通知文件</a></li>
        <li><a href="responsive/more.php?pagename=mojiegou">膜结构</a></li>
        <li><a href="responsive/more.php?pagename=wanggejiegou">网格结构</a></li>
        <li><a href="responsive/more.php?pagename=suojiegou">索结构</a></li>
        <li><a href="responsive/more.php?pagename=youxiugongcheng">优秀工程</a></li>
        <li><a href="#">简讯书刊</a></li>
        <li><a href="#">审批</a></li>
        <li><a href="http://www.cncscs.org/">协会首页</a></li>
    </ul>
</div>
