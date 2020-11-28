<?php include('db.php'); ?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php

require_once 'PHPMailer/class.phpmailer.php';


$email = new PHPMailer();
$email->SetFrom($_SESSION["CustomerEmail"], $_SESSION["CustomerName"]); //Name is optional
$email->Subject = 'Message Subject';
$email->Body = 'Message Body';
$email->AddAddress('bs13101995@gmail.com');

$file_to_attach = 'images/FullFrames/'.$_SESSION['CurrentDesign'];

$email->AddAttachment($file_to_attach, $_SESSION['CurrentDesign'].'.png');

return $email->Send();
?>