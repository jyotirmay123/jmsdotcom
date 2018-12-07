<?php

$lat = strip_tags($_POST['lat']);
$lng = strip_tags($_POST['lng']);
$from = strip_tags($_POST['from']);
$time = time();

if($db = mysql_connect("localhost", 'jyotgwcz_jj', 'Shaan@1.')) {
    mysql_select_db('jyotgwcz_jmsdotcom', $db);
} else {
    echo "Cannot contact now, some issue!- Error code - 1";
    return;
}

$sql = "INSERT INTO blog_location_tracker (lat, lng, time, `from`) VALUES ('$lat', '$lng', '$time', '$from')";
echo $sql;
if(mysql_query($sql)) {
    mysql_close($db);
    echo "success";
    return;
} else {
    mysql_close($db);
    echo "Cannot contact now, some issue!- Error code - 2";
    return;
}


?>