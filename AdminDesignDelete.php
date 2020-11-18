<?php include('db.php'); ?>
<?php include('AdminHeader.php'); ?>
<?php

global $CurrentFile;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM Door WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $query = "DELETE FROM Designs WHERE DoorID=$id";
    $result = mysqli_query($conn, $query);
    $query = "DELETE FROM FullDoor WHERE DoorID=$id";
    $result = mysqli_query($conn, $query);
}
echo("<script>location.href='AdminDesignList.php'</script>");
exit();
?>

