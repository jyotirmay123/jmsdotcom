<?php
        require_once "../config.php";
        
        $db = mysqli_connect($local->host, $local->user, $local->pass);
        if($db) {
            mysqli_select_db($db, $local->select_db);
        } else {
            echo "<span style='color:red;'>Cannot contact now, some issue!- Error code - 1</span>";
            return;
        }
        $sql = "SELECT * FROM `resume`";
        $res = mysqli_query($db, $sql);
        $cv = $res->fetch_assoc();
        $file = '../contents/file/'.$cv["filename"];

        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            //$fhandler = fopen($file, "r");
            readfile($file);
            /*while(!feof($fhandler)) {
                if($data = fgets($fhandler)){
                    echo $data;
                } else {
                    echo "Nothing to read";
                }
            }
            fclose($file_handler);*/
            exit;
           
        }
        ?>