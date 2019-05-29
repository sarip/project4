<!-- Team -->
<section class="team section" style="padding-bottom: -50px;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2>Siswa</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
					<?= form_open('') ?>
              				<div class="learnedu-sidebar" style="border: none;">
	              				<div class="search">
									<div class="form">
										<input type="number" name="nis" placeholder="Percarian Siswa Berdasarkan NIS" autofocus value="<?= set_value('nis') ?>" autocomplete="off">
										<button class="button"><i class="fa fa-search"></i></button>
									</div>
								</div><br>
								<?php if (@$judul): ?>
									<div class="alert alert-danger"><?= $judul ?><i class="fa fa-times pull-right" data-dismiss="alert"></i></div>
								<?php endif ?>
							</div>
						
					<?= form_close() ?>
			</div>
		</div>
		
	</div>
</section>
<!--/ End Team -->
<?php if (@$siswa): ?>
<section class="courses single section" style="margin-top: -100px;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="single-main">
					<div class="row">
						<div class="col-lg-5 col-12">
							<!-- Single Course -->
							<div class="single-course">
								<div class="course-head">		
									<img src="<?= base_url('assets/siswa/').$siswa->foto_siswa ?>" style="height: 420px">
								</div>			
							</div>
							<!--/ End Single Course -->
						</div>	
						<div class="col-lg-7 col-12">
							<!-- Course Features -->
							<div class="course-feature">
								<div class="feature-main">
									<h4>Profil Siswa</h4>
									<!-- Single Feature -->
									<div class="single-feature">
										<i class="fa fa-circle-o"></i>
										<!-- <span class="label">Nama Lengkap</span> -->
										<span class="label"><?= $siswa->nis ?></span>
									</div>
									<div class="single-feature">
										<i class="fa fa-circle-o"></i>
										<!-- <span class="label">Nama Lengkap</span> -->
										<span class="label"><?= $siswa->nama_siswa ?></span>
									</div>
									<!--/ End Single Feature -->
									<!-- Single Feature -->
									<div class="single-feature">
										<i class="fa fa-circle-o"></i>
										<!-- <span class="label">Kelas</span> -->
										<span class="label"><?= $siswa->nama_kelas ?></span>
									</div>
									<!--/ End Single Feature -->
									<!-- Single Feature -->
									<div class="single-feature">
										<i class="fa fa-circle-o"></i>
										<!-- <span class="label">Jurusan</span> -->
										<span class="label"><?= $siswa->nama_jurusan ?></span>
									</div>
									<!--/ End Single Feature -->
									<!-- Single Feature -->
									<div class="single-feature">
										<i class="fa fa-circle-o"></i>
										<!-- <span class="label">Jenis kelamin</span> -->
										<span class="label"><?= $siswa->jenis_kelamin ?></span>
									</div>
									<!--/ End Single Feature -->
									<!-- Single Feature -->
									<div class="single-feature">
										<i class="fa fa-circle-o"></i>
										<!-- <span class="label">Tempat, Tanggal Lahir</span> -->
										<span class="label"><?= $siswa->tempat_lahir .', '.$this->mylibrary->date_indo($siswa->tanggal_lahir) ?></span>
									</div>
									<!--/ End Single Feature -->
									<!-- Single Feature -->
									<div class="single-feature">
										<i class="fa fa-circle-o"></i>
										<!-- <span class="label">Alamat</span> -->
										<span class="label"><?= $siswa->alamat_siswa ?></span>
									</div>
									<!--/ End Single Feature -->
								</div>
							</div>
							<!--/ End Course Features -->
						</div>	
					</div>	
					<div class="row">
						<div class="col-12">
							<div class="content table-responsive"><br><br><br><br>
								<table class="table-striped table-hover" border="1px solid grey;"cellspacing="0" style="border-collapse: collapse;">
									 <b>* AP</b> &nbsp;&nbsp;&nbsp; = Angka Prestasi <br>
				                      <b>* ARK</b> &nbsp;= Angka Rata-rata Kelas <br>
				                      <b>* NI </b>  &nbsp;&nbsp;&nbsp;&nbsp; = Nilai Ijazah <br>
				                      <b>* NS</b> &nbsp;&nbsp;&nbsp;&nbsp;= Nilai Skhun <br>
									<thead>
									  <tr class="text-center">
									    <th rowspan="3" width="2%" class="text-center">&nbsp;Mata Pelajaran</th>
									    <th colspan="4" class="text-center">X</th>
									    <th colspan="4" class="text-center">Xi</th>
									    <th colspan="4" class="text-center">Xii</th>
									     <th rowspan="3" class="text-center" width="2%">NI</th>
									    <th rowspan="3" class="text-center" width="2%">NS</th>
									  </tr>
									  <tr class="text-center">
									    <th colspan="2" width="10%"> Ganjil</th>
									    <th colspan="2" width="10%"> Genap</th>
									    <th colspan="2" width="10%"> Ganjil</th>
									    <th colspan="2" width="10%"> Genap</th>
									    <th colspan="2" width="10%"> Ganjil</th>
									    <th colspan="2" width="10%"> Genap</th>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<script>
	$(document).ready(function(){
	$('.alert').alert().delay(5000).slideUp('slow');
});
</script>