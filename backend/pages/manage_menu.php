<?php
    include 'conn.php';
    include 'header.php';
    include 'sidebar.php';
?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Manage Menu</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Manage Menu</a></li>
        </ul>
      </div>
      <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Menu Name</th>
                      <th>Menu Order</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        $select_item="SELECT*FROM menu_item";
                        $result=$conn->query($select_item);
                        while ($row=$result->fetch_assoc()) {
                           echo' <tr>
                           <td>'.$row['menu_item_id'].'</td>
                           <td>'.$row['menu_item_name'].'</td>
                           <td>'.$row['menu_item_order'].'</td>
                           <td class="text-center ">
                           <div class="btn-group mt-3">
                              <a href="add_menu.php?get_menu_id='.$row['menu_item_id'].'"  class="btn btn-warning  mr-2"><i class="fa fa-pencil "></i> </a>
                              <a href=""  class="btn btn-danger  mr-2"><i class="fa fa-trash "></i> </a>
                           </div>
                       </td>
                         </tr> ';
                        }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </main>
    <?php
     include 'footer.php';
    ?>