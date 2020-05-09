<?php
    include 'conn.php';
    include 'header.php';
    include 'sidebar.php';
    //  $message_delete="";
    // if (isset($_REQUEST['del_menu'])) {
    //     echo $del_menu=$_REQUEST['del_menu'];
    //     $menu_delete="DELETE FROM menu_item WHERE menu_item_id=$del_menu";
    //     if ($conn->query($menu_delete)===TRUE) {
    //         $message_delete='<div class="alert alert-success alert-dismissible fade show " id="menu">
    //         <button type="button" class="close" data-dismiss="alert">&times;</button>
    //     <strong><i class="fa fa-check-circle"></i></strong>Your data  has been deleted</div>';
    //         }
    //         else {
    //             $message_delete='<div class="alert alert-danger alert-dismissible fade show" " id="menu">
    //         <button type="button" class="close" data-dismiss="alert">&times;</button>
    //     <strong><i class="fa fa-times"></i></strong>Your data  has not been deleted</div>'.$conn->error;
    //         }       
    // }
?>
<main class="app-content">
      <div class="app-title">
       
        <div>
          <h1><i class="fa fa-dashboard"></i>View Contact</h1>
        </div>
            </div>
      <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Gmail</th>
                      <th>Subject</th>
                      <th>Message</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        $select_contact="SELECT*FROM contact";
                        $result=$conn->query($select_contact);
                        $i=1;
                        while ($row=$result->fetch_assoc()) {
                           echo' <tr>
                           <td>'.$i.'</td>
                           <td>'.$row['name'].'</td>
                           <td>'.$row['gmail'].'</td>
                          <td>'.$row['subject'].'</td>
                          <td>'.$row['message'].'</td>
                         </tr> ';
                         $i++;
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