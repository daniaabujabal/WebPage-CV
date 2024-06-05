<?php 
require 'includes/auth.php';
$Auth->adminLoginStatus();

include 'includes/header.php';

if(isset($_POST['update'])) {

    if($_POST['Password'] == $_POST['cPassword']){
    
    $email = $_POST["email"];
    $Password = $_POST["Password"];
    
    $sqlQuery = "UPDATE user SET email= '".$email."', password= '".md5($Password)."' WHERE  id = '".$_SESSION["adminUserid"]."'";	
    
    $message = $Auth->setData($sqlQuery);
    } else {
        $message = "Confirm Password Does not match";
    }


    }
	

    $data = $Auth->getData("SELECT * FROM user WHERE id = '".$_SESSION["adminUserid"]."'");
    foreach ($data as $row)

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Setting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Setting</li>
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
                    <div class="card-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>" placeholder="Enter email">
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="Password" class="form-control" placeholder="Enter Password">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="cPassword" class="form-control" placeholder="Enter Confirm Password">
                                </div>
                            </div>
                        </div>

                   
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
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