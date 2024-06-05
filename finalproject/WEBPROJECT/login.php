<?php
require 'admin/includes/auth.php';
$Message =  $Auth->login(); // when user click login this function calls and data forword to the login function in auth.php 

$Auth->LoginCheck(); //this check whether user is logined in or not if yes than it redirect it to it pages if no than login is displayed

include 'header.php';

?>

    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Login</h1>

                </div>
            </div>
        </div>
    </section>

    <section class="LoginSignup">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="food-item">
                        <div >
                        <p class="login-box-msg">Sign in to start your session</p>

                        

                        <?php
                        //massages dispaly about oprations
                                    if($Message){
                                   ?>
                            <p class="login-box-msg text-danger font-weight-bold"><?php echo $Message; ?></p>
                            <?php
                               } 
                             ?>
                            <form onsubmit="return validateForm()" id="myForm" action="" method="post" style="margin: auto; width: 50%; padding: 10px; ">
                                    <input id="input" type="email" name="loginId" class="form-control" placeholder="Email" value="<?php if(isset($_COOKIE["loginId"])) { echo $_COOKIE["loginId"]; } ?>">
                                    <input id="input" type="password" name="loginPass" class="form-control" placeholder="Password" value="<?php if(isset($_COOKIE["loginPass"])) { echo $_COOKIE["loginPass"]; } ?>">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        <?php if(isset($_COOKIE["loginId"])) { ?> checked <?php } ?>>
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <p>Don't have an account <a href="signup.php">Signup</a></p>
                                    </div>

                                    <!-- /.col -->
                                    <div class="col-6">
                                        <button type="submit" name="login" class="btn btn-primary btn-block">Sign
                                            In</button>
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