<?php
/**
 * User: ZhuKaihao
 * Date: 16/4/12
 * Time: 下午4:57
 */
?>

<?php include_once 'include/function.php' ?>

<?php
$res = user_name_psw_check($_COOKIE['user_name'], $_COOKIE['user_password']);
if (!$res['user_name_psw_match'] == 'yes' || !$res['user_is_manager'] == 'yes') {
    echo "<script language=javascript>alert('无权访问!');location.href='index.php';</script>";
    exit();
}
?>

<?php
$id = $_GET['id'];
$page_name = "index_" . $_GET["pagename"];

$content = get_info_of_id_in_datatable($id, 'index_' . $page_name, 0);
if (!$content['file_dir'] == '') {
    $file_dir = explode("|", $content["file_dir"]);
    $count = count($file_name);
    for ($i = 0; $i < $count; $i++)
        unlink("./upload/" . $file_dir[$i]);
        /*if (!unlink("./upload/" . $file_dir[$i]))
            echo "<script language=javascript>alert('删除文件失败!');</script>";
        */
}

$res = delete_date_by_id_in_datatable($id, $page_name);


if ($res == 1) {
    echo "<script language=javascript>alert('删除成功!');location.href='responsive/index.php';</script>";
}
/*
else
    echo "<script language=javascript>alert('删除失败!');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
*/
?>
