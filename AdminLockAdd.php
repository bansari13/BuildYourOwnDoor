<?php include('db.php'); ?>
<?php include('AdminHeader.php'); ?>
<?php
if (isset($_POST['update'])) {

    if (isset($_FILES['image'])) {
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

        $extensions = array("png");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $newfilename = time() . uniqid(rand()) . '.' . $file_ext;
            move_uploaded_file($file_tmp, "images/Locks/" . $newfilename);
            echo "Success";
        } else {
            print_r($errors);
        }
    }


    $title = $_POST['Name'];
    $query = "INSERT INTO Locks (Name,Image) values ('$title','$newfilename')";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Updated Successfully';
    $_SESSION['message_type'] = 'warning';

    echo("<script>location.href='AdminLockList.php'</script>");
    exit();
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lock Management
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item">Lock Management</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Locks</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">

                                <div class="col-sm-12">
                                    <div class="row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="Name" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <br>

                                <div class="col-sm-12">
                                    <div class="row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label">Image</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="image" />
                                        </div>
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
