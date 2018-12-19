 

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
    <title>专家组</title>

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
          url: 'include/includedPHP/first_expert.php?type=1&unit='+unit1+'&properties='+properties1+'',
          classes:'table table-hover table-bordered',
          sidePagination: "client",           //分页方式：client客户端分页，server服务端分页（*）
          toolbar: '#toolbar',  
          pagination: true,
          pageNumber: 1,                       //初始化加载第一页，默认第一页
          pageSize: 5,                       //每页的记录行数（*）
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
             field: 'name',
             title: '姓名'
          },{
            field: 'position',
            title: '职务'
          },{
            field: 'zhicheng',
            title: '职称'
          },{
            field: 'company',
            title: '单   位'
          },{
            field: 'zhuanjia_position',
            title: '委员会职务'
          }],
      });
      
    }
    function search(){
      var unit = $('#txt_search_unit').val();
      var post = $('#txt_search_name').val();
      return initTable(unit,post);
    }
    function add(){
      swal({
         title: '<h4><strong>添  加</strong></h4>',
         html:
           `
           <form class="form-horizontal">
  <div class="form-group">
    <label for="edit_name" class="col-sm-4 control-label"  >姓名</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="edit_name">
    </div>
  </div>
  <div class="form-group">
       <label for="edit_position" class="col-sm-4 control-label">职务</label>
       <div class="col-sm-7">
          <input type="text" class="form-control" id="edit_position">
       </div>
  </div>
  <div class="form-group">
       <label for="edit_zhicheng" class="col-sm-4 control-label">职称</label>
       <div class="col-sm-7">
          <input type="text" class="form-control" id="edit_zhicheng">
       </div>
  </div>
  <div class="form-group">
       <label for="edit_company" class="col-sm-4 control-label">单位</label>
       <div class="col-sm-7">
          <input type="text" class="form-control" id="edit_company">
       </div>
  </div>
  <div class="form-group">
       <label for="edit_nature" class="col-sm-4 control-label">委员会职务</label>
       <div class="col-sm-7">
          <input type="text" class="form-control" id="zhuanjia_position">
       </div>
  </div>
</form>`,
         width:500,
         showCloseButton: true,
         showCancelButton: true,
         confirmButtonText:'确定',
         cancelButtonText:'取消'
    }).then(function(data){
      var name = $('#edit_name').val();
      var position = $('#edit_position').val();
      var zhicheng = $('#edit_zhicheng').val();
      var company = $('#edit_company').val();
      var zhuanjia_position = $('#zhuanjia_position').val();
      if(data){
        $.ajax({
            url: "include/includedPHP/first_expert.php?type=3&company='"+company+"'&name='"+name+"'&position='"+position+"'&zhicheng='"+zhicheng+"'&zhuanjia_position='"+zhuanjia_position+"'",
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
    <label for="edit_name" class="col-sm-4 control-label">姓名</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="edit_name" value="`+select[0]['name']+`">
    </div>
  </div>
  <div class="form-group">
    <label for="edit_position" class="col-sm-4 control-label">职务</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="edit_position" value="`+select[0]['position']+`">
    </div>
  </div>
  <div class="form-group">
    <label for="zhicheng" class="col-sm-4 control-label">职称</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="zhicheng" value="`+select[0]['zhicheng']+`">
    </div>
  </div>
  <div class="form-group">
       <label for="edit_company" class="col-sm-4 control-label">单位</label>
       <div class="col-sm-7">
          <input type="text" class="form-control" id="edit_company" value="`+select[0]['company']+`">
       </div>
  </div>
  <div class="form-group">
       <label for="zhuanjia_position" class="col-sm-4 control-label">专业组职务</label>
       <div class="col-sm-7">
          <input type="text" class="form-control" id="zhuanjia_position" value="`+select[0]['zhuanjia_position']+`">
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
      var name = $('#edit_name').val();
      var position = $('#edit_position').val();
      var zhicheng = $('#zhicheng').val();
      var zhuanjia_position = $('#zhuanjia_position').val();
      $.ajax({
            url: "include/includedPHP/first_expert.php?type=2&id='"+select[0]['id']+"'&company='"+company+"'&name='"+name+"'&zhicheng='"+zhicheng+"'&position='"+position+"'&zhuanjia_position='"+zhuanjia_position+"'",
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
            text: '您确定删除'+select[0]['name']+'的纪录吗？删除后将不能恢复！',
            width: 400,
            confirmButtonText:'确定',
            cancelButtonText:'取消',
            type:'warning'
        }).then(function(data){
           if(data){
            $.ajax({
            url: "include/includedPHP/first_expert.php?type=4&id='"+select[0]['id']+"'",
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







      <script>
    $(function(){
      initTable1();
    })
    function initTable1(unit,properties){
      $('#member1').bootstrapTable('destroy');
      var unit2 = (unit==undefined?"":unit);
      var properties2 = (properties==undefined?"":properties);
      $('#member1').bootstrapTable({
          url: 'include/includedPHP/first_expert.php?type=5&unit2='+unit2+'&properties2='+properties2+'',
          classes:'table table-hover table-bordered',
          sidePagination: "client",           //分页方式：client客户端分页，server服务端分页（*）
          toolbar: '#toolbar1',  
          pagination: true,
          pageNumber: 1,                       //初始化加载第一页，默认第一页
          pageSize: 5,                       //每页的记录行数（*）
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
             field: 'name',
             title: '姓名'
          },{
            field: 'position',
            title: '职务'
          },{
            field: 'zhicheng',
            title: '职称'
          },{
            field: 'company',
            title: '单   位'
          },{
            field: 'zhuanjia_position',
            title: '委员会职务'
          }],
      });
      
    }
    function search1(){
      var unit2= $('#txt_search_unit2').val();
      var post2 = $('#txt_search_name2').val();
      return initTable1(unit2,post2);
    }
    function add1(){
      swal({
         title: '<h4><strong>添  加</strong></h4>',
         html:
           `
           <form class="form-horizontal">
  <div class="form-group">
    <label for="edit_name2" class="col-sm-4 control-label"  >姓名</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="edit_name2">
    </div>
  </div>
  <div class="form-group">
       <label for="edit_position2" class="col-sm-4 control-label">职务</label>
       <div class="col-sm-7">
          <input type="text" class="form-control" id="edit_position2">
       </div>
  </div>
  <div class="form-group">
       <label for="edit_zhicheng2" class="col-sm-4 control-label">职称</label>
       <div class="col-sm-7">
          <input type="text" class="form-control" id="edit_zhicheng2">
       </div>
  </div>
  <div class="form-group">
       <label for="edit_company2" class="col-sm-4 control-label">单位</label>
       <div class="col-sm-7">
          <input type="text" class="form-control" id="edit_company2">
       </div>
  </div>
  <div class="form-group">
       <label for="zhuanjia_position2" class="col-sm-4 control-label">委员会职务</label>
       <div class="col-sm-7">
          <input type="text" class="form-control" id="zhuanjia_position2">
       </div>
  </div>
</form>`,
         width:500,
         showCloseButton: true,
         showCancelButton: true,
         confirmButtonText:'确定',
         cancelButtonText:'取消'
    }).then(function(data){
      var name2 = $('#edit_name2').val();
      var position2 = $('#edit_position2').val();
      var company2 = $('#edit_company2').val();
      var zhicheng2 = $('#edit_zhicheng2').val();
      var zhuanjia_position2 = $('#zhuanjia_position2').val();
      if(data){
        $.ajax({
            url: "include/includedPHP/first_expert.php?type=6&company2='"+company2+"'&name2='"+name2+"'&zhicheng2='"+zhicheng2+"'&position2='"+position2+"'&zhuanjia_position2='"+zhuanjia_position2+"'",
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
                 initTable1();
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
    function edit1(){
      var select= $("#member1").bootstrapTable('getSelections'); 
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
    <label for="edit_name2" class="col-sm-4 control-label">姓名</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="edit_name2" value="`+select[0]['name']+`">
    </div>
  </div>
  <div class="form-group">
    <label for="edit_position2" class="col-sm-4 control-label">职务</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="edit_position2" value="`+select[0]['position']+`">
    </div>
  </div>
  <div class="form-group">
    <label for="zhicheng2" class="col-sm-4 control-label">职称</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="zhicheng2" value="`+select[0]['zhicheng']+`">
    </div>
  </div>
  <div class="form-group">
       <label for="edit_company2" class="col-sm-4 control-label">单位</label>
       <div class="col-sm-7">
          <input type="text" class="form-control" id="edit_company2" value="`+select[0]['company']+`">
       </div>
  </div>
  <div class="form-group">
       <label for="zhuanjia_position2" class="col-sm-4 control-label">专业组职务</label>
       <div class="col-sm-7">
          <input type="text" class="form-control" id="zhuanjia_position2" value="`+select[0]['zhuanjia_position']+`">
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
      var company2 = $('#edit_company2').val();
      var name2 = $('#edit_name2').val();
      var position2 = $('#edit_position2').val();
      var zhicheng2 = $('#zhicheng2').val();
      var zhuanjia_position2 = $('#zhuanjia_position2').val();
      $.ajax({
            url: "include/includedPHP/first_expert.php?type=7&id2='"+select[0]['id']+"'&company2='"+company2+"'&name2='"+name2+"'&zhicheng2='"+zhicheng2+"'&position2='"+position2+"'&zhuanjia_position2='"+zhuanjia_position2+"'",
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
                 initTable1();
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

    function del1(){
      var select= $("#member1").bootstrapTable('getSelections'); 
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
            text: '您确定删除'+select[0]['name']+'的纪录吗？删除后将不能恢复！',
            width: 400,
            confirmButtonText:'确定',
            cancelButtonText:'取消',
            type:'warning'
        }).then(function(data){
           if(data){
            $.ajax({
            url: "include/includedPHP/first_expert.php?type=8&id='"+select[0]['id']+"'",
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
                 initTable1();
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
                    <span>专家库</span>
                </div>
            </div>
        </div>
        <div class="col-md-10 right-col">
            <div class="right">
                <div class="right-title">
                    <p><strong>中国钢结构协会空间结构分会 第一届专家组委员名单</strong></p>
                </div>
                <hr/>
                <div class="right-content">
                <?php
                    $name = get_all_of_column_from_datatable('company_result', 'name');
                    $link = get_all_of_column_from_datatable('lishihui', 'link');
                    $num = count($name);
                    ?>
                     <div class="form-group col-xs-12" style="margin-top:15px">
                     <div class="right-title"><p><strong>第一批</strong></p></div>
                        <label class="control-label col-sm-2" style="text-align:right" for="txt_search_unit">单位</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" style="text-align:left;" id="txt_search_unit">
                        </div>
                        <label class="control-label col-sm-2" style="text-align:right;" for="txt_search_name">姓名</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" style="text-align:left;" id="txt_search_name">
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

                <div class="form-group col-xs-12" style="margin-top:15px">
                <div class="right-title"><p><strong>第二批</strong></p></div>
                        <label class="control-label col-sm-2" style="text-align:right" for="txt_search_unit2">单位</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" style="text-align:left;" id="txt_search_unit2">
                        </div>
                        <label class="control-label col-sm-2" style="text-align:right;" for="txt_search_name2">姓名</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" style="text-align:left;" id="txt_search_name2">
                        </div>
                        <div class="col-sm-2" style="text-align:right;">
                            <button type="button"  id="btn_query" class="btn btn-primary" onclick="search1()">查询</button>
                        </div>
                    </div>  
                                        <?php
                    if($_SESSION['category']=='5'){
                  echo <<<EOD
                      <div id="toolbar1" class="btn-group" style="margin-bottom:10px">
                      <button id="btn_add" type="button" class="btn btn-default" onclick="add1()">
                         <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增
                      </button>
                      <button id="btn_edit" type="button" class="btn btn-default" onclick="edit1()">
                         <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>修改
                      </button>
                      <button id="btn_delete" type="button" class="btn btn-default" onclick="del1()">
                         <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>删除
                      </button>
                  </div>
EOD;
                    }
                    ?>
                <table id="member1" style="margin-top:20px"></table>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include "include/footer.php";?>

</body>