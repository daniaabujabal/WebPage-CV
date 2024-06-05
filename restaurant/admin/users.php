<?php 
require 'includes/auth.php';
$Auth->adminLoginStatus();

include 'includes/header.php';

if(isset($_POST['Delivered'])){
    $Message = $Auth->setData("UPDATE user SET status = 'blocked' WHERE id ='".$_POST["id"]."'");
}
if(isset($_POST['Delete'])){
    $Message = $Auth->setData("DELETE FROM user WHERE id ='".$_POST["id"]."'");
}

$user = $Auth->getData("SELECT * FROM user WHERE id != '1' ORDER BY id DESC");

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
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Action</th>


                  </tr>
                  </thead>
                  <tbody>

                  <?php foreach ($user as $row) { ?>

                  <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['contact'] ?></td>
                    <td><?php echo $row['address'] ?></td>

                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td><?php echo $row['type'] ?></td>
                    <td>
                    <div class="row">
                      <form action="editUser.php" method="post"  >
                          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                          <button type="submit" name="editUser" class="btn btn-primary btn-sm"><i class="fas fa-trash"></i>Edit</button>
                      </form>
                      <form action="" method="post" style="margin-left: 2px;"  >
                          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                          <button type="submit" name="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</button>
                      </form>  
                    </div>
                    
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