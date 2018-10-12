<?php
/**
 * Author: ZhuKaihao
 * Date: 2016/3/23
 * Time: 16:18
 */
?>

<?php

function connect_mysql()
{
    $mysql_servername = "localhost";
    $mysql_username = "root";
    $mysql_password = "";
    $mysql_database = "space";
    $con = mysqli_connect($mysql_servername, $mysql_username, $mysql_password, $mysql_database);
    if (!$con)
        die("Connection failed: " . mysqli_connect_error());
    return $con;
}

function user_name_psw_check($u_name, $u_password)
{
    $result = array();
    $user_name = $u_name;
    $user_password = $u_password;
    $con = connect_mysql();
    if ($con) {
        $sql = "SELECT * FROM user WHERE name ='{$user_name}'and psw='{$user_password}'";
        $res = mysqli_query($con, $sql);
        if ($res->num_rows) {
            $result['user_name_psw_match'] = 'yes';
            $row = $res->fetch_assoc();
            if ($row["category"] == '1')
                $result['user_is_company'] = 'yes';
            else if($row["category"]=='5')
                $result['user_is_manager']='yes';
        }
        return $result;
    }
    return false;
}

function insert_date_in_datatable($column_array, $value_array, $datatable_name, &$id = null)
{
    $con = connect_mysql();
    if (!$con) {
        return false;
    }
    if (($count = count($column_array)) != count($value_array)) {
        return false;
    }
    $column = '';
    $value = '';
    for ($i = 0; $i < $count - 1; $i++) {
        $column = $column . '`' . $column_array[$i] . '`' . ',';
        $value = $value . "'" . $value_array[$i] . "'" . ",";
    }
    $column = $column . '`' . $column_array[$count - 1] . '`';
    $value = $value . "'" . $value_array[$count - 1] . "'";
    $sql = "INSERT INTO `$datatable_name` ($column) VALUES ($value)";
    $res = mysqli_query($con, $sql);

    //Get insert id
    $sql = "SELECT LAST_INSERT_ID()";
    $result_id = mysqli_query($con, $sql);
    $result_id_row = $result_id->fetch_assoc();
    $id = $result_id_row["LAST_INSERT_ID()"];

    return $res;
}

function updata_date_by_id_in_datatable($id, $column_array, $value_array, $datatable_name)
{
    $con = connect_mysql();
    if (!$con) {
        return false;
    }
    if (($count = count($column_array)) != count($value_array)) {
        return false;
    }
    $temp = "";
    for ($i = 0; $i < $count - 1; $i++)
        $temp = $temp . "`" . $column_array[$i] . "` = '" . $value_array[$i] . "' ,";
    $temp = $temp . "`" . $column_array[$count - 1] . "` = '" . $value_array[$count - 1] . "'";
    $sql = "UPDATE `$datatable_name` SET $temp WHERE `$datatable_name`.`id` = $id";

    $res = mysqli_query($con, $sql);
    return $res;
}

function delete_date_by_id_in_datatable($id, $datatable_name)
{
    $con = connect_mysql();
    if (!$con) {
        return false;
    }
    $sql = "DELETE FROM `$datatable_name` WHERE `$datatable_name`.`id` = $id";
    $res = mysqli_query($con, $sql);
    return $res;
}

function get_num_of_column_form_datatable($datatable_name, $column_name, $num, $visibility = 1)
{
    $con = connect_mysql();
    if (!$con) {
        return false;
    }
    $sql = "SELECT * FROM `{$datatable_name}` WHERE visibility=$visibility ORDER BY id DESC LIMIT {$num}";
    $res = mysqli_query($con, $sql);
    $count = $res->num_rows;
    $result = array();
    for ($i = 0; $i < $count; $i++) {
        $row = $res->fetch_assoc();
        $result[$i] = $row[$column_name];
    }
    return $result;
}

