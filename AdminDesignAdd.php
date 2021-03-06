<?php include('db.php'); ?>
<?php include('AdminHeader.php'); ?>
<?php
if (isset($_POST['update'])) {

    $extensions = array("png");

    //Insert the Door First
    $title = $_POST['Name'];
    $query = "INSERT INTO Door (Name) values ('$title')";
    mysqli_query($conn, $query);
    $DoorID = mysqli_insert_id($conn);

    //Double Flat Top Design
    if (isset($_FILES['DFlatTopDesign'])) {
        $errors = array();
        $file_name = $_FILES['DFlatTopDesign']['name'];
        $file_size = $_FILES['DFlatTopDesign']['size'];
        $file_tmp = $_FILES['DFlatTopDesign']['tmp_name'];
        $file_type = $_FILES['DFlatTopDesign']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['DFlatTopDesign']['name'])));

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $newfilename = time() . uniqid(rand()) . '.' . $file_ext;
            move_uploaded_file($file_tmp, "images/Designs/" . $newfilename);
            $ReminderText = $_POST['DFlatTopReminderText'];
            $query = "INSERT INTO Designs (FrameID,Image,ReminderText,DoorID) values ('1','$newfilename','$ReminderText','$DoorID')";
            mysqli_query($conn, $query);
            echo "Success";

            //Insert the Full Frame with Design
            if (isset($_FILES['DFlatTopFull'])) {
                $errors = array();
                $file_name = $_FILES['DFlatTopFull']['name'];
                $file_size = $_FILES['DFlatTopFull']['size'];
                $file_tmp = $_FILES['DFlatTopFull']['tmp_name'];
                $file_type = $_FILES['DFlatTopFull']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['DFlatTopFull']['name'])));

                if (in_array($file_ext, $extensions) === false) {
                    $errors[] = "extension not allowed, please choose a PNG file.";
                }

                if ($file_size > 2097152) {
                    $errors[] = 'File size must be excately 2 MB';
                }

                if (empty($errors) == true) {
                    $newfilename = time() . uniqid(rand()) . '.' . $file_ext;
                    move_uploaded_file($file_tmp, "images/FullFrames/" . $newfilename);

                    $query = "INSERT INTO FullDoor (FrameID,DoorID,Image) values ('1','$DoorID','$newfilename')";
                    mysqli_query($conn, $query);
                    echo "Success";
                } else {
                    print_r($errors);
                }
            }
        } else {
            print_r($errors);
        }
    }

    //Double Round Top Design
    if (isset($_FILES['DRoundTopDesign'])) {
        $errors = array();
        $file_name = $_FILES['DRoundTopDesign']['name'];
        $file_size = $_FILES['DRoundTopDesign']['size'];
        $file_tmp = $_FILES['DRoundTopDesign']['tmp_name'];
        $file_type = $_FILES['DRoundTopDesign']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['DRoundTopDesign']['name'])));

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $newfilename = time() . uniqid(rand()) . '.' . $file_ext;
            move_uploaded_file($file_tmp, "images/Designs/" . $newfilename);
            $ReminderText = $_POST['DRoundTopReminderText'];
            $query = "INSERT INTO Designs (FrameID,Image,ReminderText,DoorID) values ('3','$newfilename','$ReminderText','$DoorID')";
            mysqli_query($conn, $query);
            echo "Success";

            //Insert the Full Frame with Design
            if (isset($_FILES['DRoundTopFull'])) {
                $errors = array();
                $file_name = $_FILES['DRoundTopFull']['name'];
                $file_size = $_FILES['DRoundTopFull']['size'];
                $file_tmp = $_FILES['DRoundTopFull']['tmp_name'];
                $file_type = $_FILES['DRoundTopFull']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['DRoundTopFull']['name'])));

                if (in_array($file_ext, $extensions) === false) {
                    $errors[] = "extension not allowed, please choose a PNG file.";
                }

                if ($file_size > 2097152) {
                    $errors[] = 'File size must be excately 2 MB';
                }

                if (empty($errors) == true) {
                    $newfilename = time() . uniqid(rand()) . '.' . $file_ext;
                    move_uploaded_file($file_tmp, "images/FullFrames/" . $newfilename);

                    $title = $_POST['Name'];
                    $query = "INSERT INTO FullDoor (FrameID,DoorID,Image) values ('3','$DoorID','$newfilename')";
                    mysqli_query($conn, $query);
                    echo "Success";
                } else {
                    print_r($errors);
                }
            }
        } else {
            print_r($errors);
        }
    }

    //Double Eyebrow Top Design
    if (isset($_FILES['DEyebrowTopDesign'])) {
        $errors = array();
        $file_name = $_FILES['DEyebrowTopDesign']['name'];
        $file_size = $_FILES['DEyebrowTopDesign']['size'];
        $file_tmp = $_FILES['DEyebrowTopDesign']['tmp_name'];
        $file_type = $_FILES['DEyebrowTopDesign']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['DEyebrowTopDesign']['name'])));

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $newfilename = time() . uniqid(rand()) . '.' . $file_ext;
            move_uploaded_file($file_tmp, "images/Designs/" . $newfilename);
            $ReminderText = $_POST['DEyebrowTopReminderText'];
            $query = "INSERT INTO Designs (FrameID,Image,ReminderText,DoorID) values ('2','$newfilename','$ReminderText','$DoorID')";
            mysqli_query($conn, $query);
            echo "Success";

            //Insert the Full Frame with Design
            if (isset($_FILES['DFlatTopFull'])) {
                $errors = array();
                $file_name = $_FILES['DEyebrowTopFull']['name'];
                $file_size = $_FILES['DEyebrowTopFull']['size'];
                $file_tmp = $_FILES['DEyebrowTopFull']['tmp_name'];
                $file_type = $_FILES['DEyebrowTopFull']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['DEyebrowTopFull']['name'])));

                if (in_array($file_ext, $extensions) === false) {
                    $errors[] = "extension not allowed, please choose a PNG file.";
                }

                if ($file_size > 2097152) {
                    $errors[] = 'File size must be excately 2 MB';
                }

                if (empty($errors) == true) {
                    $newfilename = time() . uniqid(rand()) . '.' . $file_ext;
                    move_uploaded_file($file_tmp, "images/FullFrames/" . $newfilename);

                    $query = "INSERT INTO FullDoor (FrameID,DoorID,Image) values ('2','$DoorID','$newfilename')";
                    mysqli_query($conn, $query);
                    echo "Success";
                } else {
                    print_r($errors);
                }
            }
        } else {
            print_r($errors);
        }
    }

    //Single Flat Top Design
    if (isset($_FILES['SFlatTopDesign'])) {
        $errors = array();
        $file_name = $_FILES['SFlatTopDesign']['name'];
        $file_size = $_FILES['SFlatTopDesign']['size'];
        $file_tmp = $_FILES['SFlatTopDesign']['tmp_name'];
        $file_type = $_FILES['SFlatTopDesign']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['SFlatTopDesign']['name'])));

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $newfilename = time() . uniqid(rand()) . '.' . $file_ext;
            move_uploaded_file($file_tmp, "images/Designs/" . $newfilename);

            $ReminderText = $_POST['SFlatTopReminderText'];
            $query = "INSERT INTO Designs (FrameID,Image,ReminderText,DoorID) values ('4','$newfilename','$ReminderText','$DoorID')";
            mysqli_query($conn, $query);
            echo "Success";

            //Insert the Full Frame with Design
            if (isset($_FILES['SFlatTopFull'])) {
                $errors = array();
                $file_name = $_FILES['SFlatTopFull']['name'];
                $file_size = $_FILES['SFlatTopFull']['size'];
                $file_tmp = $_FILES['SFlatTopFull']['tmp_name'];
                $file_type = $_FILES['SFlatTopFull']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['SFlatTopFull']['name'])));

                if (in_array($file_ext, $extensions) === false) {
                    $errors[] = "extension not allowed, please choose a PNG file.";
                }

                if ($file_size > 2097152) {
                    $errors[] = 'File size must be excately 2 MB';
                }

                if (empty($errors) == true) {
                    $newfilename = time() . uniqid(rand()) . '.' . $file_ext;
                    move_uploaded_file($file_tmp, "images/FullFrames/" . $newfilename);

                    $query = "INSERT INTO FullDoor (FrameID,DoorID,Image) values ('4','$DoorID','$newfilename')";
                    mysqli_query($conn, $query);
                    echo "Success";
                } else {
                    print_r($errors);
                }
            }
        } else {
            print_r($errors);
        }
    }

    //Single Round Top Design
    if (isset($_FILES['SRoundTopDesign'])) {
        $errors = array();
        $file_name = $_FILES['SRoundTopDesign']['name'];
        $file_size = $_FILES['SRoundTopDesign']['size'];
        $file_tmp = $_FILES['SRoundTopDesign']['tmp_name'];
        $file_type = $_FILES['SRoundTopDesign']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['SRoundTopDesign']['name'])));

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $newfilename = time() . uniqid(rand()) . '.' . $file_ext;
            move_uploaded_file($file_tmp, "images/Designs/" . $newfilename);

            $ReminderText = $_POST['SRoundTopReminderText'];
            $query = "INSERT INTO Designs (FrameID,Image,ReminderText,DoorID) values ('6','$newfilename','$ReminderText','$DoorID')";
            mysqli_query($conn, $query);
            echo "Success";

            //Insert the Full Frame with Design
            if (isset($_FILES['SRoundTopFull'])) {
                $errors = array();
                $file_name = $_FILES['SRoundTopFull']['name'];
                $file_size = $_FILES['SRoundTopFull']['size'];
                $file_tmp = $_FILES['SRoundTopFull']['tmp_name'];
                $file_type = $_FILES['SRoundTopFull']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['SRoundTopFull']['name'])));

                if (in_array($file_ext, $extensions) === false) {
                    $errors[] = "extension not allowed, please choose a PNG file.";
                }

                if ($file_size > 2097152) {
                    $errors[] = 'File size must be excately 2 MB';
                }

                if (empty($errors) == true) {
                    $newfilename = time() . uniqid(rand()) . '.' . $file_ext;
                    move_uploaded_file($file_tmp, "images/FullFrames/" . $newfilename);

                    $query = "INSERT INTO FullDoor (FrameID,DoorID,Image) values ('6','$DoorID','$newfilename')";
                    mysqli_query($conn, $query);
                    echo "Success";
                } else {
                    print_r($errors);
                }
            }
        } else {
            print_r($errors);
        }
    }

    //Single Eyebrow Top Design
    if (isset($_FILES['SEyebrowTopDesign'])) {
        $errors = array();
        $file_name = $_FILES['SEyebrowTopDesign']['name'];
        $file_size = $_FILES['SEyebrowTopDesign']['size'];
        $file_tmp = $_FILES['SEyebrowTopDesign']['tmp_name'];
        $file_type = $_FILES['SEyebrowTopDesign']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['SEyebrowTopDesign']['name'])));

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $newfilename = time() . uniqid(rand()) . '.' . $file_ext;
            move_uploaded_file($file_tmp, "images/Designs/" . $newfilename);

            $ReminderText = $_POST['SEyebrowTopReminderText'];
            $query = "INSERT INTO Designs (FrameID,Image,ReminderText,DoorID) values ('5','$newfilename','$ReminderText','$DoorID')";
            mysqli_query($conn, $query);
            echo "Success";

            //Insert the Full Frame with Design
            if (isset($_FILES['SEyebrowTopFull'])) {
                $errors = array();
                $file_name = $_FILES['SEyebrowTopFull']['name'];
                $file_size = $_FILES['SEyebrowTopFull']['size'];
                $file_tmp = $_FILES['SEyebrowTopFull']['tmp_name'];
                $file_type = $_FILES['SEyebrowTopFull']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['SEyebrowTopFull']['name'])));

                if (in_array($file_ext, $extensions) === false) {
                    $errors[] = "extension not allowed, please choose a PNG file.";
                }

                if ($file_size > 2097152) {
                    $errors[] = 'File size must be excately 2 MB';
                }

                if (empty($errors) == true) {
                    $newfilename = time() . uniqid(rand()) . '.' . $file_ext;
                    move_uploaded_file($file_tmp, "images/FullFrames/" . $newfilename);

                    $query = "INSERT INTO FullDoor (FrameID,DoorID,Image) values ('5','$DoorID','$newfilename')";
                    mysqli_query($conn, $query);
                    echo "Success";
                } else {
                    print_r($errors);
                }
            }
        } else {
            print_r($errors);
        }
    }


    $_SESSION['message'] = 'Updated Successfully';
    $_SESSION['message_type'] = 'warning';

    echo("<script>location.href='AdminDesignList.php'</script>");
    exit();
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Designs Management
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item">Designs Management</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Designs</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">

                                <div class="col-sm-12">
                                    <div class="row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label">Door Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="Name" class="form-control">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">

                                    <label for="example-text-input" class="col-sm-4 col-form-label">Flat Top Single Design</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="SFlatTopDesign" />
                                    </div>
                                </div>

                                <div class="col-sm-6">

                                    <label for="example-text-input" class="col-sm-4 col-form-label">Reminder Text</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="SFlatTopReminderText" class="form-control">
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Flat Top Single Full</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="SFlatTopFull" />
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">

                                <div class="col-sm-6">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Round Top Single Design</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="SRoundTopDesign" />
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Reminder Text</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="SRoundTopReminderText" class="form-control">
                                    </div>

                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Round Top Single Full</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="SRoundTopFull" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-6">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Eyebrow Top Single Design</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="SEyebrowTopDesign" />
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Reminder Text</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="SEyebrowTopReminderText" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Eyebrow Top Single Full</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="SEyebrowTopFull" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-6">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Flat Top Double Design</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="DFlatTopDesign" />
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Reminder Text</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="DFlatTopReminderText" class="form-control">
                                    </div>

                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Flat Top Double Full</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="DFlatTopFull" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-6">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Round Top Double Design</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="DRoundTopDesign" />
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Reminder Text</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="DRoundTopReminderText" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Round Top Double Full</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="DRoundTopFull" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-6">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Eyebrow Top Double Design</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="DEyebrowTopDesign" />
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Reminder Text</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="DEyebrowTopReminderText" class="form-control">
                                    </div>

                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Eyebrow Top Double Full</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="DEyebrowTopFull" />
                                    </div>
                                </div>
                            </div>

                            <br />
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-info" name="update">Submit</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </form>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->
</div>

<?php include('AdminFooter.php'); ?>
