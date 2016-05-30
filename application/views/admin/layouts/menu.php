  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php out(admin_image($login_user['image'])); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php out($login_user['name']); ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="<?php out(admin_menu_class('top'));?>">
        	<a href="/admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
        <li class="treeview <?php out(admin_menu_class('record'));?>">
        	<a href="/admin/record"><i class="fa fa-book"></i> <span>Record</span><i class="fa fa-angle-left pull-right"></i></a>
          	<ul class="treeview-menu">
            	<li><a href="/admin/record">Record List</a></li>
            	<li><a href="/admin/record/create">Create Record</a></li>
          </ul>
        </li>
        <li class="treeview <?php out(admin_menu_class('user'));?>">
        	<a href="/admin/user"><i class="fa fa-user"></i> <span>User</span><i class="fa fa-angle-left pull-right"></i></a>
          	<ul class="treeview-menu">
            	<li><a href="/admin/user">User List</a></li>
            	<li><a href="/admin/user/create">Create User</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>