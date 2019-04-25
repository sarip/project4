 <section class="content-header">
      <h1><?= $title; ?> <small><?= $judul; ?></small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> <?= $title; ?></a></li>
        <li class="active"><?= $judul; ?></li>
      </ol>
</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="<?= base_url('admin/insert_wali_kelas') ?>" title="Tambah Data Wali Kelas" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Wali Kelas</a>
             
            </div>
            <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table class="table table-bordered table-hover" id="table">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>NIP</th>
                          <th>Nama Guru</th>
                          <th>Kelas</th>
                          <th>Jurusan</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $i=1; foreach ($waliKelas as $key): ?>
                    		<tr>
                    			<td><?= $i++; ?></td>
                          <td><?= $key->nip ?></td>
                    			<td><?= $key->nama_guru ?></td>
                          <td><?= $key->nama_kelas  ?></td>
                          <td><?= $key->nama_jurusan ?></td>
                    			<td>
                    				<a href="<?= base_url('admin/update_wali_kelas/'). md5($key->id_wali_kelas) ?>" class="btn btn-info"> <i class="fa fa-edit"></i> Edit</a>
                            <a href="<?= base_url('admin/delete_wali_kelas/'). md5($key->id_wali_kelas) ?>" class="btn btn-danger" onclick="return confirm('Yakin mau menghapus data <?= ucfirst($key->nama_guru) ?> ? ')"> <i class="fa fa-trash-o"></i> Delete</a>
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