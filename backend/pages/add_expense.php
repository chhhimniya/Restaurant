<?php
    include 'conn.php';
    include 'header.php';
    include 'sidebar.php';
    ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Add Expense</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Add Expense</a></li>
        </ul>
      </div>
      <div class="tile">
          <?php
          $msg_title=$msg_price=$message_expense="";
            if (isset($_REQUEST['btn_add_expense'])) {
                $title=$_REQUEST['title'];
                $price=$_REQUEST["price"];
                $detail=$_REQUEST["detail"];
                $date=date('Y/m/d H:i:s');                
                if (empty($title)) {
                    $msg_title="Title is require";
                }
                if (empty($price)) {
                    $msg_price="Price is require";
                }
                else {
                    $insert_expense=mysqli_query($conn,"INSERT INTO expense(expense_title,expense_price,expense_date,expense_description) VALUES('$title','$price','$date','$detail')");
                    if ($insert_expense==TRUE) {
                      $message_expense='<div class="alert alert-success alert-dismissible >
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success</strong> Your data has been inserted
                    </div>';
                    }
                    else{
                      $message_expense='<div class="alert alert-danger alert-dismissible" >
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Failed</strong>Your data has not been inserted!!!
                    </div>'.$conn->error;
                    }   
                 }
            }

            ///Update menu_item
            if (isset($_REQUEST['get_expense'])) {
              $get_expense=$_REQUEST['get_expense'];
                if (isset($_REQUEST['btn_edit_expense'])) {
                    $title=$_REQUEST['title'];
                    $price=$_REQUEST["price"];
                    $detail=$_REQUEST["detail"];
                    $date=date('Y/m/d H:i:s');
                  $update_expense=mysqli_query($conn,"UPDATE expense SET expense_title='$title',expense_price='$price',expense_date='$date',expense_description='$detail' WHERE expense_id=$get_expense");
                  if ($update_expense==TRUE) {
                    $message_expense='<div class="alert alert-success alert-dismissible" id="vsFadeOffUpdate">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success</strong> Your data has been updated
                  </div>';
                  }
                  else {
                    $message_expense='<div class="alert alert-danger alert-dismissible" id="vsFadeOffUpdate">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Failed</strong> Your data has note been updated
                  </div>'.$conn->error;
                  }
                }
                $sqlselect="SELECT*FROM expense WHERE expense_id=$get_expense";
                $qrselect = $conn->query($sqlselect);
                $rowselect = $qrselect->fetch_assoc();
            }
            else {
              $rowselect=array('expense_title'=>'','expense_price'=>'','expense_date'=>'','expense_description'=>'');
            }
            ?>
            <?php
            echo $message_expense;
            ?>
            <h3 class="tile-title">Add Expense</h3>
            <div class="tile-body">
              <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label">Title</label>
                  <input class="form-control" type="text" placeholder="Title" name="title"
                  value="<?php
                      echo $rowselect['expense_title'];
                  ?>"
                  >
                  <?php echo "<p class='note'>".$msg_title."</p>";?>
                </div>
                <div class="form-group">
                  <label class="control-label">Price</label>
                  <input class="form-control" type="number" placeholder="Price" name="price"
                  value="<?php
                      echo $rowselect['expense_price'];
                  ?>"
                  >
                  <?php echo "<p class='note'>".$msg_price."</p>";?>
                </div>
                <!-- <div class="form-group">
                  <label class="control-label">Details</label>
                  <input class="form-control" type="text" placeholder="Detail" name="detail"
                  value="<?php
                      echo $rowselect['expense_description'];
                  ?>"
                  >
                </div> -->
                  <div class="form-group">
                  <label for="comment">Details</label>
                  <textarea class="form-control" rows="5" name="detail">
                    <?php
                      echo $rowselect['expense_description'];
                    ?>
                  </textarea>
                </div>
                <div class="tile-footer">
              <?php
                if (!isset($_REQUEST['get_expense'])) {
                  echo'<button class="btn btn-success" type="submit" name="btn_add_expense"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Expense</button>';
                }
                else {
                  echo'<button class="btn btn-primary" type="submit" name="btn_edit_expense"><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit Expense</button>
                    <a class="btn btn-danger" type="submit" href="manage_expense.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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