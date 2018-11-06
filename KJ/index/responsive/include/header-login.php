

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
                <img src="../image/logo.png"></div>
            <div class="visible-xs" id="navbar-logo-xs"><img src="../image/logo.png"></div>
            <a class="navbar-brand" href="index.php">空间结构分会</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php
                error_reporting(0);
				session_start();
                include_once "../include/function.php";
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
";
					} 
				}else{
                    echo"
                    <li>
                        <a href='../../space2/login1.php'>登录</a>
                    </li>
                    <li>
                       <a href='../../space2/regist.php'>注册</a>
                    </li>
    ";
                }
                    

                ?>
            </ul>
        </div>
    </div>
</div><!--title-->


<!--背景图-->
<div class="col-md-12" id="background-img">
    <img class="img-responsive hidden-xs" src="../image/background.png">
    <img class="img-responsive visible-xs" src="../image/background_xs.png">
</div>


<!--导航栏-->
<div class="col-md-12 nav-menu-div-xs visible-xs">
    <button type="button" id="menu-button" data-toggle="collapse" href="#nav-menu-xs" aria-expanded="false" aria-controls="collapseNavMenu">
        导航&nbsp;&#9776;
    </button>
    <ul class="nav nav-pills nav-stacked collapse" id="nav-menu-xs">
        <li><a href="index.php">分会首页</a></li>
        <li><a href="fenhuijianjie.php">分会简介</a></li>
        <li><a href="../member_apply.php">入会申请</a></li>
        <li><a href="more.php?pagename=tongzhiwenjian">通知文件</a></li>
        <li><a href="more.php?pagename=mojiegou">膜结构</a></li>
        <li><a href="more.php?pagename=wanggejiegou">网格结构</a></li>
        <li><a href="more.php?pagename=suojiegou">索结构</a></li>
        <li><a href="more.php?pagename=youxiugongcheng">优秀工程</a></li>
        <li><a href="#">简讯书刊</a></li>
        <li><a href="#">审批</a></li>
        <li><a href="http://www.cncscs.org/">协会首页</a></li>
    </ul>
</div>


<div><hr class="header-hr visible-xs"></div>

<div class="col-md-12 nav-menu-div-lg hidden-xs" id="nav">
<ul class="nav nav-pills nav-justified" id="supnav">
        <li><a href="index.php">首页</a></li>
        <li><a href='index.php'></a>
            <div> <a href="fenhuijianjie.php">分会简介</a> <a href="fenhuijianzhang.php">分会简章</a> <a href="mishuchu.php">秘书处</a> <a href="member_units.php">会员单位名单</a> <a href="lishihui.php">理事会名单</a> </div>
        </li>
        <li><a href="index.php">专业组</a>
            <div> <a href="more.php?pagename=wanggejiegou">网格结构专业组</a> <a href="more.php?pagename=mojiegou">膜结构专业组</a> <a href="more.php?pagename=suojiegou">索结构专业组</a></div>    
        </li>
        <li><a href="index.php">专家库</a></li>
        <li><a href="more.php?pagename=tongzhiwenjian">通知文件</a></li>
        <li><a href="index.php">简讯书刊</a></li>
        <li><a href="more.php?pagename=youxiugongcheng">空间结构奖</a></li>
        <li><a href="">培训或评审</a>
            <div> <a href="../../space2/index.php">膜结构项目经理</a> <a href="../../space2/index.php">膜结构等级会员评审</a> <a href="../../space2/index.php">网格结构企业专项资质评审</a></div>    
        </li>
        <li><a href="http://www.cncscs.org/">协会首页</a></li>
    </ul>
</div>
<script>
   var list = $('#supnav li');
   for (var i = 0; i < list.length; i++) {
        list[i].index = i;
        list[i].onmouseover = function(){
           var osubnav =  list[this.index];
           var sublinks = osubnav.getElementsByTagName("div");
           if(sublinks.length!=0){
            sublinks[0].style.display = "block";
           }
        }
        list[i].onmouseout = function(){
           var osubnav =  list[this.index];
           var sublinks = osubnav.getElementsByTagName("div");
           if(sublinks.length!=0){
            sublinks[0].style.display="none";
           }
        }
    
   }
</script>