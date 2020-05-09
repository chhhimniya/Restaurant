<?php
    include 'conn.php';
    include 'header.php';
    include 'sidebar.php';
    ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1>Add Chef</h1>
        </div>
      </div>
      <div class="tile">
          <?php
          $message_chef=$msg_chef_name=$msg_chef_image=$msg_chef_position=$msg_chef_gmail=$msg_chef_detail=" ";
            if (isset($_REQUEST['btn_add_chef'])) {
                $name=$_REQUEST['name'];
                $image=$_FILES['image']['name'];
                $image_path=$_FILES['image']['tmp_name'];
                $position=$_REQUEST["position"];
                $gmail=$_REQUEST["gmail"];
                $detail=$_REQUEST["detail"];
               
                if (empty($name)) {
                    $msg_chef_name="This field is require";
                }
                if (empty($image)) {
                    $msg_chef_image="This field is require";
                }
                if (empty($position)) {
                    $msg_chef_position="This field is require";
                }
                if (empty($gmail)) {
                    $msg_chef_gmail="This field is require";
                }
                
                else {
                    if (!empty($image)) {
                        $insert_chef=mysqli_query($conn,"INSERT INTO chef(chef_name,chef_image,chef_position,chef_gmail,chef_detail) VALUES('$name','$image','$position','$gmail','$detail')");
                        move_uploaded_file( $image_path,'images/chefs/'.$image);
                    }
                    else {
                        $insert_chef=mysqli_query($conn,"INSERT INTO chef(chef_name,chef_position,chef_gmail,chef_detail) VALUES('$name','$position','$gmail',$detail')");
                    }
                    if ($insert_chef==TRUE) {
                      $message_chef='<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success</strong> Your data has been inserted
                    </div>';
                    }
                    else{
                      $message_chef='<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Failed</strong>Your data has not been inserted!!!
                    </div>'.$conn->error;
                    }   
                 }
            }

            //Update menu_item
            if (isset($_REQUEST['get_chef_id'])) {
              $get_chef_id=$_REQUEST['get_chef_id'];
                if (isset($_REQUEST['btn_edit_chef'])) {
                  $name=$_REQUEST['name'];
                  $image=$_FILES['image']['name'];
                  $image_path=$_FILES['image']['tmp_name'];
                  $position=$_REQUEST["position"];
                  $gmail=$_REQUEST["gmail"];
                  $detail=$_REQUEST["detail"];
                  if (!empty($image)) {
                    $update_chef=mysqli_query($conn,"UPDATE chef SET chef_name='$name',chef_image='$image',chef_position='$position',chef_gmail='$gmail',chef_detail='$detail' WHERE chef_id=$get_chef_id");
                    move_uploaded_file($image_path,'images/chefs/'.$image);
                  }
                  else {
                     $update_chef=mysqli_query($conn,"UPDATE chef SET chef_name='$name',chef_position='$position',chef_gmail='$gmail',chef_detail='$detail' WHERE chef_id=$get_chef_id");
                  }
                  if ($update_chef==TRUE) {
                    $message_chef='<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success</strong> Your data has been updated
                  </div>';
                  }
                  else {
                    $message_chef='<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Failed</strong> Your data has note been updated
                  </div>';
                  }
                }
                $sqlselect_chef="SELECT*FROM chef WHERE chef_id=$get_chef_id";
                $qrselect = $conn->query($sqlselect_chef);
                $rowselect_chef = $qrselect->fetch_assoc();
            }
            else {
              $rowselect_brand=array('chef_name'=>'','chef_image'=>'','chef_position'=>'','chef_gmail'=>'','chef_detail'=>'');
            }
            ?>
            <?php
            echo $message_chef;
            ?>
            <h3 class="tile-title">Add Chef</h3>
            <div class="tile-body">
              <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label">Chef Name</label>
                  <input class="form-control" type="text" placeholder="Chef Name" name="name"
                 value="<?php
                     if(isset($_REQUEST['get_chef_id']))
                     {
                       echo $rowselect_chef['chef_name'];
                     }
                  ?>"
                  >
                  <?php echo "<p class='note'>".$msg_chef_name."</p>";?>
                </div>
                <div class="form-group">
                  <label class="control-label">Chef Image</label>
                  <input class="form-control" type="file" placeholder="Chef_Image" name="image"    value="<?php
                     if(isset($_REQUEST['get_chef_id']))
                     {
                       echo $rowselect_chef['chef_image'];
                     }
                  ?>"
                  >
                  <?php echo "<p class='note'>".$msg_chef_image."</p>";?>
                </div>
                <div class="form-group">
                  <label class="control-label">Chef Position</label>
                  <input class="form-control" type="text" placeholder="Chef Position" name="position"
                   value="<?php
                     if(isset($_REQUEST['get_chef_id']))
                     {
                       echo $rowselect_chef['chef_position'];
                     }
                  ?>"
                  >
                  <?php echo "<p class='note'>".$msg_chef_position."</p>";?>
                </div>
                 <div class="form-group">
                  <label class="control-label">Chef Gmail</label>
                  <input class="form-control" type="gmail" placeholder="Chef Gmail" name="gmail"
                    value="<?php
                     if(isset($_REQUEST['get_chef_id']))
                     {
                       echo $rowselect_chef['chef_gmail'];
                     }
                  ?>"
                  >
                  <?php echo "<p class='note'>".$msg_chef_gmail."</p>";?>
                </div>
                 <div class="form-group">
                  <label class="control-label">Chef Detail</label>
                  <textarea class="form-control" placeholder="Detail" name="detail"
                   >
                  <?php
                     if(isset($_REQUEST['get_chef_id']))
                     {
                       echo $rowselect_chef['chef_detail'];
                     }
                  ?>
                  </textarea>
                </div>
                <div class="tile-footer">
                <?php
                  if (!isset($_REQUEST['get_chef_id'])) {
                   echo '<button class="btn btn-success" type="submit" name="btn_add_chef"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add New</button>';
                  }
                  else {
                    echo '<button class="btn btn-success" type="submit" name="btn_edit_chef"><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit</button>
                    <a class="btn btn-danger" type="submit" href="manage_chef.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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