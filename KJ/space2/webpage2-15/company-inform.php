<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>空间结构分会</title>
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="../bootstrap-3.3.5-dist/css/bootstrap.min.css">
<!-- 下边这个文件是网上下载的，bootstrap多选框控件，还有后边的js文件一起下载的，下载地址：http://silviomoreto.github.io/bootstrap-select/ -->
<link rel="stylesheet" href="../bootstrap-3.3.5-dist/css/bootstrap-select.min.css">
<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="../bootstrap-3.3.5-dist/css/bootstrap-theme.min.css">
<script src="jquery-3.0.0.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="../bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
</head>
<body>
<form class='form-signin' action='webpage/inform.php' method='post'>
<table class='table table-bordered table-responsive text-center'>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>增加公告</lead></th>
        </tr>
        <tr>
            <td colspan='10'> 
			请选择公告的对象：
			<select class='form-control' name='category'>
             <option value='1'>企业用户</option>
              <option value='3'>专家用户</option>
              <option value='2'>秘书处用户</option>
              <option value='4'>理事会用户</option>
			  <option value='5'>管理员用户</option>
</select>
</td>
        </tr>
		<tr>
            <td colspan='4'> 公告内容</td>
            <td colspan='10'> <textarea type='text' class='form-control' name='content' rows=10></textarea></td>
        </tr>
		
</table>
	<div style='text-align: right;margin-bottom: 2%'>
	<input type='hidden'>
		<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
	</div>
</form>
</body>
</html>