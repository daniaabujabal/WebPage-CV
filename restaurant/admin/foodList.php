<?php
require 'includes/auth.php';
$Auth->adminLoginStatus();


include 'includes/header.php';


if(isset($_POST['Delete'])){
    $data = $Auth->setData("DELETE FROM products WHERE id ='".$_POST["id"]."'");
}

$data = $Auth->getData("SELECT * FROM products ORDER BY id DESC");

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products List</li>
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
                <table id="DataTable" class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 2%">
                          #
                      </th>
                      <th style="width: 30%">
                          Product Name
                      </th>
                      <th style="width: 25%">
                        Images
                      </th>
                      <th style="width: 10%" class="text-center">
                        Price
                      </th>
                      <th style="width: 10%" class="text-center">
                        Food Type
                      </th>
                      <th style="width: 25%">
                      </th>
                  </tr>
              </thead>
              <tbody>
              <?php foreach ($data as $row) { ?>

                    <tr>
                      <td>
                          <?php echo $row['id'] ?>
                      </td>
                      <td>
                          <a>
                             <?php echo $row['product_name'] ?>
                          </a>
                          <br/>
                      </td>
                      <td>
                        <img alt="No Image" class="table-avatar" src="productsPhotos/<?php echo $row['file_input_1'] ?>">
                      </td>
                      <td class="project-state">
                          <span class="badge badge-success"><?php echo $row['product_price'] ?></span>
                      </td>
                      <td class="project-state">
                          <span class="badge badge-success"><?php echo $row['f_type'] ?></span>
                      </td>
                      <td class="project-actions text-right">

                      <div class="row">
                      <form action="editfood.php" method="post" style="margin-left: 2px;">
                          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                          <button type="submit" name="Edit" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</button>

                      </form>
                      <form action="" method="post" style="margin-left: 2px;">
                          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                          <button type="submit" name="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>

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