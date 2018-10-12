<!DOCTYPE html>
<html>
<head>
    <title>
       专家申请
    </title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta content="telephone=no" name="format-detection">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/header-rsp.css" rel="stylesheet">
    <link href="css/footer-rsp.css" rel="stylesheet">
    <link href="css/index-rsp.css" rel="stylesheet">
    <link href="css/content-page.css" rel="stylesheet">
    <link href="css/sweetalert2.min.css" rel="stylesheet">
    <LINK rel="shortcut icon" type="image/x-icon" href="../image/favicon_2.ico" media="screen"/>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript"  src="scripts/MyJS.js"></script>
    <script type="text/javascript"  src="scripts/sweetalert2.min.js"></script>
    <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
    <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
    <!--[if IE 9]>
    <script src="bootstrap/js/respond.min.js"></script>
    <script src="bootstrap/js/html5shiv.js"></script>
    <![endif]-->
    <script type='text/javascript'>
    $(function(){
    swal({
  title: `<h4 style='margin-top:20px'><strong>在填写申请表之前，您需要阅读专家委员会工作细则</strong></h4>`,
  html:
    `<h5 style='text-align:left;line-height:22px'>
   一、为了更好地发挥行业内专家的资源优势，促进空间结构分会在行业发展规划、技术咨询中的作用，加强空间结构分会为总会及政府主管部门和为会员单位提供技术服务的功能，形成分会的智囊库，更好地推动我国空间结构事业的发展，在中国钢结构协会空间结构分会下设立专家委员会。
<br>二、专家委员会委员从空间结构分会会员单位中产生，并应是本行业内水平较高、作风正派、热心协会工作的科技或管理专家。
 &nbsp; &nbsp;<br>1. 基本条件：具有10年以上空间结构行业（包括网格结构、膜结构、索结构的科研、设计、加工制作、施工以及企业管理等方面）从业经验，业绩较为突出并有副高级及以上职称。
 &nbsp; &nbsp;<br>2.专业条件（满足下列条件之一方可申请）：
 &nbsp;<br>1）主持过空间结构领域重大科研、设计、施工项目的技术负责人或学科带头人，同时作为主持人或主要参与者获得省部级及以上奖项者；
 &nbsp;<br>2）参加编制或审查空间结构相关领域的国家标准、行业标准或协会标准者；
 &nbsp;<br>3）担任企业或加工厂负责人10年以上，且在企业管理中取得显著成就，获得国家或地方政府奖励或表彰者。
<br>三、专家委员会设主任委员1人，副主任委员若干人，首届专家委员会正副主任委员由空间结构分会高级顾问从首批委员申请者中根据基本条件和专业条件推荐，由分会常务理事会聘任，委员会可聘任秘书1人。专家委员会的常务工作由正副主任委员承担。
<br>四、专家委员会委员聘任程序为：<br>1）同时具备基本条件和专业条件者本人向专家委员会提出申请，提交书面申请表；<br>2）专家委员会正副主任委员会议进行评定；<br>3）常务理事会批准聘任。常务理事批准后的空间结构专家的简历等信息挂于分会网站。
<br>五、专家委员会委员每届任期四年，到期后经本人申请可以连聘连任。有下列情况者，分会将解除对其聘任：
<br>1．违反分会工作条例及国家有关法律和法规者；
<br>2．主持的工程项目出现重大工程质量事故并造成恶劣影响者；
<br>3．自愿退出者。
<br>六、专家委员会开展下列活动：
<br>1．开展行业发展规划研讨，调查中国空间结构发展现状，为今后分会及行业发展规划提出建议；
<br>2．积极组织相关专家参加技术咨询、论证等服务工作；
<br>3．结合空间结构相关的科技发展及工程实践，推广先进技术；
<br>4．积极与国家和地方政府相关部门及相关协会沟通，增强空间结构分会的工作能力和社会影响力；
<br>5．完成分会布置的工作任务。
<br>七．本细则经空间结构分会常务理事会批准后实施。
</h5>`,
  showCloseButton: false,
  showCancelButton: false,
  confirmButtonText:
    '我已阅读专家委员会工作细则',
})
})
    </script>
</head>

<body>
<?php
include_once "../include/function.php";
$res = user_name_psw_check($_COOKIE['user_name'], $_COOKIE['user_password']);
if ($res['user_name_psw_match'] == 'yes') {
    if ($res['user_is_manager'] == 'yes') {
        $id = $_GET['id'];
        $page_name = $_GET["pagename"];
        include "include/header-manage-content-page.php";
    }
    else
        include "include/header-login.php";
}
else
    include "include/header.php";
?>

