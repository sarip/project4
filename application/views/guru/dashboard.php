<section class="content">
  <div class="row">
     
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
      <a href="<?= base_url('guru/wali_kelas/'.md5($this->session->userdata('id_guru'))) ?>"><div class="info-box bg-green">
        
        <span class="info-box-icon"><i class="fa fa-user"></i> <sup style="font-size: 15px;"><?= @$this->db->get_where('siswa', ['id_jurusan' => $wali_kelas->id_jurusan, 'id_kelas' => $wali_kelas->id_kelas])->num_rows() ?></sup></span>
          <div class="info-box-content">
            <span class="info-box-text">Wali Kelas</span>
            <span class="info-box-number"><?= @$wali_kelas->nama_kelas . ' - ' . @$wali_kelas->nama_jurusan ?></span>
            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description"></span>
          </div>
      </div></a>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <a href="<?= base_url('guru/mengajar/'.md5($this->session->userdata('id_guru'))) ?>"><div class="info-box bg-maroon">
        <span class="info-box-icon"><i class="fa fa-list"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Mengajar</span>
            <span class="info-box-number"><?= $mengajar ?> Pelajaran</span>
            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description"></span>
          </div>
      </div></a>
    </div>
  </div>
</section>