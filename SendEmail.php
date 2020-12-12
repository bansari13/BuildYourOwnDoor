<?php include('db.php'); ?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
//require_once 'PHPMailer.php';
//
//$email = new PHPMailer();
//$email->SetFrom($_SESSION["CustomerEmail"], $_SESSION["CustomerName"]); //Name is optional
//$email->Subject = 'Message Subject';
//$email->Body = 'Message Body';
//$email->AddAddress('bs13101995@gmail.com');
//
//$file_to_attach = 'images/FullFrames/'.$_SESSION['CurrentDesign'];
//
//$email->AddAttachment($file_to_attach, $_SESSION['CurrentDesign'].'.png');
//
//return $email->Send();

$from_mail=$_SESSION["CustomerEmail"];
$from_name=$_SESSION["CustomerName"];
$replyto=$_SESSION["CustomerEmail"];
$file = 'images/FullFrames/'.$_SESSION['CurrentDesign'];
$content = file_get_contents( $file);
$content = chunk_split(base64_encode($content));
$uid = md5(uniqid(time()));
$name = basename($file);

// header
$header = "From: ".$from_name." <".$from_mail.">\r\n";
$header .= "Reply-To: ".$replyto."\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

// message & attachment
$nmessage = "--".$uid."\r\n";
$nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
$nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$nmessage .= $message."\r\n\r\n";
$nmessage .= "--".$uid."\r\n";
$nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
$nmessage .= "Content-Transfer-Encoding: base64\r\n";
$nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
$nmessage .= $content."\r\n\r\n";
$nmessage .= "--".$uid."--";

if (mail($mailto, $subject, $nmessage, $header)) {
    return true; // Or do something here
} else {
  return false;
}
?>