<?php include('db.php'); ?>
<?php
if (isset($_POST['Register'])) {

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

            $RName = $_POST['RName'];
            $RPhone = $_POST['RPhone'];
            $REmail = $_POST['REmail'];
            $RPassword = $_POST['RPassword'];
            $RAddress = $_POST['RAddress'];

            $query = "SELECT * FROM Customers WHERE Email='$REmail'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) == 0) {
                $query = "INSERT INTO Customers (Name,Email,Phone,Password,Address) values ('$RName','$REmail','$RPhone','$RPassword','$RAddress')";
                mysqli_query($conn, $query);
                $CustomerID = mysqli_insert_id($conn);
                session_start();
                // Set session variables
                $_SESSION["CustomerID"] = $CustomerID;
                $_SESSION["CustomerName"] = $RName;
                $_SESSION["CustomerEmail"] = $REmail;
                
                $thankyouTemplate = file_get_contents("mailtemplates/Thankyou-Register.html");
                $thankyouTemplate = str_replace('_NAME_', $RName, $thankyouTemplate);

                $email = $REmail;
                $thankHeaders = "From:" . $to . "\n" .
                        'MIME-Version: 1.0' . "\n" .
                        'Content-type: text/html; charset=iso-8859-1' . "\n" .
                        "X-Mailer: PHP";
                mail($email, "Registration Email", $thankyouTemplate, $thankHeaders);
                echo("<script>location.href='CreateDoor.php'</script>");
            } else {
                echo "<script type='text/javascript'>alert('This Email ID is already registered.');</script>";
            }
        }
    }
}
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Wroughtiron Shop</title>
        <link href="images/favicon.ico" type="image/png" rel="shortcut icon" />
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/base.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="js/html5shiv.min.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-bg">
        <!--Navigation-->
        <div class="navigation wow fadeIn">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <a href="index.html" class="logo">
                            <img src="images/logo.png" class="img-responsive" alt="Company Logo" />
                        </a>
                    </div>
                    <!--<div class="col-md-offset-5 col-md-4 col-sm-offset-4">
                        <div class="nav-links">
                            <a href="product-listing.html">Our Products</a>
                            <a href="about-us.aspx">About Us</a>
                        </div>
                    </div>-->
                    <label>
                        <input type='checkbox'>
                        <span class='menu wow fadeIn'><span class='hamburger'></span></span>
                        <ul>
                            <li><a href='https://www.wroughtironshop.com.au/'>Back to Website</a> </li>
                            <li><a href="index.php">Home</a></li>
                            <li><a href='UserProfile.php'>My Profile</a> </li>
                            <li><a href="index.php">Login</a></li>
                        </ul>
                    </label>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-offset-2 col-sm-8">
                    <div class="book-box wow fadeInUp">
                        <div class="center-block">
                            <ul class="nav nav-pills">
                                <li role="presentation" class="active"><a href="#signup" data-toggle="tab">Sign Up</a></li>
                                <li role="presentation"><a href="#signin" data-toggle="tab">Sign In</a></li>
                            </ul>
                        </div>

                        <div class="tab-content">

                            <div class="tab-pane active" id="signup">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Name" name="RName" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Email" name="REmail" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Phone" name="RPhone" required/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Password" name="RPassword" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea type="text" class="form-control" placeholder="Address" name="RAddress"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="6Lfnz-QZAAAAAAicmZjS3ATnkZxXcWKGH-6yPRmA"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="send text-center">
                                                <button type="submit" class="contactbtn" name="Register">Register Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>


                            <div class="tab-pane fade" id="signin">
                                <form action="Login.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-offset-3 col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Email" name="LEmail" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" placeholder="Password" name="LPassword" required/>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="g-recaptcha" data-sitekey="6Lfnz-QZAAAAAAicmZjS3ATnkZxXcWKGH-6yPRmA"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="send text-center">
                                                <button type="submit" class="contactbtn" name="Login">Login Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>