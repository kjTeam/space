<?php 
	session_start();
	include_once "lib.php";
	$id=$_SESSION['id']; 
	$category=$_SESSION['category']; //用户id
	if($id==null && $category==null)
		jump_to('login/index.html'); //检查登录身份
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>空间结构分会</title>
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">
<!-- 下边这个文件是网上下载的，bootstrap多选框控件，还有后边的js文件一起下载的，下载地址：http://silviomoreto.github.io/bootstrap-select/ -->
<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap-select.min.css">
<script src="bootstrap-3.3.5-dist/js/jquery-3.0.0.min.js"></script>
<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="../index/responsive/css/sweetalert2.min.css">
<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap-table.min.css">
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
 <script typet="text/javascript" src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script> 
<!-- 
 <script src="bootstrap-3.3.5-dist/js/jquery-3.0.0.min.js"></script>  -->
<script src="bootstrap-3.3.5-dist/js/bootstrap-table.min.js"></script>
<!-- Latest compiled and minified Locales -->
<script src="bootstrap-3.3.5-dist/js/bootstrap-table-zh-CN.min.js"></script>
<script src="../index/responsive/scripts/MyJS.js"></script>
<script src="../index/responsive/scripts/sweetalert2.min.js"></script>
<!--$(function (){
   var year = $('#year').selectindex;
   var option = $('#year').options[year];
   var no =option.val();
   var no1 = '+$no+';
   if (no == no1)
   $('#year').selectindex = no1;
   });-->
<script type='text/javascript'>
//自动关闭弹出框方法
    function alertAtuoClose(){
	swal({
            title: '提交成功',
            text: '3秒后自动关闭！',
			width:500,
            timer: 3000,
			type: "success",
			confirmButtonText: '确认'
        }).then(
            function () {
				window.location.href = '';
			},
            // handling the promise rejection
            function (dismiss) {
                if (dismiss === 'timer') {
                    console.log('I was closed by the timer')
                }
            }
        )
}
function alertAtuoClose2(){
	swal({
            title: '提交成功',
            text: '上传成功，等待管理员审核。3秒后自动关闭！',
			width:500,
            timer: 3000,
			confirmButtonText: '确认'
        }).then(
            function () {},
            // handling the promise rejection
            function (dismiss) {
                if (dismiss === 'timer') {
                    console.log('I was closed by the timer')
                }
            }
        )
}
function alertAtuoClose3(){
	swal({
            title: '修改成功',
            text: '3秒后自动关闭！',
			width:500,
            timer: 3000,
			confirmButtonText: '确认'
        }).then(
            function () {},
            // handling the promise rejection
            function (dismiss) {
                if (dismiss === 'timer') {
                    console.log('I was closed by the timer')
                }
            }
        )
}
function alertAtuoClose4(){
	swal({
            title: '提交成功',
            text: '3秒后自动关闭！',
			width:500,
            timer: 10000,
			confirmButtonText: '确认'
        }).then(
            function () {},
            // handling the promise rejection
            function (dismiss) {
                if (dismiss === 'timer') {
                    console.log('I was closed by the timer')
                }
            }
        )
}
function removeElement()
{
var state100 = document.getElementById("tab100").style.display;
if(state100 =='none')
  document.getElementById("tab100").style.display = 'table-row-group';
else
  document.getElementById("tab100").style.display = 'none';

	
}
function removeElement1()
{
var state100 = document.getElementById("tab101").style.display;
if(state100 =='none')
  document.getElementById("tab101").style.display = 'table-row-group';
else
  document.getElementById("tab101").style.display = 'none';

	
}


function $(id){return document.getElementById(id)}
window.onload = function(){
 $("ulside").onclick = function(e){
 var src = e?e.target:event.srcElement;
 if(src.tagName == "H5"){
  var next = src.nextElementSibling || src.nextSibling;
  next.style.display = (next.style.display =='block')?'none':'block';
 }
 }
}
function changeState(a)
 {
  var obj = document.getElementById(a.id);
  var index=obj.selectedIndex ;
  var selectedValue=obj.options[index].value;
   
  if(selectedValue==2)
	  alert('您选择的是不同意，必须填写意见');
}
function DP() {
if (window.print)
{
var Div1 = document.all.Div1.innerHTML;
var Div2 = document.all.Div2.innerHTML;

window.print();
window.history.go(0);
}
}
        document.onkeydown = function(event) {  
            var target, code, tag;  
            if (!event) {  
                event = window.event; //针对ie浏览器  
                target = event.srcElement;  
                code = event.keyCode;  
                if (code == 13) {  
                    tag = target.tagName;  
                    if (tag == "TEXTAREA") { return true; }  
                    else { return false; }  
                }  
            }  
            else {  
                target = event.target; //针对遵循w3c标准的浏览器，如Firefox  
                code = event.keyCode;  
                if (code == 13) {  
                    tag = target.tagName;  
                    if (tag == "INPUT") { return false; }  
                    else { return true; }   
                }  
            }  
		};
