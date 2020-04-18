<?php
  include '../backend/pages/conn.php';
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Sixteen Clothing Products</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

  <?php
    include 'menu.php';
  ?>

    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Features producs</h4>
              <h2>Our products</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                  <li class="active" data-filter="*"><a href="products.php">All Products</a></li>
                 <!--  <li data-filter=".des">Featured</li>
                  <li data-filter=".dev">Flash Deals</li>
                  <li data-filter=".gra">Last Minute</li> -->
                  <?php  
                $categories="SELECT*FROM category ";
                  $result=$conn->query($categories) or die($conn->error);;
                  while ($row=$result->fetch_assoc())
                  {
                    echo '<li data-filter=".des"><a  class="treeview-item" href="products.php?catID='.$row['cate_id'].'"> '.$row['cate_name'].' </a></li>';
                  }
              ?>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <!-- <?php
              if(!isset($_REQUEST['catID'])){
                $stBrand = "SELECT * FROM brand ";
                $qrBrand = $conn->query($stBrand);
                while($rowBrand = $qrBrand->fetch_assoc()){
                  echo '
                  <div class="col-md-2">
                    <a href="products.php?brandID='.$rowBrand['brand_id'].'">
                      <img src="../backend/pages/images/brands/'.$rowBrand['brand_logo'].'" width="100" height="100"/>
                    </a>
                  </div>
                  ';
                }
              }
              else{
                $catID = $_REQUEST['catID'];
                $stBrand = "SELECT `cate_brand`.*, brand.brand_name, brand.brand_logo FROM `cate_brand` JOIN brand ON cate_brand.brand_id=brand.brand_id WHERE cate_brand_id=$catID";
                $qrBrand = $conn->query($stBrand);
                while($rowBrand = $qrBrand->fetch_assoc()){
                  echo '
                  <div class="col-md-2">
                    <a href="products.php?catID='.$catID.'&brandID='.$rowBrand['brand_id'].'">
                      <img src="../backend/pages/images/brands/'.$rowBrand['brand_logo'].'" width="100" height="100"/>
                    </a>
                  </div>
                  ';
                }
              }
              
              ?> -->
              
              
            </div>
          </div>

          <div class="col-md-12">
            <div class="filters-content">
                <div class="row grid">
                    
                  
                  
                  <?php
                    if(isset($_REQUEST['catID'])){
                      if(isset($_REQUEST['brandID'])){
                        $brandID = $_REQUEST['brandID'];
                        $stProduct ="SELECT * FROM `item` WHERE cate_brand_id IN (SELECT cate_brand_id FROM cate_brand WHERE cate_id=$catID AND brandID=$brandID)";
                      }
                      else{
                        $stProduct ="SELECT * FROM `item` WHERE cate_brand_id IN (SELECT cate_brand_id FROM cate_brand WHERE cate_id=$catID)";
                      }
                    }
                    else{
                      if(isset($_REQUEST['brandID'])){
                        $brandID = $_REQUEST['brandID'];
                        $stProduct ="SELECT * FROM `item` WHERE cate_brand_id IN (SELECT cate_brand_id FROM cate_brand WHERE brand_id=$brandID)";
                      }
                      else{
                        $stProduct ="SELECT * FROM item ORDER BY item_id DESC"; 
                      }
                    }
                    $qrProduct = $conn->query($stProduct);
                    while($rowProduct = $qrProduct->fetch_assoc()){
                      $totalChar = strlen($rowProduct['item_name']);
                      if($totalChar>22) $proName = substr($rowProduct['item_name'],0,22) .'...';
                      else $proName = $rowProduct['item_name'];
                      
                      echo '
                      <div class="col-lg-4 col-md-4 all des">
                        <div class="product-item">
                          <a href="products_detail.php?itemID='.$rowProduct['item_id'].'"><img src="../backend/pages/images/products/'.$rowProduct['item_image'].'" alt="" width="300" height="400"></a>
                          <div class="down-content">
                            <a href="products.php?itemID='.$rowProduct['item_id'].'"><h4> '.$proName.' </h4></a>
                            <h6>$'.$rowProduct['item_price'].'</h6>
                           
                          </div>
                        </div>
                      </div>
                      ';
                    }
                    ?>
                </div>
            </div>
          </div>
         
        </div>
      </div>
    </div>

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.
            
            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
