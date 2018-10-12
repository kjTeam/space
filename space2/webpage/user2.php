<?php
if($_POST['addsend']=='yes')
{
	$uid=$_POST['uid'];
	 $tel=$_POST['tel'];
	 $eamil=$_POST['email'];
	 $name=$_POST['name'];
	 $category=$_POST['usercategory'];
	 $catestr=implode(',',$category); //将复选框选中的数组值转化为以逗号格式隔开的字符串。
	 $password=$_POST['password'];
	 $query="select * from user where uid='$uid'";
    $result=$db->query($query);
	$num_results1=$result->num_rows;
	if($num_results1!==0)
	echo"<script lanuage='javasript'>alert('已存在相同的用户名');location.href='';</script>";
	 $query2="insert into user (uid,tel,email,name,category,psw) values ('$uid','$tel'
	 ,'$eamil','$name','$catestr','$password')";
	 $result2=$db->query($query2);
	 if($result2)
		echo"<script lanuage='javasript'>alert('插入成功');location.href='';</script>";
	 else
		 echo $query2;
}
if($_POST['change']=='yes')
		{
			$edit_id=$_POST['edit_id'];
			$uid=$_POST['uid'];
			$psw=$_POST['psw1'];
			$psw2=$_POST['psw2'];
			if($psw==$psw2) //判断两个密码是否相同
			{
				$email=$_POST['email'];
				$name=$_POST['name'];
				$tel=$_POST['tel'];
				$db=create_database();
				$query="select * from user where id='$id_index'";
				$result=$db->query($query);
			
					$query="update user set name='$name',tel='$tel',psw='$psw',email='$email',uid='$uid' where id=$edit_id";
					$result=$db->query($query);
					if($result)
				{
					$flag=1;//修改成功！
				}
				else
				{
					$flag=2;//用于显示notice
				}
			}
			else
			{
				$flag=3;
			}
		}
		switch ($flag)
		{
			case 1:  echo"<script languang='javascript'>alert('修改成功')</script>";break;
			case 2: echo"<script languang='javascript'>alert('用户占用')</script>";break;
			case 3: echo "<script languang='javascript'>alert('两次密密码需相同')</script>";break;
			default:break;
		}
if($_POST['edit']=='yes')
{
  $edit_id=$_POST['edit_id'];
  $query="select * from user where id='$edit_id'";
  $result1=$db->query($query);
  $row=$result1->fetch_assoc(); 
echo "
<div class='container-fluid'>
<div class='col-xs-3' style='margin-bottom:10px;font-size:16px'>
<a href=''>/  用户信息  /  </a>".$row['name']."用户资料
</div>
<form class='form-signin' action='' method='post'  style='margin-top:10px;'>
<table class='table table-bordered table-responsive text-center'>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>用户资料</lead></th>
        </tr>
        <tr>
            <td colspan='2'> 用户名</td>
            <td colspan='10'> <input type='text' id='uid' name='uid' class='form-control' value=".$row['uid']." ></td>
        </tr>
		<tr>
            <td colspan='2'> 密码</td>
            <td colspan='10'> <input type='password' id='psw1'  name='psw1' class='form-control' value=".$row['psw']."></td>
        </tr>
		<tr>
            <td colspan='2'> 重复密码</td>
            <td colspan='10'> <input type='password' id='psw2' name='psw2' class='form-control' value=".$row['psw']."></td>
        </tr>
		<tr>
            <td colspan='2'> 邮箱</td>
            <td colspan='10'> <input type='text' id='email' name='email' class='form-control' value=".$row['email']."></td>
        </tr>
		<tr>
            <td colspan='2'> 真实姓名</td>
            <td colspan='10'> <input type='text' id='name' name='name' class='form-control' value=".$row['name']."></td>
        </tr>
		<tr>
            <td colspan='2'> 电话</td>
            <td colspan='10'> <input type='text' id='tel' name='tel' class='form-control' value=".$row['tel']."></td>
        </tr>
		
</table>
<div style='position:absolute;left:85%;margin-bottom:10px' class='col-md-1 hidden-xs'>
	<input type='hidden' value='yes' name='change'>
    <input type='hidden' value='$edit_id' name='edit_id'>
		<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
	</div></form></div>

";
exit();
}
if($_POST['del']=='yes')
  {
   $del_id=$_POST['del_id'];
   $query="delete from user where id='$del_id'";
   $result=$db->query($query);
   if($result)
	   echo"<script languang='javascript'>alert('删除成功')</script>";
	}
