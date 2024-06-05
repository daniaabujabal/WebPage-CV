<?php 
require 'includes/auth.php';
$Auth->adminLoginStatus(); 

 // same things mentioned in index file

include 'includes/header.php';

//this is the class when addproduct button is pressed this will add the product details in database
if(isset($_POST['AddProduct'])) {
	$ProductName = $_POST["ProductName"];
	$ProductPrice = $_POST["ProductPrice"];
	$f_type = $_POST["f_type"];
    $ProductDetails = $_POST["ProductDetails"];
    
    $filename1 = $_FILES['ProductFile1']['name'];
    $ext = pathinfo($filename1, PATHINFO_EXTENSION);
    $filename1 = md5(time() . $filename1).'.'.$ext;
    $destination1 = 'productsPhotos/' . $filename1;
    $file1 = $_FILES['ProductFile1']['tmp_name'];
    $move1 = move_uploaded_file($file1, $destination1);
    $sqlQuery = "INSERT INTO products (product_name,product_price,f_type,product_details,file_input_1)
    VALUES ('".$ProductName."','".$ProductPrice."','".$f_type."','".$ProductDetails."','".$filename1."')";	
    
    $message = $Auth->setData($sqlQuery);
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Food</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Food</li>
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
                //this will display any message if any one.
                if(!empty($message)){
                    echo '<h5 style=" text-align: center; margin-top: 1%; color: red; ">' .$message. '</h5>';
                }
                ?>


                <!-- form start -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Food Name</label>
                            <input type="text" name="ProductName" class="form-control" placeholder="Enter Product Name">
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" name="ProductPrice" class="form-control"
                                        placeholder="Enter The Sale Price">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Food Type</label>
                                    <select name="f_type"  class="form-control">
                                        <option selected>Select Food type</option>
                                        <option value="breakfast">Breakfast</option>
                                        <option value="lunch">Lunch</option>
                                        <option value="dinner">Dinner</option>
                                        <option value="desserts">Desserts</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="form-group">
                            <label>Food Details</label>
                            <textarea class="form-control" name="ProductDetails" rows="5"> </textarea>
                        </div>
                        <div class="form-group">
                            <label>File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="ProductFile1"
                                        id="customFileInput">
                                    <label class="custom-file-label">Food Photo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" name="AddProduct" class="btn btn-primary">Submit</button>
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