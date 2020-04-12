
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="" height="50" width="50" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">John Doe</p>
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Fontend</span><i class="treeview-indicator fa fa-angle-right"></i></a>
         
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="manage_menu.php"><i class="icon fa fa-circle-o"></i>Menu</a></li>
            <li><a class="treeview-item" href="manage_content.php"><i class="icon fa fa-circle-o"></i>Conent</a></li>
          </ul>
        </li>
         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Expense</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="add_expense.php"><i class="icon fa fa-circle-o"></i>New Expense</a></li>
            <li><a class="treeview-item" href="manage_expense.php"><i class="icon fa fa-circle-o"></i>Manage Expense</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Product</span><i class="treeview-indicator fa fa-angle-right"></i></a>
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

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Setting</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="blank-page.html"><i class="icon fa fa-circle-o"></i>User</a></li>
            <li><a class="treeview-item" href="page-login.html"><i class="icon fa fa-circle-o"></i>Permission</a></li>
            <li><a class="treeview-item" href="page-lockscreen.html"><i class="icon fa fa-circle-o"></i>Invoice</a></li>
            <li><a class="treeview-item" href="page-user.html"><i class="icon fa fa-circle-o"></i>Report</a></li>
          </ul>
        </li>
         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Reporting</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="blank-page.html"><i class="icon fa fa-circle-o"></i>Product</a></li>
            <li><a class="treeview-item" href="page-login.html"><i class="icon fa fa-circle-o"></i>Expense</a></li>
            <li><a class="treeview-item" href="page-lockscreen.html"><i class="icon fa fa-circle-o"></i>Brand</a></li>
            <li><a class="treeview-item" href="page-user.html"><i class="icon fa fa-circle-o"></i>Sale</a></li>
          </ul>
        </li>
        <li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Docs</span></a></li>
      </ul>
    </aside>