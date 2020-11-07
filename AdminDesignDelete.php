<?php include('db.php'); ?>
<?php include('AdminHeader.php'); ?>
<?php

global $CurrentFile;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM portfolio WHERE id=$id";
    $result = mysqli_query($conn, $query);
}
echo("<script>location.href='AdminPortfolioList.php'</script>");
exit();
?>

