<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php include_once 'include/function.php' ?>
<?php
if(!less_than_ie9()) {
    echo "<script language=javascript>location.href='responsive/pingshenbanfa.php';</script>";
    exit();
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <meta name="renderer" content="webkit">
    <meta content="telephone=no" name="format-detection">
    <title>空间结构分会-理事会名单</title>
    <LINK href=css/style.css rel=stylesheet>
    <LINK href=css/footer.css rel=stylesheet>
    <LINK href=css/header.css rel=stylesheet>
    <LINK href=css/general.css rel=stylesheet>
    <LINK rel="shortcut icon" type="image/x-icon" href="image/favicon_2.ico" media="screen"/>
    <script src="./js/javascript.js" type="text/javascript" charset="GB2312"></script>
</head>

<body>
<?php include 'include/header.php' ?>
<?php
$res = user_name_psw_check($_COOKIE['user_name'], $_COOKIE['user_password']);
if ($res['user_name_psw_match'] == 'yes')
    if ($res['user_is_manager'] == 'yes') {
        echo <<<EOD
<div id="header_login" align="right">
        <a href="#">欢迎你，{$_COOKIE['user_name']}|</a>
        <a href="manage.php">发布通知|</a>
        <a href="/index2/manager.php?a=2">后台管理|</a>
        <a href="logout.php">退出</a>
</div>
EOD;
    }
    else
        echo <<<EOD
<div id="header_login" align="right">
        <a href="#">欢迎你，{$_COOKIE['user_name']}|</a>
        <a href="logout.php">退出</a>
</div>
EOD;
else
    include "include/header_login_register.html";
?>

<div class="parent_div">
    <div class="left">
        <div class="left-title">
            <span>优秀工程</span>
        </div>
        <table class="youxiugongcheng-table">
            <tr>
                <td>
                    <a href="/index/pingshenbanfa.php"> “空间结构奖”评审办法</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/index/download.php?file_name=空间结构奖申请表.doc&file_dir=file/shenqingbiao.doc" >“空间结构奖”申请表下载</a>
                </td>
            </tr>
        </table>
    </div>
    <div class="right">
        <div class="right_title">
            <p><strong>中国钢结构协会空间结构分会“空间结构奖”评审办法</strong></p>
        </div>
        <div class="right_content">
            <p style="margin-top:10px;text-align:center"><span style="font-size:14px;font-family:宋体">（2012年2月 五届二次常务理事会通过）</span></p><p style="text-align:justify;text-justify:inter-ideograph"><span style="font-size:14px;font-family:宋体">&nbsp;</span></p><p style="margin-left:64px;text-align:center;line-height:130%"><strong>第一章<span style="font-weight: normal;font-stretch: normal;font-size: 9px;line-height: normal;font-family: &#39;Times New Roman&#39;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></strong><strong><span style="font-family:宋体">总</span></strong><strong> </strong><strong><span style="font-family:宋体">则</span></strong></p><p style="margin-left:0;text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><strong><span style="font-size:14px;line-height:130%;font-family:宋体">第一条</span></strong><strong><span style="font-size: 14px;line-height:130%">&nbsp; </span></strong><span style="font-size:14px;line-height:130%;font-family:宋体">为贯彻执行“百年大计，质量第一”的方针，提高空间结构的工程质量，争创国际先进水平，在行业中树立工程样板，推动加工、制作、设计和施工水平普遍提高，特制定本办法。</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><strong><span style="font-size:14px;line-height:130%;font-family:宋体">第二条</span></strong><span style="font-size:14px;line-height:130%">&nbsp; </span><span style="font-size:14px;line-height:130%;font-family:宋体">空间结构奖是空间结构行业的最高荣誉奖励，包括工程类和技术类。其中工程类设金奖和银奖，旨在奖励在设计或施工技术与质量方面达到国内先进水平的工程项目；技术类设技术创新奖，旨在奖励在空间结构的材料、设计、加工或安装等方面具有很好创新性、对推动空间结构技术发展具有重要作用的专项技术成果。在工程类中申报的技术原则上不再申报技术创新奖。</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><strong><span style="font-size:14px;line-height:130%;font-family:宋体">第三条</span></strong><span style="font-size:14px;line-height:130%">&nbsp; </span><span style="font-size:14px;line-height:130%;font-family:宋体">空间结构奖在全国范围内已竣工的工程中评选，我国有关单位所承担的在国外建设的空间结构工程也可以参加评选。</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><strong><span style="font-size:14px;line-height:130%;font-family:宋体">第四条</span></strong><span style="font-size:14px;line-height:130%">&nbsp; </span><span style="font-size:14px;line-height:130%;font-family:宋体">空间结构奖由中国钢结构协会空间结构分会颁发，每两年评选一次，每次只评选在一年以上三年以内竣工验收，并没有发生质量问题的工程，创新性技术需应用于竣工验收一年以上三年以内的工程并取得显著的效果。</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><strong><span style="font-size:14px;line-height:130%;font-family:宋体">第五条</span></strong><span style="font-size:14px;line-height:130%">&nbsp; </span><span style="font-size:14px;line-height:130%;font-family:宋体">空间结构工程包括空间网格结构、悬索、薄壳、折板、膜结构等。这些空间结构可构成建筑物的主要部分（如屋盖或墙体），也可自行形成整体结构。</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><span style="font-size:14px;line-height:130%">&nbsp;</span></p><p style="margin-left:64px;text-align:center;line-height:130%"><strong>第二章<span style="font-weight: normal;font-stretch: normal;font-size: 9px;line-height: normal;font-family: &#39;Times New Roman&#39;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></strong><strong><span style="font-family:宋体">申报条件</span></strong></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><strong><span style="font-size:14px;line-height:130%;font-family:宋体">第六条</span></strong><span style="font-size:14px;line-height:130%">&nbsp; </span><span style="font-size:14px;line-height:130%;font-family:宋体">申报空间结构奖应同时具备下列条件：</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><span style="font-size:14px;line-height:130%;font-family:宋体">一．满足相关国家、部颁以及行业标准、规范的要求，达到国内同类型工程先进水平；</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><span style="font-size:14px;line-height:130%;font-family:宋体">二．按规定通过验收或技术鉴定。</span> </p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><strong><span style="font-size:14px;line-height:130%;font-family:宋体">第七条</span></strong><span style="font-size:14px;line-height:130%">&nbsp; </span><span style="font-size:14px;line-height:130%;font-family:宋体">衡量项目优秀的标准是：</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><span style="font-size:14px;line-height:130%;font-family:宋体">一．工程设计方面的奖项应在设计中有所创新，采用了新方案、新技术，对提高空间结构的设计水平具有一定的指导意义。</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><span style="font-size:14px;line-height:130%;font-family:宋体">二．工程施工方面的奖项应在工程中较好地解决了难度较大的制作或安装问题，加快施工进度，对提高工程质量具有显著作用。</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><span style="font-size:14px;line-height:130%;font-family:宋体">三．技术创新奖项应在空间结构工程中得到应用，对提高工程质量和技术水平发挥明显作用，并取得很好的技术经济效果。</span></p><p style="margin-left:32px;text-align:justify;text-justify: inter-ideograph;line-height: 130%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p style="margin-left:64px;text-align:center;line-height:130%"><strong>第三章<span style="font-weight: normal;font-stretch: normal;font-size: 9px;line-height: normal;font-family: &#39;Times New Roman&#39;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></strong><strong><span style="font-family:宋体">申报评选程序</span></strong></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><strong><span style="font-size:14px;line-height:130%;font-family:宋体">第八条</span></strong><span style="font-size:14px;line-height:130%">&nbsp; </span><span style="font-size:14px;line-height:130%;font-family:宋体">凡从事空间结构设计、加工或安装的单位均可向空间结构分会申报评奖，申报应以项目为单位，承担该项目的单位均独立申报也可联合申报<em>。</em></span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><strong><span style="font-size:14px;line-height:130%;font-family:宋体">第九条</span></strong><span style="font-size:14px;line-height:130%">&nbsp; </span><span style="font-size:14px;line-height:130%;font-family:宋体">申报空间结构奖的材料包括：</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><span style="font-size:14px;line-height:130%;font-family:宋体">一、《空间结构奖申报表》中所列出的项目具体情况、工程特点及技术经济指标等；</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><span style="font-size:14px;line-height:130%;font-family:宋体">二、设计方面奖项应提供工程设计说明，主要平面、立面、剖面图及材料表、工程照片等；</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><span style="font-size:14px;line-height:130%;font-family:宋体">三、施工方面奖项应提供主要平面、立面、剖面图及材料表、工程照片，以及有关的工程任务书、工程验收证明书、承包合同书；</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><span style="font-size:14px;line-height:130%;font-family:宋体">四、技术创新奖项应提供详细的技术内容、特点及工程应用情况等；</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><span style="font-size:14px;line-height:130%;font-family:宋体">五、明确主要完成人并排序，金奖不多于</span><span style="font-size:14px;line-height:130%">10</span><span style="font-size:14px;line-height:130%;font-family:宋体">人，银奖不多于</span><span style="font-size:14px;line-height:130%">7</span><span style="font-size:14px;line-height:130%;font-family:宋体">人，技术创新奖不多于</span><span style="font-size:14px;line-height:130%">5</span><span style="font-size:14px;line-height:130%;font-family:宋体">人。明确资料提供人。</span></p><p style="margin-left:0;line-height:130%"><span style="line-height: 130%;color: red">&nbsp;</span></p><p style="margin-left:64px;text-align:center;line-height:130%"><strong>第四章<span style="font-weight: normal;font-stretch: normal;font-size: 9px;line-height: normal;font-family: &#39;Times New Roman&#39;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></strong><strong><span style="font-family:宋体">评审及奖励</span></strong></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><strong><span style="font-size:14px;line-height:130%;font-family:宋体">第十条</span></strong><span style="font-size:14px;line-height:130%">&nbsp; </span><span style="font-size:14px;line-height:130%;font-family:宋体">空间结构奖由空间结构分会组织专家进行评审，评审组由组长一人、副组长二人及组员若干人组成。</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><strong><span style="font-size:14px;line-height:130%;font-family:宋体">第十一条</span></strong><span style="font-size:14px;line-height:130%">&nbsp; </span><span style="font-size:14px;line-height:130%;font-family:宋体">评审组根据申报材料进行审议，以无记名投票方式确定获奖项目。</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><strong><span style="font-size:14px;line-height: 130%;font-family:宋体">第十二条</span></strong><span style="font-size: 14px;line-height:130%">&nbsp; </span><span style="font-size:14px;line-height:130%;font-family:宋体">申报评奖的单位应缴纳申报评审费。</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><strong><span style="font-size:14px;line-height:130%;font-family:宋体">第十三条</span></strong><span style="font-size:14px;line-height:130%">&nbsp; </span><span style="font-size:14px;line-height:130%;font-family:宋体">申报单位要坚持实事求是，不得采用弄虚作假等不正当手段，违反者撤消申报和参评资格。评审委员要秉公办事，廉洁自律。</span></p><p style="text-align:justify;text-justify:inter-ideograph;text-indent:28px;line-height:130%"><strong><span style="font-size:14px;line-height:130%;font-family:宋体">第十四条</span></strong><span style="font-size:14px;line-height:130%">&nbsp; </span><span style="font-size:14px;line-height:130%;font-family:宋体">分会对获空间结构奖的单位颁发奖杯及证书并通报表彰，对获奖项目主要完成人颁发证书，编印出版《大跨空间结构优秀工程汇编》。</span></p><p>&nbsp;</p><p><br/></p>
        </div>
    </div>
</div>
<?php include 'include/footer.php' ?>
</body>
</html>
