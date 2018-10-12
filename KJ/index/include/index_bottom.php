<?php
/**
 * Author: ZhuKaihao
 * Date: 2016/3/23
 * Time: 16:18
 * 膜结构|网格结构|索结构
 */
?>

<?php

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
<div id="div_bottom">
    <div id="div_bottom_left">
        <div class="col-div-title">
            <span><a href="more.php?pagename=mojiegou">膜结构</a></span>
            <span class="more"><a href="more.php?pagename=mojiegou">more</a></span>
        </div>
        <div>
            <table class="table_bottom" width="328">
                <?php
                for ($i = 0; $i < 8; $i++)
                    echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px>
                        <a href="$mojiegoulink[$i]"  class="tablelink">$mojiegoutitle[$i]</a>
                    </td>
                </tr>
EOD;
                ?>
            </table>
        </div>
    </div>
    <div id="div_bottom_mid">
        <div class="col-div-title">
            <span><a href="more.php?pagename=wanggejiegou">网格结构</a></span>
            <span class="more"><a href="more.php?pagename=wanggejiegou">more</a></span>
        </div>
        <div>
            <table class="table_bottom" width="330px">
                <?php
                for ($i = 0; $i < 8; $i++)
                    echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px>
                        <a href="$wanggejiegoulink[$i]"  class="tablelink">$wanggejiegoutitle[$i]</a>
                    </td>
                </tr>
EOD;
                ?>
            </table>
        </div>
    </div>
    <div id="div_bottom_right">
        <div class="col-div-title">
            <span><a href="more.php?pagename=suojiegou">索结构</a></span>
            <span class="more"><a href="more.php?pagename=suojiegou">more</a></span>
        </div>
        <div>
            <table class="table_bottom" width="328px">
                <?php
                for ($i = 0; $i < 8; $i++)
                    echo <<<EOD
<tr>
                    <td class="td_ellipsis" height=30px>
                        <a href="$suojiegoulink[$i]"  class="tablelink">$suojiegoutitle[$i]</a>
                    </td>
                </tr>
EOD;
                ?>
            </table>
        </div>
    </div>
</div>
