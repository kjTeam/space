<?php
echo"
<div class='container-fluid print1'>
	<h3 class='text-center'>中国钢结构协会空间结构分会团体会员入会申请表</h3>
	<br/>
    <table  class=' table-bordered text-center' style='font-size:12px' width='100%'>

		<tr><td colspan='2'>企业编号</td><td colspan='10'>". $row['num']." </td></tr>
       <tr>
            <th colspan='12' style='text-align:center;'><lead>一、单 位 基 本 情 况</lead></th>
        </tr>
        <tr>
            <td colspan='2'>单位名称（公章）</td>
            <td colspan='4'>". $row['c1']." </td>
            <td colspan='2'>企事业级别</td>
            <td colspan='4'>". $row['c2']."</td>
        </tr>
<tr>
            <td colspan='2'>单位性质</td>
            <td colspan='4'>".$row['c3']."  </td>
            <td colspan='2'>产权所有</td>
            <td colspan='4'>".$row['c4']." </td>
        </tr>
        <tr>
            <td colspan='2'>注册资金</td>
            <td colspan='4'>".$row['c5']."  </td>
            <td colspan='2'>上级单位</td>
            <td colspan='4'>".$row['c6']." </td>
        </tr>
        <tr>
            <td colspan='2' rowspan='2'>负责人姓名</td>
            <td colspan='2' rowspan='2'>".$row['c7'] ."</td>
            <td colspan='2'>职务</td>
            <td colspan='2'>".$row['c8'] ."</td>
            <td colspan='2'>电话传真</td>
            <td colspan='2'>".$row['c9']." </td>
        </tr>
        <tr>
            <td colspan='2'>职称</td>
            <td colspan='2'>".$row['c10']." </td>
            <td colspan='2'>手机</td>
            <td colspan='2'>".$row['c11']." </td>
        </tr>
        <tr>
            <td colspan='2' rowspan='2'>联系人（代表）姓名</td>
            <td colspan='2' rowspan='2'>".$row['c12']."</td>
            <td colspan='2'>职务</td>
            <td colspan='2'>".$row['c13']." </td>
            <td colspan='2'>电话传真</td>
            <td colspan='2'>".$row['c14'] ."</td>
        </tr>
        <tr>
            <td colspan='2'>职称</td>
            <td colspan='2'>".$row['c15']." </td>
            <td colspan='2'>手机</td>
            <td colspan='2'>".$row['c16']." </td>
        </tr>
        <tr>
            <td colspan='2'>通讯地址</td>
            <td colspan='6'>".$row['c17'] ."</td>
            <td colspan='2'>邮编</td>
            <td colspan='2'>".$row['c18']." </td>
        </tr>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>二、单 位 规 模</lead></th>
        </tr>
        <tr>
            <td colspan='2'>创立时间</td>
            <td colspan='4'>".$row['c19'] ." </td>
            <td colspan='2'>从事空间结构时间</td>
            <td colspan='4'>".$row['c20']." </td>
        </tr>
        <tr>
            <td colspan='2'>占地面积</td>
            <td colspan='4'>".$row['c21'] ." </td>
            <td colspan='2'>建 筑 面 积</td>
            <td colspan='4'>".$row['c22'] ."</td>
        </tr>
        <tr>
        <td colspan='2'>资金总额</td>
        <td colspan='2'>".$row['c23'] ." </td>
        <td colspan='2'>固定资产</td>
        <td colspan='2'>".$row['c24']." </td>
        <td colspan='2'>流动资金</td>
        <td colspan='2'>".$row['c25']." </td>
    </tr>
        <tr>
            <td colspan='2'>企业人数</td>
            <td colspan='2'>".$row['c26'] ." </td>
            <td colspan='2'>管理人员</td>
            <td colspan='2'>".$row['c27']." </td>
            <td colspan='2'>技术人员</td>
            <td colspan='2'>".$row['c28']." </td>
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
            <td colspan='3'>".$row['c29'] ."</td>
            <td colspan='3'>".$row['c30']." </td>
            <td colspan='3'>".$row['c31']." </td>
            <td colspan='3'>".$row['c32'] ."</td>
        </tr>
        <tr>
            <td colspan='3'>".$row['c33']." </td>
            <td colspan='3'>".$row['c34']." </td>
            <td colspan='3'>".$row['c35']." </td>
            <td colspan='3'>".$row['c36']." </td>
        </tr>
        <tr>
            <td colspan='3'>".$row['c37']." </td>
            <td colspan='3'>".$row['c38']." </td>
            <td colspan='3'>".$row['c39']." </td>
            <td colspan='3'>".$row['c40'] ."</td>
        </tr>
        <tr>
            <th colspan='12' style='text-align:center;'><lead>四、从事空间结构工作的详细情况</lead></th>
        </tr>
		<tr>
        <td colspan='12'>
        ".$row['c41']."</td></tr>
		
      <tr>
			<td colspan='12'>
			<label for='userfile'> 营业执照</label></td></tr>
			<tr><td colspan='12'>
			<img src='webpage/".$row['position']."' width='500px'/>
			</td>
		</tr> 
		";

		if($select>='6'&&$select!=8)
		{
			echo"
			<tr>
            <th colspan='12' style='text-align:center;'><lead>缴费凭证</lead></th>
        </tr>
			<tr>
				<td colspan='12'>
				<img style='width:100%' src='webpage/pay1/".$row['id'].".jpg'/>
				</td>
			</tr>
		";}
		echo"
    </table>
	</div>";
?>