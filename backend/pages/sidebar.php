<?php
  include 'conn.php';
  $select_admin="SELECT*FROM admin";
  $result=$conn->query($select_admin);
  $row=$result->fetch_assoc();
?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name">
           Admin
          </p>
        </div>
      </div> 
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <!-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Fontend</span><i class="treeview-indicator fa fa-angle-right"></i></a>
         
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="manage_homepage.php"><i class="icon fa fa-circle-o"></i>HomePage</a></li>
            <li><a class="treeview-item" href="manage_menu.php"><i class="icon fa fa-circle-o"></i>Menu</a></li>
            <li><a class="treeview-item" href="manage_content.php"><i class="icon fa fa-circle-o"></i>Conent</a></li>
          </ul>
        </li> -->
         <li><a class="treeview-item" href="manage_home.php"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Home</span></a></li>
         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Chef</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="add_chef.php"><i class="icon fa fa-circle-o"></i>New Chef</a></li>
            <li><a class="treeview-item" href="manage_chef.php"><i class="icon fa fa-circle-o"></i>Manage Chef</a></li>
          </ul>
        </li>
        <!-- <li><a class="treeview-item" href="manage_chef.php"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Manage Chef</span></a></li> -->
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Add Product</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li>
                <?php
              $stCat = "SELECT * FROM `category` order by cate_id asc";
              $qrCat = $conn->query($stCat);
              while($rowCat = $qrCat->fetch_assoc()){
                echo '<a  class="treeview-item" href="add_product.php?get_cate_id='.$rowCat['cate_id'].'"> '.$rowCat['cate_name'].' </a>';
              }
              ?>
             </li>
          </ul>
        </li>
        <li><a class="treeview-item" href="manage_product.php"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Product List</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Brand</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="add_brand.php"><i class="icon fa fa-circle-o"></i>New Brand</a></li>
            <li><a class="treeview-item" href="manage_brand.php"><i class="icon fa fa-circle-o"></i>Manage Brand</a></li>
          </ul>
        </li>
          <li><a class="treeview-item" href="contact.php"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Conact List</span></a></li>
      </ul>
    </aside>