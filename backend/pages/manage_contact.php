<?php
    include 'conn.php';
    include 'header.php';
    include 'sidebar.php';
     $message_delete="";
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
          <h1><i class="fa fa-dashboard"></i> Manage Content</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <a class="btn btn-success" type="submit" name="btn_add_menu" href="add_content.php"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Content</a>
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
                      <th>Name</th>
                      <th>Gmail</th>
                      <th>Message</th>
                      <th>Action</th>
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
                           <td>'.$row['message'].'</td>
                           <td class="text-center ">
                           <div class="btn-group mt-3">
                              <a href=""  class="btn btn-success">Edit</a>

                               <button style="cursor:pointer;" class="btn btn-danger" data-href="" data-toggle="modal" data-target="#confirm-delete">Delete</button>
                           </div>
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