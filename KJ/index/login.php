<?php
/**
 * Author: ZhuKaihao
 * Date: 2016/3/24
 * Time: 19:39
 * 登录
 */
?>
<?php include_once 'include/function.php' ?>
<?php
session_start();
$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];;
$_SESSION['UID'] = $user_name;
$db = connect_mysql();
$query = "select * from person where uid='$user_name' and psw='$user_password'";
$result = $db->query($query);
$row = $result->fetch_assoc();
$category = $row['category_p'];
$_SESSION['id_p'] = $row['id_p'];

//检查是否激活邮箱
$query = "select * from person where uid='$user_name' and psw='$user_password'";
$result = $db->query($query);
$row = $result->fetch_assoc();

$db->close();

$res = user_name_psw_check($user_name, $user_password);
if ($res['user_name_psw_match'] == 'yes') {
    if ($row["mail_activation_statu"] == 0) {
        $nowtime = time();
        if ($nowtime < $row["token_exptime"]) {
            echo "<script language=javascript>alert('你的账号邮箱没有激活,请前往邮箱查看邮件并激活。');location.href='responsive/index.php';</script>";
            exit();
        }
        else {
            $token = md5($user_name . $user_password . $nowtime); //创建激活识别码
            $token_exptime = time() + 60 * 60 * 24;//过期时间为24小时后
            $con = connect_mysql();
            if (!$con) die("error:can't connect database");
            $sql = "UPDATE `person` SET `token` = '$token' ,`token_exptime` = '$token_exptime' WHERE `person`.`id_p` = {$row["id_p"]}";
            $updateres = mysqli_query($con, $sql);
            if ($updateres!=1) die("error:\$res!=1");
            $body = <<<EOD
<p>请点击此链接激活邮箱:<a href="http://www.cnass.org/index/mail_activate.php? token=$token" target='_blank'>http://www.cnass.org/index/mail_activate.php?token=$token</a></br>如果该链接无法点击,请复制到浏览器地址栏中进行访问,该链接24小时内有效.</p>
EOD;
            sendMail($row["email"], $row["uid"], "空间结构分会-激活邮件", $body);
            echo "<script language=javascript>alert('你的账号邮箱没有激活,且激活邮件已过期。我们已向您的邮箱发送了一封新的激活邮件，请前往邮箱查看并激活。');location.href='index.php';</script>";

        }
    }

    setcookie('user_name', $user_name);
    setcookie('user_password', $user_password);

    switch ($category) {
        case 1:
            echo "<script>location.href='" . " /space2/index.php" . "';</script>";
            break;
        case 2:
            echo "<script>location.href='" . "/space2/index.php" . "';</script>";
            break;
        case 5:
            echo "<script>location.href='" . "/space2/index.php" . "';</script>";
            break;
    }

}
else {
    echo "<script language=javascript>alert('用户名密码错误');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
}
?>