</script>
	
<style type="text/css" media=print>
.noprint{display : none;}
.print1{display:block;}
 td{padding:5px;}
.table{
font-size:16px;
}
</style>
<style type="text/css" media=screen>
.print1{display:none;}
textarea{outline:none;resize:none;}
}
</style>
 <style type="text/css">
    div, ul, li {
    
    list-style-type: none;
    }
    #Over {
    position: absolute;
    width: 100%;
    z-index: 100;
    left: 0px;
    top: 0px;
    }
    .img1 {
    width:50%;
    background-color: #FFF;
    height:30%;
    border-top-width: 1px;
    border-right-width: 1px;
    border-bottom-width: 1px;
    border-left-width: 1px;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    }
    .content {
    text-align: center;
    
    margin-right: auto;
    margin-left: auto;
    }
    .EnlargePhoto {
    cursor: pointer;
    }
    .TempContainer {
    position: absolute;
    z-index: 101;
    margin-right: 0px;
    margin-left: 0px;
    text-align: center;
    width: 100%;
    cursor: pointer;
    }
	.must_wirte{
	 color:red;
    }
    </style>
</head>
<?php
	//nav1是目前选得一级导航 将get方法放在文件最上面会报错	nav2是二级导航，在左边栏使用
	$nav1=$_GET['nav1'];
	if(!isset($nav1)) $nav1=0;
	$nav2=$_GET['nav2'];
	if(!isset($nav2)) $nav2=0;
	if(($nav1==0)&&($nav2==0)) //首次进入
	{
		switch ($category)
		{
			case 1:$nav1=2;break;
			case 2:$nav1=30;break;
			case 3:$nav1=40;break;
			case 4:$nav1=50;break;
			case 5:$nav1=57;break; 
			case 6:$nav1=60;break;//其实应该进发布通知页面
			default:break;
		}
	}
?>
<body style='padding-top:30px'>
<!--固定导航栏-->
<div class='container-fluid'>
<div class="navbar navbar-default navbar-fixed-top" id="navbar-title">
    <div class="container-fluid">
        <div class="navbar-header">
		 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
			<div class='navbar-brand'><img src='logo1.png'></div>
			<div class='navbar-brand' style='padding-top:20px'>空间结构分会
			<?php
			$category=$_SESSION['category'];
			 
			 ?></div></div>
			<?php 
			if($category!=5)
			echo"
	            <div class='collapse navbar-collapse' id='navbar-ex-collapse'>
                    <ul class='nav navbar-nav navbar-right' >
                        <li class='dropdown'>
                           <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' style='font-size:1em'>欢迎您,{$_SESSION['username']}<span class='caret'></span></a>
                           <ul class='dropdown-menu'>
                               <li><a href='../index/responsive/index.php'>返回首页</a></li>
                               <li role='separator' class='divider'></li>
                               <li><a href='../index/logout.php'>退出</a></li>
                           </ul>
                     </li>
                </div>
              ";
			?>
			<?php 
			if($category==5)
			echo"
	            <div class='collapse navbar-collapse' id='navbar-ex-collapse'>
                    <ul class='nav navbar-nav navbar-right' >
                        <li class='dropdown'>
                           <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' style='font-size:1em'>欢迎您,{$_SESSION['username']}<span class='caret'></span></a>
                           <ul class='dropdown-menu'>
						       <li><a href='../index/manage-res.php'>发布通知</a></li>
                               <li role='separator' class='divider'></li>
						       <li><a href='../index/responsive/index.php'>返回首页</a></li>
							   <li role='separator' class='divider'></li>
							   <li><a href='../index/logout.php'>退出</a></li>
							
						   </ul>
                     </li>
                </div>
              ";
			?>
