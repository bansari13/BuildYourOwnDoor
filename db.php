<?php
session_start();
$conn = mysqli_connect(
  'localhost',
  'root',
  'root',
  'wroughtirondb'
) or die(mysqli_erro($mysqli));
?>