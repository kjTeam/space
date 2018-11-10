<?php include_once '../../../include/function.php' ?>
<?php
$db = connect_mysql();
$type = $_GET['type'];
if($type == 1){
    //去所有空格，用正则 preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$content);
    $unit = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_GET['unit']);
    $properties = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_GET['properties']);
    if($unit=="" && $properties==""){
        $query = "select * from index_huiyuan where 1";
    }else{
        $str ='where';
        if($unit!=""){
            $str = $str." unit like '%".$unit."%'";
        }
        if($properties!=""){
            if($str=='where'){
                $str = $str." unit_properties = '".$properties."'";
            }else{
                $str = $str." and unit_properties = '".$properties."'";
            }
        }
        $query = "select * from index_huiyuan ".$str;
       
    }
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