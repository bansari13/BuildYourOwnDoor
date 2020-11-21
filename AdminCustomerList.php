<?php include('db.php'); ?>
<?php include('AdminHeader.php'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Customer Management
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item">Customers</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">View Customer</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM Customers";
                                    $result_tasks = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_assoc($result_tasks)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['Name']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td><?php echo $row['Phone']; ?></td>
                                            
                                            <td>
                                                <a href="AdminEnquiries.php?id=<?php echo $row['ID'] ?>" class="btn btn-secondary">
                                                    View Enquiries
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<?php include('AdminFooter.php'); ?>