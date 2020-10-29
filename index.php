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
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name *" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Email *" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Phone *" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea type="text" class="form-control" placeholder="Address *"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="send text-center">
                                            <a class="contactbtn" href="CreateDoor.php">Register Now</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="signin">
                            <div class="row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Email *" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Password *" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="send text-center">
                                        <button type="submit" class="contactbtn">Login Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>