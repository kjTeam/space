<script src="../bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

<?php //共31个参数 
 //膜结构初审表有一下几个状态：state=1:提交待审核；state=2:秘书处意见反馈；state=3:分配给专家；state=4:专家意见反馈；state=5:投递给理事会 state=6：理事会意见反馈；state=7:同意该等级；state=8 材料有问题需打回
control(2);
$db=create_database();
$query="select * from mo1 where id_p=$id ";
$result=$db->query($query);
$num_results=$result->num_rows;
if($num_results)	
{
	$row=$result->fetch_assoc(); 
	 echo"<h3><span class='label label-info'>";
	switch ($row['state'])
	{       
			case 1: echo "提交待审核";break;//提交待审核，这个时候可以更新表单
			case 2:	echo "秘书处正在审核，您无法更改表单,请前往查看菜单查看";exit();break;//等待专家打分
			case 3:	echo "秘书处正在审核，您无法更改表单,请前往查看菜单查看";exit();break;//专家意见反馈
			case 4:	echo "秘书处正在审核，您无法更改表单,请前往查看菜单查看";exit();break;//投递给理事会
			case 5:	echo "秘书处正在审核，您无法更改表单,请前往查看菜单查看";exit();break;//理事会意见反馈
            case 6:	echo "秘书处正在审核，您无法更改表单,请前往查看菜单查看";exit();break;//理事会意见反馈
            case 7:	echo "已通过审核";exit();break;//通过审核
            case 8:	echo "未通过审核，请按照意见重新填写";break;//未通过审核，这个时候可以更新表单
            default: echo "出错";exit();break;
			
			//case 1: echo "<h4><span class='label label-info'>等待管理员分组</span></h4>"; exit();break;
			//case 2:	echo "<h4><span class='label label-info'>等待专家评审</span></h4>";exit();break;
			//case 3:	echo "<h4><span class='label label-info'>等待理事会评审</span></h4>";exit();break;
			//case 4:	echo "<h4><span class='label label-warning'>本次提交将覆盖之前数据</span></h4>";$flag=1;break; //这里的flag用于标记是否在表单里做flag标记，用于在提交时删除现有表单。
			//default:break;
	}
	echo"</span></h3>";
}
//专项设计提交
if($_POST['mo1_zhuanxiang'] == 'yes'){
    if($_POST['flag1']=='yes')//如果之前提交过这里重复提交，将会删除之前数据。
	{
		$query="delete from mo1_zhuanxiang where id_p=$id";
		$result=$db->query($query);
    }
    for($i=1;$i<32;$i++)
	{
		$str="p".$i;
		$PA[$i]=$_POST[$str];
    }
    $result=insert("mo1",31,$PA,$id);
    define('ROOT',dirname(__FILE__)); //用于上传文件 只能能上传word 这个以后要改
    $upfile1=ROOT."/mo1/mo1_zhuanxiang//$id+file1.doc"; 
    if(file_exists($upfile1)){
        unlink($upfile1);
    }
	move_uploaded_file($_FILES['file1']['tmp_name'], $upfile1);
	$upfile2=ROOT."/mo1/mo1_zhuanxiang//$id+file2.doc"; 
    if(file_exists($upfile2)){
        unlink($upfile2);
    }
    move_uploaded_file($_FILES['file2']['tmp_name'], $upfile2);
	$upfile3=ROOT."/mo1/mo1_zhuanxiang//$id+file3.doc"; 
    if(file_exists($upfile3)){
        unlink($upfile3);
    }
    move_uploaded_file($_FILES['file3']['tmp_name'], $upfile3);
	$upfile4=ROOT."/mo1/mo1_zhuanxiang//$id+file4.doc"; 
    if(file_exists($upfile4)){
        unlink($upfile4);
    }
    move_uploaded_file($_FILES['file4']['tmp_name'], $upfile4);
	$upfile5=ROOT."/mo1/mo1_zhuanxiang//$id+file5.doc"; 
    if(file_exists($upfile5)){
        unlink($upfile5);
    }
    move_uploaded_file($_FILES['file5']['tmp_name'], $upfile5);
	$upfile6=ROOT."/mo1/mo1_zhuanxiang//$id+file6.doc"; 
    if(file_exists($upfile6)){
        unlink($upfile6);
    }
    move_uploaded_file($_FILES['file6']['tmp_name'], $upfile5);
    if($result) {
	   echo"<script language=javascript>alertAtuoClose() location.href='';</script>";
	}else{
        echo "<script language=javascript>swal('提交失败！','请联系管理员'); </script>";
    }
}
//专项设计提交
if($_POST['mo1_chengbao'] == 'yes'){
    if($_POST['flag2']=='yes')//如果之前提交过这里重复提交，将会删除之前数据。
	{
		$query="delete from mo1_chengbao where id_p=$id";
		$result=$db->query($query);
    }
    for($i=1;$i<39;$i++)
	{
		$str="t".$i;
		$PA[$i]=$_POST[$str];
    }
    $result=insert("mo1_chengbao",39,$PA,$id);
    define('ROOT',dirname(__FILE__)); //用于上传文件 只能能上传word 这个以后要改
    $upfile1=ROOT."/mo1/mo1_chengbao//$id+file1.doc"; 
    if(file_exists($upfile1)){
        unlink($upfile1);
    }
	move_uploaded_file($_FILES['file7']['tmp_name'], $upfile1);
	$upfile2=ROOT."/mo1/mo1_chengbao//$id+file2.doc"; 
    if(file_exists($upfile2)){
        unlink($upfile2);
    }
    move_uploaded_file($_FILES['file8']['tmp_name'], $upfile2);
	$upfile3=ROOT."/mo1/mo1_chengbao//$id+file3.doc"; 
    if(file_exists($upfile3)){
        unlink($upfile3);
    }
    move_uploaded_file($_FILES['file9']['tmp_name'], $upfile3);
	$upfile4=ROOT."/mo1/mo1_chengbao//$id+file4.doc"; 
    if(file_exists($upfile4)){
        unlink($upfile4);
    }
    move_uploaded_file($_FILES['file10']['tmp_name'], $upfile4);
	$upfile5=ROOT."/mo1/mo1_chengbao//$id+file5.doc"; 
    if(file_exists($upfile5)){
        unlink($upfile5);
    }
    move_uploaded_file($_FILES['file11']['tmp_name'], $upfile5);
	$upfile6=ROOT."/mo1/mo1_chengbao//$id+file6.doc"; 
    if(file_exists($upfile6)){
        unlink($upfile6);
    }
    move_uploaded_file($_FILES['file12']['tmp_name'], $upfile5);
    if($result) {
	   echo"<script language=javascript>alertAtuoClose() location.href='';</script>";
	}else{
        echo "<script language=javascript>swal('提交失败！','请联系管理员'); </script>";
    }
}
// if($_POST["p32"]=='mo1') //检测是否是此表单提交
// {
// 	if($_POST['flag']=='yes')//如果之前提交过这里重复提交，将会删除之前数据。
// 	{
// 		$query="delete from mo1 where id_p=$id";
// 		$result=$db->query($query);
// 	}
// 	for($i=1;$i<32;$i++)
// 	{
// 		$str="p".$i;
// 		$PA[$i]=$_POST[$str];
// 	}
// 	for($i=1;$i<40;$i++)
// 	{
//     $strr="t".$i;
// 	$PS[$i]=$_POST[$strr];
// 	}
// 	$result=insert2("mo1",31,$PA,$PS,$id);
// 	define('ROOT',dirname(__FILE__)); //用于上传文件 只能能上传word 这个以后要改
// 	   $upfile1=ROOT."/mo1//$id+file1.doc"; 
// 	move_uploaded_file($_FILES['file1']['tmp_name'], $upfile1);
// 	 $upfile2=ROOT."/mo1//$id+file2.doc"; 
// 	move_uploaded_file($_FILES['file2']['tmp_name'], $upfile2);
// 	$upfile3=ROOT."/mo1//$id+file3.doc"; 
// 	move_uploaded_file($_FILES['file3']['tmp_name'], $upfile3);
// 	$upfile4=ROOT."/mo1//$id+file4.doc"; 
// 	move_uploaded_file($_FILES['file4']['tmp_name'], $upfile4);
// 	$upfile5=ROOT."/mo1//$id+file5.doc"; 
// 	move_uploaded_file($_FILES['file5']['tmp_name'], $upfile5);
// 	$upfile6=ROOT."/mo1//$id+file6.doc"; 
// 	move_uploaded_file($_FILES['file6']['tmp_name'], $upfile6);
// 	$upfile7=ROOT."/mo1//$id+file7.doc"; 
// 	move_uploaded_file($_FILES['file7']['tmp_name'], $upfile7);
// 	$upfile8=ROOT."/mo1//$id+file6.doc"; 
// 	move_uploaded_file($_FILES['file8']['tmp_name'], $upfile8);
// 	$upfile9=ROOT."/mo1//$id+file6.doc"; 
// 	move_uploaded_file($_FILES['file9']['tmp_name'], $upfile9);
// 	$upfile10=ROOT."/mo1//$id+file6.doc"; 
// 	move_uploaded_file($_FILES['file10']['tmp_name'], $upfile9);
// 	$upfile11=ROOT."/mo1//$id+file6.doc"; 
// 	move_uploaded_file($_FILES['file11']['tmp_name'], $upfile9);
// 	$upfile12=ROOT."/mo1//$id+file6.doc"; 
// 	move_uploaded_file($_FILES['file12']['tmp_name'], $upfile9);
// 	if($result) {
// 	echo"<script language=javascript>alertAtuoClose() location.href='';</script>";
// 		}
// 	else 
// 	echo "<script language=javascript>swal('提交失败！','请联系管理员'); </script>";

