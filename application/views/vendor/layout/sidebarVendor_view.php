<!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url(); ?>theme/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?=$this->lang->line('sidebar_vendor/online');?></a>
        </div>
      </div>
      <!-- search form -->
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
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span><?=$this->lang->line('sidebar_vendor/dashboard');?></span>
          </a>
        </li>

        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i> <span><?=$this->lang->line('sidebar_vendor/settings')?></span>
          </a>
        </li> -->

        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span><?=$this->lang->line('sidebar_vendor/masters')?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> <?=$this->lang->line('sidebar_vendor/brands');?></a></li>
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> <?=$this->lang->line('sidebar_vendor/category');?></a></li>
            <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> <?=$this->lang->line('sidebar_vendor/sub_category');?></a></li>
            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> <?=$this->lang->line('sidebar_vendor/unit');?></a></li>
          </ul>
        </li> -->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-gift"></i>
            <span><?=$this->lang->line('sidebar_vendor/items')?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= site_url('vendor/item');?>"><i class="fa fa-circle-o"></i> <?=$this->lang->line('sidebar_vendor/item');?></a></li>
            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> <?=$this->lang->line('sidebar_vendor/item_rating');?></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span><?=$this->lang->line('sidebar_vendor/users')?></span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span><?=$this->lang->line('sidebar_vendor/orders')?></span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-motorcycle"></i>
            <span><?=$this->lang->line('sidebar_vendor/delivery_boy')?></span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart"></i>
            <span><?=$this->lang->line('sidebar_vendor/reports')?></span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->