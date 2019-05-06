 <section class="content-header">
      <h1>&nbsp;</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="glyphicon glyphicon-stats"></i> <?= $title; ?></a></li>
        <li class="active"><?= $judul; ?></li>
      </ol>
</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header text-center">
             <big>------------------- <?= $judul ?> -------------------</big>
            </div>
            <!-- /.box-header -->
                <div class="box-body">
                   <p><b>* AP</b> &nbsp;&nbsp;&nbsp; = Angka Prestasi</p>
                    <p><b>* ARK</b> &nbsp;= Angka Rata-rata Kelas</p>
                    <p><b>* NI</b> &nbsp;= Nilai Ijazah</p>
                    <p><b>* NS</b> &nbsp;= Nilai Skhun</p>



                  <div class="box-group" id="accordion">
                    
                    <?php $i=1;foreach ($mengajar as $key): ?> 

                    <div class="panel box box-primary" style="padding-bottom: 30px;">
                      <div class="box-header"  style="background: <?= $i % 2 == 0 ? '#eee' : ''; ?>;">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#<?= $key->id_megajar ?>">
                            <small style="color: black;"><i class="fa fa-arrow-right"></i> <?= $key->nama_kelas.' '.$key->nama_jurusan ?> <br> &nbsp;&nbsp;&nbsp;&nbsp;( <small><?= $key->nama_pelajaran ?></small> ) </small>
                          </a>
                        </h4>
                      </div>
                      <div id="<?= $key->id_megajar ?>" class="panel-collapse collapse">
                        <div class="box-body table-responsive">
                          <?= form_open(base_url('guru/nilai/'.md5($key->id_kelas).'/'.md5($key->id_jurusan).'/'.$key->id_pelajaran)); ?>
                          <table class="table-striped table-hover" border="1px solid black;"cellspacing="0" style="border-collapse: collapse;" width="100%">
                            <thead>
                              <tr>
                                <th rowspan="3" class="text-center">Nis</th>
                                <th rowspan="3" class="text-center">Nama</th>
                                <th rowspan="3" class="text-center">Mapel</th>
                                <th colspan="4" class="text-center">X</th>
                                <th colspan="4" class="text-center">XI</th>
                                <th colspan="4" class="text-center">XII</th>
                                <th rowspan="3" class="text-center" width="5%">NI</th>
                                <th rowspan="3" class="text-center" width="5%">NS</th>
                              </tr>
                              <tr>
                                <th colspan="2" width="10%" class="text-center">Ganjil</th>
                                <th colspan="2" width="10%" class="text-center">Genap</th>
                                <th colspan="2" width="10%" class="text-center">Ganjil</th>
                                <th colspan="2" width="10%" class="text-center">Genap</th>
                                <th colspan="2" width="10%" class="text-center">Ganjil</th>
                                <th colspan="2" width="10%" class="text-center">Genap</th>
                              </tr>
                              <tr>
                                <td class="text-center" width="5%">AP</td>
                                <td class="text-center" width="5%">ARK</td>
                                <td class="text-center" width="5%">AP</td>
                                <td class="text-center" width="5%">ARK</td>
                                <td class="text-center" width="5%">AP</td>
                                <td class="text-center" width="5%">ARK</td>
                                <td class="text-center" width="5%">AP</td>
                                <td class="text-center" width="5%">ARK</td>
                                <td class="text-center" width="5%">AP</td>
                                <td class="text-center" width="5%">ARK</td>
                                <td class="text-center" width="5%">AP</td>
                                <td class="text-center" width="5%">ARK</td>
                              </tr>
                            </thead>
                            <tbody>
                            <?php if ($this->db->get_where('siswa', ['id_kelas' => $key->id_kelas, "id_jurusan" => $key->id_jurusan])->num_rows() > 0): ?>
                            <?php $this->db->order_by('nis', 'asc') ?>
                            <?php foreach ($this->db->get_where('siswa', ['id_kelas' => $key->id_kelas, "id_jurusan" => $key->id_jurusan])->result() as $value): ?>
                              <tr>
                                <td>&nbsp;<?= $value->nis ?></td>
                                <td>&nbsp;<?= $value->nama_siswa  ?></td>
                                <td>&nbsp;<?= $key->nama_pelajaran ?></td>
                                <?php if ($this->db->get_where('nilai', ['id_siswa' => $value->id_siswa, "id_pelajaran" => $key->id_pelajaran])->num_rows() > 0): ?>
                                <?php foreach ($this->db->get_where('nilai', ['id_siswa' => $value->id_siswa, "id_pelajaran" => $key->id_pelajaran])->result() as $nilai): ?>
                                <td>
                                  <input type="number" name="id_siswa_<?= $value->id_siswa ?>_ap_1" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ap_1 ?>" required>
                                </td>
                                <td>
                                  <input type="number" name="id_siswa_<?= $value->id_siswa ?>_ak_1" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ak_1 ?>" required>
                                </td>
                                <td>
                                  <input type="number" name="id_siswa_<?= $value->id_siswa ?>_ap_2" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ap_2 ?>" required>
                                </td>
                                <td>
                                  <input type="number" name="id_siswa_<?= $value->id_siswa ?>_ak_2" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ak_2 ?>" required>
                                </td>
                                <td>
                                  <input type="number" name="id_siswa_<?= $value->id_siswa ?>_ap_3" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ap_3 ?>" required>
                                </td>
                                <td>
                                  <input type="number" name="id_siswa_<?= $value->id_siswa ?>_ak_3" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ak_3 ?>" required>
                                </td>
                                 <td>
                                  <input type="number" name="id_siswa_<?= $value->id_siswa ?>_ap_4" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ap_4 ?>" required>
                                </td>
                                <td>
                                  <input type="number" name="id_siswa_<?= $value->id_siswa ?>_ak_4" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ak_4 ?>" required>
                                </td>
                                 <td>
                                  <input type="number" name="id_siswa_<?= $value->id_siswa ?>_ap_5" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ap_5 ?>" required>
                                </td>
                                <td>
                                  <input type="number" name="id_siswa_<?= $value->id_siswa ?>_ak_5" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ak_5 ?>" required>
                                </td>
                                 <td>
                                  <input type="number" name="id_siswa_<?= $value->id_siswa ?>_ap_6" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ap_6 ?>" required>
                                </td>
                                <td>
                                  <input type="number" name="id_siswa_<?= $value->id_siswa ?>_ak_6" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->ak_6 ?>" required>
                                </td>
                                <td>
                                  <input type="number" name="id_siswa_<?= $value->id_siswa ?>_nilai_ijazah" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->nilai_ijazah ?>" required>
                                </td>
                                <td>
                                  <input type="number" name="id_siswa_<?= $value->id_siswa ?>_nilai_skhun" style="width: 100%;padding: 5px; background: rgba(0,0,0,0.0); border: 0px solid white;" value="<?= $nilai->nilai_skhun ?>" required>
                                </td>
                                <?php endforeach ?>
                                <?php else: ?>
                                <td colspan="13" class="bg-danger">--data tidak ada --</td>
                                <?php endif ?>
                              </tr>
                            <?php endforeach ?>
                            <?php else: ?>
                              <td colspan="17">Maaf data siswa tidak di temukan !</td>
                            <?php endif ?>
                           </tbody>
                          </table>
                          <br>
                          <?php if ($this->db->get_where('siswa', ['id_kelas' => $key->id_kelas, "id_jurusan" => $key->id_jurusan])->num_rows() > 0): ?>
                          <button class="btn btn-success pull-right" type="submit"><i class="fa fa-save"></i> Save </button>
                          <?php endif; ?>
                          <?= form_close() ?>
                        </div>
                      </div>
                    </div>
                    <?php $i++; endforeach ?>


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
<?php if ($this->session->flashdata('failed')): ?>
  <script type="text/javascript">
  notifikasi('error', '<?= $this->session->flashdata('failed'); ?>');
  </script>
<?php endif ?>