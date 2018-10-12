

<?php
include_once '../include/function.php';
session_start();
if(less_than_ie9()) {
    echo "<script language=javascript>location.href='../fenhuijianjie.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>分会简介</title>

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
                    <span>分会简介</span>
                </div>
            </div>
        </div>
        <div class="col-md-10 right-col">
            <div class="right">
                <div class="right-title">
                    <p><strong>中国钢结构协会空间结构分会简介</strong></p>
                </div>
                <hr/>
                <div class="right-content">
                    <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp中国钢结构协会空间结构分会［英译名:China Association for Spatial Structure, China Steel Construction Society ，简写为CASS］成立于1993年11月，是空间结构行业的全国性专业协会，会员单位包括国内从事网格结构、索结构、张弦结构、膜结构及幕墙结构制作与安装的企业、与空间结构配套的板材、索具、节点及支座等相关生产企业以及从事空间结构的设计、科研单位和高等院校等。<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp分会成立多年来得到不断地发展，已拥有遍布全国各个省市的会员单位400余家，我国空间结构行业内的主要企业和有关单位大部分都是分会的成员，囊括了国内空间结构领域的专家、教授、高级工程师以及企业的高级管理人员与技术人员，使分会成为本行业的权威性社会团体。<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp本着为会员单位及行业发展服务的宗旨，分会积极开展以下六个方面工作：<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp1）积极开展行业技术交流活动。每两年举办一次的技术交流大会和隔年举办的网格结构、膜结构、索结构专业技术研讨会都紧密结合行业发展的需要，交流空间结构在科研、设计与生产中的科技成果与先进经验；积极开展国际交流活动，邀请国际知名人士访问讲学、组织会员单位参加国际会议并进行技术考察。<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp2）进行行业管理工作、推动技术进步。组织如《网架结构质量检验实施指南》、《膜结构技术规程》等相关行业标准的编制工作；开展空间结构新产品、新技术的开发、研究、推广及技术培训工作；开展膜结构等级会员评定，加强行业自律。<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp3）开展“空间结构奖”评选活动，编印《大跨空间结构优秀工程汇编》，树立优秀工程样板，提高空间结构的设计与施工水平。<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp4）加强与政府相关部门的沟通与协调，积极开展技术咨询，帮助会员单位解决实际问题，为会员单位提供服务。<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp5）宣传并推广空间结构的应用，建设“中国空间结构”网站(www.cnass.org)，并与中国土木工程学会桥梁及结构工程分会空间结构委员会共同出版《空间结构简讯》。<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp6）做好自身的组织建设工作，积极吸收从事空间结构行业的企事业单位入会。<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp秘书处联系方式：<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp地址：北京市朝阳区平乐园100号 （北工大西校区 建工楼0-203）<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp邮编：100124<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp单位：中国钢结构协会空间结构分会<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp联系人：吴金志<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp电话/传真：010-67391496<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp手机：13910318715<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspE-mail:kongjian1993@126.com
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include "include/footer.php";?>

</body>