// }

echo "
<div class='container-fluid hidden-xs' style='margin-top:30px'>
<div style='border:solid 1px #ccc; padding:5px 10px 50px 10px'>
   <form enctype='multipart/form-data' action='' method='post'>
        <table class='table table-bordered text-center table-responsive' name='design' >
            <tbody>
			<h3 class='text-center'>中国钢结构协会空间结构分会膜结构专项设计企业等级会员申请表</h3>
	        <br/>
            <tr>
               <td colspan='2'>单位名称</td>
                <td colspan='4'><input type='text' class='form-control' name='p1'> </td>
                <td colspan='2'>成立时间</td>
                <td colspan='4'><input type='text' class='form-control' placeholder='格式：X年X月X日' name='p2'></td>
            </tr>
            <tr>
                <td colspan='2'>单位地址</td>
                <td colspan='4'><input type='text' class='form-control' name='p3'></td>
                <td colspan='2'>现有等级</td>
                <td colspan='4'><input type='text' class='form-control' name='p4'> </td>
            </tr>
            <tr>
                <td colspan='2'>营业执照注册号</td>
                <td colspan='4'><input type='text' class='form-control' name='p5'></td>
                <td colspan='2'>电   话</td>
                <td colspan='4'><input type='phone' class='form-control' name='p6'> </td>
            </tr>
            <tr>
                <td colspan='2' >法定代表人</td>
                <td colspan='2'><input type='text' class='form-control' name='p7'></td>
                <td colspan='1'>职务</td> <td colspan='2'><input type='text' class='form-control' name='p8'></td>
                <td colspan='3'>职称</td> <td colspan='2'><input type='text' class='form-control' name='p9'></td>
            </tr>
               <tr>
                   <td colspan='2' >企业负责人</td>
                   <td colspan='2'><input type='text' class='form-control' name='p10'></td>
                   <td colspan='1'>职务</td> <td colspan='2'><input type='text' class='form-control' name='p11'></td>
                   <td colspan='3'>职称</td> <td colspan='2'><input type='text' class='form-control' name='p12'></td>
               </tr>
               <tr>
                   <td colspan='2' >技术负责人</td>
                   <td colspan='2'><input type='text' class='form-control' name='p13'></td>
                   <td colspan='1'>职务</td> <td colspan='2'><input type='text' class='form-control' name='p14'></td>
                   <td colspan='3'>职称</td> <td colspan='2'><input type='text' class='form-control' name='p15'></td>
               </tr>
            <tr>
            <td colspan='2'>第一申请级别</td>
                <td colspan='10'><input type='text' class='form-control'  name='p16'></td>
            </tr>
            <tr>
                <td colspan='2'>第二申请级别</td>
                <td colspan='10'><input type='text' class='form-control' name='p17'></td>
            </tr>
            <tr >
                <th class='text-center' colspan='3' >评定项目</th>
                <th class='text-center' colspan='6'>内  容</th>
				<th class='text-center' colspan='3'>对应支撑材料</th>
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
                <td colspan='3'>
                    <input type='text' class='form-control' name='p18'>
                </td>
                <td colspan='2'>
                    支撑材料一
                </td>
                <td colspan='1'>
				<input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
                    <input type='file' class='form-control noborder-input' name='file1'id='file1'>
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
                <td colspan='3'>
                        <input type='text' class='form-control' name='p19'>
                </td>
				<td colspan='2' rowspan='4'> 支撑材料二</td>
				<td colspan='1' rowspan='4' >
				<input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
                    <input type='file' class='form-control noborder-input' name='file2' id='file2'>
                </td>
                </tr>
            <tr>
                <td colspan='3'>总工职称证书号</td>
                <td colspan='3'>
                    <input type='text' class='form-control' name='p20'>
                </td>
            </tr>
            <tr>
                <td colspan='3'>总工程师主持的膜结构代表工程</td>
                <td colspan='3'>
                    <input type='text' class='form-control' name='p21'>
                </td>
            </tr>
            <tr>
                <td colspan='3'>工程技术人员情况</td>
                <td colspan='3'>
                    <input type='text' class='form-control' name='p22'>
                </td>
				
            </tr>
            <tr >
                <td colspan='1' rowspan='3'>
                   3
                </td>
                <td colspan='2' rowspan='3'>
                    工程业绩
                </td>
                <td colspan='3'>近三年完成的膜结构<br>展开面积及其总和</td>
                <td colspan='3'>
                    <input type='text' class='form-control' name='p23'>
                </td>
				<td colspan='2' rowspan='3'> 支撑材料三</td>
				<td colspan='1' rowspan='3' >
				<input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
                    <input type='file' class='form-control noborder-input' name='file3' id='file3'>
                </td>
            </tr>
            <tr>
                <td colspan='3'>近六年完成的三项对应于申请等级的膜结构工程</td>
                <td colspan='3'>
                    <input type='text' class='form-control' name='p24'>
                </td>
            </tr>
            <tr>
                <td colspan='3'>曾获奖项</td>
                <td colspan='3'>
                    <input type='text' class='form-control' name='p25'>
                </td>
            </tr>
            <tr>
                <td colspan='1'>4</td>
                <td colspan='2'>技术装备</td>
                <td colspan='3'>软件情况</td>
                <td colspan='3'><textarea type='text' class='form-control' rows='3' name='p26'></textarea></td>
				<td colspan='2'> 支撑材料四</td>
				<td colspan='1'>
				<input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
                    <input type='file' class='form-control noborder-input' name='file4' id='file4' >
                </td>
            </tr>
            <tr>
                <td colspan='1'>5</td>
                <td colspan='2'>质量管理</td>
                <td colspan='3'>ISO9000证书号（或相应的质量标准）</td>
                <td colspan='3'><textarea type='text' class='form-control'rows='2' name='p27'></textarea></td>
				<td colspan='2'> 支撑材料五</td>
				<td colspan='1'>
				<input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
                    <input type='file' class='form-control noborder-input' name='file5' id='file5'>
                </td>
            </tr>
            <tr>
                <td colspan='1'>6</td>
                <td colspan='2'>质量事故</td>
                <td colspan='6'><textarea type='text' class='form-control'rows='2' name='p28'></textarea></td>
				<td colspan='2'> 支撑材料六</td>
				<td colspan='1'>
				<input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
                    <input type='file' class='form-control noborder-input' name='file6'id='file6' >
                </td>
            </tr>
        <tr>
            <td colspan='2' >填表日期</td>
            <td colspan='2'><input type='text' placeholder='格式：X年X月X日' class='form-control' name='p29'></td>
            <td colspan='2'>联系人</td> <td colspan='2'><input type='text' class='form-control' name='p30'></td>
            <td colspan='3'>手机</td> <td colspan='1'><input type='phone' class='form-control' name='p31'></td>
        </tr>
            </tbody>
        </table>
        <input type='hidden' value='yes' name='mo1_zhuanxiang'> 
        <button type='submit' style='float: right' class='btn btn-md btn-primary'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>		
    </form>
  </div>
    <div style='border:solid 1px #ccc; padding:5px 10px 50px 10px;margin:20px 0 10px 0'>
    <form enctype='multipart/form-data' action='' method='post'>
        <table class='table table-bordered text-center table-responsive' name='chengbao' >
            <tbody>
			<h3 class='text-center'>中国钢结构协会空间结构分会膜结构工程承包企业等级会员申请表</h3>
	        <br/>
            <tr>
               <td colspan='2'>单位名称</td>
                <td colspan='3'><input type='text' class='form-control' name='t1'> </td>
                <td colspan='2'>成立时间</td>
                <td colspan='5'><input type='text' class='form-control' placeholder='格式：X年X月X日' name='t2'></td>
            </tr>
            <tr>
                <td colspan='2'>单位地址</td>
                <td colspan='3'><input type='text' class='form-control' name='t3'></td>
                <td colspan='2'>现有等级</td>
                <td colspan='5'><input type='text' class='form-control' name='t4'> </td>
            </tr>
            <tr>
                <td colspan='2'>营业执照注册号</td>
                <td colspan='3'><input type='text' class='form-control' name='t5'></td>
                <td colspan='2'>电   话</td>
                <td colspan='5'><input type='phone' class='form-control' name='t6'> </td>
            </tr>
            <tr>
                <td colspan='2' >法定代表人</td>
                <td colspan='2'><input type='text' class='form-control' name='t7'></td>
                <td colspan='1'>职务</td> <td colspan='2'><input type='text' class='form-control' name='t8'></td>
                <td colspan='3'>职称</td> <td colspan='2'><input type='text' class='form-control' name='t9'></td>
            </tr>
               <tr>
                   <td colspan='2' >企业负责人</td>
                   <td colspan='2'><input type='text' class='form-control' name='t10'></td>
                   <td colspan='1'>职务</td> <td colspan='2'><input type='text' class='form-control' name='t11'></td>
                   <td colspan='3'>职称</td> <td colspan='2'><input type='text' class='form-control' name='t12'></td>
               </tr>
               <tr>
                   <td colspan='2' >技术负责人</td>
                   <td colspan='2'><input type='text' class='form-control' name='t13'></td>
                   <td colspan='1'>职务</td> <td colspan='2'><input type='text' class='form-control' name='t14'></td>
                   <td colspan='3'>职称</td> <td colspan='2'><input type='text' class='form-control' name='t15'></td>
               </tr>
            <tr>
            <td colspan='2'>申请类别</td>
                <td colspan='10'>
				
  <input type='checkbox' value='工程承包' name='t16' checked >
  工程承包（
  <input type='checkbox' name='optionsRadios' id='optionsRadios1' name='t17' value='制作' >
 制作
  <input type='checkbox' name='optionsRadios' id='optionsRadios2'  name='t18' value='综合'>
  综合
  <input type='checkbox' name='optionsRadios' id='optionsRadios2'  name='t19' value='安装'>
  安装）
