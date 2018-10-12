<?php
include "../lib.php";
session_start();
session_destroy();
jump_to("../../index/responsive/index.php");
?>