$query="select * from user limit 0,10";//查询前10行的信息，用于显示第一页
$result=$db->query($query);
$num_results=$result->num_rows;
$query="select * from user ";//查询所有的信息，这里用于计算页数和存储信息到数组
$result1=$db->query($query);
$num_results2=$result1->num_rows;//所有行数
 $num_results1=ceil($num_results2/10);//向上取整函数，计算出页数
 $paper_id1=0;//初始定义paper_id3是0
 $paper_id3=$num_results;
if($_POST['fs1']=='yes')//分页的实现，是对每一个a标签绑定一个js提交函数，通过提交的值来计算query,这里代码很糟糕，由于时间问题和数据量很小（大约30条左右），以后要更改，利用JQuery;
{
$paper_id=$_POST['fs'];
$paper_id1=$paper_id*10-10;
$paper_id2=$paper_id*10;
$query="select *from user limit $paper_id1,$paper_id2";
$result=$db->query($query);
$num_results=$result->num_rows;

$paper_id3=$paper_id1+$num_results;
}
if($_POST['check']=='yes')
{
  $check=$_POST['p1'];
	 $query="select * from user where uid like '%".$check."%' or name='%".$check."%'";
     $result1=$db->query($query);
     $num_results=$result1->num_rows;
	 if($num_results<=10)
      $paper_id3=$num_results;//查询出的结果行数
	  $num_results1=ceil($num_results/10);//$num_results1是显示的页码数，ceil是向上取整函数
}
for($i=0;$i<=$num_results2;$i++)
{
$row=$result1->fetch_assoc(); 
$category=$row['category'];
$category=str_replace(1,企业用户,$category);
$category=str_replace(2,秘书处用户,$category);
$category=str_replace(3,专家用户,$category);
$category=str_replace(4,理事会用户,$category);
$category=str_replace(5,管理,$category);
$category=str_replace(6,企业膜经理,$category);
$PA[$i]=$row['id'];
$PS[$i]=$row['uid'];
$PD[$i]=$row['name'];
$PF[$i]=$category;
//rename(iconv('UTF-8','GBK',"../index/upload/paper/".$PA[$i].""),iconv('UTF-8','GBK',"../index/upload/paper/".$PJ[$i].""));
}
echo"
<script language='javascript'> 
    window.onload = function()
	{   //表格隔行显示不同颜色 
      var tab = document.getElementById('tab'); 
      for(var i=0;i<tab.rows.length;i++)
          tab.rows[i].bgColor = (i%2==0) ? '#f9f9f9' : '#fff' ; 
    } 
	function fsubmit(obj){
    obj.submit();
     }
</script> 
";
echo"<div class='container-fluid hidden-xs noprint text-center' style='margin-top:21px'>

<span>
<form enctype='multipart/form-data' action='' method='post' >
<div id='toolbar' class='col-xs-1 col-xs-offset-7' >
                    <div class='btn btn-md btn-primary ' data-toggle='modal'  data-target='#addModal'><i class='glyphicon glyphicon-plus icon-white'></i>添加</div>
                </div>
				<div style='float:right;margin:0.1em 0.5em 0.4em 0'>