</td>
</tr>
            <tr>
                <td colspan='3'>第一申请级别</td>
                <td colspan='3'><input type='text' class='form-control' name='t20'></td>
                <td colspan='2'>第二申请级别</td>
                <td colspan='4'><input type='text' class='form-control' name='t21'></td>
            </tr>
            <tr >
                <th class='text-center' colspan='3' >评定项目</th>
                <th class='text-center' colspan='6'>内  容</th>
				<th class='text-center' colspan='3'>对应支撑材料</th>
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
                <td colspan='3'>
                    <input type='text' class='form-control' name='t22'>
                </td>
 <td colspan='2'>
                    支撑材料一
                </td>
                <td colspan='1'>
				<input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
                    <input type='file' class='form-control noborder-input' name='file7'id='file7'>
                </td>
            </tr>

                <tr >
                    <td colspan='1' rowspan='5'>
                       2
                    </td>
                    <td colspan='2' rowspan='5'>
                        从业人员
                    </td>
                    <td colspan='3'>从业人数</td>
                    <td colspan='3'>
                        <input type='text' class='form-control' name='t23'>
                    </td>
					<td colspan='2' rowspan='5'> 支撑材料二</td>
				<td colspan='1' rowspan='5' >
				<input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
                    <input type='file' class='form-control noborder-input' name='file8' id='file8'>
                </td>
                </tr>
            <tr>
                <td colspan='3'>总工职称证书号</td>
                <td colspan='3'>
                    <input type='text' class='form-control' name='t24'>
                </td>
            </tr>
            <tr>
                <td colspan='3'>总工程师主持的膜结构代表工程</td>
                <td colspan='3'>
                    <input type='text' class='form-control' name='t25'>
                </td>
            </tr>
			<tr>
                <td colspan='3'>项目经理的人数与等级情况</td>
                <td colspan='3'>
                    <input type='text' class='form-control' name='t26'>
                </td>
            </tr>
            <tr>
                <td colspan='3'>工程技术人员情况</td>
                <td colspan='3'>
                    <input type='text' class='form-control' name='t27'>
                </td>
				
            </tr>
            <tr>
                <td colspan='1' rowspan='3'>
                   3
                </td>
                <td colspan='2' rowspan='3'>
                    工程业绩
                </td>
                <td colspan='3'>近三年完成的膜结构<br>展开面积及其总和</td>
                <td colspan='3'>
                    <input type='text' class='form-control' name='t28'>
                </td>
				<td colspan='2' rowspan='3'> 支撑材料三</td>
				<td colspan='1' rowspan='3' >
				<input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
                    <input type='file' class='form-control noborder-input' name='file9' id='file9'>
                </td>
            </tr>
            <tr>
                <td colspan='3'>近六年完成的三项对应于申请等级的膜结构工程</td>
                <td colspan='3'>
                    <input type='text' class='form-control' name='t29'>
                </td>
            </tr>
            <tr>
                <td colspan='3'>曾获奖项</td>
                <td colspan='3'>
                    <input type='text' class='form-control' name='t30'>
                </td>
            </tr>
			<tr >
                <td colspan='1' rowspan='4'>
                   4
                </td>
                <td colspan='2' rowspan='4'>
                    技术装备
                </td>
                <td colspan='3'>加工车间规模</td>
                <td colspan='3'>
                    <input type='text' class='form-control' name='t31'>
                </td>
				<td colspan='2' rowspan='4'> 支撑材料四</td>
				<td colspan='1' rowspan='4' >
				<input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
                    <input type='file' class='form-control noborder-input' name='file10' id='file10'>
                </td>
            </tr>
            <tr>
                <td colspan='3'>加工设备名称/数量</td>
                <td colspan='3'>
                    <input type='text' class='form-control' name='t32'>
                </td>
            </tr>
             <tr>
                <td colspan='3'>安装设备名称/数量</td>
                <td colspan='3'>
                    <input type='text' class='form-control' name='t33'>
                </td>
            </tr>
			<tr>
                <td colspan='3'>检验设备名称/数量</td>
                <td colspan='3'>
                    <input type='text' class='form-control' name='t34'>
                </td>
            </tr>
            
            <tr>
                <td colspan='1'>5</td>
                <td colspan='2'>质量管理</td>
                <td colspan='3'>ISO9000证书号（或相应的质量标准）</td>
                <td colspan='3'><textarea type='text' class='form-control'rows='2' name='t35'></textarea></td>
				<td colspan='2'> 支撑材料五</td>
				<td colspan='1'>
				<input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
                    <input type='file' class='form-control noborder-input' name='file11' id='file11'>
                </td>
            </tr>
            <tr>
                <td colspan='1'>6</td>
                <td colspan='2'>质量事故</td>
                <td colspan='6'><textarea type='text' class='form-control'rows='2' name='t36'></textarea></td>
				<td colspan='2'> 支撑材料六</td>
				<td colspan='1'>
				<input type='hidden' name='MAX_FILE_SIZE' value='10000000'/>
                    <input type='file' class='form-control noborder-input' name='file12'id='file12' >
                </td>
            </tr>

        <tr>
            <td colspan='2' >填表日期</td>
            <td colspan='2'><input type='text' placeholder='格式：X年X月X日' class='form-control' name='t37'></td>
            <td colspan='2'>联系人</td> <td colspan='2'><input type='text' class='form-control' name='t38'></td>
            <td colspan='3'>手机</td> <td colspan='1'><input type='phone' class='form-control' name='t39'></td>
        </tr>
            </tbody>
        </table>
