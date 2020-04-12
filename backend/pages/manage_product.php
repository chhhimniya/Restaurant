<?php
    include 'conn.php';
    include 'header.php';
    include 'sidebar.php';
     if (isset($_REQUEST['get_cate_id'])) {
     $get_cate_id=$_REQUEST['get_cate_id'];

  } 

    $message_delete="";
    if (isset($_REQUEST['item_del_id'])) {
        echo $item_del_id=$_REQUEST['item_del_id'];
        $del_img=$conn->query("SELECT item_image FROM item WHERE item_id='".$_REQUEST['item_del_id']."'")->fetch_assoc();
        unlink("images/products/".$del_img['item_image']);
        $brand_delete="DELETE FROM item WHERE item_id=$item_del_id";
        if ($conn->query($brand_delete)===TRUE) {
            $message_delete='<div class="alert alert-success alert-dismissible fade show" id=
            "vsFadeOff">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><i class="fa fa-check-circle"></i></strong>Your data  has been deleted</div>';
            }
            else {
                $message_delete='<div class="alert alert-danger alert-dismissible fade show" id=
            "vsFadeOff">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><i class="fa fa-times"></i></strong>Your data  has not been deleted</div>'.$conn->error;
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
          <li class="breadcrumb-item">

           <button type="button" onclick="printJS('sampleTable', 'php')">
              Print Form
           </button></li>
        </ul>
      </div>
      <div class="tile">
      <div class="container-fluid">
       
      <?php
        echo $message_delete;
      ?>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Product Name</th>
                      <th>Category</th>
                      <th>Brand</th>
                      <th>Price</th>
                      <th>Image</th>
                      <th>Detial</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                        $select_item="SELECT*FROM item 
                        INNER JOIN cate_brand ON item.cate_brand_id=cate_brand.cate_brand_id
                        INNER JOIN category ON category.cate_id=cate_brand.cate_id 
                        INNER JOIN brand ON brand.brand_id=cate_brand.brand_id
                        ";
                        $result=$conn->query($select_item);
                        $i=1;
                          while ($row=$result->fetch_assoc()) {
                         
                            echo' <tr>
                            <td>'.$i.'</td>
                            <td>'.$row['item_name'].'</td>
                            <td>'.$row['cate_name'].'</td>
                            <td>'. $row['brand_name'].'</td>
                            <td>'.$row['item_price'].'</td>
                            <td class="text-center"><img  src="images/products/'.$row['item_image'].'" class="img-thumbnail" width="80" height="60"></td>
                            <td>'.$row['item_detail'].'</td>
                            <td>
                            <a href="add_product.php?get_product='.$row['item_id'].'&get_cate_id='.$row['cate_id'].'"  class="btn btn-success">Edit</a>
                            
                            <button style="cursor:pointer;" class="btn btn-danger " data-href="manage_product.php?item_del_id='.$row['item_id'].'" data-toggle="modal" data-target="#confirm-delete">Delete</button>
                          </td>
                          </tr> ';
                          $i++;
                         }
                    ?>

              <?php
                    // if(isset($_REQUEST['get_product'])){
                    //   $catID = $_REQUEST['get_product'];
                    //   if($catID==0){
                    //     $stItem = "SELECT * FROM item";  
                    //   }
                    //   else{
                    //     $stItem = "SELECT * FROM item WHERE cate_brand_id IN (SELECT cate_brand_id FROM cate_brand WHERE cate_id=$catID)";
                    //   }
                    // }
                    // else{
                    //   $stItem = "SELECT * FROM item";
                    // }
                    
                    // $qrItem = $conn->query($stItem);
                    // if($qrItem->num_rows>0){
                    //   $i=1;
                    //   while($rowItem = $qrItem->fetch_assoc()){
                    //     $getCatBrand = $conn->query("SELECT * FROM cate_brand WHERE cate_brand_id=".$rowItem['cbID'])->fetch_assoc();
                    //     $getCat = $conn->query("SELECT * FROM `tblCategory` WHERE catID=".$getCatBrand['catID'])->fetch_assoc();
                    //     $getBrand = $conn->query("SELECT * FROM `tblBrand` WHERE brandID=".$getCatBrand['brandID'])->fetch_assoc();
                    //     echo '
                    //   <tr>
                    //     <td> '.$i.' </td>
                    //     <td> '.$rowItem['itemName'].' </td>
                    //     <td> '.$getCat['catName'].' </td>
                    //     <td> '.$getBrand['brandName'].' </td>
                    //     <td> '.$rowItem['itemPrice'].' </td>
                    //     <td> <img src="../images/product/'.$rowItem['itemImage'].'" height="50px"/>  </td>
                    //     <td> 
                    //       <a href="index.php?catID='.$getCatBrand['catID'].'&itemID='.$rowItem['itemID'].'" class="btn btn-sm btn-warning"> SELECT </a>
                    //     </td>
                    //   </tr>
                    //   ';
                    //   $i++;
                    //   }
                    // }
                    // else{
                    //   echo '
                    //   <tr>
                    //     <td colspand="7"> No data selected</td>
                    //   </tr>
                    //   ';
                    // }
                    ?>
                  </tbody>
                </table>
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