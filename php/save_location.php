<?php

require_once "../config.php";
$db = mysqli_connect($local->host, $local->user, $local->pass);
if($db) {
    mysqli_select_db($db, $local->select_db);
} else {
    echo "Cannot contact now, some issue!- Error code - 1";
    return;
}

if ($_POST){
    $time = time();
    $lat = strip_tags($_POST['lat']);
    $lng = strip_tags($_POST['lng']);
    $country = strip_tags($_POST['country']);
    $countryCode = strip_tags($_POST['countrycode']);
    $ip = strip_tags($_POST['ip']);
    $regionName = strip_tags($_POST['regionName']);
    $continentCode = strip_tags($_POST['continentCode']);
    $regionCode = strip_tags($_POST['regionCode']);
    $currencyCode = strip_tags($_POST['currencyCode']);
    $currencySymbol = strip_tags($_POST['currencySymbol']);
    $flag = true; 
    
} else {
    $flag = false;
}

if ($flag){
    $sql = array("INSERT INTO location_tracker (country,countryCode,ip,regionName, continentCode,regionCode, 
    currencyCode, currencySymbol, latitude, longitude, time) VALUES ('".$country."', '".$countryCode."',
    '".$ip."','".$regionName."','".$continentCode."', '".$regionCode."', '".$currencyCode."', 
    '".$currencySymbol."', $lat, $lng, $time)",
            "Update counter set counter=counter+1");
} else {
    $sql = array("Update counter set counter=counter+1");
}

$flag = true;
foreach($sql as $s) {
    if (!mysqli_query( $db, $s)){
        $flag = false;
    }
}

if($flag) {
    $name = "New Site Access";
    $email = $mail->username;
    $message = "Here is the details of accessor: \n
            country: ".$country."\n, countryCode: ".$countryCode."\n, ip: ".$ip."\n, regionName: ".$regionName."\n,
            continentCode: ".$continentCode."\n, regionCode: ".$regionCode."\n, currencyCode: ".$currencyCode."\n,
            currencySymbol: ".$currencySymbol."\n, latitude: ".$lat."\n, longitude: ".$lng."\n";
    send_mail($name, $email, $message);
    mysqli_close($db);
    //echo "success";
    return;
} else {
    mysqli_close($db);
    echo "Cannot contact now, some issue!- Error code - 2";
    return;
}


function send_mail($name, $email, $message) {
    $mail_creds = $GLOBALS['mail'];
    $is_local = $GLOBALS['is_local'];
    # First one is giving some file reload issue, else that's the best way.
    #require './lib/PHPMailer/PHPMailerAutoload.php';
    require './lib/PHPMailer/class.phpmailer.php';
    require './lib/PHPMailer/class.pop3.php';
    require './lib/PHPMailer/class.smtp.php';

    $mail = new PHPMailer;
    //echo "<pre>";
    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    if($is_local){
        $mail->isSMTP(); 
    }                                     // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $mail_creds->username;                 // SMTP username
    $mail->Password = $mail_creds->pass;                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable tls encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to 587 / 465

    $mail->setFrom($mail_creds->username, $name);
    $mail->addAddress('senapati.jyotirmay@gmail.com', 'Jyotirmay');     // Add a recipient
    $mail->addAddress('contact@jyotirmays.com', 'jmsdotcom');               // Name is optional
    $mail->addReplyTo($email, 'Reply');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //$mail->addAttachment('../file/My_resume.pdf', 'My Resume');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = "Accessor Detail";
    $mail->Body    = $message;
    $mail->AltBody = $message;

    if(!$mail->send()) {
        echo 'Message could not be sent. Some issue!- Error code - 3';
        //echo 'Mailer Error: ' . $mail->ErrorInfo;
        return;
    }
    //echo "</pre>";
}

?>