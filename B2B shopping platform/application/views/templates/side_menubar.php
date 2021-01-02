<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">  
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li id="dashboardMainMenu">
          <a href="<?php echo base_url('dashboard')?>">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
            <li class="treeview" id="mainUserNav">
            <a href="#">
              <i class="fa fa-user-o"></i>
              <span>Users</span>
              <span class="pull-right-container">
                <i class="fa  fa-angle-down  pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li id="manageUserNav"><a href="<?php echo base_url('Users/adminindex') ?>"><i class="fa fa-circle-o"></i>Adminstrators</a></li>

                <li id="manageGroupNav"><a href="<?php echo base_url('Users/retailindex') ?>"><i class="fa fa-circle-o"></i>Retailers</a></li>

                <li id="manageGroupNav"><a href="<?php echo base_url('Users/wholesaleindex') ?>"><i class="fa fa-circle-o"></i>Wholesalers</a></li>
            </ul>
          </li>
            <li class="treeview" id="mainProductNav">
              <a href="#">
                <i class="fa fa-cube"></i>
                <span>Items</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                
          
            <li id="brandNav">
              <a href="<?php echo base_url('Filter/') ?>">
                <i class="fa fa-circle-o"></i> <span>Filter</span>
              </a>
            </li>

            <li id="categoryNav">
              <a href="<?php echo base_url('category/') ?>">
                <i class="fa fa-circle-o"></i> <span>Category</span>
              </a>
            </li>
           </ul>
            </li>

            <li id="reportNav">
              <a href="<?php echo base_url('Reports') ?>">
                <i class="glyphicon glyphicon-stats"></i> <span>Reports</span>
              </a>
            </li>
              
          <li><a href="<?php echo base_url('users/profile/') ?>"><i class="fa fa-user-plus"></i> <span>Profile</span></a></li>
 
        <li><a href="<?php echo base_url('auth/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>