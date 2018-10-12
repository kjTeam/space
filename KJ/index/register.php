<?php
/**
 * Author: ZhuKaihao
 * Date: 2016/3/24
 * Time: 18:36
 * 注册
 */
?>

<?php include_once 'include/function.php' ?>
<?php
$user_name = $_POST['uid'];
$US['1'] = $user_name;//因为要调用函数，所以存入数组中。
$user_password = $_POST['psw1'];
$password =  $_POST['psw2'];
//$user_password_md5=md5($user_password);
$email = $_POST['email'];
$EM['1'] = $email;
$realname = $_POST['name'];
$wechat = $_POST['tel'];
$state = $_POST['state'];
$regtime = time();
$token = md5($user_name.$user_password.$regtime); //创建激活识别码
$token_exptime = time()+60*60*24;//过期时间为24小时后


//检测格式
if(!$user_name || !$user_password) {
    echo "<script language=javascript>alert('用户名密码不能为空!');location.href='responsive/index.php';</script>";
    exit();
}
if($user_password!==$password){
	echo "<script language=javascript>alert('两次密码不一样!');location.href='responsive/index.php';</script>";
    exit();
}
if(!$email) {
    echo "<script language=javascript>alert('邮箱不能为空!');location.href='responsive/index.php';</script>";
    exit();
}
if(!$realname) {
    echo "<script language=javascript>alert('真实姓名不能为空!');location.href='responsive/index.php';</script>";
    exit();
}
if(!preg_match("/^[A-Za-z0-9]{6,20}$/",$user_name)){
    echo "<script language=javascript>alert('用户名格式错误!只能是字母、数字及下划线，长度为6-20个字符。');location.href='responsive/index.php';</script>";
    exit();
}

//如果用户名格式正确，检测是否已存在
$db = connect_mysql();
$query = "select * from user where uid='$user_name'";
$result = $db->query($query);
$num = $result->num_rows;
$db->close();
if($num){
    echo "<script language=javascript>alert('用户名已存在!');location.href='responsive/index.php';</script>";
    exit();
}

if(!preg_match("/^\w{6,20}/",$user_password)){
    echo "<script language=javascript>alert('密码格式错误!只能是字母、数字及下划线，长度在6-20个字符。');location.href='responsive/index.php';</script>";
    exit();
}
if(!preg_match("/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/",$email)){
    echo "<script language=javascript>alert('邮箱格式错误！');location.href='responsive/index.php';</script>";
    exit();
}


$column = array('uid', 'psw', 'email', 'tel', 'category','name','token','token_exptime');
$value = array("$user_name", "$user_password", "$email", "$wechat", "$state","$realname","$token","$token_exptime");
$res = insert_date_in_datatable($column, $value, 'user');
if ($res) {
    $body=<<<EOD
<p>请点击此链接激活邮箱:<a href="http://www.cnass.org/index/mail_activate.php? token=$token" target='_blank'>http://www.cnass.org/index/mail_activate.php?token=$token</a></br>如果该链接无法点击,请复制到浏览器地址栏中进行访问,该链接24小时内有效.</p>
EOD;
    sendMail($US,$EM,"空间结构分会-激活邮件",$body,1);
    echo "<script language=javascript>alert('注册成功!请前往邮箱查看激活邮件并在24小时之内激活');location.href='responsive/index.php';</script>";
}
else
    echo "<script language=javascript>alert('注册失败!');location.href='responsive/index.php';</script>";
?>