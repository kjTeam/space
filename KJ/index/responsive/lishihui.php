

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
    <link href="../../space2/bootstrap-3.3.5-dist/css/bootstrap-table.css"/>
    <link href="css/sweetalert2.min.css">
    <LINK rel="hortcut icon" type="image/x-icon" href="../image/favicon_2.ico" media="screen"/>


      <!-- Bootstrap -->
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="../../space2/bootstrap-3.3.5-dist/js/bootstrap-table.min.js"></script>
    <script src="../../space2/bootstrap-3.3.5-dist/js/bootstrap-table-zh-CN.min.js"></script>
    <script src="scripts/sweetalert2.min.js"></script>
    <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
    <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
    <!--[if IE 9]>
    <script src="bootstrap/js/respond.min.js"></script>
    <script src="bootstrap/js/html5shiv.js"></script>

    <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
    <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
    <!--[if IE 9]>
    <script src="bootstrap/js/respond.min.js"></script>
    <script src="bootstrap/js/html5shiv.js"></script>
    <![endif]-->

     <script>
    $(function(){
      initTable();
    })
    function initTable(unit,properties){
      $('#member').bootstrapTable('destroy');
      var unit1 = (unit==undefined?"":unit);
      var properties1 = (properties==undefined?"":properties);
      $('#member').bootstrapTable({
          url: 'include/includedPHP/sixthcouncil.php?type=1&unit='+unit1+'&properties='+properties1+'',
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
            field: 'id',
            title: '序号',
            formatter:function(value, row, index){
                return (index+1);
            }
          }, {
             field: 'company',
             title: '单位'
          }, {
            field: 'daibiao',
            title: '单位代表'
          },{
            field: 'position',
            title: '单位职务/职称'
          },{
            field: 'councilposition',
            title: '六届理事会职务'
          },{
            field: 'nature',
            title: '单位性质'
          }],
      });
    }
    function search(){
      var unit = $('#txt_search_unit').val();
      var post = $('#post').val();
      return initTable(unit,post);
    }
    function add(){
      swal({
         title: '<h4><strong>添  加</strong></h4>',
         html:
           `
           <form class="form-horizontal">
  <div class="form-group">
    <label for="edit_company" class="col-sm-4 control-label"  >单位</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="edit_company">
    </div>
  </div>
  <div class="form-group">
    <label for="edit_daibiao" class="col-sm-4 control-label">单位代表</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="edit_daibiao" >
    </div>
  </div>
  <div class="form-group">
       <label for="edit_position" class="col-sm-4 control-label">单位职务/职称</label>
       <div class="col-sm-7">
          <input type="text" class="form-control" id="edit_position">
       </div>
  </div>
  <div class="form-group">
       <label for="edit_councilposition" class="col-sm-4 control-label">六届理事会职务</label>
       <div class="col-sm-7">
          <input type="text" class="form-control" id="edit_councilposition">
       </div>
  </div>
  <div class="form-group">
       <label for="edit_nature" class="col-sm-4 control-label">单位性质</label>
       <div class="col-sm-7">
          <input type="text" class="form-control" id="edit_nature">
       </div>
  </div>
</form>`,
         width:500,
         showCloseButton: true,
         showCancelButton: true,
         confirmButtonText:'确定',
         cancelButtonText:'取消'
    }).then(function(data){
      var company = $('#edit_company').val();
      var daibiao = $('#edit_daibiao').val();
      var position = $('#edit_position').val();
      var councilposition = $('#edit_councilposition').val();
      var nature = $('#edit_nature').val();
      if(data){
        $.ajax({
            url: "include/includedPHP/sixthcouncil.php?type=3&company='"+company+"'&daibiao='"+daibiao+"'&position='"+position+"'&councilposition='"+councilposition+"'&nature='"+nature+"'",
            type: "get",
            cache: false,
            contentType: false,
            processData: false,
            success: function(result){
              //不知道为啥会有一个折行符，这里就手动屏蔽了
              var result = result.replace(/\s\n/g,'');
              if(result=='add_success'){
                  swal({
                    title: '添加成功',
                    width: 400,
                    timer:2000,
                    confirmButtonText:'确定',
                    type:'success'
                 })
                 initTable();
                }else {
                  swal({
                    title: '错误',
                    text:'请稍后再试',
                    width: 400,
                    confirmButtonText:'确定',
                    type:'error'
                 })
                }
            }
        })
      }
    })
    }
    function edit(){
      var select= $("#member").bootstrapTable('getSelections'); 
      if(select.length !=1){
        swal({
            title: '提示',
            text: '请选择一条数据',
            width: 400,
            confirmButtonText:'确定',
            type:'warning'
        })
      }else{
        swal({
         title: '<h4><strong>编  辑</strong></h4>',
         html:
           `
           <form class="form-horizontal">
  <div class="form-group">
    <label for="edit_company" class="col-sm-4 control-label">单位</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="edit_company" value="`+select[0]['company']+`">
    </div>
  </div>
  <div class="form-group">
    <label for="edit_daibiao" class="col-sm-4 control-label">单位代表</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="edit_daibiao" value="`+select[0]['daibiao']+`">
    </div>
  </div>
  <div class="form-group">
       <label for="edit_position" class="col-sm-4 control-label">单位职务/职称</label>
       <div class="col-sm-7">
          <input type="text" class="form-control" id="edit_position" value="`+select[0]['position']+`">
       </div>
  </div>
  <div class="form-group">
       <label for="edit_councilposition" class="col-sm-4 control-label">六届理事会职务</label>
       <div class="col-sm-7">
          <input type="text" class="form-control" id="edit_councilposition" value="`+select[0]['councilposition']+`">
       </div>
  </div>
  <div class="form-group">
       <label for="edit_nature" class="col-sm-4 control-label">单位性质</label>
       <div class="col-sm-7">
          <input type="text" class="form-control" id="edit_nature" value="`+select[0]['nature']+`">
       </div>
  </div>
</form>`,
         width:500,
         showCloseButton: true,
         showCancelButton: true,
         confirmButtonText:'确定',
          cancelButtonText:'取消'
    }).then(function(data){
      if(data){
      var company = $('#edit_company').val();
      var daibiao = $('#edit_daibiao').val();
      var position = $('#edit_position').val();
      var councilposition = $('#edit_councilposition').val();
      var nature = $('#edit_nature').val();
      $.ajax({
            url: "include/includedPHP/sixthcouncil.php?type=2&id='"+select[0]['id']+"'&company='"+company+"'&daibiao='"+daibiao+"'&position='"+position+"'&councilposition='"+councilposition+"'&nature='"+nature+"'",
            type: "get",
            cache: false,
            contentType: false,
            processData: false,
            success: function(result){
                var result = result.replace(/\s\n/g,'');
                if(result=='edit_success'){
                  swal({
                    title: '编辑成功',
                    width: 400,
                    timer:2000,
                    confirmButtonText:'确定',
                    type:'success'
                 })
                 initTable();
                }else {
                  swal({
                    title: '错误',
                    text:'请稍后再试',
                    width: 400,
                    confirmButtonText:'确定',
                    type:'error'
                 })
                }
            }
       })
      }
    })
      }
    }

    function del(){
      var select= $("#member").bootstrapTable('getSelections'); 
      if(select.length !=1){
        swal({
            title: '提示',
            text: '请选择一条数据',
            width: 400,
            confirmButtonText:'确定',
            type:'warning'
        })
      }else{
        swal({
            title: '提示',
            text: '您确定删除'+select[0]['company']+'的纪录吗？删除后将不能恢复！',
            width: 400,
            confirmButtonText:'确定',
            cancelButtonText:'取消',
            type:'warning'
        }).then(function(data){
           if(data){
            $.ajax({
            url: "include/includedPHP/sixthcouncil.php?type=4&id='"+select[0]['id']+"'",
            type: "get",
            cache: false,
            contentType: false,
            processData: false,
            success: function(result){
                var result = result.replace(/\s\n/g,'');
                if(result=='del_success'){
                  swal({
                    title: '删除成功',
                    width: 400,
                    timer:2000,
                    confirmButtonText:'确定',
                    type:'success'
                 })
                 initTable();
                }else {
                  swal({
                    title: '错误',
                    text:'请稍后再试',
                    width: 400,
                    confirmButtonText:'确定',
                    type:'error'
                 })
                }
            }
       })
           }
        })
      }
    }

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
                <?php
                    $name = get_all_of_column_from_datatable('company_result', 'name');
                    $link = get_all_of_column_from_datatable('lishihui', 'link');
                    $num = count($name);
                    /*for ($i = 0; $i < $num; $i++) {
                        echo <<<EOD
<p><a href="$link[$i]">$name[$i]</a></p>
EOD;
                    }*/
                    
                    ?>
                    <div class="form-group col-xs-12" style="margin-top:15px">
                        <label class="control-label col-sm-2" style="text-align:right" for="txt_search_unit">单位</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" style="text-align:left;" id="txt_search_unit">
                        </div>
                        <label class="control-label col-sm-2" style="text-align:right;" for="post">单位性质</label>
                        <div class="col-sm-3">
                            <select class="form-control" style="text-align:left;" id="post">
                                <option value=''>全部</option>
                                <option value='设计院'>设计院</option>
                                <option value='企业-钢'>企业-钢</option>
                                <option value='企业-膜'>企业-膜</option>
                                <option value='企业-索具'>企业-索具</option>
                                <option value='研究院'>研究院</option>
                                <option value='高校'>高校</option>
                                <option value='质检'>质检</option>
                                <option value='企业-支座'>企业-支座</option>
                                <option value='企业-幕墙'>企业-幕墙</option>
                                <option value='企业-钢膜'>企业-钢膜</option>
                                <option value='企业-膜材'>企业-膜材</option> 
                            </select>
                        </div>
                        <div class="col-sm-2" style="text-align:right;">
                            <button type="button"  id="btn_query" class="btn btn-primary" onclick="search()">查询</button>
                        </div>
                    </div>                  
                    <?php
                    if($_SESSION['category']=='5'){
                  echo <<<EOD
                      <div id="toolbar" class="btn-group" style="margin-bottom:10px">
                      <button id="btn_add" type="button" class="btn btn-default" onclick="add()">
                         <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增
                      </button>
                      <button id="btn_edit" type="button" class="btn btn-default" onclick="edit()">
                         <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>修改
                      </button>
                      <button id="btn_delete" type="button" class="btn btn-default" onclick="del()">
                         <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>删除
                      </button>
                  </div>
EOD;
                    }
                    ?>
                <table id="member" style="margin-top:20px"></table>
                    <!-- <table class="content-table" border="0" cellpadding="0" cellspacing="0" align="center" >
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
                        </tbody></table> -->
                </div>
            </div>
        </div>

    </div>
</div>

<?php include "include/footer.php";?>

</body>