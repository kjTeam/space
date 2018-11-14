<?php include_once '../../../include/function.php' ?>
<?php
$db = connect_mysql();
$type = $_GET['type'];
if($type == 1){
    //去所有空格，用正则 preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$content);
    $unit = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_GET['unit']);
    $properties = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_GET['properties']);
    if($unit=="" && $properties==""){
        $query = "select * from  mo_dengjiunits where 1";
    }else{
        $str ='where';
        if($unit!=""){
            $str = $str." company like '%".$unit."%'";
        }
        if($properties!=""){
          $str = $str." chengbao_id like '%".$properties."%' or sheji_id like '%".$properties."%' ";
        }
        $query = "select * from  mo_dengjiunits ".$str;
       
    }
    $result = $db->query($query);
    $num_results=$result->num_rows;
    $project = [];
    for($i=0;$i<$num_results;$i++){
      $row=$result->fetch_assoc();
      $arr = array ('id'=>"$row[id]",'company'=>"$row[company]",'chengbo'=>"$row[chengbo]",'chengbao_id'=>"$row[chengbao_id]",'sheji'=>"$row[sheji]",'sheji_id'=>"$row[sheji_id]"); 
      array_push($project,$arr);
    }
    echo json_encode($project);  
}else if($type == 2){
    //编辑代码
    $editID = $_GET['id'];
    $company = $_GET['company'];
    $chengbo = $_GET['chengbo'];
    $chengbao_id = $_GET['chengbao_id'];
    $sheji = $_GET['sheji'];
    $sheji_id = $_GET['sheji_id'];
    $query = "update mo_dengjiunits set company=$company,chengbo=$chengbo,chengbao_id=$chengbao_id,sheji=$sheji,sheji_id=$sheji_id where id=$editID";
    $result = $db->query($query);
    if($result){
        echo "edit_success";
    }else{
        echo "error";
    }
}else if($type == 3){
    //添加
    $company = $_GET['company'];
    $chengbo = $_GET['chengbo'];
    $chengbao_id = $_GET['chengbao_id'];
    $sheji = $_GET['sheji'];
    $sheji_id = $_GET['sheji_id'];
    $query = "insert into mo_dengjiunits (company,chengbo,chengbao_id,sheji,sheji_id) values ($company,$chengbo,$chengbao_id,$sheji,$sheji_id)";
    $result = $db->query($query);
    if($result){
        echo "add_success";
    }else{
        echo "error";
    }
}else if($type == 4){
    //删除
    $id = $_GET['id'];
    $query = "delete from  mo_dengjiunits  where id=$id";
    $result = $db->query($query);
    if($result){
        echo "del_success";
    }else{
        echo "error";
    }
}

?>