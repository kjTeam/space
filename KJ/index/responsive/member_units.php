
<?php
include_once "../include/function.php";
session_start();
if(less_than_ie9()) {
    echo "<script language=javascript>location.href='../member_units.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>会员单位</title>

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
    <link href="../../space2/bootstrap-3.3.5-dist/css/bootstrap-table.css"/>
    <LINK rel="shortcut icon" type="image/x-icon" href="../image/favicon_2.ico" media="screen"/>


    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="../../space2/bootstrap-3.3.5-dist/js/bootstrap-table.min.js"></script>
    <script src="../../space2/bootstrap-3.3.5-dist/js/bootstrap-table-zh-CN.min.js"></script>
    <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
    <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
    <!--[if IE 9]>
    <script src="bootstrap/js/respond.min.js"></script>
    <script src="bootstrap/js/html5shiv.js"></script>
    <![endif]-->
    <script>
    $(function(){
      $('#member').bootstrapTable({
          url: 'include/includedPHP/member.php?type=1',
          classes:'table table-hover table-bordered',
          sidePagination: "client",           //分页方式：client客户端分页，server服务端分页（*）
          toolbar: '#toolbar',  
          pagination: true,
          pageNumber: 1,                       //初始化加载第一页，默认第一页
          pageSize: 10,                       //每页的记录行数（*）
          pageList: [10, 25, 50, 100],        //可供选择的每页的行数（*）
          search: false,                       
          striped: true,
          showFullscreen:true,
          showColumns: true,                  //是否显示所有的列
          showRefresh: true,                  //是否显示刷新按钮
          minimumCountColumns: 2, 
          columns: [{
            checkbox: true
          },{
            field: 'uid',
            title: '序号',
            formatter:function(value, row, index){
                return (index+1);
            }
          }, {
             field: 'unit',
             title: '单位'
          }, {
            field: 'unit_represent',
            title: '单位代表'
          },{
            field: 'post',
            title: '分会职务'
          },{
            field: 'unit_properties',
            title: '分会职务'
          }],
      });
    })
    
    </script>

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
        <div class="col-md-2 col-xs-12 left-col">
            <div class="left">
                <div class="left-title">
                    <span>会员单位</span>
                </div>
            </div>
        </div>
        <div class="col-md-10 col-xs-12 right-col">
            <div class="right">
                <div class="right-title">
                    <p><strong>会员单位</strong></p>
                </div>
                <hr/>
                <div class="right-content">
                    <?php
                    $name = get_all_of_column_from_datatable('company_result', 'name');
                    $link = get_all_of_column_from_datatable('member_units', 'link');
                    $num = count($name);
                    /*for ($i = 0; $i < $num; $i++) {
                        echo <<<EOD
<p><a href="$link[$i]">$name[$i]</a></p>
EOD;
                    }*/
                    
                    ?>
                    <div class="form-group col-xs-12" style="margin-top:15px">
                        <label class="control-label col-sm-2" style="text-align:right" for="txt_search_departmentname">单位</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" style="text-align:left;" id="txt_search_departmentname">
                        </div>
                        <label class="control-label col-sm-2" style="text-align:right;" for="txt_search_statu">分会职务</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" style="text-align:left;" id="txt_search_statu">
                        </div>
                        <div class="col-sm-2" style="text-align:right;">
                            <button type="button"  id="btn_query" class="btn btn-primary">查询</button>
                        </div>
                    </div>
                   <div id="toolbar" class="btn-group" style="margin-bottom:10px">
                      <button id="btn_add" type="button" class="btn btn-default">
                         <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增
                      </button>
                      <button id="btn_edit" type="button" class="btn btn-default">
                         <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>修改
                      </button>
                      <button id="btn_delete" type="button" class="btn btn-default">
                         <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>删除
                      </button>
                  </div>  
                  <table id="member" style="margin-top:20px"></table>
                    <!-- <table width="100%" cellpadding="0" cellspacing="0" class="style1">
                <tbody>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市云光空间结构设计工程有限责任公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">江苏天彩膜结构工程有限公司</td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">贵州自洁膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">河北中实建材有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">徐州鹏程钢结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">中建三局第一建设工程有限责任公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">四川省宇隆建设工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">汕头市野狼天骄帐篷有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">合肥瑞阳膜结构工程有限公司</td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海现代建筑设计（集团）有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">江苏沪宁钢机股份有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京纽曼帝莱蒙膜建筑技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">长江精工钢结构（集团）股份有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京市机械施工有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">山西汾阳网架建设有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">浙江大学土木系 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海宝冶集团有限公司钢结构分公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">天津大学土木系/天津市空间网架工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京市建筑工程研究院有限责任公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">中国航空规划建设发展有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">同济大学土木工程学院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">陕西建工机械施工集团有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">开封天元网架工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京市建筑工程设计有限责任公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">华诚博远（北京）建筑规划设计有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">开封市华中空间结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">常州新区兴裕钢结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">海军工程设计研究院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海汉杰伊膜结构工程安装有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">云南省设计院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">兰州理工大学土木工程学院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京市建筑设计研究院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">徐州通域空间结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">威海中林网架钢构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">中国京冶工程技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">黑龙江安装工程公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">中国中元国际工程公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">机械工业第六设计研究院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">涿州蓝天网架有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">煤炭工业太原设计研究院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京交通大学土建工程学院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">巨力索具股份有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">中国建筑标准设计研究院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">徐州华宏钢结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">扬州狮鹤高强度螺栓有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">建设部标准定额研究所 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">山东建筑大学 </td>
                </tr>
                
                <tr>
                  <td width="281" height="30" class="xl61">广州凯诺毕尔建筑技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">中国建筑科学研究院 结构所 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">江苏金虹钢结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">清华大学土木工程系 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">法国法拉利技术织物公司上海代表处 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">太原理工大学建工学院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京光翌膜结构建筑有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">丰泽工程橡胶科技开发股份有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京艾尔豪斯膜式技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">中国建筑东北设计研究院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海交通大学空间结构研究中心 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海申达科宝新材料有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">柯沃泰膜结构（上海）有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">国家网架及钢结构产品质量监督检验中心 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">江西浙广厦网架工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">中南建筑设计院/全国轻型钢结构标准技术委员会 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">贵州工业大学空间结构研究所 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">银川市规划建筑设计研究院有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">东南大学土木工程学院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">沈阳远大铝业工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">哈尔滨工业大学深圳研究生院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">河北大跨钢结构工程技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京梦想空间结构研究中心有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京工业大学建工学院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">四川赛特蓝钢建集团有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">大连民族学院土木工程学院院长 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">中冶京诚工程技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">武昌船舶重工有限责任公司装备经营开发部 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">中油吉林化建工程有限公司长春钢结构预制安装分公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">辽宁北方建设集团有限公司网架工程处 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">杭州泰鼎膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">四川蓝天网架钢结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">山西省电力勘测设计院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">圣戈班高功能塑料有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京北方空间钢结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京秀博涂层织物有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京泰特隆空间膜技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">平冈塑料制品贸易（北京）有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京欢腾膜结构技术有限责任公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京恒中天远索膜技术开发有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">大连新业张拉膜环艺工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">长春中天建筑设计有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海金潮钢架膜结构有限公司 </td>
                </tr>
                
                
                <tr>
                  <td width="281" height="30" class="xl61">上海泽芸环境科技工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海门普来新材料股份有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海瀚太膜结构建筑有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">南京艺佳钢结构空间膜技术工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">南京朗杰膜结构技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">常州市丰林网架有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">江苏江阴艺林索具有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">徐州时代空间膜技术工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">徐州市现代钢结构有限公司 </td>
                </tr>
                
                <tr>
                  <td width="281" height="30" class="xl61">江苏维凯科技股份有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">合肥美斯特膜结构技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">合肥金彩空间膜结构技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">机械工业第一设计研究院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">安徽省巢湖铸造厂有限责任公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">山东大学土建与水利学院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">山东中通钢构建筑股份有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">淄博齐元钢结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">山东文登市建筑设计院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">天津市市政工程设计研究院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">机械工业第五设计研究院技术中心管理部 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">天津市天宇空间钢结构安装有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">杭州知辉膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">杭州奥特膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">重庆一棵树膜结构技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">武汉菲奥特索膜技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">河南汉杰伊膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">新乡空间钢结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">河南省豫北网架玻璃钢有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">河南大唐景观膜有限责任公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">河南亚东中弘建筑工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">广州百富盛空间膜建筑有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">广州捷思经济发展有限公司（德国米乐） </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">广东省航盛建设集团工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市三鑫膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市维拓空间膜技术开发有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市金瑞泰钢膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市美新鸿膜结构技术开发有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">广西金虎钢结构工程有限责任公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">昆明英维升空间膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">西安玉龙景观膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">陕西三捷轻钢结构有限责任公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">中国市政工程西北设计研究院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">天津市凯博空间结构工程技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">广州市天河网架钢结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">中国航天建设集团有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">中国第十九冶金建设公司天龙网架公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京约顿气膜建筑技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">大庆市芙莱答膜饰开发有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">广东亿龙新材科技有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">杭州钱南膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海礼洋索膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海展冀膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市诺科空间膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市深光膜技术有限公司 </td>
                </tr>
                
                <tr>
                  <td width="281" height="30" class="xl61">四川兴得利膜结构技术有限责任公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">芜湖美特膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">武汉米塔尔建筑膜工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">厦门索立膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">江苏八方钢结构工程建设有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">广州天幔膜结构技术开发有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">江阴市开创科技有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">青岛汇博恒空间膜技术工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海合宣宅索膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">西安嘉创膜结构景观工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">厦门欣鹰膜结构技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">徐州新之秀膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">盐城市大鹏交通电力有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">杭州祺利膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">合肥永芳遮阳设施有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京德宏幕墙工程技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海精浩膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">苏州红鑫景观空间膜工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">江苏天地钢结构工程集团有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">江苏恒大钢膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">浙江星益达增强材料有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">甘肃新博成膜结构技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">广州市越宏装饰工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">杭州世涛膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市佛兰建筑工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">徐州金工空间结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">徐州精艺空间膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京江河幕墙股份有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">福建龙溪轴承（集团）股份有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">柳州欧维姆机械股份有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市奥克金鼎空间膜技术开发有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市信和鼎膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">武汉鑫华鸿膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">合肥欣悦膜结构技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">江阴辰雄索业有限公司 </td>
                </tr>
                
                <tr>
                  <td width="281" height="30" class="xl61">凌钢股份北票钢管有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海华喜膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">武汉科索尔膜结构技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京合峰创展膜建筑技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市华海张拉膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">宁波先锋新材料股份有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">陕西亚飞建设工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市美翔膜结构有限公司 </td>
                </tr>
                
                <tr>
                  <td width="281" height="30" class="xl61">徐州当代空间膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市博德维建筑技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海彭浦橡胶制品有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">华诚博远建筑工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">陕西省建筑科学研究院 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">福建思嘉环保材料科技有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京银磊丰业膜材建筑工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">武汉上鼎膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">南京联垦科技实业有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">合肥金帆钢膜结构工程有限公司 </td>
                </tr>
                
                <tr>
                  <td width="281" height="30" class="xl61">北京正烁空间建筑工程技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">陕西建工集团总公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">赛德乐技术织物中国代表处 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海信升膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">东阳市顺发照明工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">绍兴凯春膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">浙江超凡膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市港筑膜建筑工程技术开发有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海铭锦空间膜技术工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海绿荫膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">福建思晨膜结构技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">义乌市奥博膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">武汉致远空间膜结构工程有限公司 </td>
                </tr>
                
                <tr>
                  <td width="281" height="30" class="xl61">上海粤彩膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京泰克斯隆膜技术有限责任公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">绍兴市诚达膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">海宁大丰户外用品有限公司 </td>
                </tr>
                
                <tr>
                  <td width="281" height="30" class="xl61">四川金砖建设工程有限责任公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海宇栾钢膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">徐州浩博空间结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海聚轮膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">山东博润工业技术股份有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">郑州鹏盛翔膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京思沃安尼膜建筑技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">台州精远膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市天盛膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">天津市康达膜材建筑工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">武汉百年通用膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">杭州欣沃泰膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京沃太斯环保科技发展有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">济南世恒钢膜结构工程有限公司 </td>
                </tr>
                
                <tr>
                  <td width="281" height="30" class="xl61">上海精锐金属建筑系统有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">杭州飞凡膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市海德斯曼科技有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海地标膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">南京峻创钢结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市深东南膜结构技术开发有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">潍坊向阳膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">浙江佳诚钢结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">新乡市汇丰钢结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">嘉兴美建膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海嵘擎膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">重庆文轩膜结构装饰工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">四川华建钢结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海天德建设（集团）有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京法利膜结构技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">武汉博赛场地景观工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">浙江飞特钢结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">浙江永峰环保工程科技有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">北京银泰建预应力工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">苏州弘润景观膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">辽宁金山钢构彩板工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">武汉阳光空间建筑膜技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海锐锋膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">厦门经联钢结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">合肥创景空间膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">沈阳银亿空间膜技术应用有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">湖北联冠体育设施工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">湖北联冠膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">榆林市绿洲装饰有限责任公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">江苏筑金网架钢结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">苏州泰宇建筑工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">武汉飞雨膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海摩帝尔金属结构科技有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">台州利菲膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">亚东工业（苏州）有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海示一膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海皓骏膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海天网膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">吉林北工集团有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">湖北龙熙体育场地设施工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">潍坊飞翔膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">重庆览盛膜结构安装工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海旗彩装饰工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">浙江汇锋新材料有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海锦萌建筑工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">河南省天宇装饰工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">嘉兴坦步儿空间结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">盖尔太平洋特种纺织品（宁波）有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市三腾达空间膜技术开发有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">江苏和鼎网架钢结构工程有限责任公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">日氟荣高分子材料（上海）有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海西幔贸易有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">青岛新锐达钢膜结构安装修缮工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">绍兴骏美膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">嘉兴同际膜结构装饰有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海通正铝业工程技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">四川宏邦建筑工程有限责任公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">金华市天禧膜结构有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">浙江瑞拓金属结构屋面有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">深圳市盛盈钢膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">上海峰翼膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">山东经典重工集团股份有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">天津博斯特膜装饰工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">苏州海德斯膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">沈阳杰绅膜结构技术有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">四川泰宏膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">永康市艾玛膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">江苏贝特钢结构有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">海盐远辰索膜结构有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">武汉新天幕膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">重庆市固昂膜结构技术有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">合肥紫阳膜结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">山东震瑞膜结构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">中国美术学院风景建筑设计研究院 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">北京中体善建建设工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">杭州业新钢结构有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">天津冠坤科技有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">江苏欧美钢结构幕墙科技有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">常州红叶膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">合肥菊美膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">合肥丽景膜结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">四川成祥建筑工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">温州贝蒂斯膜结构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">上海聚翼遮阳设备有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">上海地隆阁建筑装饰有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">济宁轩恒膜结构有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">厦门华蓝建筑工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">太原市七色空间膜结构技术有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">甘肃圣龙钢结构工程有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">合肥创艺膜结构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">北京信远亿嘉膜结构技术有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">江苏瑞兴建筑装饰设计工程有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">上海伟勃遮阳设施有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">西安盛巨福膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">徐州德瑞空间结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">合肥腾杰膜结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">湖州宏高膜结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">嘉兴鑫美钢膜结构建筑技术有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">安徽利腾膜结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">重庆祁邵膜结构安装工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">杭州智盈钢结构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">华南理工大学建筑设计研究院</td>
                </tr>
                
                <tr>
                  <td height="30" class="xl61">上海壹凌实业有限公司（日本旭硝子GREEN-TECH株式会社）</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">中国五洲工程设计集团有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">合肥领航膜结构技术有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">上海宏升膜结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">云南亨立膜建筑工程技术有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">江苏飞龙装饰工程有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">江苏鑫鹏钢结构工程有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">湖北靓晟泰建筑工程有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">石家庄高新区钛利膜结构技术有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">江苏正道空间结构有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">金华市新凯钢膜结构工程有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">丹阳市建安钢构有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">悉地（北京）国际建筑设计顾问有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">温州希运膜结构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">徐州中煤百甲重钢科技有限公司 </td>
                </tr>
                <tr>
                  <td height="30" class="xl61">杭州德艺遮阳篷有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">江苏恒久钢构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">徐州辉煌钢结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">江苏浩瀚钢结构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">南通华木空间钢结构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">上海青鼎膜结构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">上海黄坛膜结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">苏州洛特钢结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">上海晟濠实业有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">北京易饰天软膜拉蓬技术有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">余姚市姚利膜结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">杭州浩辰膜结构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">上海棚发膜结构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">张家港市鼎诚膜结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">武汉市信达远膜结构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">常州锦浩膜结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">中铁建钢结构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">杭州天棚膜结构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">深圳市斯柯瑞膜工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">厦门兴大木空间结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61"> 安徽三宝钢结构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">宁波赛德膜结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">陕西鸿飞天鼎膜结构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">浙江永创工贸有限公司</td>
                </tr>
                <tr>
                  <td width="281" height="30" class="xl61">宁波平胜空间结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">浙江中凯膜结构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">宁波平胜空间结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">桂林理工大学土木与建筑工程学院</td>
                </tr>
				 <tr>
                  <td height="30" class="xl61">郑州卓越膜结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">徐州九鼎钢结构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">上海富旺建筑装饰工程有限公司</td>
                </tr>
				 <tr>
                  <td height="30" class="xl61">江苏火花钢结构集团有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">四川恒升钢构工程有限公司</td>
                </tr> 
				<tr>
                  <td height="30" class="xl61">杭州德一膜结构有限公司</td>
                </tr>
				 <tr>
                  <td height="30" class="xl61">合肥景悦膜结构工程有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">河南普罗莱斯膜结构有限公司</td>
                </tr>
                <tr>
                  <td height="30" class="xl61">湖北鑫鑫天地工程建设有限公司</td>
                </tr>
				<tr>
                  <td height="30" class="xl61">乐清市五洲棚业有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">广州欧建膜结构技术有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">杭州天方膜结构有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">武汉工标建设工程有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">西安新格瑞膜结构工程有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">北京诚通新新建设有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">江苏飞翌膜结构有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">巨义(上海)商贸有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">山东美雅达膜结构工程有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">徐州飞虹网架建设科技有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">上海久罗机电设备有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">徐州天达网架幕墙有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">徐州帝辉钢结构工程有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">浙江宏泰新材料有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">安徽亿博膜结构工程有限公司</td>
                </tr>  
				<tr>
                  <td height="30" class="xl61">宁夏大学土木与水利工程学院</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">临朐艺景膜结构工程有限公司</td>
                </tr>  
				<tr>
                  <td height="30" class="xl61">合肥德石钢膜结构工程有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">宁波甬达膜结构技术有限公司</td>
                </tr>  
				<tr>
                  <td height="30" class="xl61">无锡豪美膜结构工程有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">宁波八点钟膜结构有限公司</td>
                </tr>  
				<tr>
                  <td height="30" class="xl61">徐州市机械施工有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">徐州安美固建筑空间结构有限公司</td>
                </tr>  
				  <tr>
                  <td height="30" class="xl61">合肥恒生膜结构有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">深圳市川东膜结构工程有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">合肥华鑫膜结构工程有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">安徽俊扬膜结构工程有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">陕西子晨膜结构工程有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">合肥明玥膜结构工程有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">河南启航膜结构工程有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">泉州元邦钢结构工程有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">绍兴紫索膜结构有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">河南大远膜结构工程有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">希运涂层织物（上海）贸易有限公司</td>
                </tr>    
				<tr>
                  <td height="30" class="xl61">辽宁宏泰工程有限公司</td>
                </tr>      
				<tr>
                  <td height="30" class="xl61">山东红三叶钢结构工程有限公司</td>
                </tr>      
				            
              </tbody></table> -->
                </div>
            </div>
        </div>

    </div>
</div>

<?php include "include/footer.php";?>

</body>