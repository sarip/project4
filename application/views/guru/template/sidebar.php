 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url() ?>assets/guru/<?= $this->session->userdata('foto') ?>" class="img-circle" alt="User Image" style="height: 50px; width: 50px;">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('nama_guru') ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php $link = $this->uri->segment(2); ?>
        <li><a href="<?= base_url('guru') ?>" ><i class="fa fa-home"></i> Home</a></li>
        <li><a href="<?= base_url('guru/mengajar/').md5($this->session->userdata('id_guru')) ?>"><i class="fa fa-list"></i>  Mengajar</a></li>
        <?php if ($this->db->get_where('wali_kelas', ['id_guru' => $this->session->userdata('id_guru')])->num_rows() > 0): ?>
        <li><a href="<?= base_url('guru/wali_kelas/').md5($this->session->userdata('id_guru')) ?>"><i class="fa fa-user"></i>  Wali Kelas</a></li>
        <?php endif ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper container-fluid">