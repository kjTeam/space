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
        <p>发布时间：<?php echo $res['time']; ?></p>
    </div>
    <hr/>
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
        <a href="download.php?file_name={$file_name[$i]}&file_dir={$file_dir[$i]}">{$file_name[$i]}</a></br>
EOD;
        echo "</p></div>";
    }
    ?>
</div>

