<?php include('db.php'); ?>
<?php include('Header.php'); ?>
<?php
if (isset($_SESSION['CustomerID'])) {
    $id = $_SESSION['CustomerID'];
    $query = "SELECT * FROM Customers WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $Name = $row['Name'];
        $Email = $row['Email'];
        $Phone = $row['Phone'];
        $Address = $row['Address'];
        $Password = $row['Password'];
    }
}

if (isset($_POST['contactbtn'])) {

    $id = $_SESSION['CustomerID'];
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $address = $_POST['Address'];
    $password = $_POST['Password'];
    $query = "UPDATE Customers set Name= '$name',Email='$email',Phone='$phone',Address='$address',Password='$password' WHERE id=$id";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Updated Successfully';
    $_SESSION['message_type'] = 'warning';


    echo("<script>alert('Information Updated')</script>");
}
?>
<br><br>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-offset-2 col-sm-8">
                    <div class="user-profile">
                    <h1 class="text-center">Edit Details</h1>
                    <br /><br />
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name" name="Name"  value="<?php echo $Name; ?>" required/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email" name="Email" value="<?php echo $Email; ?>" required/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone" name="Phone" value="<?php echo $Phone; ?>" required/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="Password" value="<?php echo $Password; ?>" required />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea type="text" class="form-control" placeholder="Address" name="Address" value="<?php echo $Address; ?>"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="send text-center">
                                    <button type="submit" class="contactbtn" name="contactbtn">Edit Details</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php include('Footer.php'); ?>