<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$sessionValue = $_SESSION['Name'];
if (!isset($sessionValue)) {
    echo("<script>location.href='AdminLogin.php'</script>");
    exit();
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width" />
        <title>Admin</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="images/favicon.ico">
        <title>Admin - Dashboard</title>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
        <link href="css/Admin/bootstrap.css" rel="stylesheet" />
        <link href="css/Admin/site_1.css" rel="stylesheet" type="text/css"/>
        <link href="css/Admin/richtext.min.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap extend-->
        <link href="css/Admin/bootstrap-extend.css" rel="stylesheet" type="text/css"/>

        <!-- Morris charts -->
        <link href="css/Admin/morris.css" rel="stylesheet" />

        <!-- Chartist-->
        <link href="css/Admin/chartist.css" rel="stylesheet" />

        <!-- weather weather -->
        <link href="css/Admin/weather-icons.css" rel="stylesheet" />

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
    <body class="hold-transition skin-purple sidebar-mini layout-boxed">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="index-2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <b class="logo-mini">
                        <span class="light-logo"><img src="images/logo-light.png" alt="logo"></span>
                        <span class="dark-logo"><img src="images/logo-dark.png" alt="logo"></span>
                    </b>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">
                        <img src="images/logo-light-text.png" alt="logo" class="light-logo">
                        <img src="images/logo-dark-text.png" alt="logo" class="dark-logo">
                    </span>
                </a>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <!-- User Account -->
                            <li class="dropdown user user-menu">
                                <a href="/AdminLogin.php" class="dropdown-toggle">Logout
                                </a>

                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="ulogo">
                            <a href="index-2.html">
                                <!-- logo for regular state and mobile devices -->
                                <span><b>Admin</b></span>
                            </a>
                        </div>
                        <div class="image">
                            <img src="images/logo.png" class="" alt="User Image" style="
                                 max-width: 92%;
                                 ">
                        </div>

                    </div>
                    <!-- sidebar menu -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="nav-devider"></li>


                        <li>
                            <a href="AdminDesignList.php">
                                <i class="fa fa-book"></i>
                                <span>Door Designs</span>
                            </a>
                        </li>
                        <li>
                            <a href="AdminHandleList.php">
                                <i class="fa fa-book"></i>
                                <span>Handles</span>
                            </a>
                        </li>
                        <li>
                            <a href="AdminLockList.php">
                                <i class="fa fa-book"></i>
                                <span>Locks</span>

                            </a>
                        </li>
                    </ul>

                </section>
            </aside>