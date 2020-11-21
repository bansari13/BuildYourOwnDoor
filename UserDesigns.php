<?php include('db.php'); ?>
<?php include('Header.php'); ?>

<section class="design-gallery">
    <div class="container">
        <h1 class="text-center">Saved Design's</h1>
        <br /><br />
        <div class="row">
            <?php
            $id = $_SESSION['CustomerID'];
            $query = "SELECT * FROM Enquiries where CustomerID=$id";
            $result_tasks = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result_tasks)) {
                ?>
                <div class="col-sm-4">
                    <div class="design-img">
                        <a href="#">
                            <img src="images/<?php echo $row['Image']; ?>" class="img-responsive" alt="Image" />
                        </a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<?php include('Footer.php'); ?>