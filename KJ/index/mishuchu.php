<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php include_once 'include/function.php' ?>
<?php
if(!less_than_ie9()) {
    echo "<script language=javascript>location.href='responsive/mishuchu.php';</script>";
    exit();
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <meta name="renderer" content="webkit">
    <meta content="telephone=no" name="format-detection">
    <title>空间结构分会-秘书处
    </title>
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
            <span>秘书处</span>
        </div>
    </div>

    <div class="right">
        <div class="right_title">
            <p><strong>中国钢结构协会空间结构分会秘书处</strong></p>
        </div>
        <hr/>
        <div class="right_content">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family: STHeiti; font-size: medium; white-space: normal;"><tbody><tr><td height="25">&nbsp;</td><td height="35" colspan="4" class="style1" style="font-size: 13px; line-height: 1.5;"><strong>秘书处工作职责</strong></td><td>&nbsp;</td></tr><tr><td height="25">&nbsp;</td><td colspan="4" class="style1" style="font-size: 13px; line-height: 1.5;"><p style="margin-top: 1px; margin-bottom: 1px;">　　第一条 分会秘书处在理事长和秘书长领导下开展日常工作，下设副秘书长 2 名、秘书若干名。</p><p style="margin-top: 1px; margin-bottom: 1px;">　　第二条 秘书处工作内容</p><p style="margin-top: 1px; margin-bottom: 1px;"><span class="style1" style="line-height: 1.5;">　　1 ．管理档案资料：包括分会颁发的文件、论文集、简讯以及收到的会员单位宣传资料、优秀工程评审资料、膜结构等级评审资料、杂志、报纸和分会仪器设备的档案管理，做到分类明确、便于查找；</span></p><p style="margin-top: 1px; margin-bottom: 1px;"><span class="style1" style="line-height: 1.5;">　　2 ．管理会员档案：包括单位详细联系方式、单位类型、会费缴纳情况、参加会议情况等，并做到及时更新；</span></p><p style="margin-top: 1px; margin-bottom: 1px;"><span class="style1" style="line-height: 1.5;">　　3 ．财务报销及帐务管理：包括各项缴费入账、开具并邮寄发票、按北工大及分会财务制度进行各项支出的报销及记账，每年至少提交一次分会的详细收支情况，以便向常务理事会汇报；</span></p><p style="margin-top: 1px; margin-bottom: 1px;"><span class="style1" style="line-height: 1.5;">　　4 ．与会员沟通：代表分会与会员单位保持良好沟通，包括接发电话及传真，以及会费催缴。做好电话记录，有问题及时与领导沟通，宜坐班，以便及时收到会员单位来电反馈的情况；</span></p><p style="margin-top: 1px; margin-bottom: 1px;"><span class="style1" style="line-height: 1.5;">　　5. 收发信件：按时收取邮局和快递来的邮件，及时传真或寄发</span></p><p style="margin-top: 1px; margin-bottom: 1px;"><span class="style1" style="line-height: 1.5;">分会的文件，收到较重要的信函和资料后应及时告知寄件人；</span></p><p style="margin-top: 1px; margin-bottom: 1px;"><span class="style1" style="line-height: 1.5;">　　6. 会议组织：分会现有每两年一度的技术交流大会、各专业组举办的委员会及交流会、规程编制会、会员培训会、优秀工程及膜结构企业等级评审会、常务理事会等，应做到会前与相关单位紧密沟通、论文集及会议资料整理并进行会务的各项准备工作，会议期间进行会议的接待工作，并与参会代表进行良好的沟通和交流；</span></p><p style="margin-top: 1px; margin-bottom: 1px;"><span class="style1" style="line-height: 1.5;">　　7. 日常工作：具有良好工作作风，保持办公环境整洁，处理分会日常事物、办理领导安排的相关工作，做好秘书处工作会议记录并形成会议纪要，记录日常工作中的较重要事情，保持和领导的及时沟通。</span></p><p style="margin-top: 1px; margin-bottom: 1px;"><span class="style1" style="line-height: 1.5;">　　８. 丰富网站信息：及时将分会的相关文件登于网站，留意或主动收集相关信息，尽可能为会员提供更多信息。</span></p><p style="margin-top: 1px; margin-bottom: 1px;"><span class="style1" style="line-height: 1.5;">　　9 ．其它相关工作。</span></p></td><td>&nbsp;</td></tr><tr><td height="25">&nbsp;</td><td colspan="4" class="style1" style="font-size: 13px; line-height: 1.5;">&nbsp;</td><td>&nbsp;</td></tr><tr><td height="25">&nbsp;</td><td colspan="4" class="style1" style="font-size: 13px; line-height: 1.5;"><strong>秘书长</strong></td><td>&nbsp;</td></tr><tr><td height="25">&nbsp;</td><td width="85" class="style1" style="font-size: 13px; line-height: 1.5;">　薛素铎</td><td width="344" class="style1" style="font-size: 13px; line-height: 1.5;">北京工业大学教务处</td><td width="65" class="style1" style="font-size: 13px; line-height: 1.5;">&nbsp;</td><td width="65" class="style1" style="font-size: 13px; line-height: 1.5;">&nbsp;</td><td>&nbsp;</td></tr><tr><td height="25">&nbsp;</td><td colspan="4" class="style1" style="font-size: 13px; line-height: 1.5;"><strong>副秘书长</strong></td><td>&nbsp;</td></tr><tr><td height="25">&nbsp;</td><td class="style1" style="font-size: 13px; line-height: 1.5;">　许立准</td><td class="style1" style="font-size: 13px; line-height: 1.5;">北京市机械施工公司 经营部</td><td class="style1" style="font-size: 13px; line-height: 1.5;">&nbsp;</td><td class="style1" style="font-size: 13px; line-height: 1.5;">&nbsp;</td><td>&nbsp;</td></tr><tr><td height="25">&nbsp;</td><td class="style1" style="font-size: 13px; line-height: 1.5;">　吴金志</td><td class="style1" style="font-size: 13px; line-height: 1.5;">北京工业大学</td><td class="style1" style="font-size: 13px; line-height: 1.5;">&nbsp;</td><td class="style1" style="font-size: 13px; line-height: 1.5;">&nbsp;</td><td>&nbsp;</td></tr><tr><td height="25">&nbsp;</td><td colspan="4" class="style1" style="font-size: 13px; line-height: 1.5;"><strong>秘 书</strong></td><td>&nbsp;</td></tr><tr><td height="25">&nbsp;</td><td class="style1" style="font-size: 13px; line-height: 1.5;"><div align="center">张秀华</div></td><td class="style1" style="font-size: 13px; line-height: 1.5;">北京工业大学</td><td class="style1" style="font-size: 13px; line-height: 1.5;">&nbsp;</td><td class="style1" style="font-size: 13px; line-height: 1.5;">&nbsp;</td><td>&nbsp;</td></tr><tr><td height="25">&nbsp;</td><td class="style1" style="font-size: 13px; line-height: 1.5;">　 李雄彦</td><td class="style1" style="font-size: 13px; line-height: 1.5;">北京工业大学</td><td class="style1" style="font-size: 13px; line-height: 1.5;">&nbsp;</td><td class="style1" style="font-size: 13px; line-height: 1.5;">&nbsp;</td><td>&nbsp;</td></tr><tr><td height="25">&nbsp;</td><td colspan="4" class="style1" style="font-size: 13px; line-height: 1.5;"><strong>秘书处联系方式</strong>：</td><td>&nbsp;</td></tr><tr><td height="25">&nbsp;</td><td><span class="style1" style="font-size: 13px; line-height: 1.5;">　地　址：</span></td><td><span class="style1" style="font-size: 13px; line-height: 1.5;">北京市朝阳区平乐园100号 　100124</span></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td height="25">&nbsp;</td><td><span class="style1" style="font-size: 13px; line-height: 1.5;">　单　位：</span></td><td><span class="style1" style="font-size: 13px; line-height: 1.5;">中国钢结构协会空间结构分会</span></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td height="25">&nbsp;</td><td><span class="style1" style="font-size: 13px; line-height: 1.5;">　联系人：</span></td><td><span class="style1" style="font-size: 13px; line-height: 1.5;">吴金志（博士）</span></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td height="25">&nbsp;</td><td><span class="style1" style="font-size: 13px; line-height: 1.5;">　电话/传真：</span></td><td><span class="style1" style="font-size: 13px; line-height: 1.5;">010-67391496</span></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td height="25">&nbsp;</td><td><span class="style1" style="font-size: 13px; line-height: 1.5;">　E-mail ：</span></td><td><span class="style1" style="font-size: 13px; line-height: 1.5;"><a href="http://mailto:kongjian@bjut.edu.cn">kongjian@bjut.edu.cn</a></span></td></tr></tbody></table>
        </div>
    </div>
</div>
<?php include 'include/footer.php' ?>
</body>
</html>
