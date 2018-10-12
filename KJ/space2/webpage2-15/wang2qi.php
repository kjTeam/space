<?php //共29个参数 
//注意最下面有一个增加的flag hidden，用来标记是不是要删除数据库的。
 //检查是否有提交过，如果有提交过且正在审核中（state为1-4）,不可继续提交。如果是5，则不管

$db=create_database();
$query="select * from wang2 where id_p=$id ";
$result=$db->query($query);
$num_results=$result->num_rows;
if($num_results)	
{
	$row=$result->fetch_assoc(); 
	switch ($row['state'])
	{
			case 1: echo "<h4><span class='label label-info'>等待管理员分组</span></h4>"; exit();break;
			case 2:	echo "<h4><span class='label label-info'>等待专家评审</span></h4>";exit();break;
			case 3:	echo "<h4><span class='label label-info'>等待理事会评审</span></h4>";exit();break;
			case 4:	echo "<h4><span class='label label-warning'>本次提交将覆盖之前数据</span></h4>";$flag=1;break; //这里的flag用于标记是否在表单里做flag标记，用于在提交时删除现有表单。
			default:break;
	}
}
if($_POST["p33"]=='wang2') //检测是否是此表单提交
{
	if($_POST['flag']=='yes')//如果之前提交过这里重复提交，将会删除之前数据。
	{
		$query="delete from wang2 where id_p=$id";
		$result=$db->query($query);
	}
	for($i=1;$i<33;$i++)
	{
		$str="p".$i;
		$PA[$i]=$_POST[$str];		
	}
	$result=insert("wang2",32,$PA,$id);	
	if($result)  {echo "<h4><span class='label label-success'>保存成功！</span><h4>";exit();}
	else echo "<h4><span class='label label-danger'>出现问题，请联系管理员</span></h4>";
}

echo "
<div class='container-fluid hidden-xs'>
<form enctype='multipart/form-data' action='' method='post'>
    <h3 class='text-center'>中国钢结构协会空间结构分会网格资质等级会员年检表</h3>
	<br/>
        <table class='table table-bordered text-center table-responsive'>
            <tbody>
            <tr>
               <td colspan='2'>单位名称（公章）</td>
                <td colspan='4'><input type='text' class='form-control'  name='p1'> </td>
                <td colspan='2'>成立时间</td>
                <td colspan='4'><input type='text' class='form-control' placeholder='格式：X年X月X日' name='p2'></td>
            </tr>
            <tr>
                <td colspan='2'rowspan='2'>单位地址</td>
                <td colspan='4' rowspan='2'><textarea type='text' class='form-control' rows='3' name='p3'></textarea></td>
                <td colspan='2'>现有等级</td>
                <td colspan='4'><input type='text' class='form-control' name='p4' > </td>
            </tr>
            <tr>
                <td colspan='2'>现有证书编号</td>
                <td colspan='4'><input type='text' class='form-control' name='p5'> </td>
            </tr>
            <tr>
                <td  colspan='2'>营业执照注册号</td>
                <td colspan='4'><input type='text' class='form-control'></td>
                <td colspan='2'>电   话</td>
                <td colspan='4'><input type='phone' class='form-control' name='p6'> </td>
            </tr>
            <tr>
                <td colspan='2' >法定代表人</td>
                <td colspan='2'><input type='text' class='form-control' name='p7' ></td>
                <td colspan='2'>职务</td> <td colspan='2'><input type='text' class='form-control' name='p8'></td>
                <td colspan='2'>职称</td> <td colspan='2'><input type='text' class='form-control' name='p9'></td>
            </tr>
               <tr>
                   <td colspan='2' >企业负责人</td>
                   <td colspan='2'><input type='text' class='form-control' name='p10'></td>
                   <td colspan='2'>职务</td> <td colspan='2'><input type='text' class='form-control' name='p11'></td>
                   <td colspan='2'>职称</td> <td colspan='2'><input type='text' class='form-control' name='p12'></td>
               </tr>
               <tr>
                   <td colspan='2' >技术负责人</td>
                   <td colspan='2'><input type='text' class='form-control' name='p13'></td>
                   <td colspan='2'>职务</td> <td colspan='2'><input type='text' class='form-control'></td>
                   <td colspan='2'>职称</td> <td colspan='2'><input type='text' class='form-control' name='p14'></td>
               </tr>
            <tr>
            <td colspan='2'>复审申请级别</td>
                <td colspan='4'><input type='text' class='form-control' name='p15'></td>
                <td colspan='2'>现有证书到期时间</td>
                <td colspan='4'><input type='text' class='form-control' name='p15'></td>
            </tr>
            <tr >
                <th class='text-center' colspan='3' >评定项目</th>
                <th class='text-center' colspan='9'>内  容</th>
            </tr>
            <tr>
                <td colspan='1' scope='row'>
                    1
                </td>
                <td colspan='2'>
                    资产规模
                </td>
                <td colspan='3'>
                    注册资本金
                </td>
                <td colspan='6'>
                    <input type='text' class='form-control' name='p16'>
                </td>
            </tr>

                <tr >
                    <td colspan='1' rowspan='4'>
                       2
                    </td>
                    <td colspan='2' rowspan='4'>
                        从业人员
                    </td>
                    <td colspan='3'>从业人数</td>
                    <td colspan='6'>
                        <input type='text' class='form-control' name='p17'>
                    </td>
                </tr>
            <tr>
                <td colspan='3'>总工职称证书号</td>
                <td colspan='6'>
                    <input type='text' class='form-control' name='p18'>
                </td>
            </tr>
            <tr>
                <td colspan='3'>总工程师主持的网格资质代表工程</td>
                <td colspan='6'>
                    <input type='text' class='form-control' name='p19'>
                </td>
            </tr>
            <tr>
                <td colspan='3'>工程技术人员情况</td>
                <td colspan='6'>
                    <input type='text' class='form-control' name='p20'>
                </td>
            </tr>
            <tr >
                <td colspan='1' rowspan='3'>
                   3
                </td>
                <td colspan='2' rowspan='3'>
                    工程业绩
                </td>
                <td colspan='3'>近三年完成的网格资质展开面积及其总和</td>
                <td colspan='6'>
                    <input type='text' class='form-control' name='p21'>
                </td>
            </tr>
            <tr>
                <td colspan='3'>近六年完成的三项对应于申请等级的网格资质工程</td>
                <td colspan='6'>
                    <input type='text' class='form-control' name='p22'>
                </td>
            </tr>
            <tr>
                <td colspan='3'>曾获奖项</td>
                <td colspan='6'>
                    <input type='text' class='form-control' name='p23'>
                </td>
            </tr>
            <tr>
                <td colspan='1'>4</td>
                <td colspan='2'>技术装备</td>
                <td colspan='3'>软件名称</td>
                <td colspan='6'><input type='text' class='form-control' rows='2' name='p24'></td>
            </tr>
            <tr>
                <td colspan='1'>5</td>
                <td colspan='2'>质量管理</td>
                <td colspan='3'>ISO9000证书号（或相应的质量标准）</td>
                <td colspan='6'><textarea type='text' class='form-control'rows='2' name='p25'></textarea></td>
            </tr>
            <tr>
                <td colspan='1'>6</td>
                <td colspan='2'>质量事故</td>
                <td colspan='9'><textarea type='text' class='form-control'rows='2' name='p26'></textarea></td>
            </tr>

        <tr>
            <td colspan='2' >填表日期</td>
            <td colspan='2'><input type='text' placeholder='格式：X年X月X日' class='form-control' name='p27'></td>
            <td colspan='2'>联系人</td> <td colspan='2'><input type='text' class='form-control' name='p28'></td>
            <td colspan='2'>手机</td> <td colspan='2'><input type='phone' class='form-control' name='p29'></td>
        </tr>
            </tbody>
        </table>
		<input type='hidden' value='wang2' name='p30'> ";
		if($flag==1) echo "<input type='hidden' value='yes' name='flag'> "; 

