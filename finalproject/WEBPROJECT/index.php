<?php
require 'admin/includes/auth.php';
include 'header.php';

//these files are explaied in admin files
//nothing inportain here just images and links



?>


    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h4>Here you can find delecious foods</h4>
                    <h2>Restaurantnz</h2>
                    <p>Our goal is to help you enjoy the little things in life that matter, so eat delicious food, grab a drink and most of all – Relax .</p>
                    <div class="primary-button">
                        <a href="menu.php" class="scroll-link" >Order Right Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="cook-delecious">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-md-offset-1">
                    <div class="first-image">
                        <img src="img/cook_01.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cook-content">
                        <h4>We cook delecious</h4>
                        <div class="contact-content">
                            <span>You can call us on:</span>
                            <h6>+ 1234 567 8910</h6>
                        </div>
                        <span>or</span>
                        <div class="primary-white-button">
                            <a href="menu.php" class="scroll-link" data-id="book-table">Order Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="second-image">
                        <img src="img/cook_02.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <a href="menu.php">
                        <img src="img/cook_breakfast.png" alt="Breakfast">
                        <h4>Breakfast</h4>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <a href="menu.php">
                        <img src="img/cook_lunch.png" alt="Lunch">
                        <h4>Lunch</h4>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <a href="menu.php">
                        <img src="img/cook_dinner.png" alt="Dinner">
                        <h4>Dinner</h4>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <a href="menu.php">
                        <img src="img/cook_dessert.png" alt="Desserts">
                        <h4>Desserts</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="featured-food">
        <div class="container">
            <div class="row" style="height: 50px;">
                <div class="heading">
                    <h2>Catering</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                Whether you just want to order food for one, or for a small night in, Restaurantnz offer catering for special occasions. For Enquires Please Email us at Hello@example.com
                </div>
            </div>
        </div>
    </section>

    <section class="featured-food">
        <div class="container">
            <div class="row" style="height: 50px;">
                <div class="heading">
                    <h2>Delivery</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                We will deliver to you. Restaurantnz is open Thursday, Friday and Saturday. We also operate on Sunday (Pre-Orders Only). <br>
            </div>
            </div>
        </div>
    </section>

    <section class="featured-food">
        <div class="container">
            <div class="row" style="height: 50px;">
                <div class="heading">
                    <h2>Delivery Times</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                Thursday   Friday   Saturday <br>
                6:00pm – 9:00pm <br>
                Sunday (Pre-Order Only) <br>
                6:00pm – 9:00pm <br>
                Last Pre Order at 4:00pm <br>
                </div>
            </div>
        </div>
    </section>

<?php
include 'footer.php';
?>