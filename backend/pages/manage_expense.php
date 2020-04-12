<?php
    include 'conn.php';
    include 'header.php';
    include 'sidebar.php';
     $message_delete="";
    if (isset($_REQUEST['expense_del_id'])) {
        echo $expense_del_id=$_REQUEST['expense_del_id'];
        $expense_delete="DELETE FROM expense WHERE expense_id=$expense_del_id";
        if ($conn->query($expense_delete)===TRUE) {
            $message_delete='<div class="alert alert-success alert-dismissible fade " id="expense">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><i class="fa fa-check-circle"></i></strong>Your data  has been deleted</div>';
            }
            else {
                $message_delete='<div class="alert alert-danger alert-dismissible fade" id="expense">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><i class="fa fa-times"></i></strong>Your data  has not been deleted</div>'.$conn->error;
            }       
    }
?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Manage Expense</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Manage Expense</a></li>
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
                      <th>Title</th>
                      <th>Price</th>
                      <th>Details</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        $select_expense="SELECT*FROM expense";
                        $result=$conn->query($select_expense);
                        $i=1;
                        while ($row=$result->fetch_assoc()) {
                           echo' <tr>
                           <td>'.$i.'</td>
                           <td>'.$row['expense_title'].'</td>
                           <td>'.$row['expense_price'].'</td>
                           <td>'.$row['expense_description'].'</td>
                           <td class="text-center ">
                           <a href="add_expense.php?get_expense='.$row['expense_id'].'"  class="btn btn-success">Edit</a>
                            
                            <button style="cursor:pointer;" class="btn btn-danger " data-href="manage_expense.php?expense_del_id='.$row['expense_id'].'" data-toggle="modal" data-target="#confirm-delete">Delete</button>
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