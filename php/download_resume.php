<?php
        $file = '../file/My_resume.pdf';

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