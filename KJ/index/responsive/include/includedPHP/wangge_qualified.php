<?php include_once '../../../include/function.php' ?>
<?php
$db = connect_mysql();
$type = $_GET['type'];
if($type == 1){
    //去所有空格，用正则 preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$content);
    $unit = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_GET['unit']);
    $properties = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_GET['properties']);
    if($unit=="" && $properties==""){
        $query = "select * from wangge_qualified where 1";
    }else{
        $str ='where';
        if($unit!=""){
            $str = $str." company like '%".$unit."%'";
        }
        if($properties!=""){
            $str = $str." qualified_id like '%".$properties."%'";        
        }
        $query = "select * from wangge_qualified ".$str;
       
    }
    $result = $db->query($query);
    $num_results=$result->num_rows;
    $project = [];
    for($i=0;$i<$num_results;$i++){
      $row=$result->fetch_assoc();
      $arr = array ('id'=>"$row[id]",'company'=>"$row[company]",'pingdingdengji'=>"$row[pingdingdengji]",'qualified_id'=>"$row[qualified_id]"); 
      array_push($project,$arr);
    }
    echo json_encode($project);  
}else if($type == 2){
    //编辑代码
    $editID = $_GET['id'];
    $company = $_GET['company'];
    $dengji = $_GET['dengji'];
    $qualified_id = $_GET['zizhi_id'];
    $query = "update wangge_qualified set company=$company,pingdingdengji=$dengji,qualified_id=$qualified_id where id=$editID";
    $result = $db->query($query);
    if($result){
        echo "edit_success";
    }else{
        echo "error";
    }
}else if($type == 3){
    //添加
    $company = $_GET['company'];
    $dengji = $_GET['dengji'];
    $qualified_id = $_GET['qualified_id'];
    $query = "insert into wangge_qualified (company,pingdingdengji,qualified_id) values ($company,$dengji,$qualified_id)";
    $result = $db->query($query);
    if($result){
        echo "add_success";
    }else{
        echo "error";
    }
}else if($type == 4){
    //删除
    $id = $_GET['id'];
    $query = "delete from wangge_qualified where id=$id";
    $result = $db->query($query);
    if($result){
        echo "del_success";
    }else{
        echo "error";
    }
}

?>