function get_all_of_column_from_datatable_by_visibility($datatable_name, $column_name, $visibility = 1)
{
    $con = connect_mysql();
    if (!$con) {
        return false;
    }
    $sql = "SELECT $column_name FROM `{$datatable_name}` WHERE visibility=$visibility  ORDER BY id DESC";
    $res = mysqli_query($con, $sql);
    $count = $res->num_rows;
    $result = array();
    for ($i = 0; $i < $count; $i++) {
        $row = $res->fetch_assoc();
        $result[$i] = $row[$column_name];
    }
    return $result;
}

function get_all_of_column_from_datatable($datatable_name, $column_name)
{
    $con = connect_mysql();
    if (!$con) {
        return false;
    }
    $sql = "SELECT $column_name FROM `{$datatable_name}` ORDER BY id DESC";
    $res = mysqli_query($con, $sql);
    $count = $res->num_rows;
    $result = array();
    for ($i = 0; $i < $count; $i++) {
        $row = $res->fetch_assoc();
        $result[$i] = $row[$column_name];
    }
    return $result;
}

//If $visibility==0 then show all
function get_info_of_id_in_datatable($id, $datatable_name, $visibility = 1)
{
    $con = connect_mysql();
    if (!$con) {
        return false;
    }
    if ($visibility == 1)
        $sql = "SELECT * FROM `{$datatable_name}` WHERE id='$id' AND visibility='$visibility'";
    else if ($visibility == 0)
        $sql = "SELECT * FROM `{$datatable_name}` WHERE id='$id'";
    else return false;
    $res = mysqli_query($con, $sql);
    if (!$res->num_rows)
        return false;
    $result = $res->fetch_assoc();
    return $result;
}

function uniqid_file_name($file_name)
{
    $extention = substr($file_name, strrpos($file_name, '.') + 1);
    $extention = strtolower($extention); //得到扩展名
    $file_dir = uniqid() . '.' . $extention; //得到13位随机ID
    return $file_dir;
}

function sendMail($PD,$DF,$subject,$body,$num_results) //PD 是name,DF存入的邮箱地址
{
    /*↓初始化↓*/
    //引入PHPMailer的核心文件 使用require_once包含避免出现PHPMailer类重复定义的警告
    date_default_timezone_set("Asia/Shanghai");//设定时区上海
    require_once("phpmailer/class.phpmailer.php");
    include("phpmailer/class.smtp.php");
    require("phpmailer/PHPMailerAutoload.php");
    //示例化PHPMailer核心类
    $mail = new PHPMailer();
    /*↑初始化↑*/

    /*↓配置↓*/
    //是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
    //$mail->SMTPDebug = 3;
    //使用smtp鉴权方式发送邮件，可以选择pop方式 sendmail方式等
    //可以参考http://phpmailer.github.io/PHPMailer/当中的详细介绍
    //smtp需要鉴权 这个必须是true
    $mail->isSMTP();
    //此处注释掉,否则出错 at 2016.4.30
    $mail->SMTPAuth = true;
    //链接qq域名邮箱的服务器地址
    $mail->Host = 'smtp.163.com';
    //设置使用ssl加密方式登录鉴权
    $mail->SMTPSecure = '';
    //设置ssl连接smtp服务器的远程服务器端口号 可选465或587
    $mail->Port = 25;
    //设置发件人的主机域 可有可无 默认为localhost 内容任意，建议使用域名
    $mail->Hostname = 'cnass.org';
    //设置发送的邮件的编码 可选GB2312
    $mail->CharSet = 'UTF-8';
    //设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
    $mail->FromName = '空间结构分会';
    //smtp登录的账号 这里填入字符串格式的qq号即可
    $mail->Username = 'kjjgroot@163.com';
    //smtp登录的密码 这里填入“独立密码” 若为设置“独立密码”则填入登录qq的密码 建议设置“独立密码”
    $mail->Password = 'xjilsojsp960921';
    //设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
    $mail->From = 'kjjgroot@163.com';
    //邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
    /*↑配置↑*/

    /*↓发送内容↓*/
    $mail->isHTML(true);
    //设置收件人邮箱地址 该方法有两个参数 第一个参数为收件人邮箱地址 第二参数为给该地址设置的昵称 不同的邮箱系统会自动进行处理变动 这里第二个参数的意义不大
	for($i=1;$i<=$num_results;$i++)
    $mail->addAddress($DF[$i],$PD[$i]);
    //添加多个收件人时，传入$num_result3为1，群发时将地址放入数组$DF中，将name放在$PD中
    //$mail->addAddress('xxx@163.com','test');
    //添加该邮件的主题
    $mail->Subject = $subject;
    //添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
    $mail->Body = $body;
    //为该邮件添加附件 该方法也有两个参数 第一个参数为附件存放的目录（相对目录、或绝对目录均可） 第二参数为在邮件附件中该附件的名称
    //$mail->addAttachment('./d.jpg','mm.jpg');
    //同样该方法可以多次调用 上传多个附件
    //$mail->addAttachment('./Jlib-1.1.0.js','Jlib.js');
    /*↑发送内容↑*/


    //发送命令 返回布尔值
    //PS：经过测试，要是收件人不存在，若不出现错误依然返回true 也就是说在发送之前 自己需要些方法实现检测该邮箱是否真实有效
    if($status = $mail->send())
        return true;
    else
        return $mail->ErrorInfo;
}

