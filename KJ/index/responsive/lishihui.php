

<?php
include_once '../include/function.php';
session_start();
if(less_than_ie9()) {
    echo "<script language=javascript>location.href='../lishihui.php';</script>";
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>理事会</title>

    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/header-rsp.css" rel="stylesheet">
    <link href="css/footer-rsp.css" rel="stylesheet">
    <link href="css/index-rsp.css" rel="stylesheet">
    <link href="css/content-page.css" rel="stylesheet">
    <LINK rel="hortcut icon" type="image/x-icon" href="../image/favicon_2.ico" media="screen"/>


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
                    <span>理事会名单</span>
                </div>
            </div>
        </div>
        <div class="col-md-10 right-col">
            <div class="right">
                <div class="right-title">
                    <p><strong>中国钢结构协会空间结构分会第六届理事会名单</strong></p>
                </div>
                <hr/>
                <div class="right-content">
                    <table class="content-table" border="0" cellpadding="0" cellspacing="0" align="center" >
                        <tbody><tr>
                            <td width="8.8%" height="30"><p align="center"><strong>序号 </strong></p></td>
                            <td width="50.7%"><p align="center"><strong>单位 </strong></p></td>
                            <td width="11.5%"><p align="center"><strong>代表人 </strong></p></td>
                            <td width="16.2%"><p align="center"><strong>职务 </strong></p></td>
                            <td width="12.9%"><p align="center"><strong>分会职务 </strong></p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">1</p></td>
                            <td width="50.7%"><p align="left">北京工业大学 </p></td>
                            <td width="11.5%"><p align="center">薛素铎 </p></td>
                            <td width="16.2%"><p align="center">院长 </p></td>
                            <td width="12.9%"><p align="center">理事长 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">2</p></td>
                            <td width="50.7%"><p align="left">上海现代建筑设计（集团）有限公司 </p></td>
                            <td width="11.5%"><p align="center">杨联萍 </p></td>
                            <td width="16.2%"><p align="center">党委副书记 </p></td>
                            <td width="12.9%"><p align="center">副理事长 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">3</p></td>
                            <td width="50.7%"><p align="left">浙江东南网架股份有限公司 </p></td>
                            <td width="11.5%"><p align="center">周观根 </p></td>
                            <td width="16.2%"><p align="center">总工程师 </p></td>
                            <td width="12.9%"><p align="center">副理事长 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">4</p></td>
                            <td width="50.7%"><p align="left">长江精工钢结构（集团）股份有限公司 </p></td>
                            <td width="11.5%"><p align="center">陈国栋 </p></td>
                            <td width="16.2%"><p align="center">联席总裁 </p></td>
                            <td width="12.9%"><p align="center">副理事长 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">5</p></td>
                            <td width="50.7%"><p align="left">江苏沪宁钢机股份有限公司 </p></td>
                            <td width="11.5%"><p align="center">高继领 </p></td>
                            <td width="16.2%"><p align="center">总工程师 </p></td>
                            <td width="12.9%"><p align="center">副理事长 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">6</p></td>
                            <td width="50.7%"><p align="left">北京市机械施工有限公司 </p></td>
                            <td width="11.5%"><p align="center">王小瑞 </p></td>
                            <td width="16.2%"><p align="center">总工程师 </p></td>
                            <td width="12.9%"><p align="center">副理事长 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">7</p></td>
                            <td width="50.7%"><p align="left">北京纽曼帝莱蒙膜建筑技术有限公司 </p></td>
                            <td width="11.5%"><p align="center">黄达达 </p></td>
                            <td width="16.2%"><p align="center">董事长 </p></td>
                            <td width="12.9%"><p align="center">副理事长 </p></td>
                        </tr>
                        <tr>
                            <td class="content-table" height="30" colspan="5"><p align="left"><strong>以下按常务理事、理事的姓名拼音排序 </strong></p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">8</p></td>
                            <td width="50.7%"><p align="left">广东坚朗五金制品股份有限公司 </p></td>
                            <td width="11.5%"><p align="center">白宝萍 </p></td>
                            <td width="16.2%"><p align="center">副总裁 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">9</p></td>
                            <td width="50.7%"><p align="left">常州钢构建设工程有限公司 </p></td>
                            <td width="11.5%"><p align="center">蔡小平 </p></td>
                            <td width="16.2%"><p align="center">总工程师 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">10</p></td>
                            <td width="50.7%"><p align="left">中国建筑西南设计研究院有限公司 </p></td>
                            <td width="11.5%"><p align="center">陈文明 </p></td>
                            <td width="16.2%"><p align="center">五院总工 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">11</p></td>
                            <td width="50.7%"><p align="left">空间结构分会索结构专业组 </p></td>
                            <td width="11.5%"><p align="center">陈志华 </p></td>
                            <td width="16.2%"><p align="center">主任委员 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">12</p></td>
                            <td width="50.7%"><p align="left">浙江大学 </p></td>
                            <td width="11.5%"><p align="center">高博青 </p></td>
                            <td width="16.2%"><p align="center">教授 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">13</p></td>
                            <td width="50.7%"><p align="left">华诚博远（北京）建筑规划设计有限公司 </p></td>
                            <td width="11.5%"><p align="center">耿笑冰 </p></td>
                            <td width="16.2%"><p align="center">总工程师 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">14</p></td>
                            <td width="50.7%"><p align="left">天津大学 </p></td>
                            <td width="11.5%"><p align="center">韩庆华 </p></td>
                            <td width="16.2%"><p align="center">教授 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">15</p></td>
                            <td width="50.7%"><p align="left">中国建筑科学研究院 </p></td>
                            <td width="11.5%"><p align="center">郝成新 </p></td>
                            <td width="16.2%"><p align="center">教授级高工 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">16</p></td>
                            <td width="50.7%"><p align="left">陕西建工机械施工集团有限公司 </p></td>
                            <td width="11.5%"><p align="center">李存良 </p></td>
                            <td width="16.2%"><p align="center">总工 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">17</p></td>
                            <td width="50.7%"><p align="left">江苏维凯科技股份有限公司 </p></td>
                            <td width="11.5%"><p align="center">李凯 </p></td>
                            <td width="16.2%"><p align="center">总经理 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">18</p></td>
                            <td width="50.7%"><p align="left">山西汾阳网架建设有限公司 </p></td>
                            <td width="11.5%"><p align="center">李明荣 </p></td>
                            <td width="16.2%"><p align="center">董事长 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">19</p></td>
                            <td width="50.7%"><p align="left">北京中天久业膜建筑技术有限公司 </p></td>
                            <td width="11.5%"><p align="center">李中立 </p></td>
                            <td width="16.2%"><p align="center">董事长 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">20</p></td>
                            <td width="50.7%"><p align="left">上海宝冶集团有限公司钢结构分公司 </p></td>
                            <td width="11.5%"><p align="center">罗兴隆 </p></td>
                            <td width="16.2%"><p align="center">设计院院长 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">21</p></td>
                            <td width="50.7%"><p align="left">上海太阳膜结构有限公司 </p></td>
                            <td width="11.5%"><p align="center">唐泽靖子 </p></td>
                            <td width="16.2%"><p align="center">总经理 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">22</p></td>
                            <td width="50.7%"><p align="left">北京市建筑工程研究院有限责任公司 </p></td>
                            <td width="11.5%"><p align="center">王丰 </p></td>
                            <td width="16.2%"><p align="center">副总工程师 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">23</p></td>
                            <td width="50.7%"><p align="left">柯沃泰膜结构（上海）有限公司 </p></td>
                            <td width="11.5%"><p align="center">王海明 </p></td>
                            <td width="16.2%"><p align="center">总工 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">24</p></td>
                            <td width="50.7%"><p align="left">巨力索具股份有限公司 </p></td>
                            <td width="11.5%"><p align="center">王杰 </p></td>
                            <td width="16.2%"><p align="center">常务副总裁 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">25</p></td>
                            <td width="50.7%"><p align="left">北京今腾盛膜结构技术有限公司 </p></td>
                            <td width="11.5%"><p align="center">王平 </p></td>
                            <td width="16.2%"><p align="center">董事长 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">26</p></td>
                            <td width="50.7%"><p align="left">沈阳远大铝业工程有限公司 </p></td>
                            <td width="11.5%"><p align="center">王双军 </p></td>
                            <td width="16.2%"><p align="center">副总裁 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">27</p></td>
                            <td width="50.7%"><p align="left">兰州理工大学 </p></td>
                            <td width="11.5%"><p align="center">王秀丽 </p></td>
                            <td width="16.2%"><p align="center">教授 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">28</p></td>
                            <td width="50.7%"><p align="left">清华大学 </p></td>
                            <td width="11.5%"><p align="center">王元清 </p></td>
                            <td width="16.2%"><p align="center">教授 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">29</p></td>
                            <td width="50.7%"><p align="left">北京思博福瑞空间结构技术有限公司 </p></td>
                            <td width="11.5%"><p align="center">向阳 </p></td>
                            <td width="16.2%"><p align="center">总经理 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">30</p></td>
                            <td width="50.7%"><p align="left">开封天元网架工程有限公司 </p></td>
                            <td width="11.5%"><p align="center">薛海滨 </p></td>
                            <td width="16.2%"><p align="center">董事长 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">31</p></td>
                            <td width="50.7%"><p align="left">同济大学 </p></td>
                            <td width="11.5%"><p align="center">张其林 </p></td>
                            <td width="16.2%"><p align="center">教授 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">32</p></td>
                            <td width="50.7%"><p align="left">哈尔滨工业大学 </p></td>
                            <td width="11.5%"><p align="center">支旭东 </p></td>
                            <td width="16.2%"><p align="center">教授 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">33</p></td>
                            <td width="50.7%"><p align="left">徐州飞虹网架建设有限公司 </p></td>
                            <td width="11.5%"><p align="center">钟宪华 </p></td>
                            <td width="16.2%"><p align="center">教授级高工 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">34</p></td>
                            <td width="50.7%"><p align="left">中国航空规划建设发展有限公司 </p></td>
                            <td width="11.5%"><p align="center">朱丹 </p></td>
                            <td width="16.2%"><p align="center">顾问 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">35</p></td>
                            <td width="50.7%"><p align="left">北京市建筑设计研究院空间结构室 </p></td>
                            <td width="11.5%"><p align="center">朱忠义 </p></td>
                            <td width="16.2%"><p align="center">副院长 </p></td>
                            <td width="12.9%"><p align="center">常务理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">36</p></td>
                            <td width="50.7%"><p align="left">威海中林网架钢构工程有限公司 </p></td>
                            <td width="11.5%"><p align="center">毕务瑚 </p></td>
                            <td width="16.2%"><p align="center">董事长 </p></td>
                            <td width="12.9%"><p align="center">理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">37</p></td>
                            <td width="50.7%"><p align="left">杭州奥特膜结构有限公司 </p></td>
                            <td width="11.5%"><p align="center">曹正良 </p></td>
                            <td width="16.2%"><p align="center">总经理 </p></td>
                            <td width="12.9%"><p align="center">理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">38</p></td>
                            <td width="50.7%"><p align="left">建设部标准定额研究所 </p></td>
                            <td width="11.5%"><p align="center">陈国义 </p></td>
                            <td width="16.2%"><p align="center">处长 </p></td>
                            <td width="12.9%"><p align="center">理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">39</p></td>
                            <td width="50.7%"><p align="left">深圳市三鑫膜结构有限公司 </p></td>
                            <td width="11.5%"><p align="center">陈龙 </p></td>
                            <td width="16.2%"><p align="center">总经理 </p></td>
                            <td width="12.9%"><p align="center">理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">40</p></td>
                            <td width="50.7%"><p align="left">上海交通大学 </p></td>
                            <td width="11.5%"><p align="center">陈务军 </p></td>
                            <td width="16.2%"><p align="center">教授 </p></td>
                            <td width="12.9%"><p align="center">理事 </p></td>
                        </tr>
                        <tr>
                            <td width="8.8%" height="30"><p align="center">41</p></td>
                            <td width="50.7%"><p align="left">上海壹凌实业有限公司 </p></td>
                            <td width="11.5%"><p align="center">陈艳 </p></td>
                            <td width="16.2%"><p align="center">总经理 </p></td>
                            <td width="12.9%"><p align="center">理事 </p></td>
                        </tr>
                        </tbody></table>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include "include/footer.php";?>

</body>