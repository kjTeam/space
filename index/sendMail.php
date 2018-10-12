<?PHP
include "include/function.php";

$address="613366667@qq.com";
$address1="zhukaihaorj@163.com";
$name="朱凯豪";
$subject="test";
$body="<p style='font-size: 30px;'>这是测试消息</p>";

if($res=sendMail($address1,$name,$subject,$body)===true)
    echo "发送成功";
else
    echo $res;
?>