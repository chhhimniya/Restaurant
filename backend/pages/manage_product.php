<?php
    include 'conn.php';
    include 'header.php';
    include 'sidebar.php';
    $message_delete="";
    if (isset($_REQUEST['item_del_id'])) {
        echo $item_del_id=$_REQUEST['item_del_id'];
        $del_img=$conn->query("SELECT item_image FROM item WHERE item_id='".$_REQUEST['item_del_id']."'")->fetch_assoc();
        unlink("images/products/".$del_img['item_image']);
        $brand_delete="DELETE FROM item WHERE item_id=$item_del_id";
        if ($conn->query($brand_delete)===TRUE) {
            $message_delete='<div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><i class="fa fa-check-circle"></i></strong>Your data  has been deleted</div>';
            }
            else {
                $message_delete='<div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><i class="fa fa-times"></i></strong>Your data  has not been deleted</div>';
            }       
    }
?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Manage Product</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Manage Product</a></li>
        </ul>
      </div>
      <div class="tile">
      <?php
        echo $message_delete;
      ?>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Image</th>
                      <th>Detial</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $select_item="SELECT*FROM item";
                        $result=$conn->query($select_item);
                        while ($row=$result->fetch_assoc()) {
                           echo' <tr>
                           <td>'.$row['item_id'].'</td>
                           <td>'.$row['item_name'].'</td>
                           <td>'.$row['item_price'].'</td>
                           <td class="text-center"><img  src="images/products/'.$row['item_image'].'" class="img-thumbnail" width="60" height="60"></td>
                           <td>'.$row['item_detail'].'</td>
                           <td><div class="btn-group" role="group" aria-label="Basic example">
                           <a href="add_product.php?get_product='.$row['item_id'].'"  class="btn btn-warning  mr-2"><i class="fa fa-pencil "></i></a>
                           <button style="cursor:pointer;" class="btn btn-danger mr-2" data-href="add_product.php?item_del_id='.$row['item_id'].'" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></button>
                         </div></td>
                         </tr> ';
                        }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!--Modal Delet staff-->
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
             <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-success">
                Confirm
            </div>
            <div class="modal-body">
                Are you sure! You want to delete this brand
            </div>
            <div class="modal-footer">
                
                <a class="btn btn-success btn-ok">Delete</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </main>
    <?php
     include 'footer.php';
    ?>