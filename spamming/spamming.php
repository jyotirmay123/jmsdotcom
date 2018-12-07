<?php
require_once "config.php";

send_mail("Jyotirmay Senapati", 'senapati.jyotirmay@gmail.com', "Hi, </br>I am Jyotirmay Senapati with matriker num: 3692446.

I am looking for something permanent and not temporary sublet room. Please don't send any temporary offer to me. As people come later than me and register later than me are getting room easily. I am also looking for a permanent room like them. Recently, got to know about one more person, who joined with me and register on your portal on February, 2017 got a room in studentenstadt, where as I register on January, 2017, also for studentenstadt and still waiting. This is a classic example of skipping people and giving room to whoever you want. Please please please, don't do that. please give me a permanent room.

Thank you.</br> Jyotirmay Senapati,</br> TUM.");

function send_mail($name, $email, $message) {
    $mail_creds = $GLOBALS['mail'];
    $is_local = $GLOBALS['is_local'];
    # First one is giving some file reload issue, else that's the best way.
    #require './lib/PHPMailer/PHPMailerAutoload.php';
    require 'lib/PHPMailer/class.phpmailer.php';
    require 'lib/PHPMailer/class.pop3.php';
    require 'lib/PHPMailer/class.smtp.php';

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
    $mail->addAddress('wrv@stwm.de');               // Name is optional
    $mail->addReplyTo($email, 'Reply');
    $mail->addCC('katharina.schulz@stwm.de');
    $mail->addCC('heidi.bader@stwm.de');
    //$mail->addBCC('bcc@example.com');

    //$mail->addAttachment('../file/My_resume.pdf', 'My Resume');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                       // Set email format to HTML

    $mail->Subject = "Looking for a permanent room urgently and not a temporary sublet.";
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