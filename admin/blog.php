<?php 
require_once(dirname(__FILE__)."/utils.php");
//echo($_SERVER['PHP_SELF'])

require_once "../config.php";
if(!is_loggedin()){
    header('Location: login.php');
}
$db = mysqli_connect($local->host, $local->user, $local->pass);
if($db) {
    mysqli_select_db($db, $local->select_db);
} else {
    echo "Cannot contact now, some issue!- Error code - 1";
    return;
}

$sql = "SELECT * FROM carousel";
$carous = mysqli_query($db, $sql);

?>
<html>
    <?php common_header(); ?>

    <body style="background-color : lightgrey; text-align: center"> 
        <style>
            input {
                margin: 4 4 4 4;
            }
            textarea {
                margin: 4 4 4 4;
            }
        </style>
        <form action="./ajax/update_blog.php" enctype="multipart/form-data" method="post">
            <fieldset>
                <legend>Blog Carousel information</legend>
                <?php 
                while ($car = $carous->fetch_assoc()) {
                ?>
                <img src="../contents/images/carousels/<?php echo $car['filename']?>" alt="" width="82" height="34">
                <input type="file" name="car_<?php echo $car["id"]; ?>" value="<?php echo $car['filename']?>">
                <br>
                <?php
                }
                ?>
                <br><hr><br>
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </body>
</html>