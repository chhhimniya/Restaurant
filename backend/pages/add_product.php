<?php
    include 'conn.php';
    include 'header.php';
    include 'sidebar.php';

?>
<main class="app-content">
      <!-- <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div> -->
      <div class="tile">
      <?php
        $msg_name=$msg_persons=$msg_image=$message="";
          if (isset($_REQUEST['btn_add'])) {
      
            $product_name=$_REQUEST['product_name'];
             $product_price=$_REQUEST['product_price'];
             $image=$_FILES['image']['name'];
              $imagetyp=$_FILES['image']['tmp_name'];
            $detail=$_REQUEST['detail'];
            $cate_brand_id=$_REQUEST['brand_name'];
           
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
              $insert_item=mysqli_query($conn,"INSERT INTO item(item_name,item_price,item_image,item_detail,cate_brand_id) VALUES('$product_name','$product_price','$image','$detail','$cate_brand_id')");
              move_uploaded_file( $imagetyp,'images/products/'.$image);
            }
            else {
              $insert_item=mysqli_query($conn,"INSERT INTO item(item_name,item_price,item_detail,cate_brand_id) VALUES('$product_name','$product_price','$detail','$cate_brand_id')");
            }
              if ($insert_item=== TRUE) {
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
          
          if (isset($_REQUEST['get_product'])) {
           $get_product=$_REQUEST['get_product'];
            if (isset($_REQUEST['btn_edit_product'])) {
              $product_name=$_REQUEST['product_name'];
              $product_price=$_REQUEST['product_price'];
              $image=$_FILES['image']['name'];
              $imagetyp=$_FILES['image']['tmp_name'];
              $detail=$_REQUEST['detail'];
               $cate_brand_id=$_REQUEST['brand_name'];
              // $stNewImg = date("Y_m_d_h_i_s_").$image;
              if (!empty($image)) {
                $update_product="UPDATE item SET item_name='$product_name',item_price='$product_price',item_image='$image',item_detail='$detail',cate_brand_id='$cate_brand_id' WHERE item_id=$get_product";
                move_uploaded_file( $imagetyp, "images/products/".$image);
              }
              else {
                $update_product="UPDATE item SET item_name='$product_name',item_price='$product_price',item_detail='$detail',cate_brand_id='$cate_brand_id' WHERE item_id=$get_product";
              }
              if ($conn->query($update_product) == TRUE) {
                $message='<div class="alert alert-success alert-dismissible fade show" id="vsFadeOffUpdate">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <strong><i class="fa fa-check-circle"></i></strong>Your data  has been updated.
                 </div>';
            }
            else{
                $message='<div class="alert alert-danger alert-dismissible fade show" id="vsFadeOffUpdate">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
             <strong><i class="fa fa-times"></i></strong>Your data  has not been updated.
             </div>';
            }
            }
            $select_product="SELECT*FROM item WHERE item_id=$get_product";
            $result=$conn->query($select_product);
            $rowselect=($result->fetch_assoc());
          }
          else {
            $rowselect=array('item_name'=>'','item_price'=>'','item_image'=>'','item_detail'=>'','cate_brand_id'=>'');
          }
        ?>
      <?php
      echo $message;
      ?>
            <h3 class="tile-title">
              <?php
              if (isset($_REQUEST['get_product'])) {
               echo 'Edit Product';
              }
              else {
                echo 'Add Product';
              }
              ?>
            </h3>
            <div class="tile-body">
              <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label">Product Name</label>
                  <input class="form-control" type="text" placeholder="Product Name" name="product_name"
                  value="<?php
                      echo $rowselect['item_name'];
                  ?>"
                  >
                  <?php echo "<p class='note'>".$msg_name."</p>";?>
                </div>
                <div class="form-group">
                  <label class="control-label">Price</label>
                  <input class="form-control" type="number" placeholder=" Price " name="product_price"
                  value="<?php
                      echo $rowselect['item_price'];
                  ?>"
                  >
                  <?php echo "<p class='note'>".$msg_persons."</p>";?>
                </div>
                <label class="control-label">Brand</label>
                <div class="form-group">
                <select class="form-control" name="brand_name"> 
              <option value="0"> Choose </option>
                <?php

                if (isset($_REQUEST['get_cate_id'])) {
                  $get_cate_id=$_REQUEST['get_cate_id'];
                   $stBrand = "SELECT cate_brand.*, brand.brand_name FROM `cate_brand` INNER JOIN brand ON brand.brand_id=cate_brand.brand_id WHERE cate_id=$get_cate_id";
                    $qrBrand = $conn->query($stBrand);
                while($rowBrand = $qrBrand->fetch_assoc()){
                  if($frm['brand_id']==$rowBrand['brand_id']) $selected = 'selected';
                  else $selected='';
                  echo '<option value="'.$rowBrand['cate_brand_id'].'" '.$selected.'> '.$rowBrand['brand_name'].' </option>';
                }
              }
                ?>
             </select>
                </div>
                <div class="form-group">
                  <div class="control-label">Image</div>
                  <input type="file" name="image" id="image" class="form-control" value="<?php echo $rowselect['item_image']; ?>"
                  >
                  <?php echo "<p class='note'>".$msg_image."</p>";?>
                </div>
                <div class="form-group" >
                <label class="control-label">Details</label>
                  <textarea name="detail" cols="30" rows="6" class="form-control" placeholder="Detials" 
                  value="<?php
                      echo $rowselect['item_detail'];
                  ?>"
                  ></textarea>
                </div>
                <div class="tile-footer">
              <?php
                if (!isset($_REQUEST['get_product'])) {
                  echo'<button class="btn btn-primary" type="submit" name="btn_add"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Product</button>
                  '
                  ;
                }
                else {
                  echo'<button class="btn btn-warning" type="submit" name="btn_edit_product"><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit Product</button>
                  <a href="manage_product.php" class="btn btn-danger" type="submit"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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