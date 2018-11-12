 

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
                    <p><strong>中国钢结构协会空间结构分会 第二届网格结构专业组名单</strong></p>
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
                </div>
            </div>
        </div>

    </div>
</div>

<?php include "include/footer.php";?>

</body>