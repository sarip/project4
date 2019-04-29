 <section class="content-header">
      <h1><?= $title; ?> <small><?= $judul; ?></small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-pencil"></i> <?= $title; ?></a></li>
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


              <a href="<?= base_url('admin/print_nilai/').$this->uri->segment(3) ?>" title="Print Nilai" class="btn btn-warning pull-right" target="_blank"><i class="fa fa-print"></i> Print</a>
             
            </div>
            <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <div class="panel panel-primary">
                    <div class="panel-heading">Biodata Siswa</div>
                    <div class="panel-body"><div class="table-responsive">
                      <table class="table table-striped table-hover" id="table">
                        <tr>
                          <th>Nis</th>
                          <td class="text-center">:</td>
                          <td><?= ucfirst($siswa->nis) ?></td>
                        </tr>
                         <tr>
                          <th>Nama Siswa</th>
                          <td class="text-center">:</td>
                          <td><?= ucfirst($siswa->nama_siswa) ?></td>
                        </tr>
                         <tr>
                          <th>Kelas</th>
                          <td class="text-center">:</td>
                          <td><?= ucfirst($siswa->nama_kelas) ?></td>
                        </tr>
                        <tr>
                          <th>Program Keahlian</th>
                          <td class="text-center">:</td>
                          <td><?= ucfirst($siswa->nama_jurusan) ?></td>
                        </tr>
                        <tr>
                          <th>Jenis Kelamin</th>
                          <td class="text-center">:</td>
                          <td><?= $siswa->jenis_kelamin ?></td>
                        </tr>
                        <tr>
                          <th>Tempat, Tanggal Lahir</th>
                          <td class="text-center">:</td>
                          <td><?= $siswa->tempat_lahir . ', ' . $this->mylibrary->date_indo($siswa->tanggal_lahir); ?></td>
                        </tr>
                    </table></div>
                    </div>
                  </div>
                  

                  <div class="panel panel-primary">
                    <div class="panel-heading">Nilai Siswa</div>
                    <div class="panel-body"><div class="table-responsive">
                      <p><b>* AP</b> &nbsp;&nbsp;&nbsp; = Angka Prestasi</p>
                      <p><b>* ARK</b> &nbsp;= Angka Rata-rata Kelas</p>
                      <p><b>* NI</b> &nbsp;= Nilai Ijazah</p>
                      <p><b>* NS</b> &nbsp;= Nilai Skhun</p>
                      <table class="table-striped table-hover" border="1px solid black;"cellspacing="0" style="border-collapse: collapse;">
                        <thead>
                          <tr>
                            <th rowspan="3" width="5%" class="">&nbsp; Mata Pelajaran</big> <br><br>&nbsp;&nbsp;<a data-target="#insert_pelajaran" data-toggle="modal"  title="tambah mata pelajaran untuk penilaian"><i class="fa fa-plus-circle"></i> Add Pelajaran</a></th>
                        <?= form_open('') ?>
                            <th colspan="4" class="text-center">
                              &nbsp; Tahun : <input type="text" name="th_1" style="background: rgba(0,0,0,0); border: 0px solid white;" placeholder="0000 - 0000" value="<?= $siswa->th_1 ?>">
                            </th>
                            <th colspan="4" class="text-center">
                              &nbsp; Tahun : <input type="text" name="th_2" style="background: rgba(0,0,0,0); border: 0px solid white;" placeholder="0000 - 0000" value="<?= $siswa->th_2 ?>">
                            </th>
                            <th colspan="4" class="text-center">
                              &nbsp; Tahun : <input type="text" name="th_3" style="background: rgba(0,0,0,0); border: 0px solid white;" placeholder="0000 - 0000" value="<?= $siswa->th_3 ?>">
                              <th rowspan="3" class="text-center" width="2%">NI</th>
                              <th rowspan="3" class="text-center" width="2%">NS</th>
                            </th>
                          </tr>
                          <tr>
                            <th colspan="2" width="10%" class="text-center"> Semester : 1</th>
                            <th colspan="2" width="10%" class="text-center"> Semester : 2</th>
                            <th colspan="2" width="10%" class="text-center"> Semester : 1</th>
                            <th colspan="2" width="10%" class="text-center"> Semester : 2</th>
                            <th colspan="2" width="10%" class="text-center"> Semester : 1</th>
                            <th colspan="2" width="10%" class="text-center"> Semester : 2</th>
                          </tr>
                          <tr>
                            <th class="text-center" width="1%">AP</th>
                            <th class="text-center" width="1%">ARK</th>
                            <th class="text-center" width="1%">AP</th>
                            <th class="text-center" width="1%">ARK</th>
                            <th class="text-center" width="1%">AP</th>
                            <th class="text-center" width="1%">ARK</th>
                            <th class="text-center" width="1%">AP</th>
                            <th class="text-center" width="1%">ARK</th>
                            <th class="text-center" width="1%">AP</th>
                            <th class="text-center" width="1%">ARK</th>
                            <th class="text-center" width="1%">AP</th>
                            <th class="text-center" width="1%">ARK</th>
                          </tr>
                        </thead> 
                        <tbody>
                          <?php $i=1; $total_nilai_ap_1=0; $total_nilai_ap_2=0; $total_nilai_ap_3=0; $total_nilai_ap_4=0; $total_nilai_ap_5=0; $total_nilai_ap_6=0; $total_nilai_ak_1=0; $total_nilai_ak_2=0; $total_nilai_ak_3=0; $total_nilai_ak_4=0; $total_nilai_ak_5=0; $total_nilai_ak_6=0; $total_nilai_ijazah=0; $total_nilai_skhun=0; foreach ($dataNilai->result() as $nilai): 
                            $total_nilai_ap_1+=$nilai->ap_1; $total_nilai_ap_2+=$nilai->ap_2; $total_nilai_ap_3+=$nilai->ap_3; $total_nilai_ap_4+=$nilai->ap_4; $total_nilai_ap_5+=$nilai->ap_5; $total_nilai_ap_6+=$nilai->ap_6;
                            $total_nilai_ak_1+=$nilai->ak_1; $total_nilai_ak_2+=$nilai->ak_2; $total_nilai_ak_3+=$nilai->ak_3; $total_nilai_ak_4+=$nilai->ak_4; $total_nilai_ak_5+=$nilai->ak_5; $total_nilai_ak_6+=$nilai->ak_6; $total_nilai_ijazah+=$nilai->nilai_ijazah; $total_nilai_skhun+=$nilai->nilai_skhun;
                          ?>
                          <input type="hidden" name="id_nilai_<?= $i ?>" value="<?= $nilai->id_nilai ?>">
                            <tr>
                              
                              <td>&nbsp; <a href="<?= base_url() ?>admin/delete_nilai/<?= md5($nilai->id_nilai) ?>/<?= md5($siswa->id_siswa) ?>" onclick="return confirm('Apakah anda yakin mau menghapus data nilai <?= $nilai->nama_pelajaran ?> ?')"><i class="fa fa-times-circle text-danger"></i></a>&nbsp;<?= $nilai->nama_pelajaran ?></td>
                              <td>
                                <input type="number" name="ap_1_<?= $i ?>" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ap_1 ?>" required>
                              </td>
                              <td>
                                <input type="number" name="ak_1_<?= $i ?>" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ak_1 ?>" required>
                              </td>

                              <td>
                                <input type="number" name="ap_2_<?= $i ?>" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ap_2 ?>" required>
                              </td>
                              <td>
                                <input type="number" name="ak_2_<?= $i ?>" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ak_2 ?>" required>
                              </td>

                              <td>
                                <input type="number" name="ap_3_<?= $i ?>" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ap_3 ?>" required>
                              </td>
                              <td>
                                <input type="number" name="ak_3_<?= $i ?>" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ak_3 ?>" required>
                              </td>

                              <td>
                                <input type="number" name="ap_4_<?= $i ?>" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ap_4 ?>" required>
                              </td>
                              <td>
                                <input type="number" name="ak_4_<?= $i ?>" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ak_4 ?>" required>
                              </td>

                              <td>
                                <input type="number" name="ap_5_<?= $i ?>" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ap_5 ?>" required>
                              </td>
                              <td>
                                <input type="number" name="ak_5_<?= $i ?>" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ak_5 ?>" required>
                              </td>

                               <td>
                                <input type="number" name="ap_6_<?= $i ?>" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ap_6 ?>" required>
                              </td>
                              <td>
                                <input type="number" name="ak_6_<?= $i ?>" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ak_6 ?>" required>
                              </td>


                               <td>
                                <input type="number" name="nilai_ijazah_<?= $i ?>" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->nilai_ijazah ?>" required>
                              </td>
                               <td>
                                <input type="number" name="nilai_skhun_<?= $i ?>" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->nilai_skhun ?>" required>
                              </td>


                            </tr>
                          <?php $i++; endforeach ?>
                          <tr>
                            <td><b>&nbsp;TOTAL NILAI&nbsp;: </b></td>
                            <td><b>&nbsp;<?= $total_nilai_ap_1; ?></b></td>
                            <td><b>&nbsp;<?= $total_nilai_ak_1; ?></b></td>
                            <td><b>&nbsp;<?= $total_nilai_ap_2; ?></b></td>
                            <td><b>&nbsp;<?= $total_nilai_ak_2; ?></b></td>
                            <td><b>&nbsp;<?= $total_nilai_ap_3; ?></b></td>
                            <td><b>&nbsp;<?= $total_nilai_ak_3; ?></b></td>
                            <td><b>&nbsp;<?= $total_nilai_ap_4; ?></b></td>
                            <td><b>&nbsp;<?= $total_nilai_ak_4; ?></b></td>
                            <td><b>&nbsp;<?= $total_nilai_ap_5; ?></b></td>
                            <td><b>&nbsp;<?= $total_nilai_ak_5; ?></b></td>
                            <td><b>&nbsp;<?= $total_nilai_ap_6; ?></b></td>
                            <td><b>&nbsp;<?= $total_nilai_ak_6; ?></b></td>
                            <td><b>&nbsp;<?= $total_nilai_ijazah; ?></b></td>
                            <td><b>&nbsp;<?= $total_nilai_skhun; ?></b></td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                           <td colspan="15">
                            &nbsp;
                           </td>
                         </tr>
                         <tr>
                           <td colspan="15" class="text-left"><b>&nbsp;Keterangan &nbsp;&nbsp;: </b> <b>S</b> = Sakit , <b>I</b> = Izin , <b>A</b> = Alpa </td>
                         </tr>
                        
                          <tr>
                           <th class="text-center">&nbsp;S</th>
                           <td colspan="2" class="text-center"><input type="number" name="s_1" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->s_1 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="s_2" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->s_2 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="s_3" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->s_3 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="s_4" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->s_4 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="s_5" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->s_5 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="s_6" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->s_6 ?>" required></td>
                          <td colspan="2"></td>
                          </tr>

                          <tr>
                           <th class="text-center">&nbsp;I</th>
                           <td colspan="2" class="text-center"><input type="number" name="i_1" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->i_1 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="i_2" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->i_2 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="i_3" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->i_3 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="i_4" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->i_4 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="i_5" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->i_5 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="i_6" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->i_6 ?>" required></td>
                          <td colspan="2"></td>
                          </tr>

                          


                         <tr>
                           <th class="text-center">&nbsp;A</th>
                           <td colspan="2" class="text-center"><input type="number" name="a_1" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->a_1 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="a_2" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->a_2 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="a_3" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->a_3 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="a_4" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->a_4 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="a_5" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->a_5 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="a_6" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->a_6 ?>" required></td>
                          <td colspan="2"></td>
                          </tr>

                          <tr>
                            <td colspan="15" style="padding: 10px;">
                            <label for="catatan">Catatan :</label><br>
                            <textarea name="catatan" cols="61" rows="5" class="fomr-control"><?= $siswa->catatan ?></textarea>
                            <div class="pull-right">
                             <button class="btn btn-success" name="simpan" type="submit"><i class="fa fa-save"></i> Simpan</button>&nbsp;
                             <a href="<?= base_url() ?>admin/nilai" class="btn btn-default"><i class="fa fa-reply"></i> Cancel</a>
                            <?= form_close() ?>
                             
                           </div>
                            </td>

                          </tr>
                        </tfoot>
                      </table></div>
                    </div>
                  </div>


                <i class="text-danger">*Jika sudah melakukan perubahan pada data di atas di wajib kan untuk mengclick tombol simpan</i>
                </div>
             </div>
         </div>
    </div>
</section>


<div class="modal modal-default fade" id="insert_pelajaran" role="dialog"> 
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-primary text-center">Tambah mata pelajaran untuk Penilaian</div>
      <?= form_open('admin/insert_nilai/'.$siswa->id_siswa) ?>
      <div class="modal-body">
        <div class="form-group">
          <select name="id_pelajaran" class="form-control" required>
            <option value="">-- Mata Pelajaran --</option>
            <?php foreach ($this->db->get('pelajaran')->result() as $key): ?>
              <?php if ($this->db->get_where('nilai', ['id_pelajaran' => $key->id_pelajaran, 'id_siswa' => $siswa->id_siswa])->num_rows() == 0): ?>
                <option value="<?= $key->id_pelajaran ?>"><?= $key->nama_pelajaran ?></option>
              <?php endif ?>
            <?php endforeach ?>
          </select>
          <br>
          <small class="text-warning"><i class="fa fa-warning"></i> jika tidak ada mata pelajar berarti sudah terpilih semua</small>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i></button>
        <button class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>


<?php if ($this->session->flashdata('message')): ?>
  <script type="text/javascript">
  notifikasi('success', '<?= $this->session->flashdata('message'); ?>');
  </script>
<?php endif ?>