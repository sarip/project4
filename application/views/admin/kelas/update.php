<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
   <?= $title; ?>
    <small><?= $judul ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('admin/kelas'); ?>"><i class="glyphicon glyphicon-stats"></i> Kelas</a></li>
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
              <div class="col-lg-6">
                
            <div class="form-group <?= form_error('nama_kelas') ? 'has-error' : '' ?>">
              <label for="nama_kelas"> Nama kelas</label>
              <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" placeholder="Enter Nama kelas"  value="<?= set_value('nama_kelas') ? set_value('nama_kelas') : $kelas->nama_kelas ?>">
              <?= form_error('nama_kelas', '<small><i class="text-danger">', '</i></small>') ?>
            </div><br>
            <!-- /.box-body -->

          <div class="box-footer text-right">
            <a href="<?= base_url('admin/kelas') ?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>