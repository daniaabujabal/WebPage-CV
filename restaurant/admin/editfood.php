<?php 
require 'includes/auth.php';
$Auth->adminLoginStatus();

// same information
include 'includes/header.php';

//this will call when admin click update product the will all the updated data in database
if(isset($_POST['UpdateProduct'])) {

    $filename1 = $_FILES['ProductFile1']['name'];
    $ext = pathinfo($filename1, PATHINFO_EXTENSION);
    $filename1 = md5(time() . $filename1).'.'.$ext;
    $destination1 = 'productsPhotos/' . $filename1;
    $file1 = $_FILES['ProductFile1']['tmp_name'];
    $move1 = move_uploaded_file($file1, $destination1);



        if(!empty($_FILES['ProductFile1']['name'])){
            $sqlQuery = "UPDATE products SET product_name = '".$_POST["ProductName"]."', product_price = '".$_POST["ProductPrice"]."', f_type = '".$_POST["f_type"]."', product_details = '".$_POST["ProductDetails"]."', file_input_1 = '".$filename1."' WHERE id = '".$_POST["id"]."' ";
            $message = $Auth->setData($sqlQuery);
        } else {
            $sqlQuery = "UPDATE products SET product_name = '".$_POST["ProductName"]."', product_price = '".$_POST["ProductPrice"]."', f_type = '".$_POST["f_type"]."', product_details = '".$_POST["ProductDetails"]."' WHERE id = '".$_POST["id"]."' ";
            $message = $Auth->setData($sqlQuery);
        }


    }//this will show us the data which we want to update
    $data = $Auth->getData("SELECT * FROM products WHERE id = '".$_POST['id']."' LIMIT 1");
    foreach ($data as $row);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Food</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Food</li>
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
                            <label>Food Name</label>
                            <input type="text" name="ProductName" class="form-control" value="<?php echo $row['product_name'] ?>" placeholder="Enter Product Name">
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" name="ProductPrice" class="form-control" value="<?php echo $row['product_price'] ?>" placeholder="Enter The Sale Price">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Food Type</label>
                                    <select name="f_type"  class="form-control">
                                        <option selected>Select Food type</option>
                                        <option value="breakfast" <?php if($row['f_type'] == 'breakfast') echo 'selected' ?>>Breakfast</option>
                                        <option value="lunch" <?php if($row['f_type'] == 'lunch') echo 'selected' ?>>Lunch</option>
                                        <option value="dinner" <?php if($row['f_type'] == 'dinner') echo 'selected' ?>>Dinner</option>
                                        <option value="desserts" <?php if($row['f_type'] == 'desserts') echo 'selected' ?>>Desserts</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="form-group">
                            <label>Product Details</label>
                            <textarea  class="form-control" rows="5" name="ProductDetails">
                                <?php echo $row['product_details'] ?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="ProductFile1">
                                    <label class="custom-file-label" >Food Photo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" name="UpdateProduct" class="btn btn-primary">Submit</button>
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