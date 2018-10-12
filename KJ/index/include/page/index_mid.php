<?php
/**
 * Author: ZhuKaihao
 * Date: 2016/3/23
 * Time: 16:18
 * 分会简介|通知文件|优秀工程
 */
?>

<?php

//分会简介表格链接
$fenhuijianjielink = get_num_of_column_form_datatable('index_fenhuijianjie', 'content', 8);

//分会简介
$fenhuijianjie = get_num_of_column_form_datatable('index_fenhuijianjie', 'title', 8);

//通知文件id
$tongzhiwenjianid = get_num_of_column_form_datatable('index_tongzhiwenjian', 'id', 8);

//通知文件链接
$tongzhiwenjianlink = array();
for ($i = 0; $i < 8; $i++) {
    $tongzhiwenjianlink[$i] = "announcement_content.php?id=" . $tongzhiwenjianid[$i] . "&&pagename=tongzhiwenjian";
}

//通知文件
$tongzhiwenjian = get_num_of_column_form_datatable('index_tongzhiwenjian', 'title', 8);

//优秀工程id
$youxiugongchengid = get_num_of_column_form_datatable('index_youxiugongcheng', 'id', 8);

//优秀工程链接
$youxiugongchenglink = array();
for ($i = 0; $i < 8; $i++) {
    $youxiugongchenglink[$i] = "announcement_content.php?id=" . $youxiugongchengid[$i] . "&&pagename=youxiugongcheng";
}

//优秀工程·
$youxiugongchengtitle = get_num_of_column_form_datatable('index_youxiugongcheng', 'title', 8);

?>

<div id="div_mid">
    <div id="div_mid_left">
        <div class="col-div-title">
            <span><a href="fenhuijianjie.php">分会简介</a></span>
            <span class="more"><a href="fenhuijianjie.php">more</a></span>
        </div>
        <div>
            <table class="table_mid">
                <?php
                for ($i = 0; $i < 8; $i++)
                    echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px>
                        <a href="$fenhuijianjielink[$i]"  class="tablelink">$fenhuijianjie[$i]</a>
                    </td>
                </tr>
EOD;
                ?>
            </table>
        </div>
    </div>
    <div id="div_mid_mid">
        <div class="col-div-title">
            <span><a href="more.php?pagename=tongzhiwenjian">通知文件</a></span>
            <span class="more"><a href="more.php?pagename=tongzhiwenjian">more</a></span>
        </div>
        <div>
            <table class="table_mid">
                <?php
                for ($i = 0; $i < 8; $i++)
                    echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px>
                        <a href="$tongzhiwenjianlink[$i]"  class="tablelink">$tongzhiwenjian[$i]</a>
                    </td>
                </tr>
EOD;
                ?>
            </table>
        </div>
    </div>
    <div id="div_mid_right">
        <div class="col-div-title">
            <span><a href="more.php?pagename=youxiugongcheng">优秀工程</a></span>
            <span class="more"><a href="more.php?pagename=youxiugongcheng">more</a></span>
        </div>
        <div>
            <table class="table_mid">
                <?php
                for ($i = 0; $i < 8; $i++)
                    echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px>
                        <a href="$youxiugongchenglink[$i]"  class="tablelink">$youxiugongchengtitle[$i]</a>
                    </td>
                </tr>
EOD;
                ?>
            </table>
        </div>
    </div>
</div>
