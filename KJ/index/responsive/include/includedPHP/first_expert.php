<?php include_once '../../../include/function.php' ?>
<?php
$db = connect_mysql();
$type = $_GET['type'];
if($type == 1){
    //去所有空格，用正则 preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$content);
    $unit = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_GET['unit']);
    $properties = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_GET['properties']);
    if($unit=="" && $properties==""){
        $query = "select * from  first_expertone where 1";
    }else{
        $str ='where';
        if($unit!=""){
            $str = $str." company like '%".$unit."%'";
        }
        if($properties!=""){
          $str = $str." name like '%".$properties."%'";
        }
        $query = "select * from  first_expertone ".$str;
       
    }
    $result = $db->query($query);
    $num_results=$result->num_rows;
    $project = [];
    for($i=0;$i<$num_results;$i++){
      $row=$result->fetch_assoc();
      $arr = array ('id'=>"$row[id]",'name'=>"$row[name]",'position'=>"$row[position]",'zhicheng'=>"$row[zhicheng]",'company'=>"$row[company]",'zhuanjia_position'=>"$row[zhuanjia_position]"); 
      array_push($project,$arr);
    }
    echo json_encode($project);  
}else if($type == 2){
    //编辑代码
    $editID = $_GET['id'];
    $company = $_GET['company'];
    $name = $_GET['name'];
    $position = $_GET['position'];
    $zhicheng = $_GET['zhicheng'];
    $zhuanjia_position = $_GET['zhuanjia_position'];
    $query = "update  first_expertone set company=$company,name=$name,position=$position,zhicheng=$zhicheng,zhuanjia_position=$zhuanjia_position where id=$editID";
    $result = $db->query($query);
    if($result){
        echo "edit_success";
    }else{
        echo "error";
    }
}else if($type == 3){
    //添加
    $company = $_GET['company'];
    $name = $_GET['name'];
    $position = $_GET['position'];
    $zhicheng = $_GET['zhicheng'];
    $zhuanjia_position = $_GET['zhuanjia_position'];
    $query = "insert into  first_expertone (name,position,company,zhuanjia_position,zhicheng) values ($name,$position,$company,$zhuanjia_position,$zhicheng)";
    $result = $db->query($query);
    if($result){
        echo "add_success";
    }else{
        echo "error";
    }
}else if($type == 4){
    //删除
    $id = $_GET['id'];
    $query = "delete from  first_expertone where id=$id";
    $result = $db->query($query);
    if($result){
        echo "del_success";
    }else{
        echo "error";
    }
}else if($type==5){
        //去所有空格，用正则 preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$content);
        $unit = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_GET['unit2']);
        $properties = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$_GET['properties2']);
        if($unit=="" && $properties==""){
            $query = "select * from  first_experttwo where 1";
        }else{
            $str ='where';
            if($unit!=""){
                $str = $str." company like '%".$unit."%'";
            }
            if($properties!=""){
              $str = $str." name like '%".$properties."%'";
            }
            $query = "select * from  first_experttwo ".$str;
           
        }
        $result = $db->query($query);
        $num_results=$result->num_rows;
        $project = [];
        for($i=0;$i<$num_results;$i++){
          $row=$result->fetch_assoc();
          $arr = array ('id'=>"$row[id]",'name'=>"$row[name]",'position'=>"$row[position]",'zhicheng'=>"$row[zhicheng]",'company'=>"$row[company]",'zhuanjia_position'=>"$row[zhuanjia_position]"); 
          array_push($project,$arr);
        }
        echo json_encode($project);  
}else if($type == 6){
    //添加
    $company2 = $_GET['company2'];
    $name2 = $_GET['name2'];
    $position2 = $_GET['position2'];
    $zhicheng2 = $_GET['zhicheng2'];
    $zhuanjia_position2 = $_GET['zhuanjia_position2'];
    $query = "insert into  first_experttwo (name,position,company,zhuanjia_position,zhicheng) values ($name2,$position2,$company2,$zhuanjia_position2,$zhicheng2)";
    $result = $db->query($query);
    if($result){
        echo "add_success";
    }else{
        echo "error";
    }
}else if($type == 7){
    //编辑代码
    $editID = $_GET['id2'];
    $company = $_GET['company2'];
    $name = $_GET['name2'];
    $position = $_GET['position2'];
    $zhicheng = $_GET['zhicheng2'];
    $zhuanjia_position = $_GET['zhuanjia_position2'];
    $query = "update  first_experttwo set company=$company,name=$name,position=$position,zhicheng=$zhicheng,zhuanjia_position=$zhuanjia_position where id=$editID";
    $result = $db->query($query);
    if($result){
        echo "edit_success";
    }else{
        echo "error";
    }
}else if($type == 8){
    //删除
    $id = $_GET['id'];
    $query = "delete from  first_experttwo where id=$id";
    $result = $db->query($query);
    if($result){
        echo "del_success";
    }else{
        echo "error";
    }
}

?>