<div class="container">
   <div class="col-xs-12" style="margin-left:10%">
   <div class="hidden-xs submitphoto"></div>
  
    <form id="export" class="hidden-xs" style="margin-top:30px" enctype="multipart/form-data" action="include/expert_apply.php" method="post"> 
       <div class="row">
            <div class="form-group col-sm-8">
                 <label for="p1" class="col-sm-2 control-label">姓名:</label>
                 <div class="col-sm-4">
                       <input type="text" class="form-control" id="p1" name="p1">
                 </div>
            </div> 
      </div>
      <div class="row">
          <div class="form-group col-sm-8 ">
                 <label for="p2" class="col-sm-2 control-label">性别:</label>
                 <div class="col-sm-4">
                       <input type="text" class="form-control" id="p2" name="p2">
                 </div>
            </div>
      </div>
  <div class="row">
  <div class="form-group col-sm-8 ">
    <label for="p3" class="col-sm-2 control-label">出生年月:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="p3" name="p3">
    </div>
  </div>
  </div>
  <div class="row">
  <div class="form-group col-sm-8">
    <label for="p4" class="col-sm-2 control-label">民族:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="p4"  name="p4">
    </div>
    <div class="col-sm-4 col-sm-offset-2">
     <input type="file" id="userphoto" name="userphoto">
    </div> 
  </div>
  </div>
  <div class="row">
      <div class="form-group col-sm-8">
           <label for="" class="col-sm-2 control-label">党派:</label>
            <div class="col-sm-4">
                  <input type="text" class="form-control" id="p5" name="p5">
             </div>
             <label for="" class="col-sm-2 control-label">出生地:</label>
            <div class="col-sm-4">
                  <input type="text" class="form-control" id="p6" name="p6">
             </div>
       </div>
  </div>
  <div class="row">
      <div class="form-group col-sm-8">
           <label for="" class="col-sm-2 control-label">工作单位:</label>
            <div class="col-sm-10">
                  <input type="text" class="form-control" id="p7" name="p7">
             </div>
       </div>
  </div>
  <div class="row">
      <div class="form-group col-sm-8">
           <label for="" class="col-sm-2 control-label">现任职务:</label>
            <div class="col-sm-4">
                  <input type="text" class="form-control" id="p8" name="p8">
             </div>
             <label for="" class="col-sm-2 control-label">职称:</label>
            <div class="col-sm-4">
                  <input type="text" class="form-control" id="p9" name="p9">
             </div>
       </div>
  </div>
  <div class="row">
   <div class="form-group col-sm-8">
           <label for="" class="col-sm-2 control-label">身份证号:</label>
            <div class="col-sm-10">
                  <input type="text" class="form-control" id="p10" name="p10">
             </div>
       </div>
  </div>
  <div class="row">
   <div class="form-group col-sm-8">
           <label for="" class="col-sm-2 control-label">通讯地址:</label>
            <div class="col-sm-10">
                  <input type="text" class="form-control" id="p11" name="p11">
             </div>
       </div>
  </div>
   <div class="row">
      <div class="form-group col-sm-8">
           <label for="" class="col-sm-2 control-label">办公电话:</label>
            <div class="col-sm-4">
                  <input type="text" class="form-control" id="p12" name="p12">
             </div>
             <label for="" class="col-sm-2 control-label">邮政编码:</label>
            <div class="col-sm-4">
                  <input type="text" class="form-control" id="p13" name="p13">
             </div>
       </div>
