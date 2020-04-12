<?php
    include 'conn.php';
    include 'header.php';
    include 'sidebar.php';
    $message_delete="";
    if (isset($_REQUEST['brand_del_id'])) {
        echo $brand_del_id=$_REQUEST['brand_del_id'];
        $del_img=$conn->query("SELECT brand_logo FROM brand WHERE brand_id='".$_REQUEST['brand_del_id']."'")->fetch_assoc();
        unlink("images/brands/".$del_img['brand_logo']);
        $brand_delete="DELETE FROM brand WHERE brand_id=$brand_del_id";
        if ($conn->query($brand_delete)===TRUE) {
            $message_delete='<div class="alert alert-success alert-dismissible fade show " id="brand">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><i class="fa fa-check-circle"></i></strong>Your data  has been deleted</div>';
            }
            else {
                $message_delete='<div class="alert alert-danger alert-dismissible fade show" id="brand">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><i class="fa fa-times"></i></strong>Your data  has not been deleted</div>';
            }       
    }
?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Manage Brand</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Manage Brand</a></li>
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
                      <th>No</th>
                      <th>Brand Name</th>
                      <th>Brand Logo</th>
                      <th>Brand Order</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $select_brand="SELECT*FROM brand";
                        $result=$conn->query($select_brand);
                        $i=1;
                        while ($row=$result->fetch_assoc()) {
                           echo' <tr>
                           <td>'.$i.'</td>
                           <td>'.$row['brand_name'].'</td>
                           <td class="text-center"><img  src="images/brands/'.$row['brand_logo'].'" class="img-thumbnail" width="60" height="60"></td>
                           <td>'.$row['brand_order'].'</td>
                           <td>
                           <a href="add_brand.php?get_brand_id='.$row['brand_id'].'"  class="btn btn-success">Edit</a>
                           <button style="cursor:pointer;" class="btn btn-danger" data-href="manage_brand.php?brand_del_id='.$row['brand_id'].'" data-toggle="modal" data-target="#confirm-delete">Delete</button>
                      </td>
                         </tr> ';
                         $i++;
                        }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
<!-- The Modal -->
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