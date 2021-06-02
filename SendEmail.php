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

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
    
$subject = "Customer Enquiry";
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
$nmessage .= $nmessage."\r\n\r\n";
$nmessage .= "--".$uid."\r\n";
$nmessage .= "Content-Type: application/octet-stream; name=\"".$name."\"\r\n";
$nmessage .= "Content-Transfer-Encoding: base64\r\n";
$nmessage .= "Content-Disposition: attachment; filename=\"".$name."\"\r\n\r\n";
$nmessage .= $content."\r\n\r\n";
$nmessage .= "--".$uid."--";

$mailto='bs13101995@gmail.com';
if (mail($mailto, $subject, $nmessage, $header)) {
    $message = "We got your details.Please wait for a response from our end.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    return true; // Or do something here
} else {
    echo "<script type='text/javascript'>alert('Failed');</script>";
  return false;
}
?>