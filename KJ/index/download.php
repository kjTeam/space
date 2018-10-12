<?php
/**
 * User: ZhuKaihao
 * Date: 16/4/3
 * Time: 上午12:34
 */
?>

<?php
header("Content-Type: application/force-download");
header("Content-Disposition: attachment; filename={$_GET['file_name']}");
ob_clean();
flush();
readfile("./upload/{$_GET['file_dir']}");
?>
