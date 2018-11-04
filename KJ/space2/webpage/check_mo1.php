<?php //查看mo1_zhuanxiang mo1_chengbao 膜初审表
session_start();
$category = $_SESSION['category'];
$id = $_SESSION['id'];
$sheet = $_GET['type'];
// if ($_POST['send2'] == 'yes') //专家提交 重进入验证在expert.php 这个可以放在前面，但是为了整齐就放在这里了，数据库会多加载一次。
// {
//     for ($i = 0; $i < 6; $i++) {
//         $str = "judge" . ($i + 1);
//         $s[$i] = $_POST[$str];
//         $str1 = "judge1" . ($i + 1);
//         $s1[$i] = $_POST[$str1];                  //获取打分
//     }
//     $info = $_POST['info'];
//     $info = addslashes($info);
//     $query = "update expert set s1='" . $s[0] . "',s2='" . $s[1] . "',s3='" . $s[2] . "',s4='" . $s[3] . "',s5='" . $s[4] . "',s6='" . $s[5] . "',s6='" . $s1[0] . "',s7='" . $s1[1] . "',s8='" . $s1[2] . "',s9='" . $s1[3] . "',s10='" . $s1[4] . "',s11='" . $s1[5] . "',state='2' where id=$index"; //注意这里变化的是expert表的state而不是form表的                                       state
//     $result = $db->query($query);
//     $query = "update $sheet set state=3 where id=$id_f";
//     $db->query($query);
//     if ($result)
//         echo "<script language=javascript>alert('提交成功！'); </script>";
//     else echo "<script language=javascript>alert('出错！请联系管理员'); </script>";
//     exit();
// }
if ($_GET['index'] != 0 && $_GET['index'] != -1 && $_GET['index'] != -2 || $category == 1) {
    $location = 1;
    if($category != 1){
        include "process.php"; 
    }
    if($sheet == 'mo1_zhuanxiang' || $category == 1){
        if($category == 1){
            $query = "select * from mo1_zhuanxiang where id_p=$id";
            $result = $db->query($query);
            $row = $result->fetch_assoc();
        }
       echo"
            <div class='container-fluid' style='margin-top:5px'>
              <input id='btnPrint' class='noprint btn btn-info' type='button' value='打印' onclick='javascript:window.print();' style='font-weight:bold; text-decoration:none;cursor:pointer;float:right;!important; cursor:hand'/>
            </div>
            <div class='container-fluid hidden-xs ' style='margin-top:10px' >
               <form enctype='multipart/form-data' action='' method='post'>
                   <table class='table table-bordered text-center table-responsive noprint' name='design' >
                      <tbody>
			          <h3 class='text-center'>中国钢结构协会空间结构分会膜结构专项设计企业等级会员申请表</h3>
	                  <br/>
                        <tr>
                           <td colspan='2'>单位名称</td>
                           <td colspan='4'>" . $row['c1'] . "</td>
                           <td colspan='2'>成立时间</td>
                           <td colspan='4'>" . $row['c2'] . "</td>
                        </tr>
                        <tr>
                           <td colspan='2'>单位地址</td>
                           <td colspan='4'>" . $row['c3'] . "</td>
                           <td colspan='2'>现有等级</td>
                           <td colspan='4'>" . $row['c4'] . "</td>
                        </tr>
                        <tr>
                            <td colspan='2'>营业执照注册号</td>
                            <td colspan='4'>" . $row['c5'] . "</td>
                            <td colspan='2'>电   话</td>
                            <td colspan='4'>" . $row['c6'] . "</td>
                        </tr>
                        <tr>
                           <td colspan='2' >法定代表人</td>
                           <td colspan='2'>" . $row['c7'] . "</td>
                           <td colspan='1'>职务</td> <td colspan='2'>" . $row['c8'] . "</td>
                           <td colspan='3'>职称</td> <td colspan='2'>" . $row['c9'] . "</td>
                        </tr>
                        <tr>
                           <td colspan='2' >企业负责人</td>
                           <td colspan='2'>" . $row['c10'] . "</td>
                           <td colspan='1'>职务</td> <td colspan='2'>" . $row['c11'] . "</td>
                           <td colspan='3'>职称</td> <td colspan='2'>" . $row['c12'] . "</td>
                        </tr>
                        <tr>
                           <td colspan='2' >技术负责人</td>
                           <td colspan='2'>" . $row['c13'] . "</td>
                           <td colspan='1'>职务</td> <td colspan='2'>" . $row['c14'] . "</td>
                           <td colspan='3'>职称</td> <td colspan='2'>" . $row['c15'] . "</td>
                        </tr>
                        <tr>
                           <td colspan='2'>第一申请级别</td>
                           <td colspan='10'>" . $row['c16'] . "</td>
                        </tr>
                        <tr>
                            <td colspan='2'>第二申请级别</td>
                            <td colspan='10'>" . $row['c17'] . "</td>
                        </tr>
                        <tr>
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
                                " . $row['c18'] . "
                            </td>
                            <td colspan='2'>
                                支撑材料一
                            </td>
                            <td colspan='1'>
				               <a href='webpage/mo1/" . $row['id_p'] . "+file1.doc'> 查看支撑材料1</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan='1' rowspan='4'>2
                            </td>
                            <td colspan='2' rowspan='4'>从业人员
                            </td>
                            <td colspan='3'>从业人数</td>
                            <td colspan='3'>" . $row['c19'] . "
                            </td>
					        <td colspan='2' rowspan='4'> 支撑材料二</td>
				            <td colspan='1' rowspan='4' >
				                <a href='webpage/mo1/" . $row['id_p'] . "+file2.doc'> 查看支撑材料2</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan='3'>总工职称证书号</td>
                            <td colspan='3'>
                                 " . $row['c20'] . "
                            </td>
                        </tr>
                        <tr>
                            <td colspan='3'>总工程师主持的膜结构代表工程</td>
                            <td colspan='3'>" . $row['c21'] . "
                            </td>
                        </tr>
                        <tr>
                            <td colspan='3'>工程技术人员情况</td>
                            <td colspan='3'>
                                " . $row['c22'] . "
                            </td>
                        </tr>
                        <tr>
                            <td colspan='1' rowspan='3'>3
                            </td>
                            <td colspan='2' rowspan='3'>
                                工程业绩
                            </td>
                            <td colspan='3'>近三年完成的膜结构<br>展开面积及其总和</td>
                            <td colspan='3'>" . $row['c23'] . "
                            </td>
				            <td colspan='2' rowspan='3'> 支撑材料三</td>
				            <td colspan='1' rowspan='3' >
				                 <a href='webpage/mo1/" . $row['id_p'] . "+file3.doc'> 查看支撑材料3</a>
                            </td>
            </tr>
            <tr>
                <td colspan='3'>近六年完成的三项对应于申请等级的膜结构工程</td>
                <td colspan='3'>
                    " . $row['c24'] . "
                </td>
            </tr>
            <tr>
                <td colspan='3'>曾获奖项</td>
                <td colspan='3'>
                     " . $row['c25'] . "
                </td>
            </tr>
            <tr>
                <td colspan='1'>4</td>
                <td colspan='2'>技术装备</td>
                <td colspan='3'>软件情况</td>
                <td colspan='3'>  " . $row['c26'] . "</td>
				<td colspan='2'> 支撑材料四</td>
				<td colspan='1'>
				<a href='webpage/mo1/" . $row['id_p'] . "+file3.doc'> 查看支撑材料4</a>
                </td>
            </tr>
            <tr>
                <td colspan='1'>5</td>
                <td colspan='2'>质量管理</td>
                <td colspan='3'>ISO9000证书号（或相应的质量标准）</td>
                <td colspan='3'>  " . $row['c27'] . "</td>
				<td colspan='2'> 支撑材料五</td>
				<td colspan='1'>
				<a href='webpage/mo1/" . $row['id_p'] . "+file5.doc'> 查看支撑材料5</a>
                </td>
            </tr>
            <tr>
                <td colspan='1'>6</td>
                <td colspan='2'>质量事故</td>
                <td colspan='6'>  " . $row['c28'] . "</td>
				<td colspan='2'> 支撑材料六</td>
				<td colspan='1'>
				<a href='webpage/mo1/" . $row['id_p'] . "+file6.doc'> 查看支撑材料6</a>
                </td>
            </tr>

        <tr>
            <td colspan='2' >填表日期</td>
            <td colspan='2'>" . $row['c29'] . "</td>
            <td colspan='2'>联系人</td> <td colspan='2'>" . $row['c30'] . "</td>
            <td colspan='3'>手机</td> <td colspan='1'>" . $row['c31'] . "</td>
        </tr>
            </tbody>
        </table>";

    echo "</div>"; 
    //手机端代码
    echo "
    <div class='container-fluid visible-xs noprint'>
    <form enctype='multipart/form-data'  action='' method='post'>
     <h5 class='text-center noprint'><strong>中国钢结构协会空间结构分会膜结构专项设计企业等级会员申请表</strong></h5>
     <table class='table table-bordered text-center noprint' style='font-size:14px'>
     <tbody>
    <tr><td>单位名称</td></tr>
    <tr><td>" . $row['c1'] . "</td></tr>
    <tr><td>成立时间</td></tr>
    <tr><td>" . $row['c2'] . "</td></tr>
    <tr><td>单位地址</td></tr>
    <tr><td>" . $row['c3'] . "</td></tr>
    <tr><td>现有等级</td></tr>
    <tr><td>" . $row['c4'] . "</td></tr>
    <tr><td>营业执照注册号</td></tr>
    <tr><td>" . $row['c5'] . "</td></tr>
    <tr><td>电   话</td></tr>
    <tr><td>" . $row['c6'] . "</td></tr>
    <tr><td>法定代表人</td></tr>
    <tr><td>" . $row['c7'] . "</td></tr>
    <tr><td>职务</td></tr>
    <tr><td>" . $row['c8'] . "</td></tr>
    <tr><td>职称</td></tr>
    <tr><td>" . $row['c9'] . "</td></tr>
    <tr><td>企业负责人</td></tr>
    <tr><td>" . $row['c10'] . "</td></tr>
    <tr><td>职务</td></tr>
    <tr><td>" . $row['c11'] . "</td></tr>
    <tr><td>职称</td></tr>
    <tr><td>" . $row['c12'] . "</td></tr>
    <tr><td>技术负责人</td></tr>
    <tr><td>" . $row['c13'] . "</td></tr>
    <tr><td>职务</td></tr>
    <tr><td>" . $row['c14'] . "</td></tr>
    <tr><td>职称</td></tr>
    <tr><td>" . $row['c15'] . "</td></tr>
    <tr><td>第一申请级别</td></tr>
    <tr><td>" . $row['c16'] . "</td></tr>
    <tr><td>第二申请级别</td></tr>
    <tr><td>" . $row['c17'] . "</td></tr>
    <tr>
    <td>评定项目</td></tr>
    <tr><td>1.资产规模</td></tr>
    <tr><td>注册资本金</td></tr>
    <tr><td>" . $row['c18'] . "</td></tr>
    <tr><td><a href='webpage/mo1/" . $row['id_p'] . "+file1.doc'>支撑材料1</a></td></tr>
    <tr><td>2.从业人员</td></tr>
    <tr><td>从业人数</td></tr>
    <tr><td>" . $row['c19'] . "</td></tr>
    <tr><td>总工职称证书号</td></tr>
    <tr><td>" . $row['c20'] . "</td></tr>
    <tr><td>总工程师主持的膜结构代表工程</td></tr>
    <tr><td>" . $row['c21'] . "</td></tr>
    <tr><td>工程技术人员情况</td></tr>
    <tr><td>" . $row['c22'] . "</td></tr>
    <tr><td><a href='webpage/mo1/" . $row['id_p'] . "+file2.doc'>支撑材料2</a></td></tr>
    <tr><td>3.工程业绩</td></tr>
    <tr><td>近三年完成的膜结构展开面积及其总和</td></tr>
    <tr><td>" . $row['c23'] . "</td></tr>
    <tr><td>近六年完成的三项对应于申请等级的膜结构工程</td></tr>
    <tr><td>" . $row['c24'] . "</td></tr>
    <tr><td>曾获奖项</td></tr>
    <tr><td>" . $row['c25'] . "</td></tr>
    <tr><td><a href='webpage/mo1/" . $row['id_p'] . "+file3.doc'>支撑材料3</a></td></tr>
    <tr><td>4.技术装备</td></tr>
    <tr><td>软件情况</td></tr>
    <tr><td> " . $row['c26'] . "</td></tr>
    <tr><td><a href='webpage/mo1/" . $row['id_p'] . "+file4.doc'>支撑材料4</a></td></tr>
    <tr><td>5.质量管理</td></tr>
    <tr><td>ISO9000证书号（或相应的质量标准）</td></tr>
    <tr><td> " . $row['c27'] . "</td></tr>
    <tr><td><a href='webpage/mo1/" . $row['id_p'] . "+file5.doc'>支撑材料5</a></td></tr>
    <tr><td>6.质量事故</td></tr>
    <tr><td> " . $row['c28'] . "</td></tr>
    <tr><td><a href='webpage/mo1/" . $row['id_p'] . "+file6.doc'>支撑材料6</a></td></tr>
    <tr><td>填表人</td></tr>
    <tr><td>" . $row['c29'] . "</td></tr>
    <tr><td>填表日期</td></tr>
    <tr><td>" . $row['c30'] . "</td></tr>
    <tr><td>手机</td></tr>
    <tr><td>" . $row['c31'] . "</td></tr>
                </tbody></table>";
    
        echo " </div>";
}
if($sheet =='mo1_chengbao' || $category == 1){
   //上个表格是专项设计的表格，这个表格是工程承包的表格
   if($category == 1){
    $query = "select * from mo1_chengbao where id_p=$id";
    $result = $db->query($query);
    $row = $result->fetch_assoc();
    }    
   echo " 
    <div class='container-fluid' style='margin-top:5px'>
        <input id='btnPrint' class='noprint btn btn-info' type='button' value='打印' onclick='javascript:window.print();' style='font-weight:bold; text-decoration:none;cursor:pointer;float:right;!important; cursor:hand'/>
    </div>
   <div class='container-fluid hidden-xs'>
 <table class='table table-bordered text-center table-responsive noprint' name='chengbao' >
     <tbody>
     <h3 class='text-center noprint'>中国钢结构协会空间结构分会膜结构工程承包企业等级会员申请表</h3>
<br/>
     <tr>
        <td colspan='2'>单位名称</td>
         <td colspan='3'>" . $row['c1'] . "</td>
         <td colspan='2'>成立时间</td>
         <td colspan='5'>" . $row['c2'] . "</td>
     </tr>
     <tr>
         <td colspan='2'>单位地址</td>
         <td colspan='3'>" . $row['c3'] . "</td>
         <td colspan='2'>现有等级</td>
         <td colspan='5'>" . $row['c4'] . "</td>
     </tr>
     <tr>
         <td colspan='2'>营业执照注册号</td>
         <td colspan='3'>" . $row['c5'] . "</td>
         <td colspan='2'>电   话</td>
         <td colspan='5'>" . $row['c6'] . "</td>
     </tr>
     <tr>
         <td colspan='2' >法定代表人</td>
         <td colspan='2'>" . $row['c7'] . "</td>
         <td colspan='1'>职务</td> <td colspan='2'>" . $row['c8'] . "</td>
         <td colspan='3'>职称</td> <td colspan='2'>" . $row['c9'] . "</td>
     </tr>
        <tr>
            <td colspan='2' >企业负责人</td>
            <td colspan='2'>" . $row['c10'] . "</td>
            <td colspan='1'>职务</td> <td colspan='2'>" . $row['c11'] . "</td>
            <td colspan='3'>职称</td> <td colspan='2'>" . $row['c12'] . "</td>
        </tr>
        <tr>
            <td colspan='2' >技术负责人</td>
            <td colspan='2'>" . $row['c13'] . "</td>
            <td colspan='1'>职务</td> <td colspan='2'>" . $row['c14'] . "</td>
            <td colspan='3'>职称</td> <td colspan='2'>" . $row['c15'] . "</td>
        </tr>
     <tr>
     <td colspan='2'>申请类别</td>
         <td colspan='10'>
         
" . $row['c16'] . " " . $row['c17'] . " " . $row['c18'] . " " . $row['c19'] . "
</td>
</tr>
     <tr>
         <td colspan='3'>第一申请级别</td>
         <td colspan='3'>" . $row['c20'] . "</td>
         <td colspan='2'>第二申请级别</td>
         <td colspan='4'>" . $row['c21'] . "</td>
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
             " . $row['c22'] . "
         </td>
<td colspan='2'>
             支撑材料一
         </td>
         <td colspan='1'>
         <a href='webpage/mo1/" . $row['id_p'] . "+file7.doc'> 查看支撑材料1</a>
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
                " . $row['c23'] . "
             </td>
             <td colspan='2' rowspan='5'> 支撑材料二</td>
         <td colspan='1' rowspan='5' >
             <a href='webpage/mo1/" . $row['id_p'] . "+file8.doc'> 查看支撑材料2</a>
         </td>
         </tr>
     <tr>
         <td colspan='3'>总工职称证书号</td>
         <td colspan='3'>
               " . $row['c24'] . "
         </td>
     </tr>
     <tr>
         <td colspan='3'>总工程师主持的膜结构代表工程</td>
         <td colspan='3'>
                " . $row['c25'] . "
         </td>
     </tr>
     <tr>
         <td colspan='3'>项目经理的人数与等级情况</td>
         <td colspan='3'>
              " . $row['c26'] . "
         </td>
     </tr>
     <tr>
         <td colspan='3'>工程技术人员情况</td>
         <td colspan='3'>
                " . $row['c27'] . "
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
               " . $row['c28'] . "
         </td>
         <td colspan='2' rowspan='3'> 支撑材料三</td>
         <td colspan='1' rowspan='3' >
         <a href='webpage/mo1/" . $row['id_p'] . "+file9.doc'> 查看支撑材料3</a>
         </td>
     </tr>
     <tr>
         <td colspan='3'>近六年完成的三项对应于申请等级的膜结构工程</td>
         <td colspan='3'>
              " . $row['c29'] . "
         </td>
     </tr>
     <tr>
         <td colspan='3'>曾获奖项</td>
         <td colspan='3'>
               " . $row['c30'] . "
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
            " . $row['c31'] . "
         </td>
         <td colspan='2' rowspan='4'> 支撑材料四</td>
         <td colspan='1' rowspan='4' >
         <a href='webpage/mo1/" . $row['id_p'] . "+file10.doc'> 查看支撑材料4</a>
         </td>
     </tr>
     <tr>
         <td colspan='3'>加工设备名称/数量</td>
         <td colspan='3'>
            " . $row['c32'] . "
         </td>
     </tr>
      <tr>
         <td colspan='3'>安装设备名称/数量</td>
         <td colspan='3'>
            " . $row['c33'] . "
         </td>
     </tr>
     <tr>
         <td colspan='3'>检验设备名称/数量</td>
         <td colspan='3'>
            " . $row['c34'] . "
         </td>
     </tr>
     
     <tr>
         <td colspan='1'>5</td>
         <td colspan='2'>质量管理</td>
         <td colspan='3'>ISO9000证书号（或相应的质量标准）</td>
         <td colspan='3'>" . $row['c35'] . "</td>
         <td colspan='2'> 支撑材料五</td>
         <td colspan='1'>
         <a href='webpage/mo1/" . $row['id_p'] . "+file11.doc'> 查看支撑材料5</a>
         </td>
     </tr>
     <tr>
         <td colspan='1'>6</td>
         <td colspan='2'>质量事故</td>
         <td colspan='6'>" . $row['c36'] . "</td>
         <td colspan='2'> 支撑材料六</td>
         <td colspan='1'>
         <a href='webpage/mo1/" . $row['id_p'] . "+file12.doc'> 查看支撑材料6</a>
         </td>
     </tr>

 <tr>
     <td colspan='2' >填表日期</td>
     <td colspan='2'>" . $row['c37'] . "</td>
     <td colspan='2'>联系人</td> <td colspan='2'>" . $row['c38'] . "</td>
     <td colspan='3'>手机</td> <td colspan='1'>" . $row['c39'] . "</td>
 </tr>
     </tbody>
 </table>";

echo "</div>";
//手机端代码
echo"<div class='container-fluid visible-xs noprint' >
<form enctype='multipart/form-data'  action='' method='post'>
<h5 class='text-center noprint'><strong>中国钢结构协会空间结构分会膜结构工程承包企业等级会员申请表</strong></h5>   
<table class='table table-bordered text-center table-responsive noprint' name='chengbao' >
        <tbody>
        <tr><td>单位名称</td></tr>
        <tr><td>" . $row['c1'] . "</td></tr>
        <tr><td>成立时间</td></tr>
        <tr><td>" . $row['c2'] . "</td></tr>
        <tr><td>单位地址</td></tr>
<tr><td>" . $row['c3'] . "</td></tr>
<tr><td>现有等级</td></tr>
<tr><td>" . $row['c4'] . "</td></tr>
<tr><td>营业执照注册号</td></tr>
<tr><td>" . $row['c5'] . "</td></tr>
<tr><td>电   话</td></tr>
<tr><td>" . $row['c6'] . "</td></tr>
<tr><td>法定代表人</td></tr>
<tr><td>" . $row['c7'] . "</td></tr>
<tr><td>职务</td></tr>
<tr><td>" . $row['c8'] . "</td></tr>
<tr><td>职称</td></tr>
<tr><td>" . $row['c9'] . "</td></tr>
<tr><td>企业负责人</td></tr>
<tr><td>" . $row['c10'] . "</td></tr>
<tr><td>职务</td></tr>
<tr><td>" . $row['c11'] . "</td></tr>
<tr><td>职称</td></tr>
<tr><td>" . $row['c12'] . "</td></tr>
<tr><td>技术负责人</td></tr>
<tr><td>" . $row['c13'] . "</td></tr>
<tr><td>职务</td></tr>
<tr><td>" . $row['c14'] . "</td></tr>
<tr><td>职称</td></tr>
<tr><td>" . $row['c15'] . "</td></tr>
<tr><td>申请类别</td></tr>
<tr><td> " . $row['c16'] . " " . $row['c17'] . " " . $row['c18'] . " " . $row['c19'] . "</td></tr>
<tr><td>第一申请级别</td></tr>
<tr><td>" . $row['c20'] . "</td></tr>
<tr><td>第二申请级别</td></tr>
<tr><td>" . $row['c21'] . "</td></tr>
<tr>
<td>评定项目</td></tr>
<tr><td>1.资产规模</td></tr>
<tr><td>注册资本金</td></tr>
<tr><td>" . $row['c22'] . "</td></tr>
<tr><td><a href='webpage/mo1/" . $row['id_p'] . "+file7.doc'>支撑材料1</a></td></tr>
<tr><td>2.从业人员</td></tr>
<tr><td>从业人数</td></tr>
<tr><td>" . $row['c23'] . "</td></tr>
<tr><td>总工职称证书号</td></tr>
<tr><td>" . $row['c24'] . "</td></tr>
<tr><td>总工程师主持的膜结构代表工程</td></tr>
<tr><td>" . $row['c25'] . "</td></tr>
<tr><td>项目经理的人数与等级情况</td></tr>
<tr><td>" . $row['c26'] . "</td></tr>
<tr><td>工程技术人员情况</td></tr>
<tr><td>" . $row['c27'] . "</td></tr>
<tr><td><a href='webpage/mo1/" . $row['id_p'] . "+file8.doc'>支撑材料2</a></td></tr>
<tr><td>3.工程业绩</td></tr>
<tr><td>近三年完成的膜结构展开面积及其总和</td></tr>
<tr><td>" . $row['c28'] . "</td></tr>
<tr><td>近六年完成的三项对应于申请等级的膜结构工程</td></tr>
<tr><td>" . $row['c29'] . "</td></tr>
<tr><td>曾获奖项</td></tr>
<tr><td>" . $row['c30'] . "</td></tr>
<tr><td><a href='webpage/mo1/" . $row['id_p'] . "+file9.doc'>支撑材料3</a></td></tr>
<tr><td>4.技术装备</td></tr>
<tr><td>加工车间规模</td></tr>
<tr><td> " . $row['c31'] . "</td></tr>
<tr><td>加工设备名称/数量</td></tr>
<tr><td> " . $row['c32'] . "</td></tr>
<tr><td>安装设备名称/数量</td></tr>
<tr><td> " . $row['c33'] . "</td></tr>
<tr><td>检验设备名称/数量</td></tr>
<tr><td> " . $row['c34'] . "</td></tr>
<tr><td><a href='webpage/mo1/" . $row['id_p'] . "+file10.doc'>支撑材料4</a></td></tr>
<tr><td>5.质量管理</td></tr>
<tr><td>ISO9000证书号（或相应的质量标准）</td></tr>
<tr><td> " . $row['c35'] . "</td></tr>
<tr><td><a href='webpage/mo1/" . $row['id_p'] . "+file11.doc'>支撑材料5</a></td></tr>
<tr><td>6.质量事故</td></tr>
<tr><td> " . $row['c36'] . "</td></tr>
<tr><td><a href='webpage/mo1/" . $row['id_p'] . "+file12.doc'>支撑材料6</a></td></tr>
<tr><td>填表人</td></tr>
<tr><td>" . $row['c37'] . "</td></tr>
<tr><td>填表日期</td></tr>
<tr><td>" . $row['c38'] . "</td></tr>
<tr><td>手机</td></tr>
<tr><td>" . $row['c39'] . "</td></tr>
 <tbody>
 </table>";
echo "
</div>";
}
}else if ($index == '0') {
    $query = "select * from $sheet where state='4'";
    $result = $db->query($query);
    $num_results = $result->num_rows;
    if ($num_results == 0) {
        echo "<h3><span class='label label-warning'>尚未有企业提交</span></h3>";
        exit();
    }

//if($row1['state']==1)
	//echo"<div class='container-fluid'><h3><span class='label label-warning'>您已向管理员投递，本次提交数据会覆盖上次数据</span></h3></div>";
//if($row1['state']==2||$row1['state']==3)
	//echo"<div class='container-fluid'><h3><span class='label label-warning'>管理员已返回意见，本次提交数据会再次发送给管理员</span></h3></div>";
    echo "
<div class='container-fluid'>
<form enctype='multipart/form-data' action='' method='post'>
<table class='table table-bordered table-responsive text-left' style='margin-top:1em;font-size:1.2em;'>
<tr><td style='font-family:仿宋;' colspan='7' class='noborder-table'><strong>各位常务理事：</strong></td></tr>
<tr><td colspan='31' class='noborder-table' style='font-family:仿宋;'>
<strong><textarea class='form-control' name='p4' rows='10' style='font-size:1em'></textarea></strong></td>
</table>
	<div style='margin-top:3em'>
    <table class='table table-bordered table-responsive text-center' style='margin-top:2em;font-size:1em;'>
	  <input type='text' class='form-control noborder-input text-center input-lg' style='font-size:22px;' name='p1' value='中国钢结构协会空间结构分会'>
      <input class='form-control noborder-input text-center input-lg' style='font-size:22px' name='p2'value='膜结构企业等级会员第十七次评审暨第九次评审结果'>
        <tr>
            <th colspan='1' style='text-align:center;'>序号</th>
			 <th colspan='6' style='text-align:center;width:14%'>单位名称</th>
			  <th colspan='6' style='text-align:center;'>申报等级</th>
              <th colspan='6' style='text-align:center;'>评审结果</th>
            
        </tr>";
		//这里从mo1表中查找要投递给理事会的企业
    $num = $num_results;
    for ($i = 1; $i <= $num_results; $i++) {
        $r = "r" . $i;//两个评审结果
        $t = "t" . $i;//需要问孙老师，用不用修改评审结果。
        $row2 = $result->fetch_assoc();
        $p = "cid" . $i;
        echo "<input type='hidden' name='$p' value='" . $row2['id'] . "'>
				<input type='hidden' name='num' value='$num'>";
        if ($row2['c16'] != null && $row2['c17'] != null) {
            echo " 
				<tr>
            <td colspan='1' rowspan='2' style='text-align:center;'>$i</td>
			 <td colspan='6' rowspan='2' style='text-align:center;'>
			 " . $row2['c1'] . "</td>
			 <td colspan='6'> " . $row2['c16'] . " </td>
			<td colspan='6'> <input type='text' name='$r' class='form-control noborder-input text-center' style='font-size:14px;' value='" . $row2['c16'] . "'>  </td>
			  <tr><td colspan='6'>" . $row2['c17'] . " </td> 
			 <td colspan='6'> <input type='text' name='$t' class='form-control noborder-input text-center' style='font-size:14px;' value='" . $row2['c17'] . "'>  </td></tr>
        </tr> ";
        } else {

            echo " 
				<tr>
            <td colspan='1' style='text-align:center;'>$i</td>
			 <td colspan='6' style='text-align:center;'>
			 " . $row2['c1'] . "</td>
			 <td colspan='6'> " . $row2['c16'] . " </td>
			 <td colspan='6'> <input type='text' name='$r' class='form-control noborder-input text-center' style='font-size:14px;' value='" . $row2['c16'] . "'>
			 <input type='hidden' name='$t'></td>
        </tr> ";
        }
    }
    echo "
<tr class='text-righ'>
<td colspan='4' class='noborder-table'>审批人:</td>
<td colspan='6' class='noborder-table'>
</td>
<td colspan='2' class='noborder-table'>日期：</td>
<td colspan='6' class='noborder-table'>
</td>
</tr>
<tr>
<td colspan='4'class='noborder-table'>备注：</td>
<td colspan='27'class='noborder-table'><input class='form-control' name='p3'></td>
</tr>
</table></div>
<div style='text-align: right;margin-bottom: 2%'>
				<input type='hidden' value='yes' name='send4'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 投递给理事会&nbsp; &nbsp;
				</button>
			</div>
		</form>
		";
}
// echo "<div class='col-xs-9' style='float:right'>";
$location = 2;
include "process.php";
echo "</div></div>";
//下面是打印的代码
if($sheet =='mo1_zhuanxiang' ||  $category == 1){
    if($category == 1){
        $query = "select * from mo1_zhuanxiang where id_p=$id";
        $result = $db->query($query);
        $row = $result->fetch_assoc();
    }
echo "
<div class='print1' >
		 <table class='table-bordered text-center' width=100%;>
            <tbody>
			<h4 class='text-center'>中国钢结构协会空间结构分会膜结构专项设计企业等级会员申请表</h4>
	<br/>
            <tr>
               <td colspan='2'>单位名称</td>
                <td colspan='4'>" . $row['c1'] . "</td>
                <td colspan='2'>成立时间</td>
                <td colspan='4'>" . $row['c2'] . "</td>
            </tr>
            <tr>
                <td colspan='2'>单位地址</td>
                <td colspan='4'>" . $row['c3'] . "</td>
                <td colspan='2'>现有等级</td>
                <td colspan='4'>" . $row['c4'] . "</td>
            </tr>
            <tr>
                <td colspan='2'>营业执照注册号</td>
                <td colspan='4'>" . $row['c5'] . "</td>
                <td colspan='2'>电   话</td>
                <td colspan='4'>" . $row['c6'] . "</td>
            </tr>
            <tr>
                <td colspan='2' >法定代表人</td>
                <td colspan='2'>" . $row['c7'] . "</td>
                <td colspan='1'>职务</td> <td colspan='2'>" . $row['c8'] . "</td>
                <td colspan='3'>职称</td> <td colspan='2'>" . $row['c9'] . "</td>
            </tr>
               <tr>
                   <td colspan='2' >企业负责人</td>
                   <td colspan='2'>" . $row['c10'] . "</td>
                   <td colspan='1'>职务</td> <td colspan='2'>" . $row['c11'] . "</td>
                   <td colspan='3'>职称</td> <td colspan='2'>" . $row['c12'] . "</td>
               </tr>
               <tr>
                   <td colspan='2' >技术负责人</td>
                   <td colspan='2'>" . $row['c13'] . "</td>
                   <td colspan='1'>职务</td> <td colspan='2'>" . $row['c14'] . "</td>
                   <td colspan='3'>职称</td> <td colspan='2'>" . $row['c15'] . "</td>
               </tr>
            <tr>
            <td colspan='2'>第一申请级别</td>
                <td colspan='10'>" . $row['c16'] . "</td>
            </tr>
            <tr>
                <td colspan='2'>第二申请级别</td>
                <td colspan='10'>" . $row['c17'] . "</td>
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
                    " . $row['c18'] . "
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
                        " . $row['c19'] . "
                    </td>
            </tr>
            <tr>
                <td colspan='3'>总工职称证书号</td>
                <td colspan='6'>
                    " . $row['c20'] . "
                </td>
            </tr>
            <tr>
                <td colspan='3'>总工程师主持的膜结构代表工程</td>
                <td colspan='6'>
                     " . $row['c21'] . "
                </td>
            </tr>
            <tr>
                <td colspan='3'>工程技术人员情况</td>
                <td colspan='6'>
                     " . $row['c22'] . "
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
                <td colspan='6'>
                    " . $row['c23'] . "
                </td>				
            </tr>
            <tr>
                <td colspan='3'>近六年完成的三项对应于申请等级的膜结构工程</td>
                <td colspan='6'>
                    " . $row['c24'] . "
                </td>
            </tr>
            <tr>
                <td colspan='3'>曾获奖项</td>
                <td colspan='6'>
                     " . $row['c25'] . "
                </td>
            </tr>
            <tr>
                <td colspan='1'>4</td>
                <td colspan='2'>技术装备</td>
                <td colspan='3'>软件情况</td>
                <td colspan='6'>  " . $row['c26'] . "</td>
				
            </tr>
            <tr>
                <td colspan='1'>5</td>
                <td colspan='2'>质量管理</td>
                <td colspan='3'>ISO9000证书号（或相应的质量标准）</td>
                <td colspan='6'>  " . $row['c27'] . "</td>				
            </tr>
            <tr>
                <td colspan='1'>6</td>
                <td colspan='2'>质量事故</td>
                <td colspan='9'>  " . $row['c28'] . "</td>				
            </tr>
        <tr>
            <td colspan='2' >填表日期</td>
            <td colspan='2'>" . $row['c29'] . "</td>
            <td colspan='2'>联系人</td> <td colspan='2'>" . $row['c30'] . "</td>
            <td colspan='3'>手机</td> <td colspan='1'>" . $row['c31'] . "</td>
        </tr>
            </tbody>
        </table></div>";
}else if($sheet == 'mo1_chengbao' || $category == 1){
    if($category == 1){
        $query = "select * from mo1_chengbao where id_p=$id";
        $result = $db->query($query);
        $row = $result->fetch_assoc();
        }  
echo "
<div class='print1'>
<table class='table-bordered text-center'  width=100%; >
            <tbody>
			<h4 class='text-center' >中国钢结构协会空间结构分会膜结构工程承包企业等级会员申请表</h4>
	<br/>
            <tr>
               <td colspan='2'>单位名称</td>
                <td colspan='3'>" . $row['c1'] . "</td>
                <td colspan='2'>成立时间</td>
                <td colspan='5'>" . $row['c2'] . "</td>
            </tr>
            <tr>
                <td colspan='2'>单位地址</td>
                <td colspan='3'>" . $row['c3'] . "</td>
                <td colspan='2'>现有等级</td>
                <td colspan='5'>" . $row['c4'] . "</td>
            </tr>
            <tr>
                <td colspan='2'>营业执照注册号</td>
                <td colspan='3'>" . $row['c5'] . "</td>
                <td colspan='2'>电   话</td>
                <td colspan='5'>" . $row['c6'] . "</td>
            </tr>
            <tr>
                <td colspan='2' >法定代表人</td>
                <td colspan='2'>" . $row['c7'] . "</td>
                <td colspan='1'>职务</td> <td colspan='2'>" . $row['c8'] . "</td>
                <td colspan='3'>职称</td> <td colspan='2'>" . $row['c9'] . "</td>
            </tr>
               <tr>
                   <td colspan='2' >企业负责人</td>
                   <td colspan='2'>" . $row['c10'] . "</td>
                   <td colspan='1'>职务</td> <td colspan='2'>" . $row['c11'] . "</td>
                   <td colspan='3'>职称</td> <td colspan='2'>" . $row['c12'] . "</td>
               </tr>
               <tr>
                   <td colspan='2' >技术负责人</td>
                   <td colspan='2'>" . $row['c13'] . "</td>
                   <td colspan='1'>职务</td> <td colspan='2'>" . $row['c14'] . "</td>
                   <td colspan='3'>职称</td> <td colspan='2'>" . $row['c15'] . "</td>
               </tr>
            <tr>
                <td colspan='2'>申请类别</td>
                <td colspan='10'>				
                    " . $row['c16'] . " " . $row['c17'] . " " . $row['c18'] . " " . $row['c19'] . "
                </td>
            </tr>
            <tr>
                <td colspan='3'>第一申请级别</td>
                <td colspan='3'>" . $row['c20'] . "</td>
                <td colspan='2'>第二申请级别</td>
                <td colspan='4'>" . $row['c21'] . "</td>
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
                    " . $row['c22'] . "
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
                    <td colspan='6'>
                       " . $row['c23'] . "
                    </td>
					
                </tr>
            <tr>
                <td colspan='3'>总工职称证书号</td>
                <td colspan='6'>
                      " . $row['c24'] . "
                </td>
            </tr>
            <tr>
                <td colspan='3'>总工程师主持的膜结构代表工程</td>
                <td colspan='6'>
                       " . $row['c25'] . "
                </td>
            </tr>
			<tr>
                <td colspan='3'>项目经理的人数与等级情况</td>
                <td colspan='6'>
                     " . $row['c26'] . "
                </td>
            </tr>
            <tr>
                <td colspan='3'>工程技术人员情况</td>
                <td colspan='6'>
                       " . $row['c27'] . "
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
                <td colspan='6'>
                      " . $row['c28'] . "
                </td>
				
            </tr>
            <tr>
                <td colspan='3'>近六年完成的三项对应于申请等级的膜结构工程</td>
                <td colspan='6'>
                     " . $row['c29'] . "
                </td>
            </tr>
            <tr>
                <td colspan='3'>曾获奖项</td>
                <td colspan='6'>
                      " . $row['c30'] . "
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
                <td colspan='6'>
                   " . $row['c31'] . "
                </td>
				
            </tr>
            <tr>
                <td colspan='3'>加工设备名称/数量</td>
                <td colspan='6'>
                   " . $row['c32'] . "
                </td>
            </tr>
             <tr>
                <td colspan='3'>安装设备名称/数量</td>
                <td colspan='6'>
                   " . $row['c33'] . "
                </td>
            </tr>
			<tr>
                <td colspan='3'>检验设备名称/数量</td>
                <td colspan='6'>
                   " . $row['c34'] . "
                </td>
            </tr>
            
            <tr>
                <td colspan='1'>5</td>
                <td colspan='2'>质量管理</td>
                <td colspan='3'>ISO9000证书号（或相应的质量标准）</td>
                <td colspan='6'>" . $row['c35'] . "</td>
				
            </tr>
            <tr>
                <td colspan='1'>6</td>
                <td colspan='2'>质量事故</td>
                <td colspan='9'>" . $row['c36'] . "</td>
				
            </tr>

        <tr>
            <td colspan='2' >填表日期</td>
            <td colspan='2'>" . $row['c37'] . "</td>
            <td colspan='2'>联系人</td> <td colspan='2'>" . $row['c38'] . "</td>
            <td colspan='3'>手机</td> <td colspan='1'>" . $row['c39'] . "</td>
        </tr>
            </tbody>
        </table>
</div>";
}


