<link href="css/sweetalert2.min.css" rel="stylesheet">
<form class="form-horizontal" role="form" action="../../login.php" method="post">
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


<form class="form-horizontal" role="form" action="../register.php" method="post">
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
                <img src="../image/logo.png"></div>
            <div class="visible-xs" id="navbar-logo-xs"><img src="../image/logo.png"></div>
            <a class="navbar-brand" href="index.php">空间结构分会</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="nav navbar-nav navbar-right">
               <!-- <li>
                   <a href="../../space2/login1.php">登录</a>
                </li> -->
                <li onclick="joinUs()" >
                   <a style="cursor:pointer">加入我们</a>
                </li>
                <li>
                    <a href="../../space2/login/index.html">登陆 / 注册</a>
                </li>
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
    <button type="button" id="menu-button" data-toggle="collapse" href="#nav-menu-xs" aria-expanded="false"
            aria-controls="collapseNavMenu">
        导航&nbsp;&#9776;
    </button>
    <ul class="nav nav-pills nav-stacked collapse" id="nav-menu-xs">
        <li><a href="index.php">首页</a></li>
        <li><a>关于分会  <span class="glyphicon glyphicon-plus" style="float:right"> </span></a>
            <div style="display:none"> <a href="fenhuijianjie.php">分会简介</a> <a href="fenhuijianzhang.php">分会简章</a> <a href="mishuchu.php">秘书处</a> <a href="member_units.php">会员单位名单</a> <a href="lishihui.php">理事会名单</a> </div>           
        </li>
        <li><a>专业组 <span class="glyphicon glyphicon-plus" style="float:right"> </span></a>
            <div style="display:none"> <a href="more.php?pagename=wanggejiegou">网格结构专业组</a> <a href="more.php?pagename=mojiegou">膜结构专业组</a> <a href="more.php?pagename=suojiegou">索结构专业组</a></div>    
        </li>
        <li><a href="firstexpertgroup.php">专家库</a></li>
        <li><a href="more.php?pagename=tongzhiwenjian">通知文件</a></li>
        <li><a href="index.php">简讯书刊</a></li>
        <li><a href="more.php?pagename=youxiugongcheng">空间结构奖</a></li>
        <li><a >培训或评审 <span class="glyphicon glyphicon-plus" style="float:right"> </span></a>
            <div style="display:none"> <a href="../../space2/index.php">膜结构项目经理</a> <a href="../../space2/index.php?nav1=6">膜结构等级会员评审</a> <a href="../../space2/index.php?nav1=7">膜结构等级会员复审</a><a href="../../space2/index.php">网格结构企业专项资质评审</a></div>    
        </li>
        <li><a href="http://www.cncscs.org/">协会首页</a></li>
    </ul>
</div>


<div>
    <hr class="header-hr visible-xs">
</div>


<!-- <div class="col-md-12 nav-menu-div-lg hidden-xs" id="nav-menu-lg">
    <ul class="nav nav-pills nav-justified">
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
</div> -->
<div class="col-md-12 nav-menu-div-lg hidden-xs" id="nav">
    <ul class="nav nav-pills nav-justified" id="supnav">
        <li><a href="index.php">首页</a></li>
        <li><a href='index.php'>关于分会</a>
            <div> <a href="fenhuijianjie.php">分会简介</a> <a href="fenhuijianzhang.php">分会简章</a> <a href="mishuchu.php">秘书处</a> <a href="member_units.php">会员单位名单</a> <a href="lishihui.php">理事会名单</a> </div>
        </li>
        <li><a href="index.php">专业组</a>
            <div> <a href="more.php?pagename=wanggejiegou">网格结构专业组</a> <a href="more.php?pagename=mojiegou">膜结构专业组</a> <a href="more.php?pagename=suojiegou">索结构专业组</a></div>    
        </li>
        <li><a href="firstexpertgroup.php">专家库</a></li>
        <li><a href="more.php?pagename=tongzhiwenjian">通知文件</a></li>
        <li><a href="index.php">简讯书刊</a></li>
        <li><a href="more.php?pagename=youxiugongcheng">空间结构奖</a></li>
        <li><a href="">培训或评审</a>
            <div> <a href="../../space2/index.php">膜结构项目经理</a> <a href="../../space2/index.php?nav1=6">膜结构等级会员评审</a><a href="../../space2/index.php?nav1=7">膜结构等级会员复审</a> <a href="../../space2/index.php">网格结构企业专项资质评审</a></div>    
        </li>
        <li><a href="http://www.cncscs.org/">协会首页</a></li>
    </ul>
