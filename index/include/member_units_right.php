<?php
/**
 * User: ZhuKaihao
 * Date: 16/4/3
 * Time: 下午4:08
 */
?>

<div id="member_units_right" class="right">
    <div class="right_title">
        <p>会员单位</p>
    </div>
    <hr/>
    <br/>
    <div class="right_content">
        <?php
        $name = get_all_of_column_from_datatable('member_units', 'name');
        $link = get_all_of_column_from_datatable('member_units', 'link');
        $num = count($name);
        for ($i = 0; $i < $num; $i++) {
            echo <<<EOD
<p><a href="$link[$i]">$name[$i]</a></p>
EOD;
        }
        ?>
    </div>
</div>
