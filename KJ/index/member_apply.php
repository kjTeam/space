<?php
/**
 * User: ZhuKaihao
 * Date: 16/5/12
 * Time: 上午11:46
 */
?>
<?php
session_start();
include_once "include/function.php";
if (isset($_SESSION['username'])) {
    if ($_SESSION['category'] == '1') {
        echo "<script>location.href='" . "../space2/index.php?nav1=2&nav2=1" . "';</script>";
    }
    else if($_SESSION['category'] == '5')
        echo "<script language=javascript>alert('您是管理员，请前往后台操作！');location.href='" . "../space2/index.php" . "';</script>";
}
else
    echo "<script language=javascript>alert('您还没有登录，请先登录或注册！');location.href='" . "../index/responsive/index.php" . "';</script>";
?>