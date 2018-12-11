<?php

$is_local = false;

$local = new stdClass();
$mail = new stdClass();
if (!$is_local){

    $local->host = "localhost";
    $local->user = "jyotgwcz_jj";
    $local->pass = "Shaan@1.";
    $local->select_db = "jyotgwcz_jmsdotcom";

    $mail->username = "contact@jyotirmays.com";
    $mail->pass = "Shaan@1.";

} else {

    $local->host = "localhost";
    $local->user = "root";
    $local->pass = "";
    $local->select_db = "jmsdotcom";

    $mail->username = "bbsenapati60@gmail.com";
    $mail->pass = "Shaan@1.";

}

?>