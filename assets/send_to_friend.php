<?php
if(!$_POST) exit;

$name    = $_POST['name'];
$email   = $_POST['email'];
$phone   = $_POST['phone'];
$message = $_POST['message'];

if(trim($name) == '') {
	echo '<div style="background-color:#A9A9A9;height:60px;font-size:20px;color:#EEC900"> You must enter your Name.</div>';
	exit();
} else if(trim($email ) == '') {
	echo '<div  style="background-color:#A9A9A9;height:60px;font-size:20px;color:#EEC900">You must enter your E-email</div>';
	exit();
} 

require '../phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                    	// Set mailer to use SMTP
$mail->Host = 'mfdc.biz';  					// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               	// Enable SMTP authentication
$mail->Username = 'smtp@mfdc.biz';                		 	// SMTP username
$mail->Password = 'MVDnyycMZISZ';                          // SMTP password
//$mail->SMTPSecure = 'tls';                            	// Enable encryption, 'ssl' also accepted

$mail->From = 'smtp@mfdc.biz';
$mail->FromName = 'FitPA';
$mail->addAddress($email, $name);     	// Add a recipient

$mail->WordWrap = 50;                                 	// Set word wrap to 50 characters
$mail->isHTML(true);                                  	// Set email format to HTML

$mail->Subject = "FitPA INFO";
$mail->Body    ="Phone is:".$phone."Message:".$message."";

if(!$mail->send()) {
	echo "<div id='error_page' style='padding:20px;background-color:#A9A9A9;font-size:20px;height:60px;color:#EEC900'>";
	echo "<strong >Email Sent Failed.</strong>";
	echo "</div>";
} else {
	echo "<div id='success_page' style='padding:20px;background-color:#A9A9A9;font-size:20px;height:60px;color:lightgreen'>";
	echo "<strong >Email Sent Success.</strong>";
	echo "</div>";
}




?>