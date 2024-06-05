 
 <!-- this is the header file for top nav  bar.. i useed it in every page so we create only one file for header, instead of repeating in evry page  -->

<?php 
$pendingorder = $Auth->getNumRows("SELECT * FROM orders WHERE status = 'Pending'");  //this show us the whter ther are any pending order
$pendingtable = $Auth->getNumRows("SELECT * FROM r_table WHERE status = 'pending'"); //this show us the whter ther are any pending booking

                    // this function take url of cureent page and show us which page is active
                    function active($currect_page){
                     $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
                     $url = end($url_array);  
                         if($currect_page == $url){
                         echo 'text-active-blue active'; //class name in css 
                         } 
                    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">


<!-- i use fontawesome which is for icons in the website. -->
        <link rel="stylesheet" href="css/fontawesome-free/css/all.min.css">

        <!-- this is the bootstrap file downloaded form bootstrap website, this is ready made css and we user only class name of css object instead of wrting css code -->
         <link rel="stylesheet" href="css/bootstrap.min.css">


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                <!-- this link to logout page to logout -->
                    <a href="logout.php" class="nav-link">Logout</a> 
                </li>
            </ul>


        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="home.png" alt="Admin Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="index.php" class="nav-link <?php active('index.php');?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="orders.php" class="nav-link <?php active('orders.php');?>">
                                <i class="nav-icon fas fa-cart-arrow-down"></i>
                                <p>Orders</p><span class="badge badge-danger right"><?php if(!empty($pendingorder)){ echo 'New';} ?></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="booking.php" class="nav-link <?php active('booking.php');?>">
                                <i class="nav-icon fas fa-cart-arrow-down"></i>
                                <p>Bookings</p><span class="badge badge-danger right"><?php if(!empty($pendingtable)){ echo 'New';} ?></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="addFoods.php" class="nav-link <?php active('addFoods.php');?>">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Add Foods</p><span class="badge badge-info right"></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="foodList.php" class="nav-link <?php active('foodList.php');?>">
                                <i class="nav-icon fas fa-utensils"></i>
                                <p>Foods List</p><span class="badge badge-info right"></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="users.php" class="nav-link <?php active('users.php');?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>users</p><span class="badge badge-info right"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="settings.php" class="nav-link <?php active('settings.php');?>">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>Settings</p>
                            </a>
                        </li>
                 
                        
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>