<input type='hidden' value='yes' name='mo1_chengbao'>
<button type='submit' style='float: right' class='btn btn-md btn-primary'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
</form>
</div>
</div>

<div class='container-fluid visible-xs' width='100%'>
<div style='border:solid 1px #ccc; padding:5px 10px 50px 10px'>
<h5 class='text-center'><strong>中国钢结构协会空间结构分会膜结构专项设计企业等级会员申请表</strong></h5>
<form class='form-horizontal' enctype='multipart/form-data' action='' method='post'>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>单位名称</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p1'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>成立时间</label>
    <div class='col-xs-7'>
      <input  class='form-control'  placeholder='X年X月X日' name='p2'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>单位地址</label>
    <div class='col-xs-7'>
      <input  class='form-control' name='p3'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>现有等级</label>
    <div class='col-xs-7'>
      <input  class='form-control' name='p4'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>营业执照注册号</label>
    <div class='col-xs-7'>
      <input  class='form-control' name='p5'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>电话</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p6'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>法定代表人</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='p7'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-7'>
      <input  class='form-control' name='p8'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-7'>
      <input  class='form-control' name='p9'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>企业负责人</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='p10'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-7'>
      <input  class='form-control' name='p11'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-7'>
      <input  class='form-control' name='p12'>
    </div>
  </div>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>技术负责人</label>
    <div class='col-xs-7'>
  <input  class='form-control' name='p13'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-7'>
      <input  class='form-control' name='p14'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-7'>
      <input  class='form-control' name='p15'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>第一   申请级别</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='p16'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>第二	申请级别</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='p17'>
    </div>
  </div>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label' name='p1'>注册资本金</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='p18'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>从业人数</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='p19'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>总工职称            证书号</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='p20'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>总工程师主持的膜结构代表工程</label>
    <div class='col-xs-7'>
     <textarea  class='form-control' name='p21' rows='4'></textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>工程技术人员情况</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='p22'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>近三年完成的膜结构展开面积及其总和</label>
    <div class='col-xs-7'>
     <textarea  class='form-control' rows='5' name='p23'></textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>近六年完成的三项对应于申请等级的膜结构工程</label>
    <div class='col-xs-7'>
     <textarea  class='form-control' rows='6' name='p24'></textarea>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>曾获奖项</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='p25'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>软件情况</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='p26'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>ISO9000证书号（或相应的质量标准）</label>
    <div class='col-xs-7'>
     <textarea  class='form-control'  rows='5' name='p27'></textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>质量事故</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='p28'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>填表日期</label>
    <div class='col-xs-7'>
     <input  class='form-control'  placeholder='X年X月X日' name='p29'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>联系人</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='p30'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>手机</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='p31'>
    </div>
  </div>
  <input type='hidden' value='yes' name='mo1_zhuanxiang'> 
  <button type='submit' style='float: right' class='btn btn-md btn-primary'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>		
  </form>
  </div>
  <div style='border:solid 1px #ccc; padding:5px 10px 50px 10px;margin:20px 0 10px 0'>
  <h5 class='text-center'><strong>中国钢结构协会空间结构分会膜结构工程承包企业等级会员申请表</strong></h5>
  <form class='form-horizontal' enctype='multipart/form-data' action='' method='post'>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>单位名称</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p1'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>成立时间</label>
    <div class='col-xs-7'>
      <input  class='form-control'  placeholder='X年X月X日' name='p2'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>单位地址</label>
    <div class='col-xs-7'>
      <input  class='form-control' name='p3'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>现有等级</label>
    <div class='col-xs-7'>
      <input  class='form-control' name='p4'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>营业执照注册号</label>
    <div class='col-xs-7'>
      <input  class='form-control' name='p5'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>电话</label>
    <div class='col-xs-7'>
      <input class='form-control' name='p6'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>法定代表人</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='p7'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-7'>
      <input  class='form-control' name='p8'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-7'>
      <input  class='form-control' name='p9'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>企业负责人</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='p10'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-7'>
      <input  class='form-control' name='p11'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-7'>
      <input  class='form-control' name='p12'>
    </div>
  </div>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>技术负责人</label>
    <div class='col-xs-7'>
       <input  class='form-control' name='p13'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-7'>
      <input  class='form-control' name='p14'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-7'>
      <input  class='form-control' name='p15'>
    </div>
  </div>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>申请类别</label>
    <div class='col-xs-7' style='font-size:12px'>
       <input type='checkbox' value='工程承包' name='t16'  checked />
  工程承包（
  <input type='checkbox' name='optionsRadios' id='optionsRadios1' name='t17' value='制作' />
 制作
  <input type='checkbox' name='optionsRadios' id='optionsRadios2'  name='t18' value='综合'/>
  综合
  <input type='checkbox' name='optionsRadios' id='optionsRadios2'  name='t19' value='安装'/>
  安装）
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>第一   申请级别</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='t20'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>第二	申请级别</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='t21'>
    </div>
  </div>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label' name='p1'>注册资本金</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='t22'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>从业人数</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='t23'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>总工职称            证书号</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='t24'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>总工程师主持的膜结构代表工程</label>
    <div class='col-xs-7'>
     <textarea  class='form-control' name='t25' rows='4'></textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>项目经理的人数与等级情况</label>
    <div class='col-xs-7'>
     <textarea  class='form-control' name='t26' rows='4'></textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>工程技术人员情况</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='t27'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>近三年完成的膜结构展开面积及其总和</label>
    <div class='col-xs-7'>
     <textarea  class='form-control' rows='5' name='t28'></textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>近六年完成的三项对应于申请等级的膜结构工程</label>
    <div class='col-xs-7'>
     <textarea  class='form-control' rows='6' name='t29'></textarea>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>曾获奖项</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='t30'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>加工车间规模</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='t31'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>加工设备名称/数量</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='t32'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>安装设备名称/数量</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='t33'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>检验设备名称/数量</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='t34'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>ISO9000证书号（或相应的质量标准）</label>
    <div class='col-xs-7'>
     <textarea  class='form-control'  rows='5' name='t35'></textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>质量事故</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='t36'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>填表日期</label>
    <div class='col-xs-7'>
     <input  class='form-control'  placeholder='X年X月X日' name='t37'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>联系人</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='t38'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>手机</label>
    <div class='col-xs-7'>
     <input  class='form-control' name='t39'>
    </div>
  </div>
  
  <input type='hidden' value='yes' name='mo1_chengbao'> 
  <button type='submit'  style='float: right' class='btn btn-md btn-primary'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>   
  </form>
  </div>
   </div>";
  
		//if($flag==1) echo "<input type='hidden' value='yes' name='flag'> "; 




  ?>