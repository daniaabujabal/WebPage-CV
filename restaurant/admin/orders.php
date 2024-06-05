<?php 
require 'includes/auth.php';
$Auth->adminLoginStatus();

include 'includes/header.php';

if(isset($_POST['Moved'])){
    $Message = $Auth->setData("UPDATE orders SET status = 'Moved' WHERE id ='".$_POST["id"]."'");
}
if(isset($_POST['Delivered'])){
    $Message = $Auth->setData("UPDATE orders SET status = 'Delivered' WHERE id ='".$_POST["id"]."'");
}
if(isset($_POST['Delete'])){
    $Message = $Auth->setData("DELETE FROM orders WHERE id ='".$_POST["id"]."'");
}

$data = $Auth->getData("SELECT orders.id as id, orders.product_name as product_name, orders.product_price as product_price, orders.quantity as quantity, orders.status as status, orders.date as date, user.name as username, user.contact as contact, user.address as address
 FROM orders LEFT JOIN user ON orders.user_id = user.id ORDER BY orders.id DESC");

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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Panding Orders</li>
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
                <!-- <table id="DataTable" class="table table-bordered table-striped"> -->
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

                  <?php foreach ($data as $row) { ?>

                  <tr>
                    <td><?php echo $row['product_name'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['contact'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['quantity'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td><?php echo $row['date'] ?></td>


                    <td>
                      <form action="" method="post"  >
                          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                          <button type="submit" name="Moved" class="btn btn-primary btn-sm"><i class="fas fa-truck-moving"></i> Moved</button>
                          <button type="submit" name="Delivered" class="btn btn-info btn-sm"><i class="fas fa-box-open"></i> Delivered</button>
                          <button type="submit" name="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
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
include 'includes/footer.php';
?>