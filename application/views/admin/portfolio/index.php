 <section class="content-header">
      <h1><?= $title; ?> <small><?= $judul; ?></small></h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-list"></i> Master</li>
        <li><a href="<?= base_url('admin/portfolio') ?>"> <?= $title; ?></a></li>
        <li class="active"><?= $judul; ?></li>
      </ol>
</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="<?= base_url('admin/insert_portfolio') ?>" title="Tambah Data Portfolio" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Portfolio</a>
             
            </div>
            <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table class="table table-bordered table-hover" id="table">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Foto</th>
                          <th>Title</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($portfolio as $key): ?>
                        <tr>
                          <td><?= $i++; ?></td>
                          <td>
                            <img src="<?= base_url('assets/portfolio/').$key->foto ?>" alt="" class="img img-responsive img-thumbnail" style="width: 200px; height: 150px;">
                          </td>
                          <td><?= $key->title; ?></td>
                          <td>
                            <a href="<?= base_url('admin/update_portfolio/'). md5($key->id_portfolio) ?>" class="btn btn-info"> <i class="fa fa-edit"></i> Edit</a>
                            <a href="<?= base_url('admin/delete_portfolio/'). md5($key->id_portfolio) ?>" class="btn btn-danger" onclick="return confirm('Yakin mau menghapus data <?= ucfirst($key->title) ?> ? ')"> <i class="fa fa-trash-o"></i> Delete</a>
                          </td>
                        </tr>
                        
                      <?php endforeach ?>
                    </tbody>
                </table>
             </div>
          </div>
         </div>
    </div>
</section>
<?php if ($this->session->flashdata('message')): ?>
  <script type="text/javascript">
  notifikasi('success', '<?= $this->session->flashdata('message'); ?>');
  </script>
<?php endif ?>
<?php if ($this->session->flashdata('failed')): ?>
  <script type="text/javascript">
  notifikasi('error', '<?= $this->session->flashdata('failed'); ?>');
  </script>
<?php endif ?>