echo "
  <div style='float: right'> <button type='submit' class='btn btn-md btn-primary' data-toggle='modal' data-target='#myModal'   >
      &nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div>
</form>
</div>
<div class='container-fluid visible-xs'>
<form class='form-horizontal' enctype='multipart/form-data' action='' method='post'>
 <h5 class='text-center'><strong>中国钢结构协会空间结构分会网格资质等级会员年检表</strong></h5>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>单位名称(公章)</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p1'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>成立时间</label>
    <div class='col-xs-8'>
      <input  class='form-control'  placeholder='X年X月X日' name='p2'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>单位地址</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p3'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>现有等级</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p4'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>现有证书编号</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p5'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>营业执照注册号</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p6'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>电话</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p7'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>法定代表人</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p8'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p9'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p10'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>企业负责人</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p11'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p12'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p13'>
    </div>
  </div>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>技术负责人</label>
    <div class='col-xs-8'>
  <input  class='form-control' name='p14'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p15'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p16'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>复审申请级别</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p17'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>现有证书到期时间</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p18'>
    </div>
  </div>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label' name='p1'>注册资本金</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p19'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>从业人数</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p20'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>总工职称            证书号</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p21'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>总工程师主持的膜结构代表工程</label>
    <div class='col-xs-8'>
     <textarea  class='form-control' name='p22' rows='4'></textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>工程技术人员情况</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p23'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>近三年完成的网格资质展开面积及其总和</label>
    <div class='col-xs-8'>
     <textarea class='form-control'  name='p24' rows='5'></textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>近六年完成的三项对应于申请等级的网格资质工程</label>
    <div class='col-xs-8'>
     <textarea  class='form-control'  name='p25' rows='6'></textarea>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>曾获奖项</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p26'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>软件名称</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p27'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>ISO9000证书号（或相应的质量标准）</label>
    <div class='col-xs-8'>
     <textarea  class='form-control'  rows='5' name='p28'></textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>质量事故</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p29'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>填表日期</label>
    <div class='col-xs-8'>
     <input  class='form-control'  placeholder='X年X月X日' name='p30'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>联系人</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p31'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>手机</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p32'>
    </div>
  </div>
  <input type='hidden' value='wang2' name='p33'> ";
		if($flag==1) echo "<input type='hidden' value='yes' name='flag'> "; 

echo "
  <div class='col-xs-12' style='padding:5px;'> <input type='submit' class='btn btn-xs btn-primary form-control' value='提交'></input></div>
</form>
</div>";
?>