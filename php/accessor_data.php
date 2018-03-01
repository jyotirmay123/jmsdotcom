<?php
        require_once "../config.php";
        
        $db = mysqli_connect($local->host, $local->user, $local->pass);
        if($db) {
            mysqli_select_db($db, $local->select_db);
        } else {
            echo "<span style='color:red;'>Cannot contact now, some issue!- Error code - 1</span>";
            return;
        }
        $sql = "SELECT count(country) as count, country FROM `location_tracker` group by country";
        $ltr = mysqli_query($db, $sql);
        $rows = array();
        while($lt = $ltr->fetch_assoc()){
            $rows[] = $lt;
        }
        echo json_encode($rows);

?>