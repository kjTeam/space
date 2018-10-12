<?php 
//获取用户的状态，在状态为2之前，也就是管理员操作之前是可以给更改的。
//添加打印模块的功能，打印功能要单独添加一个模块；
$db=create_database();
		$query="select * from mo1 where id_p=$id ";
		$result=$db->query($query);
		$num_results=$result->num_rows;
		if($num_results) //如果有提交
		{
			$row=$result->fetch_assoc(); 
			echo "<h4><span class='label label-info noprint'>当前状态：";			
			switch ($row['state'])
			{
				case 1: echo "提交待审核</span></h4>";break;//提交待审核
				case 2:	echo "提交待审核</span></h4>";break;//等待专家打分
				case 3:	echo "提交待审核</span></h4>";break;//专家意见反馈
				case 4:	echo "提交待审核</span></h3>";break;//投递给理事会
				case 5:	echo "提交待审核</span></h3>";break;//理事会意见反馈
				case 6:	echo "已通过审核</span></h3>";break;//通过审核
				default: echo "出错</span></h3>";break;
			}
		}
		else
		{
			echo "<script language=javascript>alert('尚未提交申请表'); </script>";//没有提交则退出
			exit();
		}
echo "
<input id='btnPrint' class='noprint btn btn-info' type='button' value='打印' onclick='javascript:window.print();' style='font-weight:bold; text-decoration:none;cursor:pointer;float:right;!important; cursor:hand'/>

<div class='container-fluid hidden-xs ' style='margin-top:30px' >
<ul class='nav nav-tabs' role='tablist' >
  <li role='presentation' class='active'><a href='#design'role='tab' data-toggle='tab'  style='color:#666; font-size:14px'>专项设计</a></li>
  <li role='presentation'><a href='#chengbao' role='tab' data-toggle='tab' style='color:#666; font-size:14px'>工程承包</a></li>
</ul>
<div id='myTabContent' class='tab-content'>
<div class='tab-pane fade in active'  id='design'>
<form enctype='multipart/form-data' action='' method='post'>
        <table class='table table-bordered text-center table-responsive noprint' name='design' >
            <tbody>
			<h3 class='text-center'>中国钢结构协会空间结构分会膜结构专项设计企业等级会员申请表</h3>
	<br/>
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
                <td colspan='1'>职务</td> <td colspan='2'>".$row['c8']."</td>
                <td colspan='3'>职称</td> <td colspan='2'>".$row['c9']."</td>
            </tr>
               <tr>
                   <td colspan='2' >企业负责人</td>
                   <td colspan='2'>".$row['c10']."</td>
                   <td colspan='1'>职务</td> <td colspan='2'>".$row['c11']."</td>
                   <td colspan='3'>职称</td> <td colspan='2'>".$row['c12']."</td>
               </tr>
               <tr>
                   <td colspan='2' >技术负责人</td>
                   <td colspan='2'>".$row['c13']."</td>
                   <td colspan='1'>职务</td> <td colspan='2'>".$row['c14']."</td>
                   <td colspan='3'>职称</td> <td colspan='2'>".$row['c15']."</td>
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
                    ".$row['c18']."
                </td>
 <td colspan='2'>
                    支撑材料一
                </td>
                <td colspan='1'>
				<a href='webpage/mo1/$id+file1.doc'> 查看支撑材料1</a>
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
                        ".$row['c19']."
                    </td>
					<td colspan='2' rowspan='4'> 支撑材料二</td>
				<td colspan='1' rowspan='4' >
				<a href='webpage/mo1/$id+file2.doc'> 查看支撑材料2</a>
                </td>
                </tr>
            <tr>
                <td colspan='3'>总工职称证书号</td>
                <td colspan='3'>
                    ".$row['c20']."
                </td>
            </tr>
            <tr>
                <td colspan='3'>总工程师主持的膜结构代表工程</td>
                <td colspan='3'>
                     ".$row['c21']."
                </td>
            </tr>
            <tr>
                <td colspan='3'>工程技术人员情况</td>
                <td colspan='3'>
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
                <td colspan='3'>近三年完成的膜结构<br>展开面积及其总和</td>
                <td colspan='3'>
                    ".$row['c23']."
                </td>
				<td colspan='2' rowspan='3'> 支撑材料三</td>
				<td colspan='1' rowspan='3' >
				<a href='webpage/mo1/$id+file3.doc'> 查看支撑材料3</a>
                </td>
            </tr>
            <tr>
                <td colspan='3'>近六年完成的三项对应于申请等级的膜结构工程</td>
                <td colspan='3'>
                    ".$row['c24']."
                </td>
            </tr>
            <tr>
                <td colspan='3'>曾获奖项</td>
                <td colspan='3'>
                     ".$row['c25']."
                </td>
            </tr>
            <tr>
                <td colspan='1'>4</td>
                <td colspan='2'>技术装备</td>
                <td colspan='3'>软件情况</td>
                <td colspan='3'>  ".$row['c26']."</td>
				<td colspan='2'> 支撑材料四</td>
				<td colspan='1'>
				<a href='webpage/mo1/$id+file4.doc'> 查看支撑材料4</a>
                </td>
            </tr>
            <tr>
                <td colspan='1'>5</td>
                <td colspan='2'>质量管理</td>
                <td colspan='3'>ISO9000证书号（或相应的质量标准）</td>
                <td colspan='3'>  ".$row['c27']."</td>
				<td colspan='2'> 支撑材料五</td>
				<td colspan='1'>
				<a href='webpage/mo1/$id+file5.doc'> 查看支撑材料5</a>
                </td>
            </tr>
            <tr>
                <td colspan='1'>6</td>
                <td colspan='2'>质量事故</td>
                <td colspan='6'>  ".$row['c28']."</td>
				<td colspan='2'> 支撑材料六</td>
				<td colspan='1'>
				<a href='webpage/mo1/$id+file6.doc'> 查看支撑材料6</a>
                </td>
            </tr>

        <tr>
            <td colspan='2' >填表日期</td>
            <td colspan='2'>".$row['c29']."</td>
            <td colspan='2'>联系人</td> <td colspan='2'>".$row['c30']."</td>
            <td colspan='3'>手机</td> <td colspan='1'>".$row['c31']."</td>
        </tr>
            </tbody>
        </table></div>";
		//下面是打印的表格
		

