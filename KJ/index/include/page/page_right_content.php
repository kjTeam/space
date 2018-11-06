<?php
/**
 * User: ZhuKaihao
 * Date: 16/4/11
 * Time: 下午8:16
 */
?>

<?php
$id = $_GET['id'];
$page_name = $_GET["pagename"];
$res = get_info_of_id_in_datatable($id, 'index_' . $page_name);
?>

<div class="right">
    <div class="right_title">
        <p><strong><?php echo $res['title']; ?></strong></p>
    </div>
    <div class="right_time">
        <p>是<?php echo $res['time']; ?></p>
    </div>
    <div>
        <?php
        $res_check = user_name_psw_check($_COOKIE['user_name'], $_COOKIE['user_password']);
        if ($res_check['user_name_psw_match'] == 'yes')
            if ($res_check['user_is_manager'] == 'yes') {
                echo <<<EOD
    <div class="right_updata" align="right">
        <table>
            <tr>
                <td>
                    <a href="modify_page.php?pagename=$page_name&&id=$id">修改</a>
                </td>
                <td>
                    <a href="include/function/delete.php?pagename=$page_name&&id=$id">删除</a>
                </td>
            </tr>
        </table>
    </div>
EOD;
            }
        ?>
        <hr/>
    </div>
    <div class="right_file_no">
        <p><?php echo $res['file_no']; ?></p>
    </div>
    <div class="right_content">
        <p><?php echo $res['content']; ?></p>
    </div>
    <div class="right_end">
        <p><?php echo $res['end']; ?></p>
    </div>
    <div class="right_date">
        <p><?php echo $res['date']; ?></p>
    </div>
    <?php
    if (!$res['file_dir'] == '' && !$res['file_name'] == '') {
        $file_name = explode("|", $res["file_name"]);
        $file_dir = explode("|", $res["file_dir"]);
        $count = count($file_name);
        echo "<div class=\"right_file\"><p>附件:<br/>";
        for ($i = 0; $i < $count; $i++)
            echo <<<EOD
        <a href="include/function/download.php?file_name={$file_name[$i]}&file_dir={$file_dir[$i]}">{$file_name[$i]}</a></br>
EOD;
        echo "</p></div>";
    }
    ?>
</div>

