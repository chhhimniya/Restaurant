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

    <title>Restaurant</title>

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
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Detail Products</h4>
            <h2>Welcome to detail our products</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->
    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Look for detail of products</h2>
            </div>
          </div>
          <div class="col-md-6">
            
          <?php
            if (isset($_REQUEST['itemID'])) {
                $catID = $_REQUEST['itemID'];
                $stBrand="SELECT*FROM item 
                INNER JOIN cate_brand ON item.cate_brand_id=cate_brand.cate_brand_id
                INNER JOIN category ON category.cate_id=cate_brand.cate_id 
                INNER JOIN brand ON brand.brand_id=cate_brand.brand_id WHERE item_id=$catID";
                $qrBrand = $conn->query($stBrand) ;
                while($rowBrand = $qrBrand->fetch_assoc()){
                  echo '
                  <div class="left-content">
                        <ul class="featured-list">
                            <li>Product Name : '.$rowBrand['item_name'].'</li>
                            <li>Product Price : $'.$rowBrand['item_price'].'</li>
                            <li>Brand : '.$rowBrand['brand_name'].'</li>
                            <li>Product Description</li>
                            <p>'.$rowBrand['item_detail'].'</p>
                        </ul>
                        </div>
                    </div>
     
                  <div class="col-md-6">
                  <div class="right-image">
                    <img src="../backend/pages/images/products/'.$rowBrand['item_image'].'" alt="">
                  </div>
                </div>
                  ';
                }
            }
          ?>
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
                </div>
                <div class="col-md-4">
                  <a href="products.php" class="filled-button">Back to Menu</a>
                </div>
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