//上个表格是专项设计的表格，这个表格是工程承包的表格
		echo" 
		  <div class='tab-pane fade' id='chengbao'>
		<table class='table table-bordered text-center table-responsive' name='chengbao' >
            <tbody>
			<h3 class='text-center'>中国钢结构协会空间结构分会膜结构工程承包企业等级会员申请表</h3>
	<br/>
            <tr>
               <td colspan='2'>单位名称</td>
                <td colspan='3'>".$row['r1']."</td>
                <td colspan='2'>成立时间</td>
                <td colspan='5'>".$row['r2']."</td>
            </tr>
            <tr>
                <td colspan='2'>单位地址</td>
                <td colspan='3'>".$row['r3']."</td>
                <td colspan='2'>现有等级</td>
                <td colspan='5'>".$row['r4']."</td>
            </tr>
            <tr>
                <td colspan='2'>营业执照注册号</td>
                <td colspan='3'>".$row['r5']."</td>
                <td colspan='2'>电   话</td>
                <td colspan='5'>".$row['r6']."</td>
            </tr>
            <tr>
                <td colspan='2' >法定代表人</td>
                <td colspan='2'>".$row['r7']."</td>
                <td colspan='1'>职务</td> <td colspan='2'>".$row['r8']."</td>
                <td colspan='3'>职称</td> <td colspan='2'>".$row['r9']."</td>
            </tr>
               <tr>
                   <td colspan='2' >企业负责人</td>
                   <td colspan='2'>".$row['r10']."</td>
                   <td colspan='1'>职务</td> <td colspan='2'>".$row['r11']."</td>
                   <td colspan='3'>职称</td> <td colspan='2'>".$row['r12']."</td>
               </tr>
               <tr>
                   <td colspan='2' >技术负责人</td>
                   <td colspan='2'>".$row['r13']."</td>
                   <td colspan='1'>职务</td> <td colspan='2'>".$row['r14']."</td>
                   <td colspan='3'>职称</td> <td colspan='2'>".$row['r15']."</td>
               </tr>
            <tr>
            <td colspan='2'>申请类别</td>
                <td colspan='10'>
				
 ".$row['r16']." ".$row['r17']." ".$row['r18']." ".$row['r19']."
