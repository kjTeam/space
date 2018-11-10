<?php include_once '../../../include/function.php' ?>
<?php
$db = connect_mysql();
$type = $_GET['type'];
if($type == 1){
    $query = "select * from index_huiyuan where 1";
    $result = $db->query($query);
    $num_results=$result->num_rows;
    $project = [];
    for($i=0;$i<$num_results;$i++){
      $row=$result->fetch_assoc();
      $arr = array ('id'=>"$row[id]",'unit'=>"$row[unit]",'unit_represent'=>"$row[unit_represent]",'post'=>"$row[post]",'unit_properties'=>"$row[unit_properties]"); 
      array_push($project,$arr);
    }
    echo json_encode($project);  
}
?>