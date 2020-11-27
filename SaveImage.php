<?php include('db.php'); ?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php

$img = $_POST['img'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$imageName=uniqid() . '.png';
$file = 'images/FullFrames/' . $imageName;
$_SESSION['CurrentDesign'] = $imageName;
$CurrentCustomerID=$_SESSION['CustomerID'];
$query = "INSERT INTO Enquiries (Image,CustomerID) values ('$imageName','$CurrentCustomerID')";
mysqli_query($conn, $query);
$success = file_put_contents($file, $data);
print $success ? $_SESSION['CurrentDesign'] : 'Unable to save the file.';
?>