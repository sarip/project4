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
                          <th>Nis</th>
                          <td class="text-center">:</td>
                          <td><?= ucfirst($siswa->nis) ?></td>
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
                      <table class="table-striped table-hover" border="1px solid black;"cellspacing="0" style="border-collapse: collapse;">
                        <thead>
                          <tr>
                            <th rowspan="3" width="2%" class="text-center">&nbsp;Mata Pelajaran</th>
                            <th colspan="4">&nbsp; Tahun : </th>
                            <th colspan="4">&nbsp; Tahun : </th>
                            <th colspan="4">&nbsp; Tahun : </th>
                          </tr>
                          <tr>
                            <th colspan="2" width="10%"> Semester : 1</th>
                            <th colspan="2" width="10%"> Semester : 2</th>
                            <th colspan="2" width="10%"> Semester : 1</th>
                            <th colspan="2" width="10%"> Semester : 2</th>
                            <th colspan="2" width="10%"> Semester : 1</th>
                            <th colspan="2" width="10%"> Semester : 2</th>
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
                        <?= form_open('') ?>
                        <tbody>
                          <?php $i=1; $total_nilai_ap_1=0; $total_nilai_ap_2=0; $total_nilai_ap_3=0; $total_nilai_ap_4=0; $total_nilai_ap_5=0; $total_nilai_ap_6=0; $total_nilai_ak_1=0; $total_nilai_ak_2=0; $total_nilai_ak_3=0; $total_nilai_ak_4=0; $total_nilai_ak_5=0; $total_nilai_ak_6=0; foreach ($dataNilai->result() as $nilai): 
                            $total_nilai_ap_1+=$nilai->ap_1; $total_nilai_ap_2+=$nilai->ap_2; $total_nilai_ap_3+=$nilai->ap_3; $total_nilai_ap_4+=$nilai->ap_4; $total_nilai_ap_5+=$nilai->ap_5; $total_nilai_ap_6+=$nilai->ap_6;
                            $total_nilai_ak_1+=$nilai->ak_1; $total_nilai_ak_2+=$nilai->ak_2; $total_nilai_ak_3+=$nilai->ak_3; $total_nilai_ak_4+=$nilai->ak_4; $total_nilai_ak_5+=$nilai->ak_5; $total_nilai_ak_6+=$nilai->ak_6;


                          ?>
                          <input type="hidden" name="id_nilai_<?= $i ?>" value="<?= $nilai->id_nilai ?>">
                            <tr>
                              
                              <td>&nbsp;<?= $nilai->nama_pelajaran ?></td>
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
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                           <td colspan="13" style="background: rgba(0,0,0,0.1)">&nbsp;</td>
                         </tr>
                         <tr>
                           <td colspan="13" class="text-left"><b>&nbsp;Keterangan &nbsp;&nbsp;: </b> <b>S</b> = Sakit , <b>I</b> = Izin , <b>A</b> = Alpa </td>
                         </tr>
                        
                          <tr>
                           <th class="text-center">&nbsp;S</th>
                           <td colspan="2" class="text-center"><input type="number" name="s_1" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->s_1 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="s_2" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->s_2 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="s_3" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->s_3 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="s_4" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->s_4 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="s_5" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->s_5 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="s_6" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->s_6 ?>" required></td>
                          </tr>

                          <tr>
                           <th class="text-center">&nbsp;I</th>
                           <td colspan="2" class="text-center"><input type="number" name="i_1" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->i_1 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="i_2" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->i_2 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="i_3" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->i_3 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="i_4" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->i_4 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="i_5" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->i_5 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="i_6" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->i_6 ?>" required></td>
                          </tr>

                          


                         <tr>
                           <th class="text-center">&nbsp;A</th>
                           <td colspan="2" class="text-center"><input type="number" name="a_1" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->a_1 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="a_2" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->a_2 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="a_3" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->a_3 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="a_4" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->a_4 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="a_5" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->a_5 ?>" required></td>
                           <td colspan="2" class="text-center"><input type="number" name="a_6" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->a_6 ?>" required></td>
                          </tr>

                          <tr>
                            <td colspan="13" style="padding: 10px;">
                            <div class="pull-right">
                             <button class="btn btn-success" name="simpan" type="submit"><i class="fa fa-save"></i> Simpan</button>&nbsp;
                             <a href="<?= base_url() ?>admin/nilai" class="btn btn-default"><i class="fa fa-reply"></i> Cancel</a>
                           </div>
                            </td>
                          </tr>
                        </tfoot>
                        <?= form_close() ?>
                      </table></div>
                    </div>
                  </div>


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