</td>
</tr>
            <tr>
                <td colspan='3'>第一申请级别</td>
                <td colspan='3'>".$row['r20']."</td>
                <td colspan='2'>第二申请级别</td>
                <td colspan='4'>".$row['r21']."</td>
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
                    ".$row['r22']."
                </td>
 <td colspan='2'>
                    支撑材料一
                </td>
                <td colspan='1'>
				<a href='webpage/mo1/$id+file7.doc'> 查看支撑材料1</a>
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
                       ".$row['r23']."
                    </td>
					<td colspan='2' rowspan='5'> 支撑材料二</td>
				<td colspan='1' rowspan='5' >
					<a href='webpage/mo1/$id+file8.doc'> 查看支撑材料2</a>
                </td>
                </tr>
            <tr>
                <td colspan='3'>总工职称证书号</td>
                <td colspan='3'>
                      ".$row['r24']."
                </td>
            </tr>
            <tr>
                <td colspan='3'>总工程师主持的膜结构代表工程</td>
                <td colspan='3'>
                       ".$row['r25']."
                </td>
            </tr>
			<tr>
                <td colspan='3'>项目经理的人数与等级情况</td>
                <td colspan='3'>
                     ".$row['r26']."
                </td>
            </tr>
            <tr>
                <td colspan='3'>工程技术人员情况</td>
                <td colspan='3'>
                       ".$row['r27']."
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
                      ".$row['r28']."
                </td>
				<td colspan='2' rowspan='3'> 支撑材料三</td>
				<td colspan='1' rowspan='3' >
				<a href='webpage/mo1/$id+file9.doc'> 查看支撑材料3</a>
                </td>
            </tr>
            <tr>
                <td colspan='3'>近六年完成的三项对应于申请等级的膜结构工程</td>
                <td colspan='3'>
                     ".$row['r29']."
                </td>
            </tr>
            <tr>
                <td colspan='3'>曾获奖项</td>
                <td colspan='3'>
                      ".$row['r30']."
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
                   ".$row['r31']."
                </td>
				<td colspan='2' rowspan='4'> 支撑材料四</td>
				<td colspan='1' rowspan='4' >
				<a href='webpage/mo1/$id+file10.doc'> 查看支撑材料4</a>
                </td>
            </tr>
            <tr>
                <td colspan='3'>加工设备名称/数量</td>
                <td colspan='3'>
                   ".$row['r32']."
                </td>
            </tr>
             <tr>
                <td colspan='3'>安装设备名称/数量</td>
                <td colspan='3'>
                   ".$row['r33']."
                </td>
            </tr>
			<tr>
                <td colspan='3'>检验设备名称/数量</td>
                <td colspan='3'>
                   ".$row['r34']."
                </td>
            </tr>
            
            <tr>
                <td colspan='1'>5</td>
                <td colspan='2'>质量管理</td>
                <td colspan='3'>ISO9000证书号（或相应的质量标准）</td>
                <td colspan='3'>".$row['r35']."</td>
				<td colspan='2'> 支撑材料五</td>
				<td colspan='1'>
				<a href='webpage/mo1/$id+file11.doc'> 查看支撑材料5</a>
                </td>
            </tr>
            <tr>
                <td colspan='1'>6</td>
                <td colspan='2'>质量事故</td>
                <td colspan='6'>".$row['r36']."</td>
				<td colspan='2'> 支撑材料六</td>
				<td colspan='1'>
				<a href='webpage/mo1/$id+file12.doc'> 查看支撑材料6</a>
                </td>
            </tr>

        <tr>
            <td colspan='2' >填表日期</td>
            <td colspan='2'>".$row['r37']."</td>
            <td colspan='2'>联系人</td> <td colspan='2'>".$row['r38']."</td>
            <td colspan='3'>手机</td> <td colspan='1'>".$row['r39']."</td>
        </tr>
            </tbody>
        </table>
		

<input type='hidden' value='mo1' name='p32'>
<div style='float: right'> <button type='submit' class='btn btn-md btn-primary'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div></div>";
		//if($flag==1) echo "<input type='hidden' value='yes' name='flag'> "; 

//这是手机端
echo"
  
</form></div></div>