/*
if($category==5) //是管理员查看 注意下面select的name 必须带[]符号，post获得时将其去掉，但是获得的是一个数组，注意有s。noneselectedtext属性没有响应，可能需要js控制。
{
	echo "
		<form enctype='multipart/form-data' action='' method='post'>
			<select  name='experts[]' class='selectpicker show-tick form-control' multiple data-live-search='true' noneSelectedText='选择专家'>";
                                  	
	//这里展开专家列表，这种格式：<option value='专家的id'> 专家的name</option >
	$query="select id,name from user where category=3";
	$db->query($query);
	$result=$db->query($query);
	$num_results=$result->num_rows;
	for($i=0;$i<$num_results;$i++)
	{
		$row1=$result->fetch_assoc(); 
		echo "<option value='".$row1['id']."'> ".$row1['name']."</option >"; //这里使用row1 ，因为下面有一个隐藏表单项还要用到row
	}

     echo "        </select>
			<div style='text-align: right;margin-bottom: 2%'>
				<input type='hidden' value='yes' name='send1'>
				<input type='hidden' value='".$row['c1']."' name='name'>
				<button type='submit' class='btn btn-md btn-primary' >&nbsp;&nbsp; 提交 &nbsp; &nbsp;
				</button>
			</div>
		<form>"; 
}
	if($category==3) $flag=2; //专家
	if($category==4) $flag=3; //理事会
 */
//上面的代码也被放进process了
?>