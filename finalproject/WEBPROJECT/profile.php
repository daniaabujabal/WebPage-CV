<?php
$Message = '';
require 'admin/includes/auth.php';

$Auth->UserLoginStatus();

if(isset($_POST['update'])) {

    if($_POST['password']){
  
    $sqlQuery = "UPDATE user SET name= '".$_POST["name"]."', contact= '".$_POST["contact"]."', address= '".$_POST["address"]."', email= '".$_POST["email"]."', password= '".md5($_POST["password"])."' WHERE  id = '".$_SESSION["UserUserid"]."'";	
    
    $Message = $Auth->setData($sqlQuery);
    } else {
        $Message = "Please Enter Password";
    }

    }
	

    $data = $Auth->getData("SELECT * FROM user WHERE id = '".$_SESSION["UserUserid"]."'");
    foreach ($data as $row)



include 'header.php';

?>

    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>My Profile</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-food">
        <div class="container">
            <div class="row" style="background-color: #f2f6ff;">
                <div class="col-md-12 text-center">
                    <div class="food-item">
                        <div >

                        <?php
                                    if($Message){
                                   ?>
                            <p class="login-box-msg text-danger font-weight-bold"><?php echo $Message; ?></p>
                            <?php
                               } 
                             ?>

                            <form action="" method="post" style="margin: auto; width: 50%; padding: 10px; ">
                                <div>
                                <Label>Name</Label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $row['name'] ?>"> <br>
                                </div>
                                <div>
                                     <Label>Contact</Label>
                                    <input type="text" name="contact" class="form-control" placeholder="Contact" value="<?php echo $row['contact'] ?>"> <br>
                                </div>
                                <div>                                
                                     <Label>Address</Label>
                                     <textarea name="address" class="form-control" rows="5"><?php echo $row['address'] ?></textarea>
                                </div>
                                <div>                                
                                     <Label>Email</Label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $row['email'] ?>"> <br>
                                </div>
                                <div>
                                     <Label>Password</Label>
                                    <input type="password" name="password" class="form-control" placeholder="Password"> <br>
                                </div>
                                <br>
                                <div class="row">
                                 

                                    <!-- /.col -->
                                    <div class="col-6">
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
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