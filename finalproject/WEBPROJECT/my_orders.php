<?php
require 'admin/includes/auth.php';

//this delete the item form order page
if(isset($_POST['Delete'])){
    $Message = $Auth->setData("DELETE FROM cart WHERE id ='".$_POST["id"]."'");
}

// this desplay all the order which user give
$cart = $Auth->getData("SELECT orders.id as id, orders.status as status, orders.quantity as quantity, orders.date as date, products.id as pid, products.product_name as product_name, products.product_price as product_price, products.product_details as product_details, products.file_input_1 as file_input_1 FROM products LEFT JOIN orders ON products.id = orders.product_id WHERE orders.user_id = '".$_SESSION["UserUserid"]."' ORDER by orders.date DESC ");

include 'header.php';

?>

<section class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>My Orders</h1>
            </div>
        </div>
    </div>
</section>

<section class="featured-food">
    <div class="container">

        <div class="row" style="background-color: #f2f6ff;">

            <?php foreach ($cart as $row) { ?>

            <div class="col-md-4">
                <div class="food-item">
                    <img src="admin/productsPhotos/<?php echo $row['file_input_1']; ?>" alt="">
                    <div class="price"><?php echo $row['product_price']; ?>$</div>
                    
                    <div class="text-content">
                    <div class="row">

                            <div class="col-md-3">
                                <span class="badge badge-success"><?php echo $row['status'] ?></span>
                            </div>
                            <div class="col-md-3">
                            <span class="badge badge-success"><?php echo $row['quantity'] ?></span>
                            </div>
                            <div class="col-md-3">
                            <span class="badge badge-success"><?php echo $row['date'] ?></span>
                            </div>
                        </div> <br>
                        
                        <h4><?php echo $row['product_name']; ?></h4>
                        <p><?php echo $row['product_details']; ?></p>

                        <?php

                        //this check if order is still pending than user delete it but if order is mover or delivered tha user cant delete it
                        
                        if($row['status'] == 'Pending') { ?>

                        <div class="row">
                            <div class="col-md-2">
                            <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="Delete" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>

                            </div>
                        </div>

                        <?php } ?>


                    </div>
                </div>
            </div>

            <?php } ?>


        </div>

    </div>
</section>
<?php
include 'footer.php';
?>