<?php
require 'admin/includes/auth.php';

$Message =  $Auth->register();

$Auth->LoginCheck();

include 'header.php';

?>

    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Signup</h1>

                </div>
            </div>
        </div>
    </section>

    <section class="LoginSignup">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="food-item">
                        <div>
                            <p class="login-box-msg">Sign up to start</p>


                            <?php
                                    if($Message){
                                   ?>
                            <p class="login-box-msg text-danger font-weight-bold"><?php echo $Message; ?></p>
                            <?php
                               } 
                             ?>
                            <form action="" method="post" style="margin: auto; width: 50%; padding: 10px; ">
                                    <input  id="input" type="text" name="name" class="form-control" placeholder="Full name" require>
                                    <input  id="input" type="text" name="contact" class="form-control" placeholder="Contact Number" require>
                                    <input  id="input" type="text" name="address" class="form-control" placeholder="Address">
                                    <input  id="input" type="email" name="email" class="form-control" placeholder="Email" require>
                                    <input  id="input" type="password" name="passwd" class="form-control" placeholder="Password" require>
                                    <input  id="input" type="password" name="cpasswd" class="form-control" placeholder="Confirm Password" require>

                                <div class="row">
                                    <div class="col-6">
                                        <p>Already have an account <a href="login.php">Login</a></p>
                                    </div>

                                    <!-- /.col -->
                                    <div class="col-6">
                                        <button type="submit" name="register" class="btn btn-primary btn-block">Sign
                                            Up</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php
include 'footer.php';
?>