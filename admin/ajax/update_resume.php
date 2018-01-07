<?php

require_once "../../config.php";
require_once "../utils.php";
if(!is_loggedin()){
    header('Location: ../login.php');
}

$resume_dir = "../../contents/file/";

echo "<pre>";
$db = mysqli_connect($local->host, $local->user, $local->pass);
if($db) {
    mysqli_select_db($db, $local->select_db);
} else {
    echo "<span style='color: red;'>Cannot contact now, some issue!- Error code - 1</span>\n";
    return;
}

$update_tbls = array("experience"=>array(), "education"=>array(), "programming"=>array(), "language"=>array(),
 "ide"=>array(), "office"=>array(), "hobby"=>array());

foreach($_POST as $key => $value) {

    $exp_key = explode('_', $key);
    if($exp_key[0] == 'expr'){
        if(empty($update_tbls["experience"][$exp_key[2]])){
            $update_tbls["experience"][$exp_key[2]] =  array();
        }
        array_push($update_tbls["experience"][$exp_key[2]], $value);
    } else if($exp_key[0] == 'edu'){
        if(empty($update_tbls["education"][$exp_key[2]])){
            $update_tbls["education"][$exp_key[2]] =  array();
        }
        array_push($update_tbls["education"][$exp_key[2]], $value);
    } else if($exp_key[0] == 'prog'){
        if(empty($update_tbls["programming"][$exp_key[2]])){
            $update_tbls["programming"][$exp_key[2]] =  array();
        }
        array_push($update_tbls["programming"][$exp_key[2]], $value);
    } else if($exp_key[0] == 'lang'){
        if(empty($update_tbls["language"][$exp_key[2]])){
            $update_tbls["language"][$exp_key[2]] =  array();
        }
        array_push($update_tbls["language"][$exp_key[2]], $value);
    } else if($exp_key[0] == 'ide'){
        if(empty($update_tbls["ide"][$exp_key[2]])){
            $update_tbls["ide"][$exp_key[2]] =  array();
        }
        array_push($update_tbls["ide"][$exp_key[2]], $value);
    } else if($exp_key[0] == 'ofc'){
        if(empty($update_tbls["office"][$exp_key[2]])){
            $update_tbls["office"][$exp_key[2]] =  array();
        }
        array_push($update_tbls["office"][$exp_key[2]], $value);
    } else if($exp_key[0] == 'hoby'){
        if(empty($update_tbls["hobby"][$exp_key[2]])){
            $update_tbls["hobby"][$exp_key[2]] =  array();
        }
        array_push($update_tbls["hobby"][$exp_key[2]], $value);
    } 

}

print_r($update_tbls);

$sqls = array();
foreach($update_tbls as $tbl => $arr) {
    foreach($arr as $id => $values){
        if ($tbl == "experience"){
            $sql = "UPDATE ".$tbl." SET designation = '".$values[0]."', start =  '". $values[1]."', end = '".$values[2]."', 
            company =  '". $values[3]."', url = '".$values[4]."', address =  '". $values[5]."', 
            description = '".$values[6]."' 
            WHERE id = ".$id;
            array_push($sqls, $sql);
        } else if ($tbl == "education"){
            $sql = "UPDATE ".$tbl." SET degree = '".$values[0]."', start =  '". $values[1]."', end = '".$values[2]."', 
            school =  '". $values[3]."', url = '".$values[4]."', address =  '". $values[5]."',
            description = '".$values[6]."' 
            WHERE id = ".$id;
            array_push($sqls, $sql);
        } else {
            $sql = "UPDATE ".$tbl." SET name = '".$values[0]."', level =  ". $values[1]." WHERE id = ".$id;
            array_push($sqls, $sql);
        }
    }
}

if ($_FILES["resume"]["error"] == 0){
    $new_file_name = basename($_FILES["resume"]["name"]);
    $target_file = $resume_dir . $new_file_name;
    move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file);
    $sql_resume = "UPDATE resume set filename = '".$new_file_name."'";
    array_push($sqls, $sql_resume);
}

foreach ($sqls as $sql){
    echo "\n $sql \n";
    if (!mysqli_query($db, $sql)){
        echo "<span style='color: red;'>Error Error!! </span>\n";
    } else {
        echo "<span style='color: green;'>Successfully Updated.</span>\n";
    }
}
echo "</pre>";
?>