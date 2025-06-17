<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="<?php echo base_url('admin/dashboard') ?>">
            <i class="fa fa-hospital-o"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url('admin/barang') ?>">
            <i class="fa fa-user-md"></i> <span>Bidan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url('admin/admin/toko') ?>">
            <i class="fa fa-wheelchair"></i> <span>Pasien</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url('admin/ruangan') ?>">
            <i class="fa fa-bed"></i> <span>Ruangan</span>
          </a>
        </li>
        <li class="treeview">
           <a href="<?php echo base_url('admin/farmasi') ?>">
            <i class="fa fa-medkit"></i> <span>Farmasi</span>
          </a>
        </li>
        <li class="nav-item">
    <a href="<?php echo site_url('admin/rekammedis'); ?>">
        <i class="fa fa-heartbeat"></i> <span>Rekam Medis</span>
    </a>
</li>
        <li class="nav-item">
            <a href="<?php echo site_url('admin/laporan'); ?>">
                <i class="fa fa-list-alt"></i> <span>Laporan</span>
            </a>
        </li>
        <li class="treeview">  
          <a href="<?php echo base_url('admin/admin/laporanbidan') ?>">
            <i class="fa fa-reply-all"></i> <span>Feedback</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url('welcome/logout') ?>">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