</div></div></div>
<!-- 巨幕-->
<div class="jumbotron masthead visible-xs noprint">
		<img class='noprint' src="background_xs.jpg" style="width:100%;margin:0px;padding:0px;"/>
</div>
<div class="jumbotron masthead hidden-xs noprint">
		<img class='noprint' src="2.jpg" style="width:100%;margin:0px;padding:0px;"/>
</div>

<!-- 下面是导航栏-->
	<nav class="navbar navbar-custom">
		<div class="container-fluid">
		<div class='navbar-header'>
		<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
		<span style='float:left;padding-left:40%;'>
		<span  style='color:#fff;font-size:14px;float:left'>导&nbsp;&nbsp;航&nbsp;&nbsp;</span>
		<span class='sr-only'>Toggle navigation</span>
		  <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
			</span>
          </button>
		  </div>
			<div id="navbar"class="navbar-collapse noprint collapse aria-expanded='false'">
				<ul class="navbar-nav nav " style="width:100%">
					<!-- 下面存放导航栏功能栏目，下面是一个模板 <li><a href="#">功能</a></li> -->
					<?php
						$db=create_database();
						$query="select * from nav_1 where category=$category";
						$result=$db->query($query);
						$num_results=$result->num_rows;
						for($i=0;$i<$num_results;$i++)
						{
							$row=$result->fetch_assoc();
							//foreach ($row as $key=>$age) { echo $key,': ',$age,'<br />'; } 
							if(isset($row['link'])) echo "<li style='white-space:nowrap;width:10%;text-align:center'><a href='".$row['link']."'>".$row['func1_name']."</a></li>";
							else echo "<li style='white-space:nowrap;width:10%;text-align:center' ><a href='index.php?nav1=".$row['id_n1']."'>".$row['func1_name']."</a></li>"; //此处用#是不行的
						}
					?>
				</ul>
			</div>
		</div>
	</nav>
	<!--下面是通知栏-->
	<!--
	<div id='dvvv' class='container-fluid' style='overflow: hidden;background-color:#f3f3f3;margin-top:-20px;'>
	<div id='dvvv1' style='padding:5px 0' class='noprint'>
	通知：
	<?php
      $db=create_database();
      $query="select * from inform2 where category=$category";
	  $result=$db->query($query);
	   $row=$result->fetch_assoc();
	  if($row)
	  {
	  echo stripslashes($row['content']);
	  }
	  else
		  echo "暂无";
		  
	?>
	</li>
	</ul></div>
	 <div id='dvvv2'>
   </div>                                                 
	</div>
	-->
	<!-- 这里插入用于显示下拉菜单的js-->
	
