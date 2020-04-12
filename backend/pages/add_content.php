<?php
    include 'conn.php';
    include 'header.php';
    include 'sidebar.php';
    ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Add​​ Content</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Add Content</a></li>
        </ul>
      </div>
      <div class="tile">
          <?php
          $msg_content_title=$msg_content_category=$msg_content_description=$msg_content_order=$message_content=" ";
            if (isset($_REQUEST['btn_add_content'])) {
                  $content_title=$_REQUEST['content_title'];
                  $content_menu=$_REQUEST["content_menu"];
                  $content_description=$_REQUEST["detail"];
                  $content_order=$_REQUEST["content_order"];
                if (empty($content_title)) {
                    $msg_content_title="Content title is required";
                }
                if (empty($content_menu)) {
                    $msg_content_category="Content Category is required";
                }
                 if (empty($content_description)) {
                    $msg_content_description="Content Description is required";
                }
                if (empty($content_order)) {
                    $msg_content_order="Content Order is required";
                }
                else {
                    $insert_content=mysqli_query($conn,"INSERT INTO content(content_title,content_menu,content_description,content_order) VALUES('$content_title','$content_menu','$content_description','$content_order')");
                    if ($insert_content==TRUE) {
                      $message_content='<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success</strong> Your data has been inserted
                    </div>';
                    }
                    else{
                      $message_content='<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Failed</strong>Your data has not been inserted!!!
                    </div>'.$conn->error;
                    }   
                 }
            }

            ///Update menu_item
            if (isset($_REQUEST['get_content_id'])) {
              $get_content_id=$_REQUEST['get_content_id'];
                if (isset($_REQUEST['btn_edit_content'])) {
                    $content_title=$_REQUEST['content_title'];
                    $content_menu=$_REQUEST["content_menu"];
                    $content_description=$_REQUEST["detail"];
                    $content_order=$_REQUEST["content_order"];
                    $update_content=mysqli_query($conn,"UPDATE content SET content_title='$content_title',content_menu='$content_menu',content_description='$content_description',content_order='$content_order' WHERE content_id=$get_content_id");
                  if ($update_content==TRUE) {
                    $message_content='<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success</strong> Your data has been updated
                  </div>';
                  }
                  else {
                    $message_content='<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Failed</strong> Your data has note been updated
                  </div>';
                  }
                }
                $sqlselect="SELECT*FROM content WHERE content_id=$get_content_id";
                $qrselect = $conn->query($sqlselect);
                $rowselect = $qrselect->fetch_assoc();
            }
            else {
              $rowselect=array('content_title'=>'','content_menu'=>'','content_description'=>'','content_order'=>'');
            }
            ?>
            <?php
            echo $message_content;
            ?>
            <h3 class="tile-title">Add Content</h3>
            <div class="tile-body">
              <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label">Content Title</label>
                  <input class="form-control" type="text" placeholder="Content Title" name="content_title"
                  value="<?php
                      echo $rowselect['content_title'];
                  ?>"
                  >
                  <?php echo "<p class='note'>".$msg_content_title."</p>";?>
                </div>
                 <div class="form-group">
                  <label class="control-label">Content Category</label>
                  <select class="form-control" placeholder="Content Category" name="content_menu">
                   <option>-- Choose Menu --</option>
                    <?php
                      $cate_content_sql="SELECT*FROM menu_item order by menu_item_name asc";
                      $result=$conn->query($cate_content_sql);
                      while ($row=$result->fetch_assoc()) {
                        if ($row['menu_item_id']==$content_menu) {
                         echo'
                          <option value="'.$row['menu_item_id'].'" selected>'.$row['menu_item_name'].'</option>
                        ';
                        }
                        else
                        {
                           echo'
                          <option value="'.$row['menu_item_id'].'">'.$row['menu_item_name'].'</option>
                        ';
                        }
                      }
                    ?>
                  </select>
                  <?php echo "<p class='note'>".$msg_content_category."</p>";?>
                </div>
                  <?php echo "<p class='note'>".$msg_content_order."</p>";?>
                </div>
                <div class="form-group">
                  <label class="control-label">Content Order</label>
                  <input class="form-control" type="number" placeholder="Content Order" name="content_order"
                  value="<?php
                      echo $rowselect['content_order'];
                  ?>"
                  >
                  <?php echo "<p class='note'>".$msg_content_order."</p>";?>
                </div>
                <div class="form-group">
                  <label class="control-label">Content Order</label>
                  <textarea class="form-control" placeholder="Content Description" name="detail"
                   >
                   <?php
                      echo $rowselect['content_description'];
                  ?>
                  </textarea>
                 
                <div class="tile-footer">
              <?php
                if (!isset($_REQUEST['get_content_id'])) {
                  echo'<button class="btn btn-success" type="submit" name="btn_add_content"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Content</button>
                    <a class="btn btn-danger" type="submit" href="manage_content.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                  ';
                }
                else {
                  echo'<button class="btn btn-warning" type="submit" name="btn_edit_content"><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit Conent</button>
                    <a class="btn btn-danger" type="submit" href="manage_content.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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