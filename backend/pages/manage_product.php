<?php
    include 'conn.php';
    include 'header.php';
    include 'sidebar.php';
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
                           <td class="text-center"><img  src="images/brand/'.$row['item_image'].'" class="img-thumbnail" width="60" height="60"></td>
                           <td>'.$row['item_detail'].'</td>
                           <td><div class="btn-group" role="group" aria-label="Basic example">
                           <button type="button" class="btn btn-success btn-lg">Edit</button>
                           <button type="button" class="btn btn-danger btn-lg ">Delete</button>
                         </div></td>
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