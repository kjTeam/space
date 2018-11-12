<?php include_once '../../../include/function.php' ?>
<?php
$db = connect_mysql();
$type = $_GET['type'];
if($type == 1){
    //去所有空格，用正则 preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$content);
    $unit = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_GET['unit']);
    $properties = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_GET['properties']);
    if($unit=="" && $properties==""){
        $query = "select * from sixth_council where 1";
    }else{
        $str ='where';
        if($unit!=""){
            $str = $str." company like '%".$unit."%'";
        }
        if($properties!=""){
            if($str=='where'){
                $str = $str." nature = '".$properties."'";
            }else{
                $str = $str." and nature = '".$properties."'";
            }
        }
        $query = "select * from sixth_council ".$str;
       
    }
    $result = $db->query($query);
    $num_results=$result->num_rows;
    $project = [];
    for($i=0;$i<$num_results;$i++){
      $row=$result->fetch_assoc();
      $arr = array ('id'=>"$row[id]",'company'=>"$row[company]",'daibiao'=>"$row[daibiao]",'position'=>"$row[position]",'councilposition'=>"$row[councilposition]",'nature'=>"$row[nature]"); 
      array_push($project,$arr);
    }
    echo json_encode($project);  
}else if($type == 2){
    //编辑代码
    $editID = $_GET['id'];
    $company = $_GET['company'];
    $daibiao = $_GET['daibiao'];
    $position = $_GET['position'];
    $councilposition = $_GET['councilposition'];
    $nature = $_GET['nature'];
    $query = "update sixth_council set company=$company,daibiao=$daibiao,position=$position,councilposition=$councilposition,nature=$nature where id=$editID";
    $result = $db->query($query);
    if($result){
        echo "edit_success";
    }else{
        echo "error";
    }
}else if($type == 3){
    //添加
    $company = $_GET['company'];
    $daibiao = $_GET['daibiao'];
    $position = $_GET['position'];
    $councilposition = $_GET['councilposition'];
    $nature = $_GET['nature'];
    $query = "insert into sixth_council (company,daibiao,position,councilposition,nature) values ($company,$daibiao,$position,$councilposition,$nature)";
    $result = $db->query($query);
    if($result){
        echo "add_success";
    }else{
        echo "error";
    }
}else if($type == 4){
    //删除
    $id = $_GET['id'];
    $query = "delete from sixth_council where id=$id";
    $result = $db->query($query);
    if($result){
        echo "del_success";
    }else{
        echo "error";
    }
}

?>