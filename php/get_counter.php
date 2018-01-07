<?php

require_once "../config.php";
$db = mysqli_connect($local->host, $local->user, $local->pass);
if($db) {
    mysqli_select_db($db, $local->select_db);
} else {
    echo "Cannot contact now, some issue!- Error code - 1";
    return;
}


$sql = "SELECT counter FROM counter";

$result = mysqli_query($db, $sql);

$counter = $result->fetch_assoc();

echo $counter["counter"];

mysqli_close($db);


?>