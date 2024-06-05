<?php 
require 'includes/auth.php';
$Auth->adminLoginStatus();

include 'includes/header.php';

if(isset($_POST['Served'])){
    $Message = $Auth->setData("UPDATE r_table SET status = 'served' WHERE id ='".$_POST["id"]."'");
}

if(isset($_POST['Delete'])){
    $Message = $Auth->setData("DELETE FROM r_table WHERE id ='".$_POST["id"]."'");
}

$r_table = $Auth->getData("SELECT * FROM r_table ORDER BY id DESC");

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Booking</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Booking</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
    <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <!-- <table id="DataTable" class="table table-bordered table-striped"> -->
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