function less_than_ie9()
{
    if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 8.0")||strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 7.0")||strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 6.0"))
        return true;

    /*
    if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 9.0")||strpos($_SERVER["HTTP_USER_AGENT"],"Chrome")||strpos($_SERVER["HTTP_USER_AGENT"],"Safari"))
        return false;

    function getBrowType()
{
    if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 9.0"))
        $browType="Internet Explorer 9.0"; // 这里可以写其他的执行命令
    if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 8.0"))
        $browType="Internet Explorer 8.0";
    else if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 7.0"))
        $browType="Internet Explorer 7.0";
    else if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 6.0"))
        $browType="Internet Explorer 6.0";
    else if(strpos($_SERVER["HTTP_USER_AGENT"],"Firefox/3"))
        $browType="Firefox 3";
    else if(strpos($_SERVER["HTTP_USER_AGENT"],"Firefox/2"))
        $browType="Firefox 2";
    else if(strpos($_SERVER["HTTP_USER_AGENT"],"Chrome"))
        $browType="Google Chrome";
    else if(strpos($_SERVER["HTTP_USER_AGENT"],"Safari"))
        $browType="Safari";
    else if(strpos($_SERVER["HTTP_USER_AGENT"],"Maxthon"))
        $browType="Maxthon";
    else if(strpos($_SERVER["HTTP_USER_AGENT"],"Opera"))
        $browType="Opera";
    else
        $browType=$_SERVER["HTTP_USER_AGENT"];
    Return $browType;
}
     */
    else
        return false;
}
function insertexport($sheet,$n,$PA,$English,$Major,$othermajor,$Major1,$othermajor1) //将数据插入数据库表中，数据库为c1....cn, 对应表单p1....pn 另外将state置1 第一参数为表名，第二参为插入的参数个数，第三参为参数数组，注意这个数组下表从1开始,第四参是创建者。
	{
		$db = connect_mysql();
		$query="insert into ".$sheet." (";
		for($i=1;$i<$n+1;$i++)
			$query=$query."c".$i.",";
		$query=$query."english,major,othermajor,major1,othermajor1) values(";
		for($i=1;$i<$n+1;$i++)
			$query=$query."'".$PA[$i]."',";
		$query=$query."'$English','$Major','$othermajor','$Major1','$othermajor')";
        $result=$db->query($query);
        $newid=$db->insert_id;
		return $newid;
	}
?>