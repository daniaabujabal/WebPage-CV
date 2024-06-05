<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Food Ordering - Project</title>
        <meta name="description" content="">
        <!-- these two fontawsome and  bootstrap is also explaied in admin header-->
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <link rel="stylesheet" href="css/style.css">

    </head>

<body>
    <div class="header">
        <div class="container">
            <a href="index.php" class="navbar-brand scroll-top">Restaurantnz</a>
            <nav class="navbar navbar-inverse" >
  
                <div id="main-nav">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="menu.html">Our Menus</a></li>
                        <li><a href="reservations.html">Reservation</a></li>
                        <li><a href="contact.html">Contact</a></li>


                       

                        <li><a href="cart.html"><i class="cart fa fa-shopping-cart"></i></a></li>

                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>
    <!--/.header-->

<section class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Cart</h1>
            </div>
        </div>
    </div>
</section>

<section class="featured-food">
    <div class="container">

    <div class="row" style="background-color: #f2f6ff;">



<div class="col-md-4">
    <div class="food-item">
        <img src="admin/productsPhotos/<?php echo $row['file_input_1']; ?>" alt="">
        <div class="price"><?php echo $row['product_price']; ?>$</div>
        <div class="text-content">
            <h4><?php echo $row['product_name']; ?></h4>
            <p><?php echo $row['product_details']; ?></p>
            <div class="row">

                            <form action="" method="post">
                                 <div class="col-md-4">
                                    <button type="submit" name="order" class="btn btn-default">Order</i></button>
                                </div>
                                <div class="col-md-4">
                                    <input type="hidden" name="id"  value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="pid"  value="<?php echo $row['pid']; ?>">
                                    <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
                                    <input type="hidden" name="UserUserid" value="<?php echo $_SESSION["UserUserid"]; ?>"> 
                                    <input type="number" name="quantity" class="form-control text-center" value="1">
                                 </div>
                            </form>


                            <div class="col-md-2">
                            <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="Delete" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>

                            </div>
                        </div>
        </div>
    </div>
</div>




</div>

    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>Copyright &copy; 2022 Restaurantnz</p>
            </div>
            <div class="col-md-6">
                <ul class="social-icons">
                    <li><a rel="nofollow" href="#" target="_parent"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
            </div>

        </div>
    </div>
</footer>
                    </body>
                    </html>