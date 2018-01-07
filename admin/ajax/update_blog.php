<?php

require_once "../../config.php";
require_once "../utils.php";
if(!is_loggedin()){
    header('Location: ../login.php');
}
$carousel_dir = "../../contents/images/carousels/";

echo "<pre>";
$db = mysqli_connect($local->host, $local->user, $local->pass);
if($db) {
    mysqli_select_db($db, $local->select_db);
} else {
    echo "<span style='color: red;'>Cannot contact now, some issue!- Error code - 1</span>\n";
    return;
}

$sqls = array();
$files = array_keys($_FILES);
print_r($_FILES);
foreach($files as $k){
    if ($_FILES[$k]["error"] == 0){
        $new_file_name = basename($_FILES[$k]["name"]);
        $target_file = $carousel_dir . $new_file_name;
        move_uploaded_file($_FILES[$k]["tmp_name"], $target_file);
        $sql_carousel = "UPDATE carousel SET filename = '".$new_file_name."' WHERE id='".explode('_', $k)[1]."'";
        array_push($sqls, $sql_carousel);
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