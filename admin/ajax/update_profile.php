<?php

$profile_pic_dir = "../../contents/images/img-profile/";
$main_pic_dir = "../../contents/images/img/";

require_once "../../config.php";

require_once "../utils.php";

if(!is_loggedin()){
    header('Location: ../login.php');
}



$db = mysqli_connect($local->host, $local->user, $local->pass);
if($db) {
    mysqli_select_db($db, $local->select_db);
} else {
    echo "Cannot contact now, some issue!- Error code - 1";
    return;
}

echo "<pre>";
$p1 = $p2 = $p3 = $p4 = $p5 = $p6 = $p7 = "";
if ($_FILES["profilepic1"]["error"] == 0){
    $_POST["profilepic1"] = basename($_FILES["profilepic1"]["name"]);
    $target_file1 = $profile_pic_dir . basename($_FILES["profilepic1"]["name"]);
    move_uploaded_file($_FILES["profilepic1"]["tmp_name"], $target_file1);
    $p1 = ",`profilepic1` = '".$_POST['profilepic1']."'";
}
if ($_FILES["profilepic2"]["error"] == 0){
    $_POST["profilepic2"] = basename($_FILES["profilepic2"]["name"]);
    $target_file2 = $profile_pic_dir . basename($_FILES["profilepic2"]["name"]);
    move_uploaded_file($_FILES["profilepic2"]["tmp_name"], $target_file2);
    $p2 = ",`profilepic2` = '".$_POST["profilepic2"]."'";
}
if ($_FILES["profilepic3"]["error"] == 0){
    $_POST["profilepic3"] = basename($_FILES["profilepic3"]["name"]);
    $target_file3 = $profile_pic_dir . basename($_FILES["profilepic3"]["name"]);
    move_uploaded_file($_FILES["profilepic3"]["tmp_name"], $target_file3);
    $p3 = ",`profilepic3` = '".$_POST["profilepic3"]."'";
}
if ($_FILES["profilepic4"]["error"] == 0){
    $_POST["profilepic4"] = basename($_FILES["profilepic4"]["name"]);
    $target_file4 = $profile_pic_dir . basename($_FILES["profilepic4"]["name"]);
    move_uploaded_file($_FILES["profilepic4"]["tmp_name"], $target_file4);
    $p4 = ",`profilepic4` = '".$_POST["profilepic4"]."'";
}
if ($_FILES["profilepic5"]["error"] == 0){
    $_POST["profilepic5"] = basename($_FILES["profilepic5"]["name"]);
    $target_file5 = $profile_pic_dir . basename($_FILES["profilepic5"]["name"]);
    move_uploaded_file($_FILES["profilepic5"]["tmp_name"], $target_file5);
    $p5 = ",`profilepic5` = '".$_POST["profilepic5"]."'";
}
if ($_FILES["profilepic6"]["error"] == 0){
    $_POST["profilepic6"] = basename($_FILES["profilepic6"]["name"]);
    $target_file6 = $profile_pic_dir . basename($_FILES["profilepic6"]["name"]);
    move_uploaded_file($_FILES["profilepic6"]["tmp_name"], $target_file6);
    $p6 = ",`profilepic6` = '".$_POST["profilepic6"]."'";
}

if ($_FILES["mainpic"]["error"] == 0){
    $_POST["mainpic"] = basename($_FILES["mainpic"]["name"]);
    $main_pic = $main_pic_dir . basename($_FILES["mainpic"]["name"]);
    move_uploaded_file($_FILES["mainpic"]["tmp_name"], $main_pic);
    $p7 = ",`mainpic` = '".$_POST["mainpic"]."'";
}
print_r($_POST);

$sql = 'UPDATE `profile` SET 
        `firstname` = "'.$_POST["firstname"].'",
        `lastname` = "'.$_POST["lastname"].'",  
        `dob` = "'.$_POST["dob"].'", 
        `address`= "'.$_POST["address"].'",
        `email` = "'.$_POST["email"].'", 
        `phone` = "'.$_POST["phone"].'", 
        `website` = "'.$_POST["website"].'", 
        `majorabout` = "'.$_POST["majorabout"].'", 
        `minorabout` = "'.$_POST["minorabout"].'",
        `currentrole` = "'.$_POST["currentrole"].'",
        `currentrolein` = "'.$_POST["currentrolein"].'",
        `majorcommonabout` = "'.$_POST["majorcommonabout"].'",
        `minorcommonabout` = "'.$_POST["minorcommonabout"].'",
        `fblink` = "'.$_POST["fblink"].'",
        `twitterlink` = "'.$_POST["twitterlink"].'",
        `linkedinlink` = "'.$_POST["linkedinlink"].'",
        `githublink` = "'.$_POST["githublink"].'",
        `stackoverflowlink` = "'.$_POST["stackoverflowlink"].'",
        `skypeid` = "'.$_POST["skypeid"].'",
        `gdriveid` = "'.$_POST["gdriveid"].'"';

$sql = $sql.$p1.$p2.$p3.$p4.$p5.$p6.$p7;

echo "$sql";

if (!mysqli_query($db, $sql)){
    echo "\n \n <span style='color: red;'>Error Error!! </span>\n";
} else {
    echo "\n \n <span style='color: green;'>Successfully Updated.</span>\n";
}
echo "</pre>";
?>