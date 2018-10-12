<?php
/**
 * User: ZhuKaihao
 * Date: 16/4/12
 * Time: 下午6:13
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
error_reporting(E_ERROR | E_WARNING);
$id = $_POST['id'];
$page_name = $_POST['page_name'];
$class=$_POST['class'];
date_default_timezone_set('UTC');
if ($_POST['title'])
    $title = $_POST['title'];
else
    $title = date("Y-m-d"); //默认标题为当前时间
$file_no = $_POST['file_no'];
$content = $_POST['content'];
$end = $_POST['end'];
$date = $_POST['date'];
$class = $_POST['class'];
//新上传的文件信息
$new_file_name = $_FILES['file']['name'];
$new_file_dir = array();
$new_file_num = count($new_file_name);
//旧文件信息
$old_file_name = $_POST['file_name'];
$old_file_dir = $_POST['file_dir'];
//要删除文件的信息
$file_delete = $_POST['file_delete'];

//有文件上传
if ($new_file_name[0] != "")
    for ($i = 0; $i < $new_file_num; $i++) {
        $new_file_dir[$i] = uniqid_file_name($new_file_name[$i]);
        move_uploaded_file($_FILES['file']['tmp_name'][$i], "upload/" . $new_file_dir[$i]);
    }
else
    $new_file_name = array(); //必须有这一行,将new_file_name设为空数组,否则若文件上传为空,new_file_name是一个有一个空元素的数组

//获取旧文件信息
$old_file_name = explode("|", $old_file_name);
$old_file_dir = explode("|", $old_file_dir);
$old_file_num = count($old_file_name);

//有文件被删除
//需要处理空文件名
if ($delete_num = count($file_delete)) {
    for ($i = 0; $i < $old_file_num; $i++) {
        if ($i != $file_delete[0]&&$old_file_name[$i]!="") {
            $new_file_dir[] = $old_file_dir[$i];
            $new_file_name[] = $old_file_name[$i];
        }
        else {
            if (!unlink("./upload/" . $old_file_dir[$i]))
                echo "<script language=javascript>alert('删除文件失败!');</script>";
            array_splice($file_delete, 0, 1);
        }
    }
}
else
    for ($i = 0; $i < $old_file_num; $i++) {
        if($old_file_name[$i]!="") {
            $new_file_dir[] = $old_file_dir[$i];
            $new_file_name[] = $old_file_name[$i];
        }
    }

//将所有文件名连接为一个字符串,用"|"作为分隔符
$file_dir_all = implode("|", $new_file_dir);
$file_name_all = implode("|", $new_file_name);

$column = array("title", "file_no", "content", "end", "date", "file_name", "file_dir");
$value = array("$title", "$file_no", "$content", "$end", "$date", "$file_name_all", "$file_dir_all");

if($class==$page_name) {
    if ($res = updata_date_by_id_in_datatable($id, $column, $value, "index_".$page_name))
        echo "<script language=javascript>location.href='announcement_content.php?id=" . $id . "&&pagename=" . $class . "';</script>";
    else
        echo "<script language=javascript>alert('更新失败!');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
}
else {
    if ($res = insert_date_in_datatable($column,$value,"index_".$class,$new_id)&&delete_date_by_id_in_datatable($id,"index_".$page_name))
        echo "<script language=javascript>location.href='announcement_content.php?id=" . $new_id . "&&pagename=" . $class . "';</script>";
    else
        echo "<script language=javascript>alert('更新失败!');location.href='" . $_SERVER["HTTP_REFERER"] . "';</script>";
}


?>
