 <?php //共41个参数  p42为隐藏参数

 define('ROOT',dirname(__FILE__)); //用于上传文件

if($_POST["p42"]=='join') //检测是否是此表单提交,这里并不需要检查是否提交了营业执照
{
		for($i=1;$i<42;$i++)
		{
			$str="p".$i;
			$PA[$i]=$_POST[$str];
			
		} 
		//这里要先新建一个user，用户名是企业名字（$PA[1]）	,密码是默认的123456
		$name=$PA[1];
		if(ifthereis('user',"uid='$name'"))
		{
			echo "<h3><span class='label label-danger'>企业用户名存在！插入失败，请刷新！</span></h3>";
			exit();
		}
		$db=create_database();
		$query="insert into user (category,psw,uid) values (1,'123456','$name')";
		$result=$db->query($query);//用户已建号，可以用企业名字，123456登录
		$query="select id from user where uid='$name'";
		$result=$db->query($query);
		$row=$result->fetch_assoc(); 
		$id_temp=$row['id'];	//获得新插入的用户id

		$result=insert("join_form",41,$PA,$id_temp);	//注意这里插入的是state为1的企业信息
		if($result) 
		{
			echo "<h3><span class='label label-success'>保存成功！</span></h3>";
			$query="select id from join_form where id_p='$id_temp' ";
			$result=$db->query($query);
			$row=$result->fetch_assoc(); //获得新插入的id
			$id_f=$row['id'];
			$upfile=ROOT."\join_form\\$id_f.jpg";   //保存上传文件的路径：index所在目录/webpage/join_form/id号
			//echo $upfile;
			move_uploaded_file($_FILES['userfile']['tmp_name'],$upfile);  //移动该文件至指定目录 如果没有上传文件这里不会生成新文件
		}
		else echo "<h3><span class='label label-danger'>新建企业信息出现问题，请仔细查看企业信息</span></h3>";
}



