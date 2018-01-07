<?php 
require_once(dirname(__FILE__)."/utils.php");
if(!is_loggedin()){
    header('Location: login.php');
}
?>
<html>
    <?php common_header(); 

    require_once "../config.php";

    $db = mysqli_connect('localhost', 'jyotgwcz_jj', "Shaan@1.");
    if($db) {
        mysqli_select_db($db, "jyotgwcz_jmsdotcom");
    } else {
        echo "Cannot contact now, some issue!- Error code - 1";
        return;
    }

    $sql = "SELECT p.*, pt.filter as strfilter FROM projects p join projtypes pt on pt.id = p.filter";
    $proj = mysqli_query($db, $sql);

    $sql = "SELECT * FROM projtypes";
    $projtyp = mysqli_query($db, $sql);
    $pts = array();
    while($pt= $projtyp->fetch_assoc()) {
        array_push($pts, $pt);
    }
    ?>
    
    <body style="background-color : lightgrey; text-align: center"> 
        <style>
            input {
                margin: 4 4 4 4;
            }
            textarea {
                margin: 4 4 4 4;
            }
        </style>

    </body>
</html>