<div class='container-fluid visible-xs noprint'>
<ul class='nav nav-tabs noprint' role='tablist' style='padding:0px 30px;'>
  <li role='presentation' class='active'><a href='#design1' role='tab' data-toggle='tab'  style='color:#666; font-size:14px'>专项设计</a></li>
  <li role='presentation'><a href='#chengbao1' role='tab' data-toggle='tab' style='color:#666; font-size:14px'>工程承包</a></li>
</ul>
<form class='form-horizontal' enctype='multipart/form-data' action='' method='post'>
<div id='myTabContent1' class='tab-content noprint'>
 <div class='tab-pane fade in active' id='design1'>
 <h5 class='text-center'><strong>中国钢结构协会空间结构分会膜结构专项设计企业等级会员申请表</strong></h5>
 
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>单位名称</label>
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
    <label class='col-xs-4 control-label'>营业执照注册号</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p5'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>电话</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p6'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>法定代表人</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p7'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p8'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p9'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>企业负责人</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p10'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p11'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p12'>
    </div>
  </div>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>技术负责人</label>
    <div class='col-xs-8'>
  <input  class='form-control' name='p13'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p14'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p15'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>第一   申请级别</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p16'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>第二	申请级别</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p17'>
    </div>
  </div>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label' name='p1'>注册资本金</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p18'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>从业人数</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p19'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>总工职称            证书号</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p20'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>总工程师主持的膜结构代表工程</label>
    <div class='col-xs-8'>
     <textarea  class='form-control' name='p21' rows='4'></textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>工程技术人员情况</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p22'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>近三年完成的膜结构展开面积及其总和</label>
    <div class='col-xs-8'>
     <textarea  class='form-control' rows='5' name='p23'></textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>近六年完成的三项对应于申请等级的膜结构工程</label>
    <div class='col-xs-8'>
     <textarea  class='form-control' rows='6' name='p24'></textarea>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>曾获奖项</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p25'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>软件情况</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p26'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>ISO9000证书号（或相应的质量标准）</label>
    <div class='col-xs-8'>
     <textarea  class='form-control'  rows='5' name='p27'></textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>质量事故</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p28'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>填表日期</label>
    <div class='col-xs-8'>
     <input  class='form-control'  placeholder='X年X月X日' name='p29'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>联系人</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p30'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>手机</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p31'>
    </div>
  </div>
  </div>
   <div class='tab-pane fade' id='chengbao1'>
   <h5 class='text-center'><strong>中国钢结构协会空间结构分会膜结构工程承包企业等级会员申请表</strong></h5>
 
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>单位名称</label>
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
    <label class='col-xs-4 control-label'>营业执照注册号</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p5'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>电话</label>
    <div class='col-xs-8'>
      <input class='form-control' name='p6'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>法定代表人</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p7'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p8'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p9'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>企业负责人</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p10'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p11'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p12'>
    </div>
  </div>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>技术负责人</label>
    <div class='col-xs-8'>
  <input  class='form-control' name='p13'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职务</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p14'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>职称</label>
    <div class='col-xs-8'>
      <input  class='form-control' name='p15'>
    </div>
  </div>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>申请类别</label>
    <div class='col-xs-8' style='font-size:12px'>
       <input type='checkbox' value='工程承包' name='t16'  checked >
  工程承包（
  <input type='checkbox' name='optionsRadios' id='optionsRadios1' name='t17' value='制作' >
 制作
  <input type='checkbox' name='optionsRadios' id='optionsRadios2'  name='t18' value='综合'>
  综合
  <input type='checkbox' name='optionsRadios' id='optionsRadios2'  name='t19' value='安装'>
  安装）
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>第一   申请级别</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p16'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>第二	申请级别</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p17'>
    </div>
  </div>
 <div class='form-group text-center'>
    <label class='col-xs-4 control-label' name='p1'>注册资本金</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p18'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>从业人数</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p19'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>总工职称            证书号</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p20'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>总工程师主持的膜结构代表工程</label>
    <div class='col-xs-8'>
     <textarea  class='form-control' name='p21' rows='4'></textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>项目经理的人数与等级情况</label>
    <div class='col-xs-8'>
     <textarea  class='form-control' name='p21' rows='4'></textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>工程技术人员情况</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p22'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>近三年完成的膜结构展开面积及其总和</label>
    <div class='col-xs-8'>
     <textarea  class='form-control' rows='5' name='p23'></textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>近六年完成的三项对应于申请等级的膜结构工程</label>
    <div class='col-xs-8'>
     <textarea  class='form-control' rows='6' name='p24'></textarea>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>曾获奖项</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p25'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>加工车间规模</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p26'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>加工设备名称/数量</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p26'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>安装设备名称/数量</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p26'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>检验设备名称/数量</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p26'>
    </div>
  </div>
   <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>ISO9000证书号（或相应的质量标准）</label>
    <div class='col-xs-8'>
     <textarea  class='form-control'  rows='5' name='p27'></textarea>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>质量事故</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p28'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>填表日期</label>
    <div class='col-xs-8'>
     <input  class='form-control'  placeholder='X年X月X日' name='p29'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>联系人</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p30'>
    </div>
  </div>
  <div class='form-group text-center'>
    <label class='col-xs-4 control-label'>手机</label>
    <div class='col-xs-8'>
     <input  class='form-control' name='p31'>
    </div>
  </div>
  
  <input type='hidden' value='mo1' name='p32'> 
  <div style='float: right'> <button type='submit' class='btn btn-md btn-primary'>&nbsp;&nbsp; 提交 &nbsp; &nbsp;</button>
    <br> <br>
  </div> </div></div>";
  
		//if($flag==1) echo "<input type='hidden' value='yes' name='flag'> "; 

