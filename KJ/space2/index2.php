<?php 
	session_start();
	include_once "lib.php";
	$id=$_SESSION['id']; //用户id
	if(!isset($id)&&!isset($category)) jump_to('login1.php'); //检查登录身份
	else if(isset($id)) {
		$db=create_database();
		$query="select * from user where id=$id"; //下面都是为了获得分类
		$result=$db->query($query);
		$row=$result->fetch_assoc();
		$category=$row['category'];
	}
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
<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="bootstrap-3.3.5-dist/js/offcanvas.css">
<script src="jquery-3.0.0.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script type='text/javascript'>
function $(id){return document.getElementById(id)}
window.onload = function(){
 $("ulside").onclick = function(e){
 var src = e?e.target:event.srcElement;
 if(src.tagName == "H4"){
  var next = src.nextElementSibling || src.nextSibling;
  next.style.display = (next.style.display =='block')?'none':'block';
 }
 }
}
</script>
				
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
			case 1:$nav1=2;$nav2=1;break;
			case 2:$nav1=30;break;
			case 3:$nav1=40;break;
			case 4:$nav1=50;break;
			case 5:$nav1=14;break; //其实应该进发布通知页面
			default:break;
		}
	}
?>
<body style=' padding-top:30px'>
<!--固定导航栏-->
<div class='container-fluid'>
<div class="navbar navbar-default navbar-fixed-top" id="navbar-title">
    <div class="container-fluid">
        <div class="navbar-header">
			<div class='navbar-brand'><img src='logo1.png'></div>
			<div class='navbar-brand' style='padding-top:20px'>空间结构分会</div>
        </div>
  

	<?php echo"
<div class='hidden-xs' style='float:right;margin-top:20px;'>
欢迎您，{$_SESSION['username']}</div>
</div>
<div class='visible-xs' style='float:right;margin-top:-30px;'>
欢迎您，{$_SESSION['username']}</div>
</div>
";
?></div></div>
<!-- 巨幕-->
<div class="jumbotron masthead hidden-xs">
	<!-- 标题图片 -->
		<img src="2.jpg" style="width:100%;margin:0px;padding:0px"/>
</div>
<div class="jumbotron masthead visible-xs">
		<img src="background_xs.png" style="width:100%;margin:0px;padding:0px"/>
</div>
<!-- 下面是导航栏-->
	<nav class="navbar navbar-custom">
		<div class="container-fluid">
		<div class='navbar-header'>
		<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
		<span style='float:left;padding-left:40%;'>
		<span  style='color:#fff;font-size:14px;float:left'>导&nbsp;&nbsp航&nbsp;&nbsp;</span>
		<span class='sr-only'>Toggle navigation</span>
		  <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
			</span>
          </button>
		  </div>
			<div id="navbar"class="navbar-collapse collapse aria-expanded='false'">
				<ul class="navbar-nav nav " >
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
							if(isset($row['link'])) echo "<li><a href='".$row['link']."'>".$row['func1_name']."</a></li>";
							else echo "<li style='white-space:nowrap' width:13%><a href='index.php?nav1=".$row['id_n1']."'>".$row['func1_name']."</a></li>"; //此处用#是不行的
						}
					?>
				</ul>
			</div>
		</div>
	</nav>
	<!--下面是通知栏-->
	<div id='dvvv' class='container-fluid' style='overflow: hidden;background-color:#f3f3f3;margin-top:-20px;'>
	<div id='dvvv1' style='padding:5px 0'>
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
	<!-- 这里插入用于显示下拉菜单的js-->
	
