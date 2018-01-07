<?php

require_once "../../config.php";
require_once "../utils.php";
if(!is_loggedin()){
    header('Location: ../login.php');
}

$portfolio_dir = "../../contents/images/portfolio/";

echo "<pre>";
$db = mysqli_connect($local->host, $local->user, $local->pass);
if($db) {
    mysqli_select_db($db, $local->select_db);
} else {
    echo "<span style='color: red;'>Cannot contact now, some issue!- Error code - 1</span>\n";
    return;
}

$update_tbls = array();

foreach($_POST as $key => $value) {
    $exp_key = explode('_', $key);
    if(empty($update_tbls[$exp_key[1]])){
        $update_tbls[$exp_key[1]] =  array();
    }
    if(empty($update_tbls[$exp_key[1]][$exp_key[0]])){
        $update_tbls[$exp_key[1]][$exp_key[0]] =  "";
    }
    $update_tbls[$exp_key[1]][$exp_key[0]] =  $value;
}

print_r($update_tbls);

$sqls = array();
foreach($update_tbls as $id => $val) {
    $sql = "UPDATE projects SET name = '".$val["name"]."', description='".$val["description"]."', 
    hostedurl='".$val["hostedurl"]."', codeurl='".$val["codeurl"]."', filter='".$val["filter"]."' 
    WHERE id = ".$id;
    array_push($sqls, $sql);
}

$files = array_keys($_FILES);
print_r($_FILES);
foreach($files as $k){
    if ($_FILES[$k]["error"] == 0){
        $new_file_name = basename($_FILES[$k]["name"]);
        $target_file = $portfolio_dir . $new_file_name;
        move_uploaded_file($_FILES[$k]["tmp_name"], $target_file);
        $sql_portfolio = "UPDATE projects SET iconfile = '".$new_file_name."' WHERE id='".explode('_', $k)[1]."'";
        array_push($sqls, $sql_portfolio);
    }
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