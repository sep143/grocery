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
          <a href="#"><i class="fa fa-circle text-success"></i> <?=$this->lang->line('sidebar_admin/online');?></a>
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
        <li class="">
          <a href="<?=site_url('admin/dashboard');?>">
            <i class="fa fa-dashboard"></i> <span><?=$this->lang->line('sidebar_admin/dashboard');?></span>
          </a>
        </li>

        <li class="">
          <a href="<?=site_url('admin/setting');?>">
            <i class="fa fa-cogs"></i> <span><?=$this->lang->line('sidebar_admin/settings')?></span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span><?=$this->lang->line('sidebar_admin/masters')?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=site_url('admin/brands');?>"><i class="fa fa-circle-o"></i> <?=$this->lang->line('sidebar_admin/brands');?></a></li>
            <li><a href="<?=site_url('admin/category');?>"><i class="fa fa-circle-o"></i> <?=$this->lang->line('sidebar_admin/category')." / ".$this->lang->line('sidebar_admin/sub_category');?></a></li>
<!--             <li><a href="<?=site_url('admin/sub_category');?>"><i class="fa fa-circle-o"></i> <?=$this->lang->line('sidebar_admin/sub_category');?></a></li> -->
            <li><a href="<?=site_url('admin/units');?>"><i class="fa fa-circle-o"></i> <?=$this->lang->line('sidebar_admin/unit');?></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-gift"></i>
            <span><?=$this->lang->line('sidebar_admin/items')?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= site_url('admin/item');?>"><i class="fa fa-circle-o"></i> <?=$this->lang->line('sidebar_admin/item');?></a></li>
            <li><a href="<?=site_url('admin/item/item_rating');?>"><i class="fa fa-star"></i> <?=$this->lang->line('sidebar_admin/item_rating');?></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span><?=$this->lang->line('sidebar_admin/vendors')?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=site_url('admin/vendors');?>"><i class="fa fa-user"></i><span><?=$this->lang->line('sidebar_admin/vendors')?></span></a></li>
            <li><a href="<?=site_url('admin/vendors/vendors_rating');?>"><i class="fa fa-star"></i> <?=$this->lang->line('sidebar_admin/vendor_rating');?></a></li>
          </ul>
        </li>
        
        <li class="">
          <a href="<?=site_url('admin/orders');?>">
            <i class="fa fa-shopping-cart"></i>
            <span><?=$this->lang->line('sidebar_admin/orders')?></span>
          </a>
        </li>
        
        <li class="">
          <a href="<?=site_url('admin/delivery_boy');?>">
            <i class="fa fa-motorcycle"></i>
            <span><?=$this->lang->line('sidebar_admin/delivery_boy')?></span>
          </a>
        </li>
        
        <li class="">
          <a href="<?=site_url('admin/reports');?>">
            <i class="fa fa-bar-chart"></i>
            <span><?=$this->lang->line('sidebar_admin/reports')?></span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->