</div>
       <div class="row">
       <div class="form-group col-sm-8">
           <label for="" class="col-sm-2 control-label">微信号:</label>
            <div class="col-sm-4">
                  <input type="text" class="form-control" id="p20" name="p20">
             </div>
             <label for="" class="col-sm-2 control-label">学历:</label>
            <div class="col-sm-4">
                  <input type="text" class="form-control" id="p21" name="p21">
             </div>
       </div>
      
  </div>
    <div class="row">
      <div class="form-group col-sm-8">
           <label for="" class="col-sm-2 control-label">外语:</label>
            <div class="col-sm-4">
                  <input type="text" class="form-control" id="p14" name="p14">
             </div>
             <label for="" class="col-sm-2 control-label">应用能力:</label>
            <div class="col-sm-4">
                 <label class="checkbox-inline">
                         <input type="checkbox" id="Checkbox1" name="English[]" value="option1">听
                 </label>
                 <label class="checkbox-inline">
                         <input type="checkbox" id="Checkbox2" name="English[]" value="option2"> 说
                 </label>
                 <label class="checkbox-inline">
                         <input type="checkbox" id="Checkbox3" name="English[]" value="option3"> 读
                 </label>
                 <label class="checkbox-inline">
                         <input type="checkbox" id="Checkbox4" name="English[]" value="option4"> 写
                 </label>
             </div>
       </div>
  </div>
  
  <div class="row">
      <div class="form-group col-sm-8">
           <label for="" class="col-sm-2 control-label">电子邮件:</label>
            <div class="col-sm-10">
                  <input type="text" class="form-control" id="p15" name="p15">
             </div>
       </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-8">
           <label for="" class="col-sm-3 control-label">从事专业（多选）:</label>
            <div class="col-sm-9">
                 <label class="checkbox-inline">
                         <input type="checkbox" id="Checkbox11" name="Major[]" value="option1">网格结构；
                 </label>
                 <label class="checkbox-inline">
                         <input type="checkbox" id="Checkbox12" name="Major[]" value="option2"> 索结构；
                 </label>
                 <label class="checkbox-inline">
                         <input type="checkbox" id="Checkbox13" name="Major[]" value="option3"> 膜结构；
                 </label>
                 <label class="checkbox-inline">
                         <input type="checkbox" id="Checkbox14"  name="Major[]" value="option4"> 其他：
                         <input type="text" style="width:90px;" class="inputlikebs" id="othermajor" name="othermajor">
                 </label>
                 
             </div>
       </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-8">
            <div class="col-sm-12 col-sm-offset-3">
                 <label class="checkbox-inline">
                         <input type="checkbox" id="Checkbox21" name="Major1[]" value="option1">科研；
                 </label>
                 <label class="checkbox-inline">
                         <input type="checkbox" id="Checkbox22" name="Major1[]" value="option2"> 设计；
                 </label>
                 <label class="checkbox-inline">
                         <input type="checkbox" id="Checkbox23" name="Major1[]" value="option3"> 安装；
                 </label>
                 <label class="checkbox-inline">
                         <input type="checkbox" id="Checkbox24" name="Major1[]" value="option4"> 制作：
                 </label>
                 <label class="checkbox-inline">
                         <input type="checkbox" id="Checkbox25" name="Major1[]" value="option5"> 材料：
                 </label>
                 <label class="checkbox-inline">
                         <input type="checkbox" id="Checkbox26" name="Major1[]" value="option6"> 管理：
                 </label>
                 <label class="checkbox-inline">
                         <input type="checkbox" id="Checkbox27" name="Major1[]" value="option7"> 其他：
                         <input type="text" style="width:90px;" class="inputlikebs" id="othermajor1" name="othermajor1">
                 </label>
                 
             </div>
       </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-8">
           <label for="" class="col-sm-3 control-label">详细说明最擅长的专业:</label>
            <div class="col-sm-9">
                  <textarea class="form-control" rows="3" id="p16" name="p16"></textarea>
             </div>
       </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-8">
           <label for="" class="col-sm-3 control-label">主要工作及学习经历:</label>
            <div class="col-sm-9">
                  <textarea class="form-control" rows="3" id="p17" name="p17"></textarea>
             </div>
       </div>
    </div>
     <div class="row">
      <div class="form-group col-sm-8">
           <label for="" class="col-sm-3 control-label">主要工作业绩:</label>
            <div class="col-sm-9">
                  <textarea class="form-control" rows="3" id="p18" name="p18"></textarea>
             </div>
       </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-8">
           <label for="" class="col-sm-3 control-label">曾获何种重大奖励:</label>
            <div class="col-sm-9">
                  <textarea class="form-control" rows="3" id="p19" name="p19"></textarea>
             </div>
       </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-8">
           <label for="" class="col-sm-3 control-label">请上传附件(附件格式为rar,小于200MB):</label>
            <div class="col-sm-9">
                  <input type="file" id="file" name="file">
             </div>
       </div>
    </div>
    
    <div id="inform" style="color:red;text-align:center;"></div>
    <div class="form-group">
    <div class="col-sm-8 col-sm-offset-4" style="padding-left: 15%">
          <button class="btn btn-warning">预 览</button>&nbsp;&nbsp;&nbsp;&nbsp;
     <button  type="submit"  class="btn btn-primary">提  交</button>
    </div>
  </div>
  </form>

<p style="color:#000">填写说明：<br>
1、本申请表需附加申请人身份证、职称证书、学校毕业证书及与专业条件相关的证明材料等；<br>
2、专业条件见《中国钢结构协会空间结构分会专家委员会工作细则》第二条；<br>
3、首届首批专家由分会秘书处代行专家委员会职责根据《专家委员会工作细则》组织评审。
</p>
   </div>
</div>
<?php include "include/footer.php"; 
?>

</body>
</html>