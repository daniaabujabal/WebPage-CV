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
                <h1>Book Your Table Now</h1>
                <p>If you can’t decide what to have, why not try our ‘Restaurantnz’ variety platter, offering you a selection of some of our customers favourites.</p>
            </div>
        </div>

            <div class="row" style="margin-top: 5%;">
                
                <div class="col-md-4 col-md-offset-2 col-sm-12" >
                    <div class="left-image">
                        <img src="img/book_left_image.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="right-info">
                        <h4>Reservation</h4>

                     
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <select required name='day'>
                                            <option value="">Select day</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset>
                                        <select required name='hour'>
                                            <option value="">Select hour</option>
                                            <option value="10-00">10:00</option>
                                            <option value="11-00">11:00</option>
                                            <option value="12-00">12:00</option>
                                            <option value="13-00">13:00</option>
                                            <option value="14-00">14:00</option>
                                            <option value="15-00">15:00</option>
                                            <option value="16-00">16:00</option>
                                            <option value="17-00">17:00</option>
                                            <option value="18-00">18:00</option>
                                            <option value="19-00">19:00</option>
                                            <option value="20-00">20:00</option>

                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset>
                                        <input name="name" type="name" class="form-control" id="name" placeholder="Full name" required>
                                    </fieldset> 
                                </div>
                                <div class="col-md-6">
                                    <fieldset>
                                        <input name="phone" type="phone" class="form-control" id="phone" placeholder="Phone number" required>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset>
                                        <select required class="person" name='persons'>
                                            <option value="">How many persons?</option>
                                            <option value="1-Person">1 Person</option>
                                            <option value="2-Persons">2 Persons</option>
                                            <option value="3-Persons">3 Persons</option>
                                            <option value="4-Persons">4 Persons</option>
                                            <option value="5-Persons">5 Persons</option>
                                            <option value="6-Persons">6 Persons</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset>
                                        <button type="submit" name="book" class="btn">Book Table</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                       
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

