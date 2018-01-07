<?php
require_once "../config.php";
if(isset($_POST)){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $time = time();
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill all the fields in the form to contact.";
        return;
    } else {
        $name = strip_tags($name);
        $email = strip_tags($email);
        $message = strip_tags($message);
        $db = mysqli_connect($local->host, $local->user, $local->pass);
        if($db) {
            mysqli_select_db($db, $local->select_db);
        } else {
            echo "<span style='color: red;'>Cannot contact now, some issue!- Error code - 1</span>\n";
            return;
        }
        
        $sql = "INSERT INTO contacted (name, email, message, timecreated) VALUES ('$name', '$email', '$message', $time)";
        if(mysqli_query($db, $sql)) {
            mysqli_close($db);
            send_mail($name, $email, $message);
            echo "success";
            return;
        } else {
            mysqli_close($db);
            echo "Cannot contact now, some issue!- Error code - 2";
            return;
        }
    }
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
    $mail->isHTML(true);                                       // Set email format to HTML

    $mail->Subject = "$email contact you";
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
?>