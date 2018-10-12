<?php //查看wang1
$sheet='wang1';
$category_f=3;
$location=1;
include "process.php";


echo "
<div class='container-fluid hidden-xs'>
    <h3 class='text-center'>中国钢结构协会空间结构分会网格资质等级会员申请表</h3>
	<br/>
        <table class='table table-bordered text-center table-responsive'>
            <tbody>
            <tr>
               <td colspan='2'>单位名称</td>
                <td colspan='4'>".$row['c1']."</td>
                <td colspan='2'>成立时间</td>
                <td colspan='4'>".$row['c2']."</td>
            </tr>
            <tr>
                <td colspan='2'>单位地址</td>
                <td colspan='4'>".$row['c3']."</td>
                <td colspan='2'>现有等级</td>
                <td colspan='4'>".$row['c4']."</td>
            </tr>
            <tr>
                <td colspan='2'>营业执照注册号</td>
                <td colspan='4'>".$row['c5']."</td>
                <td colspan='2'>电   话</td>
                <td colspan='4'>".$row['c6']."</td>
            </tr>
            <tr>
                <td colspan='2' >法定代表人</td>
                <td colspan='2'>".$row['c7']."</td>
                <td colspan='2'>职务</td> <td colspan='2'>".$row['c8']."</td>
                <td colspan='2'>职称</td> <td colspan='2'>".$row['c9']."</td>
            </tr>
               <tr>
                   <td colspan='2' >企业负责人</td>
                   <td colspan='2'>".$row['c10']."</td>
                   <td colspan='2'>职务</td> <td colspan='2'>".$row['c11']."</td>
                   <td colspan='2'>职称</td> <td colspan='2'>".$row['c12']."</td>
               </tr>
               <tr>
                   <td colspan='2' >技术负责人</td>
                   <td colspan='2'>".$row['c13']."</td>
                   <td colspan='2'>职务</td> <td colspan='2'>".$row['c14']."</td>
                   <td colspan='2'>职称</td> <td colspan='2'>".$row['c15']."</td>
               </tr>
            <tr>
            <td colspan='2'>第一申请级别</td>
                <td colspan='10'>".$row['c16']."</td>
</tr>
            <tr>
                <td colspan='2'>第二申请级别</td>
                <td colspan='10'>".$row['c17']."</td>
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
                  ".$row['c18']."
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
                      ".$row['c19']."
                    </td>
                </tr>
            <tr>
                <td colspan='3'>总工职称证书号</td>
                <td colspan='6'>
                   ".$row['c20']."
                </td>
            </tr>
            <tr>
                <td colspan='3'>总工程师主持的网格资质代表工程</td>
                <td colspan='6'>
                  ".$row['c21']."
                </td>
            </tr>
            <tr>
                <td colspan='3'>工程技术人员情况</td>
                <td colspan='6'>
                   ".$row['c22']."
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
                   ".$row['c23']."
                </td>
            </tr>
            <tr>
                <td colspan='3'>近六年完成的三项对应于申请等级的网格资质工程</td>
                <td colspan='6'>
                   ".$row['c24']."
                </td>
            </tr>
            <tr>
                <td colspan='3'>曾获奖项</td>
                <td colspan='6'>
                   ".$row['c25']."
                </td>
            </tr>
            <tr>
                <td colspan='1'>4</td>
                <td colspan='2'>技术装备</td>
                <td colspan='3'>软件情况</td>
                <td colspan='6'>".$row['c26']."</textarea></td>
            </tr>
            <tr>
                <td colspan='1'>5</td>
                <td colspan='2'>质量管理</td>
                <td colspan='3'>ISO9000证书号（或相应的质量标准）</td>
                <td colspan='6'>".$row['c27']."</textarea></td>
            </tr>
            <tr>
                <td colspan='1'>6</td>
                <td colspan='2'>质量事故</td>
                <td colspan='9'>".$row['c28']."</td>
            </tr>

        <tr>
            <td colspan='2' >填表日期</td>
            <td colspan='2'>".$row['c29']."</td>
            <td colspan='2'>联系人</td> <td colspan='2'>".$row['c30']."</td>
            <td colspan='2'>电话/手机</td> <td colspan='2'>".$row['c31']."</td>
        </tr>
            </tbody>
        </table></div>
		<div class='container-fluid visible-xs'>
<form class='form-horizontal' enctype='multipart/form-data' action='' method='post'>
 <h5 class='text-center'><strong>中国钢结构协会空间结构分会网格资质等级会员申请表</strong></h5>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>单位名称</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p1' value='".$row['c1']."'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>成立时间</label>
    <div class='col-xs-8'>
      <input  class='form-control'  value='".$row['c2']."' name='p2'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>单位地址</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p3' value='".$row['c3']."'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>现有等级</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p4' value='".$row['c4']."'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>营业执照注册号</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p5' value='".$row['c5']."'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>电话</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p6' value='".$row['c6']."'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>法定代表人</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p7' value='".$row['c7']."'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p8' value='".$row['c8']."'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p9' value='".$row['c9']."'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>企业负责人</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p10' value='".$row['c10']."'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p11' value='".$row['c11']."'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p12' value='".$row['c12']."'>
    </div>
  </div>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>技术负责人</label>
    <div class='col-xs-8'>
  <input  class='form-control' name='p13' value='".$row['c13']."'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p14' value='".$row['c14']."'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p15' value='".$row['c15']."'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>第一   申请级别</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p16' value='".$row['c16']."'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>第二	申请级别</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p17' value='".$row['c17']."'>
    </div>
  </div>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label' name='p1'>注册资本金</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p18' value='".$row['c18']."'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>从业人数</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p19' value='".$row['c19']."'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>总工职称            证书号</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p20' value='".$row['c20']."'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>总工程师主持的网格资质代表工程</label>
    <div class='col-xs-8'>
     <textarea  class='form-control' name='p21' rows='4'>".$row['c21']."</textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>工程技术人员情况</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p22' value='".$row['c22']."'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>近三年完成的网格资质展开面积及其总和</label>
    <div class='col-xs-8'>
     <textarea  class='form-control' rows='5' name='p23'>".$row['c23']."</textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>近六年完成的三项对应于申请等级的网格资质工程</label>
    <div class='col-xs-8'>
     <textarea  class='form-control' rows='6' name='p24'>".$row['c24']."</textarea>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>曾获奖项</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p25' value='".$row['c25']."'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>软件情况</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p26'  value='".$row['c26']."'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>ISO9000证书号（或相应的质量标准）</label>
    <div class='col-xs-8'>
     <textarea  class='form-control'  rows='5' name='p27'> ".$row['c27']."</textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>质量事故</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p28'  value='".$row['c28']."'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>填表日期</label>
    <div class='col-xs-8'>
     <input  class='form-control'   value='".$row['c29']."' name='p29'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>联系人</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p30'  value='".$row['c30']."'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>手机</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p31'  value='".$row['c31']."'>
    </div>
  </div>"; 
$location=2;
include "process.php";
  ?>