<?php
function phpmail($to, $from, $subject, $message, $attr = null) {
	require_once('PHPMailer/class.phpmailer.php');
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	//$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = "smtpout.asia.secureserver.net";
	$mail->Port = 3535; // or465, 587
	$mail->IsHTML(true);
	$mail->Username = "mail@jyotirmaysenapati.com";
	$mail->Password = "Shaan@123.";
	$mail->SetFrom($from);
	$mail->Subject = $subject;
	$mail->Body = $message;
	$mail->AddAddress($to);
	if(!$mail->Send())
	{
		return "Mailer Error: " . $mail->ErrorInfo;
	}
	else
	{
		return "Message has been sent";
	}
}

function updatecustomercount() {
	global $jdb;
	mysqli_query($jdb, 'update site_prop set count = count + 1');
}