</div>
<script type="text/javascript"  src="scripts/sweetalert2.min.js"></script>
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
   //手机端
   var list_xs = $('#nav-menu-xs li');
   for (var i = 0; i < list_xs.length; i++) {
        list_xs[i].index = i;
        list_xs[i].onclick = function(){
           var osubnav =  list_xs[this.index];
           var sublinks = osubnav.getElementsByTagName("div");
           var sublinks_a = osubnav.getElementsByTagName("span");
           if(sublinks.length!=0){
            if(sublinks[0].style.display == "block"){
                sublinks_a[0].classList.remove("glyphicon-minus");
                sublinks_a[0].classList.add("glyphicon-plus");
                sublinks[0].style.display = "none"
            }else if(sublinks[0].style.display == "none"){
                sublinks_a[0].classList.remove("glyphicon-plus");
                sublinks_a[0].classList.add("glyphicon-minus");
                sublinks[0].style.display = "block";
            }
           }
        }
   }
   function joinUs(){
    swal({
      title: `<h4 style='margin-top:20px'><strong>在中国钢结构协会空间结构分会简介</strong></h4>`,
      html:
       `<h5 style='text-align:left;line-height:22px'>
          &nbsp;&nbsp;&nbsp;&nbsp中国钢结构协会空间结构分会［英译名:China Association for Spatial Structure, China Steel Construction Society ，简写为CASS］成立于1993年11月，是空间结构行业的全国性专业协会，会员单位包括国内从事网格结构、索结构、张弦结构、膜结构及幕墙结构制作与安装的企业、与空间结构配套的板材、索具、节点及支座等相关生产企业以及从事空间结构的设计、科研单位和高等院校等。
          <br/>&nbsp;&nbsp;&nbsp;&nbsp分会成立多年来得到不断地发展，已拥有遍布全国各个省市的会员单位400余家，我国空间结构行业内的主要企业和有关单位大部分都是分会的成员，囊括了国内空间结构领域的专家、教授、高级工程师以及企业的高级管理人员与技术人员，使分会成为本行业的权威性社会团体。
          <br/>&nbsp;&nbsp;&nbsp;&nbsp本着为会员单位及行业发展服务的宗旨，分会积极开展以下六个方面工作：
          <br/>&nbsp;&nbsp;&nbsp;&nbsp 1）积极开展行业技术交流活动。每两年举办一次的技术交流大会和隔年举办的网格结构、膜结构、索结构专业技术研讨会都紧密结合行业发展的需要，交流空间结构在科研、设计与生产中的科技成果与先进经验；积极开展国际交流活动，邀请国际知名人士访问讲学、组织会员单位参加国际会议并进行技术考察。
          <br/>&nbsp;&nbsp;&nbsp;&nbsp 2）进行行业管理工作、推动技术进步。组织如《网架结构质量检验实施指南》、《膜结构技术规程》等相关行业标准的编制工作；开展空间结构新产品、新技术的开发、研究、推广及技术培训工作；开展膜结构等级会员评定，加强行业自律。
          <br/>&nbsp;&nbsp;&nbsp;&nbsp 3）开展“空间结构奖”评选活动，编印《大跨空间结构优秀工程汇编》，树立优秀工程样板，提高空间结构的设计与施工水平。
          <br/>&nbsp;&nbsp;&nbsp;&nbsp 4）加强与政府相关部门的沟通与协调，积极开展技术咨询，帮助会员单位解决实际问题，为会员单位提供服务。
          <br/>&nbsp;&nbsp;&nbsp;&nbsp 5）宣传并推广空间结构的应用，建设“中国空间结构”网站(www.cnass.org)，并与中国土木工程学会桥梁及结构工程分会空间结构委员会共同出版《空间结构简讯》。
          <br/>&nbsp;&nbsp;&nbsp;&nbsp 6）做好自身的组织建设工作，积极吸收从事空间结构行业的企事业单位入会。
          <br/>&nbsp;&nbsp;&nbsp;&nbsp 秘书处联系方式：
          <br/>&nbsp;&nbsp;&nbsp;&nbsp 地址：北京市朝阳区平乐园100号 （北工大西校区 建工楼0-203）
          <br/>&nbsp;&nbsp;&nbsp;&nbsp 邮编：100124
          <br/>&nbsp;&nbsp;&nbsp;&nbsp 单位：中国钢结构协会空间结构分会
          <br/>&nbsp;&nbsp;&nbsp;&nbsp 联系人：吴金志
          <br/>&nbsp;&nbsp;&nbsp;&nbsp 电话/传真：010-67391496
          <br/>&nbsp;&nbsp;&nbsp;&nbsp 手机：13910318715
          <br/>&nbsp;&nbsp;&nbsp;&nbsp E-mail:kongjian1993@126.com
        </h5>`,
  showCancelButton: true,
  cancelButtonText:'关闭',
  closeOnConfirm: false,
  confirmButtonText:'加入我们',
  }).then(function(data){
      if(data){
        window.location.href = '../../space2/login/index.html';
      }
  })
}
</script>

