<?php
/**
 * Author: ZhuKaihao
 * Date: 2016/3/24
 * Time: 20:29
 * 登出
 */
?>
<?php
session_start();

session_destroy();
echo "<script>location.href='responsive/index.php';</script>";
?>
