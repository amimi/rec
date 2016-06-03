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
            	<li class="<?php out(admin_menu_class('record', 'index'));?>">
            		<a href="/admin/record"><i class="fa fa-circle-o"></i>Record List</a>
            	</li>
            	<li class="<?php out(admin_menu_class('record', 'create'));?>">
            		<a href="/admin/record/create"><i class="fa fa-circle-o"></i>Create Record</a>
            	</li>
          </ul>
        </li>
        <li class="treeview <?php out(admin_menu_class('category'));?>">
        	<a href="/admin/category"><i class="fa fa-folder-o"></i> <span>Category</span></a>
        </li>
        <li class="treeview <?php out(admin_menu_class('tag'));?>">
        	<a href="/admin/tag"><i class="fa fa-tag"></i> <span>Tag</span></a>
        </li>
        <li class="treeview <?php out(admin_menu_class('user'));?>">
        	<a href="/admin/user"><i class="fa fa-user"></i> <span>User</span><i class="fa fa-angle-left pull-right"></i></a>
          	<ul class="treeview-menu">
            	<li class="<?php out(admin_menu_class('user', 'index'));?>">
            		<a href="/admin/user"><i class="fa fa-circle-o"></i>User List</a>
            	</li>
            	<li class="<?php out(admin_menu_class('user', 'create'));?>">
            		<a href="/admin/user/create"><i class="fa fa-circle-o"></i>Create User</a>
            	</li>
          </ul>
        </li>
        </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>