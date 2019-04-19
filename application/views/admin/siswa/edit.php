<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
   <?= $title; ?>
    <small><?= $judul ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('admin/siswa'); ?>"><i class="fa fa-child"></i> Siswa</a></li>
    <li class="active"><?= $judul; ?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="row">
              <div class="col-lg-6" style="border-right: 0.1px solid #ccc;">
                <h3><i class="fa fa-arrow-right"></i> Data Siswa : </h3>
            <div class="form-group <?= form_error('nis') ? 'has-error' : '' ?>">
              <label for="nis"> Nis</label>
              <input type="number" name="nis" class="form-control" id="nis" placeholder="Enter Nis"  value="<?= set_value('nis') ? set_value('nis') : $siswa->nis ?>" >
              <?= form_error('nis', '<i class="text-danger">', '</i>') ?>
            </div><br>

          

             <div class="form-group <?= form_error('nama_siswa') ? 'has-error' : '' ?>">
              <label for="nama_siswa"> Nama Siswa</label>
              <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" placeholder="Enter Nama Siswa" value="<?= set_value('nama_siswa') ? set_value('nama_siswa') : $siswa->nama_siswa ?>">
               <?= form_error('nama_siswa', '<i class="text-danger">', '</i>') ?>
            </div><br>

          

             <div class="form-group <?= form_error('jenis_kelamin') ? 'has-error' : '' ?>">
              <label> Jenis Kelamin :&nbsp;&nbsp; 
                  <input type="radio" name="jenis_kelamin" class="flat-red" id="laki-laki" value="laki-laki" <?= ($siswa->jenis_kelamin == 'laki-laki') ? 'checked' : '' ?> > <label for="laki-laki">Laki-Laki</label>&nbsp;&nbsp;
                  <input type="radio" name="jenis_kelamin" class="flat-red" id="perempuan" value="perempuan" <?= ($siswa->jenis_kelamin == 'perempuan') ? 'checked' : '' ?> > <label for="perempuan">Perempuan</label>
                </label><br>
                <?= form_error('jenis_kelamin', '<i class="text-danger">', '</i>') ?>
              </div>
              <br>
            

            <div class="form-group <?= form_error('tempat_lahir') ? 'has-error' : '' ?>">
              <label for="tempat_lahir"> Tempat Lahir</label>
              <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Enter Tempat Lahir" value="<?= set_value('tempat_lahir') ? set_value('tempat_lahir') : $siswa->tempat_lahir ?>">
               <?= form_error('tempat_lahir', '<i class="text-danger">', '</i>') ?>
            </div><br>
          

             <div class="form-group <?= form_error('tanggal_lahir') ? 'has-error' : '' ?>">
              <label for="tanggal_lahir"> Tanggal Lahir</label>
              <input type="text" name="tanggal_lahir" class="form-control datepicker" id="tanggal_lahir" placeholder="Enter Tanggal Lahir" value="<?= set_value('tanggal_lahir') ? set_value('tanggal_lahir') : $siswa->tanggal_lahir ?>" autocomplete="off">
               <?= form_error('tanggal_lahir', '<i class="text-danger">', '</i>') ?>
            </div><br> 
          
            <div class="form-group <?= form_error('warga_negara') ? 'has-error' : '' ?>">
              <label for="warga_negara"> Warga Negara</label>
              <input type="text" name="warga_negara" class="form-control" id="warga_negara" placeholder="Enter Warga Negara" value="<?= set_value('warga_negara') ? set_value('warga_negara') : $siswa->warga_negara ?>">
               <?= form_error('warga_negara', '<i class="text-danger">', '</i>') ?>
            </div><br>
          
             <div class="form-group <?= form_error('agama') ? 'has-error' : '' ?>">
              <label for="agama">  Agama</label>
                <select name="agama" class="form-control">
                  <option value="">-- Pilih Agama --</option>
                  <option value="islam" <?= ($siswa->agama == 'islam') ? 'selected' :'' ?> >Islam</option>
                  <option value="kristen" <?= ($siswa->agama == 'kristen') ? 'selected' :'' ?> >Kristen</option>
                  <option value="katholik" <?= ($siswa->agama == 'katholik') ? 'selected' :'' ?> >Katholik</option>
                  <option value="hindu" <?= ($siswa->agama == 'hindu') ? 'selected' :'' ?> >Hindu</option>
                  <option value="budha" <?= ($siswa->agama == 'budha') ? 'selected' :'' ?> >Budha</option>
                </select>
               <?= form_error('agama', '<i class="text-danger">', '</i>') ?>
            </div><br>

             <div class="form-group <?= form_error('alamat_siswa') ? 'has-error' : '' ?>">
              <label for="alamat_siswa"> Alamat Siswa</label>
              <textarea rows="5" name="alamat_siswa" class="form-control" placeholder="Alamat Siswa"><?= set_value('alamat_siswa') ? set_value('alamat_siswa') : $siswa->alamat_siswa ?></textarea>
               <?= form_error('alamat_siswa', '<i class="text-danger">', '</i>') ?>
            </div><br>
          </div>

        <div class="col-lg-6" style="border-right: 0.1px solid #ccc;">
          <h3><i class="fa fa-arrow-right"></i> Data Orang Tua : </h3>
            <div class="form-group">
              <label for="nama_orang_tua"> Nama Orang Tua</label>
              <input type="text" name="nama_orang_tua" class="form-control" id="nama_orang_tua" placeholder="Enter Nama Orang Tua" value="<?= set_value('nama_orang_tua') ? set_value('nama_orang_tua') : $siswa->nama_orang_tua ?>">
               <?= form_error('nama_orang_tua', '<i class="text-danger">', '</i>') ?>
            </div><br>
          
            <div class="form-group">
              <label for="pekerjaan">  Pekerjaan</label>
              <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Enter Pekerjaan" value="<?= set_value('pekerjaan') ? set_value('pekerjaan') : $siswa->pekerjaan ?>">
               <?= form_error('pekerjaan', '<i class="text-danger">', '</i>') ?>
            </div><br>
          
              <div class="form-group">
              <label for="alamat_orang_tua"> Alamat Orang Tua</label>
              <textarea rows="5" name="alamat_orang_tua" class="form-control" placeholder="Alamat Orang Tua"><?= set_value('alamat_orang_tua') ? set_value('alamat_orang_tua') : $siswa->alamat_orang_tua ?></textarea>
               <?= form_error('alamat_orang_tua', '<i class="text-danger">', '</i>') ?>
            </div><br>
          <h3> <i class="fa fa-arrow-right"></i> Data Wali : </h3>
            <div class="form-group">
              <label for="nama_wali"> Nama Wali</label>
              <input type="text" name="nama_wali" class="form-control" id="nama_wali" placeholder="Enter Nama Wali" value="<?= set_value('nama_wali') ? set_value('nama_wali') : $siswa->nama_wali ?>">
               <?= form_error('nama_wali', '<i class="text-danger">', '</i>') ?>
            </div><br>
          
            <div class="form-group">
              <label for="pekerjaan_wali"> Pekerjaan Wali</label>
              <input type="text" name="pekerjaan_wali" class="form-control" id="pekerjaan_wali" placeholder="Enter Pekerjaan Wali"value="<?= set_value('pekerjaan_wali') ? set_value('pekerjaan_wali') : $siswa->pekerjaan_wali ?>">
               <?= form_error('pekerjaan_wali', '<i class="text-danger">', '</i>') ?>
            </div><br>
          
              <div class="form-group">
              <label for="alamat_wali"> Alamat Wali</label>
              <textarea rows="5" name="alamat_wali" class="form-control" placeholder="Alamat Wali"><?= set_value('alamat_wali') ? set_value('alamat_wali') : $siswa->alamat_wali ?></textarea>
            </div><br>
        </div>
        </div><br><br>
       
        <div class="row">
          <div class="col-lg-6"  style="border-right: 0.1px solid #ccc;">
             <h3><i class="fa fa-arrow-right"></i> Diterima Menjadi Siswa : </h3><br><br>
                <div class="form-group <?= form_error('tanggal_masuk') ? 'has-error' : '' ?>">
                  <label for="tanggal_masuk"> Mulai Tanggal </label>
                  <input type="text" name="tanggal_masuk" class="form-control datepicker" id="tanggal_masuk" placeholder="Tanggal Diterima Disekolah" value="<?= set_value('tanggal_masuk') ? set_value('tanggal_masuk') : $siswa->tanggal_masuk ?>" autocomplete="off">
                   <?= form_error('tanggal_masuk', '<i class="text-danger">', '</i>') ?>
                </div>
                <div class="form-group">
                  <label for="asal_sekolah"> Asal Sekolah</label>
                  <input type="text" name="asal_sekolah" class="form-control" id="asal_sekolah" placeholder="Enter Asal Sekolah" value="<?= set_value('asal_sekolah') ? set_value('asal_sekolah') : $siswa->asal_sekolah ?>">
                   <?= form_error('asal_sekolah', '<i class="text-danger">', '</i>') ?>
                </div>
              
                 <div class="form-group">
                  <label for="alamat_sekolah"> Alamat Sekolah</label>
                  <textarea rows="5" name="alamat_sekolah" class="form-control" placeholder="Alamat Sekolah"><?= set_value('alamat_sekolah') ? set_value('alamat_sekolah') : $siswa->alamat_sekolah ?></textarea>
                   <?= form_error('alamat_sekolah', '<i class="text-danger">', '</i>') ?>
                </div>
              
                  <div class="form-group">
                  <label for="nomor_sttb"> Nomor Sttb</label>
                  <input type="text" name="nomor_sttb" class="form-control" id="nomor_sttb" placeholder="Enter Nomor Sttb" value="<?= set_value('nomor_sttb') ? set_value('nomor_sttb') : $siswa->nomor_sttb ?>">
                   <?= form_error('nomor_sttb', '<i class="text-danger">', '</i>') ?>
                </div>
              
                  <div class="form-group">
                  <label for="tanggal_sttb"> Tanggal Sttb</label>
                  <input type="text" name="tanggal_sttb" class="form-control datepicker" id="tanggal_sttb" placeholder="Enter Tanggal Sttb" value="<?= set_value('tanggal_sttb') ? set_value('tanggal_sttb') : $siswa->tanggal_sttb ?>" autocomplete="off">
                   <?= form_error('tanggal_sttb', '<i class="text-danger">', '</i>') ?>
                </div>
          </div>
           <div class="col-lg-6">
            <h3><i class="fa fa-arrow-right"></i> Meninggalkan Sekolah : </h3><br><br>
              <div class="form-group">
              <label for="tanggal_meninggalkan_sekolah"> Tanggal Meninggalkan Sekolah</label>
              <input type="text" name="tanggal_meninggalkan_sekolah" class="form-control datepicker" id="tanggal_meninggalkan_sekolah" placeholder="Enter Tanggal Meninggalkan Sekolah" value="<?= set_value('tanggal_meninggalkan_sekolah') ? set_value('tanggal_meninggalkan_sekolah') : $siswa->tanggal_meninggalkan_sekolah ?>" autocomplete="off" >
               <?= form_error('tanggal_meninggalkan_sekolah', '<i class="text-danger">', '</i>') ?>
            </div><br>
          
              <div class="form-group">
              <label for="alasan_meninggalkan_sekolah"> Alasan Meninggalkan Sekolah</label>
              <textarea rows="5" name="alasan_meninggalkan_sekolah" class="form-control" placeholder="Alasan Meninggalkan Sekolah"><?= set_value('alasan_meninggalkan_sekolah') ? set_value('nama_siswa') : $siswa->nama_siswa ?></textarea>
               <?= form_error('alasan_meninggalkan_sekolah', '<i class="text-danger">', '</i>') ?>
            </div><br>
          <h3><i class="fa fa-arrow-right"></i> Tamat : </h3><br>
              <div class="form-group">
              <label for="tamat_nomor_sttb"> Tamat Nomor Sttb</label>
              <input type="text" name="tamat_nomor_sttb" class="form-control" id="tamat_nomor_sttb" placeholder="Enter Nomor Sttb" value="<?= set_value('tamat_nomor_sttb') ? set_value('tamat_nomor_sttb') : $siswa->tamat_nomor_sttb ?>">
               <?= form_error('tamat_nomor_sttb', '<i class="text-danger">', '</i>') ?>
            </div><br>
          
              <div class="form-group">
              <label for="tamat_tanggal_sttb"> Tamat Tanggal Sttb</label>
              <input type="text" name="tamat_tanggal_sttb" class="form-control datepicker" id="tamat_tanggal_sttb" placeholder="Enter Nomor Sttb" value="<?= set_value('tamat_tanggal_sttb') ? set_value('tamat_tanggal_sttb') : $siswa->tamat_tanggal_sttb ?>" autocomplete="off">
               <?= form_error('tamat_tanggal_sttb', '<i class="text-danger">', '</i>') ?>
            </div><br>
          </div>
        </div>
          
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="keterangan_lain"> Keterangan lain</label>
              <textarea rows="5" name="keterangan_lain" class="form-control" placeholder="Keterangan Lain"><?= set_value('keterangan_lain') ? set_value('keterangan_lain') : $siswa->keterangan_lain ?></textarea>
               <?= form_error('keterangan_lain', '<i class="text-danger">', '</i>') ?>
            </div><br>
          </div>
          <div class="col-lg-6">
             <div class="form-group">
              <label for="foto_siswa"> Foto Siswa</label>
              <input type="file" name="foto_siswa" class="form-control" id="foto_siswa" >
              <img src="<?= base_url('assets/siswa/').$siswa->foto_siswa ?>" class="img img-responsive img-thumbnail" style="width: 50%; height: 50%;">
            </div>
          </div>
        </div>
        <i class="text-warning"><b>*)Kosongkan Yang Tidak Perlu</b></i>
     
  
    <!-- /.box-body -->

          <div class="box-footer text-right">
            <a href="<?= base_url('admin/siswa') ?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>