<input type='hidden' value='yes' name='check' id='check' >
<input type='text' name='p1' id='p1'></span>
<button class='btn btn-primary' style='margin-left:10px' type='submit' >搜索</button>
</form></div>


  
<table class='table table-responsive table-bordered text-center' id='tab' style='font-size:14px' >
<tbody>
<tr>
<td><strong>序号</strong></td>
<td><strong>唯一标识</strong></td>
<td><strong>用户名</strong></td>
<td><strong>姓名</strong></td>
<td><strong>用户类别</strong></td>
<td colspan='2'><strong>操作</strong></td>
</tr>
";
for($i=$paper_id1;$i<$paper_id3;$i++)
{
	$t=$i+1;
echo"
<tr>
<td>$t</td>
<td>".$PA[$i]."</td>
<td>".$PS[$i]."</td>
<td>".$PD[$i]."</td>
<td>".$PF[$i]."</td>
<td><form enctype='multipart/form-data' action='' method='post' >
<input type='hidden' value='yes' name='edit' id='edit'>
<input type='hidden' value='".$PA[$i]."' name='edit_id' id='edit_id'>
<button type='submit' class='btn'>修改</button>
</form>
</td>
<td><form enctype='multipart/form-data' action='' method='post' >
<input type='hidden' value='yes' name='del' id='del'>
<input type='hidden' value='".$PA[$i]."' name='del_id' id='del_id'>
<button type='submit' class='btn'>删除</button>
</form>
</td>

</tr>
";
}
echo"</tbody>
</table>
<nav aria-label='Page navigation'>
  <ul class='pagination'>";
  for($i=1;$i<=$num_results1;$i++)
  {
   echo"
    <li><a onclick='javascript:fsubmit(document.form$i);'>$i</a></li>
	";
	}
	 for($i=1;$i<=$num_results1;$i++)
  {
   echo"
    <form enctype='multipart/form-data' action='' method='post' id='form$i' name='form$i'><input type='hidden' id='fs' name='fs' value='$i'><input type='hidden' name='fs1' value='yes' ></form>
	";
	}
	echo"
  </ul>
</nav>
</div>
 <div class='modal fade' id='addModal' tabindex='-1' role='dialog' aria-hidden='true'>
                   <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>
                                    &times;
                                </button>
                                <h4 class='modal-title' id='myModalLabel'>添加记录</h4>
                            </div>
                            <div class='modal-body'>
                               <form enctype='multipart/form-data' action='' method='post'>
                                    <div class='form-group'>
                                        <input type='text' class='form-control' id='uid' name='uid' placeholder='用户名'>
                                    </div>
                                    <div class='form-group'>
                                        <input type='text' class='form-control' id='password' placeholder='密码' name='password'>
                                    </div>
									<div class='form-group'>
                                        <input type='text' class='form-control' id='email' placeholder='邮箱' name='email'>
                                    </div>
									<div class='form-group'>
                                        <input type='text' class='form-control' id='tel' placeholder='电话' name='tel'>
                                    </div>
									<div class='form-group'>
                                        <input type='text' class='form-control' id='name' placeholder='真实姓名' name='name'>
                                    </div>
									<div class='form-group'>
                                  <label class='control-label'><strong>身份选择</strong></label>
                                  <div>
                             <label class='checkbox-inline''>
                                <input type='checkbox' id='inlineCheckbox1' value='1' name='usercategory[]'> 企业
                             </label>
                             <label class=checkbox-inline>
                                <input type='checkbox' id='inlineCheckbox2' value='2' name='usercategory[]'> 秘书处
                             </label>
                             <label class='checkbox-inline'>
                                <input type='checkbox' id='inlineCheckbox3' value='3' name='usercategory[]'> 专家
                            </label>
                            <label class='checkbox-inline'>
                                <input type='checkbox' id='inlineCheckbox3' value='4' name='usercategory[]'> 理事会
                            </label>
                            <label class='checkbox-inline'>
                                <input type='checkbox' id='inlineCheckbox3' value='5' name='usercategory[]'> 管理员
                            </label>
                            <label class='checkbox-inline'>
                                <input type='checkbox' id='inlineCheckbox3' value='6' name='usercategory[]'> 膜经理
                            </label>
                            </div></div>
							<input type='hidden' name='addsend' value='yes'> 
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>取消</button>
                                <button type='submit' class='btn btn-primary'>提交</button> </form>
                            </div>
                        </div>
                    </div>
                </div>
  
            </div>
        </div>

";

?>