<?php include_once '../../../include/function.php' ?>
<?php
$db = connect_mysql();
$type = $_GET['type'];
if($type == 1){
    //去所有空格，用正则 preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$content);
    $unit = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_GET['unit']);
    $properties = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_GET['properties']);
    if($unit=="" && $properties==""){
        $query = "select * from  gc_manager where 1";
    }else{
        $str ='where';
        if($unit!=""){
            $str = $str." year like '%".$unit."%'";
        }
        if($properties!=""){
          $str = $str." name like '%".$properties."%' ";
        }
        $query = "select * from gc_manager ".$str;
       
    }
    $result = $db->query($query);
    $num_results=$result->num_rows;
    $project = [];
    for($i=0;$i<$num_results;$i++){
      $row=$result->fetch_assoc();
      $arr = array ('id'=>"$row[id]",'year'=>"$row[year]",'month'=>"$row[month]",'jl_dengji'=>"$row[jl_dengji]",'name'=>"$row[name]"); 
      array_push($project,$arr);
    }
    echo json_encode($project);  
}else if($type == 2){
    //编辑代码
    $editID = $_GET['id'];
    $year = $_GET['year'];
    $month = $_GET['month'];
    $jl_dengji= $_GET['jl_dengji'];
    $name = $_GET['name'];
    $query = "update gc_manager set year=$year,month=$month,jl_dengji=$jl_dengji,name=$name where id=$editID";
    $result = $db->query($query);
    if($result){
        echo "edit_success";
    }else{
        echo "error";
    }
}else if($type == 3){
    //添加
    $year = $_GET['year'];
    $month = $_GET['month'];
    $jl_dengji= $_GET['jl_dengji'];
    $name = $_GET['name'];
    $query = "insert into gc_manager (year,month,jl_dengji,name) values ($year,$month,$jl_dengji,$name)";
    $result = $db->query($query);
    if($result){
        echo "add_success";
    }else{
        echo "error";
    }
}else if($type == 4){
    //删除
    $id = $_GET['id'];
    $query = "delete from  gc_manager  where id=$id";
    $result = $db->query($query);
    if($result){
        echo "del_success";
    }else{
        echo "error";
    }
}

?>