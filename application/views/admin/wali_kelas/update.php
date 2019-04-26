<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
   <?= $title; ?>
    <small><?= $judul ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('admin/wali_kelas'); ?>"><i class="fa fa-list"></i> Wali Kelas</a></li>
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
        <form role="form" action="" method="post">
          <div class="box-body">
            <div class="row">
              <div class="col-lg-6">
                
            <div class="form-group <?= form_error('id_guru') ? 'has-error' : '' ?>">
              <label for="id_guru"> Nama Guru</label>
              <select name="id_guru" class="form-control">
                <option value="">-- Pilih Guru --</option>
                <?php foreach ($guru as $key): ?>
                  <option value="<?= $key->id_guru ?>" <?= ($waliKelas->id_guru == $key->id_guru) ? 'selected' : '' ?>><?= $key->nama_guru ?></option>
                <?php endforeach ?>

              </select>
              <?= form_error('id_guru', '<small><i class="text-danger">', '</i></small>') ?>
            </div><br>

            <div class="form-group <?= form_error('id_kelas') ? 'has-error' : '' ?>">
              <label for="id_kelas"> Kelas</label>
              <select name="id_kelas" class="form-control">
                <option value="">-- Pilih Kelas --</option>
                <?php foreach ($kelas as $key): ?>
                  <option value="<?= $key->id_kelas ?>" <?= ($waliKelas->id_kelas == $key->id_kelas) ? 'selected' : '' ?>><?= $key->nama_kelas ?></option>
                <?php endforeach ?>

              </select>
              <?= form_error('id_kelas', '<small><i class="text-danger">', '</i></small>') ?>
            </div><br>

            <div class="form-group <?= form_error('id_jurusan') ? 'has-error' : '' ?>">
              <label for="id_jurusan"> Jurusan</label>
              <select name="id_jurusan" class="form-control">
                <option value="">-- Pilih Jurusan --</option>
                <?php foreach ($jurusan as $key): ?>
                  <option value="<?= $key->id_jurusan ?>"<?= ($waliKelas->id_jurusan == $key->id_jurusan) ? 'selected' : '' ?>><?= $key->nama_jurusan ?></option>
                <?php endforeach ?>

              </select>
              <?= form_error('id_jurusan', '<small><i class="text-danger">', '</i></small>') ?>
            </div><br>
            <!-- /.box-body -->

          <div class="box-footer text-right">
            <a href="<?= base_url('admin/wali_kelas') ?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>