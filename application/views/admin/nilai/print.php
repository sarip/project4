<!DOCTYPE html>
<html>
<head>
	<title>Print Siswa</title>
</head>

<link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
<body>
<div class="container">
<div class="row" style="padding-bottom: 50px">
<center>
<h4><tt><img src="<?= base_url('/assets/biodata/') .$biodata->logo_sekolah ?>" class="img-responsive" style="width: 200px;height: 100px"><br>Laporan Penilaian Hasil Belajar Siswa <?= ucfirst($biodata->nama_sekolah) ?> <br /></tt>

</h4>
</center>
<hr />

<table style="height: 73px;" width="384">
<tbody>
<tr>
<td style="width: 184px;">NIS</td>
<td style="width: 184px;">: <b><?= $siswa->nis; ?></td>
</tr>
<tr>
<td style="width: 184px;">Nama Peserta Didik</td>
<td style="width: 184px;">: <b><?= $siswa->nama_siswa; ?></b></td>
</tr>
<tr>
<td style="width: 184px;">Kelas</td>
<td style="width: 184px;">: <b><?= ucfirst($siswa->nama_kelas); ?></td>
</tr>
<tr>
<td style="width: 184px;">Program Keahlian</td>
<td style="width: 350px;">: <b><?= ucfirst($siswa->nama_jurusan); ?></td>
</tr>
<tr>
<td style="width: 184px;">Jenis Kelamin</td>
<td style="width: 184px;">: <b><?= $siswa->jenis_kelamin; ?></b></td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>



<table class="table-striped table-hover" border="1px solid grey;"cellspacing="0" style="border-collapse: collapse;">
<thead>
  <tr>
    <th rowspan="3" width="2%" class="text-center">&nbsp;Mata Pelajaran</th>
    <th colspan="4">&nbsp; Tahun : <?= $siswa->th_1 ?></th>
    <th colspan="4">&nbsp; Tahun : <?= $siswa->th_2 ?></th>
    <th colspan="4">&nbsp; Tahun : <?= $siswa->th_3 ?></th>
     <th rowspan="3" class="text-center" width="2%">NI</th>
    <th rowspan="3" class="text-center" width="2%">NS</th>
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
   
    <tbody>
      <?php $i=1; $total_nilai_ap_1=0; $total_nilai_ap_2=0; $total_nilai_ap_3=0; $total_nilai_ap_4=0; $total_nilai_ap_5=0; $total_nilai_ap_6=0; $total_nilai_ak_1=0; $total_nilai_ak_2=0; $total_nilai_ak_3=0; $total_nilai_ak_4=0; $total_nilai_ak_5=0; $total_nilai_ak_6=0; $total_nilai_ijazah=0; $total_nilai_skhun=0; foreach ($dataNilai->result() as $nilai): 
        $total_nilai_ap_1+=$nilai->ap_1; $total_nilai_ap_2+=$nilai->ap_2; $total_nilai_ap_3+=$nilai->ap_3; $total_nilai_ap_4+=$nilai->ap_4; $total_nilai_ap_5+=$nilai->ap_5; $total_nilai_ap_6+=$nilai->ap_6;
        $total_nilai_ak_1+=$nilai->ak_1; $total_nilai_ak_2+=$nilai->ak_2; $total_nilai_ak_3+=$nilai->ak_3; $total_nilai_ak_4+=$nilai->ak_4; $total_nilai_ak_5+=$nilai->ak_5; $total_nilai_ak_6+=$nilai->ak_6; $total_nilai_ijazah+=$nilai->nilai_ijazah; $total_nilai_skhun+=$nilai->nilai_skhun;


      ?>
        <tr class="text-center">
          
          <td>&nbsp;<?= $nilai->nama_pelajaran ?></td>
          <td><?= $nilai->ap_1 ?></td>
          <td><?= $nilai->ak_1 ?></td>
          <td><?= $nilai->ap_2 ?></td>
          <td><?= $nilai->ak_2 ?></td>
          <td><?= $nilai->ap_3 ?></td>
          <td><?= $nilai->ak_3 ?></td>
          <td><?= $nilai->ap_4 ?> </td>
          <td><?= $nilai->ak_4 ?></td>
          <td><?= $nilai->ap_5 ?></td>
          <td><?= $nilai->ak_5 ?></td>
           <td><?= $nilai->ap_6 ?></td>
          <td><?= $nilai->ak_6 ?></td>
          <td><?= $nilai->nilai_ijazah ?></td>
          <td><?= $nilai->nilai_skhun ?></td>
        </tr>
      <?php $i++; endforeach ?>
      <tr class="text-center">
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
        <td><b>&nbsp;<?= $total_nilai_ijazah ?></b></td>
        <td><b>&nbsp;<?= $total_nilai_skhun ?></b></td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
       <td colspan="15" style="background: rgba(0,0,0,0.1)">&nbsp;</td>
     </tr>
     <tr>
       <td colspan="15" class="text-left"><b>&nbsp;Keterangan &nbsp;&nbsp;: </b> <b>S</b> = Sakit , <b>I</b> = Izin , <b>A</b> = Alpa </td>
     </tr>
    
      <tr>
       <th class="text-center">&nbsp;S</th>
       <td colspan="2" class="text-center"><?= $nilai->s_1 ?></td>
       <td colspan="2" class="text-center"><?= $nilai->s_2 ?></td>
       <td colspan="2" class="text-center"><?= $nilai->s_3 ?></td>
       <td colspan="2" class="text-center"><?= $nilai->s_4 ?></td>
       <td colspan="2" class="text-center"><?= $nilai->s_5 ?></td>
       <td colspan="2" class="text-center"><?= $nilai->s_6 ?></td>
       <td colspan="2"></td>
      </tr>

      <tr>
       <th class="text-center">&nbsp;I</th>
       <td colspan="2" class="text-center"><?= $nilai->i_1 ?></td>
       <td colspan="2" class="text-center"><?= $nilai->i_2 ?></td>
       <td colspan="2" class="text-center"><?= $nilai->i_3 ?></td>
       <td colspan="2" class="text-center"><?= $nilai->i_4 ?></td>
       <td colspan="2" class="text-center"><?= $nilai->i_5 ?></td>
       <td colspan="2" class="text-center"><?= $nilai->i_6 ?></td>
       <td colspan="2"></td>
      </tr>

      


     <tr>
       <th class="text-center">&nbsp;A</th>
       <td colspan="2" class="text-center"><?= $nilai->a_1 ?></td>
       <td colspan="2" class="text-center"><?= $nilai->a_2 ?></td>
       <td colspan="2" class="text-center"><?= $nilai->a_3 ?></td>
       <td colspan="2" class="text-center"><?= $nilai->a_4 ?></td>
       <td colspan="2" class="text-center"><?= $nilai->a_5 ?></td>
       <td colspan="2" class="text-center"><?= $nilai->a_6 ?></td>
       <td colspan="2"></td>
      </tr>
      <tr>
       <td colspan="15" style="background: rgba(0,0,0,0.1)">&nbsp;</td>
     </tr>
       <tr>
       <td class="text-center"><b>Catatan</b></td>
        <th colspan="15"><textarea class="form-control" readonly><?= $siswa->catatan; ?></textarea></th>
      </tr>
    </tfoot>

</table>

</div>
</body>
    <script>
      print();
    </script>
</html>