<!-- 下边是流式布局 -->
<div class="container-fluid">
  <div class="row-fluid">
    <div class="col-md-3 col-xs-11" style='padding-right:2%;'>
      <!--这里是左侧栏-->
	  <ul class='uu'>
     
		  <?php //这里和一级导航栏一样 这里是二级导航栏			
			$query="select * from nav_2 where id_n1=$nav1";
			$result=$db->query($query);
			$num_results=$result->num_rows;
			echo"<div class='list-group noprint'style='margin-top:15px;'>";
			for($i=0;$i<$num_results;$i++)
			{
				$row=$result->fetch_assoc();
				if(isset($row['func2_name'])) //如果这一行有func2_name列
					echo " 
					<a class='list-group-item' style='white-space: pre-wrap;word-wrap: break-word;' href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."'>".$row['func2_name']."";
                     if(($category==1 || $category==6) && ($nav1!=3 && $nav1!=64))//用户是企业用户或者企业膜经理时，且不是查看那一栏。后面显示该活动是否开通。
				     {
						 $query="select * from event where title = '$row[func2_name]'";
						 $result_event=$db->query($query);//这是搜索event数据库中各个事件的状态
                         $row_event=$result_event->fetch_assoc(); 
						 switch($row_event['state'])
						 {
							 case 0:echo"<span class='badge' >未开通</span>";break;
                             case 1:echo"<span class='badge' style='background:green'>已开通</span>";break;
                             default:null;	
						 }
						 
 				     }
					echo"</a>"; //此处用#是不行的
					
				if(isset($row['query']))//如果这一行有query列
				{
					//这里插入一个检
					//结束
					
					if($row['query']==2)
					{
						if($_POST['change_key']=='yes')
	                 	  {			
				            $key=$_POST['key'];
                            $query="select c1 from join_form where c1 like '%$key%'";
			                $result=$db->query($query);
			                $num_results=$result->num_rows;
			                if($num_results==0)
				              {
			                    $query="select join_form.c1 from join_form,user where user.id = join_form.id_p and user.uid like '%$key%'";
			                    $result=$db->query($query);
			                    $num_results=$result->num_rows;
			                  }
                            for($i=0;$i<$num_results;$i++) 
						       {
			                     $row2 = $result->fetch_assoc();
			                     echo"<a href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=".$row2['id']."'>
			                     ".($row2['uid'])."</a>";
						       } 
							}
	                        else {
								  echo"<div id='ulside' class='list-group'>";	
								  echo"<a class='list-group-item' href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=-4'> 汇总名单</a>";
                                  for($i1=1;$i1<=9;$i1++)
                                     {
				                       $query="select id,c1 from join_form where state = $i1 ";
                                       $result=$db->query($query);
                                       $num_results=$result->num_rows;
		                               switch ($i1)
		                               {
			                             case 1:echo"<h5 class='list-group-item' > 提交待审核<span class='badge'>".$num_results."</span></h5>";break;
			                            //  case 2:echo"<h5 class='list-group-item' > 等待秘书处审核<span class='badge'>".$num_results."</span></h5>";break;
			                             case 3:echo"<h5 class='list-group-item' > 秘书处已审核<span class='badge'>".$num_results."</span></h5>";break;
			                             case 4:
			                             echo"<a class='list-group-item' href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=0'>投递给理事会	<span class='badge'>".$num_results."</span></a>";break;
			                             case 5:echo"<a class='list-group-item' href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=-1'>理事会意见反馈<span class='badge'>".$num_results."</span></a>";break; 
			                             case 6:echo"<h5 class='list-group-item' > 等待缴费证明<span class='badge'>".$num_results."</span></h5>";break;
			                             case 7:echo"<h5 class='list-group-item' >缴费证明提交待审核<span class='badge'>".$num_results."</span></h5>";break;
			                             case 8:echo"<a class='list-group-item' href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=-2'> 已入会<span class='badge'>".$num_results."</span></a>";break;
			                             case 9:echo"<a class='list-group-item' href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=-3'> 未通过审核<span class='badge'>".$num_results."</span></a>";break;
			                            default:break;
		                               }
		                        echo"<div>";
	                            for($i=0;$i<$num_results;$i++) 
		                     	{
			                     $row2 = $result->fetch_assoc();
			                     echo"<a class='list-group-item' href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=".$row2['id']."'>
			                     ".($row2['c1'])."</a>";				
			                    }
							   echo"</div>";
		
		}
		echo"</div>";
					}
					}
			
	else if($row['query']==3||$row['query']==4||$row['query']==5||$row['query']==6)
						{
		    switch ($row['query'])
				{
				case 3:judge('mo1_zhuanxiang;mo1_chengbao');break;
                case 4:judge(mo2);break;
				case 5:judge(wang1);break;
				case 6:judge(wang2);break;
				}
                    
						}	
	else if($row['query']==7)
		{
        echo"<div id='ulside' class='list-group'>";
	    echo"<h5 class='list-group-item'>培训班报名</h5>";	
	    echo"<div>";
		$query="select id,c1 from pm1 where state <=3 ";
        $result=$db->query($query);
        $num_results=$result->num_rows;
			for($i = 0;$i<$num_results;$i++){
				$row2 = $result->fetch_assoc();				
				echo"<a class='list-group-item' href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=".$row2['id']."'>
				".($row2['c1'])."</a>";			
			}
			echo"</div>";
            for($i1=4;$i1<=10;$i1++)
            {	   
				//echo"<h5 class='list-group-item'>";   

		        switch ($i1)
		        {
			      case 4:echo"<h5 class='list-group-item'>未通过培训</h5>";$query="select id,c1 from pm1 where state = $i1";$q=58;break;
			      case 5:echo"<h5 class='list-group-item'>已通过培训</h5>";$query="select id,c1 from pm1 where state = $i1";$q=58;break;
			      case 6:
			      echo"<h5 class='list-group-item'>项目经理报名</h5>";$query="select id,c1 from pm1 where state2 = 1";$q=59;break;
			      case 7:echo"<h5 class='list-group-item'>等待专家打分</h5>";$query="select id,c1 from pm1 where state2 = 2";$q=59;break;
			      case 8:echo"<h5 class='list-group-item'>专家意见</h5>";$query="select id,c1 from pm1 where state2 = 3";$q=59;break;
			      case 9:echo"<h5 class='list-group-item'>审核通过</h5>";$query="select id,c1 from pm1 where state2 = 4";$q=59;break;
			      case 10:echo"<h5 class='list-group-item'>审核未通过</h5>";$query="select id,c1 from pm1 where state2 = 5";$q=59;break;
			     default:break;
	       	    }	   
		         echo"<div>";
                 $result=$db->query($query);
                 $num_results=$result->num_rows;
	             for($i=0;$i<$num_results;$i++) 
				   {
			         $row2 = $result->fetch_assoc();
			         echo"<a class='list-group-item' href='index.php?nav1=".$nav1."&nav2=$q&index=".$row2['id']."'>
			          ".($row2['c1'])."</a>";
				    }
			echo"</div>";
		    }
     echo"</div>";
	}
	else if($row['query']==8)
		{
        echo"<div id='ulside' class='list-group'>";
            for($i1=1;$i1<=10;$i1++)
            {	   
		        switch ($i1)
		        {
			      case 1:echo"<h5 class='list-group-item'>已提交申请</h5>";break;
				  case 2:echo"<h5 class='list-group-item'>专家委员会反馈</h5>";break;
			      case 3:echo"<a class='list-group-item' href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=-2'>投递给理事会</a>";break;
			      case 4:
			      echo"<h5 class='list-group-item'>理事会反馈</h5>";break;
			      case 5:
				  echo"<a class='list-group-item' href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=-1'>汇总名单</a>";break;
				  default:break;
	       	    }	   
		         echo"<div>";
				 $query="select * from expertjoin where state = $i1";
                 $result=$db->query($query);
                 $num_results=$result->num_rows;
	             for($i=0;$i<$num_results;$i++) 
				   {
			         $row2 = $result->fetch_assoc();
			         echo"<a class='list-group-item' href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=".$row2['id']."'>
			          ".($row2['c1'])."</a>";
				    }
			echo"</div>";
		    }
     echo"</div>";
	}else if($row['query']=='sercret_checkmo1'){
		echo" <div class='list-group'style='margin-top:15px;'>";
		$query="select * from mo1_zhuanxiang where state = 2 or state = 3 ";
        $result=$db->query($query);
		$num_results=$result->num_rows;
        for($i=0;$i<$num_results;$i++){
			$row2=$result->fetch_row();
			echo"<a href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=".$row2[0]."&type=mo1_zhuanxiang' class='list-group-item' style='white-space: pre-wrap;word-wrap: break-word;'>".$row2[1].""; //数据库设计时一定要将第一列设置为id,第二列设置为可读的名字";
		    echo"<span class='badge'>专项设计</span>";
			$query1="select result from secret where id_p=$id and id_f=$row2[0] and form_category = '2_1'";
			$result1=$db->query($query1);					
			$num_results1=$result1->num_rows;
			$row_r=$result1->fetch_assoc();
			echo $row_r[result];
			if($row_r['result']!=''){
				echo"<span><img src='right.png'>已审核</span>";
			}
			echo"</a>";
		}
        $query="select * from mo1_chengbao where state = 2 or state = 3 ";
        $result=$db->query($query);
		$num_results=$result->num_rows;
        for($i=0;$i<$num_results;$i++){
			$row2=$result->fetch_row();
			echo"<a href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=".$row2[0]."&type=mo1_chengbao' class='list-group-item' style='white-space: pre-wrap;word-wrap: break-word;'>".$row2[1].""; //数据库设计时一定要将第一列设置为id,第二列设置为可读的名字";
		    echo"<span class='badge'>工程承包</span>";
			$query1="select result from secret where id_p=$id and id_f=$row2[0] and form_category = '2_2'";
			$result1=$db->query($query1);					
			$num_results1=$result1->num_rows;
			$row_r=$result1->fetch_assoc();
			if($row_r['result']!=''){
				echo"<span><img src='right.png'>已审核</span>";
			}
			echo"</a>";
		}
	}else if($row['query'] == 'expert_check'){
		echo" <div class='list-group'style='margin-top:15px;'>";
		$query="select * from mo1_zhuanxiang where state = 4 or state = 5 ";
        $result=$db->query($query);
		$num_results=$result->num_rows;
        for($i=0;$i<$num_results;$i++){
			$row2=$result->fetch_row();
			echo"<a href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=".$row2[0]."&type=mo1_zhuanxiang' class='list-group-item' style='white-space: pre-wrap;word-wrap: break-word;'>".$row2[1].""; //数据库设计时一定要将第一列设置为id,第二列设置为可读的名字";
		    echo"<span class='badge'>专项设计</span>";
			$query1="select s1 from expert where id_p=$id and id_f=$row2[0] and form_category = '2_1'";
			$result1=$db->query($query1);					
			$num_results1=$result1->num_rows;
			$row_r=$result1->fetch_assoc();
			if($row_r['s1']!=''){
				echo"<span><img src='right.png'>已审核</span>";
			}
			echo"</a>";
		}
        $query="select * from mo1_chengbao where state = 4 or state = 5 ";
        $result=$db->query($query);
		$num_results=$result->num_rows;
        for($i=0;$i<$num_results;$i++){
			$row2=$result->fetch_row();
			echo"<a href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=".$row2[0]."&type=mo1_chengbao' class='list-group-item' style='white-space: pre-wrap;word-wrap: break-word;'>".$row2[1].""; //数据库设计时一定要将第一列设置为id,第二列设置为可读的名字";
		    echo"<span class='badge'>工程承包</span>";
			$query1="select result from expert where id_p=$id and id_f=$row2[0] and form_category = '2_2'";
			$result1=$db->query($query1);					
			$num_results1=$result1->num_rows;
			$row_r=$result->fetch_assoc();
			if($row_r['s1']!=''){
				echo"<span><img src='right.png'>已审核</span>";
			}
			echo"</a>";		
		}
		
		
		echo"</div>";
	
	
	}
	else{
				$query=$row['query'];//得到检索语句	 现在没有用了	
					$query=str_replace('$id',$id,$query);  //数据库语句中有的地方会用到一些变量，用到什么在这里加。
					//这里接收post数据，如果有key提交，在下段程序中将query改变
					if($_POST['change_key']=='yes')
					{
						$arr=explode('%',$query);//已%分隔，这时arr【0】和arr【2】是劈开的检索语句前后，arr【1】是关键字，这里是空的。注意这里%没有了
						$key=$_POST['key'];
						$query=$arr[0].'%'.$key.'%'.$arr[2];
					}		
					$result=$db->query($query);
					$num_results=$result->num_rows;
					echo" <div class='list-group'style='margin-top:15px;'>";
					for($i=0;$i<$num_results;$i++) //拾取每一个检索元素
					{
						$row2=$result->fetch_row(); //注意这里的读取函数！这个函数返回的数组只可以用下标提取！fetch_assoc只可以用关键字提取！
						echo "
                      
						<a href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=".$row2[0]."' class='list-group-item' style='white-space: pre-wrap;word-wrap: break-word;'>".$row2[1].""; //数据库设计时一定要将第一列设置为id,第二列设置为可读的名字
						if($category==2)
						{
						 $query1="select * from secret where id_p=$id and id_f=$row2[0] and form_category = 1";
						 $result1=$db->query($query1);					
						 $num_results1=$result1->num_rows;
						 if($num_results1!=0)
							{
						     echo"<span style='float:right'><img src='right.png'>已审核</span>";
						    }
						}
						//秘书处审核膜评审和膜复审的时候，需要在后面标注，是专项设计还是工程承包
						
						echo"</a>";
					}
					echo"</div>";
					}
			echo"</div>";	}
			}
			
		  ?>
		  </div>
	  </ul>
    </div>


    <div class="col-md-9 col-xs-12" >
      <!--这里是右侧栏-->
	  <?php
		$query="select * from nav_2 where id_n2=$nav2";
		$result=$db->query($query);
		$num_results=$result->num_rows;
		if($num_results==0) 
		{
		if($category==1 || $category==6)
		include_once"index_include.php";
        }
		for($i=0;$i<$num_results;$i++) //只进入一次，或者一次都不进入
		{
			$row=$result->fetch_assoc();
			if(isset($row['link']))			
				include $row['link'];
		}
	  ?>
    </div>
  </div>
</div>

 
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->

<!-- 下面这两个文件是select控件 -->
<script src="bootstrap-3.3.5-dist/js/bootstrap-select.min.js"></script> 
<!-- <script typet="text/javascript" src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>  -->
<!-- <script src="bootstrap-3.3.5-dist/js/i18n/defaults-*.min.js""></script> -->
</body>
</html>