/*echo "
<nav class='text-center'>
  <ul class='pagination'>
    <li><a href='#'>1</a></li>
    <li><a href='#'>2</a></li>
  </ul>
</nav>*/
echo"
  
</form>
</div>";
echo"
<div class='print1' >
		 <table class='table-bordered text-center' width=100%;>
            <tbody>
			<h4 class='text-center'>中国钢结构协会空间结构分会膜结构专项设计企业等级会员申请表</h4>
	<br/>
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
                <td colspan='1'>职务</td> <td colspan='2'>".$row['c8']."</td>
                <td colspan='3'>职称</td> <td colspan='2'>".$row['c9']."</td>
            </tr>
               <tr>
                   <td colspan='2' >企业负责人</td>
                   <td colspan='2'>".$row['c10']."</td>
                   <td colspan='1'>职务</td> <td colspan='2'>".$row['c11']."</td>
                   <td colspan='3'>职称</td> <td colspan='2'>".$row['c12']."</td>
               </tr>
               <tr>
                   <td colspan='2' >技术负责人</td>
                   <td colspan='2'>".$row['c13']."</td>
                   <td colspan='1'>职务</td> <td colspan='2'>".$row['c14']."</td>
                   <td colspan='3'>职称</td> <td colspan='2'>".$row['c15']."</td>
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
                <td colspan='3'>总工程师主持的膜结构代表工程</td>
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
                <td colspan='3'>近三年完成的膜结构<br>展开面积及其总和</td>
                <td colspan='6'>
                    ".$row['c23']."
                </td>
				
            </tr>
            <tr>
                <td colspan='3'>近六年完成的三项对应于申请等级的膜结构工程</td>
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
                <td colspan='6'>  ".$row['c26']."</td>
				
            </tr>
            <tr>
                <td colspan='1'>5</td>
                <td colspan='2'>质量管理</td>
                <td colspan='3'>ISO9000证书号（或相应的质量标准）</td>
                <td colspan='6'>  ".$row['c27']."</td>
			
				
            </tr>
            <tr>
                <td colspan='1'>6</td>
                <td colspan='2'>质量事故</td>
                <td colspan='9'>  ".$row['c28']."</td>
				
            </tr>

        <tr>
            <td colspan='2' >填表日期</td>
            <td colspan='2'>".$row['c29']."</td>
            <td colspan='2'>联系人</td> <td colspan='2'>".$row['c30']."</td>
            <td colspan='3'>手机</td> <td colspan='1'>".$row['c31']."</td>
        </tr>
            </tbody>
        </table>";
		echo"
