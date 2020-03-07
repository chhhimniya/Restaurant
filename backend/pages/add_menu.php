<?php
    include 'conn.php';
    include 'header.php';
    include 'sidebar.php';
    ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Add Menu</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Add Menu</a></li>
        </ul>
      </div>
      <div class="tile">
          <?php
          $msg_menu_name=$msg_menu_order=$message_menu=" ";
            if (isset($_REQUEST['btn_add_menu'])) {
                 $menu_name=$_REQUEST['menu_name'];
                $menu_order=$_REQUEST["menu_order"];
                if (empty($menu_name)) {
                    $msg_menu_name="Menu name is require";
                }
                if (empty($menu_order)) {
                    $msg_menu_order="Menu order is require";
                }
                else {
                    $insert_menu=mysqli_query($conn,"INSERT INTO menu_item(menu_item_name,menu_item_order) VALUES('$menu_name','$menu_order')");
                    if ($insert_menu==TRUE) {
                      $message_menu='<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success</strong> Your data has been inserted
                    </div>';
                    }
                    else{
                      $message_menu='<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Failed</strong>Your data has not been inserted!!!
                    </div>'.$conn->error;
                    }   
                 }
            }
            ?>
            <?php
            echo $message_menu;
            ?>
            <h3 class="tile-title">Add Menu</h3>
            <div class="tile-body">
              <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label">Menu Name</label>
                  <input class="form-control" type="text" placeholder="Menu Name" name="menu_name">
                  <?php echo "<p class='note'>".$msg_menu_name."</p>";?>
                </div>
                <div class="form-group">
                  <label class="control-label">Menu Order</label>
                  <input class="form-control" type="number" placeholder=" Menu Order " name="menu_order">
                  <?php echo "<p class='note'>".$msg_menu_order."</p>";?>
                </div>
                <div class="tile-footer">
              <button class="btn btn-success" type="submit" name="btn_add_menu"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Menu</button>
            </div>
              </form>
            </div>
            
          </div>
    </main>
    <?php
    include 'footer.php';
    ?>