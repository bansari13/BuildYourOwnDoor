<?php include('db.php'); ?>
<?php

if (isset($_POST['Login'])) {

    if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response'] != NULL)
        $captcha = $_POST['g-recaptcha-response'];

    if (!$captcha) {
        echo "<script type='text/javascript'>alert('Please verify the captcha');</script>";
    } else {
        $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lfnz-QZAAAAAGbEurwQKDQN0IbD6QPdmZ8MDKA3&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']), true);
        if ($response['success'] == false) {
            echo "<script type='text/javascript'>alert('System is not able to identify you as a Human please retry.');</script>";
        } else {
            ini_set('display_errors', 1);
            error_reporting(E_ALL);

            $LEmail = $_POST['LEmail'];
            $LPassword = $_POST['LPassword'];

            $query = "SELECT * FROM Customers WHERE Email='$LEmail'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) >= 1) {
                $row = mysqli_fetch_array($result);
                $Email = $row['Email'];
                $Password = $row['Password'];

                if ($Email == $LEmail && $Password == $LPassword) {
                    session_start();
                    // Set session variables
                    $_SESSION["CustomerID"] = $row["ID"];
                    $_SESSION["CustomerName"] = $row["Name"];
                    $_SESSION["CustomerEmail"] = $row['Email'];
                    echo("<script>location.href='CreateDoor.php'</script>");
                } else {
                    echo "<script type='text/javascript'>alert('Email or Password is incorrect.');</script>";
                    echo("<script>location.href='index.php'</script>");
                }
            } else {
                echo "<script type='text/javascript'>alert('No User found with this Email. Please register yourself first');</script>";
                echo("<script>location.href='index.php'</script>");
            }
        }
    }
}
?>