<table class='table-bordered text-center'  width=100%; >
            <tbody>
			<h4 class='text-center' >中国钢结构协会空间结构分会膜结构工程承包企业等级会员申请表</h4>
	<br/>
            <tr>
               <td colspan='2'>单位名称</td>
                <td colspan='3'>".$row['r1']."</td>
                <td colspan='2'>成立时间</td>
                <td colspan='5'>".$row['r2']."</td>
            </tr>
            <tr>
                <td colspan='2'>单位地址</td>
                <td colspan='3'>".$row['r3']."</td>
                <td colspan='2'>现有等级</td>
                <td colspan='5'>".$row['r4']."</td>
            </tr>
            <tr>
                <td colspan='2'>营业执照注册号</td>
                <td colspan='3'>".$row['r5']."</td>
                <td colspan='2'>电   话</td>
                <td colspan='5'>".$row['r6']."</td>
            </tr>
            <tr>
                <td colspan='2' >法定代表人</td>
                <td colspan='2'>".$row['r7']."</td>
                <td colspan='1'>职务</td> <td colspan='2'>".$row['r8']."</td>
                <td colspan='3'>职称</td> <td colspan='2'>".$row['r9']."</td>
            </tr>
               <tr>
                   <td colspan='2' >企业负责人</td>
                   <td colspan='2'>".$row['r10']."</td>
                   <td colspan='1'>职务</td> <td colspan='2'>".$row['r11']."</td>
                   <td colspan='3'>职称</td> <td colspan='2'>".$row['r12']."</td>
               </tr>
               <tr>
                   <td colspan='2' >技术负责人</td>
                   <td colspan='2'>".$row['r13']."</td>
                   <td colspan='1'>职务</td> <td colspan='2'>".$row['r14']."</td>
                   <td colspan='3'>职称</td> <td colspan='2'>".$row['r15']."</td>
               </tr>
            <tr>
            <td colspan='2'>申请类别</td>
                <td colspan='10'>
				
 ".$row['r16']." ".$row['r17']." ".$row['r18']." ".$row['r19']."
</td>
</tr>
            <tr>
                <td colspan='3'>第一申请级别</td>
                <td colspan='3'>".$row['r20']."</td>
                <td colspan='2'>第二申请级别</td>
                <td colspan='4'>".$row['r21']."</td>
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
                    ".$row['r22']."
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
                       ".$row['r23']."
                    </td>
					
                </tr>
            <tr>
                <td colspan='3'>总工职称证书号</td>
                <td colspan='6'>
                      ".$row['r24']."
                </td>
            </tr>
            <tr>
                <td colspan='3'>总工程师主持的膜结构代表工程</td>
                <td colspan='6'>
                       ".$row['r25']."
                </td>
            </tr>
			<tr>
                <td colspan='3'>项目经理的人数与等级情况</td>
                <td colspan='6'>
                     ".$row['r26']."
                </td>
            </tr>
            <tr>
                <td colspan='3'>工程技术人员情况</td>
                <td colspan='6'>
                       ".$row['r27']."
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
                      ".$row['r28']."
                </td>
				
            </tr>
            <tr>
                <td colspan='3'>近六年完成的三项对应于申请等级的膜结构工程</td>
                <td colspan='6'>
                     ".$row['r29']."
                </td>
            </tr>
            <tr>
                <td colspan='3'>曾获奖项</td>
                <td colspan='6'>
                      ".$row['r30']."
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
                   ".$row['r31']."
                </td>
				
            </tr>
            <tr>
                <td colspan='3'>加工设备名称/数量</td>
                <td colspan='6'>
                   ".$row['r32']."
                </td>
            </tr>
             <tr>
                <td colspan='3'>安装设备名称/数量</td>
                <td colspan='6'>
                   ".$row['r33']."
                </td>
            </tr>
			<tr>
                <td colspan='3'>检验设备名称/数量</td>
                <td colspan='6'>
                   ".$row['r34']."
                </td>
            </tr>
            
            <tr>
                <td colspan='1'>5</td>
                <td colspan='2'>质量管理</td>
                <td colspan='3'>ISO9000证书号（或相应的质量标准）</td>
                <td colspan='6'>".$row['r35']."</td>
				
            </tr>
            <tr>
                <td colspan='1'>6</td>
                <td colspan='2'>质量事故</td>
                <td colspan='9'>".$row['r36']."</td>
				
            </tr>

        <tr>
            <td colspan='2' >填表日期</td>
            <td colspan='2'>".$row['r37']."</td>
            <td colspan='2'>联系人</td> <td colspan='2'>".$row['r38']."</td>
            <td colspan='3'>手机</td> <td colspan='1'>".$row['r39']."</td>
        </tr>
            </tbody>
        </table>
		</div>";

  ?>