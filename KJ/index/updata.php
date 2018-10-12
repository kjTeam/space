<?php
/**
 * User: ZhuKaihao
 * Date: 16/4/2
 * Time: 下午4:37
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
date_default_timezone_set('UTC');
$title = date("Y-m-d"); //默认标题为当前时间
if ($_POST['title'])
    $title = $_POST['title'];
$file_no = $_POST['file_no'];
$content = $_POST['content'];
$end = $_POST['end'];
$date = $_POST['date'];
$class = $_POST['class'];
$file_name = $_FILES['file']['name'];
$file_dir = array();
$file_num = count($file_name);

//依次保存上传文件
if ($file_name[0] != "") { //有文件上传
    for ($i = 0; $i < $file_num; $i++) {
        $file_dir[$i] = uniqid_file_name($file_name[$i]);
        $upfile_res = move_uploaded_file($_FILES['file']['tmp_name'][$i], "/home/www/cms/index/upload/" . $file_dir[$i]);
        if ($upfile_res) ;
        else {
            echo "上传失败";
            print_r($_FILES['file']['error']);
            exit();
        }
    }
//将所有文件名连接为一个字符串,用"|"作为分隔符
    $file_dir_all = implode("|", $file_dir);
    $file_name_all = implode("|", $file_name);
}


$column = array("title", "file_no", "content", "end", "date", "file_name", "file_dir");
$value = array("$title", "$file_no", "$content", "$end", "$date", "$file_name_all", "$file_dir_all");
if ($res = insert_date_in_datatable($column, $value, $class, $id)) {
    $pagename = substr($class, 6);
    echo "<script language=javascript>location.href='announcement_content.php?id=$id&&pagename=$pagename';</script>";
}
else
    echo "<script language=javascript>alert('上传失败!');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
?>
