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
}else if($type == 2){
    //编辑代码
    $editID = $_GET['id'];
    $unit = $_GET['unit'];
    $represent = $_GET['represent'];
    $post = $_GET['post'];
    $propoty = $_GET['propoty'];
    $query = "update index_huiyuan set unit=$unit,unit_represent=$represent,post=$post,unit_properties=$propoty where id=$editID";
    $result = $db->query($query);
    if($result){
        echo "edit_success";
    }else{
        echo "error";
    }
}else if($type == 3){
    //添加
    $unit = $_GET['unit'];
    $represent = $_GET['represent'];
    $post = $_GET['post'];
    $propoty = $_GET['propoty'];
    $query = "insert into index_huiyuan (unit,unit_represent,post,unit_properties) values ($unit,$represent,$post,$propoty)";
    $result = $db->query($query);
    if($result){
        echo "add_success";
    }else{
        echo "error";
    }
}else if($type == 4){
    //删除
    $id = $_GET['id'];
    $query = "delete from index_huiyuan where id=$id";
    $result = $db->query($query);
    if($result){
        echo "del_success";
    }else{
        echo "error";
    }
}

?>