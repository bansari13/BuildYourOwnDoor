<?php
if (isset($_POST['btnSubmit'])) {
    $txtName = $_POST['txtNameNew'];
    $txtPassword = $_POST['txtPassword'];
//    echo "<script type='text/javascript'>alert('$txtName : $txtPassword');</script>";
//    $_SESSION["Name"] = "True";
//    echo("<script>location.href='AdminDashboard.php'</script>");
    if ($txtName === "Admin" && $txtPassword === "Admin") {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Storing session data
        $_SESSION['Name'] = $txtName;
        $_SESSION['Password'] = $txtPassword;
        echo("<script>location.href='AdminDesignList.php'</script>");
        exit();
    } else {
        echo("<script>location.href='AdminLogin.php'</script>");
        exit();
    }
}
?>
<html>


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="images/favicon.ico">

        <title>Wrought Iron Shop - Log in </title>

        <!-- Bootstrap 4.0-->
        <link href="css/Admin/bootstrap_v4.css" rel="stylesheet" />

        <!-- Bootstrap extend-->
        <link href="css/Admin/bootstrap-extend.css" rel="stylesheet" type="text/css"/>
        <!-- theme style -->
        <link href="css/Admin/master_style.css" rel="stylesheet" />

        <!-- Lion_admin skins -->
        <link href="css/Admin/_all-skins.css" rel="stylesheet" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="hold-transition bg-img" style="background-image: url(images/1.jpg)" data-overlay="4">

        <div class="container h-p100">
            <div class="row align-items-center justify-content-md-center h-p100">

                <div class="col-lg-8 col-md-11 col-12">
                    <div class="row align-items-center justify-content-md-center h-p100" data-overlay-light="9">
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="p-40 text-center content-bottom">
                                <img src="images/logo.png" class="b-2 p-10 border-dark" alt="" />

                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-12">
                            <div class="p-20 content-bottom">
                                <div class="content-top-agile">
                                    <h2>Get started with Us</h2>
                                    <p class="text-fade">Sign in to start your session</p>
                                </div>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" id="txtNameNew" name="txtNameNew" class="form-control" placeholder="Username">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-danger border-danger"><i class="ti-user"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Password">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-danger border-danger"><i class="ti-lock"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <!-- /.col -->
                                        <div class="col-12 text-center">
                                            <input type="submit" name="btnSubmit" class="btn btn-danger btn-block margin-top-10" value="SIGN IN"/>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>			


                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </div>


        <!-- /.login-box -->

        <script src="js/Admin/jquery-1.10.2.min.js" type="text/javascript"></script>

        <!-- popper -->
        <script src="js/Admin/popper.min.js"></script>

        <!-- Bootstrap 4.0-->
        <script src="js/Admin/bootstrap.js"></script>

    </body>

    <!-- Mirrored from lion-admin-templates.multipurposethemes.com/lion-admin/boxed-dashboard/pages/samplepage/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jun 2019 03:21:12 GMT -->
</html>