<?php include('db.php'); ?>
<?php
if (isset($_COOKIE["DesignID"])) {
    $query = "SELECT * FROM Designs where ID=" . $_COOKIE["DesignID"];
    $result_tasks = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result_tasks)) {
        if ($row['ReminderText'] != NULL) {
            ?>
            <p class="text-center">Reminder: <?php echo $row['ReminderText']; ?></p>
        <?php } else {
            ?>
            <p class="text-center">Reminder: Please contact Wrought Iron Shop team after designing the door if you require side lights</p>
            <?php
        }
    }
}
?>