<?php 
//here is include the auth.php file where we have all functions
require 'includes/auth.php';
$Auth->adminLoginStatus(); // this check where the user is admin or not (check the function in auth.php)

include 'includes/header.php'; // this the header file icluded

//this add 'served' to database when we click served button
if(isset($_POST['Served'])){
  $Message = $Auth->setData("UPDATE r_table SET status = 'served' WHERE id ='".$_POST["id"]."'");
}

//this add 'Moved' to database when we click Moved button.
if(isset($_POST['Moved'])){
  $Message = $Auth->setData("UPDATE orders SET status = 'Moved' WHERE id ='".$_POST["id"]."'");
}

//this add 'Delivered' to database when we click Delivered button.
if(isset($_POST['Delivered'])){
  $Message = $Auth->setData("UPDATE orders SET status = 'Delivered' WHERE id ='".$_POST["id"]."'");
}

// this take all the data from order table and store in $orders verable and we will display it bellow.
$orders = $Auth->getData("SELECT orders.id as id, orders.product_name as product_name, orders.product_price as product_price, orders.quantity as quantity, orders.status as status, orders.date as date, user.name as username, user.contact as contact, user.address as address
 FROM orders LEFT JOIN user ON orders.user_id = user.id WHERE orders.status = 'Pending' ORDER BY orders.id DESC");


// this take all the data from booking table and store in $r_table verable and we will display it bellow.
$r_table = $Auth->getData("SELECT * FROM r_table WHERE status = 'pending' ORDER BY id DESC");



?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Panding Orders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Panding Orders</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
<!-- here we have table whech despaly the pending order -->
                <table id="DataTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Name</th>
                    <th>Contact #</th>
                    <th>Address</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>


                  </tr>
                  </thead>
                  <tbody>
<!-- this is the foreach loop which will reat all the data in orders varable and dispaly it one by one-->
                  <?php foreach ($orders as $row) { ?>

                  <tr>
                    <td><?php echo $row['product_name'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['contact'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['quantity'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td><?php echo $row['date'] ?></td>

                    <td>
                    <!-- these are the forms which will call the uper fuctions and make dessions to put mnoved or Delivered or Delete the row -->
                      <form action="" method="post"  >
                          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                          <button type="submit" name="Moved" class="btn btn-primary btn-sm"><i class="fas fa-truck-moving"></i> Moved</button>
                          <button type="submit" name="Delivered" class="btn btn-info btn-sm"><i class="fas fa-box-open"></i> Delivered</button>
                      </form>
                      </td>
                  </tr>

                  <?php } ?>

               
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
    </section>
    <!-- /.content -->

          <!-- Content Header (Page header) -->
          <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Panding Table Bookings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Panding Table Bookings</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">

                <table id="DataTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>product ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Persons</th>
                    <th>Status</th>
                    <th>Action</th>



                  </tr>
                  </thead>
                  <tbody>

        <!-- this is the foreach loop which will reat all the data in r_table varable and dispaly it one by one, same things for diffent table-->

                  <?php foreach ($r_table as $row) { ?>

                  <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['day'] ?></td>
                    <td><?php echo $row['time'] ?></td>
                    <td><?php echo $row['persons'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td>
                      <form action="" method="post"  >
                          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                          <button type="submit" name="Served" class="btn btn-primary btn-sm"><i class="fas fa-utensils"></i> Served</button>
                      </form>
                      </td>
                  </tr>

                  <?php } ?>

               
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
    </section>
    <!-- /.content -->



  </div>


    
<?php 

// this the footer included wher footer data is dispaled
include 'includes/footer.php';
?>
 
