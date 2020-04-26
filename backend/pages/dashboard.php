    <?php
    include 'conn.php';
    include 'header.php';
    include 'sidebar.php';
   
    ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h2>Users</h2>
               <h3>
                 <?php
                    $query = "SELECT*FROM admin"; 
      
                // Execute the query and store the result set 
                $result = mysqli_query($conn, $query); 
                $row = mysqli_num_rows($result); 
                    echo $row;
                ?>
            </h3>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h2>Products</h2>
               <h3>
                 <?php
                    $query = "SELECT*FROM item"; 
      
                // Execute the query and store the result set 
                $result = mysqli_query($conn, $query); 
                $row = mysqli_num_rows($result); 
                    echo $row;
                ?>
            </h3>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h2>Brands</h2>
               <h3>
                 <?php
                    $query = "SELECT*FROM brand"; 
      
                // Execute the query and store the result set 
                $result = mysqli_query($conn, $query); 
                $row = mysqli_num_rows($result); 
                    echo $row;
                ?>
            </h3>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h2>categories</h2>
              <h3>
                 <?php
                    $query = "SELECT*FROM category"; 
      
                // Execute the query and store the result set 
                $result = mysqli_query($conn, $query); 
                $row = mysqli_num_rows($result); 
                    echo $row;
                ?>
            </h3>
            </div>
          </div>
        </div>
      </div>
     
    </main>
    <?php
    include 'footer.php';
    ?>