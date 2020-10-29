<?php
session_start();
$conn = mysqli_connect(
  'localhost',
  'root',
  'root',
  'buildyourowndoor'
) or die(mysqli_erro($mysqli));
?>