

<?php
include_once '../include/function.php';
session_start();
if(less_than_ie9()) {
    echo "<script language=javascript>location.href='../fenhuijianzhang.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>分会简章</title>

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
        <div class="col-md-2 left-col">
            <div class="left">
                <div class="left-title">
                    <span>分会简章</span>
                </div>
            </div>
        </div>
        <div class="col-md-10 right-col">
            <div class="right">
                <div class="right-title">
                    <p><strong>中国钢结构协会空间结构工作条例</strong></p>
                </div>
                <hr/>
                <div class="right-content">
                    <p></p><p align="center" class="style2" style="margin-top: 1px; margin-bottom: 1px; font-size: 14px; line-height: 1.5; font-family: STHeiti; white-space: normal;"><strong>第一章 总 则</strong></p><p class="style1" style="margin-top: 1px; margin-bottom: 1px; font-size: 13px; line-height: 1.5; font-family: STHeiti; white-space: normal;"><strong>　　</strong></p><p class="style1" style="margin-top: 1px; margin-bottom: 1px; font-size: 13px; line-height: 1.5; font-family: STHeiti; white-space: normal;"><strong>　　第一条</strong>　名称&nbsp;<br>　　本分会的名称为：中国钢结构协会空间结构分会［英译名：Association for Spatial Structures, China Steel Construction Society，简写为CASS]。&nbsp;<br><strong>　　第二条</strong>　性质&nbsp;<br>　　中国钢结构协会空间结构分会由从事空间结构及其构配件的设计、研究、制造与安装的企、事业单位自愿组成，是中国钢结构协会下属的专业分会，在中华人民共和国民政部注册（社证字第 3047-14号）。&nbsp;<br><strong>　　第三条&nbsp;</strong>会徽&nbsp;<br>　　本会会徽由红黑两色造型组成一个空间结构的形象，黑色拱壳造型代表大跨度结构，红色尖塔代表空间结构的事业蒸蒸日上。同时，会徽中包含了CASS的字样。</p><p align="center" class="style1" style="margin-top: 1px; margin-bottom: 1px; font-size: 13px; line-height: 1.5; font-family: STHeiti; white-space: normal;"><img src="http://www.cncscs.org/kjjg/image/logo.jpg" width="150" height="103"></p><p class="style1" style="margin-top: 1px; margin-bottom: 1px; font-size: 13px; line-height: 1.5; font-family: STHeiti; white-space: normal;">　　</p><p style="margin-top: 1px; margin-bottom: 1px; font-family: STHeiti; font-size: medium; white-space: normal;">&nbsp;</p><p align="center" class="style1" style="margin-top: 1px; margin-bottom: 1px; font-size: 13px; line-height: 1.5; font-family: STHeiti; white-space: normal;"><span class="style2" style="font-size: 14px; line-height: 1.5;"><strong>第二章　职　责</strong></span></p><p class="style1" style="margin-top: 1px; margin-bottom: 1px; font-size: 13px; line-height: 1.5; font-family: STHeiti; white-space: normal;">&nbsp;</p><p class="style1" style="margin-top: 1px; margin-bottom: 1px; font-size: 13px; line-height: 1.5; font-family: STHeiti; white-space: normal;"><strong>　　第四条</strong>　本会的职责&nbsp;<br>　　1．充分发挥桥梁和纽带作用，深入开展行业调查研究，积极向有关政府部门反映行业情况，提出行业发展和技术经济政策等方面的意见和建议；&nbsp;<br>　　2．根据本行业国内外的发展动态，制定相应的技术措施，并积极组织或参与制订设计、制造和施工中所需要的行业标准，不断提高行业的生产技术水平，促进技术进步和行业发展；&nbsp;<br>　　3．开展技术咨询服务，提供国内外技术经济和市场信息，组织新技术的研究与新产品的开发，促进空间结构的推广应用；&nbsp;<br>　　4．为企业培训专业人员，组织工程技术人员的继续教育，促进全行业人员素质的提高；&nbsp;<br>　　5．开展技术交流活动，每两年举办一次全国性技术交流大会、隔年分别举办网格结构、膜结构以及索结构专业技术研讨会，交流空间结构在科研、设计与生产中的科技成果与先进经验，组织企业间的专业技术和经营管理等交流活动；&nbsp;<br>　　6．促进国际间有关空间结构的经济、技术合作与交流，组织参加国际科技学术活动及出国考察，邀请国外同行和专家、学者访问交流和讲学；&nbsp;<br>　　7．开展“空间结构奖”评选活动，树立优秀工程样板和推广先进技术，提高设计与施工水平；&nbsp;<br>　　8．开展行业管理工作，推行有利于质量管理的措施，加强行业自律，大力推行诚信建设；&nbsp;<br>　　9．宣传、普及空间结构知识，推广空间结构在国民经济各部门中的应用，举办展览、讲座，出版刊物；&nbsp;<br>　　10．依法开展有益于本行业的其它活动。</p><p class="style1" style="margin-top: 1px; margin-bottom: 1px; font-size: 13px; line-height: 1.5; font-family: STHeiti; white-space: normal;">&nbsp;</p><p align="center" class="style2" style="margin-top: 1px; margin-bottom: 1px; font-size: 14px; line-height: 1.5; font-family: STHeiti; white-space: normal;"><strong>第三章　会　员</strong></p><p class="style1" style="margin-top: 1px; margin-bottom: 1px; font-size: 13px; line-height: 1.5; font-family: STHeiti; white-space: normal;">&nbsp;</p><p class="style1" style="margin-top: 1px; margin-bottom: 1px; font-size: 13px; line-height: 1.5; font-family: STHeiti; white-space: normal;"><strong>　　第五条</strong>　本会实行团体会员制。凡承认本条例的有关生产、科研、设计、院校等企事业单位向本会提出申请，经常务理事会批准后即为本会团体会员，并颁发会员证书。&nbsp;<br><strong>　　第六条</strong>　会员的权利&nbsp;<br>　　1．本会的选举权、被选举权和表决权；&nbsp;<br>　　2．参加本会举办的各项活动，对本会工作有批评建议权和监督权；&nbsp;<br>　　3．优先享有本会提供的新技术、新材料以及情报资料和各种服务；&nbsp;<br>　　4．有退会的自由。&nbsp;<br><strong>　　第七条</strong>　会员的义务&nbsp;<br>　　1．遵守章程，执行本会的决议；&nbsp;<br>　　2．会员单位应指定一名代表保持与分会的联系；&nbsp;<br>　　3．会员单位的代表应积极组织本单位的相关人员参加本会的各项活动，完成本会委托的工作；&nbsp;<br>　　4．按时缴纳会费。&nbsp;<br><strong>　　第八条</strong>　会员退会应书面通知本会，并交回会员证书；会员如果连续二年不缴纳会费并不说明情况，或不参加本会活动的，视为自动退会。&nbsp;<br><strong>　　第九条</strong>　会员如有违法或严重违反本条例行为，经常务理事会表决通过，予以除名。</p><p class="style1" style="margin-top: 1px; margin-bottom: 1px; font-size: 13px; line-height: 1.5; font-family: STHeiti; white-space: normal;">&nbsp;</p><p align="center" class="style2" style="margin-top: 1px; margin-bottom: 1px; font-size: 14px; line-height: 1.5; font-family: STHeiti; white-space: normal;"><strong>第四章　组织机构</strong></p><p class="style1" style="margin-top: 1px; margin-bottom: 1px; font-size: 13px; line-height: 1.5; font-family: STHeiti; white-space: normal;"><br><strong>　　第十条</strong>　本会的领导机构是理事会，理事由团体会员单位推荐，经民主协商产生，每届任期四年，可以连任。理事会的职责是：&nbsp;<br>　　1．制定和修改本会工作条例；&nbsp;<br>　　2．决定本会的工作方针和任务，审定本会的工作计划和工作报告；&nbsp;<br>　　3．审查本会经费收支情况。&nbsp;<br><strong>　　第十一条</strong>　本会设立常务理事会，常务理事由理事会选举产生，并在理事会闭会期间行使理事会的全部职权。常务理事会每年至少召开一次，讨论、制订本会年度工作计划，检查各委员会和秘书处工作等，每年向理事会汇报工作并征求意见和建议。&nbsp;<br><strong>　　第十二条</strong>　本会设理事长一名，副理事长若干名，由常务理事会选举产生。&nbsp;<br><strong>　　第十三条</strong>　本会聘任名誉理事长和高级顾问，名誉理事长和高级顾问可以列席常务理事会。&nbsp;<br><strong>　　第十四条</strong>　本会设秘书处，由秘书长、副秘书长和秘书若干名组成。在理事长领导下处理本会的日常事物，秘书长、副秘书长由理事长提名经常务理事会讨论通过、任命。&nbsp;<br><strong>　　第十五条</strong>　本会理事长行使下列职权：&nbsp;<br>　　1．召集和主持理事会、常务理事会；&nbsp;<br>　　2．检查理事会、常务理事会决议落实的情况；&nbsp;<br>　　3．代表本会签署重要文件。&nbsp;<br><strong>　　第十六条</strong>　本会秘书长行使下列职权：&nbsp;<br>　　1．主持秘书处开展日常工作，组织实施本会的年度工作计划；&nbsp;<br>　　2．组织本会理事会、常务理事会的召开；&nbsp;<br>　　3．处理其它日常事务。&nbsp;<br><strong>　　第十七条</strong> 根据行业发展需要，本会下设专业委员会，在分会的领导下开展活动，分会秘书处安排专人担任专业委员会秘书。&nbsp;<br><strong>　　第十八条&nbsp;</strong>专业委员会应根据本条例制定相应《工作细则》，通过民主选举产生正副主任委员，主任委员应由一名分会常务理事担任，报分会常务理事会批准。专业委员会每年至少召开一次工作会议，研讨本专业领域的技术问题和行业管理工作，并组织专题性技术交流会。委员会的年度工作计划报分会常务理事会批准，活动经费由分会统一支出。</p><p class="style1" style="margin-top: 1px; margin-bottom: 1px; font-size: 13px; line-height: 1.5; font-family: STHeiti; white-space: normal;">&nbsp;</p><p align="center" class="style2" style="margin-top: 1px; margin-bottom: 1px; font-size: 14px; line-height: 1.5; font-family: STHeiti; white-space: normal;"><strong>第五章　经费及财务管理</strong></p><p class="style1" style="margin-top: 1px; margin-bottom: 1px; font-size: 13px; line-height: 1.5; font-family: STHeiti; white-space: normal;">&nbsp;</p><p class="style1" style="margin-top: 1px; margin-bottom: 1px; font-size: 13px; line-height: 1.5; font-family: STHeiti; white-space: normal;"><strong>　　第十九条</strong> 本会的经费来源有：团体会员会费；本会举办的各项技术服务和技术咨询、业务培训、出版资料等收入；政府有关部门和企业给予的资助；个人自愿捐款；其他合法收入。&nbsp;<br><strong>　　第二十条</strong> 经费支出包括：开展有关行业活动所需开支；解决必要的办公条件和聘任工作人员所需支出；本会工作人员为开展工作的差旅费用；邀请国内外专家、学者进行咨询、讲学的付酬以及刊物出版、通讯、资料费用等。&nbsp;<br><strong>　　第二十一条</strong>　本会的经费存于挂靠单位，并建立严格的财务管理制度，保证会计资料合法、完整。挂靠单位对本会的经费保证专款专用，并指定由本会理事长和秘书长支配，用于本会的各项合理开支。</p><p class="style1" style="margin-top: 1px; margin-bottom: 1px; font-size: 13px; line-height: 1.5; font-family: STHeiti; white-space: normal;">&nbsp;</p><p align="center" class="style2" style="margin-top: 1px; margin-bottom: 1px; font-size: 14px; line-height: 1.5; font-family: STHeiti; white-space: normal;"><strong>第六章　附　则</strong></p><p class="style1" style="margin-top: 1px; margin-bottom: 1px; font-size: 13px; line-height: 1.5; font-family: STHeiti; white-space: normal;"><br><strong>　　第二十二条</strong> 本会条例的修改权及解释权属理事会。&nbsp;<br><strong>　　第二十三条</strong> 本会条例从会员代表大会通过之日起生效。</p><p><br></p><p></p>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include "include/footer.php";?>

</body>