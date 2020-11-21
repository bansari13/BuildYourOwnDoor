<?php include('db.php'); ?>
<?php include('Header.php'); ?>

<section class="user-profile">
        <div class="container">
            <div class="row">
                <div class="col-sm-offset-2 col-sm-8">
                    <h1 class="text-center">Edit Details</h1>
                    <br /><br />
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea type="text" class="form-control" placeholder="Address"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="send text-center">
                                    <button type="submit" class="contactbtn">Edit Details</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php include('Footer.php'); ?>