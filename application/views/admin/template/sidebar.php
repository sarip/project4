 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url() ?>assets/img/<?= $this->session->userdata('foto') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('fullname') ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php $link = $this->uri->segment(2); ?>
        <li <?= $link == '' ? 'class="active-active"' : '' ?>><a href="<?= base_url('admin') ?>" ><i class="fa fa-home"></i> Home</a></li>
        <li <?= $link == 'biodata' ? 'class="active-active"' : '' ?>><a href="<?= base_url('admin/biodata/') ?>" ><i class="fa fa-eye"></i> Biodata</a></li>
         <li <?= $link == 'extrakurikuler' || $link == 'insert_extrakurikuler' || $link == 'update_extrakurikuler' ? 'class="active-active"' : '' ?>><a href="<?= base_url('admin/extrakurikuler') ?>" ><i class="fa  fa-black-tie"></i> Ekstrakulikuler</a></li>
        <li <?= $link == 'portfolio' || $link == 'insert_portfolio' || $link == 'update_portfolio'? 'class="active-active"' : '' ?>><a href="<?= base_url('admin/portfolio/') ?>" ><i class="fa fa-camera"></i> Portfolio</a></li>
        <li <?= $link == 'kelas' || $link == 'insert_kelas' || $link == 'update_kelas'? 'class="active-active"' : '' ?>><a href="<?= base_url('admin/kelas') ?>" ><i class="glyphicon glyphicon-stats"></i>  Kelas</a></li>
        <li <?= $link == 'jurusan' || $link == 'insert_jurusan' || $link == 'update_jurusan'? 'class="active-active"' : '' ?>><a href="<?= base_url('admin/jurusan') ?>" ><i class="fa fa-list"></i>  Program Keahlian</a></li>
        <li <?= $link == 'pelajaran' || $link == 'insert_pelajaran' || $link == 'update_pelajaran'? 'class="active-active"' : '' ?>><a href="<?= base_url('admin/pelajaran') ?>" ><i class="glyphicon glyphicon-list-alt"></i>  Pelajaran</a></li>
        <li <?= $link == 'guru' || $link == 'insert_guru' || $link == 'update_guru'? 'class="active-active"' : '' ?>><a href="<?= base_url('admin/guru') ?>" ><i class="fa fa-users"></i>  Guru</a></li>
        <li <?= $link == 'wali_kelas' || $link == 'insert_wali_kelas' || $link == 'update_wali_kelas'? 'class="active-active"' : '' ?>><a href="<?= base_url('admin/wali_kelas') ?>" ><i class="fa fa-user"></i>  Wali kelas</a></li>
        <li <?= $link == 'siswa' || $link == 'insert_siswa' || $link == 'update_siswa'? 'class="active-active"' : '' ?>><a href="<?= base_url('admin/siswa') ?>" ><i class="fa fa-child"></i>  Siswa</a></li>
        <li <?= $link == 'nilai' || $link == 'insert_nilai' || $link == 'update_nilai'? 'class="active-active"' : '' ?>><a href="<?= base_url('admin/nilai') ?>" ><i class="fa fa-pencil"></i>  Nilai</a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('') ?>"><i class="fa fa-circle-o"></i>Table</a></li>
          </ul>
        </li>
        
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper container-fluid">