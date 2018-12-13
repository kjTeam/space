<?php
//此页面是退出登陆方法！
include "../lib.php";
session_start();
session_destroy();
jump_to("../../index/responsive/index.php");
?>