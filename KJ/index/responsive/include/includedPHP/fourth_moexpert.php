<?php include_once '../../../include/function.php' ?>
<?php
$db = connect_mysql();
$type = $_GET['type'];
if($type == 1){
    //去所有空格，用正则 preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$content);
    $unit = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_GET['unit']);
    $properties = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_GET['properties']);
    if($unit=="" && $properties==""){
        $query = "select * from fourth_moexpert where 1";
    }else{
        $str ='where';
        if($unit!=""){
            $str = $str." company like '%".$unit."%'";
        }
        if($properties!=""){
            $str = $str." name like '%".$properties."%'";
        }
        $query = "select * from fourth_moexpert ".$str;
       
    }
    $result = $db->query($query);
    $num_results=$result->num_rows;
    $project = [];
    for($i=0;$i<$num_results;$i++){
      $row=$result->fetch_assoc();
      $arr = array ('id'=>"$row[id]",'company'=>"$row[company]",'name'=>"$row[name]",'position'=>"$row[position]",'zhuanjia_position'=>"$row[zhuanjia_position]"); 
      array_push($project,$arr);
    }
    echo json_encode($project);  
}else if($type == 2){
    //编辑代码
    $editID = $_GET['id'];
    $name = $_GET['name'];
    $position = $_GET['position'];
    $company = $_GET['company'];
    $zhuanjia_position = $_GET['zhuanjia_position'];
    $query = "update fourth_moexpert set name=$name,position=$position,company=$company,zhuanjia_position=$zhuanjia_position where id=$editID";
    $result = $db->query($query);
    if($result){
        echo "edit_success";
    }else{
        echo "error";
    }
}else if($type == 3){
    //添加
    $name = $_GET['name'];
    $position = $_GET['position'];
    $company = $_GET['company'];
    $zhuanjia_position = $_GET['zhuanjia_position'];
    $query = "insert into fourth_moexpert (name,position,company,zhuanjia_position) values ($name,$position,$company,$zhuanjia_position)";
    $result = $db->query($query);
    if($result){
        echo "add_success";
    }else{
        echo "error";
    }
}else if($type == 4){
    //删除
    $id = $_GET['id'];
    $query = "delete from fourth_moexpert where id=$id";
    $result = $db->query($query);
    if($result){
        echo "del_success";
    }else{
        echo "error";
    }
}

?>