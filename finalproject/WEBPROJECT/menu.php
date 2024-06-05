<?php
require 'admin/includes/auth.php';

$Breakfast = $Auth->getData("SELECT * FROM products WHERE f_type = 'breakfast' ORDER BY id DESC"); //this display only Breakfast
$Lunch = $Auth->getData("SELECT * FROM products WHERE f_type = 'lunch' ORDER BY id DESC"); //this display only Lunch
$Dinner = $Auth->getData("SELECT * FROM products WHERE f_type = 'dinner' ORDER BY id DESC"); //this display only Dinner
$Desserts = $Auth->getData("SELECT * FROM products WHERE f_type = 'desserts' ORDER BY id DESC"); //this display only Desserts

// if user click add to cart this code executes and data add to cart table
if(isset($_POST['addtocart'])) {
    $sqlQuery = "INSERT INTO cart (food_id,user_id)
    VALUES ('".$_POST['id']."','".$_SESSION["UserUserid"]."')";	
    
    $message = $Auth->setData($sqlQuery);
}



include 'header.php';

?>

<section class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Our Menus</h1>
                <p>If you can’t decide what to have, why not try our ‘Restaurantnz’ variety platter, offering you a selection of some of our customers favourites.</p>
            </div>
        </div>
    </div>
</section>

<?php
                if(!empty($message)){
                    echo '<h5 style=" text-align: center; margin-top: 1%; color: red; ">' .$message. '</h5>';
                }
                ?>

<?php if($Breakfast != NULL){ ?>


<section class="featured-food">
    <div class="container">
        <div class="row">
            <div class="heading">
                <h2>Breakfast</h2>
            </div>
        </div>
        <div class="row" style="background-color: #f2f6ff;">

            <?php foreach ($Breakfast as $row) { ?>

                <div class="col-md-4">
                <div class="food-item">
                    <img src="admin/productsPhotos/332e6f1bc31d876f9e46bc448fb77b86.jpg" alt="">
                    <div class="price"><?php echo $row['product_price']; ?>$</div>
                    <div class="text-content">
                        <h4><?php echo $row['product_name']; ?></h4>
                        <p><?php echo $row['product_details']; ?></p>

                        <?php
                        // this check if user is loged in than the food is added to cart
                         if(isset($_SESSION["UserUserid"])) { ?>
                        <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" name="addtocart" class="btn" value="Add to Cart">
                        </form>
                        <?php 
                         // this check else if user is not loged in than it rediret it to login page same for all sections like Breakfast, lunch, dinner etc

                        } else {
                            ?>
                            <a class="btn btn-default" href="login.php">Add to Cart</a>
                            <?php
                        }
                         ?>

                    </div>
                </div>
            </div>

            <?php } ?>


        </div>
    </div>
</section>

<?php } if($Lunch != NULL){ ?>

<section class="featured-food">
    <div class="container">
        <div class="row">
            <div class="heading">
                <h2>Lunch</h2>
            </div>
        </div>
        <div class="row" style="background-color: #f2f6ff;">

            <?php foreach ($Lunch as $row) { ?>

            <div class="col-md-4">
                <div class="food-item">
                    <img src="admin/productsPhotos/<?php echo $row['file_input_1']; ?>" alt="">
                    <div class="price"><?php echo $row['product_price']; ?>$</div>
                    <div class="text-content">
                        <h4><?php echo $row['product_name']; ?></h4>
                        <p><?php echo $row['product_details']; ?></p>
                         <?php if(isset($_SESSION["UserUserid"])) { ?>
                        <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" name="addtocart" class="btn" value="Add to Cart">
                        </form>
                        <?php } else {
                            ?>
                            <a class="btn btn-default" href="login.php">Add to Cart</a>
                            <?php
                        }
                         ?>
                         
                    </div>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>
</section>

<?php } if($Dinner != NULL){ ?>

<section class="featured-food">
    <div class="container">
        <div class="row">
            <div class="heading">
                <h2>Dinner</h2>
            </div>
        </div>
        <div class="row" style="background-color: #f2f6ff;">

            <?php foreach ($Dinner as $row) { ?>
                <div class="col-md-4">
                <div class="food-item">
                    <img src="admin/productsPhotos/<?php echo $row['file_input_1']; ?>" alt="">
                    <div class="price"><?php echo $row['product_price']; ?>$</div>
                    <div class="text-content">
                        <h4><?php echo $row['product_name']; ?></h4>
                        <p><?php echo $row['product_details']; ?></p>
                        <?php if(isset($_SESSION["UserUserid"])) { ?>
                        <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" name="addtocart" class="btn" value="Add to Cart">
                        </form>
                        <?php } else {
                            ?>
                            <a class="btn btn-default" href="login.php">Add to Cart</a>
                            <?php
                        }
                         ?>
                         
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</section>

<?php } if($Desserts != NULL){ ?>


<section class="featured-food">
    <div class="container">
        <div class="row">
            <div class="heading">
                <h2>Desserts</h2>
            </div>
        </div>
        <div class="row" style="background-color: #f2f6ff;">

            <?php foreach ($Desserts as $row) { ?>
                <div class="col-md-4">
                <div class="food-item">
                    <img src="admin/productsPhotos/<?php echo $row['file_input_1']; ?>" alt="">
                    <div class="price"><?php echo $row['product_price']; ?>$</div>
                    <div class="text-content">
                        <h4><?php echo $row['product_name']; ?></h4>
                        <p><?php echo $row['product_details']; ?></p>
                        <?php if(isset($_SESSION["UserUserid"])) { ?>
                        <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" name="addtocart" class="btn" value="Add to Cart">
                        </form>
                        <?php } else {
                            ?>
                            <a class="btn btn-default" href="login.php">Add to Cart</a>
                            <?php
                        }
                         ?>
                         
                    </div>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>
</section>

<?php } ?>
<?php
include 'footer.php';
?>