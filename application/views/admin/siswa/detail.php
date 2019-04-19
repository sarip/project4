 <section class="content-header">
      <h1><?= $title; ?> <small><?= $judul; ?></small></h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('admin/siswa'); ?>"><i class="fa fa-child"></i> Siswa</a></li>
        <li class="active"><?= $judul; ?></li>
      </ol>
</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             
            </div>
            <!-- /.box-header -->
              <div class="row">
                <div class="col-lg-6">
                  <h3><i class="fa fa-arrow-right"></i> Data Siswa : </h3>
                    <div class="box-body table-responsive">
                      <table class="table table-striped table-hover" id="table">
                          <tr>
                            <th>NIS </th>
                            <th> : </th>
                            <td><?= $siswa->nis; ?></td>
                          </tr>
                          <tr>
                            <th>Nama Siswa </th>
                            <th> : </th>
                            <td><?= $siswa->nama_siswa; ?></td>
                          </tr>    
                          <tr>
                            <th>Jenis Kelamin </th>
                            <th> : </th>
                            <td><?= $siswa->jenis_kelamin; ?></td>
                          </tr>
                          <tr>
                            <th>Tempat, Tanggal Lahir </th>
                            <th> : </th>
                            <td><?= $siswa->tempat_lahir .', '. $this->mylibrary->date_indo($siswa->tanggal_lahir); ?></td>
                          </tr>
                          <tr>
                            <th>Warga Negara </th>
                            <th> : </th>
                            <td><?= $siswa->warga_negara; ?></td>
                          </tr>

                          <tr>
                            <th>Agama </th>
                            <th> : </th>
                            <td><?= $siswa->agama; ?></td>
                          </tr>
                          <tr>
                            <th>Alamat Siswa </th>
                            <th> : </th>
                            <td><?= $siswa->alamat_siswa; ?></td>
                          </tr>
                        </table>
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <h3><i class="fa fa-arrow-right"></i> Data Oarng Tua/Wali : </h3>
                    <div class="box-body table-responsive">
                      <table class="table table-striped table-hover" id="table">
                        <tr>
                          <th>Nama Orang Tua </th>
                          <th> : </th>
                          <td><?= $siswa->nama_orang_tua; ?></td>
                        </tr>
                        <tr>
                          <th>Pekerjaan Orang Tua </th>
                          <th> : </th>
                          <td><?= $siswa->pekerjaan; ?></td>
                        </tr>
                        <tr>
                          <th>Alamat Orang Tua </th>
                          <th> : </th>
                          <td><?= $siswa->alamat_orang_tua; ?></td>
                        </tr>
                        <tr>
                          <th>Nama Wali </th>
                          <th> : </th>
                          <td><?= $siswa->nama_wali; ?></td>
                        </tr>
                        <tr>
                          <th>Pekerjaan Wali </th>
                          <th> : </th>
                          <td><?= $siswa->pekerjaan_wali; ?></td>
                        </tr>
                        <tr>
                          <th>Alamat Wali </th>
                          <th> : </th>
                          <td><?= $siswa->alamat_wali; ?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <h3><i class="fa fa-arrow-right"></i> Diterima Menjadi Siswa : </h3>
                     <div class="box-body table-responsive">
                      <table class="table table-striped table-hover" id="table">
                        <tr>
                          <th>Tanggal Masuk </th>
                          <th> : </th>
                          <td><?= $this->mylibrary->date_indo($siswa->tanggal_masuk); ?></td>
                        </tr>
                        <tr>
                          <th>Asal Sekolah </th>
                          <th> : </th>
                          <td><?= $siswa->asal_sekolah; ?></td>
                        </tr>

                        <tr>
                          <th>Alamat Sekolah </th>
                          <th> : </th>
                          <td><?= $siswa->alamat_sekolah; ?></td>
                        </tr>
                        <tr>
                          <th>Nomor Sttb </th>
                          <th> : </th>
                          <td><?= $siswa->nomor_sttb; ?></td>
                        </tr>
                        <tr>
                          <th>Tanggal Sttb </th>
                          <th> : </th>
                          <td><?= $this->mylibrary->date_indo($siswa->tanggal_sttb); ?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <h3><i class="fa fa-arrow-right"></i> Meninggalkan Sekolah : </h3>
                     <div class="box-body table-responsive">
                      <table class="table table-striped table-hover" id="table">
                       <tr>
                        <th>Tanggal Meninggalkan Sekolah </th>
                        <th> : </th>
                        <td><?= $this->mylibrary->date_indo($siswa->tanggal_meninggalkan_sekolah); ?></td>
                      </tr>
                      <tr>
                        <th>Alasan Meninggalkan Sekolah </th>
                        <th> : </th>
                        <td><?= $siswa->alasan_meninggalkan_sekolah; ?></td>
                      </tr>
                      <tr>
                        <th>Tamat Nomor Sttb </th>
                        <th> : </th>
                        <td><?= $siswa->tamat_nomor_sttb; ?></td>
                      </tr>
                      <tr>
                        <th>Tamat Tanggal Sttb </th>
                        <th> : </th>
                        <td><?= $this->mylibrary->date_indo($siswa->tamat_tanggal_sttb); ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div><br>
              <div class="box-body table-responsive">
                <table class="table table-striped table-hover" id="table">
                  <tr>
                    <th width="50%">Keterangan Lain </th>
                    <th> : </th>
                    <td><?= $siswa->keterangan_lain; ?></td>
                  </tr>
                  <tr>
                    <th>Foto Siswa </th>
                    <th> : </th>
                    <td><img src="<?= base_url('assets/siswa/').$siswa->foto_siswa; ?>" class="img img-thumbnail img-responsive" style="width: 50%; height: 40%;"></td>
                  </tr>
              </table>
              <a href="<?= base_url('admin/siswa') ?>" class="btn btn-primary btn-block"><i class="fa fa-reply"></i> Kembali</a>
             </div>
          </div>
         </div>
    </div>
</section>