<!-- 下边是流式布局 -->
<div class="container container-fluid">
  <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-md-3 col-xs-12 sidebar-offcanvas" id='sidebar' role='navigation' style='padding-right:2%;'>
      <!--这里是左侧栏-->
	  <ul class='uu'>
     
		  <?php //这里和一级导航栏一样 这里是二级导航栏			
			$query="select * from nav_2 where id_n1=$nav1";
			$result=$db->query($query);
			$num_results=$result->num_rows;
			
			for($i=0;$i<$num_results;$i++)
			{
				$row=$result->fetch_assoc();
				if(isset($row['func2_name'])) //如果这一行有func2_name列
					echo " 
					<li style='list-style:none;margin-top:10px;font-size:16px;'class='ulside'><a href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."'>".$row['func2_name']."</a></li>"; //此处用#是不行的
					
				if(isset($row['query']))//如果这一行有query列
				{
					
					if ($row['query']==1)
					{
						if($_POST['change_key']=='yes')
		{			
				$key=$_POST['key'];
             $query="select uid from user where uid like '%$key%'";
			 
			$result=$db->query($query);
			
			$num_results=$result->num_rows;
			if($num_results==0)
				{
			 $query="select user.uid from user, join_form where user.id = join_form.id_p and join_form.c1 like '%$key%'";
			 $result=$db->query($query);
			 $num_results=$result->num_rows;
			 }
             for($i=0;$i<$num_results;$i++) 
						{
			$row2 = $result->fetch_assoc();
			echo"<li style='list-style:none;font-size:16px;'class='ulside'><a href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=".$row2['id']."'>
			 ".($row2['uid'])."</a></li>";
						} 
							}
	           else {
		echo"<div id='ulside'>";
               for($i1=5;$i1>0;$i1--)
      {
		echo"<h4>";
		switch ($i1)
		{
			case 5:echo"管理员用户";break;
			case 4:echo"常务理事";break;
			case 3:echo"专家用户";break;
			case 2:echo"秘书处用户";break;
			case 1:echo"企业用户";break; 
			default:break;
		}
		echo"</h4><div>";
		$query="select id,uid from user where category = $i1 ";
        $result=$db->query($query);
        $num_results=$result->num_rows;
	    for($i=0;$i<$num_results;$i++) 
						{
			$row2 = $result->fetch_assoc();
			echo"<a href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=".$row2['id']."'>
			 ".($row2['uid'])."</a>";
						} //结束小循环。小循环功能：姓名的打印
						echo"</div>";

		}
		echo"</div>";
					}//结束大循环。大循环的功能：将用户的信息分类。
					}

					else if($row['query']==2)
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
					echo"<div id='ulside'>";	
               for($i1=1;$i1<=7;$i1++)
      {
		switch ($i1)
		{
			case 1:echo"<h4>提交待审核</h4>";break;
			case 2:echo"<h4>等待秘书处审核</h4>";break;
			case 3:echo"<h4>秘书处已审核</h4>";break;
			case 4:
			echo"<h4><a href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=0' style='padding-left:0em;border:0px;!important;'>投递给理事会</a></h4>";break;
			case 5:echo"<h4><a href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=-1' style='padding-left:0em;border:0px;!important;'>理事会意见反馈</a></h4>";break; 
			case 6:echo"<h4>等待缴费证明</h4>";break;
			case 7:echo"<h4>缴费证明提交待审核</h4>";break;
			default:break;
		}
		echo"<div>";
		$query="select id,c1 from join_form where state = $i1 ";
        $result=$db->query($query);
        $num_results=$result->num_rows;
	    for($i=0;$i<$num_results;$i++) 
						{
			$row2 = $result->fetch_assoc();
			echo"<a href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=".$row2['id']."'>
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
				case 3:judge(mo1);break;
                case 4:judge(mo2);break;
				case 5:judge(wang1);break;
				case 6:judge(wang2);break;
				}
                    
						}		
				
				
	else{
				$query=$row['query'];//得到检索语句		
					$query=str_replace('$id',$id,$query);  //数据库语句中有的地方会用到一些变量，用到什么在这里加。
					//这里接收post数据，如果有key提交，在下段程序中将query改变
					if($_POST['change_key']=='yes')
					{
						$arr=explode('%',$query);//已%分隔，这时arr【0】和arr【2】是劈开的检索语句前后，arr【1】是关键字，这里是空的。注意这里%没有了
						$key=$_POST['key'];
						$query=$arr[0].'%'.$key.'%'.$arr[2];
					}		
					
					
					//echo "$query";
					
					$result=$db->query($query);
					$num_results=$result->num_rows;
					echo"<div class='list-group'>";
					for($i=0;$i<$num_results;$i++) //拾取每一个检索元素
					{

						$row2=$result->fetch_row(); //注意这里的读取函数！这个函数返回的数组只可以用下标提取！fetch_assoc只可以用关键字提取！
						echo "<li style='list-style:none;margin-top:10px;font-size:16px;'>
						<a href='index.php?nav1=".$nav1."&nav2=".$row['id_n2']."&index=".$row2[0]."'>".$row2[1]."</a></li>"; //数据库设计时一定要将第一列设置为id,第二列设置为可读的名字
					}
					echo"</div>";
					}
				}
			}
			
		  ?>
		  </div>
	  </ul>
    </div>


    <div class="col-md-10 col-xs-12" style='padding:0 6px;'>
	<p class="pull-right visible-xs">
	<button type='button' class='btn btn-primary btn-xs' data-toggle='offcanvas'>点击</button>
	</p>
      <!--这里是右侧栏-->
	  <?php
		$query="select * from nav_2 where id_n2=$nav2";
		$result=$db->query($query);
		$num_results=$result->num_rows;
		if($num_results==0) echo "<div style='text-align:center;'class='hidden-xs'><h3><span class='label label-info'>请从左侧选择项目</span></h3></div>";
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
 <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="bootstrap-3.3.5-dist/js/bootstrap-select.min.js"></script> 
<script src="bootstrap-3.3.5-dist/js/i18n/defaults-*.min.js""></script>
<script src="bootstrap-3.3.5-dist/js/offcanvas.js"></script> 
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>