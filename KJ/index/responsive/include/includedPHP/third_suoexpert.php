<?php include_once '../../../include/function.php' ?>
<?php
$db = connect_mysql();
$type = $_GET['type'];
if($type == 1){
    //去所有空格，用正则 preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$content);
    $unit = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_GET['unit']);
    $properties = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_GET['properties']);
    if($unit=="" && $properties==""){
        $query = "select * from third_suoexpert where 1";
    }else{
        $str ='where';
        if($unit!=""){
            $str = $str." company like '%".$unit."%'";
        }
        if($properties!=""){
            $str = $str." name like '%".$properties."%'";
        }
        $query = "select * from third_suoexpert ".$str;
       
    }
    $result = $db->query($query);
    $num_results=$result->num_rows;
    $project = [];
    for($i=0;$i<$num_results;$i++){
      $row=$result->fetch_assoc();
      $arr = array ('id'=>"$row[id]",'company'=>"$row[company]",'name'=>"$row[name]",'male'=>"$row[male]",'position'=>"$row[position]",'zhuanjia_position'=>"$row[zhuanjia_position]"); 
      array_push($project,$arr);
    }
    echo json_encode($project);  
}else if($type == 2){
    //编辑代码
    $editID = $_GET['id'];
    $company = $_GET['company'];
    $male = $_GET['male'];
    $position = $_GET['position'];
    $name = $_GET['name'];
    $zhuanjia_position = $_GET['zhuanjia_position'];
    $query = "update third_suoexpert set company=$company,name=$name,position=$position,male=$male,zhuanjia_position=$zhuanjia_position where id=$editID";
    $result = $db->query($query);
    if($result){
        echo "edit_success";
    }else{
        echo "error";
    }
}else if($type == 3){
    //添加
    $name = $_GET['name'];
    $male = $_GET['male'];
    $position = $_GET['position'];
    $company = $_GET['company'];
    $zhuanjia_position = $_GET['zhuanjia_position'];
    $query = "insert into third_suoexpert (name,male,position,company,zhuanjia_position) values ($name,$male,$position,$company,$zhuanjia_position)";
    $result = $db->query($query);
    if($result){
        echo "add_success";
    }else{
        echo "error";
    }
}else if($type == 4){
    //删除
    $id = $_GET['id'];
    $query = "delete from third_suoexpert where id=$id";
    $result = $db->query($query);
    if($result){
        echo "del_success";
    }else{
        echo "error";
    }
}

?>