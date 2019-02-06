<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require 'PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "hafood.tunisie@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "hafoodtunisie";
//Set who the message is to be sent from
$mail->setFrom('hafood.tunisie@gmail.com', "Ha'food");
//Set an alternative reply-to address
$mail->addReplyTo('hafood.tunisie@gmail.com', 'samih layeb');
//Set who the message is to be sent to
$mail->addAddress($_POST['email'], 'Selim mattar');
//Set the subject line
$mail->Subject = "Ha'Food";
$mail->Body    = $_POST['message'];
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file

//send the message, check for errors
if (!$mail->send()) {

    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";


}
echo "<meta http-equiv='refresh' content=\"0; url=index.php?controller=reclamation&action=index\">";
