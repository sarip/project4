 <section class="content-header">
      <h1><?= $title; ?> <small><?= $judul; ?></small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-child"></i> <?= $title; ?></a></li>
        <li class="active"><?= $judul; ?></li>
      </ol>
</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <a href="<?= base_url('admin/insert_siswa') ?>" title="Tambah Data Siswa" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Siswa</a> -->
             
            </div>
            <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table class="table table-bordered table-hover" id="table">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Nis</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Tempat, Tanggal Lahir</th>
                          <th>Tanggal Masuk</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $i=1; foreach ($dataSiswa->result() as $key): ?>
                    		<tr>
                    			<td><?= $i++; ?></td>
                    			<td><?= $key->nis; ?></td>
                    			<td><?= $key->nama_siswa; ?></td>
                          <td><?= $key->jenis_kelamin; ?></td>
                    			<td><?= $key->tempat_lahir . ', ' . $this->mylibrary->date_indo($key->tanggal_lahir); ?></td>
                    			<td><?= $this->mylibrary->date_indo($key->tanggal_masuk); ?></td>
                    			<td>
                    				<a href="<?= base_url('admin/update_nilai/'). $key->id_siswa ?>" class="btn btn-info"> <i class="fa fa-edit"></i> Nilai</a>
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