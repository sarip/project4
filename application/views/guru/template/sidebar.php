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
          <script>
            var myVar;
            var url = window.location.href;
            myVar = setInterval(function() {
                myTimer();
            }, 1000);

            function myTimer() {
                var d = new Date();
                var t = d.toLocaleTimeString();
                $('.waktu').html('<i class="fa fa-clock-o "></i> ' + t);
            }
          </script>
          <a href="#"><b class="text-primary waktu"></b></a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php $link = $this->uri->segment(2); ?>
        <li <?= ($link == '') ? 'class="active-active"' : '' ?>><a href="<?= base_url('guru') ?>" ><i class="fa fa-home"></i> Home</a></li>
        <li <?= ($link == 'mengajar') ? 'class="active-active"' : '' ?>><a href="<?= base_url('guru/mengajar/').md5($this->session->userdata('id_guru')) ?>"><i class="fa fa-list"></i>  Mengajar</a></li>
        <?php if ($this->db->get_where('wali_kelas', ['id_guru' => $this->session->userdata('id_guru')])->num_rows() > 0): ?>
        <li <?= ($link == 'wali_kelas' || $link == 'detail_siswa' || $link == 'absen_siswa') ? 'class="active-active"' : '' ?>><a href="<?= base_url('guru/wali_kelas/').md5($this->session->userdata('id_guru')) ?>"><i class="fa fa-user"></i>  Wali Kelas</a></li>
        <?php endif ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper container-fluid">