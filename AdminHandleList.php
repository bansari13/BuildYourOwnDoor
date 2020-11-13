<?php include('db.php'); ?>
<?php include('AdminHeader.php'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Handle Management
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item">Handles</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">View Handle</h3>
                        <a class="btn btn-info btn-rounded" href="AdminHandleAdd.php">Create New</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM Handles";
                                    $result_tasks = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_assoc($result_tasks)) {
                                        ?>

                                        <tr>
                                            <td><?php echo $row['Name']; ?></td>
                                            <td><img class="img-responsive" style="height: 15%;" src="images/Handles/<?php echo $row['Image']; ?>"></td>

                                            <td>
                                                <a href="AdminHandleEdit.php?id=<?php echo $row['ID'] ?>" class="btn btn-secondary">
                                                    <i class="fas fa-marker"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="AdminHandleDelete.php?id=<?php echo $row['ID'] ?>" class="btn btn-secondary">
                                                    <i class="fas fa-trash"></i>
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