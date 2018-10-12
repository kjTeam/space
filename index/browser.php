<?php
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
$_browType=getBrowType();
echo($_browType);//输出结果
?>