//下面是表单，注意action一定要为空才可以送回当前页面进行处理
echo "
<div class='container-fluid hidden-xs'>
<form enctype='multipart/form-data' action='' method='post'>
	<h3 class='text-center'>中国钢结构协会空间结构分会团体会员入会申请表</h3>
	<br/>
    <table class='table table-bordered table-responsive text-center'>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>一、单 位 基 本 情 况</lead></th>
        </tr>
        <tr>
            <td colspan='2'>单位名称（公章）</td>
            <td colspan='4'><input type='text' class='form-control' name='p1'> </td>
            <td colspan='2'>企事业级别</td>
            <td colspan='4'><input type='text' class='form-control' name='p2'></td>
        </tr>
        <tr>
            <td colspan='2'>单位性质</td>
            <td colspan='4'><input type='text' class='form-control' name='p3'> </td>
            <td colspan='2'>产权所有</td>
            <td colspan='4'><input type='text' class='form-control' name='p4'></td>
        </tr>
        <tr>
            <td colspan='2'>注册资金</td>
            <td colspan='4'><input type='text' class='form-control' name='p5'> </td>
            <td colspan='2'>上级单位</td>
            <td colspan='4'><input type='text' class='form-control' name='p6'></td>
        </tr>
        <tr>
            <td colspan='2' rowspan='2'>负责人姓名</td>
            <td colspan='2' rowspan='2'><textarea type='text' class='form-control' rows='3' name='p7'></textarea></td>
            <td colspan='2'>职务</td>
            <td colspan='2'><input type='text' class='form-control' name='p8'></td>
            <td colspan='2'>电话传真</td>
            <td colspan='2'><input type='text' class='form-control' name='p9'></td>
        </tr>
        <tr>
            <td colspan='2'>职称</td>
            <td colspan='2'><input type='text' class='form-control' name='p10'></td>
            <td colspan='2'>手机</td>
            <td colspan='2'><input type='text' class='form-control' name='p11'></td>
        </tr>
        <tr>
            <td colspan='2' rowspan='2'>联系人（代表）姓名</td>
            <td colspan='2' rowspan='2'><textarea type='text' class='form-control' rows='3' name='p12'></textarea></td>
            <td colspan='2'>职务</td>
            <td colspan='2'><input type='text' class='form-control' name='p13'></td>
            <td colspan='2'>电话传真</td>
            <td colspan='2'><input type='text' class='form-control' name='p14'></td>
        </tr>
        <tr>
            <td colspan='2'>职称</td>
            <td colspan='2'><input type='text' class='form-control' name='p15'></td>
            <td colspan='2'>手机</td>
            <td colspan='2'><input type='text' class='form-control' name='p16'></td>
        </tr>
        <tr>
            <td colspan='2'>通讯地址</td>
            <td colspan='6'><input type='text' class='form-control' name='p17'></td>
            <td colspan='2'>邮编</td>
            <td colspan='2'><input type='text' class='form-control' name='p18'></td>
        </tr>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>二、单 位 规 模</lead></th>
        </tr>
        <tr>
            <td colspan='2'>创立时间</td>
            <td colspan='4'><input type='text' class='form-control' name='p19'> </td>
            <td colspan='2'>从事空间结构时间</td>
            <td colspan='4'><input type='text' class='form-control' name='p20'></td>
        </tr>
        <tr>
            <td colspan='2'>占地面积</td>
            <td colspan='4'><input type='text' class='form-control' name='p21'> </td>
            <td colspan='2'>建 筑 面 积</td>
            <td colspan='4'><input type='text' class='form-control' name='p22'></td>
        </tr>
        <tr>
        <td colspan='2'>资金总额</td>
        <td colspan='2'><input type='text' class='form-control' name='p23'> </td>
        <td colspan='2'>固定资产</td>
        <td colspan='2'><input type='text' class='form-control' name='p24'></td>
        <td colspan='2'>流动资金</td>
        <td colspan='2'><input type='text' class='form-control' name='p25'></td>
    </tr>
        <tr>
            <td colspan='2'>企业人数</td>
            <td colspan='2'><input type='text' class='form-control' name='p26'> </td>
            <td colspan='2'>管理人员</td>
            <td colspan='2'><input type='text' class='form-control' name='p27'></td>
            <td colspan='2'>技术人员</td>
            <td colspan='2'><input type='text' class='form-control' name='p28'></td>
        </tr>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>三、近三年的生产经营概况</lead></th>
        </tr>
        <tr>
        <td colspan='3' >年    度</td>
        <td colspan='3' >产    量</td>
        <td colspan='3' >面积（平方米）</td>
        <td colspan='3' >产值（万元）</td>
        </tr>
        <tr>
            <td colspan='3'><input type='text' class='form-control' name='p29'></td>
            <td colspan='3'><input type='text' class='form-control' name='p30'></td>
            <td colspan='3'><input type='text' class='form-control' name='p31'></td>
            <td colspan='3'><input type='text' class='form-control' name='p32'></td>
        </tr>
        <tr>
            <td colspan='3'><input type='text' class='form-control' name='p33'></td>
            <td colspan='3'><input type='text' class='form-control' name='p34'></td>
            <td colspan='3'><input type='text' class='form-control' name='p35'></td>
            <td colspan='3'><input type='text' class='form-control' name='p36'></td>
        </tr>
        <tr>
            <td colspan='3'><input type='text' class='form-control' name='p37'></td>
            <td colspan='3'><input type='text' class='form-control' name='p38'></td>
            <td colspan='3'><input type='text' class='form-control' name='p39'></td>
            <td colspan='3'><input type='text' class='form-control' name='p40'></td>
        </tr>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>四、从事空间结构工作的详细情况</lead></th>
        </tr>
        <td colspan='12'>
        <textarea  type='text' class='form-control' rows='12' name='p41'></textarea></td>
		<tr>
			<td colspan='12'>
			<input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
			<label for='userfile'> 上传营业执照</label>
			<input type='file' style='margin:auto; width:80%;' name='userfile' id='userfile'/>
			</td>
		</tr>
    </table>
	<div style='text-align: right;margin-bottom: 2%'>
	<input type='hidden' value='join' name='p42'>
    <button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交 &nbsp; &nbsp;
    </button></div></form></div>


	<div class='container-fluid visible-xs' style='margin-top:-10px;'>
	<form class='form-horizontal' enctype='multipart/form-data' action='' method='post'>
 <h5 class='text-center'><strong>中国钢结构协会空间结构分会团体会员入会申请表</strong></h5>
	<h6 class='text-center'><strong>单位基本情况</strong></h6>
	<div class='form-group text-center'>
    <label class='col-xs-4 control-label'>单位名称</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p1'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>企事业级别</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p2'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>单位性质</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p3'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产权所有</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p4'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>注册资金</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p5'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>上级单位</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p6'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>负责人姓名</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p7'>
  </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p8'>
  </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p9'>
  </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>电话传真</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p10'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>手机</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p11'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>联系人姓名</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p12'>
  </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p13'>
  </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p14'>
  </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>电话传真</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p15'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>手机</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p16'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>通讯地址</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p17'>
    </div>
  </div>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>手机</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p18'>
    </div>
  </div>
  <h6 class='text-center'><strong>单位规模</strong></h6>
<div class='form-group text-center'>
    <label class='col-xs-4 control-label'>创立时间</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p19'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>从事空间结构时间</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p20'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>占地面积</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p21'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>建筑面积</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p22'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>资金总额</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p23'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>固定资产</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p24'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>流动资金</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p25'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>企业人数</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p26'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>管理人员</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p27'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>技术人员</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p28'>
    </div>
  </div>
   <h6 class='text-center'><strong>近三年的生产经营概况</strong></h6>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>年度</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p29'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产量</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p30'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label' >面积</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p31'placeholder='X 平方米'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产值</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p32' placeholder='X 万元'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>年度</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p33'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产量</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p34'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>面积</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p35' placeholder='X 平方米'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产值</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p36' placeholder='X 万元'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>年度</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p37'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产量</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p38'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>面积</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p39' placeholder='X 平方米'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>产值</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p40' placeholder='X 万元'>
    </div>
  </div>
  <div class='col-xs-12'>
<h6 class='text-center'><strong>从事空间结构工作的详细情况</strong></h6>  
      <textarea class='form-control' name='p41' rows='4'></textarea>
    </div> 
	<div class='col-xs-12'>
     <input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
			<h6 class='text-center'><strong>上传营业执照</strong></h6>
			<input type='file' class='form=control' name='userfile' id='userfile'/>
    </div>
	<div>
	<input type='hidden' value='join' name='p42'>
	<div class='col-xs-12' style='margin:4% 0'> <input type='submit' class='btn btn-xs btn-primary form-control' value='提交'></input></div></div>
	</form>
  </div>";  //注意往上4行这里的hidden，目前不是必须的，但是建议加上，避免恶意提交