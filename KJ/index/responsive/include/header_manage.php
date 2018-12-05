
<form class="form-horizontal" role="form" action="login.php" method="post">
    <!-- 登录模态框（Modal） -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog"
         aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="loginModalLabel">
                        登录
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username" class="col-sm-4 control-label">用户名</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="username"
                                   name="user_name" placeholder="USERNAME">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-4 control-label">密码</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password" name="user_password"
                                   placeholder="PASSWORD">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">关闭
                    </button>
                    <button type="submit" class="btn btn-primary">
                        登录
                    </button>
                </div>
            </div>
        </div>
    </div><!-- /.modal-content -->
</form>


<form class="form-horizontal" role="form" action="register.php" method="post">
    <!-- 注册模态框（Modal） -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog"
         aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="registerModalLabel">
                        注册
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username_r" class="col-sm-4 control-label">用户名</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="username_r"
                                   name="user_name" placeholder="USERNAME">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_r" class="col-sm-4 control-label">密码</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password_r" name="user_password"
                                   placeholder="PASSWORD">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">邮箱</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email"
                                   placeholder="EMAIL">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="wechat" class="col-sm-4 control-label">微信</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="wechat" name="wechat"
                                   placeholder="WECHAT">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-4 control-label">身份</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="status" id="status">
                                <option value="1">企业</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">关闭
                    </button>
                    <button type="submit" class="btn btn-primary">
                        注册
                    </button>
                </div>
            </div>
        </div>
    </div><!-- /.modal-content -->
</form>

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
                <li>
                    <a data-toggle="modal" href="#loginModal">登录</a>
                </li>
                <li>
                    <a data-toggle="modal" href="#registerModal">注册</a>
                </li>
            </ul>
        </div>
    </div>
</div><!--title-->


<!--背景图-->
<div class="col-md-12" id="background-img">
    <img class="img-responsive hidden-xs" src="image/back2.jpg">
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
