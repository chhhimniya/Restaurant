<?php
  include 'top_header.php';
?>
<!-- About Section -->
<!-- Restaurant Menu Section -->
<div id="restaurant-menu">
<!-- Contact Section -->
  <?php
   if (isset($_REQUEST['get_page_menu_id'])) {
    $get_content_id=$_REQUEST['get_page_menu_id'];
     $select_content="SELECT*FROM content WHERE content_menu=$get_content_id";
        $result=$conn->query($select_content);
        while ($row=$result->fetch_assoc()) {
            echo '<h1>'.$row['content_title'].'</h1>';
            echo '<p>'.$row['content_description'].'</hp>';
        }
   }
  ?>
  <?php
                  $breakfast_sql="SELECT*FROM item ";
                  $result=$conn->query($breakfast_sql);
                  while ($row=$result->fetch_assoc()) {
                   echo '
                  <img  src="../frontend/backend/pages/images/products/7166623199_764d5f101c_o.jpg">
                   ';
                  }
              ?>
<?php
  include 'footer.php';
?>
