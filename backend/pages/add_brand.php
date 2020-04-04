<?php
    include 'conn.php';
    include 'header.php';
    include 'sidebar.php';
    ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Add Brand</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Add Brand</a></li>
        </ul>
      </div>
      <div class="tile">
          <?php
          $msg_brand_name=$msg_brand_logo=$msg_brand_order=$message_brand=" ";
            if (isset($_REQUEST['btn_add_brand'])) {
                $brand_name=$_REQUEST['brand_name'];
                $brand_logo=$_FILES['brand_logo']['name'];
                $brand_logo_type=$_FILES['brand_logo']['tmp_name'];
                $brand_order=$_REQUEST["brand_order"];
               
                if (empty($brand_name)) {
                    $msg_brand_name="Brand name is require";
                }
                if (empty($brand_logo)) {
                    $msg_brand_logo="Brand logo is require";
                }
                if (empty($brand_order)) {
                    $msg_brand_order="Brand order is require";
                }
                else {
                    if (!empty($brand_logo)) {
                        $insert_brand=mysqli_query($conn,"INSERT INTO brand(brand_name,brand_logo,brand_order) VALUES('$brand_name','$brand_logo','$brand_order')");
                        move_uploaded_file( $brand_logo_type,'images/brands/'.$brand_logo);
                    }
                    else {
                        $insert_brand=mysqli_query($conn,"INSERT INTO brand(brand_name,brand_order) VALUES('$brand_name','$brand_order')");
                    }
                    if ($insert_brand==TRUE) {
                      $message_brand='<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success</strong> Your data has been inserted
                    </div>';
                    }
                    else{
                      $message_brand='<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Failed</strong>Your data has not been inserted!!!
                    </div>'.$conn->error;
                    }   
                 }
            }

            //Update menu_item
            if (isset($_REQUEST['get_brand_id'])) {
              $get_brand_id=$_REQUEST['get_brand_id'];
                if (isset($_REQUEST['btn_edit_brand'])) {
                  $brand_name=$_REQUEST['brand_name'];
                  $brand_logo=$_FILES['brand_logo']['name'];
                  $brand_logo_type=$_FILES['brand_logo']['tmp_name'];
                  $brand_order=$_REQUEST["brand_order"];
                  if (!empty($brand_logo)) {
                    $update_brand=mysqli_query($conn,"UPDATE brand SET brand_name='$brand_name',brand_logo='$brand_logo',brand_order='$brand_order' WHERE brand_id=$get_brand_id");
                    move_uploaded_file($brand_logo_type,'images/brands/'.$brand_logo);
                  }
                  else {
                    $update_brand=mysqli_query($conn,"UPDATE brand SET brand_name='$brand_name',brand_order='$brand_order' WHERE brand_id=$get_brand_id");
                  }
                  if ($update_brand==TRUE) {
                    $message_brand='<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success</strong> Your data has been updated
                  </div>';
                  }
                  else {
                    $message_brand='<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Failed</strong> Your data has note been updated
                  </div>';
                  }
                }
                $sqlselect_brand="SELECT*FROM brand WHERE brand_id=$get_brand_id";
                $qrselect = $conn->query($sqlselect_brand);
                $rowselect_brand = $qrselect->fetch_assoc();
            }
            else {
              $rowselect_brand=array('brand_name'=>'','brand_logo'=>'','brand_order'=>'');
            }
            ?>
            <?php
            echo $message_brand;
            ?>
            <h3 class="tile-title">Add Brand</h3>
            <div class="tile-body">
              <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label">Brand Name</label>
                  <input class="form-control" type="text" placeholder="Brand Name" name="brand_name"
                  value="<?php
                      echo $rowselect_brand['brand_name'];
                  ?>"
                  >
                  <?php echo "<p class='note'>".$msg_brand_name."</p>";?>
                </div>
                <div class="form-group">
                  <label class="control-label">Brand Logo</label>
                  <input class="form-control" type="file" placeholder=" Brand Logo " name="brand_logo"  value="
                 <?php
                    echo $rowselect_brand['brand_logo'];
                  ?>
                 "
                  >
                  <?php echo "<p class='note'>".$msg_brand_logo."</p>";?>
                </div>
                <div class="form-group">
                  <label class="control-label">Brand Order</label>
                  <input class="form-control" type="number" placeholder="Brand Order" name="brand_order"
                  value="<?php
                      echo $rowselect_brand['brand_order'];
                  ?>"
                  >
                  <?php echo "<p class='note'>".$msg_brand_order."</p>";?>
                </div>
                <div class="tile-footer">
                <?php
                  if (!isset($_REQUEST['get_brand_id'])) {
                   echo '<button class="btn btn-success" type="submit" name="btn_add_brand"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Brand</button>';
                  }
                  else {
                    echo '<button class="btn btn-success" type="submit" name="btn_edit_brand"><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit Brand</button>
                    <a class="btn btn-danger" type="submit" href="manage_brand.php"><i class="fa fa-fw fa-lg fa-check-circle"></i>Cancel</a>
                    ';
                  }
                ?>
            </div>
              </form>
            </div>
            
          </div>
    </main>
    <?php
    include 'footer.php';
    ?>