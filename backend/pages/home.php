<?php
    include 'conn.php';
    include 'header.php';
    include 'sidebar.php';
    ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1>Add Home</h1>
        </div>
      </div>
      <div class="tile">
          <?php
          $message_home=$msg_home_name=$msg_home_image=$msg_home_order=$msg_home_detail=" ";
            if (isset($_REQUEST['btn_add_home'])) {
                $name=$_REQUEST['name'];
                $image=$_FILES['image']['name'];
                $image_path=$_FILES['image']['tmp_name'];
                $order=$_REQUEST["order"];
                $detail=$_REQUEST["detail"];
               $date=date("Y-m-d h:i");
                if (empty($name)) {
                    $msg_home_name="This field is require";
                }
                if (empty($image)) {
                    $msg_home_image="This field is require";
                }
                if (empty($order)) {
                    $msg_home_order="This field is require";
                }
                if (empty($detail)) {
                    $msg_home_detail="This field is require";
                }
                
                else {
                    if (!empty($image)) {
                        $insert_home=mysqli_query($conn,"INSERT INTO home(name,image,order_number,detail) VALUES('$name','$image','$order','$detail')");
                        move_uploaded_file( $image_path,'images/homes/'.$image);
                    }
                    else {
                       $insert_home=mysqli_query($conn,"INSERT INTO home(name,order_number,detail) VALUES('$name','$order','$detail')");
                    }
                    if ($insert_home==TRUE) {
                      $message_home='<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success</strong> Your data has been inserted
                    </div>';
                    }
                    else{
                      $message_home='<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Failed</strong>Your data has not been inserted!!!
                    </div>'.$conn->error;
                    }   
                 }
            }

            // Update menu_item
            if (isset($_REQUEST['get_home_id'])) {
              $get_home_id=$_REQUEST['get_home_id'];
                if (isset($_REQUEST['btn_edit_home'])) {
                   $name=$_REQUEST['name'];
	                $image=$_FILES['image']['name'];
	                $image_path=$_FILES['image']['tmp_name'];
	                $order=$_REQUEST["order"];
	                $detail=$_REQUEST["detail"];
                  if (!empty($image)) {
                    $update_home=mysqli_query($conn,"UPDATE home SET name='$name',image='$image',order_number='$order',detail='$detail' WHERE id=$get_home_id");
                    move_uploaded_file($image_path,'images/homes/'.$image);
                  }
                  else {
                    $update_home=mysqli_query($conn,"UPDATE home SET name='$name',order_number='$order',detail='$detail' WHERE id=$get_home_id");
                  }
                  if ($update_home==TRUE) {
                    $message_home='<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success</strong> Your data has been updated
                  </div>';
                  }
                  else {
                    $message_home='<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Failed</strong> Your data has note been updated
                  </div>';
                  }
                }
                $sqlselect_home="SELECT*FROM home WHERE id=$get_home_id";
                $qrselect = $conn->query($sqlselect_home);
                $rowselect_home = $qrselect->fetch_assoc();
            }
            else {
              $rowselect_home=array('name'=>'','image'=>'','order_number'=>'','detail'=>'');
            }
            ?>
            <?php
            echo $message_home;
            ?>
            <h3 class="tile-title">Add Home Section</h3>
            <div class="tile-body">
              <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label">Name</label>
                  <input class="form-control" type="text" placeholder="Name" name="name"
                	 value="<?php
                      if(isset($_REQUEST['get_home_id']))
                      {
                      	echo $rowselect_home['name'];
                      }
                  ?>"
                  >
                  <?php echo "<p class='note'>".$msg_home_name."</p>";?>
                </div>
                <div class="form-group">
                  <label class="control-label">Photos</label>
                  <input class="form-control" type="file" placeholder="Image" name="image"    value="<?php
                      if(isset($_REQUEST['get_home_id']))
                      {
                      	echo $rowselect_home['image'];
                      }
                  ?>"
                  >
                  <?php echo "<p class='note'>".$msg_home_image."</p>";?>
                </div>
                
                 <div class="form-group">
                  <label class="control-label">Order</label>
                  <input class="form-control" type="number" placeholder="Order" name="order"
                   value="<?php
                      if(isset($_REQUEST['get_home_id']))
                      {
                      	echo $rowselect_home['order_number'];
                      }
                  ?>"
                  >
                  <?php echo "<p class='note'>".$msg_home_order."</p>";?>
                </div>
                 <div class="form-group">
                  <label class="control-label">Detail</label>
                  <textarea class="form-control" placeholder="Detail" name="detail"
                   >
                   <?php
                      if(isset($_REQUEST['get_home_id']))
                      {
                      	echo $rowselect_home['detail'];
                      }
                  ?>"
                  </textarea>
                    <?php echo "<p class='note'>".$msg_home_detail."</p>";?>
                </div>
                <div class="tile-footer">
                <?php
                  if (!isset($_REQUEST['get_home_id'])) {
                   echo '<button class="btn btn-success" type="submit" name="btn_add_home"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add New</button>';
                  }
                  else {
                    echo '<button class="btn btn-success" type="submit" name="btn_edit_home"><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit</button>
                    <a class="btn btn-danger" type="submit" href="manage_home.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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