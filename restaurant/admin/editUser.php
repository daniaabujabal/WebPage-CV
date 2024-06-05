<?php 
require 'includes/auth.php';
$Auth->adminLoginStatus();


include 'includes/header.php';

if(isset($_POST['Update'])) {

    $sqlQuery = "UPDATE user SET name = '".$_POST["name"]."', contact = '".$_POST["contact"]."', address = '".$_POST["address"]."', email = '".$_POST["email"]."', password = '".md5($_POST["password"])."', status = '".$_POST["status"]."', type = '".$_POST["type"]."' WHERE id = '".$_POST["id"]."' ";
     $message = $Auth->setData($sqlQuery);
    }

    $data = $Auth->getData("SELECT * FROM user WHERE id = '".$_POST['id']."' LIMIT 1");
    foreach ($data as $row);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">

            <?php
                if(!empty($message)){
                    echo '<h5 style=" text-align: center; margin-top: 1%; color: red; ">' .$message. '</h5>';
                }
                ?>

                <!-- form start -->
                <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id"  value="<?php echo $row['id'] ?>">

                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $row['name'] ?>" placeholder="Enter Name">
                        </div>
                        <div class="form-row">
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" name="contact" class="form-control" value="<?php echo $row['contact'] ?>" placeholder="Enter Contact Number">
                                </div>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea  class="form-control" rows="5" name="address">
                                <?php echo $row['address'] ?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $row['email'] ?>" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label>password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $row['password'] ?>" placeholder="Enter Password">
                        </div>

                        <div class="form-group">
                        <label>Status</label>
                        <div class="form-check">
                             <input class="form-check-input" name="status" type="radio" value="active" <?php if($row['status'] == 'active') echo 'checked'; ?>  >
                            <label class="form-check-label">
                             Active
                            </label>
                        </div>
                        <div class="form-check">
                             <input class="form-check-input" name="status" type="radio" value="blocked" <?php if($row['status'] == 'blocked') echo 'checked'; ?> >
                            <label class="form-check-label">
                             Blocked
                            </label>
                        </div>
                        </div>

                        <div class="form-group">
                        <label>Type</label>
                        <div class="form-check">
                             <input class="form-check-input" name="type" type="radio" value="user" <?php if($row['type'] == 'user') echo 'checked'; ?>  >
                            <label class="form-check-label">
                            User
                            </label>
                        </div>
                        <div class="form-check">
                             <input class="form-check-input" name="type" type="radio" value="admin" <?php if($row['type'] == 'admin') echo 'checked'; ?> >
                            <label class="form-check-label">
                              Admin
                            </label>
                        </div>
                        </div>
                    
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" name="Update" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php 
include 'includes/footer.php';
?>