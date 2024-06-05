<!-- this is header i have explain it in admin header -->
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="menu.php">Our Menus</a></li>
                        <li><a href="reservations.php">Reservation</a></li>
                        <li><a href="contact.php">Contact</a></li>


                        <?php
                        // this if check where user is admin or user if user it show its profile, its orders and logout
                        if(isset($_SESSION["UserUserid"])) {
                            ?>
                        <li><a href="my_orders.php">My Orders</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="logout.php">Logout</a></li>

                            <?php
                        //  if user is admin it show dashbord link and logout

                      } elseif(isset($_SESSION["adminUserid"])) {
                        ?>
                        <li><a href="admin/">Admin Dashbord</a></li>
                        <li><a href="logout.php">Logout</a></li>

                        <?php  
                       // if  _SESSION is not set than menu will show only login
                        } else {
                            ?>
                           <li><a href="login.php">Login</a></li>
                            <?php  
                        }
                        ?>

                        <li><a href="cart.php"><i class="cart fa fa-shopping-cart"></i></a></li>

                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>
    <!--/.header-->
