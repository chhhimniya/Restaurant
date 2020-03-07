<?php
    include 'conn.php';
    include 'header.php';
    include 'sidebar.php';
?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="tile">
      <?php
        $msg_name=$msg_persons=$msg_image=$message="";
          if (isset($_REQUEST['btn_add'])) {
      
            $product_name=$_REQUEST['product_name'];
             $product_price=$_REQUEST['product_price'];
             $image=$_FILES['image']['name'];
              $imagetyp=$_FILES['image']['tmp_name'];
            $detail=$_REQUEST['detail'];
           
          //checking name
          if(empty($_POST['product_name']))
          {
          $msg_name = "Please input your product name";
          }
          //checking for non-empty and non-negative integer
          if(empty($_POST['product_price'])){
          $msg_persons = "Pleaese input product price ";
          }
          else {
            if(!empty($image)){
              $insert_item=mysqli_query($conn,"INSERT INTO item(item_name,item_price,item_image,item_detail) VALUES('$product_name','$product_price','$image','$detail')");
              if ($insert_item=== TRUE) {
                move_uploaded_file( $imagetyp,'images/brand/'.$image);
                $message='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success</strong> Your data has been inserted
              </div>';
              }
              else{
                $message='<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Failed</strong>Your data has not been inserted!!!
              </div>'.$conn->error;
              }
            }
          }
          }
        ?>
      <?php
      echo $message;
      ?>
            <h3 class="tile-title">Add Product</h3>
            <div class="tile-body">
              <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label">Product Name</label>
                  <input class="form-control" type="text" placeholder="Product Name" name="product_name">
                  <?php echo "<p class='note'>".$msg_name."</p>";?>
                </div>
                <div class="form-group">
                  <label class="control-label">Price</label>
                  <input class="form-control" type="number" placeholder=" Price " name="product_price">
                  <?php echo "<p class='note'>".$msg_persons."</p>";?>
                </div>
                <div class="form-group">
                  <div class="control-label">Image</div>
                  <input type="file" name="image" id="image" class="form-control">
                  <?php echo "<p class='note'>".$msg_image."</p>";?>
                </div>
                <div class="form-group" >
                <label class="control-label">Details</label>
                  <textarea name="detail" id=""  cols="30" rows="6" class="form-control" placeholder="Detials" name="detail"></textarea>
                </div>
                <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="btn_add"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Product</button>
            </div>
              </form>
            </div>
            
          </div>
    </main>
    <?php
     include 'footer.php';
    ?>