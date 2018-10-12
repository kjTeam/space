<?php
/**
 * Author: ZhuKaihao
 * Date: 2016/3/23
 * Time: 16:18
 * 分会简介|通知文件|优秀工程
 */
?>

<?php
include_once "function.php";

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

//膜结构表格id
$mojiegouid = get_num_of_column_form_datatable('index_mojiegou', 'id', 8);

//膜结构链接
$mojiegoulink = array();
for ($i = 0; $i < 8; $i++) {
    $mojiegoulink[$i] = "announcement_content.php?id=" . $mojiegouid[$i] . "&&pagename=mojiegou";
}

//膜结构
$mojiegoutitle = get_num_of_column_form_datatable('index_mojiegou', 'title', 8);

//网格结构id
$wanggejiegouid = get_num_of_column_form_datatable('index_wanggejiegou', 'id', 8);

//网格结构链接
$wanggejiegoulink = array();
for ($i = 0; $i < 8; $i++) {
    $wanggejiegoulink[$i] = "announcement_content.php?id=" . $wanggejiegouid[$i] . "&&pagename=wanggejiegou";
}

//网格结构
$wanggejiegoutitle = get_num_of_column_form_datatable('index_wanggejiegou', 'title', 8);

//索结构id
$suojiegouid = get_num_of_column_form_datatable('index_suojiegou', 'id', 8);

//索结构链接
$suojiegoulink = array();
for ($i = 0; $i < 8; $i++) {
    $suojiegoulink[$i] = "announcement_content.php?id=" . $suojiegouid[$i] . "&&pagename=suojiegou";
}

//索结构
$suojiegoutitle = get_num_of_column_form_datatable('index_suojiegou', 'title', 8);
?>

<div id="div_mid">
    <div id="div_mid_left">
        <div class="col-div-title">
            <span><a href="fenhuijianjie.php"><img src="/index/image/titlebarbefore.gif">分会简介</a></span>
            <span class="more"><a href="fenhuijianjie.php">more...</a> </span>
        </div>
        <table class="table_mid">
            <?php
            for ($i = 0; $i < 5; $i++)
                echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px style="border-bottom:1px dotted #ced6e1;">
                        <a href="$fenhuijianjielink[$i]"  class="tablelink"><img src="/index/image/titlebefore.gif">$fenhuijianjie[$i]
                        </a>
                    </td>
                </tr>
EOD;
            for ($i = 0; $i < 3; $i++)
                echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px >
                        <a href=""  class="tablelink">
                        </a>
                    </td>
                </tr>
EOD;
            ?>
        </table>
    </div>
    <div id="div_mid_mid">
        <div class="col-div-title">
            <span><a href="more.php?pagename=tongzhiwenjian"><img src="/index/image/titlebarbefore.gif">通知文件</a></span>
            <span class="more"><a href="more.php?pagename=tongzhiwenjian">more...</a></span>
        </div>
        <table class="table_mid">
            <?php
            for ($i = 0; $i < 8; $i++)
                    echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px style="border-bottom:1px dotted #ced6e1;">
                        <a href="$tongzhiwenjianlink[$i]"  class="tablelink">&nbsp&nbsp$tongzhiwenjian[$i]
                        <img src="/index/image/gif-new.gif" border="0"></a>
                    </td>
                </tr>
EOD;
            ?>
        </table>
    </div>
    <div id="div_mid_right">
        <div class="col-div-title">
            <span><a href="more.php?pagename=youxiugongcheng"><img src="/index/image/titlebarbefore.gif">优秀工程</a></span>
            <span class="more"><a href="more.php?pagename=youxiugongcheng">more...</a> </span>
        </div>
        <table class="table_mid">
            <?php
            for ($i = 0; $i < 8; $i++)
                echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px style="border-bottom:1px dotted #ced6e1;">
                        <a href="$youxiugongchenglink[$i]"  class="tablelink"><img src="/index/image/titlebefore.gif">$youxiugongchengtitle[$i]</a>
                    </td>
                </tr>
EOD;
            ?>